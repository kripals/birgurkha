<?php

namespace App\Http\Controllers;

use App\Models\LandingPage;
use App\Models\LandingPageEntity;
use App\Models\Type;
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
                'visible' => $request->visible,
                'type_id' => $request->type_id
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
                'visible' => $request->visible,
                'type_id' => $request->type_id
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
    public function landingEntity()
    {
        return view('landing_page.entities.form');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function productStore(Request $request)
    {
        DB::transaction(function () use ($request) {
            foreach ($request->landingPage as $key => $value)
            {
                if ( ! empty($value))
                {
                    $data = [
                        'entity_id'       => $request->sku[ $key ],
                        'magento_type'    => 'PRODUCT',
                        'name'            => $request->name[ $key ],
                        'landing_page_id' => $request->landingPage[ $key ],
                        'type_id'         => $request->type[ $key ]
                    ];

                    $landingPage = LandingPageEntity::create($data);
                }
            }
        });

        return redirect()->route('landingPage.index')->withSuccess(trans('messages.create_success', [ 'entity' => 'Products' ]));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function categoryStore(Request $request)
    {
        DB::transaction(function () use ($request) {
            foreach ($request->landingPage as $key => $value)
            {
                if ( ! empty($value))
                {
                    $data = [
                        'entity_id'       => $request->id[ $key ],
                        'magento_type'    => 'CATEGORY',
                        'name'            => $request->name[ $key ],
                        'landing_page_id' => $request->landingPage[ $key ],
                        'type_id'         => $request->type[ $key ]
                    ];

                    $landingPage = LandingPageEntity::create($data);
                }
            }
        });

        return redirect()->route('landingPage.index')->withSuccess(trans('messages.create_success', [ 'entity' => 'Category' ]));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function landingEntityUpdate(Request $request)
    {
        $data = [];

        foreach ($request->status as $id => $value)
        {
            DB::transaction(function () use ($request, $id) {
                if (isset($request->position[ $id ]))
                {
                    $data  = [
                        'position'         => $request->position[ $id ],
                        'description_text' => $request->description_text[ $id ],
                    ];
                    $local = LandingPageEntity::find($id);
                    $local->update($data);
                }

                if (array_key_exists($id, $request->image))
                {
                    $this->uploadRequestImage($request->image[ $id ], $local);
                }
            });
        }

        return redirect()->route('landingPage.index')->withSuccess(trans('messages.update_success', [ 'entity' => 'Local Data' ]));
    }
}
