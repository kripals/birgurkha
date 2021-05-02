@extends('layouts.app')

@section('title', 'News and Notices')

@section('content')
    <section>
        <div class="section-body">
            <div class="card">
                <div class="card-head">
                    <header>Edit News and Notices</header>
                    <div class="tools">
                        <a class="btn btn-default" onclick="history.go(-1);return false;">
                            <i class="md md-arrow-back"></i>
                            Back
                        </a>
                    </div>
                </div>
                {{ Form::model($news, [
                                'route'=> [ 'news.update' ,$news->id ],
                                'class'=>'form form-validate',
                                'role'=>'form','novalidate',
                                'files'=>true,
                                'method'=>'PUT'
                            ]) }}
                    @include('news.partials.form')
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
