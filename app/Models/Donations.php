<?php

namespace App\Models;

use App\Models\Category;
//use App\Models\MarketImages;
use Illuminate\Database\Eloquent\Model;

class Donations extends Model {

    public function category() {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }
////    
//     public function marketimages() {
//        return $this->hasMany(MarketImages::class, 'market_id', 'id');
//    }

    protected $fillable = [
        'user_id ',
        'category_id',
        'city',
        'state',
             
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
     protected $hidden = [
        'remember_token',
    ];
     
    protected $table = 'donations';

}