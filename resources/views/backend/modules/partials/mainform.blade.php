<div class="form-group">
        {{ Form::label('name', null, ['class' => 'control-label']) }}
        {{ Form::text('name', null, (['class' => 'form-control'])) }}
        @if($errors->has('name'))
                <label class="text text-danger"> {{$errors->first('name')}}</label>
        @endif
</div>
<div class="form-group">
        {{ Form::label('route', null, ['class' => 'control-label']) }}
        {{ Form::text('route', null, (['class' => 'form-control'])) }}
        @if($errors->has('route'))
                <label class="text text-danger"> {{$errors->first('route')}}</label>
        @endif
</div>
<div class="form-group">
        {{ Form::label('rank', null, ['class' => 'control-label']) }}
        {{ Form::number('rank', null, (['class' => 'form-control'])) }}
        @if($errors->has('rank'))
                <label class="text text-danger"> {{$errors->first('rank')}}</label>
        @endif
</div>



<div class="form-group">
    {{ Form::label('status', null, ['class' => 'control-label']) }}
    {{ Form::radio('status', '1')}} Active
    {{ Form::radio('status', '0',true)}} Deactive
</div>

