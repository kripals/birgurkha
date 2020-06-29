@extends('layouts.app')

@section('title', 'Types')

@section('content')
    <section>
        <div class="section-body">
            <div class="card">
                <div class="card-head">
                    <header>Add a type</header>
                    <div class="tools">
                        <a class="btn btn-default" onclick="history.go(-1);return false;">
                            <i class="md md-arrow-back"></i>
                            Back
                        </a>
                    </div>
                </div>
                {{ Form::open(['route' =>'type.store','class'=>'form form-validate','files'=>true,'novalidate']) }}
                    @include('type.partials.form')
                {{ Form::close() }}
            </div><!--end .card -->
        </div>
    </section>
@stop

@push('scripts')
    <script src="{{ asset('js/libs/jquery-validation/dist/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('js/libs/jquery-validation/dist/additional-methods.min.js') }}"></script>
    <script src="{{ asset('js/preview.js') }}"></script>
@endpush
