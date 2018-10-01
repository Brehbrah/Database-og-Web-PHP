-- Eksamen 6065 Databaser og web vår 2014.

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

DROP TABLE IF EXISTS alternative;
DROP TABLE IF EXISTS question;
DROP TABLE IF EXISTS test;

-- --------------------------------------------------------

-- Tabellstruktur for tabell test.

CREATE TABLE test
(
  tid     INTEGER,
  title   VARCHAR(100),
  PRIMARY KEY (tid)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Eksempeldata for tabell test.

INSERT INTO test(tid, title) VALUES
  (1, 'Test 1: Introduksjon til SQL');

-- --------------------------------------------------------

-- Tabellstruktur for tabell question.

CREATE TABLE question
(
  tid     INTEGER,
  qid     INTEGER,
  qtext   VARCHAR(200),
  PRIMARY KEY (tid, qid),
  FOREIGN KEY (tid) REFERENCES test(tid)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Eksempeldata for tabell question.

INSERT INTO question(tid, qid, qtext) VALUES
  (1, 1, 'Hva inneholder WHERE-delen av en SELECT-spørring?'),
  (1, 2, 'AND, OR og NOT er eksempler på ... ?'),
  (1, 3, 'Følgende tekster passer ikke med (matcher) mønsteret ''ab_c%''.');

-- --------------------------------------------------------

-- Tabellstruktur for tabell alternative.

CREATE TABLE alternative
(
  tid     INTEGER,
  qid     INTEGER,
  aid     CHAR(1),
  atext   VARCHAR(200),
  correct BOOL,
  PRIMARY KEY (tid, qid, aid),
  FOREIGN KEY (tid, qid) REFERENCES question(tid, qid)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Eksempeldata for tabell alternative.

INSERT INTO alternative(tid, qid, aid, atext, correct) VALUES
  (1, 1, 'a', 'Navn på tabellene som spørringene skal hente data fra.', false),
  (1, 1, 'b', 'En betingelse som definerer hvilke rader som skal med i resultatet.', true),
  (1, 1, 'c', 'En liste med kolonnenavn.', false),
  (1, 1, 'd', 'Verdier som blir satt inn som nye rader i en tabell.', false),
  (1, 2, 'a', 'aritmetisk operatorer', false),
  (1, 2, 'b', 'logiske operatorer', true),
  (1, 2, 'c', 'funksjoner', false),
  (1, 2, 'd', 'literaler', false),
  (1, 3, 'a', 'abcdef', true),
  (1, 3, 'b', 'ab_cdef', false),
  (1, 3, 'c', 'abxc', false),
  (1, 3, 'd', 'abxcd', false);

-- --------------------------------------------------------

COMMIT;
