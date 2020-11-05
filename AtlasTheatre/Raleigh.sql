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
  `zip_code` int(6) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`mem_id`,`username`, `password`,`name`,`zip_code`) VALUES
(1,'rockstar12','PassWord','Ram K',670661),
(2,'movielover90','CoolWord','Narsim K',670662),
(3,'johnmovie1','MovieWord','Warren C',670663),
(4,'coolboy60','TestWord','Charlie C',670664),
(5,'jamesbond007','NoHackPls','Ryan R',670665),
(6,'filmreview101','NotRealPass','Daniel C',670666),
(7,'pewdiepie','MoviePass','Harrison F',670667),
(8,'markiplier404','WordPAss','Kenzel D',670668),
(9,'movie4life','CoolPAss','Jonathon J',670669),
(10,'stevemc','ABCXYZ','Jeremy R',670662);

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
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
`customerid` int(6) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `road` varchar(50) NOT NULL,
  `city` varchar(30) NOT NULL,
  `postcode` varchar(8) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customerid`, `firstname`, `lastname`, `road`, `city`, `postcode`) VALUES
(1, 'Maria', 'Diaz', 'Kignston Av', 'Kiingston', '11111A'),
(2, 'Diego', 'Corrales', 'London Av', 'Kingston', '11111B'),
(3, 'Azaher', 'Sarwar', 'Old Road Av', 'Kingston', '33333A'),
(4, 'Maria', 'Diaz', 'Church Av', 'Kingston', '55555C');

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
(1, '2015-03-02', 1),
(2, '2015-02-11', 1),
(3, '2015-03-28', 1),
(4, '2015-03-27', 1),
(5, '2015-03-30', 2),
(6, '2015-03-31', 6),
(7, '2015-03-27', 1),
(8, '2015-05-08', 1),
(9, '2015-03-25', 2),
(10, '2015-04-29', 3),
(11, '2015-04-09', 4),
(12, '2015-03-24', 4),
(13, '2015-04-19', 5),
(14, '2015-03-01', 5),
(15, '2015-03-20', 6),
(16, '2015-03-26', 6),
(17, '2015-04-09', 6),
(18, '2015-03-24', 7),
(19, '2015-03-20', 7),
(20, '2015-03-27', 7),
(21, '2015-04-16', 7),
(22, '2015-03-31', 8),
(23, '2015-03-02', 8),
(24, '2015-04-17', 8),
(25, '2015-03-25', 9),
(26, '2015-04-16', 9),
(27, '2015-03-08', 10),
(28, '2015-03-31', 10),
(29, '2015-04-03', 10),
(30, '2015-05-22', 10),
(31, '2015-05-16', 11),
(32, '2015-05-16', 11),
(33, '2015-06-10', 13),
(34, '2015-03-06', 13),
(35, '2015-07-10', 14),
(36, '2015-09-18', 14),
(37, '2015-03-01', 14),
(38, '2015-09-10', 15),
(39, '2015-03-21', 15),
(40, '2015-08-06', 15),
(41, '2015-10-23', 15),
(42, '2015-03-19', 16),
(43, '2015-12-09', 16),
(44, '2015-05-25', 16),
(45, '2015-12-15', 17),
(46, '2016-01-14', 17),
(47, '2015-05-15', 18),
(48, '2015-03-23', 18),
(49, '2015-07-09', 20),
(50, '2015-06-06', 20),
(51, '2015-03-23', 20),
(52, '2015-09-22', 21),
(53, '2015-08-15', 21);

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
(1, 'Vivaldi the four seasons - Chamber Orchestra', '2015-03-18', 60.8, 'https://m1.behance.net/rendition/modules/27863541/disp/29b57a61a42ce60f46da339c1e0cfcdc.jpg'),
(2, 'Mrs. Brown''s Boys', '2015-03-16', 30, 'https://lh4.ggpht.com/RxdfDk9w85QGAIZQzoCFqQxUnzgZCKiP6xNNxhwj_2bxMnf0G7gR9ifZVJXIyK-FtITd=w300'),
(3, 'Ross Noble', '2015-03-01', 10, 'http://www.thelowry.com/Images/Brochure45/ross-noble-_main.jpg'),
(4,  'Lee Nelson', '0000-00-00', 15, 'http://www.femalefirst.co.uk/image-library/partners/bang/square/500/l/lee-nelson-2c2f0a582ea8e732bffc1b00d8e4fef64412ab8e.jpg'),
(5, 'American Buffalo', '2015-03-19', 45.5, 'http://s8.postimg.org/duzf1lkfp/AM_BUFF_SQUARE_front_copy.jpg'),
(6,  'Closer', '0000-00-00', 39, 'http://www.jayrecords.com/base/covers/CloserThanEverCover%20250.jpg'),
(7, 'Mozart in concert - Royal Philharmonic Orchestra', '2015-03-01', 55.4, 'http://fc02.deviantart.net/fs70/i/2010/210/8/f/Mozart_CD_Cover_by_Dicloniusx.jpg'),
(8,'The Nutcracker ', '2015-03-21', 36, 'http://cps-static.rovicorp.com/3/JPG_400/MI0002/028/MI0002028260.jpg'),
(9,'The Swan Lake', '0000-00-00', 50.7, 'http://ecx.images-amazon.com/images/I/51%2Bu2HLXxmL._SY300_.jpg'),
(10,'Billy Elliot', '0000-00-00', 61.3, 'http://radiotimesdvds.co.uk/16252-large/billy-elliot-the-original-cast-recording.jpg'),
(11,'The Lion King', '0000-00-00', 45, 'http://s23.postimg.org/p6mz1hmbv/image.jpg'),
(12,'Behind the beautiful forever', '2015-03-03', 37.6, 'http://2.bp.blogspot.com/--cB-6qPXmdo/Tzm6zylJ_II/AAAAAAAABOc/MvT5phqS9tk/s1600/behind-the-beautiful-forevers.jpg'),
(13,'The railway children', '0000-00-00', 25, 'http://s21.postimg.org/6dfesow7b/ndice.jpg'),
(14,'Cinderella', '2015-03-09', 30, 'http://s.cdon.com/media-dynamic/images/product/00/07/45/73/90/3/a28782d3-572f-4139-b9f9-5d522b098332.jpg'),
(15, 'Wicked', '0000-00-00', 38.2, 'http://s8.postimg.org/kndq3wq7p/image.jpg'),
(16, 'Romeo and Juliet', '2015-03-03', 50.3, 'https://www.cballet.org/sites/www.cballet.org/files/imagecache/Medium/page/images/07/11/2012%20-%2009%3A51/1213_R%26J_5x5_IST_web.jpg'),
(17, 'Mamma Mia', '0000-00-00', 58.9, 'http://bigpondmusic.com/images/AlbumCoverArt/312/XXL/Mamma-Mia-The-Movie-Soundtrack3.jpg'),
(18, 'I just updated this', '2015-03-09', 40, 'http://www.cityoflondonsinfonia.co.uk/images/cache/%7BD8E06DCB-21C4-472C-8292-5C3FA4B49598%7D/main.jpg'),
(19, 'Alan Carr', '2015-03-09', 27, 'http://hammersmithapollo.s3.amazonaws.com/img/Alan-Carr-hero-1.jpg');



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