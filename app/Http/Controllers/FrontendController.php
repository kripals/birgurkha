<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function home()
    {
        return view('frontend.home');
    }

    public function about()
    {
        return view('frontend.about');
    }

    public function bod()
    {
        return view('frontend.bod');
    }

    public function contact()
    {
        return view('frontend.contact');
    }

    public function services()
    {
        return view('frontend.services');
    }

    public function training()
    {
        return view('frontend.training');
    }

    public function news()
    {
        return view('frontend.news');
    }
}
