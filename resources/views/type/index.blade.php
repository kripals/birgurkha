@extends('layouts.app')

@section('title', 'Type')

@section('content')
    <section>
        <div class="section-body">
            <div class="card">
                <div class="card-head">
                    <header class="text-capitalize">all type</header>
                    <div class="tools">
                        <a class="btn btn-primary" href="{{ route('type.create') }}">
                            <i class="md md-add"></i>
                            Add
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th width="5%">#</th>
                            <th width="50%">Name</th>
                            <th width="15%" class="text-right">Actions</th>
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
