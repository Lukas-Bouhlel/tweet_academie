-- phpMyAdmin SQL Dump
-- version 5.0.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 05, 2020 at 12:04 PM
-- Server version: 5.7.29-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `common-database`
--
CREATE DATABASE IF NOT EXISTS `common-database` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `common-database`;

-- --------------------------------------------------------

--
-- Table structure for table `fav`
--

CREATE TABLE `fav` (
  `id_user` int(11) NOT NULL,
  `id_tweet` int(11) NOT NULL,
  `date_fav` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `follow`
--

CREATE TABLE `follow` (
  `id_follower` int(11) NOT NULL,
  `id_following` int(11) NOT NULL,
  `date_follow` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id_tweet` int(11) NOT NULL,
  `img_url` varchar(1000) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `mail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `passw` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `date_inscription` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_naissance` date DEFAULT NULL,
  `etat_compte` enum('0','1','2','3') COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `banner` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pays` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ville` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `biography` varchar(160) COLLATE utf8_unicode_ci DEFAULT NULL,
  `genre` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tel` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `site_web` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `light_mode` enum('on','off') COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notifs`
--

CREATE TABLE `notifs` (
  `id_user_to` int(11) NOT NULL,
  `id_user_from` int(11) NOT NULL,
  `type_notif` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_reception` datetime NOT NULL,
  `is_read` enum('0','1') COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `private_message`
--

CREATE TABLE `private_message` (
  `id_user_to` int(11) NOT NULL,
  `id_user_from` int(11) NOT NULL,
  `message` varchar(2000) COLLATE utf8_unicode_ci NOT NULL,
  `date_envoie` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rt`
--

CREATE TABLE `rt` (
  `id_user` int(11) NOT NULL,
  `id_tweet` int(11) NOT NULL,
  `date_fav` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tweets`
--

CREATE TABLE `tweets` (
  `id_tweet` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `message` varchar(140) COLLATE utf8_unicode_ci NOT NULL,
  `date_sent` datetime NOT NULL,
  `fav_counter` int(11) NOT NULL,
  `rt_counter` int(11) NOT NULL,
  `comm_counter` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tweet_comms`
--

CREATE TABLE `tweet_comms` (
  `id_tweet` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_tweet_parent` int(11) NOT NULL,
  `message` varchar(140) COLLATE utf8_unicode_ci NOT NULL,
  `date_envoie` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fav`
--
ALTER TABLE `fav`
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_tweet` (`id_tweet`);

--
-- Indexes for table `follow`
--
ALTER TABLE `follow`
  ADD KEY `id_follower` (`id_follower`),
  ADD KEY `id_following` (`id_following`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD KEY `id_tweet` (`id_tweet`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `mail` (`mail`);

--
-- Indexes for table `notifs`
--
ALTER TABLE `notifs`
  ADD KEY `id_user_to` (`id_user_to`),
  ADD KEY `id_user_from` (`id_user_from`);

--
-- Indexes for table `private_message`
--
ALTER TABLE `private_message`
  ADD KEY `id_user_to` (`id_user_to`),
  ADD KEY `id_user_from` (`id_user_from`);

--
-- Indexes for table `rt`
--
ALTER TABLE `rt`
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_tweet` (`id_tweet`);

--
-- Indexes for table `tweets`
--
ALTER TABLE `tweets`
  ADD PRIMARY KEY (`id_tweet`),
  ADD UNIQUE KEY `id_tweet` (`id_tweet`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tweet_comms`
--
ALTER TABLE `tweet_comms`
  ADD PRIMARY KEY (`id_tweet`),
  ADD UNIQUE KEY `id_tweet` (`id_tweet`),
  ADD KEY `id_user` (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tweets`
--
ALTER TABLE `tweets`
  MODIFY `id_tweet` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tweet_comms`
--
ALTER TABLE `tweet_comms`
  MODIFY `id_tweet` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `fav`
--
ALTER TABLE `fav`
  ADD CONSTRAINT `fav_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `members` (`id`),
  ADD CONSTRAINT `fav_ibfk_2` FOREIGN KEY (`id_tweet`) REFERENCES `tweets` (`id_tweet`);

--
-- Constraints for table `follow`
--
ALTER TABLE `follow`
  ADD CONSTRAINT `follow_ibfk_1` FOREIGN KEY (`id_follower`) REFERENCES `members` (`id`),
  ADD CONSTRAINT `follow_ibfk_2` FOREIGN KEY (`id_following`) REFERENCES `members` (`id`);

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`id_tweet`) REFERENCES `tweets` (`id_tweet`);

--
-- Constraints for table `notifs`
--
ALTER TABLE `notifs`
  ADD CONSTRAINT `notifs_ibfk_1` FOREIGN KEY (`id_user_to`) REFERENCES `members` (`id`),
  ADD CONSTRAINT `notifs_ibfk_2` FOREIGN KEY (`id_user_from`) REFERENCES `members` (`id`);

--
-- Constraints for table `private_message`
--
ALTER TABLE `private_message`
  ADD CONSTRAINT `private_message_ibfk_1` FOREIGN KEY (`id_user_to`) REFERENCES `members` (`id`),
  ADD CONSTRAINT `private_message_ibfk_2` FOREIGN KEY (`id_user_from`) REFERENCES `members` (`id`);

--
-- Constraints for table `rt`
--
ALTER TABLE `rt`
  ADD CONSTRAINT `rt_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `members` (`id`),
  ADD CONSTRAINT `rt_ibfk_2` FOREIGN KEY (`id_tweet`) REFERENCES `tweets` (`id_tweet`);

--
-- Constraints for table `tweets`
--
ALTER TABLE `tweets`
  ADD CONSTRAINT `tweets_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `members` (`id`);

--
-- Constraints for table `tweet_comms`
--
ALTER TABLE `tweet_comms`
  ADD CONSTRAINT `tweet_comms_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `members` (`id`),
  ADD CONSTRAINT `tweet_comms_ibfk_2` FOREIGN KEY (`id_tweet`) REFERENCES `tweets` (`id_tweet`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

