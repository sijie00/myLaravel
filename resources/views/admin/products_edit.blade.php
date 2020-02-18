@extends('layouts.app')
@section('content')


<form method="POST" action="{{route('admin.products.save',$product->id)}}" enctype="multipart/form-data">
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@csrf
<div class="form-group @error('name') has-error @enderror">
    <label>Name</label>
    <input name="name" value="{{old('name',$product->name)}}" class="form-control">
    @error('name')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="form-group @error('description') has-error @enderror">
    <label>Description</label>
    <input name="description" value="{{$product->description}}" class="form-control">
    @error('description')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="form-group @error('price') has-error @enderror">
    <label>Price</label>
    <input name="price" value="{{old('price',number_format($product->price,2))}}" class="form-control">
    @error('price')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group row">
<label class="col-1 font-weight-bold">Attachment</label>
<input name="photo[]" type="file" class="form-control" multiple=true>
</div>

<button type="submit" class="btn btn-primary">Save</button>
</form>

@endsection

