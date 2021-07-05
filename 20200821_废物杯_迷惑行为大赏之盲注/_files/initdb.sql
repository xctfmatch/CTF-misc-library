DROP DATABASE IF EXISTS test;
CREATE DATABASE `测试`;
USE `测试`;

DROP TABLE IF EXISTS `15665611612`;
CREATE TABLE `15665611612` (
  `id` int(5) NOT NULL,
  `values` int(5) NOT NULL,
  `what@you@want` varchar(100) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `15665611612` VALUES (1,272,'e'),(2,314,'pai'),(3,618,'perfect'),(-1,877,'          flag_demo'),(666,666,'加QQ群815558405，比赛结束抢拼手气10元红包');

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(5) NOT NULL,
  `username` varchar(8) NOT NULL,
  `passw0rd` char(32) NOT NULL,
  `password` char(32) NOT NULL,
  `country` varchar(32) NOT NULL,
  `province` varchar(32) NOT NULL,
  `city` varchar(32) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `first_name` varchar(2) NOT NULL,
  `last_name` varchar(2) NOT NULL,
  `idcard` varchar(32) NOT NULL,
  `age` varchar(32) NOT NULL,
  `origin` varchar(32) NOT NULL,
  `flagnothere` varchar(32) NOT NULL,
  `createdate` datetime NOT NULL,
  `updatedate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE DATABASE `database`;
USE `database`;

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(5) NOT NULL,
  `username` varchar(8) NOT NULL,
  `passw0rd` char(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `user` VALUES (1,'admin','327a6c4304ad5938eaf0efb6cc3e53dc'),(2,'root','8134b84030cca5285ed0e0b31ba06f10'),(3,'master','a74eaee2c556e919790756dd07b6b555');

USE mysql;
DELETE FROM user WHERE user='';
GRANT ALL PRIVILEGES ON *.* TO 'root'@'localhost' IDENTIFIED BY "ctfshow" WITH GRANT OPTION;
FLUSH PRIVILEGES;
