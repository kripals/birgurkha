@extends('layouts.app')

@section('title', 'Magento Products')

@push('styles')
    <style>
        /* HIDE RADIO */
        [type=radio] {
            position: absolute;
            opacity: 0;
            width: 0;
            height: 0;
        }

        /* IMAGE STYLES */
        [type=radio] + img {
            cursor: pointer;
        }

        /* CHECKED STYLES */
        [type=radio]:checked + img {
            outline: 10px solid #f00;
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .desc {
            padding: 15px;
            text-align: center;
        }
    </style>
@endpush

@section('content')
    <section class="no-y-padding">
        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    {{ Form::open(['route' =>'products','class'=>'form form-validate','role'=>'form', 'files'=>true, 'novalidate']) }}
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                {{ Form::text('value_name', empty($content) ? '' : isset($content['value_name']) ? $content['value_name'] : '', ['class' => 'form-control']) }}
                                {{ Form::label('value_name', 'Product Name or Sku. Only one.') }}
                            </div>
                        </div>.
                        <div class="col-sm-6">
                            <div class="form-group">
                                {{ Form::textarea('value_sku', empty($content) ? '' : isset($content['value_sku']) ? $content['value_sku'] : '', ['class' => 'form-control', 'cols'=>20, 'rows'=>2]) }}
                                {{ Form::label('value_sku', 'Product Sku (Seperate with comma " , " )') }}
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
                                    <th width="2%">#</th>
                                    <th width="20%">Name</th>
                                    <th width="10%">Sku</th>
                                    <th width="15%">Images</th>
                                    <th width="20%">Send To Homepage</th>
                                    <th width="20%">Send To Landing page</th>
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
                                                @foreach($item['media_gallery'] as $image)
                                                    <div class="dropdown">
                                                        <label>
                                                            <input type="radio" name="image[{{$key}}]" value="{{ $image['url'] }}" class="form-control">

                                                            {{--thumbnail image--}}
                                                            <img src="{{ $image['url'] }}" width="50px" height="50px">

                                                            {{--big image--}}
                                                            <div class="dropdown-content">
                                                                <img src="{{ $image['url'] }}" width="400px">
                                                            </div>
                                                        </label>
                                                    </div>
                                                @endforeach
                                            </td>
                                            <td>
                                                {{ Form::select('type['. $key. ']', typesArray(), old('type'), ['class' => 'form-control', 'required']) }}
                                            </td>
                                            <td>
                                                {{ Form::select('landing['. $key. ']', landingPagesArray(), old('landing'), ['class' => 'form-control', 'required']) }}
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                            {{ Form::close() }}
                        </div>
                    @else
                        @include('partials.aggregation', $content);
                    @endif
                </div>
            </div>
        </section>
    @endif
@stop
