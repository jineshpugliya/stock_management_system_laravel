@extends('layouts.main')
@section('content')

    <form method="post" action="/subcategory/{{Crypt::encrypt($data->id)}}" enctype="multipart/form-data">

        @method('put')
        @csrf
        <div class="form-group" >
            <label for="name">Category Name </label>
        <input type="text" name="name" value="{{$data->name}}" class="form-control @error('name') border border-danger @enderror " id="name" placeholder="Enter Category ka New name o">
        </div>
        <div class="form-group">
        <label for="description">Category Desc</label>
        <input type="text" name="description" value="{{$data->description}}" class="form-control @error('description') border border-danger @enderror " id="description" placeholder="Enter Category ka Description ">
        </div>
    </div>
    <div class="form-group">
        <label for="category">{{__('Category')}}</label>
        <select type="text" name="category_id" class="form-control @error('category_id') border border-danger @enderror " id="category" placeholder="Category  Description  ">
        <option value="{{$data->category_id}}">{{$data->category->name??''}}</option>
            @foreach($catdata as $cd)
            <option value="{{$cd->id}}">{{ucfirst($cd->name)}}</option>
        @endforeach
        </select>


    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
        {{-- <div class="form-group">
            <label for="exampleInputpro_category">Category</label>
            <input type="text" name="cat" value="{{$catdata->category}}"class="form-control @error('cat') border border-danger @enderror " id="exampleInputpro_category" placeholder="Category  Category  ">
            </div>

        <div class="form-group">
            <label for="media">Media</label>
            <input type="file" name="media" class="form-control @error('media') border border-danger @enderror " placeholder="Media" >
            </div>
            <img src={{Storage::url('public/media/'.$catdata->media)}} alt ="" height="200px" width="200px"> --}}
            {{-- <div class="form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Kaam puro ho gayo kya??</label>
        </div> --}}



@endsection
