<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ParkingModel;
use App\Models\ParkingPrice;

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
}
