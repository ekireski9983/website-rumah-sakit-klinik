-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Feb 2023 pada 05.09
-- Versi server: 10.4.20-MariaDB
-- Versi PHP: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ujikom_Rezkyjayadisaputra`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `berobat`
--

CREATE TABLE `berobat` (
  `no_transaksi` char(10) NOT NULL,
  `pasienklinik_id` varchar(25) NOT NULL,
  `tanggal_berobat` date NOT NULL,
  `dokter_id` varchar(10) NOT NULL,
  `keluhan_pasien` varchar(15) NOT NULL,
  `biaya_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `berobat`
--

INSERT INTO `berobat` (`no_transaksi`, `pasienklinik_id`, `tanggal_berobat`, `dokter_id`, `keluhan_pasien`, `biaya_admin`) VALUES
('TR002', 'PS.002', '2017-08-15', 'DR002', 'Demam', 75000),
('TR003', 'PS.003', '2017-08-19', 'DR003', 'Pendarahan Teli', 90000),
('TR002', 'PS.002', '2017-08-15', 'DR02', 'Demam', 75000),
('TR003', 'PS.003', '2017-08-19', 'DR03', 'Telinga', 90000),
('TR001', 'PS.001', '2017-07-17', 'DR01', 'Sakit Gigi', 125000),
('TR004', 'PS.002', '2019-03-05', 'DR02', 'Sakit pinggang', 75000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokter`
--

CREATE TABLE `dokter` (
  `dokter_id` char(10) NOT NULL,
  `nama_dokter` varchar(20) NOT NULL,
  `poli_id` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dokter`
--

INSERT INTO `dokter` (`dokter_id`, `nama_dokter`, `poli_id`) VALUES
('DR01', 'dr.Ratna', 'PL01'),
('DR02', 'dr.Rudy', 'PL02'),
('DR03', 'dr.Joko', 'PL03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien`
--

CREATE TABLE `pasien` (
  `pasienklinik_id` char(10) NOT NULL,
  `nama_pasienklinik` varchar(20) NOT NULL,
  `usia` int(10) NOT NULL,
  `tanggal_lahirpasien` date NOT NULL,
  `jenis_kelaminpsien` varchar(10) NOT NULL,
  `alamat_pasien` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pasien`
--

INSERT INTO `pasien` (`pasienklinik_id`, `nama_pasienklinik`, `usia`, `tanggal_lahirpasien`, `jenis_kelaminpsien`, `alamat_pasien`) VALUES
('PS.001', 'Barata Yuda', 45, '2023-02-05', 'Laki-Laki', 'Jln.Utan Panjang 3'),
('PS.002', 'Indah Susanti', 17, '2023-02-10', 'Perempuan', 'Jln. Cempaka Putih'),
('PS.003', 'Kurniawan', 10, '2023-02-01', 'Laki-Laki', 'Jln.Lebak Bulus');

-- --------------------------------------------------------

--
-- Struktur dari tabel `poli`
--

CREATE TABLE `poli` (
  `poli_id` char(10) NOT NULL,
  `nama_poli` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `poli`
--

INSERT INTO `poli` (`poli_id`, `nama_poli`) VALUES
('PL01', 'Gigi'),
('PL02', 'Umum'),
('PL03', 'THT');

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `vrekammedis`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `vrekammedis` (
`no_transaksi` char(10)
,`tanggal_berobat` date
,`nama_pasienklinik` varchar(20)
,`usia` int(10)
,`jenis_kelaminpsien` varchar(10)
,`keluhan_pasien` varchar(15)
,`nama_poli` varchar(20)
,`nama_dokter` varchar(20)
,`biaya_admin` int(11)
);

-- --------------------------------------------------------

--
-- Struktur untuk view `vrekammedis`
--
DROP TABLE IF EXISTS `vrekammedis`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vrekammedis`  AS SELECT `berobat`.`no_transaksi` AS `no_transaksi`, `berobat`.`tanggal_berobat` AS `tanggal_berobat`, `pasien`.`nama_pasienklinik` AS `nama_pasienklinik`, `pasien`.`usia` AS `usia`, `pasien`.`jenis_kelaminpsien` AS `jenis_kelaminpsien`, `berobat`.`keluhan_pasien` AS `keluhan_pasien`, `poli`.`nama_poli` AS `nama_poli`, `dokter`.`nama_dokter` AS `nama_dokter`, `berobat`.`biaya_admin` AS `biaya_admin` FROM (((`pasien` join `poli`) join `dokter`) join `berobat`) WHERE `pasien`.`pasienklinik_id` = `berobat`.`pasienklinik_id` AND `dokter`.`dokter_id` = `berobat`.`dokter_id` AND `poli`.`poli_id` = `dokter`.`poli_id` ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`dokter_id`);

--
-- Indeks untuk tabel `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`pasienklinik_id`);

--
-- Indeks untuk tabel `poli`
--
ALTER TABLE `poli`
  ADD PRIMARY KEY (`poli_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
