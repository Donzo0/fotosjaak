-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Machine: localhost
-- Genereertijd: 25 feb 2014 om 10:01
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Gegevens worden uitgevoerd voor tabel `login`
--

INSERT INTO `login` (`id`, `email`, `password`, `userrole`, `activated`, `activationdate`) VALUES
(1, 'customer@gmail.com', 'geheim', 'customer', 'yes', '2013-12-02 00:00:00'),
(2, 'administrator@gmail.com', 'geheim', 'administrator', 'yes', '2013-12-03 08:16:00'),
(3, 'root@gmail.com', 'geheim', 'root', 'yes', '2013-12-04 00:00:00'),
(4, 'photographer@gmail.com', 'geheim', 'photographer', 'yes', '2013-12-05 12:20:28'),
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
(18, 'adruijterjgt@gmail.com', '4c4b15e466762e2649716339ebadd667', 'customer', 'no', '2014-01-07 09:34:54'),
(19, 'fhdhr@hf.nl', '7d466459bb038716796f16f9513f0886', 'customer', 'no', '2014-01-07 11:15:04'),
(20, 'sdfkj@sdfj.nl', '4617f54ffd8bd0b031d1fc03f9adb155', 'customer', 'no', '2014-01-07 11:51:15'),
(21, 'adruijter789@gmail.com', 'eeba6cf74c79698cae5cdd9124da1093', 'customer', 'no', '2014-01-13 14:45:34'),
(22, 'amersfoort@gmail.com', 'geheim', 'customer', 'yes', '2014-01-13 15:29:31'),
(23, 'rraq@gmail.com', 'geheim', 'customer', 'yes', '2014-01-14 08:49:07'),
(24, 'acustomer@gmail.com', 'a65f8bca2133da3f87b92a7d193edfe4', 'customer', 'no', '2014-01-28 08:15:20'),
(25, 'scustomer@gmail.com', 'geheim', 'customer', 'yes', '2014-01-28 08:20:55'),
(26, 'customer1@gmail.com', 'geheim', 'customer', 'yes', '2014-02-04 10:50:09'),
(27, 'customer2@gmail.com', 'geheim', 'customer', 'yes', '2014-02-04 10:51:02'),
(28, 'customer3@gmail.com', 'geheim', 'customer', 'yes', '2014-02-04 10:51:57');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `order_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `order_short` text NOT NULL,
  `order_long` text NOT NULL,
  `deliverydate` date NOT NULL,
  `eventdate` date NOT NULL,
  `color` enum('color','black-white') NOT NULL DEFAULT 'color',
  `number_of_pictures` int(11) NOT NULL,
  `confirmed` enum('yes','no') NOT NULL DEFAULT 'no',
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Gegevens worden uitgevoerd voor tabel `order`
--

INSERT INTO `order` (`order_id`, `user_id`, `order_short`, `order_long`, `deliverydate`, `eventdate`, `color`, `number_of_pictures`, `confirmed`) VALUES
(29, 1, 'Goudgerande mestkever', 'Goudgerande mestkever in de Zambeziwoestijn', '2014-02-06', '2014-02-28', 'color', 1098093835, 'yes'),
(30, 1, 'Mini giraffe', 'Mini giraffe in Kenia', '2014-02-23', '2014-04-30', 'black-white', 109002, 'yes'),
(31, 26, 'Witte haai', 'Witte haai in Zuid-Afrika', '2014-02-22', '2014-02-26', 'black-white', 108575, 'yes'),
(32, 26, 'Krokodil', 'Krokodil in Namibie', '2014-02-18', '2014-02-24', 'color', 10099, 'yes'),
(33, 27, 'Gorilla ', 'Gorilla in Oeganda', '2014-02-14', '2014-02-27', 'color', 100909, 'yes'),
(34, 27, 'Zeebaars', 'Zeebaars voor de kust van Madagascar', '2014-02-13', '2014-02-27', 'black-white', 1098908, 'yes'),
(35, 28, 'Flamingo', 'Flamingo in Florida', '2014-02-14', '2014-02-28', 'black-white', 107987, 'yes'),
(36, 28, 'Schildpad', 'Schildpad in Ethiopie', '2014-02-14', '2014-02-26', 'black-white', 10987789, 'yes');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `photo`
--

CREATE TABLE IF NOT EXISTS `photo` (
  `photo_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(10) unsigned NOT NULL,
  `photo_name` varchar(100) NOT NULL,
  `photo_text` text NOT NULL,
  PRIMARY KEY (`photo_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Gegevens worden uitgevoerd voor tabel `photo`
--

INSERT INTO `photo` (`photo_id`, `order_id`, `photo_name`, `photo_text`) VALUES
(1, 30, 'LapGiraffe_thumb.jpg', 'Zie je wel, de mini giraffe bestaat zeker wel! Dit girafje bewijst het wel degelijk'),
(2, 30, 'Desert.jpg', 'Woestijn\r\n'),
(3, 30, 'tbd_bitmap_0.png', 'Dit zijn letters');

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
(1, 'Arjan', 'de', 'Ruijter', 'Prins Hedrikstraat', '17', 'Den Haag', '1901CB', 'Nederland', '0123456789', '9876543210'),
(10, 'Arjan', 'de', 'Ruijter', 'Prins Hendrikstraat', '12', 'Castricum', '1901CB', 'Noord-Holland', '3125167420', '3125167420'),
(11, 'Arjan', 'de', 'Ruijter', 'Prins Hendrikstraat', '34', 'Castricum', '1901CB', 'Noord-Holland', '3125167420', '3125167420'),
(12, 'Arjan', 'de', 'Ruijter', 'Prins Hendrikstraat', '12', 'Castricum', '1901CB', 'Noord-Holland', '3125167420', '3125167420'),
(13, 'Arjan', 'de', 'Ruijter', 'Prins Hendrikstraat', '89', 'Castricum', '1901CB', 'Noord-Holland', '3125167420', '3125167420'),
(14, 'Arjan', 'de', 'Ruijter', 'Prins Hendrikstraat', '436', 'Castricum', '1901CB', 'Noord-Holland', '3125167420', '3125167420'),
(15, 'Arjan', 'de', 'Ruijter', 'Prins Hendrikstraat', '45', 'Castricum', '1901CB', 'Noord-Holland', '3125167420', '3125167420'),
(16, 'Arjan', 'de', 'Ruijter', 'Prins Hendrikstraat', '567', 'Castricum', '1901CB', 'Noord-Holland', '3125167420', '3125167420'),
(17, 'Arjan', 'de', 'Ruijter', 'Prins Hendrikstraat', '9393', 'Castricum', '1901CB', 'Noord-Holland', '3125167420', '3125167420'),
(18, 'Arjan', 'de', 'Ruijter', 'Prins Hendrikstraat', '5757', 'Castricum', '1901CB', 'Noord-Holland', '3125167420', '3125167420'),
(19, '', '', '', '', '', '', '', '', '', ''),
(20, '', '', '', '', '', '', '', '', '', ''),
(21, 'Arjan', 'de', 'Ruijter', 'Prins Hendrikstraat', '17', 'Castricum', '1901CB', 'Noord-Holland', '3125167420', '3125167420'),
(22, 'Michel', 'van', 'Amersfoort', 'Hoog Catherijne', '1045', 'Utrecht', '1234AB', 'Nederland', '0251234156', '0634912345'),
(23, 'Arjan', 'de', 'Ruijter', 'Prins Hendrikstraat', '167', 'Castricum', '1901CB', 'Noord-Holland', '3125167420', '3125167420'),
(24, 'Arjan', 'de', 'Ruijter', 'Prins Hendrikstraat', '12', 'Den Haag', '1901CB', 'Nederland', '0219192838', '0612345432'),
(25, 'Arjan', 'de', 'Ruijter', 'Prins Hendrikstraat', '12', 'Den Haag', '1901CB', 'Nederland', '0219192838', '0612345432'),
(26, 'Bert', 'de', 'Vries', 'Prins Hendrikstraat', '12', 'Amsterdam', '1902CB', 'Nederland', '2038423094', '0354098098'),
(27, 'Lea', 'van', 'Bennekom', 'Prins Hendrikstraat', '34', 'Den Haag', '1901CB', 'Nederland', '34534879', '93843937'),
(28, 'Jan', 'de', 'Lange', 'Prins Hendrikstraat', '23', 'Den Haag', '1901CB', 'Nederland', '342342809', '238924099');

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
