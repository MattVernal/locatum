-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2016 at 09:35 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `locatum`
--

-- --------------------------------------------------------

--
-- Table structure for table `clinic`
--

CREATE TABLE `clinic` (
  `id` int(11) NOT NULL,
  `contactName` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `clinicName` varchar(50) NOT NULL,
  `userId` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clinic`
--

INSERT INTO `clinic` (`id`, `contactName`, `address`, `clinicName`, `userId`) VALUES
(1, 'Matt Vernal', '123 Fake st', 'This isnt a real clinic', 1),
(2, 'Matt Vernal', '123 Fake st', 'This isnt a real clinic', 5);

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL,
  `startDate` varchar(20) NOT NULL,
  `endDate` varchar(20) NOT NULL,
  `dateCreated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `jobTitle` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `hourlyRate` int(11) NOT NULL,
  `clinicId` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `startDate`, `endDate`, `dateCreated`, `jobTitle`, `description`, `hourlyRate`, `clinicId`) VALUES
(4, '2016-12-30', '2016-12-31', '2016-11-23 15:58:17', 'Doctor', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam vitae augue diam. Nam imperdiet tellus eget nunc porta, vitae commodo elit blandit. Aliquam id nisi eget ligula laoreet pharetra. Praesent sollicitudin mauris eget urna euismod, in imperdiet lectus varius. Nulla blandit rhoncus massa, eget feugiat nisl sagittis in. Maecenas fringilla orci vel felis lobortis, sed scelerisque enim gravida. Donec sodales fringilla dolor, quis luctus elit maximus non. Vestibulum fringilla, diam a sodales mollis, nibh est vehicula nisi, nec ultricies velit ex a diam. Morbi in est nibh. In ipsum dolor, semper a felis eget, tristique dignissim ipsum.', 45, 2),
(6, '2155-04-02', '1355-03-22', '2016-11-24 15:15:34', 'hue', 'Hue Hue Hue', 40, 1),
(7, '30/03/2016', '30/03/2016', '2016-11-28 18:48:16', 'Doctor', 'sghjsr', 40, 1),
(8, '30/03/2016', '30/03/2016', '2016-11-29 15:54:37', 'Optometrist', 'Hue Hue Hue', 42, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `contactNumber` int(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `firstName`, `lastName`, `contactNumber`, `password`, `role`) VALUES
(1, 'matthew.vernal@gmail.com', 'Matt', 'Vernal', 273831491, 'weka4332', 'admin'),
(2, 'someone@example.com', 'Joe', 'Bloggs', 123456, 'password', 'locum'),
(5, 'someone1@example.com', 'Jane', 'Doe', 123456, 'password', 'clinic');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clinic`
--
ALTER TABLE `clinic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
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
-- AUTO_INCREMENT for table `clinic`
--
ALTER TABLE `clinic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
