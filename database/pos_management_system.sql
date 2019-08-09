/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : pos_management_system

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2019-08-09 17:04:29
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for base_brand
-- ----------------------------
DROP TABLE IF EXISTS `base_brand`;
CREATE TABLE `base_brand` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `brand_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of base_brand
-- ----------------------------
INSERT INTO `base_brand` VALUES ('1', 'Phonix');
INSERT INTO `base_brand` VALUES ('3', 'Square ez');

-- ----------------------------
-- Table structure for base_category
-- ----------------------------
DROP TABLE IF EXISTS `base_category`;
CREATE TABLE `base_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of base_category
-- ----------------------------
INSERT INTO `base_category` VALUES ('1', 'Test');
INSERT INTO `base_category` VALUES ('4', 'Sdfsdf');
INSERT INTO `base_category` VALUES ('5', 'hello bd');

-- ----------------------------
-- Table structure for base_color
-- ----------------------------
DROP TABLE IF EXISTS `base_color`;
CREATE TABLE `base_color` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `color_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of base_color
-- ----------------------------
INSERT INTO `base_color` VALUES ('1', 'Red');
INSERT INTO `base_color` VALUES ('2', 'Green');
INSERT INTO `base_color` VALUES ('4', 'Blue');
INSERT INTO `base_color` VALUES ('5', 'yellow');

-- ----------------------------
-- Table structure for base_company_information
-- ----------------------------
DROP TABLE IF EXISTS `base_company_information`;
CREATE TABLE `base_company_information` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `company_name` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `mobile` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `website` varchar(100) DEFAULT NULL,
  `address` longtext,
  `status` int(2) DEFAULT '1',
  `image` varchar(50) DEFAULT NULL,
  `title_bar` varchar(50) DEFAULT NULL,
  `fav_icon` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of base_company_information
-- ----------------------------
INSERT INTO `base_company_information` VALUES ('1', 'IT GROW DIVISTION', 'dhaka', ' 56789', '68790', 'f.7.live.co@gmail.com', 'www.frzf7.com', 'mirpru-10', '1', 'logo.jpg', null, null);

-- ----------------------------
-- Table structure for base_currency_info
-- ----------------------------
DROP TABLE IF EXISTS `base_currency_info`;
CREATE TABLE `base_currency_info` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `currency_name` varchar(30) DEFAULT NULL,
  `currency_symbol` varchar(20) DEFAULT NULL,
  `status` int(2) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of base_currency_info
-- ----------------------------
INSERT INTO `base_currency_info` VALUES ('1', 'Taka', '৳', '1');

-- ----------------------------
-- Table structure for base_customer_gift_card
-- ----------------------------
DROP TABLE IF EXISTS `base_customer_gift_card`;
CREATE TABLE `base_customer_gift_card` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) unsigned DEFAULT NULL,
  `gift_card_id` int(11) unsigned DEFAULT NULL,
  `start_date` datetime DEFAULT NULL,
  `expiration_date` datetime DEFAULT NULL,
  `status` int(11) DEFAULT NULL COMMENT '0=not use, 1= uses',
  `comments` varchar(100) DEFAULT NULL,
  `created_id` int(11) DEFAULT NULL,
  `modified_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `FK_customer_gift_card__base_customer_info` (`customer_id`),
  KEY `FK_customer_gift_card__base_gift_card` (`gift_card_id`),
  CONSTRAINT `FK_customer_gift_card__base_customer_info` FOREIGN KEY (`customer_id`) REFERENCES `base_customer_info` (`id`),
  CONSTRAINT `FK_customer_gift_card__base_gift_card` FOREIGN KEY (`gift_card_id`) REFERENCES `base_gift_card` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of base_customer_gift_card
-- ----------------------------
INSERT INTO `base_customer_gift_card` VALUES ('2', '1', '1', '2018-11-07 00:00:00', '2018-11-23 00:00:00', '0', 'dfghdfgh', '1', '1', '2018-11-06 07:44:12', '2018-11-06 12:58:27');

-- ----------------------------
-- Table structure for base_customer_info
-- ----------------------------
DROP TABLE IF EXISTS `base_customer_info`;
CREATE TABLE `base_customer_info` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `full_name` varchar(50) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `city_name` varchar(255) DEFAULT NULL,
  `gender` int(2) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `created_id` int(11) DEFAULT NULL,
  `modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `modified_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of base_customer_info
-- ----------------------------
INSERT INTO `base_customer_info` VALUES ('1', 'Md. Firozur Rahman', '1729137434', 'Floor#4,House#16,Road#4,mirpur-10,dhaka-1216', null, null, null, null, '2018-11-06 05:37:32', '1', '2018-11-06 10:55:15', '1');
INSERT INTO `base_customer_info` VALUES ('2', 'md. kamal hosstin', '01914131519', 'dhak', null, null, null, null, null, null, null, null);
INSERT INTO `base_customer_info` VALUES ('3', 'md jamal hossain', '01681223354', 'dhaka', null, null, null, null, null, null, null, null);

-- ----------------------------
-- Table structure for base_discount
-- ----------------------------
DROP TABLE IF EXISTS `base_discount`;
CREATE TABLE `base_discount` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `apply_date` datetime DEFAULT NULL,
  `type` int(2) DEFAULT NULL,
  `discount` float DEFAULT NULL,
  `status` int(2) DEFAULT NULL,
  `created_id` int(11) DEFAULT NULL,
  `modified_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `expiration_date` datetime DEFAULT NULL,
  `comments` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of base_discount
-- ----------------------------
INSERT INTO `base_discount` VALUES ('2', '2018-11-05 00:00:00', '1', '500', '1', null, null, null, null, '2018-11-29 00:00:00', 'erfweverwerwrvw');
INSERT INTO `base_discount` VALUES ('3', '2018-11-09 00:00:00', '1', '6', '1', null, null, null, '2018-11-05 10:46:35', '2018-11-29 00:00:00', ' sdfg sdfg  sdfg ');

-- ----------------------------
-- Table structure for base_expenditure_name
-- ----------------------------
DROP TABLE IF EXISTS `base_expenditure_name`;
CREATE TABLE `base_expenditure_name` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `expenditure_name` varchar(150) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of base_expenditure_name
-- ----------------------------
INSERT INTO `base_expenditure_name` VALUES ('1', 'Tea', '1');
INSERT INTO `base_expenditure_name` VALUES ('2', 'Breakfast', '1');

-- ----------------------------
-- Table structure for base_get_point_rules
-- ----------------------------
DROP TABLE IF EXISTS `base_get_point_rules`;
CREATE TABLE `base_get_point_rules` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `min_amount` float DEFAULT NULL,
  `max_amount` float DEFAULT NULL,
  `points` float DEFAULT NULL,
  `comments` varchar(50) DEFAULT NULL,
  `created_id` int(11) DEFAULT NULL,
  `modified_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of base_get_point_rules
-- ----------------------------
INSERT INTO `base_get_point_rules` VALUES ('1', '50', '50', '1', '', '1', null, '2018-11-05 06:50:32', null, '1');

-- ----------------------------
-- Table structure for base_gift_card
-- ----------------------------
DROP TABLE IF EXISTS `base_gift_card`;
CREATE TABLE `base_gift_card` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `card_name` varchar(50) DEFAULT NULL,
  `amount` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of base_gift_card
-- ----------------------------
INSERT INTO `base_gift_card` VALUES ('1', 'Quite carbon', '510');
INSERT INTO `base_gift_card` VALUES ('2', 'Zinuk card', '440');

-- ----------------------------
-- Table structure for base_package
-- ----------------------------
DROP TABLE IF EXISTS `base_package`;
CREATE TABLE `base_package` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `package_name` varchar(200) DEFAULT NULL,
  `total_amount` float DEFAULT NULL,
  `total_quantity` float DEFAULT NULL,
  `comments` varchar(200) DEFAULT NULL,
  `created_id` int(11) DEFAULT NULL,
  `modified_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of base_package
-- ----------------------------
INSERT INTO `base_package` VALUES ('2', 'Selena', '220', '4', 'asd as', '1', null, '2018-11-06 01:10:20', null);
INSERT INTO `base_package` VALUES ('3', 'Sd fdsfsdf', '3432', '88', 'test', '1', '1', '2018-11-06 01:13:20', '2018-11-06 18:35:56');

-- ----------------------------
-- Table structure for base_package_details
-- ----------------------------
DROP TABLE IF EXISTS `base_package_details`;
CREATE TABLE `base_package_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `package_id` int(10) unsigned DEFAULT NULL,
  `product_id` int(11) unsigned DEFAULT NULL,
  `quantity` float DEFAULT NULL,
  `amount` float DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_base_package_details_base_pckage` (`package_id`),
  KEY `FK_package_details__base_product_name_details` (`product_id`),
  CONSTRAINT `FK_base_package_details_base_pckage` FOREIGN KEY (`package_id`) REFERENCES `base_package` (`id`),
  CONSTRAINT `FK_package_details__base_product_name_details` FOREIGN KEY (`product_id`) REFERENCES `base_product_name_details` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of base_package_details
-- ----------------------------
INSERT INTO `base_package_details` VALUES ('3', '2', '3', '4', '55');
INSERT INTO `base_package_details` VALUES ('12', '3', '2', '44', '34');
INSERT INTO `base_package_details` VALUES ('13', '3', '3', '44', '22');

-- ----------------------------
-- Table structure for base_payment_type
-- ----------------------------
DROP TABLE IF EXISTS `base_payment_type`;
CREATE TABLE `base_payment_type` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `payment_name` varchar(50) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of base_payment_type
-- ----------------------------
INSERT INTO `base_payment_type` VALUES ('1', 'Cash', '1');
INSERT INTO `base_payment_type` VALUES ('2', 'Card', '1');
INSERT INTO `base_payment_type` VALUES ('3', 'Check', '1');
INSERT INTO `base_payment_type` VALUES ('4', 'Bkash', '1');
INSERT INTO `base_payment_type` VALUES ('5', 'Rocket', '1');

-- ----------------------------
-- Table structure for base_product_discount
-- ----------------------------
DROP TABLE IF EXISTS `base_product_discount`;
CREATE TABLE `base_product_discount` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `apply_date` datetime DEFAULT NULL,
  `product_id` int(11) unsigned DEFAULT NULL,
  `type` int(2) DEFAULT '1' COMMENT '1=percentange,2=amount',
  `discount` float DEFAULT NULL,
  `created_id` int(11) DEFAULT NULL,
  `modified_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `comments` varchar(200) DEFAULT NULL,
  `expiration_date` datetime DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `FK_product_discount__base_product_details` (`product_id`),
  CONSTRAINT `FK_product_discount__base_product_details` FOREIGN KEY (`product_id`) REFERENCES `base_product_name_details` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of base_product_discount
-- ----------------------------
INSERT INTO `base_product_discount` VALUES ('2', '2018-11-01 00:00:00', '6', '1', '480', '1', '1', '2018-11-05 08:56:25', '2018-11-05 14:08:22', '', '2018-11-29 00:00:00', '1');

-- ----------------------------
-- Table structure for base_product_name_details
-- ----------------------------
DROP TABLE IF EXISTS `base_product_name_details`;
CREATE TABLE `base_product_name_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_name_id` int(11) unsigned DEFAULT NULL,
  `color_id` int(11) unsigned DEFAULT NULL,
  `size_id` int(11) unsigned DEFAULT NULL,
  `barcode` varchar(50) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `created_id` int(11) DEFAULT NULL,
  `modified_id` int(11) DEFAULT NULL,
  `modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `FK_base_color` (`color_id`) USING BTREE,
  KEY `FK_base_size` (`size_id`) USING BTREE,
  KEY `FK_prodcut_details__base_product_name_list` (`product_name_id`),
  CONSTRAINT `FK_prodcut_details__base_product_name_list` FOREIGN KEY (`product_name_id`) REFERENCES `base_product_name_list` (`id`),
  CONSTRAINT `FK_product_details__base_color` FOREIGN KEY (`color_id`) REFERENCES `base_color` (`id`),
  CONSTRAINT `FK_product_details__base_size` FOREIGN KEY (`size_id`) REFERENCES `base_size` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of base_product_name_details
-- ----------------------------
INSERT INTO `base_product_name_details` VALUES ('1', '1', '1', '1', '8941193064054', '2018-11-05 08:28:30', '1', null, '2018-11-08 12:41:51');
INSERT INTO `base_product_name_details` VALUES ('2', '1', '1', '2', '800625485', '2018-11-05 08:28:30', '1', null, '2018-11-08 12:51:33');
INSERT INTO `base_product_name_details` VALUES ('3', '1', '5', '2', null, '2018-11-05 08:28:30', '1', null, null);
INSERT INTO `base_product_name_details` VALUES ('4', '2', '1', '1', null, '2018-11-05 08:36:55', '1', null, null);
INSERT INTO `base_product_name_details` VALUES ('5', '2', '1', '2', null, '2018-11-05 08:36:55', '1', null, null);
INSERT INTO `base_product_name_details` VALUES ('6', '2', '5', '2', null, '2018-11-05 08:36:55', '1', null, null);
INSERT INTO `base_product_name_details` VALUES ('7', '3', '1', '1', null, '2018-11-05 08:39:18', '1', null, null);
INSERT INTO `base_product_name_details` VALUES ('8', '4', '1', '1', null, '2019-07-07 02:55:24', '1', null, null);

-- ----------------------------
-- Table structure for base_product_name_list
-- ----------------------------
DROP TABLE IF EXISTS `base_product_name_list`;
CREATE TABLE `base_product_name_list` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(11) unsigned NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_image` varchar(200) DEFAULT NULL,
  `brand_id` int(11) unsigned DEFAULT NULL,
  `note` longtext,
  `created` datetime DEFAULT NULL,
  `created_id` int(11) DEFAULT NULL,
  `modified_id` int(11) DEFAULT NULL,
  `modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `FK_base_category` (`category_id`),
  KEY `FK_product_name__base_brand` (`brand_id`),
  CONSTRAINT `FK_base_category` FOREIGN KEY (`category_id`) REFERENCES `base_category` (`id`),
  CONSTRAINT `FK_product_name__base_brand` FOREIGN KEY (`brand_id`) REFERENCES `base_brand` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of base_product_name_list
-- ----------------------------
INSERT INTO `base_product_name_list` VALUES ('1', '5', 'Quality ice cream', 'product_1541402910336.jpg', '1', null, '2018-11-05 08:28:30', '1', null, null);
INSERT INTO `base_product_name_list` VALUES ('2', '5', 'Sallu vai', 'product_1541403415301.jpg', '1', null, '2018-11-05 08:36:55', '1', null, '2018-11-06 17:19:08');
INSERT INTO `base_product_name_list` VALUES ('3', '1', 'Ice clue', 'product_1541403558815.jpg', '1', null, '2018-11-05 08:39:18', '1', null, null);
INSERT INTO `base_product_name_list` VALUES ('4', '1', 'Firoz', '', '1', null, '2019-07-07 02:55:24', '1', null, null);

-- ----------------------------
-- Table structure for base_size
-- ----------------------------
DROP TABLE IF EXISTS `base_size`;
CREATE TABLE `base_size` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `size_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of base_size
-- ----------------------------
INSERT INTO `base_size` VALUES ('1', 'Small');
INSERT INTO `base_size` VALUES ('2', 'Large');
INSERT INTO `base_size` VALUES ('3', 'Medium');

-- ----------------------------
-- Table structure for base_supplier
-- ----------------------------
DROP TABLE IF EXISTS `base_supplier`;
CREATE TABLE `base_supplier` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `full_name` varchar(50) DEFAULT NULL,
  `mobile` varchar(50) DEFAULT NULL,
  `company_name` varchar(200) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of base_supplier
-- ----------------------------
INSERT INTO `base_supplier` VALUES ('1', 'kamal hossain', '1729137434', 'it grow division ltd', 'Floor#4,House#16,Road#4,mirpur-10,dhaka-1216');

-- ----------------------------
-- Table structure for base_tax_rules
-- ----------------------------
DROP TABLE IF EXISTS `base_tax_rules`;
CREATE TABLE `base_tax_rules` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `tax_name` varchar(50) DEFAULT NULL,
  `tax_percentage` float DEFAULT NULL,
  `status` int(2) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of base_tax_rules
-- ----------------------------
INSERT INTO `base_tax_rules` VALUES ('1', 'Goverment tax', '15', '1');

-- ----------------------------
-- Table structure for base_user_access
-- ----------------------------
DROP TABLE IF EXISTS `base_user_access`;
CREATE TABLE `base_user_access` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_type_id` int(11) DEFAULT NULL,
  `access_menu` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of base_user_access
-- ----------------------------

-- ----------------------------
-- Table structure for base_user_type
-- ----------------------------
DROP TABLE IF EXISTS `base_user_type`;
CREATE TABLE `base_user_type` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_type` varchar(50) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of base_user_type
-- ----------------------------
INSERT INTO `base_user_type` VALUES ('1', 'Admin', '1');
INSERT INTO `base_user_type` VALUES ('2', ' asa', '1');

-- ----------------------------
-- Table structure for base_wasted_product
-- ----------------------------
DROP TABLE IF EXISTS `base_wasted_product`;
CREATE TABLE `base_wasted_product` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `wasted_date` datetime DEFAULT NULL,
  `product_id` int(11) unsigned NOT NULL,
  `quantity` float DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `comments` varchar(100) DEFAULT NULL,
  `created_id` int(11) DEFAULT NULL,
  `modified_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `FK_product_name_details` (`product_id`),
  CONSTRAINT `FK_product_name_details` FOREIGN KEY (`product_id`) REFERENCES `base_product_name_details` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of base_wasted_product
-- ----------------------------
INSERT INTO `base_wasted_product` VALUES ('2', '2018-11-15 00:00:00', '1', '23', '23', 'asdfasdf', '1', '1', '2018-11-06 09:50:40', '2018-11-06 14:54:22');
INSERT INTO `base_wasted_product` VALUES ('3', '2018-11-15 00:00:00', '2', '23', '23', 'dasdas', '1', null, '2018-11-06 09:52:27', null);

-- ----------------------------
-- Table structure for ci_sessions
-- ----------------------------
DROP TABLE IF EXISTS `ci_sessions`;
CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `ip_address` varchar(16) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `user_agent` varchar(150) COLLATE utf8_bin NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of ci_sessions
-- ----------------------------

-- ----------------------------
-- Table structure for daily_expenditure
-- ----------------------------
DROP TABLE IF EXISTS `daily_expenditure`;
CREATE TABLE `daily_expenditure` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `expenditure_date` datetime DEFAULT NULL,
  `expenditure_name_id` int(11) unsigned DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `supplier_name` varchar(50) DEFAULT NULL,
  `comments` varchar(100) DEFAULT NULL,
  `created_id` int(11) DEFAULT NULL,
  `modified_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_daily_expenditure__expenditure_name` (`expenditure_name_id`),
  CONSTRAINT `FK_daily_expenditure__expenditure_name` FOREIGN KEY (`expenditure_name_id`) REFERENCES `base_expenditure_name` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of daily_expenditure
-- ----------------------------
INSERT INTO `daily_expenditure` VALUES ('1', '2018-11-06 00:00:00', '1', '44', 'firoz', 'guest manu', '1', '1', '2018-11-06 05:01:01', null);
INSERT INTO `daily_expenditure` VALUES ('3', '2018-11-05 00:00:00', '1', '433', 'firoz', '', '1', null, '2018-11-06 05:09:01', null);

-- ----------------------------
-- Table structure for email_setting
-- ----------------------------
DROP TABLE IF EXISTS `email_setting`;
CREATE TABLE `email_setting` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `smtp_host` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `smtp_user` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `smtp_pass` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `smtp_port` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `smtp_crypto` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `email_from` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `replay_to` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `status` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of email_setting
-- ----------------------------

-- ----------------------------
-- Table structure for login_attempts
-- ----------------------------
DROP TABLE IF EXISTS `login_attempts`;
CREATE TABLE `login_attempts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(40) COLLATE utf8_bin NOT NULL,
  `login` varchar(50) COLLATE utf8_bin NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of login_attempts
-- ----------------------------

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8_bin NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL,
  `email` varchar(100) COLLATE utf8_bin NOT NULL,
  `activated` tinyint(1) NOT NULL DEFAULT '1',
  `banned` tinyint(1) NOT NULL DEFAULT '0',
  `ban_reason` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `new_password_key` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `new_password_requested` datetime DEFAULT NULL,
  `new_email` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `new_email_key` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `last_ip` varchar(40) COLLATE utf8_bin NOT NULL,
  `last_login` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_type_id` int(11) unsigned DEFAULT NULL,
  `created_id` int(11) DEFAULT NULL,
  `modified_id` int(11) DEFAULT NULL,
  `password_key` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `FK_user_type` (`user_type_id`),
  CONSTRAINT `FK_user_type` FOREIGN KEY (`user_type_id`) REFERENCES `base_user_type` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'admin', '$2a$08$MkVTkxrlEx3VrP1DYvUlzOmAWH71JZpZ5yJZysk3Wy6CzltBUHxvO', '', '1', '0', '', null, null, null, null, '::1', '2019-07-17 12:13:41', '0000-00-00 00:00:00', '2019-07-17 16:13:41', '1', null, '1', null, '1');
INSERT INTO `users` VALUES ('3', 'testadmin', '$2a$08$aBo0J78y8Op6P6x6DODQ4.DRJSq7gGAPnFzB6XYfvMfcrY4ETthAO', 'f.7.live.co@gmail.com', '1', '0', '', null, null, null, null, '::1', '2018-11-04 08:37:11', '2018-11-04 06:44:07', '2018-11-04 13:37:11', '1', '1', null, 'oh3hphoh7h4hvhzhuh', '1');
INSERT INTO `users` VALUES ('6', 'information', '$2a$08$.o0YbSgRl4La8ZOnIR0DnOtdTUfw4YNYs81NKTCaKdxyvjAk4BSn2', 'f.7.live.co@gmail.com', '1', '1', 'Just inactive. call your administratro or vendor.', null, null, null, null, '::1', '0000-00-00 00:00:00', '2018-11-04 06:50:38', '2018-11-04 13:23:14', '1', '1', '1', 'zhuh2hthqhvh7hohzhthuh', '0');
INSERT INTO `users` VALUES ('7', 'informationx', '$2a$08$4cEwbgeFLGyYkWYPT8FrBe2KGycYlu31XdTT0YWDo4RXRVVScUKTO', 'f.7.live.co@gmail.com', '1', '0', '', null, null, null, null, '::1', '0000-00-00 00:00:00', '2018-11-04 06:51:09', '2018-11-04 12:15:29', '1', '1', null, 'zhuh2hthqhvh7hohzhthuhkh', '1');
INSERT INTO `users` VALUES ('8', 'abc23445', '$2a$08$JZujYiae/rxd62lRk.fXVuL2bI9iPzbFiJdgzUQcTYImtWHL8.6WW', '', '1', '0', null, null, null, null, null, '::1', '0000-00-00 00:00:00', '2018-11-04 06:58:39', '2018-11-04 12:18:39', '1', '1', '1', '7h6h5hfeddc', '1');

-- ----------------------------
-- Table structure for user_autologin
-- ----------------------------
DROP TABLE IF EXISTS `user_autologin`;
CREATE TABLE `user_autologin` (
  `key_id` char(32) COLLATE utf8_bin NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `user_agent` varchar(150) COLLATE utf8_bin NOT NULL,
  `last_ip` varchar(40) COLLATE utf8_bin NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`key_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of user_autologin
-- ----------------------------

-- ----------------------------
-- Table structure for user_profiles
-- ----------------------------
DROP TABLE IF EXISTS `user_profiles`;
CREATE TABLE `user_profiles` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `mobile` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `image` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `comments` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `gender` int(2) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `religion` int(2) DEFAULT NULL,
  `marital_status` int(2) DEFAULT NULL,
  `present_address` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `permanent_address` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `user_profiles_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of user_profiles
-- ----------------------------
INSERT INTO `user_profiles` VALUES ('1', '1', 'Firoz', '01729137434', '001_frz.jpg', '', null, null, null, null, null, null);
INSERT INTO `user_profiles` VALUES ('2', '3', 'testadmin', '44444444444', '003_frz.jpg', '', null, null, null, null, null, null);
INSERT INTO `user_profiles` VALUES ('5', '6', 'information', '44444444444', '006_frz.jpg', '', null, null, null, null, null, null);
INSERT INTO `user_profiles` VALUES ('6', '7', 'informationx', '44444444444', '007_frz.jpg', '', null, null, null, null, null, null);
INSERT INTO `user_profiles` VALUES ('7', '8', 'asldfjalsdj', '97809353459', '008_frz.jpg', '', null, null, null, null, null, null);

-- ----------------------------
-- Table structure for zee_customer_due_list
-- ----------------------------
DROP TABLE IF EXISTS `zee_customer_due_list`;
CREATE TABLE `zee_customer_due_list` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `entry_date` datetime DEFAULT NULL,
  `customer_id` int(11) unsigned DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `comments` varchar(200) DEFAULT NULL,
  `created_id` int(11) DEFAULT NULL,
  `modified_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `FK_customer_due_list__base_customer_info` (`customer_id`),
  CONSTRAINT `FK_customer_due_list__base_customer_info` FOREIGN KEY (`customer_id`) REFERENCES `base_customer_info` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zee_customer_due_list
-- ----------------------------
INSERT INTO `zee_customer_due_list` VALUES ('2', '2018-11-07 00:00:00', '1', '660', 'new amount xxxx', '1', '1', '2018-11-07 04:09:40', '2018-11-07 09:21:53');

-- ----------------------------
-- Table structure for zee_customer_payment_list
-- ----------------------------
DROP TABLE IF EXISTS `zee_customer_payment_list`;
CREATE TABLE `zee_customer_payment_list` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pay_date` datetime DEFAULT NULL,
  `customer_id` int(11) unsigned DEFAULT NULL,
  `payment_type_id` int(2) unsigned DEFAULT NULL,
  `card_check_number` varchar(50) DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `comments` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `created_id` int(11) DEFAULT NULL,
  `modified_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `FK_customer_payment_list__base_customer_info` (`customer_id`),
  KEY `FK_customer_payment_list__base_payment_type` (`payment_type_id`),
  CONSTRAINT `FK_customer_payment_list__base_customer_info` FOREIGN KEY (`customer_id`) REFERENCES `base_customer_info` (`id`),
  CONSTRAINT `FK_customer_payment_list__base_payment_type` FOREIGN KEY (`payment_type_id`) REFERENCES `base_payment_type` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zee_customer_payment_list
-- ----------------------------
INSERT INTO `zee_customer_payment_list` VALUES ('1', '2018-11-07 00:00:00', '1', '4', '01729137434', '44', 'no way', '1', '1', '2018-11-07 03:18:20', '2018-11-07 08:48:27');

-- ----------------------------
-- Table structure for zee_invoice_customer_uses_point
-- ----------------------------
DROP TABLE IF EXISTS `zee_invoice_customer_uses_point`;
CREATE TABLE `zee_invoice_customer_uses_point` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) unsigned DEFAULT NULL,
  `invoice_id` int(11) unsigned DEFAULT NULL,
  `point` float DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_customer_usses_point__base_customer_info` (`customer_id`),
  KEY `invoice_id` (`invoice_id`),
  CONSTRAINT `FK_customer_usses_point__base_customer_info` FOREIGN KEY (`customer_id`) REFERENCES `base_customer_info` (`id`),
  CONSTRAINT `zee_invoice_customer_uses_point_ibfk_1` FOREIGN KEY (`invoice_id`) REFERENCES `zee_invoice_info` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zee_invoice_customer_uses_point
-- ----------------------------

-- ----------------------------
-- Table structure for zee_invoice_free_product_list
-- ----------------------------
DROP TABLE IF EXISTS `zee_invoice_free_product_list`;
CREATE TABLE `zee_invoice_free_product_list` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `invoice_id` int(11) unsigned DEFAULT NULL,
  `product_id` int(11) unsigned DEFAULT NULL,
  `quantity` float DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_invoice_free_product__zee_invoice_info` (`invoice_id`),
  KEY `FK_invoice_free_product__product_name_details` (`product_id`),
  CONSTRAINT `FK_invoice_free_product__product_name_details` FOREIGN KEY (`product_id`) REFERENCES `base_product_name_details` (`id`),
  CONSTRAINT `FK_invoice_free_product__zee_invoice_info` FOREIGN KEY (`invoice_id`) REFERENCES `zee_invoice_info` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zee_invoice_free_product_list
-- ----------------------------

-- ----------------------------
-- Table structure for zee_invoice_info
-- ----------------------------
DROP TABLE IF EXISTS `zee_invoice_info`;
CREATE TABLE `zee_invoice_info` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `invoice_date` datetime DEFAULT NULL,
  `customer_id` int(11) unsigned DEFAULT NULL,
  `total_quantity` float DEFAULT NULL,
  `use_point_amount` float DEFAULT NULL,
  `total_amount` float DEFAULT NULL,
  `total_discount_amount` float DEFAULT NULL,
  `payable_amount` float DEFAULT NULL,
  `paid_amount` float DEFAULT NULL,
  `payment_type_id` int(11) unsigned DEFAULT NULL,
  `card_check_number` varchar(50) DEFAULT NULL,
  `created_id` int(11) DEFAULT NULL,
  `modified_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `comments` varchar(200) DEFAULT NULL,
  `status` int(11) DEFAULT '1' COMMENT '1=sold,2=return',
  PRIMARY KEY (`id`),
  KEY `FK_invoice_info__base_customer_info` (`customer_id`),
  KEY `FK_invoice_info__base_payment_type` (`payment_type_id`),
  CONSTRAINT `FK_invoice_info__base_customer_info` FOREIGN KEY (`customer_id`) REFERENCES `base_customer_info` (`id`),
  CONSTRAINT `FK_invoice_info__base_payment_type` FOREIGN KEY (`payment_type_id`) REFERENCES `base_payment_type` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zee_invoice_info
-- ----------------------------

-- ----------------------------
-- Table structure for zee_invoice_info_details
-- ----------------------------
DROP TABLE IF EXISTS `zee_invoice_info_details`;
CREATE TABLE `zee_invoice_info_details` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `invoice_id` int(11) unsigned DEFAULT NULL,
  `product_id` int(11) unsigned DEFAULT NULL,
  `quantity` float DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `discount_amount` float DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_invoice_details__zee_invoice_info` (`invoice_id`),
  KEY `FK_invoice_info_details__product_name_details` (`product_id`),
  CONSTRAINT `FK_invoice_details__zee_invoice_info` FOREIGN KEY (`invoice_id`) REFERENCES `zee_invoice_info` (`id`),
  CONSTRAINT `FK_invoice_info_details__product_name_details` FOREIGN KEY (`product_id`) REFERENCES `base_product_name_details` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zee_invoice_info_details
-- ----------------------------

-- ----------------------------
-- Table structure for zee_invoice_info_package_list
-- ----------------------------
DROP TABLE IF EXISTS `zee_invoice_info_package_list`;
CREATE TABLE `zee_invoice_info_package_list` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `invoice_id` int(11) unsigned DEFAULT NULL,
  `package_id` int(11) unsigned DEFAULT NULL,
  `quantity` float DEFAULT NULL,
  `amount` float DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_invoice_details__zee_invoice_info` (`invoice_id`),
  KEY `FK_invoice_info_details__product_name_details` (`package_id`),
  CONSTRAINT `zee_invoice_info_package_list_ibfk_1` FOREIGN KEY (`invoice_id`) REFERENCES `zee_invoice_info` (`id`),
  CONSTRAINT `zee_invoice_info_package_list_ibfk_2` FOREIGN KEY (`package_id`) REFERENCES `base_package` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zee_invoice_info_package_list
-- ----------------------------

-- ----------------------------
-- Table structure for zee_invoice_retrun
-- ----------------------------
DROP TABLE IF EXISTS `zee_invoice_retrun`;
CREATE TABLE `zee_invoice_retrun` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `return_date` datetime DEFAULT NULL,
  `customer_id` int(11) unsigned DEFAULT NULL,
  `invoice_id` int(11) unsigned DEFAULT NULL,
  `comments` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `created_id` int(11) DEFAULT NULL,
  `modified_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_invoice_return__base_customer_info` (`customer_id`),
  CONSTRAINT `FK_invoice_return__base_customer_info` FOREIGN KEY (`customer_id`) REFERENCES `base_customer_info` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zee_invoice_retrun
-- ----------------------------

-- ----------------------------
-- Table structure for zee_invoice_return_details
-- ----------------------------
DROP TABLE IF EXISTS `zee_invoice_return_details`;
CREATE TABLE `zee_invoice_return_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `invoice_return_id` int(11) unsigned DEFAULT NULL,
  `product_id` int(11) unsigned DEFAULT NULL,
  `quantity` float DEFAULT NULL,
  `amount` float DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_invoice_return__zee_invoice_retrun` (`invoice_return_id`),
  KEY `FK_invoice_return_details__product_name_details` (`product_id`),
  CONSTRAINT `FK_invoice_return__zee_invoice_retrun` FOREIGN KEY (`invoice_return_id`) REFERENCES `zee_invoice_retrun` (`id`),
  CONSTRAINT `FK_invoice_return_details__product_name_details` FOREIGN KEY (`product_id`) REFERENCES `base_product_name_details` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zee_invoice_return_details
-- ----------------------------

-- ----------------------------
-- Table structure for zee_invoice_sales_tax
-- ----------------------------
DROP TABLE IF EXISTS `zee_invoice_sales_tax`;
CREATE TABLE `zee_invoice_sales_tax` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `invoice_id` int(11) unsigned DEFAULT NULL,
  `tax_id` int(11) unsigned DEFAULT NULL,
  `tax_amount` float DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_invoice_sales_tax__zee_invoice_info` (`invoice_id`),
  KEY `FK_invoice_sales_tax__base_tax_rules` (`tax_id`),
  CONSTRAINT `FK_invoice_sales_tax__base_tax_rules` FOREIGN KEY (`tax_id`) REFERENCES `base_tax_rules` (`id`),
  CONSTRAINT `FK_invoice_sales_tax__zee_invoice_info` FOREIGN KEY (`invoice_id`) REFERENCES `zee_invoice_info` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zee_invoice_sales_tax
-- ----------------------------

-- ----------------------------
-- Table structure for zee_purchase_info
-- ----------------------------
DROP TABLE IF EXISTS `zee_purchase_info`;
CREATE TABLE `zee_purchase_info` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `purchase_date` datetime DEFAULT NULL,
  `supplier_id` int(11) unsigned NOT NULL,
  `invoice_number` varchar(50) DEFAULT NULL,
  `total_quantity` float DEFAULT NULL,
  `total_buy_amount` float DEFAULT NULL,
  `total_sell_amount` float DEFAULT NULL,
  `total_discount_amount` float DEFAULT '0',
  `total_paid_amount` float DEFAULT NULL,
  `comments` varchar(200) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `created_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified_id` int(11) DEFAULT NULL,
  `modified` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_purchase_info__base_supplier` (`supplier_id`),
  CONSTRAINT `FK_purchase_info__base_supplier` FOREIGN KEY (`supplier_id`) REFERENCES `base_supplier` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zee_purchase_info
-- ----------------------------

-- ----------------------------
-- Table structure for zee_purchase_return
-- ----------------------------
DROP TABLE IF EXISTS `zee_purchase_return`;
CREATE TABLE `zee_purchase_return` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `return_date` datetime DEFAULT NULL,
  `invoice_number` int(11) DEFAULT NULL,
  `supplier_id` int(11) unsigned NOT NULL,
  `total_quantity` int(11) DEFAULT NULL,
  `total_amount` float DEFAULT NULL,
  `comments` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT '1' COMMENT '1=return send back waiting, 0=done',
  `created_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified_id` int(11) DEFAULT NULL,
  `modified` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_purchase_return__base_supplier` (`supplier_id`),
  CONSTRAINT `FK_purchase_return__base_supplier` FOREIGN KEY (`supplier_id`) REFERENCES `base_supplier` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zee_purchase_return
-- ----------------------------
INSERT INTO `zee_purchase_return` VALUES ('5', '2018-11-08 00:00:00', '0', '1', '459', '999', '', '1', '1', '2018-11-08 12:16:17', null, null);
INSERT INTO `zee_purchase_return` VALUES ('6', '2018-11-08 00:00:00', '0', '1', '118', '609', '', '1', '1', '2018-11-08 12:16:25', '1', null);

-- ----------------------------
-- Table structure for zee_purchase_return_details
-- ----------------------------
DROP TABLE IF EXISTS `zee_purchase_return_details`;
CREATE TABLE `zee_purchase_return_details` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `purchse_return_id` int(11) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `quantity` float DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `status` int(11) DEFAULT '1' COMMENT '1=return send back waiting, 0=done',
  PRIMARY KEY (`id`),
  KEY `FK_purchase_return_details_zee_purchase_return` (`purchse_return_id`),
  KEY `FK_purchase_return_details__product_name_details` (`product_id`),
  CONSTRAINT `FK_purchase_return_details__product_name_details` FOREIGN KEY (`product_id`) REFERENCES `base_product_name_details` (`id`),
  CONSTRAINT `FK_purchase_return_details_zee_purchase_return` FOREIGN KEY (`purchse_return_id`) REFERENCES `zee_purchase_return` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of zee_purchase_return_details
-- ----------------------------
INSERT INTO `zee_purchase_return_details` VALUES ('9', '5', '3', '455', '555', '0');
INSERT INTO `zee_purchase_return_details` VALUES ('10', '5', '1', '4', '444', '1');
INSERT INTO `zee_purchase_return_details` VALUES ('26', '6', '4', '4', '444', '1');
INSERT INTO `zee_purchase_return_details` VALUES ('27', '6', '1', '55', '55', '1');
INSERT INTO `zee_purchase_return_details` VALUES ('28', '6', '2', '55', '66', '1');
INSERT INTO `zee_purchase_return_details` VALUES ('29', '6', '1', '4', '44', '1');

-- ----------------------------
-- Table structure for zee_stock_info
-- ----------------------------
DROP TABLE IF EXISTS `zee_stock_info`;
CREATE TABLE `zee_stock_info` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(11) unsigned NOT NULL,
  `quantity` int(4) DEFAULT NULL,
  `buy_price` float DEFAULT NULL,
  `sell_price` float DEFAULT NULL,
  `purchase_id` int(11) unsigned NOT NULL,
  `status` int(2) DEFAULT '1',
  `created_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified_id` int(11) DEFAULT NULL,
  `modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `FK_stock_info__zee_purchase_info` (`purchase_id`),
  KEY `FK_stock_info__product_name_details` (`product_id`),
  CONSTRAINT `FK_stock_info__product_name_details` FOREIGN KEY (`product_id`) REFERENCES `base_product_name_details` (`id`),
  CONSTRAINT `FK_stock_info__zee_purchase_info` FOREIGN KEY (`purchase_id`) REFERENCES `zee_purchase_info` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zee_stock_info
-- ----------------------------

-- ----------------------------
-- Table structure for zee_supplier_due_list
-- ----------------------------
DROP TABLE IF EXISTS `zee_supplier_due_list`;
CREATE TABLE `zee_supplier_due_list` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `entry_date` datetime DEFAULT NULL,
  `supplier_id` int(11) unsigned DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `comments` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `created_id` int(11) DEFAULT NULL,
  `modified_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `FK_supplier_due__base_supplier` (`supplier_id`),
  CONSTRAINT `FK_supplier_due__base_supplier` FOREIGN KEY (`supplier_id`) REFERENCES `base_supplier` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zee_supplier_due_list
-- ----------------------------
INSERT INTO `zee_supplier_due_list` VALUES ('2', '2018-11-07 00:00:00', '1', '440', 'now way', '1', '1', '2018-11-07 05:34:06', '2018-11-07 10:45:45');

-- ----------------------------
-- Table structure for zee_supplier_payment_list
-- ----------------------------
DROP TABLE IF EXISTS `zee_supplier_payment_list`;
CREATE TABLE `zee_supplier_payment_list` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pay_date` datetime DEFAULT NULL,
  `supplier_id` int(11) unsigned NOT NULL,
  `payment_type_id` int(2) unsigned NOT NULL,
  `card_check_number` varchar(50) DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `comments` varchar(200) DEFAULT NULL,
  `created_id` int(11) DEFAULT NULL,
  `modified_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `FK_base_supplier` (`supplier_id`),
  KEY `FK_base_payment_type` (`payment_type_id`),
  CONSTRAINT `FK_base_payment_type` FOREIGN KEY (`payment_type_id`) REFERENCES `base_payment_type` (`id`),
  CONSTRAINT `FK_base_supplier` FOREIGN KEY (`supplier_id`) REFERENCES `base_supplier` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zee_supplier_payment_list
-- ----------------------------
INSERT INTO `zee_supplier_payment_list` VALUES ('2', '2018-11-07 00:00:00', '1', '1', '', '1000', 'dgfb gdf', '1', '1', '2018-11-07 04:52:19', '2018-11-07 10:02:56');
