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

            {!! Form::open(['route' => 'backend.role.postpermission', 'method' => 'post']) !!}
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

                    {{ Form::label('permission_id','Permission Lists', ['class' => 'control-label']) }}
                    <br>
                    <ul>
                        @foreach($data['role']->modules as $module)
                            @if(count($module->permissions) >0)
                                <li><strong>{{$module->name}}</strong></li>
                            @foreach($module->permissions as $permission)

                                        @if(in_array($permission->id,$data['assigned_permissions']))
                                            {{ Form::checkbox('permission_id[]', $permission->id,true) }}{{$permission->name}}
                                        @else
                                            {{ Form::checkbox('permission_id[]', $permission->id) }}{{$permission->name}}

                                        @endif

                                @endforeach

                            @endif
                            @endforeach
                    </ul>
                    @foreach($data['permissions'] as $permission)


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