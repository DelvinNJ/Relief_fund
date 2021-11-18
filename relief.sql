-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2021 at 06:09 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `relief`
--

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE `application` (
  `id` int(11) NOT NULL,
  `reg_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `subcategory` varchar(25) NOT NULL,
  `amount` bigint(20) NOT NULL,
  `bal_amt` bigint(20) NOT NULL,
  `description` text NOT NULL,
  `datehappened` date NOT NULL,
  `incomecertificate` varchar(50) NOT NULL,
  `ration` varchar(50) NOT NULL,
  `image` varchar(75) NOT NULL,
  `doc2` varchar(50) NOT NULL,
  `doc3` varchar(50) NOT NULL,
  `selfdeclaration` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`id`, `reg_id`, `cat_id`, `subcategory`, `amount`, `bal_amt`, `description`, `datehappened`, `incomecertificate`, `ration`, `image`, `doc2`, `doc3`, `selfdeclaration`, `status`, `date`) VALUES
(11, 4, 9, 'Kerala Flood 2018', 1000000, 1170000, 'Kerala Flood 2018. Kindly request to help.', '2018-08-16', 'Krishnakumar.pdf', 'Krishnakumar.pdf', 'na28-keralapupils.jpg', 'Krishnakumar.pdf', 'Krishnakumar.pdf', 'Krishnakumar.pdf', 3, '2021-03-08'),
(12, 4, 9, 'Kerala Flood 2018', 500000, 5000, 'Kerala Flood 2018. Kindly request to help.', '2018-08-16', 'Krishnakumar.pdf', 'Krishnakumar.pdf', 'na28-keralapupils.jpg', 'Krishnakumar.pdf', 'Krishnakumar.pdf', 'Krishnakumar.pdf', 0, '2021-03-08'),
(13, 7, 11, 'bike', 10000, 1000000, 'lfl;dfk;kfdf', '2021-03-03', 'na28-keralapupils.jpg', '0.83988300_1534416639_whatsapp-image-2018-08-16-at', 'KERALA-FLOOD-2018.jpg', 'na28-keralapupils.jpg', '', 'na28-keralapupils.jpg', 3, '2021-03-09');

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `id` int(11) NOT NULL,
  `reg_id` int(11) NOT NULL,
  `bank` varchar(25) NOT NULL,
  `accnum` int(20) NOT NULL,
  `ifsc` varchar(20) NOT NULL,
  `passbook` varchar(50) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`id`, `reg_id`, `bank`, `accnum`, `ifsc`, `passbook`, `date`) VALUES
(2, 4, 'SBI', 123, 'FDRL', 'DataTables  Gentelella.pdf', '2021-03-08'),
(3, 7, 'SBI', 1234567, '123456', 'KERALA-FLOOD-2018.jpg', '2021-03-09'),
(4, 8, 'SBJ', 123, 'fd', 'KERALA-FLOOD-2018.jpg', '2021-04-29');

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `emgcategory`
--

CREATE TABLE `emgcategory` (
  `id` int(11) NOT NULL,
  `category` varchar(20) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `emgcategory`
--

INSERT INTO `emgcategory` (`id`, `category`, `date`) VALUES
(9, 'Flood', '2021-03-08 08:05:16'),
(10, 'Hurricane', '2021-03-08 09:38:35'),
(11, 'Accident', '2021-03-08 09:38:40'),
(12, 'Medical', '2021-03-08 09:38:57'),
(13, 'Earthquake ', '2021-03-08 09:39:29');

-- --------------------------------------------------------

--
-- Table structure for table `emgsubcategory`
--

CREATE TABLE `emgsubcategory` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory` varchar(20) NOT NULL,
  `description` varchar(250) DEFAULT NULL,
  `amount` int(10) DEFAULT NULL,
  `image1` varchar(100) NOT NULL,
  `image2` varchar(50) DEFAULT NULL,
  `image3` varchar(50) DEFAULT NULL,
  `image4` varchar(50) DEFAULT NULL,
  `video` varchar(50) DEFAULT NULL,
  `status` varchar(1) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `emgsubcategory`
--

INSERT INTO `emgsubcategory` (`id`, `category_id`, `subcategory`, `description`, `amount`, `image1`, `image2`, `image3`, `image4`, `video`, `status`, `date`) VALUES
(1, 9, 'Kerala Flood 2018', 'Immediate Help Please ', 2000000, '0.83988300_1534416639_whatsapp-image-2018-08-16-at-4.jpeg', NULL, NULL, NULL, NULL, '', '2018-08-15');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `bill_no` varchar(10) NOT NULL,
  `application_id` int(11) NOT NULL,
  `donor_id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `amount` int(11) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `bill_no`, `application_id`, `donor_id`, `name`, `amount`, `date`) VALUES
(1, 'DRF101', 12, 3, 'PRANAV P S', 5000, '2020-03-08'),
(3, 'DRF103', 11, 5, 'JOHN JOSE', 50000, '2021-03-08'),
(5, 'DRF104', 11, 6, 'Reena', 120000, '2021-03-09'),
(6, 'DRF105', 13, 6, 'JOHN JOSE', 1000000, '2021-03-09'),
(7, 'DRF106', 11, 6, 'JOHN JOSE', 1000000, '2021-03-09');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id` int(11) NOT NULL,
  `register_id` int(11) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(5) NOT NULL,
  `address` text NOT NULL,
  `pincode` varchar(6) NOT NULL,
  `village` varchar(25) NOT NULL,
  `district` varchar(20) NOT NULL,
  `occupation` varchar(25) NOT NULL,
  `income` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(11) NOT NULL,
  `fname` varchar(15) NOT NULL,
  `lname` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `aadhaar` varchar(14) NOT NULL,
  `pancard` varchar(10) NOT NULL,
  `status` int(11) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `fname`, `lname`, `email`, `password`, `phone`, `aadhaar`, `pancard`, `status`, `date`) VALUES
(1, 'DELVIN', 'N J', 'delvinnj111@gmail.com', '61cc0e405f4b518d264c089ac8b642ef', '8547865213', '894525418952', 'CCRJP4548J', 2, '2021-03-08'),
(3, 'Pranav ', 'P S', 'pranav@gmail.com', '61cc0e405f4b518d264c089ac8b642ef', '9495355214', '999123199999', 'CCRJP4548T', 1, '2021-03-08'),
(4, 'Anoop ', 'Charly', 'anoopcharly98@gmail.com', '61cc0e405f4b518d264c089ac8b642ef', '8547865214', '108989784546', 'CCGJP4548J', 0, '2021-03-08'),
(5, 'JOHN', 'JOSEPH', 'john@gmail.com', '61cc0e405f4b518d264c089ac8b642ef', '8547865211', '894786521544', 'CCRTP4548J', 1, '2021-03-08'),
(6, 'reena', 'cherian', 'reena12@gmail.com', '61cc0e405f4b518d264c089ac8b642ef', '0423123456', '123345642345', 'CCGJP4508J', 1, '2021-03-09'),
(7, 'kiran', 'jose', 'kiran@gmail.com', 'e6c0e42a57c9429e12a36b94b8d9d1fe', '1234567891', '333333335333', 'CCRKP4948J', 0, '2021-03-09'),
(8, 'DELVIN', 'N J', 'delvinnj1111@gmail.com', '61cc0e405f4b518d264c089ac8b642ef', '8547865212', '454545455545', 'ACGJP4548I', 0, '2021-04-29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`id`),
  ADD KEY `r_id` (`reg_id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reg_id` (`reg_id`);

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emgcategory`
--
ALTER TABLE `emgcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emgsubcategory`
--
ALTER TABLE `emgsubcategory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category` (`category_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `application_id` (`application_id`),
  ADD KEY `donor_id` (`donor_id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `app_id` (`register_id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `application`
--
ALTER TABLE `application`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `district`
--
ALTER TABLE `district`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `emgcategory`
--
ALTER TABLE `emgcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `emgsubcategory`
--
ALTER TABLE `emgsubcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `application`
--
ALTER TABLE `application`
  ADD CONSTRAINT `cat_id` FOREIGN KEY (`cat_id`) REFERENCES `emgcategory` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `r_id` FOREIGN KEY (`reg_id`) REFERENCES `registration` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bank`
--
ALTER TABLE `bank`
  ADD CONSTRAINT `reg_id` FOREIGN KEY (`reg_id`) REFERENCES `registration` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `emgsubcategory`
--
ALTER TABLE `emgsubcategory`
  ADD CONSTRAINT `category` FOREIGN KEY (`category_id`) REFERENCES `emgcategory` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `application_id` FOREIGN KEY (`application_id`) REFERENCES `application` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `donor_id` FOREIGN KEY (`donor_id`) REFERENCES `registration` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `register_id ` FOREIGN KEY (`register_id`) REFERENCES `registration` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
