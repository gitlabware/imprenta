-- phpMyAdmin SQL Dump
-- version 4.3.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 08, 2015 at 04:59 PM
-- Server version: 5.5.40-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `imprenta`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `telefonos` varchar(35) DEFAULT NULL,
  `direccion` varchar(50) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(75) DEFAULT NULL,
  `role` varchar(25) NOT NULL,
  `edificio_id` int(11) DEFAULT NULL,
  `created` date NOT NULL,
  `modified` date NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nombre`, `telefonos`, `direccion`, `email`, `username`, `password`, `role`, `edificio_id`, `created`, `modified`) VALUES
(1, 'Eynar David Torrez Torrez', NULL, NULL, NULL, 'david', '75243a8479c48805b079c6d16b1e301de17c4dfc', 'Super Administrador', NULL, '2014-12-08', '2014-12-17'),
(3, 'Administrador', NULL, NULL, NULL, 'admin', 'dd18e28f27bc943617ef9366036a0d', 'Super Administrador', 4, '2014-12-08', '2014-12-16'),
(9, 'Handel', '556', '', '', NULL, NULL, 'Propietario', NULL, '2014-12-13', '2014-12-13'),
(8, 'Pablo Marmol', '555555', '', '', NULL, NULL, 'Propietario', NULL, '2014-12-13', '2014-12-13'),
(10, 'Osmar', '222222', '', '', NULL, NULL, 'Propietario', NULL, '2014-12-13', '2014-12-13'),
(11, 'dddd', '431212', '', '', NULL, NULL, 'Propietario', NULL, '2014-12-13', '2014-12-13'),
(12, 'Pedro', '5222525', '', '', NULL, NULL, 'Propietario', NULL, '2014-12-13', '2014-12-13'),
(13, 'Miguwss', '11551', '', '', NULL, NULL, 'Propietario', NULL, '2014-12-13', '2014-12-13'),
(14, 'David Fernandez', '255565 -555555', '', '', NULL, NULL, 'Propietario', NULL, '2014-12-13', '2014-12-13'),
(15, 'Angelo', '55556324', '', '', NULL, NULL, 'Propietario', NULL, '2014-12-13', '2014-12-13'),
(16, 'Alberto rios', '22222222', '', '', NULL, NULL, 'Propietario', NULL, '2014-12-14', '2014-12-14'),
(17, 'Juansito Pinolis', '22222663', '', '', NULL, NULL, 'Propietario', NULL, '2014-12-15', '2014-12-15'),
(18, 'sssss', '432423432', '', '', NULL, NULL, 'Propietario', NULL, '2014-12-15', '2014-12-15'),
(19, 'NJKDASNDJKJ', '584656', '', '', NULL, NULL, 'Propietario', NULL, '2014-12-15', '2014-12-15'),
(20, 'Jose Lopez', '6632554', '52', '', NULL, NULL, 'Inquilino', NULL, '2014-12-15', '2014-12-15'),
(21, 'Ernesto Cabrera', '704562145', 'xxxxx', 'ssss@nose.com', NULL, NULL, 'Inquilino', NULL, '2014-12-15', '2014-12-15'),
(22, 'hrgf', '543643', '', '', NULL, NULL, 'Inquilino', NULL, '2014-12-15', '2014-12-15'),
(23, 'hernan', '21654165', 'dsadsa', 'fazdsdsa', 'herly', '75243a8479c48805b079c6d16b1e301de17c4dfc', 'Administrador', 4, '2014-12-16', '2014-12-16'),
(24, 'csdsad', 'dsadsad', 'dasdasd', 'dasdasd', 'root', '99949034e9d64e82bf4c2e24a49f693c500879ff', 'Administrador', NULL, '2014-12-16', '2014-12-16'),
(25, 'ddasdsa', 'trdg', 'fgrdfht', 'ffdsfds', NULL, NULL, 'Propietario', NULL, '2014-12-16', '2014-12-16'),
(26, 'Alan', '85654452', 'xxxxxxxxx', 'asnhdjasnj', 'alan', '75243a8479c48805b079c6d16b1e301de17c4dfc', 'Administrador', 5, '2014-12-17', '2014-12-17'),
(27, 'cristiamherrera', NULL, NULL, NULL, 'cristiamherrera', '75243a8479c48805b079c6d16b1e301de17c4dfc', 'Super Administrador', NULL, '2015-01-02', '2015-01-02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
