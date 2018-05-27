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
        return redirect()->back();
    }
}
