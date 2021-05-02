<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PopupController extends Controller
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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $news = News::whereIn('type', ['POPUP'])->get();
        
        return view('popup.index', compact('news'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('popup.create');
    }

    /**
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::transaction(function () use ($request) {
            $data = [
                'type'            => 'POPUP'
            ];
            
            $news = News::create($data);

            if (isset($request->image)) {
                $this->uploadRequestImage($request->image, $news);
            }
        });

        return redirect()->route('popup.popup')->withSuccess(trans('messages.create_success', ['entity' => 'popup']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param news $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        return view('popup.edit', compact('news'));
    }

    /**
     * @param Request $request
     * @param news    $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        DB::transaction(function () use ($request, $news) {
            $data = [
                'type'            => 'POPUP'
            ];

            if (isset($request->image)) {
                $this->uploadRequestImage($request->image, $news);
            }

            $news->update($data);
        });

        return redirect()->route('popup.popup')->withSuccess(trans('messages.update_success', ['entity' => 'popup']));
    }

    /**
     * @param news $news
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(News $news)
    {
        $news->delete();

        return back()->withSuccess(trans('messages.delete_success', ['entity' => 'popup']));
    }
}
