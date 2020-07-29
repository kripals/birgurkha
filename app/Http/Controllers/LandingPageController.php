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
        $landingPage = LandingPage::all();

        return view('landing_page.index', compact('landingPage'));
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
                'title'   => $request->title,
                'urlkey'  => $request->urlkey,
                'visible' => $request->visible
            ];

            $landingPage = LandingPage::create($data);

            if ($request->image)
            {
                $this->uploadRequestImage($request->image, $landingPage);
            }
        });

        return redirect()->route('landingPage.index')->withSuccess(trans('messages.create_success', [ 'entity' => 'Landing Page' ]));
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
                'title'   => $request->title,
                'urlkey'  => $request->urlkey,
                'visible' => $request->visible
            ];


            if ($request->image)
            {
                $this->uploadRequestImage($request->image, $landingPage);
            }

            $landingPage->update($data);
        });

        return redirect()->route('landingPage.index')->withSuccess(trans('messages.update_success', [ 'entity' => 'LandingPage' ]));
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

    /**
     * @param LandingPage $landingPage
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function landingEntity(LandingPage $landingPage)
    {
        return view('landing_page.entities.form', compact('landingPage'));
    }

    public function landingEntityCreate()
    {

    }
}
