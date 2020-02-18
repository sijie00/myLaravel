@extends('layouts.app')

@section('content')
<form method="POST" action="{{route('addToCart',$product->id)}}">
@csrf
<div class="form-group row">
<div class="form-group col">
@if($product->image_url)
    @foreach($product->image_url as $image)
        <img src="{{url($image)}}" height=300 >
    @endforeach
@endif
</div>
<div class="form-group col">
<div class="form-group row">
<label class="col-2 font-weight-bold">Name</label>
<label class="col-5">{{$product->name}}</label>
</div>

<div class="form-group row">
<label class="col-2 font-weight-bold">Description</label>
<label class="col-5">{{$product->description}}</label>
</div>

<div class="form-group row">
<label class="col-2 font-weight-bold">Price</label>
<label class="col-5">RM {{ number_format($product->price,2)}}</label>
</div>

<div class="form-group row">
<label class="col-2 font-weight-bold">Quantity</label>
<label class="col-2"><input name="quantity" type="number" min="1" max="20" class="form-control  "></label>
</div>

<button name="addToCart" type="submit" class="btn btn-primary">Add To Cart</button>
</form>
</div>
</div>


@endsection 