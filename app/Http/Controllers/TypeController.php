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
        DB::transaction(function () use ($request) {
            $data = [
                'section'          => $request->section,
                'name'             => $request->name,
                'visible'          => $request->visible,
                'position'         => $request->position,
                'type'             => $request->type,
                'start_date'       => $request->start_date,
                'end_date'         => $request->end_date,
                'add_on_words'     => $request->add_on_words,
                'view_all_buttons' => $request->view_all_buttons,
                'background_color' => $request->background_color,
            ];

            $type = Type::create($data);

            if ($request->image)
            {
                $this->uploadRequestImage($request->image, $type);
            }
        });

        return redirect()->route('types.index')->withSuccess(trans('messages.create_success', [ 'entity' => 'Type' ]));
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
        DB::transaction(function () use ($request, $type) {
            $data = [
                'section'          => $request->section,
                'name'             => $request->name,
                'visible'          => $request->visible,
                'position'         => $request->position,
                'type'             => $request->type,
                'start_date'       => $request->start_date,
                'end_date'         => $request->end_date,
                'add_on_words'     => $request->add_on_words,
                'view_all_buttons' => $request->view_all_buttons,
                'background_color' => $request->background_color,
            ];

            if ($request->image)
            {
                $this->uploadRequestImage($request->image, $type);
            }

            $type->update($data);
        });

        return redirect()->route('types.index')->withSuccess(trans('messages.update_success', [ 'entity' => 'Type' ]));
    }

    /**
     * @param Type $type
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Type $type)
    {
        $type->delete();

        return back()->withSuccess(trans('messages.delete_success', [ 'entity' => 'Type' ]));
    }
}
