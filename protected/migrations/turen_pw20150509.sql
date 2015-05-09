-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2015-05-09 17:29:38
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
-- 表的结构 `t_auth_assignment`
--

CREATE TABLE IF NOT EXISTS `t_auth_assignment` (
  `itemname` varchar(64) NOT NULL,
  `userid` varchar(64) NOT NULL,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`itemname`,`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `t_auth_assignment`
--

INSERT INTO `t_auth_assignment` (`itemname`, `userid`, `bizrule`, `data`) VALUES
('Manager', '17', NULL, 'N;');

-- --------------------------------------------------------

--
-- 表的结构 `t_auth_item`
--

CREATE TABLE IF NOT EXISTS `t_auth_item` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`name`),
  KEY `name` (`name`),
  KEY `name_2` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `t_auth_item`
--

INSERT INTO `t_auth_item` (`name`, `type`, `description`, `bizrule`, `data`) VALUES
('Administrator', 2, '管理员角色', '', ''),
('backend/auth/authItem', 1, 'Auth AuthItem Task', NULL, 'N;'),
('backend/auth/authItem/admin', 0, 'Admin AuthItem Operation', NULL, 'N;'),
('backend/auth/authItem/create', 0, 'Create AuthItem Operation', NULL, 'N;'),
('backend/auth/authItem/delete', 0, 'Delete AuthItem Operation', NULL, 'N;'),
('backend/auth/authItem/index', 0, 'Index AuthItem Operation', NULL, 'N;'),
('backend/auth/authItem/update', 0, 'Update AuthItem Operation', NULL, 'N;'),
('backend/auth/authItem/view', 0, 'View AuthItem Operation', NULL, 'N;'),
('backend/auth/auto', 1, 'Auth Auto Task', NULL, 'N;'),
('backend/auth/auto/deal', 0, 'Deal Auth Operation', NULL, 'N;'),
('backend/auth/role', 1, 'Auth Role Task', NULL, 'N;'),
('backend/auth/role/addAuthToRole', 0, 'Add Auth To Role Operation', NULL, 'N;'),
('backend/auth/role/admin', 0, 'Admin Role Operation', NULL, 'N;'),
('backend/auth/role/create', 0, 'Create Role Operation', NULL, 'N;'),
('backend/auth/role/delete', 0, 'Delete Role Operation', NULL, 'N;'),
('backend/auth/role/index', 0, 'Index Role Operation', NULL, 'N;'),
('backend/auth/role/update', 0, 'Update Role Operation', NULL, 'N;'),
('backend/auth/role/view', 0, 'View Role Operation', NULL, 'N;'),
('backend/manage/config', 1, 'Manage Config Task', NULL, 'N;'),
('backend/manage/config/admin', 0, 'Admin Config Operation', NULL, 'N;'),
('backend/manage/config/update', 0, 'Update Config Operation', NULL, 'N;'),
('backend/manage/default', 1, 'Manage Default Task', NULL, 'N;'),
('backend/manage/default/index', 0, 'Index Default Operation', NULL, 'N;'),
('backend/manage/message', 1, 'Manage Message Task', NULL, 'N;'),
('backend/manage/message/admin', 0, 'Admin Message Operation', NULL, 'N;'),
('backend/manage/message/batchUpdate', 0, 'BatchUpdate Message Operation', NULL, 'N;'),
('backend/manage/message/index', 0, 'Index Message Operation', NULL, 'N;'),
('backend/manage/message/update', 0, 'Update Message Operation', NULL, 'N;'),
('backend/manage/offline', 1, 'Manage Offline Task', NULL, 'N;'),
('backend/manage/offline/notice', 0, 'Notice Parten Operation', NULL, 'N;'),
('backend/user/common', 1, 'User Common Task', NULL, 'N;'),
('backend/user/common/captcha', 0, 'Captcha User Operation', NULL, 'N;'),
('backend/user/common/login', 0, 'Login User Operation', NULL, 'N;'),
('backend/user/common/logout', 0, 'Logout User Operation', NULL, 'N;'),
('backend/user/user', 1, 'User User Task', NULL, 'N;'),
('backend/user/user/admin', 0, 'Admin User Operation', NULL, 'N;'),
('backend/user/user/batchDelete', 0, 'BatchDelete User Operation', NULL, 'N;'),
('backend/user/user/batchStatus', 0, 'BatchStatus User Operation', NULL, 'N;'),
('backend/user/user/create', 0, 'Create User Operation', NULL, 'N;'),
('backend/user/user/delete', 0, 'Delete User Operation', NULL, 'N;'),
('backend/user/user/index', 0, 'Index User Operation', NULL, 'N;'),
('backend/user/user/update', 0, 'Update User Operation', NULL, 'N;'),
('backend/user/user/view', 0, 'View User Operation', NULL, 'N;'),
('Editor', 2, '编辑', '', ''),
('Manager', 2, '管理者', '', ''),
('Member', 2, '会员', '', '');

-- --------------------------------------------------------

--
-- 表的结构 `t_auth_item_child`
--

CREATE TABLE IF NOT EXISTS `t_auth_item_child` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `t_auth_item_child`
--

INSERT INTO `t_auth_item_child` (`parent`, `child`) VALUES
('Administrator', 'backend/auth/authItem'),
('backend/auth/authItem', 'backend/auth/authItem/admin'),
('backend/auth/authItem', 'backend/auth/authItem/create'),
('backend/auth/authItem', 'backend/auth/authItem/delete'),
('backend/auth/authItem', 'backend/auth/authItem/index'),
('backend/auth/authItem', 'backend/auth/authItem/update'),
('backend/auth/authItem', 'backend/auth/authItem/view'),
('Administrator', 'backend/auth/auto'),
('backend/auth/auto', 'backend/auth/auto/deal'),
('Administrator', 'backend/auth/role'),
('backend/auth/role', 'backend/auth/role/addAuthToRole'),
('backend/auth/role', 'backend/auth/role/admin'),
('backend/auth/role', 'backend/auth/role/create'),
('backend/auth/role', 'backend/auth/role/delete'),
('backend/auth/role', 'backend/auth/role/index'),
('backend/auth/role', 'backend/auth/role/update'),
('backend/auth/role', 'backend/auth/role/view'),
('Administrator', 'backend/manage/config'),
('backend/manage/config', 'backend/manage/config/admin'),
('backend/manage/config', 'backend/manage/config/update'),
('Administrator', 'backend/manage/default'),
('backend/manage/default', 'backend/manage/default/index'),
('Administrator', 'backend/manage/message'),
('backend/manage/message', 'backend/manage/message/admin'),
('backend/manage/message', 'backend/manage/message/batchUpdate'),
('backend/manage/message', 'backend/manage/message/index'),
('backend/manage/message', 'backend/manage/message/update'),
('Administrator', 'backend/manage/offline'),
('backend/manage/offline', 'backend/manage/offline/notice'),
('Administrator', 'backend/user/common'),
('backend/user/common', 'backend/user/common/captcha'),
('backend/user/common', 'backend/user/common/login'),
('backend/user/common', 'backend/user/common/logout'),
('Administrator', 'backend/user/user'),
('backend/user/user', 'backend/user/user/admin'),
('backend/user/user', 'backend/user/user/batchDelete'),
('backend/user/user', 'backend/user/user/batchStatus'),
('backend/user/user', 'backend/user/user/create'),
('backend/user/user', 'backend/user/user/delete'),
('backend/user/user', 'backend/user/user/index'),
('backend/user/user', 'backend/user/user/update'),
('backend/user/user', 'backend/user/user/view');

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
(82, 'zh_cn', '翻译管理'),
(84, 'zh_cn', '权限任务'),
(85, 'zh_cn', '管理任务'),
(86, 'zh_cn', '用户任务'),
(87, 'zh_cn', 'TView AuthItem Operation'),
(88, 'zh_cn', 'TCreate AuthItem Operation'),
(89, 'zh_cn', 'TUpdate AuthItem Operation'),
(90, 'zh_cn', 'TDelete AuthItem Operation'),
(91, 'zh_cn', 'TIndex AuthItem Operation'),
(92, 'zh_cn', 'TAdmin AuthItem Operation'),
(93, 'zh_cn', 'TUpdate Config Operation'),
(94, 'zh_cn', 'TAdmin Config Operation'),
(95, 'zh_cn', 'TIndex Default Operation'),
(96, 'zh_cn', 'TUpdate Message Operation'),
(97, 'zh_cn', 'TBatchUpdate Message Operation'),
(98, 'zh_cn', 'TIndex Message Operation'),
(99, 'zh_cn', 'TAdmin Message Operation'),
(100, 'zh_cn', 'TNotice Parten Operation'),
(101, 'zh_cn', 'TLogin User Operation'),
(102, 'zh_cn', 'TLogout User Operation'),
(103, 'zh_cn', 'TView User Operation'),
(104, 'zh_cn', 'TCreate User Operation'),
(105, 'zh_cn', 'TUpdate User Operation'),
(106, 'zh_cn', 'TDelete User Operation'),
(107, 'zh_cn', 'TBatchDelete User Operation'),
(108, 'zh_cn', 'TBatchStatus User Operation'),
(109, 'zh_cn', 'TIndex User Operation'),
(110, 'zh_cn', 'TAdmin User Operation'),
(111, 'zh_cn', 'TDeal Auth Operation'),
(112, 'zh_cn', 'TCreate Failure!'),
(113, 'zh_cn', 'TCreate User Failure!'),
(114, 'zh_cn', 'TCreate User Success!'),
(115, 'zh_cn', 'TIncorrect username or password.'),
(116, 'zh_cn', 'TRemember Me'),
(117, 'zh_cn', '您还没有登录，请先登录。'),
(118, 'zh_cn', '登出'),
(119, 'zh_cn', 'TAction Access Denied.'),
(120, 'zh_cn', 'TController Access Denied.'),
(121, 'zh_cn', 'TUser Access Denied.'),
(122, 'zh_cn', 'TRole Access Denied.'),
(123, 'zh_cn', 'TIP Access Denied.'),
(124, 'zh_cn', 'TTIP Access Denied.'),
(125, 'zh_cn', 'TTAction Access Denied.'),
(126, 'zh_cn', '您还未登录，请先登录。'),
(127, 'zh_cn', 'TUncaught Permissions Matching.'),
(128, 'zh_cn', 'TManage Auth Items'),
(129, 'zh_cn', 'TOperation'),
(130, 'zh_cn', 'TTask'),
(131, 'zh_cn', 'TRole'),
(132, 'zh_cn', 'TSave Failure'),
(133, 'zh_cn', 'TCreate Role Failure'),
(134, 'zh_cn', 'TCteate Role Success'),
(135, 'zh_cn', 'TAuth Assignment'),
(136, 'zh_cn', 'TAdmin AuthItem Operation'),
(137, 'zh_cn', 'TCreate AuthItem Operation'),
(138, 'zh_cn', 'TDelete AuthItem Operation'),
(139, 'zh_cn', 'TIndex AuthItem Operation'),
(140, 'zh_cn', 'TUpdate AuthItem Operation'),
(141, 'zh_cn', 'TView AuthItem Operation'),
(142, 'zh_cn', 'TDeal Auth Operation'),
(143, 'zh_cn', 'TAdmin Role'),
(144, 'zh_cn', 'TCreate Role'),
(145, 'zh_cn', 'TDelete Role'),
(146, 'zh_cn', 'TIndex Role'),
(147, 'zh_cn', 'TUpdate Role'),
(148, 'zh_cn', 'TView Role'),
(149, 'zh_cn', 'TManage Assignment'),
(150, 'zh_cn', 'TAdmin Config Operation'),
(151, 'zh_cn', 'TUpdate Config Operation'),
(152, 'zh_cn', 'TIndex Default Operation'),
(153, 'zh_cn', 'TAdmin Message Operation'),
(154, 'zh_cn', 'TBatchUpdate Message Operation'),
(155, 'zh_cn', 'TIndex Message Operation'),
(156, 'zh_cn', 'TUpdate Message Operation'),
(157, 'zh_cn', 'TNotice Parten Operation'),
(158, 'zh_cn', 'TUser Assignment'),
(159, 'zh_cn', 'TLogin User Operation'),
(160, 'zh_cn', 'TLogout User Operation'),
(161, 'zh_cn', 'TAdmin User Operation'),
(162, 'zh_cn', 'TBatchDelete User Operation'),
(163, 'zh_cn', 'TBatchStatus User Operation'),
(164, 'zh_cn', 'TCreate User Operation'),
(165, 'zh_cn', 'TDelete User Operation'),
(166, 'zh_cn', 'TIndex User Operation'),
(167, 'zh_cn', 'TUpdate User Operation'),
(168, 'zh_cn', 'TView User Operation'),
(169, 'zh_cn', 'TUpdate Role Success'),
(170, 'zh_cn', 'TUpdate Role Failure'),
(171, 'zh_cn', 'TAuth AuthItem Task'),
(172, 'zh_cn', 'TAuth Auto Task'),
(173, 'zh_cn', 'TAuth Role Task'),
(174, 'zh_cn', 'TAdd Auth To Role Operation'),
(175, 'zh_cn', 'TAdmin Role Operation'),
(176, 'zh_cn', 'TCreate Role Operation'),
(177, 'zh_cn', 'TDelete Role Operation'),
(178, 'zh_cn', 'TIndex Role Operation'),
(179, 'zh_cn', 'TUpdate Role Operation'),
(180, 'zh_cn', 'TView Role Operation'),
(181, 'zh_cn', 'TManage Config Task'),
(182, 'zh_cn', 'TManage Default Task'),
(183, 'zh_cn', 'TManage Message Task'),
(184, 'zh_cn', 'TManage Offline Task'),
(185, 'zh_cn', 'TUser Common Task'),
(186, 'zh_cn', 'TCaptcha User Operation'),
(187, 'zh_cn', 'TUser User Task'),
(188, 'zh_cn', 'TIs Admin'),
(189, 'zh_cn', 'TEnable'),
(190, 'zh_cn', 'TDisable'),
(191, 'zh_cn', 'TIs Admin'),
(192, 'zh_cn', 'TNo Admin'),
(193, 'zh_cn', '列表'),
(194, 'zh_cn', '创建'),
(195, 'zh_cn', '更新'),
(196, 'zh_cn', 'TAdministrator Manage'),
(197, 'zh_cn', 'TAdministrator Update'),
(198, 'zh_cn', 'TAdministrator Create'),
(199, 'zh_cn', 'TNew Create'),
(200, 'zh_cn', 'TClick Into 列表'),
(201, 'zh_cn', 'TClick Into 创建'),
(202, 'zh_cn', 'TOperation'),
(203, 'zh_cn', 'TView The Item'),
(204, 'zh_cn', 'TUpdate The Item'),
(205, 'zh_cn', 'TDelete The Item'),
(206, 'zh_cn', 'TClick Into List User'),
(207, 'zh_cn', 'TClick Into Create User'),
(208, 'zh_cn', 'TbatchUpdate'),
(209, 'zh_cn', 'TClick Into TbatchUpdate'),
(210, 'zh_cn', 'TManage Role'),
(211, 'zh_cn', 'TRole Create'),
(212, 'zh_cn', 'TRole Update'),
(213, 'zh_cn', 'TClick Into List AuthItem'),
(214, 'zh_cn', 'TClick Into Create AuthItem'),
(215, 'zh_cn', 'TAuth Item Create'),
(216, 'zh_cn', 'TAuth Item Manage'),
(217, 'zh_cn', 'TUpdate'),
(218, 'zh_cn', 'TCreate User Failure 用户名 不可为空白.!'),
(219, 'zh_cn', 'TUpdate User Success!'),
(220, 'zh_cn', 'TUpdate User Failure 用户名 不可为空白.!'),
(221, 'zh_cn', 'TCreate User Failure 邮箱 "980522557@qq.com" 已被取用.!'),
(222, 'zh_cn', 'TEmail'),
(223, 'zh_cn', 'TLogin'),
(224, 'zh_cn', 'TSign in to start your session'),
(225, 'zh_cn', 'TPassword'),
(226, 'zh_cn', 'TRemember Me'),
(227, 'zh_cn', 'TVerifyCode'),
(228, 'zh_cn', 'TClick Update'),
(229, 'zh_cn', 'TSign In'),
(230, 'zh_cn', 'TIncorrect emial or password.'),
(231, 'zh_cn', 'TTIncorrect emial or password.'),
(232, 'zh_cn', 'TCreate User Success!'),
(233, 'zh_cn', 'TRole'),
(234, 'zh_cn', 'TCreate User Failure 邮箱 "980522557dd@qq.com" 已被取用.!'),
(235, 'zh_cn', 'TCreate User Failure 邮箱 "980522557ddd@qq.com" 已被取用.!'),
(236, 'zh_cn', 'TCreate User Failure 邮箱 "980522557dddd@qq.com" 已被取用.!'),
(237, 'zh_cn', 'TUpdate Role Success'),
(238, 'zh_cn', 'TUpdate Role Failure '),
(239, 'zh_cn', 'TRole Config'),
(240, 'zh_cn', 'TRole'),
(241, 'zh_cn', 'TRole Config Update'),
(242, 'zh_cn', 'TAuth Items'),
(243, 'zh_cn', 'TAdministrator'),
(244, 'zh_cn', 'TRole'),
(245, 'zh_cn', 'TAuth'),
(246, 'zh_cn', 'TConfig'),
(247, 'zh_cn', 'TManage'),
(248, 'zh_cn', 'TAuth');

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
('vj13qlrfioqsuv4td1f0f6v7f5', 1431188313, 0x757365725f636f6f6b69655f5f69647c733a323a223132223b757365725f636f6f6b69655f5f6e616d657c733a393a22e5a48fe58f88e6a1a5223b757365725f636f6f6b6965757365724e616d657c733a393a22e5a48fe58f88e6a1a5223b757365725f636f6f6b69656e69636b4e616d657c733a363a22e6a1a5e6a1a5223b757365725f636f6f6b696547726f757049647c733a313a2231223b757365725f636f6f6b6965697341646d696e7c733a313a2231223b757365725f636f6f6b69656c6f67696e54696d657c693a313433313134333637343b757365725f636f6f6b69655f5f7374617465737c613a353a7b733a383a22757365724e616d65223b623a313b733a383a226e69636b4e616d65223b623a313b733a373a2247726f75704964223b623a313b733a373a22697341646d696e223b623a313b733a393a226c6f67696e54696d65223b623a313b7d757365725f636f6f6b69655969692e43576562557365722e666c617368636f756e746572737c613a303a7b7d);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=249 ;

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
(82, 'manage_message', 'Translation Manage'),
(84, 'common', 'Auth Assignment'),
(85, 'common', 'Manage Assignment'),
(86, 'common', 'User Assignment'),
(87, 'auth_authItem', 'View AuthItem Operation'),
(88, 'auth_authItem', 'Create AuthItem Operation'),
(89, 'auth_authItem', 'Update AuthItem Operation'),
(90, 'auth_authItem', 'Delete AuthItem Operation'),
(91, 'auth_authItem', 'Index AuthItem Operation'),
(92, 'auth_authItem', 'Admin AuthItem Operation'),
(93, 'manage_config', 'Update Config Operation'),
(94, 'manage_config', 'Admin Config Operation'),
(95, 'manage_default', 'Index Default Operation'),
(96, 'manage_message', 'Update Message Operation'),
(97, 'manage_message', 'BatchUpdate Message Operation'),
(98, 'manage_message', 'Index Message Operation'),
(99, 'manage_message', 'Admin Message Operation'),
(100, 'manage_offline', 'Notice Parten Operation'),
(101, 'auth_common', 'Login User Operation'),
(102, 'auth_common', 'Logout User Operation'),
(103, 'user_user', 'View User Operation'),
(104, 'user_user', 'Create User Operation'),
(105, 'user_user', 'Update User Operation'),
(106, 'user_user', 'Delete User Operation'),
(107, 'user_user', 'BatchDelete User Operation'),
(108, 'user_user', 'BatchStatus User Operation'),
(109, 'user_user', 'Index User Operation'),
(110, 'user_user', 'Admin User Operation'),
(111, 'auth_auto', 'Deal Auth Operation'),
(112, 'user_create', 'Create Failure!'),
(113, 'user_create', 'Create User Failure!'),
(114, 'user_create', 'Create User Success!'),
(115, 'loginForm', 'Incorrect username or password.'),
(116, 'loginForm', 'Remember Me'),
(117, 'loginForm', 'You have not login, please login first.'),
(118, 'common', 'Sign out'),
(119, 'common', 'Action Access Denied.'),
(120, 'common', 'Controller Access Denied.'),
(121, 'common', 'User Access Denied.'),
(122, 'common', 'Role Access Denied.'),
(123, 'common', 'IP Access Denied.'),
(124, 'common', 'TIP Access Denied.'),
(125, 'common', 'TAction Access Denied.'),
(126, 'common', 'You have not login, please login first.'),
(127, 'common', 'Uncaught Permissions Matching.'),
(128, 'manage_user', 'Manage Auth Items'),
(129, 'auth_authItem', 'Operation'),
(130, 'auth_authItem', 'Task'),
(131, 'auth_authItem', 'Role'),
(132, 'auth_role', 'Save Failure'),
(133, 'auth_role', 'Create Role Failure'),
(134, 'auth_role', 'Cteate Role Success'),
(135, 'auth_role', 'Auth Assignment'),
(136, 'auth_role', 'Admin AuthItem Operation'),
(137, 'auth_role', 'Create AuthItem Operation'),
(138, 'auth_role', 'Delete AuthItem Operation'),
(139, 'auth_role', 'Index AuthItem Operation'),
(140, 'auth_role', 'Update AuthItem Operation'),
(141, 'auth_role', 'View AuthItem Operation'),
(142, 'auth_role', 'Deal Auth Operation'),
(143, 'auth_role', 'Admin Role'),
(144, 'auth_role', 'Create Role'),
(145, 'auth_role', 'Delete Role'),
(146, 'auth_role', 'Index Role'),
(147, 'auth_role', 'Update Role'),
(148, 'auth_role', 'View Role'),
(149, 'auth_role', 'Manage Assignment'),
(150, 'auth_role', 'Admin Config Operation'),
(151, 'auth_role', 'Update Config Operation'),
(152, 'auth_role', 'Index Default Operation'),
(153, 'auth_role', 'Admin Message Operation'),
(154, 'auth_role', 'BatchUpdate Message Operation'),
(155, 'auth_role', 'Index Message Operation'),
(156, 'auth_role', 'Update Message Operation'),
(157, 'auth_role', 'Notice Parten Operation'),
(158, 'auth_role', 'User Assignment'),
(159, 'auth_role', 'Login User Operation'),
(160, 'auth_role', 'Logout User Operation'),
(161, 'auth_role', 'Admin User Operation'),
(162, 'auth_role', 'BatchDelete User Operation'),
(163, 'auth_role', 'BatchStatus User Operation'),
(164, 'auth_role', 'Create User Operation'),
(165, 'auth_role', 'Delete User Operation'),
(166, 'auth_role', 'Index User Operation'),
(167, 'auth_role', 'Update User Operation'),
(168, 'auth_role', 'View User Operation'),
(169, 'common', 'Update Role Success'),
(170, 'common', 'Update Role Failure'),
(171, 'auth_role', 'Auth AuthItem Task'),
(172, 'auth_role', 'Auth Auto Task'),
(173, 'auth_role', 'Auth Role Task'),
(174, 'auth_role', 'Add Auth To Role Operation'),
(175, 'auth_role', 'Admin Role Operation'),
(176, 'auth_role', 'Create Role Operation'),
(177, 'auth_role', 'Delete Role Operation'),
(178, 'auth_role', 'Index Role Operation'),
(179, 'auth_role', 'Update Role Operation'),
(180, 'auth_role', 'View Role Operation'),
(181, 'auth_role', 'Manage Config Task'),
(182, 'auth_role', 'Manage Default Task'),
(183, 'auth_role', 'Manage Message Task'),
(184, 'auth_role', 'Manage Offline Task'),
(185, 'auth_role', 'User Common Task'),
(186, 'auth_role', 'Captcha User Operation'),
(187, 'auth_role', 'User User Task'),
(188, 'user', 'Is Admin'),
(189, 'user_user', 'Enable'),
(190, 'user_user', 'Disable'),
(191, 'user_user', 'Is Admin'),
(192, 'user_user', 'No Admin'),
(193, 'common', 'List'),
(194, 'common', 'Create'),
(195, 'common', 'Update'),
(196, 'user_user', 'Administrator Manage'),
(197, 'user_user', 'Administrator Update'),
(198, 'user_user', 'Administrator Create'),
(199, 'user_user', 'New Create'),
(200, 'user_user', 'Click Into 列表'),
(201, 'user_user', 'Click Into 创建'),
(202, 'common', 'Operation'),
(203, 'common', 'View The Item'),
(204, 'common', 'Update The Item'),
(205, 'common', 'Delete The Item'),
(206, 'user_user', 'Click Into List User'),
(207, 'user_user', 'Click Into Create User'),
(208, 'common', 'batchUpdate'),
(209, 'user_user', 'Click Into TbatchUpdate'),
(210, 'manage_user', 'Manage Role'),
(211, 'user_user', 'Role Create'),
(212, 'user_user', 'Role Update'),
(213, 'user_user', 'Click Into List AuthItem'),
(214, 'user_user', 'Click Into Create AuthItem'),
(215, 'user_user', 'Auth Item Create'),
(216, 'user_user', 'Auth Item Manage'),
(217, 'user_user', 'Update'),
(218, 'user_user', 'Create User Failure 用户名 不可为空白.!'),
(219, 'user_user', 'Update User Success!'),
(220, 'user_user', 'Update User Failure 用户名 不可为空白.!'),
(221, 'user_user', 'Create User Failure 邮箱 "980522557@qq.com" 已被取用.!'),
(222, 'user_common', 'Email'),
(223, 'user_common', 'Login'),
(224, 'user_common', 'Sign in to start your session'),
(225, 'user_common', 'Password'),
(226, 'user_common', 'Remember Me'),
(227, 'user_common', 'VerifyCode'),
(228, 'user_common', 'Click Update'),
(229, 'user_common', 'Sign In'),
(230, 'loginForm', 'Incorrect emial or password.'),
(231, 'loginForm', 'TIncorrect emial or password.'),
(232, 'user_user', 'Create User Success!'),
(233, 'user', 'Role'),
(234, 'user_user', 'Create User Failure 邮箱 "980522557dd@qq.com" 已被取用.!'),
(235, 'user_user', 'Create User Failure 邮箱 "980522557ddd@qq.com" 已被取用.!'),
(236, 'user_user', 'Create User Failure 邮箱 "980522557dddd@qq.com" 已被取用.!'),
(237, 'auth_role', 'Update Role Success'),
(238, 'auth_role', 'Update Role Failure '),
(239, 'common', 'Role Config'),
(240, 'auth_role', 'Role'),
(241, 'user_user', 'Role Config Update'),
(242, 'auth_role', 'Auth Items'),
(243, 'auth_role', 'Administrator'),
(244, 'common', 'Role'),
(245, 'auth_role', 'Auth'),
(246, 'auth_role', 'Config'),
(247, 'common', 'Manage'),
(248, 'common', 'Auth');

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
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `is_admin` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- 转存表中的数据 `t_user`
--

INSERT INTO `t_user` (`id`, `user_name`, `password`, `email`, `nick_name`, `user_group_id`, `login_ip`, `date_added`, `status`, `is_admin`) VALUES
(12, '夏又桥', '$2y$13$7kfFlmtWdtqSgkrZkJnanOdSVpNf0N.btETeavk8znchaeHQAOZmm', '980522557@qq.com', '桥桥', 1, '::1', 1431138647, 1, 1),
(13, 'test02', '$2y$13$GUEsiDWfQWRRk3QbP4Ow9e1KUlNIYN5Ol/Qr3H7znGw47pCQCQnmm', '980522557d@qq.com', '夏又桥test', 1, '::1', 1431006475, 1, 1),
(17, 'xiayouqiao', '$2y$13$fXrPtDFyVz7X.l8iraByYuSmRef5N458RSwzHFT4qLSGw2bxCIQxm', '980522557ddddd@qq.com', 'jorry', 2, '::1', 1431012852, 1, 1),
(18, '测试', 'asdasd', '98052255ed7@qq.com', 'jorry', 1, '::1', 1431137976, 1, 1);

-- --------------------------------------------------------

--
-- 表的结构 `t_user_group`
--

CREATE TABLE IF NOT EXISTS `t_user_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL COMMENT '父id',
  `name` varchar(64) NOT NULL COMMENT '组名',
  `role` varchar(100) NOT NULL COMMENT '管理组角色',
  `status` int(1) NOT NULL DEFAULT '1' COMMENT '状态',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `t_user_group`
--

INSERT INTO `t_user_group` (`id`, `parent_id`, `name`, `role`, `status`) VALUES
(1, 0, '总经理', '1', 1),
(2, 0, '技术部', '1', 1),
(3, 0, '销售部 ', '1', 1),
(4, 0, '售后部', '1', 1);

--
-- 限制导出的表
--

--
-- 限制表 `t_auth_assignment`
--
ALTER TABLE `t_auth_assignment`
  ADD CONSTRAINT `t_auth_assignment_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `t_auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 限制表 `t_auth_item_child`
--
ALTER TABLE `t_auth_item_child`
  ADD CONSTRAINT `t_auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `t_auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `t_auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 限制表 `t_message`
--
ALTER TABLE `t_message`
  ADD CONSTRAINT `FK_t_message_t_source_message` FOREIGN KEY (`id`) REFERENCES `t_source_message` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
