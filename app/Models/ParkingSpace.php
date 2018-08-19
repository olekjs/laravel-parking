<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ParkingModel;

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
}
