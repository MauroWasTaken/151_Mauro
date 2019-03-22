-- --------------------------------------------------------
-- Hôte :                        127.0.0.1
-- Version du serveur:           8.0.12 - MySQL Community Server - GPL
-- SE du serveur:                Win64
-- HeidiSQL Version:             10.1.0.5464
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Listage de la structure de la base pour snows
DROP DATABASE IF EXISTS `snows`;
CREATE DATABASE IF NOT EXISTS `snows` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
USE `snows`;

-- Listage de la structure de la table snows. snowboards
DROP TABLE IF EXISTS `snowboards`;
CREATE TABLE IF NOT EXISTS `snowboards` (
  `id` int(16) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `Code` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `Brand` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `model` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `length` int(3) DEFAULT NULL,
  `price` decimal(6,4) DEFAULT NULL,
  `qtyAvailable` int(11) DEFAULT NULL,
  `picture` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`,`Code`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Listage des données de la table snows.snowboards : ~0 rows (environ)
/*!40000 ALTER TABLE `snowboards` DISABLE KEYS */;
INSERT INTO `snowboards` (`id`, `Code`, `Brand`, `model`, `length`, `price`, `qtyAvailable`, `picture`) VALUES
	(0000000000000001, 'B101', 'Burton', 'Custom', 160, 29.0000, 22, NULL);
INSERT INTO `snowboards` (`id`, `Code`, `Brand`, `model`, `length`, `price`, `qtyAvailable`, `picture`) VALUES
	(0000000000000002, 'B126', 'Burton', 'Free Thinker', 165, 45.0000, 2, NULL);
INSERT INTO `snowboards` (`id`, `Code`, `Brand`, `model`, `length`, `price`, `qtyAvailable`, `picture`) VALUES
	(0000000000000003, 'K266', 'K2', 'Wildheart', 152, 29.0000, 2, NULL);
INSERT INTO `snowboards` (`id`, `Code`, `Brand`, `model`, `length`, `price`, `qtyAvailable`, `picture`) VALUES
	(0000000000000004, 'K409', 'K2', 'Lime Lite', 149, 55.0000, 15, NULL);
INSERT INTO `snowboards` (`id`, `Code`, `Brand`, `model`, `length`, `price`, `qtyAvailable`, `picture`) VALUES
	(0000000000000005, 'N100', 'Nidecker', 'Tracer', 164, 39.0000, 11, NULL);
INSERT INTO `snowboards` (`id`, `Code`, `Brand`, `model`, `length`, `price`, `qtyAvailable`, `picture`) VALUES
	(0000000000000006, 'N754', 'Nidecker', 'Ultralight', 166, 59.0000, 26, NULL);
INSERT INTO `snowboards` (`id`, `Code`, `Brand`, `model`, `length`, `price`, `qtyAvailable`, `picture`) VALUES
	(0000000000000007, 'P067', 'Prior', 'Brandwine 153', 154, 49.0000, 9, NULL);
INSERT INTO `snowboards` (`id`, `Code`, `Brand`, `model`, `length`, `price`, `qtyAvailable`, `picture`) VALUES
	(0000000000000008, 'P165', 'Prior', 'BC Split 161', 169, 35.0000, 1, NULL);
/*!40000 ALTER TABLE `snowboards` ENABLE KEYS */;

-- Listage de la structure de la table snows. users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `userEmailAddress` varchar(256) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `userPsw` varchar(256) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `pseudo` varchar(256) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `userEmailAddress` (`userEmailAddress`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Listage des données de la table snows.users : ~3 rows (environ)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `userEmailAddress`, `userPsw`, `pseudo`, `type`) VALUES
	(1, 'testUser@cpnv.ch', '$2y$10$uh1Wq.u1DmH2toJGUW6oae75r2gPCxBzHwh8TepqPJ9knZv5NjT0S', 'testPseudo', 0);
INSERT INTO `users` (`id`, `userEmailAddress`, `userPsw`, `pseudo`, `type`) VALUES
	(2, 'maurinho@cpnv.ch', '$2y$10$64XGiuZMK/xDYlEq3I/l7ea1zuqperOWKqt11q4KP647BXt2C3cxi', NULL, 1);
INSERT INTO `users` (`id`, `userEmailAddress`, `userPsw`, `pseudo`, `type`) VALUES
	(3, 'asd@asd.asd', '$2y$10$cUaWcV8gAGb7jrrjvsUbnu0AjkQivDb.nYvbF2dwLVII2tTeT6Oci', NULL, 0);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
