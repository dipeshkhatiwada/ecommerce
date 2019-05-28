<div class="form-group">
    {{ Form::label('name', null, ['class' => 'control-label']) }}
    {{ Form::text('name', null, ['class' => 'form-control']) }}
    @if($errors->has('name'))
        <label class="text text-danger">{{$errors->first('name')}}</label>
        @endif
</div>
<div class="form-group">
    {{ Form::label('slug', null, ['class' => 'control-label']) }}
    {{ Form::text('slug', null, ['class' => 'form-control','readonly'=>'readonly']) }}
        @if($errors->has('slug'))
                <label class="text text-danger">{{$errors->first('slug')}}</label>
        @endif
</div>
<div class="form-group">
    {{ Form::label('Status', null, ['class' => 'control-label']) }}
    {{ Form::radio('status', '1')  }} Active
    {{ Form::radio('status', '0', true)  }} De Active
</div>