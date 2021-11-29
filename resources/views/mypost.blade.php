@extends('layouts.app')

@section('title', 'My Post Page')

@section('content')
    @auth
    <div class="container">
        <div class="row">
            {{-- @foreach ($posts as $post) --}}
            <div class="col-sm-4 mb-3">
              <div class="card">
                <div class="card-body">
                    <div>
                        <h5 class="card-title text-center font-weight-bold">Judul</h5>
                    </div>
                  <a href="#" class="btn btn-block text-center btn-success">Edit</a>
                  <a href="#" class="btn btn-block text-center btn-danger">Hapus</a>
                </div>
              </div>
            </div>
            {{-- @endforeach --}}
        </div>
    </div>
    @endauth
    @guest
    <div class="container">
        <div class="alert alert-danger">
            <div class="d-flex justify-content-center">
                <div><p>You Are Not Login</p></div>
            </div>
        </div>  
    </div>
    @endguest


@endsection