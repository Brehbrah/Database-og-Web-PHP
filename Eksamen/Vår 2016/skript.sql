-- Eksamen 6065 Databaser og web vår 2016.

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

DROP TABLE IF EXISTS Leieforhold;
DROP TABLE IF EXISTS UtleieObjekt;
DROP TABLE IF EXISTS Bruker;
DROP TABLE IF EXISTS Kategori;

-- --------------------------------------------------------

-- Tabellstruktur for tabell Kategori.

CREATE TABLE Kategori
(
  KatNr INTEGER,
  Navn  VARCHAR(50),
  PRIMARY KEY (KatNr)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Eksempeldata for tabell Kategori.

INSERT INTO Kategori(KatNr, Navn) VALUES
  (1, 'Hageredskaper'),
  (2, 'Verktøy'),
  (3, 'Sportsutstyr');

-- --------------------------------------------------------

-- Tabellstruktur for tabell Bruker.

CREATE TABLE Bruker
(
  Epost     VARCHAR(100),
  Fornavn   VARCHAR(50),
  Etternavn VARCHAR(50),
  Poengsum  INTEGER,
  PRIMARY KEY (Epost)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Eksempeldata for tabell Bruker.

INSERT INTO Bruker(Epost, Fornavn, Etternavn, Poengsum) VALUES
  ('ola@outlook.com',  'Ola',    'Monsen', NULL),
  ('kari@gmail.com',   'Kari',   'Jensen', NULL),
  ('lise@xyz.no',      'Lise',   'Li',     NULL),
  ('anders@gmail.com', 'Anders', 'Mo',     NULL),
  ('jonny@li.no',      'Jonny',  'Li',     NULL);

-- --------------------------------------------------------

-- Tabellstruktur for tabell UtleieObjekt.

CREATE TABLE UtleieObjekt
(
  ObjNr        INTEGER AUTO_INCREMENT,
  Beskrivelse  VARCHAR(100),
  EierEpost    VARCHAR(100),
  KatNr        INTEGER,
  DagPris      DECIMAL(8, 2),
  PRIMARY KEY (ObjNr),
  FOREIGN KEY (EierEpost) REFERENCES Bruker(Epost),
  FOREIGN KEY (KatNr) REFERENCES Kategori(KatNr)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Eksempeldata for tabell UtleieObjekt.

INSERT INTO UtleieObjekt(Beskrivelse, EierEpost, KatNr, DagPris) VALUES
  ('Gressklipper', 'ola@outlook.com',  1,   80.00),
  ('Snøfreser',    'kari@gmail.com',   1,  110.00),
  ('Pressluftbor', 'lise@xyz.no',      2,   50.00),
  ('Symaskin',     'ola@outlook.com',  2,   80.00),
  ('Slalomski',    'kari@gmail.com',   3,   60.00);

-- --------------------------------------------------------
-- Tabellstruktur for tabell Leieforhold.

CREATE TABLE Leieforhold
(
  LNr        INTEGER AUTO_INCREMENT,
  ObjNr      INTEGER,
  LeierEpost VARCHAR(100),
  FraDato    DATE,
  TilDato    DATE,
  Poengsum   INTEGER,
  PRIMARY KEY (LNr),
  FOREIGN KEY (ObjNr) REFERENCES UtleieObjekt(ObjNr),
  FOREIGN KEY (LeierEpost) REFERENCES Bruker(Epost)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Eksempeldata for tabell Leieforhold.

INSERT INTO Leieforhold(ObjNr, LeierEpost, FraDato, TilDato, Poengsum) VALUES
  (4, 'lise@xyz.no',      '2016-03-16', '2016-03-19', 8),
  (2, 'anders@gmail.com', '2016-03-17', '2016-03-22', 5),
  (5, 'jonny@li.no',      '2016-03-21', '2016-03-27', 7),
  (2, 'lise@xyz.no',      '2016-04-15', '2016-04-16', 9),
  (1, 'anders@gmail.com', '2016-06-06', '2016-06-09', 2),
  (3, 'jonny@li.no',      '2016-06-11', '2016-06-16', 6);

-- --------------------------------------------------------
