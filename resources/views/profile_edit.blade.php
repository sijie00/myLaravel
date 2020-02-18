@extends('layouts.app')
@section('content')


<form method="POST" action="{{route('profile.save',$user->id)}}" enctype="multipart/form-data">
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
    <input name="name" value="{{old('name',$user->name)}}" class="form-control">
    @error('name')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="form-group">
    <label>Email</label>
    <input name="email" value="{{$user->email}}" class="form-control" readonly>
</div>
<div class="form-group @error('gender') has-error @enderror">
    <label>Gender</label>
    <input name="gender" value="{{old('gender',$user->gender)}}" class="form-control">
    @error('gender')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="form-group @error('phone') has-error @enderror">
    <label>Phone Number</label>
    <input name="phone" value="{{old('phone',$user->phone)}}" class="form-control">
    @error('phone')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="form-group @error('address') has-error @enderror">
    <label>Address</label>
    <input name="address" value="{{old('address',$user->address)}}" class="form-control">
    @error('address')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="form-group @error('postcode') has-error @enderror">
    <label>Postal Code</label>
    <input name="postcode" value="{{old('postcode',$user->postcode)}}" class="form-control">
    @error('postcode')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="form-group @error('city') has-error @enderror">
    <label>City</label>
    <input name="city" value="{{old('city',$user->city)}}" class="form-control">
    @error('city')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="form-group  @error('country') has-error @enderror">
    <label>Country</label>
    <input name="country" value="{{old('country',$user->country)}}" class="form-control">
    @error('country')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="form-group">
<label>Avatar Photo</label>
<input name="photo" type="file" class="form-control">
</div>
<button type="submit" class="btn btn-primary">Save</button>
</form> 

@endsection

