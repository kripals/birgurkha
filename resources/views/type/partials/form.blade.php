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
    </div>
    <div class="row">
        <hr style="border: 10px solid;">
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
                {{ Form::date('start_date', old('start_date'), ['class'=>'form-control']) }}
                <label>Start Date</label>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                {{ Form::date('end_date', old('end_date'), ['class'=>'form-control']) }}
                <label>End Date</label>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                {{ Form::text('add_on_words', old('add_on_words'), ['class'=>'form-control']) }}
                <label>Add On Words</label>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                {{ Form::select('view_all_button', [ 1 => 'Show', 0 => 'Dont Show' ] , old('view_all_button'), ['class' => 'form-control select2-list', 'required']) }}
                <label>View all Button</label>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                {{ Form::text('background_color', old('background_color'), ['class'=>'form-control']) }}
                <label>Background Color</label>
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
