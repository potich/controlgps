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
-- Volcando datos para la tabla controlgps.brand_device: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `brand_device` DISABLE KEYS */;
INSERT INTO `brand_device` (`id`, `name`, `active`) VALUES
	(1, 'Teltonika', b'1');
/*!40000 ALTER TABLE `brand_device` ENABLE KEYS */;

-- Volcando datos para la tabla controlgps.car: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `car` DISABLE KEYS */;
INSERT INTO `car` (`id`, `licence`, `telephone_number`, `user_id`, `device_id`, `active`) VALUES
	(1, 'IVI761', '+34 695117303', 6, 2, b'1'),
	(2, 'IVO553', '234234234', 6, 1, b'0'),
	(3, 'IVO553', '3423423', 1, 1, b'1');
/*!40000 ALTER TABLE `car` ENABLE KEYS */;

-- Volcando datos para la tabla controlgps.configuracion: ~7 rows (aproximadamente)
/*!40000 ALTER TABLE `configuracion` DISABLE KEYS */;
INSERT INTO `configuracion` (`id`, `name`, `value`) VALUES
	(1, 'FACEBOOK', NULL),
	(2, 'TWITTER', NULL),
	(3, 'YOUTUBE', NULL),
	(4, 'MOVIL_SOPORTE', NULL),
	(5, 'TELEFONO_CONTRATAR_SERVICIO', ''),
	(6, 'TELEFONO_SOPORTE', ''),
	(7, 'URL_DEMOSTRATION', '');
/*!40000 ALTER TABLE `configuracion` ENABLE KEYS */;

-- Volcando datos para la tabla controlgps.device: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `device` DISABLE KEYS */;
INSERT INTO `device` (`id`, `name`, `brand_id`, `RESET_GPS`, `OFF_IBUTTON`, `ON_IBUTTON`, `active`) VALUES
	(1, 'FM 1100', 1, '1234 SETPARAM 1601', '1234 SETPARAM 1601', '1234 SETPARAM 1601', b'1'),
	(2, 'FM 1110', 1, '1234 SETPARAM 1601', '1234 SETPARAM 1601', '1234 SETPARAM 1601', b'1');
/*!40000 ALTER TABLE `device` ENABLE KEYS */;

-- Volcando datos para la tabla controlgps.migration: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `migration` DISABLE KEYS */;
INSERT INTO `migration` (`version`, `apply_time`) VALUES
	('m000000_000000_base', 1467719392),
	('m130524_201442_init', 1467719395);
/*!40000 ALTER TABLE `migration` ENABLE KEYS */;

-- Volcando datos para la tabla controlgps.report: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `report` DISABLE KEYS */;
INSERT INTO `report` (`id`, `title`, `description`, `typereport_id`, `created_at`, `active`) VALUES
	(1, 'Noticia 1', 'la noticia uno es muy peligrosa', 1, '2016-07-05 14:37:23', b'1'),
	(4, 'Amoreroeirie', 'oaipoaisdpoas', 2, NULL, b'0'),
	(5, 'Amoreroeirie', 'oaipoaisdpoas', 2, NULL, b'0'),
	(6, 'leo matioli', 'el tioooooooooooooo', 1, '2016-07-05 18:19:21', b'1'),
	(9, 'dasdasd', 'sdas', 1, '2016-07-18 23:07:31', b'1');
/*!40000 ALTER TABLE `report` ENABLE KEYS */;

-- Volcando datos para la tabla controlgps.rol: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `rol` DISABLE KEYS */;
INSERT INTO `rol` (`id`, `name`) VALUES
	(1, 'ADMIN'),
	(2, 'TECHNICAL'),
	(3, 'CLIENT');
/*!40000 ALTER TABLE `rol` ENABLE KEYS */;

-- Volcando datos para la tabla controlgps.server: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `server` DISABLE KEYS */;
INSERT INTO `server` (`id`, `name`, `url`, `ip`, `active`) VALUES
	(1, 'Servidor 6', 'http://controlgps.com', '192.178.4', b'1'),
	(7, 'sdada', 'sadad', '', b'0');
/*!40000 ALTER TABLE `server` ENABLE KEYS */;

-- Volcando datos para la tabla controlgps.server_report: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `server_report` DISABLE KEYS */;
INSERT INTO `server_report` (`id`, `report_id`, `server_id`) VALUES
	(14, 5, 7),
	(15, 6, 1),
	(22, 1, 1),
	(23, 1, 7),
	(24, 9, 7);
/*!40000 ALTER TABLE `server_report` ENABLE KEYS */;

-- Volcando datos para la tabla controlgps.type_report: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `type_report` DISABLE KEYS */;
INSERT INTO `type_report` (`id`, `name`) VALUES
	(1, 'Rojo'),
	(2, 'Verde'),
	(3, 'Blanco');
/*!40000 ALTER TABLE `type_report` ENABLE KEYS */;

-- Volcando datos para la tabla controlgps.user: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `username`, `password`, `email`, `status`, `server_id`, `rol_id`, `created_at`, `updated_at`, `code`) VALUES
	(1, 'daniel', 'PORONGA', 'daniel@controlgps.com', 10, 1, 1, 0, 1468930603, 'http://pasdasdas.com'),
	(6, 'matias', 'asdasdas', 'blinkero182@gmail.com', 10, 1, 3, 1467737311, 1468930379, 'http://pasdasdas.com');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

-- Volcando datos para la tabla controlgps.video: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `video` DISABLE KEYS */;
INSERT INTO `video` (`id`, `name`, `order`, `link_youtube`, `created_at`, `server_id`, `active`) VALUES
	(1, 'Introducción', 1, 'http://puta.com', '2016-07-18 21:34:40', 7, b'1'),
	(2, '34', 23, 'sadasdwerwerwerwe', '2016-07-18 23:16:06', 1, b'1'),
	(3, 'asdasdsad', 2, 'asdasdsa', '2016-07-18 23:16:29', 1, b'1');
/*!40000 ALTER TABLE `video` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
