/*
Navicat MySQL Data Transfer

Source Server         : cvm
Source Server Version : 50633
Source Host           : 123.207.92.60:3306
Source Database       : flex

Target Server Type    : MYSQL
Target Server Version : 50633
File Encoding         : 65001

Date: 2017-06-05 17:06:27
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for auth_assignment
-- ----------------------------
DROP TABLE IF EXISTS `auth_assignment`;
CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  KEY `user_assign_1` (`user_id`),
  CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `user_assign_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of auth_assignment
-- ----------------------------
INSERT INTO `auth_assignment` VALUES ('admin', '1', '1487564217');

-- ----------------------------
-- Table structure for auth_item
-- ----------------------------
DROP TABLE IF EXISTS `auth_item`;
CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `idx-auth_item-type` (`type`),
  CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of auth_item
-- ----------------------------
INSERT INTO `auth_item` VALUES ('/', '2', null, null, null, '1487564120', '1487564120');
INSERT INTO `auth_item` VALUES ('/*', '2', null, null, null, '1487564114', '1487564114');
INSERT INTO `auth_item` VALUES ('/admin', '2', null, null, null, '1487822579', '1487822579');
INSERT INTO `auth_item` VALUES ('/users', '2', null, null, null, '1494123239', '1494123239');
INSERT INTO `auth_item` VALUES ('/users/default', '2', null, null, null, '1494124507', '1494124507');
INSERT INTO `auth_item` VALUES ('/users/user-level-rule', '2', null, null, null, '1494123489', '1494123489');
INSERT INTO `auth_item` VALUES ('admin', '1', null, null, null, '1487564151', '1487564151');

-- ----------------------------
-- Table structure for auth_item_child
-- ----------------------------
DROP TABLE IF EXISTS `auth_item_child`;
CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of auth_item_child
-- ----------------------------
INSERT INTO `auth_item_child` VALUES ('admin', '/');
INSERT INTO `auth_item_child` VALUES ('admin', '/*');

-- ----------------------------
-- Table structure for auth_rule
-- ----------------------------
DROP TABLE IF EXISTS `auth_rule`;
CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of auth_rule
-- ----------------------------

-- ----------------------------
-- Table structure for fans
-- ----------------------------
DROP TABLE IF EXISTS `fans`;
CREATE TABLE `fans` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `at_user` int(11) unsigned NOT NULL,
  `follower` int(11) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `fans_follower_at_user_unique` (`at_user`,`follower`) USING BTREE,
  KEY `fans_follower` (`follower`),
  CONSTRAINT `fans_at_user` FOREIGN KEY (`at_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fans_follower` FOREIGN KEY (`follower`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of fans
-- ----------------------------

-- ----------------------------
-- Table structure for menu
-- ----------------------------
DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `route` varchar(255) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `data` blob,
  PRIMARY KEY (`id`),
  KEY `parent` (`parent`),
  CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `menu` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of menu
-- ----------------------------
INSERT INTO `menu` VALUES ('1', '权限管理', null, '/admin', '1', null);
INSERT INTO `menu` VALUES ('2', '用户管理', null, '/users', '10', null);
INSERT INTO `menu` VALUES ('3', '用户级别规则', '2', '/users/user-level-rule', null, null);
INSERT INTO `menu` VALUES ('4', '用户列表', '2', '/users/default', null, null);

-- ----------------------------
-- Table structure for migration
-- ----------------------------
DROP TABLE IF EXISTS `migration`;
CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of migration
-- ----------------------------
INSERT INTO `migration` VALUES ('m000000_000000_base', '1487562052');
INSERT INTO `migration` VALUES ('m130524_201442_init', '1487562073');
INSERT INTO `migration` VALUES ('m140506_102106_rbac_init', '1487563645');
INSERT INTO `migration` VALUES ('m140602_111327_create_menu_table', '1487563299');
INSERT INTO `migration` VALUES ('m160312_050000_create_user', '1487563300');
INSERT INTO `migration` VALUES ('m230416_200116_tree', '1487754224');

-- ----------------------------
-- Table structure for poster
-- ----------------------------
DROP TABLE IF EXISTS `poster`;
CREATE TABLE `poster` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `poster_subject_id` int(11) unsigned NOT NULL,
  `title` varchar(50) NOT NULL,
  `created_at` int(11) NOT NULL,
  `created_by` int(11) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  `updated_by` int(11) unsigned NOT NULL,
  `status` int(11) NOT NULL,
  `desc` varchar(500) DEFAULT NULL,
  `type` int(11) unsigned NOT NULL DEFAULT '10',
  `is_top` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `poster_subject_user_unique` (`poster_subject_id`,`title`,`created_by`) USING BTREE,
  KEY `poster_created_by_user` (`created_by`),
  KEY `poster_updated_by_user` (`updated_by`),
  CONSTRAINT `for_poster_subject` FOREIGN KEY (`poster_subject_id`) REFERENCES `poster_subject` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `poster_created_by_user` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `poster_updated_by_user` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COMMENT='帖子';

-- ----------------------------
-- Records of poster
-- ----------------------------

-- ----------------------------
-- Table structure for poster_floor
-- ----------------------------
DROP TABLE IF EXISTS `poster_floor`;
CREATE TABLE `poster_floor` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `poster_id` int(11) unsigned NOT NULL,
  `floor_sequence` int(11) unsigned NOT NULL,
  `at_floor` int(11) unsigned DEFAULT NULL,
  `created_by` int(11) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `updated_by` int(11) unsigned NOT NULL,
  `status` int(11) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `floor_sequence_and_poster_id_unique` (`poster_id`,`floor_sequence`) USING BTREE,
  KEY `floor_sequence` (`floor_sequence`),
  KEY `floor_created_by_user` (`created_by`),
  KEY `floor_updated_by_user` (`updated_by`),
  KEY `floor_at_floor` (`at_floor`),
  CONSTRAINT `floor_at_floor` FOREIGN KEY (`at_floor`) REFERENCES `poster_floor` (`floor_sequence`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `floor_created_by_user` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `floor_for_poster` FOREIGN KEY (`poster_id`) REFERENCES `poster` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `floor_updated_by_user` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of poster_floor
-- ----------------------------

-- ----------------------------
-- Table structure for poster_subject
-- ----------------------------
DROP TABLE IF EXISTS `poster_subject`;
CREATE TABLE `poster_subject` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(8) NOT NULL,
  `desc` varchar(500) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `created_by` int(11) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  `updated_by` int(11) unsigned NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `type` int(11) unsigned NOT NULL DEFAULT '10',
  `is_top` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `poster_subject_title_unique` (`title`) USING BTREE,
  KEY `poster_subject_updated_by_user` (`updated_by`),
  KEY `poster_subject_created_by_user` (`created_by`) USING BTREE,
  CONSTRAINT `poster_subject_created_by_user` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `poster_subject_updated_by_user` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8 COMMENT='帖子主题';

-- ----------------------------
-- Records of poster_subject
-- ----------------------------

-- ----------------------------
-- Table structure for poster_subject_tag
-- ----------------------------
DROP TABLE IF EXISTS `poster_subject_tag`;
CREATE TABLE `poster_subject_tag` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `poster_subject_id` int(11) unsigned NOT NULL,
  `tag_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `subject_tag_unique` (`poster_subject_id`,`tag_id`) USING BTREE,
  KEY `subject_tag_in_tag` (`tag_id`),
  CONSTRAINT `subject_tag_in_subject` FOREIGN KEY (`poster_subject_id`) REFERENCES `poster_subject` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `subject_tag_in_tag` FOREIGN KEY (`tag_id`) REFERENCES `tag` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of poster_subject_tag
-- ----------------------------

-- ----------------------------
-- Table structure for story
-- ----------------------------
DROP TABLE IF EXISTS `story`;
CREATE TABLE `story` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(25) NOT NULL,
  `content` text NOT NULL,
  `created_at` int(11) NOT NULL,
  `created_by` int(11) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  `updated_by` int(11) unsigned NOT NULL,
  `need_level` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '所需等级',
  `desc` varchar(50) NOT NULL COMMENT '简介',
  `view_count` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '浏览数',
  `status` int(11) unsigned NOT NULL DEFAULT '10',
  `type` int(11) unsigned NOT NULL DEFAULT '10',
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_story_title_unique` (`title`,`created_by`) USING BTREE,
  KEY `story_write_by_user` (`created_by`),
  KEY `story_updated_by_user` (`updated_by`),
  CONSTRAINT `story_updated_by_user` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `story_write_by_user` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8 COMMENT='文章故事小说表';

-- ----------------------------
-- Records of story
-- ----------------------------

-- ----------------------------
-- Table structure for story_reply
-- ----------------------------
DROP TABLE IF EXISTS `story_reply`;
CREATE TABLE `story_reply` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `story_id` int(11) unsigned NOT NULL,
  `at_user` int(11) unsigned DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `created_by` int(11) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  `updated_by` int(11) unsigned NOT NULL,
  `content` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `talk_reply_at_user` (`at_user`),
  KEY `talk_reply_create_by_user` (`created_by`),
  KEY `talk_reply_update_by_user` (`updated_by`),
  KEY `reply_for_story` (`story_id`),
  CONSTRAINT `reply_for_story` FOREIGN KEY (`story_id`) REFERENCES `story` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `story_reply_ibfk_1` FOREIGN KEY (`at_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `story_reply_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `story_reply_ibfk_3` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='说说回复';

-- ----------------------------
-- Records of story_reply
-- ----------------------------

-- ----------------------------
-- Table structure for story_tag
-- ----------------------------
DROP TABLE IF EXISTS `story_tag`;
CREATE TABLE `story_tag` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `tag_id` int(11) unsigned NOT NULL,
  `story_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `story_tag_unique` (`tag_id`,`story_id`) USING BTREE,
  KEY `tag_story_id` (`story_id`),
  KEY `story_tag_id` (`tag_id`) USING BTREE,
  CONSTRAINT `story_tag_id` FOREIGN KEY (`tag_id`) REFERENCES `tag` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tag_story_id` FOREIGN KEY (`story_id`) REFERENCES `story` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of story_tag
-- ----------------------------

-- ----------------------------
-- Table structure for tag
-- ----------------------------
DROP TABLE IF EXISTS `tag`;
CREATE TABLE `tag` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `created_at` int(11) NOT NULL,
  `created_by` int(11) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  `updated_by` int(11) unsigned NOT NULL,
  `data` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tag_name_unique` (`name`) USING BTREE,
  KEY `tag_created_by_user__` (`created_by`),
  KEY `tag_updated_by_user__` (`updated_by`),
  CONSTRAINT `tag_created_by_user__` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tag_updated_by_user__` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COMMENT='标签表';

-- ----------------------------
-- Records of tag
-- ----------------------------

-- ----------------------------
-- Table structure for talk
-- ----------------------------
DROP TABLE IF EXISTS `talk`;
CREATE TABLE `talk` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `created_by` int(11) unsigned NOT NULL,
  `updated_by` int(11) unsigned NOT NULL,
  `content` varchar(200) NOT NULL,
  `view_count` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `user_talk` (`created_by`),
  KEY `user_talk_update` (`updated_by`),
  CONSTRAINT `user_talk` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `user_talk_update` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=94 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of talk
-- ----------------------------

-- ----------------------------
-- Table structure for talk_praise
-- ----------------------------
DROP TABLE IF EXISTS `talk_praise`;
CREATE TABLE `talk_praise` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `talk_id` int(11) unsigned NOT NULL,
  `created_by` int(11) unsigned NOT NULL,
  `created_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `index_by_talk_id_and_user_id` (`talk_id`,`created_by`) USING BTREE,
  KEY `praise_talk_by_user` (`created_by`),
  KEY `praise_talk_id` (`talk_id`) USING BTREE,
  CONSTRAINT `praise_for_talk` FOREIGN KEY (`talk_id`) REFERENCES `talk` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `praise_talk_by_user` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of talk_praise
-- ----------------------------

-- ----------------------------
-- Table structure for talk_reply
-- ----------------------------
DROP TABLE IF EXISTS `talk_reply`;
CREATE TABLE `talk_reply` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `talk_id` int(11) unsigned NOT NULL,
  `at_user` int(11) unsigned DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `created_by` int(11) unsigned NOT NULL,
  `updated_at` int(11) NOT NULL,
  `updated_by` int(11) unsigned NOT NULL,
  `content` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `talk_reply_at_user` (`at_user`),
  KEY `talk_reply_create_by_user` (`created_by`),
  KEY `talk_reply_update_by_user` (`updated_by`),
  KEY `relpy_for_talk` (`talk_id`),
  CONSTRAINT `relpy_for_talk` FOREIGN KEY (`talk_id`) REFERENCES `talk` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `talk_reply_at_user` FOREIGN KEY (`at_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `talk_reply_create_by_user` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `talk_reply_update_by_user` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='说说回复';

-- ----------------------------
-- Records of talk_reply
-- ----------------------------

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'test', '4lJjxaDFA_h1GCHHfG8c_Ca-_8DWH8F4', '$2y$13$HAE9/XdwJuOVeQDjIBFAHeDyDvdR8C40qAskvMMxJ3V6B5M.N9gIm', null, 'test@gmail.com', '10', '1487562122', '1496380062');

-- ----------------------------
-- Table structure for user_alert
-- ----------------------------
DROP TABLE IF EXISTS `user_alert`;
CREATE TABLE `user_alert` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `at_user` int(11) unsigned NOT NULL COMMENT '被提醒人',
  `type` int(11) unsigned NOT NULL COMMENT '类型',
  `content` varchar(500) NOT NULL COMMENT '提醒内容',
  `status` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_alert_at_user` (`at_user`),
  CONSTRAINT `user_alert_at_user` FOREIGN KEY (`at_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户提醒';

-- ----------------------------
-- Records of user_alert
-- ----------------------------

-- ----------------------------
-- Table structure for user_info
-- ----------------------------
DROP TABLE IF EXISTS `user_info`;
CREATE TABLE `user_info` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `nickname` varchar(20) DEFAULT NULL,
  `avatar` varchar(50) DEFAULT NULL,
  `type` int(11) unsigned NOT NULL DEFAULT '10',
  `level` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '级别值',
  `integral` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '积分',
  `treasure` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '财富',
  `qq` varchar(20) DEFAULT NULL,
  `mobile` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`) USING BTREE,
  CONSTRAINT `user_info_1_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user_info
-- ----------------------------
INSERT INTO `user_info` VALUES ('1', '1', 'n_wodrow', '神明', '10', '12585', '60', '70', '1173957281', '18739910648');

-- ----------------------------
-- Table structure for user_level_rule
-- ----------------------------
DROP TABLE IF EXISTS `user_level_rule`;
CREATE TABLE `user_level_rule` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `begin` int(11) unsigned NOT NULL,
  `end` int(11) unsigned NOT NULL,
  `avatar_rule` text COMMENT '头像展示规则',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user_level_rule
-- ----------------------------
INSERT INTO `user_level_rule` VALUES ('1', '草民', '0', '999', '{ \"background\":{ \"r\":0, \"g\":0, \"b\":0 } , \"color\":{ \"r\":255, \"g\":255, \"b\":255 }}');
INSERT INTO `user_level_rule` VALUES ('2', '读书人', '1000', '1999', '{ \"background\":{ \"r\":133, \"g\":119, \"b\":240 } , \"color\":{ \"r\":141, \"g\":45, \"b\":52 }}');
INSERT INTO `user_level_rule` VALUES ('3', '秀才', '2000', '4999', '{ \"background\":{ \"r\":87, \"g\":210, \"b\":161 } , \"color\":{ \"r\":124, \"g\":21, \"b\":219 }}');
INSERT INTO `user_level_rule` VALUES ('4', '举人', '5000', '6999', '{ \"background\":{ \"r\":128, \"g\":89, \"b\":162 } , \"color\":{ \"r\":121, \"g\":195, \"b\":231 }}');
INSERT INTO `user_level_rule` VALUES ('5', '进士', '7000', '8999', '{ \"background\":{ \"r\":124, \"g\":199, \"b\":100 } , \"color\":{ \"r\":124, \"g\":151, \"b\":209 }}');
INSERT INTO `user_level_rule` VALUES ('6', '末品小吏', '9000', '9999', '{ \"background\":{ \"r\":28, \"g\":4, \"b\":127 } , \"color\":{ \"r\":156, \"g\":118, \"b\":167 }}');
INSERT INTO `user_level_rule` VALUES ('7', '九品芝麻官', '10000', '29999', ' { \"background\":{ \"r\":205, \"g\":185, \"b\":182 } , \"color\":{ \"r\":6, \"g\":176, \"b\":178 }}');
INSERT INTO `user_level_rule` VALUES ('8', '八品官儿', '30000', '39999', '{ \"background\":{ \"r\":96, \"g\":151, \"b\":32 } , \"color\":{ \"r\":163, \"g\":255, \"b\":142 }}');
INSERT INTO `user_level_rule` VALUES ('9', '七品县太爷', '40000', '69999', ' { \"background\":{ \"r\":255, \"g\":183, \"b\":1 } , \"color\":{ \"r\":56, \"g\":161, \"b\":67 }}');
INSERT INTO `user_level_rule` VALUES ('10', '六品敕授', '70000', '79999', '{ \"background\":{ \"r\":20, \"g\":192, \"b\":183 } , \"color\":{ \"r\":1, \"g\":4, \"b\":115 }}');
INSERT INTO `user_level_rule` VALUES ('11', '五品制授', '80000', '99999', '{ \"background\":{ \"r\":145, \"g\":211, \"b\":137 } , \"color\":{ \"r\":178, \"g\":201, \"b\":46 }}');
INSERT INTO `user_level_rule` VALUES ('12', '四品大红袍', '100000', '299999', ' { \"background\":{ \"r\":249, \"g\":207, \"b\":158 } , \"color\":{ \"r\":220, \"g\":69, \"b\":194 }} ');
INSERT INTO `user_level_rule` VALUES ('13', '三品侍郎', '300000', '499999', '{ \"background\":{ \"r\":194, \"g\":42, \"b\":205 } , \"color\":{ \"r\":106, \"g\":113, \"b\":9 }}');
INSERT INTO `user_level_rule` VALUES ('14', '二品尚书', '500000', '699999', ' { \"background\":{ \"r\":34, \"g\":153, \"b\":112 } , \"color\":{ \"r\":98, \"g\":50, \"b\":94 }}');
INSERT INTO `user_level_rule` VALUES ('15', '一品大学士', '700000', '999999', '{ \"background\":{ \"r\":161, \"g\":105, \"b\":147 } , \"color\":{ \"r\":154, \"g\":31, \"b\":187 }} ');
INSERT INTO `user_level_rule` VALUES ('16', '伯爵', '1000000', '3999999', '{ \"background\":{ \"r\":212, \"g\":148, \"b\":232 } , \"color\":{ \"r\":220, \"g\":96, \"b\":176 }}');
INSERT INTO `user_level_rule` VALUES ('17', '侯爵', '4000000', '6999999', '{ \"background\":{ \"r\":238, \"g\":216, \"b\":120 } , \"color\":{ \"r\":39, \"g\":244, \"b\":95 }}');
INSERT INTO `user_level_rule` VALUES ('18', '公爵', '7000000', '9999999', '{ \"background\":{ \"r\":248, \"g\":97, \"b\":27 } , \"color\":{ \"r\":191, \"g\":68, \"b\":48 }} ');
INSERT INTO `user_level_rule` VALUES ('19', '王爷', '10000000', '99999999', '{ \"background\":{ \"r\":177, \"g\":77, \"b\":177 } , \"color\":{ \"r\":204, \"g\":42, \"b\":35 }} ');
INSERT INTO `user_level_rule` VALUES ('20', '帝王', '100000000', '999999999', '{ \"background\":{ \"r\":29, \"g\":156, \"b\":216 } , \"color\":{ \"r\":255, \"g\":168, \"b\":0 }} ');
INSERT INTO `user_level_rule` VALUES ('21', '圣贤', '1000000000', '3999999999', '{ \"background\":{ \"r\":132, \"g\":5, \"b\":180 } , \"color\":{ \"r\":223, \"g\":190, \"b\":245 }}');
INSERT INTO `user_level_rule` VALUES ('22', '神', '4000000000', '4294967295', '{ \"background\":{ \"r\":132, \"g\":183, \"b\":10 } , \"color\":{ \"r\":35, \"g\":119, \"b\":134 }} ');

-- ----------------------------
-- Table structure for user_sign_in
-- ----------------------------
DROP TABLE IF EXISTS `user_sign_in`;
CREATE TABLE `user_sign_in` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `date` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `countinously_days` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '签到连续天数',
  PRIMARY KEY (`id`),
  UNIQUE KEY `sign_in_user_unique` (`user_id`,`date`) USING BTREE,
  KEY `sign_in_user` (`user_id`) USING BTREE,
  CONSTRAINT `sign_in_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COMMENT='签到表';

-- ----------------------------
-- Records of user_sign_in
-- ----------------------------
INSERT INTO `user_sign_in` VALUES ('2', '1', '20170507', '1494156873', '1');
INSERT INTO `user_sign_in` VALUES ('3', '1', '20170508', '1494236899', '2');
INSERT INTO `user_sign_in` VALUES ('5', '1', '20170509', '1494293757', '3');
INSERT INTO `user_sign_in` VALUES ('6', '1', '20170510', '1494376552', '4');
INSERT INTO `user_sign_in` VALUES ('8', '1', '20170511', '1494463076', '5');
INSERT INTO `user_sign_in` VALUES ('10', '1', '20170512', '1494552220', '6');
INSERT INTO `user_sign_in` VALUES ('11', '1', '20170513', '1494669559', '7');
INSERT INTO `user_sign_in` VALUES ('13', '1', '20170514', '1494729153', '8');
INSERT INTO `user_sign_in` VALUES ('14', '1', '20170517', '1495000355', '1');
INSERT INTO `user_sign_in` VALUES ('16', '1', '20170519', '1495191011', '1');
INSERT INTO `user_sign_in` VALUES ('17', '1', '20170523', '1495521883', '1');
INSERT INTO `user_sign_in` VALUES ('21', '1', '20170531', '1496216649', '1');
INSERT INTO `user_sign_in` VALUES ('22', '1', '20170601', '1496283721', '1');
INSERT INTO `user_sign_in` VALUES ('24', '1', '20170602', '1496368900', '2');
INSERT INTO `user_sign_in` VALUES ('26', '1', '20170603', '1496478268', '3');

-- ----------------------------
-- View structure for item
-- ----------------------------
DROP VIEW IF EXISTS `item`;
CREATE ALGORITHM=UNDEFINED DEFINER=`wodrow`@`%` SQL SECURITY DEFINER VIEW `item` AS select `story`.`id` AS `item_id`,`story`.`title` AS `item_title`,`story`.`created_at` AS `created_at`,`story`.`created_by` AS `created_by`,`story`.`updated_at` AS `updated_at`,`story`.`updated_by` AS `updated_by`,`story`.`status` AS `status`,`story`.`type` AS `type`,11 AS `item_type` from `story` union select `poster_subject`.`id` AS `item_id`,`poster_subject`.`title` AS `item_title`,`poster_subject`.`created_at` AS `created_at`,`poster_subject`.`created_by` AS `created_by`,`poster_subject`.`updated_at` AS `updated_at`,`poster_subject`.`updated_by` AS `updated_by`,`poster_subject`.`status` AS `status`,`poster_subject`.`type` AS `type`,12 AS `item_type` from `poster_subject` ;

-- ----------------------------
-- View structure for item_tag
-- ----------------------------
DROP VIEW IF EXISTS `item_tag`;
CREATE ALGORITHM=UNDEFINED DEFINER=`wodrow`@`%` SQL SECURITY DEFINER VIEW `item_tag` AS select `tag`.`id` AS `tag_id`,`tag`.`name` AS `tag_name`,`story`.`id` AS `item_id`,`story`.`title` AS `item_title`,`story`.`created_at` AS `created_at`,`story`.`created_by` AS `created_by`,`story`.`updated_at` AS `updated_at`,`story`.`updated_by` AS `updated_by`,`story`.`status` AS `status`,`story`.`type` AS `type`,11 AS `item_type` from ((`tag` left join `story_tag` on((`story_tag`.`tag_id` = `tag`.`id`))) left join `story` on((`story_tag`.`story_id` = `story`.`id`))) union select `tag`.`id` AS `tag_id`,`tag`.`name` AS `tag_name`,`poster_subject`.`id` AS `item_id`,`poster_subject`.`title` AS `item_title`,`poster_subject`.`created_at` AS `created_at`,`poster_subject`.`created_by` AS `created_by`,`poster_subject`.`updated_at` AS `updated_at`,`poster_subject`.`updated_by` AS `updated_by`,`poster_subject`.`status` AS `status`,`poster_subject`.`type` AS `type`,12 AS `item_type` from ((`tag` left join `poster_subject_tag` on((`poster_subject_tag`.`tag_id` = `tag`.`id`))) left join `poster_subject` on((`poster_subject_tag`.`poster_subject_id` = `poster_subject`.`id`))) ;
