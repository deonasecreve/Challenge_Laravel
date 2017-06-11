-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server versie:                10.1.22-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Versie:              9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Databasestructuur van challenge wordt geschreven
CREATE DATABASE IF NOT EXISTS `challenge` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `challenge`;

-- Structuur van  tabel challenge.exams wordt geschreven
CREATE TABLE IF NOT EXISTS `exams` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `time` datetime DEFAULT CURRENT_TIMESTAMP,
  `examiner` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `examiner` (`examiner`),
  CONSTRAINT `exams_ibfk_1` FOREIGN KEY (`examiner`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumpen data van tabel challenge.exams: ~0 rows (ongeveer)
/*!40000 ALTER TABLE `exams` DISABLE KEYS */;
INSERT INTO `exams` (`id`, `name`, `time`, `examiner`) VALUES
	(1, 'biologie', '2017-06-11 16:29:54', 1);
/*!40000 ALTER TABLE `exams` ENABLE KEYS */;

-- Structuur van  tabel challenge.exam_user wordt geschreven
CREATE TABLE IF NOT EXISTS `exam_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `exam_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `exam_id` (`exam_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `exam_user_ibfk_1` FOREIGN KEY (`exam_id`) REFERENCES `exams` (`id`),
  CONSTRAINT `exam_user_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumpen data van tabel challenge.exam_user: ~0 rows (ongeveer)
/*!40000 ALTER TABLE `exam_user` DISABLE KEYS */;
INSERT INTO `exam_user` (`id`, `exam_id`, `user_id`) VALUES
	(1, 1, 2);
/*!40000 ALTER TABLE `exam_user` ENABLE KEYS */;

-- Structuur van  tabel challenge.migrations wordt geschreven
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumpen data van tabel challenge.migrations: ~2 rows (ongeveer)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Structuur van  tabel challenge.password_resets wordt geschreven
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumpen data van tabel challenge.password_resets: ~0 rows (ongeveer)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Structuur van  tabel challenge.users wordt geschreven
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` int(10) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumpen data van tabel challenge.users: ~2 rows (ongeveer)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
	(1, 'Luke', 'luke@paradoxis.nl', '$2y$10$uq239BuAQCEIOf67YysF6O3ZY5rZXkEeXCXjggc0Zdc4eXbwOtA4W', '371xMzyxSnVoLuF3odDgUKgN20GHfa6S85Lw2dUJYfA8RH0DAIr9Ml3WWux5', '2017-06-11 12:35:32', '2017-06-11 12:35:32', 2),
	(2, 'Deona', 'deona.secreve@outlook.com', '$2y$10$73Ew5NRdz74gSt59yrvm3O0fs/GCJeXsHyRO9zOmgKRLm5GvWSj5y', 'UEXHpyqYiN1dsWqu93mDXoYQZjeNnK7dFjYi3XUReUZFosEp5Z8EBAHd0a2Y', '2017-06-11 14:15:57', '2017-06-11 14:15:57', 1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
