<div class="form-group">
    {{ Form::label('module_id', 'Module name', ['class' => 'control-label']) }}
    {{--        {{ Form::text('category_id', null, (['class' => 'form-control'])) }}--}}
    {{ Form::select('module_id', $data['modules'],null, ['class' => 'form-control']) }}
    @if($errors->has('module_id'))
        <label class="text text-danger"> {{$errors->first('module_id')}}</label>
    @endif
</div>
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
        {{ Form::label('url', null, ['class' => 'control-label']) }}
        {{ Form::text('url', null, (['class' => 'form-control'])) }}
        @if($errors->has('url'))
                <label class="text text-danger"> {{$errors->first('url')}}</label>
        @endif
</div>



<div class="form-group">
    {{ Form::label('status', null, ['class' => 'control-label']) }}
    {{ Form::radio('status', '1')}} Active
    {{ Form::radio('status', '0',true)}} Deactive
</div>

<div class="form-group">
    {{ Form::label('menu_display', null, ['class' => 'control-label']) }}
    {{ Form::radio('menu_display', '1')}} Active
    {{ Form::radio('menu_display', '0',true)}} Deactive
</div>

