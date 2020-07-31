@extends('layouts.app')

@section('title', 'Landing Pages')

@section('content')
    <section>
        <div class="section-body">
            <div class="card">
                <div class="card-head">
                    <header class="text-capitalize">all landing pages</header>
                    <div class="tools">
                        <a class="btn btn-default" href="{{ route('landingPage.create') }}">
                            <i class="md md-add"></i>
                            Add
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th width="2%">#</th>
                            <th width="15%">Title</th>
                            <th width="15%">Url Keys</th>
                            <th width="15%">Is Visible</th>
                            <th width="15%">Homesection</th>
                            <th width="10%" class="text-right">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($landingPage->isEmpty())
                            <tr>
                                <td class="text-center" colspan="5">No data available.</td>
                            </tr>
                        @else
                            @each('landing_page.partials.table', $landingPage, 'landingPage')
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>


@stop
