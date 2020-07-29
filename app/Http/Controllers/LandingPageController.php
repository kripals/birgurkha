<?php

namespace App\Http\Controllers;

use App\Models\LandingPage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LandingPageController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $landingPages = LandingPage::all();

        return view('landing_page.index', compact('landingPages'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('landing_page.create');
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
                'section'             => $request->section,
                'name'                => $request->name,
                'visible'             => $request->visible,
                'position'            => $request->position,
                'landing_page'        => $request->landing_page,
                'start_date'          => $request->start_date,
                'end_date'            => $request->end_date,
                'add_on_words'        => $request->add_on_words,
                'before_start_phrase' => $request->before_start_phrase,
                'view_all_buttons'    => $request->view_all_buttons,
                'background_color'    => $request->background_color,
            ];

            $landingPage = LandingPage::create($data);

            if ($request->image)
            {
                $this->uploadRequestImage($request->image, $landingPage);
            }
        });

        return redirect()->route('landing_page.index')->withSuccess(trans('messages.create_success', [ 'entity' => 'Landing Page' ]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param LandingPage $landingPage
     * @return \Illuminate\Http\Response
     */
    public function edit(LandingPage $landingPage)
    {
        return view('landing_page.edit', compact('landingPage'));
    }

    /**
     * @param Request $request
     * @param landing_page $landingPage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LandingPage $landingPage)
    {
        DB::transaction(function () use ($request, $landingPage) {
            $data = [
                'section'             => $request->section,
                'name'                => $request->name,
                'visible'             => $request->visible,
                'position'            => $request->position,
                'landing_page'        => $request->landing_page,
                'start_date'          => $request->start_date,
                'end_date'            => $request->end_date,
                'add_on_words'        => $request->add_on_words,
                'before_start_phrase' => $request->before_start_phrase,
                'view_all_buttons'    => $request->view_all_buttons,
                'background_color'    => $request->background_color,
            ];

            if ($request->image)
            {
                $this->uploadRequestImage($request->image, $landingPage);
            }

            $landingPage->update($data);
        });

        return redirect()->route('landing_page.index')->withSuccess(trans('messages.update_success', [ 'entity' => 'LandingPage' ]));
    }

    /**
     * @param LandingPage $landingPage
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(LandingPage $landingPage)
    {
        $landingPage->delete();

        return back()->withSuccess(trans('messages.delete_success', [ 'entity' => 'LandingPage' ]));
    }

}
