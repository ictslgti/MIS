-- phpMyAdmin SQL Dump
-- version 4.6.6deb5ubuntu0.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 15, 2022 at 06:51 AM
-- Server version: 5.7.38-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `emis`
--

-- --------------------------------------------------------

--
-- Table structure for table `absence_types`
--

CREATE TABLE `absence_types` (
  `id` int(11) NOT NULL,
  `code` varchar(100) NOT NULL,
  `name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `academic_periods`
--

CREATE TABLE `academic_periods` (
  `id` int(11) NOT NULL,
  `code` varchar(60) NOT NULL,
  `name` varchar(50) NOT NULL,
  `start_date` date NOT NULL,
  `start_year` int(4) NOT NULL,
  `end_date` date NOT NULL,
  `end_year` int(4) NOT NULL,
  `school_days` int(5) NOT NULL DEFAULT '0',
  `current` int(1) NOT NULL DEFAULT '0',
  `editable` int(1) NOT NULL DEFAULT '1',
  `parent_id` int(11) NOT NULL,
  `lft` int(11) DEFAULT NULL,
  `rght` int(11) DEFAULT NULL,
  `academic_period_level_id` int(11) NOT NULL COMMENT 'links to academic_period_levels.id',
  `order` int(3) NOT NULL DEFAULT '0',
  `visible` int(1) NOT NULL DEFAULT '1',
  `modified_user_id` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_user_id` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `academic_period_levels`
--

CREATE TABLE `academic_period_levels` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `level` int(3) NOT NULL,
  `editable` int(1) NOT NULL DEFAULT '1',
  `modified_user_id` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_user_id` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `alerts`
--

CREATE TABLE `alerts` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `process_name` varchar(50) NOT NULL,
  `process_id` int(11) DEFAULT NULL,
  `modified_user_id` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_user_id` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `alerts_roles`
--

CREATE TABLE `alerts_roles` (
  `alert_rule_id` int(11) NOT NULL COMMENT 'links to alert_rules.id',
  `security_role_id` int(11) NOT NULL COMMENT 'links to security_roles.id',
  `id` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `alert_logs`
--

CREATE TABLE `alert_logs` (
  `id` int(11) NOT NULL,
  `feature` varchar(100) NOT NULL,
  `method` varchar(20) NOT NULL,
  `destination` text NOT NULL,
  `status` varchar(20) NOT NULL COMMENT '-1 -> Failed, 0 -> Pending, 1 -> Success',
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `checksum` varchar(64) NOT NULL,
  `processed_date` datetime DEFAULT NULL,
  `created_user_id` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `alert_rules`
--

CREATE TABLE `alert_rules` (
  `id` int(11) NOT NULL,
  `feature` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `threshold` varchar(255) NOT NULL,
  `enabled` int(1) NOT NULL DEFAULT '1',
  `method` varchar(50) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `modified_user_id` int(5) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_user_id` int(5) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `api_authorizations`
--

CREATE TABLE `api_authorizations` (
  `id` char(36) NOT NULL,
  `name` varchar(128) NOT NULL,
  `security_token` varchar(40) NOT NULL,
  `modified_user_id` int(11) DEFAULT NULL,
  `modified` datetime NOT NULL,
  `created_user_id` int(11) DEFAULT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `api_credentials`
--

CREATE TABLE `api_credentials` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `client_id` varchar(100) NOT NULL,
  `public_key` text NOT NULL,
  `scope` text,
  `modified_user_id` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_user_id` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `areas`
--

CREATE TABLE `areas` (
  `id` int(11) NOT NULL,
  `code` varchar(60) NOT NULL,
  `name` varchar(100) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `lft` int(11) DEFAULT NULL,
  `rght` int(11) DEFAULT NULL,
  `area_level_id` int(11) NOT NULL COMMENT 'links to area_levels.id',
  `order` int(3) NOT NULL,
  `visible` int(1) NOT NULL DEFAULT '1',
  `modified_user_id` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_user_id` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `area_administratives`
--

CREATE TABLE `area_administratives` (
  `id` int(11) NOT NULL,
  `code` varchar(60) NOT NULL,
  `name` varchar(100) NOT NULL,
  `is_main_country` int(1) NOT NULL DEFAULT '0',
  `parent_id` int(11) DEFAULT NULL,
  `lft` int(11) DEFAULT NULL,
  `rght` int(11) DEFAULT NULL,
  `area_administrative_level_id` int(11) NOT NULL COMMENT 'links to area_administrative_levels.id',
  `order` int(3) NOT NULL,
  `visible` int(1) NOT NULL DEFAULT '1',
  `modified_user_id` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_user_id` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `area_administrative_levels`
--

CREATE TABLE `area_administrative_levels` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `level` int(3) NOT NULL,
  `area_administrative_id` int(11) NOT NULL COMMENT 'links to area_administratives.id',
  `modified_user_id` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_user_id` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `area_levels`
--

CREATE TABLE `area_levels` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `level` int(3) NOT NULL,
  `modified_user_id` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_user_id` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `assessments`
--

CREATE TABLE `assessments` (
  `id` int(11) NOT NULL,
  `code` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text,
  `excel_template_name` varchar(250) DEFAULT NULL,
  `excel_template` longblob,
  `type` int(1) NOT NULL DEFAULT '1' COMMENT '1 -> Non-official, 2 -> Official',
  `academic_period_id` int(11) NOT NULL COMMENT 'links to academic_periods.id',
  `education_grade_id` int(11) NOT NULL COMMENT 'links to education_grades.id',
  `modified_user_id` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_user_id` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `assessment_grading_options`
--

CREATE TABLE `assessment_grading_options` (
  `id` int(11) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `name` varchar(80) NOT NULL,
  `description` text,
  `min` decimal(6,2) DEFAULT NULL,
  `max` decimal(6,2) DEFAULT NULL,
  `order` int(3) NOT NULL,
  `visible` int(1) NOT NULL DEFAULT '1',
  `assessment_grading_type_id` int(11) NOT NULL COMMENT 'links to assessment_grading_types.id',
  `modified_user_id` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_user_id` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `assessment_grading_types`
--

CREATE TABLE `assessment_grading_types` (
  `id` int(11) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `name` varchar(80) NOT NULL,
  `pass_mark` decimal(6,2) NOT NULL,
  `max` decimal(6,2) NOT NULL,
  `result_type` varchar(20) NOT NULL,
  `visible` int(1) NOT NULL DEFAULT '1',
  `modified_user_id` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_user_id` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `assessment_items`
--

CREATE TABLE `assessment_items` (
  `id` char(36) NOT NULL,
  `weight` decimal(6,2) DEFAULT '0.00',
  `classification` varchar(250) DEFAULT NULL,
  `assessment_id` int(11) NOT NULL COMMENT 'links to assessments.id',
  `education_subject_id` int(11) NOT NULL COMMENT 'links to education_subjects.id',
  `modified_user_id` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_user_id` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `assessment_items_grading_types`
--

CREATE TABLE `assessment_items_grading_types` (
  `education_subject_id` int(11) NOT NULL COMMENT 'links to education_subjects.id',
  `assessment_grading_type_id` int(11) NOT NULL COMMENT 'links to assessment_grading_types.id',
  `assessment_id` int(11) NOT NULL COMMENT 'links to assessments.id',
  `assessment_period_id` int(11) NOT NULL COMMENT 'links to assessment_periods.id',
  `id` char(36) NOT NULL,
  `modified_user_id` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_user_id` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `assessment_item_results`
--

CREATE TABLE `assessment_item_results` (
  `student_id` int(11) NOT NULL COMMENT 'links to security_users.id',
  `assessment_id` int(11) NOT NULL COMMENT 'links to assessments.id',
  `education_subject_id` int(11) NOT NULL COMMENT 'links to education_subjects.id',
  `education_grade_id` int(11) NOT NULL COMMENT 'links to education_grades.id',
  `academic_period_id` int(11) NOT NULL COMMENT 'links to academic_periods.id',
  `assessment_period_id` int(11) NOT NULL COMMENT 'links to assessment_periods.id',
  `id` char(36) NOT NULL,
  `marks` decimal(6,2) DEFAULT NULL,
  `assessment_grading_option_id` int(11) DEFAULT NULL,
  `institution_id` int(11) NOT NULL COMMENT 'links to institutions.id',
  `modified_user_id` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_user_id` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `assessment_periods`
--

CREATE TABLE `assessment_periods` (
  `id` int(11) NOT NULL,
  `code` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `date_enabled` date NOT NULL,
  `date_disabled` date NOT NULL,
  `weight` decimal(6,2) DEFAULT '0.00',
  `academic_term` varchar(250) DEFAULT NULL,
  `assessment_id` int(11) NOT NULL COMMENT 'links to assessments.id',
  `modified_user_id` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_user_id` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `authentication_types`
--

CREATE TABLE `authentication_types` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `id` int(11) NOT NULL,
  `name` varchar(80) NOT NULL,
  `code` varchar(50) NOT NULL,
  `order` int(3) NOT NULL,
  `visible` int(1) NOT NULL DEFAULT '1',
  `modified_user_id` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_user_id` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `bank_branches`
--

CREATE TABLE `bank_branches` (
  `id` int(11) NOT NULL,
  `name` varchar(80) NOT NULL,
  `code` varchar(50) NOT NULL,
  `order` int(3) NOT NULL,
  `visible` int(1) NOT NULL DEFAULT '1',
  `bank_id` int(11) NOT NULL COMMENT 'links to banks.id',
  `modified_user_id` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_user_id` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `behaviour_classifications`
--

CREATE TABLE `behaviour_classifications` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `order` int(3) NOT NULL,
  `visible` int(1) NOT NULL DEFAULT '1',
  `editable` int(1) NOT NULL DEFAULT '1',
  `default` int(1) NOT NULL DEFAULT '0',
  `international_code` varchar(50) DEFAULT NULL,
  `national_code` varchar(50) DEFAULT NULL,
  `modified_user_id` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_user_id` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `building_custom_field_values`
--

CREATE TABLE `building_custom_field_values` (
  `id` char(36) NOT NULL,
  `text_value` varchar(250) DEFAULT NULL,
  `number_value` int(11) DEFAULT NULL,
  `decimal_value` varchar(25) DEFAULT NULL,
  `textarea_value` text,
  `date_value` date DEFAULT NULL,
  `time_value` time DEFAULT NULL,
  `file` longblob,
  `infrastructure_custom_field_id` int(11) NOT NULL,
  `institution_building_id` int(11) NOT NULL,
  `modified_user_id` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_user_id` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `building_types`
--

CREATE TABLE `building_types` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `order` int(3) NOT NULL,
  `visible` int(1) NOT NULL DEFAULT '1',
  `editable` int(1) NOT NULL DEFAULT '1',
  `default` int(1) NOT NULL DEFAULT '0',
  `international_code` varchar(50) DEFAULT NULL,
  `national_code` varchar(50) DEFAULT NULL,
  `modified_user_id` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_user_id` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `bus_types`
--

CREATE TABLE `bus_types` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `order` int(3) NOT NULL,
  `visible` int(1) NOT NULL DEFAULT '1',
  `editable` int(1) NOT NULL DEFAULT '1',
  `default` int(1) NOT NULL DEFAULT '0',
  `international_code` varchar(50) DEFAULT NULL,
  `national_code` varchar(50) DEFAULT NULL,
  `modified_user_id` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_user_id` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `comment_types`
--

CREATE TABLE `comment_types` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `order` int(3) NOT NULL,
  `visible` int(1) NOT NULL DEFAULT '1',
  `editable` int(1) NOT NULL DEFAULT '1',
  `default` int(1) NOT NULL DEFAULT '0',
  `international_code` varchar(50) DEFAULT NULL,
  `national_code` varchar(50) DEFAULT NULL,
  `modified_user_id` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_user_id` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `competencies`
--

CREATE TABLE `competencies` (
  `id` int(11) NOT NULL,
  `name` varchar(55) NOT NULL,
  `order` int(3) NOT NULL,
  `visible` int(1) NOT NULL DEFAULT '1',
  `editable` int(1) NOT NULL DEFAULT '1',
  `default` int(1) NOT NULL DEFAULT '0',
  `min` decimal(5,2) NOT NULL,
  `max` decimal(5,2) NOT NULL,
  `international_code` varchar(50) DEFAULT NULL,
  `national_code` varchar(50) DEFAULT NULL,
  `modified_user_id` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_user_id` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `competency_criterias`
--

CREATE TABLE `competency_criterias` (
  `id` int(11) NOT NULL,
  `academic_period_id` int(11) NOT NULL COMMENT 'links to academic_periods.id',
  `competency_item_id` int(11) NOT NULL COMMENT 'links to competency_items.id',
  `competency_template_id` int(11) NOT NULL COMMENT 'links to competency_templates.id',
  `code` varchar(20) DEFAULT NULL,
  `name` varchar(500) NOT NULL,
  `competency_grading_type_id` int(11) NOT NULL COMMENT 'links to competency_grading_types.id',
  `modified_user_id` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_user_id` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `competency_grading_options`
--

CREATE TABLE `competency_grading_options` (
  `id` int(11) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `name` varchar(250) NOT NULL,
  `description` text,
  `competency_grading_type_id` int(11) NOT NULL COMMENT 'links to competency_grading_types.id',
  `modified_user_id` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_user_id` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `competency_grading_types`
--

CREATE TABLE `competency_grading_types` (
  `id` int(11) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `name` varchar(250) NOT NULL,
  `modified_user_id` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_user_id` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `competency_items`
--

CREATE TABLE `competency_items` (
  `id` int(11) NOT NULL,
  `academic_period_id` int(11) NOT NULL COMMENT 'links to academic_periods.id',
  `competency_template_id` int(11) NOT NULL COMMENT 'links to competency_templates.id',
  `name` varchar(250) NOT NULL,
  `modified_user_id` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_user_id` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `competency_items_periods`
--

CREATE TABLE `competency_items_periods` (
  `competency_item_id` int(11) NOT NULL COMMENT 'links to competency_templates.id',
  `competency_period_id` int(11) NOT NULL COMMENT 'links to competency_periods.id',
  `academic_period_id` int(11) NOT NULL COMMENT 'links to academic_periods.id',
  `competency_template_id` int(11) NOT NULL,
  `id` varchar(64) NOT NULL,
  `modified_user_id` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_user_id` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `competency_periods`
--

CREATE TABLE `competency_periods` (
  `id` int(11) NOT NULL,
  `academic_period_id` int(11) NOT NULL COMMENT 'links to academic_periods.id',
  `code` varchar(50) NOT NULL,
  `name` varchar(250) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `date_enabled` date NOT NULL,
  `date_disabled` date NOT NULL,
  `competency_template_id` int(11) NOT NULL COMMENT 'links to competency_templates.id',
  `modified_user_id` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_user_id` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `competency_sets`
--

CREATE TABLE `competency_sets` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `order` int(3) NOT NULL,
  `visible` int(1) NOT NULL DEFAULT '1',
  `editable` int(1) NOT NULL DEFAULT '1',
  `default` int(1) NOT NULL DEFAULT '0',
  `international_code` varchar(50) DEFAULT NULL,
  `national_code` varchar(50) DEFAULT NULL,
  `modified_user_id` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_user_id` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `competency_sets_competencies`
--

CREATE TABLE `competency_sets_competencies` (
  `competency_id` int(11) NOT NULL COMMENT 'links to competencies.id',
  `competency_set_id` int(11) NOT NULL COMMENT 'links to competency_sets.id',
  `id` char(36) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `competency_templates`
--

CREATE TABLE `competency_templates` (
  `id` int(11) NOT NULL,
  `academic_period_id` int(11) NOT NULL COMMENT 'links to academic_periods.id',
  `code` varchar(50) NOT NULL,
  `name` varchar(250) NOT NULL,
  `description` text,
  `education_grade_id` int(11) NOT NULL COMMENT 'links to education_grades.id',
  `modified_user_id` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_user_id` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `config_attachments`
--

CREATE TABLE `config_attachments` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `description` varchar(250) NOT NULL,
  `type` varchar(50) NOT NULL,
  `file_name` varchar(250) NOT NULL,
  `file_content` longblob NOT NULL,
  `order` int(3) NOT NULL,
  `visible` int(1) NOT NULL DEFAULT '1',
  `active` int(1) NOT NULL DEFAULT '0',
  `modified_user_id` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_user_id` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `config_items`
--

CREATE TABLE `config_items` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `code` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `label` varchar(100) NOT NULL,
  `value` varchar(500) NOT NULL,
  `default_value` varchar(500) DEFAULT NULL,
  `editable` int(1) NOT NULL DEFAULT '0',
  `visible` int(1) NOT NULL DEFAULT '1',
  `field_type` varchar(50) NOT NULL,
  `option_type` varchar(50) NOT NULL,
  `modified_user_id` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_user_id` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `config_item_options`
--

CREATE TABLE `config_item_options` (
  `id` int(11) NOT NULL,
  `option_type` varchar(50) NOT NULL,
  `option` varchar(100) NOT NULL,
  `value` varchar(100) NOT NULL,
  `order` int(3) NOT NULL DEFAULT '0',
  `visible` int(3) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `config_product_lists`
--

CREATE TABLE `config_product_lists` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `url` text,
  `file_name` varchar(250) DEFAULT NULL,
  `file_content` longblob,
  `modified_user_id` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_user_id` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `contact_options`
--

CREATE TABLE `contact_options` (
  `id` int(11) NOT NULL,
  `name` varchar(10) NOT NULL,
  `code` varchar(10) NOT NULL,
  `order` int(11) NOT NULL,
  `created_user_id` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `contact_types`
--

CREATE TABLE `contact_types` (
  `id` int(11) NOT NULL,
  `contact_option_id` int(11) NOT NULL COMMENT 'links to contact_options.id',
  `name` varchar(100) NOT NULL,
  `validation_pattern` varchar(100) DEFAULT NULL,
  `order` int(3) NOT NULL,
  `visible` int(1) NOT NULL DEFAULT '1',
  `international_code` varchar(10) DEFAULT NULL,
  `national_code` varchar(10) DEFAULT NULL,
  `modified_user_id` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_user_id` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `order` int(3) NOT NULL,
  `visible` int(1) NOT NULL DEFAULT '1',
  `default` int(1) NOT NULL DEFAULT '0',
  `international_code` varchar(10) DEFAULT NULL,
  `national_code` varchar(10) DEFAULT NULL,
  `modified_user_id` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_user_id` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `custom_fields`
--

CREATE TABLE `custom_fields` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `field_type` varchar(100) NOT NULL,
  `is_mandatory` int(1) NOT NULL DEFAULT '0',
  `is_unique` int(1) NOT NULL DEFAULT '0',
  `params` text,
  `modified_user_id` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_user_id` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `custom_field_options`
--

CREATE TABLE `custom_field_options` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `is_default` int(1) NOT NULL DEFAULT '0',
  `visible` int(1) NOT NULL DEFAULT '1',
  `order` int(3) NOT NULL DEFAULT '0',
  `custom_field_id` int(11) NOT NULL COMMENT 'links to custom_fields.id',
  `modified_user_id` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_user_id` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `custom_field_types`
--

CREATE TABLE `custom_field_types` (
  `id` int(11) NOT NULL,
  `code` varchar(100) NOT NULL,
  `name` varchar(250) NOT NULL,
  `value` varchar(100) NOT NULL,
  `description` text,
  `format` varchar(50) NOT NULL,
  `is_mandatory` int(1) NOT NULL DEFAULT '0',
  `is_unique` int(1) NOT NULL DEFAULT '0',
  `visible` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `custom_field_values`
--

CREATE TABLE `custom_field_values` (
  `id` char(36) NOT NULL,
  `text_value` varchar(250) DEFAULT NULL,
  `number_value` int(11) DEFAULT NULL,
  `decimal_value` varchar(25) DEFAULT NULL,
  `textarea_value` text,
  `date_value` date DEFAULT NULL,
  `time_value` time DEFAULT NULL,
  `file` longblob,
  `custom_field_id` int(11) NOT NULL COMMENT 'links to custom_fields.id',
  `custom_record_id` int(11) NOT NULL COMMENT 'links to custom_records.id',
  `modified_user_id` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_user_id` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `custom_forms`
--

CREATE TABLE `custom_forms` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `description` text,
  `custom_module_id` int(11) NOT NULL COMMENT 'links to custom_modules.id',
  `modified_user_id` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_user_id` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `custom_forms_fields`
--

CREATE TABLE `custom_forms_fields` (
  `id` char(36) NOT NULL,
  `custom_form_id` int(11) NOT NULL COMMENT 'links to custom_forms.id',
  `custom_field_id` int(11) NOT NULL COMMENT 'links to custom_fields.id',
  `name` varchar(250) NOT NULL,
  `is_mandatory` int(1) NOT NULL DEFAULT '0',
  `is_unique` int(1) NOT NULL DEFAULT '0',
  `order` int(3) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `custom_forms_filters`
--

CREATE TABLE `custom_forms_filters` (
  `id` char(36) NOT NULL,
  `custom_form_id` int(11) NOT NULL COMMENT 'links to custom_forms.id',
  `custom_filter_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `custom_modules`
--

CREATE TABLE `custom_modules` (
  `id` int(11) NOT NULL,
  `code` varchar(100) NOT NULL,
  `name` varchar(250) NOT NULL,
  `model` varchar(200) DEFAULT NULL,
  `visible` int(1) NOT NULL DEFAULT '1',
  `parent_id` int(11) DEFAULT '0',
  `modified_user_id` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_user_id` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `custom_records`
--

CREATE TABLE `custom_records` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `custom_form_id` int(11) NOT NULL COMMENT 'links to custom_forms.id',
  `modified_user_id` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_user_id` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `custom_table_cells`
--

CREATE TABLE `custom_table_cells` (
  `id` char(36) NOT NULL,
  `text_value` varchar(250) DEFAULT NULL,
  `custom_field_id` int(11) NOT NULL COMMENT 'links to custom_fields.id',
  `custom_table_column_id` int(11) NOT NULL COMMENT 'links to custom_table_columns.id',
  `custom_table_row_id` int(11) NOT NULL COMMENT 'links to custom_table_rows.id',
  `custom_record_id` int(11) NOT NULL COMMENT 'links to custom_records.id',
  `modified_user_id` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_user_id` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `custom_table_columns`
--

CREATE TABLE `custom_table_columns` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `order` int(3) NOT NULL DEFAULT '0',
  `visible` int(1) NOT NULL DEFAULT '1',
  `custom_field_id` int(11) NOT NULL COMMENT 'links to custom_fields.id',
  `modified_user_id` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_user_id` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `custom_table_rows`
--

CREATE TABLE `custom_table_rows` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `order` int(3) NOT NULL DEFAULT '0',
  `visible` int(1) NOT NULL DEFAULT '1',
  `custom_field_id` int(11) NOT NULL COMMENT 'links to custom_fields.id',
  `modified_user_id` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_user_id` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `deleted_records`
--

CREATE TABLE `deleted_records` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `deleted_date` int(8) NOT NULL,
  `reference_table` varchar(50) NOT NULL,
  `reference_key` text NOT NULL,
  `data` mediumtext NOT NULL,
  `created_user_id` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `education_certifications`
--

CREATE TABLE `education_certifications` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `order` int(3) NOT NULL,
  `visible` int(1) NOT NULL DEFAULT '1',
  `modified_user_id` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_user_id` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `education_cycles`
--

CREATE TABLE `education_cycles` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `admission_age` int(3) NOT NULL,
  `order` int(3) NOT NULL,
  `visible` int(1) NOT NULL DEFAULT '1',
  `education_level_id` int(11) NOT NULL COMMENT 'links to education_levels.id',
  `modified_user_id` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_user_id` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `education_field_of_studies`
--

CREATE TABLE `education_field_of_studies` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `order` int(3) NOT NULL,
  `visible` int(1) NOT NULL DEFAULT '1',
  `education_programme_orientation_id` int(11) NOT NULL COMMENT 'links to education_programme_orientations.id',
  `modified_user_id` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_user_id` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `education_grades`
--

CREATE TABLE `education_grades` (
  `id` int(11) NOT NULL,
  `code` varchar(50) NOT NULL,
  `name` varchar(150) NOT NULL,
  `admission_age` int(3) NOT NULL,
  `order` int(3) NOT NULL,
  `visible` int(1) NOT NULL DEFAULT '1',
  `education_stage_id` int(11) NOT NULL COMMENT 'links to education_stages.id',
  `education_programme_id` int(11) NOT NULL COMMENT 'links to education_programmes.id',
  `modified_user_id` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_user_id` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `education_grades_subjects`
--

CREATE TABLE `education_grades_subjects` (
  `education_grade_id` int(11) NOT NULL COMMENT 'links to education_grades.id',
  `education_subject_id` int(11) NOT NULL COMMENT 'links to education_subjects.id',
  `id` varchar(64) NOT NULL,
  `hours_required` decimal(5,2) DEFAULT NULL,
  `visible` int(1) NOT NULL DEFAULT '1',
  `auto_allocation` int(1) NOT NULL DEFAULT '1',
  `modified_user_id` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_user_id` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `education_levels`
--

CREATE TABLE `education_levels` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `order` int(3) NOT NULL,
  `visible` int(1) NOT NULL DEFAULT '1',
  `education_system_id` int(11) NOT NULL COMMENT 'links to education_systems.id',
  `education_level_isced_id` int(11) NOT NULL COMMENT 'links to education_level_isced.id',
  `modified_user_id` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_user_id` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `education_level_isced`
--

CREATE TABLE `education_level_isced` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `isced_level` int(2) NOT NULL,
  `isced_version` varchar(50) NOT NULL,
  `order` int(3) NOT NULL,
  `visible` int(1) NOT NULL DEFAULT '1',
  `modified_user_id` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_user_id` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `education_programmes`
--

CREATE TABLE `education_programmes` (
  `id` int(11) NOT NULL,
  `code` varchar(50) NOT NULL,
  `name` varchar(150) NOT NULL,
  `duration` int(3) NOT NULL COMMENT 'No of years',
  `order` int(3) NOT NULL,
  `visible` int(1) NOT NULL DEFAULT '1',
  `education_field_of_study_id` int(11) NOT NULL COMMENT 'links to education_field_of_studies.id',
  `education_cycle_id` int(11) NOT NULL COMMENT 'links to education_cycles.id',
  `education_certification_id` int(11) NOT NULL COMMENT 'links to education_certifications.id',
  `modified_user_id` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_user_id` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `education_programmes_next_programmes`
--

CREATE TABLE `education_programmes_next_programmes` (
  `id` char(36) NOT NULL,
  `education_programme_id` int(11) NOT NULL COMMENT 'links to education_programmes.id',
  `next_programme_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `education_programme_orientations`
--

CREATE TABLE `education_programme_orientations` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `order` int(3) NOT NULL,
  `visible` int(1) NOT NULL DEFAULT '1',
  `modified_user_id` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_user_id` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `education_stages`
--

CREATE TABLE `education_stages` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `code` varchar(20) NOT NULL,
  `order` int(3) NOT NULL,
  `visible` int(1) NOT NULL DEFAULT '1',
  `modified_user_id` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_user_id` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `education_subjects`
--

CREATE TABLE `education_subjects` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `code` varchar(20) NOT NULL,
  `order` int(3) NOT NULL,
  `visible` int(1) NOT NULL DEFAULT '1',
  `modified_user_id` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_user_id` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `education_subjects_field_of_studies`
--

CREATE TABLE `education_subjects_field_of_studies` (
  `education_subject_id` int(11) NOT NULL COMMENT 'links to education_subjects.id',
  `education_field_of_study_id` int(11) NOT NULL COMMENT 'links to education_field_of_studies.id',
  `id` varchar(64) NOT NULL,
  `modified_user_id` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_user_id` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `education_systems`
--

CREATE TABLE `education_systems` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `order` int(3) NOT NULL,
  `visible` int(1) NOT NULL DEFAULT '1',
  `modified_user_id` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_user_id` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `employment_types`
--

CREATE TABLE `employment_types` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `order` int(3) NOT NULL,
  `visible` int(1) NOT NULL DEFAULT '1',
  `editable` int(1) NOT NULL DEFAULT '1',
  `default` int(1) NOT NULL DEFAULT '0',
  `international_code` varchar(50) DEFAULT NULL,
  `national_code` varchar(50) DEFAULT NULL,
  `modified_user_id` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_user_id` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `examinations`
--

CREATE TABLE `examinations` (
  `id` int(11) NOT NULL,
  `code` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text,
  `registration_start_date` date NOT NULL,
  `registration_end_date` date NOT NULL,
  `academic_period_id` int(11) NOT NULL COMMENT 'links to academic_periods.id',
  `education_grade_id` int(11) NOT NULL COMMENT 'links to education_grades.id',
  `modified_user_id` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_user_id` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `examination_centres`
--

CREATE TABLE `examination_centres` (
  `id` int(11) NOT NULL,
  `name` varchar(150) DEFAULT NULL,
  `code` varchar(50) DEFAULT NULL,
  `address` text,
  `postal_code` varchar(20) DEFAULT NULL,
  `contact_person` varchar(100) DEFAULT NULL,
  `telephone` varchar(30) DEFAULT NULL,
  `fax` varchar(30) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `website` varchar(100) DEFAULT NULL,
  `institution_id` int(11) NOT NULL COMMENT 'links to institutions.id',
  `area_id` int(11) NOT NULL COMMENT 'links to areas.id',
  `academic_period_id` int(11) NOT NULL COMMENT 'links to academic_periods.id',
  `modified_user_id` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_user_id` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `examination_centres_examinations`
--

CREATE TABLE `examination_centres_examinations` (
  `examination_centre_id` int(11) NOT NULL COMMENT 'links to examination_centres.id',
  `examination_id` int(11) NOT NULL COMMENT 'links to examinations.id',
  `id` varchar(64) NOT NULL,
  `total_registered` int(11) NOT NULL DEFAULT '0',
  `academic_period_id` int(11) NOT NULL COMMENT 'links to academic_periods.id',
  `created_user_id` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `examination_centres_examinations_institutions`
--

CREATE TABLE `examination_centres_examinations_institutions` (
  `examination_centre_id` int(11) NOT NULL COMMENT 'links to examination_centres.id',
  `examination_id` int(11) NOT NULL COMMENT 'links to examinations.id',
  `institution_id` int(11) NOT NULL COMMENT 'links to institutions.id',
  `id` varchar(64) NOT NULL,
  `created_user_id` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `examination_centres_examinations_invigilators`
--

CREATE TABLE `examination_centres_examinations_invigilators` (
  `examination_centre_id` int(11) NOT NULL COMMENT 'links to examination_centres.id',
  `examination_id` int(11) NOT NULL COMMENT 'links to examinations.id',
  `invigilator_id` int(11) NOT NULL COMMENT 'links to security_users.id',
  `id` varchar(64) NOT NULL,
  `created_user_id` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `examination_centres_examinations_students`
--

CREATE TABLE `examination_centres_examinations_students` (
  `examination_centre_id` int(11) NOT NULL COMMENT 'links to examination_centres.id',
  `examination_id` int(11) NOT NULL COMMENT 'links to examination.id',
  `student_id` int(11) NOT NULL COMMENT 'links to security_users.id',
  `id` varchar(64) NOT NULL,
  `registration_number` varchar(20) DEFAULT NULL,
  `institution_id` int(11) NOT NULL DEFAULT '0' COMMENT 'links to institutions.id',
  `academic_period_id` int(11) NOT NULL COMMENT 'links to academic_periods.id',
  `modified_user_id` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_user_id` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `examination_centres_examinations_subjects`
--

CREATE TABLE `examination_centres_examinations_subjects` (
  `examination_centre_id` int(11) NOT NULL COMMENT 'links to examination_centres.id',
  `examination_item_id` int(11) NOT NULL COMMENT 'links to `examination_items.id',
  `id` varchar(64) NOT NULL,
  `education_subject_id` int(11) NOT NULL COMMENT 'links to education_subjects.id',
  `examination_id` int(11) NOT NULL COMMENT 'links to examinations.id',
  `created_user_id` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `examination_centres_examinations_subjects_students`
--

CREATE TABLE `examination_centres_examinations_subjects_students` (
  `examination_centre_id` int(11) NOT NULL COMMENT 'links to examination_centres.id',
  `examination_item_id` int(11) NOT NULL COMMENT 'links to `examination_items.id',
  `student_id` int(11) NOT NULL COMMENT 'links to security_users.id',
  `id` varchar(64) NOT NULL,
  `total_mark` decimal(6,2) DEFAULT NULL,
  `examination_id` int(11) NOT NULL COMMENT 'links to examinations.id',
  `education_subject_id` int(11) NOT NULL COMMENT 'links to `education_subjects.id',
  `created_user_id` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `examination_centre_rooms`
--

CREATE TABLE `examination_centre_rooms` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `size` int(3) DEFAULT '0',
  `number_of_seats` int(3) DEFAULT '0',
  `examination_centre_id` int(11) NOT NULL COMMENT 'links to examination_centres.id',
  `modified_user_id` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_user_id` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `examination_centre_rooms_examinations`
--

CREATE TABLE `examination_centre_rooms_examinations` (
  `examination_centre_room_id` int(11) NOT NULL COMMENT 'links to examination_centre_rooms.id',
  `examination_id` int(11) NOT NULL COMMENT 'links to examinations.id',
  `id` varchar(64) NOT NULL,
  `examination_centre_id` int(11) NOT NULL COMMENT 'links to examination_centres.id',
  `created_user_id` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `examination_centre_rooms_examinations_invigilators`
--

CREATE TABLE `examination_centre_rooms_examinations_invigilators` (
  `examination_centre_room_id` int(11) NOT NULL COMMENT 'links to examination_centre_rooms.id',
  `examination_id` int(11) NOT NULL COMMENT 'links to examinations.id',
  `invigilator_id` int(11) NOT NULL COMMENT 'links to security_users.id',
  `id` varchar(64) NOT NULL,
  `examination_centre_id` int(11) NOT NULL COMMENT 'links to examination_centres.id',
  `created_user_id` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `examination_centre_rooms_examinations_students`
--

CREATE TABLE `examination_centre_rooms_examinations_students` (
  `examination_centre_room_id` int(11) NOT NULL COMMENT 'links to examination_centre_rooms.id',
  `examination_id` int(11) NOT NULL COMMENT 'links to examination.id',
  `student_id` int(11) NOT NULL COMMENT 'links to security_users.id',
  `id` varchar(64) NOT NULL,
  `examination_centre_id` int(11) NOT NULL COMMENT 'links to examination_centres.id',
  `created_user_id` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `examination_centre_special_needs`
--

CREATE TABLE `examination_centre_special_needs` (
  `examination_centre_id` int(11) NOT NULL COMMENT 'links to examination_centres.id',
  `special_need_type_id` int(11) NOT NULL COMMENT 'links to special_need_types.id',
  `id` varchar(64) NOT NULL,
  `created_user_id` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `examination_grading_options`
--

CREATE TABLE `examination_grading_options` (
  `id` int(11) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `name` varchar(80) NOT NULL,
  `description` text,
  `min` decimal(6,2) DEFAULT NULL,
  `max` decimal(6,2) DEFAULT NULL,
  `order` int(3) NOT NULL,
  `visible` int(1) NOT NULL DEFAULT '1',
  `examination_grading_type_id` int(11) NOT NULL COMMENT 'links to examination_grading_types.id',
  `modified_user_id` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_user_id` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `examination_grading_types`
--

CREATE TABLE `examination_grading_types` (
  `id` int(11) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `name` varchar(80) NOT NULL,
  `pass_mark` decimal(6,2) NOT NULL,
  `max` decimal(6,2) NOT NULL,
  `result_type` varchar(20) NOT NULL,
  `visible` int(1) NOT NULL DEFAULT '1',
  `modified_user_id` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_user_id` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `examination_items`
--

CREATE TABLE `examination_items` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `code` varchar(20) NOT NULL,
  `weight` decimal(6,2) DEFAULT '0.00',
  `examination_date` date DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `examination_id` int(11) NOT NULL COMMENT 'links to examinations.id',
  `education_subject_id` int(11) NOT NULL DEFAULT '0' COMMENT 'links to education_subjects.id',
  `examination_grading_type_id` int(11) NOT NULL COMMENT 'links to examination_grading_types.id',
  `modified_user_id` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_user_id` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `examination_item_results`
--

CREATE TABLE `examination_item_results` (
  `examination_item_id` int(11) NOT NULL COMMENT 'links to `examination_items.id',
  `student_id` int(11) NOT NULL COMMENT 'links to security_users.id',
  `id` varchar(64) NOT NULL,
  `marks` decimal(6,2) DEFAULT NULL,
  `academic_period_id` int(11) NOT NULL COMMENT 'links to academic_periods.id',
  `examination_id` int(11) NOT NULL COMMENT 'links to examinations.id',
  `examination_centre_id` int(11) NOT NULL COMMENT 'links to examination_centres.id',
  `education_subject_id` int(11) NOT NULL COMMENT 'links to `education_subjects.id',
  `examination_grading_option_id` int(11) DEFAULT NULL COMMENT 'links to examination_grading_options.id',
  `institution_id` int(11) NOT NULL DEFAULT '0' COMMENT 'links to institutions.id',
  `modified_user_id` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_user_id` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `external_data_source_attributes`
--

CREATE TABLE `external_data_source_attributes` (
  `id` char(36) NOT NULL,
  `external_data_source_type` varchar(50) NOT NULL,
  `attribute_field` varchar(50) NOT NULL,
  `attribute_name` varchar(100) NOT NULL,
  `value` text,
  `modified` datetime DEFAULT NULL,
  `modified_user_id` int(11) DEFAULT NULL,
  `created` datetime NOT NULL,
  `created_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `extracurricular_types`
--

CREATE TABLE `extracurricular_types` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `order` int(3) NOT NULL,
  `visible` int(1) NOT NULL DEFAULT '1',
  `editable` int(1) NOT NULL DEFAULT '1',
  `default` int(1) NOT NULL DEFAULT '0',
  `international_code` varchar(50) DEFAULT NULL,
  `national_code` varchar(50) DEFAULT NULL,
  `modified_user_id` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_user_id` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `fee_types`
--

CREATE TABLE `fee_types` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `order` int(3) NOT NULL,
  `visible` int(1) NOT NULL DEFAULT '1',
  `editable` int(1) NOT NULL DEFAULT '1',
  `default` int(1) NOT NULL DEFAULT '0',
  `international_code` varchar(50) DEFAULT NULL,
  `national_code` varchar(50) DEFAULT NULL,
  `modified_user_id` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_user_id` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `floor_custom_field_values`
--

CREATE TABLE `floor_custom_field_values` (
  `id` char(36) NOT NULL,
  `text_value` varchar(250) DEFAULT NULL,
  `number_value` int(11) DEFAULT NULL,
  `decimal_value` varchar(25) DEFAULT NULL,
  `textarea_value` text,
  `date_value` date DEFAULT NULL,
  `time_value` time DEFAULT NULL,
  `file` longblob,
  `infrastructure_custom_field_id` int(11) NOT NULL,
  `institution_floor_id` int(11) NOT NULL,
  `modified_user_id` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_user_id` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `floor_types`
--

CREATE TABLE `floor_types` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `order` int(3) NOT NULL,
  `visible` int(1) NOT NULL DEFAULT '1',
  `editable` int(1) NOT NULL DEFAULT '1',
  `default` int(1) NOT NULL DEFAULT '0',
  `international_code` varchar(50) DEFAULT NULL,
  `national_code` varchar(50) DEFAULT NULL,
  `modified_user_id` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_user_id` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `genders`
--

CREATE TABLE `genders` (
  `id` int(11) NOT NULL,
  `name` varchar(10) NOT NULL,
  `code` varchar(10) NOT NULL,
  `order` int(11) NOT NULL,
  `created_user_id` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `guardian_relations`
--

CREATE TABLE `guardian_relations` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `order` int(3) NOT NULL,
  `visible` int(1) NOT NULL DEFAULT '1',
  `editable` int(1) NOT NULL DEFAULT '1',
  `default` int(1) NOT NULL DEFAULT '0',
  `international_code` varchar(50) DEFAULT NULL,
  `national_code` varchar(50) DEFAULT NULL,
  `modified_user_id` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_user_id` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `guidance_types`
--

CREATE TABLE `guidance_types` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `order` int(3) NOT NULL,
  `visible` int(1) NOT NULL DEFAULT '1',
  `editable` int(1) NOT NULL DEFAULT '1',
  `default` int(1) NOT NULL DEFAULT '0',
  `international_code` varchar(50) DEFAULT NULL,
  `national_code` varchar(50) DEFAULT NULL,
  `modified_user_id` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_user_id` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `health_allergy_types`
--

CREATE TABLE `health_allergy_types` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `order` int(3) NOT NULL,
  `visible` int(1) NOT NULL DEFAULT '1',
  `editable` int(1) NOT NULL DEFAULT '1',
  `default` int(1) NOT NULL DEFAULT '0',
  `international_code` varchar(50) DEFAULT NULL,
  `national_code` varchar(50) DEFAULT NULL,
  `modified_user_id` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_user_id` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `health_conditions`
--

CREATE TABLE `health_conditions` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `order` int(3) NOT NULL,
  `visible` int(1) NOT NULL DEFAULT '1',
  `editable` int(1) NOT NULL DEFAULT '1',
  `default` int(1) NOT NULL DEFAULT '0',
  `international_code` varchar(50) DEFAULT NULL,
  `national_code` varchar(50) DEFAULT NULL,
  `modified_user_id` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_user_id` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `health_consultation_types`
--

CREATE TABLE `health_consultation_types` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `order` int(3) NOT NULL,
  `visible` int(1) NOT NULL DEFAULT '1',
  `editable` int(1) NOT NULL DEFAULT '1',
  `default` int(1) NOT NULL DEFAULT '0',
  `international_code` varchar(50) DEFAULT NULL,
  `national_code` varchar(50) DEFAULT NULL,
  `modified_user_id` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_user_id` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `health_immunization_types`
--

CREATE TABLE `health_immunization_types` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `order` int(3) NOT NULL,
  `visible` int(1) NOT NULL DEFAULT '1',
  `editable` int(1) NOT NULL DEFAULT '1',
  `default` int(1) NOT NULL DEFAULT '0',
  `international_code` varchar(50) DEFAULT NULL,
  `national_code` varchar(50) DEFAULT NULL,
  `modified_user_id` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_user_id` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `health_relationships`
--

CREATE TABLE `health_relationships` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `order` int(3) NOT NULL,
  `visible` int(1) NOT NULL DEFAULT '1',
  `editable` int(1) NOT NULL DEFAULT '1',
  `default` int(1) NOT NULL DEFAULT '0',
  `international_code` varchar(50) DEFAULT NULL,
  `national_code` varchar(50) DEFAULT NULL,
  `modified_user_id` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_user_id` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `health_test_types`
--

CREATE TABLE `health_test_types` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `order` int(3) NOT NULL,
  `visible` int(1) NOT NULL DEFAULT '1',
  `editable` int(1) NOT NULL DEFAULT '1',
  `default` int(1) NOT NULL DEFAULT '0',
  `international_code` varchar(50) DEFAULT NULL,
  `national_code` varchar(50) DEFAULT NULL,
  `modified_user_id` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_user_id` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `identity_types`
--

CREATE TABLE `identity_types` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `validation_pattern` varchar(100) DEFAULT NULL,
  `order` int(3) NOT NULL,
  `visible` int(1) NOT NULL DEFAULT '1',
  `editable` int(1) NOT NULL DEFAULT '1',
  `default` int(1) NOT NULL DEFAULT '0',
  `international_code` varchar(50) DEFAULT NULL,
  `national_code` varchar(50) DEFAULT NULL,
  `modified_user_id` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_user_id` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `idp_google`
--

CREATE TABLE `idp_google` (
  `system_authentication_id` int(11) NOT NULL COMMENT 'links to system_authenticatons.id',
  `client_id` varchar(150) NOT NULL,
  `client_secret` varchar(150) NOT NULL,
  `redirect_uri` varchar(150) NOT NULL,
  `hd` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `idp_oauth`
--

CREATE TABLE `idp_oauth` (
  `system_authentication_id` int(11) NOT NULL COMMENT 'links to system_authenticatons.id',
  `client_id` varchar(150) NOT NULL,
  `client_secret` varchar(150) NOT NULL,
  `redirect_uri` varchar(200) NOT NULL,
  `well_known_uri` varchar(200) DEFAULT NULL,
  `authorization_endpoint` varchar(200) NOT NULL,
  `token_endpoint` varchar(200) NOT NULL,
  `userinfo_endpoint` varchar(200) NOT NULL,
  `issuer` varchar(200) NOT NULL,
  `jwks_uri` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `idp_saml`
--

CREATE TABLE `idp_saml` (
  `system_authentication_id` int(11) NOT NULL COMMENT 'links to system_authenticatons.id',
  `idp_entity_id` varchar(200) NOT NULL,
  `idp_sso` varchar(200) NOT NULL,
  `idp_sso_binding` varchar(100) NOT NULL,
  `idp_slo` varchar(200) NOT NULL,
  `idp_slo_binding` varchar(100) NOT NULL,
  `idp_x509cert` text NOT NULL,
  `idp_cert_fingerprint` varchar(100) DEFAULT NULL,
  `idp_cert_fingerprint_algorithm` varchar(10) DEFAULT NULL,
  `sp_entity_id` varchar(200) NOT NULL,
  `sp_acs` varchar(200) NOT NULL,
  `sp_slo` varchar(100) NOT NULL,
  `sp_name_id_format` varchar(100) DEFAULT NULL,
  `sp_private_key` text,
  `sp_metadata` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `import_mapping`
--

CREATE TABLE `import_mapping` (
  `id` int(11) NOT NULL,
  `model` varchar(50) NOT NULL,
  `column_name` varchar(50) NOT NULL,
  `description` varchar(50) DEFAULT NULL,
  `order` int(11) DEFAULT '0',
  `is_optional` int(1) NOT NULL DEFAULT '0',
  `foreign_key` int(11) DEFAULT '0' COMMENT '0: not foreign key, 1: field options, 2: direct table, 3: non-table list, 4: custom',
  `lookup_plugin` varchar(50) DEFAULT NULL,
  `lookup_model` varchar(50) DEFAULT NULL,
  `lookup_column` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `indexes`
--

CREATE TABLE `indexes` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `academic_period_id` int(11) NOT NULL COMMENT 'links to academic_periods.id',
  `modified_user_id` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_user_id` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `indexes_criterias`
--

CREATE TABLE `indexes_criterias` (
  `id` int(11) NOT NULL,
  `criteria` varchar(50) NOT NULL,
  `operator` int(3) NOT NULL,
  `threshold` int(3) NOT NULL,
  `index_value` int(2) NOT NULL,
  `index_id` int(3) NOT NULL COMMENT 'links to indexes.id',
  `modified_user_id` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_user_id` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `infrastructure_conditions`
--

CREATE TABLE `infrastructure_conditions` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `order` int(3) NOT NULL,
  `visible` int(1) NOT NULL DEFAULT '1',
  `editable` int(1) NOT NULL DEFAULT '1',
  `default` int(1) NOT NULL DEFAULT '0',
  `international_code` varchar(50) DEFAULT NULL,
  `national_code` varchar(50) DEFAULT NULL,
  `modified_user_id` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_user_id` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `infrastructure_custom_fields`
--

CREATE TABLE `infrastructure_custom_fields` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `field_type` varchar(100) NOT NULL,
  `is_mandatory` int(1) NOT NULL DEFAULT '0',
  `is_unique` int(1) NOT NULL DEFAULT '0',
  `params` text,
  `modified_user_id` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_user_id` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `infrastructure_custom_field_options`
--

CREATE TABLE `infrastructure_custom_field_options` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `is_default` int(1) NOT NULL DEFAULT '0',
  `visible` int(1) NOT NULL DEFAULT '1',
  `order` int(3) NOT NULL DEFAULT '0',
  `infrastructure_custom_field_id` int(11) NOT NULL COMMENT 'links to infrastructure_custom_fields.id',
  `modified_user_id` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_user_id` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `infrastructure_custom_forms`
--

CREATE TABLE `infrastructure_custom_forms` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `description` text,
  `custom_module_id` int(11) NOT NULL COMMENT 'links to custom_modules.id',
  `modified_user_id` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_user_id` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `infrastructure_custom_forms_fields`
--

CREATE TABLE `infrastructure_custom_forms_fields` (
  `id` char(36) NOT NULL,
  `infrastructure_custom_form_id` int(11) NOT NULL COMMENT 'links to infrastructure_custom_forms.id',
  `infrastructure_custom_field_id` int(11) NOT NULL COMMENT 'links to infrastructure_custom_fields.id',
  `section` varchar(250) DEFAULT NULL,
  `name` varchar(250) DEFAULT NULL,
  `is_mandatory` int(1) NOT NULL DEFAULT '0',
  `is_unique` int(1) NOT NULL DEFAULT '0',
  `order` int(3) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `infrastructure_custom_forms_filters`
--

CREATE TABLE `infrastructure_custom_forms_filters` (
  `id` char(36) NOT NULL,
  `infrastructure_custom_form_id` int(11) NOT NULL COMMENT 'links to infrastructure_custom_forms.id',
  `infrastructure_custom_filter_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `infrastructure_levels`
--

CREATE TABLE `infrastructure_levels` (
  `id` int(11) NOT NULL,
  `code` varchar(100) NOT NULL,
  `name` varchar(250) NOT NULL,
  `description` text,
  `editable` int(11) NOT NULL DEFAULT '1',
  `parent_id` int(11) DEFAULT NULL,
  `lft` int(11) DEFAULT NULL,
  `rght` int(11) DEFAULT NULL,
  `modified_user_id` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_user_id` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `infrastructure_needs`
--

CREATE TABLE `infrastructure_needs` (
  `id` int(11) NOT NULL,
  `code` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text,
  `date_determined` date DEFAULT NULL,
  `date_started` date DEFAULT NULL,
  `date_completed` date DEFAULT NULL,
  `file_name` varchar(250) DEFAULT NULL,
  `file_content` longblob,
  `comment` text,
  `infrastructure_need_type_id` int(11) NOT NULL COMMENT 'links to infrastructure_need_types.id',
  `priority` int(11) NOT NULL COMMENT '1 => High, 2 => Medium, 3 => Low',
  `institution_id` int(11) NOT NULL COMMENT 'links to institutions.id',
  `modified_user_id` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_user_id` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `infrastructure_need_types`
--

CREATE TABLE `infrastructure_need_types` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `order` int(3) NOT NULL,
  `visible` int(1) NOT NULL DEFAULT '1',
  `editable` int(1) NOT NULL DEFAULT '1',
  `default` int(1) NOT NULL DEFAULT '0',
  `international_code` varchar(50) DEFAULT NULL,
  `national_code` varchar(50) DEFAULT NULL,
  `modified_user_id` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_user_id` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `infrastructure_ownerships`
--

CREATE TABLE `infrastructure_ownerships` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `order` int(3) NOT NULL,
  `visible` int(1) NOT NULL DEFAULT '1',
  `editable` int(1) NOT NULL DEFAULT '1',
  `default` int(1) NOT NULL DEFAULT '0',
  `international_code` varchar(50) DEFAULT NULL,
  `national_code` varchar(50) DEFAULT NULL,
  `modified_user_id` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_user_id` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `infrastructure_projects`
--

CREATE TABLE `infrastructure_projects` (
  `id` int(11) NOT NULL,
  `code` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text,
  `funding_source_description` text,
  `contract_date` date DEFAULT NULL,
  `contract_amount` decimal(50,2) DEFAULT NULL,
  `status` int(11) NOT NULL COMMENT '1 => Active, 2 => Inactive',
  `date_started` date DEFAULT NULL,
  `date_completed` date DEFAULT NULL,
  `file_name` varchar(250) DEFAULT NULL,
  `file_content` longblob,
  `comment` text,
  `infrastructure_project_funding_source_id` int(11) NOT NULL COMMENT 'links to infrastructure_project_funding_sources.id',
  `institution_id` int(11) NOT NULL COMMENT 'links to institutions.id',
  `modified_user_id` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_user_id` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `infrastructure_projects_needs`
--

CREATE TABLE `infrastructure_projects_needs` (
  `infrastructure_project_id` int(11) NOT NULL COMMENT 'links to infrastructure_projects.id',
  `infrastructure_need_id` int(11) NOT NULL COMMENT 'links to infrastructure_needs.id',
  `id` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `infrastructure_project_funding_sources`
--

CREATE TABLE `infrastructure_project_funding_sources` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `order` int(3) NOT NULL,
  `visible` int(1) NOT NULL DEFAULT '1',
  `editable` int(1) NOT NULL DEFAULT '1',
  `default` int(1) NOT NULL DEFAULT '0',
  `international_code` varchar(50) DEFAULT NULL,
  `national_code` varchar(50) DEFAULT NULL,
  `modified_user_id` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_user_id` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `infrastructure_statuses`
--

CREATE TABLE `infrastructure_statuses` (
  `id` int(11) NOT NULL,
  `code` varchar(100) NOT NULL,
  `name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `infrastructure_utility_electricities`
--

CREATE TABLE `infrastructure_utility_electricities` (
  `id` int(11) NOT NULL,
  `comment` text,
  `academic_period_id` int(11) NOT NULL COMMENT 'links to academic_periods.id',
  `institution_id` int(11) NOT NULL COMMENT 'links to institutions.id',
  `utility_electricity_type_id` int(11) NOT NULL COMMENT 'links to utility_electricity_types.id',
  `utility_electricity_condition_id` int(11) NOT NULL COMMENT 'links to utility_electricity_conditions.id',
  `modified_user_id` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_user_id` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `infrastructure_utility_internets`
--

CREATE TABLE `infrastructure_utility_internets` (
  `id` int(11) NOT NULL,
  `comment` text,
  `internet_purpose` int(11) NOT NULL COMMENT '1 => Teaching, 2 => Non-Teaching',
  `academic_period_id` int(11) NOT NULL COMMENT 'links to academic_periods.id',
  `institution_id` int(11) NOT NULL COMMENT 'links to institutions.id',
  `utility_internet_type_id` int(11) NOT NULL COMMENT 'links to utility_internet_types.id',
  `utility_internet_condition_id` int(11) NOT NULL COMMENT 'links to utility_internet_conditions.id',
  `modified_user_id` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_user_id` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `infrastructure_utility_telephones`
--

CREATE TABLE `infrastructure_utility_telephones` (
  `id` int(11) NOT NULL,
  `comment` text,
  `academic_period_id` int(11) NOT NULL COMMENT 'links to academic_periods.id',
  `institution_id` int(11) NOT NULL COMMENT 'links to institutions.id',
  `utility_telephone_type_id` int(11) NOT NULL COMMENT 'links to utility_telephone_types.id',
  `utility_telephone_condition_id` int(11) NOT NULL COMMENT 'links to utility_telephone_conditions.id',
  `modified_user_id` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_user_id` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `infrastructure_wash_water_accessibilities`
--

CREATE TABLE `infrastructure_wash_water_accessibilities` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `order` int(3) NOT NULL,
  `visible` int(1) NOT NULL DEFAULT '1',
  `editable` int(1) NOT NULL DEFAULT '1',
  `default` int(1) NOT NULL DEFAULT '0',
  `international_code` varchar(50) DEFAULT NULL,
  `national_code` varchar(50) DEFAULT NULL,
  `modified_user_id` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_user_id` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `infrastructure_wash_water_functionalities`
--

CREATE TABLE `infrastructure_wash_water_functionalities` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `order` int(3) NOT NULL,
  `visible` int(1) NOT NULL DEFAULT '1',
  `editable` int(1) NOT NULL DEFAULT '1',
  `default` int(1) NOT NULL DEFAULT '0',
  `international_code` varchar(50) DEFAULT NULL,
  `national_code` varchar(50) DEFAULT NULL,
  `modified_user_id` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_user_id` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `infrastructure_wash_water_proximities`
--

CREATE TABLE `infrastructure_wash_water_proximities` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `order` int(3) NOT NULL,
  `visible` int(1) NOT NULL DEFAULT '1',
  `editable` int(1) NOT NULL DEFAULT '1',
  `default` int(1) NOT NULL DEFAULT '0',
  `international_code` varchar(50) DEFAULT NULL,
  `national_code` varchar(50) DEFAULT NULL,
  `modified_user_id` int(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_user_id` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `phinxlog`
--

CREATE TABLE `phinxlog` (
  `version` bigint(20) NOT NULL,
  `migration_name` varchar(100) DEFAULT NULL,
  `start_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `end_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `breakpoint` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absence_types`
--
ALTER TABLE `absence_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `academic_periods`
--
ALTER TABLE `academic_periods`
  ADD PRIMARY KEY (`id`),
  ADD KEY `current` (`current`),
  ADD KEY `visible` (`visible`),
  ADD KEY `editable` (`editable`),
  ADD KEY `parent_id` (`parent_id`),
  ADD KEY `academic_period_level_id` (`academic_period_level_id`);

--
-- Indexes for table `academic_period_levels`
--
ALTER TABLE `academic_period_levels`
  ADD PRIMARY KEY (`id`),
  ADD KEY `editable` (`editable`);

--
-- Indexes for table `alerts`
--
ALTER TABLE `alerts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `alerts_roles`
--
ALTER TABLE `alerts_roles`
  ADD PRIMARY KEY (`alert_rule_id`,`security_role_id`),
  ADD KEY `alert_rule_id` (`alert_rule_id`),
  ADD KEY `security_role_id` (`security_role_id`),
  ADD KEY `alert_rule_id_2` (`alert_rule_id`);

--
-- Indexes for table `alert_logs`
--
ALTER TABLE `alert_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_user_id` (`created_user_id`),
  ADD KEY `method` (`method`),
  ADD KEY `created_user_id_2` (`created_user_id`);

--
-- Indexes for table `alert_rules`
--
ALTER TABLE `alert_rules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `api_authorizations`
--
ALTER TABLE `api_authorizations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `security_token` (`security_token`);

--
-- Indexes for table `api_credentials`
--
ALTER TABLE `api_credentials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `area_level_id` (`area_level_id`),
  ADD KEY `parent_id` (`parent_id`);

--
-- Indexes for table `area_administratives`
--
ALTER TABLE `area_administratives`
  ADD PRIMARY KEY (`id`),
  ADD KEY `area_administrative_level_id` (`area_administrative_level_id`),
  ADD KEY `parent_id` (`parent_id`);

--
-- Indexes for table `area_administrative_levels`
--
ALTER TABLE `area_administrative_levels`
  ADD PRIMARY KEY (`id`),
  ADD KEY `area_administrative_id` (`area_administrative_id`);

--
-- Indexes for table `area_levels`
--
ALTER TABLE `area_levels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assessments`
--
ALTER TABLE `assessments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `academic_period_id` (`academic_period_id`),
  ADD KEY `education_grade_id` (`education_grade_id`),
  ADD KEY `modified_user_id` (`modified_user_id`),
  ADD KEY `created_user_id` (`created_user_id`);

--
-- Indexes for table `assessment_grading_options`
--
ALTER TABLE `assessment_grading_options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `assessment_grading_type_id` (`assessment_grading_type_id`),
  ADD KEY `modified_user_id` (`modified_user_id`),
  ADD KEY `created_user_id` (`created_user_id`);

--
-- Indexes for table `assessment_grading_types`
--
ALTER TABLE `assessment_grading_types`
  ADD PRIMARY KEY (`id`),
  ADD KEY `code` (`code`),
  ADD KEY `modified_user_id` (`modified_user_id`),
  ADD KEY `created_user_id` (`created_user_id`);

--
-- Indexes for table `assessment_items`
--
ALTER TABLE `assessment_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `assessment_id` (`assessment_id`),
  ADD KEY `education_subject_id` (`education_subject_id`),
  ADD KEY `modified_user_id` (`modified_user_id`),
  ADD KEY `created_user_id` (`created_user_id`);

--
-- Indexes for table `assessment_items_grading_types`
--
ALTER TABLE `assessment_items_grading_types`
  ADD PRIMARY KEY (`education_subject_id`,`assessment_grading_type_id`,`assessment_id`,`assessment_period_id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `modified_user_id` (`modified_user_id`),
  ADD KEY `created_user_id` (`created_user_id`),
  ADD KEY `assessment_grading_type_id` (`assessment_grading_type_id`),
  ADD KEY `assessment_id` (`assessment_id`),
  ADD KEY `education_subject_id` (`education_subject_id`),
  ADD KEY `assessment_period_id` (`assessment_period_id`);

--
-- Indexes for table `assessment_item_results`
--
ALTER TABLE `assessment_item_results`
  ADD PRIMARY KEY (`student_id`,`assessment_id`,`education_subject_id`,`education_grade_id`,`academic_period_id`,`assessment_period_id`),
  ADD KEY `assessment_grading_option_id` (`assessment_grading_option_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `assessment_id` (`assessment_id`),
  ADD KEY `education_subject_id` (`education_subject_id`),
  ADD KEY `education_grade_id` (`education_grade_id`),
  ADD KEY `academic_period_id` (`academic_period_id`),
  ADD KEY `assessment_period_id` (`assessment_period_id`),
  ADD KEY `institution_id` (`institution_id`),
  ADD KEY `modified_user_id` (`modified_user_id`),
  ADD KEY `created_user_id` (`created_user_id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `assessment_periods`
--
ALTER TABLE `assessment_periods`
  ADD PRIMARY KEY (`id`),
  ADD KEY `assessment_id` (`assessment_id`),
  ADD KEY `modified_user_id` (`modified_user_id`),
  ADD KEY `created_user_id` (`created_user_id`);

--
-- Indexes for table `authentication_types`
--
ALTER TABLE `authentication_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bank_branches`
--
ALTER TABLE `bank_branches`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bank_id` (`bank_id`);

--
-- Indexes for table `behaviour_classifications`
--
ALTER TABLE `behaviour_classifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `building_custom_field_values`
--
ALTER TABLE `building_custom_field_values`
  ADD PRIMARY KEY (`id`),
  ADD KEY `infrastructure_custom_field_id` (`infrastructure_custom_field_id`),
  ADD KEY `number_value` (`number_value`),
  ADD KEY `institution_building_id` (`institution_building_id`),
  ADD KEY `modified_user_id` (`modified_user_id`),
  ADD KEY `created_user_id` (`created_user_id`);

--
-- Indexes for table `building_types`
--
ALTER TABLE `building_types`
  ADD PRIMARY KEY (`id`),
  ADD KEY `modified_user_id` (`modified_user_id`),
  ADD KEY `created_user_id` (`created_user_id`);

--
-- Indexes for table `bus_types`
--
ALTER TABLE `bus_types`
  ADD PRIMARY KEY (`id`),
  ADD KEY `modified_user_id` (`modified_user_id`),
  ADD KEY `created_user_id` (`created_user_id`);

--
-- Indexes for table `comment_types`
--
ALTER TABLE `comment_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `competencies`
--
ALTER TABLE `competencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `competency_criterias`
--
ALTER TABLE `competency_criterias`
  ADD PRIMARY KEY (`id`,`academic_period_id`,`competency_item_id`,`competency_template_id`),
  ADD KEY `id` (`id`),
  ADD KEY `academic_period_id` (`academic_period_id`),
  ADD KEY `competency_item_id` (`competency_item_id`),
  ADD KEY `competency_template_id` (`competency_template_id`),
  ADD KEY `competency_grading_type_id` (`competency_grading_type_id`),
  ADD KEY `modified_user_id` (`modified_user_id`),
  ADD KEY `created_user_id` (`created_user_id`);

--
-- Indexes for table `competency_grading_options`
--
ALTER TABLE `competency_grading_options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `competency_grading_type_id` (`competency_grading_type_id`),
  ADD KEY `modified_user_id` (`modified_user_id`),
  ADD KEY `created_user_id` (`created_user_id`);

--
-- Indexes for table `competency_grading_types`
--
ALTER TABLE `competency_grading_types`
  ADD PRIMARY KEY (`id`),
  ADD KEY `code` (`code`),
  ADD KEY `modified_user_id` (`modified_user_id`),
  ADD KEY `created_user_id` (`created_user_id`);

--
-- Indexes for table `competency_items`
--
ALTER TABLE `competency_items`
  ADD PRIMARY KEY (`id`,`academic_period_id`,`competency_template_id`),
  ADD KEY `id` (`id`),
  ADD KEY `academic_period_id` (`academic_period_id`),
  ADD KEY `competency_template_id` (`competency_template_id`),
  ADD KEY `modified_user_id` (`modified_user_id`),
  ADD KEY `created_user_id` (`created_user_id`);

--
-- Indexes for table `competency_items_periods`
--
ALTER TABLE `competency_items_periods`
  ADD PRIMARY KEY (`competency_item_id`,`competency_period_id`,`academic_period_id`,`competency_template_id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `id_2` (`id`),
  ADD KEY `competency_item_id` (`competency_item_id`),
  ADD KEY `competency_period_id` (`competency_period_id`),
  ADD KEY `academic_period_id` (`academic_period_id`),
  ADD KEY `competency_template_id` (`competency_template_id`),
  ADD KEY `modified_user_id` (`modified_user_id`),
  ADD KEY `created_user_id` (`created_user_id`);

--
-- Indexes for table `competency_periods`
--
ALTER TABLE `competency_periods`
  ADD PRIMARY KEY (`id`,`academic_period_id`),
  ADD KEY `id` (`id`),
  ADD KEY `academic_period_id` (`academic_period_id`),
  ADD KEY `competency_template_id` (`competency_template_id`),
  ADD KEY `modified_user_id` (`modified_user_id`),
  ADD KEY `created_user_id` (`created_user_id`);

--
-- Indexes for table `competency_sets`
--
ALTER TABLE `competency_sets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `competency_sets_competencies`
--
ALTER TABLE `competency_sets_competencies`
  ADD PRIMARY KEY (`competency_id`,`competency_set_id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `competency_id` (`competency_id`),
  ADD KEY `competency_set_id` (`competency_set_id`);

--
-- Indexes for table `competency_templates`
--
ALTER TABLE `competency_templates`
  ADD PRIMARY KEY (`id`,`academic_period_id`),
  ADD KEY `id` (`id`),
  ADD KEY `academic_period_id` (`academic_period_id`),
  ADD KEY `education_grade_id` (`education_grade_id`),
  ADD KEY `modified_user_id` (`modified_user_id`),
  ADD KEY `created_user_id` (`created_user_id`);

--
-- Indexes for table `config_attachments`
--
ALTER TABLE `config_attachments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `config_items`
--
ALTER TABLE `config_items`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `config_item_options`
--
ALTER TABLE `config_item_options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `config_product_lists`
--
ALTER TABLE `config_product_lists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_options`
--
ALTER TABLE `contact_options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_types`
--
ALTER TABLE `contact_types`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contact_option_id` (`contact_option_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `custom_fields`
--
ALTER TABLE `custom_fields`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `custom_field_options`
--
ALTER TABLE `custom_field_options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `custom_field_id` (`custom_field_id`);

--
-- Indexes for table `custom_field_types`
--
ALTER TABLE `custom_field_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `custom_field_values`
--
ALTER TABLE `custom_field_values`
  ADD PRIMARY KEY (`id`),
  ADD KEY `number_value` (`number_value`),
  ADD KEY `custom_field_id` (`custom_field_id`),
  ADD KEY `custom_record_id` (`custom_record_id`),
  ADD KEY `modified_user_id` (`modified_user_id`),
  ADD KEY `created_user_id` (`created_user_id`);

--
-- Indexes for table `custom_forms`
--
ALTER TABLE `custom_forms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `custom_module_id` (`custom_module_id`);

--
-- Indexes for table `custom_forms_fields`
--
ALTER TABLE `custom_forms_fields`
  ADD PRIMARY KEY (`id`),
  ADD KEY `custom_field_id` (`custom_field_id`),
  ADD KEY `custom_form_id` (`custom_form_id`);

--
-- Indexes for table `custom_forms_filters`
--
ALTER TABLE `custom_forms_filters`
  ADD PRIMARY KEY (`id`),
  ADD KEY `custom_filter_id` (`custom_filter_id`),
  ADD KEY `custom_form_id` (`custom_form_id`);

--
-- Indexes for table `custom_modules`
--
ALTER TABLE `custom_modules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent_id` (`parent_id`);

--
-- Indexes for table `custom_records`
--
ALTER TABLE `custom_records`
  ADD PRIMARY KEY (`id`),
  ADD KEY `custom_form_id` (`custom_form_id`);

--
-- Indexes for table `custom_table_cells`
--
ALTER TABLE `custom_table_cells`
  ADD PRIMARY KEY (`id`),
  ADD KEY `custom_field_id` (`custom_field_id`),
  ADD KEY `custom_record_id` (`custom_record_id`),
  ADD KEY `custom_table_column_id` (`custom_table_column_id`),
  ADD KEY `custom_table_row_id` (`custom_table_row_id`);

--
-- Indexes for table `custom_table_columns`
--
ALTER TABLE `custom_table_columns`
  ADD PRIMARY KEY (`id`),
  ADD KEY `custom_field_id` (`custom_field_id`);

--
-- Indexes for table `custom_table_rows`
--
ALTER TABLE `custom_table_rows`
  ADD PRIMARY KEY (`id`),
  ADD KEY `custom_field_id` (`custom_field_id`);

--
-- Indexes for table `deleted_records`
--
ALTER TABLE `deleted_records`
  ADD PRIMARY KEY (`id`,`deleted_date`),
  ADD KEY `reference_table` (`reference_table`),
  ADD KEY `deleted_date` (`deleted_date`),
  ADD KEY `created_user_id` (`created_user_id`);

--
-- Indexes for table `education_certifications`
--
ALTER TABLE `education_certifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `education_cycles`
--
ALTER TABLE `education_cycles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `education_level_id` (`education_level_id`);

--
-- Indexes for table `education_field_of_studies`
--
ALTER TABLE `education_field_of_studies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `education_programme_orientation_id` (`education_programme_orientation_id`);

--
-- Indexes for table `education_grades`
--
ALTER TABLE `education_grades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `education_stage_id` (`education_stage_id`),
  ADD KEY `education_programme_id` (`education_programme_id`),
  ADD KEY `modified_user_id` (`modified_user_id`),
  ADD KEY `created_user_id` (`created_user_id`);

--
-- Indexes for table `education_grades_subjects`
--
ALTER TABLE `education_grades_subjects`
  ADD PRIMARY KEY (`education_grade_id`,`education_subject_id`),
  ADD KEY `education_grade_id` (`education_grade_id`),
  ADD KEY `education_subject_id` (`education_subject_id`),
  ADD KEY `modified_user_id` (`modified_user_id`),
  ADD KEY `created_user_id` (`created_user_id`);

--
-- Indexes for table `education_levels`
--
ALTER TABLE `education_levels`
  ADD PRIMARY KEY (`id`),
  ADD KEY `education_level_isced_id` (`education_level_isced_id`),
  ADD KEY `education_system_id` (`education_system_id`);

--
-- Indexes for table `education_level_isced`
--
ALTER TABLE `education_level_isced`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `education_programmes`
--
ALTER TABLE `education_programmes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `education_certification_id` (`education_certification_id`),
  ADD KEY `education_cycle_id` (`education_cycle_id`),
  ADD KEY `education_field_of_study_id` (`education_field_of_study_id`);

--
-- Indexes for table `education_programmes_next_programmes`
--
ALTER TABLE `education_programmes_next_programmes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `education_programme_id` (`education_programme_id`),
  ADD KEY `next_programme_id` (`next_programme_id`);

--
-- Indexes for table `education_programme_orientations`
--
ALTER TABLE `education_programme_orientations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `education_stages`
--
ALTER TABLE `education_stages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `modified_user_id` (`modified_user_id`),
  ADD KEY `created_user_id` (`created_user_id`);

--
-- Indexes for table `education_subjects`
--
ALTER TABLE `education_subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `education_subjects_field_of_studies`
--
ALTER TABLE `education_subjects_field_of_studies`
  ADD PRIMARY KEY (`education_subject_id`,`education_field_of_study_id`),
  ADD KEY `education_subject_id` (`education_subject_id`),
  ADD KEY `education_field_of_study_id` (`education_field_of_study_id`),
  ADD KEY `modified_user_id` (`modified_user_id`),
  ADD KEY `created_user_id` (`created_user_id`);

--
-- Indexes for table `education_systems`
--
ALTER TABLE `education_systems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employment_types`
--
ALTER TABLE `employment_types`
  ADD PRIMARY KEY (`id`),
  ADD KEY `modified_user_id` (`modified_user_id`),
  ADD KEY `created_user_id` (`created_user_id`);

--
-- Indexes for table `examinations`
--
ALTER TABLE `examinations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `academic_period_id` (`academic_period_id`),
  ADD KEY `education_grade_id` (`education_grade_id`),
  ADD KEY `modified_user_id` (`modified_user_id`),
  ADD KEY `created_user_id` (`created_user_id`);

--
-- Indexes for table `examination_centres`
--
ALTER TABLE `examination_centres`
  ADD PRIMARY KEY (`id`),
  ADD KEY `institution_id` (`institution_id`),
  ADD KEY `area_id` (`area_id`),
  ADD KEY `academic_period_id` (`academic_period_id`),
  ADD KEY `modified_user_id` (`modified_user_id`),
  ADD KEY `created_user_id` (`created_user_id`);

--
-- Indexes for table `examination_centres_examinations`
--
ALTER TABLE `examination_centres_examinations`
  ADD PRIMARY KEY (`examination_centre_id`,`examination_id`),
  ADD KEY `examination_centre_id` (`examination_centre_id`),
  ADD KEY `examination_id` (`examination_id`),
  ADD KEY `academic_period_id` (`academic_period_id`),
  ADD KEY `created_user_id` (`created_user_id`);

--
-- Indexes for table `examination_centres_examinations_institutions`
--
ALTER TABLE `examination_centres_examinations_institutions`
  ADD PRIMARY KEY (`examination_centre_id`,`examination_id`,`institution_id`),
  ADD KEY `examination_centre_id` (`examination_centre_id`),
  ADD KEY `examination_id` (`examination_id`),
  ADD KEY `institution_id` (`institution_id`),
  ADD KEY `created_user_id` (`created_user_id`);

--
-- Indexes for table `examination_centres_examinations_invigilators`
--
ALTER TABLE `examination_centres_examinations_invigilators`
  ADD PRIMARY KEY (`examination_centre_id`,`examination_id`,`invigilator_id`),
  ADD KEY `examination_centre_id` (`examination_centre_id`),
  ADD KEY `examination_id` (`examination_id`),
  ADD KEY `invigilator_id` (`invigilator_id`),
  ADD KEY `created_user_id` (`created_user_id`);

--
-- Indexes for table `examination_centres_examinations_students`
--
ALTER TABLE `examination_centres_examinations_students`
  ADD PRIMARY KEY (`examination_centre_id`,`examination_id`,`student_id`),
  ADD KEY `examination_centre_id` (`examination_centre_id`),
  ADD KEY `examination_id` (`examination_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `institution_id` (`institution_id`),
  ADD KEY `academic_period_id` (`academic_period_id`),
  ADD KEY `modified_user_id` (`modified_user_id`),
  ADD KEY `created_user_id` (`created_user_id`);

--
-- Indexes for table `examination_centres_examinations_subjects`
--
ALTER TABLE `examination_centres_examinations_subjects`
  ADD PRIMARY KEY (`examination_centre_id`,`examination_item_id`),
  ADD KEY `examination_centre_id` (`examination_centre_id`),
  ADD KEY `examination_item_id` (`examination_item_id`),
  ADD KEY `education_subject_id` (`education_subject_id`),
  ADD KEY `examination_id` (`examination_id`),
  ADD KEY `created_user_id` (`created_user_id`);

--
-- Indexes for table `examination_centres_examinations_subjects_students`
--
ALTER TABLE `examination_centres_examinations_subjects_students`
  ADD PRIMARY KEY (`examination_centre_id`,`examination_item_id`,`student_id`),
  ADD KEY `examination_centre_id` (`examination_centre_id`),
  ADD KEY `examination_item_id` (`examination_item_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `examination_id` (`examination_id`),
  ADD KEY `education_subject_id` (`education_subject_id`),
  ADD KEY `created_user_id` (`created_user_id`);

--
-- Indexes for table `examination_centre_rooms`
--
ALTER TABLE `examination_centre_rooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `examination_centre_id` (`examination_centre_id`),
  ADD KEY `modified_user_id` (`modified_user_id`),
  ADD KEY `created_user_id` (`created_user_id`);

--
-- Indexes for table `examination_centre_rooms_examinations`
--
ALTER TABLE `examination_centre_rooms_examinations`
  ADD PRIMARY KEY (`examination_centre_room_id`,`examination_id`),
  ADD KEY `examination_centre_room_id` (`examination_centre_room_id`),
  ADD KEY `examination_id` (`examination_id`),
  ADD KEY `examination_centre_id` (`examination_centre_id`),
  ADD KEY `created_user_id` (`created_user_id`);

--
-- Indexes for table `examination_centre_rooms_examinations_invigilators`
--
ALTER TABLE `examination_centre_rooms_examinations_invigilators`
  ADD PRIMARY KEY (`examination_centre_room_id`,`examination_id`,`invigilator_id`),
  ADD KEY `examination_centre_room_id` (`examination_centre_room_id`),
  ADD KEY `examination_id` (`examination_id`),
  ADD KEY `invigilator_id` (`invigilator_id`),
  ADD KEY `examination_centre_id` (`examination_centre_id`),
  ADD KEY `created_user_id` (`created_user_id`);

--
-- Indexes for table `examination_centre_rooms_examinations_students`
--
ALTER TABLE `examination_centre_rooms_examinations_students`
  ADD PRIMARY KEY (`examination_centre_room_id`,`examination_id`,`student_id`),
  ADD KEY `examination_centre_room_id` (`examination_centre_room_id`),
  ADD KEY `examination_id` (`examination_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `examination_centre_id` (`examination_centre_id`),
  ADD KEY `created_user_id` (`created_user_id`);

--
-- Indexes for table `examination_centre_special_needs`
--
ALTER TABLE `examination_centre_special_needs`
  ADD PRIMARY KEY (`examination_centre_id`,`special_need_type_id`),
  ADD KEY `examination_centre_id` (`examination_centre_id`),
  ADD KEY `special_need_type_id` (`special_need_type_id`),
  ADD KEY `created_user_id` (`created_user_id`);

--
-- Indexes for table `examination_grading_options`
--
ALTER TABLE `examination_grading_options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `examination_grading_type_id` (`examination_grading_type_id`),
  ADD KEY `modified_user_id` (`modified_user_id`),
  ADD KEY `created_user_id` (`created_user_id`);

--
-- Indexes for table `examination_grading_types`
--
ALTER TABLE `examination_grading_types`
  ADD PRIMARY KEY (`id`),
  ADD KEY `code` (`code`),
  ADD KEY `modified_user_id` (`modified_user_id`),
  ADD KEY `created_user_id` (`created_user_id`);

--
-- Indexes for table `examination_items`
--
ALTER TABLE `examination_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `examination_id` (`examination_id`),
  ADD KEY `education_subject_id` (`education_subject_id`),
  ADD KEY `examination_grading_type_id` (`examination_grading_type_id`),
  ADD KEY `modified_user_id` (`modified_user_id`),
  ADD KEY `created_user_id` (`created_user_id`);

--
-- Indexes for table `examination_item_results`
--
ALTER TABLE `examination_item_results`
  ADD PRIMARY KEY (`examination_item_id`,`student_id`),
  ADD KEY `examination_item_id` (`examination_item_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `academic_period_id` (`academic_period_id`),
  ADD KEY `examination_id` (`examination_id`),
  ADD KEY `examination_centre_id` (`examination_centre_id`),
  ADD KEY `education_subject_id` (`education_subject_id`),
  ADD KEY `examination_grading_option_id` (`examination_grading_option_id`),
  ADD KEY `institution_id` (`institution_id`),
  ADD KEY `modified_user_id` (`modified_user_id`),
  ADD KEY `created_user_id` (`created_user_id`);

--
-- Indexes for table `external_data_source_attributes`
--
ALTER TABLE `external_data_source_attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `extracurricular_types`
--
ALTER TABLE `extracurricular_types`
  ADD PRIMARY KEY (`id`),
  ADD KEY `modified_user_id` (`modified_user_id`),
  ADD KEY `created_user_id` (`created_user_id`);

--
-- Indexes for table `fee_types`
--
ALTER TABLE `fee_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `floor_custom_field_values`
--
ALTER TABLE `floor_custom_field_values`
  ADD PRIMARY KEY (`id`),
  ADD KEY `infrastructure_custom_field_id` (`infrastructure_custom_field_id`),
  ADD KEY `number_value` (`number_value`),
  ADD KEY `institution_floor_id` (`institution_floor_id`),
  ADD KEY `modified_user_id` (`modified_user_id`),
  ADD KEY `created_user_id` (`created_user_id`);

--
-- Indexes for table `floor_types`
--
ALTER TABLE `floor_types`
  ADD PRIMARY KEY (`id`),
  ADD KEY `modified_user_id` (`modified_user_id`),
  ADD KEY `created_user_id` (`created_user_id`);

--
-- Indexes for table `genders`
--
ALTER TABLE `genders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guardian_relations`
--
ALTER TABLE `guardian_relations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guidance_types`
--
ALTER TABLE `guidance_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `health_allergy_types`
--
ALTER TABLE `health_allergy_types`
  ADD PRIMARY KEY (`id`),
  ADD KEY `modified_user_id` (`modified_user_id`),
  ADD KEY `created_user_id` (`created_user_id`);

--
-- Indexes for table `health_conditions`
--
ALTER TABLE `health_conditions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `modified_user_id` (`modified_user_id`),
  ADD KEY `created_user_id` (`created_user_id`);

--
-- Indexes for table `health_consultation_types`
--
ALTER TABLE `health_consultation_types`
  ADD PRIMARY KEY (`id`),
  ADD KEY `modified_user_id` (`modified_user_id`),
  ADD KEY `created_user_id` (`created_user_id`);

--
-- Indexes for table `health_immunization_types`
--
ALTER TABLE `health_immunization_types`
  ADD PRIMARY KEY (`id`),
  ADD KEY `modified_user_id` (`modified_user_id`),
  ADD KEY `created_user_id` (`created_user_id`);

--
-- Indexes for table `health_relationships`
--
ALTER TABLE `health_relationships`
  ADD PRIMARY KEY (`id`),
  ADD KEY `modified_user_id` (`modified_user_id`),
  ADD KEY `created_user_id` (`created_user_id`);

--
-- Indexes for table `health_test_types`
--
ALTER TABLE `health_test_types`
  ADD PRIMARY KEY (`id`),
  ADD KEY `modified_user_id` (`modified_user_id`),
  ADD KEY `created_user_id` (`created_user_id`);

--
-- Indexes for table `identity_types`
--
ALTER TABLE `identity_types`
  ADD PRIMARY KEY (`id`),
  ADD KEY `modified_user_id` (`modified_user_id`),
  ADD KEY `created_user_id` (`created_user_id`);

--
-- Indexes for table `idp_google`
--
ALTER TABLE `idp_google`
  ADD PRIMARY KEY (`system_authentication_id`);

--
-- Indexes for table `idp_oauth`
--
ALTER TABLE `idp_oauth`
  ADD PRIMARY KEY (`system_authentication_id`);

--
-- Indexes for table `idp_saml`
--
ALTER TABLE `idp_saml`
  ADD PRIMARY KEY (`system_authentication_id`);

--
-- Indexes for table `import_mapping`
--
ALTER TABLE `import_mapping`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `indexes`
--
ALTER TABLE `indexes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `academic_period_id` (`academic_period_id`),
  ADD KEY `modified_user_id` (`modified_user_id`),
  ADD KEY `created_user_id` (`created_user_id`);

--
-- Indexes for table `indexes_criterias`
--
ALTER TABLE `indexes_criterias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `index_id` (`index_id`),
  ADD KEY `modified_user_id` (`modified_user_id`),
  ADD KEY `created_user_id` (`created_user_id`);

--
-- Indexes for table `infrastructure_conditions`
--
ALTER TABLE `infrastructure_conditions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `modified_user_id` (`modified_user_id`),
  ADD KEY `created_user_id` (`created_user_id`);

--
-- Indexes for table `infrastructure_custom_fields`
--
ALTER TABLE `infrastructure_custom_fields`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `infrastructure_custom_field_options`
--
ALTER TABLE `infrastructure_custom_field_options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `infrastructure_custom_field_id` (`infrastructure_custom_field_id`);

--
-- Indexes for table `infrastructure_custom_forms`
--
ALTER TABLE `infrastructure_custom_forms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `custom_module_id` (`custom_module_id`);

--
-- Indexes for table `infrastructure_custom_forms_fields`
--
ALTER TABLE `infrastructure_custom_forms_fields`
  ADD PRIMARY KEY (`id`),
  ADD KEY `infrastructure_custom_field_id` (`infrastructure_custom_field_id`),
  ADD KEY `infrastructure_custom_form_id` (`infrastructure_custom_form_id`);

--
-- Indexes for table `infrastructure_custom_forms_filters`
--
ALTER TABLE `infrastructure_custom_forms_filters`
  ADD PRIMARY KEY (`id`),
  ADD KEY `infrastructure_custom_filter_id` (`infrastructure_custom_filter_id`),
  ADD KEY `infrastructure_custom_form_id` (`infrastructure_custom_form_id`);

--
-- Indexes for table `infrastructure_levels`
--
ALTER TABLE `infrastructure_levels`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent_id` (`parent_id`),
  ADD KEY `modified_user_id` (`modified_user_id`),
  ADD KEY `created_user_id` (`created_user_id`);

--
-- Indexes for table `infrastructure_needs`
--
ALTER TABLE `infrastructure_needs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `priority` (`priority`),
  ADD KEY `infrastructure_need_type_id` (`infrastructure_need_type_id`),
  ADD KEY `institution_id` (`institution_id`),
  ADD KEY `modified_user_id` (`modified_user_id`),
  ADD KEY `created_user_id` (`created_user_id`);

--
-- Indexes for table `infrastructure_need_types`
--
ALTER TABLE `infrastructure_need_types`
  ADD PRIMARY KEY (`id`),
  ADD KEY `modified_user_id` (`modified_user_id`),
  ADD KEY `created_user_id` (`created_user_id`);

--
-- Indexes for table `infrastructure_ownerships`
--
ALTER TABLE `infrastructure_ownerships`
  ADD PRIMARY KEY (`id`),
  ADD KEY `modified_user_id` (`modified_user_id`),
  ADD KEY `created_user_id` (`created_user_id`);

--
-- Indexes for table `infrastructure_projects`
--
ALTER TABLE `infrastructure_projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `status` (`status`),
  ADD KEY `infrastructure_project_funding_source_id` (`infrastructure_project_funding_source_id`),
  ADD KEY `institution_id` (`institution_id`),
  ADD KEY `modified_user_id` (`modified_user_id`),
  ADD KEY `created_user_id` (`created_user_id`);

--
-- Indexes for table `infrastructure_projects_needs`
--
ALTER TABLE `infrastructure_projects_needs`
  ADD PRIMARY KEY (`infrastructure_project_id`,`infrastructure_need_id`),
  ADD KEY `id` (`id`),
  ADD KEY `infrastructure_project_id` (`infrastructure_project_id`),
  ADD KEY `infrastructure_need_id` (`infrastructure_need_id`);

--
-- Indexes for table `infrastructure_project_funding_sources`
--
ALTER TABLE `infrastructure_project_funding_sources`
  ADD PRIMARY KEY (`id`),
  ADD KEY `modified_user_id` (`modified_user_id`),
  ADD KEY `created_user_id` (`created_user_id`);

--
-- Indexes for table `infrastructure_statuses`
--
ALTER TABLE `infrastructure_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `infrastructure_utility_electricities`
--
ALTER TABLE `infrastructure_utility_electricities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `academic_period_id` (`academic_period_id`),
  ADD KEY `institution_id` (`institution_id`),
  ADD KEY `utility_electricity_type_id` (`utility_electricity_type_id`),
  ADD KEY `utility_electricity_condition_id` (`utility_electricity_condition_id`),
  ADD KEY `modified_user_id` (`modified_user_id`),
  ADD KEY `created_user_id` (`created_user_id`);

--
-- Indexes for table `infrastructure_utility_internets`
--
ALTER TABLE `infrastructure_utility_internets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `academic_period_id` (`academic_period_id`),
  ADD KEY `institution_id` (`institution_id`),
  ADD KEY `utility_internet_type_id` (`utility_internet_type_id`),
  ADD KEY `utility_internet_condition_id` (`utility_internet_condition_id`),
  ADD KEY `modified_user_id` (`modified_user_id`),
  ADD KEY `created_user_id` (`created_user_id`);

--
-- Indexes for table `infrastructure_utility_telephones`
--
ALTER TABLE `infrastructure_utility_telephones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `academic_period_id` (`academic_period_id`),
  ADD KEY `institution_id` (`institution_id`),
  ADD KEY `utility_telephone_type_id` (`utility_telephone_type_id`),
  ADD KEY `utility_telephone_condition_id` (`utility_telephone_condition_id`),
  ADD KEY `modified_user_id` (`modified_user_id`),
  ADD KEY `created_user_id` (`created_user_id`);

--
-- Indexes for table `infrastructure_wash_water_accessibilities`
--
ALTER TABLE `infrastructure_wash_water_accessibilities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `modified_user_id` (`modified_user_id`),
  ADD KEY `created_user_id` (`created_user_id`);

--
-- Indexes for table `infrastructure_wash_water_functionalities`
--
ALTER TABLE `infrastructure_wash_water_functionalities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `modified_user_id` (`modified_user_id`),
  ADD KEY `created_user_id` (`created_user_id`);

--
-- Indexes for table `infrastructure_wash_water_proximities`
--
ALTER TABLE `infrastructure_wash_water_proximities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `modified_user_id` (`modified_user_id`),
  ADD KEY `created_user_id` (`created_user_id`);

--
-- Indexes for table `phinxlog`
--
ALTER TABLE `phinxlog`
  ADD PRIMARY KEY (`version`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absence_types`
--
ALTER TABLE `absence_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `academic_periods`
--
ALTER TABLE `academic_periods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `academic_period_levels`
--
ALTER TABLE `academic_period_levels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `alerts`
--
ALTER TABLE `alerts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `alert_logs`
--
ALTER TABLE `alert_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `alert_rules`
--
ALTER TABLE `alert_rules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `api_credentials`
--
ALTER TABLE `api_credentials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `areas`
--
ALTER TABLE `areas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `area_administratives`
--
ALTER TABLE `area_administratives`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `area_administrative_levels`
--
ALTER TABLE `area_administrative_levels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `area_levels`
--
ALTER TABLE `area_levels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `assessments`
--
ALTER TABLE `assessments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `assessment_grading_options`
--
ALTER TABLE `assessment_grading_options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `assessment_grading_types`
--
ALTER TABLE `assessment_grading_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `assessment_periods`
--
ALTER TABLE `assessment_periods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `bank_branches`
--
ALTER TABLE `bank_branches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `behaviour_classifications`
--
ALTER TABLE `behaviour_classifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `building_types`
--
ALTER TABLE `building_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `bus_types`
--
ALTER TABLE `bus_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `comment_types`
--
ALTER TABLE `comment_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `competencies`
--
ALTER TABLE `competencies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `competency_criterias`
--
ALTER TABLE `competency_criterias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `competency_grading_options`
--
ALTER TABLE `competency_grading_options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `competency_grading_types`
--
ALTER TABLE `competency_grading_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `competency_items`
--
ALTER TABLE `competency_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `competency_periods`
--
ALTER TABLE `competency_periods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `competency_sets`
--
ALTER TABLE `competency_sets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `competency_templates`
--
ALTER TABLE `competency_templates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `config_attachments`
--
ALTER TABLE `config_attachments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `config_product_lists`
--
ALTER TABLE `config_product_lists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `contact_options`
--
ALTER TABLE `contact_options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `contact_types`
--
ALTER TABLE `contact_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `custom_fields`
--
ALTER TABLE `custom_fields`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `custom_field_options`
--
ALTER TABLE `custom_field_options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `custom_field_types`
--
ALTER TABLE `custom_field_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `custom_forms`
--
ALTER TABLE `custom_forms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `custom_modules`
--
ALTER TABLE `custom_modules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `custom_records`
--
ALTER TABLE `custom_records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `custom_table_columns`
--
ALTER TABLE `custom_table_columns`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `custom_table_rows`
--
ALTER TABLE `custom_table_rows`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `deleted_records`
--
ALTER TABLE `deleted_records`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `education_certifications`
--
ALTER TABLE `education_certifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `education_cycles`
--
ALTER TABLE `education_cycles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `education_field_of_studies`
--
ALTER TABLE `education_field_of_studies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `education_grades`
--
ALTER TABLE `education_grades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `education_levels`
--
ALTER TABLE `education_levels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `education_level_isced`
--
ALTER TABLE `education_level_isced`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `education_programmes`
--
ALTER TABLE `education_programmes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `education_programme_orientations`
--
ALTER TABLE `education_programme_orientations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `education_stages`
--
ALTER TABLE `education_stages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `education_subjects`
--
ALTER TABLE `education_subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `education_systems`
--
ALTER TABLE `education_systems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `employment_types`
--
ALTER TABLE `employment_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `examinations`
--
ALTER TABLE `examinations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `examination_centres`
--
ALTER TABLE `examination_centres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `examination_centre_rooms`
--
ALTER TABLE `examination_centre_rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `examination_grading_options`
--
ALTER TABLE `examination_grading_options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `examination_grading_types`
--
ALTER TABLE `examination_grading_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `examination_items`
--
ALTER TABLE `examination_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `extracurricular_types`
--
ALTER TABLE `extracurricular_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fee_types`
--
ALTER TABLE `fee_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `floor_types`
--
ALTER TABLE `floor_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `genders`
--
ALTER TABLE `genders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `guardian_relations`
--
ALTER TABLE `guardian_relations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `guidance_types`
--
ALTER TABLE `guidance_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `health_allergy_types`
--
ALTER TABLE `health_allergy_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `health_conditions`
--
ALTER TABLE `health_conditions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `health_consultation_types`
--
ALTER TABLE `health_consultation_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `health_immunization_types`
--
ALTER TABLE `health_immunization_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `health_relationships`
--
ALTER TABLE `health_relationships`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `health_test_types`
--
ALTER TABLE `health_test_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `identity_types`
--
ALTER TABLE `identity_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `import_mapping`
--
ALTER TABLE `import_mapping`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `indexes`
--
ALTER TABLE `indexes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `indexes_criterias`
--
ALTER TABLE `indexes_criterias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `infrastructure_conditions`
--
ALTER TABLE `infrastructure_conditions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `infrastructure_custom_fields`
--
ALTER TABLE `infrastructure_custom_fields`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `infrastructure_custom_field_options`
--
ALTER TABLE `infrastructure_custom_field_options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `infrastructure_custom_forms`
--
ALTER TABLE `infrastructure_custom_forms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `infrastructure_levels`
--
ALTER TABLE `infrastructure_levels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `infrastructure_needs`
--
ALTER TABLE `infrastructure_needs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `infrastructure_need_types`
--
ALTER TABLE `infrastructure_need_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `infrastructure_ownerships`
--
ALTER TABLE `infrastructure_ownerships`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `infrastructure_projects`
--
ALTER TABLE `infrastructure_projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `infrastructure_project_funding_sources`
--
ALTER TABLE `infrastructure_project_funding_sources`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `infrastructure_statuses`
--
ALTER TABLE `infrastructure_statuses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `infrastructure_utility_electricities`
--
ALTER TABLE `infrastructure_utility_electricities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `infrastructure_utility_internets`
--
ALTER TABLE `infrastructure_utility_internets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `infrastructure_utility_telephones`
--
ALTER TABLE `infrastructure_utility_telephones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `infrastructure_wash_water_accessibilities`
--
ALTER TABLE `infrastructure_wash_water_accessibilities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `infrastructure_wash_water_functionalities`
--
ALTER TABLE `infrastructure_wash_water_functionalities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `infrastructure_wash_water_proximities`
--
ALTER TABLE `infrastructure_wash_water_proximities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
