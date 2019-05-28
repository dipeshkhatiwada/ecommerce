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
                            <th>Assigend Module</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                    @php($i=1)
                        @foreach($data['roles'] as $dc)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$dc->name}}</td>
                                <td><ul>
                                    @foreach($dc->modules as $module)
                                       <li>{{$module->name}}</li>
                                    @endforeach
                                    </ul>
                                </td>
                                <td>
                                    @if($dc->status==1)
                                        <span class="label-success">Active</span>
                                    @else
                                        <span class="label-danger">Deactive</span>

                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('backend.role.assignpermission',$dc->id)}}" class="btn btn-info    ">Assign Permission</a>
                                    <a href="{{route('backend.role.assignmodule',$dc->id)}}" class="btn btn-info    ">Assign Module</a>
                                    <br/>
                                    <a href="{{route('backend.role.show',$dc->id)}}" class="btn btn-warning">View</a>
                                    <a href="{{route('backend.role.edit',$dc->id)}}" class="btn btn-warning">Edit</a>
                                    {!! Form::open(['route' => ['backend.role.destroy',$dc->id],'method'=>'POST']) !!}
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