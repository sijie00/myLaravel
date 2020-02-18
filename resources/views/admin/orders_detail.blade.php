@extends('layouts.app')
@section ('content')

<form action="{{route('admin.order.save',$order_id)}}" method="post">
@csrf 
<table class="table">
    <thead class="thead-black">
        <tr>
            <th scope="col">Product Name</th>
            <th scope="col">Description</th>
            <th scope="col">Quantity</th>
            <th scope="col">Delivery Status</th>
            <th scope="col">Order Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach($orderitems as $item)
        <tr>
            <td>{{$item->product_name}}</td>
            <td>{{$item->description}}</td>
            <td>{{$item->quantity}}</td>
            <td><input type="number" min="1" max="30" value="{{$i->product_quantity}}" name="quantity[{{$i->id}}]">{{$item->delivery_status}}</td>
            <td>{{$item->order_status}}</td>
        <tr>
        @endforeach
    </tbody>
</table>
<button type="submit" class="btn btn-success" onclick="return confirm(['Are you sure?')">Shipped</Button>
</form>

@endsection
