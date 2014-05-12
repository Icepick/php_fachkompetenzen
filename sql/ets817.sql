-- phpMyAdmin SQL Dump
-- version 3.1.5
-- http://www.phpmyadmin.net
--
-- Host: 10.0.254.77
-- Erstellungszeit: 07. Mai 2014 um 08:41
-- Server Version: 5.5.27
-- PHP-Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `ets817`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `institut`
--

CREATE TABLE IF NOT EXISTS `institut` (
  `name` varchar(4) NOT NULL,
  `ID` int(2) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Daten für Tabelle `institut`
--

INSERT INTO `institut` (`name`, `ID`) VALUES
('IMP', 1),
('IKT', 2),
('SII', 3);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `kategorie`
--

CREATE TABLE IF NOT EXISTS `kategorie` (
  `ID` int(2) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Daten für Tabelle `kategorie`
--

INSERT INTO `kategorie` (`ID`, `name`) VALUES
(1, 'Crossmedia'),
(2, 'Markenführung'),
(3, 'Medienorganisationsforschung'),
(4, 'Datenvisualisierung'),
(5, 'Interaktives Storytelling'),
(6, 'Corporate Communication'),
(7, 'Sprachcoaching'),
(8, 'Information Retrieval'),
(9, 'Visuelle Kommunikation'),
(10, 'Videojournalismus'),
(11, 'Medienrecht'),
(12, 'Verwaltungsrecht'),
(13, 'Radioproduktion'),
(14, 'Werbeproduktion'),
(15, 'Rockgeschichte'),
(16, 'Web Engineering'),
(17, 'Mediennutzung'),
(18, 'Eventkommunikation'),
(19, 'Schreibcoaching');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `mitarbeiter`
--

CREATE TABLE IF NOT EXISTS `mitarbeiter` (
  `ID` int(3) NOT NULL AUTO_INCREMENT,
  `vorname` varchar(22) NOT NULL,
  `name` varchar(22) NOT NULL,
  `mailadresse` varchar(35) NOT NULL,
  `link` varchar(35) NOT NULL,
  `institutsID` int(2) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `institutsID` (`institutsID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Daten für Tabelle `mitarbeiter`
--

INSERT INTO `mitarbeiter` (`ID`, `vorname`, `name`, `mailadresse`, `link`, `institutsID`) VALUES
(13, 'Ruedi Alexander', 'Müller-Beyeler', 'ruedi.mueller@htwchur.ch', 'http://goo.gl/pQEkFC', 1),
(14, 'Isabelle', 'Bentz', 'isabelle.bentz@htwchur.ch', 'http://goo.gl/6YYKPv', 1),
(16, 'Martin', 'Arnet', 'martin.arnet@htwchur.ch', 'http://goo.gl/jHSAew', 1),
(17, 'Heiner', 'Butz', 'heiner.butz@htwchur.ch', 'http://goo.gl/cmtp9R', 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `spezifikation`
--

CREATE TABLE IF NOT EXISTS `spezifikation` (
  `ID` int(2) NOT NULL AUTO_INCREMENT,
  `spezname` varchar(256) NOT NULL,
  `kategorienID` int(2) DEFAULT NULL,
  `mitarbeiterID` int(2) DEFAULT NULL,
  UNIQUE KEY `ID` (`ID`),
  KEY `kategorienID` (`kategorienID`),
  KEY `mitarbeiterID` (`mitarbeiterID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Daten für Tabelle `spezifikation`
--

INSERT INTO `spezifikation` (`ID`, `spezname`, `kategorienID`, `mitarbeiterID`) VALUES
(1, 'HTML', 4, 16),
(4, 'Chinesisch', 12, 14),
(5, 'Eventplanung', 3, 13),
(8, 'CSS', 16, 17),
(9, 'SQL', 16, 17),
(10, 'PHP', 16, 17);

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `mitarbeiter`
--
ALTER TABLE `mitarbeiter`
  ADD CONSTRAINT `mitarbeiter_ibfk_1` FOREIGN KEY (`institutsID`) REFERENCES `institut` (`ID`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints der Tabelle `spezifikation`
--
ALTER TABLE `spezifikation`
  ADD CONSTRAINT `spezifikation_ibfk_1` FOREIGN KEY (`kategorienID`) REFERENCES `kategorie` (`ID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `spezifikation_ibfk_2` FOREIGN KEY (`mitarbeiterID`) REFERENCES `mitarbeiter` (`ID`) ON DELETE SET NULL ON UPDATE CASCADE;
