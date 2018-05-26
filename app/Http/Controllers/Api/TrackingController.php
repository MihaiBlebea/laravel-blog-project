<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Track;

class TrackingController extends Controller
{
    // Tracking chart functions
    public function getTrackingData(Request $request)
    {
        if($request->input('sort') == 'date')
        {
            $total = Track::total(Track::trackDate());
        } else {
            $total = Track::total(Track::trackPage());
        }
        return $total->sortBy(function($item, $key) {
            return $key;
        });
    }
}
