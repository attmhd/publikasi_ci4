-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 08, 2024 at 09:38 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `publikasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `arsip_terbitan`
--

CREATE TABLE `arsip_terbitan` (
  `id` int(11) NOT NULL,
  `id_issue` varchar(10) NOT NULL,
  `id_artikel` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `arsip_terbitan`
--

INSERT INTO `arsip_terbitan` (`id`, `id_issue`, `id_artikel`) VALUES
(1, 'IS0001', 'Art00012');

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `id_artikel` varchar(15) NOT NULL,
  `judul_artikel` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id_artikel`, `judul_artikel`) VALUES
('Art0001', 'Perancangan UI/UX Pada Aplikasi Pelayanan Desa Igirklanceng Menggunakan Metode Desain Thinking'),
('Art00010', 'PERANCANGAN SISTEM PEMANTAUAN LOKASI DAN KOMUNIKASI DALAM SATU APLIKASI'),
('Art00011', 'PENERAPAN METODE SIMPLE ADDITIVE WEIGHTING \r\nDALAM PENENTUAN REKOMENDASI KARYAWAN SUATU PEKERJAAN PENGEMBANGAN PERANGKAT LUNAK'),
('Art00012', 'PEMBANGUNAN SISTEM INFORMASI MONITORING PEKERJAAN KONSTRUKSI PADA DINAS PENDIDIKAN KABUPATEN LABUHANBATU BERBASIS WEB'),
('Art00013', 'PENGEMBANGAN APLIKASI DKM REGISTRATION SYSTEM BERBASIS WEB MENGGUNAKAN METODE WATERFALL'),
('Art00014', 'TOPIC ANALYSIS VIDEO DEBAT JELANG PEMILU PRESIDEN DAN WAKIL PRESIDEN TAHUN 2024'),
('Art00015', 'MANAJEMEN BANDWIDTH MENGGUNAKAN METODEQUEUETREEPADA PT. MINDREACH CONSULTING'),
('Art00016', 'ANALYSIS OF OPAC SATISFACTION LEVEL IN POLITEKNIK KESELAMATAN TRANSPORTASI JALAN LIBRARY WITH PIECES FRAMEWORK'),
('Art00017', 'IMPLEMENTASI SISTEM PENDUKUNG KEPUTUSAN PEMILIHAN ALAT KONTRASEPSI DENGAN METODE AHP DAN TOPSIS (STUDI KASUS DI PUSKESMAS GUNUNG LABU)'),
('Art0002', 'ANALISIS ESTIMASI BIAYA PERANGKAT LUNAK MENGGUNAKAN COCOMO II'),
('Art0003', 'PEMBANGUNAN SISTEM PENDUKUNG KEPUTUSAN PEMILIHAN PRODUK INVESTASI KEUANGAN MENGGUNAKAN METODE FUZZY MULTI ATTRIBUTE DECISION MAKING MODEL YAGER '),
('Art0004', 'PENERAPAN SISTEM PENDUKUNG KEPUTUSAN DALAM MENENTUKAN PRIORITAS LOKASI PEMASARAN PADA PT. ASKRINDO CABANG MEDAN MENGGUNAKAN METODE AHP DAN PROMETHEE '),
('Art0005', 'MACHINE ANALISIS SENTIMEN OPINI PUBLIK TERHADAP HASHTAG #JULIDFIISABILILLAH DI TWITTER MENGGUNAKAN METODE SUPPORT VECTOR'),
('Art00050', 'TEST'),
('Art0006', 'REKAYASA PERANGKAT LUNAK PEMESANAN TIKET BIOSKOP BERBASIS WEB'),
('Art0007', 'APLIKASI KAMUS BAHASA MELAYU SUMATERA UTARA BERBASIS ANDROID SEBAGAI MEDIA BELAJAR MASYARAKAT DENGAN PENERAPAN SPEECH TO TEXT '),
('Art0008', 'RANCANG BANGUN SISTEM INFORMASI PELATIHAN PADA BALAI DIKLAT INDUSTRI (BDI) PADANG BERBASIS MOBILE APPLICATION MENGGUNAKAN API'),
('Art0009', 'IMPLEMENTASI METODE TREND MOMENT UNTUK PREDIKSI PENJUALAN (STUDI KASUS DI TOKO ZACOZI PANCING KABUPATEN SOLOK)');

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `id_author` varchar(10) NOT NULL,
  `nama_author` text NOT NULL,
  `prodi` text NOT NULL,
  `afiliasi` text NOT NULL,
  `email` text DEFAULT NULL,
  `wa` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`id_author`, `nama_author`, `prodi`, `afiliasi`, `email`, `wa`) VALUES
(' AU00012', 'Rohmas Rifa Ardianto', 'Teknik Informatika', ' Universitas Duta Bangsa Surakarta', '-', ''),
(' AU00013', ' Sahrul Ageng Prasetyo', 'Teknik Informatika', ' Universitas Duta Bangsa Surakarta', '-', ''),
(' AU00014', 'Syafrilah Astro Heriyadi', 'Teknik Informatika', ' Universitas Duta Bangsa Surakarta', '-', ''),
(' AU00015', 'Siska Dewi', 'Jurusan Sistem Informasi', ' Universitas Islam Negeri Sumatera Utara', 'siskadewie.2@gmail.com', '0'),
(' AU00016', 'Triase', 'Jurusan Sistem Informasi', 'Universitas Islam Negeri Sumatera Utara', 'siskadewie.2@gmail.com', '0'),
(' AU00017', 'Aninda Muliani Harahap ', 'Jurusan Sistem Informasi', 'Universitas Islam Negeri Sumatera Utara', 'siskadewie.2@gmail.com		', '0'),
(' AU00018', 'Annisa Wistia Rizalmi', 'Departemen Sistem Informasi', ' Universitas Andalas', '1711521006@student.unand.ac.id', '0'),
(' AU00019', 'Atika Fauziyyah', 'Jurusan Teknik Informatika', 'Universitas Putra Indonesia YPTK Padang', 'atikafauziyyah224@gmail.com\r\n\r\n', '0'),
(' AU0002', 'Edo Hanifauzan Satria', 'Jurusan Teknik Informatika', 'Universitas Trunojoyo Madura', '200411100058@student.trunojoyo.ac.id', ''),
(' AU00020', 'Ramdani Arvianto', 'Program Studi Teknik Informatika', 'Sekolah Tinggi Ilmu Komputer Cipta Karya Informatika ', 'ramdaniarvianto1@gmail.com', '0'),
(' AU00021', 'Rasiban', 'Program Studi Teknik Informatika', ' Sekolah Tinggi Ilmu Komputer Cipta Karya Informatika', 'rasibanstikom@yahoo.com', '0'),
(' AU00022', 'Yadhi Aditya Permana', 'Jurusan Teknik Komputer dan Informatika ', ' Politeknik Negeri Bandung', 'yadhi@polban.ac.id', '0'),
(' AU00023', 'Siti Nina Azwalia Tanjung', 'Jurusan Sistem Informasi', ' Universitas Andalas', '1911521014_siti@student.unand.ac.id', '0'),
(' AU00024', 'Muhamad Adillah Fatih', 'Program Studi Teknik Informatika', ' Universitas Paramadina', 'muhamad.fatih@students.paramadina.ac.id', '0'),
(' AU00025', 'Reza Arif Maulana', 'Program Studi Teknik Informatika', ' Universitas Paramadina', 'reza.maulana@students.paramadina.ac.id', ''),
(' AU00026', 'Rizki Reza Pratama', 'Program Studi Teknik Informatika', ' Universitas Paramadina', 'rizki.pratama@students.paramadina.ac.id', '0'),
(' AU00027', 'Muhammad Darwis', 'Program Studi Teknik Informatika', ' Universitas Paramadina', 'muhammad.darwis@paramadina.ac.id', '0'),
(' AU00028', 'Retno Hendrowati', 'Program Studi Teknik Informatika', ' Universitas Paramadina', 'retno.hendrowati@paramadina.ac.id', '0'),
(' AU00029', 'Ivana Valentina', 'Magister Ilmu Komputer', 'Universitas Kristen Maranatha', '22790006@maranatha.ac.id', '0'),
(' AU0003', 'Ahmad uston', 'Jurusan Teknik Informatika', ' Universitas Trunojoyo Madura', '190411100164@student.trunojoyo.ac.id', ''),
(' AU00030', 'Aziz Mumin', 'Magister Ilmu Komputer', ' Universitas Kristen Maranatha', '2279010@maranatha.ac.id', '0'),
(' AU00031', 'Devion Tanrico', 'Magister Ilmu Komputer', ' Universitas Kristen Maranatha', '2279008@maranatha.ac.id', '0'),
(' AU00032', 'Oscar Karnalim', 'Magister Ilmu Komputer', ' Universitas Kristen Maranatha', 'oscar.karnalim@maranatha.ac.id', '0'),
(' AU00033', 'Azat Pratama', 'Informatika', ' Universitas Nusa Mandiri', 'azatpratama55@gmail.comâ€ª', '085227330933'),
(' AU00034', 'Bagus Ikapraja', 'Rekayasa Sistem Transportasi Jalan', ' Politeknik keselamatan Transportasi Jalan', 'bagusikapraja@pktj.ac.id', '085227330933'),
(' AU00035', 'Joko Siswanto', 'Rekayasa Sistem Transportasi Jalan', ' Politeknik keselamatan Transportasi Jalan', 'siswanto@pktj.ac.id', '085227330933'),
(' AU00036', 'Pipin Refina Afindania', 'Magister Teknik Informatika', ' Universitas Putera Indonesia YPTK Padang', 'pipinafinda@gmail.com', '082269871698'),
(' AU00037', 'Sarjon Defit', 'Magister Teknik Informatika', 'Universitas Putera Indonesia YPTK Padang', '-', '0'),
(' AU00038', 'Sumijan', 'Magister Teknik Informatika ', 'Universitas Putra Indonesia YPTK Padang ', '-', '0'),
(' AU0004', 'Pahurrosi ', 'Jurusan Teknik Informatika', ' Universitas Trunojo Madura', '190411100165@student.trunojoyo.ac.id', ''),
(' AU0005', 'Andharini Dwi Cahyani', 'Jurusan Teknik Informatika', ' Universitas Trunojoyo Madura', '-', ''),
(' AU0006', 'Bukyt Anugrah', 'Jurusan Sistem Informasi', ' Universitas Andalas', 'bukytanugrah0@gmail.com', ''),
(' AU0007', 'Haris Suryamen', 'Jurusan Sistem Informasi', 'Universitas Andalas', 'tes@g.c', ''),
(' AU0008', 'Fathania Zulfani', 'Jurusan Sistem Informasi', 'Universitas Andalas', 'fathaniazulfanii@gmail.com', ''),
(' AU0009', 'Ullya Mega Wahyuni', 'Jurusan Sistem Informasi', ' Universitas Andalas', 'fathaniazulfanii@gmail.com', ''),
('AU0001', 'Ikko Suseno', 'Sistem Informasi ', 'Universitas Nahdlatul Ulama Al Ghazali Cilacap ', 'ikkosuseno@gmail.', '0'),
('AU00010', 'Sumiarni Moka', 'Jurusan Teknik Informatika', 'Universitas Halu Oleo', 'sumiarni.mk@gmail.com', ''),
('AU00011', 'Rizal Adi Saputra', 'Jurusan Teknik Informatika', 'Universitas Halu Oleo', 'rizaladisaputra@uho.ac.id', '');

-- --------------------------------------------------------

--
-- Stand-in structure for view `author_view`
-- (See below for the actual view)
--
CREATE TABLE `author_view` (
`id_author` varchar(10)
,`nama_author` text
,`afiliasi` text
);

-- --------------------------------------------------------

--
-- Table structure for table `detail_artikel`
--

CREATE TABLE `detail_artikel` (
  `id` int(11) NOT NULL,
  `id_artikel` varchar(10) NOT NULL,
  `id_author` varchar(10) NOT NULL,
  `penulis_ke` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `detail_artikel`
--

INSERT INTO `detail_artikel` (`id`, `id_artikel`, `id_author`, `penulis_ke`) VALUES
(2, 'Art00010', ' AU00017', '3'),
(3, 'Art00011', ' AU00022', '1'),
(4, 'Art00012', ' AU00023', '1'),
(6, 'Art00012', ' AU0009', '3'),
(7, 'Art00013', ' AU00024', '1'),
(8, 'Art00013', ' AU00025', '2'),
(9, 'Art00013', ' AU00026', '3'),
(10, 'Art00013', ' AU00027', '4'),
(11, 'Art00013', ' AU00028', '5'),
(12, 'Art00015', ' AU00033', '1'),
(13, 'Art00016', ' AU00034', '1'),
(14, 'Art00016', ' AU00035', '2'),
(15, 'Art00017', ' AU00036', '1'),
(16, 'Art00017', ' AU00037', '2'),
(17, 'Art00017', ' AU00038', '3'),
(18, 'Art0002', ' AU0002', '1'),
(19, 'Art0002', ' AU0003', '2'),
(20, 'Art0002', ' AU0004', '3'),
(21, 'Art0002', ' AU0005', '4'),
(22, 'Art0003', ' AU0006', '1'),
(23, 'Art0003', ' AU0007', '2'),
(24, 'Art0004', ' AU0007', '2'),
(25, 'Art0004', ' AU0008', '1'),
(26, 'Art0004', ' AU0009', '3'),
(27, 'Art0005', ' AU00010', '1'),
(28, 'Art0005', ' AU00011', '2'),
(29, 'Art0006', ' AU00012', '1'),
(30, 'Art0006', ' AU00013', '2'),
(31, 'Art0006', ' AU00014', '3'),
(32, 'Art0007', ' AU00015', '1'),
(33, 'Art0007', ' AU00016', '2'),
(34, 'Art0007', ' AU00017', '3'),
(35, 'Art0008', ' AU00018', '1'),
(36, 'Art0008', ' AU0007', '2'),
(37, 'Art0008', ' AU0009', '3'),
(38, 'Art0009', ' AU00019', '1'),
(40, 'Art00015', ' AU00018', '7');

-- --------------------------------------------------------

--
-- Table structure for table `editor`
--

CREATE TABLE `editor` (
  `id_editor` varchar(10) NOT NULL,
  `nama_editor` varchar(50) NOT NULL,
  `afiliasi` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `editor`
--

INSERT INTO `editor` (`id_editor`, `nama_editor`, `afiliasi`) VALUES
('1', 'anisya S', NULL),
('2', 'Indra Warman', NULL),
('3', 'Aulia Fitrul Hadi', NULL),
('4', 'Dona Kurnia', NULL),
('5', 'Dede WTP', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `issue`
--

CREATE TABLE `issue` (
  `id_issue` varchar(10) NOT NULL,
  `nama_issue` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `issue`
--

INSERT INTO `issue` (`id_issue`, `nama_issue`) VALUES
('IS0001', 'Vol. 11 No. 2 (2023): TEKNOIF OKTOBER 2023'),
('IS0002', 'Vol. 12 No. 1 (2024): TEKNOIF APRIL 2024');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id_review` int(10) NOT NULL,
  `id_submit` varchar(10) NOT NULL,
  `id_editor` varchar(10) NOT NULL,
  `id_reviewer` varchar(10) NOT NULL,
  `tgl_penugasan_reviewer` date NOT NULL,
  `id_status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id_review`, `id_submit`, `id_editor`, `id_reviewer`, `tgl_penugasan_reviewer`, `id_status`) VALUES
(1, 'Sub0003', '1', 'R01', '2024-01-18', 4),
(2, 'Sub0003', '000', 'R02', '2024-01-18', 4),
(3, 'Sub0009', '000', 'R03', '2024-02-25', 4),
(4, 'Sub0009', '000', 'R04', '2024-02-25', 4);

-- --------------------------------------------------------

--
-- Table structure for table `reviewer`
--

CREATE TABLE `reviewer` (
  `id_reviewer` varchar(10) NOT NULL,
  `nama_reviewer` varchar(50) NOT NULL,
  `afiliasi` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `reviewer`
--

INSERT INTO `reviewer` (`id_reviewer`, `nama_reviewer`, `afiliasi`) VALUES
('R01', 'Bayu Febriadi', NULL),
('R02', 'Efmi Maiyana', NULL),
('R03', 'Adriyendi', NULL),
('R04', 'Ikhsan', 'ITP');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id_status` int(10) NOT NULL,
  `nama_status` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id_status`, `nama_status`) VALUES
(1, 'Diterima Editor'),
(2, 'Telah Direview oleh Editor dan Menunggu Respon Author'),
(3, 'Telah dikirimkan Author dan Menunggu Respon Editor'),
(4, 'Telah diteruskan ke Reviewer dan Menunggu Respon Reviewer'),
(5, 'Telah di Review Reviewer'),
(6, 'sedang diperiksa Di Editor setelah dari Reviewer'),
(7, 'Published'),
(8, 'Ditolak');

-- --------------------------------------------------------

--
-- Table structure for table `submit`
--

CREATE TABLE `submit` (
  `id_submit` varchar(10) NOT NULL,
  `tgl_submit` date NOT NULL,
  `id_artikel` varchar(10) NOT NULL,
  `tgl_penugasan_editor` date NOT NULL,
  `id_editor` varchar(10) NOT NULL,
  `id_status` varchar(10) NOT NULL,
  `id_issue` varchar(10) NOT NULL DEFAULT 'Belum Publ',
  `judul_baru` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `submit`
--

INSERT INTO `submit` (`id_submit`, `tgl_submit`, `id_artikel`, `tgl_penugasan_editor`, `id_editor`, `id_status`, `id_issue`, `judul_baru`) VALUES
('Sub0001', '2023-12-12', 'Art0002', '2023-12-19', '5', '2', 'IS0001', 'Test'),
('Sub00010', '2024-02-19', 'Art00011', '2024-02-25', '5', '1', 'Belum Publ', 'Test'),
('Sub00011', '2024-02-21', 'Art00012', '2024-02-25', '1', '2', 'Belum Publ', NULL),
('Sub00012', '2024-02-17', 'Art00013', '2024-02-26', '5', '2', 'Belum Publ', NULL),
('Sub00013', '2024-02-12', 'Art00014', '2024-02-26', '2', '3', 'Belum Publ', NULL),
('Sub00014', '2024-02-27', 'Art00015', '2024-02-27', '2', '2', 'Belum Publ', NULL),
('Sub00015', '2024-02-27', 'Art00016', '2024-02-27', '1', '2', 'Belum Publ', NULL),
('Sub00016', '2023-11-03', 'Art00017', '2023-10-28', '1', '7', 'IS0002', NULL),
('Sub0002', '2024-01-04', 'Art0003', '2024-01-18', '5', '2', '', NULL),
('Sub0003', '2023-12-18', 'Art0004', '2023-12-18', '1', '7', 'IS0002', NULL),
('Sub0004', '2024-01-16', 'Art0005', '2024-01-20', '2', '2', 'Belum Publ', NULL),
('Sub0005', '2024-01-16', 'Art0006', '2024-01-20', '2', '1', '', NULL),
('Sub00052', '2024-10-30', 'Art00013', '0000-00-00', '3', '4', 'IS0001', 'Test'),
('Sub0006', '2024-01-20', 'Art0009', '2024-01-20', '2', '7', 'IS0002', ''),
('Sub0007', '2024-01-20', 'Art00010', '2024-01-20', '2', '2', 'Belum Publ', NULL),
('Sub0008', '2024-01-27', 'Art0007', '2024-01-27', '4', '2', 'Belum Publ', NULL),
('Sub0009', '2024-01-27', 'Art0008', '2024-01-27', '1', '5', 'Belum Publ', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `iduser` char(20) NOT NULL,
  `namauser` varchar(30) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(10) DEFAULT NULL,
  `level` char(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`iduser`, `namauser`, `username`, `password`, `level`) VALUES
('U001', 'Yelnovri', 'admin', 'admin', 'superuser'),
('U002', 'luoyii', 'pimpinan', 'pimpinan', 'pimpinan');

-- --------------------------------------------------------

--
-- Structure for view `author_view`
--
DROP TABLE IF EXISTS `author_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `author_view`  AS SELECT `author`.`id_author` AS `id_author`, `author`.`nama_author` AS `nama_author`, `author`.`afiliasi` AS `afiliasi` FROM `author` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `arsip_terbitan`
--
ALTER TABLE `arsip_terbitan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id_artikel`);

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`id_author`);

--
-- Indexes for table `detail_artikel`
--
ALTER TABLE `detail_artikel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `editor`
--
ALTER TABLE `editor`
  ADD PRIMARY KEY (`id_editor`);

--
-- Indexes for table `issue`
--
ALTER TABLE `issue`
  ADD PRIMARY KEY (`id_issue`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id_review`);

--
-- Indexes for table `reviewer`
--
ALTER TABLE `reviewer`
  ADD PRIMARY KEY (`id_reviewer`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `submit`
--
ALTER TABLE `submit`
  ADD PRIMARY KEY (`id_submit`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `arsip_terbitan`
--
ALTER TABLE `arsip_terbitan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `detail_artikel`
--
ALTER TABLE `detail_artikel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id_review` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id_status` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
