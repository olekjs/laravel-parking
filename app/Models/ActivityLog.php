<?php

namespace App\Models;

use App\User;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    public $fillable = [
        'user_id',
        'customer_id',
        'action',
        'changes',
        'changed_by',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function customer()
    {
    	return $this->belongsTo(Customer::class);
    }

    public function getFullNameAttribute()
    {
    	if($this->changed_by == 'admin'){
    		return $this->user->name;
    	} else {
    		return sprintf('%s %s', $this->customer->first_name, $this->customer->last_name);
    	}
    }
}
