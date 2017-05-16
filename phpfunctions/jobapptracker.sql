-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2017 at 03:13 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jobapptracker`
--

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `ID` int(11) NOT NULL,
  `Company` varchar(45) NOT NULL,
  `Title` varchar(45) NOT NULL,
  `type` text,
  `duration` int(11) DEFAULT NULL,
  `site` text,
  `start` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `end` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `applied` text,
  `selection criteria` text,
  `hear from` text,
  `location` text,
  `commences` text,
  `username` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`ID`, `Company`, `Title`, `type`, `duration`, `site`, `start`, `end`, `applied`, `selection criteria`, `hear from`, `location`, `commences`, `username`) VALUES
(0, 'AEMO', 'AEMO graduate development program', '', 36, 'https://gradaustralia.com.au/aemo-2018-graduate-development-program', '2017-03-07 00:00:00', '2017-05-09 21:00:00', '', 'IT degree', '7/3/2017', '', '12/30/2017', ''),
(1, 'ANSTO', 'ANSTO Graduate program', '', 24, '', '2017-04-10 00:00:00', '2017-05-15 10:53:32', '', '', '', 'Sydney, Melbourne', '', ''),
(2, 'ATO', 'IT', 'grad program', 12, 'https://au.gradconnection.com/dashboard/graduate/job-search/australian-taxation-office/jobs/australian-taxation-office-where-could-your-it-degree-take-you/', '2017-05-04 00:00:00', '2017-05-15 10:53:41', '', 'graduate last or this yr', '2/2/2018', 'National - Brisbane Melb', '', ''),
(3, 'AusPost', 'AusPost Graduate Program', 'Digital and IT streams', 24, 'https://auspost.gradapp.com.au/', '2017-05-08 00:00:00', '2017-05-15 10:53:55', 'Y', 'Credit average', '', 'melbourne', '', ''),
(4, 'BOM', 'Graduate Meterologist', '', 9, '', '2017-05-11 00:00:00', '2017-05-15 10:54:04', '', '', '', 'Melbourne', '', ''),
(5, 'Ericsson', '2018 Ericsson Graduate Program', '', 18, 'https://jobs.ericsson.com/job/Docklands-2018-Ericsson-Graduate-Program-VIC/392403600/?feedId=47200&utm_source=Indeed&utm_campaign=Ericsson_Indeed&utm_medium=referral', '2017-05-08 00:00:00', '2017-05-15 10:54:13', '', '', '', '', '', ''),
(6, 'IBM', 'Startwise Program - software engineer? ', 'grad program', 12, 'https://au.gradconnection.com/dashboard/graduate/job-search/ibm/jobs/ibm-graduate-program/', '2017-05-16 00:00:00', '2017-05-15 10:54:20', '', 'graduate ', '', 'Melbourne, Brisbane, other', '', ''),
(7, 'Leidos', 'Graduate Software Engineer', 'grad program', 12, 'https://leidoscareers.nga.net.au/cp/index.cfm?event=jobs.checkJobDetailsNewApplication&returnToEvent=jobs.listJobs&jobid=14CB83BD-383A-57CD-43EA-9ACF86363366&CurATC=EXT&CurBID=96DD71C4-ABD6-3024-BE72-926F2E4112DA&JobListID=C56CD57B-5B6D-3E1A-8EAA-5BE0D284C364&jobsListKey=3e0007bd-6ba2-45e1-b668-e522cdbd2eef&persistVariables=CurATC,CurBID,JobListID,jobsListKey,JobID&lid=95084360188', '2017-05-03 00:00:00', '2017-05-15 10:54:28', '', '', '', 'Melbourne, Canberra', '6/28/1900', ''),
(8, 'rea group', 'IT graduate program', 'grad program', 18, 'http://careers.realestate.com.au/graduate-programme/', '2017-05-08 00:00:00', '2017-05-15 10:54:36', 'Y', '', '4/5/2017', 'melbourne', '10/2/2017', '');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `Company` varchar(45) NOT NULL,
  `Type` text,
  `Industry` varchar(45) DEFAULT NULL,
  `Values` varchar(45) DEFAULT NULL,
  `Diversity` varchar(45) DEFAULT NULL,
  `Size` int(11) DEFAULT NULL,
  `Finances` varchar(45) DEFAULT NULL,
  `People` varchar(45) DEFAULT NULL,
  `Website` varchar(45) DEFAULT NULL,
  `Focus` varchar(45) DEFAULT NULL,
  `username` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`Company`, `Type`, `Industry`, `Values`, `Diversity`, `Size`, `Finances`, `People`, `Website`, `Focus`, `username`) VALUES
('AEMO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
('ANSTO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
('ATO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
('AusPost', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
('BOM', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
('Ericsson', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
('IBM', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
('Leidos', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
('Microsoft', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
('NAB ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
('Optus', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
('Quantium', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
('rea group', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
('Suncorp', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `name` varchar(30) NOT NULL,
  `company` varchar(30) NOT NULL,
  `type` varchar(45) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `location` varchar(45) DEFAULT NULL,
  `username` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`name`, `company`, `type`, `phone`, `email`, `location`, `username`) VALUES
('Bruce Bingo', 'ANSTO', 'Tech', '555filk', 'filk@gmail.com', 'Brisvegas', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(45) NOT NULL,
  `password` varchar(45) DEFAULT NULL,
  `email` varchar(90) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `email`, `phone`) VALUES
('', '', '', ''),
('beau', 'beau', 'byarranton@hotmail.com', '0432723111'),
('beaux', 'ste', 'baoo@hg', '45666'),
('bijelo9', '$2y$10$PmPJmQ0ufXHiKfV0zPdz9umtlHGrvKuAJSHquG', '', ''),
('bshure', '$2y$10$p.rGUWNqAX0tdWlyCWsOGeqEf5yW0E/uabYiKo', 'bijelo9@gmail.com', '0468547137'),
('jamebond', 'what', 'jaws@moon.com', '00789'),
('JohnDoe', 'johnspword', 'john@example.com', '043354'),
('Naffy', 'whats', 'baoo@hg', '2341234'),
('Nash', 'nasherrasher', 'baoo@hg', '5534337');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`Company`,`Title`,`username`),
  ADD UNIQUE KEY `ID_2` (`ID`),
  ADD KEY `username` (`username`),
  ADD KEY `ID` (`ID`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`Company`,`username`),
  ADD KEY `companies-users` (`username`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`name`,`company`,`username`),
  ADD KEY `companies-contacts_idx` (`company`),
  ADD KEY `contacts-users` (`username`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `applications`
--
ALTER TABLE `applications`
  ADD CONSTRAINT `apps-users` FOREIGN KEY (`username`) REFERENCES `users` (`username`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `companies-apps` FOREIGN KEY (`Company`) REFERENCES `companies` (`Company`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `companies`
--
ALTER TABLE `companies`
  ADD CONSTRAINT `companies-users` FOREIGN KEY (`username`) REFERENCES `users` (`username`);

--
-- Constraints for table `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `companies-contacts` FOREIGN KEY (`company`) REFERENCES `companies` (`Company`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `contacts-users` FOREIGN KEY (`username`) REFERENCES `users` (`username`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
