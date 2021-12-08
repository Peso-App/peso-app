<?php

namespace App\Http\Controllers;

use App\Constants;
use App\Post;
use App\Transaksi;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Ramsey\Uuid\Uuid;



class DetailController extends Controller
{
    public function index($id)
    {
        $post = Post::where('id', $id)->firstOrFail();
        return view('detail', compact('post'));
    }

    public function history()
    {
        $transaksi = Transaksi::All();
        
        return view('notifikasi', compact('transaksi'));
    }

    public static function getStatusTransaksiPenyedia($transaksi)
    {
        $status = Constants::STATUS_TRANSAKSI_BARU_PENYEDIA;

        if(!is_null($transaksi->accepted_at)) {
            $status = Constants::STATUS_TRANSAKSI_SETUJU_PENYEDIA;
        }else if(!is_null($transaksi->rejected_at)) {
            $status = Constants::STATUS_TRANSAKSI_TOLAK_PENYEDIA;
        }

        if (!is_null($transaksi->wait_at)) {
            $status = Constants::STATUS_TRANSAKSI_WAIT_AT_PENYEDIA;
        }

        if (!is_null($transaksi->wait_service_at)) {
            $status = Constants::STATUS_TRANSAKSI_WAIT_SERVICE_AT_PENYEDIA;
        }

        if (!is_null($transaksi->already_at)) {
            $status = Constants::STATUS_TRANSAKSI_ALREADY_AT_PENYEDIA;
        }

        if (!is_null($transaksi->notyet_at)) {
            $status = 'Belum diatur';
        }

        if (!is_null($transaksi->pay_amount_at)) {
            $status = 'Menunggu Klien melakukan pembayaran';
        }

        if (!is_null($transaksi->paid_at)) {
            $status = 'Klien sudah melakukan pembayaran';
        }

        if (!is_null($transaksi->wait_paid_at)) {
            $status = 'perbaikan selesai';
        }

        return $status;
    }

    public static function getStatusTransaksiKlien($transaksi)
    {
        $status = Constants::STATUS_TRANSAKSI_BARU_KLIEN;

        if(!is_null($transaksi->accepted_at)) {
            $status = Constants::STATUS_TRANSAKSI_SETUJU_KLIEN;
        }else if(!is_null($transaksi->rejected_at)) {
            $status = Constants::STATUS_TRANSAKSI_TOLAK_KLIEN;
        }

        if (!is_null($transaksi->wait_at)) {
            $status = Constants::STATUS_TRANSAKSI_WAIT_AT_KLIEN;
        }

        if (!is_null($transaksi->wait_service_at)) {
            $status = Constants::STATUS_TRANSAKSI_WAIT_SERVICE_AT_KLIEN;
        }

        if (!is_null($transaksi->already_at)) {
            $status = Constants::STATUS_TRANSAKSI_ALREADY_AT_KLIEN;
        }

        if (!is_null($transaksi->notyet_at)) {
            $status = 'Belum diatur';
        }

        if (!is_null($transaksi->pay_amount_at)) {
            $status = 'Mohon untuk segera melakukan pembayaran';
        }

        if (!is_null($transaksi->paid_at)) {
            $status = 'Berhasil, anda sudah melakukan pembayaran';
        }

        if (!is_null($transaksi->wait_paid_at)) {
            $status = 'perbaikan selesai';
        }

        return $status;
    }

    public function terima($uuid) {
        return $this->terimaTolak($uuid, true);
    }

    public function tolak($uuid) {
        return $this->terimaTolak($uuid, false);
    }

    private function terimaTolak($uuid, $terima) {
        $transaksi = Transaksi::where('uuid', $uuid)->first();

        if (!$transaksi) {
            throw new ModelNotFoundException("transaksi tidak ditemukan");
        }

        if ($terima) {
            $transaksi->accepted_at = date('Y-m-d H:i:s');
        }
        else {
            $transaksi->rejected_at = date('Y-m-d H:i:s');
        }
        
        $transaksi->save();
        return redirect('notifikasi');
    }

    public function tungguPenyedia($uuid) {
        $transaksi = Transaksi::where('uuid', $uuid)->first();

        if (!$transaksi) {
            throw new ModelNotFoundException("transaksi tidak ditemukan");
        }

        $transaksi->wait_at = date('Y-m-d H:i:s');
        $transaksi->save();

        return redirect('notifikasi');
    }

    public function konfirmasiPenyedia($uuid)
    {
        $transaksi = Transaksi::where('uuid', $uuid)->first();

        if (!$transaksi) {
            throw new ModelNotFoundException("transaksi tidak ditemukan");
        }

        $transaksi->wait_service_at = date('Y-m-d H:i:s');
        $transaksi->save();

        return redirect('notifikasi');
    }

    public function sudahPerbaiki($uuid)
    {
        $transaksi = Transaksi::where('uuid', $uuid)->first();

        if (!$transaksi) {
            throw new ModelNotFoundException("transaksi tidak ditemukan");
        }

        $transaksi->already_at = date('Y-m-d H:i:s');
        $transaksi->save();

        return redirect('notifikasi');
    }

    public function belumPerbaiki($uuid)
    {
        $transaksi = Transaksi::where('uuid', $uuid)->first();

        if (!$transaksi) {
            throw new ModelNotFoundException("transaksi tidak ditemukan");
        }

        $transaksi->notyet_at = date('Y-m-d H:i:s');
        $transaksi->save();

        return redirect('notifikasi');
    }

    public function deskripsiDanHarga($uuid, Request $request)
    {
        $transaksi = Transaksi::where('uuid', $uuid)->first();

        if (!$transaksi) {
            throw new ModelNotFoundException("transaksi tidak ditemukan");
        }

        $request->validate([
            'keterangan' => ['required'],
            'harga' => ['required'],
        ]);

        $transaksi->keterangan = $request->input('keterangan');
        $transaksi->harga = $request->input('harga');
        $transaksi->pay_amount_at = date('Y-m-d H:i:s');
        $transaksi->save();

        return redirect('notifikasi');
    }

    public function bayarKlien($uuid)
    {
        $transaksi = Transaksi::where('uuid', $uuid)->first();

        if (!$transaksi) {
            throw new ModelNotFoundException("transaksi tidak ditemukan");
        }

        $transaksi->paid_at = date('Y-m-d H:i:s');
        $transaksi->save();

        return redirect('notifikasi');
    }

    public function konfirmasiBayarPenyedia($uuid)
    {
        $transaksi = Transaksi::where('uuid', $uuid)->first();

        if (!$transaksi) {
            throw new ModelNotFoundException("transaksi tidak ditemukan");
        }

        $transaksi->wait_paid_at = date('Y-m-d H:i:s');
        $transaksi->save();

        return redirect('notifikasi');
    }

    public function store($id)
    {
        
        $transaksi = Transaksi::create([
            'penyedia_id' => Auth::user()->id,
            'post_id' => $id,
            'uuid' => Uuid::uuid4()
        ]);

        $transaksi->save();
        return redirect()->route('notifikasi')->with('success', 'Berhasil mengirimkan Tawaran');
    }
}