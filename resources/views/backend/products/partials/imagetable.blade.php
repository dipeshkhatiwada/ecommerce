@foreach($data['images'] as $img)

<div class="card" style="width:25%; float:left">
    <img class="card-img-top" src="{{asset('images/products/'.$img->name)}}" alt="Card image" hight="100" width="100" >
    <div class="card-body">
        {{--<h4 class="card-title">John Doe</h4>--}}
        {!! Form::open(['route' => ['backend.product.destroy_image',$img->id],'method'=>'POST']) !!}
        {{--{{ Form::hidden('_method', 'DELETE') }}--}}
        {{--<i class=""><input type="submit" value="" class="fa fa-trash"></i>--}}
          {!! Form::submit('Delete',['class'=>'btn btn-danger ']) !!}

        {!! Form::close() !!}
        {{--<a href="#" class="btn btn-primary">See Profile</a>--}}
    </div>
</div>
@endforeach