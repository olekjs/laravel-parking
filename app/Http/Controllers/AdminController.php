<?php

namespace App\Http\Controllers;

use App\Models\ParkingReservation;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index', [
            'activeReservations' => $this->getNumberActiveReservations(),
            'earnings'           => $this->getTodayEarnings(),
        ]);
    }

    public function getNumberActiveReservations()
    {
        return $this->reservationWhereQuery('to', '>')->count();
    }

    public function getTodayEarnings()
    {
        $reservations = $this->reservationWhereQuery('created_at', '<>');
        $totality     = 0;

        foreach ($reservations as $reservation) {
            $totality += $reservation->space->price->price;
        }

        return sprintf('%s $', $totality);
    }

    public function reservationWhereQuery(string $column, string $operator)
    {
        return ParkingReservation::where($column, $operator, today())->get();
    }
}
