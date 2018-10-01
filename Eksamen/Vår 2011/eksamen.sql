-- 6065 Databaser og web, eksamen vår 2011


-- Tabelldefinisjoner
-- Kun for testing, IKKE en del av besvarelsen

Drop Table ProduktIReise;
Drop Table Reise;
Drop Table Pris;
Drop Table Produkt;

Create Table Produkt
(
  pnr       Number,
  ptype     VarChar2(20),
  navn      VarChar2(100),
  adr       VarChar2(100),
  postnr    Char(4),
  tlf       VarChar2(10),
  Constraint ProduktPK Primary Key (pnr)
);

Create Table Pris
(
  pnr       Number,
  mnd       Number,
  pris      Number,
  Constraint PrisPK Primary Key (pnr, mnd),
  Constraint PrisProduktFK Foreign Key (pnr) References Produkt
);

Create Table Reise
(
  rnr        Number,
  rnavn      VarChar2(100),     
  Constraint ReisePK Primary Key (rnr)
);

Create Table ProduktIReise
(
  rnr       Number,
  pnr       Number,
  antall    Number,
  Constraint ProduktIReisePK Primary Key (rnr, pnr),
  Constraint ProduktIReiseReiseFK Foreign Key (rnr) References Reise,
  Constraint ProduktIReiseProduktFK Foreign Key (pnr) References Produkt
);


-- Eksempeldata

Insert Into Produkt(pnr, ptype, navn, adr, postnr, tlf)
Values (2843, 'Hotell', 'Bø Hotell', 'Gullbringvegen 32', '3800', '35950111');

Insert Into Produkt(pnr, ptype, navn, adr, postnr, tlf)
Values (4558, 'Hotell', 'Vinje Turisthotell', 'Åmot', '3890', '35071300');

Insert Into Produkt(pnr, ptype, navn, adr, postnr, tlf)
Values (2854, 'Museum', 'Heddal bygdemuseum', 'Bekkhusvegen 21', '3670', '35020840');

-- Legger kun inn for januar og juli...
Insert Into Pris(pnr, mnd,pris) Values (2843, 1, 600);
Insert Into Pris(pnr, mnd,pris) Values (2843, 7, 900);
Insert Into Pris(pnr, mnd,pris) Values (4558, 1, 600);
Insert Into Pris(pnr, mnd,pris) Values (4558, 7, 600);
Insert Into Pris(pnr, mnd,pris) Values (2854, 1, 40);
Insert Into Pris(pnr, mnd,pris) Values (2854, 7, 40);

Insert Into Reise(rnr, rnavn)
Values (3649, 'Vinje sommer 4 dager');

-- Antar produktene har fått løpenummer 1, 2 og 3...
Insert Into ProduktIReise(rnr, pnr, antall) Values (3649, 2843, 1);
Insert Into ProduktIReise(rnr, pnr, antall) Values (3649, 4558, 2);
Insert Into ProduktIReise(rnr, pnr, antall) Values (3649, 2854, 1);

Commit;
