-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2015-04-05 10:14:46
-- 服务器版本： 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `turen_pw`
--

-- --------------------------------------------------------

--
-- 表的结构 `t_language`
--

CREATE TABLE IF NOT EXISTS `t_language` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `code` varchar(5) NOT NULL,
  `locale` varchar(255) NOT NULL,
  `image` varchar(64) NOT NULL,
  `directory` varchar(32) NOT NULL,
  `sort_order` int(3) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `t_language`
--

INSERT INTO `t_language` (`id`, `name`, `code`, `locale`, `image`, `directory`, `sort_order`, `status`) VALUES
(1, 'English', 'en', 'en_US.UTF-8,en_US,en-gb,english', 'gb.png', 'english', 1, 1),
(2, 'Chinese', 'cn', 'zh,zh-hk,zh-cn,zh-cn.UTF-8,cn-gb,chinese', 'cn.png', 'chinese', 2, 1);

-- --------------------------------------------------------

--
-- 表的结构 `t_migration`
--

CREATE TABLE IF NOT EXISTS `t_migration` (
  `version` varchar(255) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `t_migration`
--

INSERT INTO `t_migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1422955017),
('m150203_091719_tbl_user', 1422955074),
('m150203_091908_tbl_user', 1422955242),
('m150203_091912_tbl_user', 1422955242),
('m150203_091914_tbl_user', 1422955242);

-- --------------------------------------------------------

--
-- 表的结构 `t_operation_log`
--

CREATE TABLE IF NOT EXISTS `t_operation_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `actions` varchar(100) CHARACTER SET utf8 NOT NULL,
  `gets` varchar(200) CHARACTER SET utf8 NOT NULL,
  `posts` mediumtext CHARACTER SET utf8 NOT NULL,
  `create_time` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  FULLTEXT KEY `posts` (`posts`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `t_session`
--

CREATE TABLE IF NOT EXISTS `t_session` (
  `id` char(32) NOT NULL,
  `expire` int(11) DEFAULT NULL,
  `data` longblob,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `t_session`
--

INSERT INTO `t_session` (`id`, `expire`, `data`) VALUES
('0n59a450042o848qkng69ffjt4', 1427899084, 0x6769695f5f72657475726e55726c7c733a33373a222f747572656e2e70772f696e6465782e7068703f723d6769692f6d6f64656c2f696e646578223b),
('o05ssvbme6naf50sn6f6bm1911', 1427899097, 0x6769695f5f72657475726e55726c7c733a32353a222f747572656e2e70772f696e6465782e7068703f723d676969223b6769695f5f69647c733a353a227969696572223b6769695f5f6e616d657c733a353a227969696572223b6769695f5f7374617465737c613a303a7b7d);

-- --------------------------------------------------------

--
-- 表的结构 `t_setting`
--

CREATE TABLE IF NOT EXISTS `t_setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(32) NOT NULL,
  `ckey` varchar(64) NOT NULL,
  `value` text NOT NULL,
  `serialized` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ckey_2` (`ckey`),
  KEY `ckey` (`ckey`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=640 ;

--
-- 转存表中的数据 `t_setting`
--

INSERT INTO `t_setting` (`id`, `code`, `ckey`, `value`, `serialized`) VALUES
(634, 'any', 'config_site_name', '网站名称', 0),
(635, 'any', 'config_site_owner', '网站管理员', 0),
(636, 'any', 'config_address', '联系地址', 0),
(637, 'any', 'config_email', '980522557@qq.com', 0),
(638, 'any', 'config_tel', '联系电话', 0),
(639, 'any', 'config_fax', '传真号码', 0);

-- --------------------------------------------------------

--
-- 表的结构 `t_user`
--

CREATE TABLE IF NOT EXISTS `t_user` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '信息id',
  `user_name` varchar(30) NOT NULL COMMENT '用户名',
  `password` varchar(128) NOT NULL COMMENT '密码',
  `email` varchar(128) NOT NULL,
  `nick_name` char(32) NOT NULL COMMENT '昵称',
  `user_group_id` int(10) unsigned NOT NULL COMMENT '用户组',
  `login_ip` char(20) NOT NULL COMMENT '登录IP',
  `date_added` int(10) unsigned NOT NULL COMMENT '登录时间',
  `status` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=42 ;

--
-- 转存表中的数据 `t_user`
--

INSERT INTO `t_user` (`id`, `user_name`, `password`, `email`, `nick_name`, `user_group_id`, `login_ip`, `date_added`, `status`) VALUES
(2, 'test1', '123456', 'd98sf0522667@qq.com', 'jorry', 2, '1', 1, 1),
(4, 'test', '123456', 'f980522667@qq.com', 'jorry', 4, '2342342', 1234567, 1),
(7, 'test', '123456', '980522667@qq.com', 'jorry', 3, '2342342', 1234567, 1),
(9, 'test', '123456', '980522667@qq.com', 'jorry', 2, '2342342', 1234567, 1),
(11, 'test', '123456', '980522667@qq.com', 'jorry', 2, '2342342', 1234567, 1),
(21, 'test', '123456', 'a980522667@qq.com', 'jorry', 1, '2342342', 1234567, 0),
(22, 'test', '123456', '980522667@qq.com', 'jorry', 1, '2342342', 1234567, 0),
(23, 'test', '123456', '980522667@qq.com', 'jorry', 1, '2342342', 1234567, 0),
(24, 'test', '123456', '980522667@qq.com', 'jorry', 1, '2342342', 1234567, 0),
(25, 'test', '123456', '980522667@qq.com', 'jorry', 1, '2342342', 1234567, 0),
(26, 'test', '123456', 'ef980522667@qq.com', 'jorry', 1, '2342342', 1234567, 0),
(27, 'test', '123456', '980522667@qq.com', 'jorry', 1, '2342342', 1234567, 0),
(28, 'test', '123456', '980522667@qq.com', 'jorry', 1, '2342342', 1234567, 0),
(33, 'test', '123456', '980522667@qq.com', 'jorry', 1, '2342342', 1234567, 0),
(35, 'test', '123456', '980522667@qq.com', 'jorry', 1, '2342342', 1234567, 0),
(36, 'test', '123456', '980522667@qq.com', 'jorry', 1, '2342342', 1234567, 0),
(37, 'test', '123456', '980522667@qq.com', 'jorry', 1, '2342342', 1234567, 0),
(38, 'test', '123456', '980522667@qq.com', 'jorry', 1, '2342342', 1234567, 1),
(39, 'test', '123456', '980522667@qq.com', 'jorry', 1, '2342342', 1234567, 1),
(40, 'test', '123456', '980522667@qq.com', 'jorry', 1, '2342342', 1234567, 1),
(41, 'test', '123456', '980522667@qq.com', 'jorry', 1, '2342342', 1234567, 1);

-- --------------------------------------------------------

--
-- 表的结构 `t_user_group`
--

CREATE TABLE IF NOT EXISTS `t_user_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `permission` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `t_user_group`
--

INSERT INTO `t_user_group` (`id`, `name`, `permission`) VALUES
(1, 'Administrator', '1'),
(2, 'Editor', '1'),
(3, 'Author ', '1'),
(4, 'Manager', '1');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
