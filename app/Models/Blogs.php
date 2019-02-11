<?php

namespace App\Models;

//use App\Models\UsersImages;
//use App\Models\MarketImages;
use Illuminate\Database\Eloquent\Model;

class Blogs extends Model {

   

    protected $fillable = [
        'user_id',
        'title',
        'description',
              
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $table = 'blogs';

}