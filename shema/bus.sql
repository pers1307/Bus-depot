/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50548
Source Host           : localhost:3306
Source Database       : bus

Target Server Type    : MYSQL
Target Server Version : 50548
File Encoding         : 65001

Date: 2016-05-29 23:56:17
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
INSERT INTO `bus_type` VALUES ('3', 'Малый', '40');
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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of driver
-- ----------------------------
INSERT INTO `driver` VALUES ('3', '2', '2010-06-20 00:00:00', '0', '1', '1');
INSERT INTO `driver` VALUES ('4', '2', '2005-02-20 00:00:00', '10', '14', '10');
INSERT INTO `driver` VALUES ('5', '3', '2001-03-20 00:00:00', '90000', '13', '14');
INSERT INTO `driver` VALUES ('6', '2', '2013-05-13 12:45:00', '35000', '10', '10');
INSERT INTO `driver` VALUES ('7', '3', '2015-02-03 05:25:00', '100000', '12', '17');
INSERT INTO `driver` VALUES ('8', '2', '2011-03-31 18:50:00', '90000', '2', '12');
INSERT INTO `driver` VALUES ('9', '3', '2011-04-20 00:00:00', '33000', '7', '7');
INSERT INTO `driver` VALUES ('10', '2', '2010-03-03 18:50:00', '10800', '10', '9');
INSERT INTO `driver` VALUES ('11', '2', '2010-03-20 00:00:00', '99', '8', '8');
INSERT INTO `driver` VALUES ('12', '2', '2009-01-20 00:00:00', '23000', null, null);

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
  `when` datetime DEFAULT NULL,
  `series` varchar(255) DEFAULT NULL,
  `number` varchar(255) DEFAULT NULL,
  `address` text,
  `issued` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of passport_data
-- ----------------------------
INSERT INTO `passport_data` VALUES ('3', 'Иван', '', 'Оловянников', '1894-06-02 00:00:00', '2012-06-20 00:00:00', '4444', '963222', 'Новгород', 'УМВД');
INSERT INTO `passport_data` VALUES ('4', 'Николай', 'Матвеевич', 'Куницын', '1980-02-12 05:25:00', '2001-01-08 08:40:00', '363', '789563', 'Екатеринбург', 'Мной');
INSERT INTO `passport_data` VALUES ('5', 'Александр', 'Андреевич', 'Бунин', '1971-03-11 10:50:00', '2005-01-20 00:00:00', '789', '444666', 'Москва', 'Мосвой и выдан');
INSERT INTO `passport_data` VALUES ('6', 'Владимир', '', 'Кузнецов', '1960-12-23 19:55:00', '2005-01-20 00:00:00', '999', '799222', 'Барнаул', 'УМВД');
INSERT INTO `passport_data` VALUES ('7', 'Петр', 'Федорович', 'Патров', '1971-03-11 10:50:00', '2009-11-19 18:50:00', '5', '5', '6', '6666');
INSERT INTO `passport_data` VALUES ('8', 'Евгений', 'Мартынович', 'Марин', '1971-03-11 10:50:00', '2000-03-01 18:50:00', '12', '12', '12', '1212');
INSERT INTO `passport_data` VALUES ('9', 'Валентин', '', 'Печалин', '1971-03-11 10:50:00', '2004-03-20 00:00:00', '33', '33', '33', '33');
INSERT INTO `passport_data` VALUES ('10', 'Константин', 'Николаевич', 'Никитин', '1971-03-11 10:50:00', '1991-02-28 18:50:00', '44', '44', '66', '777');
INSERT INTO `passport_data` VALUES ('11', 'Егор', '', 'Валишев', '2007-01-20 00:00:00', '2013-01-20 00:00:00', '90', '99', '99', '99');
INSERT INTO `passport_data` VALUES ('12', 'Михаил', '', 'Видов', '2008-07-20 00:00:00', '2005-05-20 00:00:00', '52', '555', '555', '5555');

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
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `number` varchar(255) DEFAULT NULL,
  `start_id_station` int(10) unsigned DEFAULT NULL,
  `end_id_station` int(10) unsigned DEFAULT NULL,
  `interval` double DEFAULT NULL,
  `duration` double DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_start` (`start_id_station`),
  KEY `id_end` (`end_id_station`),
  CONSTRAINT `id_end` FOREIGN KEY (`end_id_station`) REFERENCES `station` (`id`),
  CONSTRAINT `id_start` FOREIGN KEY (`start_id_station`) REFERENCES `station` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of route
-- ----------------------------
INSERT INTO `route` VALUES ('1', '034', '1', '2', '190', '95');
INSERT INTO `route` VALUES ('2', '035', '4', '6', '50', '25');
INSERT INTO `route` VALUES ('3', '088', '14', '15', '180', '90');
INSERT INTO `route` VALUES ('4', '033', '4', '5', '240', '120');
INSERT INTO `route` VALUES ('5', '063', '14', '13', '5000', '2500');
INSERT INTO `route` VALUES ('6', '050', '1', '3', '260', '130');
INSERT INTO `route` VALUES ('7', '003', '5', '4', '200', '100');
INSERT INTO `route` VALUES ('8', '070', '12', '13', '126', '63');
INSERT INTO `route` VALUES ('9', '077', '14', '12', '140', '70');
INSERT INTO `route` VALUES ('10', 'С01', '1', '15', '900', '240');
INSERT INTO `route` VALUES ('11', 'С02', '3', '15', '1900', '500');
INSERT INTO `route` VALUES ('12', 'С03', '6', '15', '2000', '630');
INSERT INTO `route` VALUES ('13', 'С04', '6', '16', '20000', '5000');
INSERT INTO `route` VALUES ('14', 'С05', '1', '19', '9000', '6300');
INSERT INTO `route` VALUES ('15', 'С06', '5', '17', '8000', '6000');
INSERT INTO `route` VALUES ('16', 'С07', '10', '18', '600', '95');
INSERT INTO `route` VALUES ('17', 'С08', '2', '17', '30000', '9000');
INSERT INTO `route` VALUES ('18', 'С09', '7', '16', '90000', '9000');

-- ----------------------------
-- Table structure for station
-- ----------------------------
DROP TABLE IF EXISTS `station`;
CREATE TABLE `station` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

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
INSERT INTO `station` VALUES ('16', 'Москва');
INSERT INTO `station` VALUES ('17', 'Питер');
INSERT INTO `station` VALUES ('18', 'Сухой Лог');
INSERT INTO `station` VALUES ('19', 'Новосибирск');

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'pers1307', '', '$2y$13$5NrLl1Kd4sh/oMX.OEbNX.wgYDijqGae0Pzhu2a2.v9OaQeGwVy2O', null, 'skulines@mail.ru', '10', '0', '0');
