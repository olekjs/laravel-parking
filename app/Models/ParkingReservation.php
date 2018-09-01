<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ParkingReservation extends Model
{
    protected $fillable = [
    	'parking_space_id',
    	'customer_id',
    	'end_reservation_date',
    ];
}
