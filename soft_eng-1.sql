-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2017 at 02:49 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `soft_eng`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`id` int(5) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `image` varchar(200) NOT NULL,
  `fname` varchar(200) NOT NULL,
  `lname` varchar(200) NOT NULL,
  `month` varchar(20) NOT NULL,
  `day` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `address` varchar(200) NOT NULL,
  `contact` bigint(11) NOT NULL,
  `gender` varchar(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `image`, `fname`, `lname`, `month`, `day`, `year`, `address`, `contact`, `gender`, `status`) VALUES
(9, 'adminmain', 'wearkapampangan', 'admin.png', 'wear', 'kapampangan', 'December', 25, 2017, 'angeles, pampanga', 9353812813, 'male', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
`id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `quantity` bigint(11) NOT NULL,
  `price` bigint(20) NOT NULL,
  `size` varchar(11) NOT NULL,
  `user` varchar(30) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `name`, `quantity`, `price`, `size`, `user`) VALUES
(3, 'Utac', 1, 350, 'Small', 'gabo');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
`com_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `user` varchar(100) NOT NULL,
  `pic` varchar(200) NOT NULL,
  `id_prod` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `i_order`
--

CREATE TABLE IF NOT EXISTS `i_order` (
`oi_id` int(5) NOT NULL,
  `quantity` int(11) NOT NULL,
  `dateorder` date NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `i_order`
--

INSERT INTO `i_order` (`oi_id`, `quantity`, `dateorder`) VALUES
(1, 1, '2017-03-17'),
(2, 3, '2017-03-17'),
(3, 1, '2017-03-17'),
(4, 1, '2017-03-17'),
(5, 1, '2017-03-18'),
(6, 3, '2017-03-18'),
(7, 3, '2017-04-17');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
`mem_id` int(5) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `status` int(11) NOT NULL,
  `profile_pic` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=50 ;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`mem_id`, `fname`, `lname`, `gender`, `status`, `profile_pic`) VALUES
(46, 'gabrielle', 'San Buenaventura', 'Female', 1, 'gibs.png'),
(47, 'Tyrone Dale', 'Generalao', 'Male', 1, 'tyrone.jpg'),
(48, 'Jake', 'pacia', 'Male', 1, 'jake.jpg'),
(49, 'Emmanuel', 'Perello', 'Male', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `mem_info`
--

CREATE TABLE IF NOT EXISTS `mem_info` (
`info_id` int(5) NOT NULL,
  `address` varchar(200) NOT NULL,
  `contactnum` bigint(59) NOT NULL,
  `month` varchar(11) NOT NULL,
  `day` int(11) NOT NULL,
  `year` bigint(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=50 ;

--
-- Dumping data for table `mem_info`
--

INSERT INTO `mem_info` (`info_id`, `address`, `contactnum`, `month`, `day`, `year`, `username`, `password`) VALUES
(46, 'goldenland subd. mabiga mabalacat Pampanga', 9066351104, 'November', 4, 1997, 'gabo', '1234'),
(47, 'ninabel', 9358381015, 'October', 15, 1997, 'tygen', '1004'),
(48, 'mauaque', 9353812813, 'May', 19, 1997, 'cjdp', 'jakejake'),
(49, 'Dapdap Bamban Tarlac ', 9485840316, 'March', 25, 1998, 'emkomon', 'pakyu');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
`order_id` int(5) NOT NULL,
  `o_name` varchar(30) NOT NULL,
  `o_price` double NOT NULL,
  `o_size` varchar(30) NOT NULL,
  `status` int(11) NOT NULL,
  `mem_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `o_name`, `o_price`, `o_size`, `status`, `mem_id`) VALUES
(1, 'Utac', 350, 'Small', 1, 11),
(2, 'HDOESNTMATTER', 350, 'Small', 1, 11),
(3, 'Utac', 350, 'Small', 1, 39),
(4, 'Solid', 350, 'Small', 1, 39),
(5, 'Utac', 350, 'Small', 0, 42),
(6, 'Utac', 350, '', 0, 42),
(7, 'Solid', 350, 'Large', 0, 49);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
`id_prod` int(5) NOT NULL,
  `saleprice` varchar(100) NOT NULL,
  `name` varchar(200) NOT NULL,
  `price` int(20) NOT NULL,
  `sale` int(11) NOT NULL,
  `love` int(11) NOT NULL,
  `thumbsup` int(11) NOT NULL,
  `unlike` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id_prod`, `saleprice`, `name`, `price`, `sale`, `love`, `thumbsup`, `unlike`) VALUES
(1, '175', 'HDOESNTMATTER', 350, 1, 8, 1, 0),
(3, '175', 'Wash Day (Black) ', 350, 1, 1, 1, 0),
(4, '270', 'Sisig', 300, 1, 0, 1, 0),
(6, 'Not Sale', 'Solid', 350, 0, 21, 1, 9);

-- --------------------------------------------------------

--
-- Table structure for table `p_image`
--

CREATE TABLE IF NOT EXISTS `p_image` (
`img_id` int(5) NOT NULL,
  `fimage` varchar(200) NOT NULL,
  `bimage` varchar(200) NOT NULL,
  `simage` varchar(200) NOT NULL,
  `stock` int(20) NOT NULL,
  `id_prod` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `p_image`
--

INSERT INTO `p_image` (`img_id`, `fimage`, `bimage`, `simage`, `stock`, `id_prod`) VALUES
(1, 'k.jpg', 'bb.jpg', 'ss.jpg', 97, 0),
(3, 'l.jpg', 'b.jpg', 'ss.jpg', 100, 0),
(4, 'nn.jpg', 'h.jpg', 'oo.jpg', 200, 0),
(6, 'o.jpg', 'f.jpg', 'ss.jpg', 146, 0);

-- --------------------------------------------------------

--
-- Table structure for table `reactions`
--

CREATE TABLE IF NOT EXISTS `reactions` (
`id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `prod` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `reactions`
--

INSERT INTO `reactions` (`id`, `name`, `prod`) VALUES
(6, 'cjdp', 6),
(7, 'cjdp', 4);

-- --------------------------------------------------------

--
-- Table structure for table `theme`
--

CREATE TABLE IF NOT EXISTS `theme` (
`id` int(5) NOT NULL,
  `css` varchar(20) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `theme`
--

INSERT INTO `theme` (`id`, `css`) VALUES
(1, 'Default');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
 ADD PRIMARY KEY (`com_id`);

--
-- Indexes for table `i_order`
--
ALTER TABLE `i_order`
 ADD PRIMARY KEY (`oi_id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
 ADD PRIMARY KEY (`mem_id`);

--
-- Indexes for table `mem_info`
--
ALTER TABLE `mem_info`
 ADD PRIMARY KEY (`info_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
 ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
 ADD PRIMARY KEY (`id_prod`);

--
-- Indexes for table `p_image`
--
ALTER TABLE `p_image`
 ADD PRIMARY KEY (`img_id`);

--
-- Indexes for table `reactions`
--
ALTER TABLE `reactions`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `theme`
--
ALTER TABLE `theme`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `i_order`
--
ALTER TABLE `i_order`
MODIFY `oi_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
MODIFY `mem_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `mem_info`
--
ALTER TABLE `mem_info`
MODIFY `info_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
MODIFY `order_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
MODIFY `id_prod` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `p_image`
--
ALTER TABLE `p_image`
MODIFY `img_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `reactions`
--
ALTER TABLE `reactions`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `theme`
--
ALTER TABLE `theme`
MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
