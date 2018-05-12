-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 12, 2018 at 02:53 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `databaseProject`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryID` int(11) NOT NULL,
  `categoryName` varchar(100) NOT NULL,
  `categoryDesc` varchar(250) NOT NULL,
  `categoryCreated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `categoryModified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `categoryStatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `cityID` int(11) NOT NULL,
  `cityName` varchar(100) NOT NULL,
  `cityStatus` int(11) NOT NULL,
  `countryID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`cityID`, `cityName`, `cityStatus`, `countryID`) VALUES
(1, 'Tirane', 1, 1),
(2, 'Durres', 1, 1),
(3, 'Librazhd', 1, 1),
(4, 'Ankara', 1, 2),
(5, 'Istanbul', 1, 2),
(6, 'London', 1, 3),
(7, 'Liverpool', 1, 3),
(8, 'Brighton', 1, 3),
(9, 'Las Vegas', 1, 4),
(10, 'Los Angelos', 1, 4),
(11, 'Chicago', 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `countryID` int(11) NOT NULL,
  `countryName` varchar(100) NOT NULL,
  `countryCode` varchar(3) NOT NULL,
  `countryStatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`countryID`, `countryName`, `countryCode`, `countryStatus`) VALUES
(1, 'Albania', 'AL', 1),
(2, 'Turkey', 'TR', 1),
(3, 'United Kingdom', 'UK', 1),
(4, 'United States', 'US', 1);

-- --------------------------------------------------------

--
-- Table structure for table `privilege`
--

CREATE TABLE `privilege` (
  `privilegeID` int(11) NOT NULL,
  `privilege_name` varchar(100) NOT NULL,
  `privilege_desc` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `privilege`
--

INSERT INTO `privilege` (`privilegeID`, `privilege_name`, `privilege_desc`) VALUES
(1, 'Access to My Venues.', 'Check the Access to My Venues!');

-- --------------------------------------------------------

--
-- Table structure for table `type_privilege`
--

CREATE TABLE `type_privilege` (
  `typeID` int(11) NOT NULL,
  `privilegeID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `usertype`
--

CREATE TABLE `usertype` (
  `typeID` int(11) NOT NULL,
  `typeName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usertype`
--

INSERT INTO `usertype` (`typeID`, `typeName`) VALUES
(1, 'Manager'),
(2, 'Normal User');

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `username` varchar(100) NOT NULL,
  `user_firstName` varchar(50) NOT NULL,
  `user_lastName` varchar(50) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(30) NOT NULL,
  `user_birthdate` date NOT NULL,
  `user_pic` varchar(255) DEFAULT NULL,
  `user_gender` char(1) NOT NULL,
  `city` varchar(50) NOT NULL,
  `user_profileType` int(11) NOT NULL,
  `user_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_lastlogin` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_picname` varchar(255) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`username`, `user_firstName`, `user_lastName`, `user_email`, `user_password`, `user_birthdate`, `user_pic`, `user_gender`, `city`, `user_profileType`, `user_created`, `user_lastlogin`, `user_picname`) VALUES
('albjongjuzi', 'Albjon', 'Gjuzi', 'albjon@live.com', 'bonbon', '1999-11-11', 'uploads/albjongjuziProfilePic.jpeg', 'M', 'Durres', 2, '2018-05-07 21:16:31', '2018-05-07 21:16:31', 'user_table-user_pic.bin-2.jpeg'),
('aurelhoxha', 'Aurel', 'Hoxha', 'aurelhoxha@hotmail.com', 'aureli1996', '1996-09-11', 'usersImages/aurelhoxhaProfilePic.jpeg', 'M', 'Tepelene', 1, '2018-05-07 17:02:18', '2018-05-07 17:02:18', 'user_table-user_pic.bin.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `venue`
--

CREATE TABLE `venue` (
  `venueID` int(11) NOT NULL,
  `venueName` varchar(100) NOT NULL,
  `venueDesc` varchar(250) DEFAULT NULL,
  `streetNum` int(11) DEFAULT NULL,
  `streetName` varchar(50) DEFAULT NULL,
  `venueCreated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `venueModified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `venuePic` mediumblob,
  `venueStatus` int(11) NOT NULL,
  `cityID` int(11) NOT NULL,
  `managerID` varchar(100) NOT NULL,
  `venueOpenTime` time NOT NULL,
  `venueCloseTime` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryID`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`cityID`),
  ADD KEY `countryID` (`countryID`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`countryID`);

--
-- Indexes for table `privilege`
--
ALTER TABLE `privilege`
  ADD PRIMARY KEY (`privilegeID`);

--
-- Indexes for table `type_privilege`
--
ALTER TABLE `type_privilege`
  ADD PRIMARY KEY (`typeID`,`privilegeID`),
  ADD KEY `privilegeID` (`privilegeID`);

--
-- Indexes for table `usertype`
--
ALTER TABLE `usertype`
  ADD PRIMARY KEY (`typeID`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`username`),
  ADD KEY `user_profileType` (`user_profileType`);

--
-- Indexes for table `venue`
--
ALTER TABLE `venue`
  ADD PRIMARY KEY (`venueID`),
  ADD KEY `cityID` (`cityID`),
  ADD KEY `managerID` (`managerID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `cityID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `countryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `venue`
--
ALTER TABLE `venue`
  MODIFY `venueID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `city`
--
ALTER TABLE `city`
  ADD CONSTRAINT `city_ibfk_1` FOREIGN KEY (`countryID`) REFERENCES `country` (`countryID`);

--
-- Constraints for table `type_privilege`
--
ALTER TABLE `type_privilege`
  ADD CONSTRAINT `type_privilege_ibfk_1` FOREIGN KEY (`typeID`) REFERENCES `usertype` (`typeID`),
  ADD CONSTRAINT `type_privilege_ibfk_2` FOREIGN KEY (`privilegeID`) REFERENCES `privilege` (`privilegeID`);

--
-- Constraints for table `user_table`
--
ALTER TABLE `user_table`
  ADD CONSTRAINT `user_table_ibfk_1` FOREIGN KEY (`user_profileType`) REFERENCES `usertype` (`typeID`);

--
-- Constraints for table `venue`
--
ALTER TABLE `venue`
  ADD CONSTRAINT `venue_ibfk_1` FOREIGN KEY (`cityID`) REFERENCES `city` (`cityID`),
  ADD CONSTRAINT `venue_ibfk_2` FOREIGN KEY (`managerID`) REFERENCES `user_table` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
