@extends('layouts.app')

@section('title', 'Notification Page')

@section('content')
<div class="container">
    <div>
      <h4 class="font-weight-bold">All Notification</h4>
      <hr>
    </div>

    @foreach($transaksi as $t)
    @if($t->penyedia_id == Auth::user()->id)
    <h5 class="font-weight-bold">Notifikasi Penyedia</h5>
    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">Tanggal Transaksi</th>
          <th scope="col">Nama Klien</th>
          <th scope="col">Judul Postingan</th>
          <th scope="col">Alamat Klien</th>
          @if(!is_null($t->accepted_at))
          <th scope="col">No Telpon Klien</th>
          @endif
          <th scope="col">Status</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>{{ date('d F Y', strtotime($t->created_at)) }}</td>
          <td>{{ $t->postnya->user->name }}</td>
          <td>{{ $t->postnya->judul }}</td>
          <td>{{ $t->postnya->user->provinsi }}, {{ $t->postnya->user->kab_kota }}</td>
          @if(!is_null($t->accepted_at))
          <td>{{ $t->postnya->user->no_hp }}</td>
          @endif
          <td>{{ App\Http\Controllers\DetailController::getStatusTransaksiPenyedia($t) }}</td>
        </tr>
        @if (!is_null($t->accepted_at))
        <tr>
          @if (is_null($t->wait_at))
          <td colspan="5" class="text-center">Mohon konfirmasi anda dalam perjalanan menuju lokasi klien</td>
          <td class="text-center"><a href="{{ route('notifikasi.tungguPenyedia',$t->uuid) }}" class="btn btn-primary">Konfirmasi</a></td>
          @endif
        </tr>
        @if (!is_null($t->wait_at) && is_null($t->wait_service_at))
        <tr>
          <td colspan="5" class="text-center">Konfirmasi anda sudah sampai dan sedang memperbaiki barang klien</td>
          <td>
              <a href="{{ route('notifikasi.konfirmasiPenyedia',$t->uuid) }}" class="btn btn-success">Konfirmasi</a>
          </td>
        </tr>
        @endif
        @if (!is_null($t->already_at))
        <tr>
          <form action="" method="POST">
            <td colspan="4" class="text-center"><textarea name="" id="" cols="30" rows="3" placeholder="Masukkan keterangan ex: harga hardisk, processor dll"></textarea></td>
            <td><input type="text" name="" placeholder="Masukkan total harga"></td>
            <td>
                <button type="submit" class="btn btn-success">Konfirmasi</button>
            </td>
          </form>
        </tr>
        @endif
        @endif
      </tbody>
    </table>
    @endif
    @endforeach

    @foreach($transaksi as $t)
    @if ($t->postnya->user_id == Auth::user()->id)
    <h5 class="font-weight-bold mt-5">Notifikasi Klien</h5>
    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">Tanggal Transaksi</th>
          <th scope="col">Nama Penyedia Service</th>
          <th scope="col">Judul Postingan Anda</th>
          <th scope="col">Alamat penyedia Service</th>
          @if(!is_null($t->accepted_at))
          <th scope="col">No Telpon Penyedia</th>
          @endif
          <th scope="col">Status</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>{{ date('d F Y', strtotime($t->created_at)) }}</td>
          <td>{{ $t->penyedianya->name }}</td>
          <td>{{ $t->postnya->judul }}</td>
          <td>{{ $t->penyedianya->provinsi }}, {{ $t->penyedianya->kab_kota }}</td>
          @if(!is_null($t->accepted_at))
          <td>{{ $t->penyedianya->no_hp }}</td>
          @endif
          <td>{{ App\Http\Controllers\DetailController::getStatusTransaksiKlien($t) }}</td>
        </tr>
        @if (is_null($t->accepted_at) && is_null($t->rejected_at))
        <tr>
          <td colspan="4" class="text-center">Apakah anda menyetujui {{ $t->penyedianya->name }} untuk memperbaiki barang anda?</td>
          <td class="text-center">
            <a href="{{ route('notifikasi.terima',$t->uuid) }}" class="btn btn-primary">Setuju</a>
            <a href="{{ route('notifikasi.tolak',$t->uuid) }}" class="btn btn-danger">Tolak</a>
          </td>
        </tr>
        @endif
        @if (!is_null($t->wait_service_at) && is_null($t->already_at))
        @if (is_null($t->notyet_at))
        <tr>
          <td colspan="5" class="text-center">Apakah {{ $t->penyedianya->name }} sudah memperbaiki barang anda</td>
          <td>
            <a href="{{ route('notifikasi.sudahPerbaiki',$t->uuid) }}" class="btn btn-success"><i class="fas fa-check"></i></a>
            <a href="{{ route('notifikasi.belumPerbaiki',$t->uuid) }}" class="btn btn-danger"><i class="fas fa-times"></i></a>
          </td>
        </tr>
        @endif
        @endif
      </tbody>
    </table>
    @endif
    @endforeach
</div>
@endsection