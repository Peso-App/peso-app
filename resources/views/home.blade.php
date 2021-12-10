@extends('layouts.app')

@section('title', 'Home - Welcome')

@section('content')
<div class="container">
  @auth
  <div class="d-flex justify-content-between">
    <div>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add post </button>
    </div>
    <div>
        <h4 class="font-weight-bold">All Post</h4>
        <hr>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add Post</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="/home" method="POST">
              @csrf
              <div class="modal-body">
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Judul</label>
                  <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" id="recipient-name">
                  @error('judul')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="message-text" class="col-form-label">Deskripsi</label>
                  <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" id="message-text"></textarea>
                  @error('deskripsi')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                <button type="submit" class="btn btn-primary">Post</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </form>
          </div>
      </div>
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
            <h5 class="card-title font-weight-bold">{{Str::limit($post->judul,25)}}</h5>
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
