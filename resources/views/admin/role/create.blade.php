@extends('layouts.main')
@section('content')
@if($msg= Session::get('msg'))
<div class="alert alert-success">
<p>{{$msg}}</p>
</div>
@endif
    <form method="post" action="/role" >
        @csrf
        <div class="form-group" >
            <label for="name"> Enter Role Name</label>
        <input type="text" name="name" class="form-control @error('name') border border-danger @enderror " id="name" placeholder="Enter Role Name">
    </div>
    <div class="form-group" >
        <label for="display_name"> Enter Role Display Name</label>
    <input type="text" name="display_name" class="form-control @error('display_name') border border-danger @enderror " id="display_name" placeholder="Enter Role Description">
</div>
        <div class="form-group">
        <label for="description">Enter Role Description</label>
        <input type="text" name="description" class="form-control @error('description') border border-danger @enderror " id="description" placeholder="Enter Description Name ">
        </div>
        <button type="submit" class="btn btn-primary">Submit.</button>
        </form>

@endsection

