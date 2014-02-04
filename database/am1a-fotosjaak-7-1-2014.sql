-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Machine: localhost
-- Genereertijd: 07 jan 2014 om 08:41
-- Serverversie: 5.6.12-log
-- PHP-versie: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databank: `am1a-fotosjaak`
--
CREATE DATABASE IF NOT EXISTS `am1a-fotosjaak` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `am1a-fotosjaak`;

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
(1, 'Is this game hard to play?', 'Is dit een moeilijk spel om te spelen?', 'Yes, this game is very hard to crack.', 'Ja, dit spel is mega moeilijk.'),
(2, 'When is this game completed?', 'Wanneer heb je dit spel uitgespeeld?', 'The game is a never ending experience. Full of joy and pleasure.', 'De game komt nooit ten einde. Het maakt je tot een beter en gelukkiger mens.');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(200) NOT NULL,
  `password` varchar(32) NOT NULL,
  `userrole` enum('customer','root','administrator','photographer','developer') NOT NULL DEFAULT 'customer',
  `activated` enum('yes','no') NOT NULL DEFAULT 'no',
  `activationdate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Gegevens worden uitgevoerd voor tabel `login`
--

INSERT INTO `login` (`id`, `email`, `password`, `userrole`, `activated`, `activationdate`) VALUES
(1, 'customer@gmail.com', 'geheim', 'customer', 'no', '2013-12-02 00:00:00'),
(2, 'administrator@gmail.com', 'geheim', 'administrator', 'no', '2013-12-03 08:16:00'),
(3, 'root@gmail.com', 'geheim', 'root', 'yes', '2013-12-04 00:00:00'),
(4, 'photographer@gmail.com', 'geheim', 'photographer', 'no', '2013-12-05 12:20:28'),
(5, 'developer@gmail.com', 'geheim', 'developer', 'yes', '2013-12-15 00:00:00'),
(7, 'test@gmail.com', '661158d4d980b98127ab39f05efb7e7c', 'customer', 'no', '2013-12-17 11:23:25'),
(8, 'testerdetest@gmail.com', '89df6f6de76f009cceccde15d99bf259', 'customer', 'no', '2013-12-17 11:27:07'),
(9, 'adruijter@gmail.com', 'f3d0748be605f132def8cedcd881e8e7', 'customer', 'no', '2014-01-06 14:57:28'),
(10, 'adruijter1968@gmail.com', 'c92e8bc968a43dfbe64bab342e214bc3', 'customer', 'no', '2014-01-06 14:59:33'),
(11, 'adruijter321@gmail.com', '00084830abf12ba71480c11da8aa1ab7', 'customer', 'no', '2014-01-06 15:19:26'),
(12, 'adruijter678@gmail.com', '5df80f3ef6b23d3931e0fff9f92a6a59', 'customer', 'no', '2014-01-06 15:36:34'),
(13, 'adruijter324@gmail.com', 'e5f313bf90045889c6935f2d0af8bb0c', 'customer', 'no', '2014-01-06 16:00:35'),
(14, 'adruijter980@gmail.com', '6d76011c7a2c387a0a23dd02f46b2c8b', 'customer', 'no', '2014-01-06 16:08:26'),
(15, 'adruijter90@gmail.com', '13d9ca1cbb291b44bf978e3cdcfc593f', 'customer', 'no', '2014-01-07 09:03:10'),
(16, 'adruijter012@gmail.com', '3ad4607efd1d3f3a4bcaa0cc3a8d1c08', 'customer', 'no', '2014-01-07 09:25:31'),
(17, 'adruijtert5@gmail.com', '0cf3f4ee5626eb1bfd4672330528439f', 'customer', 'no', '2014-01-07 09:27:55'),
(18, 'adruijterjgt@gmail.com', '4c4b15e466762e2649716339ebadd667', 'customer', 'no', '2014-01-07 09:34:54');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) unsigned NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `infix` varchar(50) NOT NULL,
  `surname` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `addressnumber` varchar(10) NOT NULL,
  `city` varchar(200) NOT NULL,
  `zipcode` varchar(6) NOT NULL,
  `country` varchar(300) NOT NULL,
  `telephonenumber` varchar(10) NOT NULL,
  `mobilephonenumber` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden uitgevoerd voor tabel `user`
--

INSERT INTO `user` (`id`, `firstname`, `infix`, `surname`, `address`, `addressnumber`, `city`, `zipcode`, `country`, `telephonenumber`, `mobilephonenumber`) VALUES
(10, 'Arjan', 'de', 'Ruijter', 'Prins Hendrikstraat', '12', 'Castricum', '1901CB', 'Noord-Holland', '3125167420', '3125167420'),
(11, 'Arjan', 'de', 'Ruijter', 'Prins Hendrikstraat', '34', 'Castricum', '1901CB', 'Noord-Holland', '3125167420', '3125167420'),
(12, 'Arjan', 'de', 'Ruijter', 'Prins Hendrikstraat', '12', 'Castricum', '1901CB', 'Noord-Holland', '3125167420', '3125167420'),
(13, 'Arjan', 'de', 'Ruijter', 'Prins Hendrikstraat', '89', 'Castricum', '1901CB', 'Noord-Holland', '3125167420', '3125167420'),
(14, 'Arjan', 'de', 'Ruijter', 'Prins Hendrikstraat', '436', 'Castricum', '1901CB', 'Noord-Holland', '3125167420', '3125167420'),
(15, 'Arjan', 'de', 'Ruijter', 'Prins Hendrikstraat', '45', 'Castricum', '1901CB', 'Noord-Holland', '3125167420', '3125167420'),
(16, 'Arjan', 'de', 'Ruijter', 'Prins Hendrikstraat', '567', 'Castricum', '1901CB', 'Noord-Holland', '3125167420', '3125167420'),
(17, 'Arjan', 'de', 'Ruijter', 'Prins Hendrikstraat', '9393', 'Castricum', '1901CB', 'Noord-Holland', '3125167420', '3125167420'),
(18, 'Arjan', 'de', 'Ruijter', 'Prins Hendrikstraat', '5757', 'Castricum', '1901CB', 'Noord-Holland', '3125167420', '3125167420');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(100) NOT NULL,
  `infix` varchar(20) NOT NULL,
  `surname` varchar(200) NOT NULL,
  `street` varchar(163) NOT NULL,
  `house_number` int(4) NOT NULL,
  `city` varchar(163) NOT NULL,
  `zip_code` varchar(6) NOT NULL,
  `birthday` date NOT NULL,
  `sex` enum('male','female') NOT NULL,
  `marital_status` enum('married','single') NOT NULL,
  `favo_genre` enum('not_selected','rpg','adventure','horror','shooter','mmorpg','casual','educational','sport','simulation') NOT NULL DEFAULT 'not_selected',
  `favo_game` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `userrole` enum('customer','admin','root') NOT NULL DEFAULT 'customer',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Gegevens worden uitgevoerd voor tabel `users`
--

INSERT INTO `users` (`id`, `firstname`, `infix`, `surname`, `street`, `house_number`, `city`, `zip_code`, `birthday`, `sex`, `marital_status`, `favo_genre`, `favo_game`, `email`, `password`, `userrole`) VALUES
(39, 'Admin', 'de', 'Admin', 'Adminstraat', 17, 'Adminstraat', '1910CB', '1990-01-01', 'male', 'married', 'adventure', 'IloMilo', 'admin@gmail.com', 'geheim', 'customer'),
(40, 'customer', 'de', 'customer', 'customerstraat', 17, 'Customerstad', '1910CB', '1990-01-01', 'male', 'married', 'horror', 'IloMilo', 'customer@gmail.com', 'geheim', 'customer'),
(41, 'root', 'de', 'root', 'rootsstraat', 12, 'rootstad', '1901CB', '1990-01-01', 'male', 'married', 'shooter', 'IloMilo', 'root@gmail.com', 'geheim', 'customer');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
