@extends('backend.layouts.app')

@section('content')

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Title</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                title="Collapse">
                            <i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                            <i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>S.N</th>
                                <th>Name</th>
                                <th>Rank</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                        @php($i=1)
                        @foreach($data['users'] as $user)
                            <tr>
                                <td>{{ $i++}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->rank}}</td>
                                <td><img height="100" width="150" src="{{asset('images/users/'.$user->image)}}" alt="{{$user->image}}"></td>
                                <td>
                                    @if($user->status==1)
                                        <span class="label label-success">Active</span>
                                        @else
                                        <span class="label label-danger">De Active</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('backend.category.edit',$user->id)}}" class="btn btn-warning">Edit</a>
                                    {!! Form::open(['route' => ['backend.category.destroy', $user->id],'method'=>'POST']) !!}
                                    {{ Form::hidden('_method', 'DELETE') }}
                                    {!! Form::submit('Delete !',['class'=> 'btn btn-danger']) !!}
                                    {!! Form::close() !!}
                                    <a href="{{route('backend.category.show',$user->id)}}" class="btn btn-info">View Details</a>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                        <tfoot>
                            <tr>
                                <th>S.N</th>
                                <th>Name</th>
                                <th>Rank</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>

                    </table>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    Footer
                </div>
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->

@endsection
