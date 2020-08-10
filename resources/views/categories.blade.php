@extends('layouts.app')

@section('title', 'Magento Categories')

@section('content')
    <section class="no-y-padding">
        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    {{ Form::open(['route' =>'categories','class'=>'form form-validate','role'=>'form', 'files'=>true, 'novalidate']) }}
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                {{ Form::text('value', old('value'), ['class' => 'form-control', 'required']) }}
                                {{ Form::label('value', 'Category Name') }}
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
                    </form>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    <h3>Magento Categories</h3>
                    <div class="col-sm-2">
                        <!-- BEGIN SEARCH RESULTS LIST -->
                        <div class="margin-bottom-xxl">
                            <span
                                class="text-light text-lg">Total Count: <strong>{{ isset($content) ? count($content) : 0 }}</strong></span>
                        </div>
                    </div>
                    {{ Form::open(['route' =>'local.store.category','class'=>'form form-validate', 'novalidate']) }}
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <button type="submit" class="btn btn-success ink-reaction">Submit</button>
                        </tr>
                        <tr>
                            <th width="5%">#</th>
                            <th width="20%">Name</th>
                            <th width="20%">Category Level</th>
                            <th width="20%" class="text-right">For Addition In Home Section</th>
                            <th width="20%" class="text-right">For View All Button In Home Section</th>
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
                                        {{ $item['name'] }}
                                        {{ Form::text('name['. $key. ']', $item['name'] , ['hidden']) }}
                                        {{ Form::text('id['. $key. ']', $item['id'] , ['hidden']) }}
                                    </td>
                                    <td>
                                        {{ $item['level'] }}
                                    </td>
                                    <td>
                                        {{ Form::select('type['. $key. ']', typesArray(), old('type'), ['class' => 'form-control', 'required']) }}
                                    </td>
                                    <td>
                                        {{ Form::select('button['. $key. ']', typesArray(), old('button'), ['class' => 'form-control', 'required']) }}
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
