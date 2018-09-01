<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactFormRequest;
use App\Models\Message;

class MessageController extends Controller
{
    public function send(ContactFormRequest $request)
    {
        Message::create($request->all());
        return redirect()->back()->with([
            'message'    => 'Your message has been sent. I will get back to you in maximum 24 hours',
            'alert_class' => 'success'
        ]);
    }

    public function manage()
    {
        $messages = Message::paginate(10);
        return view('admin.messages')->with([
            'messages' => $messages
        ]);
    }

    public function read(Message $message)
    {
        $message->update([ 'read' => 1 ]);
        return view('messages.index')->with([
            'message' => $message
        ]);
    }

    public function delete(Message $message)
    {
        $message->delete();
        return redirect()->back()->with([
            'message'     => 'Message was deleted',
            'alert_class' => 'success'
        ]);
    }
}
