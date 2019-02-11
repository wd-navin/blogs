<?php

namespace App\Models;

//use App\Models\UsersImages;
//use App\Models\MarketImages;
use Illuminate\Database\Eloquent\Model;

class Category extends Model {

   

    protected $fillable = [
        'product_name',
              
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $table = 'category';

}