-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2020 at 05:27 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel-management-system`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl-admin`
--

CREATE TABLE `tbl-admin` (
  `admin_id` int(11) NOT NULL,
  `admin_first_name` varchar(50) NOT NULL,
  `admin_last_name` varchar(50) NOT NULL,
  `admin_password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl-admin`
--

INSERT INTO `tbl-admin` (`admin_id`, `admin_first_name`, `admin_last_name`, `admin_password`) VALUES
(1, 'Umair', 'Jibran', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `tbl-cities`
--

CREATE TABLE `tbl-cities` (
  `city_ID` int(11) NOT NULL,
  `city_NAME` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl-cities`
--

INSERT INTO `tbl-cities` (`city_ID`, `city_NAME`) VALUES
(1, 'Peshawar'),
(2, 'Lahore'),
(3, 'Karachi'),
(4, 'Islamabad'),
(5, 'Quetta'),
(6, 'Swat'),
(7, 'Multan'),
(8, 'Kashmir'),
(9, 'Muzaffarabad');

-- --------------------------------------------------------

--
-- Table structure for table `tbl-customer`
--

CREATE TABLE `tbl-customer` (
  `customer_id` int(11) NOT NULL,
  `customer_first_name` varchar(20) NOT NULL,
  `customer_last_name` varchar(20) NOT NULL,
  `customer_identity_number` varchar(15) NOT NULL,
  `customer_contact` varchar(20) NOT NULL,
  `customer_type` varchar(10) NOT NULL DEFAULT 'Normal',
  `customer_email` varchar(30) NOT NULL,
  `customer_card` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl-customer`
--

INSERT INTO `tbl-customer` (`customer_id`, `customer_first_name`, `customer_last_name`, `customer_identity_number`, `customer_contact`, `customer_type`, `customer_email`, `customer_card`) VALUES
(1, 'Umair', 'Jibran', '1730146394913', '03120919647', 'Normal', 'umairjibran7@gmail.com', 112),
(2, 'Abbas', 'Nawab', '1730146394914', '031524812', 'Normal', 'abbas@nawab.com', 325235),
(3, 'Aizaz', 'Nawab', '1730146394915', '0312561651654', 'Normal', 'aizaz@nawab.com', 121655),
(4, 'Ahmad', 'Ali', '1730146394916', '234523252356', 'Normal', 'ahmad@jan.com', 546485155);

-- --------------------------------------------------------

--
-- Table structure for table `tbl-hotel-info`
--

CREATE TABLE `tbl-hotel-info` (
  `hotel_ID` int(11) NOT NULL,
  `hotel_NAME` varchar(75) NOT NULL,
  `hotel_CITY` varchar(50) NOT NULL,
  `hotel_STREET` varchar(50) NOT NULL,
  `hotel_BUILDING` varchar(50) NOT NULL,
  `hotel_EMAIL` varchar(50) NOT NULL,
  `hotel_CONTACT` varchar(15) NOT NULL,
  `hotel_WEBSITE` varchar(50) NOT NULL,
  `hotel_NSINGLEROOMS` int(11) NOT NULL,
  `hotel_NDOUBLEROOMS` int(11) NOT NULL,
  `hotel_NTRIPLEROOMS` int(11) NOT NULL,
  `hotel_NFOURPROOMS` int(11) NOT NULL,
  `hotel_BOOKED_SINGLE` int(11) NOT NULL DEFAULT 0,
  `hotel_BOOKED_DOUBLE` int(11) NOT NULL DEFAULT 0,
  `hotel_BOOKED_TRIPLE` int(11) NOT NULL DEFAULT 0,
  `hotel_BOOKED_FOUR` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl-hotel-info`
--

INSERT INTO `tbl-hotel-info` (`hotel_ID`, `hotel_NAME`, `hotel_CITY`, `hotel_STREET`, `hotel_BUILDING`, `hotel_EMAIL`, `hotel_CONTACT`, `hotel_WEBSITE`, `hotel_NSINGLEROOMS`, `hotel_NDOUBLEROOMS`, `hotel_NTRIPLEROOMS`, `hotel_NFOURPROOMS`, `hotel_BOOKED_SINGLE`, `hotel_BOOKED_DOUBLE`, `hotel_BOOKED_TRIPLE`, `hotel_BOOKED_FOUR`) VALUES
(1, 'Pearl Continental', 'Peshawar', 'GT Road', 'PC Building', 'bookings@pcpeshawar.com', '0915178654', 'www.pcpeshawar.com', 58, 42, 54, 20, 0, 4, 1, 1),
(2, 'Amin Hotel', 'Peshawar', 'GT Road', 'Amin Hotel Building', 'amin@hotel.com', '03165485512', 'https://www.aminhotel.com', 52, 42, 21, 5, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl-reservations`
--

CREATE TABLE `tbl-reservations` (
  `res_id` int(11) NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `room_type` varchar(2) NOT NULL,
  `start_data` date NOT NULL,
  `end_date` date NOT NULL,
  `total_cost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl-reservations`
--

INSERT INTO `tbl-reservations` (`res_id`, `hotel_id`, `customer_id`, `room_type`, `start_data`, `end_date`, `total_cost`) VALUES
(4, 1, 1, 'm', '2020-07-27', '2020-07-22', 175),
(5, 1, 1, 'l', '2020-07-18', '2020-07-07', 190);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl-admin`
--
ALTER TABLE `tbl-admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl-cities`
--
ALTER TABLE `tbl-cities`
  ADD PRIMARY KEY (`city_ID`);

--
-- Indexes for table `tbl-customer`
--
ALTER TABLE `tbl-customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `tbl-hotel-info`
--
ALTER TABLE `tbl-hotel-info`
  ADD PRIMARY KEY (`hotel_ID`);

--
-- Indexes for table `tbl-reservations`
--
ALTER TABLE `tbl-reservations`
  ADD PRIMARY KEY (`res_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl-admin`
--
ALTER TABLE `tbl-admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl-cities`
--
ALTER TABLE `tbl-cities`
  MODIFY `city_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl-customer`
--
ALTER TABLE `tbl-customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl-hotel-info`
--
ALTER TABLE `tbl-hotel-info`
  MODIFY `hotel_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl-reservations`
--
ALTER TABLE `tbl-reservations`
  MODIFY `res_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
