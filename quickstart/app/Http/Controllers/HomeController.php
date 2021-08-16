<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class HomeController extends Controller
{
    public function changeLanguage($language)
    {
        $language = ($language == 'vi' || $language == 'en') ? $language : config('app.locale');
        Session::put('website_language', $language);

        return redirect()->back();
    }
}
