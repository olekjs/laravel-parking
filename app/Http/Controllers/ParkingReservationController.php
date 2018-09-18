<?php

namespace App\Http\Controllers;

use App\Http\Requests\Reservation\CreateReservationRequest;
use App\Http\Requests\Reservation\UpdateReservationRequest;
use App\Models\Customer;
use App\Models\ParkingModel;
use App\Models\ParkingReservation;
use App\Models\ParkingSpace;
use Illuminate\Http\Request;

class ParkingReservationController extends Controller
{
    public function index()
    {
        return view('admin.parking_reservation.index');
    }

    public function store(CreateReservationRequest $request, ParkingModel $model, ParkingSpace $space)
    {
        $data                     = $request->only(['customer_id', 'from', 'to']);
        $data['parking_model_id'] = $model->id;
        $data['parking_space_id'] = $space->id;

        if (ParkingReservation::create($data)) {
            return redirect()->route('parking-model-show', $model)->withFlash('Reservation has been successfully set.', 'success', true);
        }

        return back()->withInput()->withFlash('Error setting reservation.', 'danger', true);
    }

    public function edit(ParkingReservation $reservation)
    {
        return view('admin.parking_reservation.edit', [
            'reservation' => $reservation,
            'customers'   => Customer::all()->pluck('full_name', 'id')->prepend('-'),
        ]);
    }

    public function create(ParkingModel $model, ParkingSpace $space)
    {
        $customers = Customer::all()->pluck('full_name', 'id')->prepend('-', '');

        return view('admin.parking_reservation.create', [
            'space'     => $space,
            'model'     => $model,
            'customers' => $customers,
        ]);
    }

    public function destroy(ParkingReservation $reservation)
    {
        $deleted = $reservation->delete();

        if ($deleted) {
            return back()->withFlash('Reservation has been successfully deleted.', 'success', true);
        }
    }

    public function show(ParkingReservation $reservation)
    {
        return view('admin.parking_reservation.show', [
            'reservation' => $reservation,
        ]);
    }

    public function update(UpdateReservationRequest $request, ParkingReservation $reservation)
    {
        $updated = $reservation->update(
            $request->only(['customer_id', 'from', 'to'])
        );

        if ($updated) {
            return back()->withFlash('Reservation has been successfully update.', 'success', true);
        }

        return back()->withInput()->withFlash('Error updating reservation.', 'danger', true);
    }

    public function getReservations()
    {
        return ParkingReservation::with('customer')->get();
    }

    public function searchReservationsByCustomer(Request $request)
    {
        $data = $request->input('customer');

        return ParkingReservation::whereHas(
            'customer', function ($query) use ($data) {
                $query->where('first_name', 'like', sprintf('%%%s%%', $data));
            })->with('customer')->get();
    }

    public function searchReservationsByDate(Request $request)
    {

        $data = $request->input('date');

        return ParkingReservation::where('from', 'like', sprintf('%%%s%%', $data))
        ->orWhere('to', 'like', sprintf('%%%s%%', $data))
        ->with('customer')->get();
    }
}
