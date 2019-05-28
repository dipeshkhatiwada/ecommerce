<div class="form-group">
    {{ Form::label('name', null, ['class' => 'control-label']) }}
    {{ Form::text('name', null, (['class' => 'form-control'])) }}
    @if($errors->has('name'))
        <label class="text text-danger"> {{$errors->first('name')}}</label>
    @endif
</div>

<div class="form-group">
    {{ Form::label('status', null, ['class' => 'control-label']) }}
    {{ Form::radio('status', '1')}} Active
    {{ Form::radio('status', '0',true)}} Deactive
</div>

