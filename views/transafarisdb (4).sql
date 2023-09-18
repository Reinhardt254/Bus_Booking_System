-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2022 at 09:57 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `transafarisdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `aid` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`aid`, `email`, `password`) VALUES
(11, 'admin@gmail.com', '12345678');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `bkid` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `dateBooked` varchar(255) NOT NULL,
  `seatno` varchar(255) NOT NULL,
  `uid` varchar(255) NOT NULL,
  `origin` varchar(255) NOT NULL,
  `destination` varchar(255) NOT NULL,
  `traveled` varchar(255) NOT NULL,
  `bId` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `route` varchar(255) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`bkid`, `email`, `dateBooked`, `seatno`, `uid`, `origin`, `destination`, `traveled`, `bId`, `price`, `route`, `date`) VALUES
(28, 'adams@gmail.com', '2022-04-05', '27', '1648978548', 'MSA', 'NRB', '', 17, 1000, 'MSA_NRB', '2022-04-10'),
(32, 'robinkipkorir@gmail.com', '2022-04-05', '26', '1648996449', 'MSA', 'NRB', '', 18, 1000, 'MSA_NRB', '2022-04-10'),
(34, 'robinkipkorir8@gmail.com', '2022-04-05', '6', '1648997958', 'MSA', 'NRB', '', 17, 1000, 'MSA_NRB', '2022-04-10'),
(40, 'musaudamaris20@gmail.com', '2022-04-06', '10', '1649053790', 'MSA', 'NRB', '', 17, 1000, 'MSA_NRB', '2022-04-10'),
(41, 'abukbt13@gmail.com', '2022-04-08', '30', '1649233827', 'NRB', 'NKR', '', 19, 500, 'NRB_NKR', '2022-04-10'),
(48, 'oumaonyango642@gmail.com', '2022-04-11', '26', '1649619645', 'MSA', 'KSM', '', 24, 2500, 'MSA_KSM', '2022-04-10'),
(49, 'robinkipkorir8@gmail.com', '2022-04-11', '16', '1649619882', 'NRB', 'NRK', '', 22, 1000, 'NRB_NRK', '2022-04-10'),
(50, 'adamfondo91@gmail.com', '2022-04-14', '19', '1649795442', 'MSA', 'KSM', '', 24, 2500, 'MSA_KSM', '2022-04-12');

-- --------------------------------------------------------

--
-- Table structure for table `buses`
--

CREATE TABLE `buses` (
  `bId` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `des1` varchar(255) NOT NULL,
  `des2` varchar(255) NOT NULL,
  `origin1` varchar(255) NOT NULL,
  `origin2` varchar(255) NOT NULL,
  `route1` varchar(255) NOT NULL,
  `route2` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `capacity` int(11) NOT NULL,
  `available` int(11) NOT NULL,
  `booked` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buses`
--

INSERT INTO `buses` (`bId`, `name`, `des1`, `des2`, `origin1`, `origin2`, `route1`, `route2`, `status`, `capacity`, `available`, `booked`, `price`, `time`) VALUES
(17, 'bus1', 'NRB', 'MSA', 'MSA', 'NRB', 'MSA_NRB', 'NRB_MSA', '', 45, 0, 0, 1400, '22:35'),
(18, 'bus2', 'MSA', 'NRB', 'NRB', 'MSA', 'NRB_MSA', 'MSA_NRB', '', 45, 0, 0, 1000, '22:35'),
(19, 'm10', 'NKR', 'NRB', 'NRB', 'NKR', 'NRB_NKR', 'NKR_NRB', '', 64, 0, 0, 500, '07:00'),
(20, 'KSS', 'LDR', 'ITN', 'ITN', 'LDR', 'ITN_LDR', 'LDR_ITN', '', 40, 0, 0, 1500, '11:16'),
(21, 'KST', 'ITN', 'LDR', 'LDR', 'ITN', 'LDR_ITN', 'ITN_LDR', '', 40, 0, 0, 1700, '11:16'),
(22, 'KSZ', 'NRB', 'NRK', 'NRK', 'NRB', 'NRK_NRB', 'NRB_NRK', '', 40, 0, 0, 1000, '11:16'),
(23, 'KSE', 'NRK', 'NRB', 'NRB', 'NRK', 'NRB_NRK', 'NRK_NRB', '', 40, 0, 0, 1200, '11:16'),
(24, 'KBD', 'MSA', 'KSM', 'KSM', 'MSA', 'KSM_MSA', 'MSA_KSM', '', 55, 0, 0, 2500, '09:20'),
(26, 'HMT 125T', 'KSM', 'NRK', 'NRK', 'KSM', 'NRK_KSM', 'KSM_NRK', '', 55, 0, 0, 2000, '22:39'),
(27, 'MKR!20', 'NKR', 'MSA', 'MSA', 'NKR', 'MSA_NKR', 'NKR_MSA', '', 32, 0, 0, 1800, '19:41');

-- --------------------------------------------------------

--
-- Table structure for table `cancellations`
--

CREATE TABLE `cancellations` (
  `cid` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `seatno` varchar(255) NOT NULL,
  `busid` varchar(255) NOT NULL,
  `ticket` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `route` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `reason` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cancellations`
--

INSERT INTO `cancellations` (`cid`, `email`, `seatno`, `busid`, `ticket`, `date`, `route`, `price`, `reason`) VALUES
(1, 'kapsoiyomeshack@gmail.com', '', '0', '1648978878', '2022-04-05', 'MSA_NRB', 1000, ''),
(2, 'kapsoiyomeshack@gmail.com', '', '', '1648995926', '2022-04-05', 'MSA_NRB', 1000, ''),
(3, 'robinkipkorir@gmail.com', '', '19', '1648982169', '2022-04-05', 'NRB_NKR', 500, ''),
(4, 'robinkipkorir8@gmail.com', '', '19', '1648997097', '2022-04-05', 'NRB_NKR', 500, ''),
(5, 'robinkipkorir8@gmail.com', '', '17', '1649001525', '2022-04-05', 'MSA_NRB', 1000, ''),
(6, 'meshackkapsoiyo@gmail.com', '', '18', '1649006283', '2022-04-04', 'MSA_NRB', 1000, ''),
(7, 'adamfondo91@gmail.com', '', '17', '1649052287', '2022-04-06', 'MSA_NRB', 1000, ''),
(8, 'musaudamaris20@gmail.com', '', '24', '1649053274', '2022-04-06', 'MSA_KSM', 2500, ''),
(9, 'adamfondo91@gmail.com', '', '18', '1649606201', '2022-04-13', 'MSA_NRB', 1000, 'injury'),
(10, 'adamfondo91@gmail.com', '', '17', '1649352749', '2022-04-09', 'MSA_NRB', 1000, 'Booked_Wrong_Bus'),
(11, 'adamfondo91@gmail.com', '', '18', '1649597463', '2022-04-13', 'MSA_NRB', 1000, 'injury');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `cid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`cid`, `name`, `value`) VALUES
(4, 'Mombasa', 'MSA'),
(5, 'Nairobi', 'NRB'),
(6, 'Nakuru', 'NKR'),
(7, 'Iten', 'ITN'),
(8, 'Lowdwar', 'LDR'),
(9, 'Narok', 'NRK'),
(10, 'Kisumu', 'KSM'),
(11, 'Maralal', 'MRL');

-- --------------------------------------------------------

--
-- Table structure for table `queries`
--

CREATE TABLE `queries` (
  `qid` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `queries`
--

INSERT INTO `queries` (`qid`, `email`, `subject`, `message`, `date`) VALUES
(1, 'legitimacy426@gmail.com', 'Report_Fraud', 'hey i have found a fraud website could you please \r\nclarify', '2022-04-10'),
(2, 'adamfondo91@gmail.com', 'Make_Suggestion', 'i suggest you enable AI in you system', '2022-04-10'),
(3, 'adamfondo91@gmail.com', 'Report_Fraud', 'reporting fraud transations detected', '2022-04-10'),
(4, 'adamfondo91@gmail.com', 'Ticket_Cancellation', 'hello i have cancelled my ticket', '2022-04-10'),
(5, 'robinkipkorir8@gmail.com', 'Make_Suggestion', 'i have a suggestion', '2022-04-10'),
(6, 'robinkipkorir8@gmail.com', 'Make_Suggestion', 'i have a suggestion', '2022-04-10'),
(7, 'robinkipkorir8@gmail.com', 'Make_Suggestion', 'i have a suggestion', '2022-04-10'),
(8, 'robinkipkorir8@gmail.com', 'Make_Suggestion', 'i have a suggestion', '2022-04-10'),
(9, 'robinkipkorir8@gmail.com', 'Make_Suggestion', 'i have a suggestion', '2022-04-10'),
(10, 'legitimacy426@gmail.com', 'Make_Suggestion', 'i also have a suggestion', '2022-04-10'),
(11, 'robinkipkorir8@gmail.com', 'Make_Suggestion', 'I also have a suggestion', '2022-04-10'),
(12, 'legitimacy426@gmail.com', 'Ticket_Cancellation', 'canceliing sugeetsysiiwiewi', '2022-04-10'),
(13, 'robinkipkorir8@gmail.com', 'Make_Suggestion', 'suggetions from me ', '2022-04-10'),
(14, 'robinkipkorir8@gmail.com', 'Make_Suggestion', 'suggestions', '2022-04-10'),
(15, 'robinkipkorir8@gmail.com', 'Make_Suggestion', 'I have suggestions', '2022-04-10'),
(16, 'legitimacy426@gmail.com', 'Ticket_Cancellation', 'support', '2022-04-12'),
(17, 'legitimacy426@gmail.com', 'Ticket_Cancellation', 'cancel', '2022-04-12');

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `sid` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`sid`, `email`, `date`) VALUES
(1, 'legitimacy426@gmail.com', '2022-04-10'),
(4, 'adamfondo91@gmail.com', '2022-04-10'),
(5, 'adamfodo91@gmail.com', '2022-04-10'),
(6, 'robinkipkorir@gmail.com', '2022-04-10'),
(7, 'kings@gmail', '2022-04-12'),
(8, 'kings@gmail.com', '2022-04-12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`bkid`);

--
-- Indexes for table `buses`
--
ALTER TABLE `buses`
  ADD PRIMARY KEY (`bId`);

--
-- Indexes for table `cancellations`
--
ALTER TABLE `cancellations`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `queries`
--
ALTER TABLE `queries`
  ADD PRIMARY KEY (`qid`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`sid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `bkid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `buses`
--
ALTER TABLE `buses`
  MODIFY `bId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `cancellations`
--
ALTER TABLE `cancellations`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `queries`
--
ALTER TABLE `queries`
  MODIFY `qid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
