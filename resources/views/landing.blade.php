@extends('layouts.app')

@section('title', 'Landing Page')

@section('jumbotron')
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-5 text-light">Solusi service elektronik, <br>Bersama kami</h1>
    @guest
    <a href="{{ route('register') }}" class="btn btn-primary"><strong>Daftar Sekarang</strong></a>
    @else
    <a href="{{ route('home') }}" class="btn btn-primary"><strong>Buat postingan</strong></a>
    @endguest
  </div>
</div>
@endsection

@section('content')
<div class="container">
  <h2 class="mb-4">Populer Issues</h2>

  <div class="row">
      <div class="col-sm-4 mb-3">
        <div class="card-image">
          <div class="card-text">
            <p class="text-light font-weight-bold btn btn-primary">AC</p>
            <div class="px-4">
              <h2 class="text-light">Serivce AC Rusak</h2>
              <p class="text-light text-size">Bandung, Jawa Barat</p>
            </div>
          </div>
        </div>
      </div>

      <div class="col-sm-4 mb-3">
        <div class="card-image">
          <div class="card-text">
            <p class="text-light font-weight-bold btn btn-primary">AC</p>
            <div class="px-4">
              <h2 class="text-light">Serivce AC Rusak</h2>
              <p class="text-light text-size">Bandung, Jawa Barat</p>
            </div>
          </div>
        </div>
      </div>

      <div class="col-sm-4 mb-3">
        <div class="card-image">
          <div class="card-text">
            <p class="text-light font-weight-bold btn btn-primary">AC</p>
            <div class="px-4">
              <h2 class="text-light">Serivce AC Rusak</h2>
              <p class="text-light text-size">Bandung, Jawa Barat</p>
            </div>
          </div>
        </div>
      </div>
  </div>

  <div class="row">
      <div class="col-sm-4 mb-3">
        <div class="card-image">
          <div class="card-text">
            <p class="text-light font-weight-bold btn btn-primary">AC</p>
            <div class="px-4">
              <h2 class="text-light">Serivce AC Rusak</h2>
              <p class="text-light text-size">Bandung, Jawa Barat</p>
            </div>
          </div>
        </div>
      </div>

      <div class="col-sm-4 mb-3">
        <div class="card-image">
          <div class="card-text">
            <p class="text-light font-weight-bold btn btn-primary">AC</p>
            <div class="px-4">
              <h2 class="text-light">Serivce AC Rusak</h2>
              <p class="text-light text-size">Bandung, Jawa Barat</p>
            </div>
          </div>
        </div>
      </div>

      <div class="col-sm-4 mb-3">
        <div class="card-image">
          <div class="card-text">
            <p class="text-light font-weight-bold btn btn-primary">AC</p>
            <div class="px-4">
              <h2 class="text-light">Serivce AC Rusak</h2>
              <p class="text-light text-size">Bandung, Jawa Barat</p>
            </div>
          </div>
        </div>
      </div>
  </div>
</div>
@endsection
