<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;

class Track extends Model
{
    protected $fillable = [
        'link',
        'count'
    ];

    private static $sort = ['date', 'page'];

    public static function getSortParams()
    {
        return collect(self::$sort);
    }

    public static function trackDate()
    {
        return Track::orderBy('created_at', 'desc')->get()->groupBy(function($date) {
            return Carbon::parse($date->created_at)->format('d-M-Y');
        });
    }

    public static function trackPage()
    {
        return Track::orderBy('created_at', 'desc')->get()->groupBy('link');
    }

    public static function total(Collection $tracks)
    {
        $totals = collect([]);
        foreach($tracks as $index => $track)
        {
            $total = $track->reduce(function($sum, $item) {
                return $sum + $item->count;
            });
            $totals[$index] = $total;
        }
        return $totals;
    }

    public function findLink($link)
    {
        return $this->where('link', $link)->first();
    }
}
