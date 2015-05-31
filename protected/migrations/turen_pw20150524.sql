-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2015-05-24 07:46:21
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
('Editor', '82', NULL, 'N;'),
('Manager', '41', NULL, 'N;'),
('Manager', '45', NULL, 'N;'),
('Manager', '47', NULL, 'N;'),
('Manager', '52', NULL, 'N;'),
('Manager', '54', NULL, 'N;'),
('Manager', '55', NULL, 'N;'),
('Manager', '58', NULL, 'N;'),
('Manager', '60', NULL, 'N;'),
('Manager', '62', NULL, 'N;'),
('role_default', '88', NULL, 'N;'),
('SEO', '39', NULL, 'N;'),
('WMS', '81', NULL, 'N;'),
('WMS', '91', NULL, 'N;');

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
('backend/auth/authItem', 1, 'Auth AuthItem Task', NULL, 'N;'),
('backend/auth/authItem/admin', 0, 'Admin AuthItem Operation', NULL, 'N;'),
('backend/auth/authItem/create', 0, 'Create AuthItem Operation', NULL, 'N;'),
('backend/auth/authItem/delete', 0, 'Delete AuthItem Operation', NULL, 'N;'),
('backend/auth/authItem/update', 0, 'Update AuthItem Operation', NULL, 'N;'),
('backend/auth/auto', 1, 'Auth Auto Task', NULL, 'N;'),
('backend/auth/auto/deal', 0, 'Deal Auth Operation', NULL, 'N;'),
('backend/auth/role', 1, 'Auth Role Task', NULL, 'N;'),
('backend/auth/role/admin', 0, 'Admin Role Operation', NULL, 'N;'),
('backend/auth/role/config', 0, 'Permission Config Operation', NULL, 'N;'),
('backend/auth/role/create', 0, 'Create Role Operation', NULL, 'N;'),
('backend/auth/role/delete', 0, 'Delete Role Operation', NULL, 'N;'),
('backend/auth/role/update', 0, 'Update Role Operation', NULL, 'N;'),
('backend/manage/config', 1, 'Manage Config Task', NULL, 'N;'),
('backend/manage/config/admin', 0, 'Admin Config Operation', NULL, 'N;'),
('backend/manage/config/update', 0, 'Update Config Operation', NULL, 'N;'),
('backend/manage/default', 1, 'Manage Default Task', NULL, 'N;'),
('backend/manage/default/error', 0, 'Error Default Operation', NULL, 'N;'),
('backend/manage/default/index', 0, 'Index Default Operation', NULL, 'N;'),
('backend/manage/message', 1, 'Manage Message Task', NULL, 'N;'),
('backend/manage/message/admin', 0, 'Admin Message Operation', NULL, 'N;'),
('backend/manage/message/batchUpdate', 0, 'BatchUpdate Message Operation', NULL, 'N;'),
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
('backend/user/user/update', 0, 'Update User Operation', NULL, 'N;'),
('backend/user/userGroup', 1, 'User UserGroup Task', NULL, 'N;'),
('backend/user/userGroup/admin', 0, 'Admin UserGroup Operation', NULL, 'N;'),
('backend/user/userGroup/create', 0, 'Cteate UserGroup Operation', NULL, 'N;'),
('backend/user/userGroup/delete', 0, 'Delete UserGroup Operation', NULL, 'N;'),
('backend/user/userGroup/setDefault', 0, 'Set Default UserGroup Operation', NULL, 'N;'),
('backend/user/userGroup/update', 0, 'Update UserGroup Operation', NULL, 'N;'),
('Editor', 2, '编辑者角色', '', ''),
('EMD', 2, '邮件营销角色', '', ''),
('Manager', 2, '普通管理员', '', ''),
('Order', 2, '订单管理角色', '', ''),
('PM', 2, '产品经理角色', '', ''),
('PO', 2, '产品运营角色', '', ''),
('role_default', 2, '默认角色', '', ''),
('SEO', 2, 'seo推广角色', '', ''),
('WMS', 2, '仓管角色', '', '');

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
('SEO', 'backend/auth/authItem'),
('WMS', 'backend/auth/authItem'),
('backend/auth/authItem', 'backend/auth/authItem/admin'),
('backend/auth/authItem', 'backend/auth/authItem/create'),
('backend/auth/authItem', 'backend/auth/authItem/delete'),
('backend/auth/authItem', 'backend/auth/authItem/update'),
('WMS', 'backend/auth/auto'),
('backend/auth/auto', 'backend/auth/auto/deal'),
('WMS', 'backend/auth/role'),
('backend/auth/role', 'backend/auth/role/admin'),
('backend/auth/role', 'backend/auth/role/config'),
('backend/auth/role', 'backend/auth/role/create'),
('backend/auth/role', 'backend/auth/role/delete'),
('backend/auth/role', 'backend/auth/role/update'),
('WMS', 'backend/manage/config'),
('backend/manage/config', 'backend/manage/config/admin'),
('backend/manage/config', 'backend/manage/config/update'),
('WMS', 'backend/manage/default'),
('backend/manage/default', 'backend/manage/default/error'),
('backend/manage/default', 'backend/manage/default/index'),
('WMS', 'backend/manage/message'),
('backend/manage/message', 'backend/manage/message/admin'),
('backend/manage/message', 'backend/manage/message/batchUpdate'),
('backend/manage/message', 'backend/manage/message/update'),
('WMS', 'backend/manage/offline'),
('backend/manage/offline', 'backend/manage/offline/notice'),
('WMS', 'backend/user/common'),
('backend/user/common', 'backend/user/common/captcha'),
('backend/user/common', 'backend/user/common/login'),
('backend/user/common', 'backend/user/common/logout'),
('Editor', 'backend/user/user'),
('WMS', 'backend/user/user'),
('backend/user/user', 'backend/user/user/admin'),
('backend/user/user', 'backend/user/user/batchDelete'),
('backend/user/user', 'backend/user/user/batchStatus'),
('backend/user/user', 'backend/user/user/create'),
('backend/user/user', 'backend/user/user/delete'),
('backend/user/user', 'backend/user/user/update'),
('Editor', 'backend/user/userGroup'),
('WMS', 'backend/user/userGroup'),
('backend/user/userGroup', 'backend/user/userGroup/admin'),
('backend/user/userGroup', 'backend/user/userGroup/create'),
('backend/user/userGroup', 'backend/user/userGroup/delete'),
('backend/user/userGroup', 'backend/user/userGroup/setDefault'),
('backend/user/userGroup', 'backend/user/userGroup/update');

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
(115, 'zh_cn', '邮箱或密码不正确。'),
(116, 'zh_cn', '记住登录'),
(117, 'zh_cn', '您还没有登录，请先登录。'),
(118, 'zh_cn', '登出'),
(119, 'zh_cn', '访问动作被拒绝。'),
(120, 'zh_cn', '访问控制器被拒绝。'),
(121, 'zh_cn', '此用户被拒绝。'),
(122, 'zh_cn', '角色访问受限。'),
(123, 'zh_cn', 'IP访问受限。'),
(126, 'zh_cn', '您还未登录，请先登录。'),
(127, 'zh_cn', '没有找到相匹配的权限。'),
(128, 'zh_cn', '管理授权项'),
(129, 'zh_cn', '操作'),
(130, 'zh_cn', '任务'),
(131, 'zh_cn', '角色'),
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
(188, 'zh_cn', '设为管理员'),
(189, 'zh_cn', '开启'),
(190, 'zh_cn', '关闭'),
(191, 'zh_cn', '设为管理员'),
(192, 'zh_cn', '不是管理员'),
(193, 'zh_cn', '列表'),
(194, 'zh_cn', '添加'),
(195, 'zh_cn', '修改'),
(196, 'zh_cn', '管理员管理'),
(197, 'zh_cn', 'TAdministrator Update'),
(198, 'zh_cn', '管理员创建'),
(199, 'zh_cn', '新增'),
(202, 'zh_cn', '操作'),
(203, 'zh_cn', 'TView The Item'),
(204, 'zh_cn', '更新这个项'),
(205, 'zh_cn', '删除这个项'),
(206, 'zh_cn', '点击进入用户列表'),
(207, 'zh_cn', '点击创建用户'),
(209, 'zh_cn', '点击进入批量更新'),
(210, 'zh_cn', '管理角色'),
(213, 'zh_cn', 'TClick Into List AuthItem'),
(214, 'zh_cn', 'TClick Into Create AuthItem'),
(217, 'zh_cn', '更新'),
(219, 'zh_cn', '更新用户成功！'),
(222, 'zh_cn', '邮箱'),
(223, 'zh_cn', '登录'),
(224, 'zh_cn', '请登录您的会话'),
(225, 'zh_cn', '密码'),
(226, 'zh_cn', '记录登录'),
(227, 'zh_cn', '验证码'),
(228, 'zh_cn', '点击更新'),
(229, 'zh_cn', '登录'),
(232, 'zh_cn', '创建用户成功！'),
(233, 'zh_cn', '角色'),
(237, 'zh_cn', '更新角色成功'),
(238, 'zh_cn', '角色设置失败'),
(239, 'zh_cn', '角色设置'),
(240, 'zh_cn', '角色'),
(241, 'zh_cn', '角色设置更新'),
(242, 'zh_cn', '授权项'),
(243, 'zh_cn', '管理员'),
(244, 'zh_cn', '角色'),
(245, 'zh_cn', '授权'),
(246, 'zh_cn', '配置'),
(247, 'zh_cn', '管理'),
(248, 'zh_cn', '授权'),
(249, 'zh_cn', 'ID'),
(250, 'zh_cn', '父级ID'),
(251, 'zh_cn', '名称'),
(252, 'zh_cn', '角色'),
(253, 'zh_cn', '状态'),
(254, 'zh_cn', '用户组更新'),
(255, 'zh_cn', '顶级分组'),
(256, 'zh_cn', '所属分类'),
(257, 'zh_cn', '创建管理员组成功'),
(258, 'zh_cn', '更新管理员组成功'),
(259, 'zh_cn', '创建管理员组失败'),
(260, 'zh_cn', '添加新组'),
(261, 'zh_cn', '开启'),
(262, 'zh_cn', '关闭'),
(263, 'zh_cn', '更新用户成功'),
(265, 'zh_cn', '名称'),
(266, 'zh_cn', '类型'),
(267, 'zh_cn', '描述'),
(268, 'zh_cn', '业务逻辑'),
(269, 'zh_cn', '数据'),
(270, 'zh_cn', '创建管理成功'),
(271, 'zh_cn', 'TIs not allowed to delete'),
(272, 'zh_cn', 'TIs not allowed to update'),
(273, 'zh_cn', '设置默认管理员成功！'),
(274, 'zh_cn', '设置默认管理员组失败！'),
(275, 'zh_cn', 'TPermission Config Operation'),
(276, 'zh_cn', 'TError Default Operation'),
(277, 'zh_cn', 'TUser UserGroup Task'),
(278, 'zh_cn', 'TAdmin UserGroup Operation'),
(279, 'zh_cn', 'TCteate UserGroup Operation'),
(280, 'zh_cn', 'TDelete UserGroup Operation'),
(281, 'zh_cn', 'TSet Default UserGroup Operation'),
(282, 'zh_cn', 'TUpdate UserGroup Operation'),
(283, 'zh_cn', 'TThe requested page does not exist.'),
(284, 'zh_cn', 'TIs not allowed to update "name"'),
(285, 'zh_cn', 'TAuth AuthItem Task'),
(286, 'zh_cn', 'TAdmin AuthItem Operation'),
(287, 'zh_cn', 'TCreate AuthItem Operation'),
(288, 'zh_cn', 'TDelete AuthItem Operation'),
(289, 'zh_cn', 'TUpdate AuthItem Operation'),
(290, 'zh_cn', 'TAuth Auto Task'),
(291, 'zh_cn', 'TDeal Auth Operation'),
(292, 'zh_cn', 'TAuth Role Task'),
(293, 'zh_cn', 'TAdmin Role Operation'),
(294, 'zh_cn', 'TPermission Config Operation'),
(295, 'zh_cn', 'TCreate Role Operation'),
(296, 'zh_cn', 'TDelete Role Operation'),
(297, 'zh_cn', 'TUpdate Role Operation'),
(298, 'zh_cn', 'TManage Config Task'),
(299, 'zh_cn', 'TAdmin Config Operation'),
(300, 'zh_cn', 'TUpdate Config Operation'),
(301, 'zh_cn', 'TManage Default Task'),
(302, 'zh_cn', 'TError Default Operation'),
(303, 'zh_cn', 'TIndex Default Operation'),
(304, 'zh_cn', 'TManage Message Task'),
(305, 'zh_cn', 'TAdmin Message Operation'),
(306, 'zh_cn', 'TBatchUpdate Message Operation'),
(307, 'zh_cn', 'TUpdate Message Operation'),
(308, 'zh_cn', 'TManage Offline Task'),
(309, 'zh_cn', 'TNotice Parten Operation'),
(310, 'zh_cn', 'TUser Common Task'),
(311, 'zh_cn', 'TCaptcha User Operation'),
(312, 'zh_cn', 'TLogin User Operation'),
(313, 'zh_cn', 'TLogout User Operation'),
(314, 'zh_cn', 'TUser User Task'),
(315, 'zh_cn', 'TAdmin User Operation'),
(316, 'zh_cn', 'TBatchDelete User Operation'),
(317, 'zh_cn', 'TBatchStatus User Operation'),
(318, 'zh_cn', 'TCreate User Operation'),
(319, 'zh_cn', 'TDelete User Operation'),
(320, 'zh_cn', 'TUpdate User Operation'),
(321, 'zh_cn', 'TUser UserGroup Task'),
(322, 'zh_cn', 'TAdmin UserGroup Operation'),
(323, 'zh_cn', 'TCteate UserGroup Operation'),
(324, 'zh_cn', 'TDelete UserGroup Operation'),
(325, 'zh_cn', 'TSet Default UserGroup Operation'),
(326, 'zh_cn', 'TUpdate UserGroup Operation'),
(335, 'zh_cn', '点击进入'),
(338, 'zh_cn', '输入..'),
(339, 'zh_cn', '编辑'),
(342, 'zh_cn', '配置授权'),
(343, 'zh_cn', '配置此授权'),
(344, 'zh_cn', '设为默认'),
(346, 'zh_cn', '默认组不能删除！'),
(347, 'zh_cn', '创建管理员失败'),
(348, 'zh_cn', '源语言：'),
(349, 'zh_cn', '译文：'),
(350, 'zh_cn', '关闭'),
(351, 'zh_cn', '保存'),
(354, 'zh_cn', '关键词'),
(355, 'zh_cn', '你好，土人！'),
(356, 'zh_cn', '首页'),
(358, 'zh_cn', '排序'),
(360, 'zh_cn', '是否默认'),
(361, 'zh_cn', '土人系统'),
(362, 'zh_cn', '配置管理'),
(364, 'zh_cn', '管理员管理'),
(365, 'zh_cn', '管理员组管理'),
(367, 'zh_cn', '批量修改'),
(368, 'zh_cn', '角色管理'),
(369, 'zh_cn', '角色管理'),
(370, 'zh_cn', '角色创建'),
(371, 'zh_cn', 'TRole Config Update'),
(372, 'zh_cn', 'T授权'),
(373, 'zh_cn', '角色修改'),
(375, 'zh_cn', '授权项管理'),
(376, 'zh_cn', '授权项添加'),
(377, 'zh_cn', '授权项更新'),
(378, 'zh_cn', '管理员组管理'),
(379, 'zh_cn', '管理员组添加'),
(380, 'zh_cn', 'TUser Group Manage'),
(381, 'zh_cn', '管理员组修改'),
(382, 'zh_cn', 'TTranslation Batch Update'),
(383, 'zh_cn', 'TRole Config'),
(384, 'zh_cn', '版权'),
(385, 'zh_cn', '版权所有。'),
(386, 'zh_cn', 'Anything you want');

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
('7n0cv1io3r0chcpu29u14r7jj5', 1432449056, 0x757365725f636f6f6b69655969692e43576562557365722e666c617368636f756e746572737c613a303a7b7d),
('tdlhmnk0rp1lvv37art7asgi34', 1432449064, 0x757365725f636f6f6b69655f5f69647c733a323a223137223b757365725f636f6f6b69655f5f6e616d657c733a31303a22786961796f757169616f223b757365725f636f6f6b6965757365724e616d657c733a31303a22786961796f757169616f223b757365725f636f6f6b69656e69636b4e616d657c733a353a226a6f727279223b757365725f636f6f6b696547726f757049647c733a323a223831223b757365725f636f6f6b6965697341646d696e7c733a313a2230223b757365725f636f6f6b69656c6f67696e54696d657c693a313433313936303534353b757365725f636f6f6b69655f5f7374617465737c613a353a7b733a383a22757365724e616d65223b623a313b733a383a226e69636b4e616d65223b623a313b733a373a2247726f75704964223b623a313b733a373a22697341646d696e223b623a313b733a393a226c6f67696e54696d65223b623a313b7d);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=388 ;

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
(248, 'common', 'Auth'),
(249, 'userGroup', 'ID'),
(250, 'userGroup', 'Parent ID'),
(251, 'userGroup', 'Name'),
(252, 'userGroup', 'Role'),
(253, 'userGroup', 'Status'),
(254, 'user_userGroup', 'User Group Update'),
(255, 'user_userGroup', 'Top Category'),
(256, 'userGroup', 'Belong Category'),
(257, 'user_userGroup', 'Create UserGroup Success'),
(258, 'user_userGroup', 'Update UserGroup Success'),
(259, 'user_userGroup', 'Create UserGroup Failure '),
(260, 'common', 'Add New Group'),
(261, 'user_userGroup', 'Enable'),
(262, 'user_userGroup', 'Disable'),
(263, 'user_user', 'Update User Success'),
(264, 'user_user', 'Click Into 添加'),
(265, 'authItem', 'Name'),
(266, 'authItem', 'Type'),
(267, 'authItem', 'Description'),
(268, 'authItem', 'Bizrule'),
(269, 'authItem', 'Data'),
(270, 'user_user', 'Create User Success'),
(271, 'auth_role', 'Is not allowed to delete'),
(272, 'auth_role', 'Is not allowed to update'),
(273, 'user_userGroup', 'Set Default UserGroup Success!'),
(274, 'user_userGroup', 'Set Default UserGroup Failure!'),
(275, 'auth_role', 'Permission Config Operation'),
(276, 'auth_role', 'Error Default Operation'),
(277, 'auth_role', 'User UserGroup Task'),
(278, 'auth_role', 'Admin UserGroup Operation'),
(279, 'auth_role', 'Cteate UserGroup Operation'),
(280, 'auth_role', 'Delete UserGroup Operation'),
(281, 'auth_role', 'Set Default UserGroup Operation'),
(282, 'auth_role', 'Update UserGroup Operation'),
(283, 'common', 'The requested page does not exist.'),
(284, 'auth_role', 'Is not allowed to update "name"'),
(285, 'common', 'Auth AuthItem Task'),
(286, 'common', 'Admin AuthItem Operation'),
(287, 'common', 'Create AuthItem Operation'),
(288, 'common', 'Delete AuthItem Operation'),
(289, 'common', 'Update AuthItem Operation'),
(290, 'common', 'Auth Auto Task'),
(291, 'common', 'Deal Auth Operation'),
(292, 'common', 'Auth Role Task'),
(293, 'common', 'Admin Role Operation'),
(294, 'common', 'Permission Config Operation'),
(295, 'common', 'Create Role Operation'),
(296, 'common', 'Delete Role Operation'),
(297, 'common', 'Update Role Operation'),
(298, 'common', 'Manage Config Task'),
(299, 'common', 'Admin Config Operation'),
(300, 'common', 'Update Config Operation'),
(301, 'common', 'Manage Default Task'),
(302, 'common', 'Error Default Operation'),
(303, 'common', 'Index Default Operation'),
(304, 'common', 'Manage Message Task'),
(305, 'common', 'Admin Message Operation'),
(306, 'common', 'BatchUpdate Message Operation'),
(307, 'common', 'Update Message Operation'),
(308, 'common', 'Manage Offline Task'),
(309, 'common', 'Notice Parten Operation'),
(310, 'common', 'User Common Task'),
(311, 'common', 'Captcha User Operation'),
(312, 'common', 'Login User Operation'),
(313, 'common', 'Logout User Operation'),
(314, 'common', 'User User Task'),
(315, 'common', 'Admin User Operation'),
(316, 'common', 'BatchDelete User Operation'),
(317, 'common', 'BatchStatus User Operation'),
(318, 'common', 'Create User Operation'),
(319, 'common', 'Delete User Operation'),
(320, 'common', 'Update User Operation'),
(321, 'common', 'User UserGroup Task'),
(322, 'common', 'Admin UserGroup Operation'),
(323, 'common', 'Cteate UserGroup Operation'),
(324, 'common', 'Delete UserGroup Operation'),
(325, 'common', 'Set Default UserGroup Operation'),
(326, 'common', 'Update UserGroup Operation'),
(327, 'common', '编辑者角色'),
(328, 'common', '邮件营销角色'),
(329, 'common', '普通管理员'),
(330, 'common', '订单管理角色'),
(331, 'common', '产品经理角色'),
(332, 'common', '产品运营角色'),
(333, 'common', '默认角色'),
(334, 'common', 'seo推广角色'),
(335, 'common', 'Click Into'),
(336, 'common', '列表'),
(337, 'common', '添加'),
(338, 'common', 'Enter..'),
(339, 'common', 'Edit'),
(340, 'common', '修改'),
(341, 'common', 'TAuth'),
(342, 'user_userGroup', 'Config Auth'),
(343, 'user_userGroup', 'Config The Auth'),
(344, 'user_userGroup', 'Setting Default'),
(345, 'user_user', 'User Group Manage'),
(346, 'user_userGroup', 'Default Group can''t delete!'),
(347, 'user_user', 'Create User Failure '),
(348, 'manage_message', 'Source Lang:'),
(349, 'manage_message', 'Translation:'),
(350, 'manage_message', 'Close'),
(351, 'common', 'Save'),
(352, 'auth_authItem', 'Mange Items'),
(353, 'common', 'Search'),
(354, 'common', 'Keyword'),
(355, 'common', 'hi turen!'),
(356, 'common', 'Home'),
(357, 'common', 'Message Manage'),
(358, 'userGroup', 'Sort'),
(359, 'common', 'User Group Manage'),
(360, 'userGroup', 'Is Default'),
(361, 'common', 'TUREN SYSTEM'),
(362, 'common', 'Config Manage'),
(364, 'common', 'User Manage'),
(365, 'user_user', 'Administrator Group Manage'),
(366, 'common', 'TbatchUpdate'),
(367, 'common', 'Batch Update'),
(368, 'common', 'Role Manage'),
(369, 'auth_role', 'Role Manage'),
(370, 'auth_role', 'Role Create'),
(371, 'auth_role', 'Role Config Update'),
(372, 'common', '授权'),
(373, 'auth_role', 'Role Update'),
(374, 'common', 'Auth Item Manage'),
(375, 'auth_authItem', 'Auth Item Manage'),
(376, 'auth_authItem', 'Auth Item Create'),
(377, 'auth_authItem', 'Auth Item Update'),
(378, 'user_userGroup', 'Administrator Group Manage'),
(379, 'user_userGroup', 'Administrator Group Create'),
(380, 'user_userGroup', 'User Group Manage'),
(381, 'user_userGroup', 'Administrator Group Update'),
(382, 'manage_message', 'Translation Batch Update'),
(383, 'auth_role', 'Role Config'),
(384, 'common', 'Copyright'),
(385, 'common', 'All rights reserved.'),
(386, 'common', 'Anything you want');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- 转存表中的数据 `t_user`
--

INSERT INTO `t_user` (`id`, `user_name`, `password`, `email`, `nick_name`, `user_group_id`, `login_ip`, `date_added`, `status`, `is_admin`) VALUES
(12, '夏又桥', '$2y$13$RQvATflQx0UvK0CBRKeT0eIlNhCUR3WOAEGDFBc7bK4Troamfvlj6', '980522557dd@qq.com', '桥桥', 41, '::1', 1431877546, 1, 1),
(13, 'test02', '$2y$13$Y8591V2/SK5MhH218y1apOP9euZ6r4GkD//kDwcM2PFvS7BIAVAEy', '980522557d@qq.com', '夏又桥test', 39, '::1', 1431877567, 1, 1),
(17, 'xiayouqiao', '$2y$13$v5eKMYZ.OzmcP87pKXscv.9iNyxLFg4Ay691iKCNr8YtjBLz50GCO', '980522557@qq.com', 'jorry', 81, '::1', 1431963248, 1, 0),
(18, '测试', '$2y$13$khrGsXETM8VI6V0aJ9Tcouw9cOotzOxUrmT2I8YNZfVAcax6FcLHy', '98052255ed7@qq.com', 'jorry', 55, '::1', 1431877561, 1, 1),
(19, 'hao123', '$2y$13$oQszwpgkQyryTeE3QWKU0.Ss75I/HOu6fnIzrAcYWMQsNTUNjY4RW', '980522557df@qq.com', '小夏', 39, '::1', 1431877554, 1, 0);

-- --------------------------------------------------------

--
-- 表的结构 `t_user_group`
--

CREATE TABLE IF NOT EXISTS `t_user_group` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL COMMENT '父id',
  `name` varchar(64) NOT NULL COMMENT '组名',
  `role` varchar(100) NOT NULL COMMENT '管理组角色',
  `is_default` int(1) unsigned NOT NULL DEFAULT '0' COMMENT '默认分组',
  `sort` int(11) NOT NULL DEFAULT '0' COMMENT '排序',
  `status` int(1) NOT NULL DEFAULT '1' COMMENT '状态',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=92 ;

--
-- 转存表中的数据 `t_user_group`
--

INSERT INTO `t_user_group` (`id`, `parent_id`, `name`, `role`, `is_default`, `sort`, `status`) VALUES
(39, 0, '总经理室', 'SEO', 0, 1, 1),
(41, 0, '技术总监', 'Manager', 0, 5, 1),
(45, 41, '开发组', 'Manager', 0, 7, 1),
(47, 41, '设计组', 'Manager', 0, 0, 1),
(52, 0, '运营部', 'Manager', 0, 5, 1),
(54, 52, 'SEO推广', 'Manager', 0, 3, 1),
(55, 52, '邮件营销', 'Manager', 0, 0, 1),
(58, 0, '电商部', 'Manager', 0, 8, 1),
(60, 58, 'ebay组', 'Manager', 0, 0, 1),
(62, 58, '亚马逊组', 'Manager', 0, 0, 1),
(81, 45, '电子网站组', 'WMS', 0, 0, 1),
(82, 45, '服装网站组', 'Editor', 0, 0, 1),
(88, 0, '默认组', 'role_default', 1, 0, 1),
(91, 45, '测试组', 'WMS', 0, 0, 1);

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
