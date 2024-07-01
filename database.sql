-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 01, 2024 at 04:12 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(6) UNSIGNED NOT NULL,
  `student_id` int(6) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `student_id`, `date`, `status`) VALUES
(79, 1, '2024-06-25', 'Absent');

-- --------------------------------------------------------

--
-- Table structure for table `school_form`
--

CREATE TABLE `school_form` (
  `id` int(11) NOT NULL,
  `school_name` varchar(255) NOT NULL,
  `state` varchar(50) NOT NULL,
  `supervisor_name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `team` varchar(100) NOT NULL,
  `team_member1` varchar(100) NOT NULL,
  `team_phone1` varchar(20) NOT NULL,
  `team_email1` varchar(100) NOT NULL,
  `team_member2` varchar(100) NOT NULL,
  `team_phone2` varchar(20) NOT NULL,
  `team_email2` varchar(100) NOT NULL,
  `team_member3` varchar(100) NOT NULL,
  `team_phone3` varchar(20) NOT NULL,
  `team_email3` varchar(100) NOT NULL,
  `submission_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(6) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `absences` int(11) NOT NULL,
  `user_name` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `school` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `absences`, `user_name`, `password`, `school`, `phone`, `email`) VALUES
(1, 'ABDULAZEEZ ALMASHANI', 4, 'as', '$2y$10$pNdVpihb6Sienv0bNf5IcO4xLJfFcymvt3qqSPuv53Cr5KMqM/5KK', 'd', '91475573', 'ama47132@gmail.com'),
(2, 'omar', 0, 'omar', '$2y$10$g01BQNCDGtPv9hAbVSHEyu0u4Q8NS7jb/yLa77Z0oCpem3xKAqzGy', 'as', '91475573', 'ama47132@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `studentse`
--

CREATE TABLE `studentse` (
  `id` int(6) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `absences` int(11) NOT NULL,
  `user_name` varchar(15) NOT NULL,
  `password` varchar(18) NOT NULL,
  `school` varchar(255) NOT NULL,
  `phone` varchar(9) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `studentse`
--

INSERT INTO `studentse` (`id`, `name`, `absences`, `user_name`, `password`, `school`, `phone`, `email`) VALUES
(1, 'عبدالعزيز محمد علي المعشني', 4, 'aziz', '123456', '', '', ''),
(2, 'سالم', 1, 'sali', '12', '', '', ''),
(3, 'محمد', 0, 'ali', 'ali', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `university_form`
--

CREATE TABLE `university_form` (
  `id` int(11) UNSIGNED NOT NULL,
  `university` varchar(255) NOT NULL,
  `team_member1` varchar(255) NOT NULL,
  `team_phone1` varchar(20) NOT NULL,
  `team_email1` varchar(255) NOT NULL,
  `team_member2` varchar(255) NOT NULL,
  `team_phone2` varchar(20) NOT NULL,
  `team_email2` varchar(255) NOT NULL,
  `team_member3` varchar(255) NOT NULL,
  `team_phone3` varchar(20) NOT NULL,
  `team_email3` varchar(255) NOT NULL,
  `submission_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `school_form`
--
ALTER TABLE `school_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_name` (`user_name`);

--
-- Indexes for table `studentse`
--
ALTER TABLE `studentse`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `university_form`
--
ALTER TABLE `university_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `school_form`
--
ALTER TABLE `school_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `studentse`
--
ALTER TABLE `studentse`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `university_form`
--
ALTER TABLE `university_form`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `student_id` FOREIGN KEY (`student_id`) REFERENCES `studentse` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
