DROP TABLE IF EXISTS vare;

CREATE TABLE IF NOT EXISTS vare (
  varekode char(5) NOT NULL,
  betegnelse char(30) NOT NULL,
  pris_pr_enhet decimal(8,2) NOT NULL DEFAULT '0.00',
  lager_antall int(11) NOT NULL,
  PRIMARY KEY (varekode)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO vare (varekode, betegnelse, pris_pr_enhet, lager_antall) 
VALUES('10820', 'Dukkehår, hvitt', '46.00', 106),
VALUES('10822', 'Dukkehår, lys brunt', '46.00', 0),
VALUES('10830', 'Nisseskjegg, 30 cm', '57.00', 42),
VALUES('10835', 'Trollhår, hvitt', '83.00', 0),
VALUES('10854', 'Bomullsgarn, grått', '39.00', 0),
VALUES('11630', 'Skinnsnor, natur', '46.00', 0),
VALUES('12054', 'Hengebjørk', '358.00', 0),
VALUES('12055', 'Røsslyng', '238.00', 0);

