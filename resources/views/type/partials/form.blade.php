<div class="card-body">
    @include('partials.errors')
    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                {{ Form::text('name', old('name'), ['class'=>'form-control', 'required']) }}
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
                {{ Form::select('type', [ 'SLIDER' => 'Slider', 'CAROUSEL' => 'Carousel', 'BANNER' => 'Banner' ] , old('type'), ['class' => 'form-control select2-list', 'required']) }}
                <label>Type</label>
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
