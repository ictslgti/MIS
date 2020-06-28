-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 28, 2020 at 02:44 PM
-- Server version: 5.7.30-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mis`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`misuser`@`%` PROCEDURE `academic` ()  NO SQL
BEGIN
SELECT * FROM academic;
END$$

CREATE DEFINER=`misuser`@`%` PROCEDURE `add_department` (IN `did` VARCHAR(10), IN `dname` VARCHAR(60))  begin 
INSERT INTO `department` (`department_id`,`department_name`) VALUES (did,dname);
END$$

CREATE DEFINER=`misuser`@`%` PROCEDURE `batch` ()  BEGIN
SELECT * FROM batch;
END$$

CREATE DEFINER=`misuser`@`%` PROCEDURE `chat_group` ()  BEGIN
SELECT * FROM `chat_group`;
END$$

CREATE DEFINER=`misuser`@`%` PROCEDURE `department` ()  BEGIN
SELECT * FROM department;
END$$

CREATE DEFINER=`misuser`@`%` PROCEDURE `feedback_done` (IN `suid` INT(11), IN `stid` VARCHAR(20), IN `sdate` DATE, IN `stime` TIME)  NO SQL
BEGIN
INSERT into feedback_done(survey_id,student_id,s_date,s_time) 
VALUES(suid,stid,sdate,stime);
END$$

CREATE DEFINER=`misuser`@`%` PROCEDURE `feedback_survey` (IN `suid` INT(11), IN `did` VARCHAR(6), IN `ayear` VARCHAR(11), IN `cid` VARCHAR(11), IN `mid` VARCHAR(11), IN `sid` VARCHAR(64), IN `sdate` DATE, IN `edate` DATE)  NO SQL
BEGIN
insert into feedback_survey(survey_id,department_id,academic_year,course_id,module_id,staff_id,start_date,end_date) VALUES(suid,did,ayear,cid,mid,sid,sdate,edate);
END$$

CREATE DEFINER=`misuser`@`%` PROCEDURE `food` ()  BEGIN
    SELECT *  FROM food;
END$$

CREATE DEFINER=`misuser`@`%` PROCEDURE `getCourse` ()  NO SQL
BEGIN
SELECT * FROM `course`;
END$$

CREATE DEFINER=`misuser`@`%` PROCEDURE `getin` ()  BEGIN
  SELECT * FROM `pays` ORDER BY `pays_id` DESC;
END$$

CREATE DEFINER=`misuser`@`%` PROCEDURE `insertdata` (`Student_name` VARCHAR(100), `Student_id` VARCHAR(20), `Department` VARCHAR(100), `Contact_no` INT(11), `Reason` VARCHAR(20), `Exit_date` DATE, `Exit_time` TIME, `Return_date` DATE, `Return_time` TIME, `Comment` TEXT)  BEGIN
INSERT INTO onpeak_request (student_name,student_id,department,contact_no,reason,exit_date,exit_time,return_date,return_time,comment) VALUES (Student_name, Studetn_id,Department,Contact_no,Reason,Exit_date,Exit_time,Return_date,Return_time,Comment); 
END$$

CREATE DEFINER=`misuser`@`%` PROCEDURE `manage_final_place` ()  BEGIN
SELECT * FROM manage_final_place;
END$$

CREATE DEFINER=`misuser`@`%` PROCEDURE `notice_insert` (IN `eid` INT(11), IN `ename` VARCHAR(255), IN `evenue` VARCHAR(255), IN `edate` DATE, IN `echiefguest` VARCHAR(255))  NO SQL
BEGIN
INSERT INTO notice_event(event_id,event_name,event_venue,event_date,event_chief_guest,event_date) 
VALUES(eid,ename,evenue,edate,echiefguest);
END$$

CREATE DEFINER=`misuser`@`%` PROCEDURE `notice_result` (IN `rid` INT(11), IN `did` VARCHAR(6), IN `ayear` VARCHAR(11), IN `cid` VARCHAR(11), IN `mid` VARCHAR(11), IN `uplod` VARCHAR(30))  NO SQL
BEGIN
insert INTO
notice_result(result_id,department_id,academic_year,course_id,module_id,upload)
VALUES(rid,did,ayear,cid,mid,uplod);
END$$

CREATE DEFINER=`misuser`@`%` PROCEDURE `notice_update` (IN `e_name` VARCHAR(255), IN `e_venue` VARCHAR(255), IN `e_chiefguest` VARCHAR(30), IN `e_id` INT(11), IN `e_date` DATE, IN `e_comment` VARCHAR(255))  NO SQL
BEGIN 
UPDATE notice_event SET event_name=e_name,event_venue=e_venue,event_chief_guest=e_chiefguest,event_date=e_date,event_comment=e_comment WHERE event_id=e_id;
END$$

CREATE DEFINER=`misuser`@`%` PROCEDURE `notionalhours` (IN `course` VARCHAR(11), IN `module` VARCHAR(11))  SELECT SUM(module_self_study_hours+module_lecture_hours+module_practical_hours) as value_sum FROM module  WHERE module_id=module and module.course_id=course$$

CREATE DEFINER=`misuser`@`%` PROCEDURE `request_onpeak` (IN `request` ENUM('Pending','Approved','Not Approved',''))  BEGIN
    SELECT *  FROM onpeak_request where onpeak_request_status= request ;
END$$

CREATE DEFINER=`misuser`@`%` PROCEDURE `selectmodules` (IN `ciid` VARCHAR(11))  BEGIN
SELECT `module_id`,`module_name`,`module_learning_hours`,`semester_id`,`module`.`course_id` AS `course_id`, `module_relative_unit`,`module_lecture_hours`,`module_practical_hours`,`module_self_study_hours`,course.course_name as course_name FROM `module`,`course` WHERE module.course_id = course.course_id AND `module`.`course_id`= ciid;
END$$

CREATE DEFINER=`misuser`@`%` PROCEDURE `show_message` (IN `chat_id` INT(3))  BEGIN
SELECT `message`,`message_time`,`chat_group_sender` FROM `chat_group_message` WHERE `chat_group_reciver_group_id` =chat_id ORDER BY `chat_group_message`.`message_time` ASC;
end$$

CREATE DEFINER=`misuser`@`%` PROCEDURE `std_full_name` ()  BEGIN
SELECT`student_fullname` FROM `student`;
end$$

CREATE DEFINER=`misuser`@`%` PROCEDURE `totalitemqty` (IN `fid` VARCHAR(11))  BEGIN
SELECT food_name,sum(`food_order_details_food_qty`) as total FROM `food_order_details`,food where `food_order_details_food_id`=food_id and food_id=fid;
END$$

--
-- Functions
--
CREATE DEFINER=`misuser`@`%` FUNCTION `course_update` (`cid` VARCHAR(11), `cname` VARCHAR(255), `cnvq` ENUM('3','4','5','6','BRI'), `cojt` INT(2), `ctrai` INT(2), `did` VARCHAR(6)) RETURNS VARCHAR(255) CHARSET latin1 NO SQL
BEGIN
UPDATE course SET course_name=cname,course_nvq_level=cnvq,course_ojt_duration=cojt,course_institute_training=ctrai,department_id=did WHERE course_id=cid;
RETURN 1;
END$$

CREATE DEFINER=`misuser`@`%` FUNCTION `event_update` (`eid` INT(11), `ename` VARCHAR(255), `evenue` VARCHAR(255), `edate` DATE, `echiefguest` VARCHAR(30), `ecomment` TEXT, `etime` TIME, `eurl` VARCHAR(30), `estatus` VARCHAR(20)) RETURNS VARCHAR(255) CHARSET latin1 NO SQL
    DETERMINISTIC
BEGIN
UPDATE notice_event SET event_name=ename,event_venue=evenue,event_date=edate,event_chief_guest=echiefguest,event_comment=ecomment,ee=vent_time=etime,event_docs_url=eurl,event_status=estatus WHERE EVENT_id=eid;
RETURN 1;
end$$

CREATE DEFINER=`misuser`@`%` FUNCTION `feedback_survey` (`suid` INT(11), `did` VARCHAR(6), `ayear` VARCHAR(11), `cid` VARCHAR(11), `mid` VARCHAR(11), `sid` VARCHAR(64), `sdate` DATE, `edate` DATE) RETURNS INT(50) NO SQL
    DETERMINISTIC
BEGIN INSERT INTO feedback_survey VALUES(suid,did,ayear,cid,mid,sid,sdate,edate);
RETURN 1;
END$$

CREATE DEFINER=`misuser`@`%` FUNCTION `notice_event` (`eid` INT(11), `ename` VARCHAR(255), `evenue` VARCHAR(255), `edate` DATE, `echiefguest` VARCHAR(255), `ecomment` TEXT, `etime` TIME, `eurl` VARCHAR(30), `estatus` VARCHAR(20)) RETURNS INT(50) NO SQL
    DETERMINISTIC
BEGIN
INSERT INTO notice_event VALUES(eid,ename,evenue,edate,echiefguest,ecomment,etime,eurl,estatus);
RETURN 1;
END$$

CREATE DEFINER=`misuser`@`%` FUNCTION `return_status` (`returned_date` DATE) RETURNS VARCHAR(10) CHARSET latin1 NO SQL
BEGIN
     DECLARE status VARCHAR(10);
         IF returned_date IS NULL
            THEN SET status = 'Not Returned';
        ELSE
            SET status = returned_date;
        END IF;
     RETURN status;
    END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `academic`
--

CREATE TABLE `academic` (
  `academic_year` varchar(11) NOT NULL,
  `first_semi_start_date` date NOT NULL,
  `first_semi_end_date` date NOT NULL,
  `second_semi_start_date` date NOT NULL,
  `second_semi_end_date` date NOT NULL,
  `academic_year_status` enum('Active','Completed') NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `academic`
--

INSERT INTO `academic` (`academic_year`, `first_semi_start_date`, `first_semi_end_date`, `second_semi_start_date`, `second_semi_end_date`, `academic_year_status`) VALUES
('2016/2017', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 'Completed'),
('2017/2018', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 'Completed'),
('2018/2019', '2018-05-20', '2019-11-01', '2019-04-01', '2019-11-08', 'Completed'),
('2020/2021', '2020-02-03', '2020-07-17', '2019-07-01', '2018-11-30', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `assessments`
--

CREATE TABLE `assessments` (
  `assessment_id` int(20) NOT NULL,
  `assessment_type_id` int(11) NOT NULL,
  `course_id` varchar(20) NOT NULL,
  `module_id` varchar(11) NOT NULL,
  `academic_year` varchar(11) NOT NULL,
  `assessment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assessments`
--

INSERT INTO `assessments` (`assessment_id`, `assessment_type_id`, `course_id`, `module_id`, `academic_year`, `assessment_date`) VALUES
(33, 1, '5IT', 'M08', '2016/2017', '2019-11-16'),
(34, 2, '5IT', 'M08', '2017/2018', '2019-11-13'),
(35, 18, '5CT', 'M01', '2018/2019', '2019-11-22'),
(36, 1, '5IT', 'M03', '2016/2017', '2019-11-14'),
(37, 2, '5IT', 'M03', '2017/2018', '2019-11-14'),
(38, 1, '5IT', 'M03', '2016/2017', '2020-12-31'),
(39, 1, '5IT', 'M03', '2016/2017', '2020-12-31'),
(40, 18, '4AT', 'M01', '2020/2021', '2020-03-30'),
(41, 18, '4AT', 'M01', '2016/2017', '2020-03-31'),
(42, 25, '5CT', 'M01', '2017/2018', '2020-04-09'),
(43, 18, '5CT', 'M01', '2016/2017', '2020-04-03'),
(44, 18, '5CT', 'M01', '2016/2017', '2020-04-03'),
(45, 2, '5IT', 'M03', '2017/2018', '2020-04-18');

-- --------------------------------------------------------

--
-- Table structure for table `assessments_marks`
--

CREATE TABLE `assessments_marks` (
  `assessment_marks_id` int(11) NOT NULL,
  `assessment_id` int(20) NOT NULL,
  `student_id` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `department_id` varchar(60) NOT NULL,
  `module_id` varchar(11) NOT NULL,
  `assessment_attempt` varchar(20) NOT NULL,
  `assessment_marks` double NOT NULL,
  `assessment_marks_grade` varchar(80) NOT NULL,
  `assessment_marks_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assessments_marks`
--

INSERT INTO `assessments_marks` (`assessment_marks_id`, `assessment_id`, `student_id`, `department_id`, `module_id`, `assessment_attempt`, `assessment_marks`, `assessment_marks_grade`, `assessment_marks_date`) VALUES
(36, 33, '2016ICT4IT02', '', 'M05', '1', 45, 'Pass', '2019-11-02 08:32:03'),
(37, 33, '2025ICT5IT01', '', 'M01', '1', 56, 'Pass', '2019-11-02 08:32:03'),
(38, 33, '2025ICT5IT02', '', 'M04', '1', 78, 'Pass', '2019-11-02 08:32:03'),
(39, 33, '2025ICT5IT03', '', 'M08', '1', 56, 'Pass', '2019-11-02 08:32:03'),
(40, 33, '2016ICT4IT02', '', 'M03', '1', 45, 'Pass', '2019-11-02 08:32:28'),
(41, 33, '2025ICT5IT01', '', 'M04', '1', 56, 'Pass', '2019-11-02 08:32:28'),
(42, 33, '2025ICT5IT02', '', 'M08', '1', 78, 'Pass', '2019-11-02 08:32:28'),
(43, 33, '2025ICT5IT03', '', 'M08', '1', 56, 'Pass', '2019-11-02 08:32:28'),
(48, 33, '2016ICT4IT02', 'ICT', 'M02', '1', 34, 'Pass', '2019-11-03 14:19:53'),
(50, 33, '2025ICT5IT02', '', 'M01', '1', 67, 'Pass', '2019-11-03 14:19:53'),
(51, 33, '2025ICT5IT03', '', 'M08', '1', 45, 'Pass', '2019-11-03 14:19:53'),
(52, 33, '2016ICT4IT02', '', 'M06', '1', 34, 'Fail', '2019-11-03 14:20:04'),
(53, 33, '2025ICT5IT01', '', 'M03', '2', 56, 'Pass', '2019-11-03 14:20:04'),
(54, 33, '2025ICT5IT02', '', 'M07', '1', 67, 'Fail', '2019-11-03 14:20:04'),
(55, 33, '2025ICT5IT03', '', 'M08', '1', 45, 'Fail', '2019-11-03 14:20:04'),
(56, 34, '2016ICT4IT03', '', 'M08', '1', 34, 'Fail', '2019-11-03 17:35:40'),
(57, 34, '2025ICT5IT01', '', 'M05', '1', 56, 'Pass', '2019-11-03 17:35:40'),
(58, 33, '2016ICT4IT03', '', 'M08', '1', 58, '', '2019-11-04 05:37:02'),
(59, 33, '2025ICT5IT01', '', 'M05', '1', 37, '', '2019-11-04 05:37:02'),
(60, 33, '2025ICT5IT03', '', 'M08', '1', 67, '', '2019-11-04 05:37:02'),
(61, 33, '2016AOT4AT', '', 'M08', '----Choose Attempt--', 25, '', '2020-03-31 10:34:12'),
(62, 33, '2016ICT4IT03', '', 'M08', '----Choose Attempt--', 52, '', '2020-03-31 10:34:12'),
(63, 33, '2025ICT5IT01', '', 'M08', '----Choose Attempt--', 65, '', '2020-03-31 10:34:12'),
(64, 33, '2025ICT5IT02', '', 'M08', '----Choose Attempt--', 68, '', '2020-03-31 10:34:12'),
(65, 33, '2025ICT5IT03', '', 'M08', '----Choose Attempt--', 96, '', '2020-03-31 10:34:12'),
(66, 43, '2020COT5CTF01', '', 'M01', '1', 25, '', '2020-04-12 07:02:15'),
(67, 45, '2016AOT4AT', '', 'M03', '----Choose Attempt--', 25, '', '2020-04-12 07:17:24'),
(68, 45, '2016ICT4IT03', '', 'M03', '----Choose Attempt--', 52, '', '2020-04-12 07:17:24'),
(69, 45, '2025ICT5IT01', '', 'M03', '----Choose Attempt--', 65, '', '2020-04-12 07:17:24'),
(70, 45, '2025ICT5IT02', '', 'M03', '----Choose Attempt--', 68, '', '2020-04-12 07:17:24'),
(71, 45, '2025ICT5IT03', '', 'M03', '----Choose Attempt--', 96, '', '2020-04-12 07:17:24'),
(73, 33, '2016AOT4AT', '', 'M08', '----Choose Attempt--', 25, '', '2020-04-12 07:22:00'),
(74, 33, '2016ICT4IT03', '', 'M08', '----Choose Attempt--', 52, '', '2020-04-12 07:22:00'),
(75, 33, '2025ICT5IT01', '', 'M08', '----Choose Attempt--', 65, '', '2020-04-12 07:22:00'),
(76, 33, '2025ICT5IT02', '', 'M08', '----Choose Attempt--', 68, '', '2020-04-12 07:22:00'),
(77, 33, '2025ICT5IT03', '', 'M08', '----Choose Attempt--', 96, '', '2020-04-12 07:22:00'),
(78, 33, '2016AOT4AT', '', 'M08', '1', 25, '', '2020-04-15 12:57:49'),
(79, 33, '2016ICT4IT03', '', 'M08', '----Choose Attempt--', 52, '', '2020-04-15 12:57:49'),
(80, 33, '2025ICT5IT01', '', 'M08', '----Choose Attempt--', 65, '', '2020-04-15 12:57:49'),
(81, 33, '2025ICT5IT02', '', 'M08', '----Choose Attempt--', 68, '', '2020-04-15 12:57:49'),
(82, 33, '2025ICT5IT03', '', 'M08', '----Choose Attempt--', 96, '', '2020-04-15 12:57:49');

-- --------------------------------------------------------

--
-- Table structure for table `assessments_type`
--

CREATE TABLE `assessments_type` (
  `assessment_type_id` int(11) NOT NULL,
  `module_id` varchar(11) NOT NULL,
  `course_id` varchar(11) NOT NULL,
  `assessment_name` varchar(50) NOT NULL,
  `assessment_type` varchar(25) NOT NULL,
  `assessment_percentage` varchar(20) NOT NULL,
  `assessment_entered_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assessments_type`
--

INSERT INTO `assessments_type` (`assessment_type_id`, `module_id`, `course_id`, `assessment_name`, `assessment_type`, `assessment_percentage`, `assessment_entered_date`) VALUES
(1, 'M03', '5IT', 'Assessment 01', 'T', '30', '2019-10-24 06:15:27'),
(2, 'M03', '5IT', 'Assessment 02', 'P', '30', '2019-10-24 06:41:43'),
(18, 'M01', '5CT', 'Assessment 01', 'T', '100', '2019-10-29 04:28:33'),
(24, 'M01', '4AT', 'Assessment 01', 'T', '100', '2019-11-04 03:22:35'),
(25, 'M01', '4AT', 'Assessment 02', 'T', '100', '2019-11-04 03:22:56'),
(26, 'M02', '4AT', 'Assessment 01', 'T', '100', '2019-11-04 03:23:07'),
(27, 'M02', '4AT', 'Assessment  01', 'T', '100', '2019-11-04 05:35:19'),
(28, 'M01', '4CS', '21', 'T', '10', '2020-04-08 05:49:53');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `attendance_id` int(11) NOT NULL,
  `student_id` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `module_name` varchar(255) NOT NULL,
  `staff_name` varchar(255) NOT NULL,
  `attendance_status` int(3) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`attendance_id`, `student_id`, `module_name`, `staff_name`, `attendance_status`, `date`) VALUES
(143, '2016ICT4IT03', 'M08', 'achchuthan', 1, '2019-10-01'),
(144, '2025ICT5IT01', 'M08', 'achchuthan', 1, '2019-10-02'),
(145, '2016ICT4IT03', 'M08', 'achchuthan', 0, '2019-10-02'),
(146, '2025ICT5IT01', 'M08', 'achchuthan', 1, '2019-10-03'),
(147, '2016ICT4IT03', 'M08', 'achchuthan', 1, '2019-10-03'),
(148, '2025ICT5IT01', 'M08', 'achchuthan', 0, '2019-10-04'),
(149, '2016ICT4IT03', 'M08', 'achchuthan', 1, '2019-10-04'),
(150, '2025ICT5IT01', 'M08', 'achchuthan', 1, '2019-10-20'),
(151, '2016ICT4IT03', 'M08', 'achchuthan', 0, '2019-10-20'),
(152, '2025ICT5IT01', 'M08', 'achchuthan', 1, '2019-10-21'),
(153, '2016ICT4IT03', 'M08', 'achchuthan', 1, '2019-10-21'),
(154, '2025ICT5IT01', 'M08', 'achchuthan', 1, '2019-10-22'),
(155, '2016ICT4IT03', 'M08', 'achchuthan', 1, '2019-10-22'),
(156, '2025ICT5IT03', 'M03', 'achchuthan', 0, '2019-11-06'),
(157, '2025ICT5IT02', 'M03', 'achchuthan', 0, '2019-11-06'),
(158, '2025ICT5IT01', 'M03', 'achchuthan', 0, '2019-11-06'),
(159, '2016ICT4IT03', 'M03', 'achchuthan', 0, '2019-11-06'),
(160, '2025ICT5IT03', 'M03', 'achchuthan', 0, '2019-11-06'),
(161, '2025ICT5IT02', 'M03', 'achchuthan', 0, '2019-11-06'),
(162, '2025ICT5IT01', 'M03', 'achchuthan', 0, '2019-11-06'),
(163, '2016ICT4IT03', 'M03', 'achchuthan', 0, '2019-11-06'),
(164, '2025ICT5IT03', 'M03', 'achchuthan', 1, '2019-11-07'),
(165, '2025ICT5IT02', 'M03', 'achchuthan', 1, '2019-11-07'),
(166, '2025ICT5IT01', 'M03', 'achchuthan', 0, '2019-11-07'),
(167, '2016ICT4IT03', 'M03', 'achchuthan', 0, '2019-11-07'),
(168, '2025ICT5IT03', 'M03', 'achchuthan', 0, '0000-00-00'),
(169, '2025ICT5IT02', 'M03', 'achchuthan', 0, '0000-00-00'),
(170, '2025ICT5IT01', 'M03', 'achchuthan', 0, '0000-00-00'),
(171, '2016ICT4IT03', 'M03', 'achchuthan', 0, '0000-00-00'),
(172, '2025ICT5IT03', 'M04', 'romiyal', 0, '2019-11-05'),
(173, '2025ICT5IT02', 'M04', 'romiyal', 0, '2019-11-05'),
(174, '2025ICT5IT01', 'M04', 'romiyal', 0, '2019-11-05'),
(175, '2016ICT4IT03', 'M04', 'romiyal', 0, '2019-11-05'),
(176, '2025ICT5IT03', 'M04', 'romiyal', 1, '2019-11-08'),
(177, '2025ICT5IT02', 'M04', 'romiyal', 1, '2019-11-08'),
(178, '2025ICT5IT01', 'M04', 'romiyal', 1, '2019-11-08'),
(179, '2016ICT4IT03', 'M04', 'romiyal', 1, '2019-11-08'),
(180, '2025ICT5IT03', 'M04', 'romiyal', 1, '2019-11-08'),
(181, '2025ICT5IT02', 'M04', 'romiyal', 1, '2019-11-08'),
(182, '2025ICT5IT01', 'M04', 'romiyal', 1, '2019-11-08'),
(183, '2016ICT4IT03', 'M04', 'romiyal', 1, '2019-11-08'),
(184, '2025ICT5IT03', 'M04', 'romiyal', 1, '2019-11-04'),
(185, '2025ICT5IT02', 'M04', 'romiyal', 1, '2019-11-04'),
(186, '2025ICT5IT01', 'M04', 'romiyal', 1, '2019-11-04'),
(187, '2016ICT4IT03', 'M04', 'romiyal', 1, '2019-11-04');

-- --------------------------------------------------------

--
-- Table structure for table `batch`
--

CREATE TABLE `batch` (
  `course_id` varchar(255) NOT NULL,
  `batch_id` varchar(10) NOT NULL,
  `academic_year` varchar(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `batch`
--

INSERT INTO `batch` (`course_id`, `batch_id`, `academic_year`) VALUES
('3ME', '3ME01 ', '2018/2019'),
('5IT', '5IT01 ', '2018/2019');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `numbering` int(11) NOT NULL,
  `book_id` varchar(40) NOT NULL,
  `name` varchar(100) NOT NULL,
  `author` varchar(100) NOT NULL,
  `publisher` varchar(50) NOT NULL,
  `ISBN` varchar(15) NOT NULL,
  `category` varchar(20) NOT NULL,
  `year` int(4) NOT NULL,
  `cost` double(7,2) NOT NULL,
  `purch_date` date NOT NULL,
  `book_status` varchar(10) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`numbering`, `book_id`, `name`, `author`, `publisher`, `ISBN`, `category`, `year`, `cost`, `purch_date`, `book_status`) VALUES
(1, 'slgti/lib/2019/1', 'Think Java: How to think like a computer scientist', 'Allen B. Downey', 'O\'Reilly Media', '9787308040365', 'ICT', 2004, 8875.00, '2019-02-14', 'active'),
(10, 'slgti/lib/2019/10', 'Learn Python 3 the Hard Way', 'Zed A. Shaw', 'Addison-Wesley Professional', '9780134693903', 'ict', 2017, 5200.00, '2019-04-02', 'active'),
(11, 'slgti/lib/2019/11', ' Networking All-in-One Desk Reference For Dummies', 'Doug Lowe', 'Wiley', '9780764559075', 'ict', 2004, 3200.00, '2019-04-02', 'active'),
(12, 'slgti/lib/2019/12', 'Building construction handbook', 'Roy Chudley, Roger Greeno', 'Routledge', '9781317442158', 'construction', 2016, 6650.00, '2019-04-04', 'active'),
(13, 'slgti/lib/2019/13', 'Building Construction Illustrated', 'Frank Ching', 'Van Nostrand Reinhold', '9781119583080', 'ict', 1975, 5200.00, '2019-04-04', 'active'),
(14, 'slgti/lib/2019/14', 'Fundamentals of Building Construction: Materials and Methods', 'Edward Allen, Joseph Iano', 'John Wiley & Sons', '9781118821466', 'ict', 2014, 5200.00, '2019-04-04', 'active'),
(15, 'slgti/lib/2019/15', 'Construction Technology 1: House Construction: 1: House Construction', 'Mike Riley, Alison Cotgrave', 'Palgrave Macmillan', '9780230203624', 'construction', 2008, 6680.00, '2019-04-04', 'active'),
(16, 'slgti/lib/2019/16', ' Construction Project Scheduling and Control', 'Saleh Altayeb Mubarak', 'Pearson Prentice Hall', '9780130973146', 'construction', 2005, 17875.00, '2019-04-04', 'active'),
(17, 'slgti/lib/2019/17', 'The visual handbook of building and remodeling', 'Charles Wing', 'Rodale Press', '9780878579013', 'construction', 1990, 4480.00, '2019-04-04', 'active'),
(18, 'slgti/lib/2019/18', 'Manual of Multi-storey Timber Construction', 'Hermann Kaufmann, Stefan KrÃ¶tsch, Stefan Winter', 'Detail Business Information', '9783955533946', 'construction', 2018, 19300.00, '2019-04-04', 'active'),
(19, 'slgti/lib/2019/19', 'Turning Point in Timber Construction: A New Economy', 'Ulrich Dangel', 'BirkhÃ¤user', '9783035608632', 'construction', 2016, 6980.00, '2019-04-04', 'active'),
(2, 'slgti/lib/2019/2', 'A Practical Approach to Motor Vehicle Engineering and Maintenance', 'Steven Daly', 'Elsevier', '9780080470917', 'auto Mobile', 2011, 9735.00, '2019-03-01', 'active'),
(20, 'slgti/lib/2019/20', 'Automotive Mechanics', 'William H. Crouse, Donald L. Anglin, Crouse William', 'McGraw-Hill College', '9780028009469', 'auto Mobile', 1993, 950.00, '2019-04-04', 'active'),
(21, 'slgti/lib/2019/21', 'Auto Repair for Dummies', 'Deanna Sclar', 'John Wiley & Sons', '9781118138625', 'auto Mobile', 2011, 2500.00, '2019-04-04', 'active'),
(22, 'slgti/lib/2019/22', 'Shigley\'s Mechanical Engineering Design', 'Richard Gordon Budynas, J. Keith Nisbett', '	McGraw-Hill', '9780071257633', 'mechanical', 2008, 10500.00, '2019-05-05', 'active'),
(23, 'slgti/lib/2019/23', 'Marks\' Standard Handbook for Mechanical Engineers', '	Claus Borgnakke, Richard Edwin Sonntag', 'John Wiley & Sons, Limited', '9781119572411', 'mechanical', 2019, 10100.00, '2019-05-05', 'active'),
(24, 'slgti/lib/2019/24', 'How Cars Work', 'Tom Newton', 'Black Apple Press', '9780966862300', 'auto Mobile', 1999, 3200.00, '2019-04-04', 'active'),
(25, 'slgti/lib/2019/25', 'Fundamentals of Thermodynamics', '	Claus Borgnakke, Richard Edwin Sonntag', 'John Wiley & Sons, Limited', '9781119572411', 'mechanical', 2019, 10600.00, '2019-05-05', 'active'),
(26, 'slgti/lib/2019/26', 'Fundamentals of Thermodynamics', '	R. S. Khurmi, J. K. Gupta', 'Eurasia Publishing House', '9788121925242', 'mechanical', 2008, 24000.00, '2019-05-05', 'active'),
(27, 'slgti/lib/2019/27', 'Automotive Service: Inspection, Maintenance, Repair', 'Tim Gilles', 'Cengage Delmar Learning', '9780827373556', 'autoMobile', 1998, 8960.00, '2019-04-04', 'active'),
(28, 'slgti/lib/2019/28', 'Understanding automotive electronics', 'William B. Ribbens, Norman P. Mansour, Gerald Luecke', 'H.W. Sams', '9780672270178', 'auto Mobile', 1984, 3440.00, '2019-04-04', 'active'),
(29, 'slgti/lib/2019/29', 'Fundamentals of fluid mechanics', '	Bruce Roy Munson, Donald F. Young, Theodore Hisao Okiishi', 'Wiley', '9780471855262', 'mechanical', 1990, 14800.00, '2019-05-05', 'active'),
(3, 'slgti/lib/2019/3', 'Construction Technology', 'Roy Chudley', 'Pearson Prentice Hall', '9780131286429', 'construction', 2005, 4500.00, '2019-05-16', 'active'),
(30, 'slgti/lib/2019/30', 'Fundamentals of Heat and Mass Transfer', '	B. K. VENKANNA', 'PHI Learning Pvt. Ltd', '9788120340312', 'mechanical', 2010, 35800.00, '2019-05-05', 'active'),
(31, 'slgti/lib/2019/31', 'Civil Engineering Reference Manual for the PE Exam', '	Michael R. Lindeburg', 'Professional Publications', '9781591264149', 'mechanical', 2013, 16100.00, '2019-05-05', 'active'),
(32, 'slgti/lib/2019/32', 'Mechanical Engineers\' Handbook, Volume 3: Manufacturing and Management', ' Myer Kutz', 'Wiley', '9780471130079', 'mechanical', 1998, 27000.00, '2019-05-05', 'active'),
(33, 'slgti/lib/2019/33', 'Materials Science and Engineering', '	William D. Callister', 'Wiley', '9780471581284', 'mechanical', 1994, 5600.00, '2019-05-05', 'active'),
(34, 'slgti/lib/2019/34', 'Engineering Mechanics: Statics and Dynamics', '	Russell C. Hibbeler', 'Pearson Education', '9780133951929', 'mechanical', 2015, 17900.00, '2019-05-05', 'active'),
(35, 'slgti/lib/2019/35', 'Mechanical Design Handbook (2nd Edition).', '	Harold A. Rothbart, Thomas H. Brown', 'McGraw Hill Professional', '9780071487351', 'mechanical', 2006, 21000.00, '2019-05-05', 'active'),
(36, 'slgti/lib/2019/36', 'Practice Problems for the Mechanical Engineering PE Exam: A Companion to the ...', '	Michael R. Lindeburg', 'Professional Publications', '9781888577495', 'mechanical', 2000, 11700.00, '2019-05-05', 'active'),
(37, 'slgti/lib/2019/37', 'Mechanisms and Mechanical Devices Sourcebook, Fourth Edition', '	Neil Sclater', 'McGraw Hill Professional', '9780071704410', 'mechanical', 2011, 11200.00, '2019-05-05', 'active'),
(38, 'slgti/lib/2019/38', 'Fluid Mechanics: Fundamentals and Applications', '	Yunus A. Ã‡engel, John M. Cimbala', 'McGraw-Hill Education', '9781259921902', 'mechanical', 2018, 9400.00, '2019-05-05', 'active'),
(39, 'slgti/lib/2019/39', 'Introduccion a la Ingenieria de Los Alimentos (IntroducciÃ³n a la ingenierÃ­a de los alimentos)', '	R. Paul Singh, Dennis R. Heldman', 'Gulf Professional Publishing', '9780126463842', 'food', 2001, 99999.99, '2019-03-03', 'active'),
(4, 'slgti/lib/2019/4', 'Advanced Construction Technology', 'Roy Chudley', 'Longman', '9780582316171', 'construction', 1999, 3280.00, '2019-03-20', 'active'),
(40, 'slgti/lib/2019/40', 'Molecular Gastronomy: Exploring the Science of Flavor', '	HervÃ© This', 'Columbia University Press', '9780231508070', 'food', 2006, 2300.00, '2019-03-03', 'active'),
(41, 'slgti/lib/2019/41', 'Cooking for Geeks: Real Science, Great Hacks, and Good Food', '	Jeff Potter', '\"O\'Reilly Media, Inc', '9781449395872', 'food', 2010, 5600.00, '2019-03-03', 'active'),
(42, 'slgti/lib/2019/42', 'The Secret of the Nagas', ' Amish Tripathi', 'Westland Press', '9789256812521', 'common', 2011, 590.00, '2019-02-02', 'active'),
(43, 'slgti/lib/2019/43', 'The Immortals of Meluha', ' Amish Tripathi', 'Amish Tripathi', '9789324298201', 'common', 2010, 570.00, '2019-02-02', 'active'),
(44, 'slgti/lib/2019/44', 'Scion of Ikshvaku', ' Amish Tripathi', 'Amish Tripathi', '9781024682667', 'common', 2015, 560.00, '2019-02-02', 'active'),
(45, 'slgti/lib/2019/45', 'Sita - Warrior of Mithila', ' Amish Tripathi', 'Amish Tripathi', '9789654242806', 'common', 2015, 450.00, '2019-02-02', 'active'),
(46, 'slgti/lib/2019/46', 'Raavan: Enemy of Aryavarta', ' Amish Tripathi', ' Amish Tripathi', '9388754085148', 'ict', 2019, 640.00, '2019-02-02', 'active'),
(47, 'slgti/lib/2019/47', 'Immortal India: Articles and Speeches by Amish', 'Amish Tripathi', 'Amish Tripathi', '9788526422006', 'ict', 2017, 500.00, '2019-02-02', 'active'),
(48, 'slgti/lib/2019/48', 'The Palace of Illusions', ' Chitra Banerjee Divakaruni', 'Chitra Banerjee Divakaruni', '9782364178924', 'ict', 2008, 380.00, '2019-02-02', 'active'),
(49, 'slgti/lib/2019/49', 'The Alchemist', ' Paulo Coelho', 'Paulo Coelho', '9787617725193', 'common', 1988, 30.00, '2019-02-02', 'active'),
(5, 'slgti/lib/2019/5', 'Head First Android Development: A Brain-Friendly Guide', 'Dawn Griffiths', 'O Reilly Media', '9781449362140', 'ict', 2015, 7200.00, '2019-04-12', 'active'),
(50, 'slgti/lib/2019/50', 'Fifty Shades of Grey', 'E. L. James', 'Vintage Books', '9783844509434', 'common', 2011, 2250.00, '2019-02-14', 'active'),
(6, 'slgti/lib/2019/6', ' Handbook of Research on Food Science and Technology: Volume 2: Food Biotechnology and Microbiology', 'Monica Lizeth Chavez-Gonzalez', 'Apple Academic Press', '9780429947117', 'food', 2015, 24450.00, '2019-04-03', 'inactive'),
(7, 'slgti/lib/2019/7', 'GitHub For Dummies', 'Guthals', 'John Wiley & Sons', '9781119572671', 'ict', 2019, 2850.00, '2019-04-11', 'active'),
(8, 'slgti/lib/2019/8', 'High Performance MySQL: Optimization, Backups, and Replication', 'Baron Schwartz, Peter Zaitsev, Vadim Tkachenko', 'O Reilly Media, Inc', '9781449332495', 'ict', 2012, 7135.00, '2019-04-01', 'active'),
(9, 'slgti/lib/2019/9', 'The Joy of PHP: A Beginner\'s Guide to Programming Interactive Web Applications with PHP and mySQL', 'Alan Forbes', 'Create Space Independent Publishing Platform', '9781494267353', 'ict', 2012, 3435.00, '2019-04-02', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `book_copies`
--

CREATE TABLE `book_copies` (
  `book_serial` varchar(40) NOT NULL,
  `book_id` varchar(40) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'available',
  `copy_delete` varchar(10) NOT NULL DEFAULT 'notdeleted'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book_copies`
--

INSERT INTO `book_copies` (`book_serial`, `book_id`, `date`, `status`, `copy_delete`) VALUES
('slgti/lib/2019/2/1', 'slgti/lib/2019/2', '2019-05-15', 'notavailable', 'notdeleted'),
('slgti/lib/2019/2/2', 'slgti/lib/2019/2', '2019-07-03', 'available', 'notdeleted'),
('slgti/lib/2019/2/3', 'slgti/lib/2019/2', '2019-07-26', 'available', 'deleted'),
('slgti/lib/2019/2/4', 'slgti/lib/2019/2', '2019-07-26', 'available', 'notdeleted'),
('slgti/lib/2019/3/1', 'slgti/lib/2019/3', '2019-04-12', 'available', 'notdeleted'),
('slgti/lib/2019/4/1', 'slgti/lib/2019/4', '2019-04-11', 'available', 'notdeleted'),
('slgti/lib/2019/4/2', 'slgti/lib/2019/4', '2019-04-11', 'available', 'notdeleted'),
('slgti/lib/2019/4/3', 'slgti/lib/2019/4', '2019-04-11', 'available', 'notdeleted'),
('slgti/lib/2019/4/4', 'slgti/lib/2019/4', '2019-04-11', 'available', 'notdeleted'),
('slgti/lib/2019/4/5', 'slgti/lib/2019/4', '2019-04-11', 'available', 'notdeleted'),
('slgti/lib/2019/4/6', 'slgti/lib/2019/4', '2019-04-11', 'available', 'notdeleted'),
('slgti/lib/2019/4/7', 'slgti/lib/2019/4', '2019-04-11', 'notavailable', 'notdeleted'),
('slgti/lib/2019/4/8', 'slgti/lib/2019/4', '2019-04-11', 'notavailable', 'notdeleted'),
('slgti/lib/2019/4/9', 'slgti/lib/2019/4', '2019-04-11', 'available', 'notdeleted'),
('slgti/lib/2019/1/1', 'slgti/lib/2019/1', '2019-03-31', 'available', 'notdeleted'),
('slgti/lib/2019/50/1', 'slgti/lib/2019/50', '2019-02-14', 'notavailable', 'notdeleted'),
('slgti/lib/2019/1/2', 'slgti/lib/2019/1', '2019-11-07', 'notavailable', 'deleted'),
('slgti/lib/2019/14/1', 'slgti/lib/2019/14', '2019-11-06', 'notavailable', 'notdeleted'),
('slgti/lib/2019/1/3', 'slgti/lib/2019/1', '2019-11-05', 'available', 'notdeleted'),
('slgti/lib/2019/1/4', 'slgti/lib/2019/1', '2019-10-10', 'available', 'notdeleted'),
('slgti/lib/2019/1/5', 'slgti/lib/2019/1', '2019-10-10', 'available', 'notdeleted'),
('slgti/lib/2019/1/6', 'slgti/lib/2019/1', '2019-10-10', 'available', 'notdeleted'),
('slgti/lib/2019/10/1', 'slgti/lib/2019/10', '2019-05-05', 'notavailable', 'notdeleted'),
('slgti/lib/2019/10/2', 'slgti/lib/2019/10', '2019-06-05', 'available', 'notdeleted'),
('slgti/lib/2019/11/1', 'slgti/lib/2019/11', '2019-07-07', 'available', 'notdeleted'),
('slgti/lib/2019/12/1', 'slgti/lib/2019/12', '2019-07-07', 'available', 'notdeleted'),
('slgti/lib/2019/13/1', 'slgti/lib/2019/13', '2019-07-07', 'available', 'notdeleted'),
('slgti/lib/2019/13/2', 'slgti/lib/2019/13', '2019-07-07', 'available', 'notdeleted'),
('slgti/lib/2019/15/1', 'slgti/lib/2019/15', '2019-10-10', 'notavailable', 'notdeleted'),
('slgti/lib/2019/15/2', 'slgti/lib/2019/15', '2019-11-10', 'available', 'notdeleted');

-- --------------------------------------------------------

--
-- Table structure for table `chat_group`
--

CREATE TABLE `chat_group` (
  `chat_group_name` varchar(100) NOT NULL,
  `chat_group_id` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat_group`
--

INSERT INTO `chat_group` (`chat_group_name`, `chat_group_id`) VALUES
('ICT graphics', 4),
('Examination', 5),
('art', 11),
('HOD info', 12);

-- --------------------------------------------------------

--
-- Table structure for table `chat_group_member`
--

CREATE TABLE `chat_group_member` (
  `chat_group_member_id` int(50) NOT NULL,
  `chat_group_member` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `chat_group_id` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat_group_member`
--

INSERT INTO `chat_group_member` (`chat_group_member_id`, `chat_group_member`, `chat_group_id`) VALUES
(10, 'achchuthan', 4),
(24, 'admin', 4),
(54, 'achchuthan', 4),
(55, 'achchuthan', 4);

-- --------------------------------------------------------

--
-- Table structure for table `chat_group_message`
--

CREATE TABLE `chat_group_message` (
  `message_id` int(30) NOT NULL,
  `message` varchar(255) NOT NULL,
  `message_time` timestamp(5) NOT NULL DEFAULT CURRENT_TIMESTAMP(5),
  `chat_group_sender` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `chat_group_reciver_group_id` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat_group_message`
--

INSERT INTO `chat_group_message` (`message_id`, `message`, `message_time`, `chat_group_sender`, `chat_group_reciver_group_id`) VALUES
(10, 'today i\'m very happy', '2019-10-22 00:00:00.00000', 'achchuthan', 5),
(146, 'project is very hard but i can try to finish', '0000-00-00 00:00:00.00000', 'TESTNAME', 4),
(210, 'hi woooooooooo..... wow funny boys', '0000-00-00 00:00:00.00000', 'Accountant', 4),
(211, 'ye sure', '0000-00-00 00:00:00.00000', '2025ICT5IT01', 4),
(246, 'Good Morning Students. Today Your Presentation \r\nBEST of LUCK.............', '2019-11-04 03:30:56.00000', 'achchuthan', 4),
(251, 'When start our function', '0000-00-00 00:00:00.00000', 'Accountant', 4),
(357, 'fghgfhfghfghfghhhhhhhhhhhhhhhhhhhhhhhh', '2019-11-08 06:03:58.00000', 'achchuthan', 4),
(373, 'JK', '2019-11-15 09:36:41.00000', 'achchuthan', 4),
(374, '', '2020-04-05 03:41:01.00000', 'achchuthan', 4),
(375, 'hi', '2020-06-16 08:50:45.00000', 'achchuthan', 4);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` varchar(11) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `course_nvq_level` enum('6','3','4','5','BRI') NOT NULL,
  `course_ojt_duration` int(2) NOT NULL,
  `course_institute_training` int(2) NOT NULL,
  `department_id` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_name`, `course_nvq_level`, `course_ojt_duration`, `course_institute_training`, `department_id`) VALUES
('3ME', 'Assistant In mechanical', '3', 6, 12, 'MEC'),
('4AT', 'Technician in Automotive Technology', '4', 4, 12, 'AUT'),
('4CS', 'Technician In Construction Technology', '4', 6, 12, 'COT'),
('4IT', 'Technician In Information and Communication Technology', '4', 6, 12, 'ICT'),
('5AT', 'National Diploma in Automotive Technology', '5', 6, 12, 'AUT'),
('5CT', 'National Diploma in Construction Technology            ', '5', 6, 12, 'COT'),
('5FT', 'National Diploma in Food Technology', '5', 6, 12, 'FDT'),
('5IT', 'National Diploma in Information and Communication Technology', '5', 6, 10, 'ICT'),
('5MA', 'National Diploma in Mechanical Technology', '5', 6, 12, 'MEC'),
('5ME', 'National Diploma in Mechatronics Technology            ', '5', 6, 12, 'EET'),
('6IT', 'Higher National Diploma In Information Communication & technology', '6', 6, 12, 'ICT'),
('BAT', 'Bridging In Automotive Technology', 'BRI', 3, 6, 'AUT'),
('BCT', 'Bridging In Construction Technology', 'BRI', 12, 6, 'COT'),
('BIT', 'Bridging Information Technology', 'BRI', 6, 12, 'ICT'),
('TEST', 'Bridging In Construction Technology', 'BRI', 45, 145, 'EET');

--
-- Triggers `course`
--
DELIMITER $$
CREATE TRIGGER `COURSE_DELETE` BEFORE DELETE ON `course` FOR EACH ROW begin 
 declare auser varchar(15);
 select user() into auser;
 insert into course_delete_tracking(user_name,course_id,course_name,system_date) values (auser,old.course_id,old.course_name,sysdate());
 end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `course_delete_tracking`
--

CREATE TABLE `course_delete_tracking` (
  `user_name` varchar(255) NOT NULL,
  `course_id` varchar(11) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `system_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_delete_tracking`
--

INSERT INTO `course_delete_tracking` (`user_name`, `course_id`, `course_name`, `system_date`) VALUES
('misuser@localho', 'gg', '', '2019-11-01'),
('misuser@localho', 'gg', '', '2019-11-01'),
('misuser@172.16.', '47', '', '2019-11-02'),
('misuser@localho', 'GG', '', '2019-11-02'),
('misuser@localho', '1', 're', '2019-11-02'),
('misuser@172.16.', 'Test', 'hello', '2019-11-04'),
('misuser@mis.ach', 'Fv', 'Tf', '2019-11-04'),
('misuser@mis.ach', '4ME', 'Technician in mechatronics', '2019-11-05'),
('misuser@mis.ach', 'hfh', 'ffh', '2019-11-05'),
('misuser@mis.ach', '477', 'wdcv', '2019-11-07'),
('misuser@172.16.', '4766', 'wdcv', '2019-11-07'),
('misuser@172.16.', 'kii', 'Bridging In Construction Technologyfgfg', '2019-11-07'),
('misuser@172.16.', '47', 'Bridging In Construction Technology', '2019-11-07'),
('misuser@mis.ach', 'tr', 'National Diploma In Food Technology', '2019-11-12');

-- --------------------------------------------------------

--
-- Table structure for table `delete_feedback_survey`
--

CREATE TABLE `delete_feedback_survey` (
  `survey_id` int(11) NOT NULL,
  `department_id` varchar(6) NOT NULL,
  `academic_year` varchar(11) NOT NULL,
  `course_id` varchar(11) NOT NULL,
  `module_id` varchar(11) NOT NULL,
  `staff_id` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `delete_feedback_survey`
--

INSERT INTO `delete_feedback_survey` (`survey_id`, `department_id`, `academic_year`, `course_id`, `module_id`, `staff_id`, `start_date`, `end_date`) VALUES
(37, 'ICT', '2018/2019', '5IT', 'M05', 'Accountant', '2019-11-05', '2019-11-12'),
(38, 'ICT', '2018/2019', '5IT', 'M03', 'achchuthan', '2019-11-05', '2019-11-12');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `department_id` varchar(6) NOT NULL,
  `department_name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_id`, `department_name`) VALUES
('AUT', 'Automotive & Technology'),
('COT', 'Construction Technology'),
('EET', 'Electrical Technology'),
('FDT', 'Food Technology'),
('ICT', 'Information  Communication Technology'),
('MEC', 'Mechanical Technology');

-- --------------------------------------------------------

--
-- Table structure for table `donation`
--

CREATE TABLE `donation` (
  `donation_id` int(20) NOT NULL,
  `date` date NOT NULL,
  `programme` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donation`
--

INSERT INTO `donation` (`donation_id`, `date`, `programme`) VALUES
(90, '2019-10-01', 'camps'),
(97, '2019-10-29', 'hospital');

-- --------------------------------------------------------

--
-- Table structure for table `donor`
--

CREATE TABLE `donor` (
  `d_id` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `blood_group` varchar(3) NOT NULL,
  `designation` varchar(10) NOT NULL,
  `joint_date` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `weight` varchar(10) NOT NULL,
  `reference_id` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donor`
--

INSERT INTO `donor` (`d_id`, `address`, `email`, `dob`, `blood_group`, `designation`, `joint_date`, `gender`, `weight`, `reference_id`, `fullname`) VALUES
(149, 'Jaffna ', '2019-08-07', '0000-00-00', '', 'staff', '0000-00-00', 'Male', '', 'achchuthan', 'Yogaraja Aachuthan ');

-- --------------------------------------------------------

--
-- Table structure for table `event_delete`
--

CREATE TABLE `event_delete` (
  `dbuser` varchar(50) NOT NULL,
  `event_id` int(11) NOT NULL,
  `event_name` varchar(255) NOT NULL,
  `event_venue` varchar(255) NOT NULL,
  `event_date` date NOT NULL,
  `event_chief_guest` varchar(30) NOT NULL,
  `event_comment` text NOT NULL,
  `event_time` time NOT NULL,
  `event_docs_url` varchar(30) NOT NULL,
  `status` varchar(20) NOT NULL,
  `systemdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event_delete`
--

INSERT INTO `event_delete` (`dbuser`, `event_id`, `event_name`, `event_venue`, `event_date`, `event_chief_guest`, `event_comment`, `event_time`, `event_docs_url`, `status`, `systemdate`) VALUES
('misuser@mis.achchuthan.org', 24, 'sportmeet', 'SLGTI', '2018-11-30', 'Achchuthan', 'All Departments', '02:00:00', 'sport.jpg', '', '2019-11-03'),
('misuser@mis.achchuthan.org', 31, 'Happy Day', 'SLGTI', '2019-12-01', 'Achchuthan', 'All departments', '09:00:00', 'sample.png', '', '2019-11-03'),
('misuser@mis.achchuthan.org', 32, 'sportmeet', 'SLGTI', '2019-11-05', 'Achchuthan', 'All Departments', '10:00:00', 'sport.jpg', '', '2019-11-04');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(11) NOT NULL,
  `feedback_q1` tinyint(1) NOT NULL,
  `feedback_q2` tinyint(1) NOT NULL,
  `feedback_q3` tinyint(1) NOT NULL,
  `feedback_q4` tinyint(1) NOT NULL,
  `feedback_q5` tinyint(1) NOT NULL,
  `feedback_q6` tinyint(1) NOT NULL,
  `feedback_q7` tinyint(1) NOT NULL,
  `feedback_q8` tinyint(1) NOT NULL,
  `feedback_q9` tinyint(1) NOT NULL,
  `feedback_q10` tinyint(1) NOT NULL,
  `feedback_q11` tinyint(1) NOT NULL,
  `feedback_q12` tinyint(1) NOT NULL,
  `feedback_q13` tinyint(1) NOT NULL,
  `feedback_q14` tinyint(1) NOT NULL,
  `feedback_q15` tinyint(1) NOT NULL,
  `feedback_q16` tinyint(1) NOT NULL,
  `feedback_q17` tinyint(1) NOT NULL,
  `feedback_q18` tinyint(1) NOT NULL,
  `feedback_commond` text NOT NULL,
  `survey_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `feedback_q1`, `feedback_q2`, `feedback_q3`, `feedback_q4`, `feedback_q5`, `feedback_q6`, `feedback_q7`, `feedback_q8`, `feedback_q9`, `feedback_q10`, `feedback_q11`, `feedback_q12`, `feedback_q13`, `feedback_q14`, `feedback_q15`, `feedback_q16`, `feedback_q17`, `feedback_q18`, `feedback_commond`, `survey_id`) VALUES
(26, 5, 4, 5, 3, 5, 5, 3, 5, 3, 5, 3, 5, 4, 3, 3, 5, 4, 3, 'rfgdfhgjhhf', 40);

-- --------------------------------------------------------

--
-- Table structure for table `feedback_done`
--

CREATE TABLE `feedback_done` (
  `survey_id` int(11) NOT NULL,
  `student_id` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `s_date` date NOT NULL,
  `s_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback_done`
--

INSERT INTO `feedback_done` (`survey_id`, `student_id`, `s_date`, `s_time`) VALUES
(40, '2025ICT5IT01', '2019-11-06', '05:22:37');

-- --------------------------------------------------------

--
-- Table structure for table `feedback_survey`
--

CREATE TABLE `feedback_survey` (
  `survey_id` int(11) NOT NULL,
  `department_id` varchar(6) NOT NULL,
  `academic_year` varchar(11) NOT NULL,
  `course_id` varchar(11) NOT NULL,
  `module_id` varchar(11) NOT NULL,
  `staff_id` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback_survey`
--

INSERT INTO `feedback_survey` (`survey_id`, `department_id`, `academic_year`, `course_id`, `module_id`, `staff_id`, `start_date`, `end_date`) VALUES
(40, 'ICT', '2018/2019', '5IT', 'M07', 'romiyal', '2019-11-06', '2019-11-13');

--
-- Triggers `feedback_survey`
--
DELIMITER $$
CREATE TRIGGER `delete_feedback_survey` AFTER DELETE ON `feedback_survey` FOR EACH ROW BEGIN
INSERT INTO `delete_feedback_survey` (`survey_id`, `department_id`, `academic_year`, `course_id`, `module_id`, `staff_id`, `start_date`, `end_date`) VALUES (old.survey_id, old.department_id, old.academic_year, old.course_id, old.module_id, old.staff_id, old.start_date, old.end_date);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `food_id` varchar(11) NOT NULL,
  `food_name` varchar(20) NOT NULL,
  `food_unit_qty` int(11) NOT NULL,
  `food_unit_price` double(5,2) NOT NULL,
  `food_measurements` varchar(20) NOT NULL,
  `available_time` varchar(20) NOT NULL,
  `food_img` varchar(50) NOT NULL DEFAULT 'food.png'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`food_id`, `food_name`, `food_unit_qty`, `food_unit_price`, `food_measurements`, `available_time`, `food_img`) VALUES
('fd001', 'Idly', 1, 15.00, 'PC', 'Morning', 'fd001.png'),
('fd002', 'Rotti', 1, 20.00, 'PC', 'Morning', 'fd002.png'),
('fd003', 'String Hoppers', 1, 5.00, 'PC', 'Morning', 'fd003.png'),
('fd004', 'Bread', 1, 120.00, 'PC', 'Morning', 'fd004.png'),
('fd005', 'Fish Rice', 1, 80.00, 'PT', 'Lunch', 'fd005.png'),
('fd006', 'Vegetable Rice', 1, 60.00, 'PT', 'Lunch', 'fd006.png'),
('fd007', 'Chicken Rice', 1, 100.00, 'PT', 'Lunch', 'fd007.png'),
('fd008', 'Spl Food', 1, 100.00, 'PT', 'Lunch', 'fd008.png'),
('fd009', 'Koththu', 1, 100.00, 'PT', 'Dinner', 'fd009.png'),
('fd010', 'Pittu', 1, 100.00, 'PT', 'Dinner', 'fd010.png'),
('fd011', 'Fried Rice', 1, 100.00, 'PT', 'Dinner', 'fd011.png');

-- --------------------------------------------------------

--
-- Table structure for table `food_order`
--

CREATE TABLE `food_order` (
  `food_order_id` int(11) NOT NULL,
  `food_order_user_name` varchar(64) NOT NULL,
  `food_order_date_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `food_order_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `food_order`
--

INSERT INTO `food_order` (`food_order_id`, `food_order_user_name`, `food_order_date_time`, `food_order_status`) VALUES
(385, 'admin', '2019-11-06 10:25:05', 'Pending'),
(386, 'admin', '2019-11-19 14:15:35', 'Pending'),
(387, 'admin', '2019-12-04 02:25:23', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `food_order_details`
--

CREATE TABLE `food_order_details` (
  `food_order_details_food_order_id` int(11) NOT NULL,
  `food_order_details_food_id` varchar(11) NOT NULL,
  `food_order_details_food_qty` double NOT NULL,
  `food_order_details_unit_price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hostel_student_details`
--

CREATE TABLE `hostel_student_details` (
  `hosttler_id` int(11) NOT NULL,
  `student_id` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `department_id` varchar(255) NOT NULL,
  `distance` varchar(50) NOT NULL,
  `block_no` varchar(20) NOT NULL,
  `room_no` varchar(20) NOT NULL,
  `date_of_addmission` date NOT NULL,
  `date_of_leaving` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hostel_student_details`
--

INSERT INTO `hostel_student_details` (`hosttler_id`, `student_id`, `department_id`, `distance`, `block_no`, `room_no`, `date_of_addmission`, `date_of_leaving`) VALUES
(92, '2025ict5it01', 'ict', ' 80km', ' b3', ' r6', '2019-11-06', '2020-01-31');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `inventory_id` int(11) NOT NULL,
  `inventory_department_id` varchar(60) NOT NULL,
  `item_id` varchar(50) NOT NULL,
  `inventory_status` varchar(50) NOT NULL,
  `inventory_quantity` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`inventory_id`, `inventory_department_id`, `item_id`, `inventory_status`, `inventory_quantity`) VALUES
(1, 'ICT', 'ICTLab01PC24', 'working', '45');

-- --------------------------------------------------------

--
-- Table structure for table `inventory_item`
--

CREATE TABLE `inventory_item` (
  `item_id` varchar(50) NOT NULL,
  `supplier_id` varchar(30) NOT NULL,
  `inventory_item_purchase` date NOT NULL,
  `inventory_item_warranty` date NOT NULL,
  `inventory_item_description` varchar(255) NOT NULL,
  `item_code` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory_item`
--

INSERT INTO `inventory_item` (`item_id`, `supplier_id`, `inventory_item_purchase`, `inventory_item_warranty`, `inventory_item_description`, `item_code`) VALUES
('AUTLAB01pc24', 'sangeevan', '2019-11-15', '2023-12-07', 'new', 'pc'),
('ICTLab01PC24', 'jureesan1234', '2018-11-08', '2023-11-12', '30 minutes save the pc', 'PC');

-- --------------------------------------------------------

--
-- Table structure for table `inventory_item_supplier`
--

CREATE TABLE `inventory_item_supplier` (
  `supplier_id` varchar(30) NOT NULL,
  `supplier_name` varchar(255) NOT NULL,
  `supplier_phone_number` varchar(20) NOT NULL,
  `supplier_email` varchar(255) NOT NULL,
  `supplier_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory_item_supplier`
--

INSERT INTO `inventory_item_supplier` (`supplier_id`, `supplier_name`, `supplier_phone_number`, `supplier_email`, `supplier_address`) VALUES
(' 132123', 'saru', '234234', 'vss', 'vavuniya'),
('234', 'pubg', '0764272247', 'sarusaru03', 'kilinochchi'),
('jureesan1234', 'jureesan', '+940772580460', 'jureesan04@gmail.com', 'kilinochchi'),
('sangeevan', 'g sangeevan', '-9412345678', 'sangeevan03', 'kilinochchi');

-- --------------------------------------------------------

--
-- Table structure for table `issued_books`
--

CREATE TABLE `issued_books` (
  `record_id` int(11) NOT NULL,
  `member_id` varchar(20) NOT NULL,
  `book_serial` varchar(40) NOT NULL,
  `issued_date` date NOT NULL,
  `issued_time` time NOT NULL,
  `returned_date` date DEFAULT NULL,
  `returned_time` time DEFAULT NULL,
  `fine_reson` varchar(100) DEFAULT NULL,
  `fine` double(7,2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `issued_books`
--

INSERT INTO `issued_books` (`record_id`, `member_id`, `book_serial`, `issued_date`, `issued_time`, `returned_date`, `returned_time`, `fine_reson`, `fine`) VALUES
(49, '2018ICT5IT22', 'slgti/lib/2019/2/1', '2019-11-03', '02:40:38', '2019-11-02', '22:33:57', 'no fine', 0.00),
(52, '2016ICT4IT03', 'slgti/lib/2019/14/1', '2019-10-05', '17:46:39', NULL, NULL, NULL, NULL),
(50, '2017ICTBIT03', 'slgti/lib/2019/50/1', '2019-10-04', '03:57:29', NULL, NULL, NULL, NULL),
(53, '2017MEC5MT09', 'slgti/lib/2019/10/1', '2019-11-05', '17:49:51', NULL, NULL, NULL, NULL),
(54, '2018COTBIT02', 'slgti/lib/2019/4/7', '2019-11-05', '17:50:38', NULL, NULL, NULL, NULL),
(55, '2018COTBIT02', 'slgti/lib/2019/4/8', '2019-11-05', '17:51:50', NULL, NULL, NULL, NULL),
(56, '2017ICTBIT06', 'slgti/lib/2019/15/1', '2019-10-25', '05:57:18', NULL, NULL, NULL, NULL);

--
-- Triggers `issued_books`
--
DELIMITER $$
CREATE TRIGGER `copy_status_update` AFTER DELETE ON `issued_books` FOR EACH ROW BEGIN
UPDATE book_copies
SET `status`='available'
WHERE `book_serial`=old.book_serial;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `issued_books_deleted` AFTER DELETE ON `issued_books` FOR EACH ROW BEGIN
INSERT INTO `issued_books_deleted` (`record_id`, `member_id`, `book_serial`, `issued_date`, `issued_time`, `returned_date`, `returned_time`, `fine_reson`, `fine`) VALUES (old.record_id, old.member_id, old.book_serial, old.issued_date, old.issued_time, old.returned_date, old.returned_time, old.fine_reson, old.fine);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `issued_books_deleted`
--

CREATE TABLE `issued_books_deleted` (
  `record_id` int(11) NOT NULL,
  `member_id` varchar(20) NOT NULL,
  `book_serial` varchar(40) NOT NULL,
  `issued_date` date NOT NULL,
  `issued_time` time NOT NULL,
  `returned_date` date DEFAULT NULL,
  `returned_time` time DEFAULT NULL,
  `fine_reson` varchar(100) DEFAULT NULL,
  `fine` double(7,2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `issued_books_deleted`
--

INSERT INTO `issued_books_deleted` (`record_id`, `member_id`, `book_serial`, `issued_date`, `issued_time`, `returned_date`, `returned_time`, `fine_reson`, `fine`) VALUES
(51, '2018ICT5IT22', 'slgti/lib/2019/14/1', '2019-11-05', '15:40:35', NULL, NULL, NULL, NULL),
(48, '2018ICT5IT22', 'slgti/lib/2019/3/1', '2019-10-03', '02:14:28', '2019-11-04', '04:10:25', 'avc', 250.00);

-- --------------------------------------------------------

--
-- Table structure for table `manage_final_place`
--

CREATE TABLE `manage_final_place` (
  `student_id` varchar(25) NOT NULL,
  `student_name` varchar(50) NOT NULL,
  `department_name` varchar(50) NOT NULL,
  `requested_place` varchar(100) NOT NULL,
  `requested_address` varchar(200) NOT NULL,
  `requested_district1` varchar(50) NOT NULL,
  `requested_district2` varchar(50) NOT NULL,
  `comment_1` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manage_final_place`
--

INSERT INTO `manage_final_place` (`student_id`, `student_name`, `department_name`, `requested_place`, `requested_address`, `requested_district1`, `requested_district2`, `comment_1`) VALUES
('1000', 'Jeyananthan Piruntha', 'EET', 'Ampara', 'No-7, Buhari road,Ampara', '', '', ''),
('2018/SLGTI/5IT/11', 'Pathmanathan Jasmin', 'COT', '', '', 'kilinochchi', 'batticola', 'etghfytr6hu '),
('52252', 'asca', 'EET', '', '', 'ampara', 'batticola', 'sdfgr4hyu76kiyu8k'),
('56', 'davit davit', 'COT', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `module`
--

CREATE TABLE `module` (
  `module_id` varchar(11) NOT NULL,
  `module_name` varchar(255) NOT NULL,
  `module_aim` varchar(255) NOT NULL,
  `module_learning_hours` int(5) NOT NULL,
  `module_resources` varchar(255) NOT NULL,
  `module_learning_outcomes` varchar(255) NOT NULL,
  `semester_id` enum('1','2') NOT NULL,
  `module_reference` varchar(255) NOT NULL,
  `module_relative_unit` varchar(255) NOT NULL,
  `module_lecture_hours` int(5) NOT NULL,
  `module_practical_hours` int(5) NOT NULL,
  `module_self_study_hours` int(5) NOT NULL,
  `course_id` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `module`
--

INSERT INTO `module` (`module_id`, `module_name`, `module_aim`, `module_learning_hours`, `module_resources`, `module_learning_outcomes`, `semester_id`, `module_reference`, `module_relative_unit`, `module_lecture_hours`, `module_practical_hours`, `module_self_study_hours`, `course_id`) VALUES
('EMPM02', 'Manage Workplace Communication', 'Text Here', 250, 'Text Here', 'Text Here', '1', 'Text Here', 'Text Here', 30, 10, 10, '5FT'),
('EMPM02', 'Manage Workplace Communication', 'Text Here', 250, 'Text Here', 'Text Here', '1', 'Text Here', 'Text Here', 20, 20, 10, '5IT'),
('M01', 'Manage Workplace Information', 'Text Here', 12, 'Text Here', 'Text Here', '1', 'Text Here', 'Text Here', 12, 12, 55, '4AT'),
('M01', 'Manage Workplace Information', 'Text Here', 500, 'Text Here', 'Text Here', '2', 'Text Here', 'Text Here', 100, 141, 2, '4CS'),
('M01', 'Manage Workplace Information', 'Text Here', 12, 'Text Here', 'Text Here', '1', 'Text Here', 'Text Here', 1200, 12, 11, '5AT'),
('M01', 'Mathematics For Construction Technology', 'Text Here', 110, 'Text Here', 'Text Here', '1', 'Text Here', 'Text Here', 100, 10, 40, '5CT'),
('M01', 'Characterictics of Food raw materials and Ingredients', 'Text Here', 120, 'Text Here', 'Text Here', '1', 'Text Here', 'Text Here', 55, 55, 40, '5FT'),
('M01', 'Database I', 'Text Here', 125, 'Text Here', 'Text Here', '1', 'Text Here', 'Text Here', 50, 15, 10, '5IT'),
('M01', 'Manage Workplace Information', 'Text Here', 12, 'Text Here', 'Text Here', '1', 'Text Here', 'Text Here', 68, 68, 86, '5ME'),
('M01', 'Manage Workplace Information', 'Text Here', 11, 'Text Here', 'Text Here', '1', 'Text Here', 'Text Here', 121, 125, 25, '6IT'),
('M01', 'Manage Workplace Information', 'Text Here', 202, 'Text Here', 'Text Here', '1', 'Text Here', 'Text Here', 20, 12, 12, 'BAT'),
('M01', 'Manage Workplace Information', 'Text Here', 5, 'Text Here', 'Text Here', '1', 'Text Here', 'Text Here', 100, 141, 1, 'BIT'),
('M02', 'Maths', 'Text Here', 123, 'Text Here', 'Text Here', '2', 'Text Here', 'Text Here', 1200, 141, 12, '4AT'),
('M02', 'Technical Drawing', 'Text Here', 360, 'Text Here', 'Text Here', '1', 'Text Here', 'Text Here', 60, 30, 30, '5CT'),
('M02', 'Storage OF Food Raw Materials and ingredients', 'Text Here', 250, 'Text Here', 'Text Here', '1', 'Text Here', 'Text Here', 25, 50, 20, '5FT'),
('M02', 'Database System II', 'Text Here', 75, 'Text Here', 'Text Here', '2', 'Text Here', 'Text Here', 40, 60, 25, '5IT'),
('M02', 'Maths', 'Text Here', 11, 'Text Here', 'Text Here', '1', 'Text Here', 'Text Here', 121, 125, 25, '6IT'),
('M02', 'Maths', 'Text Here', 202, 'Text Here', 'Text Here', '1', 'Text Here', 'Text Here', 20, 12, 12, 'BAT'),
('M02', 'Maths', 'Text Here', 12, 'Text Here', 'Text Here', '1', 'Text Here', 'Text Here', 44, 12, 55, 'BCT'),
('M02', 'Maths', 'Text Here', 11, 'Text Here', 'Text Here', '1', 'Text Here', 'Text Here', 14, 15, 52, 'BIT'),
('M03', 'Local Area Network', 'Text Here', 100, 'Text Here', 'Text Here', '2', 'Text Here', 'Text Here', 75, 60, 15, '5IT'),
('M04', 'Software Programming', 'Text Here', 75, 'Text Here', 'Text Here', '1', 'Text Here', 'Text Here', 50, 60, 40, '5IT'),
('M05', 'Software Testing', 'Text Here', 100, 'Text Here', 'Text Here', '2', 'Text Here', 'Text Here', 50, 350, 100, '5IT'),
('M06', 'Food manufacturing process control - I', 'Text Here', 320, 'Text Here', 'Text Here', '2', 'Text Here', 'Text Here', 15, 50, 10, '5FT'),
('M07', 'Advance Java', 'Text Here', 1200, 'Text Here', 'Text Here', '2', 'Text Here', 'Text Here', 60, 20, 20, '5IT'),
('M08', 'PHP Program', 'Text Here', 250, 'Text Here', 'Text Here', '2', 'Text Here', 'Text Here', 60, 20, 20, '5IT'),
('M10', 'Mathematics For Automotive Technology', 'Text Here', 23, 'Text Here', 'Text Here', '1', 'Text Here', 'Text Here', 120, 141, 11, '4AT'),
('M50', 'A', 'fgg', 0, 'fg', 'fg', '', 'fg', 'g', 0, 0, 0, '5IT');

-- --------------------------------------------------------

--
-- Table structure for table `notice_event`
--

CREATE TABLE `notice_event` (
  `event_id` int(11) NOT NULL,
  `event_name` varchar(255) NOT NULL,
  `event_venue` varchar(255) NOT NULL,
  `event_date` date NOT NULL,
  `event_chief_guest` varchar(30) NOT NULL,
  `event_comment` text NOT NULL,
  `event_time` time NOT NULL,
  `event_docs_url` varchar(30) NOT NULL DEFAULT 'sample.png',
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notice_event`
--

INSERT INTO `notice_event` (`event_id`, `event_name`, `event_venue`, `event_date`, `event_chief_guest`, `event_comment`, `event_time`, `event_docs_url`, `status`) VALUES
(16, 'Awarding Ceremony', 'SLGTI', '2020-01-01', 'Achchuthan', ' On this occasion around two hundred students were awarded including NVQ Level 03, Level 04 and Bridging programmer for Diploma holders. We wish them to have a great future ahead.', '09:00:00', 'awarding.jpg', '2'),
(27, 'xmas', 'SLGTI', '2018-12-01', 'Achchuthan', '\r\nAccordingly the students presented the Christmas story, followed by speeches from the principal and deputy principal. They emphasized the message behind Christmas', '09:00:00', 'xmas.jpg', '1'),
(28, 'Awaring Ceremony', 'SLGTI', '2018-11-01', 'Achchuthan', ' On this occasion around two hundred students were awarded including NVQ Level 03, Level 04 and Bridging programmer for Diploma holders. We wish them to have a great future ahead.', '09:00:00', 'sample.png', '2'),
(29, 'Green Day', 'SLGTI', '2019-11-28', 'Achchuthan', 'Green describes not only a color, it stands for an attitude and lifestyle. Green means a respectful contact with the natural environment as well as the human environment.', '09:00:00', 'sample.png', '1'),
(30, 'New Year', 'SLGTI', '2020-01-01', 'Achchuthan', 'Happy Tamil & Sinhala New Year 2020 -  students and staff celebrated the New Year together, by showing the diversity, and the unity of Sri Lanka.', '09:00:00', 'newyear.jpg', '1'),
(33, 'christmas', 'slgti', '2019-12-25', 'principle', 'all department', '09:00:00', 'FB--ICT.jpg', '1'),
(34, 'fe', 'dfgdf', '2019-11-22', 'cdfsfd', 'Not', '02:02:00', '', '4'),
(35, 'new', 'slgti', '2019-12-31', 'asadsad', 'adsd', '00:12:00', 'Task 08.pdf', '1');

--
-- Triggers `notice_event`
--
DELIMITER $$
CREATE TRIGGER `event_delete` BEFORE DELETE ON `notice_event` FOR EACH ROW BEGIN
 DECLARE auser varchar(40);
 SELECT user() INTO auser;
 INSERT into 
 event_delete(dbuser,event_id,event_name,event_venue,event_date,event_chief_guest,event_comment,event_time,event_docs_url,systemdate)VALUES(auser,old.event_id,old.event_name,old.event_venue,old.event_date,old.event_chief_guest,old.event_comment,old.event_time,old.event_docs_url,sysdate());END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `notice_event_stutas`
--

CREATE TABLE `notice_event_stutas` (
  `status` varchar(30) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notice_event_stutas`
--

INSERT INTO `notice_event_stutas` (`status`, `id`) VALUES
('Celebration', 1),
('AwardingCeremony', 2),
('Visitor\'sVisit', 3),
('Volunteer', 4);

-- --------------------------------------------------------

--
-- Table structure for table `notice_result`
--

CREATE TABLE `notice_result` (
  `result_id` int(11) NOT NULL,
  `department_id` varchar(6) NOT NULL,
  `academic_year` varchar(11) NOT NULL,
  `course_id` varchar(11) NOT NULL,
  `module_id` varchar(11) NOT NULL,
  `upload` varchar(30) NOT NULL DEFAULT 'sample.pdf'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notice_result`
--

INSERT INTO `notice_result` (`result_id`, `department_id`, `academic_year`, `course_id`, `module_id`, `upload`) VALUES
(180, 'AUT', '2017/2018', '4AT', 'M01', 'm1.pdf'),
(183, 'AUT', '2016/2017', '4AT', 'M02', '156843399910-si.pdf'),
(184, 'AUT', '2016/2017', '3ME', 'M01', 'test.txt'),
(185, 'AUT', '2016/2017', '3ME', 'M01', 'test.txt'),
(195, 'ICT', '2017/2018', '4IT', 'M02', 'em2.pdf'),
(196, 'COT', '2016/2017', '4CS', 'M02', 'A1.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `off_peak`
--

CREATE TABLE `off_peak` (
  `student_id` varchar(255) NOT NULL,
  `name_of_applicant` varchar(50) NOT NULL,
  `department` varchar(30) NOT NULL,
  `contact_no` int(10) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `reson_for_exit` varchar(255) NOT NULL,
  `warden's_comment` varchar(255) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `off_peak`
--

INSERT INTO `off_peak` (`student_id`, `name_of_applicant`, `department`, `contact_no`, `date`, `time`, `reson_for_exit`, `warden's_comment`, `status`) VALUES
(' 2025ict5it01', 'TEST STUDENT 1', 'Information  Communication Tec', 777123456, '2019-11-02', '13:37:00', ' test', 'why not?', 'Approved'),
(' 2025ict5it01', 'TEST STUDENT 1', 'Information  Communication Tec', 777123456, '2019-11-03', '13:37:00', ' test', 'no way', 'Rejected'),
(' 2025ict5it01', 'TEST STUDENT 1', 'Information  Communication Tec', 777123456, '2019-11-04', '11:09:00', ' fever', 'ok', 'Approved'),
(' 2025ict5it01', 'TEST STUDENT 1', 'Information  Communication Tec', 777123456, '2019-11-05', '13:40:00', ' test2', 'no', 'Rejected'),
(' 2025ict5it01', 'TEST STUDENT 1', 'Information  Communication Tec', 777123456, '2019-12-06', '17:00:00', ' Sick leave', '', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `ojt`
--

CREATE TABLE `ojt` (
  `student_id` varchar(25) NOT NULL,
  `student_name` varchar(50) NOT NULL,
  `phone_no` int(11) NOT NULL,
  `e_mail` varchar(50) NOT NULL,
  `department_name` varchar(50) NOT NULL,
  `requested_place` varchar(100) NOT NULL,
  `requested_address` varchar(200) NOT NULL,
  `requested_district1` varchar(50) NOT NULL,
  `requested_district2` varchar(50) NOT NULL,
  `final_place` varchar(100) NOT NULL,
  `final_address` varchar(200) NOT NULL,
  `want_salary` varchar(3) NOT NULL,
  `comment_1` varchar(500) NOT NULL,
  `starting` date NOT NULL,
  `ending` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ojt`
--

INSERT INTO `ojt` (`student_id`, `student_name`, `phone_no`, `e_mail`, `department_name`, `requested_place`, `requested_address`, `requested_district1`, `requested_district2`, `final_place`, `final_address`, `want_salary`, `comment_1`, `starting`, `ending`) VALUES
('1', 'Pathmanathan Hephzibah', 771542879, 'jhephz7676@gmail.com', 'ICT', '', '', '', '', 'IIT', 'colombo-08', '', '', '2019-10-01', '2020-04-30'),
('10', 'Jeyananthan Piruntha', 771542879, 'jhephz7676@gmail.com', 'AUT', '', '', '', '', 'ascasc', 'asdcasc', '', '', '0000-00-00', '0000-00-00'),
('1000', 'Jeyananthan Piruntha', 775486925, 'marian8863@gamil.com', 'EET', 'Ampara', 'No-7, Buhari road,Ampara', '', '', '', '', '', '', '0000-00-00', '0000-00-00'),
('2018/SLGTI/5IT/11', 'Pathmanathan Jasmin', 0, '', 'COT', '', '', 'kilinochchi', 'batticola', '', '', 'Yes', 'etghfytr6hu ', '0000-00-00', '0000-00-00'),
('2022', 'Aabraham Isac', 774586952, 'jhephz7676@gmail.com', 'ICT', '', '', '', '', 'Campus ', 'Ariviyalnagar', '', '', '2019-10-01', '2020-04-01'),
('2051', 'Selvam Menaga', 771542879, 'marian8863@gamil.com', 'AUT', 'Ampara', 'No-7, Buhari road,Ampara', '', '', 'Campus ', 'Ariviyalnagar', '', '', '2019-10-01', '2020-05-31'),
('2147483647', 'Pathmanathan Jasmin', 771542879, 'hepzihepzi15296@gmail.com', 'EET', '', '', '', '', 'Gamphaha', 'asdcasc', '', '', '2019-10-01', '2020-05-30'),
('52252', 'asca', 0, '', 'EET', '', '', 'ampara', 'batticola', '', '', 'Yes', 'sdfgr4hyu76kiyu8k', '0000-00-00', '0000-00-00'),
('56', 'davit davit', 774586952, 'uyhtr45@gmail.com', 'COT', '', '', '', '', 'thyuik', '4e576y89iokgrerfd', '', '', '0000-00-00', '0000-00-00'),
('6554', 'asca', 774586952, 'hepzihepzi15296@gmail.com', 'ICT', '', '', '', '', 'Gamphaha', 'asdcasc', '', '', '2019-10-01', '2020-05-31');

--
-- Triggers `ojt`
--
DELIMITER $$
CREATE TRIGGER `USER_CREATION_OJT` AFTER INSERT ON `ojt` FOR EACH ROW BEGIN
INSERT INTO manage_final_place SET
manage_final_place.student_id = NEW.student_id,
manage_final_place.student_name = NEW.student_name,
manage_final_place.department_name = NEW.department_name,
manage_final_place.requested_place = NEW.requested_place,
manage_final_place.requested_address = NEW.requested_address,
manage_final_place.requested_district1 = NEW.requested_district1,
manage_final_place.requested_district2 = NEW.requested_district2,
manage_final_place.comment_1 = NEW.comment_1;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `USER_DELETE_OJT` BEFORE DELETE ON `ojt` FOR EACH ROW begin 
 declare auser varchar(15);
 select user() into auser;
 insert into ojt_delete_details(dbuser,student_id,student_name,systemdate) values (auser,old.student_id,old.student_name,sysdate());
 end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `ojt_delete_details`
--

CREATE TABLE `ojt_delete_details` (
  `dbuser` varchar(100) NOT NULL,
  `student_id` varchar(25) NOT NULL,
  `student_name` varchar(50) NOT NULL,
  `systemdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ojt_delete_details`
--

INSERT INTO `ojt_delete_details` (`dbuser`, `student_id`, `student_name`, `systemdate`) VALUES
('misuser@localho', '5', '2019-11-01', '0000-00-00'),
('misuser@localho', '2019', 'varunika', '2019-11-01'),
('misuser@localho', '2', 'Selvam Menaga', '2019-11-01'),
('misuser@localho', '11', 'Moses', '2019-11-02'),
('misuser@localho', '2020', 'mayoori', '2019-11-02'),
('misuser@mis.ach', '2025', 'bala', '2019-11-02'),
('misuser@mis.ach', '100', 'Moses', '2019-11-04'),
('misuser@mis.ach', '30', 'Fathima Sufeera', '2019-11-04'),
('misuser@mis.ach', '4', 'Pathmanathan Godwin', '2019-11-04');

-- --------------------------------------------------------

--
-- Table structure for table `onpeak_delete_details`
--

CREATE TABLE `onpeak_delete_details` (
  `dbuser` varchar(50) NOT NULL,
  `student_id` varchar(20) NOT NULL,
  `department_id` varchar(6) NOT NULL,
  `reason` varchar(20) NOT NULL,
  `exit_date` date NOT NULL,
  `request_date_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `systemdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `onpeak_delete_details`
--

INSERT INTO `onpeak_delete_details` (`dbuser`, `student_id`, `department_id`, `reason`, `exit_date`, `request_date_time`, `systemdate`) VALUES
('misuser@localho', '2025ICT5IT01', 'ICT', 'Choose...', '0000-00-00', '2019-11-01 08:27:33', '2019-11-01'),
('misuser@localho', '2025ICT5IT01', 'ICT', 'Choose...', '0000-00-00', '2019-11-01 08:29:56', '2019-11-01'),
('misuser@localho', '2025ICT5IT01', 'ICT', 'Choose...', '0000-00-00', '2019-11-01 08:32:54', '2019-11-01'),
('misuser@localho', '2025ICT5IT01', 'ICT', 'Choose...', '0000-00-00', '2019-11-01 08:33:16', '2019-11-01'),
('misuser@localho', '2025ICT5IT01', 'ICT', 'Family issues', '2019-11-16', '2019-11-01 09:05:51', '2019-11-01'),
('misuser@localho', '2025ICT5IT01', 'ICT', 'Other Reasons', '2019-10-18', '0000-00-00 00:00:00', '2019-11-01'),
('misuser@172.16.', '2025ICT5IT01', 'ICT', 'Hospital', '2019-11-22', '2019-11-01 09:24:55', '2019-11-01'),
('misuser@mis.ach', '2025ICT5IT01', 'ICT', 'Family issues', '2019-11-21', '2019-11-01 09:39:22', '2019-11-01'),
('misuser@172.16.', '2025ICT5IT01', 'ICT', 'Hospital', '2019-11-16', '2019-11-01 09:06:30', '2019-11-02'),
('misuser@172.16.', '2025ICT5IT01', 'ICT', 'Family issues', '2019-11-21', '2019-11-02 03:52:39', '2019-11-02'),
('misuser@172.16.', '2025ICT5IT01', 'ICT', 'Hospital', '2019-11-22', '2019-11-01 09:24:42', '2019-11-02'),
('misuser@172.16.', '2025ICT5IT01', 'ICT', 'Family issues', '2019-11-23', '2019-11-02 04:31:34', '2019-11-02'),
('misuser@mis.ach', '2025ICT5IT01', 'ICT', 'Hospital', '2019-11-06', '2019-11-02 05:42:56', '2019-11-02'),
('misuser@localho', '2025ICT5IT01', 'ICT', 'Choose...', '0000-00-00', '2019-11-04 08:51:51', '2019-11-04'),
('misuser@localho', '2025ICT5IT01', 'ICT', 'Hospital', '2019-11-28', '2019-11-04 08:57:03', '2019-11-04'),
('misuser@172.16.', '2025ICT5IT01', 'ICT', 'Hospital', '2019-11-06', '2019-11-02 05:44:27', '2019-11-04'),
('misuser@localho', '2025ICT5IT01jmj', 'ICT', 'Family issues', '2019-11-22', '2019-11-05 08:43:42', '2019-11-05'),
('misuser@mis.ach', '2025ICT5IT01', 'ICT', 'Family issues', '2019-11-22', '2019-11-02 05:53:19', '2019-11-05'),
('misuser@mis.ach', '2025ICT5IT01', 'ICT', 'Other Reasons', '2019-11-22', '2019-11-01 09:27:33', '2019-11-05'),
('misuser@mis.ach', '2025ICT5IT01', 'ICT', 'Other Reasons', '2019-11-22', '2019-11-01 09:24:38', '2019-11-05'),
('misuser@localho', '2016ICTBIT04', 'EET', 'Other Reasons', '2019-11-15', '2019-10-31 13:00:56', '2019-11-05'),
('misuser@localho', '2016ICTBIT01', 'COT', 'Hospital', '2019-10-25', '2019-10-31 03:22:00', '2019-11-05'),
('misuser@localho', '2016ICTBIT01', 'COT', 'Other Reasons', '2019-10-25', '2019-10-31 03:06:27', '2019-11-05'),
('misuser@localho', '2016ICTBIT01', 'COT', 'Hospital', '2019-10-25', '2019-10-31 03:21:49', '2019-11-05'),
('misuser@localho', '2016ICTBIT01', 'COT', 'Other Reasons', '2019-11-29', '2019-11-01 03:16:02', '2019-11-05'),
('misuser@localho', '2016ICTBIT01', 'COT', 'Hospital', '2019-11-14', '2019-10-31 13:12:43', '2019-11-05'),
('misuser@localho', '2025ICT5IT01', 'ICT', 'Other Reasons', '2019-11-22', '2019-11-04 09:01:12', '2019-11-05'),
('misuser@172.16.', '2025ICT5IT02', 'ICT', 'Hospital', '2019-11-06', '2019-11-05 09:02:40', '2019-11-05'),
('misuser@localho', '2025ICT5IT02', 'ICT', 'Hospital', '2019-11-06', '2019-11-05 09:03:51', '2019-11-05'),
('misuser@localho', '2025ICT5IT02', 'ICT', 'Hospital', '2019-11-06', '2019-11-05 09:04:41', '2019-11-05'),
('misuser@localho', '2025ICT5IT02', 'ICT', 'Hospital', '2019-11-06', '2019-11-05 09:09:20', '2019-11-05'),
('misuser@localho', '2025ICT5IT02', 'ICT', 'Hospital', '2019-11-06', '2019-11-05 09:10:38', '2019-11-05'),
('misuser@localho', '2025ICT5IT02', 'ICT', 'Hospital', '2019-11-06', '2019-11-05 09:10:52', '2019-11-05'),
('misuser@localho', '2025ICT5IT02', 'ICT', 'Hospital', '2019-11-06', '2019-11-05 09:11:01', '2019-11-05'),
('misuser@localho', '2025ICT5IT02', 'ICT', 'Hospital', '2019-11-06', '2019-11-05 09:11:18', '2019-11-05'),
('misuser@localho', '2025ICT5IT02', 'ICT', 'Hospital', '2019-11-06', '2019-11-05 09:13:15', '2019-11-05'),
('misuser@localho', '2025ICT5IT02', 'ICT', 'Hospital', '2019-11-06', '2019-11-05 09:16:27', '2019-11-05'),
('misuser@localho', '2025ICT5IT02', 'ICT', 'Hospital', '2019-11-06', '2019-11-05 09:18:45', '2019-11-05'),
('misuser@localho', '', 'ICT', 'Hospital', '2019-11-13', '2019-11-05 09:20:05', '2019-11-05'),
('misuser@localho', '', 'ICT', 'Hospital', '2019-11-13', '2019-11-05 09:21:58', '2019-11-07'),
('misuser@mis.ach', '2025ICT5IT01', 'ICT', 'Hospital', '2019-11-13', '2019-11-07 04:45:05', '2019-11-07'),
('misuser@mis.ach', '2025ICT5IT01', 'ICT', 'Family issues', '2019-11-07', '2019-11-07 06:08:11', '2019-11-07');

-- --------------------------------------------------------

--
-- Table structure for table `onpeak_request`
--

CREATE TABLE `onpeak_request` (
  `id` int(11) NOT NULL,
  `student_id` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `department_id` varchar(6) NOT NULL,
  `contact_no` int(11) NOT NULL,
  `reason` varchar(20) NOT NULL,
  `exit_date` date NOT NULL,
  `exit_time` time NOT NULL,
  `return_date` date NOT NULL,
  `return_time` time NOT NULL,
  `comment` text NOT NULL,
  `onpeak_request_status` enum('Approved','Pending','Not Approved') DEFAULT 'Pending',
  `request_date_time` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `onpeak_request`
--

INSERT INTO `onpeak_request` (`id`, `student_id`, `department_id`, `contact_no`, `reason`, `exit_date`, `exit_time`, `return_date`, `return_time`, `comment`, `onpeak_request_status`, `request_date_time`) VALUES
(27, '2016ICTBIT01', 'COT', 777123456, 'Family issues', '2019-10-30', '12:59:00', '2019-12-31', '12:59:00', 'fever', 'Approved', '2019-10-30 14:42:00'),
(28, '2016ICTBIT01', 'COT', 777123456, 'Family issues', '2019-10-18', '09:00:00', '2019-10-18', '12:00:00', 'i want to go to home so please give me a permission', 'Not Approved', '2019-10-31 03:06:20'),
(38, '2016ICTBIT04', 'COT', 777123456, 'Hospital', '2019-10-25', '01:00:00', '2019-11-01', '02:00:00', 'i am suffering from stomach pain', 'Approved', '2019-10-31 03:31:48'),
(76, '2025ICT5IT01', 'ICT', 777123456, 'Hospital', '2019-11-22', '13:00:00', '2019-11-30', '14:00:00', 'i want to go to home for some personal problems', 'Approved', '2019-11-04 03:42:00'),
(77, '2025ICT5IT01', 'ICT', 777123456, 'Family issues', '2019-12-04', '14:00:00', '2019-12-04', '15:00:00', 'i want to go home  so please give me a permission', 'Approved', '2019-11-04 03:45:53'),
(85, '2025ICT5IT01', 'ICT', 777123456, 'Family issues', '2019-11-05', '13:00:00', '2019-11-05', '14:04:00', 'i am suffering from leg pain so please give a permission to leave', 'Not Approved', '2019-11-04 09:10:15'),
(87, '2025ICT5IT01', 'ICT', 777123456, 'Family issues', '2019-11-22', '13:00:00', '2019-11-21', '14:00:00', 'fever', 'Not Approved', '2019-11-05 08:47:07'),
(104, '2025ICT5IT01', 'ICT', 779202595, 'Other Reasons', '2019-11-05', '13:42:00', '2019-11-05', '14:42:00', 'I am suffering from fever', 'Not Approved', '2019-11-05 14:11:43'),
(106, '2025ICT5IT01', 'ICT', 770761976, 'Hospital', '2019-11-14', '12:00:00', '2019-11-28', '13:00:00', 'fever', 'Approved', '2019-11-07 06:04:38');

--
-- Triggers `onpeak_request`
--
DELIMITER $$
CREATE TRIGGER `USER_DELETE_ONPEAK` BEFORE DELETE ON `onpeak_request` FOR EACH ROW begin 
 declare auser varchar(15);
 select user() into auser;
 insert into onpeak_delete_details(dbuser,student_id,department_id,reason,exit_date,request_date_time,systemdate) values (auser,old.student_id,old.department_id,old.reason,old.exit_date,old.request_date_time,sysdate());
 end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_reason` varchar(50) NOT NULL,
  `payment_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_reason`, `payment_type`) VALUES
('Bag', 'Accessories'),
('fine', 'Damage'),
('Hats', 'Accessories'),
('Hostel Charges', 'Student Charges'),
('Library Charges', 'Student Charges'),
('Other Charges', 'Other Charges'),
('Recorrection', 'Exam'),
('reexam', 'Exam'),
('reexam', 'TVEC'),
('T.Shirt', 'Accessories');

-- --------------------------------------------------------

--
-- Table structure for table `pays`
--

CREATE TABLE `pays` (
  `pays_id` int(11) NOT NULL,
  `student_id` varchar(25) NOT NULL,
  `payment_type` varchar(100) NOT NULL,
  `payment_reason` varchar(50) NOT NULL,
  `pays_note` varchar(100) NOT NULL,
  `pays_amount` double(8,2) NOT NULL,
  `pays_qty` int(3) NOT NULL,
  `pays_date` date NOT NULL,
  `pays_department` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pays`
--

INSERT INTO `pays` (`pays_id`, `student_id`, `payment_type`, `payment_reason`, `pays_note`, `pays_amount`, `pays_qty`, `pays_date`, `pays_department`) VALUES
(131, '2025ICT5IT01', 'Other Charges', 'Other Charges', '   hj', 2500.00, 1, '2019-10-31', 'ICT'),
(132, '2025ICT5IT01', 'Damage', 'fine', '   computer', 5000.00, 1, '2019-10-31', 'ICT'),
(134, '2025ICT5IT01', 'Accessories', 'Bag', 'hi', 250.00, 1, '2019-10-31', 'ICT'),
(135, '2018ICT5IT22', 'Accessories', 'Hats', '  m0', 250.00, 1, '2019-10-31', 'ICT'),
(136, '2018COTBIT02', 'Accessories', 'Hats', ' b', 2500.00, 3, '2019-10-31', 'COT'),
(137, '2025ICT5IT03', 'Student Charges', 'Hostel Charges', 'fine', 250.00, 1, '2019-10-31', 'ICT'),
(139, '2018COTBIT02', 'Other Charges', 'Other Charges', ' Mn', 2500.00, 11, '2019-10-31', 'COT'),
(140, '2025ICT5IT01', 'Student Charges', 'Hostel Charges', 'hi', 250.00, 3, '2019-10-31', 'ICT'),
(141, '2025ICT5IT01', 'Student Charges', 'Hostel Charges', 'hi', 2500.00, 3, '2019-10-31', 'ICT'),
(142, '2025ICT5IT01', 'Accessories', 'Bag', ' fine1', 2500.00, 1, '2019-11-01', 'ICT'),
(143, '2016ICT4IT02', 'Accessories', 'Bag', 'Size-M', 1500.00, 1, '2019-11-02', 'FDT'),
(144, '2016ICT4IT02', 'Other Charges', 'Other Charges', '1', 12.00, 1, '2019-11-02', 'FDT'),
(145, '2016ICT4IT02', 'Accessories', 'Bag', '', 200.00, 1, '2019-11-02', 'FDT'),
(146, '2016ICT4IT02', 'Accessories', 'Bag', '  35', 4.00, 45, '2019-11-02', 'FDT'),
(147, '2025ICT5IT01', 'Student Charges', 'Hostel Charges', '11', 0.00, 11, '2019-11-02', 'ICT'),
(148, '2016ICT4IT02', 'Accessories', 'Bag', '22', 22.00, 12, '2019-11-02', 'ICT'),
(149, '2016ICT4IT02', 'Accessories', 'Bag', '22', 22.00, 12, '2019-11-02', 'ICT'),
(150, '2016ICT4IT02', 'Student Charges', 'Library Charges', 'fine', 250.00, 1, '2019-11-02', 'ICT'),
(151, '2016ICT4IT02', 'Exam', 'reexam', ' MO3', 250.00, 11, '2019-11-02', 'ICT'),
(152, '2016ICT4IT02', 'Accessories', 'T.Shirt', 'SIZE-xl', 1200.00, 1, '2019-11-03', 'ICT'),
(153, '', 'Accessories', 'Bag', 'size-L', 1000.00, 1, '2019-11-03', ''),
(154, '', 'Accessories', 'Bag', 'l', 1000.00, 1, '2019-11-03', ''),
(155, '', 'Student Charges', 'Hostel Charges', 'room no2', 500.00, 1, '2019-11-03', ''),
(156, '', 'Student Charges', 'Hostel Charges', 'no21', 2500.00, 5, '2019-11-03', ''),
(157, '2016ICTBIT01', 'Accessories', 'Hats', 'l', 250.00, 1, '2019-11-03', 'ICT'),
(158, '2016ICTBIT01', 'Other Charges', 'Other Charges', 'fine fo', 250.00, 1, '2019-11-03', 'ICT'),
(159, '2016ICT4IT02', 'Student Charges', 'Library Charges', ' 9', 5.00, 9, '2019-11-03', 'ICT'),
(160, '2016ICT4IT02', 'Accessories', 'T.Shirt', 'size M', 1000.00, 1, '2019-11-04', 'ICT'),
(161, '2025ICT5IT0202', 'Accessories', 'Bag', '545', 0.00, 0, '2019-11-04', 'ICT'),
(162, '2016ICT4IT02', 'Damage', 'fine', '54', 37.00, 1, '2019-11-06', 'ICT'),
(163, '2016ICT4IT02', 'Accessories', 'Hats', 'dfd11', 1500.00, 10, '2019-11-07', 'ICT'),
(164, '', 'Accessories', 'Bag', '1', 1.00, 1, '2019-11-07', ''),
(165, '2016ICT4IT02', 'Damage', 'fine', '1', 1.00, 1, '2019-11-07', 'ICT'),
(166, '2016ICT4IT02', 'Student Charges', 'Hostel Charges', 'room 3', 2500.00, 4, '2019-11-07', 'ICT'),
(167, '2016ICT4IT02', 'Accessories', 'Bag', 'k', 5220.00, 12, '2019-11-07', 'ICT');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `department_id` varchar(6) NOT NULL,
  `staff_name` varchar(50) NOT NULL,
  `staff_address` varchar(50) NOT NULL,
  `staff_dob` date NOT NULL,
  `staff_nic` varchar(15) NOT NULL,
  `staff_email` varchar(254) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `staff_pno` int(11) NOT NULL,
  `staff_date_of_join` date NOT NULL,
  `staff_gender` enum('Male','Female','Transgender') NOT NULL,
  `staff_epf` varchar(20) NOT NULL,
  `staff_position` varchar(80) NOT NULL,
  `staff_type` enum('Permanent','On Contract','Visiting Lecturer') NOT NULL,
  `staff_status` enum('Working','Terminated','Resigned') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `department_id`, `staff_name`, `staff_address`, `staff_dob`, `staff_nic`, `staff_email`, `staff_pno`, `staff_date_of_join`, `staff_gender`, `staff_epf`, `staff_position`, `staff_type`, `staff_status`) VALUES
('10', 'ICT', 'TEST', 'kilin', '2019-11-20', '5656', 'keerththeejan@hotmail.com', 456464, '2019-11-26', 'Male', '5454', 'HOD', 'Permanent', 'Working'),
('22255', 'ICT', '55555', 'ffd', '0000-00-00', 'fgfaf', 'dfasdad', 0, '0000-00-00', 'Male', 'adad', 'LBN', 'Visiting Lecturer', 'Terminated'),
('Accountant', 'ICT', 'Rejah', 'vavuniya', '0000-00-00', '901442581v', 'jaatharshking@gmail.com', 776575314, '0000-00-00', 'Male', '0021', 'LE2', 'Permanent', ''),
('achchuthan', 'ICT', 'Yogaraja Aachuthan ', 'Jaffna ', '2019-08-07', '000000', 'aachuthan@slgti.com', 0, '2019-08-06', 'Male', '0000000', 'ADM', 'Permanent', 'Working'),
('admin', 'ICT', 'TEST ADMIN', 'Jaffna', '2000-10-15', '200123456V', 'admin@slgti.com', 770201356, '2016-10-01', 'Male', '3654', 'ADM', 'Permanent', 'Working'),
('dp', 'ICT', 'TEST STAFF', 'Jaffna', '2019-10-01', '900733550V', 'as@slgti.com', 770201356, '2019-10-26', 'Male', '36542', 'DPA', 'Permanent', 'Resigned'),
('romiyal', 'ICT', 'George Romiyal', 'Trincomalee', '0000-00-00', '897218957V', 'romiyal07@gmail.com', 777101145, '0000-00-00', 'Male', '25874', 'IN3', 'Permanent', 'Working');

--
-- Triggers `staff`
--
DELIMITER $$
CREATE TRIGGER `USER_CREATION_STAFF` BEFORE INSERT ON `staff` FOR EACH ROW INSERT INTO user SET
user.user_table = 'staff',
user.staff_position_type_id = NEW.staff_position,
user.user_name = NEW.staff_id,
user.user_email = NEW.staff_email
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `USER_DELETE_STAFF` BEFORE DELETE ON `staff` FOR EACH ROW DELETE FROM user WHERE user.user_name = OLD.staff_id
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `USER_EMAIL_UPDATE_STAFF` BEFORE UPDATE ON `staff` FOR EACH ROW UPDATE user SET 
user.user_email = NEW.staff_email
WHERE user.user_name = NEW.staff_id
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `USER_NAME_UPDATE_STAFF` AFTER UPDATE ON `staff` FOR EACH ROW UPDATE user SET 
user.user_name = NEW.staff_id
WHERE user.user_name = OLD.staff_id
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `USER_POSITION_UPDATE_STAFF` BEFORE UPDATE ON `staff` FOR EACH ROW UPDATE user SET 
user.staff_position_type_id = NEW.staff_position
WHERE user.user_name = NEW.staff_id
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `staff_module_enrollment`
--

CREATE TABLE `staff_module_enrollment` (
  `staff_module_enrollment_id` int(11) NOT NULL,
  `staff_id` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `course_id` varchar(11) NOT NULL,
  `module_id` varchar(11) NOT NULL,
  `academic_year` varchar(10) NOT NULL,
  `staff_module_enrollment_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff_module_enrollment`
--

INSERT INTO `staff_module_enrollment` (`staff_module_enrollment_id`, `staff_id`, `course_id`, `module_id`, `academic_year`, `staff_module_enrollment_date`) VALUES
(1, 'achchuthan', '5IT', 'M03', '2017/2018', '2019-05-13 00:00:00'),
(2, 'achchuthan', '5IT', 'M02', '2018/2019', '2019-11-07 06:52:40'),
(3, 'romiyal', '5IT', 'M04', '2018/2019', '2019-11-07 06:53:10'),
(4, 'romiyal', '5AT', 'M05', '2016/2017', '2019-11-07 06:57:33');

-- --------------------------------------------------------

--
-- Table structure for table `staff_position`
--

CREATE TABLE `staff_position` (
  `staff_position_id` int(11) NOT NULL,
  `staff_id` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `staff_position_type_id` varchar(11) NOT NULL,
  `staff_position_start_date` date NOT NULL,
  `staff_position_end_date` date NOT NULL,
  `staff_position_status` enum('Active','Completed') NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff_position`
--

INSERT INTO `staff_position` (`staff_position_id`, `staff_id`, `staff_position_type_id`, `staff_position_start_date`, `staff_position_end_date`, `staff_position_status`) VALUES
(1, 'achchuthan', 'ADM', '2019-10-01', '0000-00-00', 'Active'),
(2, 'achchuthan', 'HOD', '2017-10-12', '0000-00-00', 'Active'),
(3, 'achchuthan', 'LE2', '2016-05-31', '0000-00-00', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `staff_position_type`
--

CREATE TABLE `staff_position_type` (
  `staff_position_type_id` varchar(11) NOT NULL,
  `staff_position_type_name` varchar(64) NOT NULL,
  `staff_position` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff_position_type`
--

INSERT INTO `staff_position_type` (`staff_position_type_id`, `staff_position_type_name`, `staff_position`) VALUES
('ACC', 'Accountant', 6),
('ADM', 'Administrator', 1),
('DIR', 'Director', 2),
('DPA', 'Deputy Principal (Academics)', 3),
('DPI', 'Deputy Principal (Industrial)', 4),
('HOD', 'Head of Department', 13),
('HRO', 'Human Resource Officer', 14),
('IN1', 'Instructor GR I', 10),
('IN2', 'Instructor GR II', 11),
('IN3', 'Instructor GR III', 12),
('LBN', 'Librarian', 17),
('LE1', 'Lecturer GR I', 8),
('LE2', 'Lecturer GR II', 9),
('MA2', 'Management Assistant GR II', 15),
('REG', 'Registrar', 5),
('SLE', 'Senior Lecturer ', 7),
('WAR', 'Warden', 16);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `student_title` varchar(5) NOT NULL,
  `student_fullname` varchar(255) NOT NULL,
  `student_ininame` varchar(255) NOT NULL,
  `student_gender` enum('Male','Female') NOT NULL,
  `student_civil` varchar(10) NOT NULL,
  `student_email` varchar(254) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `student_nic` varchar(12) NOT NULL,
  `student_profile_img` varchar(40) NOT NULL DEFAULT 'img/user.jpg',
  `student_dob` date NOT NULL,
  `student_phone` int(10) NOT NULL,
  `student_address` varchar(255) NOT NULL,
  `student_zip` int(10) NOT NULL,
  `student_district` varchar(20) NOT NULL,
  `student_divisions` varchar(50) NOT NULL,
  `student_provice` varchar(20) NOT NULL,
  `student_blood` varchar(5) NOT NULL,
  `student_em_name` varchar(255) NOT NULL,
  `student_em_address` varchar(255) NOT NULL,
  `student_em_phone` int(10) NOT NULL,
  `student_em_relation` varchar(20) NOT NULL,
  `student_status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `student_title`, `student_fullname`, `student_ininame`, `student_gender`, `student_civil`, `student_email`, `student_nic`, `student_profile_img`, `student_dob`, `student_phone`, `student_address`, `student_zip`, `student_district`, `student_divisions`, `student_provice`, `student_blood`, `student_em_name`, `student_em_address`, `student_em_phone`, `student_em_relation`, `student_status`) VALUES
('2016AOT4AT', 'Mr', 'THIRUCHCHELVAM.JANADSHAN', 'T.JANADSHAN', 'Male', 'Single', 'JENA56@gmail.com', '945634123v', 'img/user.jpg', '1993-11-01', 451289688, 'Ariyalai road, jaffna', 40000, 'Killinochchi', 'Nallur', 'Eastern', 'A+', 'T.JANADSHAN', 'Ariyalai road, jaffna', 451289688, 'mother', 'Active'),
('2016FOT5FT01', 'Miss', 'PUVIRAJASINGAM.KAYATHIRI', 'P.KAYATHIRI', 'Female', 'Single', 'gaya58234@slgti.com', '9768687342v', 'img/user.jpg', '2019-11-04', 775299878, 'ariyalnagar road', 40000, 'Jaffna', 'Nallur', '2', 'B+', 'PUVIRAJASINGAM', 'ariyalnagar road', 776552733, 'father', 'Inactive'),
('2016ICT4IT02', 'Mr', 'TEST', 'TEST', '', 'Single', 'GTHH@DHYUIH.COM', '977993v', 'img/user.jpg', '2019-10-30', 758282338, 'No-279/23, Ariyalai, Jaffna', 40000, 'Jaffna', 'Nallur', '1', 'AB-', 'TEST', 'No-279/23, Ariyalai, Jaffna', 758282338, 'father', 'Inactive'),
('2016ICT4IT03', 'Miss', 'THIRUCHELVAM.PRINCEY123', 'T.PRINCEY', 'Female', 'Single', 'thanujah1996@gmail.com', '977554678v36', 'img/user.jpg', '1997-10-10', 778888888, '224/3, ARIYALAI ROAD,ARIYALAI.', 40000, 'Jaffna', 'Nallur', '1', 'A+', 'T.THIRUCHELVAM', '224/3, ARIYALAI ROAD,ARIYALAI.', 752418544, 'mother', 'Active'),
('2016ICT4IT11', 'Miss', 'K.NIMAL', 'K.NIMAL', 'Male', 'Single', 'NIMAL@GMAIL.COM', '123345678912', 'img/user.jpg', '2019-11-13', 758282338, 'No-279/23, Ariyalai, Jaffna', 40000, 'Jaffna', 'Jaffna', '1', 'B+', 'T.GAJAN', 'No-279/23, Ariyalai, Jaffna', 2147483647, 'father', ''),
('2017EET4ET04', 'Mr', 'MANIKKAM.NIMAL', 'M.NIMAL', 'Male', 'Single', 'NITHU234@', '9568647342v', 'img/user.jpg', '2019-11-04', 775299878, 'ariyalnagar road', 40000, 'Jaffna', 'Nallur', 'Northern', 'B+', 'PUVIRAJASINGAM', 'ariyalnagar road', 776552733, 'father', 'Active'),
('2017FOT4FT01', 'Miss', 'kANTHASAMY.PARANIYA', 'K.PARANIYA', 'Female', 'Single', 'gaya678234@', '9068647342v', 'img/user.jpg', '2019-11-04', 775299878, 'ariyalnagar road', 40000, 'Jaffna', 'Nallur', 'Eastern', 'B+', 'PUVIRAJASINGAM', 'ariyalnagar road', 776552733, 'father', 'Active'),
('2017FOTBFT01', 'Miss', 'DAYALAN.PRIYATHARSHINI', 'D.PRIYATHARSHINI', 'Female', 'Single', 'gaya234@', '9768647342v', 'img/user.jpg', '2019-11-04', 775299878, 'ariyalnagar road', 40000, 'Jaffna', 'Nallur', 'Northern', 'B+', 'PUVIRAJASINGAM', 'ariyalnagar road', 776552733, 'father', 'Active'),
('2017ICTBIT03', 'Mr', 'ANTHONY.JUREESAN', 'A.JUREESAN', 'Male', 'Single', 'JDFH@GMAIL.COM', '996868686V', 'img/user.jpg', '2019-11-06', 775299878, 'GHSDIUGOGD', 40000, 'Vavuniya', 'Nallur', 'Eastern', 'A+', 'ANTHONY.JUREESAN', 'GHSDIUGOGD', 451289688, 'mother', 'Active'),
('2017ICTBIT06', 'Miss', 'RAVINTHIRAN,THANUJAH', 'R.THANUJAH', 'Female', 'Single', 'ggfsdgba234@', '9968647342v', 'img/user.jpg', '2019-11-04', 775299878, 'ariyalnagar road', 40000, 'Jaffna', 'Nallur', 'Northern', 'B+', 'PUVIRAJASINGAM', 'ariyalnagar road', 776552733, 'father', 'Active'),
('2017MEC5MT09', 'Mr', 'RONALD KARISHAN', 'R.KARISHAN', 'Male', 'Single', 'kari234@', '9668647342v', 'img/user.jpg', '2019-11-04', 775299878, 'ariyalnagar road', 40000, 'Jaffna', 'Nallur', 'Northern', 'B+', 'ronald', 'ariyalnagar road', 776552733, 'father', 'Active'),
('2018COT5CT', 'Miss', 'ELANGO.ELANTHARAKAI', 'E.ELANTHARAKAI', 'Female', 'Single', 'gaya456234@', '9368647342v', 'img/user.jpg', '2019-11-04', 775299878, 'ariyalnagar road', 40000, 'Jaffna', 'Nallur', 'Northern', 'B+', 'PUVIRAJASINGAM', 'ariyalnagar road', 776552733, 'father', 'Active'),
('2018COTBIT02', 'Miss', 'Atputharasa.Rewathy', 'A.Rewathy', '', 'Single', 'rewaA@gmail.com', '966755342v', 'img/user.jpg', '1996-02-11', 2147483647, 'No-279/23, Ariyalai, Jaffna', 40000, 'Jaffna', 'Nallur', '1', 'C-', 'TEST32434', 'No-279/23, Ariyalai, Jaffna', 758282338, 'father', 'Inactive'),
('2018ICT5IT10', 'Miss', 'NITHARSAN.KOKILAVANI', 'N.KOKILAVANI', 'Female', 'Single', 'KOKI56@gmail.com', '955634123v', 'img/user.jpg', '1993-11-01', 451289688, 'Ariyalai road, jaffna', 40000, 'Killinochchi', 'Nallur', 'Eastern', 'A+', 'T.JANADSHAN', 'Ariyalai road, jaffna', 451289688, 'mother', 'Active'),
('2018ICT5IT22', 'Mr', 'Gafoor Sahan', 'G.Sahan', '', 'Single', 'sahan56@gmail.com', '977594402v', 'img/user.png', '1997-04-04', 778954238, 'No-Ariviyal Nagar, Killinochchi - 10', 3222445, 'Trincomalee', 'Trincomalee', '2', 'B+', 'S.Gafoor', 'No-Ariviyal Nagar, Killinochchi - 10', 752418544, 'guardian', 'Inactive'),
('2019ICTTESP09', 'Miss', 'A.Rewathy', 'A.Rewathy', '', 'Single', 'rewaA123@gmail.com', '456487844564', 'img/user.jpg', '2019-10-02', 758282338, 'No-279/23, Ariyalai, Jaffna', 40000, 'Jaffna', 'Nallur', '1', 'AB-', 'A.Rewathy', 'No-279/23, Ariyalai, Jaffna', 758282338, 'guardian', 'Inactive'),
('2020COT5CTF01', 'Miss', 'NITHARSAN.KOKILAVANI', 'N.KOKILAVANI', 'Female', 'Single', 'mathus56@gmail.com', '205634123v', 'img/user.jpg', '1993-11-01', 451289688, 'Ariyalai road, jaffna', 40000, 'Killinochchi', 'Nallur', 'Eastern', 'A+', 'T.JANADSHAN', 'Ariyalai road, jaffna', 451289688, 'mother', 'Active'),
('2020ICT5ITP01', 'Mr', 'THIRUCHCHELVAM.JANADSHAN', 'T.JANADSHAN', 'Male', 'Single', 'LAVANI56@gmail.com', '905634123v', 'img/user.jpg', '1993-11-01', 451289688, 'Ariyalai road, jaffna', 40000, 'Killinochchi', 'Nallur', 'Eastern', 'A+', 'T.JANADSHAN', 'Ariyalai road, jaffna', 451289688, 'mother', 'Active'),
('2020ICT6ITF01', 'Mrs', 'THILOGINY', 'T.THILOGINY', 'Female', 'Married', 'thiloginy@gmail.com', '1990456789', 'img/user.jpg', '2019-11-28', 754655462, 'NO-65, UTHAYANAGAR EAST, KILLINOCHCHI', 34567890, 'Killinochchi', 'Killinochchi', '1', 'A+', 'T.THILOGINY THILOGINY', 'No-279/23, Ariyalai, Jaffna', 758282338, 'guardian', 'Active'),
('2020ICT6ITP01', 'Miss', 'THILOGINY', 'T.THILOGINY', 'Female', 'Single', 'thiloginy12@gmail.com', '000212345145', 'img/user.jpg', '2019-11-01', 754655490, 'NO-65, UTHAYANAGAR EAST, KILLINOCHCHI', 34567890, 'Killinochchi', 'Killinochchi', '1', 'A+', 'T.THILOGINY THILOGINY', 'No-279/23, Ariyalai, Jaffna', 758282338, 'father', ''),
('2020ICT6ITP02', 'Mrs', 'THILOGINY', 'T.THILOGINY', 'Female', 'Single', 'thiloginy546453@gmail.com', '123456789123', 'img/user.jpg', '2019-11-27', 754655462, 'NO-65, UTHAYANAGAR EAST, KILLINOCHCHI', 34567890, 'Killinochchi', 'Killinochchi', '1', 'A+', 'T.THILOGINY THILOGINY', 'No-279/23, Ariyalai, Jaffna', 758282338, 'guardian', 'Active'),
('2020MET4MTP01', 'Mr', 'THIRUCHCHELVAM.JANADSHAN', 'T.JANADSHAN', 'Male', 'Single', 'UJHA56@gmail.com', '20015634123', 'img/user.jpg', '1993-11-01', 451289688, 'Ariyalai road, jaffna', 40000, 'Killinochchi', 'Nallur', 'Eastern', 'A+', 'T.JANADSHAN', 'Ariyalai road, jaffna', 451289688, 'mother', 'Active'),
('2025ICT5IT01', 'Mr', 'TEST STUDENT 1', 'DON\'T DELETE', '', '', '2025ict5it01@slgti.com', '', 'img/user.png', '0000-00-00', 0, '', 0, '', '', '', 'A+', '', '', 0, '', 'Active'),
('2025ICT5IT02', 'Mr', 'TEST STUDENT 2', 'DON\'T DELETE', '', '', '2025ICT5IT02@slgti.com', '1996651913', 'img/user.png', '0000-00-00', 0, '', 0, '', '', '', '', '', '', 0, '', 'Inactive'),
('2025ICT5IT03', 'Mr', 'TEST STUDENT 3', 'DON\'T DELETE', '', '', '2025ICT5IT03@slgti.com', '1996651914', 'img/user.png', '0000-00-00', 0, '', 0, '', '', '', '', '', '', 0, '', 'Inactive');

--
-- Triggers `student`
--
DELIMITER $$
CREATE TRIGGER `USER_CREATION_STUDENT` BEFORE INSERT ON `student` FOR EACH ROW INSERT INTO user SET
user.user_table = 'student',
user.staff_position_type_id = 'STU',
user.user_name = NEW.student_id,
user.user_email = NEW.student_email
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `USER_DELETE_STUDENT` BEFORE DELETE ON `student` FOR EACH ROW DELETE FROM user WHERE user.user_name = OLD.student_id
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `USER_EMAIL_UPDATE_SUDENT` BEFORE UPDATE ON `student` FOR EACH ROW UPDATE user SET 
user.user_email = NEW.student_email
WHERE user.user_name = NEW.student_id
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `USER_NAME_UPDATE_STUDENT` AFTER UPDATE ON `student` FOR EACH ROW UPDATE user SET 
user.user_name = NEW.student_id
WHERE user.user_name = OLD.student_id
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `student_enroll`
--

CREATE TABLE `student_enroll` (
  `student_id` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `course_id` varchar(11) NOT NULL,
  `course_mode` enum('Part','Full') NOT NULL,
  `academic_year` varchar(11) NOT NULL,
  `student_enroll_date` date NOT NULL,
  `student_enroll_exit_date` date NOT NULL,
  `student_enroll_status` enum('Following','Dropout','Completed','Long Absent') NOT NULL DEFAULT 'Following'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_enroll`
--

INSERT INTO `student_enroll` (`student_id`, `course_id`, `course_mode`, `academic_year`, `student_enroll_date`, `student_enroll_exit_date`, `student_enroll_status`) VALUES
('2016AOT4AT', '4AT', 'Part', '2018/2019', '2001-10-24', '2019-10-03', 'Following'),
('2016AOT4AT', '5IT', 'Full', '2017/2018', '2019-11-28', '2019-11-28', 'Following'),
('2016FOT5FT01', '5FT', 'Part', '2016/2017', '2016-11-06', '2017-11-01', 'Completed'),
('2016FOT5FT01', '5FT', 'Part', '2017/2018', '2019-11-28', '2019-11-27', 'Following'),
('2016FOT5FT01', '5FT', 'Part', '2018/2019', '2019-11-28', '2019-11-27', 'Dropout'),
('2016ICT4IT02', '4IT', 'Full', '2016/2017', '2016-08-01', '2017-09-01', 'Following'),
('2016ICT4IT03', '4IT', 'Full', '2016/2017', '2016-08-01', '2017-10-01', 'Completed'),
('2016ICT4IT03', '5IT', 'Full', '2018/2019', '2018-10-01', '2019-11-08', 'Following'),
('2018COTBIT02', 'BCT', '', '2017/2018', '2019-11-13', '2019-11-13', 'Following'),
('2018COTBIT02', 'BCT', '', '2018/2019', '2019-11-13', '2019-11-13', 'Following'),
('2020COT5CTF01', '5CT', 'Full', '2017/2018', '2019-11-12', '2019-11-13', 'Completed'),
('2020COT5CTF01', '5CT', 'Full', '2018/2019', '2019-11-12', '2019-11-13', 'Completed'),
('2020ICT6ITP02', '6IT', 'Part', '2020/2021', '2019-11-01', '2019-11-01', 'Following'),
('2020MET4MTP01', '5ME', '', '2017/2018', '2019-11-06', '2019-11-12', 'Dropout'),
('2020MET4MTP01', '5ME', '', '2018/2019', '2019-11-06', '2019-11-12', 'Dropout'),
('2025ICT5IT01', '5IT', 'Full', '2018/2019', '2019-10-01', '2017-09-01', 'Following'),
('2025ICT5IT02', '5IT', 'Part', '2018/2019', '2019-11-04', '2019-11-30', 'Following'),
('2025ICT5IT03', '5IT', 'Part', '2018/2019', '2018-11-01', '2019-11-08', 'Following');

--
-- Triggers `student_enroll`
--
DELIMITER $$
CREATE TRIGGER `student_status` AFTER UPDATE ON `student_enroll` FOR EACH ROW UPDATE student SET 
student.student_status = 'Inactive'
WHERE student_enroll.student_enroll_status = 'Long Absent' OR student_enroll.student_enroll_status = 'Dropout' AND student.student_id=student_enroll.student_id
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `student_qualification`
--

CREATE TABLE `student_qualification` (
  `qualification_student_id` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `qualification_type` enum('NVQ3','NVQ4','NVQ5','G.C.EO/L','G.C.EA/L') NOT NULL,
  `qualification_index_no` varchar(30) NOT NULL,
  `qualification_year` int(10) NOT NULL,
  `qualification_description` varchar(255) NOT NULL,
  `qualification_results` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_qualification`
--

INSERT INTO `student_qualification` (`qualification_student_id`, `qualification_type`, `qualification_index_no`, `qualification_year`, `qualification_description`, `qualification_results`) VALUES
('2016FOT5FT01', 'NVQ3', '3456yhu', 2015, 'PHYSICS', 'A'),
('2016FOT5FT01', 'NVQ3', '3456yhu', 2015, 'PHYSICStyu', 'A'),
('2016FOT5FT01', 'NVQ3', '3456yhuyuiyu', 2015, 'PHYSICS', 'A'),
('2016ICT4IT03', 'G.C.EO/L', '123123', 20168, 'Agri', 'S'),
('2016ICT4IT03', 'G.C.EA/L', '123123', 2018, 'BIOLOGY', 'S'),
('2016ICT4IT03', 'G.C.EA/L', '123456789', 2017, 'Chemistry', 'S'),
('2016ICT4IT03', 'G.C.EO/L', '123456789', 2013, 'ENGLISH', 'A'),
('2016ICT4IT03', 'G.C.EO/L', '123456789', 2013, 'MATHS', 'B'),
('2016ICT4IT03', 'G.C.EO/L', '123456789', 2013, 'SCIENCE', 'B'),
('2016ICT4IT03', 'NVQ4', '3456', 2017, 'ICT', 'PASS'),
('2017FOT4FT01', 'G.C.EO/L', '343434343434343', 2013, 'English', 'B'),
('2017FOT4FT01', 'NVQ3', '7777777777', 2013, 'Food Technology', 'Pass'),
('2020ICT6ITP02', 'NVQ5', '123123', 2016, 'ENGLISH', 'f'),
('2020ICT6ITP02', 'G.C.EO/L', '12345654211', 2013, 'History', 'A'),
('2020ICT6ITP02', 'G.C.EO/L', '12345654211', 2013, 'SCIENCE', 'A'),
('2025ICT5IT01', 'NVQ3', '22334455', 2013, 'COMPUTER APPLICATION ASSISTANT', 'PASS'),
('2025ICT5IT03', 'NVQ4', '12345879', 2018, 'hggygy', 'h');

-- --------------------------------------------------------

--
-- Table structure for table `timetable`
--

CREATE TABLE `timetable` (
  `time_id` int(11) NOT NULL,
  `department_id` varchar(64) NOT NULL,
  `course_id` varchar(64) NOT NULL,
  `module_id` varchar(64) NOT NULL,
  `academic_year` varchar(64) NOT NULL,
  `staff_id` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `weekdays` enum('Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday') NOT NULL,
  `timep` enum('P1','P2','P3','P4') NOT NULL,
  `classroom` varchar(67) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timetable`
--

INSERT INTO `timetable` (`time_id`, `department_id`, `course_id`, `module_id`, `academic_year`, `staff_id`, `weekdays`, `timep`, `classroom`, `start_date`, `end_date`) VALUES
(359, 'ICT', '5IT', 'M08', '2016/2017', 'achchuthan', 'Monday', 'P1', 'LAP-03', '2019-11-01', '2019-11-30'),
(360, 'ICT', '5IT', 'M08', '2016/2017', 'achchuthan', 'Monday', 'P2', 'LAP-03', '2019-11-01', '2019-11-30'),
(361, 'ICT', '5IT', 'M08', '2016/2017', 'achchuthan', 'Monday', 'P3', 'LAP-03', '2019-11-01', '2019-11-30'),
(362, 'ICT', '5IT', 'M08', '2016/2017', 'achchuthan', 'Monday', 'P4', 'LAP-03', '2019-11-01', '2019-11-30'),
(363, 'ICT', '5IT', 'M08', '2016/2017', 'achchuthan', 'Tuesday', 'P1', 'LAP-03', '2019-11-01', '2019-11-30'),
(364, 'ICT', '5IT', 'M08', '2016/2017', 'achchuthan', 'Tuesday', 'P2', 'LAP-03', '2019-11-01', '2019-11-30'),
(365, 'ICT', '5IT', 'M08', '2016/2017', 'achchuthan', 'Tuesday', 'P3', 'LAP-03', '2019-11-01', '2019-11-30'),
(366, 'ICT', '5IT', 'M08', '2016/2017', 'achchuthan', 'Tuesday', 'P4', 'LAP-03', '2019-11-01', '2019-11-30'),
(367, 'ICT', '5IT', 'M08', '2016/2017', 'achchuthan', 'Wednesday', 'P1', 'LAP-03', '2019-11-01', '2019-11-30'),
(368, 'ICT', '5IT', 'M08', '2016/2017', 'achchuthan', 'Wednesday', 'P2', 'LAP-03', '2019-11-01', '2019-11-30'),
(369, 'ICT', '5IT', 'M08', '2016/2017', 'achchuthan', 'Wednesday', 'P3', 'LAP-03', '2019-11-01', '2019-11-30'),
(370, 'ICT', '5IT', 'M08', '2016/2017', 'achchuthan', 'Wednesday', 'P4', 'LAP-03', '2019-11-01', '2019-11-30'),
(371, 'ICT', '5IT', 'M08', '2016/2017', 'achchuthan', 'Thursday', 'P1', 'LAP-03', '2019-11-01', '2019-11-30'),
(372, 'ICT', '5IT', 'M08', '2016/2017', 'achchuthan', 'Thursday', 'P2', 'LAP-03', '2019-11-01', '2019-11-30'),
(373, 'ICT', '5IT', 'M08', '2016/2017', 'achchuthan', 'Thursday', 'P3', 'LAP-03', '2019-11-01', '2019-11-30'),
(374, 'ICT', '5IT', 'M08', '2016/2017', 'achchuthan', 'Thursday', 'P4', 'LAP-03', '2019-11-01', '2019-11-30'),
(375, 'ICT', '5IT', 'M08', '2016/2017', 'achchuthan', 'Friday', 'P1', 'LAP-03', '2019-11-01', '2019-11-30'),
(376, 'ICT', '5IT', 'M08', '2016/2017', 'achchuthan', 'Friday', 'P2', 'LAP-03', '2019-11-01', '2019-11-30'),
(377, 'ICT', '5IT', 'M08', '2016/2017', 'achchuthan', 'Friday', 'P3', 'LAP-03', '2019-11-01', '2019-11-30'),
(378, 'ICT', '5IT', 'M08', '2016/2017', 'achchuthan', 'Friday', 'P4', 'LAP-03', '2019-11-01', '2019-11-30');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL COMMENT 'auto incrementing user_id of each user, unique index',
  `user_table` enum('student','staff') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'student',
  `staff_position_type_id` varchar(11) CHARACTER SET latin1 DEFAULT NULL,
  `session_id` varchar(48) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'stores session cookie id to prevent session concurrency',
  `user_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s name, unique',
  `user_password_hash` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'user''s password in salted and hashed format',
  `user_email` varchar(254) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s email, unique',
  `user_active` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'user''s activation status',
  `user_deleted` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'user''s deletion status',
  `user_remember_me_token` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'user''s remember-me cookie token',
  `user_creation_timestamp` bigint(20) DEFAULT NULL COMMENT 'timestamp of the creation of user''s account',
  `user_suspension_timestamp` bigint(20) DEFAULT NULL COMMENT 'Timestamp till the end of a user suspension',
  `user_last_login_timestamp` bigint(20) DEFAULT NULL COMMENT 'timestamp of user''s last login',
  `user_failed_logins` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'user''s failed login attempts',
  `user_last_failed_login` int(10) DEFAULT NULL COMMENT 'unix timestamp of last failed login attempt',
  `user_activation_hash` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'user''s email verification hash string',
  `user_password_reset_hash` char(40) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'user''s password reset code',
  `user_password_reset_timestamp` bigint(20) DEFAULT NULL COMMENT 'timestamp of the password reset request'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='user data';

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_table`, `staff_position_type_id`, `session_id`, `user_name`, `user_password_hash`, `user_email`, `user_active`, `user_deleted`, `user_remember_me_token`, `user_creation_timestamp`, `user_suspension_timestamp`, `user_last_login_timestamp`, `user_failed_logins`, `user_last_failed_login`, `user_activation_hash`, `user_password_reset_hash`, `user_password_reset_timestamp`) VALUES
(1, 'staff', 'ADM', NULL, 'achchuthan', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 'achchuthan@slgti.com', 1, 0, 'c78d5e7786c27776fe774229554ab87dd26043b67fa6fc216d72605579d4b2ca', NULL, NULL, NULL, 0, NULL, NULL, '2527eaaf2d8b2995543ee68ae70917062b539bf9', 1572856689),
(2, 'student', 'STU', NULL, '2025ICT5IT01', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', '2025ict5it01@slgti.com', 1, 0, '685c501f17e9367b82b9c0441de25ae0bef7e41d50a656e5d9721c3dd790b88a', NULL, NULL, NULL, 0, NULL, NULL, '40739cbbd8b5fd47c1973297420457c074b93af6', 1572075283),
(5, 'staff', 'ADM', NULL, 'admin', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 'admin@slgti.com', 1, 0, 'a8ba20a4cb12ecc116809e1437ea61a0be903e556b0b2d3f3a4f359d801e8beb', NULL, NULL, NULL, 0, NULL, NULL, '292e1e623c3535ddaec88bf9d28c0dc698c4fc59', 1586058126),
(15, 'staff', 'HOD', NULL, 'TESTNAME', '1234', 'keerththeejan@gmail.com', 1, 0, '', NULL, NULL, NULL, 0, NULL, NULL, '16cc2184697ca15d1662e22e986349fb00cb8241', 1572930502),
(16, 'student', 'STU', NULL, '2019ICTTESP09', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 'rewaA123@gmail.com', 1, 0, '06c1dd0b34e89d5281b27f0932735cd0dcd9f2f58f9432a5ceee7d3adcc5c926', NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL),
(21, 'staff', 'LE2', NULL, 'Accountant', 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f', 'jaatharshking@gmail.com', 1, 0, '6b47e4ca980c3ac4f2ac8af96409b24cc1204880b52d8b71cc4f37c7451cf800', NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL),
(22, 'staff', 'IN3', NULL, 'romiyal', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 'romiyal07@gmail.com', 1, 0, '5937051952cbb42ffebee5daf0f99d7681f8cec7ce3bee1739ee5071f4a58af5', NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL),
(28, 'staff', 'WAR', NULL, '111', '314c0ae3126b0fe07dee239b3cfc8dedecc8dd2580b957fde9ea7f8ab5e2c7f0', 'sangeevan13@gmail.com', 1, 0, '030b7c886b9fdd8095c3e43e09fb59d06d14d982094dbcb90944f9749e8a6b4f', NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL),
(29, 'student', 'STU', NULL, '2025ICT5IT02', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', '2025ICT5IT02@slgti.com', 1, 0, '4e9c2ea3edcc84a5cbd1d6e83668718d76128a6d82fa62630cab5f8c47a91600', NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL),
(31, 'student', 'STU', NULL, '2016ICT4IT03', '0cf6cb3548c809b77fee6818f8ce35d250ce2bca62d7e302fc018d02aacc788f', 'thanujah1996@gmail.com', 1, 0, '922cf68d4455d24e99a2c022670bbbfc2d33bff70c89782b2accb8419eb17d36', NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL),
(32, 'student', 'STU', NULL, '2017FOTBFT01', NULL, 'gaya234@', 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL),
(41, 'student', 'STU', NULL, '2017ICTBIT06', NULL, 'ggfsdgba234@', 0, 0, NULL, NULL, NULL, NULL, 0, NULL, '44f322feaa9aa1a8e086a4d8f7db3c8848bd2726', NULL, 1572843482),
(42, 'student', 'STU', NULL, '2016FOT5FT01', NULL, 'gaya58234@slgti.com', 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL),
(43, 'student', 'STU', NULL, '2017FOT4FT01', NULL, 'gaya678234@', 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL),
(44, 'student', 'STU', NULL, '2017EET4ET04', NULL, 'NITHU234@', 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL),
(45, 'student', 'STU', NULL, '2017MEC5MT09', NULL, 'kari234@', 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL),
(46, 'student', 'STU', NULL, '2018COT5CT', NULL, 'gaya456234@', 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL),
(47, 'student', 'STU', NULL, '2016AOT4AT', NULL, 'JENA56@gmail.com', 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL),
(50, 'student', 'STU', NULL, '2020MET4MTP01', NULL, 'UJHA56@gmail.com', 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL),
(51, 'student', 'STU', NULL, '2018ICT5IT10', NULL, 'KOKI56@gmail.com', 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL),
(52, 'student', 'STU', NULL, '2020ICT5ITP01', NULL, 'LAVANI56@gmail.com', 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL),
(53, 'student', 'STU', NULL, '2020COT5CTF01', NULL, 'mathus56@gmail.com', 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL),
(54, 'student', 'STU', NULL, '2017ICTBIT03', '1234', 'JDFH@GMAIL.COM', 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL),
(66, 'student', 'STU', '', '2025ICT5IT03', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', '2025ICT5IT03@slgti.com', 1, 0, 'eda4032063cc00a570055f78b5792064614e5256d4641027683cd9ecbd470b35', NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL),
(67, 'student', 'STU', NULL, '2016ICT4IT11', NULL, 'NIMAL@GMAIL.COM', 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL),
(68, 'student', 'STU', NULL, '2020ICT6ITF01', NULL, 'thiloginy@gmail.com', 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL),
(71, 'student', 'STU', NULL, '2020ICT6ITP01', NULL, 'thiloginy12@gmail.com', 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL),
(72, 'student', 'STU', NULL, '2020ICT6ITP02', NULL, 'thiloginy546453@gmail.com', 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL),
(73, 'staff', 'LBN', NULL, '22255', NULL, 'dfasdad', 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academic`
--
ALTER TABLE `academic`
  ADD PRIMARY KEY (`academic_year`);

--
-- Indexes for table `assessments`
--
ALTER TABLE `assessments`
  ADD PRIMARY KEY (`assessment_id`),
  ADD KEY `assessment_type_id` (`assessment_type_id`),
  ADD KEY `academy_year` (`academic_year`),
  ADD KEY `course_name` (`course_id`),
  ADD KEY `assessment_type_id_2` (`assessment_type_id`),
  ADD KEY `module_id` (`module_id`);

--
-- Indexes for table `assessments_marks`
--
ALTER TABLE `assessments_marks`
  ADD PRIMARY KEY (`assessment_marks_id`,`student_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `assessment_id` (`assessment_id`),
  ADD KEY `module_id` (`module_id`);

--
-- Indexes for table `assessments_type`
--
ALTER TABLE `assessments_type`
  ADD PRIMARY KEY (`assessment_type_id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `module_id` (`module_id`),
  ADD KEY `course_id_2` (`course_id`),
  ADD KEY `course_id_3` (`course_id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`attendance_id`,`student_id`);

--
-- Indexes for table `batch`
--
ALTER TABLE `batch`
  ADD PRIMARY KEY (`course_id`,`batch_id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `academic_year` (`academic_year`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`),
  ADD UNIQUE KEY `book_id` (`book_id`),
  ADD KEY `numbering` (`numbering`);

--
-- Indexes for table `book_copies`
--
ALTER TABLE `book_copies`
  ADD PRIMARY KEY (`book_serial`);

--
-- Indexes for table `chat_group`
--
ALTER TABLE `chat_group`
  ADD PRIMARY KEY (`chat_group_id`);

--
-- Indexes for table `chat_group_member`
--
ALTER TABLE `chat_group_member`
  ADD PRIMARY KEY (`chat_group_member_id`),
  ADD KEY `chat_group_id` (`chat_group_id`),
  ADD KEY `chat_group_member` (`chat_group_member`);

--
-- Indexes for table `chat_group_message`
--
ALTER TABLE `chat_group_message`
  ADD PRIMARY KEY (`message_id`),
  ADD KEY `chat_group_reciver_group_id` (`chat_group_reciver_group_id`),
  ADD KEY `chat_group_sender` (`chat_group_sender`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`),
  ADD KEY `department_id` (`department_id`);

--
-- Indexes for table `delete_feedback_survey`
--
ALTER TABLE `delete_feedback_survey`
  ADD PRIMARY KEY (`survey_id`),
  ADD KEY `department_id` (`department_id`),
  ADD KEY `academic_year` (`academic_year`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `module_id` (`module_id`),
  ADD KEY `staff_id` (`staff_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `donation`
--
ALTER TABLE `donation`
  ADD PRIMARY KEY (`donation_id`),
  ADD UNIQUE KEY `donation_id` (`donation_id`),
  ADD UNIQUE KEY `donation_id_2` (`donation_id`),
  ADD UNIQUE KEY `donation_id_3` (`donation_id`),
  ADD UNIQUE KEY `donation_id_4` (`donation_id`);

--
-- Indexes for table `donor`
--
ALTER TABLE `donor`
  ADD PRIMARY KEY (`d_id`),
  ADD KEY `reference_id` (`reference_id`),
  ADD KEY `reference_id_2` (`reference_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`),
  ADD KEY `survey_id` (`survey_id`);

--
-- Indexes for table `feedback_done`
--
ALTER TABLE `feedback_done`
  ADD PRIMARY KEY (`survey_id`,`student_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `feedback_survey`
--
ALTER TABLE `feedback_survey`
  ADD PRIMARY KEY (`survey_id`),
  ADD KEY `staff_id` (`staff_id`),
  ADD KEY `feedback_survey_ibfk_3` (`course_id`),
  ADD KEY `feedback_survey_ibfk_4` (`module_id`),
  ADD KEY `feedback_survey_ibfk_1` (`department_id`),
  ADD KEY `feedback_survey_ibfk_2` (`academic_year`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`food_id`);

--
-- Indexes for table `food_order`
--
ALTER TABLE `food_order`
  ADD PRIMARY KEY (`food_order_id`),
  ADD KEY `user_id` (`food_order_user_name`);

--
-- Indexes for table `food_order_details`
--
ALTER TABLE `food_order_details`
  ADD PRIMARY KEY (`food_order_details_food_order_id`,`food_order_details_food_id`),
  ADD KEY `food_order_id` (`food_order_details_food_order_id`),
  ADD KEY `food_id` (`food_order_details_food_id`);

--
-- Indexes for table `hostel_student_details`
--
ALTER TABLE `hostel_student_details`
  ADD PRIMARY KEY (`hosttler_id`),
  ADD UNIQUE KEY `student_id` (`student_id`),
  ADD UNIQUE KEY `student_id_2` (`student_id`),
  ADD UNIQUE KEY `student_id_3` (`student_id`),
  ADD KEY `department_name` (`department_id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`inventory_id`),
  ADD UNIQUE KEY `department_id` (`inventory_department_id`),
  ADD KEY `itemid` (`item_id`);

--
-- Indexes for table `inventory_item`
--
ALTER TABLE `inventory_item`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `supplier_id` (`supplier_id`);

--
-- Indexes for table `inventory_item_supplier`
--
ALTER TABLE `inventory_item_supplier`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `issued_books`
--
ALTER TABLE `issued_books`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `issued_books_deleted`
--
ALTER TABLE `issued_books_deleted`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `manage_final_place`
--
ALTER TABLE `manage_final_place`
  ADD PRIMARY KEY (`student_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`module_id`,`course_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `notice_event`
--
ALTER TABLE `notice_event`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `notice_event_stutas`
--
ALTER TABLE `notice_event_stutas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notice_result`
--
ALTER TABLE `notice_result`
  ADD PRIMARY KEY (`result_id`),
  ADD KEY `department_id` (`department_id`),
  ADD KEY `academic_year` (`academic_year`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `module_id` (`module_id`);

--
-- Indexes for table `off_peak`
--
ALTER TABLE `off_peak`
  ADD PRIMARY KEY (`student_id`,`date`);

--
-- Indexes for table `ojt`
--
ALTER TABLE `ojt`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `onpeak_request`
--
ALTER TABLE `onpeak_request`
  ADD PRIMARY KEY (`id`,`exit_date`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `onpeak_request_ibfk_1` (`department_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_reason`,`payment_type`);

--
-- Indexes for table `pays`
--
ALTER TABLE `pays`
  ADD PRIMARY KEY (`pays_id`),
  ADD KEY `payment_id` (`payment_reason`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `payment_id_2` (`payment_reason`),
  ADD KEY `payment_type` (`payment_type`),
  ADD KEY `payment_type_2` (`payment_type`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`),
  ADD UNIQUE KEY `staff_nic` (`staff_nic`),
  ADD UNIQUE KEY `staff_epf_no` (`staff_epf`),
  ADD UNIQUE KEY `staff_email` (`staff_email`),
  ADD KEY `department_id` (`department_id`),
  ADD KEY `staff_position` (`staff_position`),
  ADD KEY `staff_id` (`staff_id`);

--
-- Indexes for table `staff_module_enrollment`
--
ALTER TABLE `staff_module_enrollment`
  ADD PRIMARY KEY (`staff_module_enrollment_id`),
  ADD KEY `staff_id` (`staff_id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `academic_year` (`academic_year`),
  ADD KEY `module_id` (`module_id`);

--
-- Indexes for table `staff_position`
--
ALTER TABLE `staff_position`
  ADD PRIMARY KEY (`staff_position_id`),
  ADD KEY `staff_position_type_id` (`staff_position_type_id`),
  ADD KEY `staff_id` (`staff_id`);

--
-- Indexes for table `staff_position_type`
--
ALTER TABLE `staff_position_type`
  ADD PRIMARY KEY (`staff_position_type_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`),
  ADD UNIQUE KEY `student_nic` (`student_nic`),
  ADD UNIQUE KEY `student_email` (`student_email`);

--
-- Indexes for table `student_enroll`
--
ALTER TABLE `student_enroll`
  ADD PRIMARY KEY (`student_id`,`course_id`,`academic_year`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `enroll_student_id` (`student_id`),
  ADD KEY `student_enroll_ibfk_3` (`academic_year`);

--
-- Indexes for table `student_qualification`
--
ALTER TABLE `student_qualification`
  ADD PRIMARY KEY (`qualification_student_id`,`qualification_index_no`,`qualification_description`),
  ADD KEY `qualification_student_id` (`qualification_student_id`);

--
-- Indexes for table `timetable`
--
ALTER TABLE `timetable`
  ADD PRIMARY KEY (`time_id`),
  ADD KEY `department_id` (`department_id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `module_id` (`module_id`),
  ADD KEY `academic_year` (`academic_year`),
  ADD KEY `staff_id` (`staff_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_name` (`user_name`),
  ADD UNIQUE KEY `user_email` (`user_email`),
  ADD KEY `user_name_2` (`user_name`),
  ADD KEY `staff_position_type_id` (`staff_position_type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assessments`
--
ALTER TABLE `assessments`
  MODIFY `assessment_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `assessments_marks`
--
ALTER TABLE `assessments_marks`
  MODIFY `assessment_marks_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;
--
-- AUTO_INCREMENT for table `assessments_type`
--
ALTER TABLE `assessments_type`
  MODIFY `assessment_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `attendance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=188;
--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `numbering` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `chat_group`
--
ALTER TABLE `chat_group`
  MODIFY `chat_group_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `chat_group_member`
--
ALTER TABLE `chat_group_member`
  MODIFY `chat_group_member_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT for table `chat_group_message`
--
ALTER TABLE `chat_group_message`
  MODIFY `message_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=376;
--
-- AUTO_INCREMENT for table `donation`
--
ALTER TABLE `donation`
  MODIFY `donation_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;
--
-- AUTO_INCREMENT for table `donor`
--
ALTER TABLE `donor`
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;
--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `feedback_survey`
--
ALTER TABLE `feedback_survey`
  MODIFY `survey_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `food_order`
--
ALTER TABLE `food_order`
  MODIFY `food_order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=388;
--
-- AUTO_INCREMENT for table `hostel_student_details`
--
ALTER TABLE `hostel_student_details`
  MODIFY `hosttler_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;
--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `inventory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `issued_books`
--
ALTER TABLE `issued_books`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT for table `notice_event`
--
ALTER TABLE `notice_event`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `notice_event_stutas`
--
ALTER TABLE `notice_event_stutas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `notice_result`
--
ALTER TABLE `notice_result`
  MODIFY `result_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=197;
--
-- AUTO_INCREMENT for table `onpeak_request`
--
ALTER TABLE `onpeak_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;
--
-- AUTO_INCREMENT for table `pays`
--
ALTER TABLE `pays`
  MODIFY `pays_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=168;
--
-- AUTO_INCREMENT for table `staff_module_enrollment`
--
ALTER TABLE `staff_module_enrollment`
  MODIFY `staff_module_enrollment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `staff_position`
--
ALTER TABLE `staff_position`
  MODIFY `staff_position_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `timetable`
--
ALTER TABLE `timetable`
  MODIFY `time_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=379;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'auto incrementing user_id of each user, unique index', AUTO_INCREMENT=74;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `assessments`
--
ALTER TABLE `assessments`
  ADD CONSTRAINT `assessments_ibfk_1` FOREIGN KEY (`academic_year`) REFERENCES `academic` (`academic_year`) ON UPDATE CASCADE,
  ADD CONSTRAINT `assessments_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `assessments_ibfk_3` FOREIGN KEY (`assessment_type_id`) REFERENCES `assessments_type` (`assessment_type_id`);

--
-- Constraints for table `assessments_marks`
--
ALTER TABLE `assessments_marks`
  ADD CONSTRAINT `assessment_id_foriegnkey` FOREIGN KEY (`assessment_id`) REFERENCES `assessments` (`assessment_id`),
  ADD CONSTRAINT `assessments_marks_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON UPDATE CASCADE;

--
-- Constraints for table `assessments_type`
--
ALTER TABLE `assessments_type`
  ADD CONSTRAINT `assessments_type_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `assessments_type_ibfk_2` FOREIGN KEY (`module_id`) REFERENCES `module` (`module_id`) ON UPDATE CASCADE;

--
-- Constraints for table `batch`
--
ALTER TABLE `batch`
  ADD CONSTRAINT `academic_year` FOREIGN KEY (`academic_year`) REFERENCES `academic` (`academic_year`),
  ADD CONSTRAINT `course_id` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`);

--
-- Constraints for table `chat_group_member`
--
ALTER TABLE `chat_group_member`
  ADD CONSTRAINT `chat_group_member_ibfk_1` FOREIGN KEY (`chat_group_id`) REFERENCES `chat_group` (`chat_group_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `chat_group_member_ibfk_2` FOREIGN KEY (`chat_group_member`) REFERENCES `user` (`user_name`) ON UPDATE CASCADE;

--
-- Constraints for table `chat_group_message`
--
ALTER TABLE `chat_group_message`
  ADD CONSTRAINT `chat_group_message_ibfk_1` FOREIGN KEY (`chat_group_reciver_group_id`) REFERENCES `chat_group` (`chat_group_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `chat_group_message_ibfk_2` FOREIGN KEY (`chat_group_sender`) REFERENCES `user` (`user_name`) ON UPDATE CASCADE;

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`) ON UPDATE CASCADE;

--
-- Constraints for table `delete_feedback_survey`
--
ALTER TABLE `delete_feedback_survey`
  ADD CONSTRAINT `delete_feedback_survey_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `delete_feedback_survey_ibfk_2` FOREIGN KEY (`academic_year`) REFERENCES `academic` (`academic_year`) ON UPDATE CASCADE,
  ADD CONSTRAINT `delete_feedback_survey_ibfk_3` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `delete_feedback_survey_ibfk_4` FOREIGN KEY (`module_id`) REFERENCES `module` (`module_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `delete_feedback_survey_ibfk_5` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`staff_id`) ON UPDATE CASCADE;

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`survey_id`) REFERENCES `feedback_survey` (`survey_id`) ON DELETE CASCADE;

--
-- Constraints for table `feedback_done`
--
ALTER TABLE `feedback_done`
  ADD CONSTRAINT `feedback_done_ibfk_1` FOREIGN KEY (`survey_id`) REFERENCES `feedback_survey` (`survey_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `feedback_done_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON UPDATE CASCADE;

--
-- Constraints for table `feedback_survey`
--
ALTER TABLE `feedback_survey`
  ADD CONSTRAINT `feedback_survey_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `feedback_survey_ibfk_2` FOREIGN KEY (`academic_year`) REFERENCES `academic` (`academic_year`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `feedback_survey_ibfk_3` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `feedback_survey_ibfk_4` FOREIGN KEY (`module_id`) REFERENCES `module` (`module_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `feedback_survey_ibfk_5` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`staff_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `food_order_details`
--
ALTER TABLE `food_order_details`
  ADD CONSTRAINT `food_id_foreignkey` FOREIGN KEY (`food_order_details_food_id`) REFERENCES `food` (`food_id`),
  ADD CONSTRAINT `food_order_id_foreignkey` FOREIGN KEY (`food_order_details_food_order_id`) REFERENCES `food_order` (`food_order_id`);

--
-- Constraints for table `hostel_student_details`
--
ALTER TABLE `hostel_student_details`
  ADD CONSTRAINT `hostel_student_details_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `hostel_student_details_ibfk_2` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`) ON UPDATE CASCADE;

--
-- Constraints for table `inventory_item`
--
ALTER TABLE `inventory_item`
  ADD CONSTRAINT `inventory_item_ibfk_1` FOREIGN KEY (`supplier_id`) REFERENCES `inventory_item_supplier` (`supplier_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `manage_final_place`
--
ALTER TABLE `manage_final_place`
  ADD CONSTRAINT `foreignkey` FOREIGN KEY (`student_id`) REFERENCES `ojt` (`student_id`) ON UPDATE CASCADE;

--
-- Constraints for table `module`
--
ALTER TABLE `module`
  ADD CONSTRAINT `module_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`) ON UPDATE CASCADE;

--
-- Constraints for table `onpeak_request`
--
ALTER TABLE `onpeak_request`
  ADD CONSTRAINT `onpeak_request_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`) ON UPDATE CASCADE;

--
-- Constraints for table `pays`
--
ALTER TABLE `pays`
  ADD CONSTRAINT `payment_reason_foreingkey` FOREIGN KEY (`payment_reason`) REFERENCES `payment` (`payment_reason`) ON UPDATE CASCADE;

--
-- Constraints for table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `staff_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `staff_ibfk_2` FOREIGN KEY (`staff_position`) REFERENCES `staff_position_type` (`staff_position_type_id`) ON UPDATE CASCADE;

--
-- Constraints for table `staff_module_enrollment`
--
ALTER TABLE `staff_module_enrollment`
  ADD CONSTRAINT `staff_module_enrollment_ibfk_1` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`staff_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `staff_module_enrollment_ibfk_4` FOREIGN KEY (`academic_year`) REFERENCES `academic` (`academic_year`) ON UPDATE CASCADE,
  ADD CONSTRAINT `staff_module_enrollment_ibfk_5` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `staff_module_enrollment_ibfk_6` FOREIGN KEY (`module_id`) REFERENCES `module` (`module_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `staff_position`
--
ALTER TABLE `staff_position`
  ADD CONSTRAINT `staff_position_ibfk_1` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`staff_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `staff_position_ibfk_2` FOREIGN KEY (`staff_position_type_id`) REFERENCES `staff_position_type` (`staff_position_type_id`) ON UPDATE CASCADE;

--
-- Constraints for table `student_enroll`
--
ALTER TABLE `student_enroll`
  ADD CONSTRAINT `student_enroll_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `student_enroll_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `student_enroll_ibfk_3` FOREIGN KEY (`academic_year`) REFERENCES `academic` (`academic_year`) ON UPDATE CASCADE;

--
-- Constraints for table `student_qualification`
--
ALTER TABLE `student_qualification`
  ADD CONSTRAINT `student_qualification_ibfk_1` FOREIGN KEY (`qualification_student_id`) REFERENCES `student` (`student_id`) ON UPDATE CASCADE;

--
-- Constraints for table `timetable`
--
ALTER TABLE `timetable`
  ADD CONSTRAINT `timetable_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `timetable_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `timetable_ibfk_3` FOREIGN KEY (`module_id`) REFERENCES `module` (`module_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `timetable_ibfk_4` FOREIGN KEY (`academic_year`) REFERENCES `academic` (`academic_year`) ON UPDATE CASCADE,
  ADD CONSTRAINT `timetable_ibfk_5` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`staff_id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
