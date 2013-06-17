-- phpMyAdmin SQL Dump
-- version 3.5.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 17, 2013 at 12:31 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=190 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `poster_id`, `content`, `module`, `module_link`, `parent_id`, `date`) VALUES
(153, 1, 'TEEEST', 'matches', '52', NULL, '2013-06-03 12:43:05'),
(154, 1, 'assssssss', 'matches', '52', NULL, '2013-06-02 12:45:26'),
(155, 1, 'asgasgasgsagasgsa', 'matches', '52', NULL, '2013-06-03 12:45:32'),
(156, 1, 'asgsagasgasg', 'matches', '52', NULL, '2013-06-03 12:45:35'),
(157, 2, 'asfsasagasg', 'matches', '52', NULL, '2013-06-03 12:45:46'),
(159, 2, 'DIY Williamsburg ad, Bushwick ennui Tonx aesthetic mustache food truck thundercats Carles. Food truck lomo squid hella direct trade flannel, velit roof party 8-bit skateboard chillwave labore do Austin. Stumptown gluten-free locavore, dolore elit ut veniam. Keytar eu letterpress, twee sartorial DIY sunt aliqua qui. Aliqua letterpress beard, intelligentsia Banksy consectetur authentic yr keffiyeh kale chips keytar next level raw denim gentrify. Selfies street art kogi quinoa, officia pitchfork Vice plaid fap sint small batch accusamus aesthetic pariatur twee. Meh pariatur eu mustache, culpa food truck try-hard keffiyeh.', 'matches', '34', NULL, '2013-06-03 14:56:00'),
(160, 1, 'DIY Williamsburg ad, Bushwick ennui Tonx aesthetic mustache food truck thundercats Carles. Food truck lomo squid hella direct trade flannel, velit roof party 8-bit skateboard chillwave labore do Austin. Stumptown gluten-free locavore, dolore elit ut veniam. Keytar eu letterpress, twee sartorial DIY sunt aliqua qui. Aliqua letterpress beard, intelligentsia Banksy consectetur authentic yr keffiyeh kale chips keytar next level raw denim gentrify. Selfies street art kogi quinoa, officia pitchfork Vice plaid fap sint small batch accusamus aesthetic pariatur twee. Meh pariatur eu mustache, culpa food truck try-hard keffiyeh.', 'matches', '34', NULL, '2013-06-03 14:56:11'),
(161, 3, 'Foundation 4 typography is built with ems, making it easier to fine-tune your type across different breakpoints. By default, we include a single breakpoint in typography sizes and styles, but you can add more if you''d like.', 'matches', '34', NULL, '2013-06-03 14:56:21'),
(162, 1, 'Nostrud you probably haven''t heard of them nihil, fugiat DIY blue bottle enim seitan pickled keytar narwhal ut synth. Consectetur roof party messenger bag chillwave squid aliqua, readymade Marfa tote bag Odd Future polaroid fixie helvetica artisan. Ad mixtape cupidatat, literally cred pickled ethnic Portland lo-fi four loko pariatur. Aliquip next level magna, mumblecore organic literally proident four loko quis. Pickled thundercats scenester gentrify. Art party Williamsburg put a bird on it proident non. Keffiyeh enim cupidatat lomo, Bushwick butcher officia Austin ethical sunt umami stumptown.', 'matches', '34', NULL, '2013-06-04 14:56:25'),
(176, 1, 'I really can''t put into words how honored I am to be invited to work with one of the most legendary names PC gaming history, and eSports history.', 'posts', '49', NULL, '2013-06-05 14:15:20'),
(177, 1, 'The production for the event will be handled by none other than The GD Studio themselves. Having successfully hosted last year''s DreamHack Winter 2012 and The International 3 West Qualifiers, the crew will be returning to another Dreamhack event. This time including community''s favourite Statsman', 'posts', '49', NULL, '2013-06-05 14:15:28'),
(186, 15, 'sgdsg', 'matches', '64', NULL, '2013-06-06 11:15:39'),
(189, 1, 'Cooooooooool', 'posts', '48', NULL, '2013-06-08 17:38:07');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `name`, `startdate`, `enddate`, `image`, `link`, `description`) VALUES
(1, 'The International 2013', '2013-05-22 15:32:05', '2013-05-22 15:32:05', '1.png', 'aaaa', 'aaaaaaaaa'),
(2, 'The Defense 3', '2013-06-21 17:00:00', '2013-08-03 20:00:00', NULL, 'http://www.the-defense.com/en/start', 'As announced yesterday we invited 16 teams to fight for the three remaining slots in the fourth season of The Defense. This qualifier will start tonight. Find out everything about the format, schedule, coverage, and the participants. '),
(3, 'G1 League Dota 2', '2013-05-29 05:30:00', '2013-06-18 00:00:00', '3.png', 'http://g1.2p.com/dota2/', 'Kaipi and mousesports will be bowing out of the G-1 League Western qualifier after being eliminated from the tournament by Team Liquid and Dignitas respectively...'),
(4, 'Testing eventm', '2013-05-14 00:40:00', '2013-05-31 10:10:00', '4.png', 'http://ellislab.com/codeigniter/user-guide/libraries/form_validation.html#validationrules', 'Note: These rules can also be called as discrete functions. For example:\r\n$this->form_validation->required($string);');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `forum_forums`
--

INSERT INTO `forum_forums` (`id`, `label`, `name`, `description`, `date`, `private`, `clan`, `sort`, `slug`) VALUES
(1, 5, 'Test Forum2', 'Laboris ullamco laborum nisi, id qui dreamcatcher photo booth stumptown mixtape wayfarers. Farm-to-table etsy meggings pug est intelligentsia.2', '2013-05-08 11:37:33', 0, 0, 0, NULL),
(2, 9, 'Offtopic', 'Laboris ullamco laborum nisi, id qui dreamcatcher photo booth stumptown mixtape wayfarers. Farm-to-table etsy meggings pug est intelligentsia.', '2013-05-08 11:42:31', 0, 0, 0, NULL),
(3, 9, 'General discussion', 'Laboris ullamco laborum nisi, id qui dreamcatcher photo booth stumptown mixtape wayfarers. Farm-to-table etsy meggings pug est intelligentsia.', '2013-05-08 11:42:42', 0, 0, 0, NULL),
(4, 9, 'General news', '', '2013-05-08 12:06:42', 0, 0, 0, NULL),
(9, 9, 'Moderators only', '', '2013-05-11 20:25:59', 0, 0, 0, NULL),
(10, 9, 'Testni Forum #3', '', '2013-05-12 17:46:48', 1, 0, 0, NULL),
(11, 9, 'Really cool forum name', 'he casters for this year will be a very familiar duo in the Dota2 scene. Being known for casting The International 2 and two seasons of the RaidCall Dota2 Le', '2013-06-05 14:27:30', 0, 0, NULL, '11-really-cool-forum-name');

-- --------------------------------------------------------

--
-- Table structure for table `forum_moderators`
--

CREATE TABLE IF NOT EXISTS `forum_moderators` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `forum` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

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
(8, 1, 5),
(9, 11, 3),
(10, 11, 4);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `forum_replies`
--

INSERT INTO `forum_replies` (`id`, `topic`, `poster`, `content`, `date`) VALUES
(1, 37, 1, 'Hey, I’m Ben Edmunds. I’m passionate about building and leading teams to create awesome web and mobile apps. I’ve written a few open source libraries and have had the pleasure of being involved with some interesting projects. You can see my work on GitHub.\r\nHey, I’m Ben Edmunds. I’m passionate about building and leading teams to create awesome web and mobile apps. I’ve written a few open source libraries and have had the pleasure of being involved with some interesting projects. You can see my work on GitHub.\r\nHey, I’m Ben Edmunds. I’m passionate about building and leading teams to create awesome web and mobile apps. I’ve written a few open source libraries and have had the pleasure of being involved with some interesting projects. You can see my work on GitHub.\r\n', '2013-05-14 14:10:06'),
(2, 37, 1, 'Podcast\r\n\r\nCheck out the PHP Town Hall podcast to hear me and Phil Sturgeon rant about life, liberty, and the pursuit of decent code.\r\n\r\n    Episode 6 - PSR-X and the Mexican Standoff   04.19.2013\r\n    Episode 5 - PHPness Gate, Sexism and Mental Illness   03.03.2013\r\n    Episode 4: PHP''s Vision, Beards, and Cake   02.15.2013\r\n', '2013-05-14 14:10:18'),
(3, 39, 1, '![IMAGE](http://i.imgur.com/oqerAVW.jpg "")', '2013-05-15 12:00:08'),
(4, 36, 1, '$this->db->wh**ere(''sticky'', ''1'');$this->db->w**here(''sticky'', ''1'');', '2013-05-15 19:00:30'),
(5, 40, 1, 'asfasf', '2013-06-01 16:04:45'),
(6, 40, 1, 'gsddfg', '2013-06-01 16:04:47'),
(7, 36, 1, 'jk??k?l?', '2013-06-03 10:37:47'),
(8, 41, 1, 'asgasg', '2013-06-05 11:20:27'),
(9, 41, 1, 'dfhdfh', '2013-06-05 11:20:31'),
(10, 38, 1, 'fgjghfghj', '2013-06-05 23:56:23'),
(11, 38, 1, 'hjgghj', '2013-06-05 23:56:35'),
(12, 41, 1, 'asfasf', '2013-06-05 23:58:48'),
(13, 41, 1, 'agasgasg', '2013-06-06 00:00:03'),
(14, 41, 1, 'asgasg', '2013-06-06 00:05:00'),
(15, 41, 1, 'ssss', '2013-06-06 10:47:08'),
(16, 42, 1, 'asgsaasg', '2013-06-08 10:38:24'),
(17, 42, 1, 'hfkghjk', '2013-06-08 10:38:53');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=44 ;

--
-- Dumping data for table `forum_topics`
--

INSERT INTO `forum_topics` (`id`, `forum`, `author`, `title`, `date`, `sticky`, `content`, `views`, `locked`, `last_modified`) VALUES
(35, 3, 11, 'sdgdsg', '2013-05-12 15:47:19', 0, 'dsgdsg', 2, 0, '2013-05-12'),
(36, 3, 11, 'asgasg', '2013-05-12 15:54:50', 0, 'asgasg', 9, 0, '2013-06-03'),
(37, 3, 1, 'Dis is srs topic!', '2013-05-14 13:48:29', 0, 'Hey, I’m Ben Edmunds. I’m passionate about building and leading teams to create awesome web and mobile apps. I’ve written a few open source libraries and have had the pleasure of being involved with some interesting projects. You can see my work on GitHub.\r\n', 78, 0, '2013-05-14'),
(38, 3, 1, 'Markdown test', '2013-05-15 11:48:57', 0, '**Cool header**\r\n\r\nI wanna know that how to _disable_ the grabber in the textarea!\r\n\r\nI mean that triangle thing which appears in the right-bottom corner of the textarea.\r\n\r\n> Please help me out!\r\n\r\nThanks in advance!', 8, 0, '2013-06-05'),
(39, 3, 1, 'Slika!', '2013-05-15 11:51:32', 0, '![Image](http://i.imgur.com/rI6o1rH.jpg "Title")', 6, 0, '2013-05-15'),
(40, 1, 1, 'Brijes?', '2013-06-01 16:04:39', 0, 'sfasfsaf', 3, 0, '2013-06-01'),
(41, 1, 1, 'asfsafsa', '2013-06-01 16:29:54', 0, 'gasgasg', 12, 0, '2013-06-06'),
(42, 1, 1, 'asfasf', '2013-06-06 10:47:27', 0, 'safasf', 3, 0, '2013-06-08'),
(43, 2, 1, 'hjkhgk', '2013-06-08 10:39:12', 1, 'hgjkhgk', 0, 0, '2013-06-08');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `name`, `description`, `date`, `access`) VALUES
(1, 'Galerija jedan', 'You might be wondering why there''s no Barracks if there''s an Archery Range and Stables. The Barracks will come later, as a separate project, because it''s quite special. ;)', '2013-06-11 13:33:03', 'public'),
(2, 'Galerija 2', 'Svasta nesto u ovoj galeriji', '2013-06-13 08:31:39', 'public');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=100 ;

--
-- Dumping data for table `galleries_files`
--

INSERT INTO `galleries_files` (`id`, `gallery`, `file`, `title`, `description`) VALUES
(77, 2, '2.jpg', 'Title11', 'Description'),
(79, 2, '4.jpg', 'Title22', 'Description'),
(80, 2, '5.jpg', 'Title33', 'Description'),
(81, 2, '6.jpg', 'Title45', 'Description'),
(84, 2, '3.jpg', 'Title', 'Description'),
(85, 2, '41.jpg', 'Title', 'Description'),
(86, 2, '51.jpg', 'Title', 'Description'),
(89, 1, '1.png', 'Title', 'Description'),
(90, 1, '1a-Dashboard.jpg', 'Title', 'Description'),
(91, 1, '2_7.png', 'Title', 'Description'),
(92, 1, '3.png', 'Title', 'Description'),
(93, 1, '4lease_window.png', 'Brijes', 'Description'),
(94, 1, '6add77c4b54eef32ee7f0020eb61b61e.jpg', 'Title', 'Description'),
(95, 1, '11_MINETT_PSD_Template_Shortcodes.png', 'Title', 'Description'),
(96, 1, '12.png', 'Title', 'Description'),
(97, 1, '62dd32d2e963241935383bbff958ccb2.jpg', 'Title', 'Description'),
(98, 1, '100.jpg', 'Title', 'Description'),
(99, 1, '590x300.png', 'Title', 'Description');

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
  `banner` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `labels`
--

INSERT INTO `labels` (`id`, `name`, `description`, `banner`) VALUES
(5, 'Articles', 'Nostrud vice cray, marfa tonx readymade nesciunt ennui. Fugiat helvetica cosby sweater laboris duis. ', ''),
(6, 'Coverage', 'Nostrud vice cray, marfa tonx readymade nesciunt ennui. Fugiat helvetica cosby sweater laboris duis. ', ''),
(7, 'Clan News', 'Quinoa leggings mumblecore cillum ea, direct trade duis culpa chambray banh mi Austin 90''s PBR.', '0'),
(9, 'Private forums', 'risus. Donec nibh enim, gravida sit amet, dapibus id, blandit at, nisi. Cum sociis natoque risus. Donec nibh enim, gravida sit amet, dapibus id, blandit at, nisi. Cum sociis natoque risus. Donec nibh enim, gravida sit amet, dapibus id, blandit at, nisi. Cum sociis natoque risus. Donec nibh enim, gravida sit amet, dapibus id, blandit at, nisi. Cum sociis natoque ', '0'),
(10, 'Public foums', 'A grassroots success, Seattle rapper\n<a href="https://play.spotify.com/artist/3JhNCzhSMTxs9WLGJJxWOY">Macklemore</a>\nnot only climbed to number two on the Billboard 200 album charts, but with little mainstream help, his 2012 sophomore release debuted with only\n<a href="https://play.spotify.com/artist/3gd8FJtBJtkRxdfbTu19U2">Mumford & Sons</a>\nin his way for the number one spot.', '0'),
(11, 'News', '', NULL);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=82 ;

--
-- Dumping data for table `matches`
--

INSERT INTO `matches` (`id`, `team`, `opponent`, `date`, `game`, `report`, `status`, `opponent-players`, `team-players`, `matchlink`, `type`, `event`) VALUES
(17, 2, 3, '2013-03-18 12:00:00', 6, 'One of the nice things that we get for free when using async event handling is the ability to monitor the progress of the file read; useful for large files, catching errors, and figuring out when a read is complete.\r\n\r\nThe onloadstart and onprogress events can be used to monitor the progress of a read.\r\n\r\nThe example below demonstrates displaying a progress bar to monitor the status of a read. To see the progress indicator in action, try a large file or one from a remote drive.0', 2, 'xboct,dendi,blyat', '2,3,4', 'ss', 2, 0),
(20, 2, 7, '2013-05-01 12:23:00', 10, '<p>Mustache carles sriracha, flannel four loko odio accusamus scenester in nisi keytar. Pug street art nulla echo park twee. Before they sold out bushwick iphone, commodo swag banksy american apparel neutra chambray kale chips elit narwhal exercitation ut pour-over. Chillwave food truck accusamus next level vero delectus tattooed aesthetic, nostrud pariatur portland art party kale chips yr. Placeat carles etsy, mustache pop-up tofu reprehenderit scenester iphone ea terry richardson VHS esse enim plaid. Carles narwhal vero ethical magna pariatur. Jean shorts cillum fingerstache exercitation chambray food truck, ex aute bushwick art party sunt commodo est.</p>\r\n\r\n<blockquote>\r\n<p>Mustache carles sriracha, flannel four loko odio accusamus scenester in nisi keytar. Pug street art nulla echo park twee. Before they sold out bushwick iphone, commodo swag banksy american apparel neutra chambray kale chips elit narwhal exercitation ut pour-over.</p>\r\n</blockquote>\r\n\r\n<p><strong>Mustache carles sriracha, flannel four loko odio accusamus scenester in nisi keytar.</strong> Pug street art nulla echo park twee. Before they sold out bushwick iphone, commodo swag banksy american apparel neutra chambray kale chips elit narwhal exercitation ut pour-over. Chillwave food truck accusamus next level vero delectus tattooed aesthetic, nostrud pariatur portland art party kale chips yr. Placeat carles etsy, mustache pop-up tofu reprehenderit scenester iphone ea terry richardson VHS esse enim plaid. Carles narwhal vero ethical magna pariatur. Jean shorts cillum fingerstache exercitation chambray food truck, ex aute bushwick art party sunt commodo est.</p>\r\n', 0, 'lorem, ipsum, dolor, sit, amet', '', 'http://kami-design.com/', 4, 0),
(21, 5, 3, '2013-05-02 12:23:00', 10, '<p>Report content</p>\r\n', 0, '', '', '', 0, 0),
(22, 5, 5, '2013-05-02 14:24:00', 2, '<p>Report content</p>\r\n', 0, '', '', '', 0, 0),
(23, 2, 7, '2013-05-02 18:24:00', 11, '<p>Report content</p>\r\n', 0, '', '', '', 0, 0),
(24, 5, 6, '2013-05-10 10:00:00', 10, '<p>Report content</p>\r\n', 1, '', '4,9,10', '', 2, 0),
(25, 5, 9, '2013-05-22 15:00:00', 3, '<p>Report content</p>\r\n', 1, '', '', '', 0, 0),
(26, 5, 6, '2013-05-20 09:51:00', 4, '<p>Report content</p>\r\n', 1, '', '', '', 0, 0),
(27, 5, 8, '2013-01-05 23:10:12', 7, 'sodales. Mauris blandit enim consequat purus. Maecenas libero est, congue a, aliquet vel, vulputate eu, odio. Phasellus at augue id ante dictum cursus. Nunc mauris', 0, NULL, '', '', 4, 0),
(28, 5, 5, '2012-11-30 23:53:04', 18, 'Proin sed turpis nec mauris blandit mattis. Cras eget nisi dictum augue malesuada malesuada. Integer id magna et ipsum cursus vestibulum. Mauris magna. Duis dignissim tempor arcu. Vestibulum ut eros non enim', 0, NULL, '', '', 4, 0),
(29, 5, 9, '2013-05-14 23:25:00', 3, '<p>Nulla semper tellus id nunc interdum feugiat. Sed nec metus facilisis lorem tristique aliquet. Phasellus fermentum convallis ligula. Donec luctus aliquet odio. Etiam ligula</p>\r\n', 0, '', '', '', 4, 0),
(30, 2, 6, '2012-07-15 03:44:58', 11, 'et magnis dis parturient montes, nascetur ridiculus mus. Proin vel arcu eu odio tristique pharetra. Quisque ac libero nec ligula consectetuer rhoncus. Nullam velit dui, semper et, lacinia vitae, sodales at, velit. Pellentesque ultricies dignissim lacus. Aliquam rutrum lorem ac risus. Morbi metus. Vivamus euismod urna. Nullam lobortis quam a', 0, NULL, '', '', 4, 0),
(31, 5, 3, '2012-08-03 02:01:30', 1, 'Pellentesque ultricies dignissim lacus. Aliquam rutrum lorem ac risus. Morbi metus. Vivamus euismod urna. Nullam lobortis quam a felis ullamcorper viverra. Maecenas iaculis aliquet diam. Sed diam lorem, auctor quis, tristique ac,', 0, NULL, '', '', 4, 0),
(32, 6, 3, '2012-12-09 02:21:37', 8, 'ac, feugiat non, lobortis quis, pede. Suspendisse dui. Fusce diam nunc, ullamcorper eu, euismod ac, fermentum vel, mauris. Integer sem elit, pharetra ut, pharetra sed, hendrerit a, arcu. Sed et libero. Proin mi. Aliquam gravida mauris ut mi. Duis risus odio, auctor vitae, aliquet nec,', 0, NULL, '', '', 4, 0),
(33, 6, 3, '2012-09-24 17:11:13', 9, 'varius et, euismod et, commodo at, libero. Morbi accumsan laoreet ipsum. Curabitur consequat, lectus sit amet luctus vulputate, nisi sem semper erat, in consectetuer ipsum nunc id enim. Curabitur', 0, NULL, '', '', 4, 0),
(34, 2, 6, '2012-09-15 03:57:51', 4, 'fermentum fermentum arcu. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Phasellus ornare. Fusce mollis. Duis sit amet diam', 0, NULL, '', '', 4, 0),
(37, 2, 5, '2013-01-13 01:48:28', 19, 'vitae odio sagittis semper. Nam tempor diam dictum sapien. Aenean massa. Integer vitae nibh. Donec est mauris, rhoncus id, mollis nec, cursus a, enim. Suspendisse aliquet,', 0, NULL, '', '', 4, 0),
(39, 6, 5, '2012-10-22 13:32:43', 11, 'dolor egestas rhoncus. Proin nisl sem, consequat nec, mollis vitae, posuere at, velit. Cras lorem lorem, luctus ut, pellentesque eget, dictum placerat, augue. Sed molestie. Sed id risus quis diam luctus lobortis. Class aptent taciti sociosqu ad litora torquent per conubia', 0, NULL, '', '', 4, 0),
(40, 5, 7, '2012-08-09 12:29:58', 8, 'ornare, libero at auctor ullamcorper, nisl arcu iaculis enim, sit amet ornare lectus justo eu arcu. Morbi sit amet massa. Quisque', 0, NULL, '', '', 4, 0),
(41, 6, 8, '2013-04-21 03:44:48', 18, 'mi fringilla mi lacinia mattis. Integer eu lacus. Quisque imperdiet, erat nonummy ultricies ornare, elit elit fermentum risus, at fringilla purus mauris a nunc. In at pede. Cras vulputate velit eu sem. Pellentesque ut ipsum ac mi eleifend egestas. Sed pharetra,', 0, NULL, '', '', 4, 0),
(42, 5, 9, '2013-04-10 09:22:00', 3, 'scelerisque scelerisque dui. Suspendisse ac metus vitae velit egestas lacinia. Sed congue, elit sed consequat auctor, nunc nulla vulputate dui, nec tempus mauris erat eget ipsum. Suspendisse sagittis. Nullam vitae diam. Proin dolor. Nulla semper tellus id nunc interdum feugiat. Sed nec metus facilisis', 0, NULL, '', '', 4, 0),
(43, 6, 7, '2012-06-28 13:52:20', 6, 'Proin sed turpis nec mauris blandit mattis. Cras eget nisi dictum augue malesuada malesuada. Integer id magna et ipsum cursus vestibulum. Mauris magna. Duis dignissim tempor arcu. Vestibulum ut eros non enim commodo hendrerit. Donec porttitor tellus non magna. Nam ligula elit, pretium et, rutrum non, hendrerit id, ante.', 0, NULL, '', '', 4, 0),
(44, 6, 5, '2012-09-27 02:04:55', 1, 'id ante dictum cursus. Nunc mauris elit, dictum eu, eleifend nec, malesuada ut, sem. Nulla interdum. Curabitur dictum. Phasellus in felis. Nulla tempor augue ac ipsum. Phasellus vitae mauris sit amet lorem semper auctor. Mauris vel turpis. Aliquam adipiscing', 0, NULL, '', '', 4, 0),
(45, 2, 5, '2013-04-05 02:31:05', 2, 'Sed nunc est, mollis non, cursus non, egestas a, dui. Cras pellentesque. Sed dictum. Proin eget odio. Aliquam vulputate ullamcorper magna. Sed eu eros. Nam consequat dolor vitae dolor. Donec', 0, NULL, '', '', 4, 0),
(47, 5, 9, '2012-10-02 16:39:11', 6, 'Nam porttitor scelerisque neque. Nullam nisl. Maecenas malesuada fringilla est. Mauris eu turpis. Nulla aliquet. Proin velit. Sed malesuada augue ut lacus. Nulla tincidunt, neque vitae semper egestas, urna justo faucibus lectus, a sollicitudin orci sem eget massa. Suspendisse eleifend. Cras sed leo. Cras vehicula aliquet libero. Integer', 0, NULL, '', '', 4, 0),
(48, 2, 9, '2012-07-23 23:46:12', 3, 'viverra. Maecenas iaculis aliquet diam. Sed diam lorem, auctor quis, tristique ac, eleifend vitae, erat. Vivamus nisi. Mauris nulla. Integer urna. Vivamus molestie dapibus ligula. Aliquam erat volutpat. Nulla dignissim. Maecenas ornare', 0, NULL, '', '', 4, 0),
(49, 5, 8, '2012-12-26 14:22:55', 1, 'Nulla tincidunt, neque vitae semper egestas, urna justo faucibus lectus, a sollicitudin orci sem eget massa. Suspendisse eleifend. Cras sed leo. Cras vehicula aliquet libero. Integer in magna. Phasellus dolor elit, pellentesque a, facilisis non, bibendum sed, est. Nunc laoreet lectus quis massa. Mauris vestibulum, neque sed', 0, NULL, '', '', 4, 0),
(51, 5, 8, '2012-09-27 06:28:01', 20, 'eget lacus. Mauris non dui nec urna suscipit nonummy. Fusce fermentum fermentum arcu. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia', 0, NULL, '', '', 4, 0),
(52, 6, 3, '2013-05-08 12:06:11', 12, 'nisi dictum augue malesuada malesuada. Integer id magna et ipsum cursus vestibulum. Mauris magna. Duis dignissim tempor arcu. Vestibulum ut eros non enim commodo hendrerit. Donec porttitor tellus non magna. Nam ligula elit, pretium et, rutrum non, hendrerit id, ante. Nunc mauris sapien, cursus in, hendrerit', 0, NULL, '', '', 4, 0),
(54, 2, 3, '2013-02-23 16:21:05', 4, 'malesuada vel, convallis in, cursus et, eros. Proin ultrices. Duis volutpat nunc sit amet metus. Aliquam erat volutpat. Nulla facilisis. Suspendisse commodo tincidunt nibh. Phasellus nulla. Integer vulputate, risus a ultricies adipiscing, enim mi tempor lorem, eget mollis lectus pede et risus. Quisque libero lacus, varius', 0, NULL, '', '', 4, 0),
(55, 6, 7, '2012-12-11 05:32:43', 8, 'Etiam gravida molestie arcu. Sed eu nibh vulputate mauris sagittis placerat. Cras dictum ultricies ligula. Nullam enim. Sed nulla ante, iaculis nec, eleifend non, dapibus rutrum, justo. Praesent luctus. Curabitur egestas nunc sed libero. Proin sed turpis nec mauris', 0, NULL, '', '', 4, 0),
(56, 2, 5, '2012-09-01 22:52:57', 4, 'vulputate, posuere vulputate, lacus. Cras interdum. Nunc sollicitudin commodo ipsum. Suspendisse non leo. Vivamus nibh dolor, nonummy ac, feugiat non, lobortis quis, pede.', 0, NULL, '', '', 4, 0),
(57, 5, 6, '2012-07-23 22:33:30', 18, 'dui quis accumsan convallis, ante lectus convallis est, vitae sodales nisi magna sed dui. Fusce aliquam, enim nec tempus scelerisque, lorem ipsum sodales purus, in molestie tortor nibh', 0, NULL, '', '', 4, 0),
(58, 2, 7, '2012-08-30 12:49:14', 4, 'sem magna nec quam. Curabitur vel lectus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec dignissim magna a tortor. Nunc commodo auctor velit. Aliquam nisl. Nulla eu neque pellentesque massa lobortis ultrices. Vivamus rhoncus. Donec est. Nunc', 0, NULL, '', '', 4, 0),
(60, 2, 3, '2012-09-09 09:41:15', 19, 'metus facilisis lorem tristique aliquet. Phasellus fermentum convallis ligula. Donec luctus aliquet odio. Etiam ligula tortor, dictum eu, placerat eget, venenatis a, magna. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Etiam laoreet, libero et tristique pellentesque, tellus', 0, NULL, '', '', 4, 0),
(61, 6, 7, '2012-10-21 12:22:19', 9, 'eu, odio. Phasellus at augue id ante dictum cursus. Nunc mauris elit, dictum eu, eleifend nec, malesuada ut, sem. Nulla interdum. Curabitur dictum. Phasellus', 0, NULL, '', '', 4, 0),
(62, 6, 7, '2012-05-29 12:14:19', 14, 'tellus. Suspendisse sed dolor. Fusce mi lorem, vehicula et, rutrum eu, ultrices sit amet, risus. Donec nibh enim, gravida sit amet, dapibus id, blandit at, nisi. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Proin vel nisl. Quisque fringilla euismod', 0, NULL, '', '', 4, 0),
(63, 5, 6, '2013-01-03 02:20:42', 6, 'nibh lacinia orci, consectetuer euismod est arcu ac orci. Ut semper pretium neque. Morbi quis urna. Nunc quis arcu vel quam dignissim pharetra. Nam ac nulla. In tincidunt congue', 0, NULL, '', '', 4, 0),
(64, 6, 8, '2013-05-08 02:14:04', 5, 'Duis dignissim tempor arcu. Vestibulum ut eros non enim commodo hendrerit. Donec porttitor tellus non magna. Nam ligula elit, pretium et, rutrum non, hendrerit id, ante. Nunc mauris sapien, cursus in, hendrerit consectetuer, cursus et, magna. Praesent interdum ligula eu enim. Etiam imperdiet dictum', 0, NULL, '', '', 4, 0),
(65, 2, 7, '2013-03-25 14:41:04', 3, 'pede, nonummy ut, molestie in, tempus eu, ligula. Aenean euismod mauris eu elit. Nulla facilisi. Sed neque. Sed eget lacus. Mauris non dui nec urna suscipit nonummy. Fusce fermentum fermentum arcu. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia', 0, NULL, '', '', 4, 0),
(66, 2, 6, '2013-02-24 07:25:51', 2, 'varius. Nam porttitor scelerisque neque. Nullam nisl. Maecenas malesuada fringilla est. Mauris eu turpis. Nulla aliquet. Proin velit. Sed malesuada augue ut lacus. Nulla tincidunt, neque vitae semper egestas, urna justo faucibus lectus, a sollicitudin orci sem eget massa. Suspendisse eleifend.', 0, NULL, '', '', 4, 0),
(67, 2, 7, '2012-09-20 22:56:59', 15, 'at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt', 0, NULL, '', '', 4, 0),
(68, 6, 6, '2012-08-21 03:43:59', 4, 'magna. Ut tincidunt orci quis lectus. Nullam suscipit, est ac facilisis facilisis, magna tellus faucibus leo, in lobortis tellus justo sit amet nulla. Donec non justo. Proin non massa non', 0, NULL, '', '', 4, 0),
(70, 6, 9, '2013-05-12 05:58:59', 20, 'Mauris ut quam vel sapien imperdiet ornare. In faucibus. Morbi vehicula. Pellentesque tincidunt tempus risus. Donec egestas. Duis ac arcu. Nunc mauris. Morbi non sapien molestie orci tincidunt adipiscing. Mauris molestie pharetra nibh. Aliquam ornare, libero at auctor ullamcorper, nisl arcu iaculis enim, sit amet', 0, NULL, '', '', 4, 0),
(71, 5, 6, '2013-03-05 05:02:01', 14, 'vel est tempor bibendum. Donec felis orci, adipiscing non, luctus sit amet, faucibus ut, nulla. Cras eu tellus eu augue porttitor interdum. Sed auctor odio a purus. Duis elementum, dui quis accumsan convallis, ante lectus convallis est, vitae sodales nisi magna sed dui.', 0, NULL, '', '', 4, 0),
(72, 5, 8, '2013-01-15 23:32:42', 11, 'est arcu ac orci. Ut semper pretium neque. Morbi quis urna. Nunc quis arcu vel quam dignissim pharetra. Nam ac nulla. In tincidunt congue turpis. In condimentum. Donec at arcu. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec tincidunt. Donec vitae erat', 0, NULL, '', '', 4, 0),
(73, 6, 3, '2013-03-10 21:11:06', 11, 'ultricies dignissim lacus. Aliquam rutrum lorem ac risus. Morbi metus. Vivamus euismod urna. Nullam lobortis quam a felis ullamcorper viverra. Maecenas iaculis aliquet diam. Sed diam lorem, auctor quis, tristique ac, eleifend vitae, erat.', 0, NULL, '', '', 4, 0),
(74, 5, 7, '2012-12-20 16:15:00', 11, 'lectus pede et risus. Quisque libero lacus, varius et, euismod et, commodo at, libero. Morbi accumsan laoreet ipsum. Curabitur consequat,', 0, NULL, '', '', 4, 0),
(75, 5, 8, '2012-11-13 22:08:18', 7, 'consequat enim diam vel arcu. Curabitur ut odio vel est tempor bibendum. Donec felis orci, adipiscing non, luctus sit amet, faucibus ut, nulla. Cras eu tellus eu augue porttitor interdum. Sed auctor odio a purus. Duis elementum, dui quis accumsan convallis, ante', 0, NULL, '', '', 4, 0),
(77, 5, 7, '2013-05-02 01:00:00', 3, '<p>Report content</p>', 1, '', '', '', 3, 3),
(79, 5, 5, '2013-05-22 00:30:00', 5, '<p>Report content</p>', 0, '', '', '', 0, 0),
(81, 5, 6, '2013-05-08 00:40:00', 3, '<p>Report content</p>', 0, '', '', '', 0, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=140 ;

--
-- Dumping data for table `matches_scores`
--

INSERT INTO `matches_scores` (`id`, `match`, `opponent`, `team`) VALUES
(23, 17, 2, 2),
(24, 17, 3, 1),
(32, 21, 1, 1),
(33, 22, 12, 10),
(34, 22, 10, 12),
(35, 22, 10, 12),
(36, 23, 1, 0),
(37, 23, 1, 0),
(38, 24, 0, 0),
(39, 20, 1, 0),
(40, 20, 0, 1),
(41, 20, 0, 1),
(42, 25, 0, 0),
(43, 26, 0, 0),
(44, 27, 11, 11),
(45, 28, 14, 11),
(47, 30, 9, 15),
(48, 31, 8, 5),
(49, 32, 9, 5),
(50, 33, 5, 5),
(51, 34, 6, 9),
(54, 37, 8, 13),
(56, 39, 9, 9),
(57, 40, 6, 7),
(58, 41, 11, 12),
(59, 42, 9, 7),
(60, 43, 8, 8),
(61, 44, 13, 9),
(62, 45, 9, 6),
(64, 47, 7, 13),
(65, 48, 12, 8),
(66, 49, 13, 14),
(68, 51, 10, 8),
(69, 52, 13, 14),
(71, 54, 6, 10),
(72, 55, 9, 8),
(73, 56, 13, 5),
(74, 57, 5, 7),
(75, 58, 7, 8),
(77, 60, 13, 14),
(78, 61, 6, 6),
(79, 62, 11, 9),
(80, 63, 14, 7),
(81, 64, 12, 12),
(82, 65, 6, 9),
(83, 66, 11, 12),
(84, 67, 12, 8),
(85, 68, 10, 14),
(87, 70, 9, 13),
(88, 71, 15, 6),
(89, 72, 13, 15),
(90, 73, 8, 5),
(91, 74, 8, 13),
(92, 75, 5, 5),
(93, 76, 10, 15),
(94, 76, 2, 8),
(95, 77, 0, 0),
(96, 78, 1, 1),
(97, 78, 1, 1),
(98, 78, 1, 2),
(99, 79, 0, 0),
(101, 81, 0, 0),
(115, 29, 6, 5),
(138, 80, 1, 2),
(139, 80, 2, 2);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `name`, `description`, `link`, `enabled`, `layout`) VALUES
(1, 'Calendar', 'Preview events and upcoming matches', 'calendar', 1, NULL),
(2, 'Comments', 'Manage site comments', 'comments', 1, NULL),
(3, 'Forums', 'Managa site forums', 'forums', 1, 'fullwidth'),
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
(18, 'Gallery', 'Pictures!', 'gallery', 1, NULL);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `opponents`
--

INSERT INTO `opponents` (`id`, `name`, `info`, `gameID`, `logo`) VALUES
(3, 'Team Liquid', 'In December 2012, Team Liquid entered the Dota 2 scene by picking up a North American squad consisting of FLUFFNSTUFF, ixmike88, Bulba, Korok, and TC.', 10, '31.png'),
(5, 'Na''Vi', 'Natus Vincere (Na`Vi) is a Ukrainian multigaming e-Sports organization. It is the first team in Counter-Strike history to win three major tournaments in one calendar year - Intel Extreme Masters, Electronic Sports World Cup and World Cyber Games 2010. In 2011, Na`Vi.DotA won the $1 000 000 grand prize at The International, the first ever DotA 2 tournament.', 10, '5.png'),
(6, 'Fnatic.eu', 'The Fnatic Team is a professional video gaming team, consisting of players from across the globe who all make a living through competing in video game tournaments.\n\nFnatic is considered to have world class squads in Counter-Strike, StarCraft II, League of Legends, Dota 2, ShootMania: Storm and Call of Duty. ', 11, '6.jpg'),
(7, 'Evil Geniuses', 'Founded in 1999, Evil Geniuses (Team EG) have grown to become a leading new media agency which specializes in contracting pro gamers, executing online and offline broadcasts, and developing unique marketing initiatives aimed at attracting and influencing gamers worldwide.With support from popular brands such as Intel, Monster Energy, Kingston HyperX, and others, EG are North America’s premier professional gaming team and a world leader in e-sports. Players and teams within EG, such as Justin “JWong” Wong, Greg “IdrA” Fields, and Isaac “Azael” Cummings-Bentley, have brought home championship trophies from every major gaming tournament circuit in the world and continue to be influential leaders of gamers everywhere.', 10, '7.jpg'),
(8, 'Invictus Gaming', 'Invictus Gaming is a platform focused on e-sports and other business about e-sports. Many top-level professional gamers worked for it. One aim of IG is to become the best e-sports club in the world. At present, IG have already integrated all the members of Dota 2, SC2, LOL from CCM club. After several years’ observation, e-sports industry was found to be in a chaotic period. Events like club closes down due to the poor operation, wage arrears, irregular competition, reward arrears always happen. The foundation of IG will stop these from happening again. It is a sign that the chaotic period will end in the near future. IG will create a upscale platform for its gamer. The irregular training, unreasonable payment, reward arrears and other problems will be eliminated and players can get a comprehensive development. Besides, IG will give its player more opportunities to attend commercial avtivities to maximize their values and share benefits with IG. IG plans to enter into campus and periodically hold a match for the e-sports fan to compete with the club stars. To respond to e-sports fans’ support, IG club and its players will closely contact with fans through blog, QQ, YY etc. And challenge match, teaching vedio, award-winning program will be publicly reached. ', 10, '8.jpg'),
(9, '[A]lliance', 'In April 2013, Swedish team No Tidehunter (consisting of s4, AdmiralBulldog, Akke, EGM, and Loda) announced the creation of The Alliance with StarCraft II player NaNiwa.', 10, '91.png'),
(10, 'Test bez ikone', 'Test bez ikoneTest bez ikoneTest bez ikoneTest bez ikoneTest bez ikoneTest bez ikoneTest bez ikoneTest bez ikoneTest bez ikoneTest bez ikoneTest bez ikoneTest bez ikoneTest bez ikoneTest bez ikoneTest bez ikoneTest bez ikoneTest bez ikoneTest bez ikoneTest bez ikoneTest bez ikoneTest bez ikoneTest bez ikoneTest bez ikoneTest bez ikoneTest bez ikoneTest bez ikoneTest bez ikoneTest bez ikoneTest bez ikoneTest bez ikoneTest bez ikone', 15, NULL);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `name`, `content`, `layout`, `navigation`, `date`, `slug`, `description`, `access`) VALUES
(1, 'Not so cool anymore', '<p>We have some comp<strong>letely unexpected, tragic news to </strong>share. On Thursday, we lost a very dear friend and founding member of our close-knit Oculus family, Andrew Reisse.</p>\r\n<img alt="Andrew in the Rift" src="http://www.oculusvr.com/wp-content/uploads/2013/06/andrew_rift_small.jpg" />\r\n<p>&nbsp;</p>\r\n\r\n<p>Andrew was a brilliant computer graphics engineer, an avid photographer<a href="http://www.reisse.net">(1)</a> and hiker who loved nature, and a loyal friend. Andrew was unique in so many interesting ways. He was extraordinarily kind and utterly selfless. He was a mentor and an inspiration to everyone around him.</p>\r\n\r\n<p>Some of us have known Andrew since college, and have worked with him at multiple companies beginning with Scaleform in Maryland which he helped start at age 19, then at Gaikai in Aliso Viejo which brought him out to California, and finally at Oculus where he was a co-founder and lead engineer.</p>\r\n\r\n<p>Andrew&rsquo;s contributions span far and wide in the video game industry. His code is embedded in thousands of games played by millions of people around the world.</p>\r\n\r\n<p><em>Before Oculus</em><br />\r\nWhile studying Computer Science at University of Maryland College Park, he ended up sharing a dorm room with Michael Antonov second semester of his freshman year. He loved games, but even more, he loved the technology behind them. Just for fun, he made his own 3D rendering engine that could load Quake maps. That same year, the two met Brendan Iribe and set out to make a UI system for game developers, which was first used in Civilization IV and would later become Scaleform GFx &ndash; used by thousands of video games.</p>\r\n<img alt="Scaleform Team" src="http://www.oculusvr.com/wp-content/uploads/2013/06/scaleform_team_small.jpg" />\r\n<p>&nbsp;</p>\r\n\r\n<p>Andrew was a freethinker and stood by his opinions and ideals. He was against corporate agreements that restrict an employee&rsquo;s ability to contribute to open source side projects. When pushed by Autodesk to sign such an agreement, Andrew opted instead to join Brendan at Gaikai, the cloud streaming company, in California. Michael and Nate joined Andrew and Brendan a week later, where the team worked on Gaikai&rsquo;s cloud gaming platform and SDK until they started Oculus. Andrew continued his work on open-source projects all the while.</p>\r\n\r\n<p><em>At Oculus</em></p>\r\n<img alt="Oculus Team" src="http://static.oculusvr.com/website/2012/10/compNY.jpg" /><br />\r\nAndrew&rsquo;s impact on the software and hardware we&rsquo;ve developed at Oculus is immeasurable. He was a lead on the Oculus SDK, the Unreal Engine integration, Hawken VR, and nearly every demo we&rsquo;ve shown since the company inception. Despite all his work, he never bragged or boasted. When he wasn&rsquo;t programming at the office, he was learning, reading his favorite web site &mdash; slashdot.org &mdash; or helping other teammates brainstorm and innovate.\r\n<p>He believed in what we&rsquo;re building and always pushed the team to be better than we thought we could be.</p>\r\n<img alt="Andrew at the Office" src="http://www.oculusvr.com/wp-content/uploads/2013/06/Andrew_Oculus_Office.jpg" />\r\n<p>Andrew was taken from us long before his time. Words cannot express how sorely he will be missed or how deeply our sympathy runs for his family.</p>\r\n\r\n<p>Andrew, you will always be in our thoughts and never forgotten. We love you, Reisse.</p>\r\n\r\n<p><strong>Andrew&rsquo;s photography can be found at <a href="http://www.reisse.net">www.reisse.net</a>.</strong></p>\r\n', 'default.twig', 'Sad page', '2013-06-02 16:58:00', 'kustom-slug', 'Andrew was taken from us long before his time.', 'clan'),
(6, 'Another page', '<p>The following is a list of all the native rules that are available to use:</p>\r\n\r\n<table border="0" cellpadding="0" cellspacing="1" >\r\n <tbody>\r\n  <tr>\r\n   <th>Rule</th>\r\n   <th>Parameter</th>\r\n   <th>Description</th>\r\n   <th>Example</th>\r\n  </tr>\r\n  <tr>\r\n   <td><strong>required</strong></td>\r\n   <td>No</td>\r\n   <td>Returns FALSE if the form element is empty.</td>\r\n   <td>&nbsp;</td>\r\n  </tr>\r\n  <tr>\r\n   <td><strong>matches</strong></td>\r\n   <td>Yes</td>\r\n   <td>Returns FALSE if the form element does not match the one in the parameter.</td>\r\n   <td>matches[form_item]</td>\r\n  </tr>\r\n  <tr>\r\n   <td><strong>is_unique</strong></td>\r\n   <td>Yes</td>\r\n   <td>Returns FALSE if the form element is not unique to the table and field name in the parameter.</td>\r\n   <td>is_unique[table.field]</td>\r\n  </tr>\r\n  <tr>\r\n   <td><strong>min_length</strong></td>\r\n   <td>Yes</td>\r\n   <td>Returns FALSE if the form element is shorter then the parameter value.</td>\r\n   <td>min_length[6]</td>\r\n  </tr>\r\n  <tr>\r\n   <td><strong>max_length</strong></td>\r\n   <td>Yes</td>\r\n   <td>Returns FALSE if the form element is longer then the parameter value.</td>\r\n   <td>max_length[12]</td>\r\n  </tr>\r\n  <tr>\r\n   <td><strong>exact_length</strong></td>\r\n   <td>Yes</td>\r\n   <td>Returns FALSE if the form element is not exactly the parameter value.</td>\r\n   <td>exact_length[8]</td>\r\n  </tr>\r\n  <tr>\r\n   <td><strong>greater_than</strong></td>\r\n   <td>Yes</td>\r\n   <td>Returns FALSE if the form element is less than the parameter value or not numeric.</td>\r\n   <td>greater_than[8]</td>\r\n  </tr>\r\n  <tr>\r\n   <td><strong>less_than</strong></td>\r\n   <td>Yes</td>\r\n   <td>Returns FALSE if the form element is greater than the parameter value or not numeric.</td>\r\n   <td>less_than[8]</td>\r\n  </tr>\r\n  <tr>\r\n   <td><strong>alpha</strong></td>\r\n   <td>No</td>\r\n   <td>Returns FALSE if the form element contains anything other than alphabetical characters.</td>\r\n   <td>&nbsp;</td>\r\n  </tr>\r\n  <tr>\r\n   <td><strong>alpha_numeric</strong></td>\r\n   <td>No</td>\r\n   <td>Returns FALSE if the form element contains anything other than alpha-numeric characters.</td>\r\n   <td>&nbsp;</td>\r\n  </tr>\r\n  <tr>\r\n   <td><strong>alpha_dash</strong></td>\r\n   <td>No</td>\r\n   <td>Returns FALSE if the form element contains anything other than alpha-numeric characters, underscores or dashes.</td>\r\n   <td>&nbsp;</td>\r\n  </tr>\r\n  <tr>\r\n   <td><strong>numeric</strong></td>\r\n   <td>No</td>\r\n   <td>Returns FALSE if the form element contains anything other than numeric characters.</td>\r\n   <td>&nbsp;</td>\r\n  </tr>\r\n  <tr>\r\n   <td><strong>integer</strong></td>\r\n   <td>No</td>\r\n   <td>Returns FALSE if the form element contains anything other than an integer.</td>\r\n   <td>&nbsp;</td>\r\n  </tr>\r\n  <tr>\r\n   <td><strong>decimal</strong></td>\r\n   <td>Yes</td>\r\n   <td>Returns FALSE if the form element is not exactly the parameter value.</td>\r\n   <td>&nbsp;</td>\r\n  </tr>\r\n  <tr>\r\n   <td><strong>is_natural</strong></td>\r\n   <td>No</td>\r\n   <td>Returns FALSE if the form element contains anything other than a natural number: 0, 1, 2, 3, etc.</td>\r\n   <td>&nbsp;</td>\r\n  </tr>\r\n  <tr>\r\n   <td><strong>is_natural_no_zero</strong></td>\r\n   <td>No</td>\r\n   <td>Returns FALSE if the form element contains anything other than a natural number, but not zero: 1, 2, 3, etc.</td>\r\n   <td>&nbsp;</td>\r\n  </tr>\r\n  <tr>\r\n   <td><strong>valid_email</strong></td>\r\n   <td>No</td>\r\n   <td>Returns FALSE if the form element does not contain a valid email address.</td>\r\n   <td>&nbsp;</td>\r\n  </tr>\r\n  <tr>\r\n   <td><strong>valid_emails</strong></td>\r\n   <td>No</td>\r\n   <td>Returns FALSE if any value provided in a comma separated list is not a valid email.</td>\r\n   <td>&nbsp;</td>\r\n  </tr>\r\n  <tr>\r\n   <td><strong>valid_ip</strong></td>\r\n   <td>No</td>\r\n   <td>Returns FALSE if the supplied IP is not valid. Accepts an optional parameter of &quot;IPv4&quot; or &quot;IPv6&quot; to specify an IP format.</td>\r\n   <td>&nbsp;</td>\r\n  </tr>\r\n  <tr>\r\n   <td><strong>valid_base64</strong></td>\r\n   <td>No</td>\r\n   <td>Returns FALSE if the supplied string contains anything other than valid Base64 characters.</td>\r\n   <td>&nbsp;</td>\r\n  </tr>\r\n </tbody>\r\n</table>\r\n\r\n<p><strong>Note:</strong> These rules can also be called as discrete functions. For example:</p>\r\n<code>$this-&gt;form_validation-&gt;required($string);</code>\r\n\r\n<p><strong>Note:</strong> You can also use any native PHP functions that permit one parameter.</p>\r\n', 'fullwidth.twig', 'Pager', '2013-06-02 17:09:00', 'another-page', 'The following is a list of all the native rules that are available to use', 'public'),
(7, 'Using Arrays as Field Names', '<h1>File Helper</h1>\r\n\r\n<p>The File Helper file contains functions that assist in working with files.</p>\r\n\r\n<h2>Loading this Helper</h2>\r\n\r\n<p>This helper is loaded using the following code:</p>\r\n<code>$this-&gt;load-&gt;helper(&#39;file&#39;);</code>\r\n\r\n<p>The following functions are available:</p>\r\n\r\n<h2>read_file&#40;&#39;<var>path</var>&#39;&#41;</h2>\r\n\r\n<p>Returns the data contained in the file specified in the path. Example:</p>\r\n<code>$string = read_file&#40;&#39;./path/to/file.php&#39;&#41;;</code>\r\n\r\n<p>The path can be a relative or full server path. Returns FALSE (boolean) on failure.</p>\r\n\r\n<p><strong>Note:</strong> The path is relative to your main site index.php file, NOT your controller or view files. CodeIgniter uses a front controller so paths are always relative to the main site index.</p>\r\n\r\n<p>If your server is running an open_basedir restriction this function might not work if you are trying to access a file above the calling script.</p>\r\n', 'default.twig', 'Array', '2013-06-02 17:18:00', 'using-arrays-as-field', 'Returns the data contained in the file specified in the path. Example:', 'registered'),
(10, 'About us', '<p><strong>About TCM</strong> |<strong> <a href="http://www.tcm-gaming.net/contact-us">Contact TCM</a></strong> |<strong> <a href="http://www.tcm-gaming.net/press">Press, Media &amp; Resources</a></strong> | <strong><a href="http://www.tcm-gaming.net/Staff">Staff</a></strong> | <strong><a href="http://www.tcm-gaming.net/partners">Partners</a></strong> | <strong><a href="http://www.tcm-gaming.net/social-media">Social Media</a></strong></p>\r\n\r\n<p><strong>Founded in 2005, TCM-Gaming (TCM) is a professional gaming team and marketing/media company which has HQ in the UK, but works alongside gamers and partners from across the globe. TCM Specialises in managing professional players, event management, online/offline broadcasting and promoting partners via creative and engaging campaigns targeting at the competitive gaming industry.</strong></p>\r\n\r\n<p>Originally formed in January 2005 under the name eSourceUK, the company has evolved from being a simple set of friends playing for fun, to a distinguished full scale business, with dedicated players and staff from all over the United Kingdom, Europe and the World. In November of 2007 it was agreed that the team would take a radical new direction solely representing head sponsor and world leading cooling specialist &ndash; CoolerMaster. This relationship helped ensure they could stay around for the duration and become a well known and successful organisation.</p>\r\n\r\n<p>January 2010 brought about a re-branding to TCM-Gaming, eliminating one dedicated sponsor, allowing us to re-focus and relaunch with a wider variety of partners. Today, we work closely with our partners to enable them to reach a direct demographic of grassroot, hardcore and professional standard gamers and an audience that is one of the most passionate industries in the world. We help them showcase their products, services and message to the masses, but in such a way that helps Esports grow as a whole.</p>\r\n\r\n<p><img alt="" src="http://www.tcm-gaming.net/uploads/tinymce/images/polaroid_mashup_2012_v2.png"  margin-left:auto; margin-right:auto; width:500px" /></p>\r\n\r\n<table border="0">\r\n <tbody>\r\n  <tr>\r\n   <td><img alt="" src="http://www.tcm-gaming.net/uploads/tinymce/images/profile_hd_walkah.png"  width:150px" /></td>\r\n   <td >&nbsp;</td>\r\n   <td >\r\n   <h ><strong><img alt="" src="http://www.tcm-gaming.net/uploads/tinymce/images/flags/gb.png"  width:16px" />&nbsp;Craig&nbsp;Walker</strong></h2>\r\n\r\n   <p><strong><a href="http://www.tcm-gaming.net/profile/walkah">walkah</a></strong></p>\r\n\r\n   <p><em><strong>Co-Owner</strong></em></p>\r\n\r\n   <p><strong>E-Mail:</strong> <a href="mailto:craig@tcm-gaming.net">craig@tcm-gaming.net</a></p>\r\n\r\n   <p>Craig started his spell in TCM-Gaming as a player winning several I-Series medals in his playing career. Craig made the move into the management team after tireless work behind the scenes and brings a wealth of abilities to the role. At the end of 2011 Craig took the next step becoming Co Owner of TCM-Gaming. Craig was also resposible for designing the TCM-Gaming Website .&nbsp;&nbsp;</p>\r\n   </td>\r\n  </tr>\r\n </tbody>\r\n</table>\r\n\r\n<table border="0">\r\n <tbody>\r\n  <tr>\r\n   <td><img alt="" src="http://www.tcm-gaming.net/uploads/tinymce/images/profile_hd_xman.png"  width:150px" /></td>\r\n   <td >&nbsp;</td>\r\n   <td >\r\n   <h ><strong><img alt="" src="http://www.tcm-gaming.net/uploads/tinymce/images/flags/gb.png"  width:16px" />&nbsp;Jim&nbsp;Maguire</strong></h2>\r\n\r\n   <p><strong><a href="http://www.tcm-gaming.net/profile/Xman">Xman</a></strong></p>\r\n\r\n   <p><em><strong>Co-Owner</strong></em></p>\r\n\r\n   <p><strong>E-Mail:&nbsp;</strong><a href="mailto:jim@tcm-gaming.net">jim@tcm-gaming.net</a><br />\r\n   &nbsp;</p>\r\n\r\n   <p>After literally a decade of running his personal team, Weapons of the Rebellion (wotr), and playing at the top level of International Team Fortress 2, Jim joined the management team after TCM signed his primary line-up. Since then Jim has been an integral part of the management team, combining his financial, management and logistical abilities. Along side Craig Jim became Co Owner of TCM-Gaming in November 2011 and has never looked back.</p>\r\n   </td>\r\n  </tr>\r\n </tbody>\r\n</table>\r\n', 'default.twig', 'About us', '2013-06-05 14:31:00', 'about', 'About our clan', 'public'),
(11, 'Contact us', '<p><strong>General Enquiries</strong></p>\r\n\r\n<p><strong>E-Mail: </strong><a href="mailto: info@tcm-gaming.net">info@tcm-gaming.net</a></p>\r\n\r\n<p><strong>Website Feedback</strong>&nbsp;</p>\r\n\r\n<p><a href="http://www.tcm-gaming.net/forums/Website-Feedback-Bugs/">Make a post here!</a></p>\r\n', 'default.twig', 'Contact us', '2013-06-05 14:32:00', 'contact', 'Contact us form page', 'public');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=50 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `date`, `teaser`, `author`, `label`, `featured`, `clan`, `state`, `views`, `slug`) VALUES
(47, 'Winners of "Tidehunter must die!"', '<p><a href="http://sites.amd.com/us/promo/never-settle/Pages/nsreloaded.aspx?cmpid=DM-ba-EMEA-SC1QLIWYGJ#3">AMD Never Settle Reloaded</a>, we held a raffle with a little twist to win three PowerColor Radeon™ HD 7790 graphics card. The goal was to solve the Tidehunter riddle. Read on if you want to know who the winners are, maybe you are one of them!\r\nWhat the raffle was about:\r\nWe created 14 short videos with Tidehunter´s inavitable death, dropping a code each time and two in the last and final video. These clips were shown throughout the whole course of the Western Qualifier of The International on TobiWan´s stream.\r\nAll codes combined in the right position lead you to finding a URL (<a href="http://www.joindota.com/en/statics/youjustfoundthecodeoftidehunter">http://www.joindota.com/en/statics/youjustfoundthecodeoftidehunter</a>) on joinDOTA where you could participate in the raffle to win. In the end, 87 clever people managed to find the URL in time.\r\nFor all who are interested in watching our silly videos again, we will upload them onto our joinDOTA Youtube account in the next days.\r\nAnd here are the winners<strong>1 x PowerColor Radeon™ HD 7790</strong> goes to: <a href="http://forum.gamesports.net/dota/member.php?266837">dhe platypus</a> from the Netherlands<strong>1 x PowerColor Radeon™ HD 7790</strong> goes to: <a href="http://forum.gamesports.net/dota/member.php?91134">LionHolt</a> from Greece<strong>1 x PowerColor Radeon™ HD 7790</strong> goes to: <a href="http://forum.gamesports.net/dota/member.php?88629">leaf</a> from Germany\r\nYou should definitely check out the <a href="http://www.powercolor.com/global/products_features.asp?id=463">PowerColor Product Page</a>! If you want to know more about the PowerColor TurboDuo HD 7790, just go to the<a href="http://www.joindota.com/en/news/9763-winners-of-tidehunter-must-die"> product page</a>.\r\nAnd by the way, everybody planning a purchase of a new graphics card should definitely go to "<a href="http://sites.amd.com/us/promo/never-settle/Pages/nsreloaded.aspx?cmpid=DM-ba-EMEA-SC1QLIWYGJ#3">Never Settle Reloaded</a>".</p>', '2013-06-05 13:18:21', 'Together with the joinDOTA and AMD Never Settle Reloaded, we held a raffle with a little twist to win three PowerColor Radeon™ HD 7790 graphics card. The goal was to solve the Tidehunter riddle. Read on if you want to know who the winners are, maybe you are one of them! ', 1, 11, 0, 0, 1, 19, 'winners-of-tidehunter-mus'),
(48, 'Third cup of EMS One concludes', 'Just moments ago the third cup of the <strong>RaidCall EMS One</strong> Summer Season finished, with<br /><img alt="de" src="http://flags.gs-media.de/de.gif" /><strong>mousesports</strong> taking on <img alt="fr" src="http://flags.gs-media.de/fr.gif" /><strong>Quantic Gaming</strong>, who <a href="http://www.joindota.com/en/news/9749-dd-dota-become-quantic">announced that they had picked up <strong>dd.Dota</strong></a> minutes before the best-of-three grand final was due to begin, prompting the team to don their new team name for the first time during the finals.<br /><br />\r\nThe last cup will be played next week, on <strong>June 10th &amp; 11th</strong>, which is the last chance for the teams to secure their spot for the groupstages.<br /><br /><a href="http://www.joindota.com/en/coverages/4457-raidcall-ems-one-summer-season"><img alt="" src="http://store.gs-media.de/13000/13785.png" /></a><br /><br />\r\nIn this week''s edition of the EMS one Cup <img alt="se" src="http://flags.gs-media.de/se.gif" /><strong>The Alliance</strong> wanted to finally collect some points, after having missed the two first cups due to their participation in the <strong>G1- Champion League Lan Finals</strong>. However, as mouseports kicked them out in the second round with a very dominant performance, The Alliance is still not in the Top 12 on the Table, and will have to make up for it in the fourth and last cup in order to still have a chance to make their way to the LAN Finals next month.<br /><br />\r\nApart from the Swedes <img alt="ua" src="http://flags.gs-media.de/ua.gif" /><strong>Natus Vincere</strong> and <img alt="ru" src="http://flags.gs-media.de/ru.gif" /><strong> Virtus Pro</strong> haven''t played any matches in the <strong>RaidCall EMS One Summer</strong> despite both earning an invite to the LAN event last season, and in the case of Na`Vi coming out victorious. While Na`Vi likely have other plans, if VP, The Alliance or any other team yet not present in the top 12 want to be sure of their participation in the groupstages, they are likely to need to reach at least the semi-finals in next weeks cup.<br /><br />\r\nThis week DOTA Fans also got to see <strong>The International 2011</strong> Winner <img alt="ua" src="http://flags.gs-media.de/ua.gif" /><strong>Ivan ''ArtStyle'' Antonov</strong> back in action with his new team <img alt="ru" src="http://flags.gs-media.de/ru.gif" /><strong>Netolic.Ru</strong>, who proceeded to the semi-finals after having knockedd out EMS One Spring Lan Finals participant <img alt="fi" src="http://flags.gs-media.de/fi.gif" /><strong>Rat in the dark</strong> aswell as Cup #3''s semi-finalist <img alt="fr" src="http://flags.gs-media.de/fr.gif" /><strong>Imaginary Gaming.</strong><br /><br />\r\nIn the last game of the night we got the see the re-match of the Inernational West Qualifier finals, where mousesports managed to overcome dd.Dota, now Quantic Gaming, once more. With their 2-1 win they secured themselve the first place not only in this weeks cup, but also in the overall cup standings.<br /><br />\r\nSchedule for EMS One Summer<br /><br /><strong>EMS Cup #4</strong> - June 10th &amp; 11th<br /><br /><strong>Groupstage</strong> - June 19th to 21st &amp; 24th to 26th<br /><br /><strong>LAN Finals</strong> - July 13th &amp; 14th<br /><br />\r\nEMS One Summer Cup Standings<br />\r\n \r\n<table><tbody><tr><th>#</th>\r\n   <th>Team Name</th>\r\n   <th>Cup #1</th>\r\n   <th>Cup #2</th>\r\n   <th>Cup #3</th>\r\n   <th>Cup #4</th>\r\n   <th>Total</th>\r\n  </tr><tr><td>1</td>\r\n   <td><img alt="de" src="http://flags.gs-media.de/de.gif" /> mousesports</td>\r\n   <td>50</td>\r\n   <td>100</td>\r\n   <td>100</td>\r\n   <td> </td>\r\n   <td>250</td>\r\n  </tr><tr><td>2</td>\r\n   <td><img alt="dk" src="http://flags.gs-media.de/dk.gif" /> Space</td>\r\n   <td>50</td>\r\n   <td>75</td>\r\n   <td>25</td>\r\n   <td> </td>\r\n   <td>150</td>\r\n  </tr><tr><td>3</td>\r\n   <td><img alt="ru" src="http://flags.gs-media.de/ru.gif" /> RoX.KiS</td>\r\n   <td>100</td>\r\n   <td>10</td>\r\n   <td>25</td>\r\n   <td> </td>\r\n   <td>135</td>\r\n  </tr><tr><td>4</td>\r\n   <td><img alt="fi" src="http://flags.gs-media.de/fi.gif" /> Rat in the dark</td>\r\n   <td>75</td>\r\n   <td>10</td>\r\n   <td>10</td>\r\n   <td> </td>\r\n   <td>95</td>\r\n  </tr><tr><td>5</td>\r\n   <td><img alt="fr" src="http://flags.gs-media.de/fr.gif" /> Imaginary Gaming</td>\r\n   <td>10</td>\r\n   <td>50</td>\r\n   <td>25</td>\r\n   <td> </td>\r\n   <td>85</td>\r\n  </tr><tr><td>6</td>\r\n   <td><img alt="fr" src="http://flags.gs-media.de/fr.gif" /> dd.dota</td>\r\n   <td> </td>\r\n   <td> </td>\r\n   <td>75</td>\r\n   <td> </td>\r\n   <td>75</td>\r\n  </tr><tr><td>-</td>\r\n   <td><img alt="eu" src="http://flags.gs-media.de/eu.gif" /> Fnatic.EU</td>\r\n   <td>25</td>\r\n   <td> </td>\r\n   <td>50</td>\r\n   <td> </td>\r\n   <td>75</td>\r\n  </tr><tr><td>8</td>\r\n   <td><img alt="ru" src="http://flags.gs-media.de/ru.gif" /> Netolic.Ru</td>\r\n   <td>10</td>\r\n   <td>10</td>\r\n   <td>50</td>\r\n   <td> </td>\r\n   <td>70</td>\r\n  </tr><tr><td>9</td>\r\n   <td><img alt="rs" src="http://flags.gs-media.de/rs.gif" /> Infernity Gaming</td>\r\n   <td>5</td>\r\n   <td>50</td>\r\n   <td>10</td>\r\n   <td> </td>\r\n   <td>65</td>\r\n  </tr><tr><td>10</td>\r\n   <td><img alt="se" src="http://flags.gs-media.de/se.gif" /> 4 Friends + Chrillee</td>\r\n   <td>25</td>\r\n   <td>25</td>\r\n   <td>10</td>\r\n   <td> </td>\r\n   <td>60</td>\r\n  </tr><tr><td>-</td>\r\n   <td><img alt="se" src="http://flags.gs-media.de/se.gif" /> Keita-Gaming</td>\r\n   <td>25</td>\r\n   <td>25</td>\r\n   <td>10</td>\r\n   <td> </td>\r\n   <td>60</td>\r\n  </tr><tr><td>12</td>\r\n   <td><img alt="ru" src="http://flags.gs-media.de/ru.gif" /> iCCup</td>\r\n   <td>25</td>\r\n   <td>10</td>\r\n   <td>5</td>\r\n   <td> </td>\r\n   <td>50</td>\r\n  </tr></tbody></table><br />\r\nSources: <a href="http://en.dota2.raidcall-emsone.com/">EMS One</a>', '2013-06-05 14:12:31', 'Just moments ago the third cup of the RaidCall EMS One Summer Season finished, with\r\nde mousesports taking on fr Quantic Gaming, who announced that they had picked up dd.Dota minutes before the best-of-three grand final was due to begin, prompting the team to don their new team name for the first time during the finals.\r\n', 1, 6, 0, 0, 1, 54, 'third-cup-of-ems-one-conc'),
(49, 'Ayesee & The GD Studio to DHS 2013', 'After the <a href="http://www.joindota.com/en/news/9677-dreamhack-online-qualifiers-conclude">two online qualifiers</a> being concluded and almost all of the teams, except the BYOC-Qualifier ones released - <strong>DreamHack Summer 2013</strong> is almost ready to go. Tonight, during <strong>The GD Show #45</strong> a final announcement about the production and casters for the event was released. Next weekend we will have the chance to hear some voices of <strong>The International 2</strong>.<br /><br /><img alt="" src="http://store.gs-media.de/19000/19677.jpg" /><br />\nThe production for the event will be handled by none other than <strong>The GD Studio</strong> themselves. Having successfully hosted last year''s <strong>DreamHack Winter 2012</strong> and <strong>The International 3 West Qualifiers</strong>, the crew will be returning to another Dreamhack event. This time including community''s favourite Statsman <img alt="ar" src="http://flags.gs-media.de/ar.gif" /><strong>Bruno</strong> bringing along ofcourse the famous minimap, used at The International 3 West Qualifiers.<br /><br />\nThe casters for this year will be a very familiar duo in the Dota2 scene. Being known for casting The International 2 and two seasons of the RaidCall Dota2 League, <img alt="us" src="http://flags.gs-media.de/us.gif" /><strong>Ayesee</strong> and <img alt="us" src="http://flags.gs-media.de/us.gif" /><strong>Draskyl</strong>, will be making a comeback with <img alt="us" src="http://flags.gs-media.de/us.gif" /><strong>Ayesee</strong> being flewn in from America. The duo has also recieved invites to cast The International 3 aswell. Altough <strong>Ayesee</strong> is currently casting the Raidcall Dota2 League Season 3 with <img alt="dk" src="http://flags.gs-media.de/dk.gif" /><strong>Maelk</strong> from the Evil Geniuses Lair, he will be reunited with <img alt="us" src="http://flags.gs-media.de/us.gif" /><strong>Draskyl</strong> who is already in Sweden, at The GD Studio.<br /><br />\nAyesee''s has also released an statement on <a href="http://www.reddit.com/r/DotA2/comments/1foe2t/ayesee_and_draskyl_to_cast_dreamhack/cac75ws">reddit</a>:\n<blockquote>\n<p>I really can''t put into words how honored I am to be invited to work with one of the most legendary names PC gaming history, and eSports history.<br />\nI can''t say enough how thankful I am to Dreamhack for their invitation, and to all of the people who helped in giving me this opportunity -- Evil Geniuses, 2GD and the whole studio, Draskyl, and of course, above everyone else, you guys. There still isn''t a day when I don''t wake up humbled to my core that I''m fortunate enough to work in my dream industry, serving and being a part of a community so kind and supportive.<br />\nCan''t wait to give a loud and warm "Greetings and salutations, Dota fans" to everyone in Sweden, and watching around the world &lt;3</p>\n</blockquote>\n<br />\nSources: <a href="https://twitter.com/ayesee/status/342027184858337282">Ayesee''s announcement</a>, <a href="https://twitter.com/TheGDStudio/status/342024461949747200">The GD Studio announcement</a>', '2013-06-05 13:29:11', 'After the two online qualifiers being concluded and almost all of the teams, except the BYOC-Qualifier ones released - DreamHack Summer 2013 is almost ready to go. Tonight, during The GD Show #45 a final announcement about the production and casters for the event was released. Next weekend we will have the chance to hear some voices of The International 2. ', 1, 11, 1, 0, 1, 89, 'ayesee-the-gd-studio-to-d');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `name`, `description`, `games`, `banner`, `logo`, `countryID`) VALUES
(2, 'Test Team', 'Quis synth messenger bag vegan meggings nihil locavore, ad polaroid blue bottle. 3 wolf moon labore etsy tonx try-hard mollit, cray sunt VHS brooklyn wayfarers street art four loko aliqua velit. ', '2', '2_banner.png', '21.jpg', 55),
(5, 'Test team 2', 'Nulla tousled next level, sustainable kogi locavore eu keytar organic elit williamsburg. Nulla vinyl retro dolor, artisan semiotics direct trade sustainable mollit.', '3,10', '5_banner.png', '5.png', 55),
(6, 'Counter Strike Squad', 'CodeIgniter uses a modified version of the Active Record Database Pattern. This pattern allows information to be retrieved, inserted, and updated in your database with minimal scripting. In some cases only one or two lines of code are necessary to perform a database action. CodeIgniter does not require that each database table be its own class file. It instead provides a more simplified interface.', '6,7,8', NULL, NULL, 83);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=62 ;

--
-- Dumping data for table `teams_members`
--

INSERT INTO `teams_members` (`id`, `team_id`, `user_id`, `position`) VALUES
(25, 5, 3, NULL),
(26, 5, 4, NULL),
(27, 5, 8, NULL),
(28, 5, 9, NULL),
(29, 5, 10, NULL),
(54, 6, 1, NULL),
(55, 6, 4, NULL),
(56, 6, 5, NULL),
(57, 6, 7, NULL),
(58, 2, 2, NULL),
(59, 2, 3, NULL),
(60, 2, 4, NULL),
(61, 2, 5, NULL);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `dob`, `gender`, `country`, `avatar`) VALUES
(1, '\0\0', 'administrator', '59beecdf7fc966e2f17fd8f65a4a9aeb09d4a3d4', '9462e8eee0', 'admin@admin.com', '', NULL, NULL, '9d029802e28cd9c768e8e62277c0df49ec65c48c', 1268889823, 1371466477, 1, 'Karlo', 'Mikus', '2013-05-15 00:00:00', NULL, NULL, '12.png'),
(2, '\0\0', 'test', 'c9677e8112319f649747a8b05708d010221e6b41', NULL, 'test@test.com', NULL, NULL, NULL, NULL, 1361107053, 1361107053, 1, NULL, NULL, NULL, NULL, NULL, NULL),
(3, '\0\0', 'test2', 'b4bbb3960ac42732f74d08c1927f97003ef9bb6b', NULL, 'test2@test.com', NULL, NULL, NULL, NULL, 1361107377, 1361107377, 1, NULL, NULL, NULL, NULL, NULL, NULL),
(4, '\0\0', 'johndoe', 'f406c4e029784051584774587294de88047f74a0', NULL, 'john@doe.com', NULL, NULL, NULL, NULL, 1361112609, 1361112609, 1, NULL, NULL, NULL, NULL, NULL, NULL),
(5, '\0\0', 'demouser', 'ab8ec30b82b677a58295f5b9acca8a274f4836f5', NULL, 'demo@demo.us', NULL, NULL, NULL, NULL, 1361112622, 1361112622, 1, NULL, NULL, NULL, NULL, NULL, NULL),
(7, '\0\0', 'comic', '70dd69dd59f781cb2526a94a7db844bd4498865f', NULL, 'comic@sans.com', '310b0e07fc5d4c9ae320ead15496a491b3725a3e', NULL, NULL, NULL, 1361112657, 1361112657, 0, NULL, NULL, NULL, NULL, NULL, NULL),
(8, '\0\0', 'updated', '88484160d2486d9bb2740b90624d642f0c320a71', NULL, 'asda1@asd.com', NULL, NULL, NULL, NULL, 1361878943, 1361878943, 1, NULL, NULL, NULL, NULL, NULL, NULL),
(9, '\0\0', 'mmaric', '0dc1673757339d5160691754a5c5ceb6db70455d', NULL, 'maric@mm.com', NULL, NULL, NULL, NULL, 1362528738, 1362528738, 1, NULL, NULL, NULL, NULL, NULL, NULL),
(10, '\0\0', 'mtest', '590756944210dd0131717d50f4d4c0b16c952914', NULL, 'mtest@ssss.com', NULL, NULL, NULL, NULL, 1362528766, 1362528766, 1, NULL, NULL, NULL, NULL, NULL, NULL),
(11, '\0\0', 'eggzy', '46971820a249b9fe32b331534f8758baa6aa2e94', NULL, 'eggzy12@gmail.com', NULL, NULL, NULL, 'cfb089722a82fc8818b2edfbe28142f96f14ad21', 1367704152, 1369161584, 1, NULL, NULL, NULL, NULL, NULL, NULL),
(12, '\0\0', 'egzasa', '7f3aebf5d475de8c11d2c465d8ca7a439cbb2bc4', NULL, 'asfasf@gmsa.com', NULL, NULL, NULL, NULL, 1367705189, 1367705189, 1, NULL, NULL, NULL, NULL, NULL, NULL),
(13, '\0\0', 'safas', '45872df6b1fa99acca78d66b0953147c24dc2128', NULL, 'karlo.mikus1@gmail.com', '79d996585c4b7b2ae87d6a8e1e5b847f05165d9c', NULL, NULL, NULL, 1368480086, 1368480086, 0, NULL, NULL, NULL, NULL, NULL, NULL),
(14, '\0\0', 'stats', '59beecdf7fc966e2f17fd8f65a4a9aeb09d4a3d4', NULL, 'stats@gmail.com', NULL, NULL, NULL, NULL, 1370517099, 1370517099, 0, NULL, NULL, NULL, NULL, NULL, NULL),
(15, '\0\0', 'stats2', '2dfe83964f3273daee484b4c2264625bfd9575b8', NULL, 'st@st.com', '1cb3a1edc98855fc0298463764ceaf172fc65300', NULL, NULL, '47e3485a22ce9e07ad32191020d73c1730f64c36', 1370517269, 1370517310, 1, NULL, NULL, NULL, NULL, NULL, NULL),
(16, '\0\0', 'ssssssssss', 'fc8f03ba66b1a38f99f52e04bc7bae4eb382784d', NULL, 'mtest@sssss.com', '53db31d95f84e569b00f96f73949f890b4111d1d', NULL, NULL, NULL, 1370688024, 1370688024, 0, NULL, NULL, NULL, NULL, NULL, NULL);

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

-- --------------------------------------------------------

--
-- Table structure for table `users_pm`
--

CREATE TABLE IF NOT EXISTS `users_pm` (
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
