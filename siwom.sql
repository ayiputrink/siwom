-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Apr 2020 pada 21.23
-- Versi server: 10.4.8-MariaDB
-- Versi PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siwom`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `administrator`
--

CREATE TABLE `administrator` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `administrator`
--

INSERT INTO `administrator` (`id_admin`, `nama`, `username`, `password`, `foto`, `created_at`) VALUES
(1, 'Ayi', 'ayiputrink', '123456', NULL, '2020-03-04 05:45:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `assign_jobdesk`
--

CREATE TABLE `assign_jobdesk` (
  `id_assign` int(11) NOT NULL,
  `id_jobdesk` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `lampiran` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `assign_jobdesk`
--

INSERT INTO `assign_jobdesk` (`id_assign`, `id_jobdesk`, `deskripsi`, `lampiran`, `created_at`) VALUES
(1, 14, 'oke', '15ef89c56fb9ac73cc3ba35786dd4a29.zip', '2020-04-10 16:44:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bagian`
--

CREATE TABLE `bagian` (
  `id_bagian` int(11) NOT NULL,
  `id_divisi` int(11) NOT NULL,
  `nama_bagian` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `bagian`
--

INSERT INTO `bagian` (`id_bagian`, `id_divisi`, `nama_bagian`) VALUES
(1, 1, 'Legal'),
(2, 1, 'Komunikasi Korporasi'),
(4, 1, 'Program Kemitraan & Bina Lingkungan'),
(5, 2, 'Pengawasan Keuangan'),
(6, 2, 'Pengawasan Operasional'),
(7, 3, 'Penjamin Mutu'),
(8, 3, 'Penjamin Sistem'),
(9, 3, 'Penjamin K3L'),
(10, 4, 'Keuangan'),
(11, 4, 'Akuntansi'),
(12, 4, 'Perpajakan'),
(13, 5, 'Sumber Daya Manusia'),
(14, 5, 'Urusan Umum'),
(15, 9, 'Pemasaran & Penjualan'),
(16, 9, 'Rekayasa Sistem'),
(17, 9, 'Komersial'),
(18, 10, 'Pemasaran & Penjualan'),
(19, 10, 'Rekayasa Sistem'),
(20, 10, 'Komersial'),
(21, 11, 'Rekayasa Sistem'),
(22, 11, 'Komersial'),
(23, 11, 'Operasi Matra Darat'),
(24, 11, 'Operasi Matra Laut'),
(25, 11, 'Operasi Matra Udara'),
(26, 12, 'Pemasaran & Penjualan'),
(27, 12, 'Rekayasa Industri & Jasa Produksi'),
(28, 12, 'Perencanaan Pengendalian Produksi'),
(29, 6, 'Pengembangan Bisnis dan Akuntansi'),
(30, 6, 'Produk Hankam & TIKN'),
(31, 6, 'Produk Perkeretaapian'),
(32, 6, 'Produk Energi dan Traksi'),
(33, 7, 'Perencanaan & Pengendalian Logistik'),
(34, 7, 'Operasi Logistik'),
(35, 7, 'Persediaan & Operasi Gudang'),
(36, 8, 'Perencanaan & Evaluasi Korporasi'),
(37, 8, 'Sistem Informasi'),
(38, 12, 'Rekayasa Sistem'),
(39, 12, 'Komersial'),
(40, 12, 'Manajemen Proyek'),
(41, 13, 'Pemasaran dan Penjualan'),
(42, 13, 'Rekayasa Industri & Jasa Produksi'),
(43, 13, 'Perencanaan Pengendalian Produksi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `divisi`
--

CREATE TABLE `divisi` (
  `id_divisi` int(11) NOT NULL,
  `nama_divisi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `divisi`
--

INSERT INTO `divisi` (`id_divisi`, `nama_divisi`) VALUES
(1, 'Sekretaris Perusahaan'),
(2, 'Satuan Pengawasan Internal'),
(3, 'Divisi Penjamin Mutu'),
(4, 'Divisi Keuangan & Akuntansi'),
(5, 'Divisi Sumber Daya Manusia & Umum'),
(6, 'Divisi Pengembangan Bisnis & Teknologi'),
(7, 'Divisi Logistik'),
(8, 'Divisi Manajemen Strategi dan Operasi'),
(9, 'UB Energi & Sistem Daya'),
(10, 'UB Sistem Transportasi'),
(11, 'UB Elektronika Pertahanan'),
(12, 'UB Teknologi Informasi, Komunikasi dan Navigasi'),
(13, 'UB Industri');

-- --------------------------------------------------------

--
-- Struktur dari tabel `item_jobdesk`
--

CREATE TABLE `item_jobdesk` (
  `id_item_jobdesk` int(11) NOT NULL,
  `id_jobdesk` int(11) NOT NULL,
  `isi_item` text NOT NULL,
  `status_item` enum('belum selesai','selesai') NOT NULL DEFAULT 'belum selesai',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `item_jobdesk`
--

INSERT INTO `item_jobdesk` (`id_item_jobdesk`, `id_jobdesk`, `isi_item`, `status_item`, `created_at`) VALUES
(1, 14, 'coba', 'belum selesai', '2020-04-10 19:08:51'),
(2, 14, 'masih', 'belum selesai', '2020-04-10 19:14:51'),
(3, 14, 'cool', 'belum selesai', '2020-04-10 19:15:28'),
(4, 14, 'masih ada', 'belum selesai', '2020-04-10 19:15:49');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `nama_jabatan`) VALUES
(1, 'Karyawan'),
(2, 'Manajer');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobdesk`
--

CREATE TABLE `jobdesk` (
  `id_jobdesk` int(11) NOT NULL,
  `dari` int(11) NOT NULL,
  `kepada` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `lampiran` varchar(100) DEFAULT NULL,
  `status_jobdesk` enum('belum selesai','selesai') NOT NULL DEFAULT 'belum selesai',
  `deadline` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jobdesk`
--

INSERT INTO `jobdesk` (`id_jobdesk`, `dari`, `kepada`, `judul`, `deskripsi`, `lampiran`, `status_jobdesk`, `deadline`, `created_at`) VALUES
(1, 1, 2, '', 'Buat', NULL, 'belum selesai', '2020-03-24', '2020-03-20 03:26:50'),
(2, 1, 2, 'oke', 'des', NULL, 'belum selesai', NULL, '2020-03-20 03:20:01'),
(3, 0, 3, 'bersih', 'korona', '5e55c8c3ac84dd2b229a8d71a778540d.zip', 'belum selesai', NULL, '2020-03-20 11:07:27'),
(4, 0, 3, 'bersih', 'korona', '8e5e8d3b68add2caefbc62504d33a44c.zip', 'belum selesai', NULL, '2020-03-20 11:08:11'),
(5, 0, 3, 'baru', 'boleh', NULL, 'belum selesai', NULL, '2020-03-20 14:13:54'),
(6, 0, 3, 'masih percobaan', 'lagi', NULL, 'belum selesai', NULL, '2020-03-20 14:16:50'),
(7, 0, 3, 'coba tanggal', 'good', NULL, 'belum selesai', '2020-04-16', '2020-04-08 06:22:02'),
(8, 1, 3, 'makin banyak', 'boleh jobdesk', NULL, 'belum selesai', '2020-04-30', '2020-04-09 15:02:56'),
(9, 1, 0, 'cuci baju', 'cuci baju', NULL, 'belum selesai', '2020-04-07', '2020-04-09 15:26:39'),
(10, 1, 0, 'cuci', '', NULL, 'belum selesai', '2020-04-06', '2020-04-09 15:28:15'),
(11, 1, 3, 'cuci', '', NULL, 'belum selesai', '0000-00-00', '2020-04-09 15:37:11'),
(12, 1, 3, 'basmi covid 19', '', NULL, 'belum selesai', '2020-04-01', '2020-04-09 15:43:12'),
(13, 1, 3, 'berat', 'coba aja', NULL, 'belum selesai', '2020-05-31', '2020-04-10 08:02:49'),
(14, 1, 3, 'masa ', 'iya', '4bde08c2ec056a4a6e23f15edcc07f1c.zip', 'belum selesai', '2020-04-12', '2020-04-10 08:05:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentar_jobdesk`
--

CREATE TABLE `komentar_jobdesk` (
  `id_komentar` int(11) NOT NULL,
  `id_jobdesk` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `isi_komentar` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `komentar_jobdesk`
--

INSERT INTO `komentar_jobdesk` (`id_komentar`, `id_jobdesk`, `id_user`, `isi_komentar`, `created_at`) VALUES
(1, 0, 0, 'oke', '2020-04-10 18:27:08'),
(2, 14, 3, 'bagus juga', '2020-04-10 18:40:07'),
(3, 14, 3, 'bagus juga', '2020-04-10 18:40:42'),
(4, 14, 3, 'kwkwkwkkw', '2020-04-10 18:40:53'),
(5, 14, 3, 'ntaps', '2020-04-10 18:44:54'),
(6, 14, 3, 'go', '2020-04-10 19:00:06'),
(7, 14, 3, 'keren banget', '2020-04-10 19:01:04'),
(8, 14, 1, 'wah hebat', '2020-04-10 19:02:50'),
(9, 14, 1, 'semoga tambah keren', '2020-04-10 19:16:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `notifikasi`
--

CREATE TABLE `notifikasi` (
  `id_notifikasi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `isi_notifikasi` varchar(50) NOT NULL,
  `link` varchar(150) DEFAULT NULL,
  `status_notifikasi` enum('diterima','dibaca') NOT NULL DEFAULT 'diterima',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nik` int(11) DEFAULT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` text DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `id_jabatan` int(11) DEFAULT NULL,
  `id_divisi` int(11) DEFAULT NULL,
  `id_bagian` int(11) DEFAULT NULL,
  `nametag` varchar(100) DEFAULT NULL,
  `status` enum('unverified','active','suspend') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nik`, `nama`, `alamat`, `email`, `password`, `id_jabatan`, `id_divisi`, `id_bagian`, `nametag`, `status`, `created_at`) VALUES
(1, 10104006, 'Ayi Putri Nurkaidah', 'Subang', 'ayiputrink@gmail.com', '123456', 2, 7, 34, 'aa081589202d1f94a00962710ec204e9.jpg', 'active', '2020-03-17 09:25:14'),
(2, 2020, 'Nuca', '', 'nuca@gmail.com', '123456', 2, NULL, NULL, '9c26f2d6903d551d36ff08cc22167cd9.jpg', 'suspend', '2020-03-20 14:23:45'),
(3, 10104009, 'Lyodra', '', 'lyodra@gmail.com', '123456', 1, 7, 34, NULL, 'active', '2020-03-20 10:53:34'),
(8, NULL, 'arvi', NULL, 'arvi@gmail.com', '123456', NULL, NULL, NULL, NULL, 'active', '2020-03-31 03:29:42'),
(9, NULL, 'naufa', NULL, 'naufa@gmail.com', '123456', NULL, NULL, NULL, NULL, 'unverified', '2020-03-31 04:39:25'),
(10, NULL, 'kekey', NULL, 'kekey@gmail.com', '123456', NULL, NULL, NULL, NULL, 'unverified', '2020-04-09 12:16:09'),
(11, NULL, 'programmer', NULL, 'programmer@gmail.com', '123456', NULL, NULL, NULL, NULL, 'unverified', '2020-04-09 12:20:11'),
(12, NULL, 'user1', NULL, 'user1@gmail.com', '123456', NULL, NULL, NULL, NULL, 'unverified', '2020-04-09 12:23:14'),
(13, NULL, 'user2', NULL, 'user2@gmail.com', '123456', NULL, NULL, NULL, NULL, 'unverified', '2020-04-09 12:27:18'),
(14, NULL, 'user3', NULL, 'user3@gmail.com', '123456', NULL, NULL, NULL, NULL, 'unverified', '2020-04-09 12:28:40'),
(15, NULL, 'user4', NULL, 'user4@gmail.com', '123456', NULL, NULL, NULL, NULL, 'unverified', '2020-04-09 12:30:28'),
(16, NULL, 'user5', NULL, 'user5@gmail.com', '123456', NULL, NULL, NULL, NULL, 'unverified', '2020-04-09 12:38:38'),
(17, NULL, 'user6', NULL, 'user6@gmail.com', '123456', NULL, NULL, NULL, NULL, 'unverified', '2020-04-09 12:41:16'),
(18, 9856333, 'user7', 'Majalengka', 'user7@gmail.com', '123456', 2, 9, 16, '4d6477096f1fcd07cf0caa60d7adbba4.JPG', 'active', '2020-04-09 12:45:40');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `assign_jobdesk`
--
ALTER TABLE `assign_jobdesk`
  ADD PRIMARY KEY (`id_assign`);

--
-- Indeks untuk tabel `bagian`
--
ALTER TABLE `bagian`
  ADD PRIMARY KEY (`id_bagian`);

--
-- Indeks untuk tabel `divisi`
--
ALTER TABLE `divisi`
  ADD PRIMARY KEY (`id_divisi`);

--
-- Indeks untuk tabel `item_jobdesk`
--
ALTER TABLE `item_jobdesk`
  ADD PRIMARY KEY (`id_item_jobdesk`);

--
-- Indeks untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indeks untuk tabel `jobdesk`
--
ALTER TABLE `jobdesk`
  ADD PRIMARY KEY (`id_jobdesk`);

--
-- Indeks untuk tabel `komentar_jobdesk`
--
ALTER TABLE `komentar_jobdesk`
  ADD PRIMARY KEY (`id_komentar`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `administrator`
--
ALTER TABLE `administrator`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `assign_jobdesk`
--
ALTER TABLE `assign_jobdesk`
  MODIFY `id_assign` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `bagian`
--
ALTER TABLE `bagian`
  MODIFY `id_bagian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT untuk tabel `divisi`
--
ALTER TABLE `divisi`
  MODIFY `id_divisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `item_jobdesk`
--
ALTER TABLE `item_jobdesk`
  MODIFY `id_item_jobdesk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `jobdesk`
--
ALTER TABLE `jobdesk`
  MODIFY `id_jobdesk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `komentar_jobdesk`
--
ALTER TABLE `komentar_jobdesk`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
