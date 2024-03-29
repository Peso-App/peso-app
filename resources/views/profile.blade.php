@extends('layouts.app')

@section('title', 'Profile Page')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-dark text-white text-center">{{ __('Profile') }}</div>
                 
                @if (session('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('status') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif

                <div class="card-body">
                    <form method="POST" action="{{ route('profile.update') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" autocomplete="name" autofocus placeholder="Ucup" @if (!is_null($user->name)) ? value="{{ $user->name }}" @else value="{{ old('name') }}" @endif >

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" autocomplete="email" placeholder="example@email.com" disabled>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Alamat Lengkap') }}</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" autocomplete="address" placeholder="Jl gagak No 2" @if (!is_null($user->address)) ? value="{{ $user->address }}" @else value="{{ old('address') }}" @endif >

                                <div class="form-row pt-2">
                                    <div class="col-md-6">
                                      <label for="inputProvince">Provinsi</label>
                                      <input type="text" class="form-control form-control @error('provinsi') is-invalid @enderror" id="inputCity" name="provinsi" @if (!is_null($user->provinsi)) ? value="{{ $user->provinsi }}" @else value="{{ old('provinsi') }}" @endif >
                                    </div>

                                    <div class="col-md-6">
                                      <label for="inputCity">Kab/Kota</label>
                                      <input type="text" class="form-control form-control @error('kabKota') is-invalid @enderror" id="inputCity" name="kabKota" @if (!is_null($user->kab_kota)) ? value="{{ $user->kab_kota }}" @else value="{{ old('kabKota') }}" @endif >
                                    </div>
                                </div>
                            </div>
                        </div>

                        

                        <div class="form-group row">
                            <label for="number" class="col-md-4 col-form-label text-md-right">{{ __('No Hp') }}</label>

                            <div class="col-md-6">
                                <input id="number" type="number" class="form-control @error('number') is-invalid @enderror" name="number" autocomplete="number" placeholder="0891 2345 6789" @if (!is_null($user->no_hp)) ? value="{{ $user->no_hp }}" @else value="{{ old('number') }}" @endif >
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="skill" class="col-md-4 col-form-label text-md-right">{{ __('Keahlian') }}</label>

                            <div class="col-md-6">
                                <input id="skill" type="text" class="form-control" name="skill" autocomplete="skill" placeholder="Teknisi Unknown" @if (!is_null($user->keahlian)) ? value="{{ $user->keahlian }}" @else value="{{ old('skill') }}" @endif >

                                <span>
                                    <strong><p style="font-size: 15px;">Isi jika anda adalah penyedia jasa service</p></strong>
                                </span>
                            </div>
                        </div>

                        <div class="form-group row" style="margin-top: -30px;">
                            <label for="jenis_bank" class="col-md-4 col-form-label text-md-right">{{ __('Jenis Bank') }}</label>

                            <div class="col-md-6">
                                <input id="jenis_bank" type="text" class="form-control @error('jenisBank') is-invalid @enderror" name="jenisBank" autocomplete="jenis_bank" placeholder="ex: BCA, BRI" @if (!is_null($user->jenis_bank)) ? value="{{ $user->jenis_bank }}" @else value="{{ old('jenisBank') }}" @endif >
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="no_rek" class="col-md-4 col-form-label text-md-right">{{ __('No Rekening') }}</label>

                            <div class="col-md-6">
                                <input id="no_rek" type="number" class="form-control @error('noRek') is-invalid @enderror" name="noRek" autocomplete="no_rek" placeholder="ex: 123X XXXX XX" @if (!is_null($user->no_rek)) ? value="{{ $user->no_rek }}" @else value="{{ old('noRek') }}" @endif>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-dark">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection