@extends('layouts.app')

@section('title', 'Create Post Page')

@section('content')

@auth
<div class="container">
  <div class="col d-flex justify-content-center">
    <div class="card col-md-6 p-0">
        <div class="card-header text-center py-3">
              <h5>Add Post</h5>
        </div>
      <div class="card-body">
        <form action="/home/store" method="POST">
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
              @if (Auth::user()->address === null)
              <!-- Button trigger modal -->
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Create Post
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
              <button type="submit" class="btn btn-primary">Create Post</button> 
              @endif
            </div>
          </form>
    </div>
  </div>
</div>
</div>
@endauth

@endsection