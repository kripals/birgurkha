<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TypeController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $types = Type::all();

        return view('type.index', compact('types'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('type.create');
    }

    /**
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::transaction(function () use ($request)
        {
            $data = [
                'name' => $request->name
            ];

            $type = Type::create($data);
        });

        return redirect()->route('type.index')->withSuccess(trans('messages.create_success', [ 'entity' => 'Type' ]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Type $type
     * @return \Illuminate\Http\Response
     */
    public function edit(Type $type)
    {
        return view('type.edit', compact('type'));
    }

    /**
     * @param Request $request
     * @param type $type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Type $type)
    {
        DB::transaction(function () use ($request, $type)
        {
            $data = [
                'name' => $request->name
            ];

            $type->update($data);
        });

        return redirect()->route('type.index')->withSuccess(trans('messages.update_success', ['entity' => 'Type']));
    }

    /**
     * @param Type $type
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Type $type)
    {
        $type->delete();

        return back()->withSuccess(trans('messages.delete_success', ['entity' => 'Type']));
    }


}
