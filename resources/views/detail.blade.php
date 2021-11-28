@extends('layouts.app')

@section('title', 'Detail Page')

@section('content')
<div class="container">
  <div>
      <h4 class="font-weight-bold">Posting from {{ $post->user->name }}</h4>
      <hr>
  </div>
  <div class="card col-md-6">
    <div class="card-body">
      <h5 class="card-title">{{ $post->judul }}</h5>
      <h6 class="card-subtitle mb-2 text-muted">{{ $post->user->provinsi }}, {{ $post->user->kab_kota }}</h6>
      <p class="card-text">{{ $post->deskripsi }}</p>
      @auth
        <a href="#" class="btn btn-primary">Apply</a>
        <a href="#" class="btn btn-primary">Diskusi</a>
      @endauth
    </div>
  </div>
</div>
@endsection