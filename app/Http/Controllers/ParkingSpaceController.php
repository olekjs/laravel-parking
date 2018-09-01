<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Models\ParkingModel;
use App\Models\ParkingSpace;

class ParkingSpaceController extends Controller
{
    public function index()
    {
        $spaces = ParkingSpace::all();

        return view('admin.parking_space.index', [
            'spaces' => $spaces,
        ]);
    }
}
