<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'hash_name',
        'type',
        'document_usage_id'
    ];



    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        // 'hash_name',
    ];


        
    /**
     * A user can have many documents.
     *
     * @return void
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }


        
    /**
     * A document can be associated with a user, or a workerLead.
     *
     * @return void
     */
    public function documentable()
    {
        return $this->morphTo();
    }

}
