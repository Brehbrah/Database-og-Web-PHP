-- Eksamen 6065 Databaser og web vår 2013.

-- Skript for å generere eksempeldatabasen i MySQL.
-- Skriptet kan kjøres flere ganger.

-- --------------------------------------------------------

-- Opprett og bruk databasen eksamen

DROP DATABASE IF EXISTS `eksamen`;

CREATE DATABASE `eksamen`
  CHARACTER SET utf8
  COLLATE utf8_general_ci;

USE `eksamen`;

-- Man kan alternativt opprette databasen med phpMyAdmin,
-- og så kun kjøre kommandoene som lager tabeller under.

-- --------------------------------------------------------

-- Slett tabeller. Kan brukes for å bygge tabellene på
-- nytt uten å slette hele databasen.

DROP TABLE IF EXISTS melding;
DROP TABLE IF EXISTS venn;
DROP TABLE IF EXISTS bruker;

-- --------------------------------------------------------

-- Tabellstruktur for tabell `bruker`
-- Merk at passord blir kryptert (UPDATE-setningen).

CREATE TABLE IF NOT EXISTS `bruker` (
  `bnr`      INT NOT NULL AUTO_INCREMENT,
  `epost`    VARCHAR(100),
  `passord`  VARCHAR(50),
  PRIMARY KEY (`bnr`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Eksempeldata for tabell `kjoretoy`
-- Oppretter brukere med bnr 1 til 6!

INSERT INTO `bruker` (`epost`, `passord`) VALUES ('per@xyz.no',   'rep');
INSERT INTO `bruker` (`epost`, `passord`) VALUES ('lise@xyz.no',  'esil');
INSERT INTO `bruker` (`epost`, `passord`) VALUES ('johan@xyz.no', 'nahoj');
INSERT INTO `bruker` (`epost`, `passord`) VALUES ('kari@xyz.no',  'irak');
INSERT INTO `bruker` (`epost`, `passord`) VALUES ('ola@xyz.no',   'alo');
INSERT INTO `bruker` (`epost`, `passord`) VALUES ('åse@xyz.no',   'eså');

UPDATE bruker SET passord = PASSWORD(passord);

-- --------------------------------------------------------

-- Tabellstruktur for tabell `venn`

CREATE TABLE IF NOT EXISTS `venn` (
  `bnr1`      INT NOT NULL,
  `bnr2`      INT NOT NULL,
  `fra_dato`  DATE,
  `bekreftet` CHAR(1),
  PRIMARY KEY (`bnr1`, `bnr2`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Eksempeldata for tabell `venn`

INSERT INTO `venn` (`bnr1`, `bnr2`, `fra_dato`, `bekreftet`) VALUES (1, 4, '2013-05-07', 'J');
INSERT INTO `venn` (`bnr1`, `bnr2`, `fra_dato`, `bekreftet`) VALUES (1, 5, '2013-05-09', 'J');
INSERT INTO `venn` (`bnr1`, `bnr2`, `fra_dato`, `bekreftet`) VALUES (4, 2, '2013-05-12', 'N');
INSERT INTO `venn` (`bnr1`, `bnr2`, `fra_dato`, `bekreftet`) VALUES (5, 6, '2013-05-13', 'N');

-- --------------------------------------------------------

-- Tabellstruktur for tabell `melding`

CREATE TABLE IF NOT EXISTS `melding` (
  `mnr`    INT NOT NULL AUTO_INCREMENT,
  `bnr`    INT,
  `dato`   DATE,
  `tittel` VARCHAR(50),
  `tekst`  VARCHAR(255),
  PRIMARY KEY (`mnr`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Eksempeldata for tabell `person_i_ulykke`

INSERT INTO `melding` (`bnr`, `dato`, `tittel`, `tekst`)
VALUES (3, '2013-05-11', 'Muffins', 'Har bakt veldig lekre muffins.');
INSERT INTO `melding` (`bnr`, `dato`, `tittel`, `tekst`)
VALUES (1, '2013-05-13', 'Trim', 'Har nettopp sprunget 15 km veldig raskt.');
INSERT INTO `melding` (`bnr`, `dato`, `tittel`, `tekst`)
VALUES (4, '2013-05-17', 'Fest', 'Har vært på fest med de aller kuleste folka.');

-- --------------------------------------------------------

-- Fremmednøkler

ALTER TABLE `venn`
  ADD CONSTRAINT `venn_bruker_fk1` FOREIGN KEY (`bnr1`) REFERENCES `bruker`(`bnr`),
  ADD CONSTRAINT `venn_bruker_fk2` FOREIGN KEY (`bnr2`) REFERENCES `bruker`(`bnr`);
  
ALTER TABLE `melding`
  ADD CONSTRAINT `melding_bruker_fk` FOREIGN KEY (`bnr`) REFERENCES `bruker`(`bnr`);

-- --------------------------------------------------------
