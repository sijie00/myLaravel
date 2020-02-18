@extends('layouts.app')
@section('content')
<div class="row">
<div class="col">
<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scole="col">OrderID</th>
            <th scole="col">Recipient Name</th>
            <th scole="col">Contact Number</th>
            <th scole="col">Delivery Address</th>
        </tr>
    </thead>
    @foreach($order as $o)
        <tr>
            <td>{{$o->id}}</td>
            <td>{{$o->name}}</td>
            <td>{{$o->phone}}</td>
            <td>{{$o->address}},{{$o->postcode}} {{$o->city}}, {{$o->country}}</td>
        </tr>
</table>
</div>

<div class="col">
<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scole="col">Product Name</th>
            <th scole="col">Description</th>
            <th scole="col">Quantity</th>
        </tr>
    </thead>
        @foreach($o->items as $i)
            <tr>
                <td>{{$i->product_name}}</td>
                <td>{{$i->description}}</td>
                <td>{{$i->quantity}}</td>
            </tr>
        @endforeach
</table>
</div>
</div>
<h3>Order Status: {{$o->order_status}}</h3>
<h3>Delivery Status: {{$o->delivery_status}}</h3>
@endforeach

@endsection