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
          @if (Auth::user()->address === null and Auth::user()->provinsi === null and Auth::user()->provinsi === null and Auth::user()->kab_kota === null and Auth::user()->no_hp === null and Auth::user()->keahlian === null and Auth::user()->jenis_bank === null and Auth::user()->no_rek === null)


          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Tawari
          </button>
          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Data Anda Belum Lengkap!</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  Masuk ke menu profil, lengkapi data anda disana!
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
          @else
          <button type="submit" class="btn btn-primary" onclick="confirm('Apakah anda yakin untuk menawarinya')">Tawari</button>
          @endif
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