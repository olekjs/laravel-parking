<?php

namespace App\Http\Controllers;

use App\Models\ParkingReservation;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index', [
            'activeReservations' => $this->getNumberActiveReservations(),
            'earnings'           => $this->getMonthEarnings(),
            'dates'              => $this->getChartDates(),
            'reservations'       => $this->getReservations(),
        ]);
    }

    public function getNumberActiveReservations()
    {
        return $this->reservationWhereQuery('to', '>')->count();
    }

    public function getMonthEarnings()
    {
        $today        = Carbon::now()->toDateTimeString();
        $monthLater   = Carbon::now()->subMonth()->toDateTimeString();
        $reservations = ParkingReservation::whereBetween('created_at', [$monthLater, $today])->get();

        $totality = 0;

        foreach ($reservations as $reservation) {
            $totality += $reservation->space->price->price;
        }

        return sprintf('%s $', $totality);
    }

    public function reservationWhereQuery(string $column, string $operator, $day = null)
    {
        if (is_null($day)) {
            $day = today();
        }

        return ParkingReservation::where($column, $operator, $day)->get();
    }

    public function getChartDates()
    {
        $today = Carbon::today();

        $dates = [
            'today'           => $today->format('Y-m-d'),
            'yesterday'       => $today->subDay()->format('Y-m-d'),
            'beforeYesterday' => $today->subDays(1)->format('Y-m-d'),
        ];

        return $dates;
    }

    public function getReservations()
    {
        $today = Carbon::today();

        $reservations = [
            'today'           => ParkingReservation::whereDate('created_at', $today->format('Y-m-d'))->get()->count(),
            'yesterday'       => ParkingReservation::whereDate('created_at', $today->subDay()->format('Y-m-d'))->get()->count(),
            'beforeYesterday' => ParkingReservation::whereDate('created_at', $today->subDays(1)->format('Y-m-d'))->get()->count(),

        ];

        return $reservations;
    }
}
