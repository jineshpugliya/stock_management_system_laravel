@extends('layouts.main')
@section('content')
    <form method="post" action="/category/{{Crypt::encrypt($data->id)}}" enctype="multipart/form-data">

        @method('put')
        @csrf
        <div class="form-group" >
            <label for="name">Category Name </label>
        <input type="text" name="name" value="{{$data->name}}" class="form-control @error('name') border border-danger @enderror " id="name" placeholder="Enter Category ka New name o">
        </div>
        <div class="form-group">
        <label for="des">Category Desc</label>
        <input type="text" name="des" value="{{$data->des}}" class="form-control @error('des') border border-danger @enderror " id="des" placeholder="Enter Category ka Description ">
        </div>
        {{-- <div class="form-group">
            <label for="exampleInputpro_category">Category</label>
            <input type="text" name="cat" value="{{$data->category}}"class="form-control @error('cat') border border-danger @enderror " id="exampleInputpro_category" placeholder="Category  Category  ">
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
