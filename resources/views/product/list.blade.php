@extends('layouts.main')
@section('content')

@if($msg= Session::get('success'))
<div class="alert alert-success">
<p>{{$msg}}</p>
</div>
@endif



    <table class="table" >
        <thead>
          <tr>
            <th scope="col">S.No.</th>
            <th scope="col">Name</th>
            <th scope="col">description</th>
            <th scope="col">Category Name</th>
            <th scope="col">SubCategory Name</th>


            {{-- <th scope="col">Media</th> --}}

            <th scope="col">Action</th>
            {{-- <th scope="col">Delete</th> --}}
    <th><a href="/product/create" >Add New Column</a></th>

        </tr>

    </thead>
        <tbody>
          @foreach ($data as $cd)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$cd->name}}</td>
            <td>{{$cd->description}}</td>
            <td>{{$cd->category->name??'N/A'}}</td>
            <td>{{$cd->subcategory->name??'N/A'}}</td>

            {{-- <td>{{$cd->product}}</td> --}}

            {{-- <td><img src={{Storage::url('public/media/'.$cd->media)}} alt="" height="100px" width="100px"></td> --}}
            <td><h5 class="btn btn-primary">
                <a href="/product/{{Crypt::encrypt($cd->id)}}/edit">Edit</a>  </td>
                <td>  <form method="post" action="/product/{{Crypt::encrypt($cd->id)}}">
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

