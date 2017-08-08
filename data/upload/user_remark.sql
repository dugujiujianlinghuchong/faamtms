/*
Navicat MySQL Data Transfer

Source Server         : 192.168.0.143_3306
Source Server Version : 50624
Source Host           : 192.168.0.143:3306
Source Database       : faamtms4

Target Server Type    : MYSQL
Target Server Version : 50624
File Encoding         : 65001

Date: 2017-06-29 17:55:40
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for user_remark
-- ----------------------------
DROP TABLE IF EXISTS `user_remark`;
CREATE TABLE `user_remark` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `time` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `reamrk` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user_remark
-- ----------------------------
INSERT INTO `user_remark` VALUES ('1', '1', '2017-06-20 08:51:40', '其他', '哈哈哈哈哈哈哈');
