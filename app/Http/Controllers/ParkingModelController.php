<?php

namespace App\Http\Controllers;

use App\Classes\ActivityLog;
use App\Http\Controllers\Controller;
use App\Http\Requests\ParkingModelRequest;
use App\Models\ParkingModel;
use App\Models\ParkingSpace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ParkingModelController extends Controller
{

    public function index()
    {
        return view('admin.parking_model.index', [
            'parkings' => ParkingModel::all(),
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
            $this->saveLog(Auth::id(), 'created a new parking model', 'admin');
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
            $this->saveLog(Auth::id(), 'removed parking model', 'admin');
            return back()->withFlash('The parking model has been successfully deleted.', 'success', true);
        }
    }

    public function show(ParkingModel $model)
    {
        return view('admin.parking_model.show', [
            'model' => $model,
        ]);
    }

    public function saveLog(int $editor_id, string $action, string $changed_by, array $old_changes = null, array $new_changes = null)
    {
        $activityLog = new ActivityLog();
        $activityLog->createActionLog($editor_id, $action, $changed_by, $old_changes, $new_changes);
    }
}
