-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 22, 2016 at 01:12 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sdil`
--

-- --------------------------------------------------------

--
-- Table structure for table `app_user`
--

CREATE TABLE `app_user` (
  `id` bigint(20) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `cell_number` varchar(255) DEFAULT NULL,
  `enabled` tinyint(1) NOT NULL,
  `password` varchar(255) NOT NULL,
  `password_expired` tinyint(1) NOT NULL,
  `password_reset_code` varchar(255) DEFAULT NULL,
  `password_reset_link` varchar(255) DEFAULT NULL,
  `password_reset_validity` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `app_user`
--

INSERT INTO `app_user` (`id`, `full_name`, `cell_number`, `enabled`, `password`, `password_expired`, `password_reset_code`, `password_reset_link`, `password_reset_validity`, `email`) VALUES
(14, 'Addwordlbd', '', 1, '611ee131a4b56c0e8e018a3521126682', 1, NULL, NULL, '2015-11-13 12:39:38', 'marafat_121@yahoo.com'),
(16, 'Md. Ibrahim Arafat', '', 1, '611ee131a4b56c0e8e018a3521126682', 1, NULL, NULL, '2015-11-13 14:49:38', 'ibrahim.arafat@sebpo.com'),
(17, 'MD IBRAHIM ARAFAT', '', 1, '611ee131a4b56c0e8e018a3521126682', 1, NULL, NULL, '2015-11-13 14:58:33', 'himalking@hotmail.com'),
(19, 'Md Ibrahim Arafat', '', 1, '611ee131a4b56c0e8e018a3521126682', 1, NULL, NULL, '2015-11-16 12:23:34', 'sdil@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(50) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `cell_number` varchar(100) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text,
  `message_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `full_name`, `email`, `cell_number`, `subject`, `message`, `message_time`) VALUES
(3, 'fsdfdsfdsfdsf', 'ibrahim.arafat@sebpo.com', '01687-127832', 'fdssfsdfsdfdsfsdfdsf', '', '2016-01-31 20:15:14'),
(4, 'fsdfdsfdsfdsf', 'ibrahim.arafat@sebpo.com', '01687-127832', 'fdssfsdfsdfdsfsdfdsf', '', '2016-01-31 20:15:14'),
(5, 'fsdfdsfdsfdsf', 'ibrahim.arafat@sebpo.com', '01687-127832', 'fdssfsdfsdfdsfsdfdsf', '', '2016-01-31 20:15:14'),
(6, 'fsdfdsfdsfdsf', 'ibrahim.arafat@sebpo.com', '01687-127832', 'fdssfsdfsdfdsfsdfdsf', '', '2016-01-31 20:15:14'),
(7, 'fsdfdsfdsfdsf', 'ibrahim.arafat@sebpo.com', '01687-127832', 'fdssfsdfsdfdsfsdfdsf', '', '2016-01-31 20:15:14'),
(8, 'fsdfdsfdsfdsf', 'ibrahim.arafat@sebpo.com', '01687-127832', 'fdssfsdfsdfdsfsdfdsf', '', '2016-01-31 20:15:14'),
(9, 'fsdfdsfdsfdsf', 'ibrahim.arafat@sebpo.com', '01687-127832', 'fdssfsdfsdfdsfsdfdsf', '', '2016-01-31 20:15:14'),
(10, 'fsdfdsfdsfdsf', 'ibrahim.arafat@sebpo.com', '01687-127832', 'fdssfsdfsdfdsfsdfdsf', '', '2016-01-31 20:15:14'),
(11, 'fsdfdsfdsfdsf', 'ibrahim.arafat@sebpo.com', '01687-127832', 'fdssfsdfsdfdsfsdfdsf', '', '2016-01-31 20:15:14'),
(12, 'fsdfdsfdsfdsf', 'ibrahim.arafat@sebpo.com', '01687-127832', 'fdssfsdfsdfdsfsdfdsf', '', '2016-01-31 20:15:14'),
(13, 'fsdfdsfdsfdsf', 'ibrahim.arafat@sebpo.com', '01687-127832', 'fdssfsdfsdfdsfsdfdsf', '', '2016-01-31 20:15:14'),
(14, 'fsdfdsfdsfdsf', 'ibrahim.arafat@sebpo.com', '01687-127832', 'fdssfsdfsdfdsfsdfdsf', '', '2016-01-31 20:15:14'),
(15, 'fsdfdsfdsfdsf', 'ibrahim.arafat@sebpo.com', '01687-127832', 'fdssfsdfsdfdsfsdfdsf', '', '2016-01-31 20:15:14'),
(16, 'fsdfdsfdsfdsf', 'ibrahim.arafat@sebpo.com', '01687-127832', 'fdssfsdfsdfdsfsdfdsf', '', '2016-01-31 20:15:14'),
(17, 'fsdfdsfdsfdsf', 'ibrahim.arafat@sebpo.com', '01687-127832', 'fdssfsdfsdfdsfsdfdsf', '', '2016-01-31 20:15:14'),
(18, 'fsdfdsfdsfdsf', 'ibrahim.arafat@sebpo.com', '01687-127832', 'fdssfsdfsdfdsfsdfdsf', '', '2016-01-31 20:15:14'),
(19, 'fsdfdsfdsfdsf', 'ibrahim.arafat@sebpo.com', '01687-127832', 'fdssfsdfsdfdsfsdfdsf', '', '2016-01-31 20:15:14'),
(20, 'fsdfdsfdsfdsf', 'ibrahim.arafat@sebpo.com', '01687-127832', 'fdssfsdfsdfdsfsdfdsf', '', '2016-01-31 20:15:14'),
(21, 'fsdfdsfdsfdsf', 'ibrahim.arafat@sebpo.com', '01687-127832', 'fdssfsdfsdfdsfsdfdsf', '', '2016-01-31 20:15:14'),
(22, 'fsdfdsfdsfdsf', 'ibrahim.arafat@sebpo.com', '01687-127832', 'fdssfsdfsdfdsfsdfdsf', '', '2016-01-31 20:15:14'),
(23, 'fsdfdsfdsfdsf', 'ibrahim.arafat@sebpo.com', '01687-127832', 'fdssfsdfsdfdsfsdfdsf', '', '2016-01-31 20:15:14');

-- --------------------------------------------------------

--
-- Table structure for table `sdil_jobs`
--

CREATE TABLE `sdil_jobs` (
  `job_id` int(100) NOT NULL,
  `job_title` varchar(100) NOT NULL,
  `job_page_url` varchar(255) NOT NULL,
  `job_short_description` text NOT NULL,
  `job_detail_description` longtext,
  `job_responsibilities` longtext,
  `job_type` varchar(100) NOT NULL,
  `job_salary` varchar(100) NOT NULL,
  `job_experience` text NOT NULL,
  `working_hour` varchar(255) NOT NULL,
  `job_application_deadline` varchar(100) NOT NULL,
  `other_conditions` varchar(255) NOT NULL,
  `is_active` tinyint(9) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sdil_jobs`
--

INSERT INTO `sdil_jobs` (`job_id`, `job_title`, `job_page_url`, `job_short_description`, `job_detail_description`, `job_responsibilities`, `job_type`, `job_salary`, `job_experience`, `working_hour`, `job_application_deadline`, `other_conditions`, `is_active`) VALUES
(1, 'Project Manager', 'http://localhost/newsdil/job/project-manager', 'Project Management', NULL, NULL, 'Full Time', 'Negotiable', 'Minimum 2 years of Project Management experiece', 'Sunday-Friday', '06/08/2016', 'Bonus, Lunch, Snacks, Provident Fund', 1),
(2, 'Software Engineer', 'http://localhost/newsdil/job/software-engineer', 'Software Engineer', NULL, NULL, 'Full Time', 'Negotiable', 'Minimum 2 years of Software Engineering experience', 'Sunday-Friday', '10/09/2016', 'Bonus, Lunch, Snacks, Provident Fund', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sdil_overview`
--

CREATE TABLE `sdil_overview` (
  `id` int(10) NOT NULL,
  `company_overview` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sdil_overview`
--

INSERT INTO `sdil_overview` (`id`, `company_overview`) VALUES
(1, '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<h1>COMPANY OVERVIEW</h1>\r\n<p>&nbsp;</p>\r\n<p>Shwapnoduar launched in 2010&nbsp;with a simple mission: help our clients exceed their own goals by leveraging the best technology talent in the world. With offices in the United States and in Bangladesh, our teams add quantifiable and sustainable value to our clients. We do things differently than other development shops, and that&rsquo;s helped us grow consistently every year.</p>\r\n<p>We can help your company perform better, even in today&rsquo;s disruptive environment, thanks to these core principles:</p>\r\n<p><strong>Your company deserves strategic partnerships instead of &ldquo;outsourcing.&rdquo;</strong><br />We&rsquo;re not the typical outsourcing company focused only on the short term. We value long-term business relationships. With experience in a variety of industries&mdash;including advertising, technology, publishing, and finance&mdash;Shwapnoduar&nbsp;prides itself on being able to adapt to the needs of our clients. We are engaging and flexible, and strive to exceed our clients&rsquo; expectations. We offer a global platform to improve processes and staffing so you can cut costs, increase your return on investment and be more competitive.</p>\r\n<p><strong>Your company deserves client management.</strong><br />We believe proactive communication and responsive action is critical for our clients. We assign a U.S. based client manager as a single point of contact to make it easier for you to keep in contact with us. We want you to know that we&rsquo;re here for you.</p>\r\n<p><strong>Your company will benefit from our performance-driven culture.<br /></strong>Our multi-discipline leadership team is comprised of technical engineers and a creative marketing and communications group, who have applied engineering methodologies to a services world. We believe you cannot manage what you can&rsquo;t measure, so our employees have formal metrics-based scorecards that ensure Shwapnoduar Key Performance Indicators (KPIs) are aligned with your business goals. Scorecards are unique by program to measure your company&rsquo;s metrics on a consistent basis, helping you increase quality and growth while keeping expenses down. We offer measurable results for continuous improvement.</p>\r\n<h3>PROVEN PERFORMANCE</h3>\r\n<p><strong>Better process results in consistent performance.<br /></strong>We&rsquo;ve turned the proven results from Six Sigma techniques into a unique fulfillment methodology that peers at other companies haven&rsquo;t been able to copy. Our employees follow documented procedures and a disciplined review process to hit strong quality assurance goals. Focused on continuous improvement through measured results, we deliver significant efficiency gains with high accuracy and reduced costs.</p>\r\n<p>We extend the same focus on quality to our client relationships, as well. As an extension of your own team, you&rsquo;ll discover our people want to exceed your expectations with every interaction. We&rsquo;ve even developed a comprehensive methodology to transition the work from your office to our delivery centers in Bangladesh. We believe that frequent, open, and honest communication is critical to a successful long-lasting strategic partnership. Working together, we can improve your processes and while maximizing your access to resources.</p>\r\n<h3>EXCEPTIONAL SERVICE</h3>\r\n<p><strong>Better people deliver better service &ndash; producing better results!<br /></strong>Our employees are our greatest assets. They&rsquo;re the reason we deliver quality services, exceptional software, and business solutions to many of the world&rsquo;s most dynamic companies. Our governing principle is simple: delivering outstanding quality and service only happens with brighter, happier people. Therefore, we recruit and hire only the most qualified individuals. Many of our employees have Master&rsquo;s Degrees in Engineering and Computer Science, and every member of our team is fluent in English.</p>\r\n<p>We&rsquo;re able to retain our talent by offering some of the industry&rsquo;s strongest training and career development programs. Our managers constantly analyze the skills of their team members, so we can train on the latest technologies while developing &ldquo;soft skills&rdquo; that make projects run smoothly. Unlike other development firms, none of our managers oversees more than eight direct reports. That ratio&rsquo;s lower than just about any other company we&rsquo;ve ever seen&mdash;in any industry&mdash;and it cultivates the kind of long-term mentoring that results in significantly higher quality.</p>\r\n<h3>OUR VISION</h3>\r\n<p>It is our vision at Shwapnoduar to:</p>\r\n<ol>\r\n<li>Build relationships</li>\r\n<li>Be a vital sourcing asset</li>\r\n<li>Help guide client growth and stability in the global marketplace</li>\r\n<li>Maintain strong workplace standards and opportunities for our employees</li>\r\n</ol>\r\n</body>\r\n</html>');

-- --------------------------------------------------------

--
-- Table structure for table `sdil_page_manager`
--

CREATE TABLE `sdil_page_manager` (
  `id` int(11) NOT NULL,
  `page_title` varchar(255) NOT NULL,
  `page_description` longtext NOT NULL,
  `page_link` varchar(255) NOT NULL,
  `is_active` tinyint(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sdil_partners`
--

CREATE TABLE `sdil_partners` (
  `id` bigint(10) NOT NULL,
  `partner_name` varchar(100) NOT NULL,
  `partner_internal_link` varchar(150) DEFAULT NULL,
  `partner_external_link` varchar(150) DEFAULT NULL,
  `partner_image` varchar(255) NOT NULL,
  `is_active` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sdil_partners`
--

INSERT INTO `sdil_partners` (`id`, `partner_name`, `partner_internal_link`, `partner_external_link`, `partner_image`, `is_active`) VALUES
(1, 'Microsoft', 'http://localhost:8888/newsdil/admin/addpartners', 'http://localhost:8888/newsdil/admin/addpartners', 'lrn-share-site-ms-logo.png', 1),
(3, 'Carwash', 'http://localhost:8888/newsdil/admin/addpartnerss', 'http://localhost:8888/newsdil/admin/addpartnerss', 'patners_01.png', 1),
(4, 'Coffee', 'http://localhost:8888/newsdil/coffee', 'http://localhost:8888/newsdil/coffee', 'patners_02.png', 1),
(5, 'Natural', 'http://localhost:8888/newsdil/natural', 'http://localhost:8888/newsdil/natural', 'patners_04.png', 1),
(6, 'Vetter', 'http://localhost:8888/newsdil/admin/vet', 'http://localhost:8888/newsdil/admin/vet', 'patners_05.png', 1),
(8, 'Oracle', 'https://www.oracle.com/index.html', 'https://www.oracle.com/index.html', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sdil_projects`
--

CREATE TABLE `sdil_projects` (
  `project_id` int(50) NOT NULL,
  `project_title` varchar(30) NOT NULL,
  `project_description` text NOT NULL,
  `project_external_link` varchar(100) DEFAULT NULL,
  `project_internal_link` varchar(100) DEFAULT NULL,
  `project_image` varchar(200) DEFAULT NULL,
  `project_start_date` varchar(100) NOT NULL,
  `project_end_date` varchar(100) NOT NULL,
  `project_category_id` int(50) NOT NULL,
  `project_page_description` longtext NOT NULL,
  `is_active` tinyint(9) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sdil_projects`
--

INSERT INTO `sdil_projects` (`project_id`, `project_title`, `project_description`, `project_external_link`, `project_internal_link`, `project_image`, `project_start_date`, `project_end_date`, `project_category_id`, `project_page_description`, `is_active`) VALUES
(2, 'Worpress Martwell', 'dsfdfd dsfds dsffds', '', 'http://localhost/newsdil/project/worpress-martwell', 'work_02.jpg', '28/07/2016', '28/07/2016', 1, '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>Cooming soon...</p>\r\n</body>\r\n</html>', 1),
(3, 'New Wordpress', 'WordpresWordpresWordpresWordpresWordpresWordpresWordpresWordpresWordpresWordpresWordpresWordpresWordpresWordpresWordpresWordpresWordpresWordpresWordpresWordpres', '', 'http://localhost/newsdil/project/new-wordpress', 'work_03.jpg', '15/07/2015', '29/07/2016', 1, '', 1),
(4, 'SD Drupal', 'DrupalDrupalDrupalDrupalDrupalDrupalDrupalDrupal', '', 'http://localhost/newsdil/project/sd-drupal', 'work_01.jpg', '15/07/2016', '16/07/2016', 5, '', 1),
(7, 'Different Worpress Project', 'Different Worpress Project', '', 'http://localhost/newsdil/project/different-worpress-project', 'work_02.jpg', '28/07/2016', '28/07/2016', 1, '', 1),
(8, 'Rel cliff Magento', 'Rel cliff Magento', '', 'http://localhost/newsdil/project/rel-cliff-magento', 'work_06.jpg', '11/07/2016', '17/07/2016', 6, '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>etst</p>\r\n</body>\r\n</html>', 1),
(9, 'New Drupal', 'New Drupal', '', 'http://localhost/newsdil/project/new-drupal', 'work_07.jpg', '29/06/2016', '02/07/2016', 5, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sdil_project_category`
--

CREATE TABLE `sdil_project_category` (
  `project_category_id` int(10) NOT NULL,
  `project_category_name` varchar(50) NOT NULL,
  `project_category_code` varchar(50) NOT NULL,
  `is_active` tinyint(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sdil_project_category`
--

INSERT INTO `sdil_project_category` (`project_category_id`, `project_category_name`, `project_category_code`, `is_active`) VALUES
(1, 'Wordpress', 'wordpress', 1),
(4, 'HTML & CSS', 'html & css', 0),
(5, 'Drupal', 'drupal', 1),
(6, 'Magento', 'magento', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sdil_testimonials`
--

CREATE TABLE `sdil_testimonials` (
  `id` int(50) NOT NULL,
  `title` varchar(150) NOT NULL,
  `testimonial_description` text NOT NULL,
  `testimonial_details_link` varchar(150) NOT NULL,
  `commented_by` varchar(30) NOT NULL,
  `is_active` tinyint(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sdil_testimonials`
--

INSERT INTO `sdil_testimonials` (`id`, `title`, `testimonial_description`, `testimonial_details_link`, `commented_by`, `is_active`) VALUES
(1, 'dsdfsfds', 'sdffdsfds fsdafdsf dsfdsf', 'http://localhost:8888/newsdil/admin/addtestimonials', 'fdsfdsfdsf', 1),
(4, '', 'fdsfdsfdsf', '', '', 0),
(5, 'Test Testimonial', 'There are many variations of passages of Lorem Ipsum available, but the majority have\r\n                                suffered alteration in some form, by injected humour, or randomised words which don''t\r\n                                look even slightly believable. If you are going to use a passage of Lorem Ipsum', '', 'Rabiul Biplob', 1);

-- --------------------------------------------------------

--
-- Table structure for table `service_list`
--

CREATE TABLE `service_list` (
  `id` bigint(20) NOT NULL,
  `service_name` varchar(255) NOT NULL,
  `total_description_div` text NOT NULL,
  `is_active` tinyint(4) DEFAULT NULL,
  `service_page_url` varchar(255) DEFAULT NULL,
  `service_page_description` longtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service_list`
--

INSERT INTO `service_list` (`id`, `service_name`, `total_description_div`, `is_active`, `service_page_url`, `service_page_description`) VALUES
(22, 'Back Office Processing', '   <div class="iteam">\r\n              <div class="service-thumb"><a href="#"><i class="fa fa-share"></i></a></div>\r\n              <div class="contain">\r\n                <h3>Back Office Processing</h3>\r\n                <p>We take our customers’ non-core and back office functions and perform them better, faster and more cost-effectively... </p>\r\n                <div class="s-read-btn"><a href="javascript:MyPopFunction();">Read more</a></div>\r\n              </div>\r\n            </div>', 1, 'http://localhost/newsdil/service/back-office-processing', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>Comming Soon...</p>\r\n</body>\r\n</html>'),
(23, 'Web & Software Development', '     <div class="iteam">\r\n              <div class="service-thumb"><a href="javascript:MyPopFunction();"><i class="fa fa-desktop"></i></a></div>\r\n              <div class="contain">\r\n                <h3>Web & Software Development</h3>\r\n                <p>We help you deliver quality software products and web applications ready for prime time and within your schedule...</p>\r\n                <div class="s-read-btn"><a href="javascript:MyPopFunction();">Read more</a></div>\r\n              </div>\r\n            </div>', 1, 'http://localhost/newsdil/service/web-software-development', ''),
(24, 'Domain Hosting', '<div class="iteam">\r\n              <div class="service-thumb"><a href="javascript:MyPopFunction();"><i class="fa fa-cloud"></i></a></div>\r\n              <div class="contain">\r\n                <h3>Domian & Hosting</h3>\r\n                <p>SDIL provides reliable and affordable domain name registration at a fraction of the cost of other registrars and web hosting services...<p>\r\n                <div class="s-read-btn"><a href="javascript:MyPopFunction();">Read more</a></div>\r\n              </div>\r\n            </div>', 1, 'http://localhost/newsdil/service/domain-hosting', ''),
(26, 'Digital Advertising Operations', '<div class="iteam">\r\n                                                <div class="service-thumb"><a href="#"><i class="fa fa-diamond"></i></a></div>\r\n                                                <div class="contain">\r\n                                                    <h3>Digital Advertising Operations</h3>\r\n                                                    <p>We take our customers’ non-core and back office functions and perform them better, faster and more cost-effectively... </p>\r\n                                                    <div class="s-read-btn"><a href="javascript:MyPopFunction();">Read more</a></div>\r\n                                                </div>\r\n                                            </div>', 0, 'http://localhost/newsdil/service/digital-advertising-operations', ''),
(45, 'test', 'ffffff', 0, 'http://localhost/newsdil/test', ''),
(46, 'fdfdfdfdfsfdf', 'fdf', 0, 'http://localhost/newsdil/fdfdfdfdfsfdf', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>fdjlkf</p>\r\n</body>\r\n</html>');

-- --------------------------------------------------------

--
-- Table structure for table `social_icon`
--

CREATE TABLE `social_icon` (
  `id` int(50) NOT NULL,
  `social_icon_name` varchar(255) NOT NULL,
  `social_icon_link` varchar(255) NOT NULL,
  `social_icon_logo_class_name` varchar(255) NOT NULL,
  `is_active` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `social_icon`
--

INSERT INTO `social_icon` (`id`, `social_icon_name`, `social_icon_link`, `social_icon_logo_class_name`, `is_active`) VALUES
(2, 'twitter', 'http://www.twitter.com', 'fa fa-twitter', 1),
(10, 'facebook', 'http://www.facebook.com', 'fa fa-facebook', 1);

-- --------------------------------------------------------

--
-- Table structure for table `system_configuration`
--

CREATE TABLE `system_configuration` (
  `id` int(20) NOT NULL,
  `top_heading1` varchar(255) NOT NULL,
  `top_heading2` varchar(255) NOT NULL,
  `footer_text` varchar(255) NOT NULL,
  `meta_keyword` varchar(255) NOT NULL,
  `meta_description` text NOT NULL,
  `favicon` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `system_configuration`
--

INSERT INTO `system_configuration` (`id`, `top_heading1`, `top_heading2`, `footer_text`, `meta_keyword`, `meta_description`, `favicon`, `logo`) VALUES
(1, 'WE ARE SHWAPNO DUAR', 'SOFTWARE DEVELOPMENT & BPO COMPANY', '© Copyright 2015. All Rights Reserved by SHWAPNO DUAR IT LTD.', 'SHWAPNO DUAR IT LTD', 'SHWAPNO DUAR SHWAPNO DUAR SHWAPNO DUARS', '', 'logo.png');

-- --------------------------------------------------------

--
-- Table structure for table `team_members`
--

CREATE TABLE `team_members` (
  `id` int(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `member_description` text NOT NULL,
  `personal_image` varchar(200) NOT NULL,
  `facebook_link` varchar(200) DEFAULT NULL,
  `twitter_link` varchar(200) DEFAULT NULL,
  `linkedin_link` varchar(200) DEFAULT NULL,
  `googleplus_link` varchar(200) DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `team_members`
--

INSERT INTO `team_members` (`id`, `first_name`, `last_name`, `designation`, `member_description`, `personal_image`, `facebook_link`, `twitter_link`, `linkedin_link`, `googleplus_link`, `is_active`) VALUES
(1, 'Rabiul', 'Islam', 'CEO', 'Rabiul Biplob is the Chief Executive Officer of SDIL. As CEO, he is responsible for\r\n                                        formulating the strategic vision, executing the business plan, and building the team for\r\n                                        SDIL Software. Rabiul is a successful entrepreneur, with extensive experience running\r\n                                        enterprise software companies.', '', 'http://www.facebook.com/rabis', 'http://www.twitter.com/rabi', 'http://www.linkedin.com/rabisssss', 'https://plus.google.com/rabi', 1),
(3, 'Md', 'Ibrahim', 'CTO', 'fsdfdsf fdasdfdsafa fdsafdsf', '', 'http://www.facebook.com/ar', 'http://www.twitter.com/ar', 'http://www.linkedin.com/ar', 'https://plus.google.com/ar', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `app_user`
--
ALTER TABLE `app_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `app_user_login_id_key` (`email`) USING BTREE,
  ADD KEY `cell_number` (`cell_number`) USING BTREE;

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sdil_jobs`
--
ALTER TABLE `sdil_jobs`
  ADD PRIMARY KEY (`job_id`);

--
-- Indexes for table `sdil_overview`
--
ALTER TABLE `sdil_overview`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sdil_page_manager`
--
ALTER TABLE `sdil_page_manager`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sdil_partners`
--
ALTER TABLE `sdil_partners`
  ADD PRIMARY KEY (`id`),
  ADD KEY `partner_name` (`partner_name`);

--
-- Indexes for table `sdil_projects`
--
ALTER TABLE `sdil_projects`
  ADD PRIMARY KEY (`project_id`),
  ADD KEY `project_category_id` (`project_category_id`);

--
-- Indexes for table `sdil_project_category`
--
ALTER TABLE `sdil_project_category`
  ADD PRIMARY KEY (`project_category_id`);

--
-- Indexes for table `sdil_testimonials`
--
ALTER TABLE `sdil_testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_list`
--
ALTER TABLE `service_list`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `service_name` (`service_name`);

--
-- Indexes for table `social_icon`
--
ALTER TABLE `social_icon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_configuration`
--
ALTER TABLE `system_configuration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team_members`
--
ALTER TABLE `team_members`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `app_user`
--
ALTER TABLE `app_user`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `sdil_jobs`
--
ALTER TABLE `sdil_jobs`
  MODIFY `job_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `sdil_overview`
--
ALTER TABLE `sdil_overview`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `sdil_page_manager`
--
ALTER TABLE `sdil_page_manager`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sdil_partners`
--
ALTER TABLE `sdil_partners`
  MODIFY `id` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `sdil_projects`
--
ALTER TABLE `sdil_projects`
  MODIFY `project_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `sdil_project_category`
--
ALTER TABLE `sdil_project_category`
  MODIFY `project_category_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `sdil_testimonials`
--
ALTER TABLE `sdil_testimonials`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `service_list`
--
ALTER TABLE `service_list`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `social_icon`
--
ALTER TABLE `social_icon`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `system_configuration`
--
ALTER TABLE `system_configuration`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `team_members`
--
ALTER TABLE `team_members`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `sdil_projects`
--
ALTER TABLE `sdil_projects`
  ADD CONSTRAINT `sdil_projects_ibfk_1` FOREIGN KEY (`project_category_id`) REFERENCES `sdil_project_category` (`project_category_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
