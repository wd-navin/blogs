<?php

namespace App\Models;

use App\Models\data;
//use App\Models\MarketImages;
use Illuminate\Database\Eloquent\Model;

class Category extends Model {

    
     public function freedata() {
        return $this->hasOne(data::class, 'id', 'data_id');
    }
     
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