-- phpMyAdmin SQL Dump
-- version 3.5.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 12, 2013 at 01:31 PM
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `poster_id`, `content`, `module`, `module_link`, `parent_id`) VALUES
(1, 1, 'Note: CodeIgniter does not require you to use this class since using pure PHP in your view pages lets them run a little faster. However, some developers prefer to use a template engine if they work with designers who they feel would find some confusion working with PHP.', 'matches', '17', NULL),
(2, 1, 'Note: CodeIgniter does not require you to use this class since using pure PHP in your view pages lets them run a little faster. Hofind some confusion working with PHP.', 'matches', '17', NULL),
(3, 1, 'sagfasgasgasgasgasg', 'drugimodul', '17', NULL),
(4, 1, 'dshsdhsdhsdhsdh', 'matches', '2', NULL),
(5, 1, 'sdgsd', 'matches', '17', 0),
(6, 1, 'gdsgds', 'matches', '17', 0),
(7, 1, 'tgrh', 'matches', '2', 0),
(8, 1, '1', 'matches', '3', 0);

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
(16, 'Counter Strike Promod', 'csp', 'csp.gif'),
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `labels`
--

INSERT INTO `labels` (`id`, `name`, `description`, `banner`) VALUES
(1, 'Site news', 'Fanny pack cillum try-hard tempor proident, mumblecore nostrud deserunt godard semiotics fugiat chillwave.', '1.jpg'),
(2, 'Coverages', 'Esport coverages', 'nopic'),
(5, 'Forum', 'adfasfasfas', '5.jpg');

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
  `screenshots` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `matches`
--

INSERT INTO `matches` (`id`, `team`, `opponent`, `date`, `game`, `report`, `status`, `opponent-players`, `team-players`, `matchlink`, `type`, `screenshots`) VALUES
(2, 2, 3, '2013-02-27 00:22:57', 1, 'dasdsad', 0, NULL, '', '', NULL, ''),
(3, 5, 5, '2013-02-27 00:56:50', 10, 'jhvjhv', 0, NULL, '', '', NULL, ''),
(5, 2, 6, '2013-03-04 19:48:00', 7, 'There are two ways to build panels in Foundation 4, either with our predefined HTML or with our mixin. Building panels using our predefined class isn''t hard at all. You''ll start with and add a class of .panel to it. From there, you just need to add content inside, anything will do.', 0, 'notail,player1,fag1,fag2', '2,3,4,5', 'http://dotabuff.com/matches/140944627', 3, ''),
(17, 2, 3, '2013-03-18 12:00:00', 6, 'One of the nice things that we get for free when using async event handling is the ability to monitor the progress of the file read; useful for large files, catching errors, and figuring out when a read is complete.\r\n\r\nThe onloadstart and onprogress events can be used to monitor the progress of a read.\r\n\r\nThe example below demonstrates displaying a progress bar to monitor the status of a read. To see the progress indicator in action, try a large file or one from a remote drive.0', 2, 'xboct,dendi,blyat', '2,3,4', 'ss', 2, '');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `matches_files`
--

INSERT INTO `matches_files` (`id`, `match_id`, `file`, `type`) VALUES
(1, 17, '17_1_1362660242.jpg', 'screenshot'),
(2, 17, '17_2_1362660242.jpg', 'screenshot'),
(3, 17, '17_3_1362660242.jpg', 'screenshot'),
(4, 17, '17_4_1362660242.jpg', 'screenshot');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

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
(24, 17, 3, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `opponents`
--

INSERT INTO `opponents` (`id`, `name`, `info`, `gameID`, `logo`) VALUES
(3, 'Team Liquid', 'TwitchTV is the world’s largest video game broadcasting and chat community. We’re dedicated to connecting people around the games they love. TwitchTV features video from the top gaming personalities, players, tournaments, leagues and commentary, in addition to the most active and interesting discussions around video games. ', 10, '3.png'),
(5, 'Na''Vi', 'Natus Vincere (Na`Vi) is a Ukrainian multigaming e-Sports organization. It is the first team in Counter-Strike history to win three major tournaments in one calendar year - Intel Extreme Masters, Electronic Sports World Cup and World Cyber Games 2010. In 2011, Na`Vi.DotA won the $1 000 000 grand prize at The International, the first ever DotA 2 tournament.', 10, '5.png'),
(6, 'Fnatic.eu', 'The Fnatic Team is a professional video gaming team, consisting of players from across the globe who all make a living through competing in video game tournaments.\r\n\r\nFnatic is considered to have world class squads in Counter-Strike, StarCraft II, League of Legends, Dota 2, ShootMania: Storm and Call of Duty. ', 11, '6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE IF NOT EXISTS `permissions` (
  `permissionID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `allow` text NOT NULL,
  `deny` text NOT NULL,
  `moduleID` int(11) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  `public` tinyint(1) NOT NULL,
  PRIMARY KEY (`permissionID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`permissionID`, `name`, `description`, `allow`, `deny`, `moduleID`, `admin`, `public`) VALUES
(2, 'Permisija 1', 'Generates an insert string based on the data you supply, and runs the query. You can either pass an array or an object to the function. Here is an example using an array:', 'a:3:{i:0;s:1:"1";i:1;s:1:"2";i:2;s:1:"5";}', 'a:5:{i:0;s:1:"3";i:1;s:1:"4";i:2;s:1:"6";i:3;s:1:"7";i:4;s:1:"8";}', 0, 0, 0),
(3, 'Dvas', '', 'a:5:{i:0;s:1:"4";i:1;s:1:"5";i:2;s:1:"6";i:3;s:1:"7";i:4;s:1:"8";}', 'a:3:{i:0;s:1:"1";i:1;s:1:"2";i:2;s:1:"3";}', 0, 0, 0),
(6, 'Public User', '', 'a:4:{i:0;s:1:"1";i:1;s:1:"2";i:2;s:1:"5";i:3;s:1:"7";}', 'a:4:{i:0;s:1:"3";i:1;s:1:"4";i:2;s:1:"6";i:3;s:1:"8";}', 0, 0, 0),
(7, 'Admin User', '', 'a:8:{i:0;s:1:"1";i:1;s:1:"2";i:2;s:1:"3";i:3;s:1:"4";i:4;s:1:"5";i:5;s:1:"6";i:6;s:1:"7";i:7;s:1:"8";}', 'b:0;', 0, 0, 0);

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
  PRIMARY KEY (`id`),
  KEY `label` (`label`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `date`, `teaser`, `author`, `label`) VALUES
(1, 'Our new website launched', 'Fanny pack cillum try-hard tempor proident, mumblecore nostrud deserunt godard semiotics fugiat chillwave. Small batch id whatever put a bird on it gluten-free, readymade vero. Mustache cosby sweater street art cupidatat labore culpa ugh pariatur, kogi chillwave banksy umami aliquip enim. Bespoke ad stumptown deep v, vero 3 wolf moon est gluten-free pitchfork trust fund quis kogi. Sriracha sed proident mumblecore lo-fi. Hashtag dolor letterpress chambray odd future freegan, williamsburg dreamcatcher biodiesel duis. Occupy ex retro, pinterest authentic vice mcsweeney''s synth readymade williamsburg cosby sweater tonx.', '2013-02-24 08:16:34', 'Fanny pack cillum try-hard tempor proident, mumblecore nostrud deserunt godard semiotics fugiat chillwave.', 1, 1),
(2, 'Post title 2', 'Fanny pack cillum try-hard tempor proident, mumblecore nostrud deserunt godard semiotics fugiat chillwave. Small batch id whatever put a bird on it gluten-free, readymade vero. Mustache cosby sweater street art cupidatat labore culpa ugh pariatur, kogi chillwave banksy umami aliquip enim. Bespoke ad stumptown deep v, vero 3 wolf moon est gluten-free pitchfork trust fund quis kogi. Sriracha sed proident mumblecore lo-fi. Hashtag dolor letterpress chambray odd future freegan, williamsburg dreamcatcher biodiesel duis. Occupy ex retro, pinterest authentic vice mcsweeney''s synth readymade williamsburg cosby sweater tonx.', '2013-02-25 10:52:03', 'sadasd', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `clanname` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `clanname`) VALUES
(1, 'Team xQute');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE IF NOT EXISTS `teams` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `games` varchar(50) NOT NULL,
  `banner` varchar(20) NOT NULL,
  `logo` varchar(20) NOT NULL,
  `type` tinyint(1) NOT NULL,
  `countryID` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `name`, `description`, `games`, `banner`, `logo`, `type`, `countryID`) VALUES
(2, 'Test Team 1', 'Throughout this code, the key things to look out for when uploading multiple files with Codeigniters File Uploading Class are:', '1', '2_banner.jpg', '2.gif', 1, 55),
(5, 'Test team 2', '$games_picked = implode('','', $games_post);', '1,3', '5_banner1.png', '51.gif', 1, 55);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `teams_members`
--

INSERT INTO `teams_members` (`id`, `team_id`, `user_id`, `position`) VALUES
(1, 2, 2, 'Captain'),
(2, 2, 3, 'Member'),
(3, 2, 4, 'Member'),
(4, 2, 5, 'Toplane');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `dob`, `gender`, `country`, `avatar`) VALUES
(1, '\0\0', 'administrator', '59beecdf7fc966e2f17fd8f65a4a9aeb09d4a3d4', '9462e8eee0', 'admin@admin.com', '', NULL, NULL, '9d029802e28cd9c768e8e62277c0df49ec65c48c', 1268889823, 1363086162, 1, 'Karlo', 'Mikus', NULL, NULL, NULL, '1.png'),
(2, '\0\0', 'test', 'c9677e8112319f649747a8b05708d010221e6b41', NULL, 'test@test.com', NULL, NULL, NULL, NULL, 1361107053, 1361107053, 1, NULL, NULL, NULL, NULL, NULL, NULL),
(3, '\0\0', 'test2', 'b4bbb3960ac42732f74d08c1927f97003ef9bb6b', NULL, 'test2@test.com', NULL, NULL, NULL, NULL, 1361107377, 1361107377, 1, NULL, NULL, NULL, NULL, NULL, NULL),
(4, '\0\0', 'johndoe', 'f406c4e029784051584774587294de88047f74a0', NULL, 'john@doe.com', NULL, NULL, NULL, NULL, 1361112609, 1361112609, 1, NULL, NULL, NULL, NULL, NULL, NULL),
(5, '\0\0', 'demouser', 'ab8ec30b82b677a58295f5b9acca8a274f4836f5', NULL, 'demo@demo.us', NULL, NULL, NULL, NULL, 1361112622, 1361112622, 1, NULL, NULL, NULL, NULL, NULL, NULL),
(7, '\0\0', 'comic', '70dd69dd59f781cb2526a94a7db844bd4498865f', NULL, 'comic@sans.com', '310b0e07fc5d4c9ae320ead15496a491b3725a3e', NULL, NULL, NULL, 1361112657, 1361112657, 0, NULL, NULL, NULL, NULL, NULL, NULL),
(8, '\0\0', 'updated', '88484160d2486d9bb2740b90624d642f0c320a71', NULL, 'asda1@asd.com', NULL, NULL, NULL, NULL, 1361878943, 1361878943, 1, NULL, NULL, NULL, NULL, NULL, NULL),
(9, '\0\0', 'mmaric', '0dc1673757339d5160691754a5c5ceb6db70455d', NULL, 'maric@mm.com', NULL, NULL, NULL, NULL, 1362528738, 1362528738, 1, NULL, NULL, NULL, NULL, NULL, NULL),
(10, '\0\0', 'mtest', '590756944210dd0131717d50f4d4c0b16c952914', NULL, 'mtest@ssss.com', NULL, NULL, NULL, NULL, 1362528766, 1362528766, 1, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE IF NOT EXISTS `users_groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` mediumint(8) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

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
(18, 10, 2);

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
