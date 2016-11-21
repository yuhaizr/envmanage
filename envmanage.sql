/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50540
Source Host           : localhost:3306
Source Database       : envmanage

Target Server Type    : MYSQL
Target Server Version : 50540
File Encoding         : 65001

Date: 2016-11-21 23:58:01
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `zy_area`
-- ----------------------------
DROP TABLE IF EXISTS `zy_area`;
CREATE TABLE `zy_area` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) COLLATE utf8_bin DEFAULT NULL,
  `des` varchar(1024) COLLATE utf8_bin DEFAULT NULL,
  `uid` bigint(20) DEFAULT NULL COMMENT '地区的巡查人员',
  `cuid` bigint(20) DEFAULT NULL,
  `ctime` datetime DEFAULT NULL,
  `is_valid` bigint(20) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of zy_area
-- ----------------------------
INSERT INTO `zy_area` VALUES ('1', '十里街道', '十里街道', '5', '1', '2016-11-21 23:14:39', '1');
INSERT INTO `zy_area` VALUES ('2', '八里湖', '八里湖', '2', '1', '2016-11-21 23:35:03', '1');

-- ----------------------------
-- Table structure for `zy_area_prowled`
-- ----------------------------
DROP TABLE IF EXISTS `zy_area_prowled`;
CREATE TABLE `zy_area_prowled` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `prowled_obj_id` bigint(20) DEFAULT NULL,
  `date` varchar(32) COLLATE utf8_bin DEFAULT NULL,
  `score` bigint(20) DEFAULT NULL,
  `level` bigint(20) DEFAULT NULL,
  `mark` varchar(512) COLLATE utf8_bin DEFAULT NULL COMMENT '备注',
  `ctime` datetime DEFAULT NULL,
  `cuid` bigint(20) DEFAULT NULL,
  `is_valid` bigint(20) DEFAULT '1',
  `imagelink1` varchar(512) COLLATE utf8_bin DEFAULT NULL,
  `imagelink2` varchar(512) COLLATE utf8_bin DEFAULT NULL,
  `imagelink3` varchar(512) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of zy_area_prowled
-- ----------------------------
INSERT INTO `zy_area_prowled` VALUES ('2', '7', '2016-11-13', '56', '3', '', '2016-11-20 11:30:20', '1', '1', '/Public/upload/20161120/583118cc3f3ae.jpg', null, null);
INSERT INTO `zy_area_prowled` VALUES ('3', '7', '2016-11-14', '56', '1', '', '2016-11-20 11:30:38', '1', '1', null, null, null);
INSERT INTO `zy_area_prowled` VALUES ('4', '7', '2016-11-13', '56', '3', '', '2016-11-20 12:18:16', '1', '1', '/Public/upload/20161120/58312408954b4.jpg', null, null);

-- ----------------------------
-- Table structure for `zy_attendance`
-- ----------------------------
DROP TABLE IF EXISTS `zy_attendance`;
CREATE TABLE `zy_attendance` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `am_time` datetime DEFAULT NULL,
  `pm_time` datetime DEFAULT NULL,
  `date` varchar(32) COLLATE utf8_bin DEFAULT NULL,
  `cuid` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of zy_attendance
-- ----------------------------
INSERT INTO `zy_attendance` VALUES ('3', '2016-11-20 07:22:39', null, '2016-11-20', '1');
INSERT INTO `zy_attendance` VALUES ('2', '2016-11-19 07:21:33', '2016-11-19 22:21:38', '2016-11-19', '1');
INSERT INTO `zy_attendance` VALUES ('4', '2016-11-20 07:24:06', '2016-11-20 17:34:06', '2016-11-20', '2');

-- ----------------------------
-- Table structure for `zy_biz_prowled`
-- ----------------------------
DROP TABLE IF EXISTS `zy_biz_prowled`;
CREATE TABLE `zy_biz_prowled` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `business_id` bigint(20) DEFAULT NULL COMMENT '企业id',
  `date` varchar(32) COLLATE utf8_bin DEFAULT NULL COMMENT '日期',
  `prowled_obj_id` bigint(20) DEFAULT NULL COMMENT '巡查对象id',
  `score` bigint(20) DEFAULT NULL COMMENT '评分',
  `level` bigint(20) DEFAULT NULL COMMENT '1、优秀90-100     2、良好80-89   3、达标60-79  4、未达标50-59   5、差0-49',
  `mark` varchar(512) COLLATE utf8_bin DEFAULT NULL COMMENT '备注',
  `ctime` datetime DEFAULT NULL,
  `cuid` bigint(20) DEFAULT NULL,
  `imagelink1` varchar(255) COLLATE utf8_bin DEFAULT NULL COMMENT '512',
  `imagelink2` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `imagelink3` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `is_valid` bigint(20) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of zy_biz_prowled
-- ----------------------------
INSERT INTO `zy_biz_prowled` VALUES ('6', '4', '2016-11-13', '3', '58', '3', '', '2016-11-20 11:25:50', '1', '/Public/upload/20161120/583117be866a4.jpg', '/Public/upload/20161120/583117be885e4.jpg', '/Public/upload/20161120/583117be8996c.jpg', '1');
INSERT INTO `zy_biz_prowled` VALUES ('7', '4', '2016-11-14', '3', '58', '3', '', '2016-11-20 11:26:20', '1', null, null, null, '1');
INSERT INTO `zy_biz_prowled` VALUES ('8', '4', '2016-11-15', '3', '58', '2', '', '2016-11-20 11:26:43', '1', null, null, null, '1');
INSERT INTO `zy_biz_prowled` VALUES ('9', '4', '2016-11-16', '3', '56', '2', '', '2016-11-20 11:27:40', '1', null, null, null, '1');
INSERT INTO `zy_biz_prowled` VALUES ('10', '4', '2016-11-19', '3', '95', '1', '', '2016-11-20 11:27:59', '1', null, null, null, '1');
INSERT INTO `zy_biz_prowled` VALUES ('11', '3', '2016-11-13', '3', '70', '5', '', '2016-11-20 11:28:27', '1', null, null, null, '1');
INSERT INTO `zy_biz_prowled` VALUES ('12', '4', '2016-11-17', '3', '95', '1', '', '2016-11-20 12:16:44', '1', '/Public/upload/20161120/583123aca22b9.jpg', null, null, '0');
INSERT INTO `zy_biz_prowled` VALUES ('13', '6', '2016-11-21', '3', '78', '5', '', '2016-11-21 23:46:16', '2', null, null, null, '1');

-- ----------------------------
-- Table structure for `zy_business`
-- ----------------------------
DROP TABLE IF EXISTS `zy_business`;
CREATE TABLE `zy_business` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) COLLATE utf8_bin NOT NULL,
  `ctime` datetime DEFAULT NULL,
  `cuid` bigint(20) DEFAULT NULL,
  `is_valid` bigint(20) DEFAULT '1',
  `mark` varchar(512) COLLATE utf8_bin DEFAULT NULL,
  `addr` varchar(1024) COLLATE utf8_bin DEFAULT NULL COMMENT '地址',
  `cdate` varchar(32) COLLATE utf8_bin DEFAULT NULL COMMENT '成立日期',
  `legal_person_phone` varchar(255) COLLATE utf8_bin DEFAULT NULL COMMENT '法人代表联系方式',
  `legal_person` varchar(128) COLLATE utf8_bin DEFAULT NULL COMMENT '法人姓名',
  `business_license` varchar(255) COLLATE utf8_bin DEFAULT NULL COMMENT '营业执照号',
  `type_id` bigint(20) DEFAULT NULL COMMENT '企业类别id',
  `business_license_link` varchar(412) COLLATE utf8_bin DEFAULT NULL COMMENT '营业执照地址',
  `area_id` bigint(20) DEFAULT NULL COMMENT '地区id',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of zy_business
-- ----------------------------
INSERT INTO `zy_business` VALUES ('4', '公司1', '2016-11-15 23:34:49', '1', '1', '', '九江市十里大楼', '2016-11-16', '1829789065', '李四', '343599877374834993', '3', '/Public/upload/20161120/583115c16e75d.jpg', '2');
INSERT INTO `zy_business` VALUES ('3', '公司2', '2016-11-04 21:48:41', '1', '1', '', '九江国棉四场', '2016-10-10', '12354656771', '王五', '1659430308372992', '3', '/Public/upload/20161120/583115f9c2fcc.jpg', '1');
INSERT INTO `zy_business` VALUES ('5', '公司3', '2016-11-16 21:51:45', '1', '1', '', '九江市十里大楼', '2000-02-01', '15189675972', '张三', '4928292300383902098', '5', '/Public/upload/20161120/5831150dc3d7a.jpg', null);
INSERT INTO `zy_business` VALUES ('6', '公司4', '2016-11-20 11:21:31', '1', '1', '', '九江市国棉四厂', '2016-10-31', '18293847485', '赵六', '9450489378030092', '5', '/Public/upload/20161120/583116bbc18bc.jpg', '2');
INSERT INTO `zy_business` VALUES ('7', '公司5', '2016-11-20 12:15:16', '1', '0', '', '九江市', '2016-11-14', '1828938933', '张三', '234235229asasdasd', '2', '/Public/upload/20161120/5831235432956.jpg', null);

-- ----------------------------
-- Table structure for `zy_business_type`
-- ----------------------------
DROP TABLE IF EXISTS `zy_business_type`;
CREATE TABLE `zy_business_type` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) COLLATE utf8_bin NOT NULL,
  `mark` varchar(512) COLLATE utf8_bin DEFAULT NULL COMMENT '备注',
  `ctime` datetime DEFAULT NULL,
  `cuid` bigint(20) DEFAULT NULL,
  `is_valid` smallint(6) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of zy_business_type
-- ----------------------------
INSERT INTO `zy_business_type` VALUES ('1', '公司类型1', '', '2016-11-02 23:41:58', '1', '1');
INSERT INTO `zy_business_type` VALUES ('2', '公司类型2', '', '2016-11-03 00:32:56', '1', '1');
INSERT INTO `zy_business_type` VALUES ('3', '公司类型3', '', '2016-11-03 00:33:08', '1', '1');
INSERT INTO `zy_business_type` VALUES ('7', '公司类型5', '', '2016-11-20 11:11:33', '1', '0');
INSERT INTO `zy_business_type` VALUES ('5', '公司类型4', '', '2016-11-03 00:35:38', '1', '1');
INSERT INTO `zy_business_type` VALUES ('8', '公司类型6', '666', '2016-11-20 12:13:34', '1', '0');

-- ----------------------------
-- Table structure for `zy_notice`
-- ----------------------------
DROP TABLE IF EXISTS `zy_notice`;
CREATE TABLE `zy_notice` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `content` varchar(512) COLLATE utf8_bin DEFAULT NULL,
  `starttime` datetime DEFAULT NULL,
  `endtime` datetime DEFAULT NULL,
  `is_show` bigint(20) DEFAULT '0' COMMENT '是否显示 在banner',
  `ctime` datetime DEFAULT NULL,
  `cuid` bigint(20) DEFAULT NULL,
  `is_valid` bigint(20) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of zy_notice
-- ----------------------------
INSERT INTO `zy_notice` VALUES ('1', '浔阳区环保网格化管理系统正式上线', '2016-11-18 00:59:00', '2016-12-31 00:59:00', '1', '2016-11-19 18:03:31', '1', '0');
INSERT INTO `zy_notice` VALUES ('5', '祝贺周懿答辩通过2222', '2016-11-19 00:00:00', '2016-12-01 00:00:00', '1', '2016-11-20 12:22:02', '5', '1');

-- ----------------------------
-- Table structure for `zy_prowled_obj`
-- ----------------------------
DROP TABLE IF EXISTS `zy_prowled_obj`;
CREATE TABLE `zy_prowled_obj` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_bin DEFAULT NULL COMMENT '巡查对象名称',
  `type_id` bigint(20) DEFAULT NULL COMMENT '巡查对象类型 1、企业对象  2、地区对象',
  `mark` varchar(512) COLLATE utf8_bin DEFAULT NULL,
  `ctime` datetime DEFAULT NULL,
  `cuid` bigint(20) DEFAULT NULL,
  `is_valid` bigint(20) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of zy_prowled_obj
-- ----------------------------
INSERT INTO `zy_prowled_obj` VALUES ('7', '地区巡查对象3', '2', '', '2016-11-20 11:24:32', '1', '1');
INSERT INTO `zy_prowled_obj` VALUES ('3', '企业对象1', '1', '', '2016-11-19 16:01:46', '1', '1');
INSERT INTO `zy_prowled_obj` VALUES ('4', '企业对象2', '1', '', '2016-11-19 17:08:56', '1', '1');
INSERT INTO `zy_prowled_obj` VALUES ('5', '地区巡查对象1', '2', '', '2016-11-19 17:24:22', '1', '1');
INSERT INTO `zy_prowled_obj` VALUES ('6', '地区巡查对象2', '2', '地区巡查对象2', '2016-11-19 17:24:37', '1', '1');

-- ----------------------------
-- Table structure for `zy_score_set`
-- ----------------------------
DROP TABLE IF EXISTS `zy_score_set`;
CREATE TABLE `zy_score_set` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `start` bigint(20) DEFAULT NULL,
  `end` bigint(20) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_bin DEFAULT NULL COMMENT '标准名称',
  `ctime` datetime DEFAULT NULL,
  `cuid` bigint(20) DEFAULT NULL,
  `is_valid` bigint(20) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of zy_score_set
-- ----------------------------
INSERT INTO `zy_score_set` VALUES ('1', '0', '49', '差', '2016-11-21 21:56:36', '1', '1');
INSERT INTO `zy_score_set` VALUES ('4', '50', '59', '未达标', '2016-11-21 22:20:19', '1', '1');
INSERT INTO `zy_score_set` VALUES ('5', '60', '79', '达标', '2016-11-21 22:20:34', '1', '1');
INSERT INTO `zy_score_set` VALUES ('6', '80', '89', '良好', '2016-11-21 22:20:53', '1', '1');
INSERT INTO `zy_score_set` VALUES ('7', '90', '100', '优秀', '2016-11-21 22:21:09', '1', '1');

-- ----------------------------
-- Table structure for `zy_user`
-- ----------------------------
DROP TABLE IF EXISTS `zy_user`;
CREATE TABLE `zy_user` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `account` varchar(128) COLLATE utf8_bin NOT NULL,
  `nickname` varchar(128) COLLATE utf8_bin NOT NULL,
  `password` varchar(256) COLLATE utf8_bin NOT NULL,
  `type` smallint(6) DEFAULT '1' COMMENT '1、管理员  2、巡查员',
  `phone` varchar(32) COLLATE utf8_bin DEFAULT NULL,
  `email` varchar(64) COLLATE utf8_bin DEFAULT NULL,
  `mark` varchar(512) COLLATE utf8_bin DEFAULT NULL COMMENT '备注',
  `is_valid` smallint(6) DEFAULT '1',
  `age` bigint(20) DEFAULT NULL,
  `addr` varchar(512) COLLATE utf8_bin DEFAULT NULL,
  `sex` bigint(20) DEFAULT NULL,
  `ctime` datetime DEFAULT NULL,
  `cuid` bigint(20) DEFAULT NULL,
  `birthday` varchar(64) COLLATE utf8_bin DEFAULT NULL COMMENT '生日',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of zy_user
-- ----------------------------
INSERT INTO `zy_user` VALUES ('1', 'admin', '管理员', 'e10adc3949ba59abbe56e057f20f883e', '1', '18234587631', '123456@qq.com', '管理员', '1', '12', '江西省九江市', '2', '2016-11-16 07:54:31', '1', '1993-01-05');
INSERT INTO `zy_user` VALUES ('2', 'user', '巡查员', 'e10adc3949ba59abbe56e057f20f883e', '2', '15286567892', '234567@qq.com', '巡查员', '1', null, '江西省九江市', '2', '2016-11-16 07:54:31', '1', '1994-06-15');
INSERT INTO `zy_user` VALUES ('4', 'admin1', '管理员1', 'e10adc3949ba59abbe56e057f20f883e', '1', '', '', '', '1', null, '九江市', '1', '2016-11-20 11:09:39', '1', '');
INSERT INTO `zy_user` VALUES ('5', 'admin2', '管理员2', '202cb962ac59075b964b07152d234b70', '1', '', '', '', '1', null, '', '2', '2016-11-20 12:19:50', '1', '');
