-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2015-04-13 17:18:25
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `t_language`
--

INSERT INTO `t_language` (`id`, `name`, `code`, `locale`, `image`, `directory`, `sort_order`, `status`) VALUES
(1, 'English', 'en_us', 'en_US.UTF-8,en_US,en-gb,english', 'gb.png', 'english', 1, 1),
(2, '简体中文', 'zh_cn', 'zh,zh-hk,zh-cn,zh-cn.UTF-8,cn-gb,chinese', 'cn.png', 'chinese', 2, 1),
(3, 'Nederlands', 'nl', 'nl_NL.ISO_8859-1,nl_NL,nl_NL,dutch', 'nl.png', 'dutch', 3, 1);

-- --------------------------------------------------------

--
-- 表的结构 `t_message`
--

CREATE TABLE IF NOT EXISTS `t_message` (
  `id` int(11) NOT NULL DEFAULT '0',
  `language` varchar(16) NOT NULL DEFAULT '',
  `translation` text,
  PRIMARY KEY (`id`,`language`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `t_message`
--

INSERT INTO `t_message` (`id`, `language`, `translation`) VALUES
(67, 'nl', 'TAdministrator Manage'),
(67, 'zh_cn', '管理员管理'),
(68, 'nl', 'TAdministrator List'),
(68, 'zh_cn', '管理员列表'),
(69, 'nl', 'TUser Name'),
(69, 'zh_cn', '用户名'),
(70, 'nl', 'TPassWord'),
(70, 'zh_cn', '密码'),
(71, 'nl', 'TEmail'),
(71, 'zh_cn', '邮箱'),
(72, 'nl', 'TNick Name'),
(72, 'zh_cn', '昵称'),
(73, 'nl', 'TGroup Name'),
(73, 'zh_cn', '组名'),
(74, 'nl', 'TIP'),
(74, 'zh_cn', 'IP地址'),
(75, 'nl', 'TLogin Time'),
(75, 'zh_cn', '登录时间'),
(76, 'nl', 'TStatus'),
(76, 'zh_cn', '状态'),
(77, 'nl', 'TView All'),
(77, 'zh_cn', '查看所有'),
(78, 'nl', 'TMessage'),
(78, 'zh_cn', '消息'),
(79, 'nl', 'TLanguage Manage'),
(79, 'zh_cn', '多语言管理'),
(80, 'zh_cn', '语言更新'),
(81, 'zh_cn', '翻译更新'),
(82, 'zh_cn', '翻译管理');

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
('a5n9jrpur8k093cuumgbjej4l1', 1428752629, 0x6769695f5f72657475726e55726c7c733a33363a222f747572656e2e70772f696e6465782e7068703f723d6769692f637275642f696e646578223b),
('i057goj2p3j5ivu03hsekr2oc7', 1428752713, 0x6769695f5f72657475726e55726c7c733a32353a222f747572656e2e70772f696e6465782e7068703f723d676969223b6769695f5f69647c733a353a227969696572223b6769695f5f6e616d657c733a353a227969696572223b6769695f5f7374617465737c613a303a7b7d);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=642 ;

--
-- 转存表中的数据 `t_setting`
--

INSERT INTO `t_setting` (`id`, `code`, `ckey`, `value`, `serialized`) VALUES
(634, 'any', 'config_site_name', '网站名称', 0),
(635, 'any', 'config_site_owner', '网站管理员', 0),
(636, 'any', 'config_address', '联系地址', 0),
(637, 'any', 'config_email', '980522557@qq.com', 0),
(638, 'any', 'config_tel', '联系电话', 0),
(639, 'any', 'config_fax', '传真号码', 0),
(640, 'any', 'config_front_language', 'zh_cn', 0),
(641, 'any', 'config_back_language', 'zh_cn', 0);

-- --------------------------------------------------------

--
-- 表的结构 `t_source_message`
--

CREATE TABLE IF NOT EXISTS `t_source_message` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `category` varchar(60) DEFAULT NULL COMMENT '组别',
  `message` text COMMENT '翻译信息',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `id_2` (`id`),
  KEY `category` (`category`),
  KEY `category_2` (`category`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=83 ;

--
-- 转存表中的数据 `t_source_message`
--

INSERT INTO `t_source_message` (`id`, `category`, `message`) VALUES
(67, 'manage_user', 'Administrator Manage'),
(68, 'manage_user', 'Administrator List'),
(69, 'user', 'User Name'),
(70, 'user', 'PassWord'),
(71, 'user', 'Email'),
(72, 'user', 'Nick Name'),
(73, 'user', 'Group Name'),
(74, 'user', 'IP'),
(75, 'user', 'Login Time'),
(76, 'user', 'Status'),
(77, 'common', 'View All'),
(78, 'common', 'Message'),
(79, 'manage_message', 'Language Manage'),
(80, 'manage_message', 'Language Update'),
(81, 'manage_message', 'Translation Update'),
(82, 'manage_message', 'Translation Manage');

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

--
-- 限制导出的表
--

--
-- 限制表 `t_message`
--
ALTER TABLE `t_message`
  ADD CONSTRAINT `FK_t_message_t_source_message` FOREIGN KEY (`id`) REFERENCES `t_source_message` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
