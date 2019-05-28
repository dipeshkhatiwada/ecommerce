@extends('backend.layouts.app')

@section('content')

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">{{$data['page_title']}}</h3>
                <table id="example1"  class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Sn</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                    @php($i=1)
                        @foreach($data['products'] as $pd)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$pd->name}}</td>
                                <td>{{$pd->price}}</td>
                                <td>{{$pd->quantity}}</td>
                                <td>
                                    @if($pd->status==1)
                                        <span class="label-success">Active</span>
                                    @else
                                        <span class="label-danger">Deactive</span>

                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('backend.product.show',$pd->id)}}" class="btn btn-warning">View</a>
                                    <a href="{{route('backend.product.edit',$pd->id)}}" class="btn btn-warning">Edit</a>
                                    {!! Form::open(['route' => ['backend.product.destroy',$pd->id],'method'=>'POST']) !!}
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
                            <th>Price</th>
                            <th>Quantity</th>
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

@section('js')
    @include('backend.includes.datatable')
@endsection