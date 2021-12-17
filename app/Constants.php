<?php
namespace App;

class Constants
{
    // penyedia
    const STATUS_TRANSAKSI_BARU_PENYEDIA = "Menunggu persetujuan klien";
    const STATUS_TRANSAKSI_SETUJU_PENYEDIA = 'Klien menyetujui tawaran anda';
    const STATUS_TRANSAKSI_TOLAK_PENYEDIA = 'Klien menolak tawaran anda';
    const STATUS_TRANSAKSI_WAIT_AT_PENYEDIA = 'Anda sedang dalam perjalanan';
    const STATUS_TRANSAKSI_WAIT_SERVICE_AT_PENYEDIA = 'Menunggu konfirmasi klien';
    const STATUS_TRANSAKSI_ALREADY_AT_PENYEDIA = 'Menunggu konfirmasi anda';
    const STATUS_TRANSAKSI_PAY_AMOUNT_AT = 'Menunggu konfirmasi klien';

    // klien
    const STATUS_TRANSAKSI_BARU_KLIEN = 'Menunggu persetujuan anda';
    const STATUS_TRANSAKSI_SETUJU_KLIEN = 'Menunggu Teknisi datang ke lokasi anda';
    const STATUS_TRANSAKSI_TOLAK_KLIEN = 'Teknisi sedang dalam perjalanan';
    const STATUS_TRANSAKSI_WAIT_AT_KLIEN = 'Teknisi sedang dalam perjalan';
    const STATUS_TRANSAKSI_WAIT_SERVICE_AT_KLIEN = 'Menunggu konfirmasi anda';
    const STATUS_TRANSAKSI_ALREADY_AT_KLIEN = 'Menunggu Teknisi memasukkan total harga perbaikan';
}