-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 02, 2018 at 07:08 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(6) NOT NULL,
  `name` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `cost_price` double NOT NULL,
  `sale_price` double NOT NULL,
  `total_qty` int(6) NOT NULL,
  `note` text NOT NULL,
  `number_stamp` varchar(255) NOT NULL,
  `img` longblob NOT NULL,
  `group_books_id` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `name`, `author`, `cost_price`, `sale_price`, `total_qty`, `note`, `number_stamp`, `img`, `group_books_id`) VALUES
(6, 'اتلباتلب', '21315', 123, 0, 55, '2132', '13513', '', 2),
(7, 'الاردن والفلسطين', 'العريفي', 10, 25, 39, '213', 'سيشس', '', 9),
(8, 'الاردن والفلسطين', '546بيسب', 123, 1231, 26, '32', '21', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `group_books`
--

CREATE TABLE `group_books` (
  `id` int(6) NOT NULL,
  `name` varchar(255) NOT NULL,
  `note` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `group_books`
--

INSERT INTO `group_books` (`id`, `name`, `note`) VALUES
(1, 'الكتب التاريخية', 'ولا اشي'),
(2, 'طههلهل', 'بيليب'),
(3, 'طههلهل', 'بيليب'),
(4, 'طههلهل', 'بيليب'),
(5, 'طههلهل', 'بيليب'),
(6, 'jhjklhgjfg', 'بيليب'),
(7, 'jhjklhgjfg', 'بيليب'),
(8, 'jhjklhgjfg', 'بيليب'),
(9, 'الكتب التارخية', '500 كتاب'),
(10, 'الكتب التارخية', '');

-- --------------------------------------------------------

--
-- Table structure for table `repository_move`
--

CREATE TABLE `repository_move` (
  `id` int(10) NOT NULL,
  `book_id` int(6) NOT NULL,
  `type_M` int(1) NOT NULL,
  `qty_move` int(5) NOT NULL,
  `note` text NOT NULL,
  `posting_datatime` datetime NOT NULL,
  `user_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `repository_move`
--

INSERT INTO `repository_move` (`id`, `book_id`, `type_M`, `qty_move`, `note`, `posting_datatime`, `user_id`) VALUES
(114, 6, 0, 1, '', '2018-08-31 09:45:49', 12),
(115, 6, 0, 1, '', '2018-08-31 09:45:53', 12),
(116, 6, 0, 1, 'سسس', '2018-08-31 09:45:59', 12),
(117, 6, 0, 1, '', '2018-08-31 09:46:46', 12),
(118, 6, 0, 1, 'يي', '2018-08-31 09:47:59', 12),
(119, 6, 0, 1, '', '2018-08-31 09:49:05', 12),
(120, 6, 0, 1, '', '2018-08-31 09:50:21', 12),
(121, 6, 0, 1, 'سشيش', '2018-08-31 09:51:29', 12),
(122, 6, 0, 1, 'سشيشس', '2018-08-31 09:52:40', 12),
(123, 6, 0, 4, 'يسشي', '2018-08-31 09:52:44', 12),
(124, 6, 0, 1, '', '2018-08-31 09:56:35', 12),
(125, 6, 0, 3, 'يشسي', '2018-08-31 09:57:00', 12),
(126, 7, 0, 55, 'سءيشس', '2018-08-31 09:57:11', 12),
(127, 6, 0, 3, 'سشي', '2018-08-31 09:57:35', 12),
(128, 6, 1, 3, 'سيسسس', '2018-08-31 10:13:19', 12),
(129, 7, 1, 3, 'سسسس', '2018-08-31 10:13:28', 12),
(130, 6, 1, 1, '', '2018-08-31 10:13:38', 12),
(131, 6, 1, 1, '', '2018-08-31 10:15:24', 12),
(132, 7, 1, 1, '', '2018-08-31 10:15:44', 12),
(133, 6, 1, 1, '', '2018-08-31 10:16:05', 12),
(134, 6, 1, 1, 'يسبي', '2018-08-31 10:16:11', 12),
(135, 7, 1, 1, 'بيسب', '2018-08-31 10:16:15', 12),
(136, 7, 1, 5, 'بيسب', '2018-08-31 10:17:01', 12),
(137, 7, 1, 5, 'بيسب', '2018-08-31 10:17:10', 12),
(138, 7, 0, 12, 'jjj', '2018-08-31 10:19:03', 12),
(139, 7, 0, 2, 'fff', '2018-08-31 10:19:48', 12),
(140, 7, 1, 3, 'ttt', '2018-08-31 10:19:58', 12),
(141, 7, 1, 1, 'ggg', '2018-08-31 10:20:27', 12),
(142, 6, 1, 1, '', '2018-08-31 10:27:46', 12),
(143, 7, 0, -2, '222', '2018-08-31 10:38:42', 12),
(144, 6, 0, 5, '', '2018-08-31 10:40:35', 12),
(145, 7, 0, 1, '', '2018-08-31 10:44:35', 12),
(146, 6, 0, 3, '1', '2018-09-01 05:41:25', 12),
(147, 6, 0, 2, '', '2018-09-01 05:41:33', 12),
(148, 8, 0, 10, '', '2018-09-01 06:24:38', 12),
(149, 8, 1, 15, '', '2018-09-01 06:25:15', 12),
(150, 6, 1, 1, '', '2018-09-01 06:25:19', 12),
(151, 6, 1, 1, '', '2018-09-01 06:25:22', 12),
(152, 7, 1, 1, '', '2018-09-01 06:25:23', 12),
(153, 6, 1, 1, '', '2018-09-01 06:25:25', 12),
(154, 7, 1, 1, '', '2018-09-01 06:25:28', 12),
(155, 8, 1, 1, '', '2018-09-01 06:25:31', 12),
(156, 8, 1, 1, '', '2018-09-01 06:25:33', 12),
(157, 6, 1, 1, '', '2018-09-01 06:25:35', 12),
(158, 7, 1, 1, '', '2018-09-01 06:25:36', 12),
(159, 8, 1, 1, '', '2018-09-01 06:25:38', 12),
(160, 7, 1, 1, '', '2018-09-01 06:25:38', 12),
(161, 6, 1, 1, '', '2018-09-01 06:25:39', 12),
(162, 8, 1, 1, '', '2018-09-01 06:25:40', 12),
(163, 6, 1, 1, '', '2018-09-01 06:25:40', 12),
(164, 7, 1, 1, '', '2018-09-01 06:25:41', 12),
(165, 7, 1, 1, '', '2018-09-01 06:25:41', 12),
(166, 8, 1, 1, '', '2018-09-01 06:25:42', 12),
(167, 8, 1, 1, '', '2018-09-01 06:25:42', 12),
(168, 7, 1, 1, '', '2018-09-01 06:25:43', 12),
(169, 8, 1, 1, '', '2018-09-01 06:25:44', 12),
(170, 8, 1, 1, '', '2018-09-01 06:25:45', 12),
(171, 7, 1, 1, '', '2018-09-01 06:25:45', 12),
(172, 6, 1, 1, '', '2018-09-01 06:25:46', 12),
(173, 6, 1, 1, '', '2018-09-01 06:25:46', 12),
(174, 6, 1, 1, '', '2018-09-01 06:25:46', 12),
(175, 6, 1, 1, '', '2018-09-01 06:25:47', 12),
(176, 6, 1, 1, '', '2018-09-01 06:25:47', 12),
(177, 6, 1, 1, '', '2018-09-01 06:25:47', 12),
(178, 7, 1, 1, '', '2018-09-01 06:25:48', 12),
(179, 6, 1, 1, '', '2018-09-01 06:25:49', 12),
(180, 6, 1, 1, '', '2018-09-01 06:25:49', 12),
(181, 6, 1, 1, '', '2018-09-01 06:25:49', 12),
(182, 7, 1, 1, '', '2018-09-01 06:25:50', 12),
(183, 6, 1, 1, '', '2018-09-01 06:25:51', 12),
(184, 6, 1, 1, '', '2018-09-01 06:25:51', 12),
(185, 6, 1, 1, '', '2018-09-01 06:25:51', 12),
(186, 6, 1, 1, '', '2018-09-01 06:25:51', 12),
(187, 6, 1, 1, '', '2018-09-01 06:25:52', 12),
(188, 6, 1, 1, '', '2018-09-01 06:25:52', 12),
(189, 6, 1, 1, '', '2018-09-01 06:25:52', 12),
(190, 6, 1, 1, '', '2018-09-01 06:25:54', 12),
(191, 7, 1, 1, '', '2018-09-01 06:25:56', 12),
(192, 7, 1, 1, '', '2018-09-01 06:25:58', 12),
(193, 7, 1, 1, '', '2018-09-01 06:26:00', 12),
(194, 6, 1, 1, '', '2018-09-01 06:26:01', 12),
(195, 8, 1, 1, '', '2018-09-01 06:26:02', 12),
(196, 8, 1, 1, '', '2018-09-01 06:26:04', 12),
(197, 8, 1, 1, '', '2018-09-01 06:26:04', 12),
(198, 8, 1, 1, '', '2018-09-01 06:26:05', 12),
(199, 8, 1, 1, '', '2018-09-01 06:26:05', 12),
(200, 8, 1, 1, '', '2018-09-01 06:26:05', 12),
(201, 7, 1, 1, '', '2018-09-01 06:26:05', 12),
(202, 7, 1, 1, '', '2018-09-01 06:26:06', 12),
(203, 8, 1, 1, '', '2018-09-01 06:26:06', 12),
(204, 8, 1, 1, '', '2018-09-01 06:26:06', 12),
(205, 8, 1, 1, '', '2018-09-01 06:26:06', 12),
(206, 8, 1, 1, '', '2018-09-01 06:26:06', 12),
(207, 8, 1, 1, '', '2018-09-01 06:26:07', 12),
(208, 8, 1, 1, '', '2018-09-01 06:26:07', 12),
(209, 8, 1, 1, '', '2018-09-01 06:26:07', 12),
(210, 6, 0, 1, '', '2018-09-01 07:17:45', 12);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(3) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(1) NOT NULL,
  `profile_pic` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `user_name`, `email`, `password`, `status`, `profile_pic`) VALUES
(1, 'taha shweiki', 'taha', '', '202cb962ac59075b964b07152d234b70', 1, ''),
(11, 'taha shweiki', 'taha', '', '202cb962ac59075b964b07152d234b70', 1, ''),
(12, 'taha shweiki', 'taha', '', '202cb962ac59075b964b07152d234b70', 1, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `how's-group-book` (`group_books_id`);

--
-- Indexes for table `group_books`
--
ALTER TABLE `group_books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `repository_move`
--
ALTER TABLE `repository_move`
  ADD PRIMARY KEY (`id`),
  ADD KEY `how's-user-inserted` (`user_id`),
  ADD KEY `how's-book-move` (`book_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `group_books`
--
ALTER TABLE `group_books`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `repository_move`
--
ALTER TABLE `repository_move`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=211;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `how's-group-book` FOREIGN KEY (`group_books_id`) REFERENCES `group_books` (`id`);

--
-- Constraints for table `repository_move`
--
ALTER TABLE `repository_move`
  ADD CONSTRAINT `how's-book-move` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`),
  ADD CONSTRAINT `how's-user-inserted` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
