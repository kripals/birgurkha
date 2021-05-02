<div class="card-body">
    @include('partials.errors')
    <div class="row">
        <div class="col-sm-8">
            <div class="form-group">
                {{ Form::text('title', old('title'), ['class'=>'form-control']) }}
                <label>Top Description</label>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="form-group">
                {{ Form::textarea('description', old('description'), ['class'=>'form-control', 'rows'=>'3']) }}
                <label>Lower Descrption</label>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                {{ Form::file('image', old('image'), ['class'=>'form-control', 'rows'=>'3']) }}
                <label>Image</label>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                @if(isset($news->images))
                    <img src="{{ asset($news->images->path) }}"
                         class="preview" width="250">
                @else
                    <img src="{{ asset(config('paths.placeholder.default')) }}"
                         data-src="{{ asset(config('paths.placeholder.default')) }}"
                         class="preview" height="150" width="150">
                @endif
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
