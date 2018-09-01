<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ParkingPrice extends Model
{
    protected $fillable = [
    	'level_id',
    	'parking_space_id',
    	'reservations',
    	'price',
    ];
}
