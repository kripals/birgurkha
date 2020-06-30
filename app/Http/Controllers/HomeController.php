<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('dashboard');
    }

    /**
     * @return Factory|View
     */
    public function products()
    {
        return view('products');
    }

    /**
     * @return Factory|View
     */
    public function categories()
    {
        return view('categories');
    }

    /**
     * @return Factory|View
     */
    public function cmsPages()
    {
        return view('cmsPages');
    }

    /**
     * @return Factory|View
     */
    public function urlKeys()
    {
        return view('url_key');
    }
}
