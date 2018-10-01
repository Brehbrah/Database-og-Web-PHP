-- Eksamen 6065 Databaser og web vår 2012.
-- Skript for å generere eksempeldatabase i MySQL.
-- Skriptet kan kjøres flere ganger.

-- --------------------------------------------------------

--
-- Slett og så opprett databasen `politi`

DROP DATABASE IF EXISTS politi;

CREATE DATABASE `politi`
  CHARACTER SET utf8
  COLLATE utf8_general_ci;
    
    
-- Bruk databasen politi

USE `politi`;

-- Man kan eventuelt opprette databasen med phpMyAdmin,
-- og så kun kjøre kommandoene som lager tabeller.


-- --------------------------------------------------------

--
-- Slett tabeller (kan brukes for å bygge tabellene på nytt uten å slette hele databasen)
--

DROP TABLE IF EXISTS person_i_ulykke;
DROP TABLE IF EXISTS ulykke;
DROP TABLE IF EXISTS kjoretoy;
DROP TABLE IF EXISTS person;


-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `kjoretoy`
--

CREATE TABLE IF NOT EXISTS `kjoretoy` (
  `regnr` char(7) NOT NULL DEFAULT '',
  `merke` varchar(20) DEFAULT NULL,
  `modell` varchar(20) DEFAULT NULL,
  `aarsmodell` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`regnr`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dataark for tabell `kjoretoy`
--

INSERT INTO `kjoretoy` (`regnr`, `merke`, `modell`, `aarsmodell`) VALUES ('DA88997', 'Volkswagen', 'Golf', 2003);
INSERT INTO `kjoretoy` (`regnr`, `merke`, `modell`, `aarsmodell`) VALUES ('LY12345', 'Toyota', 'Avensis', 2007);
INSERT INTO `kjoretoy` (`regnr`, `merke`, `modell`, `aarsmodell`) VALUES ('NV33221', 'Ford', 'Focus', 2008);
INSERT INTO `kjoretoy` (`regnr`, `merke`, `modell`, `aarsmodell`) VALUES ('PN41412', 'Ford', 'Focus', 2010);

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `person`
--

CREATE TABLE IF NOT EXISTS `person` (
  `id` int(6) AUTO_INCREMENT NOT NULL,
  `fornavn` varchar(20) DEFAULT NULL,
  `etternavn` varchar(30) DEFAULT NULL,
  `fodselsdato` date DEFAULT NULL,
  `kjonn` char(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dataark for tabell `person`
--

INSERT INTO `person` (`id`, `fornavn`, `etternavn`, `fodselsdato`, `kjonn`) VALUES (1, 'Per', 'Hansen', '1982-04-03', 'M');
INSERT INTO `person` (`id`, `fornavn`, `etternavn`, `fodselsdato`, `kjonn`) VALUES (2, 'Lise', 'Jensen', '1988-07-17', 'K');
INSERT INTO `person` (`id`, `fornavn`, `etternavn`, `fodselsdato`, `kjonn`) VALUES (3, 'Ola', 'Li', '1950-10-23', 'M');
INSERT INTO `person` (`id`, `fornavn`, `etternavn`, `fodselsdato`, `kjonn`) VALUES (4, 'Åse', 'Mo', '1993-09-04', 'K');

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `person_i_ulykke`
--

CREATE TABLE IF NOT EXISTS `person_i_ulykke` (
  `unr` int(6) NOT NULL DEFAULT '0',
  `id` int(6) NOT NULL DEFAULT '0',
  `rolle` varchar(20) DEFAULT NULL,
  `regnr` char(7) DEFAULT '',
  PRIMARY KEY (`unr`,`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dataark for tabell `person_i_ulykke`
--

INSERT INTO `person_i_ulykke` (`unr`, `id`, `rolle`, `regnr`) VALUES (1, 1, 'Sjafør', 'LY12345');
INSERT INTO `person_i_ulykke` (`unr`, `id`, `rolle`, `regnr`) VALUES (1, 2, 'Sjafør', 'PN41412');
INSERT INTO `person_i_ulykke` (`unr`, `id`, `rolle`, `regnr`) VALUES (1, 3, 'Passasjer', 'PN41412');
INSERT INTO `person_i_ulykke` (`unr`, `id`, `rolle`, `regnr`) VALUES (2, 1, 'Sjafør', 'NV33221');
INSERT INTO `person_i_ulykke` (`unr`, `id`, `rolle`, `regnr`) VALUES (3, 2, 'Sjafør', 'DA88997');
INSERT INTO `person_i_ulykke` (`unr`, `id`, `rolle`, `regnr`) VALUES (3, 4, 'Fotgjenger', NULL);

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `ulykke`
--

CREATE TABLE IF NOT EXISTS `ulykke` (
  `unr` int(6) AUTO_INCREMENT NOT NULL,
  `dato` date DEFAULT NULL,
  `vei` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`unr`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dataark for tabell `ulykke`
--

INSERT INTO `ulykke` (`dato`, `vei`) VALUES ('2008-05-08', 'E18');
INSERT INTO `ulykke` (`dato`, `vei`) VALUES ('2010-11-09', 'E134');
INSERT INTO `ulykke` (`dato`, `vei`) VALUES ('2010-01-17', 'E6');
INSERT INTO `ulykke` (`dato`, `vei`) VALUES ('2010-04-08', 'E134');
INSERT INTO `ulykke` (`dato`, `vei`) VALUES ('2010-11-12', 'E134');

-- --------------------------------------------------------


--
-- Begrensninger for dumpede tabeller
--

--
-- Begrensninger for tabell `person_i_ulykke`
--
ALTER TABLE `person_i_ulykke`
  ADD CONSTRAINT `person_i_ulykke_ibfk_1` FOREIGN KEY (`unr`) REFERENCES `ulykke` (`unr`),
  ADD CONSTRAINT `person_i_ulykke_ibfk_2` FOREIGN KEY (`id`) REFERENCES `person` (`id`),
  ADD CONSTRAINT `person_i_ulykke_ibfk_3` FOREIGN KEY (`regnr`) REFERENCES `kjoretoy` (`regnr`);
COMMIT;

-- --------------------------------------------------------
