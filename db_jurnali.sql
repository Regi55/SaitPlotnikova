-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 06, 2019 at 03:05 PM
-- Server version: 5.6.43
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_jurnali`
--

-- --------------------------------------------------------

--
-- Table structure for table `janr`
--

CREATE TABLE `janr` (
  `id` int(11) NOT NULL,
  `genre` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `janr`
--

INSERT INTO `janr` (`id`, `genre`) VALUES
(1, 'Интервью'),
(2, 'Новости\r\n'),
(3, 'Обозрение\r\n'),
(4, 'Научные статьи\r\n'),
(5, 'Кулинария\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jurnal`
--

CREATE TABLE `tb_jurnal` (
  `id` int(11) NOT NULL,
  `id_genre` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `number` bigint(30) NOT NULL,
  `stranic` tinyint(11) NOT NULL,
  `izdatelstvo` varchar(30) NOT NULL,
  `god` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_jurnal`
--

INSERT INTO `tb_jurnal` (`id`, `id_genre`, `name`, `number`, `stranic`, `izdatelstvo`, `god`) VALUES
(1, 1, 'Теле 7', 5, 15, 'Таврия', 2013),
(2, 2, 'LIFE', 2, 10, 'Время', 2017),
(3, 3, 'Педагоги ведают', 4, 24, 'Вольф', 2014),
(4, 4, 'Orca', 11, 120, 'Наука', 2018),
(5, 5, 'Вкусно и полезно', 3, 71, 'Олма медиа', 2019),
(6, 4, 'Первый', 1, 127, 'Москва', 1981);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `janr`
--
ALTER TABLE `janr`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_jurnal`
--
ALTER TABLE `tb_jurnal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_genre` (`id_genre`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_jurnal`
--
ALTER TABLE `tb_jurnal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_jurnal`
--
ALTER TABLE `tb_jurnal`
  ADD CONSTRAINT `tb_jurnal_1` FOREIGN KEY (`id_genre`) REFERENCES `janr` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
