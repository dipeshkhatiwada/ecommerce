<div class="form-group">
    {{ Form::label('role_id', 'Role name', ['class' => 'control-label']) }}
    {{--        {{ Form::text('category_id', null, (['class' => 'form-control'])) }}--}}
    {{ Form::select('role_id', $data['roles'],null, ['class' => 'form-control']) }}
    @if($errors->has('role_id'))
        <label class="text text-danger"> {{$errors->first('role_id')}}</label>
    @endif
</div>

<div class="form-group">
    {{ Form::label('name', null, ['class' => 'control-label']) }}
    {{ Form::text('name', null, ['class' => 'form-control']) }}
    @if($errors->has('name'))
        <label class="text text-danger">{{$errors->first('name')}}</label>
        @endif
</div>
<div class="form-group">
    {{ Form::label('name', null, ['class' => 'control-label']) }}
    {{ Form::text('name', null, ['class' => 'form-control']) }}
    @if($errors->has('name'))
        <label class="text text-danger">{{$errors->first('name')}}</label>
    @endif
</div>

<div class="form-group">
    {{ Form::label('email', null, ['class' => 'control-label']) }}
    {{ Form::email('email', null, ['class' => 'form-control']) }}
    @if($errors->has('email'))
        <label class="text text-danger">{{$errors->first('email')}}</label>
    @endif
</div>

<div class="form-group">
    {{ Form::label('password', null, ['class' => 'control-label']) }}
    {{ Form::password('password', ['class' => 'awesome form-control']) }}
    @if($errors->has('password'))
        <label class="text text-danger">{{$errors->first('password')}}</label>
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
    {{ Form::label('Status', null, ['class' => 'control-label']) }}
    {{ Form::radio('status', '1')  }} Active
    {{ Form::radio('status', '0', true)  }} De Active
</div>