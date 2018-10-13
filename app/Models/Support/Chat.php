<?php

namespace App\Models\Support;

use Illuminate\Database\Eloquent\Model;
use App\Models\Support\Conversation;

class Chat extends Model
{
    protected $fillable = [
    	'conversation_id',
    	'title',
        'email',
    	'category',
    	'status',
    ];

    public function messages()
    {
    	return SupportChat::where('conversation_id', $this->conversation_id)->get();
    }
}
