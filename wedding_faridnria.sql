-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2015 at 07:49 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `atnicco_faridnria`
--

-- --------------------------------------------------------

--
-- Table structure for table `fr_invitations`
--

CREATE TABLE IF NOT EXISTS `fr_invitations` (
  `invitation_url_query` varchar(40) NOT NULL,
  `invitation_category` varchar(40) NOT NULL,
  `invitation_name` varchar(40) NOT NULL,
  `invitation_written_name` varchar(20) NOT NULL,
  `invitation_place` varchar(40) NOT NULL,
  `invitation_confirmation` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fr_invitations`
--

INSERT INTO `fr_invitations` (`invitation_url_query`, `invitation_category`, `invitation_name`, `invitation_written_name`, `invitation_place`, `invitation_confirmation`) VALUES
('ahmad_ataka', 'Atnic', 'Ahmad Ataka', 'Ataka', 'Yogyakarta', 0),
('aldrian_rahman', 'Atnic', 'Aldrian Rahman', 'Aldrian', 'Tempat', 0),
('fadhil_ramadhan_santoso', 'Atnic', 'Fadhil Ramadhan Santoso', 'Fadhil Ramadhan', 'Aceh', 0),
('gatya_dhana', 'Atnic', 'Gatya Dhana', 'Gatya', 'Karawang', 0),
('guntur_prasetya', 'Atnic', 'Guntur Prasetya', 'Guntur', 'Tempat', 0),
('hanry_ario', 'Atnic', 'Hanry Ario P.', 'Hanry', 'Yogyakarta', 0),
('hasan_wiratama', 'Atnic', 'Hasan Wiratama', 'Hasan', 'Yogyakarta', 0),
('imaddudin_a_majid', 'Atnic', 'Imaddudin A. Majid', 'Imad', 'Yogyakarta', 0),
('muhammad_faris', 'Atnic', 'Muhammad Faris', 'Jimmy', 'Belanda', 0),
('nafier_rahmantha', 'EEIC 2009', 'Nafier Rahmantha', 'Nafier', 'Belitung', 0),
('novia_wulandari', 'JTETI 2009', 'Novia Wulandari', 'Novia', 'Balikpapan', 0),
('reynalfie_budi_r', 'Atnic', 'Reynalfie Budi Raharjo', 'Reynalfie', 'Yogyakarta', 0),
('ridwan_wicaksono', 'Atnic', 'Ridwan Wicaksana', 'Ridwan', 'Yogyakarta', 0),
('syauqy_nurul_aziz', 'Atnic', 'Syauqy Nurul Aziz', 'Syauqy', 'Yogyakarta', 0);

-- --------------------------------------------------------

--
-- Table structure for table `fr_messages`
--

CREATE TABLE IF NOT EXISTS `fr_messages` (
  `message_invitation_url_query` varchar(40) NOT NULL,
  `message_content` longtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fr_invitations`
--
ALTER TABLE `fr_invitations`
 ADD PRIMARY KEY (`invitation_url_query`), ADD UNIQUE KEY `invitation_url` (`invitation_url_query`);

--
-- Indexes for table `fr_messages`
--
ALTER TABLE `fr_messages`
 ADD PRIMARY KEY (`message_invitation_url_query`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `fr_messages`
--
ALTER TABLE `fr_messages`
ADD CONSTRAINT `message_invitation_url_query` FOREIGN KEY (`message_invitation_url_query`) REFERENCES `fr_invitations` (`invitation_url_query`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
