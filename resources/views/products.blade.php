@extends('layouts.app')

@section('title', 'Magento Products')

@section('content')
    <section class="no-y-padding">
        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    {{ Form::open(['route' =>'products','class'=>'form form-validate','role'=>'form', 'files'=>true, 'novalidate']) }}
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                {{ Form::text('value', empty($content) ? '' : $content['value'], ['class' => 'form-control', 'required']) }}
                                {{ Form::label('value', 'Product Name') }}
                            </div>
                        </div>
                    </div>
                    <div class="row">
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
    </section>

    @if(isset($content))
        <section>
            <div class="section-body">
                <div class="card">
                    @if($content['is_product'])
                        <div class="card-body">
                            <h3>Magento Products</h3>
                            <div class="col-sm-2">
                                <!-- BEGIN SEARCH RESULTS LIST -->
                                <div class="margin-bottom-xxl">
                            <span
                                class="text-light text-lg">Total Count: <strong>{{ isset($content) ? $content['total_count'] : 0 }}</strong></span>
                                </div>
                            </div>
                            {{ Form::open(['route' =>'local.store.product','class'=>'form form-validate','role'=>'form', 'files'=>true, 'novalidate']) }}
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <button type="submit" class="btn btn-success ink-reaction">Submit</button>
                                </tr>
                                <tr>
                                    <th width="5%">#</th>
                                    <th width="50%">Name</th>
                                    <th width="20%">Sku</th>
                                    <th width="20%">Send To</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(empty($content))
                                    <tr>
                                        <td class="text-center" colspan="5">No data available.</td>
                                    </tr>
                                @else
                                    @foreach($content['items'] as $key => $item)
                                        <tr>
                                            <td>
                                                {{ ++$key }}
                                            </td>
                                            <td>
                                                {{ $item['name'] }}
                                                {{ Form::text('name['. $key. ']', $item['name'] , ['hidden']) }}
                                            </td>
                                            <td>
                                                {{ $item['sku'] }}
                                                {{ Form::text('sku['. $key. ']', $item['sku'] , ['hidden']) }}
                                            </td>
                                            <td>
                                                {{ Form::select('type['. $key. ']', typesArray(), old('type'), ['class' => 'form-control', 'required']) }}
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                            {{ Form::close() }}
                        </div>
                    @else
                        <div class="card-body">
                            {{ Form::open(['route' =>'local.store.aggregation','class'=>'form form-validate', 'role'=>'form', 'files'=>true, 'novalidate']) }}
                            <div class="row">
                                <div class="col-md-4">
                                    <b>Aggregation Homepage Section</b>
                                    {{ Form::select('type', typesArray(), old('type'), ['class' => 'form-control', 'required']) }}
                                    </div>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-success ink-reaction">Submit</button>
                                </div>
                            </div>
                            {{ Form::text('agg', json_encode($content['aggregations']), ['hidden']) }}
                            {{ Form::text('product', empty($content) ? '' : $content['value'], ['hidden']) }}
                            @foreach($content['aggregations'] as $key => $value)
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <td colspan="2">
                                        <span
                                            class="text-light text-lg">Label: <strong>{{ $value['label'] }}</strong></span>
                                        </td>
                                    </tr>
                                    </thead>
                                    <tr>
                                        <th width="5%">#</th>
                                        <th width="40%">Label</th>
                                        <th width="40%">Value</th>
                                    </tr>
                                    <tbody>
                                    @foreach($value['options'] as $keys => $values)
                                        <tr>
                                            <td>
                                                {{ ++$keys }}
                                            </td>
                                            <td>
                                                {{ $values['label'] }}
                                            </td>
                                            <td>
                                                {{ $values['value'] }}
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            @endforeach
                            {{ Form::close() }}
                        </div>
                    @endif
                </div>
            </div>
        </section>
    @endif
@stop
