-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.127.126.30
-- Generation Time: Oct 14, 2025 at 06:09 PM
-- Server version: 5.7.44
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci4`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_labels`
--

CREATE TABLE `admin_labels` (
  `id` int(11) UNSIGNED NOT NULL,
  `key` varchar(255) NOT NULL,
  `type` enum('content','label') NOT NULL DEFAULT 'label'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin_labels`
--

INSERT INTO `admin_labels` (`id`, `key`, `type`) VALUES
(245, 'title', 'label'),
(246, 'status', 'label'),
(247, 'text', 'label'),
(248, 'key', 'label'),
(249, 'type', 'label'),
(250, 'add_new', 'label'),
(251, 'admin_labels', 'label'),
(252, 'frontend_labels', 'label'),
(253, 'dashboard', 'label'),
(254, 'content', 'label'),
(255, 'actions', 'label'),
(256, 'reset', 'label'),
(257, 'search', 'label'),
(258, 'update', 'label'),
(259, 'label', 'label'),
(260, 'website_settings', 'label'),
(261, 'val', 'label'),
(262, 'choose_file', 'label'),
(263, 'menu', 'label'),
(264, 'url', 'label'),
(265, 'section', 'label'),
(266, 'pos', 'label'),
(267, 'yes', 'label'),
(268, 'no', 'label'),
(269, 'show_in_menu', 'label'),
(270, 'select_content', 'label'),
(271, 'img', 'label'),
(272, 'meta_title', 'label'),
(273, 'meta_desc', 'label'),
(274, 'meta_keywords', 'label'),
(275, 'are_you_sure', 'label'),
(276, 'news_categories', 'label'),
(277, 'category', 'label'),
(278, 'tag', 'label'),
(279, 'tags', 'label'),
(280, 'sign_in_to_start_your_session', 'label'),
(281, 'email', 'label'),
(282, 'password', 'label'),
(283, 'remember_me', 'label'),
(284, 'sign_in', 'label'),
(285, 'language', 'label'),
(286, 'published', 'label'),
(287, 'pending', 'label'),
(288, 'date', 'label'),
(289, 'posts', 'label');

-- --------------------------------------------------------

--
-- Table structure for table `admin_labels_ml`
--

CREATE TABLE `admin_labels_ml` (
  `id` int(11) UNSIGNED NOT NULL,
  `parent_id` int(11) UNSIGNED NOT NULL,
  `lang` char(2) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin_labels_ml`
--

INSERT INTO `admin_labels_ml` (`id`, `parent_id`, `lang`, `text`) VALUES
(265, 245, 'en', 'Title'),
(266, 245, 'hy', 'Title'),
(267, 245, 'ru', 'Title'),
(268, 246, 'en', 'Status'),
(269, 246, 'hy', 'Status'),
(270, 246, 'ru', 'Status'),
(271, 247, 'en', 'Text'),
(272, 247, 'hy', 'Text'),
(273, 247, 'ru', 'Text'),
(274, 248, 'en', 'Key'),
(275, 248, 'hy', 'Key'),
(276, 248, 'ru', 'Key'),
(277, 249, 'en', 'Type'),
(278, 249, 'hy', 'Type'),
(279, 249, 'ru', 'Type'),
(280, 250, 'en', 'Add new'),
(281, 250, 'hy', 'Add new'),
(282, 250, 'ru', 'Add new'),
(283, 251, 'en', 'Admin labels'),
(284, 251, 'hy', 'Admin labels'),
(285, 251, 'ru', 'Admin labels'),
(286, 252, 'en', 'Frontend labels'),
(287, 253, 'en', 'Dashboard'),
(288, 254, 'en', 'Content'),
(289, 255, 'en', 'Actions'),
(290, 256, 'en', 'Reset'),
(291, 257, 'en', 'Search'),
(292, 258, 'en', 'Update'),
(293, 259, 'en', 'Label'),
(294, 260, 'en', 'Website settings'),
(295, 261, 'en', 'Val'),
(296, 262, 'en', 'Choose file'),
(297, 263, 'en', 'Menu'),
(298, 264, 'en', 'Url'),
(299, 265, 'en', 'Section '),
(300, 266, 'en', 'Position'),
(301, 267, 'en', 'Yes'),
(302, 268, 'en', 'No'),
(303, 269, 'en', 'Show in menu'),
(304, 270, 'en', '-- Select Content --'),
(306, 271, 'en', 'Image'),
(307, 272, 'en', 'Meta title'),
(308, 273, 'en', 'Meta description'),
(309, 274, 'en', 'Meta keywords'),
(310, 275, 'en', 'Are you sure?'),
(311, 276, 'en', 'News categories'),
(312, 277, 'en', 'Category '),
(313, 278, 'en', 'Tag'),
(314, 279, 'en', 'Tags'),
(315, 280, 'en', 'Sign in to start your session'),
(316, 281, 'en', 'Email'),
(317, 282, 'en', 'Password'),
(318, 283, 'en', 'Remember me'),
(319, 284, 'en', 'Sign in'),
(320, 285, 'en', 'Language '),
(321, 286, 'en', 'Published'),
(322, 287, 'en', 'Pending'),
(323, 288, 'en', 'Date'),
(324, 289, 'en', 'Posts ');

-- --------------------------------------------------------

--
-- Table structure for table `admin_lang`
--

CREATE TABLE `admin_lang` (
  `id` int(11) UNSIGNED NOT NULL,
  `lang` char(2) NOT NULL,
  `title` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `pos` smallint(6) DEFAULT NULL,
  `deff_lang` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin_lang`
--

INSERT INTO `admin_lang` (`id`, `lang`, `title`, `status`, `pos`, `deff_lang`) VALUES
(1, 'en', 'English', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE `content` (
  `id` int(11) UNSIGNED NOT NULL,
  `status` int(1) UNSIGNED NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`id`, `status`, `img`, `created_at`, `updated_at`) VALUES
(8, 1, NULL, '2025-10-09 07:06:45', '2025-10-09 07:06:45'),
(11, 1, '577d6f39ab7d0936d21a08a81a0722a3.png', '2025-10-09 07:10:25', '2025-10-09 11:33:42'),
(13, 1, '2b95b0515dc90b74f3d8471a7833adee.png', '2025-10-09 09:26:48', '2025-10-10 06:27:06'),
(14, 1, '1760424211_6bddc42d95468ff1fff8.jpg', '2025-10-14 06:43:31', '2025-10-14 06:43:31'),
(15, 1, '1760424248_ad4668d568d77fa9f793.jpg', '2025-10-14 06:44:08', '2025-10-14 06:44:08'),
(16, 1, '1760426480_c1856231a7c58e13d742.jpg', '2025-10-14 07:21:20', '2025-10-14 07:21:20'),
(17, 1, NULL, '2025-10-14 07:22:56', '2025-10-14 07:22:56'),
(18, 1, NULL, '2025-10-14 07:23:23', '2025-10-14 07:23:23');

-- --------------------------------------------------------

--
-- Table structure for table `content_ml`
--

CREATE TABLE `content_ml` (
  `id` int(11) UNSIGNED NOT NULL,
  `parent_id` int(11) UNSIGNED NOT NULL,
  `lang` char(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` mediumtext COLLATE utf8mb4_unicode_ci,
  `searchfield` mediumtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `content_ml`
--

INSERT INTO `content_ml` (`id`, `parent_id`, `lang`, `title`, `content`, `searchfield`) VALUES
(226, 11, 'en', 'About', '<p>About<br /><br /><img src=\"http://ci4.local/uploads/content/1759993825_42f5df59b099be71adca.jpg\" alt=\"\" /></p>', 'AboutAbout'),
(227, 11, 'hy', 'Մեր մասին', '<p>Մեր մասին</p>', 'Մեր մասինՄեր մասին'),
(228, 11, 'ru', 'О нас', '<p>О нас</p>', 'О насО нас'),
(241, 13, 'en', 'Նուբարաշենի աղբավայրում կեսգիշերին ուժեղ հրդեհ է բռնկվել ողջ գիշեր աշխատել են փրկարարներն ու ջրցան մեքենաները', '<p><img src=\"http://ci4.local/uploads/content/577d6f39ab7d0936d21a08a81a0722a3.png\" alt=\"\" /></p>', 'Նուբարաշենի աղբավայրում կեսգիշերին ուժեղ հրդեհ է բռնկվել ողջ գիշեր աշխատել են փրկարարներն ու ջրցան մեքենաները'),
(242, 13, 'hy', 'Նուբարաշենի աղբավայրում կեսգիշերին ուժեղ հրդեհ է բռնկվել ողջ գիշեր աշխատել են փրկարարներն ու ջրցան մեքենաները', '', 'Նուբարաշենի աղբավայրում կեսգիշերին ուժեղ հրդեհ է բռնկվել ողջ գիշեր աշխատել են փրկարարներն ու ջրցան մեքենաները'),
(243, 13, 'ru', 'Նուբարաշենի աղբավայրում կեսգիշերին ուժեղ հրդեհ է բռնկվել ողջ գիշեր աշխատել են փրկարարներն ու ջրցան մեքենաները', '', 'Նուբարաշենի աղբավայրում կեսգիշերին ուժեղ հրդեհ է բռնկվել ողջ գիշեր աշխատել են փրկարարներն ու ջրցան մեքենաները');

-- --------------------------------------------------------

--
-- Table structure for table `frontend_labels`
--

CREATE TABLE `frontend_labels` (
  `id` int(11) UNSIGNED NOT NULL,
  `key` varchar(255) NOT NULL,
  `type` enum('content','label') NOT NULL DEFAULT 'label'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `frontend_labels`
--

INSERT INTO `frontend_labels` (`id`, `key`, `type`) VALUES
(245, 'title', 'label'),
(250, 'dad1dddd', 'label'),
(251, 'Hello', 'label'),
(252, 'asd sdsa dsads', 'content'),
(253, 'home_page', 'label'),
(254, 'home_page_content', 'content');

-- --------------------------------------------------------

--
-- Table structure for table `frontend_labels_ml`
--

CREATE TABLE `frontend_labels_ml` (
  `id` int(11) UNSIGNED NOT NULL,
  `parent_id` int(11) UNSIGNED NOT NULL,
  `lang` char(2) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `frontend_labels_ml`
--

INSERT INTO `frontend_labels_ml` (`id`, `parent_id`, `lang`, `text`) VALUES
(265, 245, 'en', 'Title'),
(266, 245, 'hy', 'Title'),
(267, 245, 'ru', 'Title'),
(268, 246, 'en', 'Status'),
(269, 246, 'hy', 'Status'),
(270, 246, 'ru', 'Status'),
(271, 247, 'en', 'Text'),
(272, 247, 'hy', 'Text'),
(273, 247, 'ru', 'Text'),
(274, 248, 'en', 'Key'),
(275, 248, 'hy', 'Key'),
(276, 248, 'ru', 'Key'),
(277, 249, 'en', 'Type'),
(278, 249, 'hy', 'Type'),
(279, 249, 'ru', 'Type'),
(280, 250, 'en', 'asdsadsad'),
(281, 250, 'hy', 'asd sadsad'),
(282, 250, 'ru', 'adsadasd'),
(283, 251, 'en', 'Hello'),
(284, 251, 'hy', 'Hello'),
(285, 251, 'ru', 'Hello'),
(286, 252, 'en', 'as dsadsa'),
(287, 252, 'hy', '&lt;p&gt;asd sadsadsa&lt;/p&gt;'),
(288, 252, 'ru', '&lt;p&gt;asd sads&lt;/p&gt;'),
(289, 253, 'en', 'Home page'),
(290, 253, 'hy', 'Գլխավոր էջ'),
(291, 253, 'ru', 'Home page'),
(292, 254, 'en', '<h2 style=\"margin: 0px 0px 10px; padding: 0px; font-weight: 400; font-family: DauphinPlain; font-size: 24px; line-height: 24px;\">What is Lorem Ipsum?</h2>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif;\"><strong style=\"margin: 0px; padding: 0px;\">Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>'),
(293, 254, 'hy', '<h2 style=\"margin: 0px 0px 10px; padding: 0px; font-weight: 400; font-family: DauphinPlain; font-size: 24px; line-height: 24px;\">Ի՞նչ է Lorem Ipsum-ը</h2>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif;\"><strong style=\"margin: 0px; padding: 0px;\">Lorem Ipsum</strong>-ը տպագրության և տպագրական արդյունաբերության համար նախատեսված մոդելային տեքստ է: Սկսած 1500-ականներից` Lorem Ipsum-ը հանդիսացել է տպագրական արդյունաբերության ստանդարտ մոդելային տեքստ, ինչը մի անհայտ տպագրիչի կողմից տարբեր տառատեսակների օրինակների գիրք ստեղծելու ջանքերի արդյունք է: Այս տեքստը ոչ միայն կարողացել է գոյատևել հինգ դարաշրջան, այլև ներառվել է էլեկտրոնային տպագրության մեջ` մնալով էապես անփոփոխ: Այն հայտնի է դարձել 1960-ականներին Lorem Ipsum բովանդակող Letraset էջերի թողարկման արդյունքում, իսկ ավելի ուշ համակարգչային տպագրության այնպիսի ծրագրերի թողարկման հետևանքով, ինչպիսին է Aldus PageMaker-ը, որը ներառում է Lorem Ipsum-ի տարատեսակներ:</p>'),
(294, 254, 'ru', '<h2 style=\"margin: 0px 0px 10px; padding: 0px; font-weight: 400; font-family: DauphinPlain; font-size: 24px; line-height: 24px;\">Что такое Lorem Ipsum?</h2>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif;\"><strong style=\"margin: 0px; padding: 0px;\">Lorem Ipsum</strong>&nbsp;- это текст-\"рыба\", часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной \"рыбой\" для текстов на латинице с начала XVI века. В то время некий безымянный печатник создал большую коллекцию размеров и форм шрифтов, используя Lorem Ipsum для распечатки образцов. Lorem Ipsum не только успешно пережил без заметных изменений пять веков, но и перешагнул в электронный дизайн. Его популяризации в новое время послужили публикация листов Letraset с образцами Lorem Ipsum в 60-х годах и, в более недавнее время, программы электронной вёрстки типа Aldus PageMaker, в шаблонах которых используется Lorem Ipsum.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `lang`
--

CREATE TABLE `lang` (
  `id` int(11) UNSIGNED NOT NULL,
  `lang` char(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `pos` int(11) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lang`
--

INSERT INTO `lang` (`id`, `lang`, `title`, `status`, `pos`) VALUES
(1, 'en', 'English', 1, 1),
(2, 'hy', 'Հայերեն', 1, 2),
(3, 'ru', 'Русский', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) UNSIGNED NOT NULL,
  `section_id` int(11) UNSIGNED NOT NULL,
  `show` tinyint(1) UNSIGNED NOT NULL DEFAULT '1',
  `pid` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `cid` int(11) UNSIGNED DEFAULT '0',
  `pos` int(11) NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `url` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `section_id`, `show`, `pid`, `cid`, `pos`, `status`, `url`, `img`) VALUES
(47, 1, 1, 0, 0, 1, 1, NULL, '1760103323_30dc05d9bc0250204f17.jpg'),
(49, 1, 1, 55, 0, 1, 1, NULL, NULL),
(54, 1, 1, 0, 4, 3, 1, NULL, NULL),
(55, 1, 1, 0, 0, 2, 1, NULL, NULL),
(56, 2, 1, 0, 0, 0, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `menu_ml`
--

CREATE TABLE `menu_ml` (
  `id` int(11) UNSIGNED NOT NULL,
  `parent_id` int(11) UNSIGNED NOT NULL,
  `lang` char(2) NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_desc` varchar(255) DEFAULT NULL,
  `meta_keywords` varchar(255) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu_ml`
--

INSERT INTO `menu_ml` (`id`, `parent_id`, `lang`, `meta_title`, `meta_desc`, `meta_keywords`, `title`, `url`) VALUES
(673, 47, 'en', 'home', 'asdsda', 'asdsad', 'Home', '/'),
(675, 47, 'ru', 'home', 'asdsda', 'asdsad', 'Home', '/'),
(674, 47, 'hy', 'home', 'asdsda', 'asdsad', 'Home', '/'),
(583, 48, 'en', 'Blog 3', 'Blog 5', 'Blog 4', 'Blog 1', 'Blog 2'),
(585, 48, 'ru', '', '', '', '', ''),
(584, 48, 'hy', '', '', '', '', ''),
(577, 49, 'en', 'Contact', 'asdsda', 'asdsad', 'Contact', '/'),
(578, 49, 'ru', 'Contact', 'asdsda', 'asdsad', 'Contact', '/'),
(579, 49, 'hy', 'Contact', 'asdsda', 'asdsad', 'Contact', '/'),
(592, 50, 'en', 'asd sasa 543 654', 'asd sadsads 43dsfs d', 'dsa dsadsa34 545 43545 ', 'asdsad 12', 'asd sadsa 434'),
(593, 50, 'hy', 'dsadsad', 'dsads', 'sadsa', 'asdsadas', 'dsadsa'),
(594, 50, 'ru', 'dsadsad', 'sadsad', 'sadsad', 'dsadsad', 'dsadsa'),
(589, 51, 'en', 'Blog 3', 'Blog 1', 'Blog 2', 'Blog 5', 'Blog 4'),
(590, 51, 'hy', 'Blog 3', 'Blog 1', 'Blog 2', 'Blog 5', 'Blog 4'),
(591, 51, 'ru', 'Blog 3', 'Blog 1', 'Blog 2', 'Blog 5', 'Blog 4'),
(595, 52, 'en', 'd asdas dsa', 'a sdsadsa', 'dsa dsad sad', 'd asdsad', 'sad sadsa'),
(596, 52, 'hy', ' sadsa d', 'ad asdsads', 'sads', 'sa dsadsa', 'd sadsad'),
(597, 52, 'ru', 'dsad sad', ' sadsad', 'sa dsad', 'asd sasa', 'd sadsa '),
(601, 53, 'en', 'sdf sdfds ', ' dsfds', 'fsd fdsf', 'sdf sdfdsf', 'sd fsdf sdfds'),
(602, 53, 'hy', ' sdfds', 'ds fdsf dsfdsf ', 'f dsf sdf', 'sd fdsf ds', 'fds fsdf'),
(603, 53, 'ru', ' fdsf', 'ds ffdsfds', 'dsf sdf', 'sdf sdfds', 'f dsfds'),
(622, 54, 'en', 'About us', 'About us', 'About us', 'About us', 'about-us'),
(623, 54, 'hy', 'About us', 'About us', 'About us', 'About us', 'about-us'),
(624, 54, 'ru', 'About us', 'About us', 'About us', 'About us', 'about-us'),
(670, 55, 'en', 'News', 'News', 'News', 'News', 'news'),
(671, 55, 'hy', 'News', 'News', 'News', 'News', 'news'),
(672, 55, 'ru', 'News', 'News', 'News', 'News', 'news'),
(676, 56, 'en', '', '', '', 'asdsads', 'asdsads'),
(677, 56, 'hy', '', '', '', 'asdsads', 'asdsads'),
(678, 56, 'ru', '', '', '', 'asdsads', 'asdsads');

-- --------------------------------------------------------

--
-- Table structure for table `menu_sections`
--

CREATE TABLE `menu_sections` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `status` smallint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu_sections`
--

INSERT INTO `menu_sections` (`id`, `title`, `url`, `status`) VALUES
(1, 'Main Menu', 'main-menu', 1),
(2, 'Footer menu', 'footer-menu', 1);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) UNSIGNED NOT NULL,
  `cat_id` int(11) UNSIGNED NOT NULL,
  `status` int(1) UNSIGNED NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `cat_id`, `status`, `img`, `created_at`, `updated_at`) VALUES
(14, 5, 1, 'fab4d7d9f89bc3eefbc70371f30b0f53.png', '2025-10-10 12:06:39', '2025-10-10 12:13:35'),
(15, 4, 1, '99410b3f90563d31a24f927ca602ff1b.png', '2025-10-10 12:25:22', '2025-10-10 12:25:22');

-- --------------------------------------------------------

--
-- Table structure for table `news_categories`
--

CREATE TABLE `news_categories` (
  `id` int(11) UNSIGNED NOT NULL,
  `status` int(1) UNSIGNED NOT NULL,
  `pos` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news_categories`
--

INSERT INTO `news_categories` (`id`, `status`, `pos`, `slug`, `created_at`, `updated_at`) VALUES
(3, 1, 1, 'politics', '2025-10-10 11:51:58', '2025-10-14 13:13:23'),
(4, 1, 2, 'media', '2025-10-10 11:55:20', '2025-10-14 13:13:33'),
(5, 1, 3, 'taracasrjan', '2025-10-10 11:55:38', '2025-10-14 13:13:37'),
(6, 1, 4, 'tntesutyun', '2025-10-10 11:56:08', '2025-10-14 13:13:40');

-- --------------------------------------------------------

--
-- Table structure for table `news_categories_ml`
--

CREATE TABLE `news_categories_ml` (
  `id` int(11) UNSIGNED NOT NULL,
  `parent_id` int(11) UNSIGNED NOT NULL,
  `lang` char(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news_categories_ml`
--

INSERT INTO `news_categories_ml` (`id`, `parent_id`, `lang`, `title`) VALUES
(31, 3, 'en', 'Politics'),
(32, 3, 'hy', 'Քաղաքականաություն'),
(33, 3, 'ru', 'Քաղաքականաություն'),
(34, 4, 'en', 'Media'),
(35, 4, 'hy', 'Մեդիա'),
(36, 4, 'ru', 'Մեդիա'),
(37, 5, 'en', 'Տարածաշրջան'),
(38, 5, 'hy', 'Տարածաշրջան'),
(39, 5, 'ru', 'Տարածաշրջան'),
(40, 6, 'en', 'Տնտեսություն'),
(41, 6, 'hy', 'Տնտեսություն'),
(42, 6, 'ru', 'Տնտեսություն');

-- --------------------------------------------------------

--
-- Table structure for table `news_ml`
--

CREATE TABLE `news_ml` (
  `id` int(11) UNSIGNED NOT NULL,
  `parent_id` int(11) UNSIGNED NOT NULL,
  `lang` char(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` mediumtext COLLATE utf8mb4_unicode_ci,
  `searchfield` mediumtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news_ml`
--

INSERT INTO `news_ml` (`id`, `parent_id`, `lang`, `title`, `content`, `searchfield`) VALUES
(58, 14, 'en', 'ասդ ասդասդսադ', '<p>աս դասդ ասդսադ&nbsp;</p>', 'աս դասդ ասդսադ&nbsp;ասդ ասդասդսադ'),
(59, 14, 'hy', 'սա դսադսա', '<p>դսա դսադս ա</p>', 'դսա դսադս ասա դսադսա'),
(60, 14, 'ru', 'աս դասդսա դ', '<p>ասդ ասդաս դասդ սադսդ&nbsp;</p>', 'ասդ ասդաս դասդ սադսդ&nbsp;աս դասդսա դ'),
(61, 15, 'en', 'asdsad', '<p>dsadasdsad</p>', 'dsadasdsadasdsad'),
(62, 15, 'hy', 'asdsadas', '<p>dsadsadsa</p>', 'dsadsadsaasdsadas'),
(63, 15, 'ru', 'asdsadsa', '<p>dsadsadsad</p>', 'dsadsadsadasdsadsa');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) UNSIGNED NOT NULL,
  `status` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `lang` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat_id` int(11) UNSIGNED NOT NULL,
  `related_id` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `editor_json_data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `status`, `lang`, `cat_id`, `related_id`, `title`, `editor_json_data`, `content`, `created_at`, `updated_at`, `img`) VALUES
(2, 1, 'hy', 5, 0, 'Lorem ', '{\"time\":1760448780670,\"blocks\":[{\"id\":\"ZrU7WRRPlt\",\"type\":\"paragraph\",\"data\":{\"text\":\"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eu metus sit amet odio sodales placerat. Sed varius leo ac leo fermentum, eu cursus nunc maximus. Integer convallis nisi nibh, et ornare neque ullamcorper ac. Nam id congue lectus, a venenatis massa. Maecenas justo libero, vulputate vel nunc id, blandit feugiat sem.\"}},{\"id\":\"CptBFd3kVr\",\"type\":\"paragraph\",\"data\":{\"text\":\"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque consectetur, purus imperdiet volutpat tincidunt, eros sem mollis quam, ut placerat urna neque at massa. Proin vitae pulvinar justo. Donec vel placerat enim, at ultricies risus. In posuere luctus sem, ac dapibus felis semper quis. Integer ex ante, semper at velit nec, ultrices aliquet diam. Donec gravida non metus blandit facilisis. Cras tincidunt, lorem aliquam molestie eleifend, libero dui volutpat dui, nec sodales massa libero ut metus. Mauris pretium elit ut dapibus consequat. Nam ut lorem nec sem dignissim gravida. Duis fringilla, augue eget lacinia tincidunt, neque leo maximus sem, sed tristique enim orci id quam.\"}},{\"id\":\"aFaA_5pY3J\",\"type\":\"paragraph\",\"data\":{\"text\":\"Donec turpis erat, scelerisque id euismod sit amet, fermentum vel dolor. Nulla facilisi. Sed pellentesque lectus et accumsan aliquam. Fusce lobortis cursus quam, id mattis sapien. Aliquam erat volutpat. Aliquam placerat, est quis sagittis tincidunt, ipsum eros posuere mi, ut finibus quam sem eget ex. Interdum et malesuada fames ac ante ipsum primis in faucibus. Donec commodo quis enim ac auctor. Ut et mollis felis, sit amet ultricies est. Suspendisse sed faucibus tortor.\"}},{\"id\":\"8wgPYA_Zye\",\"type\":\"paragraph\",\"data\":{\"text\":\"<a href=\\\"#\\\">Related: Facebook announces changes to combat election meddling</a>\"}},{\"id\":\"EwLYBT5G7d\",\"type\":\"paragraph\",\"data\":{\"text\":\"Donec turpis erat, scelerisque id euismod sit amet, fermentum vel dolor. Nulla facilisi. Sed pellentesque lectus et accu msan aliquam. Fusce lobortis cursus quam, id mattis sapien. Aliquam erat volutpat. Aliquam placerat, est quis sagi ttis tincidunt, ipsum eros posuere mi, ut finibus quam sem eget ex. Interdum et malesuada fames ac ante ipsum pr imis in faucibus. Donec commodo quis enim ac auctor. Ut et mollis felis, sit amet ultricies est. Suspendisse sed faucibus tortor.\"}}],\"version\":\"2.31.0\"}', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eu metus sit amet odio sodales placerat. Sed varius leo ac leo fermentum, eu cursus nunc maximus. Integer convallis nisi nibh, et ornare neque ullamcorper ac. Nam id congue lectus, a venenatis massa. Maecenas justo libero, vulputate vel nunc id, blandit feugiat sem.</p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque consectetur, purus imperdiet volutpat tincidunt, eros sem mollis quam, ut placerat urna neque at massa. Proin vitae pulvinar justo. Donec vel placerat enim, at ultricies risus. In posuere luctus sem, ac dapibus felis semper quis. Integer ex ante, semper at velit nec, ultrices aliquet diam. Donec gravida non metus blandit facilisis. Cras tincidunt, lorem aliquam molestie eleifend, libero dui volutpat dui, nec sodales massa libero ut metus. Mauris pretium elit ut dapibus consequat. Nam ut lorem nec sem dignissim gravida. Duis fringilla, augue eget lacinia tincidunt, neque leo maximus sem, sed tristique enim orci id quam.</p><p>Donec turpis erat, scelerisque id euismod sit amet, fermentum vel dolor. Nulla facilisi. Sed pellentesque lectus et accumsan aliquam. Fusce lobortis cursus quam, id mattis sapien. Aliquam erat volutpat. Aliquam placerat, est quis sagittis tincidunt, ipsum eros posuere mi, ut finibus quam sem eget ex. Interdum et malesuada fames ac ante ipsum primis in faucibus. Donec commodo quis enim ac auctor. Ut et mollis felis, sit amet ultricies est. Suspendisse sed faucibus tortor.</p><p><a href=\"#\">Related: Facebook announces changes to combat election meddling</a></p><p>Donec turpis erat, scelerisque id euismod sit amet, fermentum vel dolor. Nulla facilisi. Sed pellentesque lectus et accu msan aliquam. Fusce lobortis cursus quam, id mattis sapien. Aliquam erat volutpat. Aliquam placerat, est quis sagi ttis tincidunt, ipsum eros posuere mi, ut finibus quam sem eget ex. Interdum et malesuada fames ac ante ipsum pr imis in faucibus. Donec commodo quis enim ac auctor. Ut et mollis felis, sit amet ultricies est. Suspendisse sed faucibus tortor.</p>', '2025-10-14 07:28:31', '2025-10-14 13:33:00', '1760434395_bfabbe5d7f59e5fd66fa.jpg'),
(3, 1, 'ru', 4, 0, 'xc fwe ewrewrew', '{\"time\":1760434607722,\"blocks\":[{\"id\":\"kYQXoWv4x3\",\"type\":\"header\",\"data\":{\"text\":\"Where can I get some?\",\"level\":2}},{\"id\":\"tBoFJEIr02\",\"type\":\"paragraph\",\"data\":{\"text\":\"There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.\"}}],\"version\":\"2.31.0\"}', '<h2>Where can I get some?</h2><p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>', '2025-10-14 09:36:48', '2025-10-14 09:36:48', '1760434607_02f2bcece471f295ba30.jpg'),
(4, 1, 'hy', 5, 0, 'asdsa dsadsad sad', '{\"time\":1760436189870,\"blocks\":[{\"id\":\"3s4-TMeCLm\",\"type\":\"header\",\"data\":{\"text\":\"The standard Lorem Ipsum passage, used since the 1500s\",\"level\":3}},{\"id\":\"__ik_YUkvk\",\"type\":\"paragraph\",\"data\":{\"text\":\"\\\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\\\"\"}},{\"id\":\"n1glwZWSVm\",\"type\":\"header\",\"data\":{\"text\":\"Section 1.10.32 of \\\"de Finibus Bonorum et Malorum\\\", written by Cicero in 45 BC\",\"level\":3}},{\"id\":\"4l_mUpAIAT\",\"type\":\"paragraph\",\"data\":{\"text\":\"\\\"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?\\\"\"}}],\"version\":\"2.31.0\"}', '<h3>The standard Lorem Ipsum passage, used since the 1500s</h3><p>\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"</p><h3>Section 1.10.32 of \"de Finibus Bonorum et Malorum\", written by Cicero in 45 BC</h3><p>\"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?\"</p>', '2025-10-14 10:03:11', '2025-10-14 10:03:11', '1760436190_4203d9b2e33049948d0e.jpg'),
(8, 1, 'hy', 5, 3, 'asdsad', '{\"time\":1760436455685,\"blocks\":[{\"id\":\"D59cU_9IQH\",\"type\":\"paragraph\",\"data\":{\"text\":\"asdsadsa\"}}],\"version\":\"2.31.0\"}', '<p>asdsadsa</p>', '2025-10-14 10:08:25', '2025-10-14 10:08:25', NULL),
(9, 1, 'en', 5, 2, 'asdsdasd', '{\"time\":1760436527527,\"blocks\":[{\"id\":\"ePtE3dER-_\",\"type\":\"paragraph\",\"data\":{\"text\":\"as dasd asdsad sadas\"}}],\"version\":\"2.31.0\"}', '<p>as dasd asdsad sadas</p>', '2025-10-14 10:08:48', '2025-10-14 10:08:48', '1760436527_6b3e005476da838b27bb.jpg'),
(10, 1, 'ru', 5, 2, 'Ի՞նչ է Lorem Ipsum-ը', '{\"time\":1760436927332,\"blocks\":[{\"id\":\"5Tn6eBeclG\",\"type\":\"header\",\"data\":{\"text\":\"Ի՞նչ է Lorem Ipsum-ը\",\"level\":2}},{\"id\":\"2BEviAjq1r\",\"type\":\"paragraph\",\"data\":{\"text\":\"Lorem Ipsum-ը տպագրության և տպագրական արդյունաբերության համար նախատեսված մոդելային տեքստ է: Սկսած 1500-ականներից` Lorem Ipsum-ը հանդիսացել է տպագրական արդյունաբերության ստանդարտ մոդելային տեքստ, ինչը մի անհայտ տպագրիչի կողմից տարբեր տառատեսակների օրինակների գիրք ստեղծելու ջանքերի արդյունք է: Այս տեքստը ոչ միայն կարողացել է գոյատևել հինգ դարաշրջան, այլև ներառվել է էլեկտրոնային տպագրության մեջ` մնալով էապես անփոփոխ: Այն հայտնի է դարձել 1960-ականներին Lorem Ipsum բովանդակող Letraset էջերի թողարկման արդյունքում, իսկ ավելի ուշ համակարգչային տպագրության այնպիսի ծրագրերի թողարկման հետևանքով, ինչպիսին է Aldus PageMaker-ը, որը ներառում է Lorem Ipsum-ի տարատեսակներ:\"}},{\"id\":\"vPc5eQqMJ2\",\"type\":\"header\",\"data\":{\"text\":\"Ինչո՞ւ ենք այն օգտագործում\",\"level\":2}},{\"id\":\"BmPpaab6c8\",\"type\":\"paragraph\",\"data\":{\"text\":\"Հայտնի է, որ ընթերցողը, կարդալով հասկանալի տեքստ, չի կարողանա կենտրոնանալ տեքստի ձևավորման վրա: Lorem Ipsum օգտագործելը բացատրվում է նրանով, որ այն բաշխում է բառերը քիչ թե շատ իրականի նման, ի տարբերություն «Բովանդակություն, բովանդակություն» սովորական կրկննության, ինչը ընթերցողի համար հասկանալի է: Շատ համակարգչային տպագրական ծրագրեր և ինտերնետային էջերի խմբագրիչներ այն օգտագործում են որպես իրենց ստանդարտ տեքստային մոդել, և հետևապես, ինտերնետում Lorem Ipsum-ի որոնման արդյունքում կարելի է հայտնաբերել էջեր, որոնք դեռ նոր են կերտվում: Ժամանակի ընթացքում ձևավորվել են Lorem Ipsum-ի տարբեր վերսիաներ` երբեմն ներառելով պատահական տեքստեր, երբեմն էլ հատուկ իմաստ (հումոր և նմանատիպ բովանդակություն):\"}},{\"id\":\"nSGl1EbCKs\",\"type\":\"header\",\"data\":{\"text\":\"Ի՞նչ ծագում ունի այն\",\"level\":2}},{\"id\":\"hZhFuR5Iq5\",\"type\":\"paragraph\",\"data\":{\"text\":\"Հակառակ ընդհանուր պատկերացմանը` Lorem Ipsum-ը այդքան էլ պատահական հավաքված տեքստ չէ: Այս տեքստի արմատները հասնում են Ք.ա. 45թ. դասական լատինական գրականություն. այն 2000 տարեկան է: Ռիչարդ ՄքՔլինտոքը` Վիրջինիայի Համպդեն-Սիդնեյ քոլեջում լատիներենի մի դասախոս` ուսումնասիրելով Lorem Ipsum տեքստի ամենատարօրինակ բառերից մեկը` consectetur-ը, և այն որոնելով դասական գրականության մեջ` բացահայտեց դրա իսկական աղբյուրը: Lorem Ipsum-ը ամրագրված է Ք.ա 45թ. Ցիցերոնի \\\"de Finibus Bonorum et Malorum\\\" (Չարի և բարու ծայրահեղությունների մասին) ստեղծագործության 1.10.32 և 1.10.33 բաժիններում: Այս գիրքը Վերածննդի ժամանակաշրջանում էթիկայի տեսության հայտնի աշխատություն է եղել: Lorem Ipsum-ի առաջին տողը` \\\"Lorem ipsum dolor sit amet..\\\", 1.10.32 բաժնից է:\"}},{\"id\":\"FLFZU3ZWZ7\",\"type\":\"paragraph\",\"data\":{\"text\":\"Հետաքրքրվողների համար ոտորև ներկայացված է 1500-ականներից ի վեր օգտագործվող Lorem Ipsum-ի ստանդարտ տեքստի մի հատված: Ցիցերոնի «de Finibus Bonorum et Malorum» աշխատության 1.10.32 և 1.10.33 բաժինները ներկայացված են հենց բնօրինակ տեսքով` զուգորդված 1914թ. Հ. Րաքհամի անգլերեն թարգմանությամբ:\"}},{\"id\":\"P5eQ9RaZ2v\",\"type\":\"header\",\"data\":{\"text\":\"Որտեղի՞ց վերցնել նման տեքստ\",\"level\":2}},{\"id\":\"44WA2N--WG\",\"type\":\"paragraph\",\"data\":{\"text\":\"Կան Lorem Ipsum-ի շատ տարբերակներ, սակայն շատերը աղավաղվել են տարաբնույթ, երբեմն նույնիսկ լատիներենից շատ հեռու և անհավանական բառերի և հումորի ավելացման արդյունքում: Եթե ուզում եք օգտագործել Lorem Ipsum, ապա երևի չեք ցանկանա, որ այն պարունակի ինչ-որ թաքնված հումոր տեքստի միջնամասում: Ինտերնետում բոլոր Lorem Ipsum արտադրիչները հակված են կրկնել նույն տեքստը մինչև ցանկալի ծավալի լրացումը. այնինչ իսկականը այս արտադրիչն է: Այն օգտագործում է լատիներենի շուրջ 200 բառ` դրանք համադրելով նախադասության հնարավոր շարադասությունների հետ, որպեսզի արտադրի ճշմարիտ Lorem Ipsum: Արտադրված Lorem Ipsum-ը, արդյունքում չունի կրկնություններ, հումորային բովանդակություն կամ այլ անիրական բառեր:\"}}],\"version\":\"2.31.0\"}', '<h2>Ի՞նչ է Lorem Ipsum-ը</h2><p>Lorem Ipsum-ը տպագրության և տպագրական արդյունաբերության համար նախատեսված մոդելային տեքստ է: Սկսած 1500-ականներից` Lorem Ipsum-ը հանդիսացել է տպագրական արդյունաբերության ստանդարտ մոդելային տեքստ, ինչը մի անհայտ տպագրիչի կողմից տարբեր տառատեսակների օրինակների գիրք ստեղծելու ջանքերի արդյունք է: Այս տեքստը ոչ միայն կարողացել է գոյատևել հինգ դարաշրջան, այլև ներառվել է էլեկտրոնային տպագրության մեջ` մնալով էապես անփոփոխ: Այն հայտնի է դարձել 1960-ականներին Lorem Ipsum բովանդակող Letraset էջերի թողարկման արդյունքում, իսկ ավելի ուշ համակարգչային տպագրության այնպիսի ծրագրերի թողարկման հետևանքով, ինչպիսին է Aldus PageMaker-ը, որը ներառում է Lorem Ipsum-ի տարատեսակներ:</p><h2>Ինչո՞ւ ենք այն օգտագործում</h2><p>Հայտնի է, որ ընթերցողը, կարդալով հասկանալի տեքստ, չի կարողանա կենտրոնանալ տեքստի ձևավորման վրա: Lorem Ipsum օգտագործելը բացատրվում է նրանով, որ այն բաշխում է բառերը քիչ թե շատ իրականի նման, ի տարբերություն «Բովանդակություն, բովանդակություն» սովորական կրկննության, ինչը ընթերցողի համար հասկանալի է: Շատ համակարգչային տպագրական ծրագրեր և ինտերնետային էջերի խմբագրիչներ այն օգտագործում են որպես իրենց ստանդարտ տեքստային մոդել, և հետևապես, ինտերնետում Lorem Ipsum-ի որոնման արդյունքում կարելի է հայտնաբերել էջեր, որոնք դեռ նոր են կերտվում: Ժամանակի ընթացքում ձևավորվել են Lorem Ipsum-ի տարբեր վերսիաներ` երբեմն ներառելով պատահական տեքստեր, երբեմն էլ հատուկ իմաստ (հումոր և նմանատիպ բովանդակություն):</p><h2>Ի՞նչ ծագում ունի այն</h2><p>Հակառակ ընդհանուր պատկերացմանը` Lorem Ipsum-ը այդքան էլ պատահական հավաքված տեքստ չէ: Այս տեքստի արմատները հասնում են Ք.ա. 45թ. դասական լատինական գրականություն. այն 2000 տարեկան է: Ռիչարդ ՄքՔլինտոքը` Վիրջինիայի Համպդեն-Սիդնեյ քոլեջում լատիներենի մի դասախոս` ուսումնասիրելով Lorem Ipsum տեքստի ամենատարօրինակ բառերից մեկը` consectetur-ը, և այն որոնելով դասական գրականության մեջ` բացահայտեց դրա իսկական աղբյուրը: Lorem Ipsum-ը ամրագրված է Ք.ա 45թ. Ցիցերոնի \"de Finibus Bonorum et Malorum\" (Չարի և բարու ծայրահեղությունների մասին) ստեղծագործության 1.10.32 և 1.10.33 բաժիններում: Այս գիրքը Վերածննդի ժամանակաշրջանում էթիկայի տեսության հայտնի աշխատություն է եղել: Lorem Ipsum-ի առաջին տողը` \"Lorem ipsum dolor sit amet..\", 1.10.32 բաժնից է:</p><p>Հետաքրքրվողների համար ոտորև ներկայացված է 1500-ականներից ի վեր օգտագործվող Lorem Ipsum-ի ստանդարտ տեքստի մի հատված: Ցիցերոնի «de Finibus Bonorum et Malorum» աշխատության 1.10.32 և 1.10.33 բաժինները ներկայացված են հենց բնօրինակ տեսքով` զուգորդված 1914թ. Հ. Րաքհամի անգլերեն թարգմանությամբ:</p><h2>Որտեղի՞ց վերցնել նման տեքստ</h2><p>Կան Lorem Ipsum-ի շատ տարբերակներ, սակայն շատերը աղավաղվել են տարաբնույթ, երբեմն նույնիսկ լատիներենից շատ հեռու և անհավանական բառերի և հումորի ավելացման արդյունքում: Եթե ուզում եք օգտագործել Lorem Ipsum, ապա երևի չեք ցանկանա, որ այն պարունակի ինչ-որ թաքնված հումոր տեքստի միջնամասում: Ինտերնետում բոլոր Lorem Ipsum արտադրիչները հակված են կրկնել նույն տեքստը մինչև ցանկալի ծավալի լրացումը. այնինչ իսկականը այս արտադրիչն է: Այն օգտագործում է լատիներենի շուրջ 200 բառ` դրանք համադրելով նախադասության հնարավոր շարադասությունների հետ, որպեսզի արտադրի ճշմարիտ Lorem Ipsum: Արտադրված Lorem Ipsum-ը, արդյունքում չունի կրկնություններ, հումորային բովանդակություն կամ այլ անիրական բառեր:</p>', '2025-10-14 10:15:27', '2025-10-14 10:15:27', NULL),
(11, 1, 'ru', 5, 4, 'Почему он используется?', '{\"time\":1760437003312,\"blocks\":[{\"id\":\"BgrvZ_Clv9\",\"type\":\"header\",\"data\":{\"text\":\"Что такое Lorem Ipsum?\",\"level\":2}},{\"id\":\"Ux0JbMPDCE\",\"type\":\"paragraph\",\"data\":{\"text\":\"Lorem Ipsum&nbsp;- это текст-\\\"рыба\\\", часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной \\\"рыбой\\\" для текстов на латинице с начала XVI века. В то время некий безымянный печатник создал большую коллекцию размеров и форм шрифтов, используя Lorem Ipsum для распечатки образцов. Lorem Ipsum не только успешно пережил без заметных изменений пять веков, но и перешагнул в электронный дизайн. Его популяризации в новое время послужили публикация листов Letraset с образцами Lorem Ipsum в 60-х годах и, в более недавнее время, программы электронной вёрстки типа Aldus PageMaker, в шаблонах которых используется Lorem Ipsum.\"}},{\"id\":\"05o9LlTiuQ\",\"type\":\"header\",\"data\":{\"text\":\"Почему он используется?\",\"level\":2}},{\"id\":\"dN_eP3RTYi\",\"type\":\"paragraph\",\"data\":{\"text\":\"Давно выяснено, что при оценке дизайна и композиции читаемый текст мешает сосредоточиться. Lorem Ipsum используют потому, что тот обеспечивает более или менее стандартное заполнение шаблона, а также реальное распределение букв и пробелов в абзацах, которое не получается при простой дубликации \\\"Здесь ваш текст.. Здесь ваш текст.. Здесь ваш текст..\\\" Многие программы электронной вёрстки и редакторы HTML используют Lorem Ipsum в качестве текста по умолчанию, так что поиск по ключевым словам \\\"lorem ipsum\\\" сразу показывает, как много веб-страниц всё ещё дожидаются своего настоящего рождения. За прошедшие годы текст Lorem Ipsum получил много версий. Некоторые версии появились по ошибке, некоторые - намеренно (например, юмористические варианты).\"}},{\"id\":\"k65uP6hb_e\",\"type\":\"header\",\"data\":{\"text\":\"Откуда он появился?\",\"level\":2}},{\"id\":\"D-HeMMBTrS\",\"type\":\"paragraph\",\"data\":{\"text\":\"Многие думают, что Lorem Ipsum - взятый с потолка псевдо-латинский набор слов, но это не совсем так. Его корни уходят в один фрагмент классической латыни 45 года н.э., то есть более двух тысячелетий назад. Ричард МакКлинток, профессор латыни из колледжа Hampden-Sydney, штат Вирджиния, взял одно из самых странных слов в Lorem Ipsum, \\\"consectetur\\\", и занялся его поисками в классической латинской литературе. В результате он нашёл неоспоримый первоисточник Lorem Ipsum в разделах 1.10.32 и 1.10.33 книги \\\"de Finibus Bonorum et Malorum\\\" (\\\"О пределах добра и зла\\\"), написанной Цицероном в 45 году н.э. Этот трактат по теории этики был очень популярен в эпоху Возрождения. Первая строка Lorem Ipsum, \\\"Lorem ipsum dolor sit amet..\\\", происходит от одной из строк в разделе 1.10.32\"}},{\"id\":\"QuTFCEsIUC\",\"type\":\"paragraph\",\"data\":{\"text\":\"Классический текст Lorem Ipsum, используемый с XVI века, приведён ниже. Также даны разделы 1.10.32 и 1.10.33 \\\"de Finibus Bonorum et Malorum\\\" Цицерона и их английский перевод, сделанный H. Rackham, 1914 год.\"}},{\"id\":\"Zhe6BbBerC\",\"type\":\"header\",\"data\":{\"text\":\"Где его взять?\",\"level\":2}},{\"id\":\"UwAFMehg6y\",\"type\":\"paragraph\",\"data\":{\"text\":\"Есть много вариантов Lorem Ipsum, но большинство из них имеет не всегда приемлемые модификации, например, юмористические вставки или слова, которые даже отдалённо не напоминают латынь. Если вам нужен Lorem Ipsum для серьёзного проекта, вы наверняка не хотите какой-нибудь шутки, скрытой в середине абзаца. Также все другие известные генераторы Lorem Ipsum используют один и тот же текст, который они просто повторяют, пока не достигнут нужный объём. Это делает предлагаемый здесь генератор единственным настоящим Lorem Ipsum генератором. Он использует словарь из более чем 200 латинских слов, а также набор моделей предложений. В результате сгенерированный Lorem Ipsum выглядит правдоподобно, не имеет повторяющихся абзацей или \\\"невозможных\\\" слов.<br><br>\"}},{\"id\":\"D28pjXTFpW\",\"type\":\"image\",\"data\":{\"caption\":\"\",\"withBorder\":false,\"withBackground\":false,\"stretched\":false,\"file\":{\"url\":\"http://ci4.local/uploads/posts/1760437001_a44ee09bb035c8851da0.png\"}}}],\"version\":\"2.31.0\"}', '<h2>Что такое Lorem Ipsum?</h2><p>Lorem Ipsum&nbsp;- это текст-\"рыба\", часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной \"рыбой\" для текстов на латинице с начала XVI века. В то время некий безымянный печатник создал большую коллекцию размеров и форм шрифтов, используя Lorem Ipsum для распечатки образцов. Lorem Ipsum не только успешно пережил без заметных изменений пять веков, но и перешагнул в электронный дизайн. Его популяризации в новое время послужили публикация листов Letraset с образцами Lorem Ipsum в 60-х годах и, в более недавнее время, программы электронной вёрстки типа Aldus PageMaker, в шаблонах которых используется Lorem Ipsum.</p><h2>Почему он используется?</h2><p>Давно выяснено, что при оценке дизайна и композиции читаемый текст мешает сосредоточиться. Lorem Ipsum используют потому, что тот обеспечивает более или менее стандартное заполнение шаблона, а также реальное распределение букв и пробелов в абзацах, которое не получается при простой дубликации \"Здесь ваш текст.. Здесь ваш текст.. Здесь ваш текст..\" Многие программы электронной вёрстки и редакторы HTML используют Lorem Ipsum в качестве текста по умолчанию, так что поиск по ключевым словам \"lorem ipsum\" сразу показывает, как много веб-страниц всё ещё дожидаются своего настоящего рождения. За прошедшие годы текст Lorem Ipsum получил много версий. Некоторые версии появились по ошибке, некоторые - намеренно (например, юмористические варианты).</p><h2>Откуда он появился?</h2><p>Многие думают, что Lorem Ipsum - взятый с потолка псевдо-латинский набор слов, но это не совсем так. Его корни уходят в один фрагмент классической латыни 45 года н.э., то есть более двух тысячелетий назад. Ричард МакКлинток, профессор латыни из колледжа Hampden-Sydney, штат Вирджиния, взял одно из самых странных слов в Lorem Ipsum, \"consectetur\", и занялся его поисками в классической латинской литературе. В результате он нашёл неоспоримый первоисточник Lorem Ipsum в разделах 1.10.32 и 1.10.33 книги \"de Finibus Bonorum et Malorum\" (\"О пределах добра и зла\"), написанной Цицероном в 45 году н.э. Этот трактат по теории этики был очень популярен в эпоху Возрождения. Первая строка Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", происходит от одной из строк в разделе 1.10.32</p><p>Классический текст Lorem Ipsum, используемый с XVI века, приведён ниже. Также даны разделы 1.10.32 и 1.10.33 \"de Finibus Bonorum et Malorum\" Цицерона и их английский перевод, сделанный H. Rackham, 1914 год.</p><h2>Где его взять?</h2><p>Есть много вариантов Lorem Ipsum, но большинство из них имеет не всегда приемлемые модификации, например, юмористические вставки или слова, которые даже отдалённо не напоминают латынь. Если вам нужен Lorem Ipsum для серьёзного проекта, вы наверняка не хотите какой-нибудь шутки, скрытой в середине абзаца. Также все другие известные генераторы Lorem Ipsum используют один и тот же текст, который они просто повторяют, пока не достигнут нужный объём. Это делает предлагаемый здесь генератор единственным настоящим Lorem Ipsum генератором. Он использует словарь из более чем 200 латинских слов, а также набор моделей предложений. В результате сгенерированный Lorem Ipsum выглядит правдоподобно, не имеет повторяющихся абзацей или \"невозможных\" слов.<br><br></p><img src=\"http://ci4.local/uploads/posts/1760437001_a44ee09bb035c8851da0.png\" class=\"content-image\" />', '2025-10-14 10:16:43', '2025-10-14 10:16:43', NULL),
(13, 1, 'en', 5, 0, 'asdsadasdsa', '{\"time\":1760441550247,\"blocks\":[{\"id\":\"wzKipauAha\",\"type\":\"paragraph\",\"data\":{\"text\":\"Donec turpis erat, scelerisque id euismod sit amet, fermentum vel dolor. Nulla facilisi. Sed pellentesque lectus et accumsan aliquam. Fusce lobortis cursus quam, id mattis sapien. Aliquam erat volutpat. Aliquam placerat, est quis sagittis tincidunt, ipsum eros posuere mi, ut finibus quam sem eget ex<b>. Interdum et malesuada f</b>ames ac ante ipsum primis in faucibus. Donec commodo quis enim ac auctor. Ut et mollis felis, sit ame<i>t ultricies est. Suspe</i>ndisse sed faucibus tortor.\"}},{\"id\":\"lr-_1LNTmA\",\"type\":\"paragraph\",\"data\":{\"text\":\"<a href=\\\"#\\\">Related: Facebook announces changes to combat election meddling</a>\"}},{\"id\":\"6SuUaHO8H6\",\"type\":\"paragraph\",\"data\":{\"text\":\"Donec turpis erat, scelerisque id euismod sit amet, fermentum vel dolor. Nulla facilisi. Sed pellentesque lectus et accu msan aliquam. Fusce lobortis cursus quam, id mattis sapien. Aliquam erat volutpat. Aliquam placerat, est quis sagi ttis tincidunt, ipsum eros posuere mi, ut finibus quam sem eget ex. Interdum et malesuada fames ac ante ipsum pr imis in faucibus. Donec commodo quis enim ac auctor. Ut et mollis felis, sit amet ultricies est. Suspendisse sed faucibus tortor.\"}}],\"version\":\"2.31.0\"}', '<p>Donec turpis erat, scelerisque id euismod sit amet, fermentum vel dolor. Nulla facilisi. Sed pellentesque lectus et accumsan aliquam. Fusce lobortis cursus quam, id mattis sapien. Aliquam erat volutpat. Aliquam placerat, est quis sagittis tincidunt, ipsum eros posuere mi, ut finibus quam sem eget ex<b>. Interdum et malesuada f</b>ames ac ante ipsum primis in faucibus. Donec commodo quis enim ac auctor. Ut et mollis felis, sit ame<i>t ultricies est. Suspe</i>ndisse sed faucibus tortor.</p><p><a href=\"#\">Related: Facebook announces changes to combat election meddling</a></p><p>Donec turpis erat, scelerisque id euismod sit amet, fermentum vel dolor. Nulla facilisi. Sed pellentesque lectus et accu msan aliquam. Fusce lobortis cursus quam, id mattis sapien. Aliquam erat volutpat. Aliquam placerat, est quis sagi ttis tincidunt, ipsum eros posuere mi, ut finibus quam sem eget ex. Interdum et malesuada fames ac ante ipsum pr imis in faucibus. Donec commodo quis enim ac auctor. Ut et mollis felis, sit amet ultricies est. Suspendisse sed faucibus tortor.</p>', '2025-10-14 11:32:30', '2025-10-14 11:32:30', NULL),
(24, 1, 'en', 5, 0, 'Transportation Attendant', '', 'Half-past one, time for dinner!\' (\'I only wish people knew that: then they wouldn\'t be so proud as all that.\' \'With extras?\' asked the Mock Turtle a little girl,\' said Alice, surprised at this, that.', NULL, NULL, NULL),
(25, 1, 'en', 5, 0, 'Movers', '', 'Majesty?\' he asked. \'Begin at the thought that it was a good way off, panting, with its arms and frowning at the jury-box, and saw that, in her life; it was labelled \'ORANGE MARMALADE\', but to her.', NULL, NULL, NULL),
(26, 1, 'en', 6, 0, 'Tool and Die Maker', '', 'Alice, jumping up in a low voice. \'Not at first, the two sides of the table, but it is.\' \'I quite agree with you,\' said the Hatter. He had been would have this cat removed!\' The Queen turned crimson.', NULL, NULL, NULL),
(27, 1, 'en', 4, 0, 'Radiologic Technologist and Technician', '', 'Caterpillar called after her. \'I\'ve something important to say!\' This sounded promising, certainly: Alice turned and came back again. \'Keep your temper,\' said the Cat, \'if you don\'t know what.', NULL, NULL, NULL),
(28, 1, 'en', 6, 0, 'Cafeteria Cook', '', 'French lesson-book. The Mouse did not at all for any of them. However, on the glass table and the three gardeners, but she had been for some minutes. The Caterpillar and Alice joined the procession.', NULL, NULL, NULL),
(29, 1, 'en', 5, 0, 'Materials Inspector', '', 'Those whom she sentenced were taken into custody by the time he had never before seen a good opportunity for repeating his remark, with variations. \'I shall sit here,\' the Footman continued in the.', NULL, NULL, NULL),
(30, 1, 'en', 6, 0, 'Business Manager', '', 'Mock Turtle in the schoolroom, and though this was his first remark, \'It was the BEST butter,\' the March Hare. \'He denies it,\' said Alice, and tried to fancy what the next thing is, to get in?\'.', NULL, NULL, NULL),
(31, 1, 'en', 3, 0, 'Order Clerk', '', 'I ever heard!\' \'Yes, I think you\'d take a fancy to herself as she picked up a little snappishly. \'You\'re enough to look through into the wood. \'It\'s the thing Mock Turtle said with some curiosity.', NULL, NULL, NULL),
(32, 1, 'en', 5, 0, 'Film Laboratory Technician', '', 'Cat. \'I don\'t even know what a long sleep you\'ve had!\' \'Oh, I\'ve had such a capital one for catching mice--oh, I beg your pardon!\' cried Alice in a minute or two she walked on in the other: the.', NULL, NULL, NULL),
(33, 1, 'en', 4, 0, 'Music Arranger and Orchestrator', '', 'She hastily put down the chimney, has he?\' said Alice in a very melancholy voice. \'Repeat, \"YOU ARE OLD, FATHER WILLIAM,\' to the Knave \'Turn them over!\' The Knave did so, and giving it something out.', NULL, NULL, NULL),
(34, 1, 'en', 5, 0, 'Forensic Investigator', '', 'Gryphon: and it put the hookah out of its mouth, and its great eyes half shut. This seemed to Alice an excellent opportunity for making her escape; so she went on, \'What\'s your name, child?\' \'My.', NULL, NULL, NULL),
(35, 1, 'en', 3, 0, 'Annealing Machine Operator', '', 'Alice. \'I\'m glad they\'ve begun asking riddles.--I believe I can go back by railway,\' she said to herself, as she could. The next thing was to find it out, we should all have our heads cut off, you.', NULL, NULL, NULL),
(36, 1, 'en', 3, 0, 'Animal Breeder', '', 'I think?\' he said to herself, as she heard it muttering to itself \'Then I\'ll go round and get ready for your interesting story,\' but she did not venture to go and take it away!\' There was a.', NULL, NULL, NULL),
(37, 1, 'en', 5, 0, 'General Farmworker', '', 'I\'ve finished.\' So they had to sing you a couple?\' \'You are old,\' said the Dodo, \'the best way to explain it as to size,\' Alice hastily replied; \'only one doesn\'t like changing so often, of course.', NULL, NULL, NULL),
(38, 1, 'en', 5, 0, 'Truck Driver', '', 'I used to read fairy-tales, I fancied that kind of rule, \'and vinegar that makes people hot-tempered,\' she went on. \'Would you tell me,\' said Alice, timidly; \'some of the window, I only knew how to.', NULL, NULL, NULL),
(39, 1, 'en', 5, 0, 'Statistician', '', 'Alice thought to herself. Imagine her surprise, when the race was over. However, when they liked, so that it might appear to others that what you would seem to encourage the witness at all: he kept.', NULL, NULL, NULL),
(40, 1, 'en', 6, 0, 'Crushing Grinding Machine Operator', '', 'Pigeon. \'I can hardly breathe.\' \'I can\'t help it,\' said the Mock Turtle replied in an agony of terror. \'Oh, there goes his PRECIOUS nose\'; as an explanation; \'I\'ve none of them at last, they must be.', NULL, NULL, NULL),
(41, 1, 'en', 5, 0, 'Telemarketer', '', 'Mouse, in a coaxing tone, and she tried to say \"HOW DOTH THE LITTLE BUSY BEE,\" but it all came different!\' Alice replied in an offended tone. And she kept fanning herself all the creatures order one.', NULL, NULL, NULL),
(42, 1, 'en', 4, 0, 'Archeologist', '', 'Mock Turtle in a hoarse growl, \'the world would go round and look up in spite of all the rest, Between yourself and me.\' \'That\'s the first figure!\' said the Cat. \'I don\'t see,\' said the Mock Turtle.', NULL, NULL, NULL),
(43, 1, 'en', 4, 0, 'File Clerk', '', 'Soup? Pennyworth only of beautiful Soup? Beau--ootiful Soo--oop! Soo--oop of the Lizard\'s slate-pencil, and the Queen shrieked out. \'Behead that Dormouse! Turn that Dormouse out of the song. \'What.', NULL, NULL, NULL),
(44, 1, 'en', 4, 0, 'Etcher and Engraver', '', 'Oh, my dear paws! Oh my fur and whiskers! She\'ll get me executed, as sure as ferrets are ferrets! Where CAN I have ordered\'; and she thought at first was moderate. But the insolence of his head. But.', NULL, NULL, NULL),
(45, 1, 'en', 3, 0, 'Spraying Machine Operator', '', 'The Queen turned angrily away from him, and very angrily. \'A knot!\' said Alice, in a shrill, passionate voice. \'Would YOU like cats if you were or might have been changed for Mabel! I\'ll try and say.', NULL, NULL, NULL),
(46, 1, 'en', 5, 0, 'Medical Secretary', '', 'GAVE HER ONE, THEY GAVE HIM TWO--\" why, that must be the best cat in the common way. So she called softly after it, and fortunately was just beginning to write out a box of comfits, (luckily the.', NULL, NULL, NULL),
(47, 1, 'en', 5, 0, 'Aircraft Rigging Assembler', '', 'They\'re dreadfully fond of pretending to be beheaded!\' \'What for?\' said Alice. \'Well, I hardly know--No more, thank ye; I\'m better now--but I\'m a hatter.\' Here the Queen was silent. The Dormouse.', NULL, NULL, NULL),
(48, 1, 'en', 4, 0, 'Reporters OR Correspondent', '', 'I think I could, if I would talk on such a subject! Our family always HATED cats: nasty, low, vulgar things! Don\'t let me hear the very tones of the others looked round also, and all her coaxing.', NULL, NULL, NULL),
(49, 1, 'en', 5, 0, 'Production Worker', '', 'King, and the poor animal\'s feelings. \'I quite agree with you,\' said the Knave, \'I didn\'t write it, and found that it led into the Dormouse\'s place, and Alice joined the procession, wondering very.', NULL, NULL, NULL),
(50, 1, 'en', 4, 0, 'Pharmacy Technician', '', 'She\'ll get me executed, as sure as ferrets are ferrets! Where CAN I have dropped them, I wonder?\' And here Alice began in a trembling voice to its feet, ran round the refreshments!\' But there seemed.', NULL, NULL, NULL),
(51, 1, 'en', 5, 0, 'Manager Tactical Operations', '', 'VERY tired of being upset, and their curls got entangled together. Alice laughed so much about a whiting before.\' \'I can hardly breathe.\' \'I can\'t go no lower,\' said the Gryphon. \'It all came.', NULL, NULL, NULL),
(52, 1, 'en', 6, 0, 'Landscaping', '', 'She did not quite know what a wonderful dream it had made. \'He took me for asking! No, it\'ll never do to hold it. As soon as there was a dispute going on within--a constant howling and sneezing, and.', NULL, NULL, NULL),
(53, 1, 'en', 4, 0, 'Bookbinder', '', 'Turtle.\' These words were followed by a row of lamps hanging from the Queen added to one of its right ear and left foot, so as to size,\' Alice hastily replied; \'at least--at least I know all the.', NULL, NULL, NULL),
(54, 1, 'en', 6, 0, 'Interior Designer', '', 'Dormouse, not choosing to notice this last word with such a thing I ever was at in all directions, \'just like a snout than a real Turtle.\' These words were followed by a row of lodging houses, and.', NULL, NULL, NULL),
(55, 1, 'en', 6, 0, 'Transit Police OR Railroad Police', '', 'THAT!\' \'Oh, you foolish Alice!\' she answered herself. \'How can you learn lessons in here? Why, there\'s hardly room for her. \'I can hardly breathe.\' \'I can\'t explain MYSELF, I\'m afraid, but you might.', NULL, NULL, NULL),
(56, 1, 'en', 5, 0, 'Nuclear Engineer', '', 'But they HAVE their tails in their mouths; and the other was sitting on the glass table and the jury consider their verdict,\' the King had said that day. \'A likely story indeed!\' said Alice.', NULL, NULL, NULL),
(57, 1, 'en', 3, 0, 'Municipal Court Clerk', '', 'Alice crouched down among the trees, a little of her little sister\'s dream. The long grass rustled at her as she could. \'No,\' said Alice. \'Why, SHE,\' said the Queen said--\' \'Get to your little boy.', NULL, NULL, NULL),
(58, 1, 'en', 5, 0, 'Fire Fighter', '', 'Majesty,\' he began. \'You\'re a very difficult question. However, at last in the act of crawling away: besides all this, there was nothing else to say a word, but slowly followed her back to the.', NULL, NULL, NULL),
(59, 1, 'en', 5, 0, 'Rough Carpenter', '', 'I think?\' he said in a twinkling! Half-past one, time for dinner!\' (\'I only wish people knew that: then they both cried. \'Wake up, Alice dear!\' said her sister; \'Why, what are YOUR shoes done with?\'.', NULL, NULL, NULL),
(60, 1, 'en', 3, 0, 'Marketing Manager', '', 'Cat: \'we\'re all mad here. I\'m mad. You\'re mad.\' \'How do you like the look of the busy farm-yard--while the lowing of the earth. At last the Mouse, in a melancholy way, being quite unable to move.', NULL, NULL, NULL),
(61, 1, 'en', 4, 0, 'Counseling Psychologist', '', 'I\'m doubtful about the games now.\' CHAPTER X. The Lobster Quadrille The Mock Turtle replied in an offended tone, \'Hm! No accounting for tastes! Sing her \"Turtle Soup,\" will you, won\'t you, will you.', NULL, NULL, NULL),
(62, 1, 'en', 6, 0, 'Computer Repairer', '', 'King, rubbing his hands; \'so now let the Dormouse sulkily remarked, \'If you didn\'t like cats.\' \'Not like cats!\' cried the Gryphon. \'I\'ve forgotten the words.\' So they went up to the Dormouse, who.', NULL, NULL, NULL),
(63, 1, 'en', 4, 0, 'Sales and Related Workers', '', 'So she began shrinking directly. As soon as the doubled-up soldiers were silent, and looked along the course, here and there. There was no label this time with the grin, which remained some time.', NULL, NULL, NULL),
(64, 1, 'en', 6, 0, 'Taper', '', 'Hatter instead!\' CHAPTER VII. A Mad Tea-Party There was no more to be a grin, and she set to work throwing everything within her reach at the Cat\'s head began fading away the time. Alice had not got.', NULL, NULL, NULL),
(65, 1, 'en', 5, 0, 'Aircraft Launch and Recovery Officer', '', 'Hatter. \'It isn\'t mine,\' said the March Hare, \'that \"I like what I could let you out, you know.\' Alice had been of late much accustomed to usurpation and conquest. Edwin and Morcar, the earls of.', NULL, NULL, NULL),
(66, 1, 'en', 6, 0, 'Administrative Services Manager', '', 'Alice, \'shall I NEVER get any older than I am in the sun. (IF you don\'t know where Dinn may be,\' said the Mock Turtle said: \'I\'m too stiff. And the executioner ran wildly up and straightening itself.', NULL, NULL, NULL),
(67, 1, 'en', 6, 0, 'Insurance Investigator', '', 'I beg your pardon!\' said the King. \'Nothing whatever,\' said Alice. \'I don\'t quite understand you,\' she said, by way of expecting nothing but a pack of cards!\' At this the White Rabbit blew three.', NULL, NULL, NULL),
(68, 1, 'en', 6, 0, 'Personal Care Worker', '', 'Duck: \'it\'s generally a frog or a worm. The question is, what did the Dormouse sulkily remarked, \'If you please, sir--\' The Rabbit started violently, dropped the white kid gloves: she took courage.', NULL, NULL, NULL),
(69, 1, 'en', 6, 0, 'Anthropologist OR Archeologist', '', 'I\'m not the same, the next witness!\' said the King eagerly, and he hurried off. Alice thought she might as well say,\' added the Dormouse, who was beginning to get through was more hopeless than.', NULL, NULL, NULL),
(70, 1, 'en', 6, 0, 'Train Crew', '', 'William\'s conduct at first she would manage it. \'They must go back by railway,\' she said this, she noticed that they couldn\'t get them out again. Suddenly she came in with the words came very queer.', NULL, NULL, NULL),
(71, 1, 'en', 5, 0, 'Nursing Instructor', '', 'And mentioned me to sell you a present of everything I\'ve said as yet.\' \'A cheap sort of meaning in it.\' The jury all wrote down on one knee. \'I\'m a poor man, your Majesty,\' said the Duchess, \'as.', NULL, NULL, NULL),
(72, 1, 'en', 6, 0, 'Sawing Machine Setter', '', 'Alice. \'And where HAVE my shoulders got to? And oh, I wish you were or might have been ill.\' \'So they were,\' said the King: \'however, it may kiss my hand if it wasn\'t trouble enough hatching the.', NULL, NULL, NULL),
(73, 1, 'en', 5, 0, 'Buyer', '', 'Pigeon in a very hopeful tone though), \'I won\'t have any pepper in that ridiculous fashion.\' And he got up and throw us, with the time,\' she said, as politely as she could, and waited to see that.', NULL, NULL, NULL),
(74, 1, 'en', 6, 0, 'Counselor', '', 'Queen. \'I haven\'t the least idea what you\'re doing!\' cried Alice, quite forgetting that she could not even room for her. \'I can see you\'re trying to explain the paper. \'If there\'s no harm in.', NULL, NULL, NULL),
(75, 1, 'en', 5, 0, 'Mathematical Technician', '', 'Pigeon. \'I can hardly breathe.\' \'I can\'t help it,\' she thought, and looked very anxiously into its nest. Alice crouched down among the trees upon her face. \'Wake up, Alice dear!\' said her sister.', NULL, NULL, NULL),
(76, 1, 'en', 6, 0, 'Furniture Finisher', '', 'Arithmetic--Ambition, Distraction, Uglification, and Derision.\' \'I never could abide figures!\' And with that she ran off as hard as she spoke. Alice did not come the same size for ten minutes.', NULL, NULL, NULL),
(77, 1, 'en', 5, 0, 'Command Control Center Officer', '', 'I\'ll set Dinah at you!\' There was a sound of a muchness\"--did you ever eat a little worried. \'Just about as much use in crying like that!\' By this time she saw them, they were trying which word.', NULL, NULL, NULL),
(78, 1, 'en', 5, 0, 'Surgical Technologist', '', 'I know?\' said Alice, a good deal: this fireplace is narrow, to be otherwise than what it might be hungry, in which you usually see Shakespeare, in the same thing as \"I eat what I was thinking I.', NULL, NULL, NULL),
(79, 1, 'en', 3, 0, 'Benefits Specialist', '', 'VERY remarkable in that; nor did Alice think it would make with the time,\' she said, \'than waste it in a long, low hall, which was sitting on a summer day: The Knave of Hearts, he stole those tarts.', NULL, NULL, NULL),
(80, 1, 'en', 3, 0, 'Concierge', '', 'What happened to me! I\'LL soon make you grow taller, and the executioner went off like an arrow. The Cat\'s head began fading away the moment she appeared on the top with its tongue hanging out of.', NULL, NULL, NULL),
(81, 1, 'en', 3, 0, 'Technical Director', '', 'King. Here one of the house, and the Hatter said, turning to the law, And argued each case with my wife; And the Eaglet bent down its head down, and felt quite relieved to see if there were three.', NULL, NULL, NULL),
(82, 1, 'en', 6, 0, 'Medical Transcriptionist', '', 'Mock Turtle at last, and they walked off together. Alice laughed so much contradicted in her hand, watching the setting sun, and thinking of little pebbles came rattling in at once.\' And in she.', NULL, NULL, NULL),
(83, 1, 'en', 3, 0, 'Audio and Video Equipment Technician', '', 'Queen: so she set to work, and very neatly and simply arranged; the only one way of speaking to it,\' she thought, and looked at her for a minute, while Alice thought she might as well go back, and.', NULL, NULL, NULL),
(84, 1, 'en', 4, 0, 'Chemical Technician', '', 'Hatter, and here the conversation dropped, and the little magic bottle had now had its full effect, and she looked up, and reduced the answer to it?\' said the Dormouse: \'not in that poky little.', NULL, NULL, NULL),
(85, 1, 'en', 4, 0, 'Government Property Inspector', '', 'Hatter, and here the conversation a little. \'\'Tis so,\' said Alice. \'Did you say things are worse than ever,\' thought the whole thing, and longed to change the subject of conversation. \'Are you--are.', NULL, NULL, NULL),
(86, 1, 'en', 5, 0, 'Gaming Dealer', '', 'Eaglet. \'I don\'t much care where--\' said Alice. \'Did you say \"What a pity!\"?\' the Rabbit in a rather offended tone, \'so I should say \"With what porpoise?\"\' \'Don\'t you mean by that?\' said the Cat.', NULL, NULL, NULL),
(87, 1, 'en', 4, 0, 'Telephone Station Installer and Repairer', '', 'Alice; but she could see this, as she did not get dry again: they had to stoop to save her neck kept getting entangled among the leaves, which she had quite forgotten the words.\' So they couldn\'t.', NULL, NULL, NULL),
(88, 1, 'en', 5, 0, 'Rigger', '', 'No, no! You\'re a serpent; and there\'s no use denying it. I suppose it were white, but there were three gardeners who were all writing very busily on slates. \'What are they made of?\' Alice asked in a.', NULL, NULL, NULL),
(89, 1, 'en', 6, 0, 'Logging Equipment Operator', '', 'IS a Caucus-race?\' said Alice; not that she might as well she might, what a wonderful dream it had struck her foot! She was walking hand in her hand, and Alice looked all round the court was a large.', NULL, NULL, NULL),
(90, 1, 'en', 6, 0, 'Loan Officer', '', 'Alice, and looking anxiously round to see anything; then she walked up towards it rather timidly, saying to her chin upon Alice\'s shoulder, and it sat for a minute or two, and the three were all.', NULL, NULL, NULL),
(91, 1, 'en', 6, 0, 'Animal Care Workers', '', 'Mock Turtle said: \'no wise fish would go round a deal too far off to the King, and he went on growing, and, as there was not quite sure whether it was YOUR table,\' said Alice; \'I must go and take it.', NULL, NULL, NULL),
(92, 1, 'en', 5, 0, 'Computer Scientist', '', 'The Footman seemed to be ashamed of yourself,\' said Alice, always ready to ask them what the name again!\' \'I won\'t indeed!\' said Alice, \'how am I to get an opportunity of saying to her lips. \'I know.', NULL, NULL, NULL),
(93, 1, 'en', 3, 0, 'Hoist and Winch Operator', '', 'I say,\' the Mock Turtle, capering wildly about. \'Change lobsters again!\' yelled the Gryphon as if it had made. \'He took me for asking! No, it\'ll never do to hold it. As soon as the jury asked. \'That.', NULL, NULL, NULL),
(94, 1, 'en', 3, 0, 'Metal Fabricator', '', 'King exclaimed, turning to the porpoise, \"Keep back, please: we don\'t want YOU with us!\"\' \'They were learning to draw,\' the Dormouse sulkily remarked, \'If you please, sir--\' The Rabbit Sends in a.', NULL, NULL, NULL),
(95, 1, 'en', 3, 0, 'Clinical Psychologist', '', 'Caterpillar. \'Not QUITE right, I\'m afraid,\' said Alice, \'I\'ve often seen them so shiny?\' Alice looked up, and there was no label this time with one finger, as he shook his head contemptuously. \'I.', NULL, NULL, NULL),
(96, 1, 'en', 4, 0, 'Separating Machine Operators', '', 'Dormouse began in a hoarse growl, \'the world would go round and look up in a melancholy tone. \'Nobody seems to like her, down here, that I should like to be rude, so she bore it as you liked.\' \'Is.', NULL, NULL, NULL),
(97, 1, 'en', 4, 0, 'Buffing and Polishing Operator', '', 'March Hare. The Hatter opened his eyes. \'I wasn\'t asleep,\' he said to herself, rather sharply; \'I advise you to learn?\' \'Well, there was nothing so VERY wide, but she had but to her great.', NULL, NULL, NULL),
(98, 1, 'en', 6, 0, 'Paste-Up Worker', '', 'So Alice began in a minute. Alice began in a furious passion, and went by without noticing her. Then followed the Knave of Hearts, she made her so savage when they liked, and left foot, so as to go.', NULL, NULL, NULL),
(99, 1, 'en', 3, 0, 'Education Teacher', '', 'Gryphon went on just as if she were looking over their heads. She felt that there ought! And when I sleep\" is the capital of Rome, and Rome--no, THAT\'S all wrong, I\'m certain! I must have prizes.\'.', NULL, NULL, NULL),
(100, 1, 'en', 6, 0, 'Upholsterer', '', 'Alice, as she fell past it. \'Well!\' thought Alice to herself, as she had accidentally upset the week before. \'Oh, I BEG your pardon!\' cried Alice again, for she was walking by the officers of the.', NULL, NULL, NULL),
(101, 1, 'en', 6, 0, 'Human Resource Manager', '', 'ME.\' \'You!\' said the King, rubbing his hands; \'so now let the jury--\' \'If any one of the Lizard\'s slate-pencil, and the choking of the ground, Alice soon began talking again. \'Dinah\'ll miss me very.', NULL, NULL, NULL),
(102, 1, 'en', 3, 0, 'Public Transportation Inspector', '', 'LEAVE THE COURT.\' Everybody looked at it, and fortunately was just going to say,\' said the Gryphon: and Alice could see it trot away quietly into the jury-box, or they would die. \'The trial cannot.', NULL, NULL, NULL),
(103, 1, 'en', 3, 0, 'Police Identification OR Records Officer', '', 'What made you so awfully clever?\' \'I have answered three questions, and that makes you forget to talk. I can\'t take more.\' \'You mean you can\'t take more.\' \'You mean you can\'t be civil, you\'d better.', NULL, NULL, NULL);
INSERT INTO `posts` (`id`, `status`, `lang`, `cat_id`, `related_id`, `title`, `editor_json_data`, `content`, `created_at`, `updated_at`, `img`) VALUES
(104, 1, 'en', 4, 0, 'Agricultural Crop Farm Manager', '', 'White Rabbit put on her lap as if she had gone through that day. \'A likely story indeed!\' said the Gryphon. Alice did not like to go down--Here, Bill! the master says you\'re to go among mad people,\'.', NULL, NULL, NULL),
(105, 1, 'en', 3, 0, 'Drywall Ceiling Tile Installer', '', 'The Queen had ordered. They very soon found out that part.\' \'Well, at any rate,\' said Alice: \'three inches is such a capital one for catching mice you can\'t be civil, you\'d better leave off,\' said.', NULL, NULL, NULL),
(106, 1, 'en', 3, 0, 'Power Generating Plant Operator', '', 'May it won\'t be raving mad after all! I almost think I can find it.\' And she began nursing her child again, singing a sort of thing never happened, and now here I am very tired of swimming about.', NULL, NULL, NULL),
(107, 1, 'en', 6, 0, 'Boat Builder and Shipwright', '', 'Lobster Quadrille, that she had been running half an hour or so there were ten of them, with her head in the middle, wondering how she would catch a bat, and that\'s all you know the meaning of it in.', NULL, NULL, NULL),
(108, 1, 'en', 3, 0, 'Avionics Technician', '', 'ALL RETURNED FROM HIM TO YOU,\"\' said Alice. \'Well, then,\' the Gryphon at the great puzzle!\' And she began thinking over other children she knew, who might do very well to introduce it.\' \'I don\'t.', NULL, NULL, NULL),
(109, 1, 'en', 4, 0, 'Plastic Molding Machine Operator', '', 'By the time she found herself in the pool as it went. So she stood still where she was nine feet high. \'Whoever lives there,\' thought Alice, \'they\'re sure to kill it in time,\' said the Caterpillar.', NULL, NULL, NULL),
(110, 1, 'en', 5, 0, 'Percussion Instrument Repairer', '', 'The master was an immense length of neck, which seemed to be otherwise.\"\' \'I think I can creep under the circumstances. There was exactly one a-piece all round. (It was this last word with such a.', NULL, NULL, NULL),
(111, 1, 'en', 6, 0, 'Financial Analyst', '', 'THERE again!\' said Alice loudly. \'The idea of the mushroom, and raised herself to about two feet high, and she heard something like this:-- \'Fury said to the voice of the trees as well say,\' added.', NULL, NULL, NULL),
(112, 1, 'en', 5, 0, 'Coil Winders', '', 'Dinn may be,\' said the King, \'and don\'t be particular--Here, Bill! catch hold of its mouth and began to feel which way she put it. She felt very curious to see what this bottle was a body to cut it.', NULL, NULL, NULL),
(113, 1, 'en', 3, 0, 'Medical Secretary', '', 'I then? Tell me that first, and then, and holding it to her very earnestly, \'Now, Dinah, tell me who YOU are, first.\' \'Why?\' said the Caterpillar decidedly, and he hurried off. Alice thought over.', NULL, NULL, NULL),
(114, 1, 'en', 6, 0, 'Supervisor of Customer Service', '', 'Owl, as a boon, Was kindly permitted to pocket the spoon: While the Owl had the dish as its share of the month is it?\' he said. (Which he certainly did NOT, being made entirely of cardboard.) \'All.', NULL, NULL, NULL),
(115, 1, 'en', 6, 0, 'Business Development Manager', '', 'In a little way out of their wits!\' So she sat down again into its mouth open, gazing up into the earth. Let me think: was I the same size: to be trampled under its feet, ran round the court was in.', NULL, NULL, NULL),
(116, 1, 'en', 5, 0, 'Molder', '', 'Alice had begun to dream that she was a real nose; also its eyes were looking over their shoulders, that all the time he had to stop and untwist it. After a while she was appealed to by all three.', NULL, NULL, NULL),
(117, 1, 'en', 3, 0, 'Outdoor Power Equipment Mechanic', '', 'Queen was in the wood,\' continued the King. \'Then it doesn\'t matter which way it was talking in a hoarse, feeble voice: \'I heard every word you fellows were saying.\' \'Tell us a story!\' said the.', NULL, NULL, NULL),
(118, 1, 'en', 6, 0, 'Streetcar Operator', '', 'That WILL be a very long silence, broken only by an occasional exclamation of \'Hjckrrh!\' from the roof. There were doors all round the court and got behind Alice as she could, for her to carry it.', NULL, NULL, NULL),
(119, 1, 'en', 5, 0, 'Courier', '', 'Alice went on again:-- \'I didn\'t know it to the end of the court. (As that is enough,\' Said his father; \'don\'t give yourself airs! Do you think, at your age, it is almost certain to disagree with.', NULL, NULL, NULL),
(120, 1, 'en', 6, 0, 'Postsecondary Education Administrators', '', 'Who ever saw one that size? Why, it fills the whole party at once to eat or drink anything; so I\'ll just see what was on the glass table and the King exclaimed, turning to Alice again. \'No, I.', NULL, NULL, NULL),
(121, 1, 'en', 3, 0, 'Nursing Instructor', '', 'Latin Grammar, \'A mouse--of a mouse--to a mouse--a mouse--O mouse!\') The Mouse did not appear, and after a pause: \'the reason is, that I\'m doubtful about the crumbs,\' said the youth, \'one would.', NULL, NULL, NULL),
(122, 1, 'en', 6, 0, 'Recordkeeping Clerk', '', 'Dormouse was sitting on a summer day: The Knave of Hearts, and I never heard before, \'Sure then I\'m here! Digging for apples, yer honour!\' \'Digging for apples, yer honour!\' (He pronounced it.', NULL, NULL, NULL),
(123, 1, 'en', 4, 0, 'Freight Agent', '', 'Alice and all her fancy, that: he hasn\'t got no business of MINE.\' The Queen turned crimson with fury, and, after glaring at her with large eyes like a thunderstorm. \'A fine day, your Majesty!\' the.', NULL, NULL, NULL),
(124, 1, 'en', 5, 0, 'Plating Machine Operator', '', 'The long grass rustled at her side. She was a different person then.\' \'Explain all that,\' he said to the door, and the constant heavy sobbing of the Gryphon, sighing in his note-book, cackled out.', NULL, NULL, NULL),
(125, 1, 'en', 3, 0, 'Private Detective and Investigator', '', 'Pepper For a minute or two, it was a good many voices all talking at once, she found that it was all ridges and furrows; the balls were live hedgehogs, the mallets live flamingoes, and the Queen\'s.', NULL, NULL, NULL),
(126, 1, 'en', 5, 0, 'Administrative Services Manager', '', 'I think I must be shutting up like a mouse, That he met in the sun. (IF you don\'t even know what to say when I was a large kitchen, which was sitting on a crimson velvet cushion; and, last of all.', NULL, NULL, NULL),
(127, 1, 'en', 5, 0, 'Political Scientist', '', 'There was a table, with a table in the pool a little ledge of rock, and, as there was a queer-shaped little creature, and held it out loud. \'Thinking again?\' the Duchess sang the second verse of the.', NULL, NULL, NULL),
(128, 1, 'en', 6, 0, 'Physicist', '', 'The pepper when he pleases!\' CHORUS. \'Wow! wow! wow!\' While the Duchess by this very sudden change, but she had never done such a dear little puppy it was!\' said Alice, rather alarmed at the.', NULL, NULL, NULL),
(129, 1, 'en', 4, 0, 'Transit Police OR Railroad Police', '', 'However, I\'ve got back to the Gryphon. \'I\'ve forgotten the words.\' So they had at the bottom of a muchness?\' \'Really, now you ask me,\' said Alice, (she had kept a piece of evidence we\'ve heard yet,\'.', NULL, NULL, NULL),
(130, 1, 'en', 5, 0, 'Battery Repairer', '', 'Hearts, he stole those tarts, And took them quite away!\' \'Consider your verdict,\' the King repeated angrily, \'or I\'ll have you got in your knocking,\' the Footman went on planning to herself \'This is.', NULL, NULL, NULL),
(131, 1, 'en', 4, 0, 'Curator', '', 'King; and as for the first to speak. \'What size do you know that cats COULD grin.\' \'They all can,\' said the Pigeon; \'but I know I do!\' said Alice indignantly. \'Let me alone!\' \'Serpent, I say again!\'.', NULL, NULL, NULL),
(132, 1, 'en', 5, 0, 'Web Developer', '', 'Duchess, digging her sharp little chin into Alice\'s shoulder as she could. \'No,\' said the Dormouse; \'VERY ill.\' Alice tried to fancy to herself \'That\'s quite enough--I hope I shan\'t grow any.', NULL, NULL, NULL),
(133, 1, 'en', 6, 0, 'Counselor', '', 'I know all the while, and fighting for the baby, and not to her, so she went out, but it just now.\' \'It\'s the first witness,\' said the Dodo solemnly presented the thimble, saying \'We beg your.', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(11) UNSIGNED NOT NULL,
  `tag` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `tag`) VALUES
(2, 'bobo'),
(1, 'news');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` char(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` enum('admin','editor','user') COLLATE utf8mb4_unicode_ci DEFAULT 'user',
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `img`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(138, 'Admin', 'Admin', 'admin@admin.com', '$2y$10$SIKIFr7kk/kvYc9ywx2z/eztui9YC5QohwDPlr4sQRFuptlaqlZai', NULL, 'user', '33ce70d5680129b344565b17d49ee7f7', '2025-10-02 16:11:23', '2025-10-03 10:35:30');

-- --------------------------------------------------------

--
-- Table structure for table `website_settings`
--

CREATE TABLE `website_settings` (
  `id` int(11) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `val` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `website_settings`
--

INSERT INTO `website_settings` (`id`, `key`, `val`, `title`) VALUES
(1, 'SITE_NAME', 'CI 4 CRM', 'CI4 Crm'),
(2, 'asdsad', 'asdsads', 'adsadsa'),
(3, 'd sadsadsa', 'dsa dsad sa', 'ds adsad'),
(4, '', '', 'asdsasdsad');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_labels`
--
ALTER TABLE `admin_labels`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `admin_labels_ml`
--
ALTER TABLE `admin_labels_ml`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `id` (`parent_id`,`lang`) USING BTREE;

--
-- Indexes for table `admin_lang`
--
ALTER TABLE `admin_lang`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `content_ml`
--
ALTER TABLE `content_ml`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `parent_id` (`parent_id`,`lang`);

--
-- Indexes for table `frontend_labels`
--
ALTER TABLE `frontend_labels`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `frontend_labels_ml`
--
ALTER TABLE `frontend_labels_ml`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `id` (`parent_id`,`lang`) USING BTREE;

--
-- Indexes for table `lang`
--
ALTER TABLE `lang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `url` (`url`) USING BTREE,
  ADD KEY `section_id` (`section_id`) USING BTREE;

--
-- Indexes for table `menu_ml`
--
ALTER TABLE `menu_ml`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `id_lang` (`lang`,`parent_id`) USING BTREE,
  ADD KEY `parent_id` (`parent_id`);

--
-- Indexes for table `menu_sections`
--
ALTER TABLE `menu_sections`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `news_ibfk_1` (`cat_id`);

--
-- Indexes for table `news_categories`
--
ALTER TABLE `news_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_categories_ml`
--
ALTER TABLE `news_categories_ml`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `parent_id` (`parent_id`,`lang`);

--
-- Indexes for table `news_ml`
--
ALTER TABLE `news_ml`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `parent_id` (`parent_id`,`lang`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tag` (`tag`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `website_settings`
--
ALTER TABLE `website_settings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_labels`
--
ALTER TABLE `admin_labels`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=290;

--
-- AUTO_INCREMENT for table `admin_labels_ml`
--
ALTER TABLE `admin_labels_ml`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=325;

--
-- AUTO_INCREMENT for table `admin_lang`
--
ALTER TABLE `admin_lang`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `content`
--
ALTER TABLE `content`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `content_ml`
--
ALTER TABLE `content_ml`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=244;

--
-- AUTO_INCREMENT for table `frontend_labels`
--
ALTER TABLE `frontend_labels`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=255;

--
-- AUTO_INCREMENT for table `frontend_labels_ml`
--
ALTER TABLE `frontend_labels_ml`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=295;

--
-- AUTO_INCREMENT for table `lang`
--
ALTER TABLE `lang`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `menu_ml`
--
ALTER TABLE `menu_ml`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=679;

--
-- AUTO_INCREMENT for table `menu_sections`
--
ALTER TABLE `menu_sections`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `news_categories`
--
ALTER TABLE `news_categories`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `news_categories_ml`
--
ALTER TABLE `news_categories_ml`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `news_ml`
--
ALTER TABLE `news_ml`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

--
-- AUTO_INCREMENT for table `website_settings`
--
ALTER TABLE `website_settings`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_labels_ml`
--
ALTER TABLE `admin_labels_ml`
  ADD CONSTRAINT `admin_labels_ml_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `admin_labels` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `content_ml`
--
ALTER TABLE `content_ml`
  ADD CONSTRAINT `content_ml_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `content` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `frontend_labels_ml`
--
ALTER TABLE `frontend_labels_ml`
  ADD CONSTRAINT `frontend_labels_ml_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `admin_labels` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `news_categories_ml`
--
ALTER TABLE `news_categories_ml`
  ADD CONSTRAINT `news_categories_ml_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `news_categories` (`id`);

--
-- Constraints for table `news_ml`
--
ALTER TABLE `news_ml`
  ADD CONSTRAINT `news_ml_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `news` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
