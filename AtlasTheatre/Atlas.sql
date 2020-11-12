-- phpMyAdmin SQL Dump
-- version 4.2.5
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Mar 22, 2015 at 09:31 AM
-- Server version: 5.1.73
-- PHP Version: 5.5.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `Atlas`
--

-- --------------------------------------------------------

--
-- Table structure for table `theatre`
--

CREATE TABLE IF NOT EXISTS `theatre` (
  `t_id` int(5) NOT NULL,
  `location` varchar(15) NOT NULL,
  `mgr_id` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `theatre`
--

insert into `theatre` (`t_id`,`location`,`mgr_id`)values
(1,'Chennai',1),
(2,'Kolkata',4),
(3,'Kochi',7),
(4,'New Delhi',10);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `e_id` int(5) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(60) NOT NULL,
  `name` varchar(20) NOT NULL,
  `zip_code` int(6) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`e_id`,`username`, `password`,`name`,`zip_code`) VALUES
(1,'Vaish12','!Password12','Vaishnav S',670661),
(2,'Ani23','@Password12','Anirudh S',670662),
(3,'Goks34','#Password12','Gokul D',670663),
(4,'Raj12','$Password12','Raj M',670664),
(5,'Amy23','%Password12','Amy K',670665),
(6,'Sita12','^Password12','Sita R',670666),
(7,'James07','HPassword12','James B',670667),
(8,'Raju34','*Password12','Raju C',670668),
(9,'Jimmy05','(Password12','Jimmy J',670669),
(10,'Jack34',')Password12','Jack D',670662),
(11,'Johnny87','~Password12','Johnny S',670661);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `mem_id` varchar(5) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(60) NOT NULL,
  `name` varchar(20) NOT NULL,
  `zip_code` int(6) NOT NULL,
  `email` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`mem_id`,`username`, `password`,`name`,`zip_code`,`email`) VALUES
(1,'rockstar12','PassWord','Ram K',670661,'rockstar12@gmail.com'),
(2,'movielover90','CoolWord','Narsim K',670662,'movielover90@gmail.com'),
(3,'johnmovie1','MovieWord','Warren C',670663,'johnmovie1@gmail.com'),
(4,'coolboy60','TestWord','Charlie C',670664,'coolboy60@gmail.com'),
(5,'jamesbond007','NoHackPls','Ryan R',670665,'jamesbond007@gmail.com'),
(6,'filmreview101','NotRealPass','Daniel C',670666,'filmreview101@gmail.com'),
(7,'pewdiepie','MoviePass','Harrison F',670667,'pewdiepie@gmail.com'),
(8,'markiplier404','WordPAss','Kenzel D',670668,'markiplier404@gmail.com'),
(9,'movie4life','CoolPAss','Jonathon J',670669,'movie4life@gmail.com'),
(10,'stevemc','ABCXYZ','Jeremy R',670662,'stevemc@gmail.com');

-- --------------------------------------------------------
--
-- Table structure for table `reservation`
--

CREATE TABLE IF NOT EXISTS `reservation` (
`res_id` int(7) NOT NULL,
`res_d` date NOT NULL,
`s_id` int(5) NOT NULL,
`e_id` varchar(5) NOT NULL,
`mem_id` int(6) NOT NULL,
`se_id` varchar(2) NOT NULL,
`t_id` varchar(5)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6;

--
-- Triggers `reservation`
--
DELIMITER $$
CREATE TRIGGER `generateSecondId` BEFORE INSERT ON `reservation` FOR EACH ROW BEGIN
  SET @startId = 0;
  SET NEW.`se_id` = (SELECT IFNULL(MAX(`se_id`), @startId) + 1 FROM `reservation`);
END
$$
DELIMITER ;

-- --------------------------------------------------------
--
-- Dumping data for table `booking`
--

INSERT INTO `reservation` (`res_id`,`res_d`,`s_id`,`e_id`,`mem_id`,`se_id`,`t_id`) VALUES
(1, '2015-03-22',9, 1, 18, '',1),
(2, '2015-03-22',9, 2, 42, '',1),
(3, '2015-03-22',9, 2, 13, '',1),
(4, '2015-03-22',9, 3, 35, '',2),
(5, '2015-03-22',9, 4, 68, '',4);

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE IF NOT EXISTS `address` (
`zip_code` int(6) NOT NULL,
`street` varchar(50) NOT NULL,
`city` varchar(30) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`zip_code`,`street`,`city`) VALUES
(670661,'Z Road', 'Chennai'),
(670662,'Y Road', 'Kolkata'),
(670663,'X Road', 'Kochi'),
(670664,'W Road', 'New Delhi'),
(670665,'V Road', 'Chennai'),
(670666,'U Road', 'Kolkata'),
(670667,'T Road', 'Kochi'),
(670668,'S Road', 'New Delhi'),
(670669,'R Road', 'Chennai');
-- --------------------------------------------------------

--
-- Table structure for table `performance`
--

CREATE TABLE IF NOT EXISTS `screening` (
`s_id` int(5) NOT NULL,
  `s_date` date NOT NULL,
  `m_id` int(5) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=54;

--
-- Dumping data for table `performance`
--

INSERT INTO `screening` (`s_id`, `s_date`, `m_id`) VALUES
(1, '2020-03-02', 1),
(2, '2020-02-11', 1),
(3, '2020-03-28', 2),
(4, '2020-03-27', 3),
(5, '2020-03-30', 4),
(6, '2020-03-31', 5);

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

CREATE TABLE IF NOT EXISTS `movie` (
`m_id` int(5) NOT NULL,
`m_title` varchar(50) NOT NULL,
`m_date` date NOT NULL,
`m_director` varchar(20),
`m_cast` varchar(1024),
`m_desc` varchar(1024),
`duration_min` int(5),
`price` float NOT NULL,
`image` varchar(200) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`m_id`, `m_title`, `m_date`, `price`, `image`) VALUES
(1, 'Pirates of the Carribean', '2020-03-18', 60.8, 'https://upload.wikimedia.org/wikipedia/en/8/89/Pirates_of_the_Caribbean_-_The_Curse_of_the_Black_Pearl.png'),
(2, 'Tenet', '2020-03-16', 30, 'https://upload.wikimedia.org/wikipedia/en/1/14/Tenet_movie_poster.jpg'),
(3, 'Intersteller', '2020-03-01', 10, 'https://upload.wikimedia.org/wikipedia/en/b/bc/Interstellar_film_poster.jpg'),
(4,  'The Godfather', '2020-11-01', 15, 'https://upload.wikimedia.org/wikipedia/en/1/1c/Godfather_ver1.jpg'),
(5, 'Kung Fu Hustle', '2020-03-19', 45.5, 'https://upload.wikimedia.org/wikipedia/en/0/00/KungFuHustleHKposter.jpg'),
(6,  'Raiders of the Lost Ark', '2020-11-02', 39, 'https://upload.wikimedia.org/wikipedia/en/thumb/4/4c/Raiders_of_the_Lost_Ark.jpg/220px-Raiders_of_the_Lost_Ark.jpg');



-- --------------------------------------------------------

--
-- Table structure for table `seat`
--

CREATE TABLE IF NOT EXISTS `seat` (
`se_id` int(5) NOT NULL,
`se_no` varchar(5) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6;

--
-- Dumping data for table `seat`
--

INSERT INTO `seat` (`se_id`, `se_no`) VALUES
(1, 'A1'),
(2, 'A1'),
(3, 'B6'),
(4, 'C4'),
(5, 'B3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
 ADD PRIMARY KEY (`e_id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
 ADD PRIMARY KEY (`res_id`), ADD KEY `mem_id` (`mem_id`), ADD KEY `s_id` (`s_id`), ADD KEY `se_id` (`se_id`), ADD KEY `e_id` (`e_id`), ADD KEY`t_id` (`t_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customer`
 ADD PRIMARY KEY (`mem_id`);

--
-- Indexes for table `screening`
--
ALTER TABLE `screening`
 ADD PRIMARY KEY (`s_id`), ADD KEY `m_id` (`m_id`);

--
-- Indexes for table `production`
--
ALTER TABLE `movie`
 ADD PRIMARY KEY (`m_id`), ADD FULLTEXT KEY `m_title` (`m_title`);

--
-- Indexes for table `seat`
--
ALTER TABLE `seat`
 ADD PRIMARY KEY (`se_id`);


--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `reservation`
MODIFY `res_id` int(12) NOT NULL AUTO_INCREMENT;
-- AUTO_INCREMENT for table `seat`
--
ALTER TABLE `seat`
MODIFY `se_id` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customer`
MODIFY `mem_id` int(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `performance`
--
ALTER TABLE `screening`
MODIFY `s_id` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `production`
--
ALTER TABLE `movie`
MODIFY `m_id` int(5) NOT NULL AUTO_INCREMENT;