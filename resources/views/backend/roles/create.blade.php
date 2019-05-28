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
            {!! Form::open(['route' => 'backend.role.store','method'=>'POST','files'=>true]) !!}

{{--            {!! Form::open(['url' => 'backend.role.store', 'method' => 'post','files'=>true]) !!}--}}
                <div class="box-body">
                    @include('backend.roles.partials.mainform')
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
