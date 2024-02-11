-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 23, 2024 at 03:57 AM
-- Server version: 11.2.2-MariaDB
-- PHP Version: 8.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rekam_medis`
--

-- --------------------------------------------------------

--
-- Table structure for table `departement`
--

DROP TABLE IF EXISTS `departement`;
CREATE TABLE IF NOT EXISTS `departement` (
  `id_departement` int(11) NOT NULL AUTO_INCREMENT,
  `divisi` varchar(20) NOT NULL,
  `nama_departement` varchar(20) NOT NULL,
  PRIMARY KEY (`id_departement`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `departement`
--

INSERT INTO `departement` (`id_departement`, `divisi`, `nama_departement`) VALUES
(1, 'BISCUIT', 'IT Programmer');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

DROP TABLE IF EXISTS `jabatan`;
CREATE TABLE IF NOT EXISTS `jabatan` (
  `id_jabatan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_jabatan` varchar(20) NOT NULL,
  PRIMARY KEY (`id_jabatan`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `nama_jabatan`) VALUES
(1, 'Web Development');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

DROP TABLE IF EXISTS `karyawan`;
CREATE TABLE IF NOT EXISTS `karyawan` (
  `id_karyawan` int(11) NOT NULL AUTO_INCREMENT,
  `nik` varchar(10) NOT NULL,
  `nama_karyawan` varchar(50) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `id_departement` int(11) NOT NULL,
  `jk` enum('Pria','Wanita') NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  PRIMARY KEY (`id_karyawan`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `nik`, `nama_karyawan`, `id_jabatan`, `id_departement`, `jk`, `tempat_lahir`, `tgl_lahir`, `alamat`, `no_hp`) VALUES
(1, '0009224322', 'Admin', 1, 1, 'Pria', 'Bandung', '2022-07-25', 'Bogor', '082299915127'),
(2, '000922433', 'Dept. Head HSE', 1, 1, 'Pria', 'Bandung', '2022-07-25', 'Bogor', '09123102938912');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_obat`
--

DROP TABLE IF EXISTS `kategori_obat`;
CREATE TABLE IF NOT EXISTS `kategori_obat` (
  `id_kategori_obat` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(30) NOT NULL,
  PRIMARY KEY (`id_kategori_obat`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `kategori_obat`
--

INSERT INTO `kategori_obat` (`id_kategori_obat`, `nama_kategori`) VALUES
(1, 'Kapsul');

-- --------------------------------------------------------

--
-- Table structure for table `kunjungan_berobat`
--

DROP TABLE IF EXISTS `kunjungan_berobat`;
CREATE TABLE IF NOT EXISTS `kunjungan_berobat` (
  `id_kunjungan_berobat` int(11) NOT NULL AUTO_INCREMENT,
  `id_karyawan` int(11) NOT NULL,
  `nik` varchar(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `keluhan` varchar(50) NOT NULL,
  `diagnosa` varchar(20) NOT NULL,
  `id_obat_pasien` int(11) NOT NULL,
  `tgl` date NOT NULL,
  PRIMARY KEY (`id_kunjungan_berobat`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `kunjungan_berobat`
--

INSERT INTO `kunjungan_berobat` (`id_kunjungan_berobat`, `id_karyawan`, `nik`, `nama`, `keluhan`, `diagnosa`, `id_obat_pasien`, `tgl`) VALUES
(1, 1, '0009224322', 'Admin', 'Batuk', 'Radang', 1, '2022-09-24');

-- --------------------------------------------------------

--
-- Table structure for table `mcu`
--

DROP TABLE IF EXISTS `mcu`;
CREATE TABLE IF NOT EXISTS `mcu` (
  `id_mcu` int(11) NOT NULL AUTO_INCREMENT,
  `id_karyawan` int(11) NOT NULL,
  `fasilitator_mcu` varchar(30) NOT NULL,
  `waktu_mcu` date NOT NULL,
  `tekanan_darah` varchar(20) NOT NULL,
  `hasil_pemeriksaan_dokter` varchar(50) NOT NULL,
  `hasil_lab_urin` varchar(50) NOT NULL,
  `hasil_rontgen_thorak` varchar(50) NOT NULL,
  `hasil_pemeriksaan_mata` varchar(50) NOT NULL,
  `hasil_pemeriksaan_pendengaran` varchar(50) NOT NULL,
  PRIMARY KEY (`id_mcu`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

DROP TABLE IF EXISTS `obat`;
CREATE TABLE IF NOT EXISTS `obat` (
  `id_obat` int(11) NOT NULL AUTO_INCREMENT,
  `id_kategori_obat` int(11) NOT NULL,
  `nama_obat` varchar(30) NOT NULL,
  `kegunaan_obat` varchar(30) NOT NULL,
  `qty` int(11) NOT NULL,
  `satuan` varchar(10) NOT NULL,
  `expired_date` date NOT NULL,
  PRIMARY KEY (`id_obat`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`id_obat`, `id_kategori_obat`, `nama_obat`, `kegunaan_obat`, `qty`, `satuan`, `expired_date`) VALUES
(1, 1, 'obat batuk', 'meredakan batuk', 3, 'Strip', '2022-09-30');

-- --------------------------------------------------------

--
-- Table structure for table `obat_pasien`
--

DROP TABLE IF EXISTS `obat_pasien`;
CREATE TABLE IF NOT EXISTS `obat_pasien` (
  `id_obat_pasien` int(11) NOT NULL AUTO_INCREMENT,
  `id_kunjungan_berobat` int(11) NOT NULL,
  `id_obat` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  PRIMARY KEY (`id_obat_pasien`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `obat_pasien`
--

INSERT INTO `obat_pasien` (`id_obat_pasien`, `id_kunjungan_berobat`, `id_obat`, `qty`) VALUES
(1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `skd`
--

DROP TABLE IF EXISTS `skd`;
CREATE TABLE IF NOT EXISTS `skd` (
  `id_skd` int(11) NOT NULL AUTO_INCREMENT,
  `id_karyawan` int(11) NOT NULL,
  `tanggal_mulai_skd` date NOT NULL,
  `tanggal_akhir_skd` date NOT NULL,
  `diagnosa_penyakit` varchar(30) NOT NULL,
  `tempat_berobat` varchar(30) NOT NULL,
  `created_at` date NOT NULL,
  PRIMARY KEY (`id_skd`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `id_karyawan` int(11) NOT NULL,
  `role` enum('Admin','HO') NOT NULL,
  `email` varchar(30) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `foto` varchar(50) DEFAULT 'default.png',
  `password` varchar(255) NOT NULL,
  `is_active` enum('1','2') NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `id_karyawan`, `role`, `email`, `no_telp`, `foto`, `password`, `is_active`) VALUES
(1, 1, 'Admin', 'admin@gmail.com', '082299915127', 'default.png', '$2y$10$ui9MMJuNEd.kcPWTTGVIvOvnCLx4vPIHT/RAUbhVrj2KHgaUQjQ2O', '1'),
(2, 2, 'HO', 'ho@gmail.com', '09213120932', 'default.png', '$2y$10$CyOLqU2hForyBcGd4WZ8w.5ijsDGxiAsVULgVCevEisSqOYObMEW6', '1');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
