@extends('layouts.app')

@section('title', 'Detail Page')

@section('content')
<div class="container">
  <div>
      <p class="" style="font-weight: 500">Posting from {{ $post->user->name }}</p>
  </div>
  @if (session('status'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('status') }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
    </div>
  @endif

  <div class="detail d-flex justify-content-center">
    <div class="col-md-6">
      <div class="card-body">
        <div  class="mb-3">
          <div class="text-center">
            <img src="{{ asset('img/featured.png') }}" alt="" title="">
          </div>
        </div>
        <h5 class="m-0 card-title">{{ $post->judul }}</h5>
        <span class="card-subtitle text-muted">{{ $post->user->provinsi }}, {{ $post->user->kab_kota }}</span>
        <h6 class="mt-2">Deskripsi masalah</h6>
        <p class="card-subtitle text-muted">{{ $post->deskripsi }}</p>
        @guest
        <a href="{{ route('login') }}" class="btn btn-primary">Login untuk tawari perbaikan</a>
        @endguest
        @auth
        @if ($post->user_id != Auth::user()->id)
        <div class="d-flex justify-content-center">
          <form action="/detail/{{ $post->id }}/transaksi" method="POST">
            @csrf
            @if (Auth::user()->keahlian === null)
            <!-- Button trigger modal -->
            <button type="button" class="mt-2 btn btn-primary" data-toggle="modal" data-target="#exampleModal">
              Tawari
            </button>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Data Anda Belum Lengkap!</h5>
                  </div>
                  <div class="modal-body">
                    Masuk ke menu profil, lengkapi data anda disana!
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn-close btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>
            @else
            <button type="submit" class="mt-2 detail-tawar btn btn-primary">Tawari</button>
            @endif
            <a href="/chatify/{{ $post->user->id }}" class="mt-2 btn detail-disk btn-primary">Diskusi</a>
          </form>
        </div>
        @else
        <a href="{{URL::to('/')}}/mypost/{{$post->id}}/update" class="btn btn-success">Update Posting</a>
        @endif
        @endauth
      </div>
    </div>
  </div>
</div>
@endsection