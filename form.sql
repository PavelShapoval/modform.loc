-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               5.6.38-log - MySQL Community Server (GPL)
-- Операционная система:         Win32
-- HeidiSQL Версия:              9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Дамп структуры базы данных form
CREATE DATABASE IF NOT EXISTS `form` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `form`;

-- Дамп структуры для таблица form.fields
CREATE TABLE IF NOT EXISTS `fields` (
  `field_id` int(5) NOT NULL AUTO_INCREMENT,
  `form_id` varchar(50) NOT NULL,
  `field_value` text,
  PRIMARY KEY (`field_id`)
) ENGINE=InnoDB AUTO_INCREMENT=119 DEFAULT CHARSET=utf8;

-- Экспортируемые данные не выделены.
-- Дамп структуры для таблица form.forms
CREATE TABLE IF NOT EXISTS `forms` (
  `key_id` int(5) NOT NULL AUTO_INCREMENT,
  `form_id` varchar(50) NOT NULL DEFAULT '0',
  `form_name` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`key_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- Экспортируемые данные не выделены.
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
