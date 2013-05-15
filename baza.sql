-- phpMyAdmin SQL Dump
-- version 3.5.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 15, 2013 at 12:30 PM
-- Server version: 5.5.24-log
-- PHP Version: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `poster_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `module` varchar(50) NOT NULL,
  `module_link` varchar(50) NOT NULL COMMENT 'example: ID of show posts',
  `parent_id` int(11) DEFAULT NULL COMMENT 'for multilevel comments',
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `poster_id`, `content`, `module`, `module_link`, `parent_id`, `date`) VALUES
(1, 1, 'Note: CodeIgniter does not require you to use this class since using pure PHP in your view pages lets them run a little faster. However, some developers prefer to use a template engine if they work with designers who they feel would find some confusion working with PHP.', 'matches', '17', NULL, '0000-00-00 00:00:00'),
(2, 1, 'Note: CodeIgniter does not require you to use this class since using pure PHP in your view pages lets them run a little faster. Hofind some confusion working with PHP.', 'matches', '17', NULL, '0000-00-00 00:00:00'),
(3, 1, 'sagfasgasgasgasgasg', 'drugimodul', '17', NULL, '0000-00-00 00:00:00'),
(4, 1, 'dshsdhsdhsdhsdh', 'matches', '2', NULL, '0000-00-00 00:00:00'),
(13, 1, 'Testis', 'matches', '1', NULL, '0000-00-00 00:00:00'),
(14, 1, 'Testis', 'matches', '1', NULL, '0000-00-00 00:00:00'),
(20, 1, 'hide-for-smallhide-for-smallhide-for-smallhide-for-smallhide-for-smallhide-for-smallhide-for-smallhide-for-smallhide-for-smallhide-for-smallhide-for-smallhide-for-smallhide-for-small', 'matches', '21', NULL, '2013-05-05 17:14:08'),
(32, 1, 'fhdfh', 'posts', '1', NULL, '2013-05-06 12:17:31'),
(33, 1, 'Comment test', 'matches', '20', NULL, '2013-05-08 14:57:50');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `code` char(2) DEFAULT NULL,
  `name` varchar(80) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=251 ;

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
-- Table structure for table `forum_forums`
--

CREATE TABLE IF NOT EXISTS `forum_forums` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `date` datetime NOT NULL,
  `private` int(11) NOT NULL DEFAULT '0',
  `clan` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `forum_forums`
--

INSERT INTO `forum_forums` (`id`, `label`, `name`, `description`, `date`, `private`, `clan`) VALUES
(1, 5, 'Test Forum2', 'Laboris ullamco laborum nisi, id qui dreamcatcher photo booth stumptown mixtape wayfarers. Farm-to-table etsy meggings pug est intelligentsia.2', '2013-05-08 11:37:33', 0, 0),
(2, 9, 'Offtopic', 'Laboris ullamco laborum nisi, id qui dreamcatcher photo booth stumptown mixtape wayfarers. Farm-to-table etsy meggings pug est intelligentsia.', '2013-05-08 11:42:31', 0, 0),
(3, 9, 'General discussion', 'Laboris ullamco laborum nisi, id qui dreamcatcher photo booth stumptown mixtape wayfarers. Farm-to-table etsy meggings pug est intelligentsia.', '2013-05-08 11:42:42', 0, 0),
(4, 9, 'General news', '', '2013-05-08 12:06:42', 0, 0),
(9, 9, 'Moderators only', '', '2013-05-11 20:25:59', 0, 0),
(10, 9, 'Testni Forum #3', '', '2013-05-12 17:46:48', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `forum_moderators`
--

CREATE TABLE IF NOT EXISTS `forum_moderators` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `forum` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `forum_moderators`
--

INSERT INTO `forum_moderators` (`id`, `forum`, `user`) VALUES
(1, 8, 3),
(2, 8, 5),
(3, 8, 7),
(4, 9, 2),
(5, 9, 10),
(6, 9, 11),
(7, 10, 5),
(8, 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `forum_replies`
--

CREATE TABLE IF NOT EXISTS `forum_replies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `topic` int(11) NOT NULL,
  `poster` int(11) NOT NULL,
  `content` text NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `forum_replies`
--

INSERT INTO `forum_replies` (`id`, `topic`, `poster`, `content`, `date`) VALUES
(1, 37, 1, 'Hey, I’m Ben Edmunds. I’m passionate about building and leading teams to create awesome web and mobile apps. I’ve written a few open source libraries and have had the pleasure of being involved with some interesting projects. You can see my work on GitHub.\r\nHey, I’m Ben Edmunds. I’m passionate about building and leading teams to create awesome web and mobile apps. I’ve written a few open source libraries and have had the pleasure of being involved with some interesting projects. You can see my work on GitHub.\r\nHey, I’m Ben Edmunds. I’m passionate about building and leading teams to create awesome web and mobile apps. I’ve written a few open source libraries and have had the pleasure of being involved with some interesting projects. You can see my work on GitHub.\r\n', '2013-05-14 14:10:06'),
(2, 37, 1, 'Podcast\r\n\r\nCheck out the PHP Town Hall podcast to hear me and Phil Sturgeon rant about life, liberty, and the pursuit of decent code.\r\n\r\n    Episode 6 - PSR-X and the Mexican Standoff   04.19.2013\r\n    Episode 5 - PHPness Gate, Sexism and Mental Illness   03.03.2013\r\n    Episode 4: PHP''s Vision, Beards, and Cake   02.15.2013\r\n', '2013-05-14 14:10:18'),
(3, 39, 1, '![IMAGE](http://i.imgur.com/oqerAVW.jpg "")', '2013-05-15 12:00:08');

-- --------------------------------------------------------

--
-- Table structure for table `forum_topics`
--

CREATE TABLE IF NOT EXISTS `forum_topics` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `forum` int(11) NOT NULL,
  `author` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `date` datetime NOT NULL,
  `sticky` int(1) DEFAULT NULL,
  `content` text NOT NULL,
  `views` int(11) DEFAULT '0',
  `locked` int(11) NOT NULL DEFAULT '0',
  `last_modified` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `forum_topics`
--

INSERT INTO `forum_topics` (`id`, `forum`, `author`, `title`, `date`, `sticky`, `content`, `views`, `locked`, `last_modified`) VALUES
(35, 3, 11, 'sdgdsg', '2013-05-12 15:47:19', 0, 'dsgdsg', 1, 0, '2013-05-12'),
(36, 3, 11, 'asgasg', '2013-05-12 15:54:50', 0, 'asgasg', 4, 0, '2013-05-12'),
(37, 3, 1, 'Dis is srs topic!', '2013-05-14 13:48:29', 0, 'Hey, I’m Ben Edmunds. I’m passionate about building and leading teams to create awesome web and mobile apps. I’ve written a few open source libraries and have had the pleasure of being involved with some interesting projects. You can see my work on GitHub.\r\n', 78, 0, '2013-05-14'),
(38, 3, 1, 'Markdown test', '2013-05-15 11:48:57', 0, '**Cool header**\r\n\r\nI wanna know that how to _disable_ the grabber in the textarea!\r\n\r\nI mean that triangle thing which appears in the right-bottom corner of the textarea.\r\n\r\n> Please help me out!\r\n\r\nThanks in advance!', 1, 0, '2013-05-15'),
(39, 3, 1, 'Slika!', '2013-05-15 11:51:32', 0, '![Image](http://i.imgur.com/rI6o1rH.jpg "Title")', 2, 0, '2013-05-15');

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE IF NOT EXISTS `games` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `shortcode` varchar(4) NOT NULL,
  `icon` varchar(10) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `shortcode` (`shortcode`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

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
(33, 'Battlefield Bad Company 2', 'bfbc', 'bfbc.gif');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  `permissionID` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`, `permissionID`) VALUES
(1, 'admin', 'Administrator', 0),
(2, 'members', 'General User', 0),
(6, 'clan', 'Clan members', 0),
(7, 'moderators', 'Can edit, delete forum posts, make announcements, make sticky topics...', 0);

-- --------------------------------------------------------

--
-- Table structure for table `group_perms`
--

CREATE TABLE IF NOT EXISTS `group_perms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `permID` int(11) NOT NULL,
  `moduleID` int(11) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  `public` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `group_perms`
--

INSERT INTO `group_perms` (`id`, `permID`, `moduleID`, `admin`, `public`) VALUES
(1, 1, 1, 1, 1),
(2, 1, 2, 1, 1),
(3, 1, 5, 1, 1),
(4, 1, 7, 1, 1),
(5, 2, 1, 0, 1),
(6, 2, 2, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `labels`
--

CREATE TABLE IF NOT EXISTS `labels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `banner` varchar(30) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `labels`
--

INSERT INTO `labels` (`id`, `name`, `description`, `banner`) VALUES
(5, 'Articles', 'Nostrud vice cray, marfa tonx readymade nesciunt ennui. Fugiat helvetica cosby sweater laboris duis. ', ''),
(6, 'Coverage', 'Nostrud vice cray, marfa tonx readymade nesciunt ennui. Fugiat helvetica cosby sweater laboris duis. ', ''),
(7, 'Clan News', 'Quinoa leggings mumblecore cillum ea, direct trade duis culpa chambray banh mi Austin 90''s PBR.', '0'),
(8, 'Site News', 'Laboris ullamco laborum nisi, id qui dreamcatcher photo booth stumptown mixtape wayfarers. Farm-to-table etsy meggings pug est intelligentsia.', '0'),
(9, 'Private forums', '', '0'),
(10, 'Public foums', '', '0');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE IF NOT EXISTS `login_attempts` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varbinary(16) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  `report` text NOT NULL,
  `status` smallint(2) NOT NULL,
  `opponent-players` text,
  `team-players` text NOT NULL,
  `matchlink` varchar(100) NOT NULL,
  `type` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `matches`
--

INSERT INTO `matches` (`id`, `team`, `opponent`, `date`, `game`, `report`, `status`, `opponent-players`, `team-players`, `matchlink`, `type`) VALUES
(17, 2, 3, '2013-03-18 12:00:00', 6, 'One of the nice things that we get for free when using async event handling is the ability to monitor the progress of the file read; useful for large files, catching errors, and figuring out when a read is complete.\r\n\r\nThe onloadstart and onprogress events can be used to monitor the progress of a read.\r\n\r\nThe example below demonstrates displaying a progress bar to monitor the status of a read. To see the progress indicator in action, try a large file or one from a remote drive.0', 2, 'xboct,dendi,blyat', '2,3,4', 'ss', 2),
(20, 2, 7, '2013-05-01 12:23:00', 10, '<p>Mustache carles sriracha, flannel four loko odio accusamus scenester in nisi keytar. Pug street art nulla echo park twee. Before they sold out bushwick iphone, commodo swag banksy american apparel neutra chambray kale chips elit narwhal exercitation ut pour-over. Chillwave food truck accusamus next level vero delectus tattooed aesthetic, nostrud pariatur portland art party kale chips yr. Placeat carles etsy, mustache pop-up tofu reprehenderit scenester iphone ea terry richardson VHS esse enim plaid. Carles narwhal vero ethical magna pariatur. Jean shorts cillum fingerstache exercitation chambray food truck, ex aute bushwick art party sunt commodo est.</p>\r\n\r\n<blockquote>\r\n<p>Mustache carles sriracha, flannel four loko odio accusamus scenester in nisi keytar. Pug street art nulla echo park twee. Before they sold out bushwick iphone, commodo swag banksy american apparel neutra chambray kale chips elit narwhal exercitation ut pour-over.</p>\r\n</blockquote>\r\n\r\n<p><strong>Mustache carles sriracha, flannel four loko odio accusamus scenester in nisi keytar.</strong> Pug street art nulla echo park twee. Before they sold out bushwick iphone, commodo swag banksy american apparel neutra chambray kale chips elit narwhal exercitation ut pour-over. Chillwave food truck accusamus next level vero delectus tattooed aesthetic, nostrud pariatur portland art party kale chips yr. Placeat carles etsy, mustache pop-up tofu reprehenderit scenester iphone ea terry richardson VHS esse enim plaid. Carles narwhal vero ethical magna pariatur. Jean shorts cillum fingerstache exercitation chambray food truck, ex aute bushwick art party sunt commodo est.</p>\r\n', 0, 'lorem, ipsum, dolor, sit, amet', '', 'http://kami-design.com/', 4),
(21, 5, 3, '2013-05-02 12:23:00', 10, '<p>Report content</p>\r\n', 0, '', '', '', 0),
(22, 5, 5, '2013-05-02 12:23:00', 2, '<p>Report content</p>\r\n', 0, '', '', '', 0),
(23, 2, 7, '2013-05-02 12:24:00', 11, '<p>Report content</p>\r\n', 0, '', '', '', 0),
(24, 5, 6, '2013-05-10 10:00:00', 10, '<p>Report content</p>\r\n', 1, '', '4,9,10', '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `matches_files`
--

CREATE TABLE IF NOT EXISTS `matches_files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `match_id` int(11) NOT NULL,
  `file` varchar(30) NOT NULL,
  `type` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `matches_files`
--

INSERT INTO `matches_files` (`id`, `match_id`, `file`, `type`) VALUES
(1, 17, '17_1_1362660242.jpg', 'screenshot'),
(2, 17, '17_2_1362660242.jpg', 'screenshot'),
(3, 17, '17_3_1362660242.jpg', 'screenshot'),
(4, 17, '17_4_1362660242.jpg', 'screenshot'),
(5, 20, '20_1_1367413556.jpg', 'screenshot'),
(6, 20, '20_2_1367413556.jpg', 'screenshot'),
(7, 20, '20_3_1367413556.jpg', 'screenshot'),
(8, 20, '20_4_1367413556.jpg', 'screenshot');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `matches_scores`
--

INSERT INTO `matches_scores` (`id`, `match`, `opponent`, `team`) VALUES
(1, 2, 1, 2),
(2, 2, 3, 4),
(3, 2, 5, 6),
(4, 3, 32, 12),
(5, 3, 23, 24),
(6, 3, 22, 21),
(7, 4, 12, 4),
(8, 4, 2, 5),
(9, 4, 4, 11),
(10, 5, 12, 10),
(11, 5, 10, 5),
(12, 6, 1, 1),
(13, 7, 23, 23),
(14, 8, 22, 22),
(15, 9, 2, 2),
(16, 10, 2, 2),
(17, 11, 2, 2),
(18, 12, 2, 2),
(19, 13, 3, 3),
(20, 14, 2, 2),
(21, 15, 2, 2),
(22, 16, 3, 3),
(23, 17, 2, 2),
(24, 17, 3, 1),
(25, 18, 0, 0),
(26, 18, 12, 12),
(27, 18, 1, 1),
(28, 19, 8, 12),
(32, 21, 1, 1),
(33, 22, 12, 10),
(34, 22, 10, 12),
(35, 22, 10, 12),
(36, 23, 1, 0),
(37, 23, 1, 0),
(38, 24, 0, 0),
(39, 20, 1, 0),
(40, 20, 0, 1),
(41, 20, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE IF NOT EXISTS `modules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `link` varchar(255) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `name`, `description`, `link`, `status`) VALUES
(1, 'Posts', '', 'posts', 1),
(2, 'Users', '', 'users', 1),
(5, 'Matches', '', 'matches', 1),
(7, 'Team', '', 'team', 1);

-- --------------------------------------------------------

--
-- Table structure for table `opponents`
--

CREATE TABLE IF NOT EXISTS `opponents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `info` text NOT NULL,
  `gameID` int(11) NOT NULL,
  `logo` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `opponents`
--

INSERT INTO `opponents` (`id`, `name`, `info`, `gameID`, `logo`) VALUES
(3, 'Team Liquid', 'In December 2012, Team Liquid entered the Dota 2 scene by picking up a North American squad consisting of FLUFFNSTUFF, ixmike88, Bulba, Korok, and TC.', 10, '31.png'),
(5, 'Na''Vi', 'Natus Vincere (Na`Vi) is a Ukrainian multigaming e-Sports organization. It is the first team in Counter-Strike history to win three major tournaments in one calendar year - Intel Extreme Masters, Electronic Sports World Cup and World Cyber Games 2010. In 2011, Na`Vi.DotA won the $1 000 000 grand prize at The International, the first ever DotA 2 tournament.', 10, '5.png'),
(6, 'Fnatic.eu', 'The Fnatic Team is a professional video gaming team, consisting of players from across the globe who all make a living through competing in video game tournaments.\r\n\r\nFnatic is considered to have world class squads in Counter-Strike, StarCraft II, League of Legends, Dota 2, ShootMania: Storm and Call of Duty. ', 11, '6.jpg'),
(7, 'Evil Geniuses', 'Founded in 1999, Evil Geniuses (Team EG) have grown to become a leading new media agency which specializes in contracting pro gamers, executing online and offline broadcasts, and developing unique marketing initiatives aimed at attracting and influencing gamers worldwide.With support from popular brands such as Intel, Monster Energy, Kingston HyperX, and others, EG are North America’s premier professional gaming team and a world leader in e-sports. Players and teams within EG, such as Justin “JWong” Wong, Greg “IdrA” Fields, and Isaac “Azael” Cummings-Bentley, have brought home championship trophies from every major gaming tournament circuit in the world and continue to be influential leaders of gamers everywhere.', 10, '7.jpg'),
(8, 'Invictus Gaming', 'Invictus Gaming is a platform focused on e-sports and other business about e-sports. Many top-level professional gamers worked for it. One aim of IG is to become the best e-sports club in the world. At present, IG have already integrated all the members of Dota 2, SC2, LOL from CCM club. After several years’ observation, e-sports industry was found to be in a chaotic period. Events like club closes down due to the poor operation, wage arrears, irregular competition, reward arrears always happen. The foundation of IG will stop these from happening again. It is a sign that the chaotic period will end in the near future. IG will create a upscale platform for its gamer. The irregular training, unreasonable payment, reward arrears and other problems will be eliminated and players can get a comprehensive development. Besides, IG will give its player more opportunities to attend commercial avtivities to maximize their values and share benefits with IG. IG plans to enter into campus and periodically hold a match for the e-sports fan to compete with the club stars. To respond to e-sports fans’ support, IG club and its players will closely contact with fans through blog, QQ, YY etc. And challenge match, teaching vedio, award-winning program will be publicly reached. ', 10, '8.jpg'),
(9, 'The Alliance', 'In April 2013, Swedish team No Tidehunter (consisting of s4, AdmiralBulldog, Akke, EGM, and Loda) announced the creation of The Alliance with StarCraft II player NaNiwa.', 10, '9.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `body` text NOT NULL,
  `date` datetime NOT NULL,
  `teaser` text NOT NULL,
  `author` int(11) NOT NULL,
  `label` int(11) DEFAULT NULL,
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  `clan` tinyint(1) NOT NULL DEFAULT '0',
  `state` tinyint(1) NOT NULL DEFAULT '1',
  `views` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `label` (`label`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `date`, `teaser`, `author`, `label`, `featured`, `clan`, `state`, `views`) VALUES
(1, 'Lorem ipsum dolor sit amet', '<p>These are examples of different ways to use the Foundation Grid. Foundation uses <code>box-sizing: border-box</code> so that borders and padding do not affect the overall width of the columns, making the math dead-simple. Since Foundation is mobile-first, we''ll stack content by default. You do have access to an entirely separate small grid to use up to the 768px breakpoint. This means you can create some pretty complex layouts and even drop columns if you want.These are examples of different ways to use the Foundation Grid. Foundation uses <code>box-sizing: border-box</code> so that borders and padding do not affect the overall width of the columns, making the math dead-simple. Since Foundation is mobile-first, we''ll stack content by default. You do have access to an entirely separate small grid to use up to the 768px breakpoint. This means you can create some pretty complex layouts and even drop columns if you want.These are examples of different ways to use the Foundation Grid. Foundation uses <code>box-sizing: border-box</code> so that borders and padding do not affect the overall width of the columns, making the math dead-simple. Since Foundation is mobile-first, we''ll stack content by default. You do have access to an entirely separate small grid to use up to the 768px breakpoint. This means you can create some pretty complex layouts and even drop columns if you want.</p>\r\n', '2013-05-02 11:07:33', 'Create powerful multi-device layouts quickly and easily with the 12-column, nestable Foundation grid. If you''re familiar with grid systems, you''ll feel right at home. If not, you''ll learn quickly.', 1, 6, 0, 0, 1, 62),
(2, 'Post title 2', '<p>Fanny pack cillum try-hard tempor proident, mumblecore nostrud deserunt godard semiotics fugiat chillwave. Small batch id whatever put a bird on it gluten-free, readymade vero. Mustache cosby sweater street art cupidatat labore culpa ugh pariatur, kogi chillwave banksy umami aliquip enim. Bespoke ad stumptown deep v, vero 3 wolf moon est gluten-free pitchfork trust fund quis kogi. Sriracha sed proident mumblecore lo-fi. Hashtag dolor letterpress chambray odd future freegan, williamsburg dreamcatcher biodiesel duis. Occupy ex retro, pinterest authentic vice mcsweeney''s synth readymade williamsburg cosby sweater tonx.</p>\r\n', '2013-05-02 11:08:03', 'Foundation is developed in Sass, which is powerful CSS pre-processor that helps you write cleaner, more organized, CSS that you can more easily maintain over time without the typical headaches of vanilla CSS. On top of our minimal styling, we''ve written powerful Javascript plugins that will make useful interactions easier to implement across screen sizes.', 1, 6, 0, 0, 1, 48),
(3, 'CK Editor Example', '<p> <strong>Apollo 11</strong></p>\r\n\r\n<p><strong>Apollo 11</strong> was the spaceflight that landed the first humans, Americans <a href="http://en.wikipedia.org/wiki/Neil_Armstrong">Neil Armstrong</a> and <a href="http://en.wikipedia.org/wiki/Buzz_Aldrin">Buzz Aldrin</a>, on the Moon on July 20, 1969, at 20:18 UTC. Armstrong became the first to step onto the lunar surface 6 hours later on July 21 at 02:56 UTC.</p>\r\n\r\n<p>Armstrong spent about <span style="text-decoration:line-through;">three and a half</span> two and a half hours outside the spacecraft, Aldrin slightly less; and together they collected 47.5 pounds (21.5 kg) of lunar material for return to Earth. A third member of the mission, <a href="http://en.wikipedia.org/wiki/Michael_Collins_(astronaut)">Michael Collins</a>, piloted the <a href="http://en.wikipedia.org/wiki/Apollo_Command/Service_Module">command</a> spacecraft alone in lunar orbit until Armstrong and Aldrin returned to it for the trip back to Earth.</p>\r\n\r\n<h3>Broadcasting and <em>quotes</em></h3>\r\n\r\n<p>Broadcast on live TV to a world-wide audience, Armstrong stepped onto the lunar surface and described the event as:</p>\r\n\r\n<blockquote>\r\n<p>One small step for [a] man, one giant leap for mankind.</p>\r\n</blockquote>\r\n\r\n<p>Apollo 11 effectively ended the <a href="http://en.wikipedia.org/wiki/Space_Race">Space Race</a> and fulfilled a national goal proposed in 1961 by the late U.S. President <a href="http://en.wikipedia.org/wiki/John_F._Kennedy">John F. Kennedy</a> in a speech before the United States Congress:</p>\r\n\r\n<blockquote>\r\n<p>[...] before this decade is out, of landing a man on the Moon and returning him safely to the Earth.</p>\r\n</blockquote>\r\n\r\n<h3>Technical details</h3>\r\n\r\n<table border="1" cellpadding="5" cellspacing="0"><caption><strong>Mission crew</strong></caption>\r\n <thead><tr><th scope="col">Position</th>\r\n   <th scope="col">Astronaut</th>\r\n  </tr></thead><tbody><tr><td>Commander</td>\r\n   <td>Neil A. Armstrong</td>\r\n  </tr><tr><td>Command Module Pilot</td>\r\n   <td>Michael Collins</td>\r\n  </tr><tr><td>Lunar Module Pilot</td>\r\n   <td>Edwin "Buzz" E. Aldrin, Jr.</td>\r\n  </tr></tbody></table><p>Launched by a <strong>Saturn V</strong> rocket from <a href="http://en.wikipedia.org/wiki/Kennedy_Space_Center">Kennedy Space Center</a> in Merritt Island, Florida on July 16, Apollo 11 was the fifth manned mission of <a href="http://en.wikipedia.org/wiki/NASA">NASA</a>''s Apollo program. The Apollo spacecraft had three parts:</p>\r\n\r\n<ol><li><strong>Command Module</strong> with a cabin for the three astronauts which was the only part which landed back on Earth</li>\r\n <li><strong>Service Module</strong> which supported the Command Module with propulsion, electrical power, oxygen and water</li>\r\n <li><strong>Lunar Module</strong> for landing on the Moon.</li>\r\n</ol><p>After being sent to the Moon by the Saturn V''s upper stage, the astronauts separated the spacecraft from it and travelled for three days until they entered into lunar orbit. Armstrong and Aldrin then moved into the Lunar Module and landed in the <a href="http://en.wikipedia.org/wiki/Mare_Tranquillitatis">Sea of Tranquility</a>. They stayed a total of about 21 and a half hours on the lunar surface. After lifting off in the upper part of the Lunar Module and rejoining Collins in the Command Module, they returned to Earth and landed in the <a href="http://en.wikipedia.org/wiki/Pacific_Ocean">Pacific Ocean</a> on July 24.</p>\r\n\r\n<hr /><p><small>Source: <a href="http://en.wikipedia.org/wiki/Apollo_11">Wikipedia.org</a></small></p>\r\n', '2013-05-06 12:25:55', 'Apollo 11 was the spaceflight that landed the first humans, Americans Neil Armstrong and Buzz Aldrin, on the Moon on July 20, 1969, at 20:18 UTC. Armstrong became the first to step onto the lunar surface 6 hours later on July 21 at 02:56 UTC.', 1, 5, 0, 0, 1, 63);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `clanname` varchar(50) NOT NULL,
  `visits` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `clanname`, `visits`) VALUES
(1, 'Team xQute', 0);

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE IF NOT EXISTS `teams` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `games` varchar(50) NOT NULL,
  `banner` varchar(20) DEFAULT NULL,
  `logo` varchar(20) DEFAULT NULL,
  `type` tinyint(1) NOT NULL,
  `countryID` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `name`, `description`, `games`, `banner`, `logo`, `type`, `countryID`) VALUES
(2, 'Test Team', 'Quis synth messenger bag vegan meggings nihil locavore, ad polaroid blue bottle. 3 wolf moon labore etsy tonx try-hard mollit, cray sunt VHS brooklyn wayfarers street art four loko aliqua velit. ', '2', '', '21.jpg', 0, 55),
(5, 'Test team 2', 'Nulla tousled next level, sustainable kogi locavore eu keytar organic elit williamsburg. Nulla vinyl retro dolor, artisan semiotics direct trade sustainable mollit.', '10', '', '5.jpg', 0, 55),
(6, 'Counter Strike Squad', 'CodeIgniter uses a modified version of the Active Record Database Pattern. This pattern allows information to be retrieved, inserted, and updated in your database with minimal scripting. In some cases only one or two lines of code are necessary to perform a database action. CodeIgniter does not require that each database table be its own class file. It instead provides a more simplified interface.', '6,7,8', NULL, NULL, 1, 83);

-- --------------------------------------------------------

--
-- Table structure for table `teams_members`
--

CREATE TABLE IF NOT EXISTS `teams_members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `team_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `position` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `teams_members`
--

INSERT INTO `teams_members` (`id`, `team_id`, `user_id`, `position`) VALUES
(25, 5, 3, NULL),
(26, 5, 4, NULL),
(27, 5, 8, NULL),
(28, 5, 9, NULL),
(29, 5, 10, NULL),
(35, 2, 2, NULL),
(36, 2, 3, NULL),
(37, 2, 4, NULL),
(38, 2, 5, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varbinary(16) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(80) NOT NULL,
  `salt` varchar(40) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `dob` datetime DEFAULT NULL,
  `gender` varchar(1) DEFAULT NULL,
  `country` int(11) DEFAULT NULL,
  `avatar` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `dob`, `gender`, `country`, `avatar`) VALUES
(1, '\0\0', 'administrator', '59beecdf7fc966e2f17fd8f65a4a9aeb09d4a3d4', '9462e8eee0', 'admin@admin.com', '', NULL, NULL, '9d029802e28cd9c768e8e62277c0df49ec65c48c', 1268889823, 1368613852, 1, 'admin@admin.com', '1', '2013-05-14 00:00:00', NULL, NULL, '11.png'),
(2, '\0\0', 'test', 'c9677e8112319f649747a8b05708d010221e6b41', NULL, 'test@test.com', NULL, NULL, NULL, NULL, 1361107053, 1361107053, 1, NULL, NULL, NULL, NULL, NULL, NULL),
(3, '\0\0', 'test2', 'b4bbb3960ac42732f74d08c1927f97003ef9bb6b', NULL, 'test2@test.com', NULL, NULL, NULL, NULL, 1361107377, 1361107377, 1, NULL, NULL, NULL, NULL, NULL, NULL),
(4, '\0\0', 'johndoe', 'f406c4e029784051584774587294de88047f74a0', NULL, 'john@doe.com', NULL, NULL, NULL, NULL, 1361112609, 1361112609, 1, NULL, NULL, NULL, NULL, NULL, NULL),
(5, '\0\0', 'demouser', 'ab8ec30b82b677a58295f5b9acca8a274f4836f5', NULL, 'demo@demo.us', NULL, NULL, NULL, NULL, 1361112622, 1361112622, 1, NULL, NULL, NULL, NULL, NULL, NULL),
(7, '\0\0', 'comic', '70dd69dd59f781cb2526a94a7db844bd4498865f', NULL, 'comic@sans.com', '310b0e07fc5d4c9ae320ead15496a491b3725a3e', NULL, NULL, NULL, 1361112657, 1361112657, 0, NULL, NULL, NULL, NULL, NULL, NULL),
(8, '\0\0', 'updated', '88484160d2486d9bb2740b90624d642f0c320a71', NULL, 'asda1@asd.com', NULL, NULL, NULL, NULL, 1361878943, 1361878943, 1, NULL, NULL, NULL, NULL, NULL, NULL),
(9, '\0\0', 'mmaric', '0dc1673757339d5160691754a5c5ceb6db70455d', NULL, 'maric@mm.com', NULL, NULL, NULL, NULL, 1362528738, 1362528738, 1, NULL, NULL, NULL, NULL, NULL, NULL),
(10, '\0\0', 'mtest', '590756944210dd0131717d50f4d4c0b16c952914', NULL, 'mtest@ssss.com', NULL, NULL, NULL, NULL, 1362528766, 1362528766, 1, NULL, NULL, NULL, NULL, NULL, NULL),
(11, '\0\0', 'eggzy', '46971820a249b9fe32b331534f8758baa6aa2e94', NULL, 'eggzy12@gmail.com', NULL, NULL, NULL, 'cfb089722a82fc8818b2edfbe28142f96f14ad21', 1367704152, 1368542295, 1, NULL, NULL, NULL, NULL, NULL, NULL),
(12, '\0\0', 'egzasa', '7f3aebf5d475de8c11d2c465d8ca7a439cbb2bc4', NULL, 'asfasf@gmsa.com', NULL, NULL, NULL, NULL, 1367705189, 1367705189, 1, NULL, NULL, NULL, NULL, NULL, NULL),
(13, '\0\0', 'safas', '45872df6b1fa99acca78d66b0953147c24dc2128', NULL, 'karlo.mikus1@gmail.com', '79d996585c4b7b2ae87d6a8e1e5b847f05165d9c', NULL, NULL, NULL, 1368480086, 1368480086, 0, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE IF NOT EXISTS `users_groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` mediumint(8) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 2, 2),
(5, 3, 2),
(6, 4, 2),
(7, 5, 2),
(9, 7, 2),
(15, 8, 2),
(16, 8, 6),
(17, 9, 2),
(18, 10, 2),
(19, 11, 2),
(20, 12, 2),
(21, 13, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_pm`
--

CREATE TABLE IF NOT EXISTS `user_pm` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`label`) REFERENCES `labels` (`id`) ON DELETE SET NULL;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
