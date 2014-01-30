-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Machine: localhost
-- Genereertijd: 24 jan 2014 om 07:51
-- Serverversie: 5.6.12-log
-- PHP-versie: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databank: `am1b-fotosjaak`
--
CREATE DATABASE IF NOT EXISTS `am1b-fotosjaak` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `am1b-fotosjaak`;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `faq`
--

CREATE TABLE IF NOT EXISTS `faq` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `question_english` text NOT NULL,
  `question_dutch` text NOT NULL,
  `answer_english` text NOT NULL,
  `answer_dutch` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Gegevens worden uitgevoerd voor tabel `faq`
--

INSERT INTO `faq` (`id`, `question_english`, `question_dutch`, `answer_english`, `answer_dutch`) VALUES
(1, 'When is the game finished', 'Wanneer is het spel afgelopen', 'When the score is less then 0 point', 'Wanneer de score lager is dan 0 punten'),
(2, 'Is this game hard to play', 'Is het een moeilijk spel', 'Yes, this game is very hard to master', 'Ja, dit is een zeer complex spel');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `login_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(200) NOT NULL,
  `password` varchar(32) NOT NULL,
  `userrole` enum('customer','administrator','root','photographer','developer') NOT NULL,
  `isactivated` enum('yes','no') NOT NULL DEFAULT 'no',
  `registerdate` datetime NOT NULL,
  PRIMARY KEY (`login_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Gegevens worden uitgevoerd voor tabel `login`
--

INSERT INTO `login` (`login_id`, `email`, `password`, `userrole`, `isactivated`, `registerdate`) VALUES
(1, 'root@gmail.com', 'geheim', 'root', 'yes', '2013-11-12 00:00:00'),
(2, 'admin@gmail.com', 'geheim', 'administrator', 'yes', '2013-11-18 00:00:00'),
(3, 'photographer@gmail.com', 'geheim', 'photographer', 'yes', '2013-11-14 13:00:00'),
(4, 'customer@gmail.com', 'geheim', 'customer', 'yes', '2013-11-27 00:00:00'),
(5, 'developer@gmail.com', 'geheim', 'developer', 'yes', '2013-11-30 00:00:00'),
(6, 'arjan43@gmail.com', 'bd7679a082c78026b1c64a6b42889969', 'customer', 'no', '2014-01-10 09:30:43'),
(7, 'arjan44@gmail.com', '70c6951965389c9c0a55e6278a8f93c2', 'customer', 'no', '2014-01-10 09:33:21'),
(8, 'arjan45@gmail.com', '2eb9db1944bbfa37783902fa392bb713', 'customer', 'no', '2014-01-10 10:02:46'),
(9, 'arjan46@gmail.com', '8569428258cd51ef7ce1682da6a11a88', 'customer', 'no', '2014-01-10 10:32:46'),
(10, 'arjan50@gmail.com', '1789f3ee7930033f04a16fb709b21738', 'customer', 'no', '2014-01-10 10:33:36'),
(11, 'arjan51@gmail.com', '732d4ae8d9096efe3a938d3c800ea50b', 'customer', 'no', '2014-01-10 10:35:49'),
(12, 'arjan52@gmail.com', 'f268d7df2d02c98e49061de67eea373b', 'customer', 'no', '2014-01-10 10:39:09'),
(13, 'arjan53@gmail.com', 'f754c02ba6072b976f6cc2c3f68d9eeb', 'customer', 'no', '2014-01-10 11:01:47'),
(14, 'arjan55@gmail.com', '43171b92bcb84835f850ab28de665075', 'customer', 'no', '2014-01-10 11:14:29'),
(15, 'arjan57@gail.com', 'e53f04c5e0245dda25ee9ad9b29cb704', 'customer', 'no', '2014-01-10 11:20:19'),
(16, 'devries@gmail.com', '78875bacfe6b48d510b66f92c12ea7c7', 'customer', 'no', '2014-01-10 11:36:10');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(10) unsigned NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `infix` varchar(20) NOT NULL,
  `surname` varchar(300) NOT NULL,
  `address` varchar(200) NOT NULL,
  `addressnumber` varchar(12) NOT NULL,
  `city` varchar(300) NOT NULL,
  `zipcode` varchar(6) NOT NULL,
  `country` varchar(300) NOT NULL,
  `phonenumber` varchar(10) NOT NULL,
  `mobilephonenumber` varchar(10) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden uitgevoerd voor tabel `user`
--

INSERT INTO `user` (`user_id`, `firstname`, `infix`, `surname`, `address`, `addressnumber`, `city`, `zipcode`, `country`, `phonenumber`, `mobilephonenumber`) VALUES
(11, 'Arjan', 'de', 'Ruijter', 'Prins Hendrikstraat', '34', 'Castricum', '1901CB', 'Noord-Holland', '3125167420', '3125167420'),
(12, 'Arjan', 'de', 'Ruijter', 'Prins Hendrikstraat', '12', 'Castricum', '1901CB', 'Noord-Holland', '3125167420', '3125167420'),
(13, 'Arjan', 'de', 'Ruijter', 'Prins Hendrikstraat', '12', 'Castricum', '1901CB', 'Noord-Holland', '3125167420', '3125167420'),
(14, 'Arjan', 'de', 'Ruijter', 'Prins Hendrikstraat', '12', 'Castricum', '1901CB', 'Noord-Holland', '3125167420', '3125167420'),
(15, '', '', '', '', '', 'Castricum', '1901CB', 'Noord-Holland', '3125167420', '3125167420'),
(16, 'Bert', 'de', 'Vries', 'Prins Hendrikstraat', '34', 'Castricum', '1901CB', 'Noord-Holland', '3125167420', '3125167420');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(100) NOT NULL,
  `infix` varchar(20) NOT NULL,
  `surname` varchar(200) NOT NULL,
  `city` varchar(163) NOT NULL,
  `zip_code` varchar(6) NOT NULL,
  `street` varchar(163) NOT NULL,
  `house_number` int(4) NOT NULL,
  `birthday` date NOT NULL,
  `sex` enum('male','female') NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `game_type` enum('no_choice','fps','strategy','adventure','rpg','horror','retro','sport','puzzle','party','casual','education') NOT NULL,
  `favo_game` varchar(300) NOT NULL,
  `userrole` enum('customer','admin','root') NOT NULL DEFAULT 'customer',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Gegevens worden uitgevoerd voor tabel `users`
--

INSERT INTO `users` (`id`, `firstname`, `infix`, `surname`, `city`, `zip_code`, `street`, `house_number`, `birthday`, `sex`, `email`, `password`, `game_type`, `favo_game`, `userrole`) VALUES
(35, 'customer', 'de', 'customer', 'CustomerStad', '1901CB', 'customerstraat', 17, '1901-01-01', 'male', 'customer@gmail.com', 'geheim', 'casual', 'IloMilo', 'customer'),
(36, 'Admin', 'de', 'Admin', 'Adminstad', '1901CB', 'Adminstraat', 17, '1990-01-01', 'male', 'admin@gmail.com', 'geheim', 'puzzle', 'Tomb Raider', 'admin'),
(37, 'Root', 'de', 'Root', 'Rootstad', '1901CB', 'Rootstraat', 12, '1990-01-01', 'male', 'root@gmail.com', 'geheim', 'retro', 'IloMilo', 'root'),
(38, 'Arjan', 'de', 'Ruijter', 'Castricum', '', '', 0, '0000-00-00', '', 'adruijter123@gmail.com', '', '', '', 'customer');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
