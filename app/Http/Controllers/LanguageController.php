<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Language;


class LanguageController extends Controller
{
    public function manage()
    {
        return view('admin.languages')->with([
            'languages' => Language::all()
        ]);
    }

    public function getStore()
    {
        return view('languages.create');
    }

    public function postStore(Request $request)
    {
        $language = Language::create($request->all());
        if($language)
        {
            return redirect()->back()->with([
                'message'     => 'Your new language entry has been saved',
                'alert_class' => 'success'
            ]);
        } else {
            return redirect()->back()->with([
                'message'     => 'Your new language entry has not been saved',
                'alert_class' => 'danger'
            ]);
        }
    }

    public function getUpdate(Language $language)
    {
        return view('languages.update')->with([
            'language' => $language
        ]);
    }

    public function postUpdate(Request $request, Language $language)
    {
        $language->update($request->all());
        return redirect()->back()->with([
            'message'     => 'Your new language entry has been updated',
            'alert_class' => 'success'
        ]);
    }

    public function delete(Language $language)
    {
        $language->delete();
        return redirect()->back()->with([
            'message'     => 'Your language entry was deleted',
            'alert_class' => 'success'
        ]);
    }
}
