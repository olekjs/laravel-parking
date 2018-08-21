<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ParkingModel extends Model
{
    protected $fillable = [
    	'level_id',
        'city',
        'address_number',
        'phone',
        'email',
        'level_total',
        'spaces_total'
    ];
}
