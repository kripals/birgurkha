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
                        'entity_id'    => $request->id[ $key ],
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

        return redirect()->route('local.index')->withSuccess(trans('messages.create_success', [ 'entity' => 'Products' ]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Client $client
     * @return \Illuminate\Http\Response
     */
    //    public function edit(Client $client)
    //    {
    //        return view('client.edit', compact('client'));
    //    }

    /**
     * @param UpdateClient $request
     * @param client $client
     * @return \Illuminate\Http\Response
     */
    //    public function update(UpdateClient $request, Client $client)
    //    {
    //        DB::transaction(function () use ($request, $client)
    //        {
    //            $client->update($request->data());
    //
    //            $this->uploadRequestImage($request, $client);
    //        });
    //
    //        return redirect()->route('client.index')->withSuccess(trans('messages.update_success', ['entity' => 'Client']));
    //    }

    /**
     * @param Client $client
     * @return \Illuminate\Http\Response
     */
    //    public function destroy(Client $client)
    //    {
    //        $client->delete();
    //
    //        return back()->withSuccess(trans('messages.delete_success', ['entity' => 'Client']));
    //    }
}
