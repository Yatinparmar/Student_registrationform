-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2024 at 10:03 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student_details`
--

-- --------------------------------------------------------

--
-- Table structure for table `studentdetails`
--

CREATE TABLE `studentdetails` (
  `id` int(11) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `department` varchar(50) NOT NULL,
  `streetAddress1` varchar(100) NOT NULL,
  `streetAddress2` varchar(100) DEFAULT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `Zip` varchar(20) NOT NULL,
  `Number` varchar(20) NOT NULL,
  `image` varchar(255) NOT NULL,
  `resume` varchar(255) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `studentdetails`
--

INSERT INTO `studentdetails` (`id`, `firstName`, `lastName`, `email`, `password`, `gender`, `department`, `streetAddress1`, `streetAddress2`, `city`, `state`, `country`, `Zip`, `Number`, `image`, `resume`, `reg_date`) VALUES
(1, 'akay', 'kohali', 'akay34@gmail.com', 'Yatin@4354', 'male', 'BCA', 'Anand', ' ded', 'Lunawada', ' gujarat', 'india', '456395', '4852639589', 'Profileimg.jpg', 'resume.pdf', '2024-03-14 03:46:53'),
(4, 'Harsh', 'Patel', 'harsh7878@gmail.com', 'Yatin#55656', 'male', 'BCA', 'Anand', ' ded', 'Lunawada', ' gujarat', 'india', '456395', '4852639589', 'profile3.jpg', 'resume.docx', '2024-03-14 03:54:58'),
(53, 'yatin', 'parmar', 'yatin34@gmail.com', 'Yatin@3445', 'male', 'BBA', 'Anand', ' Lunawada', 'Lunawada', ' gujarat', 'india', '456395', '7621585963', 'Profileimg.jpg', 'resume.docx', '2024-03-15 05:20:30'),
(54, 'yatin', 'parmar', 'yatin34@gmail.com', 'Yatin@3454', 'male', 'BCA', 'Anand', ' ded', 'Lunawada', ' gujarat', 'india', '456395', '7621983650', 'profile2.jpg', 'resume.pdf', '2024-03-15 05:27:34'),
(57, 'deep', 'patel', 'deep44@gmail.com', 'Deep@45456', 'male', ' MCA', 'Anand', ' VVN', 'AMD', ' gujarat', 'india', '456395', '4852639589', 'profile3.jpg', ' resume.pdf', '2024-03-15 12:04:40'),
(59, 'yatin', 'parmar', 'yatinparmar212@gmail.com', 'Yatin%65786987', 'male', 'MBA', 'Anand', ' VVN', 'AMD', ' gujarat', 'india', '456395', '7621983650', 'profile3.jpg', 'resume.pdf', '2024-03-15 12:13:23'),
(60, 'kunj', 'bapodare', 'kunj798@gmail.com', 'Kunj@567567', 'male', ' MBA', 'Anand', ' VVN', 'AMD', ' gujarat', 'india', '456395', '4852639589', 'Profileimg.jpg', ' resume.pdf', '2024-03-15 12:16:33'),
(61, 'ajay', 'devgon', 'ajay576578@gmail.com', 'Ajay@3465454', 'male', 'MCA', 'Anand', ' VVN', 'AMD', ' gujarat', 'india', '456395', '4852639589', 'Profileimg.jpg', 'resume.pdf', '2024-03-15 12:19:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `studentdetails`
--
ALTER TABLE `studentdetails`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `studentdetails`
--
ALTER TABLE `studentdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
