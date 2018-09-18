<?php

namespace App\Models;

use App\Models\ParkingModel;
use App\Models\ParkingPrice;
use App\Models\ParkingReservation;
use Illuminate\Database\Eloquent\Model;

class ParkingSpace extends Model
{
    protected $fillable = [
        'level_id',
        'level',
        'spaces',
    ];

    public function model()
    {
        return ParkingModel::where('level_id', $this->level_id)->first();
    }

    public function price()
    {
        return $this->hasOne(ParkingPrice::class);
    }

    public function getReservationsAttribute()
    {
        $reservations = ParkingReservation::where('parking_space_id', $this->id)->get();

        return $reservations->count();
    }
}
