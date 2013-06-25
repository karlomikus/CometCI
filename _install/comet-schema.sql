-- phpMyAdmin SQL Dump
-- version 3.5.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 24, 2013 at 10:41 AM
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
-- Table structure for table `banners`
--

CREATE TABLE IF NOT EXISTS `banners` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `width` int(11) DEFAULT NULL,
  `height` int(11) DEFAULT NULL,
  `url` varchar(255) NOT NULL,
  `image` text,
  `code` text,
  `description` text,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `startdate` datetime NOT NULL,
  `enddate` datetime NOT NULL,
  `image` varchar(50) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  `sort` int(11) DEFAULT NULL,
  `slug` varchar(35) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `forum_moderators`
--

CREATE TABLE IF NOT EXISTS `forum_moderators` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `forum` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE IF NOT EXISTS `galleries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` text,
  `date` datetime NOT NULL,
  `access` enum('public','private','clan') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `galleries_files`
--

CREATE TABLE IF NOT EXISTS `galleries_files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gallery` int(11) NOT NULL,
  `file` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`, `permissionID`) VALUES
(1, 'admin', 'Administrator', 0),
(2, 'members', 'General User', 0),
(6, 'clan', 'Clan members', 0);

-- --------------------------------------------------------

--
-- Table structure for table `labels`
--

CREATE TABLE IF NOT EXISTS `labels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `banner` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  `event` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `from` int(11) NOT NULL,
  `to` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `title` varchar(50) NOT NULL,
  `content` mediumtext NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE IF NOT EXISTS `modules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `link` varchar(255) NOT NULL,
  `enabled` int(1) NOT NULL DEFAULT '1',
  `layout` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `name`, `description`, `link`, `enabled`, `layout`) VALUES
(1, 'Calendar', 'Preview events and upcoming matches', 'calendar', 1, NULL),
(2, 'Comments', 'Manage site comments', 'comments', 1, NULL),
(3, 'Forums', 'Manage site forums', 'forums', 1, 'fullwidth'),
(4, 'Games', 'Manage available games', 'games', 1, NULL),
(5, 'Groups', 'Manage user groups', 'groups', 1, NULL),
(6, 'Labels', 'Manage site global categories', 'labels', 1, NULL),
(7, 'Matches', 'Manage clan matches', 'matches', 1, NULL),
(8, 'Matchstats', 'Check your clan match performance statistics', 'matchstats', 1, NULL),
(9, 'Modules', 'Probably shouldn''t touch this module', 'modules', 1, NULL),
(10, 'Opponents', 'Manage match opponents', 'opponents', 1, NULL),
(11, 'Pages', 'Manage site pages', 'pages', 1, NULL),
(12, 'Permissions', 'Manage user permissions', 'permissions', 0, NULL),
(13, 'Posts', 'Manage news posts', 'posts', 1, NULL),
(14, 'Roster', 'Mangae team members', 'roster', 1, NULL),
(15, 'Settings', 'Change site settings', 'settings', 0, NULL),
(16, 'Teams', 'Manage your clan squads', 'teams', 0, NULL),
(17, 'Users', 'Manage users', 'users', 1, NULL),
(18, 'Gallery', 'Make your own picture gallery', 'gallery', 1, 'default'),
(19, 'Countries', 'TODO', 'countries', 0, NULL),
(20, 'Events', 'TODO', 'events', 0, NULL),
(21, 'Layouts', 'TODO', 'layouts', 0, NULL),
(22, 'Banners', 'TODO', 'banners', 1, NULL),
(23, 'Messages', 'TODO', 'messages', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `opponents`
--

CREATE TABLE IF NOT EXISTS `opponents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `info` text NOT NULL,
  `gameID` int(11) NOT NULL,
  `logo` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `layout` varchar(255) DEFAULT NULL,
  `navigation` varchar(100) DEFAULT NULL,
  `date` datetime NOT NULL,
  `slug` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `access` enum('public','clan','registered') NOT NULL DEFAULT 'public',
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `body` text NOT NULL,
  `date` datetime NOT NULL,
  `teaser` text,
  `author` int(11) NOT NULL,
  `label` int(11) DEFAULT NULL,
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  `clan` tinyint(1) NOT NULL DEFAULT '0',
  `state` tinyint(1) NOT NULL DEFAULT '1',
  `views` int(11) NOT NULL DEFAULT '0',
  `slug` varchar(35) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`),
  KEY `label` (`label`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `clanname` varchar(50) NOT NULL,
  `clantag` varchar(10) NOT NULL,
  `sitename` varchar(50) NOT NULL,
  `adminmail` varchar(200) NOT NULL,
  `comments` int(11) NOT NULL DEFAULT '1',
  `commentsdelay` int(11) DEFAULT NULL,
  `closed` int(11) NOT NULL DEFAULT '0',
  `closedmsg` text,
  `analytics` text,
  `theme` varchar(50) NOT NULL,
  `layout` varchar(100) DEFAULT NULL,
  `homemodule` varchar(50) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `clanname`, `clantag`, `sitename`, `adminmail`, `comments`, `commentsdelay`, `closed`, `closedmsg`, `analytics`, `theme`, `layout`, `homemodule`, `date`) VALUES
(1, 'Team Comet', '', 'Clan Comet2', 'admin@local.host', 1, 0, 0, 'Site is down for maintenance', '', 'barebones', 'default', 'posts', '2013-06-08 15:15:59');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=736 ;

--
-- Dumping data for table `site_views`
--

INSERT INTO `site_views` (`id`, `ip`, `user`, `date`) VALUES
(433, 2130706433, 1, '2013-05-21 18:47:05'),
(434, 2130706433, 1, '2013-05-19 20:57:40'),
(435, 2130706433, 2, '2013-05-13 00:49:44'),
(436, 2130706433, 3, '2013-05-27 20:35:57'),
(437, 2130706433, 4, '2013-05-06 20:37:32'),
(438, 2130706433, 5, '2013-05-26 09:59:10'),
(439, 2130706433, 6, '2013-05-18 14:09:09'),
(440, 2130706433, 7, '2013-05-21 10:31:30'),
(441, 2130706433, 8, '2013-05-06 17:55:41'),
(442, 2130706433, 9, '2013-05-27 23:53:26'),
(443, 2130706433, 10, '2013-05-19 03:45:43'),
(444, 2130706433, 11, '2013-05-03 23:00:40'),
(445, 2130706433, 12, '2013-05-21 11:20:08'),
(446, 2130706433, 13, '2013-05-14 04:32:28'),
(447, 2130706433, 14, '2013-05-05 15:31:46'),
(448, 2130706433, 15, '2013-05-12 00:47:04'),
(449, 2130706433, 16, '2013-05-06 20:49:08'),
(450, 2130706433, 17, '2013-05-20 14:16:15'),
(451, 2130706433, 18, '2013-05-05 04:06:57'),
(452, 2130706433, 19, '2013-05-05 19:30:17'),
(453, 2130706433, 20, '2013-05-26 05:56:46'),
(454, 2130706433, 21, '2013-05-28 06:24:07'),
(455, 2130706433, 22, '2013-05-28 05:20:13'),
(456, 2130706433, 23, '2013-05-11 06:51:20'),
(457, 2130706433, 24, '2013-05-27 08:48:54'),
(458, 2130706433, 25, '2013-05-18 23:19:41'),
(459, 2130706433, 26, '2013-05-30 05:25:45'),
(460, 2130706433, 27, '2013-05-05 03:46:03'),
(461, 2130706433, 28, '2013-05-13 20:05:15'),
(462, 2130706433, 29, '2013-05-19 15:02:07'),
(463, 2130706433, 30, '2013-05-08 22:32:44'),
(464, 2130706433, 31, '2013-05-10 18:54:41'),
(465, 2130706433, 32, '2013-05-21 23:38:08'),
(466, 2130706433, 33, '2013-05-21 17:43:58'),
(467, 2130706433, 34, '2013-05-26 11:40:15'),
(468, 2130706433, 35, '2013-05-24 22:28:09'),
(469, 2130706433, 36, '2013-05-15 09:07:03'),
(470, 2130706433, 37, '2013-05-23 06:52:29'),
(471, 2130706433, 38, '2013-05-14 11:04:15'),
(472, 2130706433, 39, '2013-05-17 09:05:21'),
(473, 2130706433, 40, '2013-05-22 00:53:24'),
(474, 2130706433, 41, '2013-05-29 16:19:04'),
(475, 2130706433, 42, '2013-05-05 03:56:46'),
(476, 2130706433, 43, '2013-05-22 02:40:15'),
(477, 2130706433, 44, '2013-05-14 19:38:33'),
(478, 2130706433, 45, '2013-05-30 03:29:22'),
(479, 2130706433, 46, '2013-05-29 23:58:02'),
(480, 2130706433, 47, '2013-05-27 21:23:49'),
(481, 2130706433, 48, '2013-05-07 06:42:05'),
(482, 2130706433, 49, '2013-05-11 19:40:35'),
(483, 2130706433, 50, '2013-05-07 10:04:54'),
(484, 2130706433, 51, '2013-05-10 14:25:21'),
(485, 2130706433, 52, '2013-05-05 18:26:16'),
(486, 2130706433, 53, '2013-05-18 04:20:25'),
(487, 2130706433, 54, '2013-05-05 08:55:51'),
(488, 2130706433, 55, '2013-05-25 07:15:45'),
(489, 2130706433, 56, '2013-05-03 11:45:58'),
(490, 2130706433, 57, '2013-05-04 17:30:51'),
(491, 2130706433, 58, '2013-05-01 07:36:54'),
(492, 2130706433, 59, '2013-05-08 07:08:30'),
(493, 2130706433, 60, '2013-05-14 22:44:27'),
(494, 2130706433, 61, '2013-05-17 22:27:49'),
(495, 2130706433, 62, '2013-05-24 20:15:03'),
(496, 2130706433, 63, '2013-05-28 13:55:43'),
(497, 2130706433, 64, '2013-05-17 08:59:22'),
(498, 2130706433, 65, '2013-05-23 01:02:33'),
(499, 2130706433, 66, '2013-05-18 20:50:50'),
(500, 2130706433, 67, '2013-05-26 01:05:56'),
(501, 2130706433, 68, '2013-05-14 12:20:11'),
(502, 2130706433, 69, '2013-05-21 22:53:40'),
(503, 2130706433, 70, '2013-05-10 14:54:21'),
(504, 2130706433, 71, '2013-05-30 21:23:02'),
(505, 2130706433, 72, '2013-05-27 12:10:22'),
(506, 2130706433, 73, '2013-05-24 23:36:11'),
(507, 2130706433, 74, '2013-05-03 10:19:10'),
(508, 2130706433, 75, '2013-05-07 02:27:04'),
(509, 2130706433, 76, '2013-05-14 00:49:00'),
(510, 2130706433, 77, '2013-05-01 23:02:52'),
(511, 2130706433, 78, '2013-05-12 07:13:15'),
(512, 2130706433, 79, '2013-05-25 12:33:55'),
(513, 2130706433, 80, '2013-05-12 05:07:57'),
(514, 2130706433, 81, '2013-05-02 16:10:47'),
(515, 2130706433, 82, '2013-05-23 03:58:20'),
(516, 2130706433, 83, '2013-05-25 07:37:51'),
(517, 2130706433, 84, '2013-05-10 12:37:39'),
(518, 2130706433, 85, '2013-05-11 17:53:29'),
(519, 2130706433, 86, '2013-05-01 21:27:53'),
(520, 2130706433, 87, '2013-05-21 07:21:27'),
(521, 2130706433, 88, '2013-05-03 10:02:07'),
(522, 2130706433, 89, '2013-05-15 04:45:50'),
(523, 2130706433, 90, '2013-05-08 05:16:49'),
(524, 2130706433, 91, '2013-05-03 04:46:40'),
(525, 2130706433, 92, '2013-05-15 14:19:32'),
(526, 2130706433, 93, '2013-05-05 10:16:17'),
(527, 2130706433, 94, '2013-05-27 22:02:23'),
(528, 2130706433, 95, '2013-05-05 07:51:47'),
(529, 2130706433, 96, '2013-05-09 11:38:15'),
(530, 2130706433, 97, '2013-05-03 23:54:55'),
(531, 2130706433, 98, '2013-05-22 23:36:24'),
(532, 2130706433, 99, '2013-05-27 00:03:38'),
(533, 2130706433, 100, '2013-05-24 03:36:08'),
(534, 2130706433, 1, '2013-06-05 00:00:00'),
(535, 2130706433, 1, '2013-06-05 00:00:00'),
(536, 2130706433, 5, '2013-06-17 11:19:48'),
(537, 2130706433, 6, '2013-06-22 07:29:41'),
(538, 2130706433, 2, '2013-06-05 07:04:13'),
(539, 2130706433, 5, '2013-06-07 04:19:08'),
(540, 2130706433, 5, '2013-06-07 00:13:59'),
(541, 2130706433, 4, '2013-06-17 17:18:07'),
(542, 2130706433, 3, '2013-06-25 05:37:46'),
(543, 2130706433, 1, '2013-06-19 15:59:39'),
(544, 2130706433, 2, '2013-06-25 09:31:47'),
(545, 2130706433, 5, '2013-06-07 09:59:55'),
(546, 2130706433, 2, '2013-06-12 19:08:32'),
(547, 2130706433, 6, '2013-06-05 08:58:29'),
(548, 2130706433, 4, '2013-06-05 06:28:37'),
(549, 2130706433, 4, '2013-06-25 11:15:23'),
(550, 2130706433, 5, '2013-06-15 12:59:39'),
(551, 2130706433, 4, '2013-06-11 01:47:10'),
(552, 2130706433, 2, '2013-06-14 04:02:51'),
(553, 2130706433, 5, '2013-06-06 14:50:35'),
(554, 2130706433, 4, '2013-06-18 02:25:28'),
(555, 2130706433, 4, '2013-06-12 09:08:15'),
(556, 2130706433, 3, '2013-06-16 21:24:21'),
(557, 2130706433, 2, '2013-06-04 00:31:20'),
(558, 2130706433, 3, '2013-06-14 01:25:52'),
(559, 2130706433, 4, '2013-06-19 20:39:05'),
(560, 2130706433, 1, '2013-06-08 22:26:12'),
(561, 2130706433, 2, '2013-06-01 15:20:06'),
(562, 2130706433, 2, '2013-06-26 19:28:49'),
(563, 2130706433, 1, '2013-06-25 13:16:11'),
(564, 2130706433, 4, '2013-06-12 06:22:59'),
(565, 2130706433, 2, '2013-06-17 22:24:31'),
(566, 2130706433, 1, '2013-06-18 17:29:45'),
(567, 2130706433, 2, '2013-06-27 06:34:46'),
(568, 2130706433, 1, '2013-06-10 01:28:56'),
(569, 2130706433, 3, '2013-06-14 23:45:17'),
(570, 2130706433, 6, '2013-06-04 15:30:15'),
(571, 2130706433, 6, '2013-06-07 01:12:31'),
(572, 2130706433, 7, '2013-06-24 04:21:35'),
(573, 2130706433, 2, '2013-06-14 20:04:59'),
(574, 2130706433, 6, '2013-06-25 12:41:06'),
(575, 2130706433, 2, '2013-06-08 15:00:33'),
(576, 2130706433, 7, '2013-06-04 02:35:53'),
(577, 2130706433, 7, '2013-06-23 04:56:24'),
(578, 2130706433, 7, '2013-06-22 22:55:40'),
(579, 2130706433, 4, '2013-06-15 14:11:08'),
(580, 2130706433, 3, '2013-06-27 07:12:26'),
(581, 2130706433, 4, '2013-06-15 12:11:52'),
(582, 2130706433, 7, '2013-06-15 09:31:02'),
(583, 2130706433, 4, '2013-06-27 05:45:29'),
(584, 2130706433, 2, '2013-06-15 01:09:43'),
(585, 2130706433, 4, '2013-06-18 02:55:12'),
(586, 2130706433, 1, '2013-06-22 08:16:28'),
(587, 2130706433, 4, '2013-06-03 00:03:03'),
(588, 2130706433, 5, '2013-06-09 09:29:13'),
(589, 2130706433, 3, '2013-06-12 01:31:18'),
(590, 2130706433, 1, '2013-06-29 19:09:30'),
(591, 2130706433, 5, '2013-06-16 10:11:28'),
(592, 2130706433, 5, '2013-06-05 14:19:28'),
(593, 2130706433, 3, '2013-06-10 10:41:56'),
(594, 2130706433, 5, '2013-06-20 12:42:02'),
(595, 2130706433, 2, '2013-06-01 17:09:20'),
(596, 2130706433, 5, '2013-06-04 14:04:01'),
(597, 2130706433, 6, '2013-06-06 16:04:47'),
(598, 2130706433, 3, '2013-06-19 11:39:57'),
(599, 2130706433, 5, '2013-06-16 06:26:25'),
(600, 2130706433, 2, '2013-06-18 09:05:50'),
(601, 2130706433, 2, '2013-06-28 18:09:45'),
(602, 2130706433, 3, '2013-06-07 04:40:00'),
(603, 2130706433, 1, '2013-06-02 21:19:51'),
(604, 2130706433, 3, '2013-06-09 20:16:23'),
(605, 2130706433, 2, '2013-06-02 09:02:21'),
(606, 2130706433, 2, '2013-06-15 19:00:20'),
(607, 2130706433, 2, '2013-06-21 06:24:07'),
(608, 2130706433, 1, '2013-06-15 00:17:06'),
(609, 2130706433, 2, '2013-06-17 05:13:55'),
(610, 2130706433, 5, '2013-06-29 20:44:45'),
(611, 2130706433, 4, '2013-06-16 05:38:06'),
(612, 2130706433, 6, '2013-06-13 11:24:59'),
(613, 2130706433, 5, '2013-06-07 11:24:49'),
(614, 2130706433, 1, '2013-06-04 17:59:48'),
(615, 2130706433, 7, '2013-06-06 06:12:49'),
(616, 2130706433, 1, '2013-06-08 04:42:00'),
(617, 2130706433, 1, '2013-06-15 08:00:22'),
(618, 2130706433, 4, '2013-06-03 08:44:32'),
(619, 2130706433, 6, '2013-06-25 10:37:07'),
(620, 2130706433, 4, '2013-06-12 22:12:46'),
(621, 2130706433, 5, '2013-06-15 03:08:05'),
(622, 2130706433, 4, '2013-06-20 08:43:22'),
(623, 2130706433, 1, '2013-06-23 15:06:13'),
(624, 2130706433, 7, '2013-06-27 11:03:44'),
(625, 2130706433, 2, '2013-06-02 19:19:01'),
(626, 2130706433, 3, '2013-06-03 02:06:03'),
(627, 2130706433, 5, '2013-06-28 06:15:27'),
(628, 2130706433, 7, '2013-06-05 20:35:44'),
(629, 2130706433, 5, '2013-06-02 08:13:42'),
(630, 2130706433, 2, '2013-06-04 01:40:37'),
(631, 2130706433, 2, '2013-06-01 02:02:16'),
(632, 2130706433, 6, '2013-06-08 11:45:03'),
(633, 2130706433, 5, '2013-06-07 09:19:40'),
(634, 2130706433, 2, '2013-06-19 17:08:49'),
(635, 2130706433, 2, '2013-06-13 21:25:09'),
(636, 2130706433, 6, '2013-06-26 04:19:14'),
(637, 2130706433, 4, '2013-06-28 10:00:42'),
(638, 2130706433, 4, '2013-06-10 03:56:40'),
(639, 2130706433, 6, '2013-06-10 20:26:47'),
(640, 2130706433, 5, '2013-06-15 03:39:53'),
(641, 2130706433, 2, '2013-06-03 22:25:54'),
(642, 2130706433, 3, '2013-06-23 13:36:27'),
(643, 2130706433, 3, '2013-06-04 22:43:47'),
(644, 2130706433, 6, '2013-06-07 00:29:33'),
(645, 2130706433, 3, '2013-06-18 14:11:37'),
(646, 2130706433, 3, '2013-06-22 22:46:01'),
(647, 2130706433, 7, '2013-06-29 22:45:54'),
(648, 2130706433, 4, '2013-06-10 13:39:27'),
(649, 2130706433, 7, '2013-06-22 01:36:25'),
(650, 2130706433, 5, '2013-06-21 09:04:23'),
(651, 2130706433, 7, '2013-06-17 05:43:04'),
(652, 2130706433, 4, '2013-06-06 20:49:10'),
(653, 2130706433, 2, '2013-06-21 00:27:09'),
(654, 2130706433, 1, '2013-06-28 12:15:39'),
(655, 2130706433, 4, '2013-06-09 10:38:45'),
(656, 2130706433, 3, '2013-06-04 15:03:43'),
(657, 2130706433, 3, '2013-06-02 18:56:09'),
(658, 2130706433, 1, '2013-06-11 13:21:52'),
(659, 2130706433, 3, '2013-06-22 18:44:07'),
(660, 2130706433, 7, '2013-06-04 15:12:18'),
(661, 2130706433, 3, '2013-06-12 15:10:49'),
(662, 2130706433, 4, '2013-06-05 18:37:03'),
(663, 2130706433, 6, '2013-06-24 05:31:56'),
(664, 2130706433, 7, '2013-06-08 11:34:54'),
(665, 2130706433, 5, '2013-06-16 06:04:30'),
(666, 2130706433, 7, '2013-06-23 00:52:38'),
(667, 2130706433, 5, '2013-06-01 00:36:57'),
(668, 2130706433, 1, '2013-06-23 17:17:13'),
(669, 2130706433, 3, '2013-06-11 07:11:29'),
(670, 2130706433, 4, '2013-06-29 03:40:22'),
(671, 2130706433, 6, '2013-06-23 23:22:02'),
(672, 2130706433, 4, '2013-06-22 15:40:03'),
(673, 2130706433, 7, '2013-06-26 08:27:50'),
(674, 2130706433, 2, '2013-06-01 03:46:05'),
(675, 2130706433, 3, '2013-06-26 06:05:43'),
(676, 2130706433, 2, '2013-06-02 12:22:48'),
(677, 2130706433, 4, '2013-06-11 17:19:20'),
(678, 2130706433, 3, '2013-06-16 10:28:59'),
(679, 2130706433, 6, '2013-06-19 01:14:56'),
(680, 2130706433, 4, '2013-06-19 10:25:44'),
(681, 2130706433, 1, '2013-06-26 23:52:20'),
(682, 2130706433, 5, '2013-06-15 17:42:02'),
(683, 2130706433, 7, '2013-06-15 03:53:34'),
(684, 2130706433, 2, '2013-06-19 04:29:07'),
(685, 2130706433, 5, '2013-06-01 05:03:39'),
(686, 2130706433, 4, '2013-06-15 18:15:40'),
(687, 2130706433, 4, '2013-06-09 12:40:23'),
(688, 2130706433, 1, '2013-06-16 11:40:34'),
(689, 2130706433, 5, '2013-06-14 15:21:26'),
(690, 2130706433, 6, '2013-06-12 18:25:00'),
(691, 2130706433, 1, '2013-06-04 22:26:07'),
(692, 2130706433, 7, '2013-06-12 10:08:09'),
(693, 2130706433, 3, '2013-06-21 17:46:02'),
(694, 2130706433, 6, '2013-06-24 00:32:18'),
(695, 2130706433, 7, '2013-06-18 00:48:49'),
(696, 2130706433, 7, '2013-06-15 12:00:54'),
(697, 2130706433, 6, '2013-06-15 02:22:32'),
(698, 2130706433, 4, '2013-06-09 03:47:03'),
(699, 2130706433, 1, '2013-06-11 05:36:39'),
(700, 2130706433, 1, '2013-06-15 15:46:04'),
(701, 2130706433, 1, '2013-06-05 09:15:15'),
(702, 2130706433, 7, '2013-06-03 15:54:48'),
(703, 2130706433, 5, '2013-06-18 03:48:04'),
(704, 2130706433, 1, '2013-06-21 20:53:18'),
(705, 2130706433, 1, '2013-06-02 11:45:55'),
(706, 2130706433, 1, '2013-06-19 00:53:33'),
(707, 2130706433, 3, '2013-06-28 05:38:42'),
(708, 2130706433, 5, '2013-06-05 12:53:26'),
(709, 2130706433, 3, '2013-06-23 19:33:00'),
(710, 2130706433, 1, '2013-06-18 12:24:26'),
(711, 2130706433, 1, '2013-06-23 04:25:35'),
(712, 2130706433, 4, '2013-06-02 11:41:56'),
(713, 2130706433, 5, '2013-06-23 06:54:31'),
(714, 2130706433, 7, '2013-06-06 05:23:43'),
(715, 2130706433, 5, '2013-06-27 01:58:25'),
(716, 2130706433, 3, '2013-06-16 18:35:44'),
(717, 2130706433, 4, '2013-06-19 14:29:02'),
(718, 2130706433, 2, '2013-06-28 10:16:09'),
(719, 2130706433, 3, '2013-06-14 00:20:04'),
(720, 2130706433, 1, '2013-06-06 08:52:27'),
(721, 2130706433, 7, '2013-06-27 07:27:16'),
(722, 2130706433, 4, '2013-06-05 03:32:25'),
(723, 2130706433, 7, '2013-06-29 09:55:17'),
(724, 2130706433, 2, '2013-06-22 10:18:35'),
(725, 2130706433, 2, '2013-06-07 16:53:59'),
(726, 2130706433, 6, '2013-06-02 09:16:41'),
(727, 2130706433, 2, '2013-06-04 23:44:54'),
(728, 2130706433, 7, '2013-06-18 11:47:37'),
(729, 2130706433, 3, '2013-06-21 07:16:53'),
(730, 2130706433, 3, '2013-06-15 10:32:37'),
(731, 2130706433, 1, '2013-06-10 10:03:02'),
(732, 2130706433, 4, '2013-06-14 00:18:45'),
(733, 2130706433, 2, '2013-06-04 09:13:18'),
(734, 2130706433, 6, '2013-06-03 06:01:16'),
(735, 2130706433, 4, '2013-06-22 15:27:43');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE IF NOT EXISTS `teams` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `games` varchar(50) DEFAULT NULL,
  `banner` varchar(20) DEFAULT NULL,
  `logo` varchar(20) DEFAULT NULL,
  `countryID` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  `gender` enum('male','female') DEFAULT NULL,
  `country` int(11) DEFAULT NULL,
  `avatar` varchar(15) DEFAULT NULL,
  `about` mediumtext,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `dob`, `gender`, `country`, `avatar`, `about`) VALUES
(1, '\0\0', 'administrator', 'd8e1f86a83015b3ed2822b6baf031170019478c4', '9462e8eee0', 'karlo@gmail.com', '', NULL, NULL, '097979875ef1cddc26b8e8016f3d5376c1560bfd', 1268889823, 1372066798, 1, 'admin@admin.com', 'Mikus', '1992-06-25 00:00:00', 'male', 55, '12.png', 'Checks if an email is a correctly formatted email. Note that is doesn''t actually prove the email will recieve mail, simply that it is a validly formed address.\r\n\r\nIt returns TRUE/FALSE'),
(2, '\0\0', 'test', 'c9677e8112319f649747a8b05708d010221e6b41', NULL, 'test@test.com', NULL, NULL, NULL, NULL, 1361107053, 1361107053, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, '\0\0', 'test2', 'b4bbb3960ac42732f74d08c1927f97003ef9bb6b', NULL, 'test2@test.com', NULL, NULL, NULL, NULL, 1361107377, 1361107377, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, '\0\0', 'johndoe', 'f406c4e029784051584774587294de88047f74a0', NULL, 'john@doe.com', NULL, NULL, NULL, NULL, 1361112609, 1361112609, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, '\0\0', 'demouser', 'ab8ec30b82b677a58295f5b9acca8a274f4836f5', NULL, 'demo@demo.us', NULL, NULL, NULL, NULL, 1361112622, 1361112622, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, '\0\0', 'comic', '70dd69dd59f781cb2526a94a7db844bd4498865f', NULL, 'comic@sans.com', '310b0e07fc5d4c9ae320ead15496a491b3725a3e', NULL, NULL, NULL, 1361112657, 1361112657, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, '\0\0', 'updated', '88484160d2486d9bb2740b90624d642f0c320a71', NULL, 'asda1@asd.com', NULL, NULL, NULL, NULL, 1361878943, 1361878943, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, '\0\0', 'mmaric', '0dc1673757339d5160691754a5c5ceb6db70455d', NULL, 'maric@mm.com', NULL, NULL, NULL, NULL, 1362528738, 1362528738, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, '\0\0', 'mtest', '590756944210dd0131717d50f4d4c0b16c952914', NULL, 'mtest@ssss.com', NULL, NULL, NULL, NULL, 1362528766, 1362528766, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, '\0\0', 'eggzy', '46971820a249b9fe32b331534f8758baa6aa2e94', NULL, 'eggzy12@gmail.com', NULL, NULL, NULL, 'cfb089722a82fc8818b2edfbe28142f96f14ad21', 1367704152, 1369161584, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, '\0\0', 'egzasa', '7f3aebf5d475de8c11d2c465d8ca7a439cbb2bc4', NULL, 'asfasf@gmsa.com', NULL, NULL, NULL, NULL, 1367705189, 1367705189, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, '\0\0', 'safas', '45872df6b1fa99acca78d66b0953147c24dc2128', NULL, 'karlo.mikus1@gmail.com', '79d996585c4b7b2ae87d6a8e1e5b847f05165d9c', NULL, NULL, NULL, 1368480086, 1368480086, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, '\0\0', 'stats', '59beecdf7fc966e2f17fd8f65a4a9aeb09d4a3d4', NULL, 'stats@gmail.com', NULL, NULL, NULL, NULL, 1370517099, 1370517099, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, '\0\0', 'stats2', '2dfe83964f3273daee484b4c2264625bfd9575b8', NULL, 'st@st.com', '1cb3a1edc98855fc0298463764ceaf172fc65300', NULL, NULL, '47e3485a22ce9e07ad32191020d73c1730f64c36', 1370517269, 1370517310, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, '\0\0', 'ssssssssss', 'fc8f03ba66b1a38f99f52e04bc7bae4eb382784d', NULL, 'mtest@sssss.com', '53db31d95f84e569b00f96f73949f890b4111d1d', NULL, NULL, NULL, 1370688024, 1370688024, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE IF NOT EXISTS `users_groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` mediumint(8) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

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
(21, 13, 2),
(22, 14, 2),
(23, 15, 2),
(24, 16, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users_perms`
--

CREATE TABLE IF NOT EXISTS `users_perms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `module` int(11) NOT NULL,
  `group` int(11) NOT NULL,
  `allow` enum('0','1') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `users_perms`
--

INSERT INTO `users_perms` (`id`, `module`, `group`, `allow`) VALUES
(6, 1, 6, '1'),
(7, 2, 6, '1'),
(8, 3, 6, '1');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
