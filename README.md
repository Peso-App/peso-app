## Tentang Peso App

Repository Peso App

## Requirement sistem

composer v^2

## Setup

-   Wajib menginstall composer di perangkat anda
-   Jalankan perintah dibawah ini untuk mendownload resource yang dibutuhkan

<blockquote>composer install</blockquote>

-   Buatlah database baru dengan nama bebas dan kosongkan saja karena kita mau migration
-   Download terlebih dahulu file env [disini](https://drive.google.com/file/d/1KOG5TRuT9BTc4BaUWIUFaIAJWLwOUMB1/view?usp=sharing)
-   pindahkan file env ke paling luar folder aplikasi
-   Setting dan ganti nama DB_DATABASE dengan database yang sudah kalian buat tadi
-   Daftar Realtime Api puhser terlebih dahulu agar bisa menggunakan fitur diskusi [disini](https://pusher.com/)
-   lalu di folder .env ubah nilai dari PUSHER_APP_ID, PUSHER_APP_KEY, PUSHER_APP_SECRET, PUSHER_APP_CLUSTER, dengan nilai yang kamu daftarkan di website pusher
-   Jalankan perintah dibawah ini untuk migration database

<blockquote>php artisan migrate:refresh</blockquote>

-   Jalankan perintah dibawah ini untuk mengambil data seed

<blockquote>php artisan db:seed</blockquote>

-   Jalankan perintah dibawah ini untuk menjalankan aplikasi di local

<blockquote>php artisan serve</blockquote>

## Note
- Jika fitur diskusi ter connect tapi tidak menampilkan diskusi yang dituju
- Masukkan perintah dibawah ini

<blockquote>php artisan chatify:install</blockquote>

- Jika disuruh untuk menimpa file maka pilih lah yes jika ada pertanyaan
