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
                                    <button type="submit" class="btn btn-flat btn-primary ink-reaction">search
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
                                class="text-light text-lg">Total Count: <strong></strong></span>
                        </div>
                    </div>
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <button type="submit" class="btn btn-flat btn-success ink-reaction">Submit</button>
                        </tr>
                        <tr>
                            <th width="5%">#</th>
                            <th width="20%">Magento Type</th>
                            <th width="40%">Name</th>
                            <th width="20%">Type</th>
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
                                        {{ ++$key }}
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
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@stop
