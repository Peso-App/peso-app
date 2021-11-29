@extends('layouts.app')

@section('title', 'My Post Page')

@section('content')
    @auth
    <div class="container">
        @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('status') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        <div class="row">
            @foreach ($posts as $post)
            @if ($post->user_id == Auth::user()->id)
            <div class="col-sm-4 mb-3">
              <div class="card">
                <div class="card-body">
                    <div>
                        <h5 class="card-title text-center font-weight-bold">{{Str::limit($post->judul,15)}}</h5>
                    </div>
                  <a href="{{URL::to('/')}}/mypost/{{$post->id}}/update" class="btn btn-block text-center btn-success">Edit</a>
                  <a href="#" class="btn btn-block text-center btn-danger">Hapus</a>
                </div>
              </div>
            </div>
            @endif
            @endforeach
        </div>
    </div>
    @endauth
    @guest
    <div class="container">
        <div class="alert alert-danger">
            <div class="d-flex justify-content-center">
                <div><p>You are not login!</p></div>
            </div>
        </div>  
    </div>
    @endguest


@endsection