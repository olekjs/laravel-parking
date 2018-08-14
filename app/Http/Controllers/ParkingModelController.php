<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ParkingModelRequest;
use App\Models\ParkingModel;
use Illuminate\Http\Request;

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

        if (ParkingModel::create($data)) {
            return back()->withFlash('The parking model has been successfully created.', 'success', true);
        }
        return back()->withInput()->withFlash('Error creating parking model.', 'danger', true);
    }

    public function test(Request $request)
    {
        $data = collect($request->all());
        
        return response()->json([
            'data' => $data,
        ]);
    }
}
