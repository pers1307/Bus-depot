/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50538
Source Host           : localhost:3306
Source Database       : bus

Target Server Type    : MYSQL
Target Server Version : 50538
File Encoding         : 65001

Date: 2016-05-18 14:23:17
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for bus
-- ----------------------------
DROP TABLE IF EXISTS `bus`;
CREATE TABLE `bus` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `number` varchar(10) DEFAULT NULL,
  `id_type` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_type` (`id_type`),
  CONSTRAINT `id_type` FOREIGN KEY (`id_type`) REFERENCES `bus_type` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bus
-- ----------------------------
INSERT INTO `bus` VALUES ('1', 'U-100', '3');
INSERT INTO `bus` VALUES ('2', 'U-101', '5');
INSERT INTO `bus` VALUES ('3', 'T-20', '5');
INSERT INTO `bus` VALUES ('4', 'H-54', '3');
INSERT INTO `bus` VALUES ('5', 'T-55', '6');
INSERT INTO `bus` VALUES ('6', 'T-100', '4');
INSERT INTO `bus` VALUES ('7', 'A-1', '2');
INSERT INTO `bus` VALUES ('8', 'A-2', '3');
INSERT INTO `bus` VALUES ('9', 'A-3', '4');
INSERT INTO `bus` VALUES ('10', 'F-600', '6');
INSERT INTO `bus` VALUES ('11', 'TT-200', '4');
INSERT INTO `bus` VALUES ('12', 'TT-99', '4');
INSERT INTO `bus` VALUES ('13', 'Sylvia', '4');
INSERT INTO `bus` VALUES ('14', 'Mersedes', '2');
INSERT INTO `bus` VALUES ('15', 'R-12', '3');

-- ----------------------------
-- Table structure for bus_type
-- ----------------------------
DROP TABLE IF EXISTS `bus_type`;
CREATE TABLE `bus_type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `capacity` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bus_type
-- ----------------------------
INSERT INTO `bus_type` VALUES ('2', 'Особо малый', '10');
INSERT INTO `bus_type` VALUES ('3', 'Малые', '40');
INSERT INTO `bus_type` VALUES ('4', 'Средний', '65');
INSERT INTO `bus_type` VALUES ('5', 'Большой', '110');
INSERT INTO `bus_type` VALUES ('6', 'Особо большой', '150');

-- ----------------------------
-- Table structure for class
-- ----------------------------
DROP TABLE IF EXISTS `class`;
CREATE TABLE `class` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of class
-- ----------------------------
INSERT INTO `class` VALUES ('1', '1 класс (начальный)');
INSERT INTO `class` VALUES ('2', '2 класс (средний)');
INSERT INTO `class` VALUES ('3', '3 класс (высший)');

-- ----------------------------
-- Table structure for driver
-- ----------------------------
DROP TABLE IF EXISTS `driver`;
CREATE TABLE `driver` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_class` int(10) unsigned NOT NULL,
  `start_work_date` datetime NOT NULL,
  `salary` double(10,0) DEFAULT NULL,
  `id_bus` int(11) DEFAULT NULL,
  `id_route` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_class` (`id_class`),
  CONSTRAINT `id_class` FOREIGN KEY (`id_class`) REFERENCES `class` (`id`),
  CONSTRAINT `passport_id` FOREIGN KEY (`id`) REFERENCES `passport_data` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of driver
-- ----------------------------

-- ----------------------------
-- Table structure for flight
-- ----------------------------
DROP TABLE IF EXISTS `flight`;
CREATE TABLE `flight` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `id_driver` int(10) unsigned DEFAULT NULL,
  `wrong` tinyint(4) DEFAULT NULL,
  `id_reason` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_flight` (`id_driver`),
  CONSTRAINT `id_flight` FOREIGN KEY (`id_driver`) REFERENCES `driver` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of flight
-- ----------------------------

-- ----------------------------
-- Table structure for migration
-- ----------------------------
DROP TABLE IF EXISTS `migration`;
CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of migration
-- ----------------------------
INSERT INTO `migration` VALUES ('m000000_000000_base', '1463478271');
INSERT INTO `migration` VALUES ('m130524_201442_init', '1463478281');

-- ----------------------------
-- Table structure for passport_data
-- ----------------------------
DROP TABLE IF EXISTS `passport_data`;
CREATE TABLE `passport_data` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `patronymic` varchar(255) DEFAULT NULL,
  `surname` varchar(255) NOT NULL,
  `birth` datetime DEFAULT NULL,
  `
issued` text,
  `when` datetime DEFAULT NULL,
  `series` varchar(255) DEFAULT NULL,
  `number` varchar(255) DEFAULT NULL,
  `address` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of passport_data
-- ----------------------------

-- ----------------------------
-- Table structure for reason
-- ----------------------------
DROP TABLE IF EXISTS `reason`;
CREATE TABLE `reason` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of reason
-- ----------------------------
INSERT INTO `reason` VALUES ('1', 'Поломка автобуса');
INSERT INTO `reason` VALUES ('2', 'Заболел водитель');
INSERT INTO `reason` VALUES ('3', 'Маршрут блокирован');
INSERT INTO `reason` VALUES ('4', 'Погодные условия');

-- ----------------------------
-- Table structure for route
-- ----------------------------
DROP TABLE IF EXISTS `route`;
CREATE TABLE `route` (
  `id` int(11) NOT NULL,
  `number` varchar(255) DEFAULT NULL,
  `start_id_station` int(10) unsigned DEFAULT NULL,
  `end_id_station` int(10) unsigned DEFAULT NULL,
  `start_time` datetime DEFAULT NULL,
  `end_time` datetime DEFAULT NULL,
  `interval` double DEFAULT NULL,
  `
duration` double DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_start` (`start_id_station`),
  KEY `id_end` (`end_id_station`),
  CONSTRAINT `id_end` FOREIGN KEY (`end_id_station`) REFERENCES `station` (`id`),
  CONSTRAINT `id_start` FOREIGN KEY (`start_id_station`) REFERENCES `station` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of route
-- ----------------------------

-- ----------------------------
-- Table structure for station
-- ----------------------------
DROP TABLE IF EXISTS `station`;
CREATE TABLE `station` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of station
-- ----------------------------
INSERT INTO `station` VALUES ('1', 'Чкаловская');
INSERT INTO `station` VALUES ('2', 'Машиностроительная');
INSERT INTO `station` VALUES ('3', 'Проселочная');
INSERT INTO `station` VALUES ('4', 'Угловая');
INSERT INTO `station` VALUES ('5', '8 марта');
INSERT INTO `station` VALUES ('6', 'Ботаническая');
INSERT INTO `station` VALUES ('7', 'Декабристов');
INSERT INTO `station` VALUES ('8', 'Варшавская');
INSERT INTO `station` VALUES ('9', 'Маяковская');
INSERT INTO `station` VALUES ('10', 'Театральная');
INSERT INTO `station` VALUES ('11', 'Динамо');
INSERT INTO `station` VALUES ('12', 'Студенческая');
INSERT INTO `station` VALUES ('13', 'Спортивная');
INSERT INTO `station` VALUES ('14', 'Пионерская');
INSERT INTO `station` VALUES ('15', 'Аэропорт');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of user
-- ----------------------------
