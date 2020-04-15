-- phpMyAdmin SQL Dump
-- version 4.0.10.14
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Jan 26, 2017 at 12:02 AM
-- Server version: 5.6.33-cll-lve
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `amanidis_amanidispatch`
--

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE IF NOT EXISTS `item` (
  `id` int(40) NOT NULL AUTO_INCREMENT,
  `name` text CHARACTER SET utf8 NOT NULL,
  `type_id` int(40) NOT NULL,
  `price` text CHARACTER SET utf8 NOT NULL,
  `description` text CHARACTER SET utf8 NOT NULL,
  `image_name` text CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`),
  KEY `type_id` (`type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `name`, `type_id`, `price`, `description`, `image_name`) VALUES
(10, 'AFIA Mango (500ml)', 17, '2800', 'Fruity drink', 'Images/afia-tropical-carrot.jpg'),
(11, 'AFIA Apple (500ml)', 17, '2800', 'Fruity drink', 'Images/afia-tropical-carrot.jpg'),
(12, 'AFIA Orange (500ml)', 17, '2800', 'Fruity drink', 'Images/afia-tropical-carrot.jpg'),
(16, 'RANI Float Mango (240ml)', 18, '3000', 'Fruity drink', 'Images/randi float.jpg'),
(17, 'RANI Float Pineapple (240ml)', 18, '3000', 'Fruity drink', 'Images/randi float.jpg'),
(18, 'RANI Float Orange (240ml)', 18, '3000', 'Fruity drink', 'Images/randi float.jpg'),
(19, 'RANI Float Peach (240ml)', 18, '3000', 'Fruity drink', 'Images/randi float.jpg'),
(20, 'PICK ''N'' PEEL Mango (1litre)', 19, '7000', '100% Natural Juice', 'Images/Pick N peel.jpg'),
(21, 'PICK ''N'' PEEL Orange (1litre)', 19, '7000', '100% Natural Juice', 'Images/Pick N peel.jpg');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `item_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `type_of_item` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
