@extends('layouts.app')

@section('title', 'About Us')

@section('content')
<div class="container">
    <h1 class="font-weight-bold mb-3">About Us</h1>
    <hr>
    <div class="shadow p-3 mb-5 bg-white rounded">
        <div class="row">
            <div class="col-md-3">
                <img src="{{ URL::asset('img/profile/dwifahriza.png')}}" class="shadow rounded-circle" width="200" alt="...">
            </div>
            <div class="col-md-8 mt-3">
                <p class="font-weight-bold">Muhammad Dwi Fahriza</p>
                <p style="margin-top: -15px;">Full-stack Developer</p>
                <p style="margin-top: -15px;">Universitas Muhammadiyah Sukabumi</p>
                <a href="https://github.com/dwifahriza45" target="_blank" class="btn btn-dark"><i class="fab fa-github"></i> Github</a>
                <a href="https://www.linkedin.com/in/muhammad-dwi-fahriza-429110210/" target="_blank" class="btn btn-primary"><i class="fab fa-linkedin"></i> LinkedIn</a>
            </div>
        </div>
    </div>
    
    <div class="shadow p-3 mb-5 bg-white rounded">
        <div class="row">
            <div class="col-md-3">
                <img src="{{ URL::asset('img/profile/riswan.png')}}" class="shadow rounded-circle" width="200" alt="...">
            </div>
            <div class="col-md-8 mt-3">
                <p class="font-weight-bold">Riswan Gani Padilah</p>
                <p style="margin-top: -15px;">Full-stack Developer</p>
                <p style="margin-top: -15px;">Universitas Komputer Indonesia</p>
                <a href="https://github.com/riswangani" target="_blank" class="btn btn-dark"><i class="fab fa-github"></i> Github</a>
                <a href="https://www.linkedin.com/in/riswangp/" target="_blank" class="btn btn-primary"><i class="fab fa-linkedin"></i> LinkedIn</a>
            </div>
        </div>
    </div>
@endsection
