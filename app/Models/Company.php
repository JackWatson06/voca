<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use SoftDeletes, HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'industry',
        'size',
        'info'
    ];


    
    /**
     * A company can have many employees
     *
     * @return void
     */
    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

}
