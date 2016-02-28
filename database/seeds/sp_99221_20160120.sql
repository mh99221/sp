-- phpMyAdmin SQL Dump
-- version 4.0.10.12
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Jan 20, 2016 at 10:03 AM
-- Server version: 5.1.73-14.12-log
-- PHP Version: 5.5.9-1ubuntu4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sp_99221`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_address`
--

CREATE TABLE IF NOT EXISTS `t_address` (
  `address_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `address_type_id` tinyint(3) unsigned NOT NULL,
  `address_status_id` tinyint(3) unsigned NOT NULL,
  `party_ID` smallint(5) unsigned NOT NULL,
  `line_1` varchar(100) NOT NULL,
  `line_2` varchar(100) DEFAULT NULL,
  `line_3` varchar(100) DEFAULT NULL,
  `city_id` smallint(5) unsigned DEFAULT NULL,
  `city` varchar(100) NOT NULL,
  `city_part_id` smallint(6) unsigned DEFAULT NULL,
  `city_part` varchar(100) DEFAULT NULL,
  `zip` varchar(13) NOT NULL,
  `district_id` smallint(5) unsigned DEFAULT NULL,
  `district` varchar(100) DEFAULT NULL,
  `region_id` smallint(5) unsigned DEFAULT NULL,
  `region` varchar(100) DEFAULT NULL,
  `country_id` smallint(5) unsigned DEFAULT NULL,
  `country` varchar(100) NOT NULL,
  `gps_latitude` decimal(13,10) DEFAULT NULL,
  `gps_longitude` decimal(13,10) DEFAULT NULL,
  `google_maps_link` varchar(256) DEFAULT NULL,
  `primary_Flag` char(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL,
  `created_by` smallint(6) NOT NULL,
  `updated_by` smallint(6) NOT NULL,
  `deleted_by` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`address_id`),
  KEY `fk_address_created_by` (`created_by`),
  KEY `fk_address_updated_by` (`updated_by`),
  KEY `fk_address_deleted_by` (`deleted_by`),
  KEY `fk_address_status` (`address_status_id`),
  KEY `fk_address_of_party` (`party_id`),
  KEY `fk_address_type` (`address_type_id`),
  KEY `fk_city` (`city_id`),
  KEY `fk_country` (`country_id`),
  KEY `fk_district` (`district_id`),
  KEY `fk_region` (`region_id`),
  KEY `fk_city_part` (`city_part_id`),
  KEY `ix_primary_flag` (`primary_flag`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- RELATIONS FOR TABLE `t_address`:
--   `created_by`
--       `t_user` -> `user_id`
--   `party_id`
--       `t_party` -> `party_id`
--   `address_status_id`
--       `t_lov` -> `lov_id`
--   `address_type_id`
--       `t_lov` -> `lov_id`
--   `updated_by`
--       `t_user` -> `user_id`
--   `city_id`
--       `t_location` -> `location_id`
--   `city_Part_id`
--       `t_location` -> `location_id`
--   `country_id`
--       `t_location` -> `location_id`
--   `district_id`
--       `t_location` -> `location_id`
--   `region_id`
--       `t_location` -> `location_id`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_category`
--

CREATE TABLE IF NOT EXISTS `t_category` (
  `category_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `parent_category_id` smallint(5) unsigned DEFAULT NULL,
  `category_type_id` tinyint(3) unsigned NOT NULL,
  `category_status_id` tinyint(3) unsigned NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `category_descr` varchar(500) DEFAULT NULL,
  `category_url` varchar(100) NOT NULL,
  `category_level` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL,
  `created_by` smallint(6) NOT NULL,
  `updated_by` smallint(6) NOT NULL,
  `deleted_by` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`category_id`),
  UNIQUE KEY `ak_category` (`parent_category_id`,`category_type_id`,`category_url`),
  KEY `fk_category_created_by` (`created_by`),
  KEY `fk_category_updated_by` (`updated_by`),
  KEY `fk_category_deleted_by` (`deleted_by`),
  KEY `fk_category_status` (`category_status_id`),
  KEY `fk_category_type` (`category_type_id`),  
  KEY `ix_category_url` (`category_url`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- RELATIONS FOR TABLE `t_category`:
--   `created_by`
--       `t_user` -> `user_id`
--   `category_status_id`
--       `t_lov` -> `lOV_id`
--   `category_type_id`
--       `t_lov` -> `lOV_id`
--   `updated_by`
--       `t_user` -> `user_id`
--   `parent_Category_id`
--       `t_category` -> `category_id`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_category_location_party_rel`
--

CREATE TABLE IF NOT EXISTS `t_category_location_party_rel` (
  `category_id` smallint(5) unsigned NOT NULL,
  `location_id` smallint(5) unsigned NOT NULL,
  `party_id` smallint(5) unsigned NOT NULL,
  `manufacturer_id` smallint(5) unsigned NOT NULL,
  `increment_no` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL,
  `created_by` smallint(6) NOT NULL,
  `updated_by` smallint(6) NOT NULL,
  `deleted_by` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`category_id`,`location_id`,`party_id`,`manufacturer_id`),
  KEY `fk_party_location_category_02` (`location_id`),
  KEY `fk_party_location_category_03` (`party_id`),
  KEY `fk_party_location_category_04` (`manufacturer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONS FOR TABLE `t_category_location_party_rel`:
--   `category_id`
--       `t_category` -> `category_id`
--   `location_id`
--       `t_location` -> `location_id`
--   `party_id`
--       `t_party` -> `party_id`
--   `manufacturer_id`
--       `t_manufacturer` -> `manufacturer_id`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_category_location_stats`
--

CREATE TABLE IF NOT EXISTS `t_category_location_stats` (
  `category_id` smallint(5) unsigned NOT NULL,
  `location_id` smallint(5) unsigned NOT NULL,
  `manufacturer_id` smallint(5) unsigned NOT NULL,
  `count_all` int(11) NOT NULL,
  `count_active_parties` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL,
  `created_by` smallint(6) NOT NULL,
  `updated_by` smallint(6) NOT NULL,
  `deleted_by` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`category_id`,`location_id`,`manufacturer_id`),
  KEY `fk_location_statistics` (`location_id`),
  KEY `fk_manufacturer_statistics` (`manufacturer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONS FOR TABLE `t_category_location_stats`:
--   `category_id`
--       `t_category` -> `category_id`
--   `location_id`
--       `t_location` -> `location_id`
--   `manufacturer_id`
--       `t_manufacturer` -> `manufacturer_id`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_comment`
--

CREATE TABLE IF NOT EXISTS `t_comment` (
  `comment_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `comment_status_id` tinyint(3) unsigned NOT NULL,
  `parent_comment_id` smallint(5) unsigned DEFAULT NULL,
  `party_id` smallint(5) unsigned NOT NULL,
  `review_id` smallint(5) unsigned DEFAULT NULL,
  `comment_title` varchar(100) NOT NULL,
  `comment_body` varchar(2000) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL,
  `created_by` smallint(6) NOT NULL,
  `updated_by` smallint(6) NOT NULL,
  `deleted_by` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`comment_id`),
  KEY `fk_comment_created_by` (`created_by`),
  KEY `fk_comment_updated_by` (`updated_by`),
  KEY `fk_comment_deleted_by` (`deleted_by`),
  KEY `fk_comment_status` (`comment_status_id`),
  KEY `fk_comment_on_review` (`review_id`),
  KEY `fk_parent_comment` (`parent_comment_id`),
  KEY `fk_party_commented` (`party_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- RELATIONS FOR TABLE `t_comment`:
--   `created_by`
--       `t_user` -> `user_id`
--   `review_id`
--       `t_review` -> `review_id`
--   `comment_status_id`
--       `t_lov` -> `lOV_id`
--   `updated_by`
--       `t_user` -> `user_id`
--   `parent_Comment_id`
--       `t_comment` -> `comment_id`
--   `party_id`
--       `t_party` -> `party_id`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_comment_like`
--

CREATE TABLE IF NOT EXISTS `t_comment_like` (
  `comment_like_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `comment_like_status_id` tinyint(3) unsigned NOT NULL,
  `user_id` smallint(6) NOT NULL,
  `comment_id` smallint(5) unsigned NOT NULL,
  `comment_like_type_id` tinyint(3) unsigned NOT NULL COMMENT 'Like            Dislike            Report Abuse',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL,
  `created_by` smallint(6) NOT NULL,
  `updated_by` smallint(6) NOT NULL,
  `deleted_by` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`comment_like_id`),  
  KEY `fk_comment_like_created_by` (`created_by`),
  KEY `fk_comment_like_updated_by` (`updated_by`),
  KEY `fk_comment_like_deleted_by` (`deleted_by`),
  KEY `fk_comment_like_status` (`comment_like_status_id`),
  KEY `fk_comment_like_type` (`comment_like_type_id`),
  KEY `fk_comment_liked_by_user` (`user_id`),
  KEY `fk_user_likes_comment` (`comment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- RELATIONS FOR TABLE `t_comment_like`:
--   `user_id`
--       `t_user` -> `user_id`
--   `created_by`
--       `t_user` -> `user_id`
--   `comment_like_status_id`
--       `t_lov` -> `lOV_id`
--   `comment_like_type_id`
--       `t_lov` -> `lOV_id`
--   `updated_by`
--       `t_user` -> `user_id`
--   `comment_id`
--       `t_comment` -> `comment_id`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_contact`
--

CREATE TABLE IF NOT EXISTS `t_contact` (
  `contact_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `contact_type_id` tinyint(3) unsigned NOT NULL,
  `contact_status_id` tinyint(3) unsigned NOT NULL,
  `department_code_combi` smallint(6) NOT NULL DEFAULT '1',
  `party_id` smallint(5) unsigned NOT NULL,
  `contact_value` varchar(256) DEFAULT NULL,
  `primary_flag` char(1) NOT NULL,
  `note` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL,
  `created_by` smallint(6) NOT NULL,
  `updated_by` smallint(6) NOT NULL,
  `deleted_by` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`contact_id`),
  KEY `fk_contact_created_by` (`created_by`),
  KEY `fk_contact_updated_by` (`updated_by`),
  KEY `fk_contact_deleted_by` (`deleted_by`),
  KEY `fk_contact_type` (`contact_status_id`),
  KEY `fk_contact_of_party` (`party_id`),
  KEY `fk_contact_status` (`contact_type_id`),
  KEY `ix_primary_flag` (`primary_flag`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- RELATIONS FOR TABLE `t_contact`:
--   `created_by`
--       `t_user` -> `user_id`
--   `party_id`
--       `t_party` -> `party_id`
--   `contact_type_id`
--       `t_lov` -> `lOV_id`
--   `contact_status_id`
--       `t_lov` -> `lOV_id`
--   `updated_by`
--       `t_user` -> `user_id`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_email`
--

CREATE TABLE IF NOT EXISTS `t_email` (
  `email_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `email_status_id` tinyint(3) unsigned NOT NULL,
  `sender_party_id` smallint(5) unsigned NOT NULL,
  `receiver_party_id` smallint(5) unsigned NOT NULL,
  `service_response_id` smallint(5) unsigned DEFAULT NULL,
  `service_request_id` smallint(5) unsigned DEFAULT NULL,
  `email_subject` varchar(500) NOT NULL,
  `email_body` text CHARACTER SET latin1 NOT NULL,
  `sender_email` varchar(100) NOT NULL,
  `receiver_email` varchar(100) NOT NULL,
  `read_date` datetime DEFAULT NULL,
  `email_type_id` tinyint(3) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL,
  `created_by` smallint(6) NOT NULL,
  `updated_by` smallint(6) NOT NULL,
  `deleted_by` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`email_id`),
  KEY `fk_email_created_by` (`created_by`),
  KEY `fk_email_received_from_party` (`sender_party_id`),
  KEY `fk_email_send_to_party` (`receiver_party_id`),
  KEY `fk_email_status` (`email_status_id`),
  KEY `fk_email_type` (`email_type_id`),
  KEY `fk_email_updated_by` (`updated_by`),
  KEY `fk_service_request_email` (`service_request_id`),
  KEY `fk_service_response_email` (`service_response_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- RELATIONS FOR TABLE `t_email`:
--   `created_by`
--       `t_user` -> `user_id`
--   `sender_party_id`
--       `t_party` -> `party_id`
--   `receiver_party_id`
--       `t_party` -> `party_id`
--   `email_status_id`
--       `t_lov` -> `lOV_id`
--   `email_type_id`
--       `t_lov` -> `lOV_id`
--   `updated_by`
--       `t_user` -> `user_id`
--   `service_request_id`
--       `t_service_request` -> `service_request_id`
--   `service_response_id`
--       `t_service_response` -> `service_response_id`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_file`
--

CREATE TABLE IF NOT EXISTS `t_file` (
  `file_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `file_status_id` tinyint(3) unsigned NOT NULL,
  `file_type_id` tinyint(3) unsigned NOT NULL,
  `party_id` smallint(5) unsigned NOT NULL,
  `file_descr` varchar(500) DEFAULT NULL,
  `filename` varchar(100) NOT NULL,
  `original_filename` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL,
  `created_by` smallint(6) NOT NULL,
  `updated_by` smallint(6) NOT NULL,
  `deleted_by` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`file_id`),
  KEY `fk_file_created_by` (`created_by`),
  KEY `fk_file_updated_by` (`updated_by`),
  KEY `fk_file_deleted_by` (`deleted_by`),
  KEY `fk_file_status` (`file_status_id`),
  KEY `fk_file_of_party` (`party_id`),
  KEY `fk_file_type` (`file_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=68 ;

--
-- RELATIONS FOR TABLE `t_file`:
--   `party_id`
--       `t_party` -> `party_id`
--   `file_type_id`
--       `t_lov` -> `lov_id`
--   `created_by`
--       `t_user` -> `user_id`
--   `file_status_id`
--       `t_lov` -> `lov_id`
--   `updated_by`
--       `t_user` -> `user_id`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_file_label_rel`
--

CREATE TABLE IF NOT EXISTS `t_file_label_rel` (
  `file_label_rel_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `file_label_rel_status_id` tinyint(3) unsigned NOT NULL,
  `label_id` smallint(5) unsigned NOT NULL,
  `file_id` smallint(5) unsigned NOT NULL,
  `order_pos` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL,
  `created_by` smallint(6) NOT NULL,
  `updated_by` smallint(6) NOT NULL,
  `deleted_by` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`file_label_rel_id`),
  KEY `fk_file_label_rel_created_by` (`created_by`),
  KEY `fk_file_label_rel_updated_by` (`updated_by`),
  KEY `fk_file_label_rel_deleted_by` (`deleted_by`),
  KEY `fk_file_label_rel_status` (`file_label_rel_status_id`),
  KEY `fk_file_has_label` (`label_id`),
  KEY `fk_label_consists_of_image` (`file_id`)  
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- RELATIONS FOR TABLE `t_file_label_rel`:
--   `label_id`
--       `t_label` -> `label_id`
--   `created_by`
--       `t_user` -> `user_id`
--   `updated_by`
--       `t_user` -> `user_id`
--   `file_id`
--       `t_file` -> `file_id`
--   `file_label_rel_status_id`
--       `t_lov` -> `lov_id`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_form`
--

CREATE TABLE IF NOT EXISTS `t_form` (
  `form_name` varchar(100) NOT NULL,
  `model_name` varchar(100) NOT NULL,
  `base_table_column_id` varchar(100) DEFAULT NULL,
  `base_table_column_status_id` varchar(100) DEFAULT NULL,
  `form_buttons` varchar(13) DEFAULT NULL,
  `form_code` text,
  PRIMARY KEY (`form_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `t_form_element`
--

CREATE TABLE IF NOT EXISTS `t_form_element` (
  `form_name` varchar(100) NOT NULL,
  `element_name` varchar(100) NOT NULL,
  `element_admin` tinyint(1) DEFAULT NULL,
  `element_type` varchar(100) DEFAULT NULL,
  `element_order` int(11) DEFAULT NULL,
  `element_active` tinyint(1) DEFAULT NULL,
  `element_row` varchar(100) DEFAULT NULL,
  `element_class` varchar(100) DEFAULT NULL,
  `element_required` tinyint(1) DEFAULT NULL,
  `element_remove_label` tinyint(1) DEFAULT NULL,
  `element_disabled` tinyint(1) DEFAULT NULL,
  `element_ignore_validator` tinyint(1) DEFAULT NULL,
  `element_empty_label` tinyint(1) DEFAULT NULL,
  `element_custom_class` varchar(100) DEFAULT NULL,
  `element_param_1` varchar(100) DEFAULT NULL,
  `element_param_2` varchar(100) DEFAULT NULL,
  `element_param_3` varchar(100) DEFAULT NULL,
  `element_param_4` varchar(100) DEFAULT NULL,
  `element_param_5` varchar(100) DEFAULT NULL,
  `element_param_6` varchar(100) DEFAULT NULL,
  `element_param_7` varchar(100) DEFAULT NULL,
  `element_param_8` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`form_name`,`element_name`),
  UNIQUE KEY `ak_form_element` (`form_name`,`element_order`),
  KEY `ix_form` (`form_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `t_hour`
--

CREATE TABLE IF NOT EXISTS `t_hour` (
  `hour_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `hour_status_id` tinyint(3) unsigned NOT NULL,
  `department_code_combi` smallint(6) NOT NULL DEFAULT '1',
  `party_id` smallint(5) unsigned NOT NULL,
  `mon` varchar(100) NOT NULL,
  `tue` varchar(100) NOT NULL,
  `wed` varchar(100) NOT NULL,
  `thu` varchar(100) NOT NULL,
  `fri` varchar(100) NOT NULL,
  `sat` varchar(100) DEFAULT NULL,
  `sun` varchar(100) DEFAULT NULL,
  `hld` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL,
  `created_by` smallint(6) NOT NULL,
  `updated_by` smallint(6) NOT NULL,
  `deleted_by` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`hour_id`),
  KEY `fk_hour_created_by` (`created_by`),
  KEY `fk_hour_updated_by` (`updated_by`),
  KEY `fk_hour_deleted_by` (`deleted_by`),
  KEY `fk_hour_status` (`hour_status_id`),
  KEY `fk_working_hours` (`party_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2097 ;

--
-- RELATIONS FOR TABLE `t_hour`:
--   `created_by`
--       `t_user` -> `user_id`
--   `hour_status_id`
--       `t_lov` -> `lov_id`
--   `updated_by`
--       `t_user` -> `user_id`
--   `party_id`
--       `t_party` -> `party_id`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_label`
--

CREATE TABLE IF NOT EXISTS `t_label` (
  `label_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `label_status_id` tinyint(3) unsigned NOT NULL,
  `party_id` smallint(5) unsigned NOT NULL,
  `label_name` varchar(100) NOT NULL,
  `label_descr` varchar(500) DEFAULT NULL,
  `gallery_flag` char(1) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL,
  `created_by` smallint(6) NOT NULL,
  `updated_by` smallint(6) NOT NULL,
  `deleted_by` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`label_id`),
  KEY `fk_label_created_by` (`created_by`),
  KEY `fk_label_updated_by` (`updated_by`),
  KEY `fk_label_deleted_by` (`deleted_by`),
  KEY `fk_label_belongs_to_party` (`party_id`),
  KEY `fk_label_status` (`label_status_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- RELATIONS FOR TABLE `t_label`:
--   `party_id`
--       `t_party` -> `party_id`
--   `label_status_id`
--       `t_lov` -> `lov_id`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_location`
--

CREATE TABLE IF NOT EXISTS `t_location` (
  `location_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `parent_location_id` smallint(5) unsigned DEFAULT NULL,
  `location_status_id` tinyint(3) unsigned NOT NULL,
  `location_type_id` tinyint(3) unsigned NOT NULL,
  `location` varchar(100) NOT NULL,
  `location_sk` varchar(100) DEFAULT NULL,
  `location_cz` varchar(100) DEFAULT NULL,
  `location_url` varchar(100) DEFAULT NULL,
  `zip` varchar(13) DEFAULT NULL,
  `gps_latitude` decimal(13,10) DEFAULT NULL,
  `gps_longitude` decimal(13,10) DEFAULT NULL,
  `google_maps_link` varchar(256) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL,
  `created_by` smallint(6) NOT NULL,
  `updated_by` smallint(6) NOT NULL,
  `deleted_by` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`location_id`),
  KEY `fk_location_created_by` (`created_by`),
  KEY `fk_location_updated_by` (`updated_by`),
  KEY `fk_location_deleted_by` (`deleted_by`),
  KEY `fk_location_status` (`location_status_id`),
  KEY `fk_location_type` (`location_type_id`),
  KEY `fk_parent_location` (`parent_location_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- RELATIONS FOR TABLE `t_location`:
--   `created_by`
--       `t_user` -> `user_id`
--   `location_status_id`
--       `t_lov` -> `lov_id`
--   `location_type_id`
--       `t_lov` -> `lov_id`
--   `updated_by`
--       `t_user` -> `user_id`
--   `parent_location_id`
--       `t_location` -> `location_id`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_lov`
--

CREATE TABLE IF NOT EXISTS `t_lov` (
  `lov_id` tinyint(3) unsigned NOT NULL,
  `lov_type` varchar(30) NOT NULL,
  `lov_name` varchar(100) NOT NULL,
  `lov_name_sk` varchar(100) DEFAULT NULL,
  `lov_name_cz` varchar(100) DEFAULT NULL,
  `lov_descr` varchar(500) DEFAULT NULL,
  `order_pos` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL,
  `created_by` smallint(6) NOT NULL,
  `updated_by` smallint(6) NOT NULL,
  `deleted_by` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`lov_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `t_manufacturer`
--

CREATE TABLE IF NOT EXISTS `t_manufacturer` (
  `manufacturer_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `manufacturer_name` varchar(30) NOT NULL,
  `manufacturer_status_id` tinyint(3) unsigned NOT NULL,
  `manufacturer_url` varchar(256) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL,
  `created_by` smallint(6) NOT NULL,
  `updated_by` smallint(6) NOT NULL,
  `deleted_by` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`manufacturer_id`),
  UNIQUE KEY `ak_manufacturer` (`manufacturer_name`),
  KEY `fk_manufacturer_created_by` (`created_by`),
  KEY `fk_manufacturer_updated_by` (`updated_by`),
  KEY `fk_manufacturer_deleted_by` (`deleted_by`),
  KEY `fk_manufacturer_status` (`manufacturer_status_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- RELATIONS FOR TABLE `t_manufacturer`:
--   `created_by`
--       `t_user` -> `user_id`
--   `manufacturer_status_id`
--       `t_lov` -> `lov_id`
--   `updated_by`
--       `t_user` -> `user_id`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_manufacturer_party_rel`
--

CREATE TABLE IF NOT EXISTS `t_manufacturer_party_rel` (
  `manufacturer_party_rel_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `manufacturer_party_rel_status_id` tinyint(3) unsigned DEFAULT NULL,
  `manufacturer_party_rel_type_id` tinyint(3) unsigned NOT NULL,
  `manufacturer_id` smallint(5) unsigned NOT NULL,
  `party_id` smallint(5) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL,
  `created_by` smallint(6) NOT NULL,
  `updated_by` smallint(6) NOT NULL,
  `deleted_by` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`manufacturer_party_rel_id`),
  UNIQUE KEY `ak_manufacturer_party_rel` (`party_id`,`manufacturer_id`,`manufacturer_party_rel_type_id`),
  KEY `fk_manufacturer_party_rel_created_by` (`created_by`),
  KEY `fk_manufacturer_party_rel_updated_by` (`updated_by`),
  KEY `fk_manufacturer_party_rel_deleted_by` (`deleted_by`),
  KEY `fk_manufacturer_party_status` (`manufacturer_party_rel_status_id`),
  KEY `fk_manufacturer_is_represented_by_party` (`party_id`),
  KEY `fk_manufacturer_party_rel_type` (`manufacturer_party_rel_type_id`),
  KEY `fk_party_represents_brand` (`manufacturer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Authorized Service Center Authorized Dealer None' AUTO_INCREMENT=1 ;

--
-- RELATIONS FOR TABLE `t_manufacturer_party_rel`:
--   `party_id`
--       `t_party` -> `party_id`
--   `created_by`
--       `t_user` -> `user_id`
--   `manufacturer_party_rel_type_id`
--       `t_lov` -> `lov_id`
--   `updated_by`
--       `t_user` -> `user_id`
--   `manufacturer_party_rel_status_id`
--       `t_lov` -> `lov_id`
--   `manufacturer_id`
--       `t_manufacturer` -> `manufacturer_id`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_message`
--

CREATE TABLE IF NOT EXISTS `t_message` (
  `message_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `message_status_id` tinyint(3) unsigned NOT NULL,
  `message_type_id` tinyint(3) unsigned NOT NULL,
  `resource_type_id` tinyint(3) unsigned DEFAULT NULL,
  `resource_id` smallint(6) DEFAULT NULL,
  `message_title` varchar(100) NOT NULL,
  `message_body` varchar(500) NOT NULL,
  `read_date` datetime DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL,
  `created_by` smallint(6) NOT NULL,
  `updated_by` smallint(6) NOT NULL,
  `deleted_by` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`message_id`),
  KEY `fk_message_created_by` (`created_by`),
  KEY `fk_message_updated_by` (`updated_by`),
  KEY `fk_message_deleted_by` (`deleted_by`),
  KEY `fk_message_status` (`message_status_id`),
  KEY `fk_message_has_type` (`message_type_id`),
  KEY `fk_message_resource_type` (`resource_type_id`),  
  KEY `ix_message_resource` (`resource_type_id`,`resource_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=69 ;

--
-- RELATIONS FOR TABLE `t_message`:
--   `created_by`
--       `t_user` -> `user_id`
--   `message_type_id`
--       `t_lov` -> `lov_id`
--   `resource_type_id`
--       `t_lov` -> `lov_id`
--   `message_status_id`
--       `t_lov` -> `lov_id`
--   `updated_by`
--       `t_user` -> `user_id`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_article`
--

CREATE TABLE IF NOT EXISTS `t_article` (
  `article_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `article_status_id` tinyint(3) unsigned NOT NULL,
  `article_title` varchar(100) NOT NULL,
  `article_intro` varchar(500) DEFAULT NULL,
  `article_body` text NOT NULL,
  `cover_image` varchar(256) DEFAULT NULL,
  `source_name` varchar(100) DEFAULT NULL,
  `source_link` varchar(256) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL,
  `created_by` smallint(6) NOT NULL,
  `updated_by` smallint(6) NOT NULL,
  `deleted_by` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`article_id`),
  KEY `fk_article_created_by` (`created_by`),
  KEY `fk_article_updated_by` (`updated_by`),
  KEY `fk_article_deleted_by` (`deleted_by`),
  KEY `fk_article_status` (`article_status_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- RELATIONS FOR TABLE `t_article`:
--   `created_by`
--       `t_user` -> `user_id`
--   `article_status_id`
--       `t_lov` -> `lov_id`
--   `updated_by`
--       `t_user` -> `user_id`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_page_request`
--

CREATE TABLE IF NOT EXISTS `t_page_request` (
  `page_request_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `session_id` int(10) unsigned NOT NULL,
  `url` varchar(256) DEFAULT NULL,
  `requested` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `page_request_status_id` tinyint(3) unsigned NOT NULL,
  `user_id` smallint(6) NOT NULL,
  PRIMARY KEY (`page_request_id`),
  KEY `fk_page_request_status` (`page_request_status_id`),
  KEY `fk_request_session` (`session_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=33233 ;

--
-- RELATIONS FOR TABLE `t_page_request`:
--   `page_request_status_id`
--       `t_lov` -> `lov_id`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_party`
--

CREATE TABLE IF NOT EXISTS `t_party` (
  `party_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `master_record_id` int(11) DEFAULT NULL,
  `party_status_id` tinyint(3) unsigned NOT NULL,
  `party_url` varchar(256) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `salutation_id` tinyint(3) unsigned NOT NULL,
  `title_prefix` varchar(30) DEFAULT NULL,
  `first_name` varchar(30) DEFAULT NULL,
  `last_name` varchar(30) DEFAULT NULL,
  `title_suffix` varchar(30) DEFAULT NULL,
  `birth_date` datetime DEFAULT NULL,
  `individual_flag` char(1) NOT NULL,
  `party_profile` varchar(2000) DEFAULT NULL,
  `logo` varchar(256) DEFAULT NULL,
  `link` varchar(256) DEFAULT NULL,
  `party_descr` varchar(500) DEFAULT NULL,
  `ico` varchar(30) DEFAULT NULL,
  `dic` varchar(30) DEFAULT NULL,
  `ic_dph` varchar(30) DEFAULT NULL,
  `registration_date` datetime NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL,
  `created_by` smallint(6) NOT NULL,
  `updated_by` smallint(6) NOT NULL,
  `deleted_by` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`party_id`),
  KEY `fk_party_created_by` (`created_by`),
  KEY `fk_party_updated_by` (`updated_by`),
  KEY `fk_party_deleted_by` (`deleted_by`),
  KEY `fk_party_salutation` (`salutation_id`),
  KEY `fk_party_status` (`party_status_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- RELATIONS FOR TABLE `t_party`:
--   `created_by`
--       `t_user` -> `user_id`
--   `salutation_id`
--       `t_lov` -> `lov_id`
--   `party_status_id`
--       `t_lov` -> `lov_id`
--   `updated_by`
--       `t_user` -> `user_id`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_party_category_rel`
--

CREATE TABLE IF NOT EXISTS `t_party_category_rel` (
  `party_category_rel_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `party_category_rel_status_id` tinyint(3) unsigned NOT NULL DEFAULT '2',
  `party_id` smallint(5) unsigned NOT NULL,
  `category_id` smallint(5) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL,
  `created_by` smallint(6) NOT NULL,
  `updated_by` smallint(6) NOT NULL,
  `deleted_by` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`party_Category_rel_id`),
  UNIQUE KEY `ak_party_Category_rel` (`party_id`,`category_id`),
  KEY `fk_party_category_rel_created_by` (`created_by`),
  KEY `fk_party_category_rel_updated_by` (`updated_by`),
  KEY `fk_party_category_rel_deleted_by` (`deleted_by`),
  KEY `fk_party_category_rel_status` (`party_Category_rel_status_id`),
  KEY `fk_category_includes_party` (`category_id`)
  
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- RELATIONS FOR TABLE `t_party_category_rel`:
--   `category_id`
--       `t_category` -> `category_id`
--   `party_id`
--       `t_party` -> `party_id`
--   `created_by`
--       `t_user` -> `user_id`
--   `party_category_rel_status_id`
--       `t_lov` -> `lov_id`
--   `updated_by`
--       `t_user` -> `user_id`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_party_overall_review`
--

CREATE TABLE IF NOT EXISTS `t_party_overall_review` (
  `party_overall_review_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `party_id` smallint(5) unsigned NOT NULL,
  `review_value` decimal(10,2) NOT NULL,
  `review_count` smallint(5) unsigned DEFAULT NULL,
  `comment_count` smallint(4) unsigned DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`party_overall_review_id`),
  UNIQUE KEY `ak_party_overall_review` (`party_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- RELATIONS FOR TABLE `t_party_overall_review`:
--   `party_id`
--       `t_party` -> `party_id`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_party_rel`
--

CREATE TABLE IF NOT EXISTS `t_party_rel` (
  `party_rel_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `party_rel_status_id` tinyint(3) unsigned DEFAULT NULL,
  `party_id` smallint(5) unsigned NOT NULL,
  `related_party_id` smallint(5) unsigned NOT NULL,
  `party_rel_type_id` tinyint(3) unsigned NOT NULL,
  `related_party_function` varchar(100) DEFAULT NULL,
  `department_code_combi` smallint(6) NOT NULL DEFAULT '1',
  `brands` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL,
  `created_by` smallint(6) NOT NULL,
  `updated_by` smallint(6) NOT NULL,
  `deleted_by` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`party_rel_id`),
  UNIQUE KEY `ak_party_rel` (`party_id`,`related_party_id`,`party_rel_type_id`,`related_party_function`),
  KEY `fk_party_rel_created_by` (`created_by`),
  KEY `fk_party_rel_updated_by` (`updated_by`),
  KEY `fk_party_rel_deleted_by` (`deleted_by`),
  KEY `fk_party_rel_status` (`party_rel_status_id`),
  KEY `fk_party_rel_type` (`party_rel_type_id`),
  KEY `fk_related_party_2` (`related_party_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- RELATIONS FOR TABLE `t_party_rel`:
--   `created_by`
--       `t_user` -> `user_id`
--   `party_rel_status_id`
--       `t_lov` -> `lov_id`
--   `party_rel_type_id`
--       `t_lov` -> `lov_id`
--   `party_id`
--       `t_party` -> `party_id`
--   `related_party_id`
--       `t_party` -> `party_id`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_party_tag_rel`
--

CREATE TABLE IF NOT EXISTS `t_party_tag_rel` (
  `party_tag_rel_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `party_tag_rel_status_id` tinyint(3) unsigned NOT NULL,
  `party_id` smallint(5) unsigned NOT NULL,
  `tag_id` smallint(5) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL,
  `created_by` smallint(6) NOT NULL,
  `updated_by` smallint(6) NOT NULL,
  `deleted_by` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`party_tag_rel_id`),
  UNIQUE KEY `ak_party_tag_rel` (`party_id`,`Tag_id`),
  KEY `fk_party_tag_rel_created_by` (`created_by`),
  KEY `fk_party_tag_rel_updated_by` (`updated_by`),
  KEY `fk_party_tag_rel_deleted_by` (`deleted_by`),
  KEY `fk_party_tag_rel_status` (`party_tag_rel_status_id`),
  KEY `fk_tagged_party` (`tag_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- RELATIONS FOR TABLE `t_party_tag_rel`:
--   `party_id`
--       `t_party` -> `party_id`
--   `created_by`
--       `t_user` -> `user_id`
--   `party_tag_rel_status_id`
--       `t_lov` -> `lov_id`
--   `updated_by`
--       `t_user` -> `user_id`
--   `tag_id`
--       `t_tag` -> `tag_id`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_permission`
--

CREATE TABLE IF NOT EXISTS `t_permission` (
  `permission_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` smallint(6) NOT NULL,
  `resource_type_id` tinyint(3) unsigned NOT NULL,
  `resource_id` smallint(5) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL,
  `created_by` smallint(6) NOT NULL,
  `updated_by` smallint(6) NOT NULL,
  `deleted_by` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`permission_id`),
  UNIQUE KEY `ak_permission` (`user_id`,`resource_type_id`,`resource_id`),
  KEY `fk_permission_created_by` (`created_by`),
  KEY `fk_permission_updated_by` (`updated_by`),
  KEY `fk_permission_deleted_by` (`deleted_by`),
  KEY `fk_permission_resource_type` (`resource_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- RELATIONS FOR TABLE `t_permission`:
--   `granted_by`
--       `t_user` -> `user_id`
--   `resource_type_id`
--       `t_lov` -> `lov_id`
--   `user_id`
--       `t_user` -> `user_id`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_price_item`
--

CREATE TABLE IF NOT EXISTS `t_price_item` (
  `price_item_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `price_item_status_id` tinyint(3) unsigned NOT NULL,
  `price_item_type_id` smallint(5) unsigned DEFAULT NULL,
  `party_id` smallint(5) unsigned NOT NULL,
  `item_name` varchar(500) DEFAULT NULL,
  `price_category_1` decimal(10,2) DEFAULT NULL COMMENT 'Economy/Compact: VW Polo, Š.Fabia, P-206, P-207, Citroen C3....',
  `price_category_2` decimal(10,2) DEFAULT NULL COMMENT 'Mid: Š.Octavia, VW Golf, Opel Astra, P-307, P-308, malé úžitkové vozidlá....\r\n            ',
  `price_category_3` decimal(10,2) DEFAULT NULL COMMENT 'Luxury Entry: Š.Superb, VW Passat, Audi A4, Toyota Avensis, BMW 3, malé SUV, stredné úžitkové vozidlá....\r\n            ',
  `price_category_4` decimal(10,2) DEFAULT NULL COMMENT 'Luxury: Audi A6, A8, BMW 5,7, Mercedes E,S, Lexus, veľké SUV....',
  `measure_id` tinyint(3) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL,
  `created_by` smallint(6) NOT NULL,
  `updated_by` smallint(6) NOT NULL,
  `deleted_by` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`price_item_id`),
  KEY `fk_price_list_created_by` (`created_by`),
  KEY `fk_price_list_updated_by` (`updated_by`),
  KEY `fk_price_list_deleted_by` (`deleted_by`),
  KEY `fk_price_item_status` (`price_item_status_id`),
  KEY `fk_measure_type` (`measure_id`),
  KEY `fk_party_price_list` (`party_id`),
  KEY `fk_price_item_type` (`price_Item_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- RELATIONS FOR TABLE `t_price_item`:
--   `measure_id`
--       `t_lov` -> `lov_id`
--   `party_id`
--       `t_party` -> `party_id`
--   `price_item_status_id`
--       `t_lov` -> `lov_id`
--   `price_item_type_id`
--       `t_category` -> `category_id`
--   `created_by`
--       `t_user` -> `user_id`
--   `updated_by`
--       `t_user` -> `user_id`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_problem_category`
--

CREATE TABLE IF NOT EXISTS `t_problem_category` (
  `problem_category_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `category_name_en` varchar(100) NOT NULL,
  `category_name_sk` varchar(100) NOT NULL,
  `category_descr` varchar(500) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL,
  `created_by` smallint(6) NOT NULL,
  `updated_by` smallint(6) NOT NULL,
  `deleted_by` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`problem_Category_id`),
  KEY `fk_problem_category_created_by` (`created_by`),
  KEY `fk_problem_category_updated_by` (`updated_by`),
  KEY `fk_problem_category_deleted_by` (`deleted_by`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

-- --------------------------------------------------------

--
-- Table structure for table `t_problem_solution`
--

CREATE TABLE IF NOT EXISTS `t_problem_solution` (
  `problem_solution_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `problem_category_id` smallint(5) unsigned DEFAULT NULL,
  `problem_symptom_id` smallint(5) unsigned DEFAULT NULL,
  `problem_when_id` smallint(5) unsigned DEFAULT NULL,
  `problem_where_id` smallint(5) unsigned DEFAULT NULL,
  `priority` int(11) DEFAULT NULL,
  `what_to_do_en` varchar(100) NOT NULL,
  `part_type_en` varchar(500) NOT NULL,
  `cause_descr_en` varchar(500) DEFAULT NULL,
  `what_to_do_sk` varchar(100) NOT NULL,
  `part_type_sk` varchar(100) NOT NULL,
  `cause_descr_sk` varchar(500) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL,
  `created_by` smallint(6) NOT NULL,
  `updated_by` smallint(6) NOT NULL,
  `deleted_by` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`problem_solution_id`),
  KEY `fk_problem_solution_created_by` (`created_by`),
  KEY `fk_problem_solution_updated_by` (`updated_by`),
  KEY `fk_problem_solution_deleted_by` (`deleted_by`),
  KEY `fk_problem_symptom` (`problem_symptom_id`),
  KEY `fk_problem_category` (`problem_Category_id`),
  KEY `fk_when_problem_occured` (`problem_When_id`),
  KEY `fk_where_is_problem` (`problem_Where_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- RELATIONS FOR TABLE `t_problem_solution`:
--   `problem_category_id`
--       `t_problem_category` -> `problem_category_id`
--   `problem_when_id`
--       `t_problem_when` -> `problem_when_id`
--   `problem_where_id`
--       `t_problem_where` -> `problem_where_id`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_problem_symptom`
--

CREATE TABLE IF NOT EXISTS `t_problem_symptom` (
  `problem_symptom_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `problem_category_id` smallint(5) unsigned NOT NULL DEFAULT '0',
  `symptom_name_en` varchar(100) NOT NULL,
  `symptom_name_sk` varchar(100) NOT NULL,
  `symptom_descr` varchar(500) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL,
  `created_by` smallint(6) NOT NULL,
  `updated_by` smallint(6) NOT NULL,
  `deleted_by` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`problem_symptom_id`),
  KEY `fk_problem_symptom_created_by` (`created_by`),
  KEY `fk_problem_symptom_updated_by` (`updated_by`),
  KEY `fk_problem_symptom_deleted_by` (`deleted_by`),
  KEY `fk_symptom_belongs_to_category` (`problem_category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- RELATIONS FOR TABLE `t_problem_symptom`:
--   `problem_category_id`
--       `t_problem_category` -> `problem_category_id`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_problem_when`
--

CREATE TABLE IF NOT EXISTS `t_problem_when` (
  `problem_when_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `when_name_en` varchar(100) NOT NULL,
  `when_name_sk` varchar(100) NOT NULL,
  `when_descr` varchar(500) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL,
  `created_by` smallint(6) NOT NULL,
  `updated_by` smallint(6) NOT NULL,
  `deleted_by` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`problem_when_id`),
  KEY `fk_problem_when_created_by` (`created_by`),
  KEY `fk_problem_when_updated_by` (`updated_by`),
  KEY `fk_problem_when_deleted_by` (`deleted_by`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `t_problem_where`
--

CREATE TABLE IF NOT EXISTS `t_problem_where` (
  `problem_where_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `where_name_en` varchar(100) NOT NULL,
  `where_name_sk` varchar(100) NOT NULL,
  `where_descr` varchar(500) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL,
  `created_by` smallint(6) NOT NULL,
  `updated_by` smallint(6) NOT NULL,
  `deleted_by` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`problem_where_id`),
  KEY `fk_problem_where_created_by` (`created_by`),
  KEY `fk_problem_where_updated_by` (`updated_by`),
  KEY `fk_problem_where_deleted_by` (`deleted_by`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `t_review`
--

CREATE TABLE IF NOT EXISTS `t_review` (
  `review_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `review_status_id` tinyint(3) unsigned NOT NULL,
  `party_id` smallint(5) unsigned NOT NULL,
  `review_value1` int(11) NOT NULL,
  `review_value2` int(11) NOT NULL,
  `review_value3` int(11) NOT NULL,
  `review_value4` int(11) NOT NULL,
  `overal_review_value` decimal(10,2) DEFAULT NULL,
  `manufacturer_id` smallint(5) unsigned DEFAULT NULL,
  `vehicle_model_id` smallint(5) unsigned DEFAULT NULL,
  `vehicle_id` smallint(5) unsigned DEFAULT NULL,
  `review_title` varchar(100) NOT NULL,
  `review_body` varchar(2000) NOT NULL,
  `recommended_flag` char(1) DEFAULT NULL,
  `visit_date` date DEFAULT NULL,
  `visited_id` tinyint(3) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL,
  `created_by` smallint(6) NOT NULL,
  `updated_by` smallint(6) NOT NULL,
  `deleted_by` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`review_id`),
  KEY `fk_review_created_by` (`created_by`),
  KEY `fk_review_updated_by` (`updated_by`),
  KEY `fk_review_deleted_by` (`deleted_by`),
  KEY `fk_review_status` (`review_status_id`),
  KEY `fk_review_of_party` (`party_id`),
  KEY `fk_model_serviced` (`vehicle_model_id`),
  KEY `fk_vehicle_manufactured` (`manufacturer_id`),
  KEY `fk_vehicle_serviced` (`vehicle_id`),
  KEY `fk_review_visited_on` (`visited_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- RELATIONS FOR TABLE `t_review`:
--   `vehicle_model_id`
--       `t_vehicle_model` -> `vehicle_model_id`
--   `created_by`
--       `t_user` -> `user_id`
--   `party_id`
--       `t_party` -> `party_id`
--   `review_status_id`
--       `t_lov` -> `lov_id`
--   `updated_by`
--       `t_user` -> `user_id`
--   `visited_id`
--       `t_lov` -> `lov_id`
--   `manufacturer_id`
--       `t_manufacturer` -> `manufacturer_id`
--   `vehicle_id`
--       `t_vehicle` -> `vehicle_id`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_search`
--

CREATE TABLE IF NOT EXISTS `t_search` (
  `search_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `search_status_id` tinyint(3) unsigned NOT NULL,
  `search_string` varchar(100) DEFAULT NULL,
  `result_count` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` smallint(6) NOT NULL,
  PRIMARY KEY (`search_id`),
  KEY `fk_search_status` (`search_status_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- RELATIONS FOR TABLE `t_search`:
--   `search_status_id`
--       `t_lov` -> `lov_id`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_service_history`
--

CREATE TABLE IF NOT EXISTS `t_service_history` (
  `service_history_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `service_history_status_id` tinyint(3) unsigned NOT NULL,
  `vehicle_id` smallint(5) unsigned NOT NULL,
  `service_party_id` smallint(5) unsigned DEFAULT NULL,
  `total_price` decimal(10,2) DEFAULT NULL,
  `parts_price` decimal(10,2) DEFAULT NULL,
  `work_price` decimal(10,2) DEFAULT NULL,
  `mileage` int(11) DEFAULT NULL,
  `service_descr` varchar(500) DEFAULT NULL,
  `service_date` datetime DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL,
  `created_by` smallint(6) NOT NULL,
  `updated_by` smallint(6) NOT NULL,
  `deleted_by` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`service_history_id`),
  KEY `fk_service_history_created_by` (`created_by`),
  KEY `fk_service_history_updated_by` (`updated_by`),
  KEY `fk_service_history_deleted_by` (`deleted_by`),
  KEY `fk_service_history_status` (`service_history_status_id`),
  KEY `fk_service_history_belongs_to_party` (`service_party_id`),
  KEY `fk_vehicle_service_history` (`vehicle_id`)  
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- RELATIONS FOR TABLE `t_service_history`:
--   `service_party_id`
--       `t_party` -> `party_id`
--   `created_by`
--       `t_user` -> `user_id`
--   `service_history_status_id`
--       `t_lov` -> `lov_id`
--   `updated_by`
--       `t_user` -> `user_id`
--   `vehicle_id`
--       `t_vehicle` -> `vehicle_id`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_service_history_item`
--

CREATE TABLE IF NOT EXISTS `t_service_history_item` (
  `service_history_item_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `service_history_item_status_id` tinyint(3) unsigned NOT NULL,
  `service_history_id` smallint(5) unsigned NOT NULL,
  `item_name` varchar(100) DEFAULT NULL,
  `item_descr` varchar(500) DEFAULT NULL,
  `item_price` decimal(10,2) DEFAULT NULL,
  `work_price` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL,
  `created_by` smallint(6) NOT NULL,
  `updated_by` smallint(6) NOT NULL,
  `deleted_by` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`service_history_Item_id`),
  KEY `fk_service_history_item_created_by` (`created_by`),
  KEY `fk_service_history_item_updated_by` (`updated_by`),
  KEY `fk_service_history_item_deleted_by` (`deleted_by`),
  KEY `fk_service_history_item_status` (`service_History_Item_status_id`),
  KEY `fk_item_of_service_history` (`service_History_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- RELATIONS FOR TABLE `t_service_history_item`:
--   `service_history_id`
--       `t_service_history` -> `service_history_id`
--   `created_by`
--       `t_user` -> `user_id`
--   `service_history_item_status_id`
--       `t_lov` -> `lov_id`
--   `updated_by`
--       `t_user` -> `user_id`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_service_request`
--

CREATE TABLE IF NOT EXISTS `t_service_request` (
  `service_request_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `service_request_status_id` tinyint(3) unsigned NOT NULL,
  `address_id` smallint(5) unsigned DEFAULT NULL,
  `manufacturer_id` smallint(5) unsigned DEFAULT NULL,
  `vehicle_model_id` smallint(5) unsigned DEFAULT NULL,
  `vehicle_type_id` smallint(5) unsigned DEFAULT NULL,
  `vehicle_id` smallint(5) unsigned DEFAULT NULL,
  `party_id` smallint(5) unsigned NOT NULL,
  `vin` varchar(30) DEFAULT NULL,
  `registration_number` varchar(13) DEFAULT NULL,
  `service_request_title` varchar(100) DEFAULT NULL,
  `service_request_descr` varchar(2000) DEFAULT NULL,
  `max_price` decimal(10,2) DEFAULT NULL,
  `max_distance` int(11) DEFAULT NULL,
  `request_valid_to_date` datetime DEFAULT NULL,
  `courtesy_car_flag` char(1) DEFAULT NULL,
  `insurance_flag` char(1) DEFAULT NULL,
  `authorized_service_flag` char(1) DEFAULT NULL,
  `spare_parts_type` char(1) DEFAULT NULL,
  `manufactured_year` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL,
  `created_by` smallint(6) NOT NULL,
  `updated_by` smallint(6) NOT NULL,
  `deleted_by` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`service_request_id`),
  KEY `fk_sr_created_by` (`created_by`),
  KEY `fk_sr_updated_by` (`updated_by`),
  KEY `fk_sr_deleted_by` (`deleted_by`),
  KEY `fk_service_request_status` (`service_request_status_id`),
  KEY `fk_requested_by_party` (`party_id`),
  KEY `fk_service_request_address` (`address_id`),
  KEY `fk_sr_car_subtype` (`vehicle_type_id`),
  KEY `fk_sr_manufacturer` (`manufacturer_id`),
  KEY `fk_sr_vehicle_model` (`vehicle_model_id`),
  KEY `fk_vehicle_to_be_serviced` (`vehicle_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- RELATIONS FOR TABLE `t_service_request`:
--   `party_id`
--       `t_party` -> `party_id`
--   `address_id`
--       `t_address` -> `address_id`
--   `service_request_status_id`
--       `t_lov` -> `lov_id`
--   `vehicle_type_id`
--       `t_vehicle_type` -> `vehicle_type_id`
--   `created_by`
--       `t_user` -> `user_id`
--   `manufacturer_id`
--       `t_manufacturer` -> `manufacturer_id`
--   `updated_by`
--       `t_user` -> `user_id`
--   `vehicle_model_id`
--       `t_vehicle_model` -> `vehicle_model_id`
--   `vehicle_id`
--       `t_vehicle` -> `vehicle_id`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_service_request_category_rel`
--

CREATE TABLE IF NOT EXISTS `t_service_request_category_rel` (
  `service_request_category_rel_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `service_request_category_rel_status_id` tinyint(3) unsigned NOT NULL,
  `service_request_id` smallint(5) unsigned NOT NULL,
  `category_id` smallint(5) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL,
  `created_by` smallint(6) NOT NULL,
  `updated_by` smallint(6) NOT NULL,
  `deleted_by` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`service_request_category_rel_id`),
  UNIQUE KEY `ak_service_request_category_rel` (`service_request_id`,`category_id`),
  KEY `fk_service_request_category_rel_created_by` (`created_by`),
  KEY `fk_service_request_category_rel_updated_by` (`updated_by`),
  KEY `fk_service_request_category_rel_deleted_by` (`deleted_by`),
  KEY `fk_service_request_category_rel_status` (`service_request_category_rel_status_id`),
  KEY `fk_category_of_service_request` (`service_request_id`),
  KEY `fk_service_requests_category` (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- RELATIONS FOR TABLE `t_service_request_category_rel`:
--   `service_request_id`
--       `t_service_request` -> `service_request_id`
--   `category_id`
--       `t_category` -> `category_id`
--   `created_by`
--       `t_user` -> `user_id`
--   `service_request_category_rel_status_id`
--       `t_lov` -> `lov_id`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_service_request_file_rel`
--

CREATE TABLE IF NOT EXISTS `t_service_request_file_rel` (
  `service_request_file_rel_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `service_request_file_rel_status_id` tinyint(3) unsigned NOT NULL,
  `service_request_id` smallint(5) unsigned NOT NULL,
  `file_id` smallint(5) unsigned NOT NULL,
  `order_pos` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL,
  `created_by` smallint(6) NOT NULL,
  `updated_by` smallint(6) NOT NULL,
  `deleted_by` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`service_request_file_rel_id`),
  UNIQUE KEY `aK_service_request_file_rel` (`service_request_id`,`file_id`),
  KEY `fk_sr_image_rel_created_by` (`created_by`),
  KEY `fk_sr_image_rel_updated_by` (`updated_by`),
  KEY `fk_sr_image_rel_deleted_by` (`deleted_by`),
  KEY `fk_service_request_file_rel_status` (`service_request_file_rel_status_id`),
  KEY `fk_service_requests_file` (`service_request_id`),
  KEY `fk_sreq_to_image` (`file_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Service request can be described by attached image, file, et' AUTO_INCREMENT=1 ;

--
-- RELATIONS FOR TABLE `t_service_request_file_rel`:
--   `service_request_id`
--       `t_service_request` -> `service_request_id`
--   `service_request_file_rel_status_id`
--       `t_lov` -> `lov_id`
--   `file_id`
--       `t_file` -> `file_id`
--   `created_by`
--       `t_user` -> `user_id`
--   `updated_by`
--       `t_user` -> `user_id`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_service_response`
--

CREATE TABLE IF NOT EXISTS `t_service_response` (
  `service_response_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `service_response_status_id` tinyint(3) unsigned NOT NULL,
  `service_request_id` smallint(5) unsigned NOT NULL,
  `party_id` smallint(5) unsigned NOT NULL,
  `review_id` smallint(5) unsigned DEFAULT NULL,
  `response_title` varchar(100) DEFAULT NULL,
  `response_text` varchar(500) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `rental_car_flag` char(1) DEFAULT NULL,
  `courtesy_car_flag` char(1) DEFAULT NULL,
  `next_appointment_date` datetime DEFAULT NULL,
  `repair_days` int(11) DEFAULT NULL,
  `estimate_expiration_date` datetime DEFAULT NULL,
  `estimate_accurancy_flag` char(1) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL,
  `created_by` smallint(6) NOT NULL,
  `updated_by` smallint(6) NOT NULL,
  `deleted_by` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`service_response_id`),
  KEY `fk_srp_created_by` (`created_by`),
  KEY `fk_srp_updated_by` (`updated_by`),
  KEY `fk_srp_deleted_by` (`deleted_by`),
  KEY `fk_service_response_status` (`service_response_status_id`),
  KEY `fk_response_2_request` (`service_request_id`),
  KEY `fk_responsed_by_party` (`party_id`),
  KEY `fk_winning_response_rate` (`review_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- RELATIONS FOR TABLE `t_service_response`:
--   `party_id`
--       `t_party` -> `party_id`
--   `service_request_id`
--       `t_service_request` -> `service_request_id`
--   `service_response_status_id`
--       `t_lov` -> `lov_id`
--   `created_by`
--       `t_user` -> `user_id`
--   `updated_by`
--       `t_user` -> `user_id`
--   `review_id`
--       `t_review` -> `review_id`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_session`
--

CREATE TABLE IF NOT EXISTS `t_session` (
  `session_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `start_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `end_timestamp` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `data` text,
  `user_id` smallint(6) DEFAULT NULL,
  `session_status_id` tinyint(3) unsigned DEFAULT NULL,
  `phpsessid` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `t_session_appl`
--

CREATE TABLE IF NOT EXISTS `t_session_appl` (
  `session_id` int(11) NOT NULL,
  `modified` int(11) DEFAULT NULL,
  `lifetime` int(11) DEFAULT NULL,
  `data` text,
  PRIMARY KEY (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `t_session_selected_company`
--

CREATE TABLE IF NOT EXISTS `t_session_selected_company` (
  `session_selected_company_id` int(11) NOT NULL AUTO_INCREMENT,
  `session_id` int(11) DEFAULT NULL,
  `party_id` smallint(6) DEFAULT NULL,
  `selection_type_id` tinyint(3) unsigned DEFAULT NULL,
  `start_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `end_timestamp` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `active_flag` char(1) NOT NULL,
  PRIMARY KEY (`session_selected_company_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `t_session_view`
--

CREATE TABLE IF NOT EXISTS `t_session_view` (
  `session_id` int(11) NOT NULL,
  `resource_type_id` tinyint(4) NOT NULL,
  `resource_id` smallint(6) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`session_id`,`resource_type_id`,`resource_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `t_tag`
--

CREATE TABLE IF NOT EXISTS `t_tag` (
  `tag_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `tag_status_id` tinyint(3) unsigned NOT NULL,
  `tag_value` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL,
  `created_by` smallint(6) NOT NULL,
  `updated_by` smallint(6) NOT NULL,
  `deleted_by` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`tag_id`),
  UNIQUE KEY `ak_Tag` (`tag_value`),
  KEY `fk_tag_created_by` (`created_by`),
  KEY `fk_tag_updated_by` (`updated_by`),
  KEY `fk_tag_deleted_by` (`deleted_by`),
  KEY `fk_tag_status` (`tag_status_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- RELATIONS FOR TABLE `t_tag`:
--   `created_by`
--       `t_user` -> `user_id`
--   `tag_status_id`
--       `t_lov` -> `lov_id`
--   `updated_by`
--       `t_user` -> `user_id`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_user`
--

CREATE TABLE IF NOT EXISTS `t_user` (
  `user_id` smallint(6) NOT NULL AUTO_INCREMENT,
  `user_status_id` tinyint(3) unsigned NOT NULL,
  `role` varchar(30) DEFAULT NULL,
  `party_id` smallint(5) unsigned DEFAULT NULL,
  `login` varchar(30) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `public_flag` char(1) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL,
  `created_by` smallint(6) NOT NULL,
  `updated_by` smallint(6) NOT NULL,
  `deleted_by` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `ak_user_login` (`login`),
  UNIQUE KEY `ak_user_email` (`email`),
  UNIQUE KEY `ak_user_party_id` (`party_id`),
  KEY `fk_user_status` (`user_status_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- RELATIONS FOR TABLE `t_user`:
--   `party_id`
--       `t_party` -> `party_id`
--   `user_status_id`
--       `t_lov` -> `lov_id`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_user_ext`
--

CREATE TABLE IF NOT EXISTS `t_user_ext` (
  `user_ext_id` smallint(6) NOT NULL AUTO_INCREMENT,
  `user_ext_status_id` tinyint(3) unsigned NOT NULL,
  `user_id` smallint(6) DEFAULT NULL,
  `provider` varchar(30) NOT NULL,
  `provider_id_string` varchar(100) NOT NULL,
  `login_ext` varchar(100) NOT NULL,
  `first_name_ext` varchar(30) DEFAULT NULL,
  `last_name_ext` varchar(30) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL,
  `created_by` smallint(6) NOT NULL,
  `updated_by` smallint(6) NOT NULL,
  `deleted_by` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`user_Ext_id`),
  UNIQUE KEY `ak_User_Ext` (`provider`,`provider_id_string`),
  KEY `fk_user_ext_updated_by` (`updated_by`),
  KEY `fk_user_ext_created_by` (`created_by`),
  KEY `fk_user_ext_deleted_by` (`deleted_by`),
  KEY `fk_user_ext_status` (`user_ext_status_id`),
  KEY `fk_user_ext_user` (`user_id`),
  KEY `provider` (`provider`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- RELATIONS FOR TABLE `t_user_ext`:
--   `created_by`
--       `t_user` -> `user_id`
--   `user_ext_status_id`
--       `t_lov` -> `lov_id`
--   `updated_by`
--       `t_user` -> `user_id`
--   `user_id`
--       `t_user` -> `user_id`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_vehicle`
--

CREATE TABLE IF NOT EXISTS `t_vehicle` (
  `vehicle_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `vehicle_status_id` tinyint(3) unsigned NOT NULL,
  `manufacturer_id` smallint(5) unsigned DEFAULT NULL,
  `vehicle_model_id` smallint(5) unsigned DEFAULT NULL,
  `vehicle_type_id` smallint(5) unsigned DEFAULT NULL,
  `vin` varchar(30) DEFAULT NULL,
  `registration_number` varchar(13) DEFAULT NULL,
  `manufactured_year` int(11) DEFAULT NULL,
  `ec_valid_to_date` datetime DEFAULT NULL,
  `tc_valid_to_date` datetime DEFAULT NULL,
  `alert_ec_tc_id` tinyint(1) unsigned DEFAULT NULL,
  `alert_sms_number` varchar(13) DEFAULT NULL,
  `alert_email` varchar(256) DEFAULT NULL,
  `party_id` smallint(6) unsigned NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL,
  `created_by` smallint(6) NOT NULL,
  `updated_by` smallint(6) NOT NULL,
  `deleted_by` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`vehicle_id`),
  KEY `fk_vehicle_created_by` (`created_by`),
  KEY `fk_vehicle_updated_by` (`updated_by`),
  KEY `fk_vehicle_deleted_by` (`deleted_by`),
  KEY `fk_vehicle_status` (`vehicle_status_id`),
  KEY `fk_vehicle_manufacturer` (`manufacturer_id`),
  KEY `fk_vehicle_model` (`vehicle_model_id`),
  KEY `fk_vehicle_type` (`vehicle_type_id`),
  KEY `fk_owner_of_vehicle` (`party_id`),
  KEY `fk_alert_ec_tc` (`alert_ec_tc_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- RELATIONS FOR TABLE `t_vehicle`:
--   `alert_ec_tc_id`
--       `t_lov` -> `lov_id`
--   `created_by`
--       `t_user` -> `user_id`
--   `party_id`
--       `t_party` -> `party_id`
--   `updated_by`
--       `t_user` -> `user_id`
--   `vehicle_model_id`
--       `t_vehicle_model` -> `vehicle_model_id`
--   `vehicle_status_id`
--       `t_lov` -> `lov_id`
--   `vehicle_type_id`
--       `t_vehicle_type` -> `vehicle_type_id`
--   `manufacturer_id`
--       `t_manufacturer` -> `manufacturer_id`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_vehicle_model`
--

CREATE TABLE IF NOT EXISTS `t_vehicle_model` (
  `vehicle_model_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `manufacturer_id` smallint(5) unsigned NOT NULL,
  `vehicle_model_name` varchar(100) NOT NULL,
  `vehicle_model_status_id` tinyint(3) unsigned NOT NULL,
  `production_start` int(11) DEFAULT NULL,
  `production_end` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL,
  `created_by` smallint(6) NOT NULL,
  `updated_by` smallint(6) NOT NULL,
  `deleted_by` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`vehicle_Model_id`),
  KEY `fk_vehicle_model_created_by` (`created_by`),
  KEY `fk_vehicle_model_updated_by` (`updated_by`),
  KEY `fk_vehicle_model_deleted_by` (`deleted_by`),
  KEY `fk_vehicle_model_status` (`vehicle_model_status_id`),
  KEY `fk_model_makes_manufacturer` (`manufacturer_id`)
  
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=488 ;

--
-- RELATIONS FOR TABLE `t_vehicle_model`:
--   `manufacturer_id`
--       `t_manufacturer` -> `manufacturer_id`
--   `created_by`
--       `t_user` -> `user_id`
--   `vehicle_model_status_id`
--       `t_lov` -> `lov_id`
--   `updated_by`
--       `t_user` -> `user_id`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_vehicle_type`
--

CREATE TABLE IF NOT EXISTS `t_vehicle_type` (
  `vehicle_type_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `vehicle_type_status_id` tinyint(3) unsigned NOT NULL,
  `vehicle_model_id` smallint(5) unsigned DEFAULT NULL,
  `vehicle_type_name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL,
  `created_by` smallint(6) NOT NULL,
  `updated_by` smallint(6) NOT NULL,
  `deleted_by` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`vehicle_type_id`),
  KEY `fk_vehicle_type_created_by` (`created_by`),
  KEY `fk_vehicle_type_updated_by` (`updated_by`),
  KEY `fk_vehicle_type_deleted_by` (`deleted_by`),
  KEY `fk_vehicle_type_status` (`vehicle_type_status_id`),
  KEY `fk_vehicle_type_model` (`vehicle_model_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- RELATIONS FOR TABLE `t_vehicle_type`:
--   `created_by`
--       `t_user` -> `user_id`
--   `vehicle_model_id`
--       `t_vehicle_model` -> `vehicle_model_id`
--   `vehicle_type_status_id`
--       `t_lov` -> `lov_id`
--   `updated_by`
--       `t_user` -> `user_id`
--

--
-- Constraints for dumped tables
--

--
-- Constraints for table `t_address`
--
ALTER TABLE `t_address`
  ADD CONSTRAINT `fk_address_created_by` FOREIGN KEY (`created_by`) REFERENCES `t_user` (`user_id`),
  ADD CONSTRAINT `fk_address_of_party` FOREIGN KEY (`party_id`) REFERENCES `t_party` (`party_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_address_status` FOREIGN KEY (`address_status_id`) REFERENCES `t_lov` (`lov_id`),
  ADD CONSTRAINT `fk_address_type` FOREIGN KEY (`address_type_id`) REFERENCES `t_lov` (`lov_id`),
  ADD CONSTRAINT `fk_address_updated_by` FOREIGN KEY (`updated_by`) REFERENCES `t_user` (`user_id`),
  ADD CONSTRAINT `fk_city` FOREIGN KEY (`city_id`) REFERENCES `t_location` (`location_id`),
  ADD CONSTRAINT `fk_city_part` FOREIGN KEY (`city_part_id`) REFERENCES `t_location` (`location_id`),
  ADD CONSTRAINT `fk_country` FOREIGN KEY (`country_id`) REFERENCES `t_location` (`location_id`),
  ADD CONSTRAINT `fk_district` FOREIGN KEY (`district_id`) REFERENCES `t_location` (`location_id`),
  ADD CONSTRAINT `fk_region` FOREIGN KEY (`region_id`) REFERENCES `t_location` (`location_id`),
  ADD CONSTRAINT `fk_address_deleted_by` FOREIGN KEY (`deleted_by`) REFERENCES `t_user` (`user_id`);

--
-- Constraints for table `t_category`
--
ALTER TABLE `t_category`
  ADD CONSTRAINT `fk_category_created_by` FOREIGN KEY (`created_by`) REFERENCES `t_user` (`user_id`),
  ADD CONSTRAINT `fk_category_status` FOREIGN KEY (`category_status_id`) REFERENCES `t_lov` (`lov_id`),
  ADD CONSTRAINT `fk_category_type` FOREIGN KEY (`category_type_id`) REFERENCES `t_lov` (`lov_id`),
  ADD CONSTRAINT `fk_category_updated_by` FOREIGN KEY (`updated_by`) REFERENCES `t_user` (`user_id`),
  ADD CONSTRAINT `fk_parent_category` FOREIGN KEY (`parent_Category_id`) REFERENCES `t_category` (`category_id`),
  ADD CONSTRAINT `fk_category_deleted_by` FOREIGN KEY (`deleted_by`) REFERENCES `t_user` (`user_id`);

--
-- Constraints for table `t_category_location_party_rel`
--
ALTER TABLE `t_category_location_party_rel`
  ADD CONSTRAINT `fk_party_location_category_01` FOREIGN KEY (`category_id`) REFERENCES `t_category` (`category_id`),
  ADD CONSTRAINT `fk_party_location_category_02` FOREIGN KEY (`location_id`) REFERENCES `t_location` (`location_id`),
  ADD CONSTRAINT `fk_party_location_category_03` FOREIGN KEY (`party_id`) REFERENCES `t_party` (`party_id`),
  ADD CONSTRAINT `fk_party_location_category_04` FOREIGN KEY (`manufacturer_id`) REFERENCES `t_manufacturer` (`manufacturer_id`);

--
-- Constraints for table `t_category_location_stats`
--
ALTER TABLE `t_category_location_stats`
  ADD CONSTRAINT `fk_category_statistics` FOREIGN KEY (`category_id`) REFERENCES `t_category` (`category_id`),
  ADD CONSTRAINT `fk_location_statistics` FOREIGN KEY (`location_id`) REFERENCES `t_location` (`location_id`),
  ADD CONSTRAINT `fk_manufacturer_statistics` FOREIGN KEY (`manufacturer_id`) REFERENCES `t_manufacturer` (`manufacturer_id`);

--
-- Constraints for table `t_comment`
--
ALTER TABLE `t_comment`
  ADD CONSTRAINT `fk_comment_created_by` FOREIGN KEY (`created_by`) REFERENCES `t_user` (`user_id`),
  ADD CONSTRAINT `fk_comment_on_review` FOREIGN KEY (`review_id`) REFERENCES `t_review` (`review_id`),
  ADD CONSTRAINT `fk_comment_status` FOREIGN KEY (`comment_status_id`) REFERENCES `t_lov` (`lov_id`),
  ADD CONSTRAINT `fk_comment_updated_by` FOREIGN KEY (`updated_by`) REFERENCES `t_user` (`user_id`),
  ADD CONSTRAINT `fk_parent_comment` FOREIGN KEY (`parent_Comment_id`) REFERENCES `t_comment` (`comment_id`),
  ADD CONSTRAINT `fk_party_commented` FOREIGN KEY (`party_id`) REFERENCES `t_party` (`party_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_comment_deleted_by` FOREIGN KEY (`deleted_by`) REFERENCES `t_user` (`user_id`);

--
-- Constraints for table `t_comment_like`
--
ALTER TABLE `t_comment_like`
  ADD CONSTRAINT `fk_comment_liked_by_user` FOREIGN KEY (`user_id`) REFERENCES `t_user` (`user_id`),
  ADD CONSTRAINT `fk_comment_like_created_by` FOREIGN KEY (`created_by`) REFERENCES `t_user` (`user_id`),
  ADD CONSTRAINT `fk_comment_like_status` FOREIGN KEY (`comment_like_status_id`) REFERENCES `t_lov` (`lov_id`),
  ADD CONSTRAINT `fk_comment_like_type` FOREIGN KEY (`comment_like_type_id`) REFERENCES `t_lov` (`lov_id`),
  ADD CONSTRAINT `fk_comment_like_updated_by` FOREIGN KEY (`updated_by`) REFERENCES `t_user` (`user_id`),
  ADD CONSTRAINT `fk_user_likes_comment` FOREIGN KEY (`comment_id`) REFERENCES `t_comment` (`comment_id`),
  ADD CONSTRAINT `fk_comment_like_deleted_by` FOREIGN KEY (`deleted_by`) REFERENCES `t_user` (`user_id`);

--
-- Constraints for table `t_contact`
--
ALTER TABLE `t_contact`
  ADD CONSTRAINT `fk_contact_created_by` FOREIGN KEY (`created_by`) REFERENCES `t_user` (`user_id`),
  ADD CONSTRAINT `fk_contact_of_party` FOREIGN KEY (`party_id`) REFERENCES `t_party` (`party_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_contact_status` FOREIGN KEY (`contact_type_id`) REFERENCES `t_lov` (`lov_id`),
  ADD CONSTRAINT `fk_contact_type` FOREIGN KEY (`contact_status_id`) REFERENCES `t_lov` (`lov_id`),
  ADD CONSTRAINT `fk_contact_updated_by` FOREIGN KEY (`updated_by`) REFERENCES `t_user` (`user_id`),
  ADD CONSTRAINT `fk_contact_deleted_by` FOREIGN KEY (`deleted_by`) REFERENCES `t_user` (`user_id`);

--
-- Constraints for table `t_email`
--
ALTER TABLE `t_email`
  ADD CONSTRAINT `fk_email_created_by` FOREIGN KEY (`created_by`) REFERENCES `t_user` (`user_id`),
  ADD CONSTRAINT `fk_email_received_from_party` FOREIGN KEY (`sender_party_id`) REFERENCES `t_party` (`party_id`),
  ADD CONSTRAINT `fk_email_send_to_party` FOREIGN KEY (`receiver_party_id`) REFERENCES `t_party` (`party_id`),
  ADD CONSTRAINT `fk_email_status` FOREIGN KEY (`email_status_id`) REFERENCES `t_lov` (`lov_id`),
  ADD CONSTRAINT `fk_email_type` FOREIGN KEY (`email_type_id`) REFERENCES `t_lov` (`lov_id`),
  ADD CONSTRAINT `fk_email_updated_by` FOREIGN KEY (`updated_by`) REFERENCES `t_user` (`user_id`),
  ADD CONSTRAINT `fk_service_request_email` FOREIGN KEY (`service_request_id`) REFERENCES `t_service_request` (`service_request_id`),
  ADD CONSTRAINT `fk_service_response_email` FOREIGN KEY (`service_response_id`) REFERENCES `t_service_response` (`service_response_id`),
  ADD CONSTRAINT `fk_email_deleted_by` FOREIGN KEY (`deleted_by`) REFERENCES `t_user` (`user_id`);

--
-- Constraints for table `t_file`
--
ALTER TABLE `t_file`
  ADD CONSTRAINT `fk_file_of_party` FOREIGN KEY (`party_id`) REFERENCES `t_party` (`party_id`),
  ADD CONSTRAINT `fk_file_type` FOREIGN KEY (`file_type_id`) REFERENCES `t_lov` (`lov_id`),
  ADD CONSTRAINT `fk_file_created_by` FOREIGN KEY (`created_by`) REFERENCES `t_user` (`user_id`),
  ADD CONSTRAINT `fk_file_status` FOREIGN KEY (`file_status_id`) REFERENCES `t_lov` (`lov_id`),
  ADD CONSTRAINT `fk_file_updated_by` FOREIGN KEY (`updated_by`) REFERENCES `t_user` (`user_id`),
  ADD CONSTRAINT `fk_file_deleted_by` FOREIGN KEY (`deleted_by`) REFERENCES `t_user` (`user_id`);

--
-- Constraints for table `t_file_label_rel`
--
ALTER TABLE `t_file_label_rel`
  ADD CONSTRAINT `fk_file_has_label` FOREIGN KEY (`label_id`) REFERENCES `t_label` (`label_id`),
  ADD CONSTRAINT `fk_file_label_rel_created_by` FOREIGN KEY (`created_by`) REFERENCES `t_user` (`user_id`),
  ADD CONSTRAINT `fk_file_label_rel_updated_by` FOREIGN KEY (`updated_by`) REFERENCES `t_user` (`user_id`),
  ADD CONSTRAINT `fk_label_consists_of_image` FOREIGN KEY (`file_id`) REFERENCES `t_file` (`file_id`),
  ADD CONSTRAINT `fk_label_rel_status` FOREIGN KEY (`file_label_rel_status_id`) REFERENCES `t_lov` (`lov_id`),
  ADD CONSTRAINT `fk_file_label_rel_deleted_by` FOREIGN KEY (`deleted_by`) REFERENCES `t_user` (`user_id`);

--
-- Constraints for table `t_hour`
--
ALTER TABLE `t_hour`
  ADD CONSTRAINT `fk_hour_created_by` FOREIGN KEY (`created_by`) REFERENCES `t_user` (`user_id`),
  ADD CONSTRAINT `fk_hour_status` FOREIGN KEY (`hour_status_id`) REFERENCES `t_lov` (`lov_id`),
  ADD CONSTRAINT `fk_hour_updated_by` FOREIGN KEY (`updated_by`) REFERENCES `t_user` (`user_id`),
  ADD CONSTRAINT `fk_working_hours` FOREIGN KEY (`party_id`) REFERENCES `t_party` (`party_id`),
  ADD CONSTRAINT `fk_hour_deleted_by` FOREIGN KEY (`deleted_by`) REFERENCES `t_user` (`user_id`);

--
-- Constraints for table `t_label`
--
ALTER TABLE `t_label`
  ADD CONSTRAINT `fk_label_belongs_to_party` FOREIGN KEY (`party_id`) REFERENCES `t_party` (`party_id`),
  ADD CONSTRAINT `fk_label_status` FOREIGN KEY (`label_status_id`) REFERENCES `t_lov` (`lov_id`);

--
-- Constraints for table `t_location`
--
ALTER TABLE `t_location`
  ADD CONSTRAINT `fk_location_created_by` FOREIGN KEY (`created_by`) REFERENCES `t_user` (`user_id`),
  ADD CONSTRAINT `fk_location_status` FOREIGN KEY (`location_status_id`) REFERENCES `t_lov` (`lov_id`),
  ADD CONSTRAINT `fk_location_type` FOREIGN KEY (`location_type_id`) REFERENCES `t_lov` (`lov_id`),
  ADD CONSTRAINT `fk_location_updated_by` FOREIGN KEY (`updated_by`) REFERENCES `t_user` (`user_id`),
  ADD CONSTRAINT `fk_parent_location` FOREIGN KEY (`parent_location_id`) REFERENCES `t_location` (`location_id`),
  ADD CONSTRAINT `fk_location_deleted_by` FOREIGN KEY (`deleted_by`) REFERENCES `t_user` (`user_id`);

--
-- Constraints for table `t_manufacturer`
--
ALTER TABLE `t_manufacturer`
  ADD CONSTRAINT `fk_manufacturer_created_by` FOREIGN KEY (`created_by`) REFERENCES `t_user` (`user_id`),
  ADD CONSTRAINT `fk_manufacturer_status` FOREIGN KEY (`manufacturer_status_id`) REFERENCES `t_lov` (`lov_id`),
  ADD CONSTRAINT `fk_manufacturer_updated_by` FOREIGN KEY (`updated_by`) REFERENCES `t_user` (`user_id`),
  ADD CONSTRAINT `fk_manufacturer_deleted_by` FOREIGN KEY (`deleted_by`) REFERENCES `t_user` (`user_id`);

--
-- Constraints for table `t_manufacturer_party_rel`
--
ALTER TABLE `t_manufacturer_party_rel`
  ADD CONSTRAINT `fk_manufacturer_is_represented_by_party` FOREIGN KEY (`party_id`) REFERENCES `t_party` (`party_id`),
  ADD CONSTRAINT `fk_manufacturer_party_rel_created_by` FOREIGN KEY (`created_by`) REFERENCES `t_user` (`user_id`),
  ADD CONSTRAINT `fk_manufacturer_party_rel_type` FOREIGN KEY (`manufacturer_party_rel_type_id`) REFERENCES `t_lov` (`lov_id`),
  ADD CONSTRAINT `fk_manufacturer_party_rel_updated_by` FOREIGN KEY (`updated_by`) REFERENCES `t_user` (`user_id`),
  ADD CONSTRAINT `fk_manufacturer_party_status` FOREIGN KEY (`manufacturer_party_rel_status_id`) REFERENCES `t_lov` (`lov_id`),
  ADD CONSTRAINT `fk_party_represents_brand` FOREIGN KEY (`manufacturer_id`) REFERENCES `t_manufacturer` (`manufacturer_id`),
  ADD CONSTRAINT `fk_manufacturer_party_rel_deleted_by` FOREIGN KEY (`deleted_by`) REFERENCES `t_user` (`user_id`);

--
-- Constraints for table `t_message`
--
ALTER TABLE `t_message`
  ADD CONSTRAINT `fk_message_created_by` FOREIGN KEY (`created_by`) REFERENCES `t_user` (`user_id`),
  ADD CONSTRAINT `fk_message_has_type` FOREIGN KEY (`message_type_id`) REFERENCES `t_lov` (`lov_id`),
  ADD CONSTRAINT `fk_message_resource_type` FOREIGN KEY (`resource_type_id`) REFERENCES `t_lov` (`lov_id`),
  ADD CONSTRAINT `fk_message_status` FOREIGN KEY (`message_status_id`) REFERENCES `t_lov` (`lov_id`),
  ADD CONSTRAINT `fk_message_updated_by` FOREIGN KEY (`updated_by`) REFERENCES `t_user` (`user_id`),
  ADD CONSTRAINT `fk_message_deleted_by` FOREIGN KEY (`deleted_by`) REFERENCES `t_user` (`user_id`);

--
-- Constraints for table `t_article`
--
ALTER TABLE `t_article`
  ADD CONSTRAINT `fk_article_created_by` FOREIGN KEY (`created_by`) REFERENCES `t_user` (`user_id`),
  ADD CONSTRAINT `fk_article_status` FOREIGN KEY (`article_status_id`) REFERENCES `t_lov` (`lov_id`),
  ADD CONSTRAINT `fk_article_updated_by` FOREIGN KEY (`updated_by`) REFERENCES `t_user` (`user_id`),
  ADD CONSTRAINT `fk_article_deleted_by` FOREIGN KEY (`deleted_by`) REFERENCES `t_user` (`user_id`);

--
-- Constraints for table `t_page_request`
--
ALTER TABLE `t_page_request`
  ADD CONSTRAINT `fk_page_request_status` FOREIGN KEY (`page_request_status_id`) REFERENCES `t_lov` (`lov_id`);

--
-- Constraints for table `t_party`
--
ALTER TABLE `t_party`
  ADD CONSTRAINT `fk_party_created_by` FOREIGN KEY (`created_by`) REFERENCES `t_user` (`user_id`),
  ADD CONSTRAINT `fk_party_salutation` FOREIGN KEY (`salutation_id`) REFERENCES `t_lov` (`lov_id`),
  ADD CONSTRAINT `fk_party_status` FOREIGN KEY (`party_status_id`) REFERENCES `t_lov` (`lov_id`),
  ADD CONSTRAINT `fk_party_updated_by` FOREIGN KEY (`updated_by`) REFERENCES `t_user` (`user_id`);

--
-- Constraints for table `t_party_category_rel`
--
ALTER TABLE `t_party_category_rel`
  ADD CONSTRAINT `fk_category_includes_party` FOREIGN KEY (`category_id`) REFERENCES `t_category` (`category_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_party_category` FOREIGN KEY (`party_id`) REFERENCES `t_party` (`party_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_party_category_rel_created_by` FOREIGN KEY (`created_by`) REFERENCES `t_user` (`user_id`),
  ADD CONSTRAINT `fk_party_category_rel_status` FOREIGN KEY (`party_category_rel_status_id`) REFERENCES `t_lov` (`lov_id`),
  ADD CONSTRAINT `fk_party_category_rel_updated_by` FOREIGN KEY (`updated_by`) REFERENCES `t_user` (`user_id`),
  ADD CONSTRAINT `fk_party_category_rel_deleted_by` FOREIGN KEY (`deleted_by`) REFERENCES `t_user` (`user_id`);

--
-- Constraints for table `t_party_overall_review`
--
ALTER TABLE `t_party_overall_review`
  ADD CONSTRAINT `fk_overall_review_of_party` FOREIGN KEY (`party_id`) REFERENCES `t_party` (`party_id`) ON DELETE CASCADE;

--
-- Constraints for table `t_party_rel`
--
ALTER TABLE `t_party_rel`
  ADD CONSTRAINT `fk_party_rel_created_by` FOREIGN KEY (`created_by`) REFERENCES `t_user` (`user_id`),
  ADD CONSTRAINT `fk_party_rel_status` FOREIGN KEY (`party_rel_status_id`) REFERENCES `t_lov` (`lov_id`),
  ADD CONSTRAINT `fk_party_rel_type` FOREIGN KEY (`party_rel_type_id`) REFERENCES `t_lov` (`lov_id`),
  ADD CONSTRAINT `fk_related_party` FOREIGN KEY (`party_id`) REFERENCES `t_party` (`party_id`),
  ADD CONSTRAINT `fk_related_party_2` FOREIGN KEY (`related_party_id`) REFERENCES `t_party` (`party_id`),
  ADD CONSTRAINT `fk_party_rel_updated_by` FOREIGN KEY (`updated_by`) REFERENCES `t_user` (`user_id`),
  ADD CONSTRAINT `fk_party_rel_deleted_by` FOREIGN KEY (`deleted_by`) REFERENCES `t_user` (`user_id`);

--
-- Constraints for table `t_party_tag_rel`
--
ALTER TABLE `t_party_tag_rel`
  ADD CONSTRAINT `fk_party_has_tag` FOREIGN KEY (`party_id`) REFERENCES `t_party` (`party_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_party_tag_rel_created_by` FOREIGN KEY (`created_by`) REFERENCES `t_user` (`user_id`),
  ADD CONSTRAINT `fk_party_tag_rel_status` FOREIGN KEY (`party_tag_rel_status_id`) REFERENCES `t_lov` (`lov_id`),
  ADD CONSTRAINT `fk_party_tag_rel_updated_by` FOREIGN KEY (`updated_by`) REFERENCES `t_user` (`user_id`),
  ADD CONSTRAINT `fk_tagged_party` FOREIGN KEY (`tag_id`) REFERENCES `t_tag` (`tag_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_party_tag_rel_deleted_by` FOREIGN KEY (`deleted_by`) REFERENCES `t_user` (`user_id`);

--
-- Constraints for table `t_permission`
--
ALTER TABLE `t_permission`
  ADD CONSTRAINT `fk_permission_created_by` FOREIGN KEY (`created_by`) REFERENCES `t_user` (`user_id`),
  ADD CONSTRAINT `fk_permission_resource_type` FOREIGN KEY (`resource_type_id`) REFERENCES `t_lov` (`lov_id`),
  ADD CONSTRAINT `fk_permitted_to_user` FOREIGN KEY (`user_id`) REFERENCES `t_user` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_permission_updated_by` FOREIGN KEY (`updated_by`) REFERENCES `t_user` (`user_id`),
  ADD CONSTRAINT `fk_permission_deleted_by` FOREIGN KEY (`deleted_by`) REFERENCES `t_user` (`user_id`);

--
-- Constraints for table `t_price_item`
--
ALTER TABLE `t_price_item`
  ADD CONSTRAINT `fk_measure_type` FOREIGN KEY (`measure_id`) REFERENCES `t_lov` (`lov_id`),
  ADD CONSTRAINT `fk_party_price_list` FOREIGN KEY (`party_id`) REFERENCES `t_party` (`party_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_price_item_status` FOREIGN KEY (`price_item_status_id`) REFERENCES `t_lov` (`lov_id`),
  ADD CONSTRAINT `fk_price_item_type` FOREIGN KEY (`price_item_type_id`) REFERENCES `t_category` (`category_id`),
  ADD CONSTRAINT `fk_price_list_created_by` FOREIGN KEY (`created_by`) REFERENCES `t_user` (`user_id`),
  ADD CONSTRAINT `fk_price_list_updated_by` FOREIGN KEY (`updated_by`) REFERENCES `t_user` (`user_id`),
  ADD CONSTRAINT `fk_price_list_deleted_by` FOREIGN KEY (`deleted_by`) REFERENCES `t_user` (`user_id`);

--
-- Constraints for table `t_problem_solution`
--
ALTER TABLE `t_problem_solution`
  ADD CONSTRAINT `fk_problem_category` FOREIGN KEY (`problem_category_id`) REFERENCES `t_problem_category` (`problem_category_id`),
  ADD CONSTRAINT `fk_when_problem_occured` FOREIGN KEY (`problem_when_id`) REFERENCES `t_problem_when` (`problem_when_id`),
  ADD CONSTRAINT `fk_where_is_problem` FOREIGN KEY (`problem_where_id`) REFERENCES `t_problem_where` (`problem_where_id`),
  ADD CONSTRAINT `fk_problem_solution_created_by` FOREIGN KEY (`created_by`) REFERENCES `t_user` (`user_id`),
  ADD CONSTRAINT `fk_problem_solution_updated_by` FOREIGN KEY (`updated_by`) REFERENCES `t_user` (`user_id`),
  ADD CONSTRAINT `fk_problem_solution_deleted_by` FOREIGN KEY (`deleted_by`) REFERENCES `t_user` (`user_id`);

--
-- Constraints for table `t_problem_symptom`
--
ALTER TABLE `t_problem_symptom`
  ADD CONSTRAINT `fk_symptom_belongs_to_category` FOREIGN KEY (`problem_category_id`) REFERENCES `t_problem_category` (`problem_category_id`),
  ADD CONSTRAINT `fk_problem_symptom_created_by` FOREIGN KEY (`created_by`) REFERENCES `t_user` (`user_id`),
  ADD CONSTRAINT `fk_problem_symptom_updated_by` FOREIGN KEY (`updated_by`) REFERENCES `t_user` (`user_id`),
  ADD CONSTRAINT `fk_problem_symptom_deleted_by` FOREIGN KEY (`deleted_by`) REFERENCES `t_user` (`user_id`);

--
-- Constraints for table `t_review`
--
ALTER TABLE `t_review`
  ADD CONSTRAINT `fk_model_serviced` FOREIGN KEY (`vehicle_model_id`) REFERENCES `t_vehicle_model` (`vehicle_model_id`),
  ADD CONSTRAINT `fk_review_created_by` FOREIGN KEY (`created_by`) REFERENCES `t_user` (`user_id`),
  ADD CONSTRAINT `fk_review_of_party` FOREIGN KEY (`party_id`) REFERENCES `t_party` (`party_id`),
  ADD CONSTRAINT `fk_review_status` FOREIGN KEY (`review_status_id`) REFERENCES `t_lov` (`lov_id`),
  ADD CONSTRAINT `fk_review_updated_by` FOREIGN KEY (`updated_by`) REFERENCES `t_user` (`user_id`),
  ADD CONSTRAINT `fk_review_visited_on` FOREIGN KEY (`visited_id`) REFERENCES `t_lov` (`lov_id`),
  ADD CONSTRAINT `fk_vehicle_manufactured` FOREIGN KEY (`manufacturer_id`) REFERENCES `t_manufacturer` (`manufacturer_id`),
  ADD CONSTRAINT `fk_vehicle_serviced` FOREIGN KEY (`vehicle_id`) REFERENCES `t_vehicle` (`vehicle_id`);

--
-- Constraints for table `t_search`
--
ALTER TABLE `t_search`
  ADD CONSTRAINT `fk_search_status` FOREIGN KEY (`search_status_id`) REFERENCES `t_lov` (`lov_id`);

--
-- Constraints for table `t_service_history`
--
ALTER TABLE `t_service_history`
  ADD CONSTRAINT `fk_service_history_belongs_to_party` FOREIGN KEY (`service_party_id`) REFERENCES `t_party` (`party_id`),
  ADD CONSTRAINT `fk_service_history_created_by` FOREIGN KEY (`created_by`) REFERENCES `t_user` (`user_id`),
  ADD CONSTRAINT `fk_service_history_status` FOREIGN KEY (`service_history_status_id`) REFERENCES `t_lov` (`lov_id`),
  ADD CONSTRAINT `fk_service_history_updated_by` FOREIGN KEY (`updated_by`) REFERENCES `t_user` (`user_id`),
  ADD CONSTRAINT `fk_vehicle_service_history` FOREIGN KEY (`vehicle_id`) REFERENCES `t_vehicle` (`vehicle_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_service_history_deleted_by` FOREIGN KEY (`deleted_by`) REFERENCES `t_user` (`user_id`);

--
-- Constraints for table `t_service_history_item`
--
ALTER TABLE `t_service_history_item`
  ADD CONSTRAINT `fk_item_of_service_history` FOREIGN KEY (`service_History_id`) REFERENCES `t_service_history` (`service_history_id`),
  ADD CONSTRAINT `fk_service_history_item_created_by` FOREIGN KEY (`created_by`) REFERENCES `t_user` (`user_id`),
  ADD CONSTRAINT `fk_service_history_item_status` FOREIGN KEY (`service_history_item_status_id`) REFERENCES `t_lov` (`lov_id`),
  ADD CONSTRAINT `fk_service_history_item_updated_by` FOREIGN KEY (`updated_by`) REFERENCES `t_user` (`user_id`),
  ADD CONSTRAINT `fk_service_history_item_deleted_by` FOREIGN KEY (`deleted_by`) REFERENCES `t_user` (`user_id`);

--
-- Constraints for table `t_service_request`
--
ALTER TABLE `t_service_request`
  ADD CONSTRAINT `fk_requested_by_party` FOREIGN KEY (`party_id`) REFERENCES `t_party` (`party_id`),
  ADD CONSTRAINT `fk_service_request_address` FOREIGN KEY (`address_id`) REFERENCES `t_address` (`address_id`),
  ADD CONSTRAINT `fk_service_request_status` FOREIGN KEY (`service_request_status_id`) REFERENCES `t_lov` (`lov_id`),
  ADD CONSTRAINT `fk_sr_car_subtype` FOREIGN KEY (`vehicle_type_id`) REFERENCES `t_vehicle_type` (`vehicle_type_id`),
  ADD CONSTRAINT `fk_sr_created_by` FOREIGN KEY (`created_by`) REFERENCES `t_user` (`user_id`),
  ADD CONSTRAINT `fk_sr_manufacturer` FOREIGN KEY (`manufacturer_id`) REFERENCES `t_manufacturer` (`manufacturer_id`),
  ADD CONSTRAINT `fk_sr_updated_by` FOREIGN KEY (`updated_by`) REFERENCES `t_user` (`user_id`),
  ADD CONSTRAINT `fk_sr_vehicle_model` FOREIGN KEY (`vehicle_Model_id`) REFERENCES `t_vehicle_model` (`vehicle_Model_id`),
  ADD CONSTRAINT `fk_vehicle_to_be_serviced` FOREIGN KEY (`vehicle_id`) REFERENCES `t_vehicle` (`vehicle_id`),
  ADD CONSTRAINT `fk_sr_deleted_by` FOREIGN KEY (`deleted_by`) REFERENCES `t_user` (`user_id`);

--
-- Constraints for table `t_service_request_category_rel`
--
ALTER TABLE `t_service_request_category_rel`
  ADD CONSTRAINT `fk_category_of_service_request` FOREIGN KEY (`service_request_id`) REFERENCES `t_service_request` (`service_request_id`),
  ADD CONSTRAINT `fk_service_requests_category` FOREIGN KEY (`category_id`) REFERENCES `t_category` (`category_id`),
  ADD CONSTRAINT `fk_service_request_category_rel_created_by` FOREIGN KEY (`created_by`) REFERENCES `t_user` (`user_id`),
  ADD CONSTRAINT `fk_service_request_category_rel_status` FOREIGN KEY (`service_request_Category_rel_status_id`) REFERENCES `t_lov` (`lov_id`),
  ADD CONSTRAINT `fk_service_request_category_rel_updated_by` FOREIGN KEY (`updated_by`) REFERENCES `t_user` (`user_id`),
  ADD CONSTRAINT `fk_service_request_category_rel_deleted_by` FOREIGN KEY (`deleted_by`) REFERENCES `t_user` (`user_id`);

--
-- Constraints for table `t_service_request_file_rel`
--
ALTER TABLE `t_service_request_file_rel`
  ADD CONSTRAINT `fk_service_requests_file` FOREIGN KEY (`service_request_id`) REFERENCES `t_service_request` (`service_request_id`),
  ADD CONSTRAINT `fk_service_request_file_rel_status` FOREIGN KEY (`service_request_file_rel_status_id`) REFERENCES `t_lov` (`lov_id`),
  ADD CONSTRAINT `fk_sreq_to_image` FOREIGN KEY (`file_id`) REFERENCES `t_file` (`file_id`),
  ADD CONSTRAINT `fk_sr_image_rel_created_by` FOREIGN KEY (`created_by`) REFERENCES `t_user` (`user_id`),
  ADD CONSTRAINT `fk_sr_image_rel_updated_by` FOREIGN KEY (`updated_by`) REFERENCES `t_user` (`user_id`),
  ADD CONSTRAINT `fk_sr_image_rel_deleted_by` FOREIGN KEY (`deleted_by`) REFERENCES `t_user` (`user_id`);

--
-- Constraints for table `t_service_response`
--
ALTER TABLE `t_service_response`
  ADD CONSTRAINT `fk_responsed_by_party` FOREIGN KEY (`party_id`) REFERENCES `t_party` (`party_id`),
  ADD CONSTRAINT `fk_response_2_request` FOREIGN KEY (`service_request_id`) REFERENCES `t_service_request` (`service_request_id`),
  ADD CONSTRAINT `fk_service_response_status` FOREIGN KEY (`service_response_status_id`) REFERENCES `t_lov` (`lov_id`),
  ADD CONSTRAINT `fk_srp_created_by` FOREIGN KEY (`created_by`) REFERENCES `t_user` (`user_id`),
  ADD CONSTRAINT `fk_srp_updated_by` FOREIGN KEY (`updated_by`) REFERENCES `t_user` (`user_id`),
  ADD CONSTRAINT `fk_winning_response_rate` FOREIGN KEY (`review_id`) REFERENCES `t_review` (`review_id`),
  ADD CONSTRAINT `fk_srp_deleted_by` FOREIGN KEY (`deleted_by`) REFERENCES `t_user` (`user_id`);

--
-- Constraints for table `t_tag`
--
ALTER TABLE `t_tag`
  ADD CONSTRAINT `fk_tag_created_by` FOREIGN KEY (`created_by`) REFERENCES `t_user` (`user_id`),
  ADD CONSTRAINT `fk_tag_status` FOREIGN KEY (`tag_status_id`) REFERENCES `t_lov` (`lov_id`),
  ADD CONSTRAINT `fk_tag_updated_by` FOREIGN KEY (`updated_by`) REFERENCES `t_user` (`user_id`),
  ADD CONSTRAINT `fk_tag_deleted_by` FOREIGN KEY (`deleted_by`) REFERENCES `t_user` (`user_id`);

--
-- Constraints for table `t_user`
--
ALTER TABLE `t_user`
  ADD CONSTRAINT `fk_user_belongs_to_party` FOREIGN KEY (`party_id`) REFERENCES `t_party` (`party_id`),
  ADD CONSTRAINT `fk_user_status` FOREIGN KEY (`user_status_id`) REFERENCES `t_lov` (`lov_id`);

--
-- Constraints for table `t_user_ext`
--
ALTER TABLE `t_user_ext`
  ADD CONSTRAINT `fk_user_ext_created_by` FOREIGN KEY (`created_by`) REFERENCES `t_user` (`user_id`),
  ADD CONSTRAINT `fk_user_ext_status` FOREIGN KEY (`user_Ext_status_id`) REFERENCES `t_lov` (`lov_id`),
  ADD CONSTRAINT `fk_user_ext_updated_by` FOREIGN KEY (`updated_by`) REFERENCES `t_user` (`user_id`),
  ADD CONSTRAINT `fk_user_ext_user` FOREIGN KEY (`user_id`) REFERENCES `t_user` (`user_id`),
  ADD CONSTRAINT `fk_user_ext_deleted_by` FOREIGN KEY (`deleted_by`) REFERENCES `t_user` (`user_id`);

--
-- Constraints for table `t_vehicle`
--
ALTER TABLE `t_vehicle`
  ADD CONSTRAINT `fk_alert_ec_tc` FOREIGN KEY (`alert_ec_tc_id`) REFERENCES `t_lov` (`lov_id`),
  ADD CONSTRAINT `fk_vehicle_created_by` FOREIGN KEY (`created_by`) REFERENCES `t_user` (`user_id`),
  ADD CONSTRAINT `fk_owner_of_vehicle` FOREIGN KEY (`party_id`) REFERENCES `t_party` (`party_id`),
  ADD CONSTRAINT `fk_vehicle_updated_by` FOREIGN KEY (`updated_by`) REFERENCES `t_user` (`user_id`),
  ADD CONSTRAINT `fk_vehicle_model` FOREIGN KEY (`vehicle_model_id`) REFERENCES `t_vehicle_model` (`vehicle_model_id`),
  ADD CONSTRAINT `fk_vehicle_status` FOREIGN KEY (`vehicle_status_id`) REFERENCES `t_lov` (`lov_id`),
  ADD CONSTRAINT `fk_vehicle_type` FOREIGN KEY (`vehicle_type_id`) REFERENCES `t_vehicle_type` (`vehicle_type_id`),
  ADD CONSTRAINT `fk_vehicle_manufacturer` FOREIGN KEY (`manufacturer_id`) REFERENCES `t_manufacturer` (`manufacturer_id`),
  ADD CONSTRAINT `fk_vehicle_deleted_by` FOREIGN KEY (`deleted_by`) REFERENCES `t_user` (`user_id`);

--
-- Constraints for table `t_vehicle_model`
--
ALTER TABLE `t_vehicle_model`
  ADD CONSTRAINT `fk_model_makes_manufacturer` FOREIGN KEY (`manufacturer_id`) REFERENCES `t_manufacturer` (`manufacturer_id`),
  ADD CONSTRAINT `fk_vehicle_model_created_by` FOREIGN KEY (`created_by`) REFERENCES `t_user` (`user_id`),
  ADD CONSTRAINT `fk_vehicle_model_status` FOREIGN KEY (`vehicle_model_status_id`) REFERENCES `t_lov` (`lov_id`),
  ADD CONSTRAINT `fk_vehicle_model_updated_by` FOREIGN KEY (`updated_by`) REFERENCES `t_user` (`user_id`),
  ADD CONSTRAINT `fk_vehicle_model_deleted_by` FOREIGN KEY (`deleted_by`) REFERENCES `t_user` (`user_id`);

--
-- Constraints for table `t_vehicle_type`
--
ALTER TABLE `t_vehicle_type`
  ADD CONSTRAINT `fk_vehicle_type_created_by` FOREIGN KEY (`created_by`) REFERENCES `t_user` (`user_id`),
  ADD CONSTRAINT `fk_vehicle_type_model` FOREIGN KEY (`vehicle_model_id`) REFERENCES `t_vehicle_model` (`vehicle_model_id`),
  ADD CONSTRAINT `fk_vehicle_type_status` FOREIGN KEY (`vehicle_type_status_id`) REFERENCES `t_lov` (`lov_id`),
  ADD CONSTRAINT `fk_vehicle_type_updated_by` FOREIGN KEY (`updated_by`) REFERENCES `t_user` (`user_id`),
  ADD CONSTRAINT `fk_vehicle_type_deleted_by` FOREIGN KEY (`deleted_by`) REFERENCES `t_user` (`user_id`);

/*!40101 SET CHARACTER_sET_CLIENT=@OLD_CHARACTER_sET_CLIENT */;
/*!40101 SET CHARACTER_sET_rESULTS=@OLD_CHARACTER_sET_rESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
