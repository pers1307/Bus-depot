/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50548
Source Host           : localhost:3306
Source Database       : bus

Target Server Type    : MYSQL
Target Server Version : 50548
File Encoding         : 65001

Date: 2016-05-15 16:58:28
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
  KEY `id_type` (`id_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bus
-- ----------------------------

-- ----------------------------
-- Table structure for bus_type
-- ----------------------------
DROP TABLE IF EXISTS `bus_type`;
CREATE TABLE `bus_type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `capacity` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `type` FOREIGN KEY (`id`) REFERENCES `bus` (`id_type`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bus_type
-- ----------------------------

-- ----------------------------
-- Table structure for class
-- ----------------------------
DROP TABLE IF EXISTS `class`;
CREATE TABLE `class` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `bus_id` FOREIGN KEY (`id`) REFERENCES `driver` (`id_class`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of class
-- ----------------------------

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of reason
-- ----------------------------

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
  KEY `id_end` (`end_id_station`)
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
  PRIMARY KEY (`id`),
  CONSTRAINT `id_end` FOREIGN KEY (`id`) REFERENCES `route` (`end_id_station`),
  CONSTRAINT `id_start` FOREIGN KEY (`id`) REFERENCES `route` (`start_id_station`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of station
-- ----------------------------
