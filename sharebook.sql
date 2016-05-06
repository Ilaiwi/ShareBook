-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: May 06, 2016 at 11:52 PM
-- Server version: 5.5.38
-- PHP Version: 5.6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `sharebook`
--

-- --------------------------------------------------------

--
-- Table structure for table `group_student`
--

CREATE TABLE `group_student` (
  `group_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `group_student`
--

INSERT INTO `group_student` (`group_id`, `student_id`) VALUES
(1, 5),
(1, 6),
(2, 4),
(13, 4),
(14, 4),
(14, 5),
(17, 6);

-- --------------------------------------------------------

--
-- Table structure for table `materials`
--

CREATE TABLE `materials` (
`material_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `group_id` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `materials`
--

INSERT INTO `materials` (`material_id`, `name`, `group_id`) VALUES
(18, '26550919925.docx', 1),
(17, '76473034245.html', 1),
(16, '3243882719.html', 1),
(15, '51200209766.cpp', 1),
(14, '19436655820.cpp', 2),
(13, '92196471764.cpp', 2),
(12, '97874734660.cpp', 1),
(19, '85298692918.pptx', 2);

-- --------------------------------------------------------

--
-- Table structure for table `meeting`
--

CREATE TABLE `meeting` (
`meeting_id` int(11) NOT NULL,
  `meeting_date` date NOT NULL,
  `meeting_place` varchar(20) NOT NULL,
  `trainer_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `date_suggestion1` date NOT NULL,
  `date_suggestion2` date NOT NULL,
  `place_suggestion1` varchar(50) NOT NULL,
  `place_suggestion2` varchar(50) NOT NULL,
  `voting` tinyint(1) NOT NULL DEFAULT '1',
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `meeting`
--

INSERT INTO `meeting` (`meeting_id`, `meeting_date`, `meeting_place`, `trainer_id`, `group_id`, `date_suggestion1`, `date_suggestion2`, `place_suggestion1`, `place_suggestion2`, `voting`, `create_date`) VALUES
(2, '2015-04-08', 'mktbeh', 0, 1, '2015-04-08', '2015-04-22', 'mktbeh', '1010', 0, '2015-04-26 15:42:20'),
(3, '2015-04-22', '1010', 0, 1, '2015-04-08', '2015-04-22', 'mktbeh', '1010', 0, '2015-04-26 15:42:20'),
(5, '0000-00-00', 'NULL', 0, 2, '2015-04-15', '2015-04-14', 'aa', 'aaa', 1, '0000-00-00 00:00:00'),
(6, '0000-00-00', 'NULL', 0, 1, '2015-06-09', '2015-06-11', 'home', 'home2', 1, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
`question_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `question` text NOT NULL,
  `answer` text,
  `title` varchar(50) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`question_id`, `group_id`, `question`, `answer`, `title`) VALUES
(1, 1, 'Who invented the BALLPOINT PEN?', 'Waterman Brothers', 'Pen'),
(2, 1, 'What J. B. Dunlop invented?', NULL, 'invention'),
(3, 1, 'Which scientist discovered the radioactive element radium?', 'Isaac Newton', 'scientists'),
(4, 1, 'why', 'When was barb wire patented?', 'test'),
(7, 1, 'test why ?????', '8-9:30', 'test'),
(8, 2, 'why 1111', 'answeerrrr', 'why 11111'),
(9, 1, 'rumaisa is smart', '', 'rumaisa'),
(10, 1, 'yazan', 'yazan j7sh', 'yazan'),
(5, 2, 'hello?', NULL, 'loay'),
(6, 1, 'need answer?', 'yessss', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
`review_id` int(11) NOT NULL,
  `trainer_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `review` text NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`review_id`, `trainer_id`, `student_id`, `review`) VALUES
(1, 3, 5, 'Good');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
`student_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `address` varchar(20) NOT NULL,
  `birth_date` date NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `name`, `address`, `birth_date`, `email`, `password`) VALUES
(4, 'loaylzasdas', '15 street', '1994-11-12', 'loay_zy_2010@hotmail.com', '123456'),
(5, 'AhmadIlawi', 'majen', '0000-00-00', 'ahmad.ilaiwi@gmail.com', '123456'),
(6, 'Mohammad Ratrout', 'jabal shmali', '2015-04-08', 'muhammad@gmail.com', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `subgroup`
--

CREATE TABLE `subgroup` (
`group_id` int(11) NOT NULL,
  `group_name` varchar(30) NOT NULL,
  `created_date` date NOT NULL,
  `trainer_id` int(11) NOT NULL,
  `members_num` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `subject` varchar(30) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subgroup`
--

INSERT INTO `subgroup` (`group_id`, `group_name`, `created_date`, `trainer_id`, `members_num`, `admin_id`, `subject`) VALUES
(1, 'web development', '2015-04-07', 2, 2, 4, 'web'),
(2, 'web design', '2015-04-14', 2, 2, 6, 'web'),
(15, 'software tetst', '2015-04-29', 3, 6, 5, 'web'),
(14, 'arch2', '2015-04-28', 1, 6, 5, 'micro'),
(13, 'arch', '2015-04-28', 1, 6, 5, 'micro'),
(16, 'testtt', '2015-04-29', 3, 6, 4, 'web'),
(17, 'test test', '2015-06-23', 2, 6, 5, 'micro');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
`subject_id` int(11) NOT NULL,
  `subject_name` varchar(20) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subject_id`, `subject_name`) VALUES
(1, 'micro'),
(2, 'arch'),
(5, 'web'),
(4, 'digital');

-- --------------------------------------------------------

--
-- Table structure for table `trainer`
--

CREATE TABLE `trainer` (
`trainer_id` int(11) NOT NULL,
  `trainer_name` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `Birthdate` date NOT NULL,
  `register_num` int(20) NOT NULL,
  `subject_name1` varchar(20) DEFAULT NULL,
  `subject_name2` varchar(20) DEFAULT NULL,
  `subject_name3` varchar(20) DEFAULT NULL,
  `subject_name4` varchar(20) DEFAULT NULL,
  `password` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `trainer`
--

INSERT INTO `trainer` (`trainer_id`, `trainer_name`, `email`, `Birthdate`, `register_num`, `subject_name1`, `subject_name2`, `subject_name3`, `subject_name4`, `password`) VALUES
(1, 'Loay Malhis', 'Loay@gmail.com', '2015-04-07', 11211299, 'web', NULL, NULL, NULL, 123456),
(2, 'Samer Arandi', 'samer@najah.edu', '2015-04-15', 123123, 'micro', 'web', NULL, NULL, 123456),
(3, 'haya sma3neh', 'haya@gmail.com', '2015-04-21', 11233324, 'micro', NULL, NULL, NULL, 123456);

-- --------------------------------------------------------

--
-- Table structure for table `vote`
--

CREATE TABLE `vote` (
`vote_id` int(11) NOT NULL,
  `vote_num` int(10) NOT NULL,
  `meeting_id` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vote`
--

INSERT INTO `vote` (`vote_id`, `vote_num`, `meeting_id`) VALUES
(1, 1, 3),
(2, 2, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `group_student`
--
ALTER TABLE `group_student`
 ADD KEY `group_id` (`group_id`,`student_id`);

--
-- Indexes for table `materials`
--
ALTER TABLE `materials`
 ADD PRIMARY KEY (`material_id`);

--
-- Indexes for table `meeting`
--
ALTER TABLE `meeting`
 ADD PRIMARY KEY (`meeting_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
 ADD PRIMARY KEY (`question_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
 ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
 ADD PRIMARY KEY (`student_id`), ADD UNIQUE KEY `student_id` (`student_id`), ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `subgroup`
--
ALTER TABLE `subgroup`
 ADD PRIMARY KEY (`group_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
 ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `trainer`
--
ALTER TABLE `trainer`
 ADD PRIMARY KEY (`trainer_id`);

--
-- Indexes for table `vote`
--
ALTER TABLE `vote`
 ADD PRIMARY KEY (`vote_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `materials`
--
ALTER TABLE `materials`
MODIFY `material_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `meeting`
--
ALTER TABLE `meeting`
MODIFY `meeting_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `subgroup`
--
ALTER TABLE `subgroup`
MODIFY `group_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `trainer`
--
ALTER TABLE `trainer`
MODIFY `trainer_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `vote`
--
ALTER TABLE `vote`
MODIFY `vote_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;