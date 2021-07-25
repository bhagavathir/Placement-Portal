-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2021 at 05:44 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `placement_portal`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `AdmPwdChange` (IN `replpwd` VARCHAR(255))  BEGIN
UPDATE adminlogin SET pwd = replpwd WHERE AdminId = 'admin';
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_notif` (IN `Compname` VARCHAR(100))  BEGIN
		INSERT INTO notifications(companyName,time) values (Compname,NOW());
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin`
--

CREATE TABLE `adminlogin` (
  `AdminId` varchar(10) NOT NULL,
  `Pwd` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `adminlogin`
--

INSERT INTO `adminlogin` (`AdminId`, `Pwd`) VALUES
('admin', 'root');

-- --------------------------------------------------------

--
-- Table structure for table `alumni`
--

CREATE TABLE `alumni` (
  `AlumniId` int(11) NOT NULL,
  `FirstName` varchar(255) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `MobileNumber` decimal(10,0) NOT NULL,
  `UG` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `alumni`
--

INSERT INTO `alumni` (`AlumniId`, `FirstName`, `LastName`, `Email`, `MobileNumber`, `UG`) VALUES
(2019103009, 'bhargav', 'ravi', 'baggy@gmail.com', '8734646777', 'UG');

-- --------------------------------------------------------

--
-- Table structure for table `companylogin`
--

CREATE TABLE `companylogin` (
  `Pwd` varchar(255) NOT NULL,
  `CompanyId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `companylogin`
--

INSERT INTO `companylogin` (`Pwd`, `CompanyId`) VALUES
('password', 4),
('password', 5),
('password', 6),
('password', 7);

-- --------------------------------------------------------

--
-- Table structure for table `companyprofile`
--

CREATE TABLE `companyprofile` (
  `CompanyName` char(10) DEFAULT NULL,
  `CompanyId` int(11) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `PhoneNumber` int(11) NOT NULL,
  `City` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `companyprofile`
--

INSERT INTO `companyprofile` (`CompanyName`, `CompanyId`, `Email`, `PhoneNumber`, `City`) VALUES
('Samsung', 4, 's@gmail.com', 564546446, 'Hyderabad'),
('Infosys', 5, 'inf@gmail.com', 2147483647, 'Chennai'),
('Amazon', 6, 'a@gmail.com', 676767565, 'Delhi'),
('Microsoft', 7, 'mic@gmail.com', 2147483647, 'Chennai');

-- --------------------------------------------------------

--
-- Table structure for table `eligibilitycriteria`
--

CREATE TABLE `eligibilitycriteria` (
  `CGPA` float NOT NULL,
  `mark10` int(11) NOT NULL,
  `mark12` int(11) NOT NULL,
  `GradYear` int(11) NOT NULL,
  `Department` varchar(255) NOT NULL,
  `JobId` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `eligibilitycriteria`
--

INSERT INTO `eligibilitycriteria` (`CGPA`, `mark10`, `mark12`, `GradYear`, `Department`, `JobId`) VALUES
(7, 70, 70, 2022, 'CSE,IT,', '4Sam0'),
(8, 75, 70, 2023, 'CSE,ECE,', '4Sam1'),
(9, 90, 90, 2023, 'CSE,IT,ECE,', '5Inf2'),
(9, 90, 90, 2022, 'IT,ECE,', '6Ama3'),
(8, 80, 80, 2023, 'CSE,IT,Mech,', '7Mic4');

-- --------------------------------------------------------

--
-- Table structure for table `jobappl`
--

CREATE TABLE `jobappl` (
  `Status` char(1) NOT NULL,
  `studentid` int(11) DEFAULT NULL,
  `JobId` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jobappl`
--

INSERT INTO `jobappl` (`Status`, `studentid`, `JobId`) VALUES
('n', 2019103006, '5Inf2'),
('n', 2019103006, '6Ama3'),
('n', 2019103006, '7Mic4'),
('n', 2019103006, '4Sam0'),
('n', 2019103015, '4Sam0'),
('n', 2019103015, '6Ama3'),
('n', 2019103015, '7Mic4');

--
-- Triggers `jobappl`
--
DELIMITER $$
CREATE TRIGGER `VACANCY` AFTER UPDATE ON `jobappl` FOR EACH ROW if (NEW.Status = 'y')
   THEN
   UPDATE `jobdetails` SET `Vacancies`=`Vacancies`-1  WHERE `JobId`  = NEW.`JobId`;
  end if
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `jobdetails`
--

CREATE TABLE `jobdetails` (
  `JobId` varchar(10) NOT NULL,
  `JobDesc` varchar(255) NOT NULL,
  `ApplDeadline` date NOT NULL,
  `CompanyId` int(11) NOT NULL,
  `Start` varchar(50) NOT NULL,
  `Mode` varchar(10) NOT NULL,
  `Salary` int(11) NOT NULL,
  `City` varchar(100) NOT NULL,
  `State` varchar(100) NOT NULL,
  `Vacancies` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jobdetails`
--

INSERT INTO `jobdetails` (`JobId`, `JobDesc`, `ApplDeadline`, `CompanyId`, `Start`, `Mode`, `Salary`, `City`, `State`, `Vacancies`) VALUES
('4Sam0', ' Software Engineer required', '2021-06-05', 4, '10/June', 'Online', 100000, 'Hyderabad', 'Telangana', 4),
('4Sam1', ' Software Engineer Front end', '2021-06-06', 4, '15/June', 'Offline', 120000, 'Hyderabad', 'Telangana', 8),
('5Inf2', ' Software backend', '2021-06-06', 5, '8/June', 'Mixed', 50000, 'Chennai', 'Tamil Nadu', 6),
('6Ama3', ' Manager', '2021-07-07', 6, '8/November', 'Offline', 70000, 'Delhi', 'Delhi', 8),
('7Mic4', ' Backend Engineer', '2021-06-05', 7, '7/October', 'Offline', 67000, 'Chennai', 'Tamil Nadu', 7);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(10) UNSIGNED NOT NULL,
  `companyName` varchar(100) NOT NULL,
  `unread` tinyint(1) NOT NULL DEFAULT 1,
  `time` datetime DEFAULT current_timestamp(),
  `AdminId` varchar(10) NOT NULL DEFAULT 'admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `companyName`, `unread`, `time`, `AdminId`) VALUES
(4, 'Samsung', 0, '2021-05-30 19:50:09', 'admin'),
(5, 'Infosys', 0, '2021-05-30 19:50:17', 'admin'),
(6, 'Wells Fargo', 0, '2021-05-30 19:50:28', 'admin'),
(7, 'Microsoft', 0, '2021-05-30 19:50:38', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `studentdetails`
--

CREATE TABLE `studentdetails` (
  `FirstName` varchar(255) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `DoB` date NOT NULL,
  `EmailId` varchar(255) NOT NULL,
  `MobileNumber` decimal(10,0) NOT NULL,
  `UG` varchar(255) NOT NULL,
  `StudentId` int(11) NOT NULL,
  `College` varchar(255) DEFAULT NULL,
  `Gender` varchar(10) NOT NULL,
  `Status` varchar(1) DEFAULT 'n'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `studentdetails`
--

INSERT INTO `studentdetails` (`FirstName`, `LastName`, `DoB`, `EmailId`, `MobileNumber`, `UG`, `StudentId`, `College`, `Gender`, `Status`) VALUES
('Max', 'doe', '2000-06-06', 'v@gmail.com', '7364767676', 'PG', 2019103000, 'CEG', 'other', 'n'),
('Athirai', 'S', '2001-11-30', 'athirai@gmail.com', '5634556673', 'UG', 2019103006, 'MIT', 'female', 'n'),
('bhargav', 'ravi', '2002-01-15', 'baggy@gmail.com', '8734646777', 'UG', 2019103009, 'CEG', 'male', 'y'),
('Dhivya', 'Ramesh', '2001-02-14', 'dhivya@gmail.com', '7637738748', 'PG', 2019103015, 'ACTech', 'female', 'n'),
('Kavya', 'Sridhar', '2001-05-15', 'kavya@gmail.com', '6437733776', 'PG', 2019103027, 'CEG', 'female', 'n'),
('Neha', 'Susan', '2001-12-18', 'neha@gmail.com', '7364746476', 'PG', 2019103042, 'MIT', 'female', 'n'),
('Samhit', 'Mahadevan', '2001-06-18', 'sammy@gmail.com', '6748363787', 'PG', 2019103054, 'MIT', 'male', 'n'),
('Shrishti', 'Padmanabhan', '2001-06-10', 'shrishti@gmail.com', '8476545677', 'UG', 2019103060, 'CEG', 'female', 'n'),
('eeshwaran', 'sriram', '2001-06-01', 'eesh@gmail.com', '6776768788', 'UG', 2019103528, 'CEG', 'male', 'n');

--
-- Triggers `studentdetails`
--
DELIMITER $$
CREATE TRIGGER `ALUMNI` AFTER UPDATE ON `studentdetails` FOR EACH ROW if (NEW.Status = 'y')
   THEN
    INSERT INTO `alumni`(`AlumniId`, `FirstName`, `LastName`, `Email`, `MobileNumber`, `UG`)VALUES(NEW.StudentId,NEW.FirstName,NEW.LastName,NEW.EmailId,NEW.MobileNumber,NEW.UG);
   end if
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `BANS_STUDENT` AFTER UPDATE ON `studentdetails` FOR EACH ROW BEGIN
DELETE FROM `jobappl` WHERE StudentId=OLD.StudentId;
    DELETE FROM `studentresume` WHERE StudentId=OLD.StudentId;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `studentlogin`
--

CREATE TABLE `studentlogin` (
  `StudentId` int(11) NOT NULL,
  `pwd` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `studentlogin`
--

INSERT INTO `studentlogin` (`StudentId`, `pwd`) VALUES
(2019103000, '5d41402abc4b2a76b9719d911017c592'),
(2019103006, '5d41402abc4b2a76b9719d911017c592'),
(2019103009, '5d41402abc4b2a76b9719d911017c592'),
(2019103015, '5d41402abc4b2a76b9719d911017c592'),
(2019103027, '5d41402abc4b2a76b9719d911017c592'),
(2019103042, '5d41402abc4b2a76b9719d911017c592'),
(2019103054, '5d41402abc4b2a76b9719d911017c592'),
(2019103060, '5d41402abc4b2a76b9719d911017c592'),
(2019103528, '5d41402abc4b2a76b9719d911017c592');

-- --------------------------------------------------------

--
-- Table structure for table `studentresume`
--

CREATE TABLE `studentresume` (
  `CGPA` float NOT NULL,
  `mark12` int(11) NOT NULL,
  `StudentId` int(11) NOT NULL,
  `Department` varchar(255) DEFAULT NULL,
  `GradYear` int(11) DEFAULT NULL,
  `file` mediumblob NOT NULL,
  `filename` varchar(255) DEFAULT NULL,
  `mark10` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `studentresume`
--

INSERT INTO `studentresume` (`CGPA`, `mark12`, `StudentId`, `Department`, `GradYear`, `file`, `filename`, `mark10`) VALUES
(7.8, 89, 2019103000, 'CS', 2023, 0x443a5c785c746d705c706870414139392e746d70, 'resume_max.pdf', 89),
(10, 95, 2019103006, 'EEE', 2023, 0x443a5c785c746d705c706870454632432e746d70, 'new_resume_athirai.pdf', 95),
(10, 90, 2019103015, 'Chemical Technology', 2024, 0x443a5c785c746d705c706870354246332e746d70, 'resume_dhivyaR.pdf', 90),
(9.8, 90, 2019103027, 'CS', 2022, 0x443a5c785c746d705c706870454333342e746d70, 'Resume_KavyaSridhar.pdf', 95),
(9.7, 90, 2019103042, 'CS', 2023, 0x443a5c785c746d705c706870454531382e746d70, 'resumr.pdf', 90),
(7.7, 79, 2019103054, 'ECE', 2022, 0x443a5c785c746d705c706870314142382e746d70, 'resumr.pdf', 89),
(9, 89, 2019103060, 'CS', 2023, 0x443a5c785c746d705c706870414345392e746d70, 'resume_shrishti.pdf', 90),
(8, 67, 2019103528, 'CS', 2022, 0x443a5c785c746d705c706870314230412e746d70, 'resume_eesh.pdf', 60);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminlogin`
--
ALTER TABLE `adminlogin`
  ADD PRIMARY KEY (`AdminId`);

--
-- Indexes for table `alumni`
--
ALTER TABLE `alumni`
  ADD PRIMARY KEY (`AlumniId`);

--
-- Indexes for table `companylogin`
--
ALTER TABLE `companylogin`
  ADD PRIMARY KEY (`CompanyId`);

--
-- Indexes for table `companyprofile`
--
ALTER TABLE `companyprofile`
  ADD PRIMARY KEY (`CompanyId`);

--
-- Indexes for table `eligibilitycriteria`
--
ALTER TABLE `eligibilitycriteria`
  ADD UNIQUE KEY `JobId` (`JobId`);

--
-- Indexes for table `jobappl`
--
ALTER TABLE `jobappl`
  ADD KEY `studentid` (`studentid`),
  ADD KEY `JobId` (`JobId`);

--
-- Indexes for table `jobdetails`
--
ALTER TABLE `jobdetails`
  ADD PRIMARY KEY (`JobId`),
  ADD KEY `CompanyId` (`CompanyId`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `AdminId` (`AdminId`);

--
-- Indexes for table `studentdetails`
--
ALTER TABLE `studentdetails`
  ADD PRIMARY KEY (`StudentId`);

--
-- Indexes for table `studentlogin`
--
ALTER TABLE `studentlogin`
  ADD PRIMARY KEY (`StudentId`);

--
-- Indexes for table `studentresume`
--
ALTER TABLE `studentresume`
  ADD UNIQUE KEY `StudentId_2` (`StudentId`),
  ADD KEY `StudentId` (`StudentId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `companyprofile`
--
ALTER TABLE `companyprofile`
  ADD CONSTRAINT `companyprofile_ibfk_1` FOREIGN KEY (`CompanyId`) REFERENCES `companylogin` (`CompanyId`);

--
-- Constraints for table `eligibilitycriteria`
--
ALTER TABLE `eligibilitycriteria`
  ADD CONSTRAINT `eligibilitycriteria_ibfk_3` FOREIGN KEY (`JobId`) REFERENCES `jobdetails` (`JobId`);

--
-- Constraints for table `jobappl`
--
ALTER TABLE `jobappl`
  ADD CONSTRAINT `jobappl_ibfk_1` FOREIGN KEY (`studentid`) REFERENCES `studentlogin` (`StudentId`),
  ADD CONSTRAINT `jobappl_ibfk_2` FOREIGN KEY (`JobId`) REFERENCES `jobdetails` (`JobId`);

--
-- Constraints for table `jobdetails`
--
ALTER TABLE `jobdetails`
  ADD CONSTRAINT `jobdetails_ibfk_1` FOREIGN KEY (`CompanyId`) REFERENCES `companyprofile` (`CompanyId`);

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_ibfk_1` FOREIGN KEY (`AdminId`) REFERENCES `adminlogin` (`AdminId`);

--
-- Constraints for table `studentdetails`
--
ALTER TABLE `studentdetails`
  ADD CONSTRAINT `studentdetails_ibfk_1` FOREIGN KEY (`StudentId`) REFERENCES `studentlogin` (`StudentId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
