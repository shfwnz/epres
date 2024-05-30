-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 23, 2024 at 12:45 PM
-- Server version: 10.5.23-MariaDB-0+deb11u1
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epres`
--

-- --------------------------------------------------------

--
-- Table structure for table `ekstra`
--

CREATE TABLE `ekstra` (
  `id` int(20) NOT NULL,
  `nama_ekstra` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ekstra`
--

INSERT INTO `ekstra` (`id`, `nama_ekstra`) VALUES
(1, 'Hiking Club'),
(2, 'SBAQ'),
(4, 'SNB'),
(5, 'SDF'),
(6, 'KIR'),
(17, 'JURNALISTIK');

-- --------------------------------------------------------

--
-- Table structure for table `hari`
--

CREATE TABLE `hari` (
  `id` int(11) NOT NULL,
  `nama_hari` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hari`
--

INSERT INTO `hari` (`id`, `nama_hari`) VALUES
(1, 'senin'),
(2, 'selasa'),
(3, 'rabu'),
(4, 'kamis'),
(5, 'jumat');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id` int(11) NOT NULL,
  `hari_id` int(11) DEFAULT NULL,
  `ekstra_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id`, `hari_id`, `ekstra_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 4),
(4, 3, 4),
(5, 3, 5),
(7, 4, 6),
(17, 3, 17);

-- --------------------------------------------------------

--
-- Table structure for table `presensi`
--

CREATE TABLE `presensi` (
  `id` int(11) NOT NULL,
  `user` varchar(30) NOT NULL,
  `ekstra` varchar(30) NOT NULL,
  `keterangan` varchar(25) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `nis` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `presensi`
--

INSERT INTO `presensi` (`id`, `user`, `ekstra`, `keterangan`, `waktu`, `nis`) VALUES
(50, 'Alex Jones', 'SNB', 'hadir', '2024-05-21 15:30:50', '12345'),
(51, 'Sarah Smith', 'SNB', 'hadir', '2024-05-21 15:30:00', '67890'),
(52, 'Michael Brown', 'SNB', 'hadir', '2024-05-21 15:31:00', '54321'),
(53, 'Arif Budi', 'Hiking Club', 'hadir', '2024-05-06 16:20:10', '10001'),
(54, 'Bella Nur', 'Hiking Club', 'hadir', '2024-05-06 16:20:59', '10002'),
(55, 'Citra Dewi', 'Hiking Club', 'hadir', '2024-05-06 16:23:21', '10003'),
(56, 'Doni Prasetyo', 'Hiking Club', 'hadir', '2024-05-06 16:24:00', '10004'),
(57, 'Eka Putra', 'Hiking Club', 'hadir', '2024-05-06 16:24:12', '10005'),
(58, 'Fina Melati', 'Hiking Club', 'hadir', '2024-05-06 16:25:00', '10006'),
(59, 'Emily Davis', 'SNB', 'hadir', '2024-05-21 15:35:00', '98765'),
(60, 'Daniel Taylor', 'SNB', 'hadir', '2024-05-21 16:00:00', '23456'),
(61, 'Ashley Anderson', 'SNB', 'hadir', '2024-05-21 16:00:00', '87654'),
(62, 'James Thomas', 'SNB', 'hadir', '2024-05-06 21:00:00', '65432'),
(63, 'Hannah Jackson', 'SNB', 'hadir', '2024-05-21 16:00:00', '45678'),
(64, 'Joshua White', 'SNB', 'hadir', '2024-05-21 16:00:00', '12389'),
(65, 'Zhendisini', 'KIR', 'hadir', '2024-05-16 16:00:00', '99999'),
(66, 'Demo', 'KIR', 'hadir', '2024-05-16 16:00:00', '99999'),
(67, 'Adi Nugroho', 'KIR', 'hadir', '2024-05-16 16:00:00', '10101'),
(68, 'Bambang Susanto', 'KIR', 'hadir', '2024-05-16 16:00:00', '10102'),
(69, 'Citra Wulandari', 'KIR', 'hadir', '2024-05-16 16:00:00', '10103'),
(70, 'Dewi Kartika', 'KIR', 'hadir', '2024-05-16 16:00:00', '10104'),
(71, 'Adam Williams', 'SDF', 'hadir', '2024-05-15 16:00:00', '10001'),
(72, 'Siti Nurhaliza', 'SDF', 'hadir', '2024-05-15 16:00:00', '10002'),
(73, 'Benjamin Martin', 'SDF', 'hadir', '2024-05-15 16:00:00', '10003'),
(74, 'Diana Putri', 'SDF', 'hadir', '2024-05-15 16:00:00', '10004'),
(75, 'Charlie Jones', 'SDF', 'hadir', '2024-05-15 16:00:00', '10005'),
(76, 'Edward Smith', 'SDF', 'hadir', '2024-05-15 16:00:00', '10006'),
(77, 'Ratna Wati', 'SDF', 'hadir', '2024-05-15 16:00:00', '10007'),
(78, 'Freddie Tan', 'SDF', 'hadir', '2024-05-15 16:00:00', '10008'),
(79, 'Gabriella Kurniawan', 'SDF', 'hadir', '2024-05-15 16:00:00', '10009'),
(80, 'Harry Johnson', 'SDF', 'hadir', '2024-05-15 16:00:00', '10010'),
(81, 'Ian Thomas', 'SDF', 'hadir', '2024-05-15 16:00:00', '10011'),
(82, 'Jake Anderson', 'JURNALISTIK', 'hadir', '2024-05-15 16:02:34', '76543'),
(83, 'Mario John', 'JURNALISTIK', 'hadir', '2024-05-15 16:05:23', '98765'),
(84, 'Nina Clark', 'JURNALISTIK', 'hadir', '2024-05-15 16:08:45', '65432'),
(85, 'Tina Williams', 'JURNALISTIK', 'hadir', '2024-05-15 16:10:45', '65432'),
(86, 'Emmett Rodriguez', 'JURNALISTIK', 'hadir', '2024-05-15 16:13:56', '45678'),
(87, 'Mia Lopez', 'JURNALISTIK', 'hadir', '2024-05-15 16:14:25', '65432'),
(88, 'Josh Miller', 'JURNALISTIK', 'hadir', '2024-05-15 16:15:12', '12345'),
(89, 'Olivia Lee', 'JURNALISTIK', 'hadir', '2024-05-15 16:19:27', '98765'),
(90, 'Sophia Davis', 'JURNALISTIK', 'hadir', '2024-05-15 16:20:30', '54321'),
(91, 'David Hernandez', 'JURNALISTIK', 'hadir', '2024-05-15 16:22:48', '87654'),
(92, 'Amos Thomas', 'JURNALISTIK', 'hadir', '2024-05-15 16:25:54', '87654'),
(93, 'Gina Garcia', 'JURNALISTIK', 'hadir', '2024-05-15 16:27:30', '34567'),
(94, 'Lucas Martinez', 'JURNALISTIK', 'hadir', '2024-05-15 16:29:59', '23456'),
(95, 'Lea Martin', 'JURNALISTIK', 'hadir', '2024-05-15 16:30:07', '23456'),
(96, 'Agung Pratama', 'SBAQ', 'hadir', '2024-05-13 16:20:00', '10001'),
(97, 'Budi Santoso', 'SBAQ', 'hadir', '2024-05-13 16:25:00', '10002'),
(98, 'Chandra Wibowo', 'SBAQ', 'hadir', '2024-05-13 16:30:00', '10003'),
(99, 'Dina Sukmawati', 'SBAQ', 'hadir', '2024-05-13 16:35:00', '10004'),
(100, 'Eka Puspitasari', 'SBAQ', 'hadir', '2024-05-13 16:40:00', '10005'),
(101, 'Fajar Setiawan', 'SBAQ', 'hadir', '2024-05-13 16:45:00', '10006'),
(102, 'Galih Ramdani', 'SBAQ', 'hadir', '2024-05-13 16:50:00', '10007'),
(103, 'Hesti Andini', 'SBAQ', 'hadir', '2024-05-13 16:55:00', '10008'),
(104, 'Irfan Hakim', 'SBAQ', 'hadir', '2024-05-13 17:00:00', '10009'),
(105, 'Joseph Garcia', 'SNB', 'hadir', '2024-05-23 12:35:32', '34512');

-- --------------------------------------------------------

--
-- Table structure for table `presensi_settings`
--

CREATE TABLE `presensi_settings` (
  `id` int(11) NOT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `presensi_settings`
--

INSERT INTO `presensi_settings` (`id`, `start_time`, `end_time`) VALUES
(2, '18:00:00', '22:00:00'),
(3, '19:09:00', '19:12:00'),
(4, '19:10:00', '19:11:00'),
(5, '19:14:00', '19:16:00'),
(6, '19:14:00', '19:15:00'),
(7, '19:14:00', '19:15:00'),
(8, '19:18:00', '19:20:00'),
(9, '17:54:00', '17:56:00'),
(10, '19:00:00', '23:59:00'),
(11, '19:04:00', '19:05:00'),
(12, '15:54:00', '15:56:00'),
(13, '17:14:00', '17:16:00'),
(14, '17:14:00', '17:18:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(25) NOT NULL,
  `fullname` varchar(30) NOT NULL,
  `kelas` varchar(25) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `nis` varchar(5) NOT NULL,
  `ekstraa` varchar(30) NOT NULL,
  `user_tipe` varchar(7) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `fullname`, `kelas`, `gender`, `nis`, `ekstraa`, `user_tipe`) VALUES
(48, 'alex', 'alex_jones@example.com', '123', 'Alex Jones', '10 KA A', 'Male', '12345', 'SNB', 'siswa'),
(49, 'sarah', 'sarah_smith@example.com', '123', 'Sarah Smith', '11 KA B', 'Female', '67890', 'SNB', 'siswa'),
(50, 'michael', 'michael_brown@example.com', '123', 'Michael Brown', '12 SIJA A', 'Male', '54321', 'SNB', 'siswa'),
(51, 'emily', 'emily_davis@example.com', '123', 'Emily Davis', '10 SIJA B', 'Female', '98765', 'SNB', 'siswa'),
(52, 'david', 'david_wilson@example.com', '123', 'David Wilson', '11 KA A', 'Male', '34567', 'SNB', 'siswa'),
(53, 'jessica', 'jessica_moore@example.com', '123', 'Jessica Moore', '12 KA B', 'Female', '76543', 'SNB', 'siswa'),
(54, 'daniel', 'daniel_taylor@example.com', '123', 'Daniel Taylor', '10 SIJA A', 'Male', '23456', 'SNB', 'siswa'),
(55, 'ashley', 'ashley_anderson@example.com', '123', 'Ashley Anderson', '11 SIJA B', 'Female', '87654', 'SNB', 'siswa'),
(56, 'james', 'james_thomas@example.com', '123', 'James Thomas', '12 KA A', 'Male', '65432', 'SNB', 'siswa'),
(57, 'hannah', 'hannah_jackson@example.com', '123', 'Hannah Jackson', '10 KA B', 'Female', '45678', 'SNB', 'siswa'),
(58, 'joshua', 'joshua_white@example.com', '123', 'Joshua White', '11 SIJA A', 'Male', '12389', 'SNB', 'siswa'),
(59, 'megan', 'megan_harris@example.com', '123', 'Megan Harris', '12 SIJA B', 'Female', '67891', 'SNB', 'siswa'),
(60, 'andrew', 'andrew_martin@example.com', '123', 'Andrew Martin', '10 KA A', 'Male', '54312', 'SNB', 'siswa'),
(61, 'lauren', 'lauren_thompson@example.com', '123', 'Lauren Thompson', '11 KA B', 'Female', '98716', 'SNB', 'siswa'),
(62, 'joseph', 'joseph_garcia@example.com', '123', 'Joseph Garcia', '12 SIJA A', 'Male', '34512', 'SNB', 'siswa'),
(63, 'samantha', 'samantha_martinez@example.com', '123', 'Samantha Martinez', '10 SIJA B', 'Female', '76541', 'SNB', 'siswa'),
(64, 'chris', 'chris_hernandez@example.com', '123', 'Chris Hernandez', '11 KA A', 'Male', '23451', 'SNB', 'siswa'),
(65, 'elizabeth', 'elizabeth_lopez@example.com', '123', 'Elizabeth Lopez', '12 KA B', 'Female', '87613', 'SNB', 'siswa'),
(66, 'matthew', 'matthew_hall@example.com', '123', 'Matthew Hall', '10 SIJA A', 'Male', '65421', 'SNB', 'siswa'),
(67, 'karen', 'karen_clark@example.com', '123', 'Karen Clark', '11 SIJA B', 'Female', '45617', 'SNB', 'siswa'),
(68, 'barr', 'zhendevss@gmail.com', 'bar123', 'Muhammad Akbar Amaanullaah', '11 SIJA B', 'Male', '20426', 'SNB', 'admin'),
(69, 'zhenn', 'zhendev@gmail.com', '123', 'zhendisini', '11 SIJA B', 'Male', '99999', 'KIR', 'siswa'),
(70, 'demo', 'demo@gmail.com', 'demo123', 'demo', '11 SIJA B', 'Male', '99999', 'KIR', 'siswa'),
(71, 'agung_pratama', 'agung_pratama@example.com', '123', 'Agung Pratama', '10 KA A', 'Male', '10001', 'SBAQ', 'siswa'),
(72, 'budi_santoso', 'budi_santoso@example.com', '123', 'Budi Santoso', '11 KA B', 'Male', '10002', 'SBAQ', 'siswa'),
(73, 'chandra_wibowo', 'chandra_wibowo@example.com', '123', 'Chandra Wibowo', '12 SIJA A', 'Male', '10003', 'SBAQ', 'siswa'),
(74, 'dina_sukmawati', 'dina_sukmawati@example.com', '123', 'Dina Sukmawati', '10 SIJA B', 'Female', '10004', 'SBAQ', 'siswa'),
(75, 'eka_puspitasari', 'eka_puspitasari@example.com', '123', 'Eka Puspitasari', '11 KA A', 'Female', '10005', 'SBAQ', 'siswa'),
(76, 'fajar_setiawan', 'fajar_setiawan@example.com', '123', 'Fajar Setiawan', '12 KA B', 'Male', '10006', 'SBAQ', 'siswa'),
(77, 'galih_ramdani', 'galih_ramdani@example.com', '123', 'Galih Ramdani', '10 SIJA A', 'Male', '10007', 'SBAQ', 'siswa'),
(78, 'hesti_andini', 'hesti_andini@example.com', '123', 'Hesti Andini', '11 SIJA B', 'Female', '10008', 'SBAQ', 'siswa'),
(79, 'irfan_hakim', 'irfan_hakim@example.com', '123', 'Irfan Hakim', '12 KA A', 'Male', '10009', 'SBAQ', 'siswa'),
(80, 'joko_susanto', 'joko_susanto@example.com', '123', 'Joko Susanto', '10 KA B', 'Male', '10010', 'SBAQ', 'siswa'),
(81, 'karina_wardani', 'karina_wardani@example.com', '123', 'Karina Wardani', '11 SIJA A', 'Female', '10011', 'SBAQ', 'siswa'),
(82, 'lina_nuraini', 'lina_nuraini@example.com', '123', 'Lina Nuraini', '12 SIJA B', 'Female', '10012', 'SBAQ', 'siswa'),
(83, 'mario_rizky', 'mario_rizky@example.com', '123', 'Mario Rizky', '10 KA A', 'Male', '10013', 'SBAQ', 'siswa'),
(84, 'nina_saputri', 'nina_saputri@example.com', '123', 'Nina Saputri', '11 KA B', 'Female', '10014', 'SBAQ', 'siswa'),
(85, 'oprandi_syahputra', 'oprandi_syahputra@example.com', '123', 'Oprandi Syahputra', '12 SIJA A', 'Male', '10015', 'SBAQ', 'siswa'),
(86, 'putri_maharani', 'putri_maharani@example.com', '123', 'Putri Maharani', '10 SIJA B', 'Female', '10016', 'SBAQ', 'siswa'),
(87, 'rahmat_hidayat', 'rahmat_hidayat@example.com', '123', 'Rahmat Hidayat', '11 KA A', 'Male', '10017', 'SBAQ', 'siswa'),
(88, 'siti_aisyah', 'siti_aisyah@example.com', '123', 'Siti Aisyah', '12 KA B', 'Female', '10018', 'SBAQ', 'siswa'),
(89, 'toni_prayoga', 'toni_prayoga@example.com', '123', 'Toni Prayoga', '10 SIJA A', 'Male', '10019', 'SBAQ', 'siswa'),
(90, 'utami_susanti', 'utami_susanti@example.com', '123', 'Utami Susanti', '11 SIJA B', 'Female', '10020', 'SBAQ', 'siswa'),
(91, 'vera_putri', 'vera_putri@example.com', '123', 'Vera Putri', '12 KA A', 'Female', '10021', 'SBAQ', 'siswa'),
(92, 'wawan_setiawan', 'wawan_setiawan@example.com', '123', 'Wawan Setiawan', '10 KA B', 'Male', '10022', 'SBAQ', 'siswa'),
(93, 'yulia_nuraini', 'yulia_nuraini@example.com', '123', 'Yulia Nuraini', '11 SIJA A', 'Female', '10023', 'SBAQ', 'siswa'),
(94, 'zulkifli_hasibuan', 'zulkifli_hasibuan@example.com', '123', 'Zulkifli Hasibuan', '12 SIJA B', 'Male', '10024', 'SBAQ', 'siswa'),
(95, 'arif_budi', 'arif_budi@example.com', '123', 'Arif Budi', '10 GP A', 'Male', '10001', 'Hiking Club', 'siswa'),
(96, 'bella_nur', 'bella_nur@example.com', '123', 'Bella Nur', '11 TKR B', 'Female', '10002', 'Hiking Club', 'siswa'),
(97, 'citra_dewi', 'citra_dewi@example.com', '123', 'Citra Dewi', '10 GP B', 'Female', '10003', 'Hiking Club', 'siswa'),
(98, 'doni_prasetyo', 'doni_prasetyo@example.com', '123', 'Doni Prasetyo', '11 GP B', 'Male', '10004', 'Hiking Club', 'siswa'),
(99, 'eka_putra', 'eka_putra@example.com', '123', 'Eka Putra', '10 TP', 'Male', '10005', 'Hiking Club', 'siswa'),
(100, 'fina_melati', 'fina_melati@example.com', '123', 'Fina Melati', '10 GP A', 'Female', '10006', 'Hiking Club', 'siswa'),
(101, 'gita_sari', 'gita_sari@example.com', '123', 'Gita Sari', '11 TKR B', 'Female', '10007', 'Hiking Club', 'siswa'),
(102, 'hendra_kusuma', 'hendra_kusuma@example.com', '123', 'Hendra Kusuma', '10 GP B', 'Male', '10008', 'Hiking Club', 'siswa'),
(103, 'indra_novian', 'indra_novian@example.com', '123', 'Indra Novian', '11 GP B', 'Male', '10009', 'Hiking Club', 'siswa'),
(104, 'julia_purnama', 'julia_purnama@example.com', '123', 'Julia Purnama', '10 TP', 'Female', '10010', 'Hiking Club', 'siswa'),
(105, 'krisna_putra', 'krisna_putra@example.com', '123', 'Krisna Putra', '10 GP A', 'Male', '10011', 'Hiking Club', 'siswa'),
(106, 'linda_sari', 'linda_sari@example.com', '123', 'Linda Sari', '11 TKR B', 'Female', '10012', 'Hiking Club', 'siswa'),
(107, 'miko_pratama', 'miko_pratama@example.com', '123', 'Miko Pratama', '10 GP B', 'Male', '10013', 'Hiking Club', 'siswa'),
(108, 'nina_anggraeni', 'nina_anggraeni@example.com', '123', 'Nina Anggraeni', '11 GP B', 'Female', '10014', 'Hiking Club', 'siswa'),
(109, 'oni_kusuma', 'oni_kusuma@example.com', '123', 'Oni Kusuma', '10 TP', 'Male', '10015', 'Hiking Club', 'siswa'),
(110, 'prima_jaya', 'prima_jaya@example.com', '123', 'Prima Jaya', '10 GP A', 'Male', '10016', 'Hiking Club', 'siswa'),
(111, 'ratna_damayanti', 'ratna_damayanti@example.com', '123', 'Ratna Damayanti', '11 TKR B', 'Female', '10017', 'Hiking Club', 'siswa'),
(112, 'samsul_bachri', 'samsul_bachri@example.com', '123', 'Samsul Bachri', '10 GP B', 'Male', '10018', 'Hiking Club', 'siswa'),
(113, 'adam_williams', 'adam_williams@example.com', '123', 'Adam Williams', '10 SIJA A', 'Male', '10001', 'SDF', 'siswa'),
(114, 'siti_nurhaliza', 'siti_nurhaliza@example.com', '123', 'Siti Nurhaliza', '11 SIJA B', 'Female', '10002', 'SDF', 'siswa'),
(115, 'benjamin_martin', 'benjamin_martin@example.com', '123', 'Benjamin Martin', '12 GP A', 'Male', '10003', 'SDF', 'siswa'),
(116, 'diana_putri', 'diana_putri@example.com', '123', 'Diana Putri', '11 KA A', 'Female', '10004', 'SDF', 'siswa'),
(117, 'charlie_jones', 'charlie_jones@example.com', '123', 'Charlie Jones', '11 KI B', 'Male', '10005', 'SDF', 'siswa'),
(118, 'edward_smith', 'edward_smith@example.com', '123', 'Edward Smith', '10 SIJA A', 'Male', '10006', 'SDF', 'siswa'),
(119, 'ratna_wati', 'ratna_wati@example.com', '123', 'Ratna Wati', '11 SIJA B', 'Female', '10007', 'SDF', 'siswa'),
(120, 'freddie_tan', 'freddie_tan@example.com', '123', 'Freddie Tan', '12 GP A', 'Male', '10008', 'SDF', 'siswa'),
(121, 'gabriella_kurniawan', 'gabriella_kurniawan@example.com', '123', 'Gabriella Kurniawan', '11 KA A', 'Female', '10009', 'SDF', 'siswa'),
(122, 'harry_johnson', 'harry_johnson@example.com', '123', 'Harry Johnson', '11 KI B', 'Male', '10010', 'SDF', 'siswa'),
(123, 'ian_thomas', 'ian_thomas@example.com', '123', 'Ian Thomas', '10 SIJA A', 'Male', '10011', 'SDF', 'siswa'),
(124, 'jessica_wong', 'jessica_wong@example.com', '123', 'Jessica Wong', '11 SIJA B', 'Female', '10012', 'SDF', 'siswa'),
(125, 'kyle_morris', 'kyle_morris@example.com', '123', 'Kyle Morris', '12 GP A', 'Male', '10013', 'SDF', 'siswa'),
(126, 'laura_williams', 'laura_williams@example.com', '123', 'Laura Williams', '11 KA A', 'Female', '10014', 'SDF', 'siswa'),
(127, 'michael_jackson', 'michael_jackson@example.com', '123', 'Michael Jackson', '11 KI B', 'Male', '10015', 'SDF', 'siswa'),
(128, 'nina_siregar', 'nina_siregar@example.com', '123', 'Nina Siregar', '10 SIJA A', 'Female', '10016', 'SDF', 'siswa'),
(129, 'oliver_anderson', 'oliver_anderson@example.com', '123', 'Oliver Anderson', '11 SIJA B', 'Male', '10017', 'SDF', 'siswa'),
(130, 'patricia_tan', 'patricia_tan@example.com', '123', 'Patricia Tan', '12 GP A', 'Female', '10018', 'SDF', 'siswa'),
(131, 'quinn_wilson', 'quinn_wilson@example.com', '123', 'Quinn Wilson', '11 KA A', 'Male', '10019', 'SDF', 'siswa'),
(132, 'rachel_nguyen', 'rachel_nguyen@example.com', '123', 'Rachel Nguyen', '11 KI B', 'Female', '10020', 'SDF', 'siswa'),
(133, 'steven_carter', 'steven_carter@example.com', '123', 'Steven Carter', '10 SIJA A', 'Male', '10021', 'SDF', 'siswa'),
(134, 'tania_halim', 'tania_halim@example.com', '123', 'Tania Halim', '11 SIJA B', 'Female', '10022', 'SDF', 'siswa'),
(135, 'adi_nugroho', 'adi_nugroho@example.com', '123', 'Adi Nugroho', '10 TFLM A', 'Male', '10101', 'KIR', 'siswa'),
(136, 'bambang_susanto', 'bambang_susanto@example.com', '123', 'Bambang Susanto', '11 TITL', 'Male', '10102', 'KIR', 'siswa'),
(137, 'citra_wulandari', 'citra_wulandari@example.com', '123', 'Citra Wulandari', '11 TEK A', 'Female', '10103', 'KIR', 'siswa'),
(138, 'dewi_kartika', 'dewi_kartika@example.com', '123', 'Dewi Kartika', '11 SIJA B', 'Female', '10104', 'KIR', 'siswa'),
(139, 'eko_prabowo', 'eko_prabowo@example.com', '123', 'Eko Prabowo', '10 TOI', 'Male', '10105', 'KIR', 'siswa'),
(140, 'fitriani_ningsih', 'fitriani_ningsih@example.com', '123', 'Fitriani Ningsih', '10 TFLM A', 'Female', '10106', 'KIR', 'siswa'),
(141, 'gatot_subroto', 'gatot_subroto@example.com', '123', 'Gatot Subroto', '11 TITL', 'Male', '10107', 'KIR', 'siswa'),
(142, 'hendri_wijaya', 'hendri_wijaya@example.com', '123', 'Hendri Wijaya', '11 TEK A', 'Male', '10108', 'KIR', 'siswa'),
(143, 'intan_anggraeni', 'intan_anggraeni@example.com', '123', 'Inta Anggraeni', '11 SIJA B', 'Female', '10109', 'KIR', 'siswa'),
(144, 'joko_saputra', 'joko_saputra@example.com', '123', 'Joko Saputra', '10 TOI', 'Male', '10110', 'KIR', 'siswa'),
(145, 'kartini_sari', 'kartini_sari@example.com', '123', 'Kartini Sari', '10 TFLM A', 'Female', '10111', 'KIR', 'siswa'),
(146, 'lukman_hakim', 'lukman_hakim@example.com', '123', 'Lukman Hakim', '11 TITL', 'Male', '10112', 'KIR', 'siswa'),
(147, 'agus', 'agus_smith@example.com', '123', 'Agus Smith', '10 KA A', 'Male', '12346', 'JURNALISTIK', 'siswa'),
(148, 'mario', 'mario_john@example.com', '123', 'Mario John', '11 KA A', 'Male', '98765', 'JURNALISTIK', 'siswa'),
(149, 'tina', 'tina_williams@example.com', '123', 'Tina Williams', '12 KA A', 'Female', '65432', 'JURNALISTIK', 'siswa'),
(150, 'josh', 'josh_miller@example.com', '123', 'Josh Miller', '10 KA B', 'Male', '12345', 'JURNALISTIK', 'siswa'),
(151, 'sophia', 'sophia_davis@example.com', '123', 'Sophia Davis', '11 KA B', 'Female', '54321', 'JURNALISTIK', 'siswa'),
(152, 'amos', 'amos_thomas@example.com', '123', 'Amos Thomas', '12 KA B', 'Male', '87654', 'JURNALISTIK', 'siswa'),
(153, 'lea', 'lea_martin@example.com', '123', 'Lea Martin', '10 SIJA A', 'Female', '23456', 'JURNALISTIK', 'siswa'),
(154, 'jake', 'jake_anderson@example.com', '123', 'Jake Anderson', '11 SIJA A', 'Male', '76543', 'JURNALISTIK', 'siswa'),
(155, 'nina', 'nina_clark@example.com', '123', 'Nina Clark', '12 SIJA A', 'Female', '54321', 'JURNALISTIK', 'siswa'),
(156, 'emmett', 'emmett_rodriguez@example.com', '123', 'Emmett Rodriguez', '10 SIJA B', 'Male', '45678', 'JURNALISTIK', 'siswa'),
(157, 'olivia', 'olivia_lee@example.com', '123', 'Olivia Lee', '11 SIJA B', 'Female', '98765', 'JURNALISTIK', 'siswa'),
(158, 'david', 'david_hernandez@example.com', '123', 'David Hernandez', '12 SIJA B', 'Male', '87654', 'JURNALISTIK', 'siswa'),
(159, 'gina', 'gina_garcia@example.com', '123', 'Gina Garcia', '10 TOI A', 'Female', '34567', 'JURNALISTIK', 'siswa'),
(160, 'lucas', 'lucas_martinez@example.com', '123', 'Lucas Martinez', '11 TOI A', 'Male', '23456', 'JURNALISTIK', 'siswa'),
(161, 'mia', 'mia_lopez@example.com', '123', 'Mia Lopez', '12 TOI A', 'Female', '65432', 'JURNALISTIK', 'siswa'),
(162, 'marcus', 'marcus_wilson@example.com', '123', 'Marcus Wilson', '10 TOI B', 'Male', '12345', 'JURNALISTIK', 'siswa'),
(163, 'ava', 'ava_rodriguez@example.com', '123', 'Ava Rodriguez', '11 TOI B', 'Female', '87654', 'JURNALISTIK', 'siswa'),
(164, 'noah', 'noah_martinez@example.com', '123', 'Noah Martinez', '12 TOI B', 'Male', '54321', 'JURNALISTIK', 'siswa'),
(165, 'lily', 'lily_garcia@example.com', '123', 'Lily Garcia', '10 KI A', 'Female', '76543', 'JURNALISTIK', 'siswa'),
(166, 'ethan', 'ethan_lopez@example.com', '123', 'Ethan Lopez', '11 KI A', 'Male', '45678', 'JURNALISTIK', 'siswa'),
(167, 'luna', 'luna_martinez@example.com', '123', 'Luna Martinez', '12 KI A', 'Female', '98765', 'JURNALISTIK', 'siswa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ekstra`
--
ALTER TABLE `ekstra`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hari`
--
ALTER TABLE `hari`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hari_id` (`hari_id`),
  ADD KEY `ekstra_id` (`ekstra_id`);

--
-- Indexes for table `presensi`
--
ALTER TABLE `presensi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `presensi_settings`
--
ALTER TABLE `presensi_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ekstra`
--
ALTER TABLE `ekstra`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `hari`
--
ALTER TABLE `hari`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `presensi`
--
ALTER TABLE `presensi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `presensi_settings`
--
ALTER TABLE `presensi_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=168;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_ibfk_1` FOREIGN KEY (`hari_id`) REFERENCES `hari` (`id`),
  ADD CONSTRAINT `jadwal_ibfk_2` FOREIGN KEY (`ekstra_id`) REFERENCES `ekstra` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
