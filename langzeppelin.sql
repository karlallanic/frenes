-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2018 at 03:35 AM
-- Server version: 10.1.24-MariaDB
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `langzeppelin`
--

-- --------------------------------------------------------

--
-- Table structure for table `halloffame`
--

CREATE TABLE `halloffame` (
  `player_ID` int(11) NOT NULL,
  `player_name` varchar(255) NOT NULL,
  `player_score` int(11) NOT NULL,
  `category` enum('beginner','intermediate') NOT NULL,
  `language` enum('french','spanish') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `words`
--

CREATE TABLE `words` (
  `word_ID` int(11) NOT NULL,
  `category` enum('beginner','intermediate') NOT NULL,
  `english` varchar(255) NOT NULL,
  `french` varchar(255) NOT NULL,
  `spanish` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `words`
--

INSERT INTO `words` (`word_ID`, `category`, `english`, `french`, `spanish`) VALUES
(1, 'beginner', 'hello', 'bonjour', 'hola'),
(2, 'beginner', 'thanks', 'merci', 'gracias'),
(3, 'beginner', 'im sorry', 'pardon', 'lo siento'),
(4, 'beginner', 'yes', 'oui', 'si'),
(5, 'beginner', 'no', 'non', 'no'),
(6, 'beginner', 'i am', 'je suis', 'yo soy'),
(7, 'beginner', 'good day', 'bon journee', 'buenos dias'),
(8, 'beginner', 'good morning', 'bonjour', 'buenos dias'),
(9, 'beginner', 'good evening', 'bonsoir', 'buenas noches'),
(10, 'beginner', 'good night', 'bon soiree', 'buenas noches'),
(11, 'beginner', 'goodbye', 'au revoir', 'adios'),
(12, 'beginner', 'good', 'bien', 'bien');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `halloffame`
--
ALTER TABLE `halloffame`
  ADD PRIMARY KEY (`player_ID`);

--
-- Indexes for table `words`
--
ALTER TABLE `words`
  ADD PRIMARY KEY (`word_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `halloffame`
--
ALTER TABLE `halloffame`
  MODIFY `player_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `words`
--
ALTER TABLE `words`
  MODIFY `word_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
