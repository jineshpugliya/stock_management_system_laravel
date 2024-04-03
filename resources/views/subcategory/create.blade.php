@extends('layouts.main')

@section('content')

@if($msg= Session::get('msg'))
<div class="alert alert-success">
<p>{{$msg}}</p>
</div>
@endif
<div class="container row">
<div class="col-md-12 container" style="display:flex;justify-content:center;">
<h4>Enter new Data in Sub-Category Form</h4>
</div>

</div>
{{-- enctype="multipart/form-data" --}}
    <form method="post" action="/subcategory" >
        @csrf
        <div class="form-group" >
            <label for="name">{{__('Name')}}</label>
        <input type="text" name=" name" class="form-control @error('name') border border-danger @enderror " id="name" placeholder="Category ro Naam Ghal">

         @error('name')
         <small class="form-text text-danger">Please enter Name</small>
         @enderror

    </div>
    <div class="form-group" >
        <label for="description">{{__('Description')}}</label>
    <input type="text" name="description" class="form-control @error('description') border border-danger @enderror " id="description" placeholder="Category ro Naam Ghal">

     @error('description')
     <small class="form-text text-danger">Please enter Desciption</small>
     @enderror

</div>
    <div class="form-group">
        <label for="category">{{__('Category')}}</label>
        <select type="text" name="category_id" class="form-control @error('category_id') border border-danger @enderror " id="category" placeholder="Category roo Description Ghal ">
        <option>Select</option>
            @foreach($catdata as $cd)
                <option value="{{$cd->id}}">{{ucfirst($cd->name)}}</option>
            @endforeach
        </select>
        @error('category_id')
            <small class="form-text text-danger">Please Select Category</small>
        @enderror
    </div>


        {{-- <div class="form-group">
            <label for="exampleInputpro_category">Category</label>
            <input type="text" name="cat" class="form-control @error('cat') border border-danger @enderror " id="exampleInputpro_category" placeholder="Category roo Category Ghal ">
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

