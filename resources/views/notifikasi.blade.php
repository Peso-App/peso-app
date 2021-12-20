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
        @if (!is_null($t->already_at) && is_null($t->pay_amount_at))
        <tr>
          <td colspan="6" class="text-center font-weight-bold" style="border-style: hidden; color: #152B5B; font-size: 42px;" class="notif_rincian_harga">Rincian Pembayaran</td>
        </tr>
        <tr>
          <td colspan="6" class="text-center font-weight-bold" style="border-style: hidden; color: #B0B0B0; font-size: 18px;" class="notif_rincian_harga">Masukkan rincian total dibawah!</td>
        </tr>
        <tr>
          <td colspan="6" class="text-center font-weight-bold" style="border-style: hidden; color: #152B5B; font-size: 18px;" class="notif_rincian_harga">Rincian barang dan harga</td>
        </tr>
        <tr>
          <form action="{{ route('notifikasi.bayar',$t->uuid) }}" method="POST">
            @csrf
            <td></td>
            <td colspan="4"><textarea class="form-control form-pembayaran @error('keterangan') is-invalid @enderror" name="keterangan" style="height: 170px;" placeholder="Masukkan keterangan ex: harga hardisk, processor dll"></textarea></td>
        </tr>
        <tr>
            <td style="border-style: hidden;"></td>
            <td style="border-style: hidden;" class="p-4">Total:</td>
            <td style="border-style: hidden;"></td>
            <td style="border-style: hidden;"></td>
            <td style="border-style: hidden;"><input type="number" class="form-control form-harga @error('harga') is-invalid @enderror" name="harga"></td>
        </tr>
        <tr>
            <td></td>
            <td colspan="4" style="border-style: hidden;">
                <button type="submit" class="btn btn-success btn-block">{{ __('Konfirmasi') }}</button>
            </td>
          </form>
        </tr>
        @endif
        @endif
        @if (!is_null($t->pay_amount_at) && is_null($t->paid_at))
        <tr>
          <td colspan="6" class="text-center" style="border-style: hidden; color: #152B5B; font-size: 20px;">menunggu klien melakukan pembayaran.....</td>
        </tr>
        @endif
        @if (!is_null($t->paid_at) && is_null($t->wait_paid_at))
        <tr>
          <td colspan="5" class="text-center" style="font-size: 20px;">Mohon konfirmasi bahwa klien sudah melakukan pembayaran</td>
          <td>
            <a href="{{ route('notifikasi.bayar.konfirmasi',$t->uuid) }}" class="btn btn-success">Konfirmasi</a>
          </td>
        </tr>
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
            <a href="{{ route('notifikasi.terima',$t->uuid) }}" class="btn btn-success">Ya</a>
            <a href="{{ route('notifikasi.tolak',$t->uuid) }}" class="btn btn-danger">Tidak</a>
          </td>
        </tr>
        @endif
        @if (!is_null($t->wait_service_at) && is_null($t->already_at))
        <tr>
          <td colspan="5" class="text-center">Mohon konfirmasi {{ $t->penyedianya->name }} sudah memperbaiki barang</td>
          <td>
            <a href="{{ route('notifikasi.sudahPerbaiki',$t->uuid) }}" class="btn btn-success">Konfirmasi</a>
          </td>
        </tr>
        @endif
        @if (!is_null($t->pay_amount_at) && is_null($t->paid_at))
        <tr>
          <td colspan="5"></td>
          <td class="text-center">
            <button type="button" class="btn btn-success btn-block" data-toggle="modal" data-target="#exampleModal">Bayar</button>
          </td>
        </tr>
        @endif
      </tbody>
    </table>
    @endif
    @endforeach

    <!-- Modal Bayar -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">pesoApps</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <h6 style="font-size: 24px; color: #152B5B;">Transfer pembayaran ke Teknisi</h6>

            <p>Metode pembayaran Transfer</p>
            <p class="mt-3">Jenis bank : <b>{{ $t->penyedianya->jenis_bank }}</b></p>
            <p style="margin-top: -15px;">No Rekening: <b>{{ $t->penyedianya->no_rek }}</b></p>
            <p><strong>Keterangan perbaikan:</strong></p>
            <p style="margin-top: -10px;">{{ $t->keterangan }}</p>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;Mohon untuk segera melakukan pembayaran ke no Rekening <strong>{{ $t->penyedianya->no_rek }}</strong> atas nama <strong>{{ $t->penyedianya->name }}</strong> sejumlah <strong>Rp. {{ $t->harga }}</strong></p>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <a href="{{ route('notifikasi.bayar.bank',$t->uuid) }}" class="btn btn-primary">Bayar</a>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection