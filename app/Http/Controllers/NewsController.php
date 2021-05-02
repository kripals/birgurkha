<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
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
        $news = News::whereIn('type', ['NEWS', 'NOTICES', 'VACANCY'])->get();
        
        return view('news.index', compact('news'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('news.create');
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
                'type'            => $request->type,
                'title'           => $request->title,
                'description'     => $request->description,
                'date'            => $request->date
            ];
            
            $news = News::create($data);

            if (isset($request->image)) {
                $this->uploadRequestImage($request->image, $news);
            }

            if (isset($request->file)) {
                $this->uploadRequestFile($request->file, $news);
            }
        });

        return redirect()->route('news.news')->withSuccess(trans('messages.create_success', ['entity' => 'news']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param news $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        return view('news.edit', compact('news'));
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
                'type'            => $request->type,
                'title'           => $request->title,
                'description'     => $request->description,
                'date'            => $request->date
            ];

            if (isset($request->image)) {
                $this->uploadRequestImage($request->image, $news);
            }

            if (isset($request->file)) {
                $this->uploadRequestFile($request->file, $news);
            }

            $news->update($data);
        });

        return redirect()->route('news.news')->withSuccess(trans('messages.update_success', ['entity' => 'news']));
    }

    /**
     * @param news $news
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(News $news)
    {
        $news->delete();

        return back()->withSuccess(trans('messages.delete_success', ['entity' => 'news']));
    }
}
