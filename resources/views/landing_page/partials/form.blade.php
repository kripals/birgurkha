<div class="card-body">
    @include('partials.errors')
    <div class="row">
        <div class="col-sm-4">
            <div class="form-group">
                {{ Form::text('title', old('title'), ['class'=>'form-control', 'required']) }}
                <label>Title</label>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                {{ Form::text('urlkey', old('urlkey'), ['class'=>'form-control']) }}
                <label>Url Key</label>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                {{ Form::select('visible', [ 1 => 'Show', 0 => 'Dont Show' ] , old('visible'),
                ['class' => 'form-control select2-list', 'required']) }}
                <label>Visibility</label>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                @if(isset($landingPage->image))
                    <img src="{{ asset($landingPage->image->path) }}"
                         class="preview" width="300">
                @else
                    <img src="{{ asset(config('paths.placeholder.default')) }}"
                         data-src="{{ asset(config('paths.placeholder.default')) }}"
                         class="preview" height="150" width="300">
                @endif
                {{ Form::file('image', ['class' => 'image-input', 'accept' => 'image/*',
                'data-msg' => trans('validation.mimes', ['class' => 'form-control','attribute' => 'avatar',
                'values' => 'png, jpeg'])]) }}
                <label>Image</label>
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
