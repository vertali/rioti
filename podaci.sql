-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.6.20 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             9.1.0.4867
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for rioti
CREATE DATABASE IF NOT EXISTS `rioti` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `rioti`;


-- Dumping structure for table rioti.champions
CREATE TABLE IF NOT EXISTS `champions` (
  `id` bigint(20) unsigned NOT NULL,
  `name` varchar(50) NOT NULL,
  `title` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table rioti.champions: ~5 rows (approximately)
/*!40000 ALTER TABLE `champions` DISABLE KEYS */;
INSERT INTO `champions` (`id`, `name`, `title`) VALUES
	(43, 'Karma', 'the Enlightened One'),
	(89, 'Leona', 'the Radiant Dawn'),
	(117, 'Lulu', 'the Fae Sorceress'),
	(201, 'Braum', 'the Heart of the Freljord'),
	(412, 'Thresh', 'the Chain Warden');
/*!40000 ALTER TABLE `champions` ENABLE KEYS */;


-- Dumping structure for table rioti.summoners
CREATE TABLE IF NOT EXISTS `summoners` (
  `id` bigint(20) unsigned NOT NULL,
  `name` varchar(16) NOT NULL,
  `level` int(10) unsigned NOT NULL,
  `server` varchar(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table rioti.summoners: ~0 rows (approximately)
/*!40000 ALTER TABLE `summoners` DISABLE KEYS */;
INSERT INTO `summoners` (`id`, `name`, `level`, `server`) VALUES
	(19376812, 'what ive done', 30, 'eune'),
	(21620473, 'Helvetesvind', 30, 'eune');
/*!40000 ALTER TABLE `summoners` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
