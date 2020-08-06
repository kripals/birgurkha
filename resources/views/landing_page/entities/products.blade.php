@extends('layouts.app')

@section('title', 'Magento Products for CMS Page')

@section('content')
    <section class="no-y-padding">
        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    {{ Form::open(['route' =>'products','class'=>'form form-validate','role'=>'form', 'files'=>true, 'novalidate']) }}
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                {{ Form::text('value', old('value'), ['class' => 'form-control', 'required']) }}
                                {{ Form::label('value', 'Product Name') }}
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
                    <h3>Magento Products for CMS page</h3>
                    <div class="col-sm-2">
                        <!-- BEGIN SEARCH RESULTS LIST -->
                        <div class="margin-bottom-xxl">
                            <span
                                class="text-light text-lg">Total Count: <strong>{{ isset($content) ? $content->total_count : 0 }}</strong></span>
                        </div>
                    </div>
                    {{ Form::open(['route' =>'landingPage.store.product','class'=>'form form-validate', 'novalidate']) }}
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <button type="submit" class="btn btn-success ink-reaction">Submit</button>
                        </tr>
                        <tr>
                            <th width="5%">#</th>
                            <th width="50%">Name</th>
                            <th width="20%">Sku</th>
                            <th width="30%" class="text-right">For Addition In Landing Pages</th>
                            <th width="30%" class="text-right">Section of the Page</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(empty($content))
                            <tr>
                                <td class="text-center" colspan="5">No data available.</td>
                            </tr>
                        @else
                            @foreach($content->items as $key => $item)
                                <tr>
                                    <td>
                                        {{ ++$key }}
                                    </td>
                                    <td>
                                        {{ $item->name }}
                                        {{ Form::text('name['. $key. ']', $item->name , ['hidden']) }}
                                        {{ Form::text('id['. $key. ']', $item->id , ['hidden']) }}
                                    </td>
                                    <td>
                                        {{ $item->sku }}
                                        {{ Form::text('sku['. $key. ']', $item->sku , ['hidden']) }}
                                    </td>
                                    <td>
                                        {{ Form::select('landingPage['. $key. ']', landingPagesArray(),
                                        old('landingPage'), ['class' => 'form-control', 'required']) }}
                                    </td>
                                    <td>
                                        {{ Form::select('type['. $key. ']', typesArray(),
                                        old('type'), ['class' => 'form-control select2-list', 'required']) }}
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
