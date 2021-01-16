-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Jan 2021 pada 08.59
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sigds`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru`
--

CREATE TABLE `guru` (
  `nik_guru` varchar(15) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `keterangan`
--

CREATE TABLE `keterangan` (
  `id` int(11) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `point` int(3) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggar`
--

CREATE TABLE `pelanggar` (
  `id_pelanggar` int(11) NOT NULL,
  `nisn` varchar(15) NOT NULL,
  `id_pelanggaran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggaran`
--

CREATE TABLE `pelanggaran` (
  `id_pelanggaran` int(11) NOT NULL,
  `pelanggaran` varchar(50) NOT NULL,
  `point` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `peringatan`
--

CREATE TABLE `peringatan` (
  `id_peringatan` int(11) NOT NULL,
  `nisn` varchar(15) NOT NULL,
  `jumlah` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `nisn` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `point`
--

CREATE TABLE `point` (
  `id_pont` int(11) NOT NULL,
  `nisn` varchar(15) NOT NULL,
  `point` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `nisn` varchar(15) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`nik_guru`);

--
-- Indeks untuk tabel `keterangan`
--
ALTER TABLE `keterangan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pelanggar`
--
ALTER TABLE `pelanggar`
  ADD PRIMARY KEY (`id_pelanggar`),
  ADD KEY `fk_nisn_pelanggar` (`nisn`),
  ADD KEY `fk_id_pelanggaran` (`id_pelanggaran`);

--
-- Indeks untuk tabel `pelanggaran`
--
ALTER TABLE `pelanggaran`
  ADD PRIMARY KEY (`id_pelanggaran`);

--
-- Indeks untuk tabel `peringatan`
--
ALTER TABLE `peringatan`
  ADD PRIMARY KEY (`id_peringatan`),
  ADD KEY `fk_nisn` (`nisn`);

--
-- Indeks untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`),
  ADD KEY `foreign_nisn_petugas` (`nisn`);

--
-- Indeks untuk tabel `point`
--
ALTER TABLE `point`
  ADD PRIMARY KEY (`id_pont`),
  ADD KEY `fk_nisn_point` (`nisn`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nisn`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `keterangan`
--
ALTER TABLE `keterangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pelanggar`
--
ALTER TABLE `pelanggar`
  MODIFY `id_pelanggar` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pelanggaran`
--
ALTER TABLE `pelanggaran`
  MODIFY `id_pelanggaran` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `peringatan`
--
ALTER TABLE `peringatan`
  MODIFY `id_peringatan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `point`
--
ALTER TABLE `point`
  MODIFY `id_pont` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pelanggar`
--
ALTER TABLE `pelanggar`
  ADD CONSTRAINT `fk_id_pelanggaran` FOREIGN KEY (`id_pelanggaran`) REFERENCES `pelanggaran` (`id_pelanggaran`),
  ADD CONSTRAINT `fk_nisn_pelanggar` FOREIGN KEY (`nisn`) REFERENCES `siswa` (`nisn`);

--
-- Ketidakleluasaan untuk tabel `peringatan`
--
ALTER TABLE `peringatan`
  ADD CONSTRAINT `fk_nisn` FOREIGN KEY (`nisn`) REFERENCES `siswa` (`nisn`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD CONSTRAINT `foreign_nisn_petugas` FOREIGN KEY (`nisn`) REFERENCES `siswa` (`nisn`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `point`
--
ALTER TABLE `point`
  ADD CONSTRAINT `fk_nisn_point` FOREIGN KEY (`nisn`) REFERENCES `siswa` (`nisn`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
