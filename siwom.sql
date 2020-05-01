-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Bulan Mei 2020 pada 00.17
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
-- Struktur dari tabel `assign_tugas`
--

CREATE TABLE `assign_tugas` (
  `id_assign` int(11) NOT NULL,
  `id_tugas` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `lampiran` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `bagian`
--

CREATE TABLE `bagian` (
  `id_bagian` int(11) NOT NULL,
  `id_divisi` int(11) NOT NULL,
  `nama_bagian` varchar(50) NOT NULL,
  `jobdesk` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `bagian`
--

INSERT INTO `bagian` (`id_bagian`, `id_divisi`, `nama_bagian`, `jobdesk`) VALUES
(1, 1, 'Legal', ''),
(2, 1, 'Komunikasi Korporasi', ''),
(4, 1, 'Program Kemitraan & Bina Lingkungan', ''),
(5, 2, 'Pengawasan Keuangan', ''),
(6, 2, 'Pengawasan Operasional', ''),
(7, 3, 'Penjamin Mutu', ''),
(8, 3, 'Penjamin Sistem', ''),
(9, 3, 'Penjamin K3L', ''),
(10, 4, 'Keuangan', ''),
(11, 4, 'Akuntansi', ''),
(12, 4, 'Perpajakan', ''),
(13, 5, 'Sumber Daya Manusia', ''),
(14, 5, 'Urusan Umum', ''),
(15, 9, 'Pemasaran & Penjualan', ''),
(16, 9, 'Rekayasa Sistem', ''),
(17, 9, 'Komersial', ''),
(18, 10, 'Pemasaran & Penjualan', ''),
(19, 10, 'Rekayasa Sistem', ''),
(20, 10, 'Komersial', ''),
(21, 11, 'Rekayasa Sistem', ''),
(22, 11, 'Komersial', ''),
(23, 11, 'Operasi Matra Darat', ''),
(24, 11, 'Operasi Matra Laut', ''),
(25, 11, 'Operasi Matra Udara', ''),
(26, 12, 'Pemasaran & Penjualan', ''),
(27, 12, 'Rekayasa Industri & Jasa Produksi', ''),
(28, 12, 'Perencanaan Pengendalian Produksi', ''),
(29, 6, 'Pengembangan Bisnis dan Akuntansi', ''),
(30, 6, 'Produk Hankam & TIKN', ''),
(31, 6, 'Produk Perkeretaapian', ''),
(32, 6, 'Produk Energi dan Traksi', ''),
(33, 7, 'Perencanaan & Pengendalian Logistik', ''),
(34, 7, 'Operasi Logistik', ''),
(35, 7, 'Persediaan & Operasi Gudang', ''),
(36, 8, 'Perencanaan & Evaluasi Korporasi', ''),
(37, 8, 'Sistem Informasi', ''),
(38, 12, 'Rekayasa Sistem', ''),
(39, 12, 'Komersial', ''),
(40, 12, 'Manajemen Proyek', ''),
(41, 13, 'Pemasaran dan Penjualan', ''),
(42, 13, 'Rekayasa Industri & Jasa Produksi', ''),
(43, 13, 'Perencanaan Pengendalian Produksi', '');

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
-- Struktur dari tabel `item_tugas`
--

CREATE TABLE `item_tugas` (
  `id_item_tugas` int(11) NOT NULL,
  `id_tugas` int(11) NOT NULL,
  `isi_item` text NOT NULL,
  `status_item` enum('belum selesai','selesai') NOT NULL DEFAULT 'belum selesai',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `item_tugas`
--

INSERT INTO `item_tugas` (`id_item_tugas`, `id_tugas`, `isi_item`, `status_item`, `created_at`) VALUES
(1, 14, 'coba', 'belum selesai', '2020-04-10 19:08:51'),
(2, 14, 'masih', 'belum selesai', '2020-04-10 19:14:51'),
(3, 14, 'cool', 'belum selesai', '2020-04-10 19:15:28'),
(4, 14, 'masih ada', 'belum selesai', '2020-04-10 19:15:49'),
(5, 14, 'kerja keras', 'belum selesai', '2020-04-11 12:51:17'),
(6, 8, 'good', 'belum selesai', '2020-04-11 15:09:08'),
(10, 11, 'coba bikin yang bagus', 'selesai', '2020-04-11 16:05:37'),
(11, 11, 'tambahin sedikit border', 'selesai', '2020-04-12 09:55:20');

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
-- Struktur dari tabel `komentar_tugas`
--

CREATE TABLE `komentar_tugas` (
  `id_komentar` int(11) NOT NULL,
  `id_tugas` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `isi_komentar` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `komentar_tugas`
--

INSERT INTO `komentar_tugas` (`id_komentar`, `id_tugas`, `id_user`, `isi_komentar`, `created_at`) VALUES
(1, 0, 0, 'oke', '2020-04-10 18:27:08'),
(2, 14, 3, 'bagus juga', '2020-04-10 18:40:07'),
(3, 14, 3, 'bagus juga', '2020-04-10 18:40:42'),
(4, 14, 3, 'kwkwkwkkw', '2020-04-10 18:40:53'),
(5, 14, 3, 'ntaps', '2020-04-10 18:44:54'),
(6, 14, 3, 'go', '2020-04-10 19:00:06'),
(7, 14, 3, 'keren banget', '2020-04-10 19:01:04'),
(8, 14, 1, 'wah hebat', '2020-04-10 19:02:50'),
(9, 14, 1, 'semoga tambah keren', '2020-04-10 19:16:09'),
(10, 8, 1, 'bioleh tuh', '2020-04-11 15:09:19'),
(14, 11, 1, 'hebat ya kwkwkw', '2020-04-12 09:50:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `notifikasi`
--

CREATE TABLE `notifikasi` (
  `id_notifikasi` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `jenis_notifikasi` enum('tugas') NOT NULL,
  `isi_notifikasi` varchar(50) NOT NULL,
  `id_link` int(150) DEFAULT NULL,
  `status_notifikasi` enum('diterima','dibaca') NOT NULL DEFAULT 'diterima',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tugas`
--

CREATE TABLE `tugas` (
  `id_tugas` int(11) NOT NULL,
  `dari` int(11) NOT NULL,
  `kepada` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `lampiran` varchar(100) DEFAULT NULL,
  `status_tugas` enum('belum selesai','selesai') NOT NULL DEFAULT 'belum selesai',
  `deadline` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tugas`
--

INSERT INTO `tugas` (`id_tugas`, `dari`, `kepada`, `judul`, `deskripsi`, `lampiran`, `status_tugas`, `deadline`, `created_at`) VALUES
(1, 1, 2, 'coba lagi', 'iya', NULL, 'belum selesai', '2020-04-30', '2020-04-11 15:05:55'),
(2, 1, 2, 'coba lagi', 'iya', NULL, 'belum selesai', '2020-04-30', '2020-04-11 15:05:55'),
(3, 0, 3, 'coba lagi', 'iya', '5e55c8c3ac84dd2b229a8d71a778540d.zip', 'belum selesai', '2020-04-30', '2020-04-11 15:05:55'),
(4, 0, 3, 'coba lagi', 'iya', '8e5e8d3b68add2caefbc62504d33a44c.zip', 'belum selesai', '2020-04-30', '2020-04-11 15:05:55'),
(5, 0, 3, 'coba lagi', 'iya', NULL, 'belum selesai', '2020-04-30', '2020-04-11 15:05:55'),
(6, 0, 3, 'coba lagi', 'iya', NULL, 'belum selesai', '2020-04-30', '2020-04-11 15:05:55'),
(7, 0, 3, 'coba lagi', 'iya', NULL, 'belum selesai', '2020-04-30', '2020-04-11 15:05:55'),
(9, 1, 0, 'coba lagi', 'iya', NULL, 'belum selesai', '2020-04-30', '2020-04-11 15:05:55'),
(10, 1, 0, 'coba lagi', 'iya', NULL, 'belum selesai', '2020-04-30', '2020-04-11 15:05:55'),
(11, 1, 3, 'coba lagi dulu', 'iya', 'b0046e4594558a898125a6cff5ef415e.zip', 'selesai', '2020-05-05', '2020-04-12 09:56:33'),
(12, 1, 3, 'coba lagi', 'iya', NULL, 'selesai', '2020-05-13', '2020-04-12 10:08:41'),
(13, 1, 3, 'coba lagi', 'iya', NULL, 'belum selesai', '2020-04-30', '2020-04-11 15:05:55'),
(14, 1, 3, 'coba lagi', 'iya', '4bde08c2ec056a4a6e23f15edcc07f1c.zip', 'belum selesai', '2020-04-30', '2020-04-11 15:05:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nik` int(11) DEFAULT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` text DEFAULT NULL,
  `jenis_kelamin` enum('L','P') DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `status_perkawinan` enum('belum kawin','kawin') DEFAULT NULL,
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

INSERT INTO `user` (`id_user`, `nik`, `nama`, `alamat`, `jenis_kelamin`, `tanggal_lahir`, `status_perkawinan`, `email`, `password`, `id_jabatan`, `id_divisi`, `id_bagian`, `nametag`, `status`, `created_at`) VALUES
(1, 10104006, 'Ayi Putri Nurkaidah', 'Subang', NULL, '0000-00-00', 'belum kawin', 'ayiputrink@gmail.com', '123456', 2, 7, 34, 'aa081589202d1f94a00962710ec204e9.jpg', 'active', '2020-03-17 09:25:14'),
(2, 2020, 'Nuca', '', NULL, '0000-00-00', 'belum kawin', 'nuca@gmail.com', '123456', 2, NULL, NULL, '9c26f2d6903d551d36ff08cc22167cd9.jpg', 'suspend', '2020-03-20 14:23:45'),
(3, 10104009, 'Lyodra', '', NULL, '0000-00-00', 'belum kawin', 'lyodra@gmail.com', '123456', 1, 7, 34, NULL, 'active', '2020-03-20 10:53:34'),
(8, NULL, 'arvi', NULL, NULL, '0000-00-00', 'belum kawin', 'arvi@gmail.com', '123456', NULL, NULL, NULL, NULL, 'active', '2020-03-31 03:29:42'),
(9, NULL, 'naufa', NULL, NULL, '0000-00-00', 'belum kawin', 'naufa@gmail.com', '123456', NULL, NULL, NULL, NULL, 'unverified', '2020-03-31 04:39:25'),
(10, NULL, 'kekey', NULL, NULL, '0000-00-00', 'belum kawin', 'kekey@gmail.com', '123456', NULL, NULL, NULL, NULL, 'unverified', '2020-04-09 12:16:09'),
(11, NULL, 'programmer', NULL, NULL, '0000-00-00', 'belum kawin', 'programmer@gmail.com', '123456', NULL, NULL, NULL, NULL, 'unverified', '2020-04-09 12:20:11'),
(12, NULL, 'user1', NULL, NULL, '0000-00-00', 'belum kawin', 'user1@gmail.com', '123456', NULL, NULL, NULL, NULL, 'unverified', '2020-04-09 12:23:14'),
(13, NULL, 'user2', NULL, NULL, '0000-00-00', 'belum kawin', 'user2@gmail.com', '123456', NULL, NULL, NULL, NULL, 'unverified', '2020-04-09 12:27:18'),
(14, NULL, 'user3', NULL, NULL, '0000-00-00', 'belum kawin', 'user3@gmail.com', '123456', NULL, NULL, NULL, NULL, 'unverified', '2020-04-09 12:28:40'),
(15, NULL, 'user4', NULL, NULL, '0000-00-00', 'belum kawin', 'user4@gmail.com', '123456', NULL, NULL, NULL, NULL, 'unverified', '2020-04-09 12:30:28'),
(16, NULL, 'user5', NULL, NULL, '0000-00-00', 'belum kawin', 'user5@gmail.com', '123456', NULL, NULL, NULL, NULL, 'unverified', '2020-04-09 12:38:38'),
(17, NULL, 'user6', NULL, NULL, '0000-00-00', 'belum kawin', 'user6@gmail.com', '123456', NULL, NULL, NULL, NULL, 'unverified', '2020-04-09 12:41:16'),
(18, 9856333, 'user7', 'Majalengka', NULL, '0000-00-00', 'belum kawin', 'user7@gmail.com', '123456', 2, 9, 16, '4d6477096f1fcd07cf0caa60d7adbba4.JPG', 'active', '2020-04-09 12:45:40');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `assign_tugas`
--
ALTER TABLE `assign_tugas`
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
-- Indeks untuk tabel `item_tugas`
--
ALTER TABLE `item_tugas`
  ADD PRIMARY KEY (`id_item_tugas`);

--
-- Indeks untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indeks untuk tabel `komentar_tugas`
--
ALTER TABLE `komentar_tugas`
  ADD PRIMARY KEY (`id_komentar`);

--
-- Indeks untuk tabel `tugas`
--
ALTER TABLE `tugas`
  ADD PRIMARY KEY (`id_tugas`);

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
-- AUTO_INCREMENT untuk tabel `assign_tugas`
--
ALTER TABLE `assign_tugas`
  MODIFY `id_assign` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
-- AUTO_INCREMENT untuk tabel `item_tugas`
--
ALTER TABLE `item_tugas`
  MODIFY `id_item_tugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `komentar_tugas`
--
ALTER TABLE `komentar_tugas`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `tugas`
--
ALTER TABLE `tugas`
  MODIFY `id_tugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
