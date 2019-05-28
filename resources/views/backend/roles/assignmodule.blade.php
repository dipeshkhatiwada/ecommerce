@extends('backend.layouts.app')

@section('content')

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">{{$data['page_title']}}</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i></button>
                </div>
            </div>

            {{--@include('backend.includes.error')--}}

            {!! Form::open(['route' => 'backend.role.postmodule', 'method' => 'post']) !!}
            <div class="box-body">
                <div class="form-group">
                    {{ Form::label('role_name', null, ['class' => 'control-label']) }}
                    {{ Form::text('role_name', $data['role']->name, (['class' => 'form-control','readonly' => 'true'])) }}

                    {{ Form::hidden('role_id', $data['role']->id) }}

                @if($errors->has('name'))
                        <label class="text text-danger"> {{$errors->first('name')}}</label>
                    @endif
                </div>
                <hr>
                <div class="form-group">

                    {{ Form::label('module_id','Module Lists', ['class' => 'control-label']) }}
                    <br>
                    @foreach($data['modules'] as $module)
                        @if(in_array($module->id,$data['assigned_modules']))
                        {{ Form::checkbox('module_id[]', $module->id,true) }}{{$module->name}}
                        @else
                            {{ Form::checkbox('module_id[]', $module->id) }}{{$module->name}}

                        @endif

                    @endforeach
                    @if($errors->has('name'))
                        <label class="text text-danger"> {{$errors->first('name')}}</label>

                    @endif
                </div>
            </div>
            <!-- /.box-body -->

            <div class="box-footer">
                {!! Form::submit('Create',['class'=>'btn btn-success']) !!}
            </div>
            <!-- /.box-footer-->
            {!! Form::close() !!}
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->

@endsection