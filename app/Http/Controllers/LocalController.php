<?php

namespace App\Http\Controllers;

use App\Models\Local;
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
            $type = 'SLIDER';
        }
        $content = Local::where('type', $type)->get();

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
                        'type'         => $request->type[ $key ]
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
                        'type'         => $request->type[ $key ]
                    ];

                    $local = Local::create($data);
                }
            }
        });

        return redirect()->route('local.index')->withSuccess(trans('messages.create_success', [ 'entity' => 'Category' ]));
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
