# Sistem Informasi Dinas Lingkungan Hidup (SDLH)

Aplikasi ini bertujuan untuk mengelola pembayaran kebersihan dari pelanggan yang terdaftar pada Dinas Lingkungan Hidup. Terdapat beberapa fitur yang mencakup aspek administrasi dan pembayaran.

## Fitur

1. **Dashboard**: Ringkasan visual dari statistik dan informasi penting.
2. **Data Pelanggan**: Manajemen data pelanggan yang terdaftar.
3. **Kategori Pelanggan**: Pengelolaan kategori pelanggan berdasarkan jenis usaha atau ukuran.
4. **Data Pembayaran**: Rekap pembayaran kebersihan secara keseluruhan.
5. **Data Pembayaran (Pelanggan)**: Histori pembayaran untuk setiap pelanggan.
6. **Profil Pembayaran**: Detail informasi tentang pelanggan.
7. **Cetak Kartu Pelanggan**: Pembuatan kartu identitas untuk pelanggan.
8. **Data Petugas**: Manajemen data petugas yang bertanggung jawab.
9. **Laporan**: Pembuatan laporan mengenai pembayaran dan aktivitas lainnya.
10. **Pembayaran Via QRCode**: Sistem pembayaran menggunakan QRCode untuk kemudahan transaksi.

## Screenshot

### 1. Dashboard

![Dashboard](screenshots/dashboard.png)

### 2. Data Pelanggan

![Data Pelanggan](screenshots/data_pelanggan.png)

### 3. Kategori Pelanggan

![Kategori Pelanggan](screenshots/kategori_pelanggan.png)

### 4. Data Pembayaran

![Data Pembayaran](screenshots/data_pembayaran.png)

### 5. Data Pembayaran (Pelanggan)

![Data Pembayaran (Pelanggan)](screenshots/data_pembayaran_pelanggan.png)

### 6. Profil Pembayaran

![Profil Pembayaran](screenshots/profil_pelanggan.png)

### 7. Cetak Kartu Pelanggan

![Cetak Kartu Pelanggan](screenshots/cetak_kartu_pelanggan.png)

### 8. Data Petugas

![Data Petugas](screenshots/data_petugas.png)

### 9. Laporan

![Laporan](screenshots/laporan.png)

### 10. Pembayaran Via QRCode

![Pembayaran Via QRCode](screenshots/pembayaran_qrcode.png)

## Instalasi

1. Clone repositori ini: `git clone https://github.com/inotechno/sdlh.git`
2. Impor struktur database dari `sdlh.sql`.
3. Konfigurasi file `application/config/database.php` untuk pengaturan koneksi database.

## Role Akses

1. **Admin**: Akses penuh ke semua fitur aplikasi.
2. **Kepala Dinas**: Akses terbatas sesuai dengan tanggung jawab kepala dinas.
3. **Pelanggan**: Akses terbatas untuk melihat dan mengelola informasi pribadi serta pembayaran.
4. **Petugas**: Akses untuk melihat dan mengelola data pelanggan, pembayaran, dan laporan.

## Kontribusi

Proyek ini terbuka untuk kontribusi. Jika Anda tertarik untuk berkontribusi atau melaporkan masalah, silakan buka issue atau pull request. Kami menyambut kontribusi Anda.

## Lisensi

Diberikan di bawah lisensi MIT - Lihat [LICENSE](LICENSE) untuk lebih lanjut.
