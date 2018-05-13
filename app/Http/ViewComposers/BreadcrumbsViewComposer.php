<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use Request;

class BreadcrumbsViewComposer
{
    public function compose(View $view)
    {
        $params = explode('/', Request::path());
        $breadcrumbs = [];
        foreach($params as $index => $param)
        {
            if($index == 0)
            {
                $breadcrumbs[$index]['url'] = '/' . $param;
            } else {
                $breadcrumbs[$index]['url'] = $breadcrumbs[$index - 1]['url'] . '/' . $param;
            }
            $breadcrumbs[$index]['name'] = $param;
        }
        $view->with('breadcrumbs', $breadcrumbs);
    }
}
