<?php

namespace App\Models;

use App\Models\Category;
use App\Models\DonationImages;
use Illuminate\Database\Eloquent\Model;

class Donations extends Model {

    public function category() {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }
    public function images() {
        return $this->hasMany(DonationImages::class, 'donation_id', 'id');
    }
    
    

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