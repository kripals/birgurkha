@extends('layouts.app')

@section('title', 'Url Link')

@section('content')
    <section class="no-y-padding">
        <div class="section-body">
            {{ Form::open([ 'route' =>'local.store.urlKeys', 'class'=>'form form-validate', 'novalidate' ]) }}
            <div class="card">
                <div class="card-body">
                    <h3>Magento Page Url Key</h3>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                {{ Form::text('url_keys', old('url_keys'), ['class' => 'form-control', 'required']) }}
                                {{ Form::label('url_keys', 'Page Url') }}
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                {{ Form::text('title', old('title'), ['class' => 'form-control', 'required']) }}
                                {{ Form::label('title', 'Title') }}
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                {{ Form::select('type', typesArray(), old('type'), ['class' => 'form-control select2-list', 'required']) }}
                                {{ Form::label('type', 'Home Section') }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-actionbar">
                    <div class="card-actionbar-row">
                        <button type="reset" class="btn btn-flat ink-reaction">Reset</button>
                        <button type="submit" class="btn btn-primary ink-reaction">Submit</button>
                    </div>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </section>
@stop
