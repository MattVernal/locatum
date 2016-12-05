-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2016 at 01:41 AM
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
CREATE DATABASE IF NOT EXISTS `locatum` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `locatum`;

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
(1, 'Admin Adminson', '123 Fake st', 'Christchurch Hospital', 1),
(2, 'Clinic Clinicson', '123 Fake st', 'Ricarton Clinic', 5);

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
(7, '30/03/2016', '30/03/2016', '2016-11-28 18:48:16', 'Doctor', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc in nisi sit amet augue gravida iaculis. Ut ut convallis mi, ac pellentesque purus. Sed quis tellus a metus posuere tincidunt et sed nulla. Sed sodales nibh at odio scelerisque ultrices. Nam a lacinia purus, eu vestibulum ipsum. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Phasellus pretium, orci at feugiat hendrerit, turpis magna interdum arcu, quis consectetur orci nulla ac eros. Curabitur sit amet ex est. Nullam eget libero ex. Aenean dapibus viverra mattis. Praesent eget commodo tellus, sit amet volutpat metus.\r\n\r\nEtiam viverra dignissim sollicitudin. Aliquam eget odio sem. Donec quam elit, porta in felis porta, auctor blandit lectus. Donec quis iaculis enim, a aliquam lacus. Integer quis lorem ut sem ultrices finibus. Mauris iaculis urna vitae tellus dignissim egestas. Duis tempus enim cursus, faucibus nibh ullamcorper, tristique nisi. Nullam at nulla nisl. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.\r\n\r\nUt id porta lorem. Fusce quis egestas nisi. Aenean ac ipsum et ipsum facilisis volutpat non a ligula. Nulla pretium augue nec ligula molestie, et tristique leo mattis. In ipsum purus, placerat eu pulvinar mattis, luctus at massa. In volutpat sem a sem ultrices mollis. Aenean lorem dolor, suscipit id velit id, imperdiet vulputate eros. Cras mollis a velit ac venenatis. Praesent tellus urna, ornare quis aliquam ac, ultricies non eros. Vestibulum porta erat sit amet mauris fermentum bibendum. Nunc ut nibh elit. Praesent vitae sapien neque.', 40, 1),
(8, '30/03/2016', '30/03/2016', '2016-11-29 15:54:37', 'Optometrist', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc in nisi sit amet augue gravida iaculis. Ut ut convallis mi, ac pellentesque purus. Sed quis tellus a metus posuere tincidunt et sed nulla. Sed sodales nibh at odio scelerisque ultrices. Nam a lacinia purus, eu vestibulum ipsum. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Phasellus pretium, orci at feugiat hendrerit, turpis magna interdum arcu, quis consectetur orci nulla ac eros. Curabitur sit amet ex est. Nullam eget libero ex. Aenean dapibus viverra mattis. Praesent eget commodo tellus, sit amet volutpat metus.\r\n\r\nEtiam viverra dignissim sollicitudin. Aliquam eget odio sem. Donec quam elit, porta in felis porta, auctor blandit lectus. Donec quis iaculis enim, a aliquam lacus. Integer quis lorem ut sem ultrices finibus. Mauris iaculis urna vitae tellus dignissim egestas. Duis tempus enim cursus, faucibus nibh ullamcorper, tristique nisi. Nullam at nulla nisl. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.\r\n\r\nUt id porta lorem. Fusce quis egestas nisi. Aenean ac ipsum et ipsum facilisis volutpat non a ligula. Nulla pretium augue nec ligula molestie, et tristique leo mattis. In ipsum purus, placerat eu pulvinar mattis, luctus at massa. In volutpat sem a sem ultrices mollis. Aenean lorem dolor, suscipit id velit id, imperdiet vulputate eros. Cras mollis a velit ac venenatis. Praesent tellus urna, ornare quis aliquam ac, ultricies non eros. Vestibulum porta erat sit amet mauris fermentum bibendum. Nunc ut nibh elit. Praesent vitae sapien neque.', 42, 1),
(9, '30/03/2016', '30/03/2016', '2016-11-30 13:42:14', 'Dentist', '\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Duis quis accumsan augue. Phasellus pellentesque tincidunt nisi, sed mollis arcu dapibus sed. Etiam rutrum eros eu nunc varius pretium. Morbi scelerisque, sapien semper scelerisque auctor, eros leo auctor sapien, et auctor sapien nisi eget eros. Nunc eget molestie metus. Nulla facilisi. Vestibulum at metus molestie augue vulputate ultricies. Maecenas eget neque faucibus, hendrerit neque nec, fringilla nisl. Duis feugiat fermentum ipsum ut mollis. Nunc pulvinar lobortis ipsum non elementum. Fusce pellentesque odio eu metus dictum laoreet. Quisque et porttitor mi. Maecenas faucibus id eros in egestas.', 50, 2),
(11, '30/03/2016', '30/03/2016', '2016-12-01 15:48:52', 'Chiropractor', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam venenatis odio eu turpis ultricies feugiat. Nunc consectetur lacus vitae scelerisque euismod. Nunc blandit hendrerit tortor, sollicitudin imperdiet purus cursus quis. Praesent non sagittis quam. Ut dapibus bibendum metus eget congue. Vestibulum non felis sed metus maximus accumsan. Nulla a varius nisl, non lacinia arcu. Nullam a blandit odio, sollicitudin convallis tellus. Sed rhoncus, metus et semper egestas, tortor diam mollis velit, vel blandit turpis est nec odio. Pellentesque in erat a nisi auctor imperdiet eu in magna.\r\n\r\nMorbi dictum ullamcorper auctor. Cras sed egestas nulla. Fusce mattis leo mi, a rutrum nibh dictum ac. Aliquam urna velit, vestibulum at tempor at, facilisis a urna. Fusce lobortis suscipit mauris et congue. Vivamus dapibus lectus eget nisl mattis convallis. Aenean vel leo in felis malesuada mollis.\r\n\r\nCurabitur laoreet et ligula et lobortis. Vestibulum et tincidunt risus. Ut eget mattis lorem. Cras pharetra ligula purus, sit amet aliquam est rutrum non. Nunc in tristique mauris. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris iaculis mauris id velit aliquet semper. Nullam in diam nec lorem porttitor bibendum.\r\n\r\nPhasellus dui enim, venenatis a eros quis, egestas molestie odio. Phasellus mattis pharetra neque quis euismod. Praesent ultrices faucibus egestas. Suspendisse eget feugiat erat. Sed accumsan, leo eget posuere maximus, lectus lacus feugiat massa, at accumsan urna velit nec lorem. Donec vel tellus vitae ligula malesuada rutrum. Cras vulputate pulvinar ipsum iaculis placerat. Integer in neque eget nisi pretium semper non posuere ligula. Donec auctor velit in sapien interdum, vitae bibendum nulla hendrerit. In vitae malesuada nisi. Duis molestie dictum dictum.\r\n\r\nAliquam imperdiet diam at tortor blandit pretium. Quisque vulputate fringilla interdum. Suspendisse sit amet tortor elit. Suspendisse potenti. Praesent sed auctor risus, eu dictum metus. Nunc porttitor ex sit amet vehicula interdum. Curabitur auctor vel orci ut pellentesque. Cras bibendum vehicula eleifend. Mauris euismod faucibus ipsum, finibus egestas nisl pharetra non. Donec viverra metus ut erat venenatis vulputate. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.', 50, 2);

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
(1, 'admin@email.com', 'Admin', 'Adminson', 123456, 'password', 'admin'),
(2, 'someone@example.com', 'Joe', 'Bloggs', 123456, 'password', 'locum'),
(5, 'someone1@example.com', 'Jane', 'Doe', 123456, 'password', 'clinic'),
(36, 'someone2@example.com', 'Firstname', 'LAstname', 123456, 'guest', 'locum');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
