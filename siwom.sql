-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Feb 2020 pada 17.08
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
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `assign_jobdesk`
--

CREATE TABLE `assign_jobdesk` (
  `id_assign` int(11) NOT NULL,
  `id_jobdesk` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `lampiran` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobdesk`
--

CREATE TABLE `jobdesk` (
  `id_jobdesk` int(11) NOT NULL,
  `dari` int(11) NOT NULL,
  `kepada` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `lampiran` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentar_jobdesk`
--

CREATE TABLE `komentar_jobdesk` (
  `id_komentar` int(11) NOT NULL,
  `id_jobdesk` int(11) NOT NULL,
  `isi_komentar` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `notifikasi`
--

CREATE TABLE `notifikasi` (
  `id_notifikasi` int(11) NOT NULL,
  `id_jobdesk` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `isi_notifikasi` varchar(50) NOT NULL,
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
  `foto` varchar(100) DEFAULT NULL,
  `status` enum('unverified','active','suspend') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nik`, `nama`, `alamat`, `email`, `password`, `id_jabatan`, `id_divisi`, `id_bagian`, `foto`, `status`, `created_at`) VALUES
(1, NULL, 'Ayi Putri', '', 'ayiputrink@gmail.com', '123456', NULL, NULL, NULL, NULL, 'unverified', '2020-02-25 02:14:41');

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
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `assign_jobdesk`
--
ALTER TABLE `assign_jobdesk`
  MODIFY `id_assign` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `bagian`
--
ALTER TABLE `bagian`
  MODIFY `id_bagian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT untuk tabel `divisi`
--
ALTER TABLE `divisi`
  MODIFY `id_divisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `item_jobdesk`
--
ALTER TABLE `item_jobdesk`
  MODIFY `id_item_jobdesk` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jobdesk`
--
ALTER TABLE `jobdesk`
  MODIFY `id_jobdesk` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `komentar_jobdesk`
--
ALTER TABLE `komentar_jobdesk`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
