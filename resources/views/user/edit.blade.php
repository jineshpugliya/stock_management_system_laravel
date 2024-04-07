@extends('layouts.main')
@section('content')
    <form method="post" action="/user/{{Crypt::encrypt($data->id)}}" enctype="multipart/form-data">

        @method('put')
        @csrf
        <div class="form-group" >
            <label for="name">User Name </label>
        <input type="text" name="name" value="{{$data->name}}" class="form-control @error('name') border border-danger @enderror " id="name" placeholder="Enter User ka New name o">
        </div>
        <div class="form-group">
        <label for="email">User Email</label>
        <input type="email" name="email" value="{{$data->email}}" class="form-control @error('email') border border-danger @enderror " id="email" placeholder="Enter your E-Mail ">
        </div>
        <div class="form-group">
            <label for="password">Enter your Password</label>
            <input type="password" name="password" value="{{$data->password}}" class="form-control @error('password') border border-danger @enderror " id="password" placeholder="Enter your password ">
            </div>

        {{-- <div class="form-group">
            <label for="exampleInputpro_category">User</label>
            <input type="text" name="cat" value="{{$data->user}}"class="form-control @error('cat') border border-danger @enderror " id="exampleInputpro_category" placeholder="User  User  ">
            </div>

        <div class="form-group">
            <label for="media">Media</label>
            <input type="file" name="media" class="form-control @error('media') border border-danger @enderror " placeholder="Media" >
            </div>
            <img src={{Storage::url('public/media/'.$data->media)}} alt ="" height="200px" width="200px"> --}}
            {{-- <div class="form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Kaam puro ho gayo kya??</label>
        </div> --}}

        <button type="submit" class="btn btn-primary">Update</button>
        </form>

@endsection
