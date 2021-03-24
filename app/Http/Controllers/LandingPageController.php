<?php

namespace App\Http\Controllers;

use App\Models\LandingPage;
use App\Models\LandingPageEntity;
use App\Models\Local;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LandingPageController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $landingPage = Local::where('magento_type', 'LANDING_PAGE')->get();

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
                'entity_id'    => 0,
                'magento_type' => 'LANDING_PAGE',
                'name'         => $request->title,
                'type_id'      => $request->type_id,
                'position'     => $request->visible
            ];

            $landingPage = Local::create($data);

            if ($request->image) {
                $this->uploadRequestImage($request->image, $landingPage);
            }
        });

        return redirect()->route('landingPage.index')->withSuccess(trans('messages.create_success', ['entity' => 'Landing Page']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param LandingPage $landingPage
     * @return \Illuminate\Http\Response
     */
    public function edit(Local $landingPage)
    {
        return view('landing_page.edit', compact('landingPage'));
    }

    /**
     * @param Request      $request
     * @param landing_page $landingPage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Local $landingPage)
    {
        DB::transaction(function () use ($request, $landingPage) {
            $data = [
                'name'         => $request->title,
                'type_id'      => $request->type_id,
                'position'     => $request->visible
            ];

            if ($request->image) {
                $this->uploadRequestImage($request->image, $landingPage);
            }

            $landingPage->update($data);
        });

        return redirect()->route('landingPage.index')->withSuccess(trans('messages.update_success', ['entity' => 'LandingPage']));
    }

    /**
     * @param LandingPage $landingPage
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Local $landingPage)
    {
        $landingPage->delete();

        return back()->withSuccess(trans('messages.delete_success', ['entity' => 'LandingPage']));
    }

    /**
     * @param LandingPageEntity $landingPageEntity
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function entityDestroy(LandingPageEntity $landingPageEntity)
    {
        $landingPageEntity->delete();

        return back()->withSuccess(trans('messages.delete_success', ['entity' => '$landingPageEntity']));
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
            foreach ($request->landingPage as $key => $value) {
                if (!empty($value)) {
                    $data = [
                        'entity_id'       => $request->sku[$key],
                        'magento_type'    => 'PRODUCT',
                        'name'            => $request->name[$key],
                        'landing_page_id' => $request->landingPage[$key],
                        'type_id'         => $request->type[$key]
                    ];

                    $landingPage = LandingPageEntity::create($data);
                }
            }
        });

        return redirect()->route('landingPage.index')->withSuccess(trans('messages.create_success', ['entity' => 'Products']));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function aggregationStore(Request $request)
    {
        $array = [];
        DB::transaction(function () use ($request, $array) {
            foreach ($request->status as $key => $value) {
                $array[]['attribute_code'] = $key;

                $num = 0;
                foreach ($value as $k => $v) {
                    $a[$key][$num]['label'] = $request->label[$key][$k];
                    $a[$key][$num]['value'] = $request->value[$key][$k];
                    $num++;
                }
            }

            foreach ($array as $key => $value) {
                $array[$key]['options'] = $a[$value['attribute_code']];
            }

            $data = [
                'entity_id'       => json_encode($array),
                'magento_type'    => 'GENERIC',
                'name'            => $request->name,
                'landing_page_id' => $request->landingPage,
                'type_id'         => $request->type
            ];

            $landingPage = LandingPageEntity::create($data);
        });

        return redirect()->route('landingPage.index')->withSuccess(trans('messages.create_success', ['entity' => 'Aggregation']));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function categoryStore(Request $request)
    {
        DB::transaction(function () use ($request) {
            foreach ($request->landingPage as $key => $value) {
                if (!empty($value)) {
                    $data = [
                        'entity_id'       => $request->id[$key],
                        'magento_type'    => 'CATEGORY',
                        'name'            => $request->name[$key],
                        'landing_page_id' => $request->landingPage[$key],
                        'type_id'         => $request->type[$key]
                    ];

                    $landingPage = LandingPageEntity::create($data);
                }
            }
        });

        return redirect()->route('landingPage.index')->withSuccess(trans('messages.create_success', ['entity' => 'Category']));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function defaultStore(Request $request)
    {
        DB::transaction(function () use ($request) {
            $data = [
                'landing_page_id' => $request->landingPage,
                'entity_id'       => $request->name,
                'magento_type'    => 'DEFAULT',
                'name'            => $request->title,
                'type_id'         => $request->type
            ];

            $landingPage = LandingPageEntity::create($data);
        });

        return redirect()->route('landingPage.index')->withSuccess(trans('messages.create_success', ['entity' => 'Default']));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function landingEntityUpdate(Request $request)
    {
        $data = [];

        if (!is_null($request->status))
        {
            foreach ($request->status as $id => $value) {
                DB::transaction(function () use ($request, $id) {
                    if (isset($request->position[$id])) {
                        $data  = [
                            'type_id'          => $request->type[$id],
                            'position'         => $request->position[$id],
                            'description_text' => $request->description_text[$id],
                        ];

                        $local = LandingPageEntity::find($id);
                        $local->update($data);
                    }

                    if ($request->image[$id]) {
                        $this->uploadRequestImage($request->image[$id], $local);
                    }
                });
            }
        }

        return redirect()->back()->withSuccess(trans('messages.update_success', ['entity' => 'Local Data']));
    }
}
