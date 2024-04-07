@extends('layouts.main')


@section('content')

{{-- @if($errors->any())
<div class="alert alert-danger">
    <ul>
    @foreach ($errors->all() as $err)
      <li>{{$err}}</li>
    @endforeach
    </ul>
</div>
@endif --}}

@if($msg= Session::get('msg'))
<div class="alert alert-success">
<p>{{$msg}}</p>
</div>
@endif
{{-- enctype="multipart/form-data" --}}
    <form method="post" action="/user" >
        @csrf
        <div class="form-group" >
            <label for="exampleInputpro_name"> Enter User Name</label>
        <input type="text" name="name" class="form-control @error('name') border border-danger @enderror " id="exampleInputpro_name" placeholder="User  Name ">
    {{-- @error('name')
    <div class ="border-danger">
        {{$message}}
    </div>
    @enderror    --}}
    </div>
        <div class="form-group">
        <label for="email">Enter User E-mail</label>
        <input type="email" name="email" class="form-control @error('email') border border-danger @enderror " id="email" placeholder="Enter user E-mail ">
        </div>
        {{-- <div class="form-group">
            <label for="email_verified_at">Enter E-mail Verifiction</label>
            <input type="text" name="email_verified_at" class="form-control @error('email_verified_at') border border-danger @enderror " id="email_verified_at" placeholder="Enter E-mail Verifiction">
            </div> --}}
            <div class="form-group">
                <label for="password">Enter As your wish password</label>
                <input type="password" name="password" class="form-control @error('password') border border-danger @enderror " id="password" placeholder="Essa password daloo jo tumko yaad rahe">
                </div>

        {{-- <div class="form-check">

            <input type="checkbox"  class="form-check-input" id="remember_token" name="remember_token">
            <label  class="form-check-input" for="remember_token" >Remember your id</label>

            </div> --}}
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1" name="remember_token">
                <label class="form-check-label" for="exampleCheck1">Kaam puro ho gayo kya??</label>
                </div>

        <button type="submit" class="btn btn-primary">Submit.</button>
        </form>

@endsection

