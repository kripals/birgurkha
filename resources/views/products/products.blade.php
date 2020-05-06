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
                                {{ Form::text('value', old('value'), ['class' => 'form-control', 'required']) }}
                                {{ Form::label('value', 'Product Name') }}
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
                    </form>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    <h3>Magento Products</h3>
                    <div class="col-sm-2">
                        <!-- BEGIN SEARCH RESULTS LIST -->
                        <div class="margin-bottom-xxl">
                            <span
                                class="text-light text-lg">Total Count: <strong>{{ $content->total_count }}</strong></span>
                        </div>
                    </div>
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th width="5%">#</th>
                            <th width="50%">Name</th>
                            <th width="20%">Sku</th>
                            <th width="15%" class="text-right">Actions</th>
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
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->sku }}</td>
                                    <td>{{ $item->sku }}</td>
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
