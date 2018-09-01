<?php

namespace App\Http\Controllers;

use App\Models\ParkingModel;
use App\Models\ParkingPrice;
use App\Models\ParkingSpace;
use Illuminate\Http\Request;

class ParkingPriceController extends Controller
{
    public function index(ParkingModel $model, ParkingSpace $space)
    {
        return view('admin.parking_price.index', [
            'model' => $model,
            'space' => $space,
        ]);
    }

    public function store(Request $request, ParkingModel $model, ParkingSpace $space)
    {
        $data                     = $request->only('price');
        $data['level_id']         = $model->level_id;
        $data['parking_space_id'] = $space->id;

        if (ParkingPrice::create($data)) {
            return redirect()->route('parking-model-show', $model)->withFlash('Price has been successfully set.', 'success', true);
        }
        return back()->withInput()->withFlash('Error setting price.', 'danger', true);
    }

    public function edit(ParkingModel $model, ParkingSpace $space, ParkingPrice $price)
    {
        return view('admin.parking_price.edit', [
            'model' => $model,
            'space' => $space,
            'price' => $price,
        ]);
    }

    public function update(Request $request, ParkingModel $model, ParkingSpace $space, ParkingPrice $price)
    {
       $updated = $price->update(
            $request->only(['price'])
        );

        if ($updated) {
            return redirect()->route('parking-model-show', $model)->withFlash('Price has been successfully set.', 'success', true);
        }
        return back()->withInput()->withFlash('Error setting price.', 'danger', true);
    }
}
