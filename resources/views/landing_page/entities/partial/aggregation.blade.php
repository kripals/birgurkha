<div class="card-body">
    {{ Form::open(['route' =>'landingPage.store.aggregation','class'=>'form form-validate', 'role'=>'form', 'files'=>true, 'novalidate']) }}
    <div class="row">
        <div class="col-md-3">
            <b>Landing Page Name</b>
            {{ Form::text('name', old('name'), ['class' => 'form-control', 'required']) }}
        </div>
        <div class="col-md-3">
            <b>Landing Homepage Section</b>
            {{ Form::select('type', typesArrayLanding(), old('type'), ['class' => 'form-control', 'required']) }}
        </div>
        <div class="col-md-3">
            <b>Landing Page Section</b>
            {{ Form::select('landingPage', landingPagesArray(), old('landingPage'), ['class' => 'form-control', 'required']) }}
        </div>
        <div class="col-md-3">
            <button type="submit" class="btn btn-success ink-reaction">Submit</button>
        </div>
    </div>
    {{ Form::text('product', empty($content) ? '' : $content['value'], ['hidden']) }}
    @foreach($content['aggregations'] as $key => $value)
        <table class="table table-hover">
            <thead>
            <tr>
                <td colspan="2">
                    <span class="text-light text-lg">Label: <strong>{{ $value['label'] }}</strong></span>
                </td>
            </tr>
            </thead>
            <tr>
                <th width="5%">#</th>
                <th width="40%">Label</th>
                <th width="40%">Value</th>
            </tr>
            <tbody>
            @foreach($value['options'] as $keys => $values)
                <tr>
                    <td>
                        <div class="checkbox checkbox-inline checkbox-styled">
                            <label>
                                {{ Form::checkbox('status[' . $value['attribute_code'] . ']' . '[' . $keys . ']', old('status')) }}
                            </label>
                        </div>
                    </td>
                    <td>
                        {{ $values['label'] }}
                        {{ Form::text('label['. $value['attribute_code'] . ']' . '[' . $keys . ']', $values['label'] , ['hidden']) }}
                    </td>
                    <td>
                        {{ $values['value'] }}
                        {{ Form::text('value['. $value['attribute_code'] . ']' . '[' . $keys . ']', $values['value'] , ['hidden']) }}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endforeach
    {{ Form::close() }}
</div>
