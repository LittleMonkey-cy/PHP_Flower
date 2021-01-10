/*
SQLyog 企业版 - MySQL GUI v7.14 
MySQL - 5.7.21 : Database - flower
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`flower` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `flower`;

/*Table structure for table `attention` */

DROP TABLE IF EXISTS `attention`;

CREATE TABLE `attention` (
  `attention_id` int(11) NOT NULL AUTO_INCREMENT,
  `attention_star_id` int(11) NOT NULL,
  `attention_fans_id` int(11) NOT NULL,
  `attention_time` int(11) NOT NULL,
  PRIMARY KEY (`attention_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `attention` */

/*Table structure for table `chat` */

DROP TABLE IF EXISTS `chat`;

CREATE TABLE `chat` (
  `chat_id` int(11) NOT NULL AUTO_INCREMENT,
  `chat_pic_id` int(11) NOT NULL,
  `chat_user_id` int(11) NOT NULL,
  `chat_data` varchar(300) NOT NULL,
  `chat_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `chat_state` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`chat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

/*Data for the table `chat` */

insert  into `chat`(`chat_id`,`chat_pic_id`,`chat_user_id`,`chat_data`,`chat_time`,`chat_state`) values (14,26,17,'我太美了吧！','2020-06-29 22:12:49',1),(15,19,17,'你好帅','2020-06-29 22:54:26',1),(16,26,18,'楼主说的太对了！！！','2020-06-29 23:03:25',1),(17,24,18,'菅田将晖你太帅了','2020-06-29 23:04:13',1),(18,24,18,'爱了爱了','2020-06-29 23:04:29',1),(19,24,18,'suda masaki','2020-06-29 23:05:58',1),(20,24,17,'aaaaaaaaaaaaaaaaa','2020-06-29 23:07:55',1),(21,30,18,'你太美啦','2020-06-29 23:12:04',1),(22,19,18,'哇','2020-06-29 23:30:36',1),(23,30,19,'&lt;div&gt;&lt;/div&gt;','2020-06-30 12:58:59',1),(24,31,17,'666','2020-06-30 15:00:38',1);

/*Table structure for table `collection` */

DROP TABLE IF EXISTS `collection`;

CREATE TABLE `collection` (
  `collection_id` int(11) NOT NULL AUTO_INCREMENT,
  `collection_user_id` int(11) NOT NULL,
  `collection_pic_id` int(11) NOT NULL,
  `collection_state` tinyint(4) NOT NULL DEFAULT '1',
  `collection_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`collection_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

/*Data for the table `collection` */

insert  into `collection`(`collection_id`,`collection_user_id`,`collection_pic_id`,`collection_state`,`collection_time`) values (2,15,15,1,'2020-06-29 16:53:35'),(3,15,15,1,'2020-06-29 16:54:47'),(4,16,16,1,'2020-06-29 18:06:10'),(5,15,16,1,'2020-06-29 18:07:13'),(6,15,12,1,'2020-06-29 18:12:27'),(7,16,14,1,'2020-06-29 19:39:17'),(8,16,12,1,'2020-06-29 20:56:22'),(10,17,24,1,'2020-06-29 22:24:20'),(11,17,18,1,'2020-06-29 22:25:39'),(12,18,24,1,'2020-06-29 23:11:49'),(13,17,30,1,'2020-06-29 23:12:45'),(14,19,30,1,'2020-06-30 13:11:36'),(15,17,30,1,'2020-06-30 14:34:00'),(16,17,30,1,'2020-06-30 14:39:36'),(17,17,31,1,'2020-06-30 15:00:28');

/*Table structure for table `pic` */

DROP TABLE IF EXISTS `pic`;

CREATE TABLE `pic` (
  `pic_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pic_title` varchar(40) NOT NULL,
  `pic_category` varchar(10) NOT NULL,
  `pic_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `pic_user_id` int(11) NOT NULL,
  `pic_detail` varchar(60) NOT NULL,
  `pic_file` varchar(90) NOT NULL,
  `pic_collection_number` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`pic_id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

/*Data for the table `pic` */

insert  into `pic`(`pic_id`,`pic_title`,`pic_category`,`pic_time`,`pic_user_id`,`pic_detail`,`pic_file`,`pic_collection_number`) values (16,'珍妮','无','2020-06-29 22:04:29',15,'无描述','9bf31c7ff062936a96d3c8bd1f8f2ff35ef9f4ed66a3d.jpeg',NULL),(17,'珍妮','无','2020-06-29 22:06:27',17,'无描述','70efdf2ec9b086079795c442636b55fb5ef9f5633d4e4.jpeg',NULL),(18,'珍妮','无','2020-06-29 22:08:35',17,'无描述','70efdf2ec9b086079795c442636b55fb5ef9f5e374aa1.jpeg',NULL),(19,'菅田将晖','无','2020-06-29 22:09:17',17,'帅！！！','70efdf2ec9b086079795c442636b55fb5ef9f60daca6d.jpeg',NULL),(20,'菅田将晖','无','2020-06-29 22:09:41',17,'无描述','70efdf2ec9b086079795c442636b55fb5ef9f625cf7d0.jpeg',NULL),(21,'菅田将晖','无','2020-06-29 22:10:08',17,'无描述','70efdf2ec9b086079795c442636b55fb5ef9f640dde1c.jpeg',NULL),(22,'SEHUN','无','2020-06-29 22:10:37',17,'EXO','70efdf2ec9b086079795c442636b55fb5ef9f65d705a8.jpeg',NULL),(23,'SEHUN','无','2020-06-29 22:10:50',17,'无描述','70efdf2ec9b086079795c442636b55fb5ef9f66a61eda.jpeg',NULL),(24,'苏打','无','2020-06-29 22:11:27',17,'无描述','70efdf2ec9b086079795c442636b55fb5ef9f68f11feb.jpeg',NULL),(25,'苏打','无','2020-06-29 22:12:05',17,'无描述','70efdf2ec9b086079795c442636b55fb5ef9f6b530226.jpeg',NULL),(26,'小龙','无','2020-06-29 22:12:31',17,'无描述','70efdf2ec9b086079795c442636b55fb5ef9f6cf45935.jpeg',NULL),(27,'HAPPY','无','2020-06-29 22:13:20',17,'无描述','70efdf2ec9b086079795c442636b55fb5ef9f70098591.jpeg',NULL),(28,'佐藤健','无','2020-06-29 22:13:55',17,'无描述','70efdf2ec9b086079795c442636b55fb5ef9f7238b486.jpeg',NULL),(29,'珍妮','无','2020-06-29 23:10:52',18,'无描述','6f4922f45568161a8cdf4ad2299f6d235efa047c4dc57.jpeg',NULL),(30,'珍妮','无','2020-06-29 23:11:05',18,'无描述','6f4922f45568161a8cdf4ad2299f6d235efa04893f0c4.jpeg',NULL),(31,'小龙','无','2020-06-30 15:00:05',17,'无描述','70efdf2ec9b086079795c442636b55fb5efae2f5c95c5.jpeg',NULL);

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_name` char(95) NOT NULL,
  `user_email` varchar(95) DEFAULT NULL,
  `user_phone` bigint(16) unsigned DEFAULT NULL,
  `user_password` char(35) NOT NULL,
  `user_state` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `user_time_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_logo_name` char(60) NOT NULL DEFAULT 'lalala.jpg',
  `user_bg_name` char(60) NOT NULL DEFAULT 'lalala.jpg',
  `user_text` varchar(300) NOT NULL DEFAULT '此人很懒没有留下任何东西',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_name` (`user_name`),
  UNIQUE KEY `user_email` (`user_email`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

/*Data for the table `user` */

insert  into `user`(`user_id`,`user_name`,`user_email`,`user_phone`,`user_password`,`user_state`,`user_time_reg`,`user_logo_name`,`user_bg_name`,`user_text`) values (17,'user_17332385226',NULL,17332385226,'98409705afa295c72a91f3eacb2fb89e',0,'2020-06-29 22:05:41','lalala.jpg','lalala.jpg','此人很懒没有留下任何东西'),(18,'user_12345678912',NULL,12345678912,'a3be1daa240bfe582a3f06bec5f2f878',0,'2020-06-29 22:56:46','hahaha.jpg','hahaha.jpg','此人很懒没有留下任何东西'),(19,'user_13833343525',NULL,13833343525,'fcc431859ec151c0f5ac7673c571f91a',0,'2020-06-30 11:11:33','lalala.jpg','lalala.jpg','此人很懒没有留下任何东西');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
