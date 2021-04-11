<?php

namespace App\Http\Controllers\Api\Users;

use App\Http\Controllers\Controller;
use App\Models\User;

use App\Facades\Constant;
use App\Services\Crm\CrmAdapterContract;

use Illuminate\Http\Request;

class UsersController extends Controller
{



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CrmAdapterContract $crm)
    {
        return User::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, CrmAdapterContract $crm)
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

        $user->wasRecentlyCreated ? $crm->createResource($user) : $crm->updateResource($user);

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
