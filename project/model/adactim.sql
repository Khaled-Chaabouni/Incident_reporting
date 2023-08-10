-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 07, 2023 at 09:36 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adactim`
--

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

DROP TABLE IF EXISTS `reports`;
CREATE TABLE IF NOT EXISTS `reports` (
  `num_tiquet` int(11) NOT NULL AUTO_INCREMENT,
  `sender` varchar(500) NOT NULL,
  `date` date NOT NULL,
  `type` varchar(500) NOT NULL,
  `content` text NOT NULL,
  `impact` enum('light','moderate','severe') NOT NULL,
  `measures` text NOT NULL,
  PRIMARY KEY (`num_tiquet`),
  KEY `sender` (`sender`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`num_tiquet`, `sender`, `date`, `type`, `content`, `impact`, `measures`) VALUES
(2, '251e03d9edf2a255a71b4178ebfaa3ef', '2023-08-04', 'sqli', 'on march 23rd we got an sql injection through our login form', 'severe', 'encrypt data'),
(3, '251e03d9edf2a255a71b4178ebfaa3ef', '2023-08-04', 'cookies injection', 'we witnessed admin cookies manipulated by a 3rd party software, used to access database.', 'severe', 'cookies encryption'),
(23, '251e03d9edf2a255a71b4178ebfaa3ef', '2023-08-05', 'phishing attack', 'one of our agents got a fishing email.', 'moderate', 'take down server & add firewall.'),
(27, 'c2f1e0670917aa6bcd542c6dc53efe91', '2023-08-06', 'social engineering', 'one of our agents gave away his login credentials thinking it was the helpdesk calling. ', 'severe', 'invalidate his credentials'),
(30, 'de21d9c8de94753f55ad26eb5609738f', '2023-08-07', 'mama', 'mama jeeeeeet jsp koi faaaiiire!! mama jeeeeeet jsp koi faaaiiire!! mama jeeeeeet jsp koi faaaiiire!! mama jeeeeeet jsp koi faaaiiire!! mama jeeeeeet jsp koi faaaiiire!! mama jeeeeeet jsp koi faaaiiire!! mama jeeeeeet jsp koi faaaiiire!! mama jeeeeeet jsp koi faaaiiire!! mama jeeeeeet jsp koi faaaiiire!! mama jeeeeeet jsp koi faaaiiire!! ', 'moderate', 'aqzsegdhjfkglaqzsegdhjfkglaqzsegdhjfkglaqzsegdhjfkglaqzsegdhjfkglaqzsegdhjfkglaqzsegdhjfkgl');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` varchar(500) NOT NULL,
  `account_type` enum('admin','simple_user') NOT NULL DEFAULT 'simple_user',
  `username` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `account_type`, `username`, `email`, `password`) VALUES
('251e03d9edf2a255a71b4178ebfaa3ef', 'admin', 'Khaled Chaabouni', 'khaledchaabouni@adactim.com', 'd91ca33809a5c1ff46537361d61b7541'),
('3040d169e739cbfac273c28f6ee00972', 'simple_user', 'Khaled Chaabouni', 'Chaabounikhaled@gmail.com', 'd91ca33809a5c1ff46537361d61b7541'),
('45c62d705065b85451578de73ebb4051', 'simple_user', 'test', 'test@ts.com', 'e10adc3949ba59abbe56e057f20f883e'),
('c2f1e0670917aa6bcd542c6dc53efe91', 'simple_user', 'Rahma Ben Hassen', 'Rahmabenhassen@gmail.com', '2ddbf96e67b1c7d400979c9670d63421'),
('de21d9c8de94753f55ad26eb5609738f', 'simple_user', 'ahmad mohsen', 'ahmadmohsen@gmail.com', '962762aa8e6f3e7a817e7fbb621c0d51');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reports`
--
ALTER TABLE `reports`
  ADD CONSTRAINT `reports_fk` FOREIGN KEY (`sender`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
