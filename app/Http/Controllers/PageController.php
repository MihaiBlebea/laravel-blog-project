<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Page;

class PageController extends Controller
{
    public function homePage()
    {
        return view('pages.page.home');
    }

    public function pages(String $status = null)
    {
        if($status)
        {
            if($status === 'published')
            {
                $pages = Page::where('published', true)->paginate(10);
            }

            if($status === 'unpublished')
            {
                $pages = Page::where('published', false)->paginate(10);
            }
        } else {
            $pages = Page::paginate(10);
        }
        return view('admin.pages')->with('pages', $pages);
    }

    public function page(String $type, Page $page)
    {
        if(view()->exists($page->view) == false)
        {
            abort(404);
        }
        return view($page->view);
    }

    public function togglePublish(Page $page)
    {
        $page->update([
            'published' => !$page->published
        ]);
        return redirect()->back();
    }
}
