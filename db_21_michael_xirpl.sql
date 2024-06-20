-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2024 at 04:14 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_21_michael_xirpl`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_guru`
--

CREATE TABLE `tbl_guru` (
  `nama` varchar(50) NOT NULL,
  `bidang_keahlian` varchar(50) NOT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `agama` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jurusan`
--

CREATE TABLE `tbl_jurusan` (
  `id_jur` varchar(5) NOT NULL,
  `nama_jur` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_jurusan`
--

INSERT INTO `tbl_jurusan` (`id_jur`, `nama_jur`) VALUES
('J_001', 'RPL'),
('J_002', 'DKV'),
('J_003', 'Perhotelan'),
('J_004', 'Kuliner'),
('J_005', 'TKJ');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mapel`
--

CREATE TABLE `tbl_mapel` (
  `kode_mapel` varchar(10) NOT NULL,
  `mata_pelajaran` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pegawai`
--

CREATE TABLE `tbl_pegawai` (
  `nama` varchar(100) NOT NULL,
  `pekerjaan` varchar(50) NOT NULL,
  `keahlian` varchar(50) NOT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `agama` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_pegawai`
--

INSERT INTO `tbl_pegawai` (`nama`, `pekerjaan`, `keahlian`, `alamat`, `jenis_kelamin`, `agama`) VALUES
('Leika', 'Kuli', 'Memalukan', 'JL.Bakwan', 'Laki-laki', 'Kristen');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengguna`
--

CREATE TABLE `tbl_pengguna` (
  `id_user` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `alamat_user` varchar(100) NOT NULL,
  `notlp_user` varchar(100) NOT NULL,
  `level` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_pengguna`
--

INSERT INTO `tbl_pengguna` (`id_user`, `username`, `password`, `nama_user`, `alamat_user`, `notlp_user`, `level`) VALUES
('001', 'admin', 'admin', 'timoti adri', 'palapa', '0873636436437374', 'admin'),
('002', 'timoti', 'admin', 'Timoti Adri', 'Palapa', '09845945', 'petugas'),
('003', 'joko', 'joko', 'Joko Santoso', 'Palapa', '087734747', 'anggota'),
('007', 'Leika', '$2y$10$5do5aFpOpABaMsbFbAqz4el0RL.PSigqu3nYsFFt6waHlvpUAZRrm', 'Michael Ray D.', 'admin', '081353199022', 'admin'),
('008', 'Arga', '$2y$10$FPXZAUA611RTFrsOb.a8VOXgkLQsG793Am7HBVBSjJ0b1xFuCwvaC', 'Arga Surya D', 'qwertyuiop', '098789867', 'petugas'),
('009', 'agnes', '$2y$10$qUqmsahwI9yv3CdUCGzpyOT63w2P/8aTxd65D9Svz9ptLtKiCUAf6', 'agnes pratiwit', 'urfuufrifrjru', '38384', 'anggota'),
('010', 'orvin', '$2y$10$Yp4fvvlQdtLRi7G9p8iPBOzrYoa.Qz1830N42Z.KmrHE7AfxhRnye', 'orvin christiano t.', 'guest', '1234333', 'guest');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_siswa`
--

CREATE TABLE `tbl_siswa` (
  `nis` varchar(4) NOT NULL,
  `nama_siswa` varchar(100) NOT NULL,
  `alamat_siswa` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(100) NOT NULL,
  `agama` varchar(15) NOT NULL,
  `foto_siswa` blob DEFAULT NULL,
  `id_jur` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_siswa`
--

INSERT INTO `tbl_siswa` (`nis`, `nama_siswa`, `alamat_siswa`, `jenis_kelamin`, `agama`, `foto_siswa`, `id_jur`) VALUES
('1', 'red', 'ef', 'Laki-Laki', 'Kristen', 0x70616765732f73697377612f666f746f5f73697377612f7265642e6a7067, 'J_003'),
('123', 'anjs', '', '', '', 0x666f746f5f73697377612f616e6a732e676966, ''),
('1234', 'rizal', 'sef', 'Laki-Laki', 'Kristen', 0x2e666f746f5f736973776172697a616c2e6a7067, 'J_005'),
('1294', 'Peter wibowo', 'qweghngfdsdcv bvd', 'Laki-Laki', 'Kristen', 0x70616765732f73697377612f666f746f5f73697377612f5065746572207769626f776f2e6a7067, 'J_001'),
('2', 'evan F', '3re3', 'Laki-laki', 'Konghucu', 0x666f746f5f73697377612f6576616e20462e6a7067, ''),
('20', 'asep', 'qwe', 'Laki-Laki', 'Kristen', 0x2e666f746f5f7369737761617365702e, 'J_002'),
('23', '', '', '', '', 0x666f746f5f73697377612f2e6a7067, ''),
('234', 'Dede', 'wrgsfg', 'Laki-laki', 'Hindu', 0x666f746f5f73697377612f446564652e6a7067, 'J_001'),
('2344', 'david', 'er', 'Laki-Laki', 'Kristen', 0x70616765732f73697377612f666f746f5f73697377612f64617669642e, 'J_005'),
('3', 'Dede', '', '', 'Kristen', 0x666f746f5f73697377612f446564652e6a7067, ''),
('34', 'werwef', '', '', '', 0x666f746f5f73697377612f7765727765662e6a7067, ''),
('4', 'bernad', 'wefwf', 'Laki-laki', 'Islam', 0x666f746f5f73697377612f6265726e61642e6a7067, 'J_001'),
('45', 'orvin', 'sdfsdf', 'Laki-laki', 'Islam', 0x666f746f5f73697377612f6f7276696e2e6a7067, 'J_004'),
('453', 'alden', 'wgfsdg', 'Laki-laki', 'Islam', 0x666f746f5f73697377612f616c64656e2e676966, 'J_005'),
('456', 'adit', 'ewfef', 'Laki-laki', 'Hindu', 0x666f746f5f73697377612f616469742e6a7067, 'J_003'),
('5', 'orvin', 'werfe', 'Perempuan', 'Kristen', 0x666f746f5f73697377612f6f7276696e2e6a7067, 'J_004'),
('5356', 'dwik sanjayua', 'awdaeafsd', 'Laki-Laki', 'Hindu', 0x70616765732f73697377612f666f746f5f73697377612f6477696b2073616e6a617975612e706e67, 'J_001'),
('8', 'peter', 'sdfds', 'Laki-laki', 'Hindu', 0x666f746f5f73697377612f70657465722e6a7067, 'J_001'),
('9304', 'ff', 'ff', 'Laki-Laki', 'Kristen', 0x70616765732f73697377612f666f746f5f73697377612f66662e, 'J_002'),
('999', 'mic', 'adad', 'Laki-Laki', 'Kristen', 0x2e666f746f5f73697377616d69632e, 'J_001'),
('9992', 'Dede', 'df', 'Laki-Laki', 'Kristen', 0x70616765732f73697377612f666f746f5f73697377612f446564652e, 'J_004');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_jurusan`
--
ALTER TABLE `tbl_jurusan`
  ADD PRIMARY KEY (`id_jur`);

--
-- Indexes for table `tbl_pegawai`
--
ALTER TABLE `tbl_pegawai`
  ADD PRIMARY KEY (`nama`);

--
-- Indexes for table `tbl_pengguna`
--
ALTER TABLE `tbl_pengguna`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  ADD PRIMARY KEY (`nis`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
