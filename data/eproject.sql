-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2016 at 02:17 AM
-- Server version: 5.5.39
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `eproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `borrower`
--

CREATE TABLE IF NOT EXISTS `borrower` (
`borrow_id` int(11) NOT NULL,
  `borrow_name` varchar(50) DEFAULT NULL,
  `telephone` int(11) NOT NULL,
  `supervisor` varchar(50) DEFAULT NULL,
  `class` varchar(12) DEFAULT NULL,
  `session` varchar(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `borrower`
--

INSERT INTO `borrower` (`borrow_id`, `borrow_name`, `telephone`, `supervisor`, `class`, `session`) VALUES
(1, 'Kassim Selamat', 196655444, 'Lukman Bin Omar', 'DNS5S1', 'June 2015'),
(2, 'Siti Zubaidah', 126655444, 'Johari Ahmad Bin Ghazali', 'DNS5S2', 'Dis 2015'),
(3, 'None', 0, 'None', '0', '0'),

-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--

CREATE TABLE IF NOT EXISTS `equipment` (
`equipment_id` int(11) NOT NULL,
  `item` varchar(50) DEFAULT NULL,
  `price` int(11) NOT NULL,
  `equipment` varchar(12) DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL,
  `borrower` varchar(50) DEFAULT NULL,
  `dateBorrow` date DEFAULT NULL,
  `returner` varchar(50) DEFAULT NULL,
  `dateReturn` date DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=69 ;

--
-- Dumping data for table `equipment`
--

INSERT INTO `equipment` (`equipment_id`, `item`, `price`, `equipment`, `status`, `borrower`, `dateBorrow`, `returner`, `dateReturn`) VALUES
(1, 'muscle sensor', 265, '2015JTMK1001', 'Not Available', 'Syazwi azhar', '2016-01-04', 'None', '2016-02-29'),
(2, 'muscle sensor', 265, '2015JTMK1002', 'Available', 'None', '2016-02-01', 'None', '2016-02-01'),
(3, 'muscle sensor', 265, '2015JTMK1003', 'Available', 'None', NULL, 'None', NULL),
(4, 'sensor pad', 50, '2015JTMK1004', 'Available', 'None', NULL, 'None', NULL),
(5, 'sensor pad', 50, '2015JTMK1005', 'Available', 'None', NULL, 'None', NULL),
(6, 'sensor pad', 50, '2015JTMK1006', 'Available', 'None', NULL, 'None', NULL),
(7, 'arduino uno', 300, '2015JTMK1007', 'Available', 'None', NULL, 'None', NULL),
(8, 'arduino uno', 300, '2015JTMK1008', 'Available', 'None', NULL, 'None', NULL),
(9, 'arduino uno', 300, '2015JTMK1009', 'Available', 'None', NULL, 'None', NULL),
(10, 'arduino uno', 300, '2015JTMK1010', 'Available', 'None', NULL, 'None', NULL),
(11, 'arduino uno', 300, '2015JTMK1011', 'Available', 'None', NULL, 'None', NULL),
(12, 'arduino ethernet shield', 160, '2015JTMK1012', 'Available', 'None', NULL, 'None', NULL),
(13, 'arduino ethernet shield', 160, '2015JTMK1013', 'Available', 'None', NULL, 'None', NULL),
(14, 'arduino ethernet shield', 160, '2015JTMK1014', 'Available', 'None', NULL, 'None', NULL),
(15, 'arduino ethernet shield', 160, '2015JTMK1015', 'Available', 'None', NULL, 'None', NULL),
(16, 'arduino ethernet shield', 160, '2015JTMK1016', 'Available', 'None', NULL, 'None', NULL),
(17, 'cytron gps shield', 160, '2015JTMK1017', 'Available', 'None', NULL, 'None', NULL),
(18, 'cytron gps shield', 160, '2015JTMK1018', 'Available', 'None', NULL, 'None', NULL),
(19, 'cytron gps shield', 160, '2015JTMK1019', 'Available', 'None', NULL, 'None', NULL),
(20, 'solar cell 2 watt', 40, '2015JTMK1020', 'Available', 'None', NULL, 'None', NULL),
(21, 'solar cell 2 watt', 40, '2015JTMK1021', 'Available', 'None', NULL, 'None', NULL),
(22, 'solar cell 2 watt', 40, '2015JTMK1022', 'Available', 'None', NULL, 'None', NULL),
(23, 'solar cell 2 watt', 40, '2015JTMK1023', 'Available', 'None', NULL, 'None', NULL),
(24, 'solar cell 2 watt', 40, '2015JTMK1024', 'Available', 'None', NULL, 'None', NULL),
(25, 'nfc rfid controller shield', 180, '2015JTMK1025', 'Available', 'None', NULL, 'None', NULL),
(26, 'nfc rfid controller shield', 180, '2015JTMK1026', 'Available', 'None', NULL, 'None', NULL),
(27, 'nfc rfid controller shield', 180, '2015JTMK1027', 'Available', 'None', NULL, 'None', NULL),
(28, 'nfc rfid controller shield', 180, '2015JTMK1028', 'Available', 'None', NULL, 'None', NULL),
(29, 'nfc rfid controller shield', 180, '2015JTMK1029', 'Available', 'None', NULL, 'None', NULL),
(30, 'raspberry pi 2', 300, '2015JTMK1030', 'Available', 'None', NULL, 'None', NULL),
(31, 'raspberry pi 2', 300, '2015JTMK1031', 'Available', 'None', NULL, 'None', NULL),
(32, 'raspberry pi 2', 300, '2015JTMK1032', 'Available', 'None', NULL, 'None', NULL),
(33, 'raspberry pi 2', 300, '2015JTMK1033', 'Available', 'None', NULL, 'None', NULL),
(34, 'parrot mini drone', 410, '2015JTMK1034', 'Available', 'None', NULL, 'None', NULL),
(35, 'parrot mini drone', 410, '2015JTMK1035', 'Available', 'None', NULL, 'None', NULL),
(36, 'parrot mini drone', 410, '2015JTMK1036', 'Available', 'None', NULL, 'None', NULL),
(37, 'parrot mini drone', 410, '2015JTMK1037', 'Available', 'None', NULL, 'None', NULL),
(38, 'parrot mini drone', 410, '2015JTMK1038', 'Available', 'None', NULL, 'None', NULL),
(39, 'relay 4 channel', 60, '2015JTMK1039', 'Available', 'None', NULL, 'None', NULL),
(40, 'relay 4 channel', 60, '2015JTMK1040', 'Available', 'None', NULL, 'None', NULL),
(41, 'relay 4 channel', 60, '2015JTMK1041', 'Available', 'None', NULL, 'None', NULL),
(42, 'relay 4 channel', 60, '2015JTMK1042', 'Available', 'None', NULL, 'None', NULL),
(43, 'relay 4 channel', 60, '2015JTMK1043', 'Available', 'None', NULL, 'None', NULL),
(44, 'jetson nvidia', 800, '2015JTMK1044', 'Available', 'None', NULL, 'None', NULL),
(45, 'jetson nvidia', 800, '2015JTMK1045', 'Available', 'None', NULL, 'None', NULL),
(46, 'jetson nvidia', 800, '2015JTMK1046', 'Available', 'None', NULL, 'None', NULL),
(47, 'jetson nvidia', 800, '2015JTMK1047', 'Available', 'None', NULL, 'None', NULL),
(48, 'jetson nvidia', 800, '2015JTMK1048', 'Available', 'None', NULL, 'None', NULL),
(49, 'lipo cell ', 50, '2015JTMK1049', 'Available', 'None', NULL, 'None', NULL),
(50, 'lipo cell ', 50, '2015JTMK1050', 'Available', 'None', NULL, 'None', NULL),
(51, 'lipo cell ', 50, '2015JTMK1051', 'Available', 'None', NULL, 'None', NULL),
(52, 'lipo cell ', 50, '2015JTMK1052', 'Available', 'None', NULL, 'None', NULL),
(53, 'lipo cell ', 50, '2015JTMK1053', 'Available', 'None', NULL, 'None', NULL),
(54, 'neurosky brainwave', 600, '2015JTMK1054', 'Available', 'None', NULL, 'None', NULL),
(55, 'neurosky brainwave', 600, '2015JTMK1055', 'Available', 'None', NULL, 'None', NULL),
(56, 'neurosky brainwave', 600, '2015JTMK1056', 'Available', 'None', NULL, 'None', NULL),
(57, 'bluetooth modem', 148, '2015JTMK1057', 'Available', 'None', NULL, 'None', NULL),
(58, 'bluetooth modem', 148, '2015JTMK1058', 'Available', 'None', NULL, 'None', NULL),
(59, 'bluetooth modem', 148, '2015JTMK1059', 'Available', 'None', NULL, 'None', NULL),
(60, 'camera for raspberry pi', 85, '2015JTMK1060', 'Available', 'None', NULL, 'None', NULL),
(61, 'camera for raspberry pi', 85, '2015JTMK1061', 'Available', 'None', NULL, 'None', NULL),
(62, 'camera for raspberry pi', 85, '2015JTMK1062', 'Available', 'None', NULL, 'None', NULL),
(63, 'kinect for windows', 1500, '2015JTMK1063', 'Available', 'None', NULL, 'None', NULL),
(64, 'kinect for windows', 1500, '2015JTMK1064', 'Available', 'None', NULL, 'None', NULL),
(65, 'kinect for windows', 1500, '2015JTMK1065', 'Available', 'None', NULL, 'None', NULL),
(66, 'samsung gear VR', 1500, '2015JTMK1066', 'Available', 'None', NULL, 'None', NULL),
(67, 'samsung gear VR', 1500, '2015JTMK1067', 'Available', 'None', NULL, 'None', NULL),
(68, 'samsung gear VR', 1500, '2015JTMK1068', 'Available', 'None', NULL, 'None', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE IF NOT EXISTS `item` (
`item_id` int(11) NOT NULL,
  `item_name` varchar(50) DEFAULT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `item_name`, `price`) VALUES
(1, 'muscle sensor', 265),
(2, 'sensor pad', 50),
(3, 'arduino uno', 300),
(4, 'arduino ethernet shield', 160),
(5, 'cytron gps shield', 160),
(6, 'solar cell 2 watt', 40),
(7, 'nfc rfid controller shield', 180),
(8, 'raspberry pi 2', 300),
(9, 'parrot mini drone', 410),
(10, 'relay 4 channel', 60),
(11, 'jetson nvidia', 800),
(12, 'lipo cell ', 50),
(13, 'neurosky brainwave', 600),
(14, 'bluetooth modem', 148),
(15, 'camera for raspberry pi', 85),
(16, 'kinect for windows', 1500),
(17, 'samsung gear VR', 1500);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
`user_id` int(11) NOT NULL,
  `user` varchar(12) DEFAULT NULL,
  `pass` varchar(12) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`user_id`, `user`, `pass`) VALUES
(1, 'johirwan', 'johirwan123'),
(2, 'haziq', 'haziq123');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE IF NOT EXISTS `status` (
`status_id` int(11) NOT NULL,
  `status_name` varchar(30) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`status_id`, `status_name`) VALUES
(1, 'Available'),
(4, 'KIV'),
(3, 'Missing'),
(2, 'Not Available');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `borrower`
--
ALTER TABLE `borrower`
 ADD PRIMARY KEY (`borrow_id`), ADD UNIQUE KEY `borrow_name` (`borrow_name`), ADD KEY `telephone_index` (`telephone`), ADD KEY `semester_index` (`session`);

--
-- Indexes for table `equipment`
--
ALTER TABLE `equipment`
 ADD PRIMARY KEY (`equipment_id`), ADD UNIQUE KEY `equipment` (`equipment`), ADD KEY `price_index` (`price`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
 ADD PRIMARY KEY (`item_id`), ADD UNIQUE KEY `item_name` (`item_name`), ADD KEY `price_index` (`price`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
 ADD PRIMARY KEY (`user_id`), ADD UNIQUE KEY `user` (`user`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
 ADD PRIMARY KEY (`status_id`), ADD UNIQUE KEY `status_name` (`status_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `borrower`
--
ALTER TABLE `borrower`
MODIFY `borrow_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `equipment`
--
ALTER TABLE `equipment`
MODIFY `equipment_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=69;
--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
