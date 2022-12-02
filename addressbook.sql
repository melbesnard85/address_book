/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 100427
 Source Host           : 127.0.0.1:3306
 Source Schema         : addressbook

 Target Server Type    : MySQL
 Target Server Version : 100427
 File Encoding         : 65001

 Date: 02/12/2022 21:51:35
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for cities
-- ----------------------------
DROP TABLE IF EXISTS `cities`;
CREATE TABLE `cities`  (
  `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of cities
-- ----------------------------
INSERT INTO `cities` VALUES (1, 'New York');
INSERT INTO `cities` VALUES (2, 'Tokyo');

-- ----------------------------
-- Table structure for contacts
-- ----------------------------
DROP TABLE IF EXISTS `contacts`;
CREATE TABLE `contacts`  (
  `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `first_name` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `email` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `street` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `zipcode` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `city_id` int(12) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 57 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of contacts
-- ----------------------------
INSERT INTO `contacts` VALUES (12, 'Natali Fia', 'fin', 'natalia@gmail.com', 'sjsien', '12-sjkdjf', 2);
INSERT INTO `contacts` VALUES (13, 'Mel dfg', 'melwin', 'melbest@gmail.com', 'la', '123485', 1);
INSERT INTO `contacts` VALUES (14, 'Sabi Ola', 'aki', 'kai@gmai.com', 'skji lsih', '123jsj0', 1);
INSERT INTO `contacts` VALUES (15, 'Gkei skeu', 'fin', 'natalia@gmail.com', 'sjsien', '12-sjkdjf', 1);
INSERT INTO `contacts` VALUES (16, 'Mel chai', 'sdge', 'melbest@gmail.com', 'la', '123485', 1);
INSERT INTO `contacts` VALUES (17, 'Adf Eju', 'aki', 'kai@gmai.com', 'skji lsih', '123jsj0', 1);
INSERT INTO `contacts` VALUES (18, 'Natali  Eei', 'fin', 'natalia@gmail.com', 'sjsien', '12-sjkdjf', 1);
INSERT INTO `contacts` VALUES (19, 'Mel chai', 'dcxe', 'melbest@gmail.com', 'la', '123485', 1);
INSERT INTO `contacts` VALUES (20, 'Keil skie', 'aki', 'kai@gmai.com', 'skji lsih', '123jsj0', 1);
INSERT INTO `contacts` VALUES (21, 'Natali sd', 'fin', 'natalia@gmail.com', 'sjsien', '12-sjkdjf', 1);
INSERT INTO `contacts` VALUES (22, 'Mel shbh', 'melwin', 'melbest@gmail.com', 'la', '123485', 1);
INSERT INTO `contacts` VALUES (56, 'Jdks sjdf', 'ahke', 'sdf@fsdf.com', 'ksjf', 'ksdfj', 1);

SET FOREIGN_KEY_CHECKS = 1;
