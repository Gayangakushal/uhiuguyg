-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.35 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.6.0.6765
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for lushlanka
DROP DATABASE IF EXISTS `lushlanka`;
CREATE DATABASE IF NOT EXISTS `lushlanka` /*!40100 DEFAULT CHARACTER SET utf8mb3 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `lushlanka`;

-- Dumping structure for table lushlanka.admin
DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `email` varchar(100) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `iname` varchar(45) DEFAULT NULL,
  `verification_code` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table lushlanka.admin: ~2 rows (approximately)
INSERT INTO `admin` (`email`, `fname`, `iname`, `verification_code`) VALUES
	('kowshallagayanga@gmail.com', 'gayanga', 'kushal', '66a9244e9ab56'),
	('tilankahirusha@gmail.com', 'kishan', 'Kavinda', '66a7cca11cbac');

-- Dumping structure for table lushlanka.brand
DROP TABLE IF EXISTS `brand`;
CREATE TABLE IF NOT EXISTS `brand` (
  `brand_id` int NOT NULL AUTO_INCREMENT,
  `brand_name` varchar(20) NOT NULL,
  PRIMARY KEY (`brand_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table lushlanka.brand: ~4 rows (approximately)
INSERT INTO `brand` (`brand_id`, `brand_name`) VALUES
	(1, 'Apple'),
	(2, 'Dell'),
	(3, 'HP'),
	(4, 'Lenovo'),
	(5, 'Microsoft'),
	(6, 'Samsung'),
	(7, 'Asus'),
	(8, 'Acer'),
	(9, 'MSI'),
	(10, 'Gigabyte');

-- Dumping structure for table lushlanka.cart
DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `cart_id` int NOT NULL AUTO_INCREMENT,
  `cart_qty` int NOT NULL,
  `user_id` int NOT NULL,
  `stock_stock_id` int NOT NULL,
  PRIMARY KEY (`cart_id`),
  KEY `fk_cart_user1_idx` (`user_id`),
  KEY `fk_cart_stock1_idx` (`stock_stock_id`),
  CONSTRAINT `fk_cart_stock1` FOREIGN KEY (`stock_stock_id`) REFERENCES `stock` (`stock_id`),
  CONSTRAINT `fk_cart_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table lushlanka.cart: ~0 rows (approximately)

-- Dumping structure for table lushlanka.category
DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `cat_id` int NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table lushlanka.category: ~15 rows (approximately)
INSERT INTO `category` (`cat_id`, `cat_name`) VALUES
	(1, 'Processors'),
	(2, 'Motherboards'),
	(3, 'Memory'),
	(4, 'Graphics Cards'),
	(5, 'Storage'),
	(6, 'Power Supplies'),
	(7, 'Cases'),
	(8, 'Cooling Systems'),
	(9, 'Optical Drives'),
	(10, 'Network Cards'),
	(11, 'Sound Cards'),
	(12, 'Peripherals'),
	(13, 'Accessories'),
	(14, 'Pc'),
	(15, 'Laptop');

-- Dumping structure for table lushlanka.color
DROP TABLE IF EXISTS `color`;
CREATE TABLE IF NOT EXISTS `color` (
  `color_id` int NOT NULL AUTO_INCREMENT,
  `color_name` varchar(20) NOT NULL,
  PRIMARY KEY (`color_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table lushlanka.color: ~10 rows (approximately)
INSERT INTO `color` (`color_id`, `color_name`) VALUES
	(1, 'black'),
	(2, 'White'),
	(3, 'Silver'),
	(4, 'Gray'),
	(5, 'Blue'),
	(6, 'Red'),
	(7, 'Green'),
	(8, 'Purple'),
	(9, 'Orange'),
	(10, 'Gold');

-- Dumping structure for table lushlanka.condition
DROP TABLE IF EXISTS `condition`;
CREATE TABLE IF NOT EXISTS `condition` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table lushlanka.condition: ~2 rows (approximately)
INSERT INTO `condition` (`id`, `name`) VALUES
	(1, 'Brandnew'),
	(2, 'Used');

-- Dumping structure for table lushlanka.images
DROP TABLE IF EXISTS `images`;
CREATE TABLE IF NOT EXISTS `images` (
  `code` varchar(100) NOT NULL,
  `product_id` int NOT NULL,
  PRIMARY KEY (`code`),
  KEY `fk_images_product1_idx` (`product_id`),
  CONSTRAINT `fk_images_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table lushlanka.images: ~0 rows (approximately)

-- Dumping structure for table lushlanka.invoice
DROP TABLE IF EXISTS `invoice`;
CREATE TABLE IF NOT EXISTS `invoice` (
  `id` int NOT NULL AUTO_INCREMENT,
  `order_id` varchar(45) NOT NULL,
  `date` datetime NOT NULL,
  `total` double NOT NULL,
  `qty` int NOT NULL,
  `status` int NOT NULL,
  `user_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_invoice_user1_idx` (`user_id`),
  CONSTRAINT `fk_invoice_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table lushlanka.invoice: ~0 rows (approximately)

-- Dumping structure for table lushlanka.order_history
DROP TABLE IF EXISTS `order_history`;
CREATE TABLE IF NOT EXISTS `order_history` (
  `ohid` int NOT NULL AUTO_INCREMENT,
  `order_id` text NOT NULL,
  `order_date` datetime NOT NULL,
  `amount` double NOT NULL,
  `user_id` int NOT NULL,
  PRIMARY KEY (`ohid`),
  KEY `fk_order_history_user1_idx` (`user_id`),
  CONSTRAINT `fk_order_history_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table lushlanka.order_history: ~0 rows (approximately)

-- Dumping structure for table lushlanka.order_item
DROP TABLE IF EXISTS `order_item`;
CREATE TABLE IF NOT EXISTS `order_item` (
  `oid` int NOT NULL AUTO_INCREMENT,
  `oi_qty` int NOT NULL,
  `order_history_ohid` int NOT NULL,
  `stock_id` int NOT NULL,
  PRIMARY KEY (`oid`),
  KEY `fk_order_item_order_history1_idx` (`order_history_ohid`),
  KEY `fk_order_item_stock1_idx` (`stock_id`),
  CONSTRAINT `fk_order_item_order_history1` FOREIGN KEY (`order_history_ohid`) REFERENCES `order_history` (`ohid`),
  CONSTRAINT `fk_order_item_stock1` FOREIGN KEY (`stock_id`) REFERENCES `stock` (`stock_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table lushlanka.order_item: ~0 rows (approximately)

-- Dumping structure for table lushlanka.product
DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `path` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `brand_id` int NOT NULL,
  `color_id` int NOT NULL,
  `category_id` int NOT NULL,
  `size_id` int NOT NULL,
  `Condition_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_product_brand1_idx` (`brand_id`),
  KEY `fk_product_color1_idx` (`color_id`),
  KEY `fk_product_category1_idx` (`category_id`),
  KEY `fk_product_size1_idx` (`size_id`),
  KEY `fk_product_Condition1_idx` (`Condition_id`),
  CONSTRAINT `fk_product_brand1` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`brand_id`),
  CONSTRAINT `fk_product_category1` FOREIGN KEY (`category_id`) REFERENCES `category` (`cat_id`),
  CONSTRAINT `fk_product_color1` FOREIGN KEY (`color_id`) REFERENCES `color` (`color_id`),
  CONSTRAINT `fk_product_Condition1` FOREIGN KEY (`Condition_id`) REFERENCES `condition` (`id`),
  CONSTRAINT `fk_product_size1` FOREIGN KEY (`size_id`) REFERENCES `size` (`size_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table lushlanka.product: ~5 rows (approximately)
INSERT INTO `product` (`id`, `name`, `description`, `path`, `brand_id`, `color_id`, `category_id`, `size_id`, `Condition_id`) VALUES
	(1, 'ASUS Vivobook 15 \'A1504VA', 'ASUS Vivobook 15 A1504VA I5-1335U|16GB|512GB|DOS', 'Resources\\productimg\\370.jpg', 7, 1, 15, 21, 1),
	(2, 'Victus Gaming Laptop 16-s1023dx', 'Victus Gaming Laptop 16-s1023dx R7 8840H|16GB|512GB|RTX 4070', 'Resources\\productimg\\193.jpg', 9, 2, 15, 22, 1),
	(3, 'ASUS TUF Gaming F15 \'2022\' FX507ZC4', 'ASUS TUF Gaming F15 FX507ZC4 I5-12500H|16GB|512GB|RTX3050', 'Resources\\productimg\\464.jpg', 7, 2, 15, 22, 1),
	(4, 'MacBook Air \'M1, 2020\'', 'MacBook Air \'M1, 2020\' M1 8-Core CPU 7-core GPU|8GB|256GB|13.3-inch Retina', 'Resources\\productimg\\811.jpg', 1, 1, 15, 21, 1),
	(5, 'Cyborg 15 A13UCX', 'MSI Cyborg 15 A13UCX i7-13620H|16GB|512GB|RTX2050', 'Resources\\productimg\\1189.jpg', 9, 1, 15, 24, 1);

-- Dumping structure for table lushlanka.size
DROP TABLE IF EXISTS `size`;
CREATE TABLE IF NOT EXISTS `size` (
  `size_id` int NOT NULL AUTO_INCREMENT,
  `size_name` varchar(100) NOT NULL,
  PRIMARY KEY (`size_id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table lushlanka.size: ~29 rows (approximately)
INSERT INTO `size` (`size_id`, `size_name`) VALUES
	(1, 'TFX Power Supply'),
	(2, 'Mini ITX'),
	(3, 'Micro ATX'),
	(4, 'ATX'),
	(5, 'E-ATX'),
	(6, 'XL-ATX'),
	(7, '15-inch Monitor'),
	(8, '17-inch Monitor'),
	(9, '19-inch Monitor'),
	(10, '21.5-inch Monitor'),
	(11, '24-inch Monitor'),
	(12, '27-inch Monitor'),
	(13, '32-inch Monitor'),
	(14, '34-inch Ultrawide Monitor'),
	(15, '49-inch Super Ultrawide Monitor'),
	(16, '2.5-inch Storage'),
	(17, '3.5-inch Storage'),
	(18, 'M.2 2280 Storage'),
	(19, 'M.2 2230 Storage'),
	(20, '4GB RAM'),
	(21, '8GB RAM'),
	(22, '16GB RAM'),
	(23, '32GB RAM'),
	(24, '64GB RAM'),
	(25, 'Compact GPU'),
	(26, 'Standard GPU'),
	(27, 'Extended GPU'),
	(28, 'SFX Power Supply'),
	(29, 'ATX Power Supply');

-- Dumping structure for table lushlanka.stock
DROP TABLE IF EXISTS `stock`;
CREATE TABLE IF NOT EXISTS `stock` (
  `stock_id` int NOT NULL AUTO_INCREMENT,
  `price` double NOT NULL,
  `qty` int NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `product_id` int NOT NULL,
  PRIMARY KEY (`stock_id`),
  KEY `fk_stock_product1_idx` (`product_id`),
  CONSTRAINT `fk_stock_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table lushlanka.stock: ~5 rows (approximately)
INSERT INTO `stock` (`stock_id`, `price`, `qty`, `status`, `product_id`) VALUES
	(1, 2000, 1, 1, 1),
	(2, 400000, 5, 1, 2),
	(3, 298000, 10, 1, 3),
	(4, 259900, 15, 1, 4),
	(5, 348000, 6, 1, 5);

-- Dumping structure for table lushlanka.user
DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `email` varchar(45) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(45) NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `user_type_id` int NOT NULL,
  `no` varchar(10) DEFAULT NULL,
  `line_1` varchar(50) DEFAULT NULL,
  `line_2` varchar(50) DEFAULT NULL,
  `img_path` varchar(100) DEFAULT NULL,
  `v_code` text,
  PRIMARY KEY (`id`),
  KEY `fk_user_user_type_idx` (`user_type_id`),
  CONSTRAINT `fk_user_user_type` FOREIGN KEY (`user_type_id`) REFERENCES `user_type` (`utype_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table lushlanka.user: ~0 rows (approximately)
INSERT INTO `user` (`id`, `fname`, `lname`, `email`, `mobile`, `username`, `password`, `status`, `user_type_id`, `no`, `line_1`, `line_2`, `img_path`, `v_code`) VALUES
	(4, 'gayanga', 'kushal', 'kowshallagayanga@gmail.com', '0775250306', 'gayanga', 'gayanga2004', 1, 1, '20', 'Godakanda', 'galle', 'Resources/ProfileImg//66a39b8c1ce74.png', '66a1c9232ef70'),
	(5, 'kishan', 'Kavinda', 'tilankahirusha@gmail.com', '0715250306', 'kishan', 'kishan1234', 1, 2, '56', 'labuduwa', 'galle', 'Resources/ProfileImg//66a5f545b893e.png', NULL),
	(6, 'kumara', 'tilanka', 'kowshalgayanga@gmail.com', '0770486758', 'kumara204', 'kumara1234', 1, 2, '7', 'galle road', 'colombo', 'Resources/ProfileImg//66a759c162895.png', NULL);

-- Dumping structure for table lushlanka.user_type
DROP TABLE IF EXISTS `user_type`;
CREATE TABLE IF NOT EXISTS `user_type` (
  `utype_id` int NOT NULL AUTO_INCREMENT,
  `type` varchar(20) NOT NULL,
  PRIMARY KEY (`utype_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table lushlanka.user_type: ~2 rows (approximately)
INSERT INTO `user_type` (`utype_id`, `type`) VALUES
	(1, 'Admin'),
	(2, 'Users');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
