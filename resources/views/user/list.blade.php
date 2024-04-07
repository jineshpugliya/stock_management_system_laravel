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
    <table class="table" id='example'>
        <thead>
          <tr>
            <th scope="col">S.No.</th>
            <th scope="col">Name</th>
            <th scope="col">E-mail</th>
            {{-- <th scope="col">E-mail verified</th> --}}
            {{-- <th scope="col">Remember_token</th>
            <th scope="col">Password</th> --}}

            <th scope="col">Action</th>
            <th><a href="/user/create" >Add New Column</a></th>

        </tr>

    </thead>
        <tbody>
          @foreach ($data as $dt)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$dt->name}}</td>
            <td>{{$dt->email}}</td>
            {{-- <td>{{$dt->email_verified_at??'NULL'}}</td> --}}
            {{-- <td>{{$dt->remember_token??'NULL'}}</td>
            <td>{{Crypt::encrypt($dt->password)}}</td> --}}

            {{-- <td>{{$dt->user}}</td> --}}

            {{-- <td><img src={{Storage::url('public/media/'.$dt->media)}} alt="" height="100px" width="100px"></td> --}}
            <td>
              <!-- <h5 class="btn btn-primary"> -->
            <button class="btn btn-primary"  onclick="window.location.href='/user/{{Crypt::encrypt($dt->id)}}/edit'">Edit</button>  </td>
                <td>  <form method="post" action="/user/{{Crypt::encrypt($dt->id)}}">
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

