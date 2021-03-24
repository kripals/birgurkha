<div class="card-body">
    @include('partials.errors')
    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                {{ Form::text('section', old('section'), ['class'=>'form-control', 'required']) }}
                <label>Section</label>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                {{ Form::text('name', old('name'), ['class'=>'form-control']) }}
                <label>Name</label>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                {{ Form::select('visible', [ 1 => 'Show', 0 => 'Dont Show' ] , old('visible'), ['class' => 'form-control select2-list', 'required']) }}
                <label>Visibility</label>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                {{ Form::number('position', old('position'), ['class'=>'form-control', 'required']) }}
                <label>Position</label>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                {{ Form::select('type', [ 'SLIDER' => 'Slider', 'CAROUSEL' => 'Carousel', 'BANNER' => 'Banner', 'DEALS' => 'Deals', 'CATEGORY' => 'Color Category' ] , old('type'), ['class' => 'form-control select2-list', 'required']) }}
                <label>Type</label>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                {{ Form::select('view_all_buttons', [ 1 => 'Show', 0 => 'Dont Show' ] , old('view_all_buttons'), ['class' => 'form-control select2-list', 'required']) }}
                <label>View all Button</label>
            </div>
        </div>
    </div>
    <div class="row">
        @if(isset($type))
            @if(!empty($type->entity_id) && !empty($type->entity_type))
                <h4>For View All Button is of {{ $type->entity_type }} with the key  {{ $type->entity_id }}</h4>
            @else
                <h4>Content For View All Button Not Added</h4>
            @endif
        @endif
    </div>
    <div class="row">
        <hr style="border: 10px solid;">
        <h3>For Deals Section</h3>
        <div class="col-sm-3">
            <div class="form-group">
                @if(isset($type->image))
                    <img src="{{ asset($type->image->path) }}"
                         class="preview" width="300">
                @else
                    <img src="{{ asset(config('paths.placeholder.default')) }}"
                         data-src="{{ asset(config('paths.placeholder.default')) }}"
                         class="preview" height="150" width="300">
                @endif
                {{ Form::file('image', ['class' => 'image-input', 'accept' => 'image/*', 'data-msg' => trans('validation.mimes', ['class' => 'form-control','attribute' => 'avatar', 'values' => 'png, jpeg'])]) }}
                <label>Type</label>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                {{ Form::datetime('start_date', old('start_date'), ['class'=>'form-control']) }}
                <label>Start Date</label>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                {{ Form::datetime('end_date', old('end_date'), ['class'=>'form-control']) }}
                <label>End Date</label>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                {{ Form::text('add_on_words', old('add_on_words'), ['class'=>'form-control']) }}
                <label>After Sale Starts Phrase</label>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                {{ Form::text('before_start_phrase', old('before_start_phrase'), ['class'=>'form-control']) }}
                <label>Before Sale Starts Phrase</label>
            </div>
        </div>
    </div>
    <div class="row">
        <hr style="border: 10px solid;">
        <h3>For Color Category</h3>
        <div class="col-sm-3">
            <div class="form-group">
                {{ Form::text('background_color', old('background_color'), ['class'=>'form-control']) }}
                <label>Background Color</label>
            </div>
        </div>
    </div>
    <div class="row">
        <hr style="border: 10px solid;">
        <h3>For Landing Page</h3>
        <div class="col-sm-3">
            <div class="form-group">
                {{ Form::select('is_landing', [ 0 => 'No', 1 => 'Yes' ] , old('is_landing'), ['class' => 'form-control select2-list', 'required']) }}
                <label>Is Landing Page</label>
            </div>
        </div>
    </div>
</div><!--end .card-body -->
<div class="card-actionbar">
    <div class="card-actionbar-row">
        <button type="reset" class="btn btn-flat">Reset</button>
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
</div>
