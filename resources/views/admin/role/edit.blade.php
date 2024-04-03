@extends('layouts.main')
@section('content')
    <form method="post" action="/role/{{Crypt::encrypt($data->id)}}" enctype="multipart/form-data">

        @method('put')
        @csrf
        <div class="form-group" >
            <label for="name">Role Name </label>
        <input type="text" name="name" value="{{$data->name}}" class="form-control @error('name') border border-danger @enderror " id="name" placeholder="Enter Role ka New name ghalo">
        </div>
        <div class="form-group" >
            <label for="display_name">Role Name </label>
        <input type="text" name="display_name" value="{{$data->display_name}}" class="form-control @error('display_name') border border-danger @enderror " id="display_name" placeholder="Enter Role ka New name ghalo">
        </div>
        <div class="form-group">
        <label for="description">Role Desc</label>
        <input type="text" name="description" value="{{$data->description}}" class="form-control @error('description') border border-danger @enderror " id="description" placeholder="Enter Role ka Description ">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        </form>

@endsection
