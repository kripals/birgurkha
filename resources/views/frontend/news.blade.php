@extends('frontend.partials.main')

@section('title', 'News And Notices')

@section('content')
    <!-- Page Title
    ============================================= -->
    <section id="page-title">
        <div class="container clearfix">
            <h1>News and Notices</h1>
        </div>
    </section><!-- #page-title end -->

    <!-- Content
    ============================================= -->
    <section id="content">
        <div class="content-wrap">

            <div class="container clearfix">
                <div class="row col-mb-50 mb-0">
                    <div class="col-lg-12">
                        <div class="heading-block fancy-title border-bottom-0 title-bottom-border">
                            <h4>News</h4>
                        </div>
                        @foreach ($news as $new)
                        <div class="row">
                            <div class="col-lg-6">
                                <img src="{{ asset($new->images->path) }}">
                            </div>
                            <div class="col-lg-6">
                                <h2>{{ $new->title }}</h2>
                                <p>{{ $new->description }}</p>
                                <small>Published: {{ $new->date }}</small>
                                <br>
                                <a href="{{ url('news', $new->id) }}" class="btn btn-primary">Read More...</a>
                            </div>
                        </div>
                        <hr>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="container clearfix">
                <div class="row col-mb-50 mb-0">
                    <div class="col-lg-12">
                        <div class="heading-block fancy-title border-bottom-0 title-bottom-border">
                            <h4>Notices</h4>
                        </div>
                        @foreach ($notices as $notice)
                            <div class="row">
                                <div class="col-lg-12">
                                    <a href="#">{{ $notice->title }} <small>(Published: {{ $notice->date }})</small></a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="container clearfix">
                <div class="row col-mb-50 mb-0">
                    <div class="col-lg-12">
                        <div class="heading-block fancy-title border-bottom-0 title-bottom-border">
                            <h4>Vacancies</h4>
                        </div>
                        @foreach ($notices as $notice)
                            <div class="row">
                                <div class="col-lg-12">
                                    <a href="#">{{ $notice->title }} <small>(Published: {{ $notice->date }})</small></a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </section>
@stop
