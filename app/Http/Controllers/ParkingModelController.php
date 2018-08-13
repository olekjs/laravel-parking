<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ParkingModel;
use Illuminate\Http\Request;
use App\Http\Requests\ParkingModelRequest;

class ParkingModelController extends Controller
{

    public function index()
    {
        $levels = ['1', '2', '3', '4', '5', '6'];

        return view('admin.parking_model.index', [
            'levels' => $levels,
        ]);
    }

    public function create(ParkingModelRequest $request)
    {
        $data = $request->all();

        ParkingModel::create($data);
    }
}
