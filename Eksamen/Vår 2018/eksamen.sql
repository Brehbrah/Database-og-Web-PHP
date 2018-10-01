-- SQL-skript til oppgave 1

DROP TABLE IF EXISTS Resultat;
DROP TABLE IF EXISTS Runde;
DROP TABLE IF EXISTS Spiller;
DROP TABLE IF EXISTS Hull;
DROP TABLE IF EXISTS Bane;

CREATE TABLE Bane
(
  BaneNr INTEGER AUTO_INCREMENT,
  Navn   VARCHAR(100),
  PRIMARY KEY (BaneNr)
);

CREATE TABLE Hull
(
  BaneNr        INTEGER,
  HullNr        INTEGER,
  AntallSlagPar INTEGER,
  AntallMeter   INTEGER,
  PRIMARY KEY (BaneNr, HullNr),
  FOREIGN KEY (BaneNr) REFERENCES Bane (BaneNr)
);

CREATE TABLE Spiller
(
  SpillerNr INTEGER,
  Fornavn   VARCHAR(50),
  Etternavn VARCHAR(50), 
  Tlf       VARCHAR(20),
  PRIMARY KEY (SpillerNr)
);

CREATE TABLE Runde
(
  RundeNr INTEGER AUTO_INCREMENT,
  BaneNr  INTEGER,
  Dato    DATE,
  PRIMARY KEY (RundeNr),
  FOREIGN KEY (BaneNr) REFERENCES Bane (BaneNr)
);

CREATE TABLE Resultat
(
  SpillerNr INTEGER,
  RundeNr   INTEGER,
  HullNr INTEGER,
  AntallSlag INTEGER,
  PRIMARY KEY (SpillerNr, RundeNr, HullNr),
  FOREIGN KEY (SpillerNr) REFERENCES Spiller (SpillerNr),
  FOREIGN KEY (RundeNr) REFERENCES Runde (RundeNr)
);


INSERT INTO
  Bane(BaneNr, Navn)
VALUES
  (1, 'Norsjø'),
  (2, 'Stavern'),
  (3, 'Bogstad');

INSERT INTO
  Hull(BaneNr, HullNr, AntallSlagPar, AntallMeter)
VALUES
  (1,   1, 3, 207),
  (1,   2, 5, 477),
  (1,   3, 4, 396),
  (1,   4, 4, 372),
  (1,   5, 3, 329),
  (1,   6, 5, 465),
  (1,   7, 3, 281),
  (1,   8, 3, 297),
  (1,   9, 4, 355),
  (1,  10, 3, 333),
  (1,  11, 4, 401),
  (1,  12, 4, 367),
  (1,  13, 5, 439),
  (1,  14, 3, 301),
  (1,  15, 3, 265),
  (1,  16, 3, 299),
  (1,  17, 4, 309),
  (1,  18, 5, 398),
  (2,   1, 3, 217),
  (2,   2, 5, 445),
  (2,   3, 3, 326),
  (2,   4, 3, 302),
  (2,   5, 5, 429),
  (2,   6, 4, 415),
  (2,   7, 3, 271),
  (2,   8, 3, 303),
  (2,   9, 4, 354),
  (2,  10, 4, 409),
  (2,  11, 4, 412),
  (2,  12, 5, 467),
  (2,  13, 3, 239),
  (2,  14, 3, 341),
  (2,  15, 3, 295),
  (2,  16, 4, 379),
  (2,  17, 4, 339),
  (2,  18, 5, 428),
  (3,   1, 3, 217),
  (3,   2, 3, 347),
  (3,   3, 3, 296),
  (3,   4, 4, 378),
  (3,   5, 4, 349),
  (3,   6, 5, 435),
  (3,   7, 3, 282),
  (3,   8, 3, 291),
  (3,   9, 4, 325),
  (3,  10, 4, 303),
  (3,  11, 5, 431),
  (3,  12, 5, 469),
  (3,  13, 4, 339),
  (3,  14, 3, 241),
  (3,  15, 3, 265),
  (3,  16, 4, 329),
  (3,  17, 3, 292),
  (3,  18, 5, 458);

INSERT INTO
  Spiller(SpillerNr, Fornavn, Etternavn, Tlf)
VALUES
  (1, 'Peder', 'Aas',   '+47 321 54 876'),
  (2, 'Kari',  'Moan',  '+47 888 77 666'),
  (3, 'Ane',   'Liane', '+47 123 45 678');

INSERT INTO
  Runde(RundeNr, BaneNr, Dato)
VALUES
  (1, 1, '2018-05-14'),
  (2, 1, '2018-05-14'),
  (3, 2, '2018-05-15'),
  (4, 3, '2018-05-15'),
  (5, 3, '2018-05-15'),
  (6, 3, '2018-05-16');

-- Kun resultatene fra runde 1 (med 1 spiller) er registrert.
INSERT INTO
  Resultat(SpillerNr, RundeNr, HullNr, AntallSlag)
VALUES
  (1, 1,  1, 5),
  (1, 1,  2, 8),
  (1, 1,  3, 6),
  (1, 1,  4, 4),
  (1, 1,  5, 1),
  (1, 1,  6, 9),
  (1, 1,  7, 5),
  (1, 1,  8, 5),
  (1, 1,  9, 6),
  (1, 1, 10, 5),
  (1, 1, 11, 4),
  (1, 1, 12, 5),
  (1, 1, 13, 7),
  (1, 1, 14, 3),
  (1, 1, 15, 2),
  (1, 1, 16, 5),
  (1, 1, 17, 6),
  (1, 1, 18, 5);


-- Visning (view) til hjelp for å løse oppgave 1-b.

DROP VIEW IF EXISTS Spillerslag;

CREATE VIEW
  Spillerslag
AS
  SELECT SpillerNr, Hull.BaneNr, Hull.HullNr, Hull.AntallSlagPar, Resultat.AntallSlag
  FROM Resultat, Runde, Hull
  WHERE Resultat.RundeNr = Runde.RundeNr
  AND Runde.BaneNr = Hull.BaneNr
  AND Resultat.HullNr = Hull.HullNr;
