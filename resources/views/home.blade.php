@extends('layouts.app')

@section('title', 'Home - Welcome')

@section('content')
<div class="container">
  @auth
  <div class="d-flex justify-content-between">
    <div>
     <a href="/home/create" class="btn btn-primary"> Add Post </a>
    </div>
    <div>
        <h4 class="font-weight-bold">All Post</h4>
        <hr>
    </div>
  </div>
  @endauth

  @guest
  <div>
      <h4 class="font-weight-bold">All Post</h4>
      <hr>
  </div>
  @endguest

  <div class="row">
      @foreach ($posts as $post)
      @if (($post->aktif)===1)  
      <div class="col-sm-4 mb-3">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title font-weight-bold">{{Str::limit($post->judul,20)}}</h5>
            <p class="card-text">Nama: {{$post->user->name}}</p>
            <p class="card-text">Provinsi: {{$post->user->provinsi}}</p>
            <p class="card-text">Kota: {{$post->user->kab_kota}}</p>
            <a href="{{URL::to('/')}}/detail/{{$post->id}}" class="btn btn-block text-center btn-primary">Detail</a>
          </div>
        </div>
      </div>
      @endif
      @endforeach
  </div>
  <div class="d-flex justify-content-center">
      {{$posts->links()}}
  </div>
</div>
@endsection
