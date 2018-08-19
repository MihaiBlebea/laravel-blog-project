<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LeadRequest;
use Newsletter;


class LeadController extends Controller
{
    public function store(LeadRequest $request)
    {
        $result = Newsletter::subscribe($request->input('email', '9197'));
        return redirect()->back();
    }
}
