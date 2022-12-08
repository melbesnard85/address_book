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

 Date: 09/12/2022 02:16:43
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Records of cities
-- ----------------------------
INSERT INTO `cities` VALUES (1, 'New York');
INSERT INTO `cities` VALUES (2, 'Tokyo');
INSERT INTO `cities` VALUES (3, 'Paris');

-- ----------------------------
-- Records of contacts
-- ----------------------------
INSERT INTO `contacts` VALUES (1, 'Natali Fia', 'fin', 'natalia@gmail.com', 'sjsien', '12-sjkdjf', 2, 1);
INSERT INTO `contacts` VALUES (2, 'Mel dfg', 'melwin', 'melbest@gmail.com', 'la', '123485', 1, 2);
INSERT INTO `contacts` VALUES (3, 'Sabi Ola', 'aki', 'kai@gmai.com', 'skji lsih', '123jsj0', 2, 3);
INSERT INTO `contacts` VALUES (4, 'Gkei skeu', 'fin', 'natalia@gmail.com', 'sjsien', '12-sjkdjf', 1, 4);
INSERT INTO `contacts` VALUES (5, 'Adf Eju', 'aki', 'kai@gmai.com', 'skji lsih', '123jsj0', 1, 3);
INSERT INTO `contacts` VALUES (6, 'Laue emm', 'dsg', 'se@sdf.com', 'la', '123485', 2, 4);
INSERT INTO `contacts` VALUES (7, 'Ejbdu sj', 'sdg', 'kdjfj@gmisl.com', 'skji lsih', '123jsj0', 2, 5);
INSERT INTO `contacts` VALUES (8, 'Star', 'sli', 'star@star.com', 'suer', 'sjie', 1, 6);
INSERT INTO `contacts` VALUES (9, 'kkk', 'ksfjj', 'kjs@gs.com', 'sdfsk', 'sfjs', 2, 6);
INSERT INTO `contacts` VALUES (10, 'melvin', 'asf', 'asdf@dsa.com', 'asdfasdf', 'asdf', 1, 7);
INSERT INTO `contacts` VALUES (11, 'Semon', 'sku', 'sdf@gmd.com', 'sdfj', 'sdfsdf', 1, 5);
INSERT INTO `contacts` VALUES (12, 'Mish', 'Hkje', 'kjf@dd.com', 'sdfjs', 'ksfj', 1, 5);

-- ----------------------------
-- Records of group_data
-- ----------------------------
INSERT INTO `group_data` VALUES (1, 'All');
INSERT INTO `group_data` VALUES (2, 'Student');
INSERT INTO `group_data` VALUES (3, 'Children');
INSERT INTO `group_data` VALUES (4, 'Tennis');
INSERT INTO `group_data` VALUES (5, 'Swimming');
INSERT INTO `group_data` VALUES (6, 'Computer');
INSERT INTO `group_data` VALUES (7, 'JS');

-- ----------------------------
-- Records of group_struct
-- ----------------------------
INSERT INTO `group_struct` VALUES (1, 1, 24, 0, 0, 0);
INSERT INTO `group_struct` VALUES (2, 12, 19, 1, 1, 0);
INSERT INTO `group_struct` VALUES (3, 20, 23, 1, 1, 1);
INSERT INTO `group_struct` VALUES (4, 13, 14, 2, 2, 0);
INSERT INTO `group_struct` VALUES (5, 21, 22, 2, 3, 0);
INSERT INTO `group_struct` VALUES (6, 15, 18, 2, 2, 1);
INSERT INTO `group_struct` VALUES (7, 16, 17, 3, 6, 0);

SET FOREIGN_KEY_CHECKS = 1;
