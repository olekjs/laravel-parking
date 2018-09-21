<?php

namespace App\Http\Controllers;

use App\Models\ParkingModel;
use App\Models\ParkingPrice;
use App\Models\ParkingSpace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Classes\ActivityLog;

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
            $this->saveLog(Auth::id(), 'set a new parking space price', 'admin');
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
        $this->saveLog(Auth::id(), 'has updated parking space price', 'admin', $request->all(), $price->toArray());

        $updated = $price->update(
            $request->only(['price'])
        );

        if ($updated) {
            return redirect()->route('parking-model-show', $model)->withFlash('Price has been successfully set.', 'success', true);
        }
        return back()->withInput()->withFlash('Error setting price.', 'danger', true);
    }

    public function saveLog(int $editor_id, string $action, string $changed_by, array $old_changes = null, array $new_changes = null)
    {
        $activityLog = new ActivityLog();
        $activityLog->createActionLog($editor_id, $action, $changed_by, $old_changes, $new_changes);
    }
}
