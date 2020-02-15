-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2017 at 02:29 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lnq`
--

-- --------------------------------------------------------

--
-- Table structure for table `reg_details`
--

CREATE TABLE `reg_details` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(40) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_reg` datetime NOT NULL,
  `profile_picture` varchar(200) DEFAULT NULL,
  `status` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reg_details`
--

INSERT INTO `reg_details` (`id`, `name`, `username`, `email`, `phone`, `gender`, `password`, `date_reg`, `profile_picture`, `status`) VALUES
(1, 'David Dawei', 'dawei', 'dimngozichukwu3@gmail.com', '08136587946', 'female', '11111111', '2017-10-18 06:21:45', '', ''),
(3, 'Mary', 'admin', 'chima@you.com', '789', 'male', '$2y$10$WyqZJf382d31Nm.30vkFtumDP3bs1nnLlSETGdLN6oWCWuGMrgqQy', '2017-10-18 10:36:56', '', ''),
(4, 'Mary B Umeh', 'grace', 'dikm@gmail.com', '08033334840', 'male', '$2y$10$1ML.Maid4XHRnDxeHPjE/uq4ZO6aNGL8aKVRed144sp1S.LLAFha.', '2017-10-18 10:47:08', '20150116_183236 (2).jpg', 'Awesomeness Redefined...'),
(5, 'Mary B Umeh', 'user', 'chioma1@umeh.com', '999777', 'female', '$2y$10$xOJWBPjkUpk992Khg3mwLuq3H4eZC3B9ms4Pb00XroaF1jAt/BOEC', '2017-10-19 03:07:36', '', ''),
(6, 'Umeh Chinyere', 'mom', 'mom@outlook.com', '08037249944', 'female', '$2y$10$8ozCQQMAgdj.Kt6b3.e0CeE2LPeUH0ODHQ4bs.EjFK.K/ITQs/Vl6', '2017-10-24 02:19:22', 'IMG_20150101_122303.jpg', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `reg_details`
--
ALTER TABLE `reg_details`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reg_details`
--
ALTER TABLE `reg_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
