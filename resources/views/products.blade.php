@extends('layouts.app')
@section('content')

<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center"><h1 class="display-4">Product</h1></div>
<div class="row">
@foreach($products as $p)
<div class="container col-md-4">
    <div class="card-deck mb-3 text-center">
        <div class="card mb-3 box-shadow">
          <div class="card-header">
            <h4 class="my-0 font-weight-normal">{{$p->name}}</h4>
          </div>
          <div class="card-body">
            <ul class="list-unstyled mt-3 mb-2">
              <li> @if($p->image_url)
                    @foreach($p->image_url as $image)
                        <img src="{{url($image)}}" height=80 >
                    @endforeach
                    @endif
              </li>
              <li>{{$p->description}}</li>
              <li>RM {{number_format($p->price,2)}}</li>
            </ul>
            <a href="{{route('products.show',$p->id)}}" class="btn btn-lg btn-block btn-outline-primary">Add To Cart</a>
          </div>
        </div>
    </div>
</div>
@endforeach
@endsection
