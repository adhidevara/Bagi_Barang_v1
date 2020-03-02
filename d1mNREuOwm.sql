-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 25 Feb 2020 pada 02.51
-- Versi server: 8.0.13-4
-- Versi PHP: 7.2.24-0ubuntu0.18.04.3

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
  `id_paket` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `kategori_barang` varchar(255) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `jumlah_barang` varchar(255) NOT NULL,
  `satuan_barang` varchar(255) NOT NULL,
  `catatan_barang` varchar(255) NOT NULL,
  `resi` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `id_donatur`, `id_campaign`, `id_paket`, `kategori_barang`, `nama_barang`, `jumlah_barang`, `satuan_barang`, `catatan_barang`, `resi`, `status`) VALUES
('BRNG-1701-0001', 'DNTR-1502-0001', 'CMPG-0001-0001', NULL, 'Sembako', 'Mie Instan', '100', 'Box', 'Untuk para korban', '', 'Menunggu Pengiriman'),
('BRNG-1701-0002', 'DNTR-1502-0001', 'CMPG-0001-0001', 'PCKG-0001-0001', 'Sembako', 'Beras', '100', 'Karung', 'untuk para korban', '902184891729', 'Di Terima (Warehouse)'),
('BRNG-1701-0003', 'DNTR-1502-0001', 'CMPG-0001-0001', 'PCKG-0001-0001', 'Sembako', 'Teh Tong Tji', '500', 'dus', 'Untuk para korban', '971947917249179', 'Di Terima (Warehouse)'),
('BRNG-1701-0004', 'DNTR-1502-0001', 'CMPG-0001-0002', NULL, 'sembako', 'Beras', '100', 'karung', '', '127647FGFGFG17', 'Sedang Dikirim');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_dibutuhkan`
--

CREATE TABLE `barang_dibutuhkan` (
  `id_barang_butuh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_campaign` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nama_barang` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `kategori_barang` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `jumlah` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `satuan_barang` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `barang_dibutuhkan`
--

INSERT INTO `barang_dibutuhkan` (`id_barang_butuh`, `id_campaign`, `nama_barang`, `kategori_barang`, `jumlah`, `satuan_barang`) VALUES
('BRNG-BTH1-0001', 'CMPG-0001-0001', 'Beras', 'Sembako', '100', 'Karung'),
('BRNG-BTH1-0002', 'CMPG-0001-0002', 'ST', 'Sembako', '100', 'BSD'),
('BRNG-BTH1-0003', 'CMPG-0001-0002', 'Mie Instan', 'Sembako', '100', 'dus'),
('BRNG-BTH1-0004', 'CMPG-0001-0013', 'JKK', 'Pakaian', '10', 'JKK'),
('BRNG-BTH1-0005', 'CMPG-0001-0013', 'JKKK', 'Sembako', '10', 'j'),
('BRNG-BTH1-0006', 'CMPG-0001-0013', 'JK', 'Sembako', '90', 'kk'),
('BRNG-BTH1-0007', 'CMPG-0001-0014', 'Mie Instan', 'Sembako', '100', 'Dus'),
('BRNG-BTH1-0008', 'CMPG-0001-0014', 'Slimut', 'Pakaian', '120', 'Pcs');

-- --------------------------------------------------------

--
-- Struktur dari tabel `campaign`
--

CREATE TABLE `campaign` (
  `id_campaign` varchar(255) NOT NULL,
  `id_volunteer` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `judul_campaign` varchar(255) NOT NULL,
  `tanggal_campaign` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `batas_campaign` datetime NOT NULL,
  `deskripsi_campaign` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `ajakan_campaign` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `kategori_campaign` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `campaign`
--

INSERT INTO `campaign` (`id_campaign`, `id_volunteer`, `judul_campaign`, `batas_campaign`, `deskripsi_campaign`, `ajakan_campaign`, `kategori_campaign`, `keterangan`, `gambar`) VALUES
('CMPG-0001-0001', 'VLNT-1503-0001', 'Bantuan Bencana Gempa Bumi Gondala', '2020-01-03 00:00:00', 'Bencana alam adalah bencana yang diakibatkan oleh peristiwa atau serangkaian peristiwa yang disebabkan oleh alam antara lain berupa gempa bumi, tsunami, gunung meletus, banjir, kekeringan, angin topan, dan tanah longsor.Bencana alam adalah bencana yang diakibatkan oleh peristiwa atau serangkaian peristiwa yang disebabkan oleh alam antara lain berupa gempa bumi, tsunami, gunung meletus, banjir, kekeringan, angin topan, dan tanah longsor.', 'Bencana alam adalah bencana yang diakibatkan oleh peristiwa atau serangkaian peristiwa yang disebabkan oleh alam antara lain berupa gempa bumi, tsunami, gunung meletus, banjir, kekeringan, angin topan, dan tanah longsor.Bencana alam adalah bencana yang diakibatkan oleh peristiwa atau serangkaian peristiwa yang disebabkan oleh alam antara lain berupa gempa bumi, tsunami, gunung meletus, banjir, kekeringan, angin topan, dan tanah longsor.', 'Bencana Alam', 'Saya sendiri', 'uploads/gambarCampaign/bencn.jpeg'),
('CMPG-0001-0002', 'VLNT-1503-0001', 'Yuk Bantu Warga Hidup dengan Layak', '2020-02-29 00:00:00', 'Perbuatan (baik atau buruk). Contoh, ia dihormati orang karena amalnya yang baik, bukan karena kedudukan atau kekayaannya. Arti lainnya dari kata amal adalah perbuatan baik yang mendatangkan pahala (menurut ajaran agama islam). Contoh, berbuat amal ibadat manusia kepada Allah.', 'Bencana alam adalah bencana yang diakibatkan oleh peristiwa atau serangkaian peristiwa yang disebabkan oleh alam antara lain berupa gempa bumi, tsunami, gunung meletus, banjir, kekeringan, angin topan, dan tanah longsor.Bencana alam adalah bencana yang diakibatkan oleh peristiwa atau serangkaian peristiwa yang disebabkan oleh alam antara lain berupa gempa bumi, tsunami, gunung meletus, banjir, kekeringan, angin topan, dan tanah longsor.', 'Kemanusiaan', 'Saya sendiri', 'uploads/gambarCampaign/kemanusiaan.jpeg'),
('CMPG-0001-0003', 'VLNT-1503-0001', 'Bantu Para Anak Yatim di Kalimantan', '2020-03-29 00:00:00', 'Beberapa pengertian Panti asuhan di antaranya: Menurut Depsos RI (2004: 4), Panti Sosial Asuhan anak adalah suatu lembaga usaha kesejahteraan sosial yang mempunyai tanggung jawab untuk memberikan pelayanan kesejahteraan sosial pada anak telantar dengan melaksanakan penyantunan dan pengentasan anak telantar, memberikan pelayanan pengganti orang tua/wali anak dalam memenuhi kebutuhan fisik, mental dan sosial kepada anak asuh sehingga memperoleh kesempatan yang luas,tepat dan memadai bagi pengembangan kepribadianya sesuai dengan yang diharapkan sebagai bagian dari generasi penerus cita- cita bangsa dan sebagai insan yang akan turut serta aktif dalam bidang pembangunan nasional', 'Panti Asuhan atau Panti Sosial Asuhan Anak juga Lembaga Kesejahteraan Sosial Anak (LKSA) ialah lembaga sosial nirlaba yang menampung, mendidik dan memelihara anak-anak yatim, yatim piatu dan anak telantar.', 'Panti Asuhan', 'Saya sendiri', 'uploads/gambarCampaign/fams.jpg'),
('CMPG-0001-0004', 'VLNT-1503-0001', 'Bantu Korban Banjir di Sumatera Utara', '2021-02-21 00:00:00', 'Bencana alam adalah bencana yang diakibatkan oleh peristiwa atau serangkaian peristiwa yang disebabkan oleh alam antara lain berupa gempa bumi, tsunami, gunung meletus, banjir, kekeringan, angin topan, dan tanah longsor.Bencana alam adalah bencana yang diakibatkan oleh peristiwa atau serangkaian peristiwa yang disebabkan oleh alam antara lain berupa gempa bumi, tsunami, gunung meletus, banjir, kekeringan, angin topan, dan tanah longsor.', 'Bencana alam adalah bencana yang diakibatkan oleh peristiwa atau serangkaian peristiwa yang disebabkan oleh alam antara lain berupa gempa bumi, tsunami, gunung meletus, banjir, kekeringan, angin topan, dan tanah longsor.Bencana alam adalah bencana yang diakibatkan oleh peristiwa atau serangkaian peristiwa yang disebabkan oleh alam antara lain berupa gempa bumi, tsunami, gunung meletus, banjir, kekeringan, angin topan, dan tanah longsor.', 'Bencana Alam', 'Saya sendiri', 'uploads/gambarCampaign/bencana.jpg'),
('CMPG-0001-0005', 'VLNT-1503-0001', 'Bantu Perbaiki Sekolah di SD Bandung', '2021-02-02 00:00:00', 'Pendidikan adalah pembelajaran pengetahuan, keterampilan, dan kebiasaan sekelompok orang yang diturunkan dari satu generasi ke generasi berikutnya melalui pengajaran, pelatihan, atau penelitian. Pendidikan sering terjadi di bawah bimbingan orang lain, tetapi juga memungkinkan secara otodidak.', 'MENDIDIK adalah memelihara dan memberi latihan mengenai akhlak dan kecerdasan pikiran. Mendidik dapat diartikan sebagai suatu usaha untuk mengantarkan anak didik ke arah kedewasaan baik secara jasmani maupun rohani. Oleh karena itu mendidik dikatakan sebagai upaya pembinaan pribadi, sikap mental dan akhlak anak didik', 'Pendidikan', 'Saya sendiri', 'uploads/gambarCampaign/pendidikan3.jpg'),
('CMPG-0001-0006', 'VLNT-1503-0001', 'Bantu Korban Banjir di Bandung', '2020-08-20 00:00:00', 'Bencana alam adalah bencana yang diakibatkan oleh peristiwa atau serangkaian peristiwa yang disebabkan oleh alam antara lain berupa gempa bumi, tsunami, gunung meletus, banjir, kekeringan, angin topan, dan tanah longsor.Bencana alam adalah bencana yang diakibatkan oleh peristiwa atau serangkaian peristiwa yang disebabkan oleh alam antara lain berupa gempa bumi, tsunami, gunung meletus, banjir, kekeringan, angin topan, dan tanah longsor.', 'Bencana alam adalah bencana yang diakibatkan oleh peristiwa atau serangkaian peristiwa yang disebabkan oleh alam antara lain berupa gempa bumi, tsunami, gunung meletus, banjir, kekeringan, angin topan, dan tanah longsor.Bencana alam adalah bencana yang diakibatkan oleh peristiwa atau serangkaian peristiwa yang disebabkan oleh alam antara lain berupa gempa bumi, tsunami, gunung meletus, banjir, kekeringan, angin topan, dan tanah longsor.', 'Bencana Alam', 'Saya sendiri', 'uploads/gambarCampaign/bencn.jpeg'),
('CMPG-0001-0007', 'VLNT-1503-0001', 'Bantu Korban Bencana Alam di Jawa Barat', '2020-11-29 00:00:00', 'Mari Bantu Saudara Kita Mari Bantu Saudara Kita Ma...', 'Bencana alam adalah bencana yang diakibatkan oleh peristiwa atau serangkaian peristiwa yang disebabkan oleh alam antara lain berupa gempa bumi, tsunami, gunung meletus, banjir, kekeringan, angin topan, dan tanah longsor.Bencana alam adalah bencana yang diakibatkan oleh peristiwa atau serangkaian peristiwa yang disebabkan oleh alam antara lain berupa gempa bumi, tsunami, gunung meletus, banjir, kekeringan, angin topan, dan tanah longsor.', 'Kemanusiaan', 'Saya sendiri', 'uploads/gambarCampaign/v4.jpg'),
('CMPG-0001-0008', 'VLNT-1503-0001', 'Bantu Membelikan Seragam Anak-anak Sekolah Dasar', '2021-03-22 00:00:00', 'Pendidikan adalah pembelajaran pengetahuan, keterampilan, dan kebiasaan sekelompok orang yang diturunkan dari satu generasi ke generasi berikutnya melalui pengajaran, pelatihan, atau penelitian. Pendidikan sering terjadi di bawah bimbingan orang lain, tetapi juga memungkinkan secara otodidak.', 'MENDIDIK adalah memelihara dan memberi latihan mengenai akhlak dan kecerdasan pikiran. Mendidik dapat diartikan sebagai suatu usaha untuk mengantarkan anak didik ke arah kedewasaan baik secara jasmani maupun rohani. Oleh karena itu mendidik dikatakan sebagai upaya pembinaan pribadi, sikap mental dan akhlak anak didik', 'Pendidikan', 'Saya sendiri', 'uploads/gambarCampaign/pendidikan.jpg'),
('CMPG-0001-0009', 'VLNT-1503-0001', 'Bantu Adik-adik kecil untuk bertahan hidup', '2022-01-19 00:00:00', 'Beberapa pengertian Panti asuhan di antaranya: Menurut Depsos RI (2004: 4), Panti Sosial Asuhan anak adalah suatu lembaga usaha kesejahteraan sosial yang mempunyai tanggung jawab untuk memberikan pelayanan kesejahteraan sosial pada anak telantar dengan melaksanakan penyantunan dan pengentasan anak telantar, memberikan pelayanan pengganti orang tua/wali anak dalam memenuhi kebutuhan fisik, mental dan sosial kepada anak asuh sehingga memperoleh kesempatan yang luas,tepat dan memadai bagi pengembangan kepribadianya sesuai dengan yang diharapkan sebagai bagian dari generasi penerus cita- cita bangsa dan sebagai insan yang akan turut serta aktif dalam bidang pembangunan nasional', 'Panti Asuhan atau Panti Sosial Asuhan Anak juga Lembaga Kesejahteraan Sosial Anak (LKSA) ialah lembaga sosial nirlaba yang menampung, mendidik dan memelihara anak-anak yatim, yatim piatu dan anak telantar.', 'Panti Asuhan', 'Saya sendiri', 'uploads/gambarCampaign/panti.png'),
('CMPG-0001-0010', 'VLNT-1503-0001', 'Bantu Korban Bencana Alam di Bandung', '2020-12-29 00:00:00', 'Bencana alam adalah bencana yang diakibatkan oleh peristiwa atau serangkaian peristiwa yang disebabkan oleh alam antara lain berupa gempa bumi, tsunami, gunung meletus, banjir, kekeringan, angin topan, dan tanah longsor.Bencana alam adalah bencana yang diakibatkan oleh peristiwa atau serangkaian peristiwa yang disebabkan oleh alam antara lain berupa gempa bumi, tsunami, gunung meletus, banjir, kekeringan, angin topan, dan tanah longsor.', 'Bencana alam adalah bencana yang diakibatkan oleh peristiwa atau serangkaian peristiwa yang disebabkan oleh alam antara lain berupa gempa bumi, tsunami, gunung meletus, banjir, kekeringan, angin topan, dan tanah longsor.Bencana alam adalah bencana yang diakibatkan oleh peristiwa atau serangkaian peristiwa yang disebabkan oleh alam antara lain berupa gempa bumi, tsunami, gunung meletus, banjir, kekeringan, angin topan, dan tanah longsor.', 'Bencana Alam', 'Saya sendiri', 'uploads/gambarCampaign/bencana.jpg'),
('CMPG-0001-0011', 'VLNT-1503-0001', 'Meningkatkan Pendidikan di Indonesia', '2020-07-15 00:00:00', 'Pendidikan adalah pembelajaran pengetahuan, keterampilan, dan kebiasaan sekelompok orang yang diturunkan dari satu generasi ke generasi berikutnya melalui pengajaran, pelatihan, atau penelitian. Pendidikan sering terjadi di bawah bimbingan orang lain, tetapi juga memungkinkan secara otodidak.', 'MENDIDIK adalah memelihara dan memberi latihan mengenai akhlak dan kecerdasan pikiran. Mendidik dapat diartikan sebagai suatu usaha untuk mengantarkan anak didik ke arah kedewasaan baik secara jasmani maupun rohani. Oleh karena itu mendidik dikatakan sebagai upaya pembinaan pribadi, sikap mental dan akhlak anak didik', 'Pendidikan', 'Saya sendiri', 'uploads/gambarCampaign/pendidikan2.jpg'),
('CMPG-0001-0012', 'VLNT-1503-0001', 'Bantu Anak Yatim Piatu Firdaus', '2019-12-25 00:00:00', 'Beberapa pengertian Panti asuhan di antaranya: Menurut Depsos RI (2004: 4), Panti Sosial Asuhan anak adalah suatu lembaga usaha kesejahteraan sosial yang mempunyai tanggung jawab untuk memberikan pelayanan kesejahteraan sosial pada anak telantar dengan melaksanakan penyantunan dan pengentasan anak telantar, memberikan pelayanan pengganti orang tua/wali anak dalam memenuhi kebutuhan fisik, mental dan sosial kepada anak asuh sehingga memperoleh kesempatan yang luas,tepat dan memadai bagi pengembangan kepribadianya sesuai dengan yang diharapkan sebagai bagian dari generasi penerus cita- cita bangsa dan sebagai insan yang akan turut serta aktif dalam bidang pembangunan nasional', 'Panti Asuhan atau Panti Sosial Asuhan Anak juga Lembaga Kesejahteraan Sosial Anak (LKSA) ialah lembaga sosial nirlaba yang menampung, mendidik dan memelihara anak-anak yatim, yatim piatu dan anak telantar.', 'Panti Asuhan', 'Saya sendiri', 'uploads/gambarCampaign/fams.jpg'),
('CMPG-0001-0013', 'VLNT-1503-0001', 'Bantu Panti Asuhan Dayeuhkolot', '2022-04-10 00:00:00', 'panti ini dlll', 'mari bantu panti dayeuhkolot', 'Panti Asuhan', 'Saya sendiri', 'uploads/gambarCampaign/CMPG-0001-00131.jpg');

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
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `donatur`
--

INSERT INTO `donatur` (`id_donatur`, `email`, `nama`, `no_ktp`, `password`, `alamat`, `jenis_kelamin`, `foto`, `no_tlp`, `status`) VALUES
('DNTR-1502-0001', 'richardmaulana354@gmail.com', 'Richard Maulana', '01284012851205', '00b1ac7a7cb7222a66a6bd2523db4e033c663efb27498fb8dd5ef74e6b029662df0e5d3ae61170d20481a0bd39203ced19fff019c80972b3feca94f6559587b1CdismUtTVKSuFt/OkrktaTFZ+honJsLXkQUBY0q9R9s=', 'Bandung', 'laki-laki', 'uploads/fotoProfil/ft_d/8924586d-4f69-4267-8ab6-9adb25c8962e.JPG', '082233338115', 1),
('DNTR-1502-0002', 'desevenfoldism2133@gmail.com', 'Ariel Adhidevara', '', 'b94a7f5c6f7a282e9b655b29606a88ca5cc0592e8daabcb65459d3f0b1af4e348d6e9f128b53330b1de07b473ecf2e9126db1077984bcd92a640c51eeea6b429O74Nlu2HEw2OWp8rCjJtJo/UEQHzN1GcPSMp5OVuHI0=', '', '', '', '', 1),
('DNTR-1502-0003', 'rià', 'ric', '', '3c3bc7e41a0c8c2c670cf8d71c7827505a5884a9eddf496d2196b955eb779b16e1a69df694c3b0e68147f952d0983fc9b3e92b8b6e49efe3ded054a70f9a90b4MB6TfC1Dmtffs1eOEjaplUdtGO/4nFpEG36W5mYv7I4=', '', '', '', '', 0),
('DNTR-1502-0004', 'riàd', 'ric', '', '28a11741c9428cbbc3be947df3e0fed41cfb78c863ce6015d2ce40594906df33ee4050c97f4e59c0e48ec6b1c76e3e5228f580ab222a0c753ac0c9c942b168511yjtVd7T1PWpeFDRqNoJwPYG8RLLRZJ1ohPPGDuVlYc=', '', '', '', '', 0),
('DNTR-1502-0005', 'antonandre@gmail.com', 'Anton Andre ', '', 'be016c42c37af33c2474490ec7163f736c820c1ad55cd2f8e781390c7415d00064031bed04d00c827809db79400beb2ecc77a0df3eb463e8c67fe66e5ad9d4e18VsCdTJPZfSPTGq8mSu+T8pQJ42nRd7uw9uxkH/bpWI=', '', '', '', '', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan_donasi`
--

CREATE TABLE `laporan_donasi` (
  `id_laporan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_campaign` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tanggal_dibuat` datetime NOT NULL,
  `tanggal_diacc` datetime DEFAULT NULL,
  `link_video` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `foto` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `laporan_donasi`
--

INSERT INTO `laporan_donasi` (`id_laporan`, `id_campaign`, `tanggal_dibuat`, `tanggal_diacc`, `link_video`, `foto`, `status`) VALUES
('RPRT-0001-0001', 'CMPG-0001-0001', '2020-01-08 04:14:15', '2019-12-26 03:42:29', 'https://www.youtube.com/embed/Z8TcWaeV1QI', 'uploads/laporan_foto/bantuan-bank-indonesia_20170113_151603.jpg', 'Approved');

-- --------------------------------------------------------

--
-- Struktur dari tabel `paket`
--

CREATE TABLE `paket` (
  `id_paket` varchar(255) NOT NULL,
  `id_campaign` varchar(255) NOT NULL,
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

INSERT INTO `paket` (`id_paket`, `id_campaign`, `jenis_barang`, `nama_kurir`, `no_resi`, `tanggal_sortir`, `tanggal_pengiriman`, `tanggal_diterima`, `asal`, `tujuan`, `keterangan`, `status`) VALUES
('PCKG-0001-0001', 'CMPG-0001-0001', 'Sembako', 'TIKI', '971947917249179', '2019-12-27 07:31:18', NULL, '2020-01-08 10:29:21', 'GUDANG DONASI JAKARTA', 'KALIMANTAN', '', 'Telah diterima oleh Penerima Donasi'),
('PCKG-1901-0002', 'CMPG-0001-0002', 'Sembako', '', '', '2019-12-26 03:39:48', NULL, NULL, 'Warehouse (Jakarta)', 'Palu', 'Untuk korban bencana', 'Proses Penyortiran');

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
('VLNT-1503-0001', 'antonandre7@gmail.com', 'Antonius Andre Yuwono P', '3514131223', '373ddeb1f939096f041c8b46d7bb58a2ae07faa8c51c93d805a71c53b581d3aeccb0964bdd0de393d7d998accb832a99dc5dae754b072f112afe08e93f18493cnq5ksSwn3Ew9vJvYIADU6p/a9CKJOKCNe/dLJquIvbw=', 'Laki - Laki', 'Jln. Adhiyaksa no 33a Sukapura Bandung Jawa Barat(2345)', 'uploads/fotoProfil/ft_v/ft_v-VLNT-1503-0001-Antonius_Andre.jpg', '084347131931', 11),
('VLNT-1503-0002', 'm.renaldy.alvianto@gmail.com', 'Alvin', '3514131223', '41a5ce018fbcf487116e355e13bfb8a40c8c6be30ab490c21e1669debb5b8791f7a8f8583f521a000afcf00063738ccce3f2d8e2024f7eb6cbb2919866d3e6bfRgbrM9PFQwbZtUXvBXafP+QTUGKr1ju4z213EbQrLGE=', 'Laki - Laki', 'Jln. Adhiyaksa no 33a Sukapura Bandung Jawa Barat(2345)', 'uploads/fotoProfil/ft_v//ft_v-VLNT-1503-0001-Antonius_Andre.jpg', '084347131931', 1);

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
-- Indeks untuk tabel `donatur`
--
ALTER TABLE `donatur`
  ADD PRIMARY KEY (`id_donatur`);

--
-- Indeks untuk tabel `laporan_donasi`
--
ALTER TABLE `laporan_donasi`
  ADD PRIMARY KEY (`id_laporan`);

--
-- Indeks untuk tabel `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`id_paket`),
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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
