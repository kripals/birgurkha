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
                        <div class="row">
                            <div class="col-lg-6">
                                <img src="{{ asset('frontend/images/slider/IMG_2426.jpg') }}">
                            </div>
                            <div class="col-lg-6">
                                <h2>Header</h2>
                                <p>Paragraph here</p>
                                <small>Published: 2021-01-01</small>
                                <br>
                                <a href="#" class="btn btn-primary">Read More...</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container clearfix">
                <div class="row col-mb-50 mb-0">
                    <div class="col-lg-12">
                        <div class="heading-block fancy-title border-bottom-0 title-bottom-border">
                            <h4>Notices</h4>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <a href="#">Notices <small>(Published: 2021-01-01)</small></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container clearfix">
                <div class="row col-mb-50 mb-0">
                    <div class="col-lg-12">
                        <div class="heading-block fancy-title border-bottom-0 title-bottom-border">
                            <h4>Vacancies</h4>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <a href="#">Vacancy announcement <small>(Published: 2021-01-01)</small></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@stop
