-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 29 Bulan Mei 2020 pada 04.49
-- Versi server: 8.0.13-4
-- Versi PHP: 7.2.24-0ubuntu0.18.04.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `d1mNREuOwm`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` varchar(255) NOT NULL,
  `id_donatur` varchar(255) NOT NULL,
  `id_campaign` varchar(255) NOT NULL,
  `id_paket` varchar(255) DEFAULT NULL,
  `kategori_barang` varchar(255) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `jumlah_barang` varchar(255) NOT NULL,
  `jumlah_barang_rusak` varchar(255) NOT NULL,
  `satuan_barang` varchar(255) NOT NULL,
  `catatan_barang` varchar(255) NOT NULL,
  `resi` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `id_donatur`, `id_campaign`, `id_paket`, `kategori_barang`, `nama_barang`, `jumlah_barang`, `jumlah_barang_rusak`, `satuan_barang`, `catatan_barang`, `resi`, `status`) VALUES
('BRNG-1701-0001', 'DNTR-1502-0001', 'CMPG-0002-0002', NULL, 'KTBR-0001-0003', 'Hand Sanitizer', '10', '', 'Dirigen/20L', '10 Dirigen/20L Hand Sanitizer', '', 'Menunggu Pengiriman'),
('BRNG-1701-0002', 'DNTR-1502-0002', 'CMPG-0001-0001', NULL, 'KTBR-0001-0003', 'Hand Sanitizer', '100', '', 'Dirigen/20L', '', '431FJ49J9G3JY', 'Di Terima (Warehouse)'),
('BRNG-1701-0003', 'DNTR-1502-0002', 'CMPG-0001-0001', NULL, 'KTBR-0001-0004', 'Masker', '20', '', 'Box', '', '', 'Menunggu Pengiriman');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_dibutuhkan`
--

CREATE TABLE `barang_dibutuhkan` (
  `id_barang_butuh` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `id_campaign` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `nama_barang` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `kategori_barang` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `jumlah` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `satuan_barang` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `barang_dibutuhkan`
--

INSERT INTO `barang_dibutuhkan` (`id_barang_butuh`, `id_campaign`, `nama_barang`, `kategori_barang`, `jumlah`, `satuan_barang`) VALUES
('BRNG-BTH1-0001', 'CMPG-0001-0001', 'APD', 'KTBR-0001-0004', '1000', 'Box'),
('BRNG-BTH1-0002', 'CMPG-0001-0001', 'Masker', 'KTBR-0001-0004', '2000', 'Box'),
('BRNG-BTH1-0003', 'CMPG-0001-0001', 'Hand Sanitizer', 'KTBR-0001-0003', '1000', 'Dirigen/20L'),
('BRNG-BTH1-0004', 'CMPG-0002-0002', 'Buku Tulis', 'KTBR-0001-0006', '10000', 'Pax'),
('BRNG-BTH1-0005', 'CMPG-0002-0002', ' Tas', 'KTBR-0001-0006', '900000', 'Pcs');

-- --------------------------------------------------------

--
-- Struktur dari tabel `campaign`
--

CREATE TABLE `campaign` (
  `id_campaign` varchar(255) NOT NULL,
  `id_volunteer` varchar(255) NOT NULL,
  `judul_campaign` varchar(255) NOT NULL,
  `alamat_campaign` varchar(255) NOT NULL,
  `kategori_campaign` varchar(255) NOT NULL,
  `tanggal_campaign` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `batas_campaign` datetime NOT NULL,
  `deskripsi_campaign` text NOT NULL,
  `ajakan_campaign` text NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `campaign`
--

INSERT INTO `campaign` (`id_campaign`, `id_volunteer`, `judul_campaign`, `alamat_campaign`, `kategori_campaign`, `batas_campaign`, `deskripsi_campaign`, `ajakan_campaign`, `keterangan`, `gambar`, `flag`) VALUES
('CMPG-0001-0001', 'VLNT-1503-0001', 'Donasi COVID-19 Bandung dan Sekitarnya', 'Jl. Adhyaksa Raya No.33A, Sukapura, Bandung, Jawa Barat', 'KTGR-CMPG-0001', '2020-07-12 00:00:00', 'Mari bantu lawan COVID-19 untuk warga Bandung #DiRumahAja', 'Mari bantu lawan COVID-19 untuk warga Bandung #DiRumahAja', 'Organisasi', 'uploads/gambarCampaign/CMPG-0001-0001.jpg', 0),
('CMPG-0002-0002', 'VLNT-1503-0002', 'Bantuan untuk Sekolah di Pelosok Indonesia', 'Kelapa Gading, Jakarta Timur', 'KTGR-CMPG-0002', '2020-05-27 00:00:00', 'Pendidikan merupakan aset terpenting di negara ini', 'Mari kita memajukan pendidikan di Indonesia', 'Organisasi', 'uploads/gambarCampaign/CMPG-0001-002.jpg', 1),
('CMPG-0002-0003', 'VLNT-1503-0002', 'Bantuan Anak Panti Asuhan di Pelosok Indonesia', 'Kelapa Gading, Jakarta Timur', 'KTGR-CMPG-0003', '2020-07-01 00:00:00', 'Pendidikan merupakan aset terpenting di negara ini', 'Pendidikan merupakan aset terpenting di negara ini', 'Organisasi', 'uploads/gambarCampaign/CMPG-0001-003.jpg', 0),
('CMPG-0002-0004', 'VLNT-1503-0002', 'Bantu Para Difabel untuk bertahan hidup', 'Kelapa Gading, Jakarta Timur', 'KTGR-CMPG-0004', '2020-08-26 00:00:00', 'Pendidikan merupakan aset terpenting di negara ini', 'Pendidikan merupakan aset terpenting di negara ini', 'Organisasi', 'uploads/gambarCampaign/CMPG-0001-004.jpg', 0),
('CMPG-0002-0005', 'VLNT-1503-0002', 'Bantu Anak-anak berjuang melawan Covid-19', 'Kelapa Gading, Jakarta Timur', 'KTGR-CMPG-0005', '2020-07-12 00:00:00', 'Pendidikan merupakan aset terpenting di negara ini', 'Pendidikan merupakan aset terpenting di negara ini', 'Organisasi', 'uploads/gambarCampaign/CMPG-0001-006.png', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `donasi`
--

CREATE TABLE `donasi` (
  `id_donasi` varchar(255) NOT NULL,
  `id_campaign` varchar(255) NOT NULL,
  `tanggal_donasi` datetime NOT NULL,
  `message` varchar(255) NOT NULL,
  `timeStamp` varchar(255) NOT NULL,
  `recipient` varchar(255) NOT NULL,
  `namespaceId` varchar(255) NOT NULL,
  `mosaicName` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `txHash` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `donasi`
--

INSERT INTO `donasi` (`id_donasi`, `id_campaign`, `tanggal_donasi`, `message`, `timeStamp`, `recipient`, `namespaceId`, `mosaicName`, `quantity`, `txHash`) VALUES
('DONATE-0001-0001', 'CMPG-0001-0001', '2020-05-28 23:22:14', 'BRNG-1701-0001 Hand Sanitizer', '163070147', 'TBYGKIMBHH737XLZIMYIKJJD4VZI2V4SV3KYY23M', 'bagibarang', 'barang', 10, 'b2f0c88d4010fe0bfcdfa9f553213baad209a5f474a524377204be64efc2d272');

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
  `no_tlp` varchar(255) NOT NULL,
  `privateKey` varchar(255) NOT NULL,
  `publicKey` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `donatur`
--

INSERT INTO `donatur` (`id_donatur`, `email`, `nama`, `no_ktp`, `password`, `alamat`, `jenis_kelamin`, `foto`, `no_tlp`, `privateKey`, `publicKey`, `address`, `status`) VALUES
('DNTR-1502-0001', 'alviputra48@gmail.com', 'Alvi Putra', '', '30ded8451def1c67259755f9b1f0c03f4b57ab54da081fa41fc85713dbe9aecb132472661221b18b84b0073d988f7045a94d17860d102117f118205a88f05849BDxV77/kVMLjGWKVAUnRG5HfrwVC8oyE/L02WXXEEhE=', '', '', '', '', '3fb581c79819540041d12f4d02f7fe630b853a8a95cb4afd2bb69bdf7d85048f', 'a00ab5b508271a43127e05fc9b29957236181a419ebe386856e3aebecb4b8588', 'TDJ6K4DN7EUDTLFHWPSS7OQ3BIXLLC4NR3X4GRLP', 1),
('DNTR-1502-0002', 'richardmaulana354@gmail.com', 'richard', '', '9fa85f85bbc61cf82b619cbf3e559b9af00dfc1f0a603bdfdf9258647816b44dc7a9fcb3e9ee5fa9c29f3f7e7ab87d6c90d95667df7b33d86dd3621f749c6725GKnwyv+/WeljAvYJLx14mgWM1rm6p9lTG8CQ2BGuhFY=', '', '', 'uploads/fotoProfil/ft_d/Donatur.JPG', '', '536f603a776caa4739c28bd44bacdc618d2ca15a553524a06651f617161ee0c0', '606d394a3171bed5a83eef38e767f88129c36751ad511c5541a556cc4d16b476', 'TC5OMTGYJWNONTUFIYSOFTYQDX5Y2ZOXGLRIS24K', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_barang`
--

CREATE TABLE `kategori_barang` (
  `id_kategori_barang` varchar(255) NOT NULL,
  `nama_kategori_barang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori_barang`
--

INSERT INTO `kategori_barang` (`id_kategori_barang`, `nama_kategori_barang`) VALUES
('KTBR-0001-0001', 'Sembako'),
('KTBR-0001-0002', 'Pakaian'),
('KTBR-0001-0003', 'Obat-obatan'),
('KTBR-0001-0004', 'Alat Medis'),
('KTBR-0001-0005', 'Perlengkapan Anak'),
('KTBR-0001-0006', 'Perlengkapan Sekolah'),
('KTBR-0001-0007', 'Lainnya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_campaign`
--

CREATE TABLE `kategori_campaign` (
  `id_kategori_campaign` varchar(255) NOT NULL,
  `nama_kategori_campaign` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori_campaign`
--

INSERT INTO `kategori_campaign` (`id_kategori_campaign`, `nama_kategori_campaign`) VALUES
('KTGR-CMPG-0001', 'Bencana Alam'),
('KTGR-CMPG-0002', 'Pendidikan'),
('KTGR-CMPG-0003', 'Panti Asuhan'),
('KTGR-CMPG-0004', 'Difabel'),
('KTGR-CMPG-0005', 'Keluarga'),
('KTGR-CMPG-0006', 'Kreatif'),
('KTGR-CMPG-0007', 'Rumah Sakit');

-- --------------------------------------------------------

--
-- Struktur dari tabel `paket`
--

CREATE TABLE `paket` (
  `id_paket` varchar(255) NOT NULL,
  `id_campaign` varchar(255) NOT NULL,
  `id_penerima_donasi` varchar(255) NOT NULL,
  `jenis_barang` varchar(255) NOT NULL,
  `nama_kurir` varchar(255) NOT NULL,
  `no_resi` varchar(255) NOT NULL,
  `tanggal_sortir` datetime DEFAULT NULL,
  `tanggal_pengiriman` datetime DEFAULT NULL,
  `tanggal_diterima` datetime DEFAULT NULL,
  `asal` varchar(255) NOT NULL,
  `tujuan` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `paket`
--

INSERT INTO `paket` (`id_paket`, `id_campaign`, `id_penerima_donasi`, `jenis_barang`, `nama_kurir`, `no_resi`, `tanggal_sortir`, `tanggal_pengiriman`, `tanggal_diterima`, `asal`, `tujuan`, `keterangan`, `status`) VALUES
('PCKG-1901-0001', 'CMPG-0001-0001', 'PNRM-0001-0001', 'OBAT-OBATAN', 'J&T', '5GH683H9F923', '2020-05-22 00:00:00', '2020-05-24 00:00:00', '2020-05-27 00:00:00', 'Warehouse Bagi Barang ', 'Sulawesi, Palu', '', 'Paket Sedang Dikirim');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penerimaan_barang`
--

CREATE TABLE `penerimaan_barang` (
  `id_laporan` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `id_campaign` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `tanggal_dibuat` datetime NOT NULL,
  `tanggal_diacc` datetime DEFAULT NULL,
  `link_video` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `foto` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `dokumen` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `penerimaan_barang`
--

INSERT INTO `penerimaan_barang` (`id_laporan`, `id_campaign`, `tanggal_dibuat`, `tanggal_diacc`, `link_video`, `foto`, `dokumen`, `status`, `flag`) VALUES
('LPRN-0001-0001', 'CMPG-0001-0001', '2020-05-28 00:00:00', '2020-05-29 00:00:00', 'http://youtube.com/bagibarang', 'uploads/gambarCampaign/kemanusiaan.jpeg', '', '', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penerima_donasi`
--

CREATE TABLE `penerima_donasi` (
  `id_penerima` varchar(255) NOT NULL,
  `nama_penerima` varchar(255) NOT NULL,
  `no_ktp` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL
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
  `no_tlp` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengelola`
--

INSERT INTO `pengelola` (`id_pengelola`, `email`, `nama`, `no_ktp`, `password`, `jenis_kelamin`, `alamat`, `foto`, `no_tlp`, `status`) VALUES
('EMPL-1501-0001', 'adhidevara@yahoo.com', 'Ariel Adhidevara', '3503110605990003', '3d36f2d96a58d965edcd49797f36b5ecc4cf0e59526a1eef5e0bdbbad45c93bf0c14feecfe31bc572057fae8c2c199ddf0954b4c4968acf1a2d752bc4bdae569LjITTaHMti0goGnyh0opKXL6OR803TzyPQnTUNZSz+4=', 'Laki-Laki', 'Jl.M Yamin No. 5 Sumbergedong, Trenggalek, Rt.5,  Rw.2, Trenggalek', 'assets/dashAssets/images/user.png', '08122100935', 1);

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
  `no_tlp` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `volunteer`
--

INSERT INTO `volunteer` (`id_volunteer`, `email`, `nama`, `no_ktp`, `password`, `jenis_kelamin`, `alamat`, `foto`, `no_tlp`, `status`) VALUES
('VLNT-1503-0001', 'adhidevara@student.telkomuniversity.ac.id', 'Adhi Devara', '2341324134', '9c4d5e47ddcc2c505de9f6485da0fb38f04b5fecd4709259da72df311b59729a891702b3b64c5555b7aadd84197f16505d4d3c1b18262e19906f2862a6827421mi4+duaHs/fgp6PifP9eug1jSRWQNnbCW9nucvJ+UNY=', 'laki - laki ', 'Bandung', 'uploads/fotoProfil/ft_v/ft_v-VLNT-1503-0001-Adhi_Devara.png', '0816382864', 11),
('VLNT-1503-0002', 'antonandre7@gmail.com', 'Antonius Andre', '', '59aef1e829c987490c5108669c8f4f74cbef85a413fb0e19ca160598194d8a0d7397f99433065996cf78646021ceb988a3b6e7f9894f933e273f19adf5bf52faFjRS7+k9nOcvgZFlVA9H1IVCKR47eQROmPKZ9iQSNvQ=', 'laki - laki ', '', 'uploads/fotoProfil/ft_v/ft_v-VLNT-1503-0002-Antonius_Andre2.jpg', '', 11),
('VLNT-1503-0003', 'talithasyahdas@gmail.com', 'Talitha Syahda Salsabila', '3306065502990001', '2f5df6a98f0d757aa1b8b7525c789aa2bf66812189bfba943d76b6b6f774276913674751d13c2eb9cb5753934848697f2a11269c9cc1076ade74366ff201a9a09Wjul56ADPKaMWLzv/XiKARZ8fj96vgYMMbulilqMZg=', 'perempuan', 'Pangenjurutengah rt2 rw3 purworejo jateng', 'uploads/fotoProfil/ft_v/ft_v-VLNT-1503-0003-Talitha_Syahda_Salsabila1.jpeg', '081236015766', 11);

-- --------------------------------------------------------

--
-- Struktur dari tabel `wallet`
--

CREATE TABLE `wallet` (
  `id_wallet` varchar(255) NOT NULL,
  `id_campaign` varchar(255) NOT NULL,
  `private_key` varchar(255) NOT NULL,
  `public_key` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `wallet`
--

INSERT INTO `wallet` (`id_wallet`, `id_campaign`, `private_key`, `public_key`, `address`) VALUES
('WALL-0001-0001', 'CMPG-0001-0001', 'a260ab09c0f2818264085aa69d1f257ad1a6a8d260131c37ff5f9828796021c6', '7814d38b5c0d24ba3a32591bcc412026197ce40dc6c957721cfef5c278789569', 'TBYGKIMBHH737XLZIMYIKJJD4VZI2V4SV3KYY23M'),
('WALL-0002-0002', 'CMPG-0002-0002', '1c2c141b15da80842737336413fad91a6f9d2937d3b4375b378cc963c7cad4ec', 'a3c89bbbcc23f9a9e77a4de3267c0fcf468b99b5a291bb17736bb3bb70be8e20', 'TBYYH7LWMD573BGGISGKKOYJREXZ5XW63KKJRW3U');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `id_donatur` (`id_donatur`),
  ADD KEY `id_campaign` (`id_campaign`),
  ADD KEY `id_paket` (`id_paket`);

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
-- Indeks untuk tabel `kategori_campaign`
--
ALTER TABLE `kategori_campaign`
  ADD PRIMARY KEY (`id_kategori_campaign`);

--
-- Indeks untuk tabel `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`id_paket`),
  ADD KEY `id_campaign` (`id_campaign`);

--
-- Indeks untuk tabel `penerimaan_barang`
--
ALTER TABLE `penerimaan_barang`
  ADD PRIMARY KEY (`id_laporan`);

--
-- Indeks untuk tabel `penerima_donasi`
--
ALTER TABLE `penerima_donasi`
  ADD PRIMARY KEY (`id_penerima`);

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
