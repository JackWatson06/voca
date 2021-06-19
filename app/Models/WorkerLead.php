<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WorkerLead extends Model
{

    use HasFactory;

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
        'trade',
        'info'
    ];



    /**
     * A user can be an employee at many different places
     *
     * @return void
     */
    public function documents()
    {
        return $this->morphMany(Document::class, 'documentable');
    }

}