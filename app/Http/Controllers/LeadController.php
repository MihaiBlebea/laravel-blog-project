<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LeadRequest;
use Newsletter;


class LeadController extends Controller
{
    public function store(LeadRequest $request)
    {
        $result = Newsletter::subscribe($request->input('email'));
        $alert_class = ($result !== false) ? 'success' : 'danger';
        return redirect()->back()->with([
            'message'     => 'You have been subscribed to the email list',
            'alert_class' => $alert_class
        ]);
    }
}
