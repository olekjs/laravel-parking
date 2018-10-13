<?php

namespace App\Models\Support;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    protected $fillable = [
        'conversation_id',
        'from',
        'status',
        'message',
    ];
}
