-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.22-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for pdsieservice
CREATE DATABASE IF NOT EXISTS `pdsieservice` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `pdsieservice`;

-- Dumping structure for table pdsieservice.m_kursi
CREATE TABLE IF NOT EXISTS `m_kursi` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `fungsi` int(11) NOT NULL DEFAULT 0,
  `kode` varchar(50) DEFAULT NULL,
  `nama` varchar(500) DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  `createdtime` datetime DEFAULT current_timestamp(),
  `createdby` varchar(150) DEFAULT 'system',
  `updatedtime` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updatedby` varchar(150) DEFAULT 'system',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table pdsieservice.m_kursi: ~0 rows (approximately)
/*!40000 ALTER TABLE `m_kursi` DISABLE KEYS */;
INSERT INTO `m_kursi` (`ID`, `fungsi`, `kode`, `nama`, `status`, `createdtime`, `createdby`, `updatedtime`, `updatedby`) VALUES
	(1, 13, 'A1', 'ICT', 1, '2022-05-23 12:22:43', 'system', '2022-06-16 15:42:10', 'system');
/*!40000 ALTER TABLE `m_kursi` ENABLE KEYS */;

-- Dumping structure for table pdsieservice.m_ruangmeeting
CREATE TABLE IF NOT EXISTS `m_ruangmeeting` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(50) DEFAULT NULL,
  `nama` varchar(500) DEFAULT NULL,
  `image` text DEFAULT NULL,
  `kapasitas` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  `createdtime` datetime DEFAULT current_timestamp(),
  `createdby` varchar(150) DEFAULT 'system',
  `updatedtime` datetime DEFAULT current_timestamp(),
  `updatedby` varchar(150) DEFAULT 'system',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table pdsieservice.m_ruangmeeting: ~0 rows (approximately)
/*!40000 ALTER TABLE `m_ruangmeeting` DISABLE KEYS */;
INSERT INTO `m_ruangmeeting` (`ID`, `kode`, `nama`, `image`, `kapasitas`, `status`, `createdtime`, `createdby`, `updatedtime`, `updatedby`) VALUES
	(1, '0001', 'Ruang Meeting ICT', 'meet-room 2.jpg', NULL, 1, '2022-06-09 01:49:45', 'system', '2022-06-09 01:49:46', 'system');
/*!40000 ALTER TABLE `m_ruangmeeting` ENABLE KEYS */;

-- Dumping structure for table pdsieservice.m_template_kursi
CREATE TABLE IF NOT EXISTS `m_template_kursi` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `fungsi` int(11) DEFAULT NULL,
  `template` text DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table pdsieservice.m_template_kursi: ~0 rows (approximately)
/*!40000 ALTER TABLE `m_template_kursi` DISABLE KEYS */;
INSERT INTO `m_template_kursi` (`ID`, `fungsi`, `template`) VALUES
	(1, 13, 'kursi_ict');
/*!40000 ALTER TABLE `m_template_kursi` ENABLE KEYS */;

-- Dumping structure for table pdsieservice.m_tipebooking
CREATE TABLE IF NOT EXISTS `m_tipebooking` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(150) DEFAULT NULL,
  `createdtime` datetime NOT NULL DEFAULT current_timestamp(),
  `createdby` varchar(50) NOT NULL DEFAULT 'system',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table pdsieservice.m_tipebooking: ~3 rows (approximately)
/*!40000 ALTER TABLE `m_tipebooking` DISABLE KEYS */;
INSERT INTO `m_tipebooking` (`ID`, `nama`, `createdtime`, `createdby`) VALUES
	(1, 'Half Day', '2022-05-23 11:56:57', 'system'),
	(2, 'Full Day', '2022-05-23 11:57:22', 'system'),
	(3, 'Custom', '2022-05-23 11:57:25', 'system');
/*!40000 ALTER TABLE `m_tipebooking` ENABLE KEYS */;

-- Dumping structure for table pdsieservice.ref_departemen
CREATE TABLE IF NOT EXISTS `ref_departemen` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(200) NOT NULL,
  `id_fungsi` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `urutan` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

-- Dumping data for table pdsieservice.ref_departemen: ~51 rows (approximately)
/*!40000 ALTER TABLE `ref_departemen` DISABLE KEYS */;
INSERT INTO `ref_departemen` (`ID`, `nama`, `id_fungsi`, `status`, `urutan`) VALUES
	(1, 'Direktur', 1, 0, 1),
	(2, 'Vice President', 1, 0, 2),
	(3, 'Communication & Relation', 2, 0, 3),
	(4, 'Legal & Compliance', 2, 0, 4),
	(5, 'Operation Internal Audit', 3, 0, 5),
	(6, 'Finance & Support Internal Audit', 3, 0, 6),
	(7, 'Procurement', 4, 0, 7),
	(8, 'Logistic', 4, 0, 8),
	(9, 'HSE', 5, 0, 9),
	(10, 'QA & QM', 5, 0, 10),
	(11, 'Security', 5, 0, 11),
	(12, 'HC Development', 6, 0, 12),
	(13, 'HC Operation', 6, 0, 13),
	(14, 'Corp. Strategic Planning, Evaluation & Portfolio', 7, 0, 14),
	(15, 'Corp. New Business Development Research & Development', 7, 0, 15),
	(16, 'Rig Services Marketing', 8, 0, 16),
	(17, 'Commercial & Trade Marketing', 8, 0, 17),
	(18, 'IPM & Non Rig Services Marketing', 8, 0, 18),
	(19, 'Partnership & Non Drilling Services Marketing', 8, 0, 19),
	(20, 'Drilling Specialist', 9, 0, 20),
	(21, 'Project Kalimantan', 9, 0, 21),
	(22, 'Project Jambi', 9, 0, 22),
	(23, 'Project SBS', 9, 0, 23),
	(24, 'Project Jawa', 9, 0, 24),
	(25, 'Project Geothermal Sumatra I', 9, 0, 25),
	(26, 'Project Geothermal Sumatra II & Jawa', 9, 0, 26),
	(27, 'Project Middle East', 9, 0, 27),
	(28, 'Unconventional & Non Rig Services', 9, 0, 28),
	(29, 'Maintenance', 10, 0, 29),
	(30, 'Moving & Mobilization', 10, 0, 30),
	(31, 'Contract & SA Monitoring', 10, 0, 31),
	(32, 'Tax & Cash Management', 11, 0, 32),
	(33, 'General & Asset Accounting', 12, 0, 33),
	(34, 'Budgeting & Accounting Consolidation', 12, 0, 34),
	(35, 'ICT', 13, 0, 35),
	(36, 'Asset Management', 10, 0, 30),
	(37, 'Insurance & Risk Management', 11, 0, 32),
	(38, 'Vice President', 2, 0, 2),
	(39, 'Vice President', 3, 0, 2),
	(40, 'Vice President', 4, 0, 2),
	(41, 'Vice President', 5, 0, 2),
	(42, 'Vice President', 6, 0, 2),
	(43, 'Vice President', 7, 0, 2),
	(44, 'Vice President', 8, 0, 2),
	(45, 'Vice President', 9, 0, 2),
	(46, 'Vice President', 10, 0, 2),
	(47, 'Vice President', 11, 0, 2),
	(48, 'Vice President', 12, 0, 2),
	(49, 'Direktur', 14, 0, 1),
	(50, 'Direktur', 15, 0, 1),
	(51, 'Direktur', 16, 0, 1);
/*!40000 ALTER TABLE `ref_departemen` ENABLE KEYS */;

-- Dumping structure for table pdsieservice.ref_direktorat
CREATE TABLE IF NOT EXISTS `ref_direktorat` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(200) DEFAULT NULL,
  `status` tinyint(4) DEFAULT 0,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table pdsieservice.ref_direktorat: ~4 rows (approximately)
/*!40000 ALTER TABLE `ref_direktorat` DISABLE KEYS */;
INSERT INTO `ref_direktorat` (`ID`, `nama`, `status`) VALUES
	(1, 'Utama', 0),
	(2, 'Marketing & Development', 0),
	(3, 'Operasi', 0),
	(4, 'Keuangan & Administrasi', 0);
/*!40000 ALTER TABLE `ref_direktorat` ENABLE KEYS */;

-- Dumping structure for table pdsieservice.ref_fungsi
CREATE TABLE IF NOT EXISTS `ref_fungsi` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(200) DEFAULT NULL,
  `id_direktorat` int(11) NOT NULL,
  `status` tinyint(4) DEFAULT 0,
  `urutan` int(11) DEFAULT 0,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

-- Dumping data for table pdsieservice.ref_fungsi: ~16 rows (approximately)
/*!40000 ALTER TABLE `ref_fungsi` DISABLE KEYS */;
INSERT INTO `ref_fungsi` (`ID`, `nama`, `id_direktorat`, `status`, `urutan`) VALUES
	(1, 'Direktur', 1, 0, 1),
	(2, 'Corporate Secretary', 1, 0, 2),
	(3, 'Internal Audit', 1, 0, 3),
	(4, 'Supply Chain Management', 1, 0, 4),
	(5, 'HSSE & Quality', 1, 0, 5),
	(6, 'Human Capital', 1, 0, 6),
	(7, 'Leher Direktur Marketing & Development', 2, 0, 7),
	(8, 'Marketing & Business Partnership', 2, 0, 8),
	(9, 'Drilling Operation', 3, 0, 9),
	(10, 'Drilling Support', 3, 0, 10),
	(11, 'Treasury', 4, 0, 11),
	(12, 'Controller', 4, 0, 12),
	(13, 'Leher Direktur Keuangan & Administrasi', 4, 0, 13),
	(14, 'Direktur', 2, 0, 1),
	(15, 'Direktur', 3, 0, 1),
	(16, 'Direktur', 4, 0, 1);
/*!40000 ALTER TABLE `ref_fungsi` ENABLE KEYS */;

-- Dumping structure for table pdsieservice.trx_bookingkursi
CREATE TABLE IF NOT EXISTS `trx_bookingkursi` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `kodeBooking` varchar(50) DEFAULT NULL,
  `user` int(11) DEFAULT 0,
  `direktorat` int(11) DEFAULT 0,
  `fungsi` int(11) DEFAULT 0,
  `kursi` int(11) DEFAULT 0,
  `tglPemakaian` date DEFAULT NULL,
  `tipe` int(11) DEFAULT NULL,
  `jamMulai` time DEFAULT NULL,
  `jamSelesai` time DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `createdtime` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `createdby` varchar(150) DEFAULT 'system',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table pdsieservice.trx_bookingkursi: ~6 rows (approximately)
/*!40000 ALTER TABLE `trx_bookingkursi` DISABLE KEYS */;
INSERT INTO `trx_bookingkursi` (`ID`, `kodeBooking`, `user`, `direktorat`, `fungsi`, `kursi`, `tglPemakaian`, `tipe`, `jamMulai`, `jamSelesai`, `keterangan`, `status`, `createdtime`, `createdby`) VALUES
	(1, 'UO7XFD', 1, 4, 13, 1, '2022-06-16', 2, '07:00:00', '17:00:00', 'test', 1, '2022-06-16 15:51:58', 'iman.ramadhan'),
	(2, 'KBPH7P', 1, 4, 13, 1, '2022-06-24', 1, '07:00:00', '12:00:00', 'test', 0, '2022-06-16 15:50:56', 'iman.ramadhan'),
	(3, '9ITLAW', 1, 4, 13, 1, '2022-06-18', 2, '07:00:00', '17:00:00', 'test', 3, '2022-06-16 15:52:38', 'iman.ramadhan'),
	(4, '6INTZS', 1, 4, 13, 1, '2022-06-22', 2, '07:00:00', '17:00:00', 'testt', 0, '2022-06-16 15:50:57', 'iman.ramadhan'),
	(5, 'W5JOXU', 1, 4, 13, 1, '2022-06-17', 2, '07:00:00', '17:00:00', 'test', 0, '2022-06-16 15:50:58', 'iman.ramadhan'),
	(6, 'RRK1AA', 1, 4, 13, 1, '2022-06-24', 2, '07:00:00', '17:00:00', 'test', 0, '2022-06-16 15:50:58', 'iman.ramadhan');
/*!40000 ALTER TABLE `trx_bookingkursi` ENABLE KEYS */;

-- Dumping structure for table pdsieservice.trx_bookingmeeting
CREATE TABLE IF NOT EXISTS `trx_bookingmeeting` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(11) DEFAULT 0,
  `direktorat` int(11) DEFAULT 0,
  `fungsi` int(11) DEFAULT 0,
  `departemen` int(11) DEFAULT 0,
  `judulmeeting` text DEFAULT NULL,
  `ruang` int(11) DEFAULT 0,
  `tglPemakaian` datetime DEFAULT NULL,
  `tipe` int(11) DEFAULT NULL,
  `jamMulai` time DEFAULT NULL,
  `jamSelesai` time DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `createdtime` datetime DEFAULT current_timestamp(),
  `createdby` varchar(150) DEFAULT 'system',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table pdsieservice.trx_bookingmeeting: ~0 rows (approximately)
/*!40000 ALTER TABLE `trx_bookingmeeting` DISABLE KEYS */;
/*!40000 ALTER TABLE `trx_bookingmeeting` ENABLE KEYS */;

-- Dumping structure for table pdsieservice.trx_updatedkursi
CREATE TABLE IF NOT EXISTS `trx_updatedkursi` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(11) DEFAULT 0,
  `direktorat` int(11) DEFAULT 0,
  `fungsi` int(11) DEFAULT 0,
  `kursi` int(11) DEFAULT 0,
  `tglPemakaian` datetime DEFAULT NULL,
  `tipe` int(11) DEFAULT NULL,
  `jamMulai` time DEFAULT NULL,
  `jamSelesai` time DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `createdtime` datetime DEFAULT current_timestamp(),
  `createdby` varchar(150) DEFAULT 'system',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table pdsieservice.trx_updatedkursi: ~0 rows (approximately)
/*!40000 ALTER TABLE `trx_updatedkursi` DISABLE KEYS */;
/*!40000 ALTER TABLE `trx_updatedkursi` ENABLE KEYS */;

-- Dumping structure for table pdsieservice.trx_updatedmeeting
CREATE TABLE IF NOT EXISTS `trx_updatedmeeting` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(11) DEFAULT 0,
  `direktorat` int(11) DEFAULT 0,
  `fungsi` int(11) DEFAULT 0,
  `departemen` int(11) DEFAULT 0,
  `judulmeeting` text DEFAULT NULL,
  `ruang` int(11) DEFAULT 0,
  `tglPemakaian` datetime DEFAULT NULL,
  `tipe` int(11) DEFAULT NULL,
  `jamMulai` time DEFAULT NULL,
  `jamSelesai` time DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `createdtime` datetime DEFAULT current_timestamp(),
  `createdby` varchar(150) DEFAULT 'system',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table pdsieservice.trx_updatedmeeting: ~0 rows (approximately)
/*!40000 ALTER TABLE `trx_updatedmeeting` DISABLE KEYS */;
/*!40000 ALTER TABLE `trx_updatedmeeting` ENABLE KEYS */;

-- Dumping structure for table pdsieservice.users
CREATE TABLE IF NOT EXISTS `users` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `userid` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(150) NOT NULL,
  `role` enum('Administrator','Pekerja','Super') NOT NULL,
  `source` enum('ldap','system') NOT NULL DEFAULT 'system',
  `isAktif` tinyint(4) NOT NULL DEFAULT 1,
  `createdtime` datetime NOT NULL DEFAULT current_timestamp(),
  `createdby` varchar(50) NOT NULL DEFAULT 'system',
  PRIMARY KEY (`ID`),
  KEY `Index 2` (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table pdsieservice.users: ~0 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`ID`, `userid`, `email`, `password`, `role`, `source`, `isAktif`, `createdtime`, `createdby`) VALUES
	(1, 'iman.ramadhan', 'iman.ramadhan', '', 'Administrator', 'system', 1, '2022-06-09 12:55:00', 'system');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
