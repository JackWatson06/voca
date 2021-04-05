<?php

namespace App\Http\Controllers\Api\Users;

use App\Http\Controllers\Controller;
use App\Models\User;

use App\Facades\Constant;


use Illuminate\Http\Request;

class UsersController extends Controller
{

    // /**
    //  * Service to interact with third party code
    //  *
    //  * @var ThirdPartyService
    //  */
    // private ThirdPartyService $thirdParty;

    
    // public function __construct(ThirdPartyService $thirdParty)
    // {
    //     $this->thirdParty = $thirdParty;
    //     $thirdParty->setActiveApi(ThirdParty::ENGAGEBAY);
    // }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return User::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'     => 'required|max:255',
            'email'    => 'required|max:255',
            'phone'    => 'required|max:50',
            'trade'    => 'nullable|max:255',
            'info'     => 'nullable',
            'role_id'  => 'required|exists:roles,id',
            'password' => 'nullable'
        ]);

        $validated['password'] = bcrypt($validated['password'] ?? $this->generateRandomPassword(20)); 

        $user = User::firstOrCreate(
            ['email' => $validated['email']],
            $validated
        );



        // $thirdParty->new(Constant::get("USERS"), $user->id);
        // $thirdParty->update(Constant::get("USERS"), $user->id);

        return $user;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return User::findOrFail($id);
    }


    private function generateRandomPassword(int $length)
    { 
        return substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz_$'), 1, $length);
    }
    
}
