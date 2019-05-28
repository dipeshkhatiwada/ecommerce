<div class="form-group">
    {{ Form::label('tag', null, ['class' => 'control-label']) }}
    {{--{{ Form::text('tag', null, (['class' => 'form-control'])) }}--}}
    {{ Form::select('tag_id[]',  $data['tags'],isset($data['product']->tags)?$data['product']->tags:null, ['class' => 'form-control select2','multiple'=>'multiple','style'=>'width: 100%;']) }}

    @if($errors->has('tag_id'))
        <label class="text text-danger"> {{$errors->first('tag_id')}}</label>
    @endif

</div>

{{--<div class="form-group">--}}
    {{--<label>Multiple</label>--}}
    {{--<select class="form-control select2" multiple="multiple" data-placeholder="Select a State"--}}
            {{--style="width: 100%;">--}}
        {{--<option>Alabama</option>--}}
        {{--<option>Alaska</option>--}}
        {{--<option>California</option>--}}
        {{--<option>Delaware</option>--}}
        {{--<option>Tennessee</option>--}}
        {{--<option>Texas</option>--}}
        {{--<option>Washington</option>--}}
    {{--</select>--}}
{{--</div>--}}
