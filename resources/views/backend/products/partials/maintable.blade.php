<table class="table table-bordered">
    <tr>
        <th style="width: 10px">#</th>
        <th>Attributes</th>
        <th>Value</th>
        {{--<th style="width: 40px">Label</th>--}}
    </tr>
    <tr>
        <td>1.</td>
        <td>Name</td>
        <td>{{$data['product']->name}}</td>
    </tr>
    <tr>
        <td>2.</td>
        <td>Category</td>
        <td>{{$data['product']->category_id}}</td>
    </tr>
    <tr>
        <td>3.</td>
        <td>Sub-Category</td>
        <td>{{$data['product']->subcategory_id}}</td>
    </tr>
    <tr>
        <td>4.</td>
        <td>Price</td>
        <td>{{$data['product']->price}}</td>
    </tr>
    <tr>
        <td>5.</td>
        <td>Discount</td>
        <td>{{$data['product']->discount}}</td>
    </tr>
    <tr>
        <td>6.</td>
        <td>Quantity</td>
        <td>{{$data['product']->quantity}}</td>
    </tr>
    <tr>
        <td>7.</td>
        <td>Stock</td>
        <td>{{$data['product']->stock}}</td>
    </tr>
    <tr>
        <td>8.</td>
        <td>Short Description</td>
        <td>{{$data['product']->short_description}}</td>
    </tr>
    <tr>
        <td>9.</td>
        <td>Description</td>
        <td>{{$data['product']->description}}</td>
    </tr>
    <tr>
        <td>10.</td>
        <td>Slider</td>
        <td>@if($data['product']->slider_key==1)
                <span class="label-success">Active</span>
            @else
                <span class="label-danger">Deactive</span>

            @endif</td>
    </tr>

    <tr>
        <td>11.</td>
        <td>feature</td>
        <td>@if($data['product']->feature_key==1)
                <span class="label-success">Active</span>
            @else
                <span class="label-danger">Deactive</span>

            @endif</td>
    </tr>
    <tr>
        <td>12.</td>
        <td>Discount</td>
        <td>@if($data['product']->discount_key==1)
                <span class="label-success">Active</span>
            @else
                <span class="label-danger">Deactive</span>

            @endif</td>
    </tr>
    <tr>
        <td>13.</td>
        <td>Status</td>
        <td>@if($data['product']->status==1)
                <span class="label-success">Active</span>
            @else
                <span class="label-danger">Deactive</span>

            @endif</td>
    </tr>

</table>