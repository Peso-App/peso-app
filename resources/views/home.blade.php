@extends('layouts.app')

@section('title', 'Home - Welcome')

@section('content')
<div class="container">
  @auth
  <div class="d-flex justify-content-between">
    <div>
      <h4 class="font-weight-bold p-3">All Post</h4>
    </div>
    <div>
     <a href="{{ route('create') }}" class="btn btn-primary"> Add Post </a>
    </div>
  </div>
  @endauth
  
  <hr style="margin-top: -10px;">

  @guest
  <div>
      <h4 class="font-weight-bold">All Post</h4>
      <hr>
  </div>
  @endguest

  <div class="row">
      @foreach ($posts as $post)
      <div class="col-sm-4 mb-3">
          <img src="{{ URL::asset('img/image2.png')}}" alt="default">
          <h5 class="card-title font-weight-bold mt-2">{{Str::limit($post->judul,20)}}</h5>
          <p class="card-text">Nama: {{$post->user->name}}</p>
          <p class="card-text" style="margin-top: -15px;">Provinsi: {{$post->user->provinsi}}</p>
          <p class="card-text" style="margin-top: -15px;">Kota: {{$post->user->kab_kota}}</p>
          <a href="{{URL::to('/')}}/detail/{{$post->id}}" class="btn btn-block text-center btn-primary">Detail</a>
      </div>
      @endforeach
  </div>
  <div class="d-flex justify-content-center">
      {{$posts->links()}}
  </div>
</div>
@endsection
