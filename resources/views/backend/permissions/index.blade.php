@extends('backend.layouts.app')

@section('content')

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">{{$data['page_title']}}</h3>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Sn</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                    @php($i=1)
                        @foreach($data['permissions'] as $dc)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$dc->name}}</td>
                                <td>
                                    @if($dc->status==1)
                                        <span class="label-success">Active</span>
                                    @else
                                        <span class="label-danger">Deactive</span>

                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('backend.permission.show',$dc->id)}}" class="btn btn-warning">View</a>
                                    <a href="{{route('backend.permission.edit',$dc->id)}}" class="btn btn-warning">Edit</a>
                                    {!! Form::open(['route' => ['backend.permission.destroy',$dc->id],'method'=>'POST']) !!}
                                    {{ Form::hidden('_method', 'DELETE') }}
                                    {!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}
                                    {!! Form::close() !!}
                                </td>


                            </tr>
                        @endforeach
                    </tbody>

                    <tfoot>
                        <tr>
                            <th>Sn</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->

@endsection