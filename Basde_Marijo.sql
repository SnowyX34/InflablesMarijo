-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.27-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.3.0.6589
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para inflablesmarijo
CREATE DATABASE IF NOT EXISTS `inflablesmarijo` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci */;
USE `inflablesmarijo`;

-- Volcando estructura para tabla inflablesmarijo.eventoscalendar
CREATE TABLE IF NOT EXISTS `eventoscalendar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `evento` varchar(250) DEFAULT NULL,
  `brincolin` varchar(50) DEFAULT NULL,
  `color_evento` varchar(20) DEFAULT NULL,
  `fecha_inicio` varchar(20) DEFAULT NULL,
  `fecha_fin` varchar(20) DEFAULT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `usuario_id` (`usuario_id`)
) ENGINE=MyISAM AUTO_INCREMENT=74 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Volcando datos para la tabla inflablesmarijo.eventoscalendar: 9 rows
/*!40000 ALTER TABLE `eventoscalendar` DISABLE KEYS */;
INSERT IGNORE INTO `eventoscalendar` (`id`, `evento`, `brincolin`, `color_evento`, `fecha_inicio`, `fecha_fin`, `usuario_id`) VALUES
	(51, 'Mi Primera Prueba', NULL, NULL, '2021-07-07', '2021-07-08', NULL),
	(52, 'Mi Segunda Prueba', NULL, NULL, '2021-07-17', '2021-07-18', NULL),
	(53, 'Mi Tercera Prueba', NULL, NULL, '2021-07-03', '2021-07-04', NULL),
	(67, 'B5', 'Brincolin 5', '#2196F3', '2023-07-29', '2023-07-29', NULL),
	(70, 'Id6.1', 'Brincolin 1', '#FF5722', '2023-08-24', '2023-08-24', 6),
	(69, 'Id6', 'Brincolin 2', '#FFC107', '2023-08-19', '2023-08-19', 6),
	(71, 'Id5', 'Brincolin 1', '#FF5722', '2023-08-17', '2023-08-17', 5),
	(72, 'Id5.1', 'Brincolin 1', '#FF5722', '2023-08-11', '2023-08-11', 5),
	(73, 'Id5.2', 'Brincolin 4', '#009688', '2023-08-22', '2023-08-22', 5);
/*!40000 ALTER TABLE `eventoscalendar` ENABLE KEYS */;

-- Volcando estructura para tabla inflablesmarijo.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_User` int(11) NOT NULL AUTO_INCREMENT,
  `correo_electronico` varchar(100) NOT NULL,
  `contrasena` varchar(100) NOT NULL,
  `nombre_completo` varchar(100) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `numero_telefono` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_User`) USING BTREE,
  UNIQUE KEY `correo_electronico` (`correo_electronico`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Volcando datos para la tabla inflablesmarijo.usuarios: ~7 rows (aproximadamente)
INSERT IGNORE INTO `usuarios` (`id_User`, `correo_electronico`, `contrasena`, `nombre_completo`, `direccion`, `numero_telefono`) VALUES
	(1, 'admin@gmail.com', 'admon', 'Admin', 'Admin', '4493494587'),
	(2, 'chargers784@gmail.com', 'chavoloco', 'Chavo Loco', 'Colotlan 232', '3456657'),
	(3, 'perlafragoso@outlook.com', 'perlafragoso', 'Perla Fragoso', 'Durango, Durango', '618353468'),
	(5, 'perlafragoso@gamail.com', 'perla', 'Perla Rodriguez', 'Durango, Ags', '6183252323'),
	(6, 'omar_rodfrag@hotmail.com', 'omar23', 'Omar Rodriguez Fragoso', 'Rincon Verde #217', '234325345'),
	(8, 'ulisesfloresmtz7@gmail.com', 'perlafragoso', 'UlisesS Flores Martinez', 'asxa', '23123'),
	(14, 'juanma@gmail.com', '123456', 'juama', 'holas', '2345');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
