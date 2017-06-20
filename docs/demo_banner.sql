/*
Navicat MySQL Data Transfer

Source Server         : 8464
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : test

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2017-06-20 14:07:04
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `demo_banner`
-- ----------------------------
DROP TABLE IF EXISTS `demo_banner`;
CREATE TABLE `demo_banner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL COMMENT '标题',
  `image` varchar(120) NOT NULL COMMENT '图片地址',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '上下架:1上架 0下架',
  `listorder` int(5) NOT NULL DEFAULT '1' COMMENT '排序',
  `create_at` int(11) NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='banner广告列表';

-- ----------------------------
-- Records of demo_banner
-- ----------------------------
INSERT INTO `demo_banner` VALUES ('1', '国家母婴护理产业联盟成立仪式暨家家月嫂品牌发布会', '57be8d3d3aa8e.jpg', '1', '0', '1472105834');
