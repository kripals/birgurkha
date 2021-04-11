@extends('layouts.app')

@section('title', 'Homepage Sections')

@section('content')
    <section>
        <div class="section-body">
            <div class="card">
                <div class="card-head">
                    <header class="text-capitalize">all Sections</header>
                    <div class="tools">
                        <a class="btn btn-primary" href="{{ route('types.create') }}">
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
                            <th width="15%">Section</th>
                            <th width="15%">Name</th>
                            <th width="5%">Position</th>
                            <th width="15%">Type</th>
                            <th width="15%">Is Visible</th>
                            <th width="10%">Has View All</th>
                            <th width="10%">Is Landing Page</th>
                            <th width="10%" class="text-right">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($types->isEmpty())
                            <tr>
                                <td class="text-center" colspan="5">No data available.</td>
                            </tr>
                        @else
                            @each('type.partials.table', $types, 'type')
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@stop
