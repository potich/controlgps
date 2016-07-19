-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         5.5.32 - MySQL Community Server (GPL)
-- SO del servidor:              Win32
-- HeidiSQL Versión:             9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;




-- Volcando estructura para tabla controlgps.brand_device
CREATE TABLE IF NOT EXISTS `brand_device` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `active` bit(1) DEFAULT b'1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla controlgps.car
CREATE TABLE IF NOT EXISTS `car` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `licence` varchar(50) NOT NULL,
  `telephone_number` varchar(60) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `device_id` int(11) DEFAULT NULL,
  `active` bit(1) DEFAULT b'1',
  PRIMARY KEY (`id`),
  KEY `FKUserCarLicence_UserId` (`user_id`),
  KEY `FKDevice_DeviceCarLicenceId` (`device_id`),
  CONSTRAINT `FKDevice_DeviceCarLicenceId` FOREIGN KEY (`device_id`) REFERENCES `device` (`id`),
  CONSTRAINT `FKUserCarLicence_UserId` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla controlgps.configuracion
CREATE TABLE IF NOT EXISTS `configuracion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `value` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla controlgps.device
CREATE TABLE IF NOT EXISTS `device` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `RESET_GPS` varchar(255) NOT NULL,
  `OFF_IBUTTON` varchar(255) NOT NULL,
  `ON_IBUTTON` varchar(255) NOT NULL,
  `active` bit(1) NOT NULL DEFAULT b'1',
  PRIMARY KEY (`id`),
  KEY `FKBrandDevice_BrandId` (`brand_id`),
  CONSTRAINT `FKBrandDevice_BrandId` FOREIGN KEY (`brand_id`) REFERENCES `brand_device` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla controlgps.migration
CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla controlgps.report
CREATE TABLE IF NOT EXISTS `report` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(70) DEFAULT NULL,
  `description` text,
  `typereport_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `active` bit(1) DEFAULT b'1',
  PRIMARY KEY (`id`),
  KEY `FKTypeReport_typereport` (`typereport_id`),
  CONSTRAINT `FKTypeReport_typereport` FOREIGN KEY (`typereport_id`) REFERENCES `type_report` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla controlgps.rol
CREATE TABLE IF NOT EXISTS `rol` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla controlgps.server
CREATE TABLE IF NOT EXISTS `server` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `url` varchar(200) NOT NULL,
  `ip` varchar(200) DEFAULT NULL,
  `active` bit(1) DEFAULT b'1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla controlgps.server_report
CREATE TABLE IF NOT EXISTS `server_report` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `report_id` int(11) NOT NULL DEFAULT '0',
  `server_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FKServer_serverid` (`server_id`),
  KEY `FKReport_reportid` (`report_id`),
  CONSTRAINT `FKServer_serverid` FOREIGN KEY (`server_id`) REFERENCES `server` (`id`),
  CONSTRAINT `FKReport_reportid` FOREIGN KEY (`report_id`) REFERENCES `report` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla controlgps.type_report
CREATE TABLE IF NOT EXISTS `type_report` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla controlgps.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `server_id` int(11) DEFAULT NULL,
  `rol_id` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  KEY `FKServerId_id` (`server_id`),
  KEY `FKUser_RolId` (`rol_id`),
  CONSTRAINT `FKServerId_id` FOREIGN KEY (`server_id`) REFERENCES `server` (`id`),
  CONSTRAINT `FKUser_RolId` FOREIGN KEY (`rol_id`) REFERENCES `rol` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla controlgps.video
CREATE TABLE IF NOT EXISTS `video` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `link_youtube` varchar(300) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `server_id` int(11) DEFAULT NULL,
  `active` bit(1) DEFAULT b'1',
  PRIMARY KEY (`id`),
  KEY `FKServerVideoId_ServerId` (`server_id`),
  CONSTRAINT `FKServerVideoId_ServerId` FOREIGN KEY (`server_id`) REFERENCES `server` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
