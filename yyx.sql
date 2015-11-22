-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2015 年 10 月 27 日 22:28
-- 服务器版本: 5.5.40
-- PHP 版本: 5.3.29

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `yyx`
--

-- --------------------------------------------------------

--
-- 表的结构 `yyx_bind`
--

CREATE TABLE IF NOT EXISTS `yyx_bind` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0' COMMENT '绑定用户',
  `weibo_id` int(11) NOT NULL DEFAULT '0' COMMENT '绑定微博',
  `account` varchar(100) DEFAULT NULL COMMENT '绑定账号',
  `password` varchar(100) DEFAULT NULL COMMENT '绑定密码',
  `datas` text COMMENT '绑定数据',
  `create_time` int(10) NOT NULL DEFAULT '0' COMMENT '创建时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`,`weibo_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `yyx_city`
--

CREATE TABLE IF NOT EXISTS `yyx_city` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `city_index` int(11) NOT NULL,
  `province_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=390 ;

--
-- 转存表中的数据 `yyx_city`
--

INSERT INTO `yyx_city` (`id`, `city_index`, `province_id`, `name`) VALUES
(5, 1, 5, '石家庄市'),
(6, 2, 5, '唐山市'),
(7, 3, 5, '秦皇岛市'),
(8, 4, 5, '邯郸市'),
(9, 5, 5, '邢台市'),
(10, 6, 5, '保定市'),
(11, 7, 5, '张家口市'),
(12, 8, 5, '承德市'),
(13, 9, 5, '沧州市'),
(14, 10, 5, '廊坊市'),
(15, 11, 5, '衡水市'),
(16, 1, 6, '太原市'),
(17, 2, 6, '大同市'),
(18, 3, 6, '阳泉市'),
(19, 4, 6, '长治市'),
(20, 5, 6, '晋城市'),
(21, 6, 6, '朔州市'),
(22, 7, 6, '晋中市'),
(23, 8, 6, '运城市'),
(24, 9, 6, '忻州市'),
(25, 10, 6, '临汾市'),
(26, 11, 6, '吕梁市'),
(27, 1, 7, '台北市'),
(28, 2, 7, '高雄市'),
(29, 3, 7, '基隆市'),
(30, 4, 7, '台中市'),
(31, 5, 7, '台南市'),
(32, 6, 7, '新竹市'),
(33, 7, 7, '嘉义市'),
(34, 8, 7, '台北县'),
(35, 9, 7, '宜兰县'),
(36, 10, 7, '桃园县'),
(37, 11, 7, '新竹县'),
(38, 12, 7, '苗栗县'),
(39, 13, 7, '台中县'),
(40, 14, 7, '彰化县'),
(41, 15, 7, '南投县'),
(42, 16, 7, '云林县'),
(43, 17, 7, '嘉义县'),
(44, 18, 7, '台南县'),
(45, 19, 7, '高雄县'),
(46, 20, 7, '屏东县'),
(47, 21, 7, '澎湖县'),
(48, 22, 7, '台东县'),
(49, 23, 7, '花莲县'),
(50, 1, 8, '沈阳市'),
(51, 2, 8, '大连市'),
(52, 3, 8, '鞍山市'),
(53, 4, 8, '抚顺市'),
(54, 5, 8, '本溪市'),
(55, 6, 8, '丹东市'),
(56, 7, 8, '锦州市'),
(57, 8, 8, '营口市'),
(58, 9, 8, '阜新市'),
(59, 10, 8, '辽阳市'),
(60, 11, 8, '盘锦市'),
(61, 12, 8, '铁岭市'),
(62, 13, 8, '朝阳市'),
(63, 14, 8, '葫芦岛市'),
(64, 1, 9, '长春市'),
(65, 2, 9, '吉林市'),
(66, 3, 9, '四平市'),
(67, 4, 9, '辽源市'),
(68, 5, 9, '通化市'),
(69, 6, 9, '白山市'),
(70, 7, 9, '松原市'),
(71, 8, 9, '白城市'),
(72, 9, 9, '延边朝鲜族自治州'),
(73, 1, 10, '哈尔滨市'),
(74, 2, 10, '齐齐哈尔市'),
(75, 3, 10, '鹤岗市'),
(76, 4, 10, '双鸭山市'),
(77, 5, 10, '鸡西市'),
(78, 6, 10, '大庆市'),
(79, 7, 10, '伊春市'),
(80, 8, 10, '牡丹江市'),
(81, 9, 10, '佳木斯市'),
(82, 10, 10, '七台河市'),
(83, 11, 10, '黑河市'),
(84, 12, 10, '绥化市'),
(85, 13, 10, '大兴安岭地区'),
(86, 1, 11, '南京市'),
(87, 2, 11, '无锡市'),
(88, 3, 11, '徐州市'),
(89, 4, 11, '常州市'),
(90, 5, 11, '苏州市'),
(91, 6, 11, '南通市'),
(92, 7, 11, '连云港市'),
(93, 8, 11, '淮安市'),
(94, 9, 11, '盐城市'),
(95, 10, 11, '扬州市'),
(96, 11, 11, '镇江市'),
(97, 12, 11, '泰州市'),
(98, 13, 11, '宿迁市'),
(99, 1, 12, '杭州市'),
(100, 2, 12, '宁波市'),
(101, 3, 12, '温州市'),
(102, 4, 12, '嘉兴市'),
(103, 5, 12, '湖州市'),
(104, 6, 12, '绍兴市'),
(105, 7, 12, '金华市'),
(106, 8, 12, '衢州市'),
(107, 9, 12, '舟山市'),
(108, 10, 12, '台州市'),
(109, 11, 12, '丽水市'),
(110, 1, 13, '合肥市'),
(111, 2, 13, '芜湖市'),
(112, 3, 13, '蚌埠市'),
(113, 4, 13, '淮南市'),
(114, 5, 13, '马鞍山市'),
(115, 6, 13, '淮北市'),
(116, 7, 13, '铜陵市'),
(117, 8, 13, '安庆市'),
(118, 9, 13, '黄山市'),
(119, 10, 13, '滁州市'),
(120, 11, 13, '阜阳市'),
(121, 12, 13, '宿州市'),
(122, 13, 13, '巢湖市'),
(123, 14, 13, '六安市'),
(124, 15, 13, '亳州市'),
(125, 16, 13, '池州市'),
(126, 17, 13, '宣城市'),
(127, 1, 14, '福州市'),
(128, 2, 14, '厦门市'),
(129, 3, 14, '莆田市'),
(130, 4, 14, '三明市'),
(131, 5, 14, '泉州市'),
(132, 6, 14, '漳州市'),
(133, 7, 14, '南平市'),
(134, 8, 14, '龙岩市'),
(135, 9, 14, '宁德市'),
(136, 1, 15, '南昌市'),
(137, 2, 15, '景德镇市'),
(138, 3, 15, '萍乡市'),
(139, 4, 15, '九江市'),
(140, 5, 15, '新余市'),
(141, 6, 15, '鹰潭市'),
(142, 7, 15, '赣州市'),
(143, 8, 15, '吉安市'),
(144, 9, 15, '宜春市'),
(145, 10, 15, '抚州市'),
(146, 11, 15, '上饶市'),
(147, 1, 16, '济南市'),
(148, 2, 16, '青岛市'),
(149, 3, 16, '淄博市'),
(150, 4, 16, '枣庄市'),
(151, 5, 16, '东营市'),
(152, 6, 16, '烟台市'),
(153, 7, 16, '潍坊市'),
(154, 8, 16, '济宁市'),
(155, 9, 16, '泰安市'),
(156, 10, 16, '威海市'),
(157, 11, 16, '日照市'),
(158, 12, 16, '莱芜市'),
(159, 13, 16, '临沂市'),
(160, 14, 16, '德州市'),
(161, 15, 16, '聊城市'),
(162, 16, 16, '滨州市'),
(163, 17, 16, '菏泽市'),
(164, 1, 17, '郑州市'),
(165, 2, 17, '开封市'),
(166, 3, 17, '洛阳市'),
(167, 4, 17, '平顶山市'),
(168, 5, 17, '安阳市'),
(169, 6, 17, '鹤壁市'),
(170, 7, 17, '新乡市'),
(171, 8, 17, '焦作市'),
(172, 9, 17, '濮阳市'),
(173, 10, 17, '许昌市'),
(174, 11, 17, '漯河市'),
(175, 12, 17, '三门峡市'),
(176, 13, 17, '南阳市'),
(177, 14, 17, '商丘市'),
(178, 15, 17, '信阳市'),
(179, 16, 17, '周口市'),
(180, 17, 17, '驻马店市'),
(181, 18, 17, '济源市'),
(182, 1, 18, '武汉市'),
(183, 2, 18, '黄石市'),
(184, 3, 18, '十堰市'),
(185, 4, 18, '荆州市'),
(186, 5, 18, '宜昌市'),
(187, 6, 18, '襄樊市'),
(188, 7, 18, '鄂州市'),
(189, 8, 18, '荆门市'),
(190, 9, 18, '孝感市'),
(191, 10, 18, '黄冈市'),
(192, 11, 18, '咸宁市'),
(193, 12, 18, '随州市'),
(194, 13, 18, '仙桃市'),
(195, 14, 18, '天门市'),
(196, 15, 18, '潜江市'),
(197, 16, 18, '神农架林区'),
(198, 17, 18, '恩施土家族苗族自治州'),
(199, 1, 19, '长沙市'),
(200, 2, 19, '株洲市'),
(201, 3, 19, '湘潭市'),
(202, 4, 19, '衡阳市'),
(203, 5, 19, '邵阳市'),
(204, 6, 19, '岳阳市'),
(205, 7, 19, '常德市'),
(206, 8, 19, '张家界市'),
(207, 9, 19, '益阳市'),
(208, 10, 19, '郴州市'),
(209, 11, 19, '永州市'),
(210, 12, 19, '怀化市'),
(211, 13, 19, '娄底市'),
(212, 14, 19, '湘西土家族苗族自治州'),
(213, 1, 20, '广州市'),
(214, 2, 20, '深圳市'),
(215, 3, 20, '珠海市'),
(216, 4, 20, '汕头市'),
(217, 5, 20, '韶关市'),
(218, 6, 20, '佛山市'),
(219, 7, 20, '江门市'),
(220, 8, 20, '湛江市'),
(221, 9, 20, '茂名市'),
(222, 10, 20, '肇庆市'),
(223, 11, 20, '惠州市'),
(224, 12, 20, '梅州市'),
(225, 13, 20, '汕尾市'),
(226, 14, 20, '河源市'),
(227, 15, 20, '阳江市'),
(228, 16, 20, '清远市'),
(229, 17, 20, '东莞市'),
(230, 18, 20, '中山市'),
(231, 19, 20, '潮州市'),
(232, 20, 20, '揭阳市'),
(233, 21, 20, '云浮市'),
(234, 1, 21, '兰州市'),
(235, 2, 21, '金昌市'),
(236, 3, 21, '白银市'),
(237, 4, 21, '天水市'),
(238, 5, 21, '嘉峪关市'),
(239, 6, 21, '武威市'),
(240, 7, 21, '张掖市'),
(241, 8, 21, '平凉市'),
(242, 9, 21, '酒泉市'),
(243, 10, 21, '庆阳市'),
(244, 11, 21, '定西市'),
(245, 12, 21, '陇南市'),
(246, 13, 21, '临夏回族自治州'),
(247, 14, 21, '甘南藏族自治州'),
(248, 1, 22, '成都市'),
(249, 2, 22, '自贡市'),
(250, 3, 22, '攀枝花市'),
(251, 4, 22, '泸州市'),
(252, 5, 22, '德阳市'),
(253, 6, 22, '绵阳市'),
(254, 7, 22, '广元市'),
(255, 8, 22, '遂宁市'),
(256, 9, 22, '内江市'),
(257, 10, 22, '乐山市'),
(258, 11, 22, '南充市'),
(259, 12, 22, '眉山市'),
(260, 13, 22, '宜宾市'),
(261, 14, 22, '广安市'),
(262, 15, 22, '达州市'),
(263, 16, 22, '雅安市'),
(264, 17, 22, '巴中市'),
(265, 18, 22, '资阳市'),
(266, 19, 22, '阿坝藏族羌族自治州'),
(267, 20, 22, '甘孜藏族自治州'),
(268, 21, 22, '凉山彝族自治州'),
(269, 1, 23, '贵阳市'),
(270, 2, 23, '六盘水市'),
(271, 3, 23, '遵义市'),
(272, 4, 23, '安顺市'),
(273, 5, 23, '铜仁地区'),
(274, 6, 23, '毕节地区'),
(275, 7, 23, '黔西南布依族苗族自治州'),
(276, 8, 23, '黔东南苗族侗族自治州'),
(277, 9, 23, '黔南布依族苗族自治州'),
(278, 1, 24, '海口市'),
(279, 2, 24, '三亚市'),
(280, 3, 24, '五指山市'),
(281, 4, 24, '琼海市'),
(282, 5, 24, '儋州市'),
(283, 6, 24, '文昌市'),
(284, 7, 24, '万宁市'),
(285, 8, 24, '东方市'),
(286, 9, 24, '澄迈县'),
(287, 10, 24, '定安县'),
(288, 11, 24, '屯昌县'),
(289, 12, 24, '临高县'),
(290, 13, 24, '白沙黎族自治县'),
(291, 14, 24, '昌江黎族自治县'),
(292, 15, 24, '乐东黎族自治县'),
(293, 16, 24, '陵水黎族自治县'),
(294, 17, 24, '保亭黎族苗族自治县'),
(295, 18, 24, '琼中黎族苗族自治县'),
(296, 1, 25, '昆明市'),
(297, 2, 25, '曲靖市'),
(298, 3, 25, '玉溪市'),
(299, 4, 25, '保山市'),
(300, 5, 25, '昭通市'),
(301, 6, 25, '丽江市'),
(302, 7, 25, '思茅市'),
(303, 8, 25, '临沧市'),
(304, 9, 25, '文山壮族苗族自治州'),
(305, 10, 25, '红河哈尼族彝族自治州'),
(306, 11, 25, '西双版纳傣族自治州'),
(307, 12, 25, '楚雄彝族自治州'),
(308, 13, 25, '大理白族自治州'),
(309, 14, 25, '德宏傣族景颇族自治州'),
(310, 15, 25, '怒江傈傈族自治州'),
(311, 16, 25, '迪庆藏族自治州'),
(312, 1, 26, '西宁市'),
(313, 2, 26, '海东地区'),
(314, 3, 26, '海北藏族自治州'),
(315, 4, 26, '黄南藏族自治州'),
(316, 5, 26, '海南藏族自治州'),
(317, 6, 26, '果洛藏族自治州'),
(318, 7, 26, '玉树藏族自治州'),
(319, 8, 26, '海西蒙古族藏族自治州'),
(320, 1, 27, '西安市'),
(321, 2, 27, '铜川市'),
(322, 3, 27, '宝鸡市'),
(323, 4, 27, '咸阳市'),
(324, 5, 27, '渭南市'),
(325, 6, 27, '延安市'),
(326, 7, 27, '汉中市'),
(327, 8, 27, '榆林市'),
(328, 9, 27, '安康市'),
(329, 10, 27, '商洛市'),
(330, 1, 28, '南宁市'),
(331, 2, 28, '柳州市'),
(332, 3, 28, '桂林市'),
(333, 4, 28, '梧州市'),
(334, 5, 28, '北海市'),
(335, 6, 28, '防城港市'),
(336, 7, 28, '钦州市'),
(337, 8, 28, '贵港市'),
(338, 9, 28, '玉林市'),
(339, 10, 28, '百色市'),
(340, 11, 28, '贺州市'),
(341, 12, 28, '河池市'),
(342, 13, 28, '来宾市'),
(343, 14, 28, '崇左市'),
(344, 1, 29, '拉萨市'),
(345, 2, 29, '那曲地区'),
(346, 3, 29, '昌都地区'),
(347, 4, 29, '山南地区'),
(348, 5, 29, '日喀则地区'),
(349, 6, 29, '阿里地区'),
(350, 7, 29, '林芝地区'),
(351, 1, 30, '银川市'),
(352, 2, 30, '石嘴山市'),
(353, 3, 30, '吴忠市'),
(354, 4, 30, '固原市'),
(355, 5, 30, '中卫市'),
(356, 1, 31, '乌鲁木齐市'),
(357, 2, 31, '克拉玛依市'),
(358, 3, 31, '石河子市　'),
(359, 4, 31, '阿拉尔市'),
(360, 5, 31, '图木舒克市'),
(361, 6, 31, '五家渠市'),
(362, 7, 31, '吐鲁番市'),
(363, 8, 31, '阿克苏市'),
(364, 9, 31, '喀什市'),
(365, 10, 31, '哈密市'),
(366, 11, 31, '和田市'),
(367, 12, 31, '阿图什市'),
(368, 13, 31, '库尔勒市'),
(369, 14, 31, '昌吉市　'),
(370, 15, 31, '阜康市'),
(371, 16, 31, '米泉市'),
(372, 17, 31, '博乐市'),
(373, 18, 31, '伊宁市'),
(374, 19, 31, '奎屯市'),
(375, 20, 31, '塔城市'),
(376, 21, 31, '乌苏市'),
(377, 22, 31, '阿勒泰市'),
(378, 1, 32, '呼和浩特市'),
(379, 2, 32, '包头市'),
(380, 3, 32, '乌海市'),
(381, 4, 32, '赤峰市'),
(382, 5, 32, '通辽市'),
(383, 6, 32, '鄂尔多斯市'),
(384, 7, 32, '呼伦贝尔市'),
(385, 8, 32, '巴彦淖尔市'),
(386, 9, 32, '乌兰察布市'),
(387, 10, 32, '锡林郭勒盟'),
(388, 11, 32, '兴安盟'),
(389, 12, 32, '阿拉善盟');

-- --------------------------------------------------------

--
-- 表的结构 `yyx_config`
--

CREATE TABLE IF NOT EXISTS `yyx_config` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '' COMMENT '配置名称',
  `tab` varchar(10) NOT NULL DEFAULT '' COMMENT '所属选项卡',
  `type` varchar(20) DEFAULT NULL COMMENT '该配置的类型，text，文本输入框；password，密码输入框；textarea，文本区域；select，下拉框单选；checkbox, 复选框 ; radio , 单选框 ;  file,文件上传；hidden , 隐藏框',
  `options` text COMMENT '可选值,只有type字段为select,options时才有值, 以,号分隔多值',
  `key` varchar(50) DEFAULT NULL COMMENT '配置键',
  `value` text COMMENT '配置值',
  `sort_num` smallint(4) DEFAULT '0' COMMENT '排序',
  PRIMARY KEY (`id`),
  UNIQUE KEY `key` (`key`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=37 ;

--
-- 转存表中的数据 `yyx_config`
--

INSERT INTO `yyx_config` (`id`, `name`, `tab`, `type`, `options`, `key`, `value`, `sort_num`) VALUES
(1, '', 'email', 'radio', 'mail,mail|smtp,smtp', 'email_service_type', '', 0),
(2, '', 'email', 'text', '', 'email_smtp', '', 0),
(3, '', 'email', 'text', '', 'email_server_port', '', 0),
(4, '', 'email', 'text', '', 'email_send_email', '', 0),
(5, '', 'email', 'text', '', 'email_send_email_password', '', 0),
(6, '', 'email', 'text', '', 'email_reply_email', '', 0),
(7, '', 'email', 'radio', '0,否|1,是', 'email_ssl', '0', 0),
(8, '', 'basic', 'text', '', 'site_name', '网站名称', 0),
(9, '', 'basic', 'text', '', 'beian', '粤ICP备11111111号', 0),
(10, '', 'basic', 'text', '', 'copyright', 'Copyright © 2012-2013 Yuyanxing 版权所有', 0),
(11, '', 'money', 'text', '', 'integral_invite', '100', 100),
(12, '', 'money', 'text', '', 'recharge_inviter_reward', '0.1', 100),
(13, '', 'pay', 'text', '', 'alipay_parter_id', '', 0),
(14, '', 'pay', 'text', '', 'alipay_parter_key', '', 0),
(15, '', 'pay', 'text', '', 'alipay_parter_account', '', 0),
(16, '', 'money', 'text', '', 'integral_share', '50', 100),
(17, '', 'placard', 'textarea', '', 'placard', '今日系统与庄家分比调整为，庄家全部利润的10%，系统扣除。请各位庄家朋友们注意。 ', 0),
(18, '', 'money', 'text', '', 'guess_tax', '0.1', 100),
(19, '', 'money', 'radio', '0,开启|1,关闭', 'guess_add_check', '0', 0),
(20, '', 'money', 'radio', '0,开启|1,关闭', 'guess_custom_add_check', '0', 0),
(21, '', 'basic', 'radio', '0,关闭|1,开启', 'invite_open', '0', 0),
(28, '', 'ad', 'textarea', NULL, 'ad', '<img width="270" height="129" src="http://www.baidu.com/img/bdlogo.gif">', 0),
(26, '', 'money', 'text', '', 'integral_register', '50', 100),
(27, '', 'money', 'text', '', 'integral_user_info', '50', 100),
(29, '', 'basic', 'text', NULL, 'wx_account', '', 0),
(30, '', 'basic', 'text', NULL, 'admin_email', '', 0),
(31, '', 'basic', 'text', NULL, 'sina_weibo', '', 0),
(32, '', 'basic', 'text', NULL, 'qq_weibo', '', 0),
(33, '', 'money', 'text', '', 'wealth_register', '50', 100),
(34, '', 'money', 'text', '', 'wealth_btc_register', '50', 100),
(35, '', 'money', 'text', '', 'wealth_ltc_register', '50', 100),
(36, '', 'money', 'text', '', 'wealth_doge_register', '50', 100);

-- --------------------------------------------------------

--
-- 表的结构 `yyx_custom_type`
--

CREATE TABLE IF NOT EXISTS `yyx_custom_type` (
  `id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL DEFAULT '' COMMENT '名称',
  `sort_num` int(11) NOT NULL DEFAULT '0' COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `yyx_custom_type`
--

INSERT INTO `yyx_custom_type` (`id`, `name`, `sort_num`) VALUES
(1, '美食', 0),
(2, 'KTV', 0),
(3, '旅游', 0),
(4, '喝酒', 0);

-- --------------------------------------------------------

--
-- 表的结构 `yyx_email_template`
--

CREATE TABLE IF NOT EXISTS `yyx_email_template` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '' COMMENT '类型名称',
  `subject` varchar(200) NOT NULL DEFAULT '' COMMENT '邮件主题',
  `key` varchar(50) DEFAULT NULL COMMENT '键',
  `value` text COMMENT '值',
  `description` text COMMENT '描述',
  PRIMARY KEY (`id`),
  UNIQUE KEY `key` (`key`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `yyx_email_template`
--

INSERT INTO `yyx_email_template` (`id`, `name`, `subject`, `key`, `value`, `description`) VALUES
(1, '找回密码邮件模板', '找回密码-预言星', 'find_password_email', '您好，{account}，密码重置链接为：{url}，30分钟内有效。', '变量说明：账号名(account), 密码重置链接(url)');

-- --------------------------------------------------------

--
-- 表的结构 `yyx_exchange`
--

CREATE TABLE IF NOT EXISTS `yyx_exchange` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `goods_id` int(11) unsigned NOT NULL COMMENT '商品',
  `user_id` int(11) unsigned NOT NULL COMMENT '商品',
  `is_lottery` tinyint(1) DEFAULT '0' COMMENT '是否是抽奖奖品',
  `is_exchange` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否兑换是兑换',
  `money` decimal(14,8) NOT NULL DEFAULT '0.00000000' COMMENT '兑换金币',
  `wealth_type` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '财富类型 1为金币 2为积分',
  `username` varchar(50) NOT NULL DEFAULT '' COMMENT '收货人姓名',
  `mobile` varchar(15) NOT NULL DEFAULT '' COMMENT '收货人手机',
  `zip` varchar(15) NOT NULL DEFAULT '' COMMENT '邮编',
  `address` varchar(150) NOT NULL DEFAULT '' COMMENT '收货人地址',
  `send_status` tinyint(1) DEFAULT '0' COMMENT '发货状态，0：未发货，1：已发货，默认为0',
  `receive_status` tinyint(1) DEFAULT '0' COMMENT '收货状态，0：未收货，1：已收货，默认为0',
  `create_time` int(10) NOT NULL DEFAULT '0' COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `yyx_follow`
--

CREATE TABLE IF NOT EXISTS `yyx_follow` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `from_uid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '关注人',
  `to_uid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '被关注人',
  `add_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '关注时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `from_uid_2` (`from_uid`,`to_uid`),
  KEY `from_uid` (`from_uid`),
  KEY `to_uid` (`to_uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `yyx_goods`
--

CREATE TABLE IF NOT EXISTS `yyx_goods` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL DEFAULT '' COMMENT '名称',
  `image` varchar(150) DEFAULT '' COMMENT '商品图片',
  `detail` text COMMENT '详细',
  `status` tinyint(1) DEFAULT '1' COMMENT '0：下架，1：上架，默认为1',
  `can_lottery` tinyint(1) DEFAULT '1' COMMENT '是否能抽奖 0:不能， 1:能， 默认为1',
  `lottery_count` smallint(4) unsigned NOT NULL DEFAULT '1' COMMENT '每个用户抽奖次数 0为不限',
  `lottery_credit` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '抽奖所需积分',
  `probability` double(8,8) NOT NULL DEFAULT '0.00000000' COMMENT '中奖概率',
  `can_exchange` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否能兑换 0:不能， 1:能， 默认为1',
  `money` decimal(14,8) NOT NULL DEFAULT '0.00000000' COMMENT '兑换金币 0为免费',
  `wealth_type` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '财富类型 1为金币 2为积分',
  `money_limit` decimal(14,8) NOT NULL DEFAULT '0.00000000' COMMENT '用户金币下限 0为不设限',
  `count` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '库存数',
  `exchanges` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '中/兑奖次数',
  `sort_num` smallint(4) DEFAULT '0' COMMENT '排序',
  `summary` text NOT NULL,
  `create_time` int(10) NOT NULL DEFAULT '0' COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `yyx_guess`
--

CREATE TABLE IF NOT EXISTS `yyx_guess` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL COMMENT '坐庄用户',
  `custom` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '竟猜类型 0:系统玩法 1:自定义',
  `guess_point_id` int(11) DEFAULT '0' COMMENT '竞猜点ID',
  `cate_id` int(11) NOT NULL COMMENT '分类Id',
  `tax` double(3,3) NOT NULL COMMENT '系统税收比例',
  `title` varchar(150) NOT NULL DEFAULT '' COMMENT '标题',
  `play_start_time` int(10) NOT NULL COMMENT '参与竟猜开始时间',
  `play_deadline` int(10) NOT NULL COMMENT '参与竟猜截止时间',
  `odds_type` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '赔率类型 0未知赔率 1为固定 2为浮动 3为组合',
  `wealth_type` tinyint(2) unsigned NOT NULL DEFAULT '1' COMMENT '竟猜财富类型 1为金币 2为积分, 自定义竟猜见详细',
  `custom_type` varchar(50) NOT NULL DEFAULT '' COMMENT '自定义竟猜类型',
  `play_count` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '参与竟猜人数',
  `play_wealth` decimal(14,8) NOT NULL DEFAULT '0.00000000' COMMENT '参与竟猜财富数',
  `keep_wealth` decimal(14,8) NOT NULL DEFAULT '0.00000000' COMMENT '托管金额',
  `win_wealth` decimal(14,8) NOT NULL DEFAULT '0.00000000' COMMENT '赢的金额',
  `play_datas` text COMMENT '多个竞猜玩法的数组数据(玩法ID,赔率类型，投注上下限,竞猜人数上限,赔率)',
  `parameter` text COMMENT '自定义竟猜的参数',
  `play_role` tinyint(1) NOT NULL DEFAULT '0' COMMENT '参与角色 0：所有人，1：好友',
  `summary` text COMMENT '竞猜简介',
  `status` tinyint(2) NOT NULL DEFAULT '1' COMMENT '竟猜状态 0：待审核，1：审核通过 2:提交判定 3：结束 4:关闭',
  `create_time` int(10) unsigned DEFAULT '0' COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- 转存表中的数据 `yyx_guess`
--

INSERT INTO `yyx_guess` (`id`, `user_id`, `custom`, `guess_point_id`, `cate_id`, `tax`, `title`, `play_start_time`, `play_deadline`, `odds_type`, `wealth_type`, `custom_type`, `play_count`, `play_wealth`, `keep_wealth`, `win_wealth`, `play_datas`, `parameter`, `play_role`, `summary`, `status`, `create_time`) VALUES
(1, 1, 0, 1, 4, 0.100, 'ceshi', 1444831560, 1444843440, 1, 2, '', 0, '0.00000000', '50.00000000', '0.00000000', 'a:1:{i:1;O:11:"PlayWayData":11:{s:15:"\0PlayWayData\0id";s:1:"1";s:17:"\0PlayWayData\0name";s:15:"猜胜负玩法";s:21:"\0PlayWayData\0oddsType";i:1;s:25:"\0PlayWayData\0floatPercent";i:0;s:30:"\0PlayWayData\0bettingLowerLimit";i:0;s:30:"\0PlayWayData\0bettingUpperLimit";i:5;s:27:"\0PlayWayData\0playCountLimit";i:10;s:22:"\0PlayWayData\0parameter";O:16:"PlayWayParameter":5:{s:22:"\0PlayWayParameter\0name";s:2:"vd";s:23:"\0PlayWayParameter\0label";s:6:"胜负";s:29:"\0PlayWayParameter\0description";N;s:25:"\0PlayWayParameter\0options";a:3:{s:1:"c";O:22:"PlayWayParameterOption":7:{s:29:"\0PlayWayParameterOption\0label";s:6:"one胜";s:28:"\0PlayWayParameterOption\0type";s:4:"text";s:35:"\0PlayWayParameterOption\0description";N;s:29:"\0PlayWayParameterOption\0value";s:1:"c";s:32:"\0PlayWayParameterOption\0minValue";N;s:32:"\0PlayWayParameterOption\0maxValue";N;s:33:"\0PlayWayParameterOption\0playCount";i:0;}s:5:"equal";O:22:"PlayWayParameterOption":7:{s:29:"\0PlayWayParameterOption\0label";s:6:"打平";s:28:"\0PlayWayParameterOption\0type";s:4:"text";s:35:"\0PlayWayParameterOption\0description";N;s:29:"\0PlayWayParameterOption\0value";s:5:"equal";s:32:"\0PlayWayParameterOption\0minValue";N;s:32:"\0PlayWayParameterOption\0maxValue";N;s:33:"\0PlayWayParameterOption\0playCount";i:0;}i:1;O:22:"PlayWayParameterOption":7:{s:29:"\0PlayWayParameterOption\0label";s:6:"two胜";s:28:"\0PlayWayParameterOption\0type";s:4:"text";s:35:"\0PlayWayParameterOption\0description";N;s:29:"\0PlayWayParameterOption\0value";i:1;s:32:"\0PlayWayParameterOption\0minValue";N;s:32:"\0PlayWayParameterOption\0maxValue";N;s:33:"\0PlayWayParameterOption\0playCount";i:0;}}s:23:"\0PlayWayParameter\0value";N;}s:17:"\0PlayWayData\0odds";a:3:{i:1;i:1;s:1:"c";i:1;s:5:"equal";i:1;}s:23:"\0PlayWayData\0playCounts";a:0:{}s:24:"\0PlayWayData\0playWealths";a:0:{}}}', '', 0, 'ffghjk', 3, 1444831659),
(2, 1, 0, 2, 4, 0.100, '英法', 1445039700, 1445047680, 2, 2, '', 4, '10.00000000', '0.00000000', '2.11000000', 'a:1:{i:1;O:11:"PlayWayData":11:{s:15:"\0PlayWayData\0id";s:1:"1";s:17:"\0PlayWayData\0name";s:15:"猜胜负玩法";s:21:"\0PlayWayData\0oddsType";i:2;s:25:"\0PlayWayData\0floatPercent";d:0.69999999999999996;s:30:"\0PlayWayData\0bettingLowerLimit";i:0;s:30:"\0PlayWayData\0bettingUpperLimit";i:0;s:27:"\0PlayWayData\0playCountLimit";i:0;s:22:"\0PlayWayData\0parameter";O:16:"PlayWayParameter":5:{s:22:"\0PlayWayParameter\0name";s:2:"vd";s:23:"\0PlayWayParameter\0label";s:6:"胜负";s:29:"\0PlayWayParameter\0description";N;s:25:"\0PlayWayParameter\0options";a:3:{s:1:"c";O:22:"PlayWayParameterOption":7:{s:29:"\0PlayWayParameterOption\0label";s:12:"英国胜胜";s:28:"\0PlayWayParameterOption\0type";s:4:"text";s:35:"\0PlayWayParameterOption\0description";N;s:29:"\0PlayWayParameterOption\0value";s:1:"c";s:32:"\0PlayWayParameterOption\0minValue";N;s:32:"\0PlayWayParameterOption\0maxValue";N;s:33:"\0PlayWayParameterOption\0playCount";i:0;}s:5:"equal";O:22:"PlayWayParameterOption":7:{s:29:"\0PlayWayParameterOption\0label";s:6:"打平";s:28:"\0PlayWayParameterOption\0type";s:4:"text";s:35:"\0PlayWayParameterOption\0description";N;s:29:"\0PlayWayParameterOption\0value";s:5:"equal";s:32:"\0PlayWayParameterOption\0minValue";N;s:32:"\0PlayWayParameterOption\0maxValue";N;s:33:"\0PlayWayParameterOption\0playCount";i:0;}i:1;O:22:"PlayWayParameterOption":7:{s:29:"\0PlayWayParameterOption\0label";s:12:"法国胜胜";s:28:"\0PlayWayParameterOption\0type";s:4:"text";s:35:"\0PlayWayParameterOption\0description";N;s:29:"\0PlayWayParameterOption\0value";i:1;s:32:"\0PlayWayParameterOption\0minValue";N;s:32:"\0PlayWayParameterOption\0maxValue";N;s:33:"\0PlayWayParameterOption\0playCount";i:0;}}s:23:"\0PlayWayParameter\0value";N;}s:17:"\0PlayWayData\0odds";a:0:{}s:23:"\0PlayWayData\0playCounts";a:3:{s:1:"c";i:1;i:1;i:2;s:5:"equal";i:1;}s:24:"\0PlayWayData\0playWealths";a:3:{s:1:"c";i:1;i:1;i:6;s:5:"equal";i:3;}}}', '', 0, '顶顶顶顶顶顶顶顶', 3, 1445039794),
(3, 3, 0, 3, 5, 0.100, '西甲得法', 1445040000, 1445042280, 1, 2, '', 4, '11.00000000', '13.00000000', '3.80000000', 'a:1:{i:2;O:11:"PlayWayData":11:{s:15:"\0PlayWayData\0id";s:1:"2";s:17:"\0PlayWayData\0name";s:15:"猜总进球数";s:21:"\0PlayWayData\0oddsType";i:1;s:25:"\0PlayWayData\0floatPercent";i:0;s:30:"\0PlayWayData\0bettingLowerLimit";i:0;s:30:"\0PlayWayData\0bettingUpperLimit";i:3;s:27:"\0PlayWayData\0playCountLimit";i:3;s:22:"\0PlayWayData\0parameter";O:16:"PlayWayParameter":5:{s:22:"\0PlayWayParameter\0name";s:4:"goal";s:23:"\0PlayWayParameter\0label";s:12:"总进球数";s:29:"\0PlayWayParameter\0description";N;s:25:"\0PlayWayParameter\0options";a:5:{i:0;O:22:"PlayWayParameterOption":7:{s:29:"\0PlayWayParameterOption\0label";s:4:"0球";s:28:"\0PlayWayParameterOption\0type";s:4:"text";s:35:"\0PlayWayParameterOption\0description";N;s:29:"\0PlayWayParameterOption\0value";s:1:"0";s:32:"\0PlayWayParameterOption\0minValue";N;s:32:"\0PlayWayParameterOption\0maxValue";N;s:33:"\0PlayWayParameterOption\0playCount";i:0;}i:1;O:22:"PlayWayParameterOption":7:{s:29:"\0PlayWayParameterOption\0label";s:4:"1球";s:28:"\0PlayWayParameterOption\0type";s:4:"text";s:35:"\0PlayWayParameterOption\0description";N;s:29:"\0PlayWayParameterOption\0value";s:1:"1";s:32:"\0PlayWayParameterOption\0minValue";N;s:32:"\0PlayWayParameterOption\0maxValue";N;s:33:"\0PlayWayParameterOption\0playCount";i:0;}i:2;O:22:"PlayWayParameterOption":7:{s:29:"\0PlayWayParameterOption\0label";s:4:"2球";s:28:"\0PlayWayParameterOption\0type";s:4:"text";s:35:"\0PlayWayParameterOption\0description";N;s:29:"\0PlayWayParameterOption\0value";s:1:"2";s:32:"\0PlayWayParameterOption\0minValue";N;s:32:"\0PlayWayParameterOption\0maxValue";N;s:33:"\0PlayWayParameterOption\0playCount";i:0;}i:3;O:22:"PlayWayParameterOption":7:{s:29:"\0PlayWayParameterOption\0label";s:4:"3球";s:28:"\0PlayWayParameterOption\0type";s:4:"text";s:35:"\0PlayWayParameterOption\0description";N;s:29:"\0PlayWayParameterOption\0value";s:1:"3";s:32:"\0PlayWayParameterOption\0minValue";N;s:32:"\0PlayWayParameterOption\0maxValue";N;s:33:"\0PlayWayParameterOption\0playCount";i:0;}s:2:"4-";O:22:"PlayWayParameterOption":7:{s:29:"\0PlayWayParameterOption\0label";s:10:"4球以上";s:28:"\0PlayWayParameterOption\0type";s:5:"range";s:35:"\0PlayWayParameterOption\0description";N;s:29:"\0PlayWayParameterOption\0value";s:2:"4-";s:32:"\0PlayWayParameterOption\0minValue";s:1:"4";s:32:"\0PlayWayParameterOption\0maxValue";N;s:33:"\0PlayWayParameterOption\0playCount";i:0;}}s:23:"\0PlayWayParameter\0value";N;}s:17:"\0PlayWayData\0odds";a:5:{i:0;i:1;i:1;d:1.1000000000000001;i:2;d:1.2;i:3;d:1.3;s:2:"4-";d:1.3999999999999999;}s:23:"\0PlayWayData\0playCounts";a:3:{i:2;i:2;i:1;i:1;s:2:"4-";i:1;}s:24:"\0PlayWayData\0playWealths";a:3:{i:2;i:5;i:1;i:3;s:2:"4-";i:3;}}}', '', 0, 'fasfdasfasfaf', 3, 1445040158),
(4, 3, 0, 4, 5, 0.100, '西甲英德', 1445080140, 1445080620, 1, 2, '', 4, '17.00000000', '35.00000000', '5.50000000', 'a:1:{i:2;O:11:"PlayWayData":11:{s:15:"\0PlayWayData\0id";s:1:"2";s:17:"\0PlayWayData\0name";s:15:"猜总进球数";s:21:"\0PlayWayData\0oddsType";i:1;s:25:"\0PlayWayData\0floatPercent";i:0;s:30:"\0PlayWayData\0bettingLowerLimit";i:0;s:30:"\0PlayWayData\0bettingUpperLimit";i:5;s:27:"\0PlayWayData\0playCountLimit";i:5;s:22:"\0PlayWayData\0parameter";O:16:"PlayWayParameter":5:{s:22:"\0PlayWayParameter\0name";s:4:"goal";s:23:"\0PlayWayParameter\0label";s:12:"总进球数";s:29:"\0PlayWayParameter\0description";N;s:25:"\0PlayWayParameter\0options";a:5:{i:0;O:22:"PlayWayParameterOption":7:{s:29:"\0PlayWayParameterOption\0label";s:4:"0球";s:28:"\0PlayWayParameterOption\0type";s:4:"text";s:35:"\0PlayWayParameterOption\0description";N;s:29:"\0PlayWayParameterOption\0value";s:1:"0";s:32:"\0PlayWayParameterOption\0minValue";N;s:32:"\0PlayWayParameterOption\0maxValue";N;s:33:"\0PlayWayParameterOption\0playCount";i:0;}i:1;O:22:"PlayWayParameterOption":7:{s:29:"\0PlayWayParameterOption\0label";s:4:"1球";s:28:"\0PlayWayParameterOption\0type";s:4:"text";s:35:"\0PlayWayParameterOption\0description";N;s:29:"\0PlayWayParameterOption\0value";s:1:"1";s:32:"\0PlayWayParameterOption\0minValue";N;s:32:"\0PlayWayParameterOption\0maxValue";N;s:33:"\0PlayWayParameterOption\0playCount";i:0;}i:2;O:22:"PlayWayParameterOption":7:{s:29:"\0PlayWayParameterOption\0label";s:4:"2球";s:28:"\0PlayWayParameterOption\0type";s:4:"text";s:35:"\0PlayWayParameterOption\0description";N;s:29:"\0PlayWayParameterOption\0value";s:1:"2";s:32:"\0PlayWayParameterOption\0minValue";N;s:32:"\0PlayWayParameterOption\0maxValue";N;s:33:"\0PlayWayParameterOption\0playCount";i:0;}i:3;O:22:"PlayWayParameterOption":7:{s:29:"\0PlayWayParameterOption\0label";s:4:"3球";s:28:"\0PlayWayParameterOption\0type";s:4:"text";s:35:"\0PlayWayParameterOption\0description";N;s:29:"\0PlayWayParameterOption\0value";s:1:"3";s:32:"\0PlayWayParameterOption\0minValue";N;s:32:"\0PlayWayParameterOption\0maxValue";N;s:33:"\0PlayWayParameterOption\0playCount";i:0;}s:2:"4-";O:22:"PlayWayParameterOption":7:{s:29:"\0PlayWayParameterOption\0label";s:10:"4球以上";s:28:"\0PlayWayParameterOption\0type";s:5:"range";s:35:"\0PlayWayParameterOption\0description";N;s:29:"\0PlayWayParameterOption\0value";s:2:"4-";s:32:"\0PlayWayParameterOption\0minValue";s:1:"4";s:32:"\0PlayWayParameterOption\0maxValue";N;s:33:"\0PlayWayParameterOption\0playCount";i:0;}}s:23:"\0PlayWayParameter\0value";N;}s:17:"\0PlayWayData\0odds";a:5:{i:0;i:1;i:1;d:1.1000000000000001;i:2;d:1.2;i:3;d:1.3;s:2:"4-";d:1.3999999999999999;}s:23:"\0PlayWayData\0playCounts";a:4:{s:2:"4-";i:1;i:2;i:1;i:1;i:1;i:3;i:1;}s:24:"\0PlayWayData\0playWealths";a:4:{s:2:"4-";i:3;i:2;i:4;i:1;i:5;i:3;i:5;}}}', '', 0, '发的说法是发生', 3, 1445080270),
(5, 1, 0, 5, 7, 0.100, '明日上证指数', 1445651460, 1446254400, 2, 2, '', 1, '1.00000000', '0.00000000', '0.00000000', 'a:1:{i:5;O:11:"PlayWayData":11:{s:15:"\0PlayWayData\0id";s:1:"5";s:17:"\0PlayWayData\0name";s:12:"末位号码";s:21:"\0PlayWayData\0oddsType";i:2;s:25:"\0PlayWayData\0floatPercent";d:0.90000000000000002;s:30:"\0PlayWayData\0bettingLowerLimit";i:0;s:30:"\0PlayWayData\0bettingUpperLimit";i:0;s:27:"\0PlayWayData\0playCountLimit";i:0;s:22:"\0PlayWayData\0parameter";O:16:"PlayWayParameter":5:{s:22:"\0PlayWayParameter\0name";s:2:"sd";s:23:"\0PlayWayParameter\0label";s:12:"末位号码";s:29:"\0PlayWayParameter\0description";N;s:25:"\0PlayWayParameter\0options";a:10:{i:0;O:22:"PlayWayParameterOption":7:{s:29:"\0PlayWayParameterOption\0label";s:1:"0";s:28:"\0PlayWayParameterOption\0type";s:4:"text";s:35:"\0PlayWayParameterOption\0description";N;s:29:"\0PlayWayParameterOption\0value";s:1:"0";s:32:"\0PlayWayParameterOption\0minValue";N;s:32:"\0PlayWayParameterOption\0maxValue";N;s:33:"\0PlayWayParameterOption\0playCount";i:0;}i:1;O:22:"PlayWayParameterOption":7:{s:29:"\0PlayWayParameterOption\0label";s:1:"1";s:28:"\0PlayWayParameterOption\0type";s:4:"text";s:35:"\0PlayWayParameterOption\0description";N;s:29:"\0PlayWayParameterOption\0value";s:1:"1";s:32:"\0PlayWayParameterOption\0minValue";N;s:32:"\0PlayWayParameterOption\0maxValue";N;s:33:"\0PlayWayParameterOption\0playCount";i:0;}i:2;O:22:"PlayWayParameterOption":7:{s:29:"\0PlayWayParameterOption\0label";s:1:"2";s:28:"\0PlayWayParameterOption\0type";s:4:"text";s:35:"\0PlayWayParameterOption\0description";N;s:29:"\0PlayWayParameterOption\0value";s:1:"2";s:32:"\0PlayWayParameterOption\0minValue";N;s:32:"\0PlayWayParameterOption\0maxValue";N;s:33:"\0PlayWayParameterOption\0playCount";i:0;}i:3;O:22:"PlayWayParameterOption":7:{s:29:"\0PlayWayParameterOption\0label";s:1:"3";s:28:"\0PlayWayParameterOption\0type";s:4:"text";s:35:"\0PlayWayParameterOption\0description";N;s:29:"\0PlayWayParameterOption\0value";s:1:"3";s:32:"\0PlayWayParameterOption\0minValue";N;s:32:"\0PlayWayParameterOption\0maxValue";N;s:33:"\0PlayWayParameterOption\0playCount";i:0;}i:4;O:22:"PlayWayParameterOption":7:{s:29:"\0PlayWayParameterOption\0label";s:1:"4";s:28:"\0PlayWayParameterOption\0type";s:4:"text";s:35:"\0PlayWayParameterOption\0description";N;s:29:"\0PlayWayParameterOption\0value";s:1:"4";s:32:"\0PlayWayParameterOption\0minValue";N;s:32:"\0PlayWayParameterOption\0maxValue";N;s:33:"\0PlayWayParameterOption\0playCount";i:0;}i:5;O:22:"PlayWayParameterOption":7:{s:29:"\0PlayWayParameterOption\0label";s:1:"5";s:28:"\0PlayWayParameterOption\0type";s:4:"text";s:35:"\0PlayWayParameterOption\0description";N;s:29:"\0PlayWayParameterOption\0value";s:1:"5";s:32:"\0PlayWayParameterOption\0minValue";N;s:32:"\0PlayWayParameterOption\0maxValue";N;s:33:"\0PlayWayParameterOption\0playCount";i:0;}i:6;O:22:"PlayWayParameterOption":7:{s:29:"\0PlayWayParameterOption\0label";s:1:"6";s:28:"\0PlayWayParameterOption\0type";s:4:"text";s:35:"\0PlayWayParameterOption\0description";N;s:29:"\0PlayWayParameterOption\0value";s:1:"6";s:32:"\0PlayWayParameterOption\0minValue";N;s:32:"\0PlayWayParameterOption\0maxValue";N;s:33:"\0PlayWayParameterOption\0playCount";i:0;}i:7;O:22:"PlayWayParameterOption":7:{s:29:"\0PlayWayParameterOption\0label";s:1:"7";s:28:"\0PlayWayParameterOption\0type";s:4:"text";s:35:"\0PlayWayParameterOption\0description";N;s:29:"\0PlayWayParameterOption\0value";s:1:"7";s:32:"\0PlayWayParameterOption\0minValue";N;s:32:"\0PlayWayParameterOption\0maxValue";N;s:33:"\0PlayWayParameterOption\0playCount";i:0;}i:8;O:22:"PlayWayParameterOption":7:{s:29:"\0PlayWayParameterOption\0label";s:1:"8";s:28:"\0PlayWayParameterOption\0type";s:4:"text";s:35:"\0PlayWayParameterOption\0description";N;s:29:"\0PlayWayParameterOption\0value";s:1:"8";s:32:"\0PlayWayParameterOption\0minValue";N;s:32:"\0PlayWayParameterOption\0maxValue";N;s:33:"\0PlayWayParameterOption\0playCount";i:0;}i:9;O:22:"PlayWayParameterOption":7:{s:29:"\0PlayWayParameterOption\0label";s:1:"9";s:28:"\0PlayWayParameterOption\0type";s:4:"text";s:35:"\0PlayWayParameterOption\0description";N;s:29:"\0PlayWayParameterOption\0value";s:1:"9";s:32:"\0PlayWayParameterOption\0minValue";N;s:32:"\0PlayWayParameterOption\0maxValue";N;s:33:"\0PlayWayParameterOption\0playCount";i:0;}}s:23:"\0PlayWayParameter\0value";N;}s:17:"\0PlayWayData\0odds";a:0:{}s:23:"\0PlayWayData\0playCounts";a:1:{i:0;i:1;}s:24:"\0PlayWayData\0playWealths";a:1:{i:0;i:1;}}}', '', 0, '发的说法', 1, 1445651604),
(6, 1, 0, 5, 7, 0.100, '明日上证指数', 1445651820, 1446254400, 2, 2, '', 1, '10.00000000', '0.00000000', '0.00000000', 'a:1:{i:7;O:11:"PlayWayData":11:{s:15:"\0PlayWayData\0id";s:1:"7";s:17:"\0PlayWayData\0name";s:18:"首位号码玩法";s:21:"\0PlayWayData\0oddsType";i:2;s:25:"\0PlayWayData\0floatPercent";d:0.80000000000000004;s:30:"\0PlayWayData\0bettingLowerLimit";i:10;s:30:"\0PlayWayData\0bettingUpperLimit";i:10;s:27:"\0PlayWayData\0playCountLimit";i:0;s:22:"\0PlayWayData\0parameter";O:16:"PlayWayParameter":5:{s:22:"\0PlayWayParameter\0name";s:2:"sd";s:23:"\0PlayWayParameter\0label";s:12:"首位号码";s:29:"\0PlayWayParameter\0description";N;s:25:"\0PlayWayParameter\0options";a:10:{i:0;O:22:"PlayWayParameterOption":7:{s:29:"\0PlayWayParameterOption\0label";s:1:"0";s:28:"\0PlayWayParameterOption\0type";s:4:"text";s:35:"\0PlayWayParameterOption\0description";N;s:29:"\0PlayWayParameterOption\0value";s:1:"0";s:32:"\0PlayWayParameterOption\0minValue";N;s:32:"\0PlayWayParameterOption\0maxValue";N;s:33:"\0PlayWayParameterOption\0playCount";i:0;}i:1;O:22:"PlayWayParameterOption":7:{s:29:"\0PlayWayParameterOption\0label";s:1:"1";s:28:"\0PlayWayParameterOption\0type";s:4:"text";s:35:"\0PlayWayParameterOption\0description";N;s:29:"\0PlayWayParameterOption\0value";s:1:"1";s:32:"\0PlayWayParameterOption\0minValue";N;s:32:"\0PlayWayParameterOption\0maxValue";N;s:33:"\0PlayWayParameterOption\0playCount";i:0;}i:2;O:22:"PlayWayParameterOption":7:{s:29:"\0PlayWayParameterOption\0label";s:1:"2";s:28:"\0PlayWayParameterOption\0type";s:4:"text";s:35:"\0PlayWayParameterOption\0description";N;s:29:"\0PlayWayParameterOption\0value";s:1:"2";s:32:"\0PlayWayParameterOption\0minValue";N;s:32:"\0PlayWayParameterOption\0maxValue";N;s:33:"\0PlayWayParameterOption\0playCount";i:0;}i:3;O:22:"PlayWayParameterOption":7:{s:29:"\0PlayWayParameterOption\0label";s:1:"3";s:28:"\0PlayWayParameterOption\0type";s:4:"text";s:35:"\0PlayWayParameterOption\0description";N;s:29:"\0PlayWayParameterOption\0value";s:1:"3";s:32:"\0PlayWayParameterOption\0minValue";N;s:32:"\0PlayWayParameterOption\0maxValue";N;s:33:"\0PlayWayParameterOption\0playCount";i:0;}i:4;O:22:"PlayWayParameterOption":7:{s:29:"\0PlayWayParameterOption\0label";s:1:"4";s:28:"\0PlayWayParameterOption\0type";s:4:"text";s:35:"\0PlayWayParameterOption\0description";N;s:29:"\0PlayWayParameterOption\0value";s:1:"4";s:32:"\0PlayWayParameterOption\0minValue";N;s:32:"\0PlayWayParameterOption\0maxValue";N;s:33:"\0PlayWayParameterOption\0playCount";i:0;}i:5;O:22:"PlayWayParameterOption":7:{s:29:"\0PlayWayParameterOption\0label";s:1:"5";s:28:"\0PlayWayParameterOption\0type";s:4:"text";s:35:"\0PlayWayParameterOption\0description";N;s:29:"\0PlayWayParameterOption\0value";s:1:"5";s:32:"\0PlayWayParameterOption\0minValue";N;s:32:"\0PlayWayParameterOption\0maxValue";N;s:33:"\0PlayWayParameterOption\0playCount";i:0;}i:6;O:22:"PlayWayParameterOption":7:{s:29:"\0PlayWayParameterOption\0label";s:1:"6";s:28:"\0PlayWayParameterOption\0type";s:4:"text";s:35:"\0PlayWayParameterOption\0description";N;s:29:"\0PlayWayParameterOption\0value";s:1:"6";s:32:"\0PlayWayParameterOption\0minValue";N;s:32:"\0PlayWayParameterOption\0maxValue";N;s:33:"\0PlayWayParameterOption\0playCount";i:0;}i:7;O:22:"PlayWayParameterOption":7:{s:29:"\0PlayWayParameterOption\0label";s:1:"7";s:28:"\0PlayWayParameterOption\0type";s:4:"text";s:35:"\0PlayWayParameterOption\0description";N;s:29:"\0PlayWayParameterOption\0value";s:1:"7";s:32:"\0PlayWayParameterOption\0minValue";N;s:32:"\0PlayWayParameterOption\0maxValue";N;s:33:"\0PlayWayParameterOption\0playCount";i:0;}i:8;O:22:"PlayWayParameterOption":7:{s:29:"\0PlayWayParameterOption\0label";s:1:"8";s:28:"\0PlayWayParameterOption\0type";s:4:"text";s:35:"\0PlayWayParameterOption\0description";N;s:29:"\0PlayWayParameterOption\0value";s:1:"8";s:32:"\0PlayWayParameterOption\0minValue";N;s:32:"\0PlayWayParameterOption\0maxValue";N;s:33:"\0PlayWayParameterOption\0playCount";i:0;}i:9;O:22:"PlayWayParameterOption":7:{s:29:"\0PlayWayParameterOption\0label";s:1:"9";s:28:"\0PlayWayParameterOption\0type";s:4:"text";s:35:"\0PlayWayParameterOption\0description";N;s:29:"\0PlayWayParameterOption\0value";s:1:"9";s:32:"\0PlayWayParameterOption\0minValue";N;s:32:"\0PlayWayParameterOption\0maxValue";N;s:33:"\0PlayWayParameterOption\0playCount";i:0;}}s:23:"\0PlayWayParameter\0value";N;}s:17:"\0PlayWayData\0odds";a:0:{}s:23:"\0PlayWayData\0playCounts";a:1:{i:4;i:1;}s:24:"\0PlayWayData\0playWealths";a:1:{i:4;i:10;}}}', '', 0, '玩法:首位号码玩法/赔率:浮动赔率/浮动比率:80%/投注下限:10/投注上限:10', 1, 1445651918),
(7, 1, 0, 6, 11, 0.100, '双色球', 1445652240, 1448847060, 1, 2, '', 1, '1.00000000', '13.00000000', '0.00000000', 'a:1:{i:4;O:11:"PlayWayData":11:{s:15:"\0PlayWayData\0id";s:1:"4";s:17:"\0PlayWayData\0name";s:12:"末位单双";s:21:"\0PlayWayData\0oddsType";i:1;s:25:"\0PlayWayData\0floatPercent";i:0;s:30:"\0PlayWayData\0bettingLowerLimit";i:0;s:30:"\0PlayWayData\0bettingUpperLimit";i:2;s:27:"\0PlayWayData\0playCountLimit";i:5;s:22:"\0PlayWayData\0parameter";O:16:"PlayWayParameter":5:{s:22:"\0PlayWayParameter\0name";s:2:"sd";s:23:"\0PlayWayParameter\0label";s:12:"末位单双";s:29:"\0PlayWayParameter\0description";N;s:25:"\0PlayWayParameter\0options";a:2:{i:1;O:22:"PlayWayParameterOption":7:{s:29:"\0PlayWayParameterOption\0label";s:6:"单数";s:28:"\0PlayWayParameterOption\0type";s:4:"text";s:35:"\0PlayWayParameterOption\0description";N;s:29:"\0PlayWayParameterOption\0value";s:1:"1";s:32:"\0PlayWayParameterOption\0minValue";N;s:32:"\0PlayWayParameterOption\0maxValue";N;s:33:"\0PlayWayParameterOption\0playCount";i:0;}i:2;O:22:"PlayWayParameterOption":7:{s:29:"\0PlayWayParameterOption\0label";s:6:"双数";s:28:"\0PlayWayParameterOption\0type";s:4:"text";s:35:"\0PlayWayParameterOption\0description";N;s:29:"\0PlayWayParameterOption\0value";s:1:"2";s:32:"\0PlayWayParameterOption\0minValue";N;s:32:"\0PlayWayParameterOption\0maxValue";N;s:33:"\0PlayWayParameterOption\0playCount";i:0;}}s:23:"\0PlayWayParameter\0value";N;}s:17:"\0PlayWayData\0odds";a:2:{i:1;d:1.1200000000000001;i:2;d:1.3400000000000001;}s:23:"\0PlayWayData\0playCounts";a:1:{i:2;i:1;}s:24:"\0PlayWayData\0playWealths";a:1:{i:2;i:1;}}}', '', 0, '玩法:末位单双/赔率:固定赔率/投注上限:2/竞猜人数上限:5 编辑 删除', 1, 1445652344),
(8, 6, 0, 6, 11, 0.100, '双色球', 1445732220, 1448847060, 1, 1, '', 3, '6.00000000', '41.52013800', '0.00000000', 'a:1:{i:4;O:11:"PlayWayData":11:{s:15:"\0PlayWayData\0id";s:1:"4";s:17:"\0PlayWayData\0name";s:12:"末位单双";s:21:"\0PlayWayData\0oddsType";i:1;s:25:"\0PlayWayData\0floatPercent";i:0;s:30:"\0PlayWayData\0bettingLowerLimit";i:0;s:30:"\0PlayWayData\0bettingUpperLimit";i:3;s:27:"\0PlayWayData\0playCountLimit";i:5;s:22:"\0PlayWayData\0parameter";O:16:"PlayWayParameter":5:{s:22:"\0PlayWayParameter\0name";s:2:"sd";s:23:"\0PlayWayParameter\0label";s:12:"末位单双";s:29:"\0PlayWayParameter\0description";N;s:25:"\0PlayWayParameter\0options";a:2:{i:1;O:22:"PlayWayParameterOption":7:{s:29:"\0PlayWayParameterOption\0label";s:6:"单数";s:28:"\0PlayWayParameterOption\0type";s:4:"text";s:35:"\0PlayWayParameterOption\0description";N;s:29:"\0PlayWayParameterOption\0value";s:1:"1";s:32:"\0PlayWayParameterOption\0minValue";N;s:32:"\0PlayWayParameterOption\0maxValue";N;s:33:"\0PlayWayParameterOption\0playCount";i:0;}i:2;O:22:"PlayWayParameterOption":7:{s:29:"\0PlayWayParameterOption\0label";s:6:"双数";s:28:"\0PlayWayParameterOption\0type";s:4:"text";s:35:"\0PlayWayParameterOption\0description";N;s:29:"\0PlayWayParameterOption\0value";s:1:"2";s:32:"\0PlayWayParameterOption\0minValue";N;s:32:"\0PlayWayParameterOption\0maxValue";N;s:33:"\0PlayWayParameterOption\0playCount";i:0;}}s:23:"\0PlayWayParameter\0value";N;}s:17:"\0PlayWayData\0odds";a:2:{i:1;d:1.0000897;i:2;d:2.7680091999999998;}s:23:"\0PlayWayData\0playCounts";a:2:{i:2;i:1;i:1;i:2;}s:24:"\0PlayWayData\0playWealths";a:2:{i:2;i:2;i:1;i:4;}}}', '', 0, '玩法:末位单双/赔率:固定赔率/投注上限:3/竞猜人数上限:5 编辑 删除', 1, 1445732296),
(9, 8, 0, 6, 11, 0.100, '双色球', 1445739480, 1448847060, 1, 1, '', 4, '5.83855411', '10.10830680', '0.00000000', 'a:1:{i:4;O:11:"PlayWayData":11:{s:15:"\0PlayWayData\0id";s:1:"4";s:17:"\0PlayWayData\0name";s:12:"末位单双";s:21:"\0PlayWayData\0oddsType";i:1;s:25:"\0PlayWayData\0floatPercent";i:0;s:30:"\0PlayWayData\0bettingLowerLimit";i:0;s:30:"\0PlayWayData\0bettingUpperLimit";i:3;s:27:"\0PlayWayData\0playCountLimit";i:3;s:22:"\0PlayWayData\0parameter";O:16:"PlayWayParameter":5:{s:22:"\0PlayWayParameter\0name";s:2:"sd";s:23:"\0PlayWayParameter\0label";s:12:"末位单双";s:29:"\0PlayWayParameter\0description";N;s:25:"\0PlayWayParameter\0options";a:2:{i:1;O:22:"PlayWayParameterOption":7:{s:29:"\0PlayWayParameterOption\0label";s:6:"单数";s:28:"\0PlayWayParameterOption\0type";s:4:"text";s:35:"\0PlayWayParameterOption\0description";N;s:29:"\0PlayWayParameterOption\0value";s:1:"1";s:32:"\0PlayWayParameterOption\0minValue";N;s:32:"\0PlayWayParameterOption\0maxValue";N;s:33:"\0PlayWayParameterOption\0playCount";i:0;}i:2;O:22:"PlayWayParameterOption":7:{s:29:"\0PlayWayParameterOption\0label";s:6:"双数";s:28:"\0PlayWayParameterOption\0type";s:4:"text";s:35:"\0PlayWayParameterOption\0description";N;s:29:"\0PlayWayParameterOption\0value";s:1:"2";s:32:"\0PlayWayParameterOption\0minValue";N;s:32:"\0PlayWayParameterOption\0maxValue";N;s:33:"\0PlayWayParameterOption\0playCount";i:0;}}s:23:"\0PlayWayParameter\0value";N;}s:17:"\0PlayWayData\0odds";a:2:{i:1;d:1.0987654;i:2;d:1.1231452;}s:23:"\0PlayWayData\0playCounts";a:2:{i:1;i:3;i:2;i:1;}s:24:"\0PlayWayData\0playWealths";a:2:{i:1;d:4.3234001099999997;i:2;d:1.5151539999999999;}}}', '', 0, '玩法:末位单双/赔率:固定赔率/投注上限:3/竞猜人数上限:3 编辑 删除', 1, 1445739575),
(10, 14, 0, 5, 7, 0.100, '明日上证指数', 1445781060, 1446254400, 2, 5, '', 0, '0.00000000', '0.00000000', '0.00000000', 'a:1:{i:4;O:11:"PlayWayData":11:{s:15:"\0PlayWayData\0id";s:1:"4";s:17:"\0PlayWayData\0name";s:12:"末位单双";s:21:"\0PlayWayData\0oddsType";i:2;s:25:"\0PlayWayData\0floatPercent";d:0.90000000000000002;s:30:"\0PlayWayData\0bettingLowerLimit";d:0.111111;s:30:"\0PlayWayData\0bettingUpperLimit";d:2.6666660000000002;s:27:"\0PlayWayData\0playCountLimit";i:0;s:22:"\0PlayWayData\0parameter";O:16:"PlayWayParameter":5:{s:22:"\0PlayWayParameter\0name";s:2:"sd";s:23:"\0PlayWayParameter\0label";s:12:"末位单双";s:29:"\0PlayWayParameter\0description";N;s:25:"\0PlayWayParameter\0options";a:2:{i:1;O:22:"PlayWayParameterOption":7:{s:29:"\0PlayWayParameterOption\0label";s:6:"单数";s:28:"\0PlayWayParameterOption\0type";s:4:"text";s:35:"\0PlayWayParameterOption\0description";N;s:29:"\0PlayWayParameterOption\0value";s:1:"1";s:32:"\0PlayWayParameterOption\0minValue";N;s:32:"\0PlayWayParameterOption\0maxValue";N;s:33:"\0PlayWayParameterOption\0playCount";i:0;}i:2;O:22:"PlayWayParameterOption":7:{s:29:"\0PlayWayParameterOption\0label";s:6:"双数";s:28:"\0PlayWayParameterOption\0type";s:4:"text";s:35:"\0PlayWayParameterOption\0description";N;s:29:"\0PlayWayParameterOption\0value";s:1:"2";s:32:"\0PlayWayParameterOption\0minValue";N;s:32:"\0PlayWayParameterOption\0maxValue";N;s:33:"\0PlayWayParameterOption\0playCount";i:0;}}s:23:"\0PlayWayParameter\0value";N;}s:17:"\0PlayWayData\0odds";a:0:{}s:23:"\0PlayWayData\0playCounts";a:0:{}s:24:"\0PlayWayData\0playWealths";a:0:{}}}', '', 0, '金币投注   BTC投注   LTC投注   DOGE投注   积分投注\r\n玩法：\r\n  添加玩法\r\n玩法:末位单双/赔率:浮动赔率/浮动比率:90%/投注下限:0.111111/投注上限:2.666666 编辑 删除', 1, 1445781146);

-- --------------------------------------------------------

--
-- 表的结构 `yyx_guess_category`
--

CREATE TABLE IF NOT EXISTS `yyx_guess_category` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '' COMMENT '名称',
  `parent_id` int(11) DEFAULT '0' COMMENT '父分类',
  `play_ways` text COMMENT '竞猜玩法ID, 多个用,分隔',
  `parameter_count` smallint(2) NOT NULL DEFAULT '1' COMMENT '竞猜点参数个数',
  `fixed_odds` tinyint(1) DEFAULT '1' COMMENT '固定赔率状态 0：禁用，1：使用，默认为1',
  `float_odds` tinyint(1) DEFAULT '1' COMMENT '浮动赔率状态 0：禁用，1：使用，默认为1',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '分类使用状态 0：禁用，1：使用，默认为1',
  `sort_num` smallint(4) DEFAULT '0' COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- 转存表中的数据 `yyx_guess_category`
--

INSERT INTO `yyx_guess_category` (`id`, `name`, `parent_id`, `play_ways`, `parameter_count`, `fixed_odds`, `float_odds`, `status`, `sort_num`) VALUES
(1, '足球', 0, '1,2,3', 3, 1, 1, 1, 0),
(2, '财经', 0, '4,5,6,7', 1, 1, 1, 1, 0),
(3, '彩票', 0, '4,5,6,7', 1, 1, 1, 1, 0),
(4, '英超', 1, NULL, 2, 1, 1, 1, 0),
(5, '西甲', 1, NULL, 2, 1, 1, 1, 0),
(6, '中超', 1, NULL, 2, 1, 1, 1, 0),
(7, '上证', 2, NULL, 1, 1, 1, 1, 0),
(8, '深成', 2, NULL, 1, 1, 1, 1, 0),
(9, '恒生', 2, NULL, 1, 1, 1, 1, 0),
(10, '22选5', 3, NULL, 1, 1, 1, 1, 0),
(11, '双色球', 3, NULL, 1, 1, 1, 1, 0),
(12, '福彩3D', 3, NULL, 1, 1, 1, 1, 3),
(13, '欧冠', 1, NULL, 2, 1, 1, 1, 0);

-- --------------------------------------------------------

--
-- 表的结构 `yyx_guess_point`
--

CREATE TABLE IF NOT EXISTS `yyx_guess_point` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `cate_id` int(11) DEFAULT '0' COMMENT '分类Id',
  `title` varchar(150) NOT NULL DEFAULT '' COMMENT '竞猜点标题',
  `guess_count` int(11) NOT NULL DEFAULT '0' COMMENT '竞猜个数',
  `play_deadline` int(10) NOT NULL COMMENT '参与竟猜截止时间',
  `params` text COMMENT '参数数组',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '竞猜点状态 0：禁用，1：使用，默认为1',
  `create_time` int(10) unsigned DEFAULT '0' COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `yyx_guess_point`
--

INSERT INTO `yyx_guess_point` (`id`, `cate_id`, `title`, `guess_count`, `play_deadline`, `params`, `status`, `create_time`) VALUES
(1, 4, 'ceshi', 1, 1444845240, 'a:3:{i:0;O:16:"PlayWayParameter":5:{s:22:"\0PlayWayParameter\0name";s:1:"c";s:23:"\0PlayWayParameter\0label";s:3:"one";s:29:"\0PlayWayParameter\0description";N;s:25:"\0PlayWayParameter\0options";a:0:{}s:23:"\0PlayWayParameter\0value";s:1:"2";}i:1;O:16:"PlayWayParameter":5:{s:22:"\0PlayWayParameter\0name";i:1;s:23:"\0PlayWayParameter\0label";s:3:"two";s:29:"\0PlayWayParameter\0description";N;s:25:"\0PlayWayParameter\0options";a:0:{}s:23:"\0PlayWayParameter\0value";s:1:"3";}i:2;O:16:"PlayWayParameter":5:{s:22:"\0PlayWayParameter\0name";i:2;s:23:"\0PlayWayParameter\0label";s:5:"three";s:29:"\0PlayWayParameter\0description";N;s:25:"\0PlayWayParameter\0options";a:0:{}s:23:"\0PlayWayParameter\0value";s:1:"0";}}', 2, 1444830936),
(2, 4, '英法', 1, 1445047680, 'a:2:{i:0;O:16:"PlayWayParameter":5:{s:22:"\0PlayWayParameter\0name";s:1:"c";s:23:"\0PlayWayParameter\0label";s:9:"英国胜";s:29:"\0PlayWayParameter\0description";N;s:25:"\0PlayWayParameter\0options";a:0:{}s:23:"\0PlayWayParameter\0value";s:1:"1";}i:1;O:16:"PlayWayParameter":5:{s:22:"\0PlayWayParameter\0name";i:1;s:23:"\0PlayWayParameter\0label";s:9:"法国胜";s:29:"\0PlayWayParameter\0description";N;s:25:"\0PlayWayParameter\0options";a:0:{}s:23:"\0PlayWayParameter\0value";s:1:"1";}}', 2, 1445039335),
(3, 5, '西甲得法', 1, 1445042280, 'a:2:{i:0;O:16:"PlayWayParameter":5:{s:22:"\0PlayWayParameter\0name";s:1:"c";s:23:"\0PlayWayParameter\0label";s:9:"德国赢";s:29:"\0PlayWayParameter\0description";N;s:25:"\0PlayWayParameter\0options";a:0:{}s:23:"\0PlayWayParameter\0value";s:1:"3";}i:1;O:16:"PlayWayParameter":5:{s:22:"\0PlayWayParameter\0name";i:1;s:23:"\0PlayWayParameter\0label";s:9:"法国赢";s:29:"\0PlayWayParameter\0description";N;s:25:"\0PlayWayParameter\0options";a:0:{}s:23:"\0PlayWayParameter\0value";s:1:"2";}}', 2, 1445039522),
(4, 5, '西甲英德', 1, 1445080620, 'a:2:{i:0;O:16:"PlayWayParameter":5:{s:22:"\0PlayWayParameter\0name";s:1:"c";s:23:"\0PlayWayParameter\0label";s:6:"英国";s:29:"\0PlayWayParameter\0description";N;s:25:"\0PlayWayParameter\0options";a:0:{}s:23:"\0PlayWayParameter\0value";s:1:"1";}i:1;O:16:"PlayWayParameter":5:{s:22:"\0PlayWayParameter\0name";i:1;s:23:"\0PlayWayParameter\0label";s:6:"德国";s:29:"\0PlayWayParameter\0description";N;s:25:"\0PlayWayParameter\0options";a:0:{}s:23:"\0PlayWayParameter\0value";s:1:"2";}}', 2, 1445080077),
(5, 7, '明日上证指数', 3, 1446256200, 'a:1:{i:0;O:16:"PlayWayParameter":5:{s:22:"\0PlayWayParameter\0name";i:0;s:23:"\0PlayWayParameter\0label";s:9:"具体值";s:29:"\0PlayWayParameter\0description";N;s:25:"\0PlayWayParameter\0options";a:0:{}s:23:"\0PlayWayParameter\0value";N;}}', 1, 1445651450),
(6, 11, '双色球', 3, 1448848860, 'a:1:{i:0;O:16:"PlayWayParameter":5:{s:22:"\0PlayWayParameter\0name";i:0;s:23:"\0PlayWayParameter\0label";s:9:"123456789";s:29:"\0PlayWayParameter\0description";N;s:25:"\0PlayWayParameter\0options";a:0:{}s:23:"\0PlayWayParameter\0value";N;}}', 1, 1445652177);

-- --------------------------------------------------------

--
-- 表的结构 `yyx_invite`
--

CREATE TABLE IF NOT EXISTS `yyx_invite` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `inviter_id` int(11) unsigned NOT NULL COMMENT '邀请人ID',
  `invitee_id` int(11) unsigned NOT NULL COMMENT '被邀请人ID',
  `recharge_percent` decimal(8,8) NOT NULL DEFAULT '0.00000000' COMMENT '邀请充值提成比例',
  `integral` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '邀请用户注册赠送积分',
  `create_time` int(11) NOT NULL DEFAULT '0' COMMENT '邀请时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `inviter_id` (`inviter_id`,`invitee_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `yyx_io`
--

CREATE TABLE IF NOT EXISTS `yyx_io` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `from_user_id` int(11) NOT NULL DEFAULT '0' COMMENT '支出人ID, 0为系统',
  `to_user_id` int(11) NOT NULL DEFAULT '0' COMMENT '收入人ID, 0为系统',
  `from_title` varchar(255) NOT NULL DEFAULT '' COMMENT '支出标题',
  `to_title` varchar(255) NOT NULL DEFAULT '' COMMENT '收入标题',
  `type` smallint(3) DEFAULT '0' COMMENT '收支类型,如充值，投资',
  `source_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '收支源ID',
  `wealth_type` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '财富类型 1为金币 2为积分',
  `wealth` decimal(14,8) NOT NULL DEFAULT '0.00000000' COMMENT '财富数',
  `tax` decimal(14,8) NOT NULL DEFAULT '0.00000000' COMMENT '税',
  `from_balance` decimal(14,8) NOT NULL DEFAULT '0.00000000' COMMENT '支出人余额',
  `to_balance` decimal(14,8) NOT NULL DEFAULT '0.00000000' COMMENT '收入人余额',
  `summary` text COMMENT '说明',
  `create_time` int(10) NOT NULL DEFAULT '0' COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=83 ;

--
-- 转存表中的数据 `yyx_io`
--

INSERT INTO `yyx_io` (`id`, `from_user_id`, `to_user_id`, `from_title`, `to_title`, `type`, `source_id`, `wealth_type`, `wealth`, `tax`, `from_balance`, `to_balance`, `summary`, `create_time`) VALUES
(1, 0, 1, '', '注册赠送', 0, 0, 2, '50.00000000', '0.00000000', '50.00000000', '0.00000000', NULL, 1444830684),
(2, 1, 0, '冻结-发布竞猜<a class=''notice_link'' href=''/guess/view/?id=1'' target=''_blank''>ceshi</a>', '', 0, 0, 2, '50.00000000', '0.00000000', '0.00000000', '0.00000000', NULL, 1444831659),
(3, 0, 1, '', '「赢0,税0,解冻50」坐庄竞猜<a class=''notice_link'' href=''/guess/view/?id=1'' target=''_blank''>ceshi</a>公布结果', 0, 0, 2, '50.00000000', '0.00000000', '0.00000000', '50.00000000', NULL, 1444919346),
(4, 1, 0, '参与竞猜<a class=''notice_link'' href=''/guess/view/?id=2'' target=''_blank''>英法</a>', '', 0, 0, 2, '1.00000000', '0.00000000', '49.00000000', '0.00000000', NULL, 1445039867),
(5, 0, 2, '', '注册赠送', 0, 0, 2, '50.00000000', '0.00000000', '50.00000000', '0.00000000', NULL, 1445039924),
(6, 2, 0, '参与竞猜<a class=''notice_link'' href=''/guess/view/?id=2'' target=''_blank''>英法</a>', '', 0, 0, 2, '2.00000000', '0.00000000', '48.00000000', '0.00000000', NULL, 1445039958),
(7, 0, 3, '', '注册赠送', 0, 0, 2, '50.00000000', '0.00000000', '50.00000000', '0.00000000', NULL, 1445040023),
(8, 3, 0, '冻结-发布竞猜<a class=''notice_link'' href=''/guess/view/?id=3'' target=''_blank''>西甲得法</a>', '', 0, 0, 2, '12.60000000', '0.00000000', '37.40000000', '0.00000000', NULL, 1445040158),
(9, 3, 0, '参与竞猜<a class=''notice_link'' href=''/guess/view/?id=2'' target=''_blank''>英法</a>', '', 0, 0, 2, '3.00000000', '0.00000000', '34.40000000', '0.00000000', NULL, 1445040212),
(10, 3, 0, '参与竞猜<a class=''notice_link'' href=''/guess/view/?id=3'' target=''_blank''>西甲得法</a>', '', 0, 0, 2, '2.00000000', '0.00000000', '32.40000000', '0.00000000', NULL, 1445040272),
(11, 2, 0, '参与竞猜<a class=''notice_link'' href=''/guess/view/?id=3'' target=''_blank''>西甲得法</a>', '', 0, 0, 2, '3.00000000', '0.00000000', '45.00000000', '0.00000000', NULL, 1445040358),
(12, 1, 0, '参与竞猜<a class=''notice_link'' href=''/guess/view/?id=3'' target=''_blank''>西甲得法</a>', '', 0, 0, 2, '3.00000000', '0.00000000', '46.00000000', '0.00000000', NULL, 1445040423),
(13, 0, 4, '', '注册赠送', 0, 0, 2, '50.00000000', '0.00000000', '50.00000000', '0.00000000', NULL, 1445040609),
(14, 4, 0, '参与竞猜<a class=''notice_link'' href=''/guess/view/?id=3'' target=''_blank''>西甲得法</a>', '', 0, 0, 2, '3.00000000', '0.00000000', '47.00000000', '0.00000000', NULL, 1445040631),
(15, 4, 0, '参与竞猜<a class=''notice_link'' href=''/guess/view/?id=2'' target=''_blank''>英法</a>', '', 0, 0, 2, '4.00000000', '0.00000000', '43.00000000', '0.00000000', NULL, 1445040671),
(16, 0, 3, '', '「输2,解冻2」竞猜<a class=''notice_link'' href=''/guess/view/?id=3'' target=''_blank''>西甲得法</a>公布结果', 0, 0, 2, '0.00000000', '0.00000000', '0.00000000', '32.40000000', NULL, 1445056277),
(17, 0, 2, '', '「输3,解冻3」竞猜<a class=''notice_link'' href=''/guess/view/?id=3'' target=''_blank''>西甲得法</a>公布结果', 0, 0, 2, '0.00000000', '0.00000000', '0.00000000', '45.00000000', NULL, 1445056277),
(18, 0, 1, '', '「输3,解冻3」竞猜<a class=''notice_link'' href=''/guess/view/?id=3'' target=''_blank''>西甲得法</a>公布结果', 0, 0, 2, '0.00000000', '0.00000000', '0.00000000', '46.00000000', NULL, 1445056277),
(19, 0, 4, '', '「赢4.2,解冻3」竞猜<a class=''notice_link'' href=''/guess/view/?id=3'' target=''_blank''>西甲得法</a>公布结果', 0, 0, 2, '7.20000000', '0.00000000', '0.00000000', '50.20000000', NULL, 1445056277),
(20, 0, 3, '', '「赢3.8,税0.38,解冻13」坐庄竞猜<a class=''notice_link'' href=''/guess/view/?id=3'' target=''_blank''>西甲得法</a>公布结果', 0, 0, 2, '16.42000000', '0.00000000', '0.00000000', '48.82000000', NULL, 1445056278),
(21, 0, 1, '', '「输1,解冻1」竞猜<a class=''notice_link'' href=''/guess/view/?id=2'' target=''_blank''>英法</a>公布结果', 0, 0, 2, '0.00000000', '0.00000000', '0.00000000', '46.00000000', NULL, 1445056294),
(22, 0, 2, '', '「输2,解冻2」竞猜<a class=''notice_link'' href=''/guess/view/?id=2'' target=''_blank''>英法</a>公布结果', 0, 0, 2, '0.00000000', '0.00000000', '0.00000000', '45.00000000', NULL, 1445056294),
(23, 0, 3, '', '「赢4.89,解冻3」竞猜<a class=''notice_link'' href=''/guess/view/?id=2'' target=''_blank''>英法</a>公布结果', 0, 0, 2, '7.89000000', '0.00000000', '0.00000000', '56.71000000', NULL, 1445056294),
(24, 0, 4, '', '「输4,解冻4」竞猜<a class=''notice_link'' href=''/guess/view/?id=2'' target=''_blank''>英法</a>公布结果', 0, 0, 2, '0.00000000', '0.00000000', '0.00000000', '50.20000000', NULL, 1445056294),
(25, 0, 1, '', '「赢2.11,税0.211,解冻0」坐庄竞猜<a class=''notice_link'' href=''/guess/view/?id=2'' target=''_blank''>英法</a>公布结果', 0, 0, 2, '1.90000000', '0.00000000', '0.00000000', '47.90000000', NULL, 1445056294),
(26, 3, 0, '冻结-发布竞猜<a class=''notice_link'' href=''/guess/view/?id=4'' target=''_blank''>西甲英德</a>', '', 0, 0, 2, '35.00000000', '0.00000000', '21.71000000', '0.00000000', NULL, 1445080270),
(27, 3, 0, '参与竞猜<a class=''notice_link'' href=''/guess/view/?id=4'' target=''_blank''>西甲英德</a>', '', 0, 0, 2, '3.00000000', '0.00000000', '18.71000000', '0.00000000', NULL, 1445080448),
(28, 1, 0, '参与竞猜<a class=''notice_link'' href=''/guess/view/?id=4'' target=''_blank''>西甲英德</a>', '', 0, 0, 2, '4.00000000', '0.00000000', '43.90000000', '0.00000000', NULL, 1445080495),
(29, 4, 0, '参与竞猜<a class=''notice_link'' href=''/guess/view/?id=4'' target=''_blank''>西甲英德</a>', '', 0, 0, 2, '5.00000000', '0.00000000', '45.20000000', '0.00000000', NULL, 1445080523),
(30, 2, 0, '参与竞猜<a class=''notice_link'' href=''/guess/view/?id=4'' target=''_blank''>西甲英德</a>', '', 0, 0, 2, '5.00000000', '0.00000000', '40.00000000', '0.00000000', NULL, 1445080558),
(31, 0, 3, '', '「输3,解冻3」竞猜<a class=''notice_link'' href=''/guess/view/?id=4'' target=''_blank''>西甲英德</a>公布结果', 0, 0, 2, '0.00000000', '0.00000000', '0.00000000', '18.71000000', NULL, 1445080706),
(32, 0, 1, '', '「输4,解冻4」竞猜<a class=''notice_link'' href=''/guess/view/?id=4'' target=''_blank''>西甲英德</a>公布结果', 0, 0, 2, '0.00000000', '0.00000000', '0.00000000', '43.90000000', NULL, 1445080706),
(33, 0, 4, '', '「输5,解冻5」竞猜<a class=''notice_link'' href=''/guess/view/?id=4'' target=''_blank''>西甲英德</a>公布结果', 0, 0, 2, '0.00000000', '0.00000000', '0.00000000', '45.20000000', NULL, 1445080706),
(34, 0, 2, '', '「赢6.5,解冻5」竞猜<a class=''notice_link'' href=''/guess/view/?id=4'' target=''_blank''>西甲英德</a>公布结果', 0, 0, 2, '11.50000000', '0.00000000', '0.00000000', '51.50000000', NULL, 1445080706),
(35, 0, 3, '', '「赢5.5,税0.55,解冻35」坐庄竞猜<a class=''notice_link'' href=''/guess/view/?id=4'' target=''_blank''>西甲英德</a>公布结果', 0, 0, 2, '39.95000000', '0.00000000', '0.00000000', '58.66000000', NULL, 1445080706),
(36, 1, 0, '参与竞猜<a class=''notice_link'' href=''/guess/view/?id=5'' target=''_blank''>明日上证指数</a>', '', 0, 0, 2, '1.00000000', '0.00000000', '42.90000000', '0.00000000', NULL, 1445651772),
(37, 1, 0, '参与竞猜<a class=''notice_link'' href=''/guess/view/?id=6'' target=''_blank''>明日上证指数</a>', '', 0, 0, 2, '10.00000000', '0.00000000', '32.90000000', '0.00000000', NULL, 1445652014),
(38, 1, 0, '冻结-发布竞猜<a class=''notice_link'' href=''/guess/view/?id=7'' target=''_blank''>双色球</a>', '', 0, 0, 2, '13.40000000', '0.00000000', '19.50000000', '0.00000000', NULL, 1445652344),
(39, 1, 0, '参与竞猜<a class=''notice_link'' href=''/guess/view/?id=7'' target=''_blank''>双色球</a>', '', 0, 0, 2, '1.00000000', '0.00000000', '18.50000000', '0.00000000', NULL, 1445652398),
(40, 0, 5, '', '注册赠送', 0, 0, 2, '50.00000000', '0.00000000', '50.00000000', '0.00000000', NULL, 1445730801),
(41, 0, 6, '', '注册赠送', 0, 0, 2, '50.00000000', '0.00000000', '50.00000000', '0.00000000', NULL, 1445731140),
(42, 0, 6, '', '注册赠送', 0, 0, 1, '50.00000000', '0.00000000', '50.00000000', '0.00000000', NULL, 1445731140),
(43, 6, 0, '冻结-发布竞猜<a class=''notice_link'' href=''/guess/view/?id=8'' target=''_blank''>双色球</a>', '', 0, 0, 1, '41.52013800', '0.00000000', '8.47986200', '0.00000000', NULL, 1445732297),
(44, 6, 0, '参与竞猜<a class=''notice_link'' href=''/guess/view/?id=8'' target=''_blank''>双色球</a>', '', 0, 0, 1, '2.00000000', '0.00000000', '6.47986200', '0.00000000', NULL, 1445732364),
(45, 0, 7, '', '注册赠送', 0, 0, 2, '50.00000000', '0.00000000', '50.00000000', '0.00000000', NULL, 1445732466),
(46, 0, 7, '', '注册赠送', 0, 0, 1, '50.00000000', '0.00000000', '50.00000000', '0.00000000', NULL, 1445732466),
(47, 7, 0, '参与竞猜<a class=''notice_link'' href=''/guess/view/?id=8'' target=''_blank''>双色球</a>', '', 0, 0, 1, '2.00000000', '0.00000000', '48.00000000', '0.00000000', NULL, 1445739153),
(48, 0, 8, '', '注册赠送', 0, 0, 2, '50.00000000', '0.00000000', '50.00000000', '0.00000000', NULL, 1445739439),
(49, 0, 8, '', '注册赠送', 0, 0, 1, '50.00000000', '0.00000000', '50.00000000', '0.00000000', NULL, 1445739439),
(50, 8, 0, '参与竞猜<a class=''notice_link'' href=''/guess/view/?id=8'' target=''_blank''>双色球</a>', '', 0, 0, 1, '2.00000000', '0.00000000', '48.00000000', '0.00000000', NULL, 1445739465),
(51, 8, 0, '冻结-发布竞猜<a class=''notice_link'' href=''/guess/view/?id=9'' target=''_blank''>双色球</a>', '', 0, 0, 1, '10.10830680', '0.00000000', '37.89169320', '0.00000000', NULL, 1445739575),
(52, 8, 0, '参与竞猜<a class=''notice_link'' href=''/guess/view/?id=9'' target=''_blank''>双色球</a>', '', 0, 0, 1, '2.19999999', '0.00000000', '35.69169321', '0.00000000', NULL, 1445741882),
(53, 6, 0, '参与竞猜<a class=''notice_link'' href=''/guess/view/?id=9'' target=''_blank''>双色球</a>', '', 0, 0, 1, '1.12340000', '0.00000000', '5.35646200', '0.00000000', NULL, 1445742224),
(54, 7, 0, '参与竞猜<a class=''notice_link'' href=''/guess/view/?id=9'' target=''_blank''>双色球</a>', '', 0, 0, 1, '1.00000012', '0.00000000', '46.99999988', '0.00000000', NULL, 1445742311),
(55, 0, 9, '', '注册赠送', 0, 0, 2, '50.00000000', '0.00000000', '50.00000000', '0.00000000', NULL, 1445766943),
(56, 0, 9, '', '注册赠送', 0, 0, 1, '50.00000000', '0.00000000', '50.00000000', '0.00000000', NULL, 1445766943),
(57, 0, 10, '', '注册赠送', 0, 0, 2, '50.00000000', '0.00000000', '50.00000000', '0.00000000', NULL, 1445773114),
(58, 0, 10, '', '注册赠送', 0, 0, 1, '50.00000000', '0.00000000', '50.00000000', '0.00000000', NULL, 1445773114),
(59, 0, 10, '', '注册赠送', 0, 0, 1, '50.00000000', '0.00000000', '50.00000000', '0.00000000', NULL, 1445773114),
(60, 0, 10, '', '注册赠送', 0, 0, 1, '50.00000000', '0.00000000', '50.00000000', '0.00000000', NULL, 1445773114),
(61, 0, 10, '', '注册赠送', 0, 0, 1, '50.00000000', '0.00000000', '50.00000000', '0.00000000', NULL, 1445773114),
(62, 0, 11, '', '注册赠送', 0, 0, 2, '50.00000000', '0.00000000', '50.00000000', '0.00000000', NULL, 1445773488),
(63, 0, 11, '', '注册赠送', 0, 0, 1, '50.00000000', '0.00000000', '50.00000000', '0.00000000', NULL, 1445773488),
(64, 0, 11, '', '注册赠送', 0, 0, 4, '50.00000000', '0.00000000', '50.00000000', '0.00000000', NULL, 1445773488),
(65, 0, 11, '', '注册赠送', 0, 0, 3, '50.00000000', '0.00000000', '50.00000000', '0.00000000', NULL, 1445773488),
(66, 0, 11, '', '注册赠送', 0, 0, 5, '50.00000000', '0.00000000', '50.00000000', '0.00000000', NULL, 1445773488),
(67, 0, 12, '', '注册赠送', 0, 0, 2, '50.00000000', '0.00000000', '50.00000000', '0.00000000', NULL, 1445779454),
(68, 0, 12, '', '注册赠送', 0, 0, 1, '50.00000000', '0.00000000', '50.00000000', '0.00000000', NULL, 1445779454),
(69, 0, 12, '', '注册赠送', 0, 0, 4, '50.00000000', '0.00000000', '50.00000000', '0.00000000', NULL, 1445779454),
(70, 0, 12, '', '注册赠送', 0, 0, 3, '50.00000000', '0.00000000', '50.00000000', '0.00000000', NULL, 1445779454),
(71, 0, 12, '', '注册赠送', 0, 0, 5, '50.00000000', '0.00000000', '50.00000000', '0.00000000', NULL, 1445779454),
(72, 0, 13, '', '注册赠送', 0, 0, 2, '50.00000000', '0.00000000', '50.00000000', '0.00000000', NULL, 1445779654),
(73, 0, 13, '', '注册赠送', 0, 0, 1, '50.00000000', '0.00000000', '50.00000000', '0.00000000', NULL, 1445779654),
(74, 0, 13, '', '注册赠送', 0, 0, 4, '50.00000000', '0.00000000', '50.00000000', '0.00000000', NULL, 1445779654),
(75, 0, 13, '', '注册赠送', 0, 0, 3, '50.00000000', '0.00000000', '50.00000000', '0.00000000', NULL, 1445779654),
(76, 0, 13, '', '注册赠送', 0, 0, 5, '50.00000000', '0.00000000', '50.00000000', '0.00000000', NULL, 1445779654),
(77, 0, 14, '', '注册赠送', 0, 0, 2, '50.00000000', '0.00000000', '50.00000000', '0.00000000', NULL, 1445780037),
(78, 0, 14, '', '注册赠送', 0, 0, 1, '50.00000000', '0.00000000', '50.00000000', '0.00000000', NULL, 1445780037),
(79, 0, 14, '', '注册赠送', 0, 0, 4, '50.00000000', '0.00000000', '50.00000000', '0.00000000', NULL, 1445780037),
(80, 0, 14, '', '注册赠送', 0, 0, 3, '50.00000000', '0.00000000', '50.00000000', '0.00000000', NULL, 1445780037),
(81, 0, 14, '', '注册赠送', 0, 0, 5, '50.00000000', '0.00000000', '50.00000000', '0.00000000', NULL, 1445780037),
(82, 9, 0, '参与竞猜<a class=''notice_link'' href=''/guess/view/?id=9'' target=''_blank''>双色球</a>', '', 0, 0, 1, '1.51515400', '0.00000000', '48.48484600', '0.00000000', NULL, 1445831080);

-- --------------------------------------------------------

--
-- 表的结构 `yyx_lottery_record`
--

CREATE TABLE IF NOT EXISTS `yyx_lottery_record` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `goods_id` int(11) unsigned NOT NULL COMMENT '商品',
  `user_id` int(11) unsigned NOT NULL COMMENT '用户',
  `count` smallint(4) DEFAULT '0' COMMENT '抽奖次数',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `yyx_makers_auth`
--

CREATE TABLE IF NOT EXISTS `yyx_makers_auth` (
  `id` int(11) unsigned NOT NULL COMMENT '用户ID',
  `title` varchar(150) NOT NULL COMMENT '认证标题',
  `summary` text COMMENT '认证说明',
  `status` tinyint(2) NOT NULL DEFAULT '0' COMMENT '认证状态，0未处理 -1拒绝 1通过',
  `create_time` int(10) NOT NULL DEFAULT '0' COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `yyx_manager`
--

CREATE TABLE IF NOT EXISTS `yyx_manager` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '' COMMENT '名称',
  `password` varchar(32) DEFAULT NULL COMMENT '密码',
  `mobile` varchar(15) DEFAULT NULL COMMENT '手机',
  `group_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '管理组ID',
  `allow_login` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否允许登陆 0：不允许 1：允许',
  `last_login_time` int(10) NOT NULL DEFAULT '0' COMMENT '上次登陆时间',
  `create_time` int(10) NOT NULL DEFAULT '0' COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `yyx_manager`
--

INSERT INTO `yyx_manager` (`id`, `name`, `password`, `mobile`, `group_id`, `allow_login`, `last_login_time`, `create_time`) VALUES
(1, 'admin', '14e1b600b1fd579f47433b88e8d85291', '', 1, 1, 1445781179, 1444830231);

-- --------------------------------------------------------

--
-- 表的结构 `yyx_manage_group`
--

CREATE TABLE IF NOT EXISTS `yyx_manage_group` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '' COMMENT '名称',
  `permissions` text COMMENT '权限 Array序列化,　用动作标识作为下标,权限值作为值;其中权限值代表(0没权限 1：读 2：写 3：读写)',
  `summary` text COMMENT '简介',
  `create_time` int(10) NOT NULL DEFAULT '0' COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `yyx_manage_group`
--

INSERT INTO `yyx_manage_group` (`id`, `name`, `permissions`, `summary`, `create_time`) VALUES
(1, '超级管理员', 'a:4:{s:18:"admin@config@index";s:2:"on";s:19:"admin@config@update";s:2:"on";s:25:"admin@emailTemplate@index";s:2:"on";s:24:"admin@emailTemplate@edit";s:2:"on";}', '超级管理员拥有所有操作的权限', 0);

-- --------------------------------------------------------

--
-- 表的结构 `yyx_menu`
--

CREATE TABLE IF NOT EXISTS `yyx_menu` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '' COMMENT '名称',
  `url` varchar(150) NOT NULL DEFAULT '' COMMENT '链接地址',
  `parent_id` int(11) DEFAULT '0' COMMENT '父菜单',
  `status` tinyint(1) DEFAULT '1' COMMENT '0：不显示，1：显示，默认为1',
  `is_system` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否为系统内置，0否1是',
  `sort_num` smallint(4) DEFAULT '0' COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- 转存表中的数据 `yyx_menu`
--

INSERT INTO `yyx_menu` (`id`, `name`, `url`, `parent_id`, `status`, `is_system`, `sort_num`) VALUES
(1, '系统管理', '/admin/config/', 0, 1, 0, 0),
(2, '系统设置', '/admin/config/', 1, 1, 0, 0),
(3, '菜单管理', '/admin/menu/', 1, 1, 0, 0),
(4, '邮件模板', '/admin/emailTemplate/', 1, 1, 0, 0),
(5, '管理员管理', '/admin/manager/', 0, 1, 0, 0),
(6, '修改密码', '/admin/password/', 5, 1, 0, 0),
(7, '管理员', '/admin/manager/', 5, 1, 0, 0),
(8, '管理组', '/admin/manageGroup/', 5, 1, 0, 0),
(9, '商城管理', '/admin/exchange/', 0, 1, 0, 0),
(10, '兑换抽奖', '/admin/exchange/', 9, 1, 0, 0),
(11, '商品管理', '/admin/goods/', 9, 1, 0, 0),
(12, '用户管理', '/admin/user/', 0, 1, 0, 0),
(13, '用户', '/admin/user/', 12, 1, 0, 0),
(14, '充值', '/admin/recharge/', 12, 1, 0, 0),
(15, '竞猜管理', '/admin/guess/', 0, 1, 0, 0),
(16, '竞猜坐庄', '/admin/guess/', 15, 1, 0, 0),
(17, '竞猜分类', '/admin/guessCategory/', 15, 1, 0, 0),
(18, '竞猜点', '/admin/guessPoint/', 15, 1, 0, 0),
(19, '竞猜玩法', '/admin/playWay/', 15, 1, 0, 0),
(20, '文章管理', '/admin/news/', 0, 1, 0, 0),
(21, '文章管理', '/admin/news/', 20, 1, 0, 0),
(22, '分类管理', '/admin/newsCategory/', 20, 1, 0, 0),
(23, '庄家认证', '/admin/makersAuth', 12, 1, 0, 0),
(24, '微博管理', '/admin/weibo/', 1, 1, 0, 0),
(25, '自定义类型', '/admin/customType/', 15, 1, 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `yyx_message`
--

CREATE TABLE IF NOT EXISTS `yyx_message` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `from_uid` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '发信人，0为系统',
  `to_uid` int(11) unsigned NOT NULL COMMENT '收信人',
  `reply_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '回复消息ID',
  `title` varchar(150) NOT NULL DEFAULT '' COMMENT '标题',
  `content` text COMMENT '消息内容',
  `new` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否是新消息',
  `from_status` tinyint(1) NOT NULL DEFAULT '2' COMMENT '发信人消息状态  2：正常 1：删除 0：彻底删除',
  `to_status` tinyint(1) NOT NULL DEFAULT '2' COMMENT '收信人消息状态  2：正常 1：删除 0：彻底删除',
  `create_time` int(10) NOT NULL DEFAULT '0' COMMENT '发信时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `yyx_news`
--

CREATE TABLE IF NOT EXISTS `yyx_news` (
  `id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(150) NOT NULL DEFAULT '' COMMENT '标题',
  `type` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '资讯类型',
  `cate_id` int(4) unsigned NOT NULL COMMENT '分类ID',
  `content` text COMMENT '内容',
  `views` int(11) NOT NULL DEFAULT '0' COMMENT '浏览数',
  `sort_num` int(11) NOT NULL DEFAULT '0' COMMENT '排序',
  `create_time` int(10) NOT NULL DEFAULT '0' COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `yyx_news_category`
--

CREATE TABLE IF NOT EXISTS `yyx_news_category` (
  `id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL DEFAULT '' COMMENT '名称',
  `type` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '分类类型',
  `sort_num` int(11) NOT NULL DEFAULT '0' COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `yyx_news_category`
--

INSERT INTO `yyx_news_category` (`id`, `name`, `type`, `sort_num`) VALUES
(1, '说明文档', 0, 0),
(2, '关于我们', 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `yyx_notice`
--

CREATE TABLE IF NOT EXISTS `yyx_notice` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `from_uid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '动作发起人 0为系统',
  `to_uid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '通知接收人',
  `type` varchar(20) NOT NULL DEFAULT '' COMMENT '通知类型',
  `new` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否是新通知',
  `notice` text NOT NULL COMMENT '通知',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '通知时间',
  `status` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '0无效/1未响应/2通过/3拒绝',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=42 ;

--
-- 转存表中的数据 `yyx_notice`
--

INSERT INTO `yyx_notice` (`id`, `from_uid`, `to_uid`, `type`, `new`, `notice`, `create_time`, `status`) VALUES
(1, 0, 1, '', 0, '欢迎你注册成为网站名称会员，系统赠送你50积分', 1444830684, 0),
(2, 0, 2, '', 1, '欢迎你注册成为网站名称会员，系统赠送你50积分', 1445039924, 0),
(3, 0, 3, '', 0, '欢迎你注册成为网站名称会员，系统赠送你50积分', 1445040023, 0),
(4, 0, 4, '', 0, '欢迎你注册成为网站名称会员，系统赠送你50积分', 1445040609, 0),
(5, 0, 1, '', 0, '你发布的竞猜<a class=''notice_link'' href=''/guess/view/?id=5'' target=''_blank''>明日上证指数</a>审核通过已发布', 1445651630, 0),
(6, 0, 1, '', 0, '你发布的竞猜<a class=''notice_link'' href=''/guess/view/?id=6'' target=''_blank''>明日上证指数</a>审核通过已发布', 1445651931, 0),
(7, 0, 1, '', 0, '你发布的竞猜<a class=''notice_link'' href=''/guess/view/?id=7'' target=''_blank''>双色球</a>审核通过已发布', 1445652365, 0),
(8, 0, 5, '', 1, '欢迎你注册成为网站名称会员，系统赠送你50积分', 1445730801, 0),
(9, 0, 6, '', 1, '欢迎你注册成为网站名称会员，系统赠送你50积分', 1445731140, 0),
(10, 0, 6, '', 1, '欢迎你注册成为网站名称会员，系统赠送你50金币', 1445731140, 0),
(11, 0, 7, '', 1, '欢迎你注册成为网站名称会员，系统赠送你50积分', 1445732466, 0),
(12, 0, 7, '', 1, '欢迎你注册成为网站名称会员，系统赠送你50金币', 1445732466, 0),
(13, 0, 8, '', 1, '欢迎你注册成为网站名称会员，系统赠送你50积分', 1445739439, 0),
(14, 0, 8, '', 1, '欢迎你注册成为网站名称会员，系统赠送你50金币', 1445739439, 0),
(15, 0, 9, '', 1, '欢迎你注册成为网站名称会员，系统赠送你50积分', 1445766943, 0),
(16, 0, 9, '', 1, '欢迎你注册成为网站名称会员，系统赠送你50金币', 1445766943, 0),
(17, 0, 10, '', 1, '欢迎你注册成为网站名称会员，系统赠送你50积分', 1445773114, 0),
(18, 0, 10, '', 1, '欢迎你注册成为网站名称会员，系统赠送你50金币', 1445773114, 0),
(19, 0, 10, '', 1, '欢迎你注册成为网站名称会员，系统赠送你50BTC', 1445773114, 0),
(20, 0, 10, '', 1, '欢迎你注册成为网站名称会员，系统赠送你50LTC', 1445773114, 0),
(21, 0, 10, '', 1, '欢迎你注册成为网站名称会员，系统赠送你50DOGE', 1445773114, 0),
(22, 0, 11, '', 1, '欢迎你注册成为网站名称会员，系统赠送你50积分', 1445773488, 0),
(23, 0, 11, '', 1, '欢迎你注册成为网站名称会员，系统赠送你50金币', 1445773488, 0),
(24, 0, 11, '', 1, '欢迎你注册成为网站名称会员，系统赠送你50BTC', 1445773488, 0),
(25, 0, 11, '', 1, '欢迎你注册成为网站名称会员，系统赠送你50LTC', 1445773488, 0),
(26, 0, 11, '', 1, '欢迎你注册成为网站名称会员，系统赠送你50DOGE', 1445773488, 0),
(27, 0, 12, '', 1, '欢迎你注册成为网站名称会员，系统赠送你50积分', 1445779454, 0),
(28, 0, 12, '', 1, '欢迎你注册成为网站名称会员，系统赠送你50金币', 1445779454, 0),
(29, 0, 12, '', 1, '欢迎你注册成为网站名称会员，系统赠送你50BTC', 1445779454, 0),
(30, 0, 12, '', 1, '欢迎你注册成为网站名称会员，系统赠送你50LTC', 1445779454, 0),
(31, 0, 12, '', 1, '欢迎你注册成为网站名称会员，系统赠送你50DOGE', 1445779454, 0),
(32, 0, 13, '', 1, '欢迎你注册成为网站名称会员，系统赠送你50积分', 1445779654, 0),
(33, 0, 13, '', 1, '欢迎你注册成为网站名称会员，系统赠送你50金币', 1445779654, 0),
(34, 0, 13, '', 1, '欢迎你注册成为网站名称会员，系统赠送你50BTC', 1445779654, 0),
(35, 0, 13, '', 1, '欢迎你注册成为网站名称会员，系统赠送你50LTC', 1445779654, 0),
(36, 0, 13, '', 1, '欢迎你注册成为网站名称会员，系统赠送你50DOGE', 1445779654, 0),
(37, 0, 14, '', 1, '欢迎你注册成为网站名称会员，系统赠送你50积分', 1445780037, 0),
(38, 0, 14, '', 1, '欢迎你注册成为网站名称会员，系统赠送你50金币', 1445780037, 0),
(39, 0, 14, '', 1, '欢迎你注册成为网站名称会员，系统赠送你50BTC', 1445780037, 0),
(40, 0, 14, '', 1, '欢迎你注册成为网站名称会员，系统赠送你50LTC', 1445780037, 0),
(41, 0, 14, '', 1, '欢迎你注册成为网站名称会员，系统赠送你50DOGE', 1445780037, 0);

-- --------------------------------------------------------

--
-- 表的结构 `yyx_password_find`
--

CREATE TABLE IF NOT EXISTS `yyx_password_find` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL COMMENT '用户ID',
  `code` varchar(32) NOT NULL COMMENT '分配码',
  `deadline` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '过期时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `yyx_play`
--

CREATE TABLE IF NOT EXISTS `yyx_play` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL COMMENT '参与用户',
  `custom` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '竟猜类型 0:系统玩法 1:自定义',
  `guess_id` int(11) unsigned NOT NULL COMMENT '参与的竞猜',
  `wealth_type` tinyint(2) unsigned NOT NULL DEFAULT '1' COMMENT '竟猜财富类型 1为金币 2为积分, 自定义竟猜见详细',
  `wealth` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '总投注',
  `win_wealth` decimal(14,8) NOT NULL DEFAULT '0.00000000' COMMENT '总赢财富',
  `play_datas` text COMMENT '竞猜数据 PlayData类型数组',
  `status` tinyint(1) unsigned DEFAULT '0' COMMENT '竞猜是否已判定 1:已判定 0:未判定',
  `create_time` int(10) unsigned DEFAULT '0' COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- 转存表中的数据 `yyx_play`
--

INSERT INTO `yyx_play` (`id`, `user_id`, `custom`, `guess_id`, `wealth_type`, `wealth`, `win_wealth`, `play_datas`, `status`, `create_time`) VALUES
(1, 1, 0, 2, 2, 1, '-1.00000000', 'a:1:{i:1;O:8:"PlayData":7:{s:19:"\0PlayData\0playWayId";s:1:"1";s:21:"\0PlayData\0playWayName";s:15:"猜胜负玩法";s:18:"\0PlayData\0oddsType";i:2;s:16:"\0PlayData\0wealth";i:1;s:16:"\0PlayData\0choose";s:1:"c";s:19:"\0PlayData\0winWealth";i:-1;s:14:"\0PlayData\0play";N;}}', 1, 1445039867),
(2, 2, 0, 2, 2, 2, '-2.00000000', 'a:1:{i:1;O:8:"PlayData":7:{s:19:"\0PlayData\0playWayId";s:1:"1";s:21:"\0PlayData\0playWayName";s:15:"猜胜负玩法";s:18:"\0PlayData\0oddsType";i:2;s:16:"\0PlayData\0wealth";i:2;s:16:"\0PlayData\0choose";s:1:"1";s:19:"\0PlayData\0winWealth";i:-2;s:14:"\0PlayData\0play";N;}}', 1, 1445039958),
(3, 3, 0, 2, 2, 3, '4.89000000', 'a:1:{i:1;O:8:"PlayData":7:{s:19:"\0PlayData\0playWayId";s:1:"1";s:21:"\0PlayData\0playWayName";s:15:"猜胜负玩法";s:18:"\0PlayData\0oddsType";i:2;s:16:"\0PlayData\0wealth";i:3;s:16:"\0PlayData\0choose";s:5:"equal";s:19:"\0PlayData\0winWealth";d:4.8899999999999997;s:14:"\0PlayData\0play";N;}}', 1, 1445040212),
(4, 3, 0, 3, 2, 2, '-2.00000000', 'a:1:{i:2;O:8:"PlayData":7:{s:19:"\0PlayData\0playWayId";s:1:"2";s:21:"\0PlayData\0playWayName";s:15:"猜总进球数";s:18:"\0PlayData\0oddsType";i:1;s:16:"\0PlayData\0wealth";i:2;s:16:"\0PlayData\0choose";s:1:"2";s:19:"\0PlayData\0winWealth";i:-2;s:14:"\0PlayData\0play";N;}}', 1, 1445040272),
(5, 2, 0, 3, 2, 3, '-3.00000000', 'a:1:{i:2;O:8:"PlayData":7:{s:19:"\0PlayData\0playWayId";s:1:"2";s:21:"\0PlayData\0playWayName";s:15:"猜总进球数";s:18:"\0PlayData\0oddsType";i:1;s:16:"\0PlayData\0wealth";i:3;s:16:"\0PlayData\0choose";s:1:"1";s:19:"\0PlayData\0winWealth";i:-3;s:14:"\0PlayData\0play";N;}}', 1, 1445040358),
(6, 1, 0, 3, 2, 3, '-3.00000000', 'a:1:{i:2;O:8:"PlayData":7:{s:19:"\0PlayData\0playWayId";s:1:"2";s:21:"\0PlayData\0playWayName";s:15:"猜总进球数";s:18:"\0PlayData\0oddsType";i:1;s:16:"\0PlayData\0wealth";i:3;s:16:"\0PlayData\0choose";s:1:"2";s:19:"\0PlayData\0winWealth";i:-3;s:14:"\0PlayData\0play";N;}}', 1, 1445040423),
(7, 4, 0, 3, 2, 3, '4.20000000', 'a:1:{i:2;O:8:"PlayData":7:{s:19:"\0PlayData\0playWayId";s:1:"2";s:21:"\0PlayData\0playWayName";s:15:"猜总进球数";s:18:"\0PlayData\0oddsType";i:1;s:16:"\0PlayData\0wealth";i:3;s:16:"\0PlayData\0choose";s:2:"4-";s:19:"\0PlayData\0winWealth";d:4.1999999999999993;s:14:"\0PlayData\0play";N;}}', 1, 1445040631),
(8, 4, 0, 2, 2, 4, '-4.00000000', 'a:1:{i:1;O:8:"PlayData":7:{s:19:"\0PlayData\0playWayId";s:1:"1";s:21:"\0PlayData\0playWayName";s:15:"猜胜负玩法";s:18:"\0PlayData\0oddsType";i:2;s:16:"\0PlayData\0wealth";i:4;s:16:"\0PlayData\0choose";s:1:"1";s:19:"\0PlayData\0winWealth";i:-4;s:14:"\0PlayData\0play";N;}}', 1, 1445040671),
(9, 3, 0, 4, 2, 3, '-3.00000000', 'a:1:{i:2;O:8:"PlayData":7:{s:19:"\0PlayData\0playWayId";s:1:"2";s:21:"\0PlayData\0playWayName";s:15:"猜总进球数";s:18:"\0PlayData\0oddsType";i:1;s:16:"\0PlayData\0wealth";i:3;s:16:"\0PlayData\0choose";s:2:"4-";s:19:"\0PlayData\0winWealth";i:-3;s:14:"\0PlayData\0play";N;}}', 1, 1445080448),
(10, 1, 0, 4, 2, 4, '-4.00000000', 'a:1:{i:2;O:8:"PlayData":7:{s:19:"\0PlayData\0playWayId";s:1:"2";s:21:"\0PlayData\0playWayName";s:15:"猜总进球数";s:18:"\0PlayData\0oddsType";i:1;s:16:"\0PlayData\0wealth";i:4;s:16:"\0PlayData\0choose";s:1:"2";s:19:"\0PlayData\0winWealth";i:-4;s:14:"\0PlayData\0play";N;}}', 1, 1445080495),
(11, 4, 0, 4, 2, 5, '-5.00000000', 'a:1:{i:2;O:8:"PlayData":7:{s:19:"\0PlayData\0playWayId";s:1:"2";s:21:"\0PlayData\0playWayName";s:15:"猜总进球数";s:18:"\0PlayData\0oddsType";i:1;s:16:"\0PlayData\0wealth";i:5;s:16:"\0PlayData\0choose";s:1:"1";s:19:"\0PlayData\0winWealth";i:-5;s:14:"\0PlayData\0play";N;}}', 1, 1445080523),
(12, 2, 0, 4, 2, 5, '6.50000000', 'a:1:{i:2;O:8:"PlayData":7:{s:19:"\0PlayData\0playWayId";s:1:"2";s:21:"\0PlayData\0playWayName";s:15:"猜总进球数";s:18:"\0PlayData\0oddsType";i:1;s:16:"\0PlayData\0wealth";i:5;s:16:"\0PlayData\0choose";s:1:"3";s:19:"\0PlayData\0winWealth";d:6.5;s:14:"\0PlayData\0play";N;}}', 1, 1445080558),
(13, 1, 0, 5, 2, 1, '0.00000000', 'a:1:{i:5;O:8:"PlayData":7:{s:19:"\0PlayData\0playWayId";s:1:"5";s:21:"\0PlayData\0playWayName";s:12:"末位号码";s:18:"\0PlayData\0oddsType";i:2;s:16:"\0PlayData\0wealth";i:1;s:16:"\0PlayData\0choose";s:1:"0";s:19:"\0PlayData\0winWealth";N;s:14:"\0PlayData\0play";N;}}', 0, 1445651772),
(14, 1, 0, 6, 2, 10, '0.00000000', 'a:1:{i:7;O:8:"PlayData":7:{s:19:"\0PlayData\0playWayId";s:1:"7";s:21:"\0PlayData\0playWayName";s:18:"首位号码玩法";s:18:"\0PlayData\0oddsType";i:2;s:16:"\0PlayData\0wealth";i:10;s:16:"\0PlayData\0choose";s:1:"4";s:19:"\0PlayData\0winWealth";N;s:14:"\0PlayData\0play";N;}}', 0, 1445652014),
(15, 1, 0, 7, 2, 1, '0.00000000', 'a:1:{i:4;O:8:"PlayData":7:{s:19:"\0PlayData\0playWayId";s:1:"4";s:21:"\0PlayData\0playWayName";s:12:"末位单双";s:18:"\0PlayData\0oddsType";i:1;s:16:"\0PlayData\0wealth";i:1;s:16:"\0PlayData\0choose";s:1:"2";s:19:"\0PlayData\0winWealth";N;s:14:"\0PlayData\0play";N;}}', 0, 1445652398),
(16, 6, 0, 8, 1, 2, '0.00000000', 'a:1:{i:4;O:8:"PlayData":7:{s:19:"\0PlayData\0playWayId";s:1:"4";s:21:"\0PlayData\0playWayName";s:12:"末位单双";s:18:"\0PlayData\0oddsType";i:1;s:16:"\0PlayData\0wealth";i:2;s:16:"\0PlayData\0choose";s:1:"2";s:19:"\0PlayData\0winWealth";N;s:14:"\0PlayData\0play";N;}}', 0, 1445732364),
(17, 7, 0, 8, 1, 2, '0.00000000', 'a:1:{i:4;O:8:"PlayData":7:{s:19:"\0PlayData\0playWayId";s:1:"4";s:21:"\0PlayData\0playWayName";s:12:"末位单双";s:18:"\0PlayData\0oddsType";i:1;s:16:"\0PlayData\0wealth";i:2;s:16:"\0PlayData\0choose";s:1:"1";s:19:"\0PlayData\0winWealth";N;s:14:"\0PlayData\0play";N;}}', 0, 1445739152),
(18, 8, 0, 8, 1, 2, '0.00000000', 'a:1:{i:4;O:8:"PlayData":7:{s:19:"\0PlayData\0playWayId";s:1:"4";s:21:"\0PlayData\0playWayName";s:12:"末位单双";s:18:"\0PlayData\0oddsType";i:1;s:16:"\0PlayData\0wealth";i:2;s:16:"\0PlayData\0choose";s:1:"1";s:19:"\0PlayData\0winWealth";N;s:14:"\0PlayData\0play";N;}}', 0, 1445739465),
(19, 8, 0, 9, 1, 2, '0.00000000', 'a:1:{i:4;O:8:"PlayData":7:{s:19:"\0PlayData\0playWayId";s:1:"4";s:21:"\0PlayData\0playWayName";s:12:"末位单双";s:18:"\0PlayData\0oddsType";i:1;s:16:"\0PlayData\0wealth";d:2.1999999899999998;s:16:"\0PlayData\0choose";s:1:"1";s:19:"\0PlayData\0winWealth";N;s:14:"\0PlayData\0play";N;}}', 0, 1445741882),
(20, 6, 0, 9, 1, 1, '0.00000000', 'a:1:{i:4;O:8:"PlayData":7:{s:19:"\0PlayData\0playWayId";s:1:"4";s:21:"\0PlayData\0playWayName";s:12:"末位单双";s:18:"\0PlayData\0oddsType";i:1;s:16:"\0PlayData\0wealth";d:1.1234;s:16:"\0PlayData\0choose";s:1:"1";s:19:"\0PlayData\0winWealth";N;s:14:"\0PlayData\0play";N;}}', 0, 1445742224),
(21, 7, 0, 9, 1, 1, '0.00000000', 'a:1:{i:4;O:8:"PlayData":7:{s:19:"\0PlayData\0playWayId";s:1:"4";s:21:"\0PlayData\0playWayName";s:12:"末位单双";s:18:"\0PlayData\0oddsType";i:1;s:16:"\0PlayData\0wealth";d:1.0000001199999999;s:16:"\0PlayData\0choose";s:1:"1";s:19:"\0PlayData\0winWealth";N;s:14:"\0PlayData\0play";N;}}', 0, 1445742311),
(22, 9, 0, 9, 1, 2, '0.00000000', 'a:1:{i:4;O:8:"PlayData":7:{s:19:"\0PlayData\0playWayId";s:1:"4";s:21:"\0PlayData\0playWayName";s:12:"末位单双";s:18:"\0PlayData\0oddsType";i:1;s:16:"\0PlayData\0wealth";d:1.5151539999999999;s:16:"\0PlayData\0choose";s:1:"2";s:19:"\0PlayData\0winWealth";N;s:14:"\0PlayData\0play";N;}}', 0, 1445831080);

-- --------------------------------------------------------

--
-- 表的结构 `yyx_play_way`
--

CREATE TABLE IF NOT EXISTS `yyx_play_way` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL DEFAULT '' COMMENT '名称',
  `class` varchar(30) NOT NULL COMMENT '玩法类名，用与区别其它玩法,用于加载玩法解析器',
  `parameter` text COMMENT '玩法参数,序列化参数类',
  `summary` text COMMENT '玩法简介',
  `news_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '玩法说明资讯ID',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '玩法使用状态 0：禁用，1：使用，默认为0，一旦开启就无法修改、删除',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `yyx_play_way`
--

INSERT INTO `yyx_play_way` (`id`, `name`, `class`, `parameter`, `summary`, `news_id`, `status`) VALUES
(1, '猜胜负玩法', 'WinOrLost', 'O:16:"PlayWayParameter":5:{s:22:"\0PlayWayParameter\0name";s:2:"vd";s:23:"\0PlayWayParameter\0label";s:6:"胜负";s:29:"\0PlayWayParameter\0description";N;s:25:"\0PlayWayParameter\0options";a:0:{}s:23:"\0PlayWayParameter\0value";N;}', '猜胜负玩法,适用于比赛类(如足球)', 1, 1),
(2, '猜总进球数', 'TotalGoal', 'O:16:"PlayWayParameter":5:{s:22:"\0PlayWayParameter\0name";s:4:"goal";s:23:"\0PlayWayParameter\0label";s:12:"总进球数";s:29:"\0PlayWayParameter\0description";N;s:25:"\0PlayWayParameter\0options";a:5:{i:0;O:22:"PlayWayParameterOption":6:{s:29:"\0PlayWayParameterOption\0label";s:4:"0球";s:28:"\0PlayWayParameterOption\0type";s:4:"text";s:35:"\0PlayWayParameterOption\0description";N;s:29:"\0PlayWayParameterOption\0value";s:1:"0";s:32:"\0PlayWayParameterOption\0minValue";N;s:32:"\0PlayWayParameterOption\0maxValue";N;}i:1;O:22:"PlayWayParameterOption":6:{s:29:"\0PlayWayParameterOption\0label";s:4:"1球";s:28:"\0PlayWayParameterOption\0type";s:4:"text";s:35:"\0PlayWayParameterOption\0description";N;s:29:"\0PlayWayParameterOption\0value";s:1:"1";s:32:"\0PlayWayParameterOption\0minValue";N;s:32:"\0PlayWayParameterOption\0maxValue";N;}i:2;O:22:"PlayWayParameterOption":6:{s:29:"\0PlayWayParameterOption\0label";s:4:"2球";s:28:"\0PlayWayParameterOption\0type";s:4:"text";s:35:"\0PlayWayParameterOption\0description";N;s:29:"\0PlayWayParameterOption\0value";s:1:"2";s:32:"\0PlayWayParameterOption\0minValue";N;s:32:"\0PlayWayParameterOption\0maxValue";N;}i:3;O:22:"PlayWayParameterOption":6:{s:29:"\0PlayWayParameterOption\0label";s:4:"3球";s:28:"\0PlayWayParameterOption\0type";s:4:"text";s:35:"\0PlayWayParameterOption\0description";N;s:29:"\0PlayWayParameterOption\0value";s:1:"3";s:32:"\0PlayWayParameterOption\0minValue";N;s:32:"\0PlayWayParameterOption\0maxValue";N;}s:2:"4-";O:22:"PlayWayParameterOption":6:{s:29:"\0PlayWayParameterOption\0label";s:10:"4球以上";s:28:"\0PlayWayParameterOption\0type";s:5:"range";s:35:"\0PlayWayParameterOption\0description";N;s:29:"\0PlayWayParameterOption\0value";s:2:"4-";s:32:"\0PlayWayParameterOption\0minValue";s:1:"4";s:32:"\0PlayWayParameterOption\0maxValue";N;}}s:23:"\0PlayWayParameter\0value";N;}', '猜总进球数玩法,适用于比赛类(如足球)', 0, 1),
(3, '猜比分', 'Score', 'O:16:"PlayWayParameter":5:{s:22:"\0PlayWayParameter\0name";s:4:"goal";s:23:"\0PlayWayParameter\0label";s:12:"总进球数";s:29:"\0PlayWayParameter\0description";N;s:25:"\0PlayWayParameter\0options";a:0:{}s:23:"\0PlayWayParameter\0value";N;}', '猜比分,适用于比赛类(如足球)', 0, 1),
(4, '末位单双', 'LastSingleOrDouble', 'O:16:"PlayWayParameter":5:{s:22:"\0PlayWayParameter\0name";s:2:"sd";s:23:"\0PlayWayParameter\0label";s:12:"末位单双";s:29:"\0PlayWayParameter\0description";N;s:25:"\0PlayWayParameter\0options";a:2:{i:1;O:22:"PlayWayParameterOption":6:{s:29:"\0PlayWayParameterOption\0label";s:6:"单数";s:28:"\0PlayWayParameterOption\0type";s:4:"text";s:35:"\0PlayWayParameterOption\0description";N;s:29:"\0PlayWayParameterOption\0value";s:1:"1";s:32:"\0PlayWayParameterOption\0minValue";N;s:32:"\0PlayWayParameterOption\0maxValue";N;}i:2;O:22:"PlayWayParameterOption":6:{s:29:"\0PlayWayParameterOption\0label";s:6:"双数";s:28:"\0PlayWayParameterOption\0type";s:4:"text";s:35:"\0PlayWayParameterOption\0description";N;s:29:"\0PlayWayParameterOption\0value";s:1:"2";s:32:"\0PlayWayParameterOption\0minValue";N;s:32:"\0PlayWayParameterOption\0maxValue";N;}}s:23:"\0PlayWayParameter\0value";N;}', '末位单双玩法,适用于财经或彩票', 0, 1),
(5, '末位号码', 'LastNumber', 'O:16:"PlayWayParameter":5:{s:22:"\0PlayWayParameter\0name";s:2:"sd";s:23:"\0PlayWayParameter\0label";s:12:"末位号码";s:29:"\0PlayWayParameter\0description";N;s:25:"\0PlayWayParameter\0options";a:10:{i:0;O:22:"PlayWayParameterOption":6:{s:29:"\0PlayWayParameterOption\0label";s:1:"0";s:28:"\0PlayWayParameterOption\0type";s:4:"text";s:35:"\0PlayWayParameterOption\0description";N;s:29:"\0PlayWayParameterOption\0value";s:1:"0";s:32:"\0PlayWayParameterOption\0minValue";N;s:32:"\0PlayWayParameterOption\0maxValue";N;}i:1;O:22:"PlayWayParameterOption":6:{s:29:"\0PlayWayParameterOption\0label";s:1:"1";s:28:"\0PlayWayParameterOption\0type";s:4:"text";s:35:"\0PlayWayParameterOption\0description";N;s:29:"\0PlayWayParameterOption\0value";s:1:"1";s:32:"\0PlayWayParameterOption\0minValue";N;s:32:"\0PlayWayParameterOption\0maxValue";N;}i:2;O:22:"PlayWayParameterOption":6:{s:29:"\0PlayWayParameterOption\0label";s:1:"2";s:28:"\0PlayWayParameterOption\0type";s:4:"text";s:35:"\0PlayWayParameterOption\0description";N;s:29:"\0PlayWayParameterOption\0value";s:1:"2";s:32:"\0PlayWayParameterOption\0minValue";N;s:32:"\0PlayWayParameterOption\0maxValue";N;}i:3;O:22:"PlayWayParameterOption":6:{s:29:"\0PlayWayParameterOption\0label";s:1:"3";s:28:"\0PlayWayParameterOption\0type";s:4:"text";s:35:"\0PlayWayParameterOption\0description";N;s:29:"\0PlayWayParameterOption\0value";s:1:"3";s:32:"\0PlayWayParameterOption\0minValue";N;s:32:"\0PlayWayParameterOption\0maxValue";N;}i:4;O:22:"PlayWayParameterOption":6:{s:29:"\0PlayWayParameterOption\0label";s:1:"4";s:28:"\0PlayWayParameterOption\0type";s:4:"text";s:35:"\0PlayWayParameterOption\0description";N;s:29:"\0PlayWayParameterOption\0value";s:1:"4";s:32:"\0PlayWayParameterOption\0minValue";N;s:32:"\0PlayWayParameterOption\0maxValue";N;}i:5;O:22:"PlayWayParameterOption":6:{s:29:"\0PlayWayParameterOption\0label";s:1:"5";s:28:"\0PlayWayParameterOption\0type";s:4:"text";s:35:"\0PlayWayParameterOption\0description";N;s:29:"\0PlayWayParameterOption\0value";s:1:"5";s:32:"\0PlayWayParameterOption\0minValue";N;s:32:"\0PlayWayParameterOption\0maxValue";N;}i:6;O:22:"PlayWayParameterOption":6:{s:29:"\0PlayWayParameterOption\0label";s:1:"6";s:28:"\0PlayWayParameterOption\0type";s:4:"text";s:35:"\0PlayWayParameterOption\0description";N;s:29:"\0PlayWayParameterOption\0value";s:1:"6";s:32:"\0PlayWayParameterOption\0minValue";N;s:32:"\0PlayWayParameterOption\0maxValue";N;}i:7;O:22:"PlayWayParameterOption":6:{s:29:"\0PlayWayParameterOption\0label";s:1:"7";s:28:"\0PlayWayParameterOption\0type";s:4:"text";s:35:"\0PlayWayParameterOption\0description";N;s:29:"\0PlayWayParameterOption\0value";s:1:"7";s:32:"\0PlayWayParameterOption\0minValue";N;s:32:"\0PlayWayParameterOption\0maxValue";N;}i:8;O:22:"PlayWayParameterOption":6:{s:29:"\0PlayWayParameterOption\0label";s:1:"8";s:28:"\0PlayWayParameterOption\0type";s:4:"text";s:35:"\0PlayWayParameterOption\0description";N;s:29:"\0PlayWayParameterOption\0value";s:1:"8";s:32:"\0PlayWayParameterOption\0minValue";N;s:32:"\0PlayWayParameterOption\0maxValue";N;}i:9;O:22:"PlayWayParameterOption":6:{s:29:"\0PlayWayParameterOption\0label";s:1:"9";s:28:"\0PlayWayParameterOption\0type";s:4:"text";s:35:"\0PlayWayParameterOption\0description";N;s:29:"\0PlayWayParameterOption\0value";s:1:"9";s:32:"\0PlayWayParameterOption\0minValue";N;s:32:"\0PlayWayParameterOption\0maxValue";N;}}s:23:"\0PlayWayParameter\0value";N;}', '末位号码玩法,适用于财经或彩票', 0, 1),
(6, '末位范围', 'LastRange', 'O:16:"PlayWayParameter":5:{s:22:"\0PlayWayParameter\0name";s:2:"sd";s:23:"\0PlayWayParameter\0label";s:12:"末位范围";s:29:"\0PlayWayParameter\0description";N;s:25:"\0PlayWayParameter\0options";a:2:{s:3:"0-4";O:22:"PlayWayParameterOption":6:{s:29:"\0PlayWayParameterOption\0label";s:3:"0-4";s:28:"\0PlayWayParameterOption\0type";s:5:"range";s:35:"\0PlayWayParameterOption\0description";N;s:29:"\0PlayWayParameterOption\0value";s:3:"0-4";s:32:"\0PlayWayParameterOption\0minValue";s:1:"0";s:32:"\0PlayWayParameterOption\0maxValue";s:1:"4";}s:3:"5-9";O:22:"PlayWayParameterOption":6:{s:29:"\0PlayWayParameterOption\0label";s:3:"5-9";s:28:"\0PlayWayParameterOption\0type";s:5:"range";s:35:"\0PlayWayParameterOption\0description";N;s:29:"\0PlayWayParameterOption\0value";s:3:"5-9";s:32:"\0PlayWayParameterOption\0minValue";s:1:"5";s:32:"\0PlayWayParameterOption\0maxValue";s:1:"9";}}s:23:"\0PlayWayParameter\0value";N;}', '末位范围玩法,适用于财经或彩票', 0, 1),
(7, '首位号码玩法', 'FirstNumber', 'O:16:"PlayWayParameter":5:{s:22:"\0PlayWayParameter\0name";s:2:"sd";s:23:"\0PlayWayParameter\0label";s:12:"首位号码";s:29:"\0PlayWayParameter\0description";N;s:25:"\0PlayWayParameter\0options";a:10:{i:0;O:22:"PlayWayParameterOption":7:{s:29:"\0PlayWayParameterOption\0label";s:1:"0";s:28:"\0PlayWayParameterOption\0type";s:4:"text";s:35:"\0PlayWayParameterOption\0description";N;s:29:"\0PlayWayParameterOption\0value";s:1:"0";s:32:"\0PlayWayParameterOption\0minValue";N;s:32:"\0PlayWayParameterOption\0maxValue";N;s:33:"\0PlayWayParameterOption\0playCount";i:0;}i:1;O:22:"PlayWayParameterOption":7:{s:29:"\0PlayWayParameterOption\0label";s:1:"1";s:28:"\0PlayWayParameterOption\0type";s:4:"text";s:35:"\0PlayWayParameterOption\0description";N;s:29:"\0PlayWayParameterOption\0value";s:1:"1";s:32:"\0PlayWayParameterOption\0minValue";N;s:32:"\0PlayWayParameterOption\0maxValue";N;s:33:"\0PlayWayParameterOption\0playCount";i:0;}i:2;O:22:"PlayWayParameterOption":7:{s:29:"\0PlayWayParameterOption\0label";s:1:"2";s:28:"\0PlayWayParameterOption\0type";s:4:"text";s:35:"\0PlayWayParameterOption\0description";N;s:29:"\0PlayWayParameterOption\0value";s:1:"2";s:32:"\0PlayWayParameterOption\0minValue";N;s:32:"\0PlayWayParameterOption\0maxValue";N;s:33:"\0PlayWayParameterOption\0playCount";i:0;}i:3;O:22:"PlayWayParameterOption":7:{s:29:"\0PlayWayParameterOption\0label";s:1:"3";s:28:"\0PlayWayParameterOption\0type";s:4:"text";s:35:"\0PlayWayParameterOption\0description";N;s:29:"\0PlayWayParameterOption\0value";s:1:"3";s:32:"\0PlayWayParameterOption\0minValue";N;s:32:"\0PlayWayParameterOption\0maxValue";N;s:33:"\0PlayWayParameterOption\0playCount";i:0;}i:4;O:22:"PlayWayParameterOption":7:{s:29:"\0PlayWayParameterOption\0label";s:1:"4";s:28:"\0PlayWayParameterOption\0type";s:4:"text";s:35:"\0PlayWayParameterOption\0description";N;s:29:"\0PlayWayParameterOption\0value";s:1:"4";s:32:"\0PlayWayParameterOption\0minValue";N;s:32:"\0PlayWayParameterOption\0maxValue";N;s:33:"\0PlayWayParameterOption\0playCount";i:0;}i:5;O:22:"PlayWayParameterOption":7:{s:29:"\0PlayWayParameterOption\0label";s:1:"5";s:28:"\0PlayWayParameterOption\0type";s:4:"text";s:35:"\0PlayWayParameterOption\0description";N;s:29:"\0PlayWayParameterOption\0value";s:1:"5";s:32:"\0PlayWayParameterOption\0minValue";N;s:32:"\0PlayWayParameterOption\0maxValue";N;s:33:"\0PlayWayParameterOption\0playCount";i:0;}i:6;O:22:"PlayWayParameterOption":7:{s:29:"\0PlayWayParameterOption\0label";s:1:"6";s:28:"\0PlayWayParameterOption\0type";s:4:"text";s:35:"\0PlayWayParameterOption\0description";N;s:29:"\0PlayWayParameterOption\0value";s:1:"6";s:32:"\0PlayWayParameterOption\0minValue";N;s:32:"\0PlayWayParameterOption\0maxValue";N;s:33:"\0PlayWayParameterOption\0playCount";i:0;}i:7;O:22:"PlayWayParameterOption":7:{s:29:"\0PlayWayParameterOption\0label";s:1:"7";s:28:"\0PlayWayParameterOption\0type";s:4:"text";s:35:"\0PlayWayParameterOption\0description";N;s:29:"\0PlayWayParameterOption\0value";s:1:"7";s:32:"\0PlayWayParameterOption\0minValue";N;s:32:"\0PlayWayParameterOption\0maxValue";N;s:33:"\0PlayWayParameterOption\0playCount";i:0;}i:8;O:22:"PlayWayParameterOption":7:{s:29:"\0PlayWayParameterOption\0label";s:1:"8";s:28:"\0PlayWayParameterOption\0type";s:4:"text";s:35:"\0PlayWayParameterOption\0description";N;s:29:"\0PlayWayParameterOption\0value";s:1:"8";s:32:"\0PlayWayParameterOption\0minValue";N;s:32:"\0PlayWayParameterOption\0maxValue";N;s:33:"\0PlayWayParameterOption\0playCount";i:0;}i:9;O:22:"PlayWayParameterOption":7:{s:29:"\0PlayWayParameterOption\0label";s:1:"9";s:28:"\0PlayWayParameterOption\0type";s:4:"text";s:35:"\0PlayWayParameterOption\0description";N;s:29:"\0PlayWayParameterOption\0value";s:1:"9";s:32:"\0PlayWayParameterOption\0minValue";N;s:32:"\0PlayWayParameterOption\0maxValue";N;s:33:"\0PlayWayParameterOption\0playCount";i:0;}}s:23:"\0PlayWayParameter\0value";N;}', '首位号码玩法,适用于财经或彩票', 0, 1);

-- --------------------------------------------------------

--
-- 表的结构 `yyx_province`
--

CREATE TABLE IF NOT EXISTS `yyx_province` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=35 ;

--
-- 转存表中的数据 `yyx_province`
--

INSERT INTO `yyx_province` (`id`, `name`) VALUES
(1, '北京市'),
(2, '天津市'),
(3, '上海市'),
(4, '重庆市'),
(5, '河北省'),
(6, '山西省'),
(7, '台湾省'),
(8, '辽宁省'),
(9, '吉林省'),
(10, '黑龙江省'),
(11, '江苏省'),
(12, '浙江省'),
(13, '安徽省'),
(14, '福建省'),
(15, '江西省'),
(16, '山东省'),
(17, '河南省'),
(18, '湖北省'),
(19, '湖南省'),
(20, '广东省'),
(21, '甘肃省'),
(22, '四川省'),
(23, '贵州省'),
(24, '海南省'),
(25, '云南省'),
(26, '青海省'),
(27, '陕西省'),
(28, '广西壮族自治区'),
(29, '西藏自治区'),
(30, '宁夏回族自治区'),
(31, '新疆维吾尔自治区'),
(32, '内蒙古自治区'),
(33, '澳门特别行政区'),
(34, '香港特别行政区');

-- --------------------------------------------------------

--
-- 表的结构 `yyx_recharge`  TODO
--

CREATE TABLE IF NOT EXISTS `yyx_recharge` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `sn` varchar(20) NOT NULL COMMENT '充值编号',
  `user_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '用户ID',
  `money` decimal(14,8) NOT NULL DEFAULT '0.00000000' COMMENT '充值的金额',
  `wealth_type` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '财富类型 1为金币 2为积分',
  `pay_type` varchar(20) NOT NULL COMMENT '支付类型, alipay:支付宝，bank:网银 offline:线下',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '充值状态 0:未支付 1：成功',
  `create_time` int(10) NOT NULL DEFAULT '0' COMMENT '注册时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;



--
-- 表的结构 `yyx_withdraw`  TODO
--

CREATE TABLE IF NOT EXISTS `yyx_withdraw` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `sn` varchar(20) NOT NULL COMMENT '提现编号',
  `user_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '用户ID',
  `money` decimal(14,8) NOT NULL DEFAULT '0.00000000' COMMENT '提现的金额',
  `address` varchar(150) NOT NULL  COMMENT '提现的金额',
  `wealth_type` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '财富类型 1为金币 2为积分',
  `pay_type` varchar(20) NOT NULL COMMENT '支付类型, alipay:支付宝，bank:网银 offline:线下',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '充值状态 0:未支付 1：成功',
  `create_time` int(10) NOT NULL DEFAULT '0' COMMENT '注册时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;


--
-- 提款 对api接口记录流水，并排重
--
CREATE TABLE IF NOT EXISTS `yyx_user_withdraw` (
	`id` int(11) unsigned NOT NULL AUTO_INCREMENT,
	`user_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '用户ID',
	`add_time` int(10) NOT NULL DEFAULT '0' COMMENT '添加时间',
	`amount` decimal(14,8) NOT NULL DEFAULT '0.00000000' COMMENT '金额',
  `wealth_type` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '财富类型 1为金币 2为积分',
	`wallet_address` varchar(50) NOT NULL COMMENT '钱包地址' ,
	`tx_address` varchar(50) NOT NULL COMMENT '钱包地址',
	`txid` varchar(200)  NOT NULL COMMENT '交易号' ,
	`tx_confirmations` int NOT NULL DEFAULT '0' COMMENT '确认次数',
	`info` varchar(100) NULL DEFAULT '' COMMENT '' ,
	`withdraw_state` int NOT NULL DEFAULT '0' COMMENT '提现状态,0: 提现中，1：成功，2：失败',
	`fee`  decimal(14,8) NOT NULL DEFAULT '0.00000000' COMMENT '手续费',
	`fee_pay` decimal(14,8) NOT NULL DEFAULT '0.00000000' COMMENT '实际支付手续费',
	`admin_user_id` int NOT NULL DEFAULT '0' COMMENT '系统账号',
	`admin_info` varchar(200) NOT NULL DEFAULT '' ,
	`admin_ipv4` varchar(20) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  index(`user_id`, `wallet_address`),
  UNIQUE KEY `txid` (`txid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
--  存款
--
CREATE TABLE IF NOT EXISTS yyx_user_deposit (
	`id` int(11) unsigned NOT NULL AUTO_INCREMENT,
	`user_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '用户ID',
	`wallet_address` varchar(50) NOT NULL COMMENT '钱包地址' ,
	`confirmations` int NOT NULL DEFAULT '0' COMMENT '确认次数',
	`amount` decimal(14,8) NOT NULL DEFAULT '0.00000000' COMMENT '金额',
  `wealth_type` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '财富类型 1为金币 2为积分',
	`txid` varchar(200)  NOT NULL COMMENT '交易号' ,
	`tx_is_ok` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '交易ok? 0: 未完成，1：完成',
	`add_time` int(10) NOT NULL DEFAULT '0' COMMENT '添加时间',
	`admin_user_id` int NOT NULL DEFAULT '0' COMMENT '系统账号',
	`admin_info` varchar(200) NOT NULL DEFAULT '' ,
	`admin_ipv4` varchar(20) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  index(`user_id`, `wallet_address`),
  UNIQUE KEY `txid` (`txid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;



CREATE TABLE IF NOT EXISTS yyx_address_multiaddrs (
	`id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '用户ID',
	`category` varchar(10) NOT NULL DEFAULT ' ' COMMENT '',
	`account` varchar(50) NOT NULL DEFAULT ' ' COMMENT '',
  `wealth_type` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '财富类型 1为金币 2为积分',
	`fee`  decimal(14,8) NOT NULL DEFAULT '0.00000000' COMMENT '手续费',
	`blockhash` varchar(200)  NOT NULL DEFAULT ' ' COMMENT '',
	`blockindex` int not NULL ,
	`m_time` int(10) NOT NULL DEFAULT '0' COMMENT '添加时间',
	`txid` varchar(200)  NOT NULL COMMENT '交易号' ,
	`blocktime` int(10) NOT NULL DEFAULT '0' COMMENT '添加时间',
	`amount` decimal(14,8) NOT NULL DEFAULT '0.00000000' COMMENT '金额',
	`confirmations` int NOT NULL DEFAULT '0' COMMENT '确认次数',
	`timereceived` bigint NOT NULL ,
	`address` varchar(150) NOT NULL DEFAULT ' ',
	`is_load` bit NOT NULL ,
	`is_exist` bit NOT NULL ,
	`info` varchar(100) NULL DEFAULT '' COMMENT '用户钱包地址表' ,
  PRIMARY KEY (`id`),
  UNIQUE KEY `address` (`address`),
  index(`account`, `txid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


--
-- 转存表中的数据 `yyx_recharge`
--

INSERT INTO `yyx_recharge` (`id`, `sn`, `user_id`, `money`, `wealth_type`, `pay_type`, `status`, `create_time`) VALUES
(1, 'RC20151017190512', 3, '30.00000000', 1, 'alipay', 0, 1445079912),
(2, 'RC20151021081547', 1, '30.00000000', 1, 'alipay', 0, 1445386547);

-- --------------------------------------------------------

--
-- 表的结构 `yyx_share`
--

CREATE TABLE IF NOT EXISTS `yyx_share` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `type` smallint(4) NOT NULL COMMENT '分享类型 1:微博',
  `user_id` int(11) NOT NULL DEFAULT '0' COMMENT '用户',
  `share_id` int(11) NOT NULL DEFAULT '0' COMMENT '分享内容ID',
  `create_time` int(10) NOT NULL DEFAULT '0' COMMENT '创建时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `type` (`type`,`user_id`,`share_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `yyx_user`
--

CREATE TABLE IF NOT EXISTS `yyx_user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '' COMMENT '名称',
  `password` varchar(32) NOT NULL DEFAULT '' COMMENT '密码',
  `email` varchar(100) NOT NULL DEFAULT '' COMMENT '邮箱',
  `nickname` varchar(50) NOT NULL DEFAULT '' COMMENT '昵称',
  `avatar` varchar(150) NOT NULL DEFAULT '' COMMENT '头像',
  `sex` tinyint(1) NOT NULL DEFAULT '1' COMMENT '性别 0:未知 1:男 2:女',
  `birthday_year` smallint(4) NOT NULL COMMENT '生日:年',
  `birthday_month` tinyint(2) NOT NULL DEFAULT '0' COMMENT '生日:月',
  `birthday_day` tinyint(2) NOT NULL DEFAULT '0' COMMENT '生日:日',
  `mobile` varchar(15) NOT NULL DEFAULT '' COMMENT '手机号码',
  `qq` varchar(15) NOT NULL DEFAULT '' COMMENT 'QQ号码',
  `province` varchar(50) DEFAULT NULL COMMENT '省份',
  `city` varchar(50) DEFAULT NULL COMMENT '城市',
  `area` varchar(50) DEFAULT NULL COMMENT '地区',
  `address` varchar(150) NOT NULL DEFAULT '' COMMENT '现居住地',
  `sign` text NOT NULL COMMENT '个性签名',
  `website` varchar(150) NOT NULL DEFAULT '' COMMENT '个性网址',
  `sina_weibo` varchar(150) NOT NULL DEFAULT '' COMMENT '新浪weibo',
  `qq_weibo` varchar(150) NOT NULL DEFAULT '' COMMENT '腾讯weibo',
  `available_money` decimal(14,8) NOT NULL DEFAULT '0.00000000' COMMENT '可用金额',
  `freeze_money` decimal(14,8) NOT NULL DEFAULT '0.00000000' COMMENT '冻结的金额',
  `available_btc` decimal(14,8) NOT NULL DEFAULT '0.00000000' COMMENT '可用比特币',
  `freeze_btc` decimal(14,8) NOT NULL DEFAULT '0.00000000' COMMENT '冻结的比特币',
  `available_ltc` decimal(14,8) NOT NULL DEFAULT '0.00000000' COMMENT '可用莱特币',
  `freeze_ltc` decimal(14,8) NOT NULL DEFAULT '0.00000000' COMMENT '冻结的莱特币',
  `available_doge` decimal(14,8) NOT NULL DEFAULT '0.00000000' COMMENT '可用狗币',
  `freeze_doge` decimal(14,8) NOT NULL DEFAULT '0.00000000' COMMENT '冻结的狗币',
  `available_integral` double(10,2) NOT NULL DEFAULT '0.00' COMMENT '可用积分',
  `freeze_integral` double(10,2) NOT NULL DEFAULT '0.00' COMMENT '冻结的积分',
  `views` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '被查看次数',
  `makers_level` tinyint(2) unsigned NOT NULL DEFAULT '0' COMMENT '庄家级别',
  `guess_add_count` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '坐庄次数',
  `guess_count` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '竞猜次数',
  `accuracy` tinyint(2) unsigned NOT NULL DEFAULT '100' COMMENT '竞猜准确率',
  `fan_count` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '粉丝次数',
  `follow_count` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '关注次数',
  `allow_login` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否允许登陆 0：不允许 1：允许',
  `last_login_time` int(10) NOT NULL DEFAULT '0' COMMENT '上次登陆时间',
  `configs` text NOT NULL COMMENT '个人设置,序列化',
  `register_time` int(10) NOT NULL DEFAULT '0' COMMENT '注册时间',
  `friend` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- 转存表中的数据 `yyx_user`
--

INSERT INTO `yyx_user` (`id`, `name`, `password`, `email`, `nickname`, `avatar`, `sex`, `birthday_year`, `birthday_month`, `birthday_day`, `mobile`, `qq`, `province`, `city`, `area`, `address`, `sign`, `website`, `sina_weibo`, `qq_weibo`, `available_money`, `freeze_money`, `available_btc`, `freeze_btc`, `available_ltc`, `freeze_ltc`, `available_doge`, `freeze_doge`, `available_integral`, `freeze_integral`, `views`, `makers_level`, `guess_add_count`, `guess_count`, `accuracy`, `fan_count`, `follow_count`, `allow_login`, `last_login_time`, `configs`, `register_time`, `friend`) VALUES
(1, 'yangjian_666', '14e1b600b1fd579f47433b88e8d85291', 'yangjian_666@qq.com', '', '', 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '0.00000000', '0.00000000', '0.00000000', '0.00000000', '0.00000000', '0.00000000', '0.00000000', '0.00000000', 18.50, 25.40, 0, 0, 5, 6, 0, 0, 0, 1, 1445777299, 'a:7:{s:10:"follow_add";s:1:"1";s:11:"guess_check";s:1:"1";s:12:"guess_result";s:1:"1";s:16:"guess_custom_end";s:1:"1";s:17:"guess_play_invite";s:1:"1";s:15:"trend_condition";s:1:"0";s:10:"trend_time";s:1:"7";}', 1444830684, ''),
(2, '123456', '14e1b600b1fd579f47433b88e8d85291', '123456@qq.com', '', '', 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '0.00000000', '0.00000000', '0.00000000', '0.00000000', '0.00000000', '0.00000000', '0.00000000', '0.00000000', 51.50, 0.00, 2, 0, 0, 3, 33, 0, 0, 1, 1445080535, 'Array', 1445039924, ''),
(3, '1234562', '14e1b600b1fd579f47433b88e8d85291', '1234562@QQ.COM', '', '', 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '0.00000000', '0.00000000', '0.00000000', '0.00000000', '0.00000000', '0.00000000', '0.00000000', '0.00000000', 58.66, -0.40, 1, 0, 2, 3, 33, 0, 0, 1, 1445079487, 'Array', 1445040023, ''),
(4, '1234563', '14e1b600b1fd579f47433b88e8d85291', '1234563@qq.com', '', '', 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '0.00000000', '0.00000000', '0.00000000', '0.00000000', '0.00000000', '0.00000000', '0.00000000', '0.00000000', 45.20, 0.00, 0, 0, 0, 3, 33, 0, 0, 1, 1445080509, 'Array', 1445040609, ''),
(5, '1234564', '14e1b600b1fd579f47433b88e8d85291', '1234564@qq.com', '', '', 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '0.00000000', '0.00000000', '0.00000000', '0.00000000', '0.00000000', '0.00000000', '0.00000000', '0.00000000', 50.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 1, 1445730801, 'Array', 1445730801, ''),
(6, '1234565', '14e1b600b1fd579f47433b88e8d85291', '1234565@qq.com', '', '', 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '5.35646200', '44.64353800', '0.00000000', '0.00000000', '0.00000000', '0.00000000', '0.00000000', '0.00000000', 50.00, 0.00, 1, 0, 1, 2, 0, 0, 0, 1, 1445742193, 'Array', 1445731140, ''),
(7, '1234566', '14e1b600b1fd579f47433b88e8d85291', '1234566@123.com', '', '', 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '46.99999988', '3.00000012', '0.00000000', '0.00000000', '0.00000000', '0.00000000', '0.00000000', '0.00000000', 50.00, 0.00, 0, 0, 0, 2, 0, 0, 0, 1, 1445742265, 'Array', 1445732466, ''),
(8, '1234567', '14e1b600b1fd579f47433b88e8d85291', '1234567@qq.com', '', '', 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '35.69169321', '14.30830679', '0.00000000', '0.00000000', '0.00000000', '0.00000000', '0.00000000', '0.00000000', 50.00, 0.00, 0, 0, 1, 2, 0, 0, 0, 1, 1445739439, 'Array', 1445739439, ''),
(9, 'qwe123456', '14e1b600b1fd579f47433b88e8d85291', '11111@qq.com', '', '', 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '48.48484600', '1.51515400', '0.00000000', '0.00000000', '0.00000000', '0.00000000', '0.00000000', '0.00000000', 50.00, 0.00, 1, 0, 0, 1, 0, 0, 0, 1, 1445830731, 'Array', 1445766943, ''),
(10, '1234568', '14e1b600b1fd579f47433b88e8d85291', '1234568@qq.com', '', '', 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '200.00000000', '0.00000000', '0.00000000', '0.00000000', '0.00000000', '0.00000000', '0.00000000', '0.00000000', 50.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 1, 1445773114, 'Array', 1445773114, ''),
(11, '1234569', '14e1b600b1fd579f47433b88e8d85291', '1234569@qq.com', '', '', 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '200.00000000', '0.00000000', '0.00000000', '0.00000000', '0.00000000', '0.00000000', '0.00000000', '0.00000000', 50.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 1, 1445773488, 'Array', 1445773488, ''),
(12, '12345610', '14e1b600b1fd579f47433b88e8d85291', '12345610@qq.com', '', '', 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '50.00000000', '0.00000000', '50.00000000', '0.00000000', '50.00000000', '0.00000000', '50.00000000', '0.00000000', 50.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 1, 1445779454, 'Array', 1445779454, ''),
(13, '12345611', '14e1b600b1fd579f47433b88e8d85291', '12345611@qq.com', '', '', 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '50.00000000', '0.00000000', '50.00000000', '0.00000000', '50.00000000', '0.00000000', '50.00000000', '0.00000000', 50.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 1, 1445779654, 'Array', 1445779654, ''),
(14, '12345612', '14e1b600b1fd579f47433b88e8d85291', '12345612@QQ.COM', '', '', 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '50.00000000', '0.00000000', '50.00000000', '0.00000000', '50.00000000', '0.00000000', '50.00000000', '0.00000000', 50.00, 0.00, 0, 0, 1, 0, 0, 0, 0, 1, 1445780037, 'Array', 1445780037, '');

-- --------------------------------------------------------

--
-- 表的结构 `yyx_user_guess`
--

CREATE TABLE IF NOT EXISTS `yyx_user_guess` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `from_uid` int(11) unsigned NOT NULL COMMENT '主动用户',
  `to_uid` int(11) unsigned NOT NULL COMMENT '被动用户',
  `guess_id` int(11) unsigned NOT NULL COMMENT '参与的竞猜',
  `type` int(1) unsigned NOT NULL DEFAULT '0' COMMENT '关系类型 1:我关注的竞猜 2:邀请我参与的竞猜',
  `create_time` int(10) unsigned DEFAULT '0' COMMENT '创建时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `to_uid` (`to_uid`,`guess_id`,`type`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `yyx_user_guess`
--

INSERT INTO `yyx_user_guess` (`id`, `from_uid`, `to_uid`, `guess_id`, `type`, `create_time`) VALUES
(1, 3, 3, 3, 1, 1445056687);

-- --------------------------------------------------------

--
-- 表的结构 `yyx_weibo`
--

CREATE TABLE IF NOT EXISTS `yyx_weibo` (
  `id` smallint(4) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '' COMMENT '名称',
  `logo` varchar(200) NOT NULL DEFAULT '' COMMENT 'logo图片',
  `type` varchar(50) DEFAULT NULL COMMENT '类型代码',
  `app_key` varchar(100) DEFAULT NULL COMMENT '应用KEY',
  `app_secret` varchar(100) DEFAULT NULL COMMENT '应用KEY',
  `url` varchar(200) NOT NULL DEFAULT '' COMMENT '链接地址',
  `sort_num` smallint(4) DEFAULT '0' COMMENT '排序',
  `status` tinyint(1) DEFAULT '1' COMMENT '0：不显示，1：显示，默认为1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `type` (`type`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `yyx_weibo`
--

INSERT INTO `yyx_weibo` (`id`, `name`, `logo`, `type`, `app_key`, `app_secret`, `url`, `sort_num`, `status`) VALUES
(1, '新浪微博', '', 'sina', '', '', 'http://www.weibo.com', 1, 1),
(2, '腾讯微博', '', 'qq', '', '', 't.qq.com', 0, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
