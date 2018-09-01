<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
    	'first_name',
    	'last_name',
    	'phone',
    	'email',
    	'city',
    ];

    public function getFullNameAttribute()
    {
    	return sprintf('%s %s', $this->first_name, $this->last_name);
    }
}
