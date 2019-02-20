<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class data extends Model
{
     protected $fillable = [
        'name',                                        
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
     protected $hidden = [
        'remember_token',
    ];
     
    protected $table = 'data';
}
