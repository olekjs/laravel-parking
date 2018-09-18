<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ParkingSpace;
use App\Models\ParkingReservation;

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

    public function spaces()
    {
    	return ParkingSpace::where('level_id', $this->level_id)->get();
    }

    public function reservations()
    {
        return $this->hasMany(ParkingReservation::class);
    }

    public function getFullAdressAttribute()
    {
        return sprintf('%s %s', $this->city, $this->address_number);
    }
}
