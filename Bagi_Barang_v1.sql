-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Apr 2020 pada 05.24
-- Versi server: 10.3.16-MariaDB
-- Versi PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bagi_barang_v1`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` varchar(255) NOT NULL,
  `id_campaign` varchar(255) NOT NULL,
  `id_donatur` varchar(255) NOT NULL,
  `kategori_barang` varchar(255) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `jumlah_barang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_dibutuhkan`
--

CREATE TABLE `barang_dibutuhkan` (
  `id_barang_butuh` varchar(255) NOT NULL,
  `id_campaign` varchar(255) NOT NULL,
  `kategori_barang` varchar(255) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `jumlah_barang_butuh` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `campaign`
--

CREATE TABLE `campaign` (
  `id_campaign` varchar(255) NOT NULL,
  `id_volunteer` varchar(255) NOT NULL,
  `judul_campaign` varchar(255) NOT NULL,
  `tanggal_campaign` datetime NOT NULL,
  `batas_campaign` datetime NOT NULL,
  `deskripsi_campaign` varchar(255) NOT NULL,
  `ajakan_campaign` varchar(255) NOT NULL,
  `kategori_campaign` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `donasi`
--

CREATE TABLE `donasi` (
  `id_donasi` varchar(255) NOT NULL,
  `tanggal_donasi` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `donatur`
--

CREATE TABLE `donatur` (
  `id_donatur` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `no_ktp` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `no_tlp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_barang`
--

CREATE TABLE `kategori_barang` (
  `id_kategori_barang` varchar(255) NOT NULL,
  `nama_kategori_barang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_campaign`
--

CREATE TABLE `kategori_campaign` (
  `id_kategori` varchar(255) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `paket`
--

CREATE TABLE `paket` (
  `id_paket` varchar(255) NOT NULL,
  `id_donatur` varchar(255) NOT NULL,
  `id_campaign` varchar(255) NOT NULL,
  `id_pengelola` varchar(255) NOT NULL,
  `nama_kurir` varchar(255) NOT NULL,
  `no_resi` varchar(255) NOT NULL,
  `tanggal_pengiriman` varchar(255) NOT NULL,
  `tanggal_diterima` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penerimaan_barang`
--

CREATE TABLE `penerimaan_barang` (
  `id_laporan` varchar(255) NOT NULL,
  `id_campaign` varchar(255) NOT NULL,
  `tgl_dibuat` varchar(255) NOT NULL,
  `tgl_diacc` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `link_video` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penerima_donasi`
--

CREATE TABLE `penerima_donasi` (
  `id_penerima_donasi` varchar(255) NOT NULL,
  `id_campaign` varchar(255) NOT NULL,
  `nama_penerima_donasi` varchar(255) NOT NULL,
  `no_ktp` varchar(255) NOT NULL,
  `alamat_penerima_donasi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengelola`
--

CREATE TABLE `pengelola` (
  `id_pengelola` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `no_ktp` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `no_tlp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `volunteer`
--

CREATE TABLE `volunteer` (
  `id_volunteer` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `no_ktp` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `no_tlp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `wallet`
--

CREATE TABLE `wallet` (
  `id_wallet` varchar(255) NOT NULL,
  `id_campaign` varchar(255) NOT NULL,
  `id_donatur` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `private_key` varchar(255) NOT NULL,
  `public_key` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `id_campaign` (`id_campaign`),
  ADD KEY `id_donatur` (`id_donatur`);

--
-- Indeks untuk tabel `barang_dibutuhkan`
--
ALTER TABLE `barang_dibutuhkan`
  ADD PRIMARY KEY (`id_barang_butuh`),
  ADD KEY `id_campaign` (`id_campaign`);

--
-- Indeks untuk tabel `campaign`
--
ALTER TABLE `campaign`
  ADD PRIMARY KEY (`id_campaign`),
  ADD KEY `id_volunteer` (`id_volunteer`);

--
-- Indeks untuk tabel `donasi`
--
ALTER TABLE `donasi`
  ADD PRIMARY KEY (`id_donasi`);

--
-- Indeks untuk tabel `donatur`
--
ALTER TABLE `donatur`
  ADD PRIMARY KEY (`id_donatur`);

--
-- Indeks untuk tabel `kategori_barang`
--
ALTER TABLE `kategori_barang`
  ADD PRIMARY KEY (`id_kategori_barang`);

--
-- Indeks untuk tabel `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`id_paket`),
  ADD KEY `id_donatur` (`id_donatur`,`id_campaign`),
  ADD KEY `id_campaign` (`id_campaign`),
  ADD KEY `id_pengelola` (`id_pengelola`);

--
-- Indeks untuk tabel `penerimaan_barang`
--
ALTER TABLE `penerimaan_barang`
  ADD PRIMARY KEY (`id_laporan`),
  ADD KEY `id_campaign` (`id_campaign`);

--
-- Indeks untuk tabel `penerima_donasi`
--
ALTER TABLE `penerima_donasi`
  ADD PRIMARY KEY (`id_penerima_donasi`),
  ADD KEY `id_campaign` (`id_campaign`);

--
-- Indeks untuk tabel `pengelola`
--
ALTER TABLE `pengelola`
  ADD PRIMARY KEY (`id_pengelola`);

--
-- Indeks untuk tabel `volunteer`
--
ALTER TABLE `volunteer`
  ADD PRIMARY KEY (`id_volunteer`);

--
-- Indeks untuk tabel `wallet`
--
ALTER TABLE `wallet`
  ADD PRIMARY KEY (`id_wallet`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`id_campaign`) REFERENCES `campaign` (`id_campaign`),
  ADD CONSTRAINT `barang_ibfk_2` FOREIGN KEY (`id_donatur`) REFERENCES `donatur` (`id_donatur`);

--
-- Ketidakleluasaan untuk tabel `barang_dibutuhkan`
--
ALTER TABLE `barang_dibutuhkan`
  ADD CONSTRAINT `barang_dibutuhkan_ibfk_1` FOREIGN KEY (`id_campaign`) REFERENCES `campaign` (`id_campaign`);

--
-- Ketidakleluasaan untuk tabel `campaign`
--
ALTER TABLE `campaign`
  ADD CONSTRAINT `campaign_ibfk_1` FOREIGN KEY (`id_volunteer`) REFERENCES `volunteer` (`id_volunteer`);

--
-- Ketidakleluasaan untuk tabel `paket`
--
ALTER TABLE `paket`
  ADD CONSTRAINT `paket_ibfk_1` FOREIGN KEY (`id_campaign`) REFERENCES `campaign` (`id_campaign`),
  ADD CONSTRAINT `paket_ibfk_2` FOREIGN KEY (`id_pengelola`) REFERENCES `pengelola` (`id_pengelola`);

--
-- Ketidakleluasaan untuk tabel `penerimaan_barang`
--
ALTER TABLE `penerimaan_barang`
  ADD CONSTRAINT `penerimaan_barang_ibfk_1` FOREIGN KEY (`id_campaign`) REFERENCES `campaign` (`id_campaign`);

--
-- Ketidakleluasaan untuk tabel `penerima_donasi`
--
ALTER TABLE `penerima_donasi`
  ADD CONSTRAINT `penerima_donasi_ibfk_1` FOREIGN KEY (`id_campaign`) REFERENCES `campaign` (`id_campaign`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
