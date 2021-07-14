<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use SoftDeletes, HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'company_id'
    ];
    

    
    /**
     * A user can be many employees (this is to save history)
     *
     * @return void
     */
    public function users()
    {
        return $this->belongsTo(User::class);
    }



    /**
     * A company can have many employees
     *
     * @return void
     */
    public function companies()
    {
        return $this->belongsTo(Company::class);
    }

}
