<?php

namespace App\Models;

use App\Models\Donations;

use Illuminate\Database\Eloquent\Model;

class DonationImages extends Model {

   

    protected $fillable = [
        'donation_id',
        'image',      
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $table = 'images';

}