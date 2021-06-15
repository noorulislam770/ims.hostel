-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2021 at 10:52 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hostel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE `program` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`id`, `name`) VALUES
(1, 'BSSE'),
(2, 'BBA'),
(1231, 'BS AeroSpace Engineering'),
(234234, 'bs social sciences');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `roomNo` int(11) NOT NULL,
  `size` int(11) NOT NULL,
  `floor` int(11) NOT NULL,
  `hostel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`roomNo`, `size`, `floor`, `hostel`) VALUES
(1, 4, 2, 1),
(2, 2, 0, 3),
(23, 5, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `roomId` int(11) NOT NULL,
  `city` varchar(30) NOT NULL,
  `fee` tinyint(1) NOT NULL,
  `batch` int(11) NOT NULL,
  `hostel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `roomId`, `city`, `fee`, `batch`, `hostel`) VALUES
(232, 'ali', 2, 'Peshawar', 0, 2312, 3),
(4443, 'faizan', 2342, 'Peshawar', 1, 2021, 1),
(23422, 'jhon wick', 23, 'lahore', 0, 2323, 1),
(23424, 'faizan', 23, 'Peshawar', 0, 82932, 2),
(89892, 'rehman', 23, 'karachi', 0, 2321, 3),
(234234, 'sameer', 28, 'peshawar', 0, 2341, 2),
(293420, 'fayaz', 9, 'islamabad', 0, 2099, 1),
(909099, 'Fareed', 9, 'karachi', 0, 2012, 2),
(2342342, 'aliyan', 3, 'noshera', 23, 2019, 3),
(2934202, 'changez', 23, 'Peshawar', 0, 2300, 1),
(12342903, 'sammer', 2, 'Peshawar', 0, 2019, 1),
(23411231, 'owais', 1, 'dir', 0, 2342, 1),
(29342023, 'waseem', 900, 'kohat', 0, 2323, 2),
(193201247, 'noor', 8, 'chitral', 1, 2012, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`roomNo`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
