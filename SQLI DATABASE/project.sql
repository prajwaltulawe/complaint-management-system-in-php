-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2021 at 03:18 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `microproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `loginid` varchar(25) NOT NULL,
  `passwd` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`loginid`, `passwd`) VALUES
('Prajwal', '$2y$10$v59NNWoRLzHSu.aV27R/b./VGSymO2ivWKy7/Ja72yI29uOac5dZG');

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `srno` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `product` varchar(25) NOT NULL,
  `cust_message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`srno`, `name`, `email`, `product`, `cust_message`) VALUES
(1, 'Aditi Musunur', 'isaacson@comcast.net', 'Computer', 'I am complaining because this device is not working.'),
(2, 'Advitiya Sujeet', 'payned@icloud.com', 'Mobile', 'Unfortunately, your product has not performed well. '),
(3, ' Alagesan Poduri', 'mailarc@att.net', 'Television', 'The service was not performed correctly.\r\n'),
(4, 'Aprativirya Seshan', 'amaranth@optonline.net', 'Mobile', 'Received a damaged product.\r\n'),
(5, 'Asvathama Ponnada', 'miturria@sbcglobal.net', 'Computer', 'Its sound is not clear.\r\n'),
(6, 'Avantas Ghosal', 'gemmell@aol.com', 'Computer', 'I was billed the wrong amount. \r\n'),
(7, ' Avidosa Vaisakhi', 'baveja@gmail.com', 'Mobile', 'Casing was not disclosed clearly\r\n'),
(8, 'Barsati Sandipa', 'isorashi@icloud.com', 'Television', 'Product was misrepresented.\r\n'),
(9, ' Debasis Sundhararajan', 'staffelb@optonline.net', 'Mobile', 'Fraudulent warranty policy.\r\n'),
(10, 'Devasru Subramanyan', 'esbeck@me.com', 'Television', 'Its sound is not clear.\r\n'),
(11, ' Dharmadhrt Ramila', 'madanm@aol.com', 'Computer', 'The picture changes to black and white every now and then.\r\n'),
(12, ' Dhritiman Salim', 'solomon@comcast.net', 'Computer', 'Damaged piece received.\r\n\r\n'),
(13, 'Gopa Trilochana', 'baveja@aol.com', 'Television', 'I was billed the wrong amount. \r\n'),
(14, ' Hardeep Suksma', 'jaxweb@yahoo.com', 'Computer', 'Unfortunately, your product has not performed well. \r\n'),
(15, 'Jayadev Mitali', 'jgmyers@mac.com', 'Mobile', 'Fraudulent warranty policy.\r\n'),
(16, 'Jitendra Choudhary', 'salesgeek@mac.com', 'Mobile', 'Received a damaged product.\r\n'),
(17, ' Kalyanavata Veerender', 'bartak@me.com', 'Computer', 'I am complaining because this device is not working.\r\n');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD UNIQUE KEY `loginid` (`loginid`);

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`srno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `srno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
