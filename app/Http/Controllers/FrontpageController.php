<?php

namespace App\Http\Controllers;

class FrontpageController extends Controller
{
    public function home()
    {
        return view('front_page.front_page');
    }
}
