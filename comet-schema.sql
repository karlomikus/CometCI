-- phpMyAdmin SQL Dump
-- version 3.5.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 02, 2013 at 05:19 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=112 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `poster_id`, `content`, `module`, `module_link`, `parent_id`, `date`) VALUES
(2, 4, 'a felis ullamcorper viverra. Maecenas iaculis aliquet diam. Sed diam lorem, auctor quis, tristique ac, eleifend vitae, erat. Vivamus nisi. Mauris', 'posts', '41', NULL, '2013-05-04 09:43:34'),
(3, 5, 'erat neque non quam. Pellentesque habitant morbi tristique senectus et netus et malesuada', 'posts', '32', NULL, '2013-05-28 18:31:42'),
(4, 1, 'Proin vel arcu eu odio tristique pharetra. Quisque ac libero nec', 'posts', '28', NULL, '2013-05-12 19:02:15'),
(5, 3, 'In faucibus. Morbi vehicula. Pellentesque tincidunt tempus risus. Donec egestas. Duis ac arcu.', 'posts', '33', NULL, '2013-05-14 06:34:34'),
(6, 4, 'Praesent eu dui. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean eget magna. Suspendisse tristique neque venenatis lacus. Etiam bibendum fermentum metus.', 'posts', '40', NULL, '2013-05-08 09:32:52'),
(7, 2, 'Nam ac nulla. In tincidunt congue turpis. In condimentum. Donec at arcu. Vestibulum ante', 'posts', '26', NULL, '2013-05-03 07:03:50'),
(8, 1, 'facilisis vitae, orci. Phasellus dapibus quam quis diam. Pellentesque habitant morbi tristique senectus et netus et malesuada', 'posts', '30', NULL, '2013-05-13 17:47:07'),
(9, 3, 'elementum, dui quis accumsan convallis, ante lectus convallis est, vitae sodales nisi magna sed dui. Fusce aliquam, enim nec tempus scelerisque, lorem ipsum sodales purus, in molestie tortor', 'posts', '28', NULL, '2013-05-26 22:40:13'),
(10, 2, 'non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus', 'posts', '31', NULL, '2013-05-28 20:15:46'),
(11, 5, 'magna a tortor. Nunc commodo auctor velit. Aliquam nisl. Nulla eu neque pellentesque massa lobortis ultrices. Vivamus rhoncus. Donec est. Nunc ullamcorper, velit in aliquet lobortis, nisi nibh', 'posts', '25', NULL, '2013-05-30 10:20:47'),
(12, 5, 'mauris elit, dictum eu, eleifend nec, malesuada ut, sem. Nulla', 'posts', '34', NULL, '2013-05-18 22:04:35'),
(13, 1, 'laoreet ipsum. Curabitur consequat, lectus sit amet luctus vulputate, nisi sem semper erat, in consectetuer ipsum nunc id enim.', 'posts', '42', NULL, '2013-05-23 17:41:05'),
(14, 2, 'libero. Donec consectetuer mauris id sapien. Cras dolor dolor, tempus non, lacinia at, iaculis quis, pede. Praesent eu dui. Cum sociis', 'posts', '36', NULL, '2013-05-05 15:14:35'),
(15, 4, 'orci lacus vestibulum lorem, sit amet ultricies sem magna nec quam. Curabitur vel lectus. Cum sociis natoque', 'posts', '44', NULL, '2013-05-17 01:23:27'),
(16, 4, 'nonummy ut, molestie in, tempus eu, ligula. Aenean euismod mauris eu elit. Nulla facilisi. Sed neque. Sed eget lacus. Mauris non dui nec urna suscipit', 'posts', '29', NULL, '2013-05-04 12:43:21'),
(17, 3, 'lectus quis massa. Mauris vestibulum, neque sed dictum eleifend, nunc risus varius orci, in consequat enim diam vel arcu. Curabitur ut odio vel est', 'posts', '44', NULL, '2013-05-06 00:25:11'),
(18, 3, 'non, feugiat nec, diam. Duis mi enim, condimentum eget, volutpat ornare, facilisis eget, ipsum. Donec sollicitudin adipiscing ligula. Aenean', 'posts', '35', NULL, '2013-05-09 23:35:12'),
(19, 2, 'Quisque fringilla euismod enim. Etiam gravida molestie arcu. Sed eu', 'posts', '30', NULL, '2013-05-28 18:57:28'),
(20, 1, 'sed consequat auctor, nunc nulla vulputate dui, nec tempus mauris erat eget ipsum. Suspendisse sagittis. Nullam vitae diam. Proin dolor. Nulla semper tellus id', 'posts', '29', NULL, '2013-05-21 15:45:55'),
(21, 1, 'Donec egestas. Aliquam nec enim. Nunc ut erat. Sed nunc est, mollis non, cursus non, egestas a, dui. Cras pellentesque. Sed dictum. Proin eget', 'posts', '34', NULL, '2013-05-03 02:09:57'),
(22, 2, 'tristique senectus et netus et malesuada fames ac turpis egestas. Fusce aliquet magna a neque. Nullam ut nisi a odio semper cursus. Integer mollis. Integer', 'posts', '44', NULL, '2013-05-17 16:09:32'),
(23, 1, 'nec ante. Maecenas mi felis, adipiscing fringilla, porttitor vulputate, posuere vulputate, lacus. Cras interdum. Nunc sollicitudin commodo ipsum. Suspendisse non leo. Vivamus nibh dolor, nonummy', 'posts', '41', NULL, '2013-05-26 14:20:29'),
(24, 3, 'et netus et malesuada fames ac turpis egestas. Fusce aliquet magna a neque.', 'posts', '26', NULL, '2013-05-03 21:20:44'),
(25, 5, 'et pede. Nunc sed orci lobortis augue scelerisque mollis. Phasellus libero mauris, aliquam eu, accumsan sed, facilisis vitae, orci. Phasellus', 'posts', '31', NULL, '2013-05-12 10:31:04'),
(26, 5, 'porta elit, a feugiat tellus lorem eu metus. In lorem. Donec elementum, lorem ut aliquam iaculis, lacus', 'posts', '30', NULL, '2013-05-25 18:22:40'),
(27, 2, 'iaculis nec, eleifend non, dapibus rutrum, justo. Praesent luctus. Curabitur egestas nunc sed libero. Proin sed turpis', 'posts', '33', NULL, '2013-05-06 03:46:10'),
(28, 1, 'at, iaculis quis, pede. Praesent eu dui. Cum sociis natoque penatibus et magnis dis parturient montes,', 'posts', '29', NULL, '2013-05-22 17:38:55'),
(29, 5, 'ullamcorper, velit in aliquet lobortis, nisi nibh lacinia orci, consectetuer euismod est arcu ac orci. Ut semper pretium neque. Morbi quis urna. Nunc quis arcu', 'posts', '28', NULL, '2013-05-03 10:23:16'),
(30, 3, 'malesuada ut, sem. Nulla interdum. Curabitur dictum. Phasellus in felis. Nulla tempor augue ac ipsum. Phasellus vitae mauris sit amet lorem semper auctor. Mauris vel turpis.', 'posts', '36', NULL, '2013-05-25 15:37:51'),
(31, 3, 'velit. Sed malesuada augue ut lacus. Nulla tincidunt, neque vitae semper egestas,', 'posts', '44', NULL, '2013-05-15 15:54:55'),
(32, 2, 'dolor quam, elementum at, egestas a, scelerisque sed, sapien. Nunc pulvinar arcu et pede. Nunc sed orci lobortis augue', 'posts', '27', NULL, '2013-05-12 08:33:05'),
(33, 5, 'sit amet, faucibus ut, nulla. Cras eu tellus eu augue porttitor', 'posts', '43', NULL, '2013-05-21 16:12:02'),
(34, 3, 'dictum cursus. Nunc mauris elit, dictum eu, eleifend nec, malesuada ut, sem. Nulla interdum. Curabitur dictum.', 'posts', '41', NULL, '2013-05-10 22:57:52'),
(35, 4, 'Fusce fermentum fermentum arcu. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Phasellus ornare. Fusce mollis. Duis sit amet diam', 'posts', '39', NULL, '2013-05-23 21:21:45'),
(36, 1, 'quis, pede. Suspendisse dui. Fusce diam nunc, ullamcorper eu, euismod ac, fermentum vel, mauris. Integer sem elit, pharetra ut, pharetra sed, hendrerit a, arcu. Sed et libero. Proin', 'posts', '25', NULL, '2013-05-18 14:09:14'),
(37, 4, 'adipiscing lobortis risus. In mi pede, nonummy ut, molestie in, tempus eu, ligula. Aenean euismod mauris eu elit. Nulla facilisi. Sed neque. Sed eget', 'posts', '26', NULL, '2013-05-17 02:49:17'),
(38, 3, 'sit amet ultricies sem magna nec quam. Curabitur vel lectus. Cum sociis natoque penatibus et magnis dis parturient', 'posts', '44', NULL, '2013-05-12 23:55:31'),
(39, 3, 'felis, adipiscing fringilla, porttitor vulputate, posuere vulputate, lacus. Cras interdum. Nunc', 'posts', '41', NULL, '2013-05-17 11:43:48'),
(40, 3, 'id enim. Curabitur massa. Vestibulum accumsan neque et nunc. Quisque ornare tortor at risus. Nunc ac sem ut dolor dapibus gravida. Aliquam tincidunt, nunc ac mattis ornare, lectus ante dictum', 'posts', '35', NULL, '2013-05-03 04:26:06'),
(41, 1, 'Cras sed leo. Cras vehicula aliquet libero. Integer in magna. Phasellus dolor elit, pellentesque a, facilisis non,', 'posts', '35', NULL, '2013-05-14 16:39:21'),
(42, 4, 'sollicitudin adipiscing ligula. Aenean gravida nunc sed pede. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Proin vel', 'posts', '31', NULL, '2013-05-16 05:55:01'),
(43, 2, 'elementum at, egestas a, scelerisque sed, sapien. Nunc pulvinar arcu et pede. Nunc sed orci lobortis augue scelerisque mollis. Phasellus libero', 'posts', '32', NULL, '2013-05-21 04:36:39'),
(44, 3, 'ullamcorper viverra. Maecenas iaculis aliquet diam. Sed diam lorem, auctor', 'posts', '25', NULL, '2013-05-11 18:54:40'),
(45, 4, 'amet ante. Vivamus non lorem vitae odio sagittis semper. Nam tempor diam dictum sapien. Aenean massa. Integer vitae nibh. Donec est', 'posts', '27', NULL, '2013-05-21 00:00:29'),
(46, 5, 'In nec orci. Donec nibh. Quisque nonummy ipsum non arcu. Vivamus sit amet risus. Donec egestas. Aliquam nec enim. Nunc ut erat. Sed nunc est, mollis', 'posts', '34', NULL, '2013-05-05 12:43:50'),
(47, 5, 'nibh. Aliquam ornare, libero at auctor ullamcorper, nisl arcu iaculis', 'posts', '33', NULL, '2013-05-03 02:37:06'),
(48, 1, 'risus. Nunc ac sem ut dolor dapibus gravida. Aliquam tincidunt, nunc ac mattis ornare,', 'posts', '26', NULL, '2013-05-07 09:07:16'),
(49, 3, 'tellus non magna. Nam ligula elit, pretium et, rutrum non, hendrerit id, ante. Nunc mauris sapien, cursus', 'posts', '30', NULL, '2013-05-25 03:05:49'),
(50, 5, 'augue malesuada malesuada. Integer id magna et ipsum cursus vestibulum. Mauris magna. Duis dignissim tempor arcu. Vestibulum ut eros non enim commodo hendrerit. Donec porttitor tellus non magna.', 'posts', '30', NULL, '2013-05-08 07:02:28'),
(51, 3, 'justo. Proin non massa non ante bibendum ullamcorper. Duis cursus, diam at pretium aliquet, metus urna convallis erat, eget tincidunt dui augue', 'posts', '42', NULL, '2013-05-06 22:50:41'),
(52, 4, 'mi tempor lorem, eget mollis lectus pede et risus. Quisque libero lacus, varius et, euismod et, commodo at, libero. Morbi accumsan laoreet ipsum. Curabitur consequat, lectus sit amet luctus vulputate,', 'posts', '30', NULL, '2013-05-09 23:23:18'),
(53, 3, 'non, bibendum sed, est. Nunc laoreet lectus quis massa. Mauris', 'posts', '35', NULL, '2013-05-11 18:42:57'),
(54, 5, 'Duis risus odio, auctor vitae, aliquet nec, imperdiet nec, leo. Morbi neque tellus, imperdiet non, vestibulum nec, euismod in, dolor.', 'posts', '39', NULL, '2013-05-07 12:55:52'),
(55, 3, 'Nam tempor diam dictum sapien. Aenean massa. Integer vitae nibh. Donec est mauris, rhoncus id,', 'posts', '36', NULL, '2013-05-24 06:12:46'),
(56, 3, 'urna convallis erat, eget tincidunt dui augue eu tellus. Phasellus elit', 'posts', '26', NULL, '2013-05-12 12:00:22'),
(57, 2, 'ridiculus mus. Proin vel arcu eu odio tristique pharetra. Quisque ac libero nec ligula', 'posts', '31', NULL, '2013-05-26 08:29:44'),
(58, 1, 'magna. Praesent interdum ligula eu enim. Etiam imperdiet dictum magna. Ut tincidunt orci quis lectus. Nullam suscipit, est ac facilisis facilisis, magna tellus faucibus leo, in lobortis tellus', 'posts', '36', NULL, '2013-05-29 12:09:32'),
(59, 3, 'pellentesque a, facilisis non, bibendum sed, est. Nunc laoreet lectus quis massa. Mauris vestibulum,', 'posts', '27', NULL, '2013-05-04 17:48:32'),
(60, 1, 'massa. Suspendisse eleifend. Cras sed leo. Cras vehicula aliquet libero. Integer in magna. Phasellus dolor elit,', 'posts', '39', NULL, '2013-05-05 10:07:45'),
(61, 2, 'dolor egestas rhoncus. Proin nisl sem, consequat nec, mollis vitae, posuere at, velit. Cras lorem lorem, luctus ut, pellentesque eget, dictum placerat, augue. Sed molestie. Sed id', 'posts', '28', NULL, '2013-05-27 03:29:04'),
(62, 2, 'libero lacus, varius et, euismod et, commodo at, libero. Morbi accumsan laoreet ipsum. Curabitur', 'posts', '42', NULL, '2013-05-13 00:40:34'),
(63, 3, 'Cras eu tellus eu augue porttitor interdum. Sed auctor odio', 'posts', '44', NULL, '2013-05-20 12:51:30'),
(64, 1, 'turpis egestas. Fusce aliquet magna a neque. Nullam ut nisi a', 'posts', '34', NULL, '2013-05-20 05:04:58'),
(65, 2, 'at pede. Cras vulputate velit eu sem. Pellentesque ut ipsum ac mi eleifend egestas. Sed pharetra, felis eget', 'posts', '32', NULL, '2013-05-13 00:11:49'),
(66, 2, 'ante dictum mi, ac mattis velit justo nec ante. Maecenas mi felis, adipiscing fringilla, porttitor vulputate, posuere vulputate,', 'posts', '41', NULL, '2013-05-16 03:28:59'),
(67, 4, 'gravida. Aliquam tincidunt, nunc ac mattis ornare, lectus ante dictum mi, ac mattis velit justo nec ante.', 'posts', '41', NULL, '2013-05-03 05:35:46'),
(68, 4, 'Duis dignissim tempor arcu. Vestibulum ut eros non enim commodo hendrerit. Donec porttitor tellus non magna. Nam', 'posts', '25', NULL, '2013-05-19 11:24:55'),
(69, 1, 'nec urna suscipit nonummy. Fusce fermentum fermentum arcu. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Phasellus ornare. Fusce mollis. Duis sit', 'posts', '35', NULL, '2013-05-20 07:31:10'),
(70, 1, 'consequat enim diam vel arcu. Curabitur ut odio vel est tempor bibendum.', 'posts', '35', NULL, '2013-05-07 22:05:50'),
(71, 1, 'natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Proin vel nisl. Quisque fringilla euismod enim. Etiam gravida molestie arcu. Sed eu nibh vulputate mauris sagittis placerat.', 'posts', '29', NULL, '2013-05-12 03:09:47'),
(72, 5, 'Nam ac nulla. In tincidunt congue turpis. In condimentum. Donec at arcu. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices', 'posts', '29', NULL, '2013-05-16 04:10:26'),
(73, 5, 'metus urna convallis erat, eget tincidunt dui augue eu tellus. Phasellus elit pede, malesuada vel, venenatis vel, faucibus id, libero. Donec', 'posts', '31', NULL, '2013-05-03 04:57:38'),
(74, 5, 'dictum. Proin eget odio. Aliquam vulputate ullamcorper magna. Sed eu eros. Nam consequat dolor vitae dolor. Donec fringilla. Donec feugiat metus', 'posts', '37', NULL, '2013-05-22 18:48:33'),
(75, 5, 'consequat enim diam vel arcu. Curabitur ut odio vel est', 'posts', '37', NULL, '2013-05-13 19:13:02'),
(76, 2, 'natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.', 'posts', '36', NULL, '2013-05-06 20:29:35'),
(77, 5, 'dui. Cras pellentesque. Sed dictum. Proin eget odio. Aliquam vulputate ullamcorper magna. Sed eu eros. Nam consequat dolor vitae dolor. Donec fringilla. Donec feugiat metus sit amet ante.', 'posts', '42', NULL, '2013-05-16 02:17:46'),
(78, 5, 'est. Mauris eu turpis. Nulla aliquet. Proin velit. Sed malesuada augue ut lacus. Nulla tincidunt, neque vitae semper egestas, urna justo', 'posts', '27', NULL, '2013-05-07 16:25:22'),
(79, 3, 'ligula. Aliquam erat volutpat. Nulla dignissim. Maecenas ornare egestas ligula. Nullam feugiat placerat velit. Quisque varius. Nam porttitor scelerisque neque. Nullam nisl. Maecenas malesuada fringilla est. Mauris eu turpis.', 'posts', '33', NULL, '2013-05-04 13:29:45'),
(80, 3, 'dis parturient montes, nascetur ridiculus mus. Aenean eget magna. Suspendisse tristique neque', 'posts', '35', NULL, '2013-05-05 14:32:18'),
(81, 4, 'mauris a nunc. In at pede. Cras vulputate velit eu sem. Pellentesque ut ipsum ac', 'posts', '37', NULL, '2013-05-10 09:47:51'),
(82, 5, 'Curae; Phasellus ornare. Fusce mollis. Duis sit amet diam eu dolor egestas rhoncus. Proin nisl sem, consequat nec, mollis vitae, posuere at, velit. Cras lorem lorem, luctus ut, pellentesque', 'posts', '40', NULL, '2013-05-23 18:02:49'),
(83, 5, 'ac, eleifend vitae, erat. Vivamus nisi. Mauris nulla. Integer urna. Vivamus molestie dapibus ligula. Aliquam erat volutpat. Nulla dignissim. Maecenas ornare egestas ligula. Nullam', 'posts', '32', NULL, '2013-05-27 21:31:00'),
(84, 4, 'ante. Maecenas mi felis, adipiscing fringilla, porttitor vulputate, posuere vulputate,', 'posts', '35', NULL, '2013-05-09 01:31:24'),
(85, 5, 'ullamcorper viverra. Maecenas iaculis aliquet diam. Sed diam lorem, auctor quis,', 'posts', '42', NULL, '2013-05-21 23:30:29'),
(86, 3, 'convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor quam, elementum at, egestas a,', 'posts', '25', NULL, '2013-05-02 03:18:05'),
(87, 4, 'ut odio vel est tempor bibendum. Donec felis orci, adipiscing non, luctus sit amet, faucibus ut, nulla. Cras', 'posts', '29', NULL, '2013-05-04 13:23:26'),
(88, 3, 'quis arcu vel quam dignissim pharetra. Nam ac nulla. In tincidunt', 'posts', '28', NULL, '2013-05-15 07:19:22'),
(89, 2, 'risus. Duis a mi fringilla mi lacinia mattis. Integer eu lacus. Quisque imperdiet, erat nonummy ultricies ornare, elit elit fermentum risus,', 'posts', '29', NULL, '2013-05-17 20:38:09'),
(90, 3, 'Duis risus odio, auctor vitae, aliquet nec, imperdiet nec, leo.', 'posts', '33', NULL, '2013-05-27 22:07:53'),
(91, 4, 'mattis. Integer eu lacus. Quisque imperdiet, erat nonummy ultricies ornare, elit elit fermentum risus, at fringilla purus', 'posts', '32', NULL, '2013-05-21 15:38:06'),
(92, 2, 'pede et risus. Quisque libero lacus, varius et, euismod et, commodo at, libero. Morbi accumsan laoreet ipsum. Curabitur consequat, lectus sit amet luctus vulputate, nisi', 'posts', '30', NULL, '2013-05-13 18:01:46'),
(93, 4, 'Suspendisse aliquet, sem ut cursus luctus, ipsum leo elementum sem, vitae aliquam eros turpis non', 'posts', '32', NULL, '2013-05-16 05:30:21'),
(94, 1, 'Nunc laoreet lectus quis massa. Mauris vestibulum, neque sed dictum eleifend, nunc risus', 'posts', '39', NULL, '2013-05-10 05:02:42'),
(95, 3, 'Quisque libero lacus, varius et, euismod et, commodo at, libero. Morbi accumsan laoreet ipsum. Curabitur consequat, lectus sit amet luctus vulputate, nisi sem semper erat, in consectetuer ipsum', 'posts', '27', NULL, '2013-05-24 01:17:13'),
(96, 5, 'faucibus. Morbi vehicula. Pellentesque tincidunt tempus risus. Donec egestas. Duis ac arcu. Nunc mauris. Morbi non sapien molestie orci tincidunt adipiscing. Mauris molestie', 'posts', '31', NULL, '2013-05-29 10:39:56'),
(97, 1, 'nunc sed libero. Proin sed turpis nec mauris blandit mattis. Cras', 'posts', '37', NULL, '2013-05-07 05:36:47'),
(98, 1, 'aliquet magna a neque. Nullam ut nisi a odio semper cursus. Integer mollis. Integer tincidunt aliquam arcu. Aliquam ultrices iaculis odio.', 'posts', '41', NULL, '2013-05-25 13:42:20'),
(99, 5, 'diam eu dolor egestas rhoncus. Proin nisl sem, consequat nec, mollis vitae, posuere at, velit. Cras lorem lorem, luctus ut, pellentesque eget, dictum placerat, augue. Sed molestie. Sed', 'posts', '29', NULL, '2013-05-01 02:23:30'),
(100, 4, 'risus. Donec nibh enim, gravida sit amet, dapibus id, blandit at, nisi. Cum', 'posts', '33', NULL, '2013-05-07 18:56:55'),
(101, 3, 'mattis. Integer eu lacus. Quisque imperdiet, erat nonummy ultricies ornare, elit elit fermentum risus, at fringilla purus mauris a nunc. In at pede.', 'posts', '33', NULL, '2013-05-18 07:16:06'),
(102, 1, 'asfsaf', 'posts', '44', NULL, '2013-05-31 15:32:26'),
(103, 1, '+65+56', 'posts', '44', NULL, '2013-05-31 15:32:40'),
(104, 1, 'nhfgjnfgjnfg', 'posts', '45', NULL, '2013-06-01 16:20:15'),
(105, 1, 'hjkhj', 'posts', '45', NULL, '2013-06-01 16:20:30'),
(106, 1, 'fdhdfhdfh', 'posts', '45', NULL, '2013-06-01 16:21:04'),
(107, 1, 'asfas', 'posts', '45', NULL, '2013-06-01 16:23:11'),
(108, 1, 'fdhdfh', 'posts', '45', NULL, '2013-06-01 16:23:32'),
(109, 1, 'dfhdfh', 'posts', '45', NULL, '2013-06-01 16:23:34'),
(110, 1, 'dfhdfhdf', 'posts', '45', NULL, '2013-06-01 16:23:36'),
(111, 1, 'fdhdfhfd', 'posts', '45', NULL, '2013-06-01 16:23:42');

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `forum_forums`
--

INSERT INTO `forum_forums` (`id`, `label`, `name`, `description`, `date`, `private`, `clan`, `sort`) VALUES
(1, 5, 'Test Forum2', 'Laboris ullamco laborum nisi, id qui dreamcatcher photo booth stumptown mixtape wayfarers. Farm-to-table etsy meggings pug est intelligentsia.2', '2013-05-08 11:37:33', 0, 0, 0),
(2, 9, 'Offtopic', 'Laboris ullamco laborum nisi, id qui dreamcatcher photo booth stumptown mixtape wayfarers. Farm-to-table etsy meggings pug est intelligentsia.', '2013-05-08 11:42:31', 0, 0, 0),
(3, 9, 'General discussion', 'Laboris ullamco laborum nisi, id qui dreamcatcher photo booth stumptown mixtape wayfarers. Farm-to-table etsy meggings pug est intelligentsia.', '2013-05-08 11:42:42', 0, 0, 0),
(4, 9, 'General news', '', '2013-05-08 12:06:42', 0, 0, 0),
(9, 9, 'Moderators only', '', '2013-05-11 20:25:59', 0, 0, 0),
(10, 9, 'Testni Forum #3', '', '2013-05-12 17:46:48', 1, 0, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `forum_replies`
--

INSERT INTO `forum_replies` (`id`, `topic`, `poster`, `content`, `date`) VALUES
(1, 37, 1, 'Hey, I’m Ben Edmunds. I’m passionate about building and leading teams to create awesome web and mobile apps. I’ve written a few open source libraries and have had the pleasure of being involved with some interesting projects. You can see my work on GitHub.\r\nHey, I’m Ben Edmunds. I’m passionate about building and leading teams to create awesome web and mobile apps. I’ve written a few open source libraries and have had the pleasure of being involved with some interesting projects. You can see my work on GitHub.\r\nHey, I’m Ben Edmunds. I’m passionate about building and leading teams to create awesome web and mobile apps. I’ve written a few open source libraries and have had the pleasure of being involved with some interesting projects. You can see my work on GitHub.\r\n', '2013-05-14 14:10:06'),
(2, 37, 1, 'Podcast\r\n\r\nCheck out the PHP Town Hall podcast to hear me and Phil Sturgeon rant about life, liberty, and the pursuit of decent code.\r\n\r\n    Episode 6 - PSR-X and the Mexican Standoff   04.19.2013\r\n    Episode 5 - PHPness Gate, Sexism and Mental Illness   03.03.2013\r\n    Episode 4: PHP''s Vision, Beards, and Cake   02.15.2013\r\n', '2013-05-14 14:10:18'),
(3, 39, 1, '![IMAGE](http://i.imgur.com/oqerAVW.jpg "")', '2013-05-15 12:00:08'),
(4, 36, 1, '$this->db->wh**ere(''sticky'', ''1'');$this->db->w**here(''sticky'', ''1'');', '2013-05-15 19:00:30'),
(5, 40, 1, 'asfasf', '2013-06-01 16:04:45'),
(6, 40, 1, 'gsddfg', '2013-06-01 16:04:47');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `forum_topics`
--

INSERT INTO `forum_topics` (`id`, `forum`, `author`, `title`, `date`, `sticky`, `content`, `views`, `locked`, `last_modified`) VALUES
(35, 3, 11, 'sdgdsg', '2013-05-12 15:47:19', 0, 'dsgdsg', 2, 0, '2013-05-12'),
(36, 3, 11, 'asgasg', '2013-05-12 15:54:50', 0, 'asgasg', 7, 0, '2013-05-15'),
(37, 3, 1, 'Dis is srs topic!', '2013-05-14 13:48:29', 0, 'Hey, I’m Ben Edmunds. I’m passionate about building and leading teams to create awesome web and mobile apps. I’ve written a few open source libraries and have had the pleasure of being involved with some interesting projects. You can see my work on GitHub.\r\n', 78, 0, '2013-05-14'),
(38, 3, 1, 'Markdown test', '2013-05-15 11:48:57', 0, '**Cool header**\r\n\r\nI wanna know that how to _disable_ the grabber in the textarea!\r\n\r\nI mean that triangle thing which appears in the right-bottom corner of the textarea.\r\n\r\n> Please help me out!\r\n\r\nThanks in advance!', 5, 0, '2013-05-15'),
(39, 3, 1, 'Slika!', '2013-05-15 11:51:32', 0, '![Image](http://i.imgur.com/rI6o1rH.jpg "Title")', 6, 0, '2013-05-15'),
(40, 1, 1, 'Brijes?', '2013-06-01 16:04:39', 0, 'sfasfsaf', 3, 0, '2013-06-01'),
(41, 1, 1, 'asfsafsa', '2013-06-01 16:29:54', 0, 'gasgasg', 0, 0, '2013-06-01');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE IF NOT EXISTS `gallery` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `date` datetime NOT NULL,
  `type` enum('public','private') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gallery_files`
--

CREATE TABLE IF NOT EXISTS `gallery_files` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `labels`
--

INSERT INTO `labels` (`id`, `name`, `description`, `banner`) VALUES
(5, 'Articles', 'Nostrud vice cray, marfa tonx readymade nesciunt ennui. Fugiat helvetica cosby sweater laboris duis. ', ''),
(6, 'Coverage', 'Nostrud vice cray, marfa tonx readymade nesciunt ennui. Fugiat helvetica cosby sweater laboris duis. ', ''),
(7, 'Clan News', 'Quinoa leggings mumblecore cillum ea, direct trade duis culpa chambray banh mi Austin 90''s PBR.', '0'),
(9, 'Private forums', 'risus. Donec nibh enim, gravida sit amet, dapibus id, blandit at, nisi. Cum sociis natoque risus. Donec nibh enim, gravida sit amet, dapibus id, blandit at, nisi. Cum sociis natoque risus. Donec nibh enim, gravida sit amet, dapibus id, blandit at, nisi. Cum sociis natoque risus. Donec nibh enim, gravida sit amet, dapibus id, blandit at, nisi. Cum sociis natoque ', '0'),
(10, 'Public foums', 'A grassroots success, Seattle rapper\n<a href="https://play.spotify.com/artist/3JhNCzhSMTxs9WLGJJxWOY">Macklemore</a>\nnot only climbed to number two on the Billboard 200 album charts, but with little mainstream help, his 2012 sophomore release debuted with only\n<a href="https://play.spotify.com/artist/3gd8FJtBJtkRxdfbTu19U2">Mumford & Sons</a>\nin his way for the number one spot.', '0');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

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
(7, 'Matches', 'Manage clan matches', 'matches', 1, 'fullwidth'),
(8, 'Matchstats', 'Check your clan match performance statistics', 'matchstats', 1, NULL),
(9, 'Modules', 'Probably shouldn''t touch this module', 'modules', 1, NULL),
(10, 'Opponents', 'Manage match opponents', 'opponents', 1, NULL),
(11, 'Pages', 'Manage site pages', 'pages', 1, NULL),
(12, 'Permissions', 'Manage user permissions', 'permissions', 0, NULL),
(13, 'Posts', 'Manage news posts', 'posts', 1, NULL),
(14, 'Roster', 'Mangae team members', 'roster', 1, NULL),
(15, 'Settings', 'Change site settings', 'settings', 0, NULL),
(16, 'Teams', 'Manage your clan squads', 'teams', 0, NULL),
(17, 'Users', 'Manage users', 'users', 1, NULL);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `name`, `content`, `layout`, `navigation`, `date`, `slug`, `description`, `access`) VALUES
(1, 'Not so cool anymore', '<p>We have some comp<strong>letely unexpected, tragic news to </strong>share. On Thursday, we lost a very dear friend and founding member of our close-knit Oculus family, Andrew Reisse.</p>\r\n<img alt="Andrew in the Rift" src="http://www.oculusvr.com/wp-content/uploads/2013/06/andrew_rift_small.jpg" />\r\n<p>&nbsp;</p>\r\n\r\n<p>Andrew was a brilliant computer graphics engineer, an avid photographer<a href="http://www.reisse.net">(1)</a> and hiker who loved nature, and a loyal friend. Andrew was unique in so many interesting ways. He was extraordinarily kind and utterly selfless. He was a mentor and an inspiration to everyone around him.</p>\r\n\r\n<p>Some of us have known Andrew since college, and have worked with him at multiple companies beginning with Scaleform in Maryland which he helped start at age 19, then at Gaikai in Aliso Viejo which brought him out to California, and finally at Oculus where he was a co-founder and lead engineer.</p>\r\n\r\n<p>Andrew&rsquo;s contributions span far and wide in the video game industry. His code is embedded in thousands of games played by millions of people around the world.</p>\r\n\r\n<p><em>Before Oculus</em><br />\r\nWhile studying Computer Science at University of Maryland College Park, he ended up sharing a dorm room with Michael Antonov second semester of his freshman year. He loved games, but even more, he loved the technology behind them. Just for fun, he made his own 3D rendering engine that could load Quake maps. That same year, the two met Brendan Iribe and set out to make a UI system for game developers, which was first used in Civilization IV and would later become Scaleform GFx &ndash; used by thousands of video games.</p>\r\n<img alt="Scaleform Team" src="http://www.oculusvr.com/wp-content/uploads/2013/06/scaleform_team_small.jpg" />\r\n<p>&nbsp;</p>\r\n\r\n<p>Andrew was a freethinker and stood by his opinions and ideals. He was against corporate agreements that restrict an employee&rsquo;s ability to contribute to open source side projects. When pushed by Autodesk to sign such an agreement, Andrew opted instead to join Brendan at Gaikai, the cloud streaming company, in California. Michael and Nate joined Andrew and Brendan a week later, where the team worked on Gaikai&rsquo;s cloud gaming platform and SDK until they started Oculus. Andrew continued his work on open-source projects all the while.</p>\r\n\r\n<p><em>At Oculus</em></p>\r\n<img alt="Oculus Team" src="http://static.oculusvr.com/website/2012/10/compNY.jpg" /><br />\r\nAndrew&rsquo;s impact on the software and hardware we&rsquo;ve developed at Oculus is immeasurable. He was a lead on the Oculus SDK, the Unreal Engine integration, Hawken VR, and nearly every demo we&rsquo;ve shown since the company inception. Despite all his work, he never bragged or boasted. When he wasn&rsquo;t programming at the office, he was learning, reading his favorite web site &mdash; slashdot.org &mdash; or helping other teammates brainstorm and innovate.\r\n<p>He believed in what we&rsquo;re building and always pushed the team to be better than we thought we could be.</p>\r\n<img alt="Andrew at the Office" src="http://www.oculusvr.com/wp-content/uploads/2013/06/Andrew_Oculus_Office.jpg" />\r\n<p>Andrew was taken from us long before his time. Words cannot express how sorely he will be missed or how deeply our sympathy runs for his family.</p>\r\n\r\n<p>Andrew, you will always be in our thoughts and never forgotten. We love you, Reisse.</p>\r\n\r\n<p><strong>Andrew&rsquo;s photography can be found at <a href="http://www.reisse.net">www.reisse.net</a>.</strong></p>\r\n', 'default.twig', 'Sad page', '2013-06-02 16:58:00', 'kustom-slug', 'Andrew was taken from us long before his time.', 'clan'),
(6, 'Another page', '<p>The following is a list of all the native rules that are available to use:</p>\r\n\r\n<table border="0" cellpadding="0" cellspacing="1" >\r\n <tbody>\r\n  <tr>\r\n   <th>Rule</th>\r\n   <th>Parameter</th>\r\n   <th>Description</th>\r\n   <th>Example</th>\r\n  </tr>\r\n  <tr>\r\n   <td><strong>required</strong></td>\r\n   <td>No</td>\r\n   <td>Returns FALSE if the form element is empty.</td>\r\n   <td>&nbsp;</td>\r\n  </tr>\r\n  <tr>\r\n   <td><strong>matches</strong></td>\r\n   <td>Yes</td>\r\n   <td>Returns FALSE if the form element does not match the one in the parameter.</td>\r\n   <td>matches[form_item]</td>\r\n  </tr>\r\n  <tr>\r\n   <td><strong>is_unique</strong></td>\r\n   <td>Yes</td>\r\n   <td>Returns FALSE if the form element is not unique to the table and field name in the parameter.</td>\r\n   <td>is_unique[table.field]</td>\r\n  </tr>\r\n  <tr>\r\n   <td><strong>min_length</strong></td>\r\n   <td>Yes</td>\r\n   <td>Returns FALSE if the form element is shorter then the parameter value.</td>\r\n   <td>min_length[6]</td>\r\n  </tr>\r\n  <tr>\r\n   <td><strong>max_length</strong></td>\r\n   <td>Yes</td>\r\n   <td>Returns FALSE if the form element is longer then the parameter value.</td>\r\n   <td>max_length[12]</td>\r\n  </tr>\r\n  <tr>\r\n   <td><strong>exact_length</strong></td>\r\n   <td>Yes</td>\r\n   <td>Returns FALSE if the form element is not exactly the parameter value.</td>\r\n   <td>exact_length[8]</td>\r\n  </tr>\r\n  <tr>\r\n   <td><strong>greater_than</strong></td>\r\n   <td>Yes</td>\r\n   <td>Returns FALSE if the form element is less than the parameter value or not numeric.</td>\r\n   <td>greater_than[8]</td>\r\n  </tr>\r\n  <tr>\r\n   <td><strong>less_than</strong></td>\r\n   <td>Yes</td>\r\n   <td>Returns FALSE if the form element is greater than the parameter value or not numeric.</td>\r\n   <td>less_than[8]</td>\r\n  </tr>\r\n  <tr>\r\n   <td><strong>alpha</strong></td>\r\n   <td>No</td>\r\n   <td>Returns FALSE if the form element contains anything other than alphabetical characters.</td>\r\n   <td>&nbsp;</td>\r\n  </tr>\r\n  <tr>\r\n   <td><strong>alpha_numeric</strong></td>\r\n   <td>No</td>\r\n   <td>Returns FALSE if the form element contains anything other than alpha-numeric characters.</td>\r\n   <td>&nbsp;</td>\r\n  </tr>\r\n  <tr>\r\n   <td><strong>alpha_dash</strong></td>\r\n   <td>No</td>\r\n   <td>Returns FALSE if the form element contains anything other than alpha-numeric characters, underscores or dashes.</td>\r\n   <td>&nbsp;</td>\r\n  </tr>\r\n  <tr>\r\n   <td><strong>numeric</strong></td>\r\n   <td>No</td>\r\n   <td>Returns FALSE if the form element contains anything other than numeric characters.</td>\r\n   <td>&nbsp;</td>\r\n  </tr>\r\n  <tr>\r\n   <td><strong>integer</strong></td>\r\n   <td>No</td>\r\n   <td>Returns FALSE if the form element contains anything other than an integer.</td>\r\n   <td>&nbsp;</td>\r\n  </tr>\r\n  <tr>\r\n   <td><strong>decimal</strong></td>\r\n   <td>Yes</td>\r\n   <td>Returns FALSE if the form element is not exactly the parameter value.</td>\r\n   <td>&nbsp;</td>\r\n  </tr>\r\n  <tr>\r\n   <td><strong>is_natural</strong></td>\r\n   <td>No</td>\r\n   <td>Returns FALSE if the form element contains anything other than a natural number: 0, 1, 2, 3, etc.</td>\r\n   <td>&nbsp;</td>\r\n  </tr>\r\n  <tr>\r\n   <td><strong>is_natural_no_zero</strong></td>\r\n   <td>No</td>\r\n   <td>Returns FALSE if the form element contains anything other than a natural number, but not zero: 1, 2, 3, etc.</td>\r\n   <td>&nbsp;</td>\r\n  </tr>\r\n  <tr>\r\n   <td><strong>valid_email</strong></td>\r\n   <td>No</td>\r\n   <td>Returns FALSE if the form element does not contain a valid email address.</td>\r\n   <td>&nbsp;</td>\r\n  </tr>\r\n  <tr>\r\n   <td><strong>valid_emails</strong></td>\r\n   <td>No</td>\r\n   <td>Returns FALSE if any value provided in a comma separated list is not a valid email.</td>\r\n   <td>&nbsp;</td>\r\n  </tr>\r\n  <tr>\r\n   <td><strong>valid_ip</strong></td>\r\n   <td>No</td>\r\n   <td>Returns FALSE if the supplied IP is not valid. Accepts an optional parameter of &quot;IPv4&quot; or &quot;IPv6&quot; to specify an IP format.</td>\r\n   <td>&nbsp;</td>\r\n  </tr>\r\n  <tr>\r\n   <td><strong>valid_base64</strong></td>\r\n   <td>No</td>\r\n   <td>Returns FALSE if the supplied string contains anything other than valid Base64 characters.</td>\r\n   <td>&nbsp;</td>\r\n  </tr>\r\n </tbody>\r\n</table>\r\n\r\n<p><strong>Note:</strong> These rules can also be called as discrete functions. For example:</p>\r\n<code>$this-&gt;form_validation-&gt;required($string);</code>\r\n\r\n<p><strong>Note:</strong> You can also use any native PHP functions that permit one parameter.</p>\r\n', 'fullwidth.twig', 'Pager', '2013-06-02 17:09:00', 'another-page', 'The following is a list of all the native rules that are available to use', 'public'),
(7, 'Using Arrays as Field Names', '<h1>File Helper</h1>\r\n\r\n<p>The File Helper file contains functions that assist in working with files.</p>\r\n\r\n<h2>Loading this Helper</h2>\r\n\r\n<p>This helper is loaded using the following code:</p>\r\n<code>$this-&gt;load-&gt;helper(&#39;file&#39;);</code>\r\n\r\n<p>The following functions are available:</p>\r\n\r\n<h2>read_file&#40;&#39;<var>path</var>&#39;&#41;</h2>\r\n\r\n<p>Returns the data contained in the file specified in the path. Example:</p>\r\n<code>$string = read_file&#40;&#39;./path/to/file.php&#39;&#41;;</code>\r\n\r\n<p>The path can be a relative or full server path. Returns FALSE (boolean) on failure.</p>\r\n\r\n<p><strong>Note:</strong> The path is relative to your main site index.php file, NOT your controller or view files. CodeIgniter uses a front controller so paths are always relative to the main site index.</p>\r\n\r\n<p>If your server is running an open_basedir restriction this function might not work if you are trying to access a file above the calling script.</p>\r\n', 'default.twig', 'Array', '2013-06-02 17:18:00', 'using-arrays-as-field', 'Returns the data contained in the file specified in the path. Example:', 'registered');

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
  PRIMARY KEY (`id`),
  KEY `label` (`label`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `date`, `teaser`, `author`, `label`, `featured`, `clan`, `state`, `views`) VALUES
(1, 'Lorem ipsum dolor sit amet', '<p>These are examples of different ways to use the Foundation Grid. Foundation uses <code>box-sizing: border-box</code> so that borders and padding do not affect the overall width of the columns, making the math dead-simple. Since Foundation is mobile-first, we''ll stack content by default. You do have access to an entirely separate small grid to use up to the 768px breakpoint. This means you can create some pretty complex layouts and even drop columns if you want.These are examples of different ways to use the Foundation Grid. Foundation uses <code>box-sizing: border-box</code> so that borders and padding do not affect the overall width of the columns, making the math dead-simple. Since Foundation is mobile-first, we''ll stack content by default. You do have access to an entirely separate small grid to use up to the 768px breakpoint. This means you can create some pretty complex layouts and even drop columns if you want.These are examples of different ways to use the Foundation Grid. Foundation uses <code>box-sizing: border-box</code> so that borders and padding do not affect the overall width of the columns, making the math dead-simple. Since Foundation is mobile-first, we''ll stack content by default. You do have access to an entirely separate small grid to use up to the 768px breakpoint. This means you can create some pretty complex layouts and even drop columns if you want.</p>\r\n', '2013-05-02 11:07:33', 'Create powerful multi-device layouts quickly and easily with the 12-column, nestable Foundation grid. If you''re familiar with grid systems, you''ll feel right at home. If not, you''ll learn quickly.', 1, 6, 0, 0, 1, 62),
(2, 'Post title 2', '<p>Fanny pack cillum try-hard tempor proident, mumblecore nostrud deserunt godard semiotics fugiat chillwave. Small batch id whatever put a bird on it gluten-free, readymade vero. Mustache cosby sweater street art cupidatat labore culpa ugh pariatur, kogi chillwave banksy umami aliquip enim. Bespoke ad stumptown deep v, vero 3 wolf moon est gluten-free pitchfork trust fund quis kogi. Sriracha sed proident mumblecore lo-fi. Hashtag dolor letterpress chambray odd future freegan, williamsburg dreamcatcher biodiesel duis. Occupy ex retro, pinterest authentic vice mcsweeney''s synth readymade williamsburg cosby sweater tonx.</p>\r\n', '2013-05-02 11:08:03', 'Foundation is developed in Sass, which is powerful CSS pre-processor that helps you write cleaner, more organized, CSS that you can more easily maintain over time without the typical headaches of vanilla CSS. On top of our minimal styling, we''ve written powerful Javascript plugins that will make useful interactions easier to implement across screen sizes.', 1, 6, 0, 0, 1, 49),
(3, 'CK Editor Example', '<p> <strong>Apollo 11</strong></p>\r\n\r\n<p><strong>Apollo 11</strong> was the spaceflight that landed the first humans, Americans <a href="http://en.wikipedia.org/wiki/Neil_Armstrong">Neil Armstrong</a> and <a href="http://en.wikipedia.org/wiki/Buzz_Aldrin">Buzz Aldrin</a>, on the Moon on July 20, 1969, at 20:18 UTC. Armstrong became the first to step onto the lunar surface 6 hours later on July 21 at 02:56 UTC.</p>\r\n\r\n<p>Armstrong spent about <span style="text-decoration:line-through;">three and a half</span> two and a half hours outside the spacecraft, Aldrin slightly less; and together they collected 47.5 pounds (21.5 kg) of lunar material for return to Earth. A third member of the mission, <a href="http://en.wikipedia.org/wiki/Michael_Collins_(astronaut)">Michael Collins</a>, piloted the <a href="http://en.wikipedia.org/wiki/Apollo_Command/Service_Module">command</a> spacecraft alone in lunar orbit until Armstrong and Aldrin returned to it for the trip back to Earth.</p>\r\n\r\n<h3>Broadcasting and <em>quotes</em></h3>\r\n\r\n<p>Broadcast on live TV to a world-wide audience, Armstrong stepped onto the lunar surface and described the event as:</p>\r\n\r\n<blockquote>\r\n<p>One small step for [a] man, one giant leap for mankind.</p>\r\n</blockquote>\r\n\r\n<p>Apollo 11 effectively ended the <a href="http://en.wikipedia.org/wiki/Space_Race">Space Race</a> and fulfilled a national goal proposed in 1961 by the late U.S. President <a href="http://en.wikipedia.org/wiki/John_F._Kennedy">John F. Kennedy</a> in a speech before the United States Congress:</p>\r\n\r\n<blockquote>\r\n<p>[...] before this decade is out, of landing a man on the Moon and returning him safely to the Earth.</p>\r\n</blockquote>\r\n\r\n<h3>Technical details</h3>\r\n\r\n<table border="1" cellpadding="5" cellspacing="0"><caption><strong>Mission crew</strong></caption>\r\n <thead><tr><th scope="col">Position</th>\r\n   <th scope="col">Astronaut</th>\r\n  </tr></thead><tbody><tr><td>Commander</td>\r\n   <td>Neil A. Armstrong</td>\r\n  </tr><tr><td>Command Module Pilot</td>\r\n   <td>Michael Collins</td>\r\n  </tr><tr><td>Lunar Module Pilot</td>\r\n   <td>Edwin "Buzz" E. Aldrin, Jr.</td>\r\n  </tr></tbody></table><p>Launched by a <strong>Saturn V</strong> rocket from <a href="http://en.wikipedia.org/wiki/Kennedy_Space_Center">Kennedy Space Center</a> in Merritt Island, Florida on July 16, Apollo 11 was the fifth manned mission of <a href="http://en.wikipedia.org/wiki/NASA">NASA</a>''s Apollo program. The Apollo spacecraft had three parts:</p>\r\n\r\n<ol><li><strong>Command Module</strong> with a cabin for the three astronauts which was the only part which landed back on Earth</li>\r\n <li><strong>Service Module</strong> which supported the Command Module with propulsion, electrical power, oxygen and water</li>\r\n <li><strong>Lunar Module</strong> for landing on the Moon.</li>\r\n</ol><p>After being sent to the Moon by the Saturn V''s upper stage, the astronauts separated the spacecraft from it and travelled for three days until they entered into lunar orbit. Armstrong and Aldrin then moved into the Lunar Module and landed in the <a href="http://en.wikipedia.org/wiki/Mare_Tranquillitatis">Sea of Tranquility</a>. They stayed a total of about 21 and a half hours on the lunar surface. After lifting off in the upper part of the Lunar Module and rejoining Collins in the Command Module, they returned to Earth and landed in the <a href="http://en.wikipedia.org/wiki/Pacific_Ocean">Pacific Ocean</a> on July 24.</p>\r\n\r\n<hr /><p><small>Source: <a href="http://en.wikipedia.org/wiki/Apollo_11">Wikipedia.org</a></small></p>\r\n', '2013-05-06 12:25:55', 'Apollo 11 was the spaceflight that landed the first humans, Americans Neil Armstrong and Buzz Aldrin, on the Moon on July 20, 1969, at 20:18 UTC. Armstrong became the first to step onto the lunar surface 6 hours later on July 21 at 02:56 UTC.', 1, 5, 0, 0, 1, 78),
(4, 'elit sed consequat auctor, nunc', 'metus. In nec orci. Donec nibh. Quisque nonummy ipsum non arcu. Vivamus sit amet risus. Donec egestas. Aliquam nec enim. Nunc ut erat. Sed nunc est, mollis non, cursus non, egestas a, dui. Cras pellentesque. Sed dictum. Proin eget odio. Aliquam vulputate ullamcorper magna. Sed eu eros. Nam consequat dolor', '2013-05-01 04:50:41', 'nunc. Quisque ornare tortor at risus. Nunc ac sem ut dolor dapibus gravida. Aliquam tincidunt,', 9, NULL, 0, 0, 1, 186),
(25, 'ligula tortor, dictum eu, placerat', 'ligula tortor, dictum eu, placerat eget, venenatis a, magna. Lorem ipsum dolor sit', '2013-04-21 02:44:29', 'mollis nec, cursus a, enim. Suspendisse aliquet, sem ut cursus luctus, ipsum leo elementum sem,', 10, 6, 0, 0, 1, 181),
(26, 'velit. Pellentesque ultricies dignissim lacus.', 'Vivamus rhoncus. Donec est. Nunc ullamcorper, velit in aliquet lobortis, nisi nibh lacinia orci, consectetuer euismod est arcu ac orci. Ut semper pretium neque. Morbi quis urna. Nunc quis arcu vel quam dignissim pharetra. Nam ac nulla. In tincidunt congue turpis. In condimentum. Donec at arcu. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec tincidunt. Donec vitae erat vel pede blandit congue. In scelerisque scelerisque dui. Suspendisse ac metus', '2013-05-09 11:40:32', 'Suspendisse commodo tincidunt nibh. Phasellus nulla. Integer vulputate, risus a ultricies adipiscing, enim mi tempor', 9, 6, 0, 0, 1, 151),
(27, 'risus odio, auctor vitae, aliquet', 'egestas. Aliquam nec enim. Nunc ut erat. Sed nunc est, mollis non, cursus non, egestas a, dui. Cras pellentesque. Sed dictum. Proin eget odio. Aliquam vulputate ullamcorper magna. Sed eu eros. Nam consequat dolor vitae dolor. Donec fringilla. Donec feugiat metus sit amet ante. Vivamus non lorem vitae odio sagittis semper. Nam tempor diam dictum sapien. Aenean massa. Integer vitae nibh. Donec est mauris, rhoncus id, mollis nec, cursus a, enim. Suspendisse aliquet, sem ut cursus luctus, ipsum leo elementum sem, vitae aliquam eros turpis non enim. Mauris quis turpis vitae purus gravida sagittis. Duis gravida. Praesent eu nulla at sem molestie sodales. Mauris blandit enim consequat purus. Maecenas libero est, congue a, aliquet vel, vulputate eu, odio. Phasellus at augue id ante dictum cursus. Nunc mauris elit, dictum eu, eleifend nec, malesuada ut, sem. Nulla interdum. Curabitur dictum. Phasellus in felis. Nulla tempor augue ac ipsum. Phasellus vitae mauris sit amet lorem semper auctor. Mauris vel turpis. Aliquam adipiscing lobortis risus. In mi pede, nonummy ut, molestie in, tempus eu, ligula. Aenean euismod mauris eu elit. Nulla facilisi. Sed neque. Sed eget lacus. Mauris non dui nec urna suscipit nonummy. Fusce fermentum fermentum arcu. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Phasellus ornare. Fusce mollis.', '2013-04-20 06:42:18', 'vestibulum, neque sed dictum eleifend, nunc risus varius orci, in consequat enim diam vel arcu.', 1, 6, 0, 0, 1, 97),
(28, 'tempor bibendum. Donec felis orci,', 'nascetur ridiculus mus. Aenean eget magna. Suspendisse tristique neque venenatis lacus. Etiam bibendum fermentum metus. Aenean sed pede nec ante blandit viverra. Donec tempus, lorem fringilla ornare placerat, orci lacus vestibulum lorem, sit amet ultricies sem magna nec quam. Curabitur vel lectus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec dignissim magna a tortor. Nunc commodo auctor velit. Aliquam nisl. Nulla eu neque pellentesque massa lobortis ultrices. Vivamus rhoncus. Donec est. Nunc ullamcorper, velit in aliquet lobortis, nisi nibh lacinia orci, consectetuer euismod est arcu ac orci. Ut semper pretium neque. Morbi quis urna. Nunc quis arcu vel quam dignissim pharetra. Nam ac nulla. In tincidunt congue turpis. In condimentum. Donec at arcu. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec tincidunt. Donec vitae erat vel pede blandit congue. In scelerisque scelerisque dui. Suspendisse ac metus vitae velit egestas lacinia. Sed congue, elit sed consequat auctor, nunc nulla vulputate dui, nec tempus mauris erat eget ipsum. Suspendisse sagittis. Nullam vitae diam. Proin dolor. Nulla semper tellus id nunc interdum feugiat. Sed nec metus facilisis lorem tristique aliquet. Phasellus fermentum convallis ligula. Donec luctus aliquet odio. Etiam ligula tortor, dictum eu, placerat eget, venenatis a, magna. Lorem ipsum dolor sit amet,', '2013-04-10 05:58:48', 'ultrices iaculis odio. Nam interdum enim non nisi. Aenean eget metus. In nec orci. Donec', 8, 6, 0, 0, 1, 83),
(29, 'dignissim lacus. Aliquam rutrum lorem', 'mauris sit amet lorem semper auctor. Mauris vel turpis. Aliquam adipiscing lobortis risus. In mi pede, nonummy ut, molestie in, tempus eu, ligula. Aenean euismod mauris eu elit. Nulla facilisi. Sed neque. Sed eget lacus. Mauris non dui nec urna suscipit nonummy. Fusce fermentum fermentum arcu. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Phasellus ornare. Fusce mollis. Duis sit amet diam eu dolor egestas rhoncus. Proin nisl sem, consequat nec, mollis vitae, posuere at, velit. Cras lorem lorem, luctus ut, pellentesque eget, dictum placerat, augue. Sed molestie. Sed id risus quis diam luctus lobortis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. Mauris ut quam vel sapien imperdiet ornare. In faucibus. Morbi vehicula. Pellentesque tincidunt tempus risus. Donec egestas. Duis ac arcu. Nunc mauris. Morbi non sapien molestie orci tincidunt adipiscing. Mauris molestie pharetra nibh. Aliquam ornare, libero at auctor ullamcorper, nisl arcu iaculis enim, sit amet ornare lectus justo eu arcu. Morbi sit amet massa. Quisque porttitor', '2013-04-05 20:05:39', 'bibendum. Donec felis orci, adipiscing non, luctus sit amet, faucibus ut, nulla. Cras eu tellus', 1, 6, 0, 0, 1, 222),
(30, 'sagittis felis. Donec tempor, est', 'dolor, tempus non, lacinia at, iaculis quis, pede. Praesent eu dui. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean eget magna. Suspendisse tristique neque venenatis lacus. Etiam bibendum fermentum metus. Aenean sed pede nec ante blandit viverra. Donec tempus, lorem fringilla ornare placerat, orci lacus vestibulum lorem, sit amet ultricies sem magna nec quam. Curabitur vel lectus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec dignissim magna a tortor. Nunc commodo auctor velit. Aliquam nisl. Nulla eu neque pellentesque massa lobortis ultrices. Vivamus rhoncus. Donec est. Nunc ullamcorper, velit in aliquet lobortis, nisi nibh lacinia orci, consectetuer euismod est arcu ac orci. Ut semper pretium neque. Morbi quis urna. Nunc quis arcu vel quam dignissim pharetra. Nam ac nulla. In tincidunt congue turpis. In condimentum. Donec at arcu. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec tincidunt. Donec vitae erat vel pede blandit congue. In scelerisque scelerisque dui. Suspendisse ac metus vitae velit egestas lacinia. Sed congue, elit sed consequat auctor, nunc nulla vulputate dui, nec tempus mauris erat eget ipsum. Suspendisse sagittis. Nullam vitae diam. Proin dolor. Nulla semper tellus id nunc interdum feugiat. Sed nec metus facilisis lorem tristique aliquet. Phasellus fermentum convallis ligula. Donec luctus aliquet odio. Etiam', '2013-05-19 13:00:04', 'ut quam vel sapien imperdiet ornare. In faucibus. Morbi vehicula. Pellentesque tincidunt tempus risus. Donec', 1, 6, 0, 0, 1, 218),
(31, 'dui, in sodales elit erat', 'ornare tortor at risus. Nunc ac sem ut dolor dapibus gravida. Aliquam tincidunt, nunc ac mattis ornare, lectus ante dictum mi, ac mattis velit justo nec ante. Maecenas mi felis, adipiscing fringilla, porttitor vulputate, posuere vulputate, lacus. Cras interdum. Nunc sollicitudin commodo ipsum. Suspendisse non leo. Vivamus nibh dolor, nonummy ac, feugiat non, lobortis quis, pede. Suspendisse dui. Fusce diam nunc, ullamcorper eu, euismod ac, fermentum vel, mauris. Integer sem elit, pharetra ut, pharetra sed, hendrerit a, arcu. Sed et libero. Proin mi. Aliquam gravida mauris ut mi. Duis', '2013-04-28 14:22:41', 'dis parturient montes, nascetur ridiculus mus. Proin vel nisl. Quisque fringilla euismod enim. Etiam gravida', 3, 6, 0, 0, 1, 245),
(32, 'Quisque ornare tortor at risus.', 'in lobortis tellus justo sit amet nulla. Donec non justo. Proin non massa non ante bibendum ullamcorper. Duis cursus, diam at pretium aliquet, metus urna convallis erat, eget tincidunt dui augue eu tellus. Phasellus elit pede, malesuada vel, venenatis vel, faucibus id, libero. Donec consectetuer mauris id sapien. Cras dolor dolor, tempus non, lacinia', '2013-04-07 10:38:33', 'tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor quam, elementum at,', 7, 6, 0, 0, 1, 216),
(33, 'Sed neque. Sed eget lacus.', 'ac tellus. Suspendisse sed dolor. Fusce mi lorem, vehicula et, rutrum eu, ultrices sit amet, risus. Donec nibh enim, gravida sit amet, dapibus', '2013-04-06 22:52:42', 'fermentum vel, mauris. Integer sem elit, pharetra ut, pharetra sed, hendrerit a, arcu. Sed et', 2, 6, 0, 0, 1, 106),
(34, 'egestas. Aliquam nec enim. Nunc', 'ultrices, mauris ipsum porta elit, a feugiat tellus lorem eu metus. In lorem. Donec elementum, lorem ut aliquam iaculis, lacus pede sagittis augue, eu tempor erat neque non quam. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aliquam fringilla cursus purus. Nullam scelerisque neque sed sem egestas blandit. Nam nulla magna, malesuada vel, convallis in, cursus et, eros. Proin ultrices. Duis volutpat nunc sit amet metus. Aliquam erat volutpat. Nulla facilisis. Suspendisse commodo tincidunt nibh. Phasellus nulla. Integer vulputate, risus a ultricies adipiscing, enim mi tempor lorem, eget mollis lectus pede et risus. Quisque libero lacus, varius et, euismod et, commodo at, libero. Morbi accumsan laoreet ipsum. Curabitur consequat, lectus sit amet luctus vulputate, nisi sem semper erat, in consectetuer ipsum nunc id enim. Curabitur massa.', '2013-05-09 06:31:49', 'eget, volutpat ornare, facilisis eget, ipsum. Donec sollicitudin adipiscing ligula. Aenean gravida nunc sed pede.', 10, 6, 0, 0, 1, 298),
(35, 'sed tortor. Integer aliquam adipiscing', 'mollis dui, in sodales elit erat vitae risus. Duis a mi fringilla mi lacinia mattis. Integer eu lacus. Quisque imperdiet, erat nonummy ultricies ornare, elit elit fermentum risus, at fringilla purus mauris a nunc. In at pede. Cras vulputate velit eu sem. Pellentesque ut ipsum ac mi eleifend egestas. Sed pharetra, felis eget varius ultrices, mauris ipsum porta elit, a feugiat tellus lorem eu metus. In lorem. Donec elementum, lorem ut aliquam iaculis, lacus pede sagittis augue, eu tempor erat neque non quam. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aliquam fringilla cursus purus. Nullam scelerisque neque sed sem egestas blandit. Nam nulla magna, malesuada vel, convallis in, cursus', '2013-04-11 02:44:21', 'pede blandit congue. In scelerisque scelerisque dui. Suspendisse ac metus vitae velit egestas lacinia. Sed', 8, 6, 0, 0, 1, 266),
(36, 'vehicula aliquet libero. Integer in', 'Mauris vel turpis. Aliquam adipiscing lobortis risus. In mi pede, nonummy ut, molestie in, tempus eu, ligula. Aenean euismod mauris eu elit. Nulla facilisi. Sed neque. Sed eget lacus. Mauris non dui nec urna suscipit nonummy. Fusce fermentum fermentum arcu. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Phasellus ornare. Fusce mollis. Duis sit amet diam eu dolor egestas rhoncus. Proin nisl sem, consequat nec, mollis vitae, posuere at, velit. Cras lorem lorem, luctus ut, pellentesque eget, dictum placerat, augue. Sed molestie. Sed id risus quis diam luctus lobortis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. Mauris ut quam vel sapien imperdiet ornare. In faucibus. Morbi vehicula. Pellentesque tincidunt tempus risus. Donec egestas. Duis ac arcu. Nunc mauris. Morbi non', '2013-04-11 10:19:19', 'ligula. Nullam feugiat placerat velit. Quisque varius. Nam porttitor scelerisque neque. Nullam nisl. Maecenas malesuada', 1, 6, 0, 0, 1, 164),
(37, 'sem molestie sodales. Mauris blandit', 'Duis dignissim tempor arcu. Vestibulum ut eros non enim commodo hendrerit. Donec porttitor tellus non magna. Nam ligula elit, pretium et, rutrum non, hendrerit id, ante. Nunc mauris sapien, cursus in, hendrerit consectetuer, cursus et, magna. Praesent interdum ligula eu enim. Etiam imperdiet dictum magna. Ut tincidunt orci quis lectus. Nullam suscipit, est ac facilisis facilisis, magna tellus faucibus leo, in lobortis tellus justo sit amet nulla. Donec non justo. Proin non massa non ante bibendum ullamcorper. Duis cursus, diam at pretium aliquet, metus urna convallis erat, eget tincidunt dui augue eu tellus. Phasellus elit pede, malesuada vel, venenatis vel, faucibus id, libero. Donec consectetuer mauris id sapien. Cras dolor dolor, tempus non, lacinia at, iaculis quis, pede. Praesent eu dui. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean eget magna. Suspendisse tristique neque venenatis lacus. Etiam bibendum fermentum metus. Aenean sed pede nec ante blandit viverra. Donec tempus, lorem fringilla ornare placerat, orci lacus vestibulum lorem, sit amet ultricies sem magna nec quam. Curabitur vel lectus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec dignissim magna a tortor. Nunc commodo auctor velit. Aliquam nisl. Nulla eu neque pellentesque massa lobortis ultrices. Vivamus rhoncus. Donec est. Nunc ullamcorper, velit in aliquet lobortis, nisi nibh lacinia orci, consectetuer euismod est arcu ac orci. Ut semper pretium neque. Morbi quis urna. Nunc quis arcu vel quam dignissim pharetra. Nam ac nulla. In tincidunt', '2013-05-08 12:00:56', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Etiam laoreet, libero et tristique pellentesque, tellus', 10, 6, 0, 0, 1, 128),
(38, 'eu augue porttitor interdum. Sed', 'scelerisque neque. Nullam nisl. Maecenas malesuada fringilla est. Mauris eu turpis. Nulla aliquet. Proin velit. Sed malesuada augue ut lacus. Nulla tincidunt, neque vitae semper egestas, urna justo faucibus lectus, a sollicitudin orci sem eget massa. Suspendisse eleifend. Cras sed leo. Cras vehicula aliquet libero. Integer in magna. Phasellus dolor elit, pellentesque a,', '2013-04-18 00:27:55', 'pede. Suspendisse dui. Fusce diam nunc, ullamcorper eu, euismod ac, fermentum vel, mauris. Integer sem', 2, 6, 0, 0, 1, 193),
(40, 'cursus. Integer mollis. Integer tincidunt', 'dui. Fusce aliquam, enim nec tempus scelerisque, lorem ipsum sodales purus, in molestie tortor nibh sit amet orci. Ut sagittis lobortis mauris. Suspendisse aliquet molestie tellus. Aenean egestas hendrerit neque. In ornare sagittis felis. Donec tempor, est ac mattis semper, dui lectus rutrum urna, nec luctus felis purus ac tellus. Suspendisse sed dolor. Fusce mi lorem, vehicula et, rutrum eu, ultrices sit amet, risus. Donec nibh enim, gravida sit amet, dapibus id, blandit at, nisi. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Proin vel nisl. Quisque fringilla euismod enim. Etiam gravida molestie arcu. Sed eu nibh vulputate mauris sagittis placerat. Cras dictum ultricies ligula. Nullam enim. Sed nulla ante, iaculis nec, eleifend non, dapibus rutrum, justo. Praesent luctus. Curabitur egestas nunc sed libero. Proin sed turpis nec mauris blandit mattis. Cras eget nisi dictum augue malesuada malesuada. Integer id magna et ipsum cursus vestibulum. Mauris', '2013-05-01 13:12:53', 'nunc ac mattis ornare, lectus ante dictum mi, ac mattis velit justo nec ante. Maecenas', 4, 6, 0, 0, 1, 111),
(41, 'mollis dui, in sodales elit', 'quam. Curabitur vel lectus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec dignissim magna a tortor. Nunc commodo auctor velit. Aliquam nisl. Nulla eu neque pellentesque massa lobortis ultrices. Vivamus rhoncus. Donec est. Nunc ullamcorper, velit in aliquet lobortis, nisi nibh lacinia orci, consectetuer euismod est arcu ac orci. Ut semper pretium neque. Morbi quis urna. Nunc quis arcu vel quam dignissim pharetra. Nam ac nulla. In tincidunt congue turpis. In condimentum. Donec at arcu. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec tincidunt. Donec vitae erat vel pede blandit congue. In scelerisque scelerisque dui. Suspendisse ac metus vitae velit egestas lacinia. Sed congue, elit sed consequat auctor, nunc nulla vulputate dui, nec tempus mauris erat eget ipsum. Suspendisse sagittis. Nullam vitae diam. Proin dolor. Nulla semper tellus id nunc interdum feugiat. Sed nec metus facilisis lorem tristique aliquet. Phasellus fermentum convallis ligula. Donec luctus aliquet odio. Etiam ligula tortor, dictum eu, placerat eget, venenatis a, magna. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Etiam laoreet, libero et tristique pellentesque, tellus sem mollis dui, in sodales elit', '2013-04-20 12:39:34', 'urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a,', 2, 6, 0, 0, 1, 253),
(42, 'est, vitae sodales nisi magna', 'vel pede blandit congue. In scelerisque scelerisque dui. Suspendisse ac metus vitae velit egestas lacinia. Sed congue, elit sed consequat auctor, nunc nulla vulputate dui, nec tempus mauris erat eget ipsum. Suspendisse sagittis. Nullam vitae diam. Proin dolor. Nulla semper tellus id nunc interdum feugiat. Sed nec metus facilisis lorem tristique aliquet. Phasellus fermentum convallis ligula. Donec luctus aliquet odio. Etiam ligula tortor, dictum eu, placerat eget, venenatis a, magna. Lorem ipsum dolor sit amet, consectetuer adipiscing', '2013-04-17 02:43:00', 'Nam tempor diam dictum sapien. Aenean massa. Integer vitae nibh. Donec est mauris, rhoncus id,', 1, 6, 0, 0, 1, 243),
(44, 'Phasellus dolor elit, pellentesque a,', 'Aliquam erat volutpat. Nulla dignissim. Maecenas ornare egestas ligula. Nullam feugiat placerat velit. Quisque varius. Nam porttitor scelerisque neque. Nullam nisl. Maecenas malesuada fringilla est. Mauris eu turpis. Nulla aliquet. Proin velit. Sed malesuada augue ut lacus. Nulla tincidunt, neque vitae semper egestas, urna justo faucibus lectus, a sollicitudin orci sem eget massa. Suspendisse eleifend. Cras sed leo. Cras vehicula aliquet libero. Integer in magna. Phasellus dolor elit, pellentesque a, facilisis non, bibendum sed, est. Nunc laoreet lectus quis massa. Mauris vestibulum, neque sed dictum eleifend, nunc risus varius orci, in consequat enim diam vel arcu. Curabitur ut odio vel est tempor bibendum. Donec felis orci, adipiscing non, luctus sit amet, faucibus ut, nulla. Cras eu tellus eu augue porttitor interdum. Sed auctor odio a purus. Duis elementum, dui quis accumsan convallis, ante lectus convallis est, vitae sodales nisi magna sed dui. Fusce aliquam, enim nec tempus scelerisque, lorem ipsum sodales purus, in molestie tortor nibh sit amet orci. Ut sagittis lobortis mauris. Suspendisse aliquet molestie tellus. Aenean egestas hendrerit neque. In ornare', '2013-05-08 06:57:45', 'risus. Donec nibh enim, gravida sit amet, dapibus id, blandit at, nisi. Cum sociis natoque', 8, 6, 0, 0, 1, 60),
(45, 'Draft type2', '<p>Tested on All <a href="http://sporkweb.com/live-previews/Mobilized-2/1-darkbg/3-red/layout09.html#">Major</a> Email Clients by <a href="http://sporkweb.com/live-previews/Mobilized-2/1-darkbg/3-red/layout09.html#">Cras Aenean</a> Although Mobilized was created with responsiveness and scalability on top of mind, ''old'' email clients like Outlook ''07 and ''10 were never sacrificed.2</p>\r\n\r\n<p> </p>\r\n', '2013-06-01 11:38:32', '\r\nWorking on yet another branding project with our amazing team. Stand by for some more revealing shots soon.\r\n2\r\nProps to @Matt_Yow for his stellar icon and type work on this project so far.\r\n\r\nCreated with the Focus Lab team\r\n', 1, 6, 1, 0, 0, 10);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `clanname` varchar(50) NOT NULL,
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

INSERT INTO `settings` (`id`, `clanname`, `sitename`, `adminmail`, `comments`, `commentsdelay`, `closed`, `closedmsg`, `analytics`, `theme`, `layout`, `homemodule`, `date`) VALUES
(1, 'Stuff 2 Do', 'Clan Comet2', 'admin@local.host', 1, 0, 0, 'Site is down for maintenance', '', 'default', 'default', 'posts', '2013-05-18 15:48:35');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=534 ;

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
(533, 2130706433, 100, '2013-05-24 03:36:08');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `dob`, `gender`, `country`, `avatar`) VALUES
(1, '\0\0', 'administrator', '59beecdf7fc966e2f17fd8f65a4a9aeb09d4a3d4', '9462e8eee0', 'admin@admin.com', '', NULL, NULL, '9d029802e28cd9c768e8e62277c0df49ec65c48c', 1268889823, 1370192569, 1, 'Karlo', 'Mikus', '2013-05-15 00:00:00', NULL, NULL, '12.png'),
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
