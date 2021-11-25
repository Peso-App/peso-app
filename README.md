## Tentang Peso App

Repository Peso App

## Requirement sistem

composer v^2

## Setup

- Wajib menginstall composer di perangkat anda
- Jalankan perintah dibawah ini untuk mendownload resource yang dibutuhkan

<blockquote>composer install</blockquote>

- Buatlah database baru dengan nama bebas dan kosongkan saja karena kita mau migration
- Download terlebih dahulu file env [disini](https://drive.google.com/file/d/1KOG5TRuT9BTc4BaUWIUFaIAJWLwOUMB1/view?usp=sharing)
- pindahkan file env ke paling luar folder aplikasi
- Setting dan ganti nama DB_DATABASE dengan database yang sudah kalian buat tadi
- Jalankan perintah dibawah ini untuk migration database

<blockquote>php artisan migrate</blockquote>

- Jalankan perintah dibawah ini untuk mengambil data seed

<blockquote>php artisan db:seed</blockquote>

- Jalankan perintah dibawah ini untuk menjalankan aplikasi di local

<blockquote>php artisan serve</blockquote>