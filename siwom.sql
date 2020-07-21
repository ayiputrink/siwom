-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Jul 2020 pada 05.09
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

--
-- Dumping data untuk tabel `assign_tugas`
--

INSERT INTO `assign_tugas` (`id_assign`, `id_tugas`, `deskripsi`, `lampiran`, `created_at`) VALUES
(7, 15, 'ini tes notif', 'f9b86fb04303af55979692979b8b6f50.zip', '2020-05-06 10:37:16'),
(8, 15, 'error', NULL, '2020-07-01 14:47:49'),
(9, 15, 'coba lagi', NULL, '2020-07-01 14:49:43'),
(10, 15, 'cek', NULL, '2020-07-01 14:52:21'),
(11, 14, 'bisa', NULL, '2020-07-08 02:25:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bagian`
--

CREATE TABLE `bagian` (
  `id_bagian` int(11) NOT NULL,
  `id_divisi` int(11) NOT NULL,
  `nama_bagian` varchar(50) NOT NULL,
  `jobdesk_karyawan` text NOT NULL,
  `jobdesk_manajer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `bagian`
--

INSERT INTO `bagian` (`id_bagian`, `id_divisi`, `nama_bagian`, `jobdesk_karyawan`, `jobdesk_manajer`) VALUES
(1, 1, 'Legal', '', ''),
(2, 1, 'Komunikasi Korporasi', '', ''),
(4, 1, 'Program Kemitraan & Bina Lingkungan', '', ''),
(5, 2, 'Pengawasan Keuangan', '', ''),
(6, 2, 'Pengawasan Operasional', '', ''),
(7, 3, 'Penjamin Mutu', '', ''),
(8, 3, 'Penjamin Sistem', '', ''),
(9, 3, 'Penjamin K3L', '', ''),
(10, 4, 'Keuangan', '', ''),
(11, 4, 'Akuntansi', '', ''),
(12, 4, 'Perpajakan', '', ''),
(13, 5, 'Sumber Daya Manusia', '', ''),
(14, 5, 'Urusan Umum', '', ''),
(15, 9, 'Pemasaran & Penjualan', '', ''),
(16, 9, 'Rekayasa Sistem', '', ''),
(17, 9, 'Komersial', '', ''),
(18, 10, 'Pemasaran & Penjualan', '', ''),
(19, 10, 'Rekayasa Sistem', '', ''),
(20, 10, 'Komersial', '', ''),
(21, 11, 'Rekayasa Sistem', '', ''),
(22, 11, 'Komersial', '', ''),
(23, 11, 'Operasi Matra Darat', '', ''),
(24, 11, 'Operasi Matra Laut', '', ''),
(25, 11, 'Operasi Matra Udara', '', ''),
(26, 12, 'Pemasaran & Penjualan', '', ''),
(27, 12, 'Rekayasa Industri & Jasa Produksi', '', ''),
(28, 12, 'Perencanaan Pengendalian Produksi', '', ''),
(29, 6, 'Pengembangan Bisnis dan Akuntansi', '', ''),
(30, 6, 'Produk Hankam & TIKN', '', ''),
(31, 6, 'Produk Perkeretaapian', '', ''),
(32, 6, 'Produk Energi dan Traksi', '', ''),
(33, 7, 'Perencanaan & Pengendalian Logistik', '', ''),
(34, 7, 'Operasi Logistik', 'Menyiapkan Alat-alat kantor <br> Menerima tugas dari manajer', 'Menyiapkan Alat-alat kantor <br> Memberi arahan karyawan'),
(35, 7, 'Persediaan & Operasi Gudang', '', ''),
(36, 8, 'Perencanaan & Evaluasi Korporasi', '', ''),
(37, 8, 'Sistem Informasi', '', ''),
(38, 12, 'Rekayasa Sistem', '', ''),
(39, 12, 'Komersial', '', ''),
(40, 12, 'Manajemen Proyek', '', ''),
(41, 13, 'Pemasaran dan Penjualan', '', ''),
(42, 13, 'Rekayasa Industri & Jasa Produksi', '', ''),
(43, 13, 'Perencanaan Pengendalian Produksi', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_training`
--

CREATE TABLE `data_training` (
  `id_data_training` int(11) NOT NULL,
  `usia` varchar(20) NOT NULL,
  `tugas_diterima` varchar(20) NOT NULL,
  `tugas_selesai` varchar(20) NOT NULL,
  `kompleksitas` enum('tidak kompleks','sedang','kompleks') NOT NULL,
  `feedback` enum('tidak puas','cukup','puas') NOT NULL,
  `label` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_training`
--

INSERT INTO `data_training` (`id_data_training`, `usia`, `tugas_diterima`, `tugas_selesai`, `kompleksitas`, `feedback`, `label`, `created_at`) VALUES
(1, '20-29', '11-20', '0-10', 'tidak kompleks', 'tidak puas', 'berat', '2020-07-01 13:48:02'),
(2, '20-29', '0-10', '0-10', 'tidak kompleks', 'tidak puas', 'sedang', '2020-07-01 13:48:06'),
(3, '30-40', '11-20', '11-20', 'tidak kompleks', 'tidak puas', 'berat', '2020-07-01 13:48:15'),
(4, '20-29', '11-20', '0-10', 'tidak kompleks', 'tidak puas', 'sedang', '2020-07-01 13:48:20'),
(5, '30-40', '0-10', '11-20', 'tidak kompleks', 'tidak puas', 'berat', '2020-07-01 13:48:45'),
(6, '20-29', '11-20', '11-20', 'tidak kompleks', 'tidak puas', 'berat', '2020-07-01 13:48:49'),
(7, '>40', '11-20', '0-10', 'tidak kompleks', 'tidak puas', 'tidak berat', '2020-07-01 13:48:54'),
(8, '30-40', '11-20', '11-20', 'tidak kompleks', 'tidak puas', 'berat', '2020-07-01 13:48:58'),
(9, '20-29', '11-20', '11-20', 'tidak kompleks', 'tidak puas', 'berat', '2020-07-01 13:50:46'),
(10, '>40', '0-10', '11-20', 'tidak kompleks', 'tidak puas', 'tidak berat', '2020-07-01 13:50:51'),
(11, '30-40', '0-10', '11-20', 'tidak kompleks', 'tidak puas', 'berat', '2020-07-01 13:50:55'),
(12, '20-29', '11-20', '11-20', 'tidak kompleks', 'tidak puas', 'tidak berat', '2020-07-01 13:51:01'),
(13, '30-40', '0-10', '0-10', 'tidak kompleks', 'tidak puas', 'tidak berat', '2020-07-01 13:51:24'),
(14, '30-40', '11-20', '0-20', 'tidak kompleks', 'tidak puas', 'berat', '2020-07-01 13:51:28'),
(15, '20-29', '0-10', '11-20', 'tidak kompleks', 'tidak puas', 'berat', '2020-07-01 13:51:32');

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
(10, 11, 'coba bikin yang bagus', 'belum selesai', '2020-07-17 18:19:29'),
(11, 11, 'tambahin sedikit border', 'belum selesai', '2020-07-17 16:19:36'),
(12, 15, 'buat lagi', 'selesai', '2020-07-17 02:00:21'),
(13, 15, 'coba', 'belum selesai', '2020-07-17 02:33:03');

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
(14, 11, 1, 'hebat ya kwkwkw', '2020-04-12 09:50:35'),
(15, 12, 3, 'Keren', '2020-05-06 06:06:11'),
(22, 12, 1, 'cool', '2020-05-06 08:45:04'),
(23, 12, 3, 'terima kasih', '2020-05-06 08:55:31'),
(24, 11, 1, 'selesai', '2020-05-06 09:01:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `notifikasi`
--

CREATE TABLE `notifikasi` (
  `id_notifikasi` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `jenis_notifikasi` enum('tugas','item_tugas','komentar') NOT NULL,
  `isi_notifikasi` text NOT NULL,
  `id_link` int(150) DEFAULT NULL,
  `status_notifikasi` enum('diterima','dibaca') NOT NULL DEFAULT 'diterima',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `notifikasi`
--

INSERT INTO `notifikasi` (`id_notifikasi`, `id_user`, `jenis_notifikasi`, `isi_notifikasi`, `id_link`, `status_notifikasi`, `created_at`) VALUES
(1, 3, 'komentar', 'Ayi Putri Nurkaidah memberikan komentar pada tugas', 12, 'dibaca', '2020-05-06 09:15:16'),
(2, 3, 'komentar', 'Ayi Putri Nurkaidah memberikan komentar pada tugas', 12, 'dibaca', '2020-05-06 09:19:01'),
(3, 1, 'komentar', 'Lyodra memberikan komentar pada tugas coba lagi.', 12, 'dibaca', '2020-07-01 11:14:51'),
(4, 3, 'komentar', 'Ayi Putri Nurkaidah memberikan komentar pada tugas', 11, 'dibaca', '2020-05-06 09:18:52'),
(5, 3, 'tugas', ' memberi anda tugas cek notif', 15, 'dibaca', '2020-05-06 10:36:07'),
(6, 1, 'tugas', ' menyerahkan tugas cek notif', 15, 'dibaca', '2020-07-01 14:42:09'),
(7, 1, 'tugas', 'Lyodra menyerahkan tugas cek notif', 15, 'diterima', '2020-07-01 14:54:28'),
(8, 1, 'tugas', 'Lyodra menyerahkan tugas cek notif', 15, 'diterima', '2020-07-01 14:54:25'),
(9, 1, 'tugas', 'Lyodra menyerahkan tugas cek notif', 15, 'diterima', '2020-07-01 14:54:21'),
(10, 1, 'tugas', 'Lyodra menyerahkan tugas cek notif', 15, 'diterima', '2020-07-01 14:54:08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sample_coba`
--

CREATE TABLE `sample_coba` (
  `id_sample` int(11) NOT NULL,
  `usia` varchar(100) NOT NULL,
  `tugas_diterima` varchar(100) NOT NULL,
  `tugas_selesai` varchar(100) NOT NULL,
  `kompleksitas` varchar(100) NOT NULL,
  `feedback` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sample_coba`
--

INSERT INTO `sample_coba` (`id_sample`, `usia`, `tugas_diterima`, `tugas_selesai`, `kompleksitas`, `feedback`) VALUES
(109, '20-29', '0-10', '0-10', 'Tidak_kompleks', 'Tidak_puas'),
(110, '20-29', '0-10', '0-10', 'Tidak_kompleks', 'Cukup'),
(111, '20-29', '0-10', '0-10', 'Tidak_kompleks', 'Puas'),
(112, '20-29', '0-10', '0-10', 'sedang', 'Tidak_puas'),
(113, '20-29', '0-10', '0-10', 'Sedang', 'Cukup'),
(114, '20-29', '0-10', '0-10', 'Sedang', 'puas'),
(115, '20-29', '0-10', '0-10', 'Kompleks', 'Tidak_puas'),
(116, '20-29', '0-10', '0-10', 'Kompleks', 'Cukup'),
(117, '20-29', '0-10', '0-10', 'Kompleks', 'puas'),
(118, '20-29', '0-10', '11-20', 'Tidak_kompleks', 'Tidak_puas'),
(119, '20-29', '0-10', '11-20', 'Tidak_kompleks', 'Cukup'),
(120, '20-29', '0-10', '11-20', 'Tidak_kompleks', 'Puas'),
(121, '20-29', '0-10', '11-20', 'sedang', 'Tidak_puas'),
(122, '20-29', '0-10', '11-20', 'Sedang', 'Cukup'),
(123, '20-29', '0-10', '11-20', 'Sedang', 'puas'),
(124, '20-29', '0-10', '11-20', 'Kompleks', 'Tidak_puas'),
(125, '20-29', '0-10', '11-20', 'Kompleks', 'Cukup'),
(126, '20-29', '0-10', '11-20', 'Kompleks', 'puas'),
(127, '20-29', '0-10', '>20', 'Tidak_kompleks', 'Tidak_puas'),
(128, '20-29', '0-10', '>20', 'Tidak_kompleks', 'Cukup'),
(129, '20-29', '0-10', '>20', 'Tidak_kompleks', 'Puas'),
(130, '20-29', '0-10', '>20', 'sedang', 'Tidak_puas'),
(131, '20-29', '0-10', '>20', 'Sedang', 'Cukup'),
(132, '20-29', '0-10', '>20', 'Sedang', 'puas'),
(133, '20-29', '0-10', '>20', 'Kompleks', 'Tidak_puas'),
(134, '20-29', '0-10', '>20', 'Kompleks', 'Cukup'),
(135, '20-29', '0-10', '>20', 'Kompleks', 'puas'),
(136, '20-29', '10-20', '0-10', 'Tidak_kompleks', 'Tidak_puas'),
(137, '20-29', '10-20', '0-10', 'Tidak_kompleks', 'Cukup'),
(138, '20-29', '10-20', '0-10', 'Tidak_kompleks', 'Puas'),
(139, '20-29', '10-20', '0-10', 'sedang', 'Tidak_puas'),
(140, '20-29', '10-20', '0-10', 'Sedang', 'Cukup'),
(141, '20-29', '10-20', '0-10', 'Sedang', 'puas'),
(142, '20-29', '10-20', '0-10', 'Kompleks', 'Tidak_puas'),
(143, '20-29', '10-20', '0-10', 'Kompleks', 'Cukup'),
(144, '20-29', '10-20', '0-10', 'Kompleks', 'puas'),
(145, '20-29', '10-20', '11-20', 'Tidak_kompleks', 'Tidak_puas'),
(146, '20-29', '10-20', '11-20', 'Tidak_kompleks', 'Cukup'),
(147, '20-29', '10-20', '11-20', 'Tidak_kompleks', 'Puas'),
(148, '20-29', '10-20', '11-20', 'sedang', 'Tidak_puas'),
(149, '20-29', '10-20', '11-20', 'Sedang', 'Cukup'),
(150, '20-29', '10-20', '11-20', 'Sedang', 'puas'),
(151, '20-29', '10-20', '11-20', 'Kompleks', 'Tidak_puas'),
(152, '20-29', '10-20', '11-20', 'Kompleks', 'Cukup'),
(153, '20-29', '10-20', '11-20', 'Kompleks', 'puas'),
(154, '20-29', '10-20', '>20', 'Tidak_kompleks', 'Tidak_puas'),
(155, '20-29', '10-20', '>20', 'Tidak_kompleks', 'Cukup'),
(156, '20-29', '10-20', '>20', 'Tidak_kompleks', 'Puas'),
(157, '20-29', '10-20', '>20', 'sedang', 'Tidak_puas'),
(158, '20-29', '10-20', '>20', 'Sedang', 'Cukup'),
(159, '20-29', '10-20', '>20', 'Sedang', 'puas'),
(160, '20-29', '10-20', '>20', 'Kompleks', 'Tidak_puas'),
(161, '20-29', '10-20', '>20', 'Kompleks', 'Cukup'),
(162, '20-29', '10-20', '>20', 'Kompleks', 'puas'),
(163, '20-29', '>20', '0-10', 'Tidak_kompleks', 'Tidak_puas'),
(164, '20-29', '>20', '0-10', 'Tidak_kompleks', 'Cukup'),
(165, '20-29', '>20', '0-10', 'Tidak_kompleks', 'Puas'),
(166, '20-29', '>20', '0-10', 'sedang', 'Tidak_puas'),
(167, '20-29', '>20', '0-10', 'Sedang', 'Cukup'),
(168, '20-29', '>20', '0-10', 'Sedang', 'puas'),
(169, '20-29', '>20', '0-10', 'Kompleks', 'Tidak_puas'),
(170, '20-29', '>20', '0-10', 'Kompleks', 'Cukup'),
(171, '20-29', '>20', '0-10', 'Kompleks', 'puas'),
(172, '20-29', '>20', '11-20', 'Tidak_kompleks', 'Tidak_puas'),
(173, '20-29', '>20', '11-20', 'Tidak_kompleks', 'Cukup'),
(174, '20-29', '>20', '11-20', 'Tidak_kompleks', 'Puas'),
(175, '20-29', '>20', '11-20', 'sedang', 'Tidak_puas'),
(176, '20-29', '>20', '11-20', 'Sedang', 'Cukup'),
(177, '20-29', '>20', '11-20', 'Sedang', 'puas'),
(178, '20-29', '>20', '11-20', 'Kompleks', 'Tidak_puas'),
(179, '20-29', '>20', '11-20', 'Kompleks', 'Cukup'),
(180, '20-29', '>20', '11-20', 'Kompleks', 'puas'),
(181, '20-29', '>20', '>20', 'Tidak_kompleks', 'Tidak_puas'),
(182, '20-29', '>20', '>20', 'Tidak_kompleks', 'Cukup'),
(183, '20-29', '>20', '>20', 'Tidak_kompleks', 'Puas'),
(184, '20-29', '>20', '>20', 'sedang', 'Tidak_puas'),
(185, '20-29', '>20', '>20', 'Sedang', 'Cukup'),
(186, '20-29', '>20', '>20', 'Sedang', 'puas'),
(187, '20-29', '>20', '>20', 'Kompleks', 'Tidak_puas'),
(188, '20-29', '>20', '>20', 'Kompleks', 'Cukup'),
(189, '20-29', '>20', '>20', 'Kompleks', 'puas'),
(190, '30-40', '0-10', '0-10', 'Tidak_kompleks', 'Tidak_puas'),
(191, '30-40', '0-10', '0-10', 'Tidak_kompleks', 'Cukup'),
(192, '30-40', '0-10', '0-10', 'Tidak_kompleks', 'Puas'),
(193, '30-40', '0-10', '0-10', 'sedang', 'Tidak_puas'),
(194, '30-40', '0-10', '0-10', 'Sedang', 'Cukup'),
(195, '30-40', '0-10', '0-10', 'Sedang', 'puas'),
(196, '30-40', '0-10', '0-10', 'Kompleks', 'Tidak_puas'),
(197, '30-40', '0-10', '0-10', 'Kompleks', 'Cukup'),
(198, '30-40', '0-10', '0-10', 'Kompleks', 'puas'),
(199, '30-40', '0-10', '11-20', 'Tidak_kompleks', 'Tidak_puas'),
(200, '30-40', '0-10', '11-20', 'Tidak_kompleks', 'Cukup'),
(201, '30-40', '0-10', '11-20', 'Tidak_kompleks', 'Puas'),
(202, '30-40', '0-10', '11-20', 'sedang', 'Tidak_puas'),
(203, '30-40', '0-10', '11-20', 'Sedang', 'Cukup'),
(204, '30-40', '0-10', '11-20', 'Sedang', 'puas'),
(205, '30-40', '0-10', '11-20', 'Kompleks', 'Tidak_puas'),
(206, '30-40', '0-10', '11-20', 'Kompleks', 'Cukup'),
(207, '30-40', '0-10', '11-20', 'Kompleks', 'puas'),
(208, '30-40', '0-10', '>20', 'Tidak_kompleks', 'Tidak_puas'),
(209, '30-40', '0-10', '>20', 'Tidak_kompleks', 'Cukup'),
(210, '30-40', '0-10', '>20', 'Tidak_kompleks', 'Puas'),
(211, '30-40', '0-10', '>20', 'sedang', 'Tidak_puas'),
(212, '30-40', '0-10', '>20', 'Sedang', 'Cukup'),
(213, '30-40', '0-10', '>20', 'Sedang', 'puas'),
(214, '30-40', '0-10', '>20', 'Kompleks', 'Tidak_puas'),
(215, '30-40', '0-10', '>20', 'Kompleks', 'Cukup'),
(216, '30-40', '0-10', '>20', 'Kompleks', 'puas'),
(217, '30-40', '10-20', '0-10', 'Tidak_kompleks', 'Tidak_puas'),
(218, '30-40', '10-20', '0-10', 'Tidak_kompleks', 'Cukup'),
(219, '30-40', '10-20', '0-10', 'Tidak_kompleks', 'Puas'),
(220, '30-40', '10-20', '0-10', 'sedang', 'Tidak_puas'),
(221, '30-40', '10-20', '0-10', 'Sedang', 'Cukup'),
(222, '30-40', '10-20', '0-10', 'Sedang', 'puas'),
(223, '30-40', '10-20', '0-10', 'Kompleks', 'Tidak_puas'),
(224, '30-40', '10-20', '0-10', 'Kompleks', 'Cukup'),
(225, '30-40', '10-20', '0-10', 'Kompleks', 'puas'),
(226, '30-40', '10-20', '11-20', 'Tidak_kompleks', 'Tidak_puas'),
(227, '30-40', '10-20', '11-20', 'Tidak_kompleks', 'Cukup'),
(228, '30-40', '10-20', '11-20', 'Tidak_kompleks', 'Puas'),
(229, '30-40', '10-20', '11-20', 'sedang', 'Tidak_puas'),
(230, '30-40', '10-20', '11-20', 'Sedang', 'Cukup'),
(231, '30-40', '10-20', '11-20', 'Sedang', 'puas'),
(232, '30-40', '10-20', '11-20', 'Kompleks', 'Tidak_puas'),
(233, '30-40', '10-20', '11-20', 'Kompleks', 'Cukup'),
(234, '30-40', '10-20', '11-20', 'Kompleks', 'puas'),
(235, '30-40', '10-20', '>20', 'Tidak_kompleks', 'Tidak_puas'),
(236, '30-40', '10-20', '>20', 'Tidak_kompleks', 'Cukup'),
(237, '30-40', '10-20', '>20', 'Tidak_kompleks', 'Puas'),
(238, '30-40', '10-20', '>20', 'sedang', 'Tidak_puas'),
(239, '30-40', '10-20', '>20', 'Sedang', 'Cukup'),
(240, '30-40', '10-20', '>20', 'Sedang', 'puas'),
(241, '30-40', '10-20', '>20', 'Kompleks', 'Tidak_puas'),
(242, '30-40', '10-20', '>20', 'Kompleks', 'Cukup'),
(243, '30-40', '10-20', '>20', 'Kompleks', 'puas'),
(244, '30-40', '>20', '0-10', 'Tidak_kompleks', 'Tidak_puas'),
(245, '30-40', '>20', '0-10', 'Tidak_kompleks', 'Cukup'),
(246, '30-40', '>20', '0-10', 'Tidak_kompleks', 'Puas'),
(247, '30-40', '>20', '0-10', 'sedang', 'Tidak_puas'),
(248, '30-40', '>20', '0-10', 'Sedang', 'Cukup'),
(249, '30-40', '>20', '0-10', 'Sedang', 'puas'),
(250, '30-40', '>20', '0-10', 'Kompleks', 'Tidak_puas'),
(251, '30-40', '>20', '0-10', 'Kompleks', 'Cukup'),
(252, '30-40', '>20', '0-10', 'Kompleks', 'puas'),
(253, '30-40', '>20', '11-20', 'Tidak_kompleks', 'Tidak_puas'),
(254, '30-40', '>20', '11-20', 'Tidak_kompleks', 'Cukup'),
(255, '30-40', '>20', '11-20', 'Tidak_kompleks', 'Puas'),
(256, '30-40', '>20', '11-20', 'sedang', 'Tidak_puas'),
(257, '30-40', '>20', '11-20', 'Sedang', 'Cukup'),
(258, '30-40', '>20', '11-20', 'Sedang', 'puas'),
(259, '30-40', '>20', '11-20', 'Kompleks', 'Tidak_puas'),
(260, '30-40', '>20', '11-20', 'Kompleks', 'Cukup'),
(261, '30-40', '>20', '11-20', 'Kompleks', 'puas'),
(262, '30-40', '>20', '>20', 'Tidak_kompleks', 'Tidak_puas'),
(263, '30-40', '>20', '>20', 'Tidak_kompleks', 'Cukup'),
(264, '30-40', '>20', '>20', 'Tidak_kompleks', 'Puas'),
(265, '30-40', '>20', '>20', 'sedang', 'Tidak_puas'),
(266, '30-40', '>20', '>20', 'Sedang', 'Cukup'),
(267, '30-40', '>20', '>20', 'Sedang', 'puas'),
(268, '30-40', '>20', '>20', 'Kompleks', 'Tidak_puas'),
(269, '30-40', '>20', '>20', 'Kompleks', 'Cukup'),
(270, '30-40', '>20', '>20', 'Kompleks', 'puas'),
(271, '>40', '0-10', '0-10', 'Tidak_kompleks', 'Tidak_puas'),
(272, '>40', '0-10', '0-10', 'Tidak_kompleks', 'Cukup'),
(273, '>40', '0-10', '0-10', 'Tidak_kompleks', 'Puas'),
(274, '>40', '0-10', '0-10', 'sedang', 'Tidak_puas'),
(275, '>40', '0-10', '0-10', 'Sedang', 'Cukup'),
(276, '>40', '0-10', '0-10', 'Sedang', 'puas'),
(277, '>40', '0-10', '0-10', 'Kompleks', 'Tidak_puas'),
(278, '>40', '0-10', '0-10', 'Kompleks', 'Cukup'),
(279, '>40', '0-10', '0-10', 'Kompleks', 'puas'),
(280, '>40', '0-10', '11-20', 'Tidak_kompleks', 'Tidak_puas'),
(281, '>40', '0-10', '11-20', 'Tidak_kompleks', 'Cukup'),
(282, '>40', '0-10', '11-20', 'Tidak_kompleks', 'Puas'),
(283, '>40', '0-10', '11-20', 'sedang', 'Tidak_puas'),
(284, '>40', '0-10', '11-20', 'Sedang', 'Cukup'),
(285, '>40', '0-10', '11-20', 'Sedang', 'puas'),
(286, '>40', '0-10', '11-20', 'Kompleks', 'Tidak_puas'),
(287, '>40', '0-10', '11-20', 'Kompleks', 'Cukup'),
(288, '>40', '0-10', '11-20', 'Kompleks', 'puas'),
(289, '>40', '0-10', '>20', 'Tidak_kompleks', 'Tidak_puas'),
(290, '>40', '0-10', '>20', 'Tidak_kompleks', 'Cukup'),
(291, '>40', '0-10', '>20', 'Tidak_kompleks', 'Puas'),
(292, '>40', '0-10', '>20', 'sedang', 'Tidak_puas'),
(293, '>40', '0-10', '>20', 'Sedang', 'Cukup'),
(294, '>40', '0-10', '>20', 'Sedang', 'puas'),
(295, '>40', '0-10', '>20', 'Kompleks', 'Tidak_puas'),
(296, '>40', '0-10', '>20', 'Kompleks', 'Cukup'),
(297, '>40', '0-10', '>20', 'Kompleks', 'puas'),
(298, '>40', '10-20', '0-10', 'Tidak_kompleks', 'Tidak_puas'),
(299, '>40', '10-20', '0-10', 'Tidak_kompleks', 'Cukup'),
(300, '>40', '10-20', '0-10', 'Tidak_kompleks', 'Puas'),
(301, '>40', '10-20', '0-10', 'sedang', 'Tidak_puas'),
(302, '>40', '10-20', '0-10', 'Sedang', 'Cukup'),
(303, '>40', '10-20', '0-10', 'Sedang', 'puas'),
(304, '>40', '10-20', '0-10', 'Kompleks', 'Tidak_puas'),
(305, '>40', '10-20', '0-10', 'Kompleks', 'Cukup'),
(306, '>40', '10-20', '0-10', 'Kompleks', 'puas'),
(307, '>40', '10-20', '11-20', 'Tidak_kompleks', 'Tidak_puas'),
(308, '>40', '10-20', '11-20', 'Tidak_kompleks', 'Cukup'),
(309, '>40', '10-20', '11-20', 'Tidak_kompleks', 'Puas'),
(310, '>40', '10-20', '11-20', 'sedang', 'Tidak_puas'),
(311, '>40', '10-20', '11-20', 'Sedang', 'Cukup'),
(312, '>40', '10-20', '11-20', 'Sedang', 'puas'),
(313, '>40', '10-20', '11-20', 'Kompleks', 'Tidak_puas'),
(314, '>40', '10-20', '11-20', 'Kompleks', 'Cukup'),
(315, '>40', '10-20', '11-20', 'Kompleks', 'puas'),
(316, '>40', '10-20', '>20', 'Tidak_kompleks', 'Tidak_puas'),
(317, '>40', '10-20', '>20', 'Tidak_kompleks', 'Cukup'),
(318, '>40', '10-20', '>20', 'Tidak_kompleks', 'Puas'),
(319, '>40', '10-20', '>20', 'sedang', 'Tidak_puas'),
(320, '>40', '10-20', '>20', 'Sedang', 'Cukup'),
(321, '>40', '10-20', '>20', 'Sedang', 'puas'),
(322, '>40', '10-20', '>20', 'Kompleks', 'Tidak_puas'),
(323, '>40', '10-20', '>20', 'Kompleks', 'Cukup'),
(324, '>40', '10-20', '>20', 'Kompleks', 'puas'),
(325, '>40', '>20', '0-10', 'Tidak_kompleks', 'Tidak_puas'),
(326, '>40', '>20', '0-10', 'Tidak_kompleks', 'Cukup'),
(327, '>40', '>20', '0-10', 'Tidak_kompleks', 'Puas'),
(328, '>40', '>20', '0-10', 'sedang', 'Tidak_puas'),
(329, '>40', '>20', '0-10', 'Sedang', 'Cukup'),
(330, '>40', '>20', '0-10', 'Sedang', 'puas'),
(331, '>40', '>20', '0-10', 'Kompleks', 'Tidak_puas'),
(332, '>40', '>20', '0-10', 'Kompleks', 'Cukup'),
(333, '>40', '>20', '0-10', 'Kompleks', 'puas'),
(334, '>40', '>20', '11-20', 'Tidak_kompleks', 'Tidak_puas'),
(335, '>40', '>20', '11-20', 'Tidak_kompleks', 'Cukup'),
(336, '>40', '>20', '11-20', 'Tidak_kompleks', 'Puas'),
(337, '>40', '>20', '11-20', 'sedang', 'Tidak_puas'),
(338, '>40', '>20', '11-20', 'Sedang', 'Cukup'),
(339, '>40', '>20', '11-20', 'Sedang', 'puas'),
(340, '>40', '>20', '11-20', 'Kompleks', 'Tidak_puas'),
(341, '>40', '>20', '11-20', 'Kompleks', 'Cukup'),
(342, '>40', '>20', '11-20', 'Kompleks', 'puas'),
(343, '>40', '>20', '>20', 'Tidak_kompleks', 'Tidak_puas'),
(344, '>40', '>20', '>20', 'Tidak_kompleks', 'Cukup'),
(345, '>40', '>20', '>20', 'Tidak_kompleks', 'Puas'),
(346, '>40', '>20', '>20', 'sedang', 'Tidak_puas'),
(347, '>40', '>20', '>20', 'Sedang', 'Cukup'),
(348, '>40', '>20', '>20', 'Sedang', 'puas'),
(349, '>40', '>20', '>20', 'Kompleks', 'Tidak_puas'),
(350, '>40', '>20', '>20', 'Kompleks', 'Cukup'),
(351, '>40', '>20', '>20', 'Kompleks', 'puas');

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
  `kompleksitas` enum('tidak kompleks','sedang','kompleks') NOT NULL,
  `status_tugas` enum('belum selesai','selesai') NOT NULL DEFAULT 'belum selesai',
  `feedback` enum('tidak puas','cukup','puas') DEFAULT NULL,
  `deadline` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tugas`
--

INSERT INTO `tugas` (`id_tugas`, `dari`, `kepada`, `judul`, `deskripsi`, `lampiran`, `kompleksitas`, `status_tugas`, `feedback`, `deadline`, `created_at`) VALUES
(1, 1, 2, 'coba lagi', 'iya', NULL, 'tidak kompleks', 'belum selesai', NULL, '2020-04-30', '2020-07-17 12:15:58'),
(2, 1, 2, 'coba lagi', 'iya', NULL, 'tidak kompleks', 'belum selesai', NULL, '2020-04-30', '2020-07-17 12:15:58'),
(3, 0, 3, 'coba lagi', 'iya', '5e55c8c3ac84dd2b229a8d71a778540d.zip', 'tidak kompleks', 'belum selesai', NULL, '2020-04-30', '2020-07-17 12:15:58'),
(4, 0, 3, 'coba lagi', 'iya', '8e5e8d3b68add2caefbc62504d33a44c.zip', 'tidak kompleks', 'belum selesai', NULL, '2020-04-30', '2020-07-17 12:15:58'),
(5, 0, 3, 'coba lagi', 'iya', NULL, 'tidak kompleks', 'belum selesai', NULL, '2020-04-30', '2020-07-17 12:15:58'),
(6, 0, 3, 'coba lagi', 'iya', NULL, 'tidak kompleks', 'belum selesai', NULL, '2020-04-30', '2020-07-17 12:15:58'),
(7, 0, 3, 'coba lagi', 'iya', NULL, 'tidak kompleks', 'belum selesai', NULL, '2020-04-30', '2020-07-17 12:15:58'),
(9, 1, 0, 'coba lagi', 'iya', NULL, 'tidak kompleks', 'belum selesai', NULL, '2020-04-30', '2020-07-17 12:15:58'),
(10, 1, 0, 'coba lagi', 'iya', NULL, 'tidak kompleks', 'belum selesai', NULL, '2020-04-30', '2020-07-17 12:15:58'),
(11, 1, 3, 'coba lagi dulu', 'iya', 'b0046e4594558a898125a6cff5ef415e.zip', 'tidak kompleks', 'belum selesai', 'puas', '2020-05-05', '2020-07-17 18:19:00'),
(12, 1, 3, 'coba lagi', 'iya', NULL, 'tidak kompleks', 'selesai', NULL, '2020-05-13', '2020-07-17 12:15:58'),
(13, 1, 3, 'coba lagi', 'iya', NULL, 'tidak kompleks', 'selesai', NULL, '2020-04-30', '2020-07-17 17:54:09'),
(14, 1, 3, 'coba lagi', 'iya', '4bde08c2ec056a4a6e23f15edcc07f1c.zip', 'tidak kompleks', 'belum selesai', NULL, '2020-04-30', '2020-07-17 12:15:58'),
(15, 1, 3, 'cek notif', '', NULL, 'tidak kompleks', 'selesai', NULL, '2020-06-23', '2020-07-17 12:15:58');

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
  `kuesioner_beban_kerja` tinyint(1) NOT NULL DEFAULT 0,
  `status` enum('unverified','active','suspend') NOT NULL,
  `tanggal_bergabung` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nik`, `nama`, `alamat`, `jenis_kelamin`, `tanggal_lahir`, `status_perkawinan`, `email`, `password`, `id_jabatan`, `id_divisi`, `id_bagian`, `nametag`, `kuesioner_beban_kerja`, `status`, `tanggal_bergabung`, `created_at`) VALUES
(1, 10104006, 'Ayi Putri Nurkaidah', 'Subang', 'P', '1999-04-27', 'belum kawin', 'ayiputrink@gmail.com', '123456', 2, 7, 34, 'aa081589202d1f94a00962710ec204e9.jpg', 0, 'active', '0000-00-00', '2020-05-26 06:22:42'),
(2, 2020, 'Nuca', '', 'L', '1994-05-11', 'belum kawin', 'nuca@gmail.com', '123456', 2, NULL, NULL, '9c26f2d6903d551d36ff08cc22167cd9.jpg', 0, 'suspend', '0000-00-00', '2020-05-26 06:22:49'),
(3, 10104009, 'Lyodra', '', 'P', '1996-02-20', 'belum kawin', 'lyodra@gmail.com', '123456', 1, 7, 34, NULL, 0, 'active', '2020-05-13', '2020-07-02 14:54:51'),
(8, NULL, 'arvi', NULL, NULL, '0000-00-00', 'belum kawin', 'arvi@gmail.com', '123456', NULL, NULL, NULL, NULL, 0, 'active', '0000-00-00', '2020-03-31 03:29:42'),
(9, NULL, 'naufa', NULL, NULL, '0000-00-00', 'belum kawin', 'naufa@gmail.com', '123456', NULL, NULL, NULL, NULL, 0, 'unverified', '0000-00-00', '2020-03-31 04:39:25'),
(10, NULL, 'kekey', NULL, NULL, '0000-00-00', 'belum kawin', 'kekey@gmail.com', '123456', NULL, NULL, NULL, NULL, 0, 'unverified', '0000-00-00', '2020-04-09 12:16:09'),
(11, 0, 'programmer', '', NULL, '0000-00-00', 'belum kawin', 'programmer@gmail.com', '123456', 1, 10, 19, NULL, 0, 'unverified', '0000-00-00', '2020-06-02 17:09:22'),
(12, NULL, 'user1', NULL, NULL, '0000-00-00', 'belum kawin', 'user1@gmail.com', '123456', NULL, NULL, NULL, NULL, 0, 'unverified', '0000-00-00', '2020-04-09 12:23:14'),
(13, NULL, 'user2', NULL, NULL, '0000-00-00', 'belum kawin', 'user2@gmail.com', '123456', NULL, NULL, NULL, NULL, 0, 'unverified', '0000-00-00', '2020-04-09 12:27:18'),
(14, 3020, 'user3', 'Majalengka', 'L', '2020-04-01', 'belum kawin', 'user3@gmail.com', '123456', 2, 13, 41, NULL, 0, 'unverified', '0000-00-00', '2020-06-04 15:53:29'),
(15, 1122, 'user4', '', NULL, '0000-00-00', 'belum kawin', 'user4@gmail.com', '123456', NULL, NULL, NULL, NULL, 0, 'unverified', '0000-00-00', '2020-06-04 12:10:53'),
(16, NULL, 'user5', NULL, NULL, '0000-00-00', 'belum kawin', 'user5@gmail.com', '123456', NULL, NULL, NULL, NULL, 0, 'unverified', '0000-00-00', '2020-04-09 12:38:38'),
(17, NULL, 'user6', NULL, NULL, '0000-00-00', 'belum kawin', 'user6@gmail.com', '123456', NULL, NULL, NULL, NULL, 0, 'unverified', '0000-00-00', '2020-04-09 12:41:16'),
(18, 9856333, 'user7', 'Majalengka', NULL, '1995-10-10', 'belum kawin', 'user7@gmail.com', '123456', 2, 9, 16, '4d6477096f1fcd07cf0caa60d7adbba4.JPG', 0, 'active', '0000-00-00', '2020-05-26 06:18:56'),
(19, 98563334, 'zuck', 'Majalengka', 'L', '1990-05-12', 'belum kawin', 'zuck@gmail.com', '123456', 2, 4, 10, '6b1b35b7219ffb9ff510c70a6784250d.jpg', 0, 'unverified', '0000-00-00', '2020-06-02 09:52:59'),
(20, 202020, 'Rindi', '', 'P', '2020-06-01', 'belum kawin', 'rindi@gmail.com', '123456', 1, 13, NULL, NULL, 0, 'unverified', '0000-00-00', '2020-06-04 16:06:32'),
(21, 20201, 'Fauzan', 'Jakarta', 'L', '1995-02-01', 'belum kawin', 'fauzan@gmail.com', '123456', 2, 6, 30, NULL, 0, 'unverified', '0000-00-00', '2020-06-04 16:06:36'),
(22, 20323, 'Arjun', 'Bandung', 'L', '1996-06-09', 'belum kawin', 'arjun@gmail.com', '123456', 1, 12, 38, NULL, 0, 'unverified', '0000-00-00', '2020-06-04 16:06:39'),
(23, 45454554, 'Ajeng', 'Bandung', 'P', '1995-02-02', 'belum kawin', 'ajeng@gmail.com', '123456', 1, 9, 15, '92b06f7108cf2e5ec2b20eb7f0758155.jpg', 0, 'unverified', '0000-00-00', '2020-06-04 16:14:20'),
(24, 396767676, 'kanoe', 'Subang', 'L', '2020-07-05', 'kawin', 'kanoe@gmail.com', '123456', 1, 7, 34, 'a8bd2daf3271cec91b0497feb00647a5.PNG', 0, 'active', '0000-00-00', '2020-07-01 14:57:33');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `username` (`username`);

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
-- Indeks untuk tabel `data_training`
--
ALTER TABLE `data_training`
  ADD PRIMARY KEY (`id_data_training`);

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
-- Indeks untuk tabel `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`id_notifikasi`);

--
-- Indeks untuk tabel `sample_coba`
--
ALTER TABLE `sample_coba`
  ADD PRIMARY KEY (`id_sample`);

--
-- Indeks untuk tabel `tugas`
--
ALTER TABLE `tugas`
  ADD PRIMARY KEY (`id_tugas`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `nik` (`nik`);

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
  MODIFY `id_assign` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `bagian`
--
ALTER TABLE `bagian`
  MODIFY `id_bagian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT untuk tabel `data_training`
--
ALTER TABLE `data_training`
  MODIFY `id_data_training` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `divisi`
--
ALTER TABLE `divisi`
  MODIFY `id_divisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `item_tugas`
--
ALTER TABLE `item_tugas`
  MODIFY `id_item_tugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `komentar_tugas`
--
ALTER TABLE `komentar_tugas`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `id_notifikasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `sample_coba`
--
ALTER TABLE `sample_coba`
  MODIFY `id_sample` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=352;

--
-- AUTO_INCREMENT untuk tabel `tugas`
--
ALTER TABLE `tugas`
  MODIFY `id_tugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
