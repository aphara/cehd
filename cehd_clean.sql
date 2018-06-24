-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2018 at 12:13 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cehd_clean`
--

-- --------------------------------------------------------

--
-- Table structure for table `effector`
--

CREATE TABLE `effector` (
  `id_effector` int(2) UNSIGNED ZEROFILL NOT NULL,
  `effector_type` enum('LIGHT_CTRL','TEMP_CTRL','SHUTTER_CTRL') NOT NULL,
  `request_value` float UNSIGNED DEFAULT NULL,
  `effector_name` varchar(30) DEFAULT NULL,
  `id_room` int(10) UNSIGNED ZEROFILL NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `effector`
--

INSERT INTO `effector` (`id_effector`, `effector_type`, `request_value`, `effector_name`, `id_room`) VALUES
(01, 'LIGHT_CTRL', 1111, 'lumière salon', 0000000003),
(02, 'LIGHT_CTRL', 1111, 'lumière chambre parents', 0000000005),
(03, 'TEMP_CTRL', 24.6, 'thermostat salon', 0000000003),
(04, 'SHUTTER_CTRL', 55, 'volet salon', 0000000003),
(05, 'TEMP_CTRL', 23.5, 'thermostat chambre', 0000000005),
(06, 'SHUTTER_CTRL', 55, 'volet chambre', 0000000005),
(07, 'SHUTTER_CTRL', 55, 'Volet Toilette', 0000000004),
(08, 'SHUTTER_CTRL', 55, 'Volet Chambre Parents', 0000000005),
(09, 'SHUTTER_CTRL', 55, 'Volet buanderie', 0000000006),
(10, 'SHUTTER_CTRL', 55, 'Volet Chambre Ami', 0000000008),
(11, 'SHUTTER_CTRL', 60, 'Volet Salle à Manger 1', 0000000012),
(12, 'SHUTTER_CTRL', 55, 'Volet Salle à Manger 2', 0000000012),
(13, 'SHUTTER_CTRL', 55, 'Volet Salle à Manger 3', 0000000012),
(14, 'SHUTTER_CTRL', 55, 'Volet Salle à Manger 4', 0000000012),
(15, 'SHUTTER_CTRL', 55, 'Volet Cuisine 1', 0000000001),
(16, 'SHUTTER_CTRL', 55, 'Volet Cuisine 2', 0000000001),
(17, 'TEMP_CTRL', 23.5, 'thermostat cuisine', 0000000001),
(18, 'TEMP_CTRL', 23.5, 'thermostat salle à manger', 0000000012),
(19, 'LIGHT_CTRL', 1111, 'lampadaire salon', 0000000003),
(20, 'LIGHT_CTRL', 1111, 'lumière cuisine', 0000000003),
(21, 'TEMP_CTRL', NULL, 'thermostat salon', 0000000013),
(22, 'TEMP_CTRL', NULL, 'thermostat chambre', 0000000014),
(23, 'TEMP_CTRL', NULL, 'thermostat Sdb', 0000000016);

-- --------------------------------------------------------

--
-- Table structure for table `home`
--

CREATE TABLE `home` (
  `id_home` int(10) UNSIGNED ZEROFILL NOT NULL,
  `type` enum('Maison','Appartement') NOT NULL,
  `address` varchar(254) NOT NULL,
  `city` varchar(254) NOT NULL,
  `postcode` varchar(16) NOT NULL,
  `id_block` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `home`
--

INSERT INTO `home` (`id_home`, `type`, `address`, `city`, `postcode`, `id_block`) VALUES
(0000000001, 'Maison', '1 rue de Rennes', 'Paris', '75014', 0),
(0000000004, 'Appartement', '1 rue de la truanderie', 'Paris', '75001', 0);

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `id_room` int(10) UNSIGNED ZEROFILL NOT NULL,
  `name` varchar(20) NOT NULL,
  `floor_name` varchar(20) NOT NULL,
  `size` float UNSIGNED NOT NULL,
  `room_type` enum('CHAMBRE','SALON','CUISINE','SALLE DE BAIN','TOILETTE','BUREAU','AUTRE') NOT NULL,
  `id_home` int(10) UNSIGNED ZEROFILL NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`id_room`, `name`, `floor_name`, `size`, `room_type`, `id_home`) VALUES
(0000000001, 'Cuisine', 'Rez-de-chaussée', 6.5, 'CUISINE', 0000000001),
(0000000003, 'Salon', 'Rez-de-chaussée', 20, 'SALON', 0000000001),
(0000000004, 'Toilette rdc', 'Rez-de-chaussée', 4, 'TOILETTE', 0000000001),
(0000000005, 'Chambre parents', '1er étage', 16.33, 'CHAMBRE', 0000000001),
(0000000006, 'Buanderie', 'Sous-sol', 5.757, 'AUTRE', 0000000001),
(0000000007, 'Cave', 'Sous-sol', 3.897, 'AUTRE', 0000000001),
(0000000008, 'Chambre ami', '1er', 5.464, 'CHAMBRE', 0000000001),
(0000000012, 'Salle à manger', 'Rez-de-chaussée', 20, 'SALON', 0000000001),
(0000000013, 'Pièce à vivre', 'RDC', 12.5, 'SALON', 0000000004),
(0000000014, 'Chambre', 'RDC', 11.6, 'CHAMBRE', 0000000004),
(0000000015, 'Cuisine', 'RDC', 5, 'CUISINE', 0000000004),
(0000000016, 'SdB', 'RDC', 4.778, 'SALLE DE BAIN', 0000000004);

-- --------------------------------------------------------

--
-- Table structure for table `sensor`
--

CREATE TABLE `sensor` (
  `id_sensor` int(2) UNSIGNED ZEROFILL NOT NULL,
  `sensor_type` enum('LIGHT','TEMP','SHUTTER','CONSO') NOT NULL,
  `current_state` tinyint(1) NOT NULL DEFAULT '1',
  `current_value` float UNSIGNED NOT NULL,
  `sensor_name` varchar(30) DEFAULT NULL,
  `id_room` int(10) UNSIGNED ZEROFILL NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sensor`
--

INSERT INTO `sensor` (`id_sensor`, `sensor_type`, `current_state`, `current_value`, `sensor_name`, `id_room`) VALUES
(02, 'TEMP', 1, 23.5, 'temp salon', 0000000003),
(03, 'TEMP', 1, 20.4, 'temp chambre parents', 0000000005),
(04, 'TEMP', 1, 21.7, 'temp cuisine', 0000000001),
(05, 'TEMP', 1, 5.5, 'temp salle à manger', 0000000012),
(06, 'TEMP', 1, 0, 'température salon', 0000000013),
(07, 'TEMP', 1, 0, 'temp chambre', 0000000014),
(08, 'CONSO', 1, 69, 'conso maison', 0000000001),
(09, 'TEMP', 1, 0, 'temp Sdb', 0000000016);

-- --------------------------------------------------------

--
-- Table structure for table `stat_sensor`
--

CREATE TABLE `stat_sensor` (
  `id_stat` int(10) UNSIGNED ZEROFILL NOT NULL,
  `id_sensor` int(2) UNSIGNED ZEROFILL NOT NULL,
  `date_maj` datetime NOT NULL,
  `period` enum('HOUR','DAY','MONTH','YEAR') DEFAULT NULL,
  `value` float NOT NULL,
  `stat_type` enum('LIGHT','TEMP','SHUTTER','CONSO') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stat_sensor`
--

INSERT INTO `stat_sensor` (`id_stat`, `id_sensor`, `date_maj`, `period`, `value`, `stat_type`) VALUES
(0000000001, 99, '2017-01-01 00:00:00', NULL, 0, 'TEMP'),
(0000000002, 02, '2018-06-08 16:28:13', 'DAY', 3, 'TEMP'),
(0000000003, 02, '2018-06-08 16:28:28', 'DAY', 1, 'TEMP'),
(0000000004, 02, '2018-06-08 16:51:39', 'DAY', 0.1, 'TEMP'),
(0000000005, 01, '2018-06-11 15:16:36', 'DAY', 1111, 'LIGHT'),
(0000000006, 01, '2018-06-11 15:17:07', 'DAY', 1100, 'LIGHT'),
(0000000007, 01, '2018-06-11 15:17:14', 'DAY', 0, 'LIGHT'),
(0000000008, 02, '2018-06-11 15:17:46', 'DAY', 21.3, 'TEMP'),
(0000000009, 05, '2018-06-11 15:19:23', 'DAY', 150, 'SHUTTER'),
(0000000010, 05, '2018-06-11 15:19:28', 'DAY', 0, 'SHUTTER'),
(0000000011, 05, '2018-06-11 15:19:45', 'DAY', 300, 'SHUTTER'),
(0000000012, 05, '2018-06-11 15:19:58', 'DAY', 5.5, 'SHUTTER'),
(0000000016, 02, '2018-06-14 16:11:31', 'DAY', 25.6, 'TEMP'),
(0000000017, 02, '2018-06-15 11:00:01', 'DAY', 30.1, 'TEMP'),
(0000000019, 02, '2018-06-15 13:11:25', 'DAY', 21.6, 'TEMP'),
(0000000020, 02, '2018-06-15 13:12:52', 'DAY', 25.9, 'TEMP'),
(0000000021, 02, '2018-06-16 14:43:18', 'DAY', 24, 'TEMP'),
(0000000022, 02, '2018-06-18 16:02:25', 'DAY', 12.6, 'TEMP'),
(0000000023, 02, '2018-06-18 16:25:57', 'DAY', 15.8, 'TEMP'),
(0000000024, 02, '2018-06-18 16:29:09', 'DAY', 20.3, 'TEMP'),
(0000000025, 02, '2018-06-18 17:34:50', 'DAY', 24.5, 'TEMP'),
(0000000026, 02, '2018-06-18 18:05:25', 'DAY', 111.1, 'TEMP'),
(0000000027, 02, '2018-06-19 13:35:35', 'DAY', 23.5, 'TEMP'),
(0000000028, 08, '2018-06-13 22:00:00', 'HOUR', 86, 'CONSO'),
(0000000029, 08, '2018-06-02 22:00:00', 'DAY', 86, 'CONSO'),
(0000000030, 08, '2018-06-01 22:00:00', 'DAY', 126, 'CONSO'),
(0000000031, 08, '2018-05-31 22:00:00', 'DAY', 126, 'CONSO'),
(0000000032, 08, '2018-06-03 22:00:00', 'DAY', 96, 'CONSO'),
(0000000033, 08, '2018-06-04 22:00:00', 'DAY', 76, 'CONSO'),
(0000000034, 08, '2018-06-05 22:00:00', 'DAY', 86, 'CONSO'),
(0000000035, 08, '2018-06-06 22:00:00', 'DAY', 96, 'CONSO'),
(0000000036, 08, '2018-06-07 22:00:00', 'DAY', 56, 'CONSO'),
(0000000037, 08, '2018-06-08 22:00:00', 'DAY', 76, 'CONSO'),
(0000000038, 08, '2018-06-09 22:00:00', 'DAY', 120, 'CONSO'),
(0000000039, 08, '2018-06-10 22:00:00', 'DAY', 130, 'CONSO'),
(0000000040, 08, '2018-06-11 22:00:00', 'DAY', 105, 'CONSO'),
(0000000041, 08, '2018-06-12 22:00:00', 'DAY', 87, 'CONSO'),
(0000000042, 08, '2018-06-14 07:00:00', 'HOUR', 71.1, 'CONSO'),
(0000000043, 08, '2018-06-13 23:00:00', 'HOUR', 65, 'CONSO'),
(0000000044, 08, '2018-06-14 00:00:00', 'HOUR', 76, 'CONSO'),
(0000000045, 08, '2018-06-14 01:00:00', 'HOUR', 90, 'CONSO'),
(0000000046, 08, '2018-06-14 02:00:00', 'HOUR', 63, 'CONSO'),
(0000000047, 08, '2018-06-14 03:00:00', 'HOUR', 24, 'CONSO'),
(0000000048, 08, '2018-06-14 04:00:00', 'HOUR', 87, 'CONSO'),
(0000000049, 08, '2018-06-14 05:00:00', 'HOUR', 99, 'CONSO'),
(0000000050, 08, '2018-06-14 06:00:00', 'HOUR', 45, 'CONSO'),
(0000000052, 08, '2018-06-14 08:00:00', 'HOUR', 86, 'CONSO'),
(0000000053, 08, '2017-10-31 23:00:00', 'MONTH', 64, 'CONSO'),
(0000000054, 08, '2017-11-30 23:00:00', 'MONTH', 48, 'CONSO'),
(0000000055, 08, '2017-12-31 23:00:00', 'MONTH', 25, 'CONSO'),
(0000000056, 08, '2018-01-31 23:00:00', 'MONTH', 98, 'CONSO'),
(0000000057, 08, '2018-02-28 23:00:00', 'MONTH', 76, 'CONSO'),
(0000000058, 08, '2018-03-31 22:00:00', 'MONTH', 68, 'CONSO'),
(0000000059, 08, '2018-04-30 22:00:00', 'MONTH', 89, 'CONSO'),
(0000000060, 08, '2018-05-31 22:00:00', 'MONTH', 108, 'CONSO'),
(0000000061, 08, '2018-06-14 19:00:00', 'HOUR', 62, 'CONSO'),
(0000000062, 08, '2017-09-30 22:00:00', 'MONTH', 72, 'CONSO'),
(0000000063, 08, '2017-08-31 22:00:00', 'MONTH', 58, 'CONSO'),
(0000000064, 08, '2017-07-31 22:00:00', 'MONTH', 35, 'CONSO'),
(0000000065, 08, '2017-06-30 22:00:00', 'MONTH', 48, 'CONSO'),
(0000000066, 08, '2018-06-14 15:00:00', 'HOUR', 78, 'CONSO'),
(0000000067, 08, '2018-06-14 18:00:00', 'HOUR', 98, 'CONSO'),
(0000000068, 08, '2018-06-14 17:00:00', 'HOUR', 107, 'CONSO'),
(0000000069, 08, '2018-06-14 16:00:00', 'HOUR', 67, 'CONSO'),
(0000000070, 08, '2018-06-14 09:00:00', 'HOUR', 87, 'CONSO'),
(0000000071, 08, '2018-06-14 14:00:00', 'HOUR', 89, 'CONSO'),
(0000000072, 08, '2018-06-14 13:00:00', 'HOUR', 107, 'CONSO'),
(0000000073, 08, '2018-06-14 12:00:00', 'HOUR', 97, 'CONSO'),
(0000000074, 08, '2018-06-14 11:00:00', 'HOUR', 37, 'CONSO'),
(0000000075, 08, '2018-06-14 10:00:00', 'HOUR', 87, 'CONSO'),
(0000000076, 08, '2018-06-14 20:00:00', 'HOUR', 82, 'CONSO'),
(0000000077, 08, '2018-06-14 21:00:00', 'HOUR', 122, 'CONSO'),
(0000000078, 08, '2018-06-13 22:00:00', 'DAY', 97, 'CONSO'),
(0000000079, 08, '2018-06-14 22:00:00', 'DAY', 108, 'CONSO'),
(0000000080, 08, '2018-06-15 22:00:00', 'DAY', 99, 'CONSO'),
(0000000081, 08, '2018-06-16 22:00:00', 'DAY', 87, 'CONSO'),
(0000000082, 08, '2018-06-17 22:00:00', 'DAY', 76, 'CONSO'),
(0000000083, 08, '2018-06-18 22:00:00', 'DAY', 88, 'CONSO'),
(0000000084, 08, '2018-06-19 22:00:00', 'DAY', 97, 'CONSO'),
(0000000085, 08, '2018-06-20 22:00:00', 'DAY', 77, 'CONSO'),
(0000000086, 08, '2018-06-21 22:00:00', 'DAY', 97, 'CONSO'),
(0000000087, 08, '2018-06-22 22:00:00', 'DAY', 84, 'CONSO'),
(0000000088, 08, '2018-06-23 22:00:00', 'DAY', 57, 'CONSO'),
(0000000089, 08, '2018-06-24 22:00:00', 'DAY', 127, 'CONSO'),
(0000000090, 08, '2018-06-25 22:00:00', 'DAY', 137, 'CONSO'),
(0000000091, 08, '2018-06-26 22:00:00', 'DAY', 67, 'CONSO'),
(0000000092, 08, '2018-06-27 22:00:00', 'DAY', 117, 'CONSO'),
(0000000093, 08, '2018-06-28 22:00:00', 'DAY', 109, 'CONSO'),
(0000000094, 08, '2018-06-22 22:00:00', 'DAY', 84, 'CONSO'),
(0000000095, 08, '2018-06-23 22:00:00', 'DAY', 57, 'CONSO'),
(0000000096, 08, '2018-06-24 22:00:00', 'DAY', 127, 'CONSO'),
(0000000097, 08, '2018-06-25 22:00:00', 'DAY', 137, 'CONSO'),
(0000000098, 08, '2018-06-26 22:00:00', 'DAY', 67, 'CONSO'),
(0000000099, 08, '2018-06-27 22:00:00', 'DAY', 117, 'CONSO'),
(0000000100, 08, '2018-06-28 22:00:00', 'DAY', 109, 'CONSO'),
(0000000101, 08, '2018-06-29 22:00:00', 'DAY', 69, 'CONSO');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(10) UNSIGNED NOT NULL,
  `status` enum('SUPER_USER','USER','ADMIN') NOT NULL,
  `mail` varchar(254) NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `date_of_birth` date NOT NULL,
  `phone` varchar(20) NOT NULL,
  `id_superuser` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `status`, `mail`, `password`, `first_name`, `last_name`, `date_of_birth`, `phone`, `id_superuser`) VALUES
(1, 'SUPER_USER', 'test@test123.com', '$2y$10$39qnNM/Be03pggBS/FNXaO7821i7xZ92DD8EnV0XSmhbKdZlVW9Gy', 'Jean', 'Dupont', '1990-01-10', '+336012345678', NULL),
(2, 'ADMIN', 'admin@admin.fr', '$2y$10$I5ECudoCdt86puFfWSgwW.DtAJWsK0caV8bbaZ4DIY/ZdDDfXzyLC', 'Admin', '', '0000-00-00', '', NULL),
(9, 'USER', 'marie.dupont@test123.com', '$2y$10$I5hDvrl.kGdqm6JMv9KNSOtE5rVfiNgVMAMeIo9HV0NPq1XBo3CSm', 'Marie', 'Dupont', '1991-02-27', '0612345678', 1),
(10, 'SUPER_USER', 'apharamond@isep.fr', '', 'Alex', 'Pharamond', '1997-02-06', '0606060606', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_home`
--

CREATE TABLE `user_home` (
  `id_home` int(10) UNSIGNED ZEROFILL NOT NULL,
  `id_user` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_home`
--

INSERT INTO `user_home` (`id_home`, `id_user`) VALUES
(0000000001, 1),
(0000000004, 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `effector`
--
ALTER TABLE `effector`
  ADD PRIMARY KEY (`id_effector`),
  ADD KEY `fk_effector_room` (`id_room`);

--
-- Indexes for table `home`
--
ALTER TABLE `home`
  ADD PRIMARY KEY (`id_home`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id_room`),
  ADD KEY `fk_id_home` (`id_home`);

--
-- Indexes for table `sensor`
--
ALTER TABLE `sensor`
  ADD PRIMARY KEY (`id_sensor`),
  ADD KEY `fk_sensor_room` (`id_room`);

--
-- Indexes for table `stat_sensor`
--
ALTER TABLE `stat_sensor`
  ADD PRIMARY KEY (`id_stat`),
  ADD KEY `fk_stat_sensor` (`id_sensor`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `user_home`
--
ALTER TABLE `user_home`
  ADD PRIMARY KEY (`id_home`),
  ADD KEY `fk_user_id` (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `effector`
--
ALTER TABLE `effector`
  MODIFY `id_effector` int(2) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `home`
--
ALTER TABLE `home`
  MODIFY `id_home` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `id_room` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `sensor`
--
ALTER TABLE `sensor`
  MODIFY `id_sensor` int(2) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `stat_sensor`
--
ALTER TABLE `stat_sensor`
  MODIFY `id_stat` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_home`
--
ALTER TABLE `user_home`
  MODIFY `id_home` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
