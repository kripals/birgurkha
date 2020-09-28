@extends('layouts.app')

@section('title', 'Landing Page Entities')

@section('content')
    <section class="no-y-padding">
        <div class="section-body contain-lg">
            <div class="row">
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h3>Magento Category</h3>
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
                            <h3>Magento Products</h3>
                            {{ Form::open(['route' =>'products','class'=>'form form-validate','role'=>'form', 'files'=>true, 'novalidate']) }}
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        {{ Form::text('value', old('value'), ['class' => 'form-control', 'required']) }}
                                        {{ Form::hidden('is_cms', '1') }}
                                        {{ Form::label('value', 'Product Name') }}
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="card-actionbar">
                                        <div class="card-actionbar-row">
                                            <button name="search_products" value="1" type="submit"
                                                    class="btn btn-primary ink-reaction">search products
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="card-actionbar">
                                        <div class="card-actionbar-row">
                                            <button name="search_aggregation" value="1" type="submit"
                                                    class="btn btn-primary ink-reaction">search aggregations
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    {{ Form::open([ 'route' =>'landingPage.store.default', 'class'=>'form form-validate', 'novalidate' ]) }}
                    <div class="card">
                        <div class="card-body">
                            <h3>Magento Default</h3>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        {{ Form::text('name', old('name'), ['class' => 'form-control', 'required']) }}
                                        {{ Form::label('name', 'Name') }}
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
                                        {{ Form::label('type', 'Section of the Page') }}
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        {{ Form::select('landingPage', landingPagesArray(), old('landingPage'), ['class' => 'form-control', 'required']) }}
                                        {{ Form::label('type', 'Landing Page') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-actionbar">
                            <div class="card-actionbar-row">
                                <button type="submit" class="btn btn-primary ink-reaction">Submit</button>
                            </div>
                        </div>
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </section>
@stop
