<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Track;
use Carbon\Carbon;
use Analytics;


class TrackingController extends Controller
{
    public function manage(Request $request)
    {
        $data = Analytics::fetchVisitorsAndPageViews(Period::days(7));
        dd($data);
        
        if($request->input('sort') !== null && Track::getSortParams()->contains($request->input('sort')))
        {
            $sort = $request->input('sort');
        } else {
            $sort = 'date';
        }

        if($sort == 'date')
        {
            $tracks = Track::trackDate();
        } else {
            $tracks = Track::trackPage();
        }

        $totals = Track::total($tracks);

        return view('admin.tracks')->with([
            'sort'   => $sort,
            'tracks' => $tracks,
            'totals' => $totals
        ]);
    }
}
