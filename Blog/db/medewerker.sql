-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2017 at 03:06 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_vindbaarin`
--

-- --------------------------------------------------------

--
-- Table structure for table `medewerker`
--

CREATE TABLE `medewerker` (
  `mnr` int(11) NOT NULL,
  `voornaam` varchar(45) NOT NULL,
  `achternaam` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `functie` int(1) NOT NULL DEFAULT '0',
  `wwhash` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `medewerker`
--

INSERT INTO `medewerker` (`mnr`, `voornaam`, `achternaam`, `email`, `functie`, `wwhash`) VALUES
(1, 'wim', 'palland', 'wimpal@hotmail.com', 2, '$2y$12$xuk8sfC.5XwGHQIyapVEA.lyXVMqjp54Yl.bcAhvic1mXMi2yI4RO'),
(2, 'peter', 'pakkert', 'peter.pakkert@solcon.nl', 2, '$2y$12$p1cx9KTfNJSAz.T0aWYQSuyBnu3D1vM.uFbgTMSK6mJa0JQTr8Zwe'),
(3, 'test', 'account', 'testaccount@email.com', 2, '$2y$12$sPYjSkA8sAW955mOIb8Z3ewg645NLYXRVr7Kj3VqAEhPEQdQ.d29.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `medewerker`
--
ALTER TABLE `medewerker`
  ADD PRIMARY KEY (`mnr`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `medewerker`
--
ALTER TABLE `medewerker`
  MODIFY `mnr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
