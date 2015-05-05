-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2015 at 01:30 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `music_school`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE IF NOT EXISTS `administrator` (
  `adminID` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(15) NOT NULL,
  `sname` varchar(15) NOT NULL,
  `lname` varchar(15) NOT NULL,
  `centerID` int(11) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `lpass` varchar(50) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `dob` date DEFAULT NULL,
  `doc` date DEFAULT NULL,
  `nationality` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`adminID`),
  KEY `centerID` (`centerID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `center`
--

CREATE TABLE IF NOT EXISTS `center` (
  `centerID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(15) NOT NULL,
  `location` varchar(20) NOT NULL,
  `contact` varchar(20) NOT NULL,
  PRIMARY KEY (`centerID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `center`
--

INSERT INTO `center` (`centerID`, `name`, `location`, `contact`) VALUES
(1, 'Village Market', 'Village Market', '0729029116'),
(2, 'Yaya Center', 'Yaya Center', '0725926065'),
(3, 'Mountain Mall', 'Thika Road', '0723456787');

-- --------------------------------------------------------

--
-- Table structure for table `director`
--

CREATE TABLE IF NOT EXISTS `director` (
  `directorID` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(15) NOT NULL,
  `sname` varchar(15) NOT NULL,
  `lname` varchar(15) NOT NULL,
  `doc` date DEFAULT NULL,
  `mobile` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `dob` date DEFAULT NULL,
  `nationality` varchar(30) DEFAULT NULL,
  `lpass` varchar(50) NOT NULL,
  PRIMARY KEY (`directorID`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `director`
--

INSERT INTO `director` (`directorID`, `fname`, `sname`, `lname`, `doc`, `mobile`, `email`, `gender`, `dob`, `nationality`, `lpass`) VALUES
(2, 'John', 'Maina', 'Kamau', '2015-04-02', '0729029116', 'info@johnmaina.com', 'Male', '1990-12-24', 'Kenyan', '9d4e1e23bd5b727046a9e3b4b7db57bd8d6ee684');

-- --------------------------------------------------------

--
-- Table structure for table `feespackages`
--

CREATE TABLE IF NOT EXISTS `feespackages` (
  `packageID` int(11) NOT NULL AUTO_INCREMENT,
  `packageName` varchar(15) NOT NULL,
  `amount` int(11) NOT NULL,
  PRIMARY KEY (`packageID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `feespackages`
--

INSERT INTO `feespackages` (`packageID`, `packageName`, `amount`) VALUES
(1, '30minutes', 20000),
(2, '45minutes', 30000),
(3, '60minutes', 40000);

-- --------------------------------------------------------

--
-- Table structure for table `feestatement`
--

CREATE TABLE IF NOT EXISTS `feestatement` (
  `paymentID` int(11) NOT NULL AUTO_INCREMENT,
  `studentID` int(11) NOT NULL,
  `dop` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `invoiceNumber` varchar(50) DEFAULT NULL,
  `receiptNumber` varchar(50) DEFAULT NULL,
  `debit` int(11) NOT NULL DEFAULT '0',
  `credit` int(11) NOT NULL DEFAULT '0',
  `paymentFor` varchar(100) NOT NULL DEFAULT 'lessons',
  PRIMARY KEY (`paymentID`),
  KEY `studentID` (`studentID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `feestatement`
--

INSERT INTO `feestatement` (`paymentID`, `studentID`, `dop`, `invoiceNumber`, `receiptNumber`, `debit`, `credit`, `paymentFor`) VALUES
(1, 5, '2015-04-04 07:48:50', 'INV001', NULL, 14400, 0, 'lessons');

-- --------------------------------------------------------

--
-- Table structure for table `instrumentallocation`
--

CREATE TABLE IF NOT EXISTS `instrumentallocation` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `tutorID` int(11) NOT NULL,
  `instrumentID` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `tutorID` (`tutorID`,`instrumentID`),
  KEY `instrumentID` (`instrumentID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `instrumentallocation`
--

INSERT INTO `instrumentallocation` (`ID`, `tutorID`, `instrumentID`) VALUES
(1, 1, 6),
(3, 1, 9),
(4, 1, 15),
(5, 2, 7),
(6, 2, 8),
(8, 3, 11),
(7, 3, 13),
(9, 4, 12),
(10, 4, 16);

-- --------------------------------------------------------

--
-- Table structure for table `instruments`
--

CREATE TABLE IF NOT EXISTS `instruments` (
  `instrumentID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  `numberofLessons` int(11) NOT NULL,
  `fees` int(11) DEFAULT NULL,
  PRIMARY KEY (`instrumentID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `instruments`
--

INSERT INTO `instruments` (`instrumentID`, `Name`, `numberofLessons`, `fees`) VALUES
(6, 'Clarinet', 12, 14400),
(7, 'Recorder', 12, 14400),
(8, 'Flute', 12, 14400),
(9, 'Trumpet', 12, 14400),
(10, 'Saxophone', 12, 14400),
(11, 'Guitar/ Ukulele', 12, 14400),
(12, 'Voice', 12, 14400),
(13, 'Drums', 12, 14400),
(14, 'Music Production', 12, 14400),
(15, 'Piano', 12, 14400),
(16, 'Violin', 12, 14400),
(17, 'Theory', 12, 14400);

-- --------------------------------------------------------

--
-- Table structure for table `lessons`
--

CREATE TABLE IF NOT EXISTS `lessons` (
  `lessonID` int(11) NOT NULL AUTO_INCREMENT,
  `studentID` int(11) NOT NULL,
  `tutorID` int(11) DEFAULT NULL,
  `instrumentID` int(11) NOT NULL,
  `roomID` int(11) DEFAULT NULL,
  `day` varchar(15) NOT NULL,
  `start` time NOT NULL,
  `end` time NOT NULL,
  `dateStarted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `centerID` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`lessonID`),
  KEY `studentID` (`studentID`),
  KEY `tutorID` (`tutorID`),
  KEY `instrumentID` (`instrumentID`),
  KEY `roomID` (`roomID`),
  KEY `centerID` (`centerID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `lessons`
--

INSERT INTO `lessons` (`lessonID`, `studentID`, `tutorID`, `instrumentID`, `roomID`, `day`, `start`, `end`, `dateStarted`, `centerID`) VALUES
(1, 3, 4, 5, 2, 'Monday', '06:30:00', '07:00:00', '2015-04-03 14:56:19', 1),
(2, 1, 1, 3, 3, 'Monday', '12:30:00', '13:00:00', '2015-04-03 14:57:54', 1),
(3, 5, 2, 7, 5, 'Monday', '06:30:00', '07:00:00', '2015-04-04 07:41:39', 2);

-- --------------------------------------------------------

--
-- Table structure for table `principal`
--

CREATE TABLE IF NOT EXISTS `principal` (
  `principalID` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(15) NOT NULL,
  `sname` varchar(15) NOT NULL,
  `lname` varchar(15) NOT NULL,
  `doc` date DEFAULT NULL,
  `mobile` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `dob` date DEFAULT NULL,
  `nationality` varchar(15) DEFAULT NULL,
  `lpass` varchar(50) NOT NULL,
  PRIMARY KEY (`principalID`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `principal`
--

INSERT INTO `principal` (`principalID`, `fname`, `sname`, `lname`, `doc`, `mobile`, `email`, `gender`, `dob`, `nationality`, `lpass`) VALUES
(3, 'John', 'Wachira', 'Wanjohi', '2015-04-02', '0712931152', 'wachira@gmail.com', 'Male', '1993-01-11', 'Kenyan', '9d4e1e23bd5b727046a9e3b4b7db57bd8d6ee684');

-- --------------------------------------------------------

--
-- Table structure for table `receptionist`
--

CREATE TABLE IF NOT EXISTS `receptionist` (
  `receptionistID` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(15) NOT NULL,
  `sname` varchar(15) NOT NULL,
  `lname` varchar(15) NOT NULL,
  `centerID` int(11) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `lpass` varchar(50) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `dob` date DEFAULT NULL,
  `doc` date DEFAULT NULL,
  `nationality` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`receptionistID`),
  UNIQUE KEY `email` (`email`),
  KEY `centerID` (`centerID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `receptionist`
--

INSERT INTO `receptionist` (`receptionistID`, `fname`, `sname`, `lname`, `centerID`, `mobile`, `email`, `lpass`, `gender`, `dob`, `doc`, `nationality`) VALUES
(1, 'Lucy', 'Njeri', 'Kimani', 1, '0729029116', 'njeri@gmail.com', '9d4e1e23bd5b727046a9e3b4b7db57bd8d6ee684', 'Female', NULL, NULL, NULL),
(2, 'Peter', 'Odeny', 'Oluoch', 2, '0729029116', 'odeny@gmail.com', '9d4e1e23bd5b727046a9e3b4b7db57bd8d6ee684', 'Male', NULL, NULL, NULL),
(3, 'Lynne', 'Mutheu', 'Kilonzo', 3, '0729029116', 'kilonzo@gmail.com', '9d4e1e23bd5b727046a9e3b4b7db57bd8d6ee684', 'Female', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE IF NOT EXISTS `rooms` (
  `roomID` int(11) NOT NULL AUTO_INCREMENT,
  `roomName` varchar(15) NOT NULL,
  `capacity` int(11) NOT NULL,
  `centerID` int(11) NOT NULL,
  PRIMARY KEY (`roomID`),
  KEY `centerID` (`centerID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`roomID`, `roomName`, `capacity`, `centerID`) VALUES
(2, 'Room1', 1, 1),
(3, 'Room2', 1, 1),
(4, 'Room3', 1, 1),
(5, 'YayaRoom1', 1, 2),
(7, 'YayaRoom2', 1, 2),
(8, 'YayaRoom3', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `studentinstrumentallocation`
--

CREATE TABLE IF NOT EXISTS `studentinstrumentallocation` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `studentID` int(11) NOT NULL,
  `instrumentID` int(11) NOT NULL,
  `packageID` int(11) DEFAULT '1',
  PRIMARY KEY (`ID`),
  KEY `studentID` (`studentID`,`instrumentID`),
  KEY `instrumentID` (`instrumentID`),
  KEY `packageID` (`packageID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `studentinstrumentallocation`
--

INSERT INTO `studentinstrumentallocation` (`ID`, `studentID`, `instrumentID`, `packageID`) VALUES
(1, 2, 6, 1),
(2, 2, 15, 1),
(3, 1, 6, 1),
(4, 1, 7, 1),
(5, 3, 12, 1),
(6, 4, 11, 1),
(7, 5, 12, 1);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `studentID` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(15) NOT NULL,
  `sname` varchar(15) NOT NULL,
  `lname` varchar(15) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `nationality` varchar(30) NOT NULL,
  `dob` date NOT NULL,
  `dor` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `centerID` int(11) NOT NULL DEFAULT '1',
  `lpass` varchar(50) NOT NULL,
  PRIMARY KEY (`studentID`),
  UNIQUE KEY `email` (`email`),
  KEY `centerID` (`centerID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`studentID`, `fname`, `sname`, `lname`, `mobile`, `email`, `gender`, `nationality`, `dob`, `dor`, `centerID`, `lpass`) VALUES
(1, 'Lincoln', 'Lidanya', 'Band', '0701478999', 'lidanya@gmail.com', 'Male', '', '0000-00-00', '2015-04-03 13:22:32', 1, '9d4e1e23bd5b727046a9e3b4b7db57bd8d6ee684'),
(2, 'Boniface', 'Kariuki', 'Maina', '0718842356', 'kariuki@gmail.com', 'Male', '', '0000-00-00', '2015-04-03 13:26:15', 1, '9d4e1e23bd5b727046a9e3b4b7db57bd8d6ee684'),
(3, 'Joyce', 'Wambui', 'Maina', '0718842356', 'wambui@gmail.com', 'Female', '', '0000-00-00', '2015-04-03 13:27:17', 1, '9d4e1e23bd5b727046a9e3b4b7db57bd8d6ee684'),
(4, 'Mike', 'Wambiri', 'Kabiru', '0726768975', 'wambiri@gmail.com', 'Male', '', '0000-00-00', '2015-04-04 04:57:47', 2, '9d4e1e23bd5b727046a9e3b4b7db57bd8d6ee684'),
(5, 'Lydia', 'Nyambura', 'Kabiru', '0726768975', 'nyambura@gmail.com', 'Female', '', '0000-00-00', '2015-04-04 04:58:46', 2, '9d4e1e23bd5b727046a9e3b4b7db57bd8d6ee684'),
(6, 'Linus', 'Nyambura', 'Munge', '0726768975', 'munge@gmail.com', 'Male', '', '0000-00-00', '2015-04-04 04:59:29', 2, '9d4e1e23bd5b727046a9e3b4b7db57bd8d6ee684');

-- --------------------------------------------------------

--
-- Table structure for table `tutors`
--

CREATE TABLE IF NOT EXISTS `tutors` (
  `tutorID` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(15) NOT NULL,
  `sname` varchar(15) NOT NULL,
  `lname` varchar(15) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `dob` date NOT NULL,
  `nationality` varchar(30) DEFAULT NULL,
  `lpass` varchar(50) NOT NULL,
  `doc` date DEFAULT NULL,
  `anyotherinfo` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`tutorID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tutors`
--

INSERT INTO `tutors` (`tutorID`, `fname`, `sname`, `lname`, `mobile`, `email`, `gender`, `dob`, `nationality`, `lpass`, `doc`, `anyotherinfo`) VALUES
(1, 'George', 'Ouma', 'Aloo', '0726926099', 'ouma@gmail.com', 'Male', '0000-00-00', 'Kenyan', '9d4e1e23bd5b727046a9e3b4b7db57bd8d6ee684', NULL, 'Part Time tutor'),
(2, 'Jackson', 'Auma', 'Aloo', '0726926099', 'auma@gmail.com', 'Male', '0000-00-00', 'Kenyan', '9d4e1e23bd5b727046a9e3b4b7db57bd8d6ee684', NULL, 'Part Time tutor'),
(3, 'James', 'Kiruma', 'Laoret', '0726926099', 'kiruma@gmail.com', 'Male', '0000-00-00', 'Kenyan', '9d4e1e23bd5b727046a9e3b4b7db57bd8d6ee684', NULL, 'Part Time tutor'),
(4, 'Esther', 'Muthoni', 'Kamau', '0726926099', 'muthoni@gmail.com', 'Female', '0000-00-00', 'Kenyan', '9d4e1e23bd5b727046a9e3b4b7db57bd8d6ee684', NULL, 'Part Time tutor');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `administrator`
--
ALTER TABLE `administrator`
  ADD CONSTRAINT `administrator_ibfk_1` FOREIGN KEY (`centerID`) REFERENCES `center` (`centerID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `feestatement`
--
ALTER TABLE `feestatement`
  ADD CONSTRAINT `feestatement_ibfk_1` FOREIGN KEY (`studentID`) REFERENCES `students` (`studentID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `instrumentallocation`
--
ALTER TABLE `instrumentallocation`
  ADD CONSTRAINT `instrumentallocation_ibfk_1` FOREIGN KEY (`tutorID`) REFERENCES `tutors` (`tutorID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `instrumentallocation_ibfk_2` FOREIGN KEY (`instrumentID`) REFERENCES `instruments` (`instrumentID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lessons`
--
ALTER TABLE `lessons`
  ADD CONSTRAINT `lessons_ibfk_1` FOREIGN KEY (`studentID`) REFERENCES `students` (`studentID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lessons_ibfk_2` FOREIGN KEY (`tutorID`) REFERENCES `tutors` (`tutorID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `lessons_ibfk_3` FOREIGN KEY (`instrumentID`) REFERENCES `studentinstrumentallocation` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lessons_ibfk_4` FOREIGN KEY (`roomID`) REFERENCES `rooms` (`roomID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `lessons_ibfk_5` FOREIGN KEY (`centerID`) REFERENCES `center` (`centerID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `receptionist`
--
ALTER TABLE `receptionist`
  ADD CONSTRAINT `receptionist_ibfk_1` FOREIGN KEY (`centerID`) REFERENCES `center` (`centerID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `rooms_ibfk_1` FOREIGN KEY (`centerID`) REFERENCES `center` (`centerID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `studentinstrumentallocation`
--
ALTER TABLE `studentinstrumentallocation`
  ADD CONSTRAINT `studentinstrumentallocation_ibfk_1` FOREIGN KEY (`studentID`) REFERENCES `students` (`studentID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `studentinstrumentallocation_ibfk_2` FOREIGN KEY (`instrumentID`) REFERENCES `instruments` (`instrumentID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `studentinstrumentallocation_ibfk_3` FOREIGN KEY (`packageID`) REFERENCES `feespackages` (`packageID`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`centerID`) REFERENCES `center` (`centerID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
