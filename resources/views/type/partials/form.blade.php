<div class="card-body">
    @include('partials.errors')
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                {{ Form::text('name', old('name'), ['class'=>'form-control', 'required']) }}
                <label>Name</label>
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
