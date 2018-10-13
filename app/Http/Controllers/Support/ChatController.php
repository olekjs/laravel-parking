<?php

namespace App\Http\Controllers\Support;

use App\Models\Support\Chat;
use App\Http\Controllers\Controller;

class ChatController extends Controller
{
    public function index()
    {
        return view('admin.support.chat.index',[
        	'conversations' => Chat::all(),
        ]);
    }
}
