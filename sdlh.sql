-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Jun 2021 pada 06.46
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ersih`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `hp` varchar(20) NOT NULL,
  `jenis_kelamin` char(1) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `foto` varchar(50) DEFAULT NULL,
  `level` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `cookie` varchar(100) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `nama_lengkap`, `email`, `hp`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `foto`, `level`, `status`, `cookie`, `created_at`) VALUES
(1, 'admin', 'a67914b3c95e94116c0d3aaebd389abce91fe7bb7fb10b7e6406030b9f5d4f8669a08c7c7c944e75eafa3af22dd6dc648cad73989ee3df4a022dad9bf8e92a68', 'BasisCoding', 'basiscoding20@gmail.com', '089676490971', 'L', 'Serang', '1997-08-20', 'Jl. Raya Cilegon Km. 03', 'admin.png', 1, 1, 'wKVlv2YM8y5SmAzxLqUeCQ9Rh1NnFEWrIajiTkKopinh50tvRI4t9OBP6ga6V1jT', '2021-06-01 20:42:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_pelanggan`
--

CREATE TABLE `kategori_pelanggan` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL,
  `nominal` int(11) NOT NULL,
  `jenis_kategori` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori_pelanggan`
--

INSERT INTO `kategori_pelanggan` (`id_kategori`, `nama_kategori`, `nominal`, `jenis_kategori`) VALUES
(3, 'Warteg', 2000, 'Hari'),
(4, 'Pedagang Kios 10 m2', 4000, 'Hari'),
(5, 'Rumah Sederhana', 5000, 'Bulan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menus`
--

CREATE TABLE `menus` (
  `id` int(11) NOT NULL,
  `nama_menu` varchar(50) NOT NULL,
  `link` text NOT NULL,
  `level` int(11) NOT NULL,
  `sub_menu` int(11) NOT NULL,
  `icon` text NOT NULL,
  `color` varchar(20) NOT NULL DEFAULT 'text-primary'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `menus`
--

INSERT INTO `menus` (`id`, `nama_menu`, `link`, `level`, `sub_menu`, `icon`, `color`) VALUES
(1, 'Dashboard', '', 1, 0, 'app', 'text-danger'),
(10, 'Master Data', '', 1, 0, 'atom', 'text-info'),
(11, 'Kategori Pelanggan', 'kategori', 1, 10, 'folder-17', ''),
(12, 'Data Petugas', 'datapetugas', 1, 10, 'circle-08', ''),
(13, 'Data Pelanggan', 'datapelanggan', 1, 10, 'circle-08', ''),
(30, 'Pembayaran', 'pembayaran', 1, 0, 'money-coins', 'text-success'),
(40, 'Cetak Kartu', 'kartupelanggan', 1, 0, 'image', 'text-danger'),
(50, 'Laporan', '', 1, 0, 'map-big', 'text-warning'),
(51, 'Laporan Harian', 'report-harian', 1, 50, '', ''),
(52, 'Laporan Per Petugas', 'report-petugas', 1, 50, '', ''),
(100, 'Dashboard', '', 2, 0, 'app', 'text-primary'),
(110, 'Profil', 'profile', 2, 0, 'circle-08', 'text-danger'),
(120, 'Pembayaran', 'pembayaran', 2, 0, 'money-coins', 'text-success'),
(130, 'Laporan', '', 2, 0, 'map-big', 'text-warning'),
(200, 'Dashboard', '', 3, 0, 'app', 'text-primary'),
(210, 'Profil', 'profile', 3, 0, 'circle-08', 'text-danger'),
(220, 'Pembayaran', 'pembayaran', 3, 0, 'money-coins', 'text-success');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `hp` varchar(20) NOT NULL,
  `jenis_kelamin` char(1) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `foto` varchar(50) DEFAULT NULL,
  `level` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `file_mou` text,
  `tanggal_mou` date DEFAULT NULL,
  `qrcode` varchar(50) DEFAULT NULL,
  `cookie` varchar(100) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `username`, `password`, `nama_lengkap`, `email`, `hp`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `foto`, `level`, `status`, `id_kategori`, `file_mou`, `tanggal_mou`, `qrcode`, `cookie`, `created_at`) VALUES
(4, 'pelanggan', '928197ba3e0ceb858946dc826a9074d6ca1fb4cb80bf137e311d751556b0588e5687e99041ca1da7124149fc017c8f6a27da716e94e0ece1ce9c8effd0c06dbc', 'Pelanggan', 'pelanggan@gmail.com', '089676490971', 'L', 'Serang', '1999-08-08', 'Jl. Raya Cilegon Km. 03', 'pelanggan.jpg', 3, 1, 3, NULL, NULL, 'pelanggan.png', 'bhQGCNYNF9WMaWVJTVRqsLSmec0Lix82rndwKEgz1KsCgHH5qnlUwj2U6t1z5tyS', '2021-06-14 04:05:28'),
(6, 'pelanggan1', '928197ba3e0ceb858946dc826a9074d6ca1fb4cb80bf137e311d751556b0588e5687e99041ca1da7124149fc017c8f6a27da716e94e0ece1ce9c8effd0c06dbc', 'Pelanggan', 'pelanggan1@gmail.com', '90812038123', 'L', 'Serang', '1999-08-08', 'klalkjsdjaklsd', 'pelanggan1.jpg', 3, 1, 3, 'pelanggan1.pdf', '2021-06-22', 'pelanggan1.png', NULL, '2021-06-14 04:18:55'),
(7, 'pelanggan2', '1583db99afec1f5aecdefa792c242751a1362c1827e8e9697afccb5dc349f1f3b6dcc4c208ea17db8b6cffa1abe7b7c49a72c613d0ec2e6956a59a461a12fbdf', 'Pelanggan 2', 'pelanggan1@gmail.com', '90810982309123', 'L', 'Serang', '1998-02-01', 'askjdlajsdklsad', 'pelanggan2.png', 3, 1, 4, 'pelanggan2.pdf', '2021-06-14', 'pelanggan2.png', NULL, '2021-06-14 04:20:52'),
(8, 'pelanggan3', '2af546ce67525b57f2661543af9e8ef10679f8d9a0f294678be161d4547f264f61c93f516ae2c640635ed7f08846ae978cffd1a674f1eb13618594b15d8e68fd', 'Pelanggan 3', 'pelanggan3@gmail.com', '0981098239123', 'L', 'Serang', '1999-08-08', 'Tekajsdkasd', 'pelanggan3.jpg', 3, 1, NULL, NULL, NULL, 'pelanggan3.png', NULL, '2021-06-14 04:24:08'),
(9, 'pelanggan4', '4ddb5a2cc9df24b9a328906f68b9df3fabec7491eee97ff13d4c728ab042671a12de7df573e0c242b66869cdf65d19998393edea25c00bd9eaaa2f86f4cd2e23', 'Pelanggan 4', 'pelanggan4@gmail.com', '01098239123', 'L', 'Serang', '1999-09-09', 'klasdklaskdjncx.,jvclier', NULL, 3, 1, NULL, NULL, NULL, 'pelanggan4.png', NULL, '2021-06-14 04:25:36'),
(10, 'pelanggan5', '1de82bedb5327c5e50e7feaf5974a602237412128342750269acb0aaea263cb342ae529c3da0a19c5df5d5b546abcb1b0b799b02be1e19fb841b454b84d7a7ba', 'Pelanggan', 'pelanggan1@gmail.com', '09809812312', 'L', 'asdasd', '2021-07-01', 'Paud Roudotul islamiyah link. ujung tebu rt.02/11', NULL, 3, 0, NULL, NULL, NULL, 'pelanggan5.png', NULL, '2021-06-14 04:34:43'),
(11, 'Pelanggan 6', 'ade186c2677770b29d3275db0877c15c2ccee2ae46f931da6a9df53b5656f4ec553312ad81b221bdc8113a9fa9afc4a12574bf1241e7c7591bfc6918280031e0', 'Pelanggan 6', 'pelanggan1@gmail.com', '8034829034', 'L', 'Serang', '2021-06-18', 'Paud Roudotul islamiyah link. ujung tebu rt.02/11', 'Pelanggan_6.jpg', 3, 1, 3, 'Pelanggan_6.pdf', '2021-06-28', 'Pelanggan 6.png', NULL, '2021-06-14 04:36:28'),
(12, 'pelan', '8b34440d92f169b39dee04261e61fd11f6bcf03131d169ed340d3df1373fcbfd8e94d711502fbe0371bccf2057caf954962a8249663ccd729cdb8d1448901c2d', 'Pelan', 'pelan@gmail.com', '9081928387', 'L', 'Serang', '1999-02-01', 'asdasdasd', 'pelan.jpg', 3, 0, NULL, NULL, NULL, 'pelan.png', 'i5MJc4NvU78CbHmnxuSeo6au8QhFlLCJsEYOpTogxYZyHfD2tqDdKldLjsX9TqE3', '2021-06-20 13:49:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_petugas` int(11) NOT NULL,
  `no_invoice` varchar(13) NOT NULL,
  `tanggal_bayar` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_pelanggan`, `id_petugas`, `no_invoice`, `tanggal_bayar`) VALUES
(1, 4, 2, 'INV1506210001', '2021-06-15 20:02:26'),
(2, 4, 2, 'INV1706210001', '2021-06-17 22:00:51'),
(5, 4, 2, 'INV1706210002', '2021-06-17 22:07:13'),
(6, 4, 2, 'INV1706210003', '2021-06-17 22:07:22'),
(7, 4, 3, 'INV1706210004', '2021-06-17 22:13:38'),
(8, 4, 3, 'INV1706210005', '2021-06-17 22:13:46'),
(9, 12, 2, 'INV2006210001', '2021-06-20 14:14:04'),
(10, 12, 2, 'INV2806210001', '2021-06-28 12:45:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `hp` varchar(20) NOT NULL,
  `jenis_kelamin` char(1) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `foto` varchar(50) DEFAULT NULL,
  `level` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `cookie` varchar(100) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`id`, `username`, `password`, `nama_lengkap`, `email`, `hp`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `foto`, `level`, `status`, `cookie`, `created_at`) VALUES
(2, 'petugas', '5bdf0b53d5f9a0c8fb3c580db2f5706c4e900937d55b62f35b428166dbda13ab298155c0b2803c30c8ee7f3d2cf2f66bb8b15bc07b639bc254ef25bbff990cb3', 'Ahmad Fatoni', 'Achmad.fatoni33@gmail.com', '089676490971', 'L', 'Serang', '1997-08-20', 'Paud Roudotul islamiyah link. ujung tebu rt.02/11', 'petugas.jpg', 2, 1, 'De09tucbMFvQK8eokSxmwX66Pr01TR2cWJdGyEbpYNwni4SjVkqjVWPNGtzFmlQf', '2021-06-12 05:33:52'),
(3, 'petugas1', '10733786082fca95aa210e0366c1d8584997d6677e0828fb745994421e36191ea3dee5cdc09bd06be4247f3e8e8ed83d9e0dda7f178077fb9a27897d4ff6d555', 'Petugas 1', 'petugas1@gmail.com', '09123123999', 'L', 'Serang', '1999-09-09', 'Jl. Raya Mana aja km mana aj', 'petugas1.png', 2, 1, 'IumgzNmX8LDMfc7BgyWdSsNOnUOJ3jAvHZc6pqTtCkCQkhbiFM854joIh2p20XSG', '2021-06-17 22:09:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_group`
--

CREATE TABLE `users_group` (
  `id_group` int(11) NOT NULL,
  `nama_group` varchar(50) NOT NULL,
  `level` int(11) NOT NULL,
  `link` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users_group`
--

INSERT INTO `users_group` (`id_group`, `nama_group`, `level`, `link`) VALUES
(1, 'Administrator', 1, 'admin'),
(2, 'Petugas', 2, 'petugas'),
(3, 'Pelanggan', 3, 'pelanggan');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategori_pelanggan`
--
ALTER TABLE `kategori_pelanggan`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indeks untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users_group`
--
ALTER TABLE `users_group`
  ADD PRIMARY KEY (`id_group`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `kategori_pelanggan`
--
ALTER TABLE `kategori_pelanggan`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users_group`
--
ALTER TABLE `users_group`
  MODIFY `id_group` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
