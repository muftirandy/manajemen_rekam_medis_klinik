-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 29 Sep 2019 pada 15.33
-- Versi Server: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_klinik`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `catatanrekammedis`
--

CREATE TABLE `catatanrekammedis` (
  `id` int(11) NOT NULL,
  `nip` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `namadokter` varchar(50) NOT NULL,
  `keluhan` varchar(300) NOT NULL,
  `pemeriksaan` varchar(200) NOT NULL,
  `diagnosa` varchar(200) NOT NULL,
  `obat` varchar(200) NOT NULL,
  `terapi` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `catatanrekammedis`
--

INSERT INTO `catatanrekammedis` (`id`, `nip`, `tanggal`, `namadokter`, `keluhan`, `pemeriksaan`, `diagnosa`, `obat`, `terapi`) VALUES
(8, 1001, '2018-02-13', '13', '- sakit kepala<br />\r\n- panas<br />\r\n- muntah', 'tes darah<br />\r\nsuntik', 'demam berdarah tingkat rendah', ' -Abate -Amoxcilin', '- Abate diminum 3 kali sehari sesudah makan.<br />\r\n- Amoxcilin diminum 3 kali sehari sesudah makan.'),
(9, 1002, '2018-02-13', '13', 'sering buang air besar', '', 'diare', ' -Anastan Forte', 'diminum 3 kali sehari sesudah makan'),
(11, 1003, '2018-02-14', '12', 'tenggorokan terasa sakit<br />\r\nsusah menelan makanan', 'memeriksa tenggorokan', 'radang tenggorokan', ' -Pondex Syr 60ml -Cataflam 50mg', '- pondex diminum 3 kali sehari sesudah makan<br />\r\n- cataflam diminum 2 kali sehari sesudah makan pagi dan sebelum tidur');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dataobat`
--

CREATE TABLE `dataobat` (
  `id` int(10) NOT NULL,
  `namaobat` varchar(50) NOT NULL,
  `kategori` int(11) NOT NULL,
  `stok` int(50) NOT NULL,
  `tanggalmasuk` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dataobat`
--

INSERT INTO `dataobat` (`id`, `namaobat`, `kategori`, `stok`, `tanggalmasuk`) VALUES
(9, ' AB Vask', 2, 33, '2018-01-31'),
(10, 'Accolate 20MG', 5, 28, '2018-01-31'),
(11, 'Acran 150', 10, 13, '2018-01-31'),
(12, 'Abate', 2, 15, '2018-01-31'),
(13, 'Absolute New Solution 60ml', 1, 15, '2018-01-31'),
(14, 'Amoxcilin', 10, 18, '2018-02-13'),
(15, 'Amoxcilin Sirup', 1, 20, '2018-02-13'),
(16, 'Anastan Forte', 10, 19, '2018-02-13'),
(17, 'Diazepam Lar Rectal 10mg/ml', 2, 20, '2018-02-13'),
(20, 'Klindamisin 150mg', 11, 20, '2018-02-13'),
(21, 'Abendazol 400mg', 2, 20, '2018-02-13'),
(22, 'Cefizim Tab 150mg', 2, 20, '2018-02-13'),
(23, 'Ciprofloxacin 500mg', 2, 20, '2018-02-13'),
(24, 'Alkohol 300cc', 4, 20, '2018-02-13'),
(25, 'Autoclave tape', 12, 50, '2018-02-13'),
(26, 'Adhesive tape', 12, 50, '2018-02-13'),
(27, 'Kasa Steril', 12, 50, '2018-02-13'),
(28, 'Kasa Alkohol', 12, 50, '2018-02-13'),
(29, 'Cataflam 50mg', 11, 19, '2018-02-13'),
(30, 'Pondex Syr 60ml', 1, 19, '2018-02-13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_dokter`
--

CREATE TABLE `data_dokter` (
  `id` int(50) NOT NULL,
  `namadokter` varchar(50) NOT NULL,
  `spesialis` varchar(50) NOT NULL,
  `jeniskelamin` varchar(50) NOT NULL,
  `telepon` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `jadwal` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_dokter`
--

INSERT INTO `data_dokter` (`id`, `namadokter`, `spesialis`, `jeniskelamin`, `telepon`, `alamat`, `jadwal`) VALUES
(6, 'Dr. Alkadri Suherman', 'Dokter Umum', 'Pria', '0818918291891', 'Jln. Kesemek No.334 Jakarta', 'Hari : Senin, Selasa, Rabu, Sabtu<br />\r\nJam : 05.00 - 10.00'),
(10, 'Dr. Junita Shara, Sp.M', 'Dokter Mata', 'Wanita', '085776660474', 'Jl. Warakas 3, Gang 4, No.23, Tanjung Priok', 'Hari : Senin, Rabu, Jumat<br />\r\nJam : 19.00 - 20.00'),
(11, 'Dr. Kustini Indah Setyowati, SP.KG', 'Dokter Konservasi Gigi', 'Wanita', '089608649071', 'Jl. Enim Raya Sungai Bambu, Tanjung Priok', 'hari : Jumat, Sabtu, Mingu<br />\r\njam : 10.00 - 18.00'),
(12, 'Dr. Saiful Bahrul, SP.THT', 'Dokter Telinga Hidung Tenggorok', 'Pria', '081380493071', ' Jl. Percetakan Negara No.31, Johar Baru', 'Hari : Senin - Jumat<br />\r\nJam : 17.00 - 21.00'),
(13, 'Dr. Audrey Ugenia', 'Dokter Umum', 'Wanita', '087884411460', 'Jl. Budi Mulia 3, RT.9/RW.10, Kota Tua, Pademangan', 'Hari : Senin - Sabtu<br />\r\nJam : 15.00 - 20.00'),
(14, 'Dr. Novi Wulandari, SP.M', 'Dokter Mata', 'Wanita', '083890041230', ' Jl. Danau Indah 4 No.37, Sunter Jaya', 'Hari : Senin, Sabtu, Minggu<br />\r\nJam : 15.00 - 20.00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_pasien`
--

CREATE TABLE `data_pasien` (
  `id` int(50) NOT NULL,
  `nip` int(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jeniskelamin` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `askes` varchar(50) NOT NULL,
  `unitkerja` varchar(50) NOT NULL,
  `telpon` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `tgl_daftar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_pasien`
--

INSERT INTO `data_pasien` (`id`, `nip`, `nama`, `jeniskelamin`, `tanggal`, `askes`, `unitkerja`, `telpon`, `alamat`, `tgl_daftar`) VALUES
(3, 1001, 'Mochamad Agung Nugraha', 'Pria', '1990-10-01', '', 'Eksportir', '085960981772', 'jln. swasembada barat 23 RT002/RW014', '2019-08-04'),
(4, 1002, 'Juan Saimima', 'Pria', '1999-02-07', '', 'Produksi Pertamina', '0813315198378', 'jln. swasembada barat 24 no.11 RT002/RW014', '2019-07-07'),
(6, 1003, 'Hutomo Yukihiro', 'Pria', '1970-01-01', '', 'Mahasiswa', '081280824926', 'jln. ternate raya blok e1 no.8', '2019-08-13'),
(7, 1004, 'Muhammad Fiqi Fahrul', 'Pria', '1999-10-11', '', 'Paul Bakery', '089607678097', ' JL. Muara Karang, No. 8 Kav. Blok Y3 Barat ', '2019-09-09'),
(9, 1005, 'Teddy Eka Prasetya', 'Pria', '1990-12-12', '', 'Pelaut', '087783199008', 'Jl. Pluit Karang Barat No.9. Pluit, Penjaringan', '2019-07-15'),
(10, 153, 'asfaf', 'Pria', '2019-09-01', '2325152', 'asasa', '232525', 'bdsbsdb', '2019-09-28'),
(11, 153, 'asfaf', 'Pria', '2019-09-01', '2325152', 'asasa', '232525', 'bdsbsdb', '2019-08-28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id` int(10) NOT NULL,
  `namakategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id`, `namakategori`) VALUES
(1, 'Sirup'),
(2, 'Tablet'),
(3, 'Pil'),
(4, 'Cairan'),
(5, 'Obat Kumur'),
(6, 'Tetes Mata'),
(7, 'Salep'),
(10, 'Tablet Keras'),
(11, 'Kapsul'),
(12, 'Perban');

-- --------------------------------------------------------

--
-- Struktur dari tabel `obatmasuk`
--

CREATE TABLE `obatmasuk` (
  `id` int(10) NOT NULL,
  `namaobat` varchar(50) NOT NULL,
  `stok` int(50) NOT NULL,
  `tanggalmasuk` date NOT NULL,
  `tanggalexpired` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `obatmasuk`
--

INSERT INTO `obatmasuk` (`id`, `namaobat`, `stok`, `tanggalmasuk`, `tanggalexpired`) VALUES
(36, '9', 13, '2018-01-31', '2018-03-15'),
(38, '10', 8, '2018-01-31', '2018-05-17'),
(39, '11', 13, '2018-01-31', '2023-11-29'),
(40, '12', 15, '2018-01-31', '2023-12-27'),
(41, '13', 15, '2018-01-31', '2020-09-30'),
(42, '14', 18, '2018-02-13', '2021-01-13'),
(43, '15', 20, '2018-02-13', '2021-06-13'),
(44, '16', 19, '2018-02-13', '2022-01-14'),
(45, '17', 20, '2018-02-13', '2021-01-30'),
(48, '20', 20, '2018-02-13', '2021-02-20'),
(50, '21', 20, '2018-02-13', '2021-02-23'),
(51, '22', 20, '2018-02-13', '2022-02-15'),
(52, '23', 20, '2018-02-13', '2021-01-13'),
(53, '24', 20, '2018-02-13', '2022-01-13'),
(54, '25', 50, '2018-02-13', '2022-11-30'),
(55, '26', 50, '2018-02-13', '2022-11-30'),
(56, '27', 50, '2018-02-13', '2022-11-30'),
(57, '28', 50, '2018-02-13', '2022-11-30'),
(58, '29', 19, '2018-02-13', '2021-03-26'),
(59, '30', 19, '2018-02-13', '2021-03-26'),
(60, '10', 20, '2018-02-13', '2024-02-01'),
(61, '9', 20, '2018-02-13', '2021-09-22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id`, `username`, `password`, `level`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1),
(2, 'Fiska', 'ee11cbb19052e40b07aac0ca060c23ee', 2),
(3, 'dokter', 'd22af4180eee4bd95072eb90f94930e5', 3),
(6, 'alkadri', '07ac6b9951124e42b790aece43ae2946', 3),
(10, 'junita', 'de7e1def91415b92cdf272ce94cb8788', 3),
(11, 'kustini', '0e4d594cbb843b4afa44ad8dc101bc30', 3),
(12, 'saiful', '4eeccab0e8c08e16a1d08296265e38fa', 3),
(13, 'audrey', '8c08dc529eccf4277a402cb8f7da0c96', 3),
(14, 'novi', '832f72b7a13b2cedcfb108603a10e2a6', 3),
(15, 'ikhsan', '4e9194a3bb65ab53e41247480905c391', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `catatanrekammedis`
--
ALTER TABLE `catatanrekammedis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dataobat`
--
ALTER TABLE `dataobat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_dokter`
--
ALTER TABLE `data_dokter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_pasien`
--
ALTER TABLE `data_pasien`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `obatmasuk`
--
ALTER TABLE `obatmasuk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `catatanrekammedis`
--
ALTER TABLE `catatanrekammedis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `dataobat`
--
ALTER TABLE `dataobat`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `data_pasien`
--
ALTER TABLE `data_pasien`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `obatmasuk`
--
ALTER TABLE `obatmasuk`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
