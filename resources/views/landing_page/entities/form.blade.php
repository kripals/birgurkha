@extends('layouts.app')

@section('title', 'Landing Page Entities')

@section('content')
    <section class="no-y-padding">
        <div class="section-body contain-lg">
            <div class="row">
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            {{ Form::open(['route' =>'categories','class'=>'form form-validate','role'=>'form', 'files'=>true, 'novalidate']) }}
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        {{ Form::text('value', old('value'), ['class' => 'form-control', 'required']) }}
                                        {{ Form::hidden('is_cms', '1') }}
                                        {{ Form::label('value', 'Category Name') }}
                                    </div>
                                </div>
                                <div class="col-sm-6">
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
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            {{ Form::open(['route' =>'products','class'=>'form form-validate','role'=>'form', 'files'=>true, 'novalidate']) }}
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        {{ Form::text('value', old('value'), ['class' => 'form-control', 'required']) }}
                                        {{ Form::hidden('is_cms', '1') }}
                                        {{ Form::label('value', 'Product Name') }}
                                    </div>
                                </div>
                                <div class="col-sm-6">
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
            </div>
        </div>
    </section>
@stop
