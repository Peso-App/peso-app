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
        <div>
            <h4 class="font-weight-bold">My Post</h4>
            <hr>
        </div>
            <div class="col-md-6">
                <ul class="list-group">
                    @foreach ($posts as $post)
                    @if ($post->user_id == Auth::user()->id)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="card-title text-center align-middle">{{Str::limit($post->judul,20)}}</h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            @if ($post->aktif == 0)
                            <button disabled class="btn btn-light text-center btn-sm mr-2"><strong>Selesai</strong></button>
                            @else
                            <a href="{{URL::to('/')}}/mypost/{{$post->id}}/update" class="btn text-center btn-sm btn-success mr-2">Update</a>
                            @endif
                        </div>    
                    </li>
                    @endif
                    @endforeach
                </ul>
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