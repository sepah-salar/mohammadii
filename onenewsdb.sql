-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 11, 2025 at 09:53 AM
-- Server version: 8.3.0
-- PHP Version: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onenewsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_persian_ci NOT NULL,
  `text` varchar(1000) CHARACTER SET utf8mb3 COLLATE utf8mb3_persian_ci NOT NULL,
  `imageurl` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_persian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_persian_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `text`, `imageurl`) VALUES
(21, '5', 'uojkjpjpuipuipui', 'images/download.jpg'),
(22, 'v222', 'xxxxxxxxxx', 'images/d51f95c0-533f-11ee-8027-25f657c3dd8b.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(30) CHARACTER SET utf8mb3 COLLATE utf8mb3_persian_ci NOT NULL,
  `username` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_persian_ci NOT NULL,
  `password` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_persian_ci NOT NULL,
  `admin` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_persian_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `username`, `password`, `admin`) VALUES
(1, 'hasan', 'h100', '1234', 1),
(2, 'taghi', 'taghi', '1234', 0),
(3, 'hasan', 'h100', '1234', 0),
(4, 'hasan', 'h100', '1234', 0),
(5, 'uhnuh', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'gh', '$2y$10$Hfu2NudYdXD67ybhuyemB.nVKJ.nWLtvmm66wu/.G888ty4ATixDi', '2025-02-02 08:43:41'),
(2, 'hasangvhgv', '$2y$10$f8aMfuxXpPUwAY6cYTH3ge5sX4FumS3s7uewM8P5tX/8hJaJvFbDO', '2025-02-02 08:53:54'),
(3, 'reza', '$2y$10$SWXxFW3kc8bI8acTJdLNue/1SK7lBxjRekCMAO4/7/EE94QmaGS1C', '2025-02-02 08:58:09'),
(4, '123456', '$2y$10$u8D3v6GfOcBStugU.WlEg.U5s20eoOeMp0/Bc1F4Cvj8z1shAbYyy', '2025-02-02 09:33:08'),
(5, 'a', '$2y$10$eP5VdUzgVqzANnAnubGmJeeCDmpX5kSp6g5paHXHzw4bGaY884A7a', '2025-02-16 04:45:10'),
(6, 'm', '$2y$10$p6XdQhGkE4Zk1ugrsxycSOJ8W2GgmHqWXqxdlZn5NljVdpaOcyU2K', '2025-03-02 08:03:06'),
(7, 'mohammad', '$2y$10$DDqKK3jzuoDKSth1xl75tuM5zvrxVyQOckZgogBrvX5pK2wmp1Sg.', '2025-04-12 19:33:49'),
(8, 'ghalesefid', '$2y$10$e9MPRYylSN2ZEKdifbJAdOrqrBEgvcXJhTGc8G1R/tepPJuUkjqC2', '2025-04-13 05:50:40'),
(9, 'ر', '$2y$10$0jJtScXrI8YXnbgHUnNSouU8zMb7OtIp4cQM14J7YSw4l7eoQOI2i', '2025-04-19 20:47:41'),
(10, 'mohammadd', '$2y$10$1KOsBTmCEIFPOmGSOhljRe/tcsx19EBYkGgd00m/7lvtKK7TwWTai', '2025-04-19 20:49:07'),
(11, 'ali', '$2y$10$tn/rco0gfD1V.plGNGJlAuQfm0BZazf1dFjQqmL3wlTjypKiqfeQi', '2025-04-19 20:49:52'),
(12, 'z', '$2y$10$0WRiaCqwaMKdCa3Qsg1nYOrn62swdGU3eJM0Tnv6OZnfy3V1AtmpO', '2025-04-20 06:11:28'),
(13, 'admin', '$2y$10$PGrVp5D3m1qfp/oowcC.J.HQnYdj8EHUkXJWEgGbbZYjSrhRcVjDS', '2025-05-11 07:12:20');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


CREATE TABLE comments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    news_id INT NOT NULL,
    user_id INT NOT NULL,
    username VARCHAR(255) NOT NULL,
    comment TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (news_id) REFERENCES news(id) ON DELETE CASCADE,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);