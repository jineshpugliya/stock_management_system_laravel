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
    <form method="post" action="/category" >
        @csrf
        <div class="form-group" >
            <label for="exampleInputpro_name"> Enter Category Name</label>
        <input type="text" name="name" class="form-control @error('name') border border-danger @enderror " id="exampleInputpro_name" placeholder="Category  Name ">
    {{-- @error('name')
    <div class ="border-danger">
        {{$message}}
    </div>
    @enderror    --}}
    </div>
        <div class="form-group">
        <label for="des">Enter Category Description</label>
        <input type="text" name="des" class="form-control @error('des') border border-danger @enderror " id="des" placeholder="Category  Description  ">
        </div>
        {{-- <div class="form-group">
            <label for="exampleInputpro_category">Category</label>
            <input type="text" name="cat" class="form-control @error('cat') border border-danger @enderror " id="exampleInputpro_category" placeholder="Category  Category  ">
            </div> --}}

        {{-- <div class="form-group">
            <label for="media">Media</label>
            <input type="file" name="media" class="form-control @error('media') border border-danger @enderror " placeholder="Media" >
            </div> --}}


        {{-- <div class="form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Kaam puro ho gayo kya??</label>
        </div> --}}
        <button type="submit" class="btn btn-primary">Submit.</button>
        </form>

@endsection

