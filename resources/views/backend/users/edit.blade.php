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
                {!! Form::model($data['category'], ['route' => ['backend.category.update', $data['category']->id]]) !!}
                {{ Form::hidden('_method', 'PUT') }}

                {{--{!! Form::open(['route' => 'backend.cegory.atstore','method'=>'POST','files'=>true]) !!}--}}
                <div class="box-body">
                    @include('backend.categories.partials.mainform')
                    {{--{!! Form::label('name', 'Name') !!}--}}
                    {{--{!! Form::text('name',null ,['class' => 'form-control','required' => 'true']) !!}--}}
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    {!! Form::submit('Save !',['class'=> 'btn btn-primary']) !!}
                </div>
            {!! Form::close() !!}

            <!-- /.box-footer-->
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->

@endsection
@section('js')
    @include('backend.includes.slug')
@endsection
