<?php

namespace App\Models;

use App\Models\Customer;
use App\Models\ParkingSpace;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ParkingReservation extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'parking_model_id',
        'parking_space_id',
        'customer_id',
        'from',
        'to',
        'end_reservation_date',
    ];

    protected $dates = [
        'deleted_at',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function space()
    {
        return $this->belongsTo(ParkingSpace::class, 'parking_space_id');
    }

    public function parseDay($value)
    {
        return Carbon::createFromFormat('Y-m-d', $value);
    }

    public function getMonths()
    {
        $from = $this->parseDay($this->from);
        $to   = $this->parseDay($this->to);

        return $from->diffInMonths($to);
    }

    public function getAmountToPayAttribute()
    {
        $from = $this->parseDay($this->from);
        $to   = $this->parseDay($this->to);

        $months = $this->getMonths();
        $amount = $this->space->price->price;

        if ($months == 0) {
            return sprintf('%s $', $amount);
        }

        return sprintf('%s $', $months * $amount);
    }

    public function getTotalDaysAttribute()
    {
        $from = $this->parseDay($this->from);
        $to   = $this->parseDay($this->to);

        return $from->diffInDays($to);
    }

    public function getTotalMonthsAttribute()
    {
        return $this->getMonths() == 1 ?: 1;
    }
}
