/*
 Navicat Premium Data Transfer

 Source Server         : datatable_test
 Source Server Type    : MySQL
 Source Server Version : 50559
 Source Host           : cloudserverdev.orangepix.it:3306
 Source Schema         : database_test

 Target Server Type    : MySQL
 Target Server Version : 50559
 File Encoding         : 65001

 Date: 26/03/2018 12:26:18
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for therapybox_photos
-- ----------------------------
DROP TABLE IF EXISTS `therapybox_photos`;
CREATE TABLE `therapybox_photos` (
  `photo_id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `creation_date` datetime DEFAULT NULL,
  PRIMARY KEY (`photo_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for therapybox_tasks
-- ----------------------------
DROP TABLE IF EXISTS `therapybox_tasks`;
CREATE TABLE `therapybox_tasks` (
  `task_id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(255) DEFAULT NULL,
  `complete` varchar(255) DEFAULT NULL,
  `creation_date` datetime DEFAULT NULL,
  PRIMARY KEY (`task_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for therapybox_users
-- ----------------------------
DROP TABLE IF EXISTS `therapybox_users`;
CREATE TABLE `therapybox_users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `creation_date` datetime DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

SET FOREIGN_KEY_CHECKS = 1;
