<?php

namespace App\Http\Controllers;

use App\Models\Local;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LocalController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        if ($request->has('type'))
        {
            $type = $request->type;
        }
        else
        {
            $type = Type::first()->id;
        }

        $content = Local::where('type_id', $type)->get();

        return view('locals', compact('content', 'type'));
    }

    /**
     * @param StoreClient $request
     * @return \Illuminate\Http\Response
     */
    public function productStore(Request $request)
    {
        DB::transaction(function () use ($request) {
            foreach ($request->type as $key => $value)
            {
                if ( ! empty($value))
                {
                    $data = [
                        'entity_id'    => $request->sku[ $key ],
                        'magento_type' => 'PRODUCT',
                        'name'         => $request->name[ $key ],
                        'type_id'      => $request->type[ $key ]
                    ];

                    $local = Local::create($data);
                }
            }
        });

        return redirect()->route('local.index')->withSuccess(trans('messages.create_success', [ 'entity' => 'Products' ]));
    }

    /**
     * @param StoreClient $request
     * @return \Illuminate\Http\Response
     */
    public function categoryStore(Request $request)
    {
        DB::transaction(function () use ($request) {
            foreach ($request->type as $key => $value)
            {
                if ( ! empty($value))
                {
                    $data = [
                        'entity_id'    => $request->id[ $key ],
                        'magento_type' => 'CATEGORY',
                        'name'         => $request->name[ $key ],
                        'type_id'      => $request->type[ $key ]
                    ];

                    $local = Local::create($data);
                }
            }
        });

        return redirect()->route('local.index')->withSuccess(trans('messages.create_success', [ 'entity' => 'Category' ]));
    }

    /**
     * @param StoreClient $request
     * @return \Illuminate\Http\Response
     */
    public function cmsPagesStore(Request $request)
    {
        DB::transaction(function () use ($request) {
            $data = [
                'entity_id'    => $request->url_key,
                'magento_type' => 'CMS_PAGE',
                'name'         => $request->title,
                'type_id'      => $request->type
            ];

            $local = Local::create($data);
        });

        return redirect()->route('local.index')->withSuccess(trans('messages.create_success', [ 'entity' => 'Cms Page' ]));
    }

    /**
     * @param StoreClient $request
     * @return \Illuminate\Http\Response
     */
    public function urlKeysStore(Request $request)
    {
        DB::transaction(function () use ($request) {
            $data = [
                'entity_id'    => $request->url_keys,
                'magento_type' => 'WEB_PAGE',
                'name'         => $request->title,
                'type_id'      => $request->type
            ];

            $local = Local::create($data);
        });

        return redirect()->route('local.index')->withSuccess(trans('messages.create_success', [ 'entity' => 'Url' ]));
    }

    /**
     * @param StoreClient $request
     * @return \Illuminate\Http\Response
     */
    public function searchStore(Request $request)
    {
        DB::transaction(function () use ($request) {
            $data = [
                'entity_id'    => $request->search_filter,
                'magento_type' => 'SEARCH',
                'name'         => $request->title,
                'type_id'      => $request->type
            ];

            $local = Local::create($data);
        });

        return redirect()->route('local.index')->withSuccess(trans('messages.create_success', [ 'entity' => 'Search' ]));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function localUpdate(Request $request)
    {
        $data = [];

        foreach ($request->status as $id => $value)
        {
            DB::transaction(function () use ($request, $id) {
                if (isset($request->position[ $id ]))
                {
                    $data  = [
                        'position' => $request->position[ $id ]
                    ];
                    $local = Local::find($id);
                    $local->update($data);
                }

                if ($request->image[ $id ])
                {
                    $this->uploadRequestImage($request->image[ $id ], $local);
                }
            });
        }

        return redirect()->route('local.index')->withSuccess(trans('messages.update_success', [ 'entity' => 'Local Data' ]));
    }

    /**
     * @param Local $local
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Local $local)
    {
        $local->delete();
        if ($local->image)
        {
            $local->image->deleteImage();
        }

        return back()->withSuccess(trans('messages.delete_success', [ 'entity' => 'Local' ]));
    }
}
