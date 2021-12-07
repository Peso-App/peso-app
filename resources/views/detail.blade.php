@extends('layouts.app')

@section('title', 'Detail Page')

@section('content')
<div class="container">
  <div>
      <h4 class="font-weight-bold">Posting from {{ $post->user->name }}</h4>
      <hr>
  </div>
  @if (session('status'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('status') }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
    </div>
  @endif
  <div class="card col-md-6">
    <div class="card-body">
      <h5 class="card-title">{{ $post->judul }}</h5>
      <h6 class="card-subtitle mb-2 text-muted">{{ $post->user->provinsi }}, {{ $post->user->kab_kota }}</h6>
      <p class="card-text">{{ $post->deskripsi }}</p>
      @auth
        @if ($post->user_id != Auth::user()->id)
        <form action="/detail/{{ $post->id }}/transaksi" method="POST">
          @csrf
          <button type="submit" class="btn btn-primary" onclick="confirm('Apakah anda yakin untuk menawarinya')">Tawari</button>
          <a href="/chatify/{{ $post->user->id }}" class="btn btn-primary">Diskusi</a>
        </form>
        @else
        <a href="{{URL::to('/')}}/mypost/{{$post->id}}/update" class="btn btn-success">Update Posting</a>
        @endif
      @endauth
    </div>
  </div>
</div>
@endsection