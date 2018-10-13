<?php

namespace App\Http\Controllers\Support;

use App\Http\Controllers\Controller;
use App\Models\Support\Chat;
use App\Models\Support\Conversation;
use Illuminate\Http\Request;

class GuestSupportController extends Controller
{
    public function index()
    {
        return view('support.index');
    }

    public function create()
    {
        return view('support.create');
    }

    public function store(Request $request)
    {
        $data = $request->only([
            'title',
            'category',
            'email',
        ]);

        $data['conversation_id'] = mt_rand(100000, 999999);
        $data['status']          = 'active';

        if ($created = Chat::create($data)) {
            return redirect()->route('support.show', [$created->conversation_id, $created->email]);
        }
        return back()->withInput()->withFlash('Error creating ticket.', 'danger', true);

    }

    public function show($conversation_id)
    {
        return view('support.conversation', [
            'messages'        => Conversation::where('conversation_id', $conversation_id)->get(),
            'conversation_id' => $conversation_id,
        ]);
    }

    public function send(Request $request, $conversation_id)
    {
        $data = $request->only([
            'message',
        ]);

        $data['conversation_id'] = $conversation_id;
        $data['from'] = 'guest';

        if (Conversation::create($data)) {
            return redirect()->back();
        }
        return back()->withInput()->withFlash('Error sending message.', 'danger', true);

    }
}
