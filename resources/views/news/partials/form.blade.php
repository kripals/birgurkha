<div class="card-body">
    @include('partials.errors')
    <div class="row">
        <div class="col-sm-2">
            <div class="form-group">
                {{ Form::select('type', [ 'NEWS' => 'News', 'NOTICES' => 'Notice', 'VACANCY' => 'Vacancy' ] , old('type'), ['class' => 'form-control select2-list', 'id'=>'type', 'required']) }}
                <label>Type</label>
            </div>
        </div>
        <div class="col-sm-2" id="date">
            <div class="form-group">
                {{ Form::date('date', old('date'), ['class'=>'form-control', 'required']) }}
                <label>Date</label>
            </div>
        </div>
        <div class="col-sm-8" id="title">
            <div class="form-group">
                {{ Form::text('title', old('title'), ['class'=>'form-control']) }}
                <label>Title</label>
            </div>
        </div>
    </div>
    <div class="row" id="description">
        <div class="col-sm-12">
            <div class="form-group">
                {{ Form::textarea('description', old('description'), ['class'=>'form-control', 'rows'=>'3']) }}
                <label>Descrption</label>
            </div>
        </div>
    </div>
    <div class="row" id="image">
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
    <div class="row" id="file">
        <div class="col-sm-3">
            <div class="form-group">
                {{ Form::file('file', old('file'), ['class'=>'form-control', 'rows'=>'3']) }}
                <label>File</label>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                @if(isset($news->file))
                    <a href="{{ asset($news->file) }}" target="_blank">{{ str_replace("public/files/", "", $news->file) }}</a>
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

@push('scripts')
    <script>
        $(document).ready(function(){
            document.getElementById("file").style.visibility = "hidden";
        });

        $('#type').on('change', function() {
            value = this.value;
            if ( value == 'NEWS' )
            {
                document.getElementById("date").style.visibility = "visible";
                document.getElementById("title").style.visibility = "visible";
                document.getElementById("description").style.visibility = "visible";
                document.getElementById("image").style.visibility = "visible";
                document.getElementById("file").style.visibility = "hidden";
            }
            if ( value == 'NOTICES' || value == 'VACANCY')
            {
                document.getElementById("date").style.visibility = "visible";
                document.getElementById("title").style.visibility = "visible";
                document.getElementById("description").style.visibility = "hidden";
                document.getElementById("image").style.visibility = "hidden";
                document.getElementById("file").style.visibility = "visible";
            }
        });
    </script>
@endpush