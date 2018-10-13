<?php

namespace App\Http\Controllers\Support;

use App\Models\Support\Chat;
use App\Models\Support\Conversation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ConversationController extends Controller
{
    public function index(Chat $conversation)
    {
        return view('admin.support.conversation.index', [
            'messages'     => Conversation::where('conversation_id', $conversation->conversation_id)->get(),
            'conversation' => $conversation,
        ]);
    }

    public function send(Request $request, Chat $conversation)
    {
        $data = $request->only([
            'message',
        ]);

        $data['conversation_id'] = $conversation->conversation_id;
        $data['from'] = 'admin';

        if (Conversation::create($data)) {
            return redirect()->back();
        }
        return back()->withInput()->withFlash('Error sending message.', 'danger', true);
     
    }
}
