<?php

namespace App\Models;

use App\User;
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
}
