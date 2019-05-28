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
    {{ Form::label('rank', null, ['class' => 'control-label']) }}
    {{ Form::number('rank', null, ['class' => 'form-control']) }}
    @if($errors->has('rank'))
        <label class="text text-danger">{{$errors->first('rank')}}</label>
    @endif
</div>
<div class="form-group">
    {{ Form::label('image', null, ['class' => 'control-label']) }}
    {{ Form::file('file') }}
        @if($errors->has('file'))
                <label class="text text-danger">{{$errors->first('file')}}</label>
        @endif
</div>
<div class="form-group">
    {{ Form::label('description', null, ['class' => 'control-label']) }}
    {{ Form::textarea('description', null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('Status', null, ['class' => 'control-label']) }}
    {{ Form::radio('status', '1')  }} Active
    {{ Form::radio('status', '0', true)  }} De Active
</div>