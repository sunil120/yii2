-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 07, 2016 at 11:57 AM
-- Server version: 5.5.46-0ubuntu0.14.04.2
-- PHP Version: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `yii2`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_item`
--

CREATE TABLE IF NOT EXISTS `auth_item` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `rule_name` varchar(64) DEFAULT NULL,
  `data` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `type` (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `auth_rule`
--

CREATE TABLE IF NOT EXISTS `auth_rule` (
  `name` varchar(64) NOT NULL,
  `data` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE IF NOT EXISTS `branches` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `branch_name` varchar(100) NOT NULL,
  `branch_address` varchar(100) NOT NULL,
  `created_dt` datetime NOT NULL,
  `status` tinyint(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `company_id` (`company_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `company_id`, `branch_name`, `branch_address`, `created_dt`, `status`) VALUES
(1, 3, 'Corporate office', 'Stadium Circle', '2015-12-23 01:51:54', 1);

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE IF NOT EXISTS `companies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(100) NOT NULL,
  `company_address` varchar(100) NOT NULL,
  `company_email` varchar(100) NOT NULL,
  `created_dt` datetime NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `company_name`, `company_address`, `company_email`, `created_dt`, `status`) VALUES
(2, 'Cygnet- infotech', 'Novrangpura Ahmedabad', 'sunil@cygnet-infotech.com', '2015-12-23 12:42:56', 1),
(3, 'DRC Systems', 'Ahmedabad', 'test@drcsystems.com', '2015-12-24 09:02:42', 1),
(4, 'test', 'test', 'test@drcsystems.comss', '2015-12-25 13:13:18', 1),
(5, 'DRC Systems1', 'Ahmedabad', 'test@drcsystems.com', '2015-12-25 13:24:10', 1);

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE IF NOT EXISTS `country` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `title`, `status`) VALUES
(1, 'India', 1);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE IF NOT EXISTS `departments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `department_name` varchar(100) NOT NULL,
  `created_dt` datetime NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `company_id` (`company_id`),
  KEY `branch_id` (`branch_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `company_id`, `branch_id`, `department_name`, `created_dt`, `status`) VALUES
(1, 3, 1, 'IT', '2015-01-01 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1450855890),
('m130524_201442_init', 1450855936);

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE IF NOT EXISTS `page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `is_url` tinyint(1) DEFAULT NULL,
  `page_url` text,
  `page_name` varchar(100) NOT NULL,
  `page_content` text,
  `is_seo` tinyint(1) DEFAULT NULL,
  `page_seo_name` varchar(255) DEFAULT NULL,
  `meta_key` text,
  `meta_values` text,
  `status` tinyint(1) NOT NULL,
  `created_dt` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `parent_id` (`parent_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`id`, `parent_id`, `is_url`, `page_url`, `page_name`, `page_content`, `is_seo`, `page_seo_name`, `meta_key`, `meta_values`, `status`, `created_dt`) VALUES
(6, NULL, 1, 'Privacy-Policy', 'About Us', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n\r\n<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.</p>\r\n\r\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from &quot;de Finibus Bonorum et Malorum&quot; by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>\r\n\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n\r\n<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.</p>\r\n\r\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from &quot;de Finibus Bonorum et Malorum&quot; by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>\r\n\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n', 1, 'about-us', 'metatestkey', 'metatestvalue', 1, '2015-12-31 00:00:00'),
(7, NULL, 1, 'Privacy-Policy', 'Privacy Policy', '<h3>The standard Lorem Ipsum passage, used since the 1500s</h3>\r\n\r\n<p>&quot;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&quot;</p>\r\n\r\n<h3>Section 1.10.32 of &quot;de Finibus Bonorum et Malorum&quot;, written by Cicero in 45 BC</h3>\r\n\r\n<p>&quot;Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?&quot;</p>\r\n\r\n<h3>1914 translation by H. Rackham</h3>\r\n\r\n<p>&quot;But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?&quot;</p>\r\n\r\n<h3>Section 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot;, written by Cicero in 45 BC</h3>\r\n\r\n<p>&quot;At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.&quot;</p>\r\n\r\n<h3>1914 translation by H. Rackham</h3>\r\n\r\n<p>&quot;On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.&quot;</p>\r\n', 1, 'privacy-policy', 'privacy-policy-key', 'privacy-policy-value', 1, '2016-01-01 00:00:00'),
(8, NULL, 1, 'vision', 'Vision', '<h3>1914 translation by H. Rackham</h3>\r\n\r\n<p>&quot;But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?&quot;</p>\r\n\r\n<h3>Section 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot;, written by Cicero in 45 BC</h3>\r\n\r\n<p>&quot;At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.&quot;</p>\r\n\r\n<h3>1914 translation by H. Rackham</h3>\r\n\r\n<p>&quot;On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.&quot;</p>\r\n', 1, 'vision', NULL, NULL, 1, '2016-01-01 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `role_action`
--

CREATE TABLE IF NOT EXISTS `role_action` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `module_name` varchar(100) NOT NULL,
  `controller_name` varchar(100) NOT NULL,
  `action_name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `module_id` (`module_name`),
  KEY `controller_id` (`controller_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=206 ;

--
-- Dumping data for table `role_action`
--

INSERT INTO `role_action` (`id`, `module_name`, `controller_name`, `action_name`) VALUES
(157, 'TestModule', 'Branches', 'index'),
(158, 'TestModule', 'Branches', 'view'),
(159, 'TestModule', 'Branches', 'create'),
(160, 'TestModule', 'Branches', 'update'),
(161, 'TestModule', 'Branches', 'delete'),
(162, 'TestModule', 'Companies', 'index'),
(163, 'TestModule', 'Companies', 'view'),
(164, 'TestModule', 'Companies', 'create'),
(165, 'TestModule', 'Companies', 'update'),
(166, 'TestModule', 'Companies', 'delete'),
(167, 'TestModule', 'Country', 'index'),
(168, 'TestModule', 'Country', 'view'),
(169, 'TestModule', 'Country', 'create'),
(170, 'TestModule', 'Country', 'update'),
(171, 'TestModule', 'Country', 'delete'),
(172, 'TestModule', 'Departments', 'index'),
(173, 'TestModule', 'Departments', 'view'),
(174, 'TestModule', 'Departments', 'create'),
(175, 'TestModule', 'Departments', 'update'),
(176, 'TestModule', 'Departments', 'delete'),
(177, 'TestModule', 'Page', 'index'),
(178, 'TestModule', 'Page', 'view'),
(179, 'TestModule', 'Page', 'create'),
(180, 'TestModule', 'Page', 'update'),
(181, 'TestModule', 'Page', 'delete'),
(182, 'TestModule', 'Roleaction', 'index'),
(183, 'TestModule', 'Roleaction', 'view'),
(184, 'TestModule', 'Roleaction', 'create'),
(185, 'TestModule', 'Roleaction', 'update'),
(186, 'TestModule', 'Roleaction', 'delete'),
(187, 'TestModule', 'Roleaction', 'getcontrollersandactions'),
(188, 'TestModule', 'Rolemaster', 'index'),
(189, 'TestModule', 'Rolemaster', 'view'),
(190, 'TestModule', 'Rolemaster', 'create'),
(191, 'TestModule', 'Rolemaster', 'update'),
(192, 'TestModule', 'Rolemaster', 'delete'),
(193, 'TestModule', 'Site', 'index'),
(194, 'TestModule', 'Site', 'login'),
(195, 'TestModule', 'Site', 'logout'),
(196, 'TestModule', 'User', 'index'),
(197, 'TestModule', 'User', 'view'),
(198, 'TestModule', 'User', 'create'),
(199, 'TestModule', 'User', 'update'),
(200, 'TestModule', 'User', 'delete'),
(201, 'TestModule', 'Usertype', 'index'),
(202, 'TestModule', 'Usertype', 'view'),
(203, 'TestModule', 'Usertype', 'create'),
(204, 'TestModule', 'Usertype', 'update'),
(205, 'TestModule', 'Usertype', 'delete');

-- --------------------------------------------------------

--
-- Table structure for table `role_controller`
--

CREATE TABLE IF NOT EXISTS `role_controller` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `role_controller`
--

INSERT INTO `role_controller` (`id`, `title`) VALUES
(1, 'Branches'),
(2, 'Companies'),
(3, 'Departments'),
(4, 'Roleaction'),
(5, 'Rolemaster'),
(6, 'Site'),
(7, 'Usertype'),
(8, 'Branches');

-- --------------------------------------------------------

--
-- Table structure for table `role_master`
--

CREATE TABLE IF NOT EXISTS `role_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_action_id` int(11) NOT NULL,
  `user_type_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `role_action_id` (`role_action_id`),
  KEY `user_type_id` (`user_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=299 ;

--
-- Dumping data for table `role_master`
--

INSERT INTO `role_master` (`id`, `role_action_id`, `user_type_id`) VALUES
(207, 159, 1),
(208, 161, 1),
(209, 157, 1),
(210, 160, 1),
(211, 158, 1),
(212, 164, 1),
(213, 166, 1),
(214, 162, 1),
(215, 165, 1),
(216, 163, 1),
(217, 174, 1),
(218, 176, 1),
(219, 172, 1),
(220, 175, 1),
(221, 173, 1),
(222, 179, 1),
(223, 181, 1),
(224, 177, 1),
(225, 180, 1),
(226, 178, 1),
(227, 184, 1),
(228, 186, 1),
(229, 187, 1),
(230, 182, 1),
(231, 185, 1),
(232, 183, 1),
(233, 190, 1),
(234, 192, 1),
(235, 188, 1),
(236, 191, 1),
(237, 189, 1),
(238, 193, 1),
(239, 194, 1),
(240, 195, 1),
(241, 198, 1),
(242, 200, 1),
(243, 196, 1),
(244, 199, 1),
(245, 197, 1),
(246, 203, 1),
(247, 205, 1),
(248, 201, 1),
(249, 204, 1),
(250, 202, 1),
(251, 159, 2),
(252, 161, 2),
(253, 157, 2),
(254, 160, 2),
(255, 158, 2),
(256, 164, 2),
(257, 166, 2),
(258, 162, 2),
(259, 165, 2),
(260, 163, 2),
(261, 171, 2),
(262, 167, 2),
(263, 170, 2),
(264, 168, 2),
(265, 174, 2),
(266, 176, 2),
(267, 172, 2),
(268, 175, 2),
(269, 173, 2),
(270, 179, 2),
(271, 181, 2),
(272, 177, 2),
(273, 180, 2),
(274, 178, 2),
(275, 184, 2),
(276, 186, 2),
(277, 187, 2),
(278, 182, 2),
(279, 185, 2),
(280, 183, 2),
(281, 190, 2),
(282, 192, 2),
(283, 188, 2),
(284, 191, 2),
(285, 189, 2),
(286, 193, 2),
(287, 194, 2),
(288, 195, 2),
(289, 198, 2),
(290, 200, 2),
(291, 196, 2),
(292, 199, 2),
(293, 197, 2),
(294, 203, 2),
(295, 205, 2),
(296, 201, 2),
(297, 204, 2),
(298, 202, 2);

-- --------------------------------------------------------

--
-- Table structure for table `role_module`
--

CREATE TABLE IF NOT EXISTS `role_module` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `role_module`
--

INSERT INTO `role_module` (`id`, `title`) VALUES
(1, 'TestModule'),
(2, 'TestModule2\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_type_id` int(11) NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`),
  KEY `user_type_id` (`user_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `user_type_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'User', 'skumar', 'jqHUUxXatwzRaYClXgPsn4Z0MC_uzn_w', '$2y$13$TGnn.srE8pJOlGQiA48cEObaP/JfbSa/EexA/QCBwYbwKjhE5V5Iy', NULL, 'skumar@cygnet-infotech.com', 1, 1, 1450867114, 1452084828),
(2, 'Sunil', 'Kumar', 'sunil120', 'aPTZsMP6FOtedxqYc7j2UBF4-lnVHmCt', '$2y$13$2TeS7gaPU6Ynui9KlOR.0eVA0JoceDHH7lJgS5y1j0EmFn4RKfH06', NULL, 'sunil.kumar@cygnet-infotech.com', 2, 1, 1450871307, 1452089486),
(3, 'Manish', 'Jangir', 'manish', '', '$2y$13$UmoKt6WH67G6mjX56fWdCuKAdSoRQXzW5EH8y5LLWJRJQ/B4whSIm', NULL, 'manish@gmail.com', 1, 1, 1451907630, 1451911865),
(5, 'tset', 'test', 'skumar1', 'nc2AvQy6x17nbOLF2IcNGzFGOHvF4Rjk', '$2y$13$I9i/afjpsUMGCoWNGo8QjOTe5hBkpYj4JWdocCi7O.QNHUFRNqnLm', NULL, 'root@test.com', 1, 1, 1451912936, 1451916781),
(6, 'Manish2', 'Jangir', 'manish2', '3fY7KLy2V9s_9d8zDnMUsKS5QlOlzCcP', '$2y$13$r/XH6melAxlhqkv4yfOQre3S78GvCQOyua/flccooHjmSnopGVPdG', NULL, 'manish@gmail.com1', 1, 1, 1451914043, 1451914043),
(7, 'Test', 'User', 'testuser', '-Vby3b3TcAmqX8BpXl1r6ICbYP4gXpYb', '$2y$13$GBWbmaDiwjDgk03DYLG4te5NCGkXXZUkEv9v7zZesXOi4jGc23IV2', NULL, 'test@test.com', 1, 1, 1451973459, 1451973459);

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE IF NOT EXISTS `user_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_dt` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`id`, `title`, `status`, `created_dt`) VALUES
(1, 'Admin', 1, '2015-12-31 06:39:20'),
(2, 'Manager', 1, '2015-12-29 06:20:29');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `branches`
--
ALTER TABLE `branches`
  ADD CONSTRAINT `branches_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`);

--
-- Constraints for table `departments`
--
ALTER TABLE `departments`
  ADD CONSTRAINT `departments_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`),
  ADD CONSTRAINT `departments_ibfk_2` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`);

--
-- Constraints for table `page`
--
ALTER TABLE `page`
  ADD CONSTRAINT `page_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `page` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_master`
--
ALTER TABLE `role_master`
  ADD CONSTRAINT `role_master_ibfk_1` FOREIGN KEY (`role_action_id`) REFERENCES `role_action` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `role_master_ibfk_2` FOREIGN KEY (`user_type_id`) REFERENCES `user_type` (`id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`user_type_id`) REFERENCES `user_type` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
