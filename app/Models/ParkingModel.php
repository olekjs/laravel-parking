<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ParkingModel extends Model
{
    protected $fillable = [
        'levels',
        'space_one',
        'space_two',
        'space_third',
        'space_four',
        'space_five',
        'space_six',
        'city',
        'address_number',
        'phone',
        'email',
    ];
}
