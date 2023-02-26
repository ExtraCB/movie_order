-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2023 at 03:16 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `movie_ticket`
--

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

CREATE TABLE `movie` (
  `id_m` int(11) NOT NULL,
  `name_m` varchar(250) NOT NULL,
  `file_m` varchar(100) NOT NULL,
  `price_m` double NOT NULL,
  `date_m` date NOT NULL DEFAULT current_timestamp(),
  `type_m` int(10) NOT NULL,
  `status_m` int(1) NOT NULL DEFAULT 1,
  `timestamp_m` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`id_m`, `name_m`, `file_m`, `price_m`, `date_m`, `type_m`, `status_m`, `timestamp_m`) VALUES
(6, 'Brownnnnnnnnww', '1508206891.jpg', 250, '2023-02-22', 3, 1, '2023-02-24'),
(7, 'Brownnnnnnnnasdadad', '1060795303.jpg', 250, '2023-02-01', 4, 1, '2023-02-25'),
(8, 'Brownnnnnnnn', '26326544.jpg', 250, '2023-01-31', 2, 1, '2023-02-25');

-- --------------------------------------------------------

--
-- Table structure for table `order_ticket`
--

CREATE TABLE `order_ticket` (
  `id_or` int(11) NOT NULL,
  `own_or` int(11) NOT NULL,
  `ticket_or` int(11) NOT NULL,
  `timestamp_or` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_ticket`
--

INSERT INTO `order_ticket` (`id_or`, `own_or`, `ticket_or`, `timestamp_or`) VALUES
(13, 9, 135, '2023-02-25'),
(14, 9, 143, '2023-02-25');

-- --------------------------------------------------------

--
-- Table structure for table `showtimes`
--

CREATE TABLE `showtimes` (
  `id_st` int(11) NOT NULL,
  `time_st` time NOT NULL,
  `m_st` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `showtimes`
--

INSERT INTO `showtimes` (`id_st`, `time_st`, `m_st`) VALUES
(393478669, '08:18:00', 8),
(901281193, '11:21:00', 8),
(1107182275, '23:21:00', 6),
(1814138263, '08:18:00', 7);

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id_tk` int(11) NOT NULL,
  `seat_tk` varchar(150) NOT NULL,
  `status_tk` int(1) NOT NULL DEFAULT 1,
  `st_tk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id_tk`, `seat_tk`, `status_tk`, `st_tk`) VALUES
(121, 'A1', 1, 901281193),
(122, 'A2', 1, 901281193),
(123, 'A3', 1, 901281193),
(124, 'A4', 1, 901281193),
(125, 'A5', 1, 901281193),
(126, 'B1', 1, 901281193),
(127, 'B2', 1, 901281193),
(128, 'B3', 1, 901281193),
(129, 'B4', 1, 901281193),
(130, 'B5', 1, 901281193),
(131, 'C1', 1, 901281193),
(132, 'C2', 1, 901281193),
(133, 'C3', 1, 901281193),
(134, 'C4', 1, 901281193),
(135, 'C5', 0, 901281193),
(136, 'A1', 1, 393478669),
(137, 'A2', 1, 393478669),
(138, 'A3', 1, 393478669),
(139, 'A4', 1, 393478669),
(140, 'A5', 1, 393478669),
(141, 'B1', 1, 393478669),
(142, 'B2', 1, 393478669),
(143, 'B3', 0, 393478669),
(144, 'B4', 1, 393478669),
(145, 'B5', 1, 393478669),
(146, 'C1', 1, 393478669),
(147, 'C2', 1, 393478669),
(148, 'C3', 1, 393478669),
(149, 'C4', 1, 393478669),
(150, 'C5', 1, 393478669),
(151, 'A1', 1, 1107182275),
(152, 'A2', 1, 1107182275),
(153, 'A3', 1, 1107182275),
(154, 'A4', 1, 1107182275),
(155, 'A5', 1, 1107182275),
(156, 'B1', 1, 1107182275),
(157, 'B2', 1, 1107182275),
(158, 'B3', 1, 1107182275),
(159, 'B4', 1, 1107182275),
(160, 'B5', 1, 1107182275),
(161, 'C1', 1, 1107182275),
(162, 'C2', 1, 1107182275),
(163, 'C3', 1, 1107182275),
(164, 'C4', 1, 1107182275),
(165, 'C5', 1, 1107182275),
(166, 'A1', 1, 1814138263),
(167, 'A2', 1, 1814138263),
(168, 'A3', 1, 1814138263),
(169, 'A4', 1, 1814138263),
(170, 'A5', 1, 1814138263),
(171, 'B1', 1, 1814138263),
(172, 'B2', 1, 1814138263),
(173, 'B3', 1, 1814138263),
(174, 'B4', 1, 1814138263),
(175, 'B5', 1, 1814138263),
(176, 'C1', 1, 1814138263),
(177, 'C2', 1, 1814138263),
(178, 'C3', 1, 1814138263),
(179, 'C4', 1, 1814138263),
(180, 'C5', 1, 1814138263);

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `id_type` int(11) NOT NULL,
  `name_type` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id_type`, `name_type`) VALUES
(1, 'user'),
(2, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `type_movies`
--

CREATE TABLE `type_movies` (
  `id_mtype` int(11) NOT NULL,
  `name_mtype` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `type_movies`
--

INSERT INTO `type_movies` (`id_mtype`, `name_mtype`) VALUES
(2, 'Horror'),
(3, 'Action'),
(4, 'Fantasy');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username_user` varchar(100) NOT NULL,
  `password_user` varchar(20) NOT NULL,
  `fname_user` varchar(100) NOT NULL,
  `lname_user` varchar(100) NOT NULL,
  `address_user` varchar(100) NOT NULL,
  `tel_user` varchar(10) NOT NULL,
  `file_user` varchar(100) NOT NULL,
  `status_user` varchar(1) NOT NULL DEFAULT '0',
  `type_user` int(11) NOT NULL DEFAULT 1,
  `timestamp_user` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username_user`, `password_user`, `fname_user`, `lname_user`, `address_user`, `tel_user`, `file_user`, `status_user`, `type_user`, `timestamp_user`) VALUES
(8, 'admin', '1234', 'Pathrapol', 'Pitak', 'Thailand', '0632495978', '724719323.jpg', '1', 2, '2023-02-24 09:49:08'),
(9, 'person1', '1234', 'Pathrapols', 'Pitak', 'Thailand', '06333333', '878396136.jpg', '1', 1, '2023-02-25 04:08:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`id_m`),
  ADD KEY `type_m` (`type_m`);

--
-- Indexes for table `order_ticket`
--
ALTER TABLE `order_ticket`
  ADD PRIMARY KEY (`id_or`),
  ADD KEY `own_or` (`own_or`),
  ADD KEY `ticket_or` (`ticket_or`);

--
-- Indexes for table `showtimes`
--
ALTER TABLE `showtimes`
  ADD PRIMARY KEY (`id_st`),
  ADD KEY `m_st` (`m_st`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id_tk`),
  ADD KEY `st_tk` (`st_tk`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id_type`);

--
-- Indexes for table `type_movies`
--
ALTER TABLE `type_movies`
  ADD PRIMARY KEY (`id_mtype`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `type_user` (`type_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `movie`
--
ALTER TABLE `movie`
  MODIFY `id_m` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `order_ticket`
--
ALTER TABLE `order_ticket`
  MODIFY `id_or` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id_tk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=181;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `type_movies`
--
ALTER TABLE `type_movies`
  MODIFY `id_mtype` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `movie`
--
ALTER TABLE `movie`
  ADD CONSTRAINT `movie_ibfk_1` FOREIGN KEY (`type_m`) REFERENCES `type_movies` (`id_mtype`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_ticket`
--
ALTER TABLE `order_ticket`
  ADD CONSTRAINT `order_ticket_ibfk_1` FOREIGN KEY (`own_or`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_ticket_ibfk_2` FOREIGN KEY (`ticket_or`) REFERENCES `tickets` (`id_tk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `showtimes`
--
ALTER TABLE `showtimes`
  ADD CONSTRAINT `showtimes_ibfk_1` FOREIGN KEY (`m_st`) REFERENCES `movie` (`id_m`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_ibfk_1` FOREIGN KEY (`st_tk`) REFERENCES `showtimes` (`id_st`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`type_user`) REFERENCES `types` (`id_type`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
