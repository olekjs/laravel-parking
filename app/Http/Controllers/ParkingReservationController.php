<?php

namespace App\Http\Controllers;

use App\Http\Requests\Reservation\CreateReservationRequest;
use App\Models\Customer;
use App\Models\ParkingModel;
use App\Models\ParkingPrice;
use App\Models\ParkingSpace;
use App\Models\ParkingReservation;

class ParkingReservationController extends Controller
{
    public function index(ParkingModel $model, ParkingSpace $space)
    {
        $customers = Customer::all()->pluck('full_name', 'id')->prepend('-', '');

        return view('admin.parking_reservation.index', [
            'space'     => $space,
            'model'     => $model,
            'customers' => $customers,
        ]);
    }

    public function store(CreateReservationRequest $request, ParkingModel $model, ParkingSpace $space)
    {
        $data                     = $request->only(['customer_id', 'end_reservation_date']);
        $data['parking_space_id'] = $space->id;

        ParkingPrice::where('parking_space_id', $space->id)->increment('reservations', 1);

        if (ParkingReservation::create($data)) {
            return redirect()->route('parking-model-show', $model)->withFlash('Reservation has been successfully set.', 'success', true);
        }
        return back()->withInput()->withFlash('Error setting reservation.', 'danger', true);
    }
}
