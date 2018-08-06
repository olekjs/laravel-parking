<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;

class ParkingSpacesController extends Controller
{
    public function index()
    {
        return view('admin.parking_space.index');
    }
}
