@extends('layouts.app')

@section('title', 'Create Post Page')

@section('content')

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
                <button type="submit" class="btn btn-primary">Create Post</button> 
              </div>
            </form>
      </div>
    </div>
</div>
</div>


@endsection