@extends('frontend.partials.main')

@section('title', 'News')

@section('content')
    <!-- Page Title
    ============================================= -->
    <section id="page-title">
        <div class="container clearfix">
            <h1>{{ $news->title }}</h1>
        </div>
    </section><!-- #page-title end -->

    <!-- Content
    ============================================= -->
    <section id="content">
        <div class="content-wrap">
            <div class="container clearfix">
                <div class="row col-mb-50 mb-0">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-12">
                                <img src="{{ asset($news->images->path) }}">
                            </div>
                            <div class="col-lg-6">
                                <small>Published: {{ $news->date }}</small>
                                <p>{{ $news->description }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
