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
        return view('admin.parking_model.index', [
            'parkings' => $parkings,
        ]);
    }

    public function store(ParkingModelRequest $request)
    {
        $data = $request->only([
            'level_val',
            'level_total',
            'spaces_total',
            'city',
            'address_number',
            'phone',
            'email',
            'level',
        ]);

        $data['level_id'] = $request->input('level_id');

        if (ParkingModel::create($data)) {
            return redirect()->route('parking-model')->withFlash('The parking model has been successfully created.', 'success', true);
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

        return response()->json([
            'data' => $data,
        ]);
    }

    public function create()
    {
        return view('admin.parking_model.create');
    }

    public function edit(ParkingModel $model)
    {
        return view('admin.parking_model.update', [
            'model' => $model,
        ]);
    }

    public function destroy(ParkingModel $model)
    {
        $deleted = $model->delete();

        if ($deleted) {
            return back()->withFlash('The parking model has been successfully deleted.', 'success', true);
        }
    }

    public function show(ParkingModel $model)
    {
        return view('admin.parking_model.show', [
            'model' => $model,
        ]);
    }
}
