-- Eksamen 6065 Database og web 2018 høst.
-- Skript for å generere eksempeldatabasen.
-- Det fungerer ikke å importere direkte fra phpmyadmin. Du er nødt til å kopiere hele skriptet på SQL'en for å kjøre gjennom skriptet

DROP TABLE IF EXISTS ProduktIReise;
DROP TABLE IF EXISTS Reise;
DROP TABLE IF EXISTS Pris;
DROP TABLE IF EXISTS Produkt;

CREATE TABLE Produkt
(
  pnr       INTEGER AUTO_INCREMENT,
  ptype     VARCHAR(20),
  navn      VARCHAR(100),
  adr       VARCHAR(100),
  postnr    CHAR(4),
  tlf       VARCHAR(10),
  PRIMARY KEY (pnr)
);

CREATE TABLE Pris
(
  pnr       INTEGER,
  mnd       INTEGER,
  pris      INTEGER,
  PRIMARY KEY (pnr, mnd),
  FOREIGN KEY (pnr) REFERENCES Produkt (pnr)
);

CREATE TABLE Reise
(
  rnr        INTEGER,
  rnavn      VARCHAR(100),     
  PRIMARY KEY (rnr)
);

CREATE TABLE ProduktIReise
(
  rnr       INTEGER,
  pnr       INTEGER,
  antall    INTEGER,
  PRIMARY KEY (rnr, pnr),
  FOREIGN KEY (rnr) REFERENCES Reise (rnr),
  FOREIGN KEY (pnr) REFERENCES Produkt (pnr)
);


-- Eksempeldata

INSERT INTO
  Produkt(pnr, ptype, navn, adr, postnr, tlf)
VALUES
  (1, 'Hotell', 'Bø Hotell', 'Gullbringvegen 32', '3800', '35950111'),
  (2, 'Hotell', 'Vinje Turisthotell', 'Åmot', '3890', '35071300'),
  (3, 'Museum', 'Heddal bygdemuseum', 'Bekkhusvegen 21', '3670', '35020840');

-- Legger kun inn for januar og juli.
INSERT INTO
  Pris(pnr, mnd,pris)
VALUES 
  (1, 1, 600),
  (1, 7, 900),
  (2, 1, 600),
  (2, 7, 600),
  (3, 1, 40),
  (3, 7, 40);

INSERT INTO
  Reise(rnr, rnavn)
VALUES 
  (1, 'Vinje sommer 4 dager');

INSERT INTO 
  ProduktIReise(rnr, pnr, antall)
VALUES 
  (1, 1, 1),
  (1, 2, 2),
  (1, 3, 1);
