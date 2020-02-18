@extends('layouts.app')
@section('content')


<h1>Product</h1>
<a href="{{route('admin.products.edit','0')}}" class="btn btn-primary btn-sm">Add Product</a>
<br/>
<br/>
<table class="table table-bordered table-sm table-hover">
<thead class="thead-dark">
<tr>
<th></th>
<th scope="col">Name</th>
<th scope="col">Price</th>
<th scope="col"></th>
<th scope="col"></th>
</tr>
</thead>
@foreach ($products as $p)
<tr>
   <td>
        @if($p->image_url)
            @foreach($p->image_url as $image)
                <img src="{{url($image)}}" height=80 >
            @endforeach
        @endif
    </td>
    <td>{{$p->name}}</td>
    <td>RM {{number_format($p->price,2)}}</td>
    <td width="1"><a href="{{route('admin.products.edit',$p->id)}}" class="btn btn-primary btn-sm">Edit</a></td>
    <td width="1"><a href="{{route('admin.products.delete',$p->id)}}" onclick="return confirm('Are you sure?');" class="btn btn-danger btn-sm">Delete</a></td>
    
</tr>

@endforeach
</table>

@endsection
