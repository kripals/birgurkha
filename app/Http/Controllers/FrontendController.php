<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class FrontendController extends Controller
{    
    /**
     * home
     *
     * @return void
     */
    public function home()
    {
        $popups = News::where('type', 'POPUP')->get();
        $sliders = News::where('type', 'SLIDER')->get();

        return view('frontend.home', compact('popups', 'sliders'));
    }
    
    /**
     * about
     *
     * @return void
     */
    public function about()
    {
        return view('frontend.about');
    }
    
    /**
     * bod
     *
     * @return void
     */
    public function bod()
    {
        return view('frontend.bod');
    }
    
    /**
     * contact
     *
     * @return void
     */
    public function contact()
    {
        return view('frontend.contact');
    }
    
    /**
     * services
     *
     * @return void
     */
    public function services()
    {
        return view('frontend.services');
    }
    
    /**
     * training
     *
     * @return void
     */
    public function training()
    {
        return view('frontend.training');
    }
    
    /**
     * news
     *
     * @return void
     */
    public function news()
    {
        $news = News::where('type', 'NEWS')->get();
        $notices = News::where('type', 'NOTICES')->get();
        $vacancies = News::where('type', 'VACANCY')->get();

        return view('frontend.news', compact('news', 'notices', 'vacancies'));
    }
    
    /**
     * newsSingle
     *
     * @param  mixed $news
     * @return void
     */
    public function newsSingle(News $news)
    {
        return view('frontend.new-single', compact('news'));
    }
}
