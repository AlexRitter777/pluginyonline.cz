<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;

class MessageController extends Controller
{
    public function index(){

        $messages = Message::orderBy('created_at', 'desc')->paginate(10);

        return view('admin.messages.index', ['messages' => $messages]);
    }

    public function show(Message $message){

        return view('admin.messages.show', ['message' => $message]);

    }

    public function destroy(Message $message){
        $message->delete();
        return redirect()->route('admin.messages.index')->with('success', 'Message was deleted.');
    }
}
