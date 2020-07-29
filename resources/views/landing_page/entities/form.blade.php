@extends('layouts.app')

@section('title', 'Landing Page Entities')

@section('content')
    <section>
        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    <h3>{{ $landingPage->title }}</h3>
                    {{ Form::open(['route' =>'local.update','class'=>'form form-validate', 'novalidate', 'role'=>'form', 'files'=>true]) }}
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <td>
                                <button type="submit" class="btn btn-primary-dark ink-reaction">Submit</button>
                            </td>
                        </tr>
                        <tr>
                            <th width="5%">#</th>
                            <th width="10%">Magento Type</th>
                            <th width="15%">Entity Id</th>
                            <th width="5%">Position</th>
                            <th width="20%">Name</th>
                            <th width="20%">Description</th>
                            <th width="20%">Image</th>
                            <th width="20%">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($landingPage->landingPagesEntites->isEmpty())
                            <tr>
                                <td class="text-center" colspan="8">No data available.</td>
                            </tr>
                        @else
                            @foreach($landingPage->landingPagesEntites as $item)
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
                                        {{ $item->entity_id }}
                                    </td>
                                    <td>
                                        {{ Form::text('position[' . $item->id . ']', $item->position ?: '0', ['class' => 'form-control', 'required']) }}
                                    </td>
                                    <td>
                                        {{ $item->name }}
                                    </td>
                                    <td>
                                        {{ Form::text('description_text[' . $item->id . ']', $item->description_text ?: Null, ['class' => 'form-control', 'required']) }}
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
