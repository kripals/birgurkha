@extends('layouts.app')

@section('title', 'Locals')

@section('content')
    <section class="no-y-padding">
        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    {{ Form::open(['route' =>'local.index', 'class'=>'form form-validate', 'role'=>'form', 'files'=>true, 'novalidate']) }}
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                {{ Form::select('type', config('website.local_types'), $type, ['class' => 'form-control', 'required']) }}
                                {{ Form::label('value', 'Type') }}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="card-actionbar">
                                <div class="card-actionbar-row">
                                    <button type="submit" class="btn btn-primary ink-reaction">search
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    <h3>MOBILE {{ $type }}</h3>
                    <div class="col-sm-2">
                        <!-- BEGIN SEARCH RESULTS LIST -->
                        <div class="margin-bottom-xxl">
                            <span
                                class="text-light text-lg">Total Count: <strong>{{ $content->count() }}</strong></span>
                        </div>
                    </div>
                    {{ Form::open(['route' =>'local.update','class'=>'form form-validate', 'novalidate', 'role'=>'form', 'files'=>true]) }}
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <button type="submit" class="btn btn-primary-dark ink-reaction">Submit</button>
                        </tr>
                        <tr>
                            <th width="5%">#</th>
                            <th width="20%">Magento Type</th>
                            <th width="40%">Name</th>
                            <th width="20%">Type</th>
                            <th width="20%">Position</th>
                            <th width="20%">Image</th>
                            <th width="20%">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(empty($content))
                            <tr>
                                <td class="text-center" colspan="5">No data available.</td>
                            </tr>
                        @else
                            @foreach($content as $key => $item)
                                <tr>
                                    <td>
                                        <div class="checkbox checkbox-inline checkbox-styled">
                                            <label>
                                                {{ Form::checkbox('status[' . $item->id . ']', 1, old('status')) }}
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        {{ $item->magento_type }}
                                    </td>
                                    <td>
                                        {{ $item->name }}
                                    </td>
                                    <td>
                                        {{ $item->type }}
                                    </td>
                                    <td>
                                        {{ Form::text('position[' . $item->id . ']', $item->position ?: '0', ['class' => 'form-control', 'required']) }}
                                    </td>
                                    <td>
                                        @if(isset($item->image))
                                            <img src="{{ asset($item->image->path) }}"
                                                 class="preview" width="150">
                                        @else
                                            <img src="{{ asset(config('paths.placeholder.default')) }}"
                                                 data-src="{{ asset(config('paths.placeholder.default')) }}"
                                                 class="preview" height="150" width="150">
                                        @endif
                                        {{ Form::file('image[' . $item->id . ']', ['class' => 'image-input', 'accept' => 'image/*', 'data-msg' => trans('validation.mimes', ['attribute' => 'avatar', 'values' => 'png, jpeg'])]) }}
                                    </td>
                                    <td>
                                        <a role="button" href="javascript:void(0);"
                                           data-url="{{ route('local.destroy', $item->id) }}"
                                           class="btn btn-primary btn-flat btn-xs item-delete">
                                            Delete
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </section>
@stop
