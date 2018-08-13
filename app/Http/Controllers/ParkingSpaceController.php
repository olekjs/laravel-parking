<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;

class ParkingSpaceController extends Controller
{
    public function index()
    {
        return view('admin.parking_space.index');
    }
}
