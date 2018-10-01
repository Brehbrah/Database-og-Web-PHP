-- Eksamen 6065 Databaser og web vår 2015.

-- Skript for å generere eksempeldatabasen i MySQL.
-- Skriptet kan kjøres flere ganger.

-- --------------------------------------------------------

-- Opprett og bruk databasen eksamen

DROP DATABASE IF EXISTS eksamen;

CREATE DATABASE eksamen
  CHARACTER SET utf8
  COLLATE utf8_general_ci;

USE eksamen;

-- Man kan alternativt opprette databasen med phpMyAdmin,
-- og så kun kjøre kommandoene som lager tabeller under.

-- --------------------------------------------------------

-- Slett tabeller. Kan brukes for å bygge tabellene på
-- nytt uten å slette hele databasen.

DROP TABLE IF EXISTS deltakelse;
DROP TABLE IF EXISTS presentasjon;
DROP TABLE IF EXISTS person;
DROP TABLE IF EXISTS rom;

-- --------------------------------------------------------

-- Tabellstruktur for tabell rom.

CREATE TABLE rom
(
  romkode     VARCHAR(10),
  ant_plasser INTEGER,
  PRIMARY KEY (romkode)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Eksempeldata for tabell rom.

INSERT INTO rom(romkode, ant_plasser) VALUES
  ('A-204', 250),
  ('A-205', 110),
  ('B-112', 50);

-- --------------------------------------------------------

-- Tabellstruktur for tabell person.

CREATE TABLE person
(
  epost     VARCHAR(100),
  fornavn   VARCHAR(100),
  etternavn VARCHAR(100),
  PRIMARY KEY (epost)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Eksempeldata for tabell person.

INSERT INTO person(epost, fornavn, etternavn) VALUES
  ('ola@outlook.com', 'Ola', 'Monsen'),
  ('kari@gmail.com', 'Kari', 'Jensen'),
  ('lise@xyz.no', 'Lise', 'Li'),
  ('anders@gmail.com', 'Anders', 'Mo'),
  ('jonny@li.no', 'Jonny', 'Li');

-- --------------------------------------------------------

-- Tabellstruktur for tabell presentasjon.

CREATE TABLE presentasjon
(
  pid     INTEGER AUTO_INCREMENT,
  romkode VARCHAR(10),
  dato    DATE,
  kl_fra  TIME,
  kl_til  TIME,
  epost   VARCHAR(100),
  tittel  VARCHAR(200),
  PRIMARY KEY (pid),
  FOREIGN KEY (romkode) REFERENCES rom(romkode),
  FOREIGN KEY (epost) REFERENCES person(epost)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Eksempeldata for tabell presentasjon.

INSERT INTO presentasjon(romkode, dato, kl_fra, kl_til, epost, tittel) VALUES
  ('A-204', '2015-05-26', '12:00', '12:30', 'ola@outlook.com', 'Innføring i jQuery'),
  ('A-205', '2015-05-26', '12:00', '12:30', 'kari@gmail.com', 'På innsiden av DOM'),
  ('A-205', '2015-05-27', '09:00', '09:30', 'ola@outlook.com', 'Objekter i JavaScript');

-- --------------------------------------------------------
-- Tabellstruktur for tabell deltakelse.

CREATE TABLE deltakelse
(
  pid     INTEGER,
  epost   VARCHAR(100),
  PRIMARY KEY (pid, epost),
  FOREIGN KEY (pid) REFERENCES presentasjon(pid),
  FOREIGN KEY (epost) REFERENCES person(epost)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Eksempeldata for tabell deltakelse.

INSERT INTO deltakelse(pid, epost) VALUES
  (1, 'lise@xyz.no'),
  (1, 'kari@gmail.com'),
  (2, 'jonny@li.no'),
  (3, 'lise@xyz.no'),
  (3, 'jonny@li.no');

-- --------------------------------------------------------

COMMIT;
