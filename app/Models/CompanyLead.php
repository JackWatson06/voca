<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class CompanyLead extends Model
{
    use SoftDeletes, HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fname',
        'lname',
        'email',
        'phone',
        'company_name',
        'industry',
        'size',
        'info'
    ];

    /**
     * A user can be an employee at many different places
     *
     * @return void
     */
    public function location()
    {
        return $this->belongsTo(Location::class);
    }
}
