<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ParkingModelRequest;
use App\Models\ParkingModel;
use App\Models\ParkingSpace;
use Illuminate\Http\Request;

class ParkingModelController extends Controller
{

    public function index()
    {
    	$parkings = ParkingModel::all();
        return view('admin.parking_model.index',[
        	'parkings' => $parkings,
        ]);
    }

    public function create(ParkingModelRequest $request)
    {
        $data             = $request->all();
        $data['level_id'] = $request->input('level_id');
        dd($data);
        if (ParkingModel::create($data)) {
            return back()->withFlash('The parking model has been successfully created.', 'success', true);
        }
        return back()->withInput()->withFlash('Error creating parking model.', 'danger', true);
    }

    public function getParkingLevel(Request $request)
    {
        $data   = $request->only(['values']);
        $unique = $request->input('level_id');

        foreach ($data as $value) {
            for ($i = 0; $i < count($value); $i++) {
                ParkingSpace::create([
                    'level_id' => $unique,
                    'level'    => $value[$i][0],
                    'spaces'   => $value[$i][1],
                ]);
            }
        }
        session(['test' => $data]);

        return response()->json([
            'data' => $data,
        ]);
    }

    public function test()
    {
    	return view('admin.parking_model.create');
    }
}
