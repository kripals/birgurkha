@extends('layouts.app')

@section('title', 'Magento CMS Pages')

@section('content')
    <section class="no-y-padding">
        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    {{ Form::open([ 'route' => 'cmsPages', 'class'=>'form form-validate', 'role'=>'form', 'files'=>true, 'novalidate']) }}
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                {{ Form::text('search', old('search'), ['class' => 'form-control', 'required']) }}
                                {{ Form::label('search', 'CMS Page Name') }}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="card-actionbar">
                                <div class="card-actionbar-row">
                                    <button type="submit" class="btn btn-primary ink-reaction">search
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    <h3>Magento CMS Pages</h3>
                    <div class="col-sm-2">
                        <!-- BEGIN SEARCH RESULTS LIST -->
                        <div class="margin-bottom-xxl">
                            <span
                                class="text-light text-lg">Total Count: <strong>1</strong></span>
                        </div>
                    </div>
                    {{ Form::open(['route' =>'local.store.cmsPages','class'=>'form form-validate', 'novalidate']) }}
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <button type="submit" class="btn btn-success ink-reaction">Submit</button>
                        </tr>
                        <tr>
                            <th width="20%">URL Key</th>
                            <th width="20%">Title</th>
                            <th width="20%">Content Heading</th>
                            <th width="20%">Page Layout</th>
                            <th width="25%" class="text-right">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(empty($content))
                            <tr>
                                <td class="text-center" colspan="5">No data available.</td>
                            </tr>
                        @else
                            <tr>
                                <td>
                                    {{ $content['url_key'] }}
                                    {{ Form::text('url_key', $content['url_key'] , ['hidden']) }}
                                    {{ Form::text('title', $content['title'] , ['hidden']) }}
                                </td>
                                <td>
                                    {{ $content['title'] }}
                                </td>
                                <td>
                                    {{ $content['content_heading'] }}
                                </td>
                                <td>
                                    {{ $content['page_layout'] }}
                                </td>
                                <td>
                                    {{ Form::select('type', typesArray(), old('type'), ['class' => 'form-control', 'required']) }}
                                </td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </section>
@stop
