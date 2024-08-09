-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.35 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.8.0.6908
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

-- Dumping data for table lushlanka.admin: ~0 rows (approximately)
INSERT INTO `admin` (`email`, `fname`, `iname`, `verification_code`) VALUES
	('kowshallagayanga@gmail.com', 'gayanga', 'kowshalla', NULL);

-- Dumping structure for table lushlanka.brand
DROP TABLE IF EXISTS `brand`;
CREATE TABLE IF NOT EXISTS `brand` (
  `brand_id` int NOT NULL AUTO_INCREMENT,
  `brand_name` varchar(20) NOT NULL,
  PRIMARY KEY (`brand_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table lushlanka.brand: ~0 rows (approximately)
INSERT INTO `brand` (`brand_id`, `brand_name`) VALUES
	(3, 'Apple'),
	(4, 'Dell'),
	(5, 'HP'),
	(6, 'Lenovo'),
	(7, 'Acer'),
	(8, 'ASUS'),
	(9, 'Microsoft'),
	(10, 'Samsung'),
	(11, 'LG'),
	(12, 'MSI'),
	(13, 'Razer'),
	(14, 'Corsair'),
	(15, 'Gigabyte'),
	(16, 'Intel'),
	(17, 'AMD'),
	(18, 'NVIDIA'),
	(19, 'Sony'),
	(20, 'Toshiba'),
	(21, 'Alienware'),
	(22, 'Logitech');

-- Dumping structure for table lushlanka.cart
DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `cart_id` int NOT NULL AUTO_INCREMENT,
  `qty` int NOT NULL,
  `user_id` int NOT NULL,
  `stock_stock_id` int NOT NULL,
  `product_id` int NOT NULL,
  PRIMARY KEY (`cart_id`),
  KEY `fk_cart_user1` (`user_id`),
  KEY `fk_cart_stock1` (`stock_stock_id`),
  KEY `fk_cart_product1` (`product_id`),
  CONSTRAINT `fk_cart_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  CONSTRAINT `fk_cart_stock1` FOREIGN KEY (`stock_stock_id`) REFERENCES `stock` (`stock_id`),
  CONSTRAINT `fk_cart_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table lushlanka.cart: ~0 rows (approximately)

-- Dumping structure for table lushlanka.category
DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `path` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table lushlanka.category: ~0 rows (approximately)
INSERT INTO `category` (`id`, `cat_name`, `path`) VALUES
	(1, 'LAPTOP', 'img\\1 (1).jpg'),
	(2, 'ALL Laptop Accessories', 'img\\2.jpg'),
	(4, 'ALL Desktop', 'img\\3.jpg'),
	(5, 'Printers', 'img\\6.jpg'),
	(6, 'Toners', 'img\\7.jpg'),
	(7, 'UPS', 'img\\8.jpg'),
	(8, 'Action Camera,& Powerbank', 'img\\9.jpg'),
	(9, 'Home & Kitchen Appliances', 'img\\12.jpg'),
	(10, 'Gaming Chair', 'img\\10.jpg');

-- Dumping structure for table lushlanka.color
DROP TABLE IF EXISTS `color`;
CREATE TABLE IF NOT EXISTS `color` (
  `color_id` int NOT NULL AUTO_INCREMENT,
  `color_name` varchar(20) NOT NULL,
  PRIMARY KEY (`color_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table lushlanka.color: ~0 rows (approximately)
INSERT INTO `color` (`color_id`, `color_name`) VALUES
	(1, 'Black'),
	(2, 'White');

-- Dumping structure for table lushlanka.condition
DROP TABLE IF EXISTS `condition`;
CREATE TABLE IF NOT EXISTS `condition` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table lushlanka.condition: ~0 rows (approximately)
INSERT INTO `condition` (`id`, `name`) VALUES
	(1, 'BrandNew'),
	(2, 'Used');

-- Dumping structure for table lushlanka.feedback
DROP TABLE IF EXISTS `feedback`;
CREATE TABLE IF NOT EXISTS `feedback` (
  `id` int NOT NULL AUTO_INCREMENT,
  `type` varchar(45) NOT NULL,
  `feedback` text NOT NULL,
  `date` datetime NOT NULL,
  `product_id` int NOT NULL,
  `user_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_feedback_user1` (`user_id`),
  KEY `fk_feedback_product1` (`product_id`),
  CONSTRAINT `fk_feedback_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  CONSTRAINT `fk_feedback_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table lushlanka.feedback: ~0 rows (approximately)

-- Dumping structure for table lushlanka.invoice
DROP TABLE IF EXISTS `invoice`;
CREATE TABLE IF NOT EXISTS `invoice` (
  `id` int NOT NULL AUTO_INCREMENT,
  `order_id` varchar(45) NOT NULL,
  `date` datetime NOT NULL,
  `total` double NOT NULL,
  `qty` int NOT NULL,
  `status` int NOT NULL,
  `product_id` int NOT NULL,
  `user_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_invoice_user1` (`user_id`),
  KEY `fk_invoice_product1` (`product_id`),
  CONSTRAINT `fk_invoice_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
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
  KEY `fk_order_history_user1` (`user_id`),
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
  KEY `fk_order_item_order_history1` (`order_history_ohid`),
  KEY `fk_order_item_stock1` (`stock_id`),
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
  `datetime_added` datetime DEFAULT NULL,
  `delivery_fee_colombo` double DEFAULT NULL,
  `delivery_fee_other` double DEFAULT NULL,
  `brand_id` int NOT NULL,
  `color_id` int NOT NULL,
  `category_id` int NOT NULL,
  `size_id` int NOT NULL,
  `Condition_id` int NOT NULL,
  `status_id` int NOT NULL,
  `model_has_brand_id` int NOT NULL,
  `price` varchar(70) DEFAULT NULL,
  `path` varchar(200) DEFAULT NULL,
  `qty` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_product_brand1` (`brand_id`),
  KEY `fk_product_color1` (`color_id`),
  KEY `fk_product_category1` (`category_id`),
  KEY `fk_product_size1` (`size_id`),
  KEY `fk_product_Condition1` (`Condition_id`),
  KEY `fk_product_status1` (`status_id`),
  KEY `fk_product_model_has_brand1` (`model_has_brand_id`),
  CONSTRAINT `fk_product_brand1` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`brand_id`),
  CONSTRAINT `fk_product_category1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  CONSTRAINT `fk_product_color1` FOREIGN KEY (`color_id`) REFERENCES `color` (`color_id`),
  CONSTRAINT `fk_product_Condition1` FOREIGN KEY (`Condition_id`) REFERENCES `condition` (`id`),
  CONSTRAINT `fk_product_model_has_brand1` FOREIGN KEY (`model_has_brand_id`) REFERENCES `model_has_brand` (`id`),
  CONSTRAINT `fk_product_size1` FOREIGN KEY (`size_id`) REFERENCES `size` (`size_id`),
  CONSTRAINT `fk_product_status1` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table lushlanka.product: ~0 rows (approximately)
INSERT INTO `product` (`id`, `name`, `description`, `datetime_added`, `delivery_fee_colombo`, `delivery_fee_other`, `brand_id`, `color_id`, `category_id`, `size_id`, `Condition_id`, `status_id`, `model_has_brand_id`, `price`, `path`, `qty`) VALUES
	(1, 'Msi ', 'Srilanka Best Laptop', '2024-08-09 16:29:44', 100, 250, 12, 1, 1, 2, 1, 1, 1, '180000', 'Resources\\productimg\\66aca29de12d5.jpg', '5');

-- Dumping structure for table lushlanka.size
DROP TABLE IF EXISTS `size`;
CREATE TABLE IF NOT EXISTS `size` (
  `size_id` int NOT NULL AUTO_INCREMENT,
  `size_name` varchar(100) NOT NULL,
  PRIMARY KEY (`size_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table lushlanka.size: ~0 rows (approximately)
INSERT INTO `size` (`size_id`, `size_name`) VALUES
	(1, '8Gb'),
	(2, '16GB');

-- Dumping structure for table lushlanka.stock
DROP TABLE IF EXISTS `stock`;
CREATE TABLE IF NOT EXISTS `stock` (
  `stock_id` int NOT NULL AUTO_INCREMENT,
  `price` double NOT NULL,
  `qty` int NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `product_id` int NOT NULL,
  PRIMARY KEY (`stock_id`),
  KEY `fk_stock_product1` (`product_id`),
  CONSTRAINT `fk_stock_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table lushlanka.stock: ~0 rows (approximately)

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
  `img_path` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `v_code` text,
  PRIMARY KEY (`id`),
  KEY `fk_user_user_type` (`user_type_id`),
  CONSTRAINT `fk_user_user_type` FOREIGN KEY (`user_type_id`) REFERENCES `user_type` (`utype_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table lushlanka.user: ~0 rows (approximately)
INSERT INTO `user` (`id`, `fname`, `lname`, `email`, `mobile`, `username`, `password`, `status`, `user_type_id`, `no`, `line_1`, `line_2`, `img_path`, `v_code`) VALUES
	(1, 'gayanga', 'kowshalla', 'kowshallagayanga@gmail.com', '0770691283', 'gayanga', 'gayanga2005', 1, 1, '20', 'Godakanda', 'galle', 'Resources/ProfileImg//66b5ef5734603.png', NULL),
	(2, 'kishan', 'kavinda', 'kishankavinda@gmail.com', '0715250306', 'kishan', 'kishan1234', 1, 2, '40', 'galle', 'karapitiya', NULL, NULL);

-- Dumping structure for table lushlanka.user_type
DROP TABLE IF EXISTS `user_type`;
CREATE TABLE IF NOT EXISTS `user_type` (
  `utype_id` int NOT NULL AUTO_INCREMENT,
  `type` varchar(20) NOT NULL,
  PRIMARY KEY (`utype_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table lushlanka.user_type: ~0 rows (approximately)
INSERT INTO `user_type` (`utype_id`, `type`) VALUES
	(1, 'Admin'),
	(2, 'Users');

-- Dumping structure for table lushlanka.watchlist
DROP TABLE IF EXISTS `watchlist`;
CREATE TABLE IF NOT EXISTS `watchlist` (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_id` int NOT NULL,
  `user_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_watchlist_product1` (`product_id`),
  KEY `fk_watchlist_user1` (`user_id`),
  CONSTRAINT `fk_watchlist_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  CONSTRAINT `fk_watchlist_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table lushlanka.watchlist: ~0 rows (approximately)

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
