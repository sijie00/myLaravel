@extends('layouts.app')
@section('content')

<h1> Shopping Cart</h1>
<form method="post" action="{{route('cartItem.update')}}">
@csrf
<table class="table table-bordered table-light table-hover">
<thead class="thead-light">
    <tr>
      <th>Product Name</th>
      <th>Quantity</th>
      <th >Price</th>
      <th>Subtotal</th>
      <th></th>
    </tr>
</thead>
@foreach ($cart_items as $i)
<tr>
<td >{{$i->product_name}}</td>
<td><input type="number" min="1" max="30" value="{{$i->product_quantity}}" name="quantity[{{$i->id}}]"></td>
<td>{{number_format($i->product_price,2)}}</td>
<td>{{number_format($i->subtotal,2)}}</td>
<td class="col-md-auto"><a href="{{route('cartItem.delete',$i->id)}}" onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</a></td>
</tr>
@endforeach
<tr>
<td class="text-right"colspan="2">Total:</td>
<td>RM {{number_format($cart_total,2)}}</td>
<td class="col-md-auto"><button type="submit" class="btn btn-primary">Update</button></td>
</tr>
</table>
<a href="{{route('checkout')}}" class="btn btn-secondary float-right">Checkout</a>
</form>
@endsection