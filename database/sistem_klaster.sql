-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Agu 2023 pada 13.58
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistem_klaster`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_raw`
--

CREATE TABLE `data_raw` (
  `no_pelanggan_raw` bigint(20) NOT NULL,
  `nama_pelanggan_raw` varchar(100) NOT NULL,
  `tarif_pelanggan_raw` varchar(10) NOT NULL,
  `daya_pelanggan_raw` float NOT NULL,
  `alamat_pelanggan_raw` text NOT NULL,
  `pekerjaan_pelanggan_raw` varchar(50) NOT NULL,
  `penghasilan_pelanggan_raw` int(50) NOT NULL,
  `tanggungan_pelanggan_raw` int(5) NOT NULL,
  `sktm_pelanggan_raw` varchar(6) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_result_cluster`
--

CREATE TABLE `data_result_cluster` (
  `no_pelanggan_result` bigint(20) NOT NULL,
  `nama_pelanggan_result` varchar(100) NOT NULL,
  `tarif_pelanggan_result` varchar(10) NOT NULL,
  `daya_pelanggan_result` float NOT NULL,
  `alamat_pelanggan_result` text NOT NULL,
  `pekerjaan_pelanggan_result` varchar(50) NOT NULL,
  `penghasilan_pelanggan_result` int(50) NOT NULL,
  `tanggungan_pelanggan_result` int(5) NOT NULL,
  `sktm_pelanggan_result` varchar(6) NOT NULL,
  `kategori_result` varchar(15) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `nama_kantor` text NOT NULL,
  `alamat_kantor` text NOT NULL,
  `kontak` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(10) NOT NULL DEFAULT 'users',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_raw`
--
ALTER TABLE `data_raw`
  ADD PRIMARY KEY (`no_pelanggan_raw`);

--
-- Indeks untuk tabel `data_result_cluster`
--
ALTER TABLE `data_result_cluster`
  ADD PRIMARY KEY (`no_pelanggan_result`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_raw`
--
ALTER TABLE `data_raw`
  MODIFY `no_pelanggan_raw` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `data_result_cluster`
--
ALTER TABLE `data_result_cluster`
  MODIFY `no_pelanggan_result` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
