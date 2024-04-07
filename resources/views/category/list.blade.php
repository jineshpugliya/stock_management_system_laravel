@extends('layouts.main')
@section('content')

@if($msg= Session::get('success'))
<div class="alert alert-success">
<p>{{$msg}}</p>
</div>
@endif



<form method="get">
    <div class="input-group input-group-sm">
      <input class="form-control form-control-navbar" type="search" name="keyword" placeholder="Search" aria-label="Search">
      <div class="input-group-append">
        <button class="btn btn-navbar" type="submit">
          <i class="fas fa-search"></i>
        </button>
      </div>
    </div>
  </form>
    <table class="table" id='datatable'>
        <thead>
          <tr>
            <th scope="col">S.No.</th>
            <th scope="col">Name</th>
            <th scope="col">Category Desciption</th>
            {{-- <th scope="col">Category Category</th> --}}

            {{-- <th scope="col">Media</th> --}}

            <th scope="col">Action</th>
            {{-- <th scope="col">Delete</th> --}}
            <th><a href="/category/create" >Add New Column</a></th>

        </tr>

    </thead>
        <tbody>
          @foreach ($data as $dt)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$dt->name}}</td>
            <td>{{$dt->des}}</td>
            {{-- <td>{{$dt->category}}</td> --}}

            {{-- <td><img src={{Storage::url('public/media/'.$dt->media)}} alt="" height="100px" width="100px"></td> --}}
            <td>
              <!-- <h5 class="btn btn-primary"> -->
            <button class="btn btn-primary" onclick="window.location.href='/category/{{ Crypt::encrypt($dt->id) }}/edit'">Edit</button>
 
               </td>
                <td>  <form method="post" action="/category/{{Crypt::encrypt($dt->id)}}">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
                </td>

        </tr>
          @endforeach
        </tbody>
      </table>
@endsection

