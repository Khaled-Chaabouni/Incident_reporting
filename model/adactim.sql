-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 05, 2023 at 10:36 PM
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
  `sender` int(11) NOT NULL,
  `date` date NOT NULL,
  `type` text NOT NULL,
  `content` text NOT NULL,
  `impact` enum('light','moderate','severe') NOT NULL,
  `measures` text NOT NULL,
  PRIMARY KEY (`num_tiquet`),
  KEY `sender` (`sender`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`num_tiquet`, `sender`, `date`, `type`, `content`, `impact`, `measures`) VALUES
(2, 44, '2023-08-04', 'sqli', 'on march 23rd we got an sql injection through our login form', 'severe', 'encrypt data'),
(3, 404, '2023-08-04', 'cookies injection', 'we witnessed admin cookies manipulated by a 3rd party software, used to access database.', 'severe', 'cookies encryption'),
(25, 404, '2023-08-05', 'sqli', 'qzgzeqg', 'light', 'azqretyy'),
(24, 404, '2023-08-05', '', '', 'light', ''),
(23, 404, '2023-08-05', 'phishing attack', 'one of our agents got a fishing email.', 'moderate', 'take down server & add firewall.');

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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `account_type`, `username`, `email`, `password`) VALUES
('1', 'simple_user', 'Agent_404', 'Agent404@gmail.com', 'Agent404'),
('acd9d738bf6177e3de4c0f67fb3c08cb', 'simple_user', 'fea8cfbe46dafe8127c135c27342f4d0', '27a3e9ae2d1cbc1bc3a9e2e15d933e95', 'cfd8a887c09d150dc927a6b9dea684af'),
('80ca8e237e6889aafb0d869bf80f0fef', 'simple_user', '90fb261a4033f4c52fc7081d49b2c910', '9d95a985c775710477a8cbfec4ab1e3f', '0fd22d00dcbf01858af1cdcb0aebf3ac'),
('c80179f41f304c5612afc9345b7a297d', 'simple_user', '05620efab28d607dd3a93994e7ba633b', '5ddd7e9b94cbaf8cb44a350c88b0ea34', '65f8fa30fda8e4db735b6179ca14e8ea');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
