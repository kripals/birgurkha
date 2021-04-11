@extends('layouts.app')

@section('title', 'Homepage Sections')

@section('content')
    <section>
        <div class="section-body">
            <div class="card">
                <div class="card-head">
                    <header>Edit Sections</header>
                    <div class="tools">
                        <a class="btn btn-default" onclick="history.go(-1);return false;">
                            <i class="md md-arrow-back"></i>
                            Back
                        </a>
                    </div>
                </div>
                {{ Form::model($type, [
                                'route'=> [ 'types.update' ,$type->id ],
                                'class'=>'form form-validate',
                                'role'=>'form','novalidate',
                                'files'=>true,
                                'method'=>'PUT'
                            ]) }}
                @include('type.partials.form')
                {{ Form::close() }}
            </div>
        </div>
    </section>
@stop

@push('scripts')
    <script src="{{ asset('js/libs/jquery-validation/dist/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('js/libs/jquery-validation/dist/additional-methods.min.js') }}"></script>
    <script src="{{ asset('js/preview.js') }}"></script>
@endpush
