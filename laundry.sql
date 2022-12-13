-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Nov 2022 pada 01.49
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laundry`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `konsumen`
--

CREATE TABLE `konsumen` (
  `kode_konsumen` varchar(12) NOT NULL,
  `nama_konsumen` varchar(50) NOT NULL,
  `alamat_konsumen` text NOT NULL,
  `no_telp` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `konsumen`
--

INSERT INTO `konsumen` (`kode_konsumen`, `nama_konsumen`, `alamat_konsumen`, `no_telp`) VALUES
('K001', 'Remdy', 'Indonesia', '082453565632'),
('K002', 'Predi Marley', 'Indonesia', '081234653674'),
('K003', 'Hamzah', 'Indonesia', '082345763892');

-- --------------------------------------------------------

--
-- Struktur dari tabel `paket`
--

CREATE TABLE `paket` (
  `kode_paket` varchar(20) NOT NULL,
  `nama_paket` varchar(50) NOT NULL,
  `harga_paket` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `paket`
--

INSERT INTO `paket` (`kode_paket`, `nama_paket`, `harga_paket`) VALUES
('PK001', 'Cuci Basah', '5000'),
('PK002', 'Cuci Kering', '7000'),
('PK003', 'Cuci + Strika', '8000'),
('PK004', 'Strika + Pewangi', '10000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `kode_transaksi` varchar(20) NOT NULL,
  `kode_konsumen` varchar(12) NOT NULL,
  `kode_paket` varchar(12) NOT NULL,
  `tgl_masuk` datetime NOT NULL,
  `tgl_ambil` datetime NOT NULL,
  `berat` int(10) NOT NULL,
  `grand_total` int(12) NOT NULL,
  `bayar` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`kode_transaksi`, `kode_konsumen`, `kode_paket`, `tgl_masuk`, `tgl_ambil`, `berat`, `grand_total`, `bayar`, `status`) VALUES
('TR20221121002', 'K002', 'PK003', '2022-11-21 10:52:13', '0000-00-00 00:00:00', 4, 32000, 'Belum Lunas', 'Baru'),
('TR20221122003', 'K003', 'PK004', '2022-11-22 01:47:17', '0000-00-00 00:00:00', 5, 25000, 'Belum Lunas', 'Baru');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`) VALUES
(2, 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `konsumen`
--
ALTER TABLE `konsumen`
  ADD PRIMARY KEY (`kode_konsumen`);

--
-- Indeks untuk tabel `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`kode_paket`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`kode_transaksi`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
