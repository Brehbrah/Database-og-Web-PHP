-- Eksamen 6065 Databaser og web vår 2017.

-- Skript for å generere eksempeldatabasen i MySQL.
-- Skriptet kan kjøres flere ganger.

-- --------------------------------------------------------

-- Opprett og bruk databasen eksamen.

DROP DATABASE IF EXISTS eksamen;

CREATE DATABASE eksamen
  CHARACTER SET utf8
  COLLATE utf8_general_ci;

USE eksamen;

-- Man kan alternativt opprette databasen med phpMyAdmin,
-- og så kun kjøre kommandoene som lager tabeller under.

-- --------------------------------------------------------

-- Slett tabeller. Kan brukes for å bygge tabellene på
-- nytt uten å slette hele databasen med DROP DATABASE.

DROP TABLE IF EXISTS Strekning;
DROP TABLE IF EXISTS Reise;
DROP TABLE IF EXISTS Ansatt;
DROP TABLE IF EXISTS Transportmiddel;

-- --------------------------------------------------------

-- Tabellstruktur for tabell Transportmiddel.

CREATE TABLE Transportmiddel
(
  TNr    INTEGER,
  Navn   VARCHAR(50),
  KmPris DECIMAL(8, 2),
  PRIMARY KEY (TNr)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Eksempeldata for tabell Transportmiddel.

INSERT INTO Transportmiddel(TNr, Navn, KmPris) VALUES
  (1, 'Tog', 2.50),
  (2, 'Bil', 3.50),
  (3, 'Fly', 3.00);

-- --------------------------------------------------------

-- Tabellstruktur for tabell Ansatt.

CREATE TABLE Ansatt
(
  ANr       INTEGER,
  Fornavn   VARCHAR(50),
  Etternavn VARCHAR(50),
  Stilling  VARCHAR(50),
  Leder     INTEGER,
  PRIMARY KEY (ANr),
  FOREIGN KEY (Leder) REFERENCES Ansatt(ANr)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Eksempeldata for tabell Ansatt.

INSERT INTO Ansatt(ANr, Fornavn, Etternavn, Stilling, Leder) VALUES
  (1, 'Ola',    'Monsen', 'Selger',    NULL),
  (2, 'Kari',   'Jensen', 'Direktør',  NULL),
  (3, 'Lise',   'Li',     'Sekretær',  NULL),
  (4, 'Anders', 'Mo',     'Salgssjef', NULL),
  (5, 'Jonny',  'Li',     'Selger',    NULL);

UPDATE Ansatt SET Leder=4 WHERE ANr=1 OR ANr=5;
UPDATE Ansatt SET Leder=2 WHERE ANr=3 OR ANr=4;

-- --------------------------------------------------------

-- Tabellstruktur for tabell Reise.

CREATE TABLE Reise
(
  RNr          INTEGER AUTO_INCREMENT,
  Beskrivelse  VARCHAR(100),
  FraDato      DATE,
  TilDato      DATE,
  ANr          INTEGER,
  Godkjent     BOOLEAN,
  PRIMARY KEY (RNr),
  FOREIGN KEY (ANr) REFERENCES Ansatt(ANr)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Eksempeldata for tabell Reise.

-- Bruker eksplisitte tall for kolonne RNr selv om den er autonummerert,
-- for at koblingen til rader i tabell Strekning skal være tydelig.

INSERT INTO Reise(RNr, Beskrivelse, FraDato, TilDato, ANr, Godkjent) VALUES
  (1, 'Konferanse i Paris', '2017-04-02',  '2017-04-07',   1, FALSE),
  (2, 'Kundemøte',          '2017-04-04',  '2017-04-04',   4, FALSE),
  (3, 'Kurs i Uddevalla',   '2017-04-04',  '2017-04-06',   3, FALSE);

-- --------------------------------------------------------
-- Tabellstruktur for tabell Strekning.

CREATE TABLE Strekning
(
  RNr        INTEGER,
  SNr        INTEGER,
  TNr        INTEGER,
  AntKm      INTEGER,
  PRIMARY KEY (RNr, SNr),
  FOREIGN KEY (RNr) REFERENCES Reise(RNr),
  FOREIGN KEY (TNr) REFERENCES Transportmiddel(TNr)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Eksempeldata for tabell Leieforhold.

INSERT INTO Strekning(RNr, SNr, TNr, AntKm) VALUES
  (1, 1, 2, 48),
  (1, 2, 3, 1351),
  (1, 3, 1, 23),
  (1, 4, 1, 23),
  (1, 5, 3, 1351),
  (1, 6, 2, 48),
  (2, 1, 2, 13),
  (3, 1, 2, 27),
  (3, 2, 3, 172),
  (3, 3, 3, 172),
  (3, 4, 2, 27);

-- --------------------------------------------------------
