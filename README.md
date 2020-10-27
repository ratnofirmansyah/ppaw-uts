## About This Repository

Ini adalah web aplikasi CRUD sederhana dengan 1 table menggunakan laravel versi 8.

## Kebutuhan server

- PHP >= 7.3
- Apache 2.4
- MySql
- Composer

## Step by Step Persiapan

- Clone github repository ke local PC didalam folder local server
- Copy file .env.example dan rename menjadi .env lalu ubah settingan dibawah seperti berikut
```text
APP_NAME=Firman
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=YOUR_DB_NAME
DB_USERNAME=YOUR_USER
DB_PASSWORD=YOUR_PASSWORD
```
- Buat database di database lokal server
- Jalankan perintah berikut untuk menginstall beberapa package yang dibutuhkan dan membuat table di database.
```text
composer install
php artisan migrate
```
- Untuk memulai menjalankan aplikasi jalankan perintah berikut
```text
php artisan serve
```