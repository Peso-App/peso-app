@extends('layouts.app')

@section('title', 'Home - Welcome')

@section('content')
@guest
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are not log in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endguest

@auth
<div class="container">
    <button type="button" class="btn mb-3 btn-primary btn-lg">Add Postingan</button>
    
        {{-- <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div> --}}

          <div class="row">
            <div class="col-sm-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Special title treatment</h5>
                  <p class="card-text">Riswan Gani</p>
                  <p class="card-text">Jawa Barat</p>
                  <p class="card-text">Bandung</p>
                  <a href="#" class="btn btn-block text-center btn-primary">Detail</a>
                </div>
              </div>
            </div>
          </div>


    
</div>
@endauth
@endsection
