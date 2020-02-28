-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Des 2019 pada 16.36
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `volunteerku`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `fenomena`
--

CREATE TABLE `fenomena` (
  `id_fenomena` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `waktu_mulai` date NOT NULL,
  `n_relawan` int(5) DEFAULT NULL,
  `kota` varchar(100) NOT NULL,
  `prov` varchar(255) NOT NULL,
  `gambar` varchar(50) DEFAULT NULL,
  `waktu_selesai` date NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `fenomena`
--

INSERT INTO `fenomena` (`id_fenomena`, `judul`, `kategori`, `waktu_mulai`, `n_relawan`, `kota`, `prov`, `gambar`, `waktu_selesai`, `keterangan`) VALUES
(6, 'Asian Games 2018', 'Event', '2018-01-01', 97, 'Bandung', 'Jawa Barat', 'fenomena_799.png', '2018-01-31', 'Sukseskan kegiatan ini dengan menjadi bagian dari kami.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `no_identitas` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `alamat` varchar(512) NOT NULL,
  `tipe_akun` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `no_identitas`, `nama`, `email`, `alamat`, `tipe_akun`, `password`) VALUES
(21, '1301170762', 'Muhammad Shabri Arrahim Mardi', 'elbathny@gmail.com', 'Jl Jl', 'Pengguna Biasa', '$2y$10$RR0taeJ3RjHciz5Vu9myvuhZG/JzQNjIb6ifmN4X8sM8HvIzrr/HG'),
(22, '1', 'admin', 'admin@gmail.com', '-', 'Admin', '$2y$10$10XVraYxKyx3HHI0/gTPWOLttnppH8jJ57ucb7.Owk4rSG/Sr1bua');

-- --------------------------------------------------------

--
-- Struktur dari tabel `volunteer`
--

CREATE TABLE `volunteer` (
  `id_volunteer` int(11) NOT NULL,
  `tgl_join` date NOT NULL,
  `user` varchar(11) NOT NULL,
  `fenomena` varchar(11) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `volunteer`
--

INSERT INTO `volunteer` (`id_volunteer`, `tgl_join`, `user`, `fenomena`, `status`) VALUES
(3, '2019-12-02', '1301170762', '6', 'Belum Valid'),
(4, '2019-12-02', '1301170762', '6', 'Belum Valid');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `fenomena`
--
ALTER TABLE `fenomena`
  ADD PRIMARY KEY (`id_fenomena`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `no_identitas` (`no_identitas`);

--
-- Indeks untuk tabel `volunteer`
--
ALTER TABLE `volunteer`
  ADD PRIMARY KEY (`id_volunteer`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `fenomena`
--
ALTER TABLE `fenomena`
  MODIFY `id_fenomena` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `volunteer`
--
ALTER TABLE `volunteer`
  MODIFY `id_volunteer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
