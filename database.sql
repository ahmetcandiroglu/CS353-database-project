-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 15 May 2018, 00:53:27
-- Sunucu sürümü: 10.1.31-MariaDB
-- PHP Sürümü: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `databaseproject`
--
CREATE DATABASE IF NOT EXISTS `databaseproject` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `databaseproject`;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `category`
--

CREATE TABLE `category` (
  `categoryID` int(11) NOT NULL,
  `categoryName` varchar(40) NOT NULL,
  `categoryDesc` varchar(150) DEFAULT NULL,
  `categoryCreated` date NOT NULL,
  `categoryModified` date NOT NULL,
  `categoryStatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `cat_venue`
--

CREATE TABLE `cat_venue` (
  `categoryID` int(11) NOT NULL,
  `venueID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `checkin`
--

CREATE TABLE `checkin` (
  `checkinID` int(11) NOT NULL,
  `checkin_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `username` varchar(100) NOT NULL,
  `venueID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `checkin`
--

INSERT INTO `checkin` (`checkinID`, `checkin_date`, `username`, `venueID`) VALUES
(4, '2018-05-14 20:18:48', 'ahmetc', 1),
(5, '2018-05-14 20:21:35', 'ahmetc', 1),
(6, '2018-05-14 20:25:59', 'ahmetc', 1),
(7, '2018-05-14 20:26:28', 'ahmetc', 1),
(8, '2018-05-14 21:01:03', 'ahmetc', 2),
(9, '2018-05-14 21:01:23', 'ahmetc', 2),
(10, '2018-05-15 00:15:32', 'ahmetc', 2),
(11, '2018-05-15 00:50:50', 'ahmetc', 1),
(12, '2018-05-15 00:56:02', 'ahmetc', 1),
(13, '2018-05-15 00:59:33', 'ahmetc', 1),
(14, '2018-05-15 01:16:36', 'ahmetc', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `checkin_photo`
--

CREATE TABLE `checkin_photo` (
  `checkinID` int(11) NOT NULL,
  `photoID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `checkin_photo`
--

INSERT INTO `checkin_photo` (`checkinID`, `photoID`) VALUES
(6, 1),
(6, 2),
(7, 3),
(7, 4),
(10, 5);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `city`
--

CREATE TABLE `city` (
  `cityID` int(11) NOT NULL,
  `cityName` varchar(40) NOT NULL,
  `cityStatus` int(11) NOT NULL,
  `countryID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `city`
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
-- Tablo için tablo yapısı `comment`
--

CREATE TABLE `comment` (
  `commentID` int(11) NOT NULL,
  `comment_text` varchar(250) NOT NULL,
  `comment_date` date NOT NULL,
  `username` varchar(100) NOT NULL,
  `checkinID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `country`
--

CREATE TABLE `country` (
  `countryID` int(11) NOT NULL,
  `countryName` varchar(40) NOT NULL,
  `countryCode` varchar(10) NOT NULL,
  `countryStatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `country`
--

INSERT INTO `country` (`countryID`, `countryName`, `countryCode`, `countryStatus`) VALUES
(1, 'Albania', 'AL', 1),
(2, 'Turkey', 'TR', 1),
(3, 'United Kingdom', 'UK', 1),
(4, 'United States', 'US', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `feature`
--

CREATE TABLE `feature` (
  `venueID` int(11) NOT NULL,
  `featureName` varchar(40) NOT NULL,
  `featureDesc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `feature`
--

INSERT INTO `feature` (`venueID`, `featureName`, `featureDesc`) VALUES
(1, 'Cosy', 'Small place, big hearts'),
(1, 'Family', 'Bring your family'),
(1, 'Pizza', 'Delicious Italian pizza'),
(2, 'Fun', 'Have fun'),
(2, 'Game', 'All sorts of games'),
(2, 'Young', 'Not for old people');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `follows`
--

CREATE TABLE `follows` (
  `follower` varchar(100) NOT NULL,
  `followed` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `follows`
--

INSERT INTO `follows` (`follower`, `followed`) VALUES
('ahmetc', 'albjongjuzi'),
('ahmetc', 'aurelhoxha'),
('ahmetc', 'heisenberg'),
('ahmetc', 'jean'),
('ahmetc', 'jesse');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `has_favorite`
--

CREATE TABLE `has_favorite` (
  `username` varchar(100) NOT NULL,
  `venueID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `messages`
--

CREATE TABLE `messages` (
  `sender` varchar(100) NOT NULL,
  `receiver` varchar(100) NOT NULL,
  `message` varchar(500) DEFAULT NULL,
  `sent_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `photo`
--

CREATE TABLE `photo` (
  `photoID` int(11) NOT NULL,
  `photoUrl` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `photo`
--

INSERT INTO `photo` (`photoID`, `photoUrl`) VALUES
(1, 'images/user/ahmetc/checkin/6/checkin1.jpg'),
(2, 'images/user/ahmetc/checkin/6/checkin2.png'),
(3, 'images/user/ahmetc/checkin/7/checkin1.jpg'),
(4, 'images/user/ahmetc/checkin/7/checkin2.png'),
(5, 'images/user/ahmetc/checkin/10/checkin1.jpg');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `plan_to_visit`
--

CREATE TABLE `plan_to_visit` (
  `username` varchar(100) NOT NULL,
  `venueID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `prefers`
--

CREATE TABLE `prefers` (
  `username` varchar(100) NOT NULL,
  `categoryID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `privilege`
--

CREATE TABLE `privilege` (
  `privilegeID` int(11) NOT NULL,
  `privilege_name` varchar(40) NOT NULL,
  `privilege_desc` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `privilege`
--

INSERT INTO `privilege` (`privilegeID`, `privilege_name`, `privilege_desc`) VALUES
(1, 'Access to My Venues.', 'Check the Access to My Venues!');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `review`
--

CREATE TABLE `review` (
  `reviewID` int(11) NOT NULL,
  `checkinID` int(11) NOT NULL,
  `review_rating` int(11) NOT NULL,
  `review_desc` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `review`
--

INSERT INTO `review` (`reviewID`, `checkinID`, `review_rating`, `review_desc`) VALUES
(1, 10, 4, 'Nice place, do recommend it!'),
(2, 11, 5, 'Nice pizza dudes'),
(3, 14, 3, 'Nice overall');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `suggestion`
--

CREATE TABLE `suggestion` (
  `suggestionID` int(11) NOT NULL,
  `suggestion_text` varchar(250) NOT NULL,
  `suggestion_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `venueID` int(11) NOT NULL,
  `username` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `suggestion`
--

INSERT INTO `suggestion` (`suggestionID`, `suggestion_text`, `suggestion_date`, `venueID`, `username`) VALUES
(1, 'You should open your store earlier', '2018-05-15 00:24:40', 2, 'ahmetc'),
(9, 'Make pizzas bigger', '2018-05-15 00:50:40', 1, 'ahmetc');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `type_privilege`
--

CREATE TABLE `type_privilege` (
  `typeID` int(11) NOT NULL,
  `privilegeID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `usertype`
--

CREATE TABLE `usertype` (
  `typeID` int(11) NOT NULL,
  `typeName` varchar(40) NOT NULL,
  `typeActive` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `usertype`
--

INSERT INTO `usertype` (`typeID`, `typeName`, `typeActive`) VALUES
(1, 'Manager', 1),
(2, 'Normal User', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `user_like`
--

CREATE TABLE `user_like` (
  `username` varchar(100) NOT NULL,
  `checkinID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `user_like`
--

INSERT INTO `user_like` (`username`, `checkinID`) VALUES
('ahmetc', 6),
('ahmetc', 9),
('ahmetc', 11),
('ahmetc', 12),
('ahmetc', 13);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `user_table`
--

CREATE TABLE `user_table` (
  `username` varchar(100) NOT NULL,
  `user_firstName` varchar(50) NOT NULL,
  `user_lastName` varchar(50) NOT NULL,
  `user_email` varchar(100) DEFAULT NULL,
  `user_password` varchar(30) NOT NULL,
  `user_birthdate` date NOT NULL,
  `user_pic` varchar(255) DEFAULT NULL,
  `user_gender` char(1) NOT NULL,
  `user_cityID` int(11) NOT NULL,
  `user_profileType` int(11) NOT NULL,
  `user_created` date NOT NULL,
  `user_isActive` int(11) NOT NULL,
  `user_lastlogin` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `user_table`
--

INSERT INTO `user_table` (`username`, `user_firstName`, `user_lastName`, `user_email`, `user_password`, `user_birthdate`, `user_pic`, `user_gender`, `user_cityID`, `user_profileType`, `user_created`, `user_isActive`, `user_lastlogin`) VALUES
('ahmetc', 'Ahmet', 'Candiroglu', 'ahmet@gmail.com', 'qwerty', '1986-05-03', 'images/user/ahmetc/pp/Prison Mike.png', 'M', 4, 2, '2018-05-12', 1, '16:23:44'),
('albjongjuzi', 'Albjon', 'Gjuzi', 'albjon@live.com', 'bonbon', '1999-11-11', 'uploads/albjongjuziProfilePic.jpeg', 'M', 1, 2, '2018-05-07', 1, '21:16:31'),
('aurelhoxha', 'Aurel', 'Hoxha', 'aurelhoxha@hotmail.com', 'aureli1996', '1996-09-11', 'images/user/aurelhoxha/pp/aurelhoxhaProfilePic.jpeg', 'M', 1, 1, '2018-05-07', 1, '17:02:18'),
('heisenberg', 'Walter', 'White', 'ww@gmail.com', '123456', '1956-11-02', 'images/user/heisenberg/pp/heisenbergProfilePic.jpeg', 'M', 11, 2, '2018-05-13', 1, '19:49:57'),
('jean', 'Jean', 'Grey', 'jean@gmail.com', '123456', '1985-02-25', 'images/user/jean/pp/jeanProfilePic.jpeg', 'F', 6, 1, '2018-05-13', 1, '19:47:15'),
('jesse', 'Jesse', 'Pinkman', 'jesse@gmail.com', '123456', '1986-09-14', 'images/user/jesse/pp/jesseProfilePic.jpeg', 'M', 2, 2, '2018-05-13', 1, '19:52:32');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `venue`
--

CREATE TABLE `venue` (
  `venueID` int(11) NOT NULL,
  `venueName` varchar(40) NOT NULL,
  `venueDesc` varchar(150) DEFAULT NULL,
  `venueTel` char(10) DEFAULT NULL,
  `street_number` int(11) DEFAULT NULL,
  `street_name` varchar(40) DEFAULT NULL,
  `cityID` int(11) NOT NULL,
  `venueCreated` date NOT NULL,
  `venueModified` date NOT NULL,
  `venueStatus` int(11) NOT NULL,
  `venueOpenTime` time DEFAULT NULL,
  `venueCloseTime` time DEFAULT NULL,
  `venuePic` varchar(255) DEFAULT NULL,
  `managerName` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `venue`
--

INSERT INTO `venue` (`venueID`, `venueName`, `venueDesc`, `venueTel`, `street_number`, `street_name`, `cityID`, `venueCreated`, `venueModified`, `venueStatus`, `venueOpenTime`, `venueCloseTime`, `venuePic`, `managerName`) VALUES
(1, 'Pizza Il Forno', 'We make pizza.', '3122660302', 1597, 'Universiteler Mah.', 4, '2018-05-14', '2018-05-14', 1, '10:00:00', '23:30:00', 'images/venue/1/pp/Pizza Il Forno.jpeg', 'aurelhoxha'),
(2, 'Ankuva Rollhouse', 'Bowling is fun!', '3122661240', 1, 'Universiteler Mah.', 4, '2018-05-14', '2018-05-14', 1, '23:30:00', '11:15:00', 'images/venue/2/pp/Ankuva Rollhouse.jpg', 'jean');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `venue_photo`
--

CREATE TABLE `venue_photo` (
  `venueID` int(11) NOT NULL,
  `photoID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryID`);

--
-- Tablo için indeksler `cat_venue`
--
ALTER TABLE `cat_venue`
  ADD PRIMARY KEY (`categoryID`,`venueID`),
  ADD KEY `venueID` (`venueID`);

--
-- Tablo için indeksler `checkin`
--
ALTER TABLE `checkin`
  ADD PRIMARY KEY (`checkinID`),
  ADD KEY `username` (`username`),
  ADD KEY `venueID` (`venueID`);

--
-- Tablo için indeksler `checkin_photo`
--
ALTER TABLE `checkin_photo`
  ADD PRIMARY KEY (`checkinID`,`photoID`);

--
-- Tablo için indeksler `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`cityID`),
  ADD KEY `countryID` (`countryID`);

--
-- Tablo için indeksler `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`commentID`),
  ADD KEY `username` (`username`),
  ADD KEY `checkinID` (`checkinID`);

--
-- Tablo için indeksler `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`countryID`);

--
-- Tablo için indeksler `feature`
--
ALTER TABLE `feature`
  ADD PRIMARY KEY (`venueID`,`featureName`);

--
-- Tablo için indeksler `follows`
--
ALTER TABLE `follows`
  ADD PRIMARY KEY (`follower`,`followed`),
  ADD KEY `followed` (`followed`);

--
-- Tablo için indeksler `has_favorite`
--
ALTER TABLE `has_favorite`
  ADD PRIMARY KEY (`username`,`venueID`),
  ADD KEY `venueID` (`venueID`);

--
-- Tablo için indeksler `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`sender`,`receiver`),
  ADD KEY `receiver` (`receiver`);

--
-- Tablo için indeksler `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`photoID`);

--
-- Tablo için indeksler `plan_to_visit`
--
ALTER TABLE `plan_to_visit`
  ADD PRIMARY KEY (`username`,`venueID`),
  ADD KEY `venueID` (`venueID`);

--
-- Tablo için indeksler `prefers`
--
ALTER TABLE `prefers`
  ADD PRIMARY KEY (`username`,`categoryID`),
  ADD KEY `categoryID` (`categoryID`);

--
-- Tablo için indeksler `privilege`
--
ALTER TABLE `privilege`
  ADD PRIMARY KEY (`privilegeID`);

--
-- Tablo için indeksler `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`reviewID`),
  ADD KEY `checkinID` (`checkinID`);

--
-- Tablo için indeksler `suggestion`
--
ALTER TABLE `suggestion`
  ADD PRIMARY KEY (`suggestionID`),
  ADD KEY `venueID` (`venueID`),
  ADD KEY `username` (`username`);

--
-- Tablo için indeksler `type_privilege`
--
ALTER TABLE `type_privilege`
  ADD PRIMARY KEY (`typeID`,`privilegeID`),
  ADD KEY `privilegeID` (`privilegeID`);

--
-- Tablo için indeksler `usertype`
--
ALTER TABLE `usertype`
  ADD PRIMARY KEY (`typeID`);

--
-- Tablo için indeksler `user_like`
--
ALTER TABLE `user_like`
  ADD PRIMARY KEY (`username`,`checkinID`),
  ADD KEY `checkinID` (`checkinID`);

--
-- Tablo için indeksler `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`username`),
  ADD KEY `user_cityID` (`user_cityID`),
  ADD KEY `user_profileType` (`user_profileType`);

--
-- Tablo için indeksler `venue`
--
ALTER TABLE `venue`
  ADD PRIMARY KEY (`venueID`),
  ADD KEY `cityID` (`cityID`),
  ADD KEY `managerName` (`managerName`);

--
-- Tablo için indeksler `venue_photo`
--
ALTER TABLE `venue_photo`
  ADD PRIMARY KEY (`venueID`,`photoID`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `category`
--
ALTER TABLE `category`
  MODIFY `categoryID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `checkin`
--
ALTER TABLE `checkin`
  MODIFY `checkinID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Tablo için AUTO_INCREMENT değeri `city`
--
ALTER TABLE `city`
  MODIFY `cityID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Tablo için AUTO_INCREMENT değeri `comment`
--
ALTER TABLE `comment`
  MODIFY `commentID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `country`
--
ALTER TABLE `country`
  MODIFY `countryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `photo`
--
ALTER TABLE `photo`
  MODIFY `photoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `privilege`
--
ALTER TABLE `privilege`
  MODIFY `privilegeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `review`
--
ALTER TABLE `review`
  MODIFY `reviewID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `suggestion`
--
ALTER TABLE `suggestion`
  MODIFY `suggestionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Tablo için AUTO_INCREMENT değeri `usertype`
--
ALTER TABLE `usertype`
  MODIFY `typeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `venue`
--
ALTER TABLE `venue`
  MODIFY `venueID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `cat_venue`
--
ALTER TABLE `cat_venue`
  ADD CONSTRAINT `cat_venue_ibfk_1` FOREIGN KEY (`categoryID`) REFERENCES `category` (`categoryID`),
  ADD CONSTRAINT `cat_venue_ibfk_2` FOREIGN KEY (`venueID`) REFERENCES `venue` (`venueID`);

--
-- Tablo kısıtlamaları `checkin`
--
ALTER TABLE `checkin`
  ADD CONSTRAINT `checkin_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user_table` (`username`),
  ADD CONSTRAINT `checkin_ibfk_2` FOREIGN KEY (`venueID`) REFERENCES `venue` (`venueID`);

--
-- Tablo kısıtlamaları `checkin_photo`
--
ALTER TABLE `checkin_photo`
  ADD CONSTRAINT `checkin_photo_ibfk_1` FOREIGN KEY (`checkinID`) REFERENCES `checkin` (`checkinID`);

--
-- Tablo kısıtlamaları `city`
--
ALTER TABLE `city`
  ADD CONSTRAINT `city_ibfk_1` FOREIGN KEY (`countryID`) REFERENCES `country` (`countryID`);

--
-- Tablo kısıtlamaları `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user_table` (`username`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`checkinID`) REFERENCES `checkin` (`checkinID`);

--
-- Tablo kısıtlamaları `feature`
--
ALTER TABLE `feature`
  ADD CONSTRAINT `feature_ibfk_1` FOREIGN KEY (`venueID`) REFERENCES `venue` (`venueID`);

--
-- Tablo kısıtlamaları `follows`
--
ALTER TABLE `follows`
  ADD CONSTRAINT `follows_ibfk_1` FOREIGN KEY (`follower`) REFERENCES `user_table` (`username`),
  ADD CONSTRAINT `follows_ibfk_2` FOREIGN KEY (`followed`) REFERENCES `user_table` (`username`);

--
-- Tablo kısıtlamaları `has_favorite`
--
ALTER TABLE `has_favorite`
  ADD CONSTRAINT `has_favorite_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user_table` (`username`),
  ADD CONSTRAINT `has_favorite_ibfk_2` FOREIGN KEY (`venueID`) REFERENCES `venue` (`venueID`);

--
-- Tablo kısıtlamaları `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`sender`) REFERENCES `user_table` (`username`),
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`receiver`) REFERENCES `user_table` (`username`);

--
-- Tablo kısıtlamaları `plan_to_visit`
--
ALTER TABLE `plan_to_visit`
  ADD CONSTRAINT `plan_to_visit_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user_table` (`username`),
  ADD CONSTRAINT `plan_to_visit_ibfk_2` FOREIGN KEY (`venueID`) REFERENCES `venue` (`venueID`);

--
-- Tablo kısıtlamaları `prefers`
--
ALTER TABLE `prefers`
  ADD CONSTRAINT `prefers_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user_table` (`username`),
  ADD CONSTRAINT `prefers_ibfk_2` FOREIGN KEY (`categoryID`) REFERENCES `category` (`categoryID`);

--
-- Tablo kısıtlamaları `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`checkinID`) REFERENCES `checkin` (`checkinID`);

--
-- Tablo kısıtlamaları `suggestion`
--
ALTER TABLE `suggestion`
  ADD CONSTRAINT `suggestion_ibfk_1` FOREIGN KEY (`venueID`) REFERENCES `venue` (`venueID`),
  ADD CONSTRAINT `suggestion_ibfk_2` FOREIGN KEY (`username`) REFERENCES `user_table` (`username`);

--
-- Tablo kısıtlamaları `type_privilege`
--
ALTER TABLE `type_privilege`
  ADD CONSTRAINT `type_privilege_ibfk_1` FOREIGN KEY (`typeID`) REFERENCES `usertype` (`typeID`),
  ADD CONSTRAINT `type_privilege_ibfk_2` FOREIGN KEY (`privilegeID`) REFERENCES `privilege` (`privilegeID`);

--
-- Tablo kısıtlamaları `user_like`
--
ALTER TABLE `user_like`
  ADD CONSTRAINT `user_like_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user_table` (`username`),
  ADD CONSTRAINT `user_like_ibfk_2` FOREIGN KEY (`checkinID`) REFERENCES `checkin` (`checkinID`);

--
-- Tablo kısıtlamaları `user_table`
--
ALTER TABLE `user_table`
  ADD CONSTRAINT `user_table_ibfk_1` FOREIGN KEY (`user_cityID`) REFERENCES `city` (`cityID`),
  ADD CONSTRAINT `user_table_ibfk_2` FOREIGN KEY (`user_profileType`) REFERENCES `usertype` (`typeID`);

--
-- Tablo kısıtlamaları `venue`
--
ALTER TABLE `venue`
  ADD CONSTRAINT `venue_ibfk_1` FOREIGN KEY (`cityID`) REFERENCES `city` (`cityID`),
  ADD CONSTRAINT `venue_ibfk_2` FOREIGN KEY (`managerName`) REFERENCES `user_table` (`username`);

--
-- Tablo kısıtlamaları `venue_photo`
--
ALTER TABLE `venue_photo`
  ADD CONSTRAINT `venue_photo_ibfk_1` FOREIGN KEY (`venueID`) REFERENCES `venue` (`venueID`);
--
-- Veritabanı: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(11) NOT NULL,
  `dbase` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `query` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_length` text COLLATE utf8_bin,
  `col_collation` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) COLLATE utf8_bin DEFAULT '',
  `col_default` text COLLATE utf8_bin
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `column_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `settings_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `export_type` varchar(10) COLLATE utf8_bin NOT NULL,
  `template_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `template_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sqlquery` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT '0',
  `x` float UNSIGNED NOT NULL DEFAULT '0',
  `y` float UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `display_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `prefs` text COLLATE utf8_bin NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

--
-- Tablo döküm verisi `pma__table_uiprefs`
--

INSERT INTO `pma__table_uiprefs` (`username`, `db_name`, `table_name`, `prefs`, `last_update`) VALUES
('root', 'databaseproject', 'review', '{\"sorted_col\":\"`review`.`checkinID` ASC\"}', '2018-05-14 22:46:07');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text COLLATE utf8_bin NOT NULL,
  `schema_sql` text COLLATE utf8_bin,
  `data_sql` longtext COLLATE utf8_bin,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') COLLATE utf8_bin DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `config_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Tablo döküm verisi `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2018-05-14 22:53:19', '{\"lang\":\"tr\",\"Console\\/Mode\":\"collapse\"}');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL,
  `tab` varchar(64) COLLATE utf8_bin NOT NULL,
  `allowed` enum('Y','N') COLLATE utf8_bin NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Tablo için indeksler `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Tablo için indeksler `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Tablo için indeksler `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Tablo için indeksler `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Tablo için indeksler `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Tablo için indeksler `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Tablo için indeksler `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Tablo için indeksler `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Tablo için indeksler `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Tablo için indeksler `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Tablo için indeksler `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Tablo için indeksler `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Tablo için indeksler `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Tablo için indeksler `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Tablo için indeksler `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Tablo için indeksler `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Tablo için indeksler `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Veritabanı: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
