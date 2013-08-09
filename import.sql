-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 09, 2013 at 03:39 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cms`
--
CREATE DATABASE IF NOT EXISTS `cms` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `cms`;

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE IF NOT EXISTS `banners` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `width` int(11) DEFAULT NULL,
  `height` int(11) DEFAULT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` mediumtext COLLATE utf8_unicode_ci,
  `code` mediumtext COLLATE utf8_unicode_ci,
  `description` mediumtext COLLATE utf8_unicode_ci,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `banners_groups`
--

CREATE TABLE IF NOT EXISTS `banners_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `banner` int(11) NOT NULL,
  `name` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `poster_id` int(11) NOT NULL,
  `content` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `module` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `module_link` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'example: ID of show posts',
  `parent_id` int(11) DEFAULT NULL COMMENT 'for multilevel comments',
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `poster_id`, `content`, `module`, `module_link`, `parent_id`, `date`) VALUES
(1, 1, 'Trying to gank again, Fnatic''s gank backfired and they ended up losing Puck and Chen, with Lifestealer barely escaping thanks to Chen''s sendback, which allowed Hao''s Gyrocopter finish his Butterfly on the 27th minute.', 'posts', '2', NULL, '2013-08-08 16:27:15'),
(3, 1, 'BurNnnNNNnnNNN!!!!! Navi soon falling to tongfu, they up for revenge for ti2. Save ur shit for tommorow Dumbfck!', 'posts', '2', NULL, '2013-08-08 16:36:38'),
(4, 1, 'Trying to gank again, **safafasfasf**''s gank backfired and they ended up losing Puck and Chen, with Lifestealer barely escaping thanks to Chen''s sendback, which allowed Hao''s Gyrocopter finish his Butterfly on the 27th minute.', 'posts', '2', NULL, '2013-08-08 16:59:15'),
(5, 1, 'With Razer being our great coverage partner for The Internatinoal 2013, they sent TobiWan a brand new Naga Hex mouse which is specifically designed for MOBA (ARTS) games. Key features are the additional 6 buttons on the side which are programmable for all your hotkeys for item slots or spells and that of course in Dota 2.', 'posts', '1', NULL, '2013-08-08 17:31:48'),
(6, 1, 'Cool match', 'matches', '81', NULL, '2013-08-09 12:42:55'),
(7, 1, 'lla facilisis. Suspendisse commodo tincidunt nibh. Phasellus nulla. Integer vulputate, risus a ultricies adipiscing, enim mi tempor lorem, eget mollis lectus pede et risus. Quisque libero lacus, varius et, euismod et, co', 'matches', '115', NULL, '2013-08-09 12:56:06');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `code` char(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(80) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=251 ;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `code`, `name`) VALUES
(1, 'af', 'Afghanistan'),
(2, 'ax', 'Aland Islands'),
(3, 'al', 'Albania'),
(4, 'dz', 'Algeria'),
(5, 'as', 'American Samoa'),
(6, 'ad', 'Andorra'),
(7, 'ao', 'Angola'),
(8, 'ai', 'Anguilla'),
(9, 'aq', 'Antarctica'),
(10, 'ag', 'Antigua and Barbuda'),
(11, 'ar', 'Argentina'),
(12, 'am', 'Armenia'),
(13, 'aw', 'Aruba'),
(14, 'au', 'Australia'),
(15, 'at', 'Austria'),
(16, 'az', 'Azerbaijan'),
(17, 'bs', 'Bahamas'),
(18, 'bh', 'Bahrain'),
(19, 'bd', 'Bangladesh'),
(20, 'bb', 'Barbados'),
(21, 'by', 'Belarus'),
(22, 'be', 'Belgium'),
(23, 'bz', 'Belize'),
(24, 'bj', 'Benin'),
(25, 'bm', 'Bermuda'),
(26, 'bt', 'Bhutan'),
(27, 'bo', 'Bolivia'),
(28, 'bq', 'Bonaire, Sint Eustatius and Saba'),
(29, 'ba', 'Bosnia and Herzegovina'),
(30, 'bw', 'Botswana'),
(31, 'bv', 'Bouvet Island'),
(32, 'br', 'Brazil'),
(33, 'io', 'British Indian Ocean Territory'),
(34, 'bn', 'Brunei'),
(35, 'bg', 'Bulgaria'),
(36, 'bf', 'Burkina Faso'),
(37, 'bi', 'Burundi'),
(38, 'kh', 'Cambodia'),
(39, 'cm', 'Cameroon'),
(40, 'ca', 'Canada'),
(41, 'cv', 'Cape Verde'),
(42, 'ky', 'Cayman Islands'),
(43, 'cf', 'Central African Republic'),
(44, 'td', 'Chad'),
(45, 'cl', 'Chile'),
(46, 'cn', 'China'),
(47, 'cx', 'Christmas Island'),
(48, 'cc', 'Cocos (Keeling) Islands'),
(49, 'co', 'Colombia'),
(50, 'km', 'Comoros'),
(51, 'cg', 'Congo'),
(52, 'ck', 'Cook Islands'),
(53, 'cr', 'Costa Rica'),
(54, 'ci', 'Cote d''ivoire (Ivory Coast)'),
(55, 'hr', 'Croatia'),
(56, 'cu', 'Cuba'),
(57, 'cw', 'Curacao'),
(58, 'cy', 'Cyprus'),
(59, 'cz', 'Czech Republic'),
(60, 'cd', 'Democratic Republic of the Congo'),
(61, 'dk', 'Denmark'),
(62, 'dj', 'Djibouti'),
(63, 'dm', 'Dominica'),
(64, 'do', 'Dominican Republic'),
(65, 'ec', 'Ecuador'),
(66, 'eg', 'Egypt'),
(67, 'sv', 'El Salvador'),
(68, 'gq', 'Equatorial Guinea'),
(69, 'er', 'Eritrea'),
(70, 'ee', 'Estonia'),
(71, 'et', 'Ethiopia'),
(72, 'fk', 'Falkland Islands (Malvinas)'),
(73, 'fo', 'Faroe Islands'),
(74, 'fj', 'Fiji'),
(75, 'fi', 'Finland'),
(76, 'fr', 'France'),
(77, 'gf', 'French Guiana'),
(78, 'pf', 'French Polynesia'),
(79, 'tf', 'French Southern Territories'),
(80, 'ga', 'Gabon'),
(81, 'gm', 'Gambia'),
(82, 'ge', 'Georgia'),
(83, 'de', 'Germany'),
(84, 'gh', 'Ghana'),
(85, 'gi', 'Gibraltar'),
(86, 'gr', 'Greece'),
(87, 'gl', 'Greenland'),
(88, 'gd', 'Grenada'),
(89, 'gp', 'Guadaloupe'),
(90, 'gu', 'Guam'),
(91, 'gt', 'Guatemala'),
(92, 'gg', 'Guernsey'),
(93, 'gn', 'Guinea'),
(94, 'gw', 'Guinea-Bissau'),
(95, 'gy', 'Guyana'),
(96, 'ht', 'Haiti'),
(97, 'hm', 'Heard Island and McDonald Islands'),
(98, 'hn', 'Honduras'),
(99, 'hk', 'Hong Kong'),
(100, 'hu', 'Hungary'),
(101, 'is', 'Iceland'),
(102, 'in', 'India'),
(103, 'id', 'Indonesia'),
(104, 'ir', 'Iran'),
(105, 'iq', 'Iraq'),
(106, 'ie', 'Ireland'),
(107, 'im', 'Isle of Man'),
(108, 'il', 'Israel'),
(109, 'it', 'Italy'),
(110, 'jm', 'Jamaica'),
(111, 'jp', 'Japan'),
(112, 'je', 'Jersey'),
(113, 'jo', 'Jordan'),
(114, 'kz', 'Kazakhstan'),
(115, 'ke', 'Kenya'),
(116, 'ki', 'Kiribati'),
(117, 'xk', 'Kosovo'),
(118, 'kw', 'Kuwait'),
(119, 'kg', 'Kyrgyzstan'),
(120, 'la', 'Laos'),
(121, 'lv', 'Latvia'),
(122, 'lb', 'Lebanon'),
(123, 'ls', 'Lesotho'),
(124, 'lr', 'Liberia'),
(125, 'ly', 'Libya'),
(126, 'li', 'Liechtenstein'),
(127, 'lt', 'Lithuania'),
(128, 'lu', 'Luxembourg'),
(129, 'mo', 'Macao'),
(130, 'mk', 'Macedonia'),
(131, 'mg', 'Madagascar'),
(132, 'mw', 'Malawi'),
(133, 'my', 'Malaysia'),
(134, 'mv', 'Maldives'),
(135, 'ml', 'Mali'),
(136, 'mt', 'Malta'),
(137, 'mh', 'Marshall Islands'),
(138, 'mq', 'Martinique'),
(139, 'mr', 'Mauritania'),
(140, 'mu', 'Mauritius'),
(141, 'yt', 'Mayotte'),
(142, 'mx', 'Mexico'),
(143, 'fm', 'Micronesia'),
(144, 'md', 'Moldava'),
(145, 'mc', 'Monaco'),
(146, 'mn', 'Mongolia'),
(147, 'me', 'Montenegro'),
(148, 'ms', 'Montserrat'),
(149, 'ma', 'Morocco'),
(150, 'mz', 'Mozambique'),
(151, 'mm', 'Myanmar (Burma)'),
(152, 'na', 'Namibia'),
(153, 'nr', 'Nauru'),
(154, 'np', 'Nepal'),
(155, 'nl', 'Netherlands'),
(156, 'nc', 'New Caledonia'),
(157, 'nz', 'New Zealand'),
(158, 'ni', 'Nicaragua'),
(159, 'ne', 'Niger'),
(160, 'ng', 'Nigeria'),
(161, 'nu', 'Niue'),
(162, 'nf', 'Norfolk Island'),
(163, 'kp', 'North Korea'),
(164, 'mp', 'Northern Mariana Islands'),
(165, 'no', 'Norway'),
(166, 'om', 'Oman'),
(167, 'pk', 'Pakistan'),
(168, 'pw', 'Palau'),
(169, 'ps', 'Palestine'),
(170, 'pa', 'Panama'),
(171, 'pg', 'Papua New Guinea'),
(172, 'py', 'Paraguay'),
(173, 'pe', 'Peru'),
(174, 'ph', 'Phillipines'),
(175, 'pn', 'Pitcairn'),
(176, 'pl', 'Poland'),
(177, 'pt', 'Portugal'),
(178, 'pr', 'Puerto Rico'),
(179, 'qa', 'Qatar'),
(180, 're', 'Reunion'),
(181, 'ro', 'Romania'),
(182, 'ru', 'Russia'),
(183, 'rw', 'Rwanda'),
(184, 'bl', 'Saint Barthelemy'),
(185, 'sh', 'Saint Helena'),
(186, 'kn', 'Saint Kitts and Nevis'),
(187, 'lc', 'Saint Lucia'),
(188, 'mf', 'Saint Martin'),
(189, 'pm', 'Saint Pierre and Miquelon'),
(190, 'vc', 'Saint Vincent and the Grenadines'),
(191, 'ws', 'Samoa'),
(192, 'sm', 'San Marino'),
(193, 'st', 'Sao Tome and Principe'),
(194, 'sa', 'Saudi Arabia'),
(195, 'sn', 'Senegal'),
(196, 'rs', 'Serbia'),
(197, 'sc', 'Seychelles'),
(198, 'sl', 'Sierra Leone'),
(199, 'sg', 'Singapore'),
(200, 'sx', 'Sint Maarten'),
(201, 'sk', 'Slovakia'),
(202, 'si', 'Slovenia'),
(203, 'sb', 'Solomon Islands'),
(204, 'so', 'Somalia'),
(205, 'za', 'South Africa'),
(206, 'gs', 'South Georgia and the South Sandwich Islands'),
(207, 'kr', 'South Korea'),
(208, 'ss', 'South Sudan'),
(209, 'es', 'Spain'),
(210, 'lk', 'Sri Lanka'),
(211, 'sd', 'Sudan'),
(212, 'sr', 'Suriname'),
(213, 'sj', 'Svalbard and Jan Mayen'),
(214, 'sz', 'Swaziland'),
(215, 'se', 'Sweden'),
(216, 'ch', 'Switzerland'),
(217, 'sy', 'Syria'),
(218, 'tw', 'Taiwan'),
(219, 'tj', 'Tajikistan'),
(220, 'tz', 'Tanzania'),
(221, 'th', 'Thailand'),
(222, 'tl', 'Timor-Leste (East Timor)'),
(223, 'tg', 'Togo'),
(224, 'tk', 'Tokelau'),
(225, 'to', 'Tonga'),
(226, 'tt', 'Trinidad and Tobago'),
(227, 'tn', 'Tunisia'),
(228, 'tr', 'Turkey'),
(229, 'tm', 'Turkmenistan'),
(230, 'tc', 'Turks and Caicos Islands'),
(231, 'tv', 'Tuvalu'),
(232, 'ug', 'Uganda'),
(233, 'ua', 'Ukraine'),
(234, 'ae', 'United Arab Emirates'),
(235, 'gb', 'United Kingdom'),
(236, 'us', 'United States'),
(237, 'um', 'United States Minor Outlying Islands'),
(238, 'uy', 'Uruguay'),
(239, 'uz', 'Uzbekistan'),
(240, 'vu', 'Vanuatu'),
(241, 'va', 'Vatican City'),
(242, 've', 'Venezuela'),
(243, 'vn', 'Vietnam'),
(244, 'vg', 'Virgin Islands, British'),
(245, 'vi', 'Virgin Islands, US'),
(246, 'wf', 'Wallis and Futuna'),
(247, 'eh', 'Western Sahara'),
(248, 'ye', 'Yemen'),
(249, 'zm', 'Zambia'),
(250, 'zw', 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `startdate` datetime NOT NULL,
  `enddate` datetime NOT NULL,
  `image` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `name`, `startdate`, `enddate`, `image`, `link`, `description`) VALUES
(1, 'Eventic', '2013-08-13 00:40:00', '2013-08-30 00:50:00', NULL, '', 'List of Teams'' home regions where management or team houses reside, and where their Players are actively playing on a regular basis. ');

-- --------------------------------------------------------

--
-- Table structure for table `forum_forums`
--

CREATE TABLE IF NOT EXISTS `forum_forums` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` datetime NOT NULL,
  `private` int(11) NOT NULL DEFAULT '0',
  `clan` int(11) NOT NULL DEFAULT '0',
  `sort` int(11) DEFAULT NULL,
  `slug` varchar(35) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `forum_forums`
--

INSERT INTO `forum_forums` (`id`, `label`, `name`, `description`, `date`, `private`, `clan`, `sort`, `slug`) VALUES
(1, 5, 'Stuff in forum', '', '2013-08-09 14:49:22', 0, 0, NULL, '1-stuff-in-forum'),
(2, 5, 'Cool tinh', '', '2013-08-09 14:49:32', 0, 0, NULL, '2-cool-tinh');

-- --------------------------------------------------------

--
-- Table structure for table `forum_moderators`
--

CREATE TABLE IF NOT EXISTS `forum_moderators` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `forum` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `forum_replies`
--

CREATE TABLE IF NOT EXISTS `forum_replies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `topic` int(11) NOT NULL,
  `poster` int(11) NOT NULL,
  `content` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Table structure for table `forum_topics`
--

CREATE TABLE IF NOT EXISTS `forum_topics` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `forum` int(11) NOT NULL,
  `author` int(11) NOT NULL,
  `title` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `sticky` int(1) DEFAULT NULL,
  `content` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `views` int(11) DEFAULT '0',
  `locked` int(11) NOT NULL DEFAULT '0',
  `last_modified` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `forum_topics`
--

INSERT INTO `forum_topics` (`id`, `forum`, `author`, `title`, `date`, `sticky`, `content`, `views`, `locked`, `last_modified`) VALUES
(2, 1, 1, 'safasgasg', '2013-08-09 14:51:11', 0, 'Ah the humble module! A good many designs these days make use of modules in the content-y and app-y sites alike. A chunk of information, an advertisement, a grouped set of functionality... could be anything. The fact that they likely have visual similarity yet can contain anything leads to an interesting CSS challenge: how do you pad the inside consistently?', 0, 0, '2013-08-09'),
(3, 1, 1, 'Sticky', '2013-08-09 15:23:57', 1, 'agasg', 1, 0, '2013-08-09');

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE IF NOT EXISTS `galleries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8_unicode_ci,
  `date` datetime NOT NULL,
  `access` enum('public','private','clan') COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `galleries_files`
--

CREATE TABLE IF NOT EXISTS `galleries_files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gallery` int(11) NOT NULL,
  `file` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE IF NOT EXISTS `games` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `shortcode` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `icon` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `shortcode` (`shortcode`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=40 ;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`id`, `name`, `shortcode`, `icon`) VALUES
(1, 'Battlefield 2142', '2142', '2142.gif'),
(2, 'Call of Duty 4: Modern Warfare', 'cod4', 'cod4.gif'),
(3, 'Battlefield 2', 'bf2', 'bf2.gif'),
(4, 'Battlefield Heroes', 'bfh', 'bfh.gif'),
(5, 'Battlefield Vietnam', 'bfv', 'bfv.gif'),
(6, 'Counter Strike 1.6', 'cs16', 'cs16.gif'),
(7, 'Counter Strike Source', 'css', 'css.gif'),
(8, 'Counter Strike Condition Zero', 'cscz', 'cscz.gif'),
(9, 'DotA', 'dota', 'dota.gif'),
(10, 'DotA 2', 'dta2', 'dta2.gif'),
(11, 'League of Legends', 'lol', 'lol.gif'),
(12, 'Heroes of Newerth', 'hon', 'hon.gif'),
(14, 'Team Fortress 2', 'tf2', 'tf2.gif'),
(15, 'Call of Duty 2', 'cod2', 'cod2.gif'),
(18, 'Warcraft III', 'wc3', 'wc3.gif'),
(19, 'Warcraft III: The Frozen Throne', 'tft', 'tft.gif'),
(20, 'Left 4 Dead', 'l4d', 'l4d.gif'),
(21, 'Unreal Tournament 3', 'ut3', 'ut.gif'),
(22, 'Crysis Wars', 'cryw', 'cryw.gif'),
(23, 'Crysis', 'crys', 'crys.gif'),
(24, 'Dawn of War II', 'dow2', 'dow2.gif'),
(25, 'Day of Defeat Source', 'dods', 'dods.gif'),
(26, 'Call of Duty: World at War', 'codw', 'codw.gif'),
(27, 'Trackmania', 'tm', 'tm.gif'),
(29, 'Enemy Territory: Quake Wars', 'etqw', 'etqw.gif'),
(30, 'Quake Live', 'ql', 'ql.gif'),
(31, 'Unreal Tournament 2004', 'ut24', 'ut24.gif'),
(32, 'Fifa', 'fifa', 'fifa.gif'),
(33, 'Battlefield Bad Company 2', 'bfbc', 'bfbc.gif'),
(34, 'Starcraft II', 'sc2', 'sc2.gif'),
(35, 'Call of Duty: Black Ops', 'cdbo', 'cdbo.gif'),
(36, 'Americas Army', 'aa', 'aa.gif'),
(37, 'Left 4 Dead 2', 'l4d2', 'l4d2.gif'),
(38, 'Quake 3', 'q3', 'q3.gif'),
(39, 'Counter Strike: Global Offensive', 'csgo', 'csgo.gif');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `permissionID` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`, `permissionID`) VALUES
(1, 'admin', 'Administrator', 0),
(2, 'members', 'General User', 0),
(3, 'clan', 'Clan members', 0),
(4, 'Thrifters', '', 0),
(5, 'Dodatna', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `groups_access`
--

CREATE TABLE IF NOT EXISTS `groups_access` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL,
  `module_id` int(11) NOT NULL,
  `public_rule` enum('allow','deny') COLLATE utf8_unicode_ci NOT NULL,
  `admin_rule` enum('allow','deny') COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=29 ;

--
-- Dumping data for table `groups_access`
--

INSERT INTO `groups_access` (`id`, `group_id`, `module_id`, `public_rule`, `admin_rule`) VALUES
(1, 4, 1, 'allow', 'allow'),
(2, 4, 2, 'allow', 'allow'),
(3, 4, 3, 'allow', 'deny'),
(4, 4, 4, 'allow', 'deny'),
(5, 4, 5, 'allow', 'deny'),
(6, 4, 6, 'allow', 'deny'),
(7, 4, 7, 'allow', 'deny'),
(8, 4, 8, 'allow', 'deny'),
(9, 4, 9, 'allow', 'deny'),
(10, 4, 10, 'allow', 'deny'),
(11, 4, 11, 'allow', 'deny'),
(12, 4, 12, 'allow', 'deny'),
(13, 4, 13, 'allow', 'deny'),
(14, 4, 14, 'allow', 'deny'),
(15, 4, 15, 'allow', 'deny'),
(16, 4, 16, 'allow', 'deny'),
(17, 4, 17, 'allow', 'deny'),
(18, 4, 18, 'allow', 'deny'),
(19, 4, 19, 'allow', 'deny'),
(20, 4, 20, 'allow', 'deny'),
(21, 4, 21, 'allow', 'deny'),
(22, 4, 22, 'allow', 'deny'),
(23, 4, 23, 'allow', 'deny'),
(24, 4, 24, 'allow', 'deny'),
(25, 4, 25, 'allow', 'deny'),
(26, 4, 26, 'allow', 'deny'),
(27, 4, 27, 'allow', 'deny'),
(28, 5, 1, 'allow', 'deny');

-- --------------------------------------------------------

--
-- Table structure for table `labels`
--

CREATE TABLE IF NOT EXISTS `labels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `banner` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `labels`
--

INSERT INTO `labels` (`id`, `name`, `description`, `banner`) VALUES
(3, 'Stuff', '', NULL),
(5, 'Forum', '', NULL),
(6, 'Forum General', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE IF NOT EXISTS `login_attempts` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varbinary(16) NOT NULL,
  `login` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `matches`
--

CREATE TABLE IF NOT EXISTS `matches` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `team` int(11) NOT NULL,
  `opponent` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `game` int(11) NOT NULL,
  `report` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(2) NOT NULL,
  `opponent-players` mediumtext COLLATE utf8_unicode_ci,
  `team-players` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `matchlink` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `type` tinyint(1) DEFAULT NULL,
  `event` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=118 ;

--
-- Dumping data for table `matches`
--

INSERT INTO `matches` (`id`, `team`, `opponent`, `date`, `game`, `report`, `status`, `opponent-players`, `team-players`, `matchlink`, `type`, `event`) VALUES
(2, 1, 1, '2013-08-12 01:00:00', 10, '<p>Report content</p>', 0, '', '2,3,1,7', '', 0, 0),
(3, 1, 2, '2013-08-04 00:20:00', 3, '<p>Report content</p>', 0, '', '3,2,1,7', '', 0, 0),
(4, 2, 1, '2013-08-06 00:50:00', 23, '<p>Report content</p>', 0, '', '7,5,2,3', '', 0, 0),
(5, 3, 1, '2013-07-15 00:30:00', 3, '<p>Report content</p>', 0, '', '2,3,4,7', '', 0, 0),
(7, 2, 5, '2013-10-11 00:30:00', 3, '<p>Report content</p>', 0, '', '2,5,3,7', '', 0, 0),
(8, 2, 4, '2013-08-13 00:50:00', 4, '<p>Report content</p>', 0, '', '', '', 0, 0),
(9, 3, 5, '2013-09-21 03:30:00', 7, '<p>Report content</p>', 0, '', '', '', 0, 0),
(10, 2, 17, '2013-09-30 01:00:00', 5, '<p>Report content</p>', 0, '', '', '', 0, 0),
(12, 2, 4, '2013-01-02 00:50:00', 3, '<p>Report content</p>', 0, '', '', '', 0, 0),
(13, 2, 4, '2013-01-03 00:40:00', 4, '<p>Report content</p>', 0, '', '', '', 0, 0),
(14, 3, 4, '2013-02-20 00:30:00', 21, '<p>Report content</p>', 0, '', '', '', 0, 0),
(16, 1, 6, '2013-11-14 01:00:00', 4, '<p>Report content</p>', 0, '', '3,2,7,1', '', 0, 0),
(17, 3, 5, '2013-04-12 01:56:16', 10, 'mollis dui, in sodales elit erat vitae risus. Duis a mi fringilla mi lacinia mattis. Integer eu lacus. Quisque imperdiet, erat nonummy ultricies ornare, elit elit fermentum risus, at fringilla purus mauris', 0, NULL, '', '', NULL, 0),
(18, 2, 4, '2013-03-25 02:09:33', 6, 'justo sit amet nulla. Donec non justo. Proin non massa non ante bibendum ullamcorper. Duis cursus, diam at pretium aliquet, metus urna convallis erat, eget tincidunt dui augue eu tellus. Phasellus elit pede, malesuada vel, venenatis vel, faucibus id, libero. Donec consectetuer mauris id sapien. Cras dolor dolor, tempus non, lacinia at, iaculis quis, pede. Praesent eu dui. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean eget magna. Suspendisse tristique neque venenatis lacus. Etiam bibendum fermentum metus. Aenean sed pede nec ante blandit viverra. Donec tempus, lorem fringilla ornare placerat, orci lacus', 0, NULL, '', '', NULL, 0),
(19, 3, 7, '2013-07-12 13:22:06', 3, 'quis lectus. Nullam suscipit, est ac facilisis facilisis, magna tellus faucibus leo, in lobortis tellus justo', 0, NULL, '', '', NULL, 0),
(20, 1, 15, '2013-11-02 02:27:11', 2, 'dictum augue malesuada malesuada. Integer id magna et ipsum cursus vestibulum. Mauris magna. Duis dignissim tempor arcu. Vestibulum ut eros non enim commodo hendrerit. Donec porttitor tellus non magna. Nam ligula elit, pretium et, rutrum non, hendrerit id, ante. Nunc mauris sapien, cursus in, hendrerit consectetuer, cursus', 0, NULL, '', '', NULL, 0),
(21, 3, 3, '2013-04-20 05:33:59', 5, 'hendrerit. Donec porttitor tellus non magna. Nam ligula elit, pretium et, rutrum', 0, NULL, '', '', NULL, 0),
(22, 3, 15, '2013-01-20 04:10:19', 2, 'nascetur ridiculus mus. Proin vel arcu eu odio tristique pharetra. Quisque ac libero nec ligula consectetuer rhoncus. Nullam velit dui, semper et, lacinia vitae, sodales at, velit. Pellentesque ultricies dignissim lacus. Aliquam rutrum lorem ac risus. Morbi metus. Vivamus euismod urna. Nullam lobortis quam a felis ullamcorper viverra. Maecenas iaculis aliquet diam. Sed diam lorem, auctor quis, tristique ac, eleifend vitae, erat. Vivamus nisi. Mauris nulla. Integer urna. Vivamus molestie dapibus ligula. Aliquam erat volutpat. Nulla dignissim. Maecenas ornare egestas ligula. Nullam feugiat placerat velit. Quisque varius. Nam', 0, NULL, '', '', NULL, 0),
(23, 3, 12, '2013-11-05 01:03:17', 6, 'non quam. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aliquam fringilla cursus purus. Nullam scelerisque neque sed sem egestas blandit. Nam nulla magna, malesuada vel, convallis in, cursus et, eros. Proin ultrices. Duis volutpat nunc sit amet metus. Aliquam erat volutpat. Nulla facilisis. Suspendisse commodo tincidunt nibh. Phasellus nulla. Integer vulputate, risus a ultricies adipiscing, enim mi tempor lorem,', 0, NULL, '', '', NULL, 0),
(24, 2, 5, '2013-09-12 13:06:31', 1, 'enim consequat purus. Maecenas libero est, congue a, aliquet vel, vulputate eu, odio. Phasellus at augue id ante dictum cursus. Nunc mauris elit, dictum eu, eleifend nec, malesuada ut, sem. Nulla interdum. Curabitur dictum. Phasellus in felis. Nulla tempor augue ac ipsum. Phasellus vitae mauris sit amet lorem semper auctor. Mauris vel turpis. Aliquam adipiscing lobortis risus. In mi pede, nonummy ut, molestie in, tempus eu, ligula. Aenean euismod mauris eu elit. Nulla facilisi. Sed neque. Sed eget lacus. Mauris non dui nec urna suscipit nonummy. Fusce fermentum fermentum arcu. Vestibulum ante ipsum primis in faucibus orci', 0, NULL, '', '', NULL, 0),
(25, 3, 19, '2013-11-08 19:35:48', 5, 'eget metus. In nec orci. Donec nibh. Quisque nonummy ipsum non arcu. Vivamus sit amet risus. Donec egestas. Aliquam nec enim. Nunc ut erat. Sed nunc est, mollis non, cursus non, egestas a, dui. Cras pellentesque. Sed dictum. Proin eget odio. Aliquam vulputate ullamcorper magna. Sed eu eros. Nam consequat dolor vitae dolor. Donec fringilla. Donec feugiat metus sit amet ante. Vivamus non lorem vitae odio sagittis semper. Nam tempor diam dictum sapien. Aenean massa. Integer vitae nibh. Donec est mauris, rhoncus id, mollis nec, cursus a, enim. Suspendisse aliquet, sem ut cursus', 0, NULL, '', '', NULL, 0),
(26, 1, 20, '2013-09-16 12:58:03', 9, 'lectus quis massa. Mauris vestibulum, neque sed dictum eleifend, nunc risus varius orci, in consequat enim diam vel arcu. Curabitur ut odio vel est tempor bibendum. Donec felis orci,', 0, NULL, '', '', NULL, 0),
(27, 2, 5, '2013-12-25 23:18:25', 6, 'dis parturient montes, nascetur ridiculus mus. Proin vel arcu eu odio tristique pharetra. Quisque ac libero nec ligula consectetuer rhoncus. Nullam velit dui, semper et, lacinia vitae, sodales at, velit. Pellentesque ultricies dignissim lacus. Aliquam rutrum lorem ac risus. Morbi metus. Vivamus euismod urna. Nullam lobortis quam a felis ullamcorper viverra. Maecenas iaculis aliquet diam. Sed diam lorem, auctor quis, tristique ac, eleifend vitae, erat. Vivamus nisi. Mauris nulla. Integer urna. Vivamus molestie dapibus ligula. Aliquam erat volutpat. Nulla dignissim. Maecenas ornare egestas ligula.', 0, NULL, '', '', NULL, 0),
(28, 1, 15, '2013-11-14 23:11:53', 1, 'at pretium aliquet, metus urna convallis erat, eget tincidunt dui augue eu tellus. Phasellus elit pede, malesuada vel, venenatis vel, faucibus id, libero. Donec consectetuer', 0, NULL, '', '', NULL, 0),
(29, 2, 20, '2013-10-29 03:37:12', 2, 'erat, eget tincidunt dui augue', 0, NULL, '', '', NULL, 0),
(30, 1, 9, '2013-07-12 00:46:39', 9, 'justo faucibus lectus, a sollicitudin orci sem eget massa. Suspendisse eleifend. Cras', 0, NULL, '', '', NULL, 0),
(31, 1, 17, '2013-07-18 06:23:54', 4, 'aliquet lobortis, nisi nibh lacinia orci, consectetuer euismod est arcu ac orci. Ut semper pretium neque. Morbi quis urna. Nunc quis arcu vel quam dignissim pharetra. Nam ac nulla. In tincidunt congue turpis. In condimentum. Donec at arcu. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;', 0, NULL, '', '', NULL, 0),
(32, 2, 12, '2013-06-26 12:34:46', 7, 'nunc sit amet metus. Aliquam erat volutpat. Nulla facilisis. Suspendisse commodo tincidunt nibh. Phasellus nulla. Integer vulputate, risus a ultricies adipiscing, enim mi tempor lorem, eget mollis', 0, NULL, '', '', NULL, 0),
(33, 1, 14, '2013-01-23 10:42:20', 2, 'In ornare sagittis felis. Donec tempor, est ac mattis semper, dui lectus rutrum urna, nec luctus felis purus ac tellus. Suspendisse sed dolor. Fusce mi lorem, vehicula et, rutrum eu, ultrices sit amet, risus. Donec nibh enim, gravida sit amet, dapibus id, blandit at, nisi. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Proin vel nisl. Quisque fringilla euismod enim. Etiam gravida molestie arcu. Sed', 0, NULL, '', '', NULL, 0),
(34, 2, 17, '2013-05-18 02:59:12', 3, 'egestas. Fusce aliquet magna a neque. Nullam ut nisi a odio semper cursus. Integer mollis. Integer tincidunt aliquam arcu. Aliquam ultrices iaculis odio. Nam interdum enim non nisi. Aenean eget metus. In nec orci. Donec nibh. Quisque nonummy ipsum non arcu. Vivamus sit amet risus. Donec egestas. Aliquam nec enim. Nunc ut erat. Sed nunc est,', 0, NULL, '', '', NULL, 0),
(35, 3, 20, '2013-12-07 19:59:01', 1, 'Fusce dolor quam, elementum at, egestas a, scelerisque', 0, NULL, '', '', NULL, 0),
(36, 3, 4, '2013-05-31 09:54:33', 5, 'luctus lobortis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. Mauris ut quam vel sapien imperdiet ornare. In faucibus. Morbi vehicula. Pellentesque tincidunt tempus risus. Donec egestas. Duis ac arcu. Nunc mauris. Morbi non sapien molestie orci tincidunt adipiscing. Mauris molestie pharetra nibh. Aliquam ornare, libero at', 0, NULL, '', '', NULL, 0),
(37, 3, 11, '2013-09-16 07:03:59', 1, 'urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor quam, elementum at, egestas a, scelerisque sed, sapien. Nunc pulvinar', 0, NULL, '', '', NULL, 0),
(38, 3, 14, '2013-01-05 22:24:17', 7, 'tortor at risus. Nunc ac sem ut dolor dapibus gravida. Aliquam tincidunt, nunc ac mattis ornare, lectus ante dictum mi, ac mattis velit justo nec ante. Maecenas mi felis, adipiscing fringilla, porttitor vulputate, posuere vulputate, lacus. Cras interdum. Nunc sollicitudin commodo ipsum. Suspendisse non leo. Vivamus nibh dolor, nonummy', 0, NULL, '', '', NULL, 0),
(39, 2, 13, '2013-07-14 06:32:15', 7, 'sapien molestie orci tincidunt adipiscing. Mauris molestie pharetra nibh. Aliquam ornare, libero at auctor ullamcorper, nisl arcu iaculis enim, sit amet ornare lectus justo eu arcu. Morbi sit amet massa. Quisque porttitor eros nec tellus. Nunc lectus pede, ultrices a, auctor non, feugiat nec, diam. Duis mi enim, condimentum eget, volutpat ornare, facilisis eget, ipsum. Donec sollicitudin adipiscing ligula. Aenean gravida nunc sed', 0, NULL, '', '', NULL, 0),
(40, 1, 2, '2013-01-17 02:12:29', 2, 'at pretium aliquet, metus urna convallis erat, eget tincidunt dui augue eu tellus. Phasellus elit pede, malesuada vel, venenatis vel, faucibus id, libero. Donec consectetuer mauris id sapien. Cras dolor dolor, tempus non, lacinia at, iaculis quis, pede. Praesent', 0, NULL, '', '', NULL, 0),
(41, 1, 6, '2013-07-31 14:25:42', 7, 'rhoncus. Nullam velit dui, semper et, lacinia vitae, sodales at, velit. Pellentesque ultricies dignissim lacus. Aliquam rutrum lorem ac risus. Morbi metus. Vivamus euismod urna.', 0, NULL, '', '', NULL, 0),
(42, 2, 19, '2013-04-15 21:30:18', 5, 'pellentesque a, facilisis non, bibendum sed, est. Nunc laoreet lectus quis massa. Mauris vestibulum, neque', 0, NULL, '', '', NULL, 0),
(43, 3, 1, '2013-04-21 10:58:53', 10, 'ad litora torquent per conubia nostra, per inceptos hymenaeos. Mauris ut quam vel sapien imperdiet ornare. In faucibus. Morbi vehicula. Pellentesque tincidunt tempus risus. Donec egestas. Duis ac arcu. Nunc mauris. Morbi non sapien molestie orci tincidunt adipiscing. Mauris molestie pharetra nibh. Aliquam ornare, libero at auctor ullamcorper, nisl arcu iaculis enim, sit amet ornare lectus justo eu arcu. Morbi sit amet massa. Quisque porttitor eros nec tellus. Nunc lectus pede, ultrices a, auctor non, feugiat nec, diam. Duis mi enim, condimentum eget, volutpat', 0, NULL, '', '', NULL, 0),
(44, 3, 13, '2013-02-02 22:35:47', 10, 'enim. Nunc ut erat. Sed nunc est, mollis non, cursus non, egestas a, dui. Cras pellentesque. Sed dictum. Proin eget odio. Aliquam vulputate ullamcorper magna. Sed eu eros. Nam consequat dolor vitae dolor. Donec fringilla. Donec feugiat metus sit amet ante. Vivamus non lorem vitae odio sagittis semper. Nam tempor diam dictum sapien. Aenean massa. Integer vitae nibh. Donec est mauris,', 0, NULL, '', '', NULL, 0),
(45, 3, 3, '2013-02-09 10:59:16', 8, 'quam dignissim pharetra. Nam ac nulla. In tincidunt congue turpis. In condimentum. Donec at arcu. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec tincidunt. Donec vitae erat vel pede blandit congue. In scelerisque scelerisque dui. Suspendisse ac metus vitae velit egestas lacinia. Sed congue, elit sed', 0, NULL, '', '', NULL, 0),
(46, 1, 13, '2013-01-11 05:49:26', 9, 'a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor.', 0, NULL, '', '', NULL, 0),
(47, 2, 7, '2013-05-19 20:51:37', 3, 'nisi dictum augue malesuada malesuada. Integer id magna', 0, NULL, '', '', NULL, 0),
(48, 2, 15, '2013-09-08 14:54:27', 5, 'lorem, eget mollis lectus pede et risus. Quisque libero lacus, varius et, euismod', 0, NULL, '', '', NULL, 0),
(49, 3, 18, '2013-10-09 12:50:31', 10, 'Nunc commodo auctor velit. Aliquam nisl. Nulla eu neque pellentesque massa lobortis ultrices. Vivamus rhoncus. Donec est. Nunc ullamcorper, velit in aliquet lobortis, nisi nibh lacinia orci, consectetuer euismod est arcu ac orci. Ut semper pretium neque. Morbi quis urna. Nunc quis arcu vel quam dignissim pharetra. Nam ac nulla. In tincidunt congue turpis. In condimentum. Donec at arcu. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec tincidunt. Donec vitae erat vel pede blandit congue. In scelerisque scelerisque dui.', 0, NULL, '', '', NULL, 0),
(50, 1, 17, '2013-01-22 20:55:35', 4, 'Mauris vestibulum, neque sed dictum eleifend, nunc risus varius orci, in consequat enim diam vel arcu. Curabitur', 0, NULL, '', '', NULL, 0),
(51, 2, 2, '2013-06-01 03:54:44', 6, 'dignissim tempor arcu. Vestibulum ut eros non enim commodo hendrerit. Donec porttitor tellus non magna. Nam ligula', 0, NULL, '', '', NULL, 0),
(52, 1, 4, '2013-09-08 02:38:37', 3, 'Morbi sit amet massa. Quisque porttitor eros nec tellus. Nunc lectus', 0, NULL, '', '', NULL, 0),
(53, 1, 12, '2013-08-25 06:30:41', 7, 'ullamcorper. Duis cursus, diam at pretium aliquet, metus urna convallis erat, eget tincidunt dui augue eu tellus. Phasellus elit pede, malesuada vel, venenatis vel, faucibus id, libero. Donec consectetuer mauris id sapien. Cras dolor dolor, tempus non, lacinia at, iaculis quis, pede. Praesent eu dui. Cum sociis natoque penatibus et magnis dis', 0, NULL, '', '', NULL, 0),
(54, 1, 3, '2013-08-10 09:03:16', 4, 'per conubia nostra, per inceptos hymenaeos. Mauris ut quam vel sapien imperdiet ornare. In faucibus. Morbi vehicula. Pellentesque tincidunt tempus risus. Donec egestas. Duis ac arcu. Nunc mauris. Morbi non sapien molestie orci tincidunt adipiscing. Mauris molestie pharetra nibh. Aliquam ornare, libero at auctor ullamcorper, nisl arcu iaculis enim, sit amet ornare lectus justo eu arcu. Morbi sit amet massa. Quisque porttitor eros nec tellus.', 0, NULL, '', '', NULL, 0),
(55, 1, 11, '2013-02-16 13:24:41', 2, 'Nam porttitor scelerisque neque. Nullam nisl. Maecenas malesuada fringilla est. Mauris eu turpis. Nulla aliquet. Proin velit. Sed malesuada augue ut', 0, NULL, '', '', NULL, 0),
(56, 3, 9, '2013-09-07 14:27:07', 3, 'vestibulum. Mauris magna. Duis dignissim tempor arcu. Vestibulum ut eros non enim commodo hendrerit. Donec porttitor tellus non magna. Nam ligula elit, pretium et, rutrum', 0, NULL, '', '', NULL, 0),
(57, 2, 14, '2013-04-03 09:13:20', 7, 'ac turpis egestas. Aliquam fringilla cursus purus. Nullam scelerisque neque sed sem egestas blandit. Nam nulla magna, malesuada vel, convallis in,', 0, NULL, '', '', NULL, 0),
(58, 1, 10, '2013-12-08 02:13:22', 1, 'mauris sapien, cursus in, hendrerit consectetuer, cursus et, magna. Praesent interdum ligula eu enim. Etiam imperdiet dictum magna. Ut tincidunt orci quis lectus. Nullam suscipit, est ac facilisis facilisis, magna tellus faucibus leo, in lobortis tellus justo sit amet nulla. Donec', 0, NULL, '', '', NULL, 1),
(59, 2, 13, '2013-01-06 09:35:36', 2, 'rhoncus id, mollis nec, cursus a, enim. Suspendisse aliquet, sem ut cursus luctus, ipsum leo elementum sem, vitae aliquam eros turpis non enim. Mauris quis turpis vitae purus gravida sagittis. Duis gravida. Praesent eu nulla at sem molestie sodales. Mauris blandit enim consequat purus. Maecenas libero est, congue a, aliquet vel, vulputate eu, odio. Phasellus at augue id ante dictum cursus. Nunc mauris elit, dictum eu, eleifend nec, malesuada ut, sem. Nulla interdum. Curabitur dictum. Phasellus in felis. Nulla tempor augue ac ipsum. Phasellus vitae mauris sit amet lorem semper auctor. Mauris vel turpis. Aliquam adipiscing', 0, NULL, '', '', NULL, 0),
(60, 3, 3, '2013-10-01 09:59:09', 3, 'ligula tortor, dictum eu, placerat eget, venenatis a, magna. Lorem ipsum dolor sit amet, consectetuer adipiscing elit.', 0, NULL, '', '', NULL, 0),
(61, 2, 9, '2013-03-21 04:27:47', 4, 'non massa non ante bibendum ullamcorper. Duis cursus, diam at pretium aliquet, metus urna convallis erat, eget tincidunt dui augue eu tellus. Phasellus elit pede, malesuada vel, venenatis vel, faucibus id, libero. Donec consectetuer mauris id sapien. Cras dolor dolor, tempus non, lacinia at, iaculis quis, pede. Praesent eu dui. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean eget magna. Suspendisse tristique neque venenatis lacus. Etiam bibendum fermentum metus.', 0, NULL, '', '', NULL, 0),
(62, 3, 13, '2013-08-28 08:38:30', 1, 'Sed pharetra, felis eget varius ultrices, mauris ipsum porta elit, a feugiat tellus lorem eu metus. In lorem. Donec elementum, lorem ut aliquam iaculis, lacus pede sagittis augue, eu tempor erat neque non quam. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aliquam fringilla cursus purus. Nullam scelerisque neque sed sem egestas blandit. Nam nulla magna, malesuada vel, convallis in, cursus et, eros. Proin ultrices. Duis volutpat nunc sit amet metus. Aliquam erat volutpat. Nulla facilisis. Suspendisse commodo tincidunt nibh. Phasellus nulla. Integer vulputate, risus a ultricies adipiscing, enim', 0, NULL, '', '', NULL, 0),
(63, 2, 12, '2013-06-07 11:27:06', 6, 'tortor, dictum eu, placerat eget, venenatis a, magna. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Etiam laoreet, libero et tristique pellentesque, tellus sem mollis dui,', 0, NULL, '', '', NULL, 0),
(64, 2, 10, '2013-07-14 16:06:56', 3, 'lacus pede sagittis augue, eu tempor erat neque non quam. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aliquam fringilla cursus purus. Nullam scelerisque neque sed sem egestas blandit. Nam nulla magna, malesuada vel, convallis in, cursus et, eros. Proin ultrices. Duis volutpat', 0, NULL, '', '', NULL, 0),
(65, 3, 17, '2013-07-17 01:49:05', 6, 'nec metus facilisis lorem', 0, NULL, '', '', NULL, 0),
(66, 2, 17, '2013-08-26 01:41:24', 10, 'mi, ac mattis velit justo nec ante. Maecenas mi felis, adipiscing fringilla, porttitor vulputate, posuere vulputate, lacus. Cras interdum. Nunc sollicitudin commodo ipsum. Suspendisse non leo. Vivamus nibh dolor, nonummy ac, feugiat non, lobortis quis, pede. Suspendisse dui. Fusce diam nunc, ullamcorper eu, euismod ac, fermentum vel, mauris. Integer sem elit, pharetra ut, pharetra sed, hendrerit a, arcu. Sed et libero. Proin mi. Aliquam gravida mauris ut mi. Duis risus odio, auctor vitae, aliquet nec, imperdiet nec, leo. Morbi neque tellus, imperdiet non, vestibulum nec, euismod in, dolor. Fusce feugiat. Lorem ipsum dolor sit amet,', 0, NULL, '', '', NULL, 0),
(67, 3, 11, '2013-10-28 02:32:21', 5, 'placerat, augue.', 0, NULL, '', '', NULL, 0),
(68, 1, 15, '2013-09-13 09:13:08', 9, 'orci lacus vestibulum lorem, sit amet ultricies sem magna nec quam. Curabitur', 0, NULL, '', '', NULL, 0),
(69, 3, 15, '2013-03-31 04:54:42', 3, 'Duis risus odio, auctor vitae, aliquet nec, imperdiet nec, leo. Morbi neque tellus, imperdiet non, vestibulum nec, euismod in, dolor. Fusce feugiat. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aliquam auctor, velit eget', 0, NULL, '', '', NULL, 0),
(70, 1, 16, '2013-08-28 05:55:06', 5, 'ornare. Fusce mollis. Duis sit amet diam eu dolor egestas rhoncus. Proin nisl sem, consequat nec, mollis vitae, posuere at, velit. Cras lorem lorem, luctus ut, pellentesque eget, dictum placerat, augue. Sed molestie.', 0, NULL, '', '', NULL, 0),
(71, 1, 5, '2013-02-06 03:47:13', 1, 'nonummy. Fusce fermentum fermentum arcu. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Phasellus ornare. Fusce mollis. Duis sit amet diam eu dolor egestas rhoncus. Proin nisl sem, consequat nec, mollis vitae, posuere at, velit. Cras lorem lorem, luctus ut, pellentesque eget, dictum placerat, augue. Sed molestie. Sed id risus quis diam luctus lobortis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. Mauris ut quam vel sapien imperdiet ornare. In faucibus. Morbi', 0, NULL, '', '', NULL, 0),
(72, 3, 10, '2013-10-15 20:22:13', 1, 'Nullam nisl. Maecenas malesuada fringilla est. Mauris eu turpis. Nulla aliquet. Proin velit. Sed malesuada augue ut lacus. Nulla tincidunt, neque vitae semper egestas, urna justo faucibus lectus, a sollicitudin orci sem eget massa. Suspendisse eleifend. Cras sed leo. Cras vehicula aliquet libero. Integer in magna. Phasellus dolor elit, pellentesque a, facilisis non, bibendum sed, est. Nunc laoreet lectus quis massa. Mauris vestibulum, neque sed dictum eleifend, nunc risus varius orci, in', 0, NULL, '', '', NULL, 0),
(73, 1, 9, '2013-02-19 04:08:23', 10, 'urna justo faucibus lectus, a sollicitudin orci sem eget massa. Suspendisse eleifend. Cras sed leo. Cras vehicula aliquet libero. Integer in magna. Phasellus dolor elit, pellentesque a, facilisis non, bibendum sed, est. Nunc laoreet lectus quis massa. Mauris vestibulum, neque sed dictum eleifend, nunc risus varius orci,', 0, NULL, '', '', NULL, 0),
(74, 1, 11, '2013-09-21 19:55:20', 2, 'et magnis dis parturient montes, nascetur', 0, NULL, '', '', NULL, 0),
(75, 3, 17, '2013-08-26 17:51:42', 4, 'eros turpis non enim. Mauris quis turpis vitae purus', 0, NULL, '', '', NULL, 0),
(76, 2, 3, '2013-08-16 15:29:47', 10, 'varius orci, in consequat enim diam vel arcu. Curabitur ut odio vel est tempor bibendum. Donec felis orci, adipiscing non, luctus sit amet, faucibus ut, nulla. Cras eu tellus eu augue porttitor interdum. Sed auctor odio a purus. Duis elementum, dui quis accumsan convallis, ante lectus convallis est, vitae sodales nisi magna sed dui. Fusce aliquam, enim nec tempus scelerisque, lorem ipsum sodales purus, in molestie tortor nibh sit amet orci. Ut sagittis lobortis mauris. Suspendisse aliquet molestie tellus. Aenean egestas hendrerit neque.', 0, NULL, '', '', NULL, 0),
(77, 1, 3, '2013-12-25 10:59:23', 7, 'Cras interdum. Nunc sollicitudin commodo ipsum. Suspendisse non leo. Vivamus nibh dolor, nonummy ac, feugiat non, lobortis quis, pede. Suspendisse dui.', 0, NULL, '', '', NULL, 0),
(78, 3, 1, '2013-06-13 15:35:06', 5, 'rhoncus. Donec est. Nunc ullamcorper, velit in aliquet lobortis, nisi nibh lacinia orci, consectetuer euismod est arcu ac orci. Ut semper pretium neque. Morbi quis urna. Nunc quis arcu vel quam dignissim pharetra. Nam ac nulla. In tincidunt congue turpis. In condimentum. Donec at arcu. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec tincidunt. Donec vitae erat vel pede blandit congue. In scelerisque scelerisque dui. Suspendisse ac metus vitae velit egestas lacinia. Sed congue, elit sed consequat auctor, nunc nulla vulputate dui, nec tempus mauris erat eget ipsum. Suspendisse', 0, NULL, '', '', NULL, 0),
(79, 3, 20, '2013-03-12 22:53:39', 2, 'nunc risus varius orci, in consequat enim diam vel arcu. Curabitur ut odio vel est tempor bibendum. Donec felis orci, adipiscing non, luctus sit amet, faucibus ut, nulla. Cras eu tellus eu augue porttitor interdum. Sed auctor odio a purus. Duis elementum, dui quis accumsan convallis, ante lectus convallis est, vitae sodales nisi magna sed dui. Fusce aliquam, enim nec tempus scelerisque, lorem ipsum sodales purus, in molestie tortor nibh sit amet orci. Ut sagittis', 0, NULL, '', '', NULL, 0),
(80, 2, 19, '2013-07-16 04:21:00', 10, 'velit justo nec ante. Maecenas mi felis, adipiscing fringilla, porttitor vulputate, posuere vulputate, lacus. Cras interdum. Nunc sollicitudin commodo ipsum. Suspendisse non leo. Vivamus nibh dolor, nonummy ac, feugiat non, lobortis quis, pede. Suspendisse dui. Fusce diam nunc, ullamcorper eu, euismod ac, fermentum vel, mauris. Integer sem elit, pharetra ut, pharetra sed, hendrerit a, arcu. Sed et libero. Proin mi. Aliquam gravida mauris ut mi. Duis risus odio, auctor vitae, aliquet nec,', 0, NULL, '', '', NULL, 0),
(81, 2, 11, '2013-10-26 15:49:00', 8, '<p>cursus, diam</p>\r\n', 0, '', '', '', 0, 1),
(82, 3, 8, '2013-06-02 11:52:20', 8, 'mauris eu elit. Nulla facilisi. Sed neque. Sed eget lacus. Mauris non dui nec urna suscipit nonummy. Fusce fermentum fermentum arcu. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Phasellus ornare. Fusce mollis. Duis sit amet diam eu dolor egestas rhoncus. Proin nisl sem, consequat nec, mollis vitae, posuere at, velit. Cras lorem lorem, luctus ut, pellentesque eget, dictum placerat, augue. Sed molestie. Sed id risus quis diam luctus lobortis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos', 0, NULL, '', '', NULL, 0),
(83, 1, 1, '2013-04-13 11:48:17', 4, 'nonummy. Fusce fermentum fermentum arcu. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Phasellus ornare. Fusce mollis. Duis sit amet diam eu dolor egestas rhoncus. Proin nisl sem, consequat nec, mollis vitae, posuere at, velit. Cras lorem lorem, luctus ut, pellentesque eget, dictum placerat, augue. Sed molestie. Sed id risus quis diam luctus lobortis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. Mauris ut quam vel sapien imperdiet ornare. In faucibus. Morbi vehicula. Pellentesque tincidunt tempus risus.', 0, NULL, '', '', NULL, 0),
(84, 1, 16, '2013-04-21 15:30:50', 3, 'lectus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec dignissim magna a tortor. Nunc commodo auctor velit. Aliquam nisl. Nulla eu neque pellentesque massa lobortis ultrices. Vivamus rhoncus. Donec est. Nunc ullamcorper, velit in aliquet lobortis, nisi nibh lacinia orci, consectetuer euismod est arcu ac orci. Ut semper pretium neque. Morbi quis urna. Nunc quis arcu vel quam dignissim pharetra. Nam ac nulla. In tincidunt congue turpis. In', 0, NULL, '', '', NULL, 0),
(85, 3, 11, '2013-07-25 17:37:31', 7, 'molestie pharetra nibh. Aliquam ornare, libero at auctor ullamcorper, nisl arcu iaculis enim, sit amet', 0, NULL, '', '', NULL, 0),
(86, 1, 15, '2013-06-21 11:49:43', 3, 'orci sem eget massa. Suspendisse eleifend. Cras sed leo. Cras vehicula aliquet libero. Integer', 0, NULL, '', '', NULL, 0),
(87, 1, 16, '2013-01-17 21:02:45', 10, 'blandit congue. In scelerisque scelerisque dui. Suspendisse ac metus vitae velit egestas lacinia. Sed congue, elit sed consequat auctor, nunc nulla vulputate dui, nec tempus mauris erat eget ipsum. Suspendisse sagittis. Nullam vitae diam. Proin dolor. Nulla semper tellus id nunc interdum feugiat. Sed nec metus facilisis lorem tristique aliquet. Phasellus fermentum convallis ligula. Donec luctus aliquet odio. Etiam ligula tortor, dictum eu, placerat eget, venenatis a, magna. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Etiam laoreet, libero et tristique pellentesque, tellus sem mollis dui, in sodales elit erat vitae risus. Duis a mi fringilla mi lacinia', 0, NULL, '', '', NULL, 0),
(88, 2, 19, '2013-07-25 02:36:16', 2, 'Etiam ligula tortor, dictum eu, placerat eget, venenatis a, magna. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Etiam laoreet, libero et tristique pellentesque, tellus sem mollis dui, in sodales elit', 0, NULL, '', '', NULL, 0),
(89, 2, 11, '2013-02-03 00:04:47', 9, 'quam a felis ullamcorper viverra. Maecenas iaculis aliquet diam. Sed diam lorem, auctor quis, tristique ac, eleifend vitae, erat. Vivamus nisi. Mauris nulla. Integer urna. Vivamus molestie dapibus ligula. Aliquam erat volutpat. Nulla dignissim. Maecenas ornare egestas ligula. Nullam feugiat placerat velit. Quisque varius. Nam porttitor scelerisque neque. Nullam nisl. Maecenas malesuada fringilla est. Mauris eu turpis. Nulla aliquet. Proin velit. Sed malesuada augue ut lacus. Nulla tincidunt, neque vitae semper egestas, urna justo faucibus lectus, a', 0, NULL, '', '', NULL, 0),
(90, 1, 2, '2013-09-09 18:57:52', 2, 'in sodales elit erat vitae risus. Duis a mi fringilla mi lacinia mattis. Integer eu lacus. Quisque imperdiet, erat nonummy ultricies ornare, elit elit fermentum risus, at fringilla purus mauris a', 0, NULL, '', '', NULL, 0),
(91, 3, 7, '2013-06-05 08:24:48', 4, 'dictum eleifend, nunc risus varius orci, in consequat enim diam vel arcu. Curabitur ut odio vel est tempor bibendum. Donec felis orci, adipiscing non, luctus sit amet, faucibus ut, nulla. Cras eu tellus eu augue porttitor interdum. Sed auctor odio a purus. Duis elementum, dui quis accumsan convallis, ante lectus convallis est, vitae sodales', 0, NULL, '', '', NULL, 0),
(92, 2, 14, '2013-03-13 17:08:03', 2, 'eget, venenatis a, magna. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Etiam laoreet, libero et tristique pellentesque, tellus sem mollis dui, in sodales elit erat vitae risus. Duis a mi fringilla mi lacinia mattis. Integer eu lacus. Quisque imperdiet, erat nonummy ultricies ornare, elit elit fermentum risus, at fringilla purus mauris a nunc. In at pede. Cras vulputate velit eu sem. Pellentesque ut ipsum ac mi eleifend egestas. Sed pharetra, felis eget varius ultrices, mauris ipsum porta elit, a feugiat tellus lorem eu metus. In', 0, NULL, '', '', NULL, 0),
(93, 2, 1, '2013-09-27 13:33:01', 6, 'elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat', 0, NULL, '', '', NULL, 0),
(94, 2, 2, '2013-09-07 01:28:29', 10, 'quam a felis ullamcorper viverra. Maecenas iaculis aliquet diam. Sed diam lorem, auctor quis, tristique ac, eleifend vitae, erat. Vivamus nisi. Mauris nulla. Integer urna. Vivamus molestie dapibus ligula. Aliquam erat volutpat. Nulla dignissim. Maecenas ornare egestas ligula. Nullam feugiat placerat velit. Quisque varius. Nam porttitor scelerisque neque. Nullam nisl. Maecenas malesuada fringilla est. Mauris eu turpis.', 0, NULL, '', '', NULL, 0),
(95, 3, 20, '2013-08-30 08:10:23', 9, 'vel quam dignissim pharetra. Nam ac nulla. In tincidunt congue turpis. In condimentum. Donec at arcu. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec tincidunt. Donec vitae erat vel pede blandit congue. In scelerisque scelerisque dui. Suspendisse ac metus vitae velit egestas lacinia. Sed congue, elit sed consequat', 0, NULL, '', '', NULL, 0),
(96, 1, 12, '2013-06-14 08:31:14', 9, 'amet metus. Aliquam erat volutpat. Nulla facilisis. Suspendisse commodo tincidunt nibh. Phasellus nulla. Integer vulputate, risus a ultricies adipiscing, enim mi tempor lorem, eget mollis lectus pede et risus. Quisque libero lacus, varius et, euismod et, commodo at, libero. Morbi', 0, NULL, '', '', NULL, 0),
(97, 2, 5, '2013-01-21 02:58:22', 2, 'in faucibus orci luctus et ultrices posuere cubilia Curae; Donec tincidunt. Donec vitae erat vel pede blandit congue. In scelerisque scelerisque dui. Suspendisse ac metus vitae velit egestas lacinia. Sed congue, elit sed consequat auctor, nunc nulla vulputate dui, nec tempus mauris erat eget ipsum. Suspendisse sagittis. Nullam vitae diam. Proin dolor. Nulla semper tellus id nunc interdum feugiat. Sed nec metus facilisis lorem tristique aliquet. Phasellus fermentum convallis ligula. Donec luctus aliquet odio. Etiam ligula tortor, dictum eu, placerat eget, venenatis a, magna. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Etiam laoreet, libero et tristique pellentesque, tellus', 0, NULL, '', '', NULL, 0),
(98, 2, 13, '2013-06-28 18:53:19', 5, 'Duis elementum, dui quis accumsan convallis, ante lectus convallis est, vitae sodales nisi magna sed dui. Fusce aliquam, enim nec tempus scelerisque, lorem ipsum sodales purus, in molestie tortor nibh sit amet orci. Ut sagittis lobortis mauris. Suspendisse aliquet molestie tellus. Aenean egestas hendrerit neque. In ornare sagittis felis. Donec tempor, est ac mattis semper, dui lectus rutrum urna, nec luctus felis purus ac tellus. Suspendisse sed dolor. Fusce mi lorem, vehicula et, rutrum eu, ultrices sit amet, risus. Donec', 0, NULL, '', '', NULL, 0),
(100, 2, 6, '2013-02-23 07:24:33', 10, 'a mi fringilla mi lacinia mattis. Integer eu lacus. Quisque imperdiet, erat nonummy ultricies ornare, elit elit fermentum risus, at fringilla purus mauris a nunc. In at pede. Cras vulputate velit eu sem. Pellentesque ut ipsum ac mi eleifend egestas. Sed pharetra, felis eget varius', 0, NULL, '', '', NULL, 0),
(101, 1, 4, '2013-08-17 07:54:32', 8, 'Donec dignissim magna a tortor. Nunc commodo auctor velit. Aliquam nisl. Nulla eu neque pellentesque massa lobortis ultrices.', 0, NULL, '', '', NULL, 0),
(102, 2, 9, '2013-08-13 14:11:24', 3, 'ornare, elit elit fermentum risus, at fringilla purus mauris a nunc. In at pede. Cras vulputate velit eu sem. Pellentesque ut ipsum ac mi eleifend egestas. Sed pharetra, felis eget varius ultrices, mauris ipsum porta elit,', 0, NULL, '', '', NULL, 0),
(103, 1, 20, '2013-08-17 19:22:41', 1, 'leo. Vivamus nibh dolor, nonummy ac, feugiat non, lobortis quis, pede. Suspendisse dui. Fusce diam nunc, ullamcorper eu, euismod ac, fermentum vel, mauris. Integer sem elit, pharetra ut, pharetra sed, hendrerit a, arcu. Sed et libero. Proin', 0, NULL, '', '', NULL, 0),
(104, 3, 1, '2013-02-23 08:06:42', 6, 'sem mollis dui, in sodales elit erat vitae risus. Duis a mi fringilla mi lacinia mattis. Integer eu lacus. Quisque imperdiet, erat nonummy ultricies ornare, elit elit fermentum risus, at fringilla', 0, NULL, '', '', NULL, 0),
(105, 1, 12, '2013-06-08 16:58:08', 2, 'auctor odio a purus. Duis elementum, dui quis accumsan convallis, ante lectus convallis est, vitae sodales nisi magna sed dui. Fusce aliquam, enim nec tempus scelerisque, lorem ipsum sodales purus, in molestie tortor nibh sit amet orci. Ut sagittis lobortis mauris. Suspendisse aliquet molestie tellus. Aenean egestas hendrerit neque. In ornare sagittis felis. Donec tempor, est ac mattis semper, dui', 0, NULL, '', '', NULL, 0),
(107, 2, 5, '2013-12-04 16:54:13', 8, 'placerat velit. Quisque varius. Nam porttitor scelerisque neque. Nullam nisl. Maecenas malesuada fringilla est. Mauris eu turpis. Nulla aliquet. Proin velit. Sed malesuada augue ut lacus. Nulla tincidunt, neque vitae semper egestas, urna justo faucibus', 0, NULL, '', '', NULL, 0),
(108, 2, 18, '2013-05-12 00:40:38', 9, 'elit. Nulla facilisi. Sed neque. Sed eget lacus. Mauris non dui nec urna suscipit nonummy. Fusce fermentum fermentum arcu. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Phasellus ornare. Fusce mollis. Duis sit amet diam eu dolor egestas rhoncus. Proin nisl sem, consequat nec, mollis vitae, posuere at, velit. Cras lorem lorem, luctus ut, pellentesque eget, dictum placerat, augue. Sed molestie. Sed id', 0, NULL, '', '', NULL, 0),
(109, 2, 17, '2013-06-30 18:27:57', 3, 'risus. In mi pede, nonummy ut, molestie in, tempus eu, ligula. Aenean euismod mauris eu elit. Nulla facilisi. Sed neque. Sed eget lacus. Mauris non dui nec urna suscipit nonummy. Fusce fermentum fermentum arcu. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Phasellus ornare. Fusce mollis. Duis sit amet diam eu dolor egestas rhoncus. Proin nisl sem, consequat nec, mollis vitae, posuere at, velit. Cras lorem lorem,', 0, NULL, '', '', NULL, 0),
(110, 1, 11, '2013-08-27 02:11:54', 3, 'a nunc. In at pede. Cras vulputate velit eu sem. Pellentesque ut ipsum ac mi eleifend egestas. Sed pharetra, felis eget varius ultrices, mauris ipsum porta elit, a feugiat tellus lorem eu metus. In lorem. Donec elementum, lorem ut aliquam iaculis, lacus pede sagittis augue, eu tempor erat neque non quam. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aliquam fringilla cursus purus. Nullam scelerisque neque sed sem egestas blandit. Nam nulla', 0, NULL, '', '', NULL, 0),
(111, 1, 17, '2013-06-04 17:44:25', 5, 'varius orci, in consequat enim diam vel arcu. Curabitur ut odio vel est tempor bibendum. Donec felis orci, adipiscing', 0, NULL, '', '', NULL, 0),
(112, 3, 5, '2013-12-15 10:08:53', 6, 'metus sit amet ante. Vivamus non lorem vitae odio sagittis semper. Nam tempor diam dictum sapien. Aenean massa. Integer vitae nibh. Donec est mauris, rhoncus id, mollis nec, cursus a, enim. Suspendisse aliquet, sem ut cursus luctus, ipsum leo elementum sem, vitae aliquam eros turpis non enim. Mauris quis turpis vitae purus gravida sagittis. Duis gravida. Praesent eu nulla at sem molestie sodales. Mauris blandit enim', 0, NULL, '', '', NULL, 0),
(113, 1, 5, '2013-10-03 16:17:24', 4, 'nisi. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Proin vel nisl. Quisque fringilla euismod enim. Etiam gravida molestie arcu. Sed eu nibh vulputate mauris sagittis placerat. Cras dictum ultricies ligula. Nullam enim. Sed nulla ante, iaculis nec, eleifend non, dapibus rutrum, justo. Praesent luctus. Curabitur egestas nunc sed libero. Proin sed turpis nec mauris blandit mattis. Cras eget nisi dictum augue malesuada malesuada. Integer id magna et ipsum cursus vestibulum. Mauris magna. Duis dignissim tempor arcu.', 0, NULL, '', '', NULL, 0),
(114, 3, 4, '2013-02-21 21:22:09', 5, 'erat neque non quam. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aliquam fringilla cursus purus. Nullam scelerisque neque sed sem egestas blandit. Nam nulla magna, malesuada vel, convallis in, cursus et, eros. Proin ultrices. Duis volutpat nunc sit amet metus. Aliquam erat volutpat. Nulla facilisis. Suspendisse commodo tincidunt nibh. Phasellus nulla.', 0, NULL, '', '', NULL, 0),
(115, 2, 5, '2013-10-11 09:43:31', 8, 'Nulla facilisis. Suspendisse commodo tincidunt nibh. Phasellus nulla. Integer vulputate, risus a ultricies adipiscing, enim mi tempor lorem, eget mollis lectus pede et risus. Quisque libero lacus, varius et, euismod et, commodo at, libero. Morbi accumsan laoreet ipsum. Curabitur consequat, lectus sit amet luctus vulputate, nisi sem semper erat, in consectetuer ipsum nunc id enim. Curabitur massa. Vestibulum accumsan neque et nunc. Quisque ornare tortor at risus. Nunc ac sem ut dolor dapibus gravida. Aliquam tincidunt, nunc ac mattis ornare, lectus ante dictum mi,', 0, NULL, '', '', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `matches_files`
--

CREATE TABLE IF NOT EXISTS `matches_files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `match_id` int(11) NOT NULL,
  `file` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `matches_files`
--

INSERT INTO `matches_files` (`id`, `match_id`, `file`, `type`) VALUES
(6, 81, '81_1_1376052083.png', 'screenshot'),
(7, 81, '81_2_1376052083.jpg', 'screenshot'),
(8, 81, '81_3_1376052083.png', 'screenshot'),
(9, 81, '81_4_1376052083.png', 'screenshot'),
(10, 81, '81_5_1376052083.png', 'screenshot');

-- --------------------------------------------------------

--
-- Table structure for table `matches_scores`
--

CREATE TABLE IF NOT EXISTS `matches_scores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `match` int(11) NOT NULL,
  `opponent` int(11) NOT NULL,
  `team` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=224 ;

--
-- Dumping data for table `matches_scores`
--

INSERT INTO `matches_scores` (`id`, `match`, `opponent`, `team`) VALUES
(2, 2, 12, 1),
(3, 3, 1, 2),
(4, 4, 1, 2),
(5, 5, 1, 2),
(6, 6, 1, 1),
(7, 7, 2, 1),
(8, 8, 1, 1),
(9, 8, 0, 1),
(10, 8, 2, 3),
(11, 9, 12, 1),
(13, 11, 1, 1),
(14, 12, 1, 2),
(15, 13, 0, 0),
(16, 14, 0, 1),
(17, 14, 1, 1),
(18, 14, 1, 1),
(19, 15, 1, 3),
(20, 16, 1, 0),
(121, 17, 7, 3),
(122, 18, 5, 1),
(123, 19, 6, 5),
(124, 20, 10, 1),
(125, 21, 1, 3),
(126, 22, 3, 10),
(127, 23, 7, 10),
(128, 24, 7, 10),
(129, 25, 6, 7),
(130, 26, 7, 6),
(131, 27, 1, 9),
(132, 28, 4, 3),
(133, 29, 10, 10),
(134, 30, 7, 9),
(135, 31, 7, 4),
(136, 32, 3, 3),
(137, 33, 6, 7),
(138, 34, 3, 1),
(139, 35, 2, 3),
(140, 36, 2, 2),
(141, 37, 6, 4),
(142, 38, 2, 3),
(143, 39, 4, 9),
(144, 40, 2, 9),
(145, 41, 5, 9),
(146, 42, 5, 6),
(147, 43, 7, 9),
(148, 44, 8, 7),
(149, 45, 8, 5),
(150, 46, 5, 5),
(151, 47, 8, 8),
(152, 48, 7, 4),
(153, 49, 5, 10),
(154, 50, 5, 6),
(155, 51, 3, 6),
(156, 52, 7, 8),
(157, 53, 9, 8),
(158, 54, 10, 3),
(159, 55, 6, 2),
(160, 56, 1, 1),
(161, 57, 1, 6),
(162, 58, 7, 8),
(163, 59, 4, 4),
(164, 60, 4, 2),
(165, 61, 9, 9),
(166, 62, 6, 7),
(167, 63, 6, 2),
(168, 64, 1, 10),
(169, 65, 2, 5),
(170, 66, 5, 5),
(171, 67, 1, 2),
(172, 68, 2, 9),
(173, 69, 10, 1),
(174, 70, 2, 6),
(175, 71, 3, 2),
(176, 72, 6, 3),
(177, 73, 8, 2),
(178, 74, 10, 2),
(179, 75, 6, 4),
(180, 76, 3, 5),
(181, 77, 2, 8),
(182, 78, 1, 7),
(183, 79, 10, 1),
(184, 80, 7, 2),
(186, 82, 6, 6),
(187, 83, 4, 7),
(188, 84, 5, 3),
(189, 85, 8, 6),
(190, 86, 8, 10),
(191, 87, 8, 4),
(192, 88, 3, 6),
(193, 89, 5, 3),
(194, 90, 7, 1),
(195, 91, 6, 9),
(196, 92, 5, 7),
(197, 93, 6, 6),
(198, 94, 4, 6),
(199, 95, 7, 1),
(200, 96, 7, 2),
(201, 97, 2, 2),
(202, 98, 8, 5),
(203, 99, 8, 2),
(204, 100, 8, 6),
(205, 101, 8, 5),
(206, 102, 6, 5),
(207, 103, 8, 8),
(208, 104, 10, 3),
(209, 105, 10, 7),
(210, 106, 3, 6),
(211, 107, 5, 8),
(212, 108, 2, 1),
(213, 109, 3, 6),
(214, 110, 6, 9),
(215, 111, 6, 2),
(216, 112, 1, 7),
(217, 113, 4, 8),
(218, 114, 2, 2),
(219, 115, 10, 10),
(220, 116, 7, 7),
(221, 117, 0, 1),
(223, 81, 6, 2);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `from` int(11) NOT NULL,
  `to` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE IF NOT EXISTS `modules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` int(1) NOT NULL DEFAULT '1',
  `layout` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=28 ;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `name`, `description`, `link`, `enabled`, `layout`) VALUES
(1, 'Banners', 'Manage site banners like advertisement and sponsors banners.', 'banners', 1, NULL),
(2, 'Calendar', 'Shows all your past and upcoming matches and events', 'calendar', 1, NULL),
(3, 'Comments', 'Adds user comment system to your website', 'comments', 1, NULL),
(4, 'Countries', 'Used for listing countries', 'countries', 1, NULL),
(5, 'Events', 'Add important events like LANs, tournaments...', 'events', 1, NULL),
(6, 'Forums', 'Manage your clan forums', 'forums', 1, NULL),
(7, 'Gallery', 'Manage galleries, add pictures, show your team...', 'gallery', 1, NULL),
(8, 'Games', 'Manage your list of games', 'games', 1, NULL),
(9, 'User groups', 'Categorize your users in groups', 'groups', 1, NULL),
(10, 'Comet installer', 'Used to install Comet CMS base, you should probably delete this module!', 'install', 1, NULL),
(11, 'Labels', 'Labels are categories available site wide', 'labels', 1, NULL),
(12, 'Layouts', 'Add, edit, delete template layouts. WIP', 'layouts', 1, NULL),
(13, 'Matches', 'Manage your team matches', 'matches', 1, NULL),
(14, 'Clan Statistics', 'Collects stats from your matches', 'matchstats', 1, NULL),
(15, 'Private Messages', 'Adds PM system for your users', 'messages', 1, NULL),
(16, 'Modules', 'Manages all your site modules', 'modules', 1, NULL),
(17, 'Navigation', 'Manage your main site navigation links', 'navigation', 1, NULL),
(18, 'Admin Notes', 'Used as a admin chat in dashboard', 'notes', 1, NULL),
(19, 'Opponents', 'Manage your opponents list', 'opponents', 1, NULL),
(20, 'Pages', 'Add customized static pages', 'pages', 1, NULL),
(21, 'User Permissions', 'Manage user access', 'permissions', 1, NULL),
(22, 'Posts', 'Write news, articles...', 'posts', 1, NULL),
(23, 'Team Roster', 'Manage team members', 'roster', 1, NULL),
(24, 'Site Settings', 'Manage site wide settings', 'settings', 1, NULL),
(25, 'Slider', 'Adds content slider for your frontend', 'slider', 1, NULL),
(26, 'Teams', 'Manage your squads', 'teams', 1, NULL),
(27, 'Users', 'Manage users', 'users', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `navigation`
--

CREATE TABLE IF NOT EXISTS `navigation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` enum('uri','url') COLLATE utf8_unicode_ci NOT NULL,
  `sort` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `navigation`
--

INSERT INTO `navigation` (`id`, `name`, `link`, `type`, `sort`) VALUES
(1, 'Home', 'posts', 'uri', 1),
(2, 'Matches', 'matches', 'uri', 2),
(3, 'Forums', 'forums', 'uri', 3),
(4, 'Galleries', 'gallery', 'uri', 4);

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE IF NOT EXISTS `notes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author` int(11) NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `opponents`
--

CREATE TABLE IF NOT EXISTS `opponents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `info` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `gameID` int(11) NOT NULL,
  `logo` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=21 ;

--
-- Dumping data for table `opponents`
--

INSERT INTO `opponents` (`id`, `name`, `info`, `gameID`, `logo`) VALUES
(1, 'Invictus Gaming', 'Invictus Gaming is the result of Wanda Enterprise director Wang Sicong acquiring Catastrophic Cruel Memory. The team was founded in 2011 and has DotA, Starcraft 2, and LoL teams.', 10, '1.jpg'),
(2, 'Team DK', 'Formed in 2010, Team DK, dubbed the "Galacticos" of the Chinese scene, is one of the strongest Chinese DotA teams. ', 10, '2.jpg'),
(3, 'FXOpen e-Sports', 'FXOpen e-Sports is a competitive gaming division of the forex trading company FXOpen.', 34, '3.png'),
(4, 'Tong Fu', 'TongFu Gaming is an Esports organization backed by TongFu Porridge, a Chinese food company. Created in Sept. 2011, they are currently one of the top Chinese Dota 2 teams in addition to having a LoL division.', 10, '4.png'),
(5, 'Vici Gaming', 'Vici Gaming was formed on the 21st of October, 2012 with the help of “Fengdidi”, who also had previously played in PanDarea Gaming under the name “PanPan”, handpicking highly skilled players that were high ranked on top of the Chinese DotA ladder at the time. ', 10, '5.jpg'),
(6, 'Fnatic.eu', 'Fnatic is a professional gaming organization with registered offices in England, Australia and the Netherlands.', 10, '6.png'),
(7, 'mouz', 'mousesports, often abbreviated mouz, is a German multigaming organization originally founded in 2002 as a Counter-Strike team.', 10, '7.jpg'),
(8, 'Na''Vi', 'Natus Vincere (Latin for "born to win"), often abbreviated as Na`Vi', 10, '8.jpg'),
(9, 'Team Dignitas', 'eam Dignitas is an International e-Sports team which is headquartered in Great Britain and which is among the best British gaming teams.', 10, '9.png'),
(10, 'Team Liquid', 'Team Liquid is a professional team, founded in the Netherlands in 2000. Originally a Brood War clan, the team switched to SC2 during the SC2 Beta in 2010, and became one of the most successful foreign teams', 10, '10.png'),
(11, 'Evil Geniuses', 'Evil Geniuses, often abbreviated EG, is one of the oldest North American professional gaming organizations.', 10, '11.png'),
(12, 'LGD Gaming', 'LGD Gaming is a Chinese multigaming team sponsored by Guizhou Laogandie Food. It has two Dota 2 divisions and one League of Legends division. ', 10, '12.png'),
(13, 'RattleSnake Gaming', 'RaTtLeSnAkE is a Chinese team that was formed January 18th, 2013. ', 10, '13.png'),
(14, 'Team Zenith', 'The legacy of Team Zenith goes back a long way. The original Team Zenith was formed as the clan mVp in the last quarter of 2005. In August 2006, they were christened Team Zenith after being sponsored by HP and AMD. ', 10, '14.png'),
(15, 'MUFC', 'MUFC is a Malaysian Dota 2 team formed in 2010. ', 10, '15.jpg'),
(16, 'Mineski', 'Mineski is a progaming organization, focusing on building the Philippine Esports scene by providing coverage and events within the Philippines. They have two DOTA teams and one LoL team.', 10, '16.jpg'),
(17, 'MiTH', 'MiTH (Made in Thailand) eSports is a Thai multigaming organization. Their Dota 2 team consists of TnK, LaKelz, aabBAA, sD, and r5r5. ', 10, '17.jpg'),
(18, 'Team Empire', 'Team Empire is a Russian e-Sports organization. They have gaming divisions in Battlefield: Bad Company 2, Call of Duty 4, Heroes of Newerth, WarCraft III, Counter Strike, FIFA 2010, Quake Live, Team Fortress 2, Day of Defeat: Source, and StarCraft II. Empire created their StarCraft II division in November 2010.', 10, '18.png'),
(19, 'Virtuos.pro', 'Virtus.pro is a very old Russian e-sports organization, mostly famous for their team in Counter-Strike 1.6 and their now disbanded, once world dominating DotA team. ', 10, '19.png'),
(20, 'Absolute Legends', 'Absolute Legends is a multigaming team which acquired eSahara on March 22, 2012. They have a very successful League of Legends team as well as one of the top Dota 2 teams. ', 10, '20.png');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `content` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `layout` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `navigation` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` datetime NOT NULL,
  `slug` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `access` enum('public','clan','registered') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'public',
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `body` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `teaser` mediumtext COLLATE utf8_unicode_ci,
  `image` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `author` int(11) NOT NULL,
  `label` int(11) DEFAULT NULL,
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  `clan` tinyint(1) NOT NULL DEFAULT '0',
  `state` tinyint(1) NOT NULL DEFAULT '1',
  `views` int(11) NOT NULL DEFAULT '0',
  `slug` varchar(35) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`),
  KEY `label` (`label`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `date`, `teaser`, `image`, `author`, `label`, `featured`, `clan`, `state`, `views`, `slug`) VALUES
(1, 'Video: Toby unboxing the Razer Naga Hex', '<p>asgasgContent</p>\r\n', '2013-08-08 16:05:04', ' With Razer being our great coverage partner for The Internatinoal 2013, they sent TobiWan a brand new Naga Hex mouse which is specifically designed for MOBA (ARTS) games. Key features are the additional 6 buttons on the side which are programmable for all your hotkeys for item slots or spells and that of course in Dota 2.', NULL, 1, 2, 0, 0, 1, 9, 'sagasgsagsa'),
(2, 'TI3 - TongFu vs. Fnatic.EU - Recap', '<div>The second match of <strong>The International 2013</strong> has been played as <img alt="cn" src="http://flags.gs-media.de/cn.gif" /><span style="color:#ccaa77;"><strong>TongFu</strong></span> took on <img alt="eu" src="http://flags.gs-media.de/eu.gif" /><span style="color:#ccaa77;"><strong>Fnatic.EU</strong></span> as the teams strived to move on to the second round of the winner bracket and a sure top six finish. Coming up next are two rounds of lower bracket games.</div>\r\n\r\n<p>Fnatic went for an aggressive trilane which did ok until the Fnatic supports rotated to mid in order to disrupt the smoke gank they had realized TongFu was attempting on H4nn1 at the mid lane. As n0tail walked into the TongFu supports he ended up forfeiting his life as well as Fly going down as well, giving TongFu the 2-0 early lead. This was further compounded by a Courier kill in favour of TongFu 6 minutes in.</p>\r\n\r\n<div><br />\r\nWhile H4nn1 had been dominating the mid lane, two ganks on him from TongFu were quickly eating away at the one thing that was working out for Fnatic. It wasn''t until 13 minutes in that Fnatic got themselves on the board with a kill on an over aggressive Hao, however losing Fly soon after at the mid lane, making it 6-1 in favour of TongFu.<br /><br />\r\nFnatic used the Treant protector to offset the damage done to the towers, however TongFu continued to apply pressure on the towers, zoning Fnatic out and picking up a Roshan 17 minutes in with no trouble and going for a siege on the middle tier 3. The Lifestealer and Puck combo allowed TongFu, to take a highground fight and the melee baracks before being pushed out of their opponents base.<br /><br />\r\nTongFu showed that they were too far ahead, blowing up heroes they picked off almost instantly and proceeding to push. Fnatic attempted to defend as TongFu laid waste to their top tier 3 tower, but were unable to do so and were forced to call the GG.<br /><br /><img alt="" src="http://store.cdn.gamesports.net/24000/24913.jpg" /><div><em>Game 1 End Screen</em><br />\r\n </div>\r\nFnatic attempted to go for the first blood on the warding Visage, but were unable to finish him off. TongFu, on the other hand, quickly turned around and used the first haste rune to set up the first blood on the Venomancer. Fnatic replied with a kill of their own on the middle Storm Spirit with the help of Chen''s Troll.<br /><br />\r\nFnatic seemed to be losing control of their lanes. They aimed their focus on shutting down mid, in turn, their Lifestealer had nearly no opportunity to farm against an aggressive tri lane.<br /><br />\r\nBeautiful initiation on the bottom lane brings Fnatic back into the game, as they successfully took down 3 and picked up the first tower of the game 8 minutes into the game, allowing Fnatic to tip the Gold Graph back in their favor.<br /><br />\r\nFnatic kept gaining momentum and a huge smoke gank allowed them to capitalize on their teamfight potential, focusing down Gyrocopter first and them securing themselves a full team wipe and a tier 2 tower, losing just their 2 supports 18 minutes in.<br /><br />\r\nFnatic had started giving away space for TongFu to farm and TongFu were able to pick up an uncontested Roshan at 24 minutes, giving the Aegis to their Storm Spirit that has been punished by Puck and Lifestealer combo ganks throughout the game so far.<br /><br />\r\nTrying to gank again, Fnatic''s gank backfired and they ended up losing Puck and Chen, with Lifestealer barely escaping thanks to Chen''s sendback, which allowed Hao''s Gyrocopter finish his Butterfly on the 27th minute.<br /><br />\r\nAs the next Roshan came up, both teams had the same idea, looking to catch the opposing team off-guard, H4nn1 was the first person to act, having a nearly immaculate initiation into the entire TongFu team, the fight saw both teams trade an immense amount of kills and using a lot of buybacks. The fight looked like it went in TongFu''s favor and the Chinese decided to take the available Roshan, which allowed Fnatic to get a jump on them and secure the Aegis for Trixi''s Nature''s Prophet.<br /><br />\r\nAs they game went past the 45 minute mark, both teams have started to show much caution. However, while Fnatic were searching for another gank in the wrong place, TongFu seized the window of opportunity to quickly take the Cheese Roshan, giving the Cheese to an already stockpiled Gyrocopter, while the Aegis went to Storm Spirit. Shortly after, TongFu went for a smoke gank and successfully took down Fnatic''s key Lifestealer. TongFu then proceeded to take the game to high ground, taking down the entire Fnatic team and killing them off after buyback. TongFu went straight for the Ancient, which quickly fell, ending the series 2-0 for TongFu.<br /><br /><img alt="" src="http://store.cdn.gamesports.net/24000/24915.jpg" /><div><em>Game 2 End Screen</em></div>\r\n</div>\r\n', '2013-08-09 11:21:48', ' The second match of The International 2013 has been played as TongFu took on Fnatic.EU as the teams strived to move on to the second round of the winner bracket and a sure top six finish. Coming up next are two rounds of lower bracket games.', NULL, 1, 3, 0, 0, 1, 107, 'ti3-tongfu-vs-fnaticeu-recap');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `clanname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `clantag` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `sitename` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `adminmail` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `comments` int(11) NOT NULL DEFAULT '1',
  `commentsdelay` int(11) DEFAULT NULL,
  `closed` int(11) NOT NULL DEFAULT '0',
  `closedmsg` mediumtext COLLATE utf8_unicode_ci,
  `analytics` mediumtext COLLATE utf8_unicode_ci,
  `theme` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `layout` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `homemodule` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `clanname`, `clantag`, `sitename`, `adminmail`, `comments`, `commentsdelay`, `closed`, `closedmsg`, `analytics`, `theme`, `layout`, `homemodule`, `date`) VALUES
(1, 'Team Comet', 'TC', 'Clan Comet v0.4', 'admin@local.hr', 1, 3, 0, 'Site is down for maintenance', '', 'vintage', 'default', 'posts', '2013-08-08 11:53:31');

-- --------------------------------------------------------

--
-- Table structure for table `site_views`
--

CREATE TABLE IF NOT EXISTS `site_views` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip` int(32) NOT NULL,
  `user` int(11) DEFAULT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `site_views`
--

INSERT INTO `site_views` (`id`, `ip`, `user`, `date`) VALUES
(1, 2130706433, 1, '2013-08-12 11:18:07'),
(2, 0, NULL, '2013-08-13 14:29:07'),
(3, 0, 8, '2013-08-06 17:07:08');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE IF NOT EXISTS `slider` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE IF NOT EXISTS `teams` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `games` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `banner` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `logo` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `countryID` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `name`, `description`, `games`, `banner`, `logo`, `countryID`) VALUES
(1, 'Test Squad 1', 'Lorem Ipsum je jednostavno probni tekst koji se koristi u tiskarskoj i slovoslagarskoj industriji.', '9', NULL, NULL, 55),
(2, 'Test Squad 2', 'Lorem Ipsum je jednostavno probni tekst koji se koristi u tiskarskoj i slovoslagarskoj industriji.', '10', NULL, NULL, 236),
(4, 'Test', '', NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `teams_members`
--

CREATE TABLE IF NOT EXISTS `teams_members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `team_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `position` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Dumping data for table `teams_members`
--

INSERT INTO `teams_members` (`id`, `team_id`, `user_id`, `position`) VALUES
(1, 1, 1, NULL),
(2, 1, 2, NULL),
(3, 1, 3, NULL),
(4, 1, 7, NULL),
(5, 2, 2, NULL),
(6, 2, 3, NULL),
(7, 2, 5, NULL),
(8, 2, 7, NULL),
(9, 3, 2, NULL),
(10, 3, 3, NULL),
(11, 3, 4, NULL),
(12, 3, 7, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varbinary(16) NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `salt` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `activation_code` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `forgotten_password_code` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dob` datetime DEFAULT NULL,
  `gender` enum('male','female') COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` int(11) DEFAULT NULL,
  `avatar` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `about` longtext COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `dob`, `gender`, `country`, `avatar`, `about`) VALUES
(1, '\0\0', 'admin', '$2a$08$.oU754P7IPUrepTZAEfKcOPMh4M2p5mr7loOn8EyG2KbGJi1PSvWi', NULL, 'admin@ekattor.com', NULL, NULL, NULL, 'ff700cffb1a1af965196ff661b973a8ca124aa0c', 1372526584, 1376045925, 1, 'John', 'Doe', '2013-08-09 00:00:00', 'male', 55, NULL, 'Let me start off by saying that if you are looking for practical applications of CSS that could apply to any website and improve usability, this isn’t the article for you. If you are looking for creative implementations of code for comedic effect, and possibly inspiration for your next ridiculous project, then welcome. '),
(2, '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', 'user 1', '$2a$08$tYcoS2mxfskYYM8LKF8N2.ZDyGD8BV2XgfggYr27swZJjXryz5wZe', NULL, 'user1@user.com', '3d05921bf0929b655e05067aa74442a3836e50f8', NULL, NULL, NULL, 1375619980, 1375619980, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', 'user 2', '$2a$08$7addHMxY18QACi7BfnQVcOTAfdiCAUGz/1/nrhpsJ1mi6XxYttrUe', NULL, 'user2@user.com', '8917088a8c93f4647ce9683a793e2b39f0391ca3', NULL, NULL, NULL, 1375619993, 1375619993, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', 'user 3', '$2a$08$J.RhflHq7sFSBZvJ8Eb3eOGXGVGoQCuJP2vEPJb/lf7blSIwdSsV.', NULL, 'user3@user.com', '2546080d48f7d3fbdd8f1e9092a8d3849c7d93d2', NULL, NULL, NULL, 1375620005, 1375620005, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', 'user 4', '$2a$08$71g31b4L.c..kTDBNa1UyOniVm8rYgPUAVQaLIPzoeyXip8HR/dBO', NULL, 'user4@user.com', '35e0ccd2be501b3e1f2b22615163cf61eb8be2fa', NULL, NULL, NULL, 1375620017, 1375620017, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', 'user 5', '$2a$08$P62rxcrDU8or/33f5ey/beVvMtg6gLalTb.I1KQVg28c3QfEDcjqq', NULL, 'user5@user.com', 'c963cf680c1251f5ac0e758f859cd0cd7df97dc7', NULL, NULL, NULL, 1375620026, 1375620026, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', 'user 6', '$2a$08$tsw3V9htSaBTItv0BcAxQeqtL4zOT6p7MUkyQQ4gVj98k74ELgrX2', NULL, 'user6@user.com', 'f731c6fd8c603dfb509d980b78e3583f95692140', NULL, NULL, NULL, 1375620037, 1375620037, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', 'acctest', '$2a$08$.M9Jr15A92rLj0bcEUYIteUE80Wq7R0bFSZPKQCWLRBpRBOgCewMa', NULL, 'admin@t.te', 'c328386572691280a62b3ad044a3163dbcbf4f4e', NULL, NULL, '4dd23277f04575b86032f672d1f00c700f5a0720', 1375808761, 1375869479, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE IF NOT EXISTS `users_groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` mediumint(8) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 2),
(4, 4, 2),
(5, 5, 2),
(6, 6, 2),
(7, 7, 2),
(8, 8, 2),
(9, 8, 4);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
