@extends('layouts.app')

@section('title', 'Add Inner Lainding Page')

@section('content')
    <section>
        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    <h3>Inner Landing Page</h3>
                    <div class="col-sm-2">
                        <!-- BEGIN SEARCH RESULTS LIST -->
                        <div class="margin-bottom-xxl">
                            <span
                                class="text-light text-lg">Total Count: <strong>{{ isset($landingPage) ? $landingPage->count() : 0 }}</strong></span>
                        </div>
                    </div>
                    {{ Form::open(['route' =>'landingPage.inner.landing.store','class'=>'form form-validate', 'novalidate']) }}
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <button type="submit" class="btn btn-success ink-reaction">Submit</button>
                        </tr>
                        <tr>
                            <th width="5%">#</th>
                            <th width="20%">Landing Page</th>
                            <th width="20%" class="text-center">Send To Landing page</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(empty($landingPage))
                            <tr>
                                <td class="text-center" colspan="5">No data available.</td>
                            </tr>
                        @else
                            @foreach($landingPage as $key => $item)
                                <tr>
                                    <td>
                                        {{ ++$key }}
                                    </td>
                                    <td>
                                        {{ $item['name'] }}
                                        {{ Form::text('id['. $key. ']', $item['id'] , ['hidden']) }}
                                        {{ Form::text('name['. $key. ']', $item['name'] , ['hidden']) }}
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
            </div>
        </div>
    </section>
@stop
