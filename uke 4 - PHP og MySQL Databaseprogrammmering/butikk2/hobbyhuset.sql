-- SQL-skript som oppretter databasetabeller for nettbutikken.

-- Forutsetter at skriptet blir kjørt fra databasen der
-- tabellene skal opprettes. Alternativt kan man legge
-- til en USE kommando først.


SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;


--
-- Slett tabeller
--
DROP TABLE IF EXISTS Ordrelinje;
DROP TABLE IF EXISTS Ordre;
DROP TABLE IF EXISTS Bruker;
DROP TABLE IF EXISTS Vare;


-- --------------------------------------------------------

--
-- Tabellstruktur for tabell Bruker
--

CREATE TABLE IF NOT EXISTS Bruker (
  BNr int(5) NOT NULL AUTO_INCREMENT,
  Epost varchar(40) UNIQUE NOT NULL,
  Passord varchar(10) DEFAULT NULL,
  Fornavn char(20) NOT NULL,
  Etternavn char(40) NOT NULL,
  ErAnsatt char(1) NOT NULL,
  PRIMARY KEY (BNr)
) ENGINE=InnoDB;

--
-- Dataark for tabell Bruker
--

-- NB! Hopper over autonummerert kolonne BNr.

INSERT INTO Bruker (Epost, Passord, Fornavn, Etternavn, ErAnsatt) VALUES
('pa@xyz.no', 'hemmelig', 'Paal', 'Aass', 1),
('jola@xyz.no', 'ksn23h', 'Joakim', 'Laursen', 1),
('laur88@xyz.no', 'alen6s', 'Laurits', 'Eckhoff', 0),
('aasae@zzz.se', 's7wu2b', 'Åshild', 'Sætran', 0),
('toroe@xyz.no', 'mskw6e', 'Torgrim', 'Østbø', 0),
('malvin2@zzz.se', '2ns6f2', 'Malvin', 'Khan', 0),
('sidselg@xyz.no', 'udh32n', 'Sidsel', 'Gulli', 0),
('katrineeil@xyz.no', 'a229ms', 'Katrine', 'Eilertsen', 0),
('skjalg@zzz.se', 'j2hqq8', 'Skjalg', 'Tengesdal', 0),
('gunniaa@zzz.se', 'k2swwe', 'Gunn Iren', 'Ånestad', 0),
('khalid@zzz.se', 'kaqk82', 'Khalid', 'Rue', 0),
('janns@zzz.se', 'ss2w2w', 'Jann', 'Skjelvik', 0),
('inek@xyz.no', 'bvu8y5', 'Ine', 'Kraft', 0),
('valtergr@xyz.no', 'nwsu88', 'Valter', 'Grimsmo', 0),
('asa@zzz.se', 'wuv23z', 'Alexandra', 'Saleh', 0),
('maje@xyz.no', 'gb39es', 'Maj', 'Elton', 0),
('agnewe@abc.com', 'kskm2n', 'Agnethe', 'Wessel', 0),
('ertr@abc.com', 'kraf55', 'Erland', 'Trøan', 0),
('morlin@xyz.no', 'tr72aa', 'Morten', 'Lindland', 0),
('kajh@xyz.no', 'fe45w2', 'Kaja', 'Høvik', 0),
('thale5@abc.com', 'tre33w', 'Thale', 'Evenrud', 1),
('connie1@xyz.no', 'hnu55d', 'Connie', 'Volden', 0),
('arner@xyz.no', 'ss41aa', 'Arne', 'Reinertsen', 0),
('raje@xyz.no', 'uu6ds9', 'Ranveig', 'Gjertsen', 0),
('mareng@xyz.no', 'gg29sv', 'Mariann', 'Enger', 0),
('asle99@abc.com', 'sd88vx', 'Asle', 'Hornnes', 0),
('olej@xyz.no', 'jhf8s2', 'Ole-Jørgen', 'Molteberg', 0),
('garvik3@abc.com', 'chd63r', 'Aasta', 'Garvik', 0),
('jm12@abc.com', 'xu79dw', 'Jorid', 'Marcussen', 0),
('vaks7@xyz.no', 'ze47wa', 'Aleksandra', 'Vaksdal', 0),
('fatima@xyz.no', 'jgfa42', 'Fatima', 'Hildre', 0),
('emilie@abc.com', 'xrtu45', 'Emilie', 'Fotland', 0),
('ayse@xyz.no', 'zpkw62', 'Ayse', 'Sellevold', 0),
('magstad@xyz.no', 'akm78w', 'Magnhild', 'Helgestad', 1),
('iln@abc.com', 'hob42a', 'Inger-Lise', 'Nerdal', 0),
('mfal@abc.com', 'ykl23s', 'Mustafa', 'Falck', 0),
('furto@abc.com', 'vw88hu', 'Tormod', 'Furset', 0),
('phma@xyz.no', 'nut82a', 'Maren', 'Stephansen', 0),
('sofa@abc.com', 'bv23xw', 'Sol', 'Fauske', 0),
('birny@xyz.no', 'ahq52s', 'Birthe', 'Nydal', 0),
('ole101@xyz.no', 'pji39s', 'Ole', 'Haugom', 0),
('aasafo@xyz.no', 'aav25e', 'Åsa', 'Folgerø', 0),
('sivero@abc.com', 'hcv38v', 'Sivert', 'Ose', 1),
('lisaf@abc.com', 'by42sa', 'Lisa', 'Fjeldstad', 0),
('anneb@abc.com', 'vyf73s', 'Anne-Britt', 'Sneve', 0),
('gjeha@xyz.no', 'sfg77w', 'Gjermund', 'Hansson', 0);

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell Ordre
--

CREATE TABLE IF NOT EXISTS Ordre (
  OrdreNr int(5) NOT NULL AUTO_INCREMENT,
  Ordredato date NOT NULL,
  BNr int(5) DEFAULT NULL,
  PRIMARY KEY (Ordrenr)
) ENGINE=InnoDB;

--
-- Dataark for tabell Ordre
--

-- NB! Hopper over autonummerert kolonne Ordrenr.

INSERT INTO Ordre (Ordredato, BNr) VALUES
('2014-08-20', 4),
('2014-08-20', 31),
('2014-08-20', 35),
('2014-08-20', 11),
('2014-08-20', 27),
('2014-08-20', 7),
('2014-08-21', 33),
('2014-08-21', 29),
('2014-08-21', 31),
('2014-08-21', 2),
('2014-08-21', 21),
('2014-08-21', 37),
('2014-08-22', 5),
('2014-08-22', 16),
('2014-08-22', 24),
('2014-08-22', 1),
('2014-08-22', 10),
('2014-08-22', 28);

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell Ordrelinje
--

CREATE TABLE IF NOT EXISTS Ordrelinje (
  OrdreNr int(5) NOT NULL DEFAULT 0,
  Varekode char(5) NOT NULL DEFAULT '',
  PrisPrEnhet decimal(8,2) NOT NULL DEFAULT 0.00,
  Antall int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (OrdreNr, Varekode)
) ENGINE=InnoDB;

--
-- Dataark for tabell Ordrelinje
--

-- NB! Her vet vi at INSERT-setningene over
-- oppretter OrdreNr fra 1 til 18.
INSERT INTO Ordrelinje (OrdreNr, Varekode, PrisPrEnhet, Antall) VALUES
(1, '10830', '29.90', 1),
(1, '65081', '109.50', 5),
(2, '10830', '29.90', 1),
(2, '21032', '57.60', 3),
(2, '65081', '109.50', 5),
(3, '21032', '57.60', 3),
(3, '37710', '35.40', 2),
(3, '65081', '109.50', 5),
(4, '37710', '35.40', 2),
(4, '65081', '109.50', 5),
(5, '10830', '29.90', 1),
(5, '21032', '57.60', 3),
(5, '37710', '35.40', 2),
(5, '65081', '109.50', 5),
(8, '10830', '29.90', 1),
(8, '65081', '109.50', 5),
(8, '90209', '67.50', 5),
(9, '10830', '29.90', 1),
(9, '65081', '109.50', 5),
(9, '77033', '355.50', 5),
(10, '37710', '35.40', 2),
(10, '65081', '109.50', 5),
(11, '10830', '29.90', 1),
(11, '37710', '35.40', 2),
(11, '65081', '109.50', 5),
(12, '37710', '35.40', 2),
(12, '65081', '109.50', 5),
(13, '10830', '29.90', 1),
(13, '21032', '57.60', 3),
(13, '37710', '35.40', 2),
(13, '64551', '118.00', 2),
(13, '65081', '109.50', 5),
(14, '10830', '29.90', 1),
(14, '21032', '57.60', 3),
(14, '37710', '35.40', 2),
(14, '65081', '109.50', 5),
(16, '10830', '29.90', 1),
(16, '21032', '57.60', 3),
(16, '37710', '35.40', 2),
(16, '82090', '15.90', 1),
(17, '21032', '57.60', 3),
(17, '37710', '35.40', 2),
(17, '65081', '109.50', 5),
(18, '10830', '29.90', 1),
(18, '21032', '57.60', 3);

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell Vare
--

CREATE TABLE IF NOT EXISTS Vare (
  Varekode char(5) NOT NULL DEFAULT '',
  Betegnelse char(30) NOT NULL,
  PrisPrEnhet decimal(8,2) NOT NULL DEFAULT 0.00,
  LagerAntall int(11) NOT NULL,
  ErAktiv char(1) NOT NULL,
  PRIMARY KEY (Varekode)
) ENGINE=InnoDB;

--
-- Dataark for tabell Vare
--

INSERT INTO Vare (Varekode, Betegnelse, PrisPrEnhet, LagerAntall, ErAktiv) VALUES
('10820', 'Dukkehår, hvitt', '46.00', 106, 1),
('10822', 'Dukkehår, lys brunt', '46.00', 0, 1),
('10830', 'Nisseskjegg, 30 cm', '57.00', 42, 1),
('10835', 'Trollhår, hvitt', '83.00', 0, 1),
('10854', 'Bomullsgarn, grått', '39.00', 0, 1),
('11630', 'Skinnsnor, natur', '46.00', 0, 1),
('12054', 'Hengebjørk', '358.00', 0, 1),
('12055', 'Røsslyng', '238.00', 0, 1),
('12056', 'Einer ''Blåmann''', '191.00', 0, 0),
('12088', 'Einer ''Tyrihans''', '215.00', 0, 1),
('12089', 'Gran, standard', '144.00', 0, 1),
('12090', 'Hvitgran', '192.00', 0, 1),
('12091', 'Sølvgran ''Globosa''', '286.00', 0, 1),
('12092', 'Europabarlind', '238.00', 0, 1),
('13001', 'Glasskuler, 100 gr', '38.00', 0, 1),
('15207', 'Antron garn, hvit', '24.00', 21, 1),
('15208', 'Antron garn, gul', '24.00', 65, 1),
('15211', 'Tubeflue verktøy', '209.00', 39, 1),
('15217', 'Kram tørrfluekorker, 5stk', '32.00', 213, 1),
('15559', 'Kakepapir, sølv', '38.00', 0, 1),
('20936', 'Fjær, natur', '25.00', 0, 1),
('20980', 'Naturfjær', '27.00', 0, 1),
('21032', 'Furuspon, 3 cm', '57.00', 240, 1),
('21034', 'Parasoll, 2.5 m, stål', '504.00', 0, 0),
('21037', 'Figurtråd, 50 m', '294.00', 0, 1),
('21510', 'Ispinner, 100 stk', '35.00', 0, 1),
('21514', 'Cocktailpinner, 100 st', '28.00', 0, 1),
('21515', 'Blomsterpinner, 5 stk', '27.00', 0, 1),
('21517', 'Tannpirkere, 100 stk', '16.00', 0, 1),
('21580', 'Sponflis, natur', '13.00', 0, 1),
('22002', 'Fyrstikker, 150gr', '55.00', 460, 1),
('22054', 'Vannkanne, 5 ltr.', '70.00', 24, 1),
('22055', 'Bensinkanne 5 ltr., grønn', '214.00', 110, 1),
('22056', 'Nettingbøtte, plast', '130.00', 6, 1),
('22165', 'Hafa gressklipper G8, bensin', '5400.00', 16, 1),
('22179', 'Hafa gresklipper G9, elektrisk', '1440.00', 24, 1),
('22870', 'Dukkeøyne, 7 mm blå', '21.00', 252, 1),
('25079', 'Trillebår', '334.00', 46, 1),
('25121', 'Hafa elektrisk hekksaks Z3', '418.00', 110, 1),
('25131', 'Juwa Motorsag XY65', '1078.00', 42, 1),
('25136', 'Juwa Anleggspade', '180.00', 6, 1),
('25137', 'Juwa Snøskuffe, standard', '228.00', 30, 1),
('25138', 'Grensaks med sideskjær', '166.00', 2, 1),
('25154', 'Ljå', '276.00', 4, 1),
('32055', 'Juwa Barkespade', '130.00', 0, 1),
('32067', 'Juwa Hagerive, 14 rette tinder', '94.00', 440, 1),
('32069', 'Stikkspade', '154.00', 26, 1),
('32191', 'Formgummi 0.5 l', '402.00', 88, 0),
('32610', 'Gipsform lysestaker', '106.00', 58, 1),
('33044', 'Blandet blomsterfrø', '14.00', 1080, 1),
('33045', 'Blomkarse', '17.00', 1206, 1),
('33046', 'Brudeslør', '15.00', 640, 1),
('33047', 'Rød pelargonium', '16.00', 240, 1),
('35911', 'Meksikansk solsikke', '11.00', 46, 1),
('35912', 'Stemorsblomst', '11.00', 0, 1),
('37710', 'Balkongtomat', '35.00', 0, 1),
('37720', 'Bifftomat', '42.00', 88, 1),
('37725', 'Gul pottetomat', '36.00', 24, 1),
('37730', 'Slangeagurk', '23.00', 52, 1),
('37731', 'Sylteagurk', '30.00', 402, 1),
('37732', 'Rødløk', '27.00', 0, 1),
('41020', 'Hobbyleire terrakotta, 1 kg', '94.00', 58, 1),
('41096', 'Blåleire, 10kg', '115.00', 460, 1),
('41097', 'Rød leire, 10kg', '142.00', 580, 1),
('41098', 'Keramisk leire', '83.00', 834, 1),
('42613', 'Gipsform klovner', '106.00', 210, 0),
('42615', 'Gipsform marihøner', '106.00', 124, 0),
('42626', 'Gipsform fisker m.m.', '141.00', 62, 1),
('42929', 'Pepperkakeformer', '83.00', 38, 1),
('42933', 'Former til leire, stjerner', '69.00', 78, 1),
('42934', 'Former til leire, hjerter', '69.00', 204, 1),
('42939', 'Pepperkakeformer, 15stk', '95.00', 640, 1),
('42941', 'Julesett', '71.00', 1040, 1),
('42945', 'Metallform praliner, 9stk', '81.00', 24, 1),
('43000', 'Startsett papir', '540.00', 134, 1),
('43014', 'Treramme A4', '372.00', 24, 1),
('43015', 'Treramme A5', '288.00', 0, 1),
('44939', 'Hobbymaling, 6 farger', '115.00', 2, 1),
('45101', 'Papirleire, 450 gr', '57.00', 80, 1),
('45105', 'Pappmachepulver', '45.00', 162, 1),
('45923', 'Krukke med føtter, 12cm', '42.00', 604, 1),
('45935', 'Potteskål, diameter 10cm', '19.00', 258, 1),
('46702', 'Terrakottafigur katt', '71.00', 138, 1),
('46706', 'Sparegris terrakotta', '27.00', 176, 0),
('46738', 'Terrakottafat med hjerter', '40.00', 22, 1),
('46741', 'Lyskrukke, 4cm', '10.00', 118, 1),
('46745', 'Terrakottakrukke 20x10cm', '43.00', 24, 1),
('47903', 'HaFa snøfreser Maxi', '11214.00', 6, 1),
('49916', 'Lezlo leire, brun, 150gr.', '25.00', 24, 1),
('49917', 'Lezlo leire, sort, 150 gr.', '25.00', 184, 1),
('49919', 'Lezlo leiresett', '58.00', 42, 1),
('49921', 'Lezlo leire, økonomipakke', '357.00', 164, 1),
('55112', 'HaFa løvblåser AX30', '598.00', 22, 1),
('55129', 'Lek med lakris', '154.00', 64, 1),
('55130', 'Moro med marsipan', '298.00', 140, 1),
('55550', 'Juwa jordfreser mx40', '1558.00', 14, 1),
('58028', 'Cernit dukkeleire lys', '142.00', 44, 1),
('59915', 'Juwa leire grønn, 150 gr.', '25.00', 34, 1),
('64509', 'Kongelilje, 10 stk.', '142.00', 132, 1),
('64510', 'Lilje mercedes, 10 stk.', '154.00', 164, 1),
('64511', 'Lilje sibir, 20 stk.', '227.00', 278, 0),
('64550', 'Småsymre, 10 stk.', '126.00', 58, 1),
('64551', 'Hengebegonia, 10 stk.', '118.00', 206, 1),
('64552', 'Storblomstret begonia, 20 stk.', '276.00', 42, 1),
('65032', 'Hafa gressklipper skyv', '598.00', 34, 1),
('65033', 'Hafa Y15 gresstrimmer', '1044.00', 80, 1),
('65034', 'Hafa SX90 plentraktor', '15000.00', 8, 1),
('65060', 'Strandtennis', '46.00', 94, 1),
('65070', 'Boule', '118.00', 100, 1),
('65080', 'Barnetrillebår', '478.00', 50, 1),
('65081', 'Plantegreip', '112.00', 34, 1),
('65082', 'Kvistsag', '174.00', 8, 1),
('65122', 'Skjermvegg med gresspyd', '1558.00', 0, 1),
('65142', 'Gressaks, svingbar', '93.00', 20, 1),
('65143', 'Fruktplukker', '83.00', 16, 1),
('65147', 'Fluktstol, sammenleggbar', '238.00', 46, 1),
('65190', 'Hageslange, 20 m., grønn', '190.00', 2, 1),
('65191', 'Blomsterkasse', '23.00', 26, 1),
('65247', 'Liten plantespade', '75.00', 76, 1),
('71912', 'Eggemaler med maling', '35.00', 182, 0),
('72777', 'Julehobbypakke for barn', '154.00', 820, 1),
('72942', 'Plukksalat', '35.00', 280, 1),
('72943', 'Brekkbønner', '35.00', 342, 1),
('72944', 'Sukkererter', '42.00', 478, 1),
('76032', 'Kalk, granulert, 25 kg', '334.00', 60, 1),
('77033', 'Japanbarlind', '358.00', 168, 1),
('77036', 'Dvergtuja', '358.00', 46, 1),
('77038', 'Gul søyletuja', '478.00', 8, 1),
('77249', 'Hagebenk, furu', '1558.00', 4, 1),
('77251', 'Bord, 102 cm diameter', '658.00', 68, 1),
('77252', 'Stol, hvit plast', '34.00', 36, 1),
('77276', 'Sofagruppe, 2+3', '4558.00', 14, 1),
('77277', 'Parasoll, 2.5 meter, stål, kr', '358.00', 18, 1),
('78029', 'Cernit dukkeleire mørk', '142.00', 82, 1),
('80032', 'Arena høst, 25 kg', '154.00', 114, 1),
('80082', 'Aluminiumsulfat, 25 kg', '118.00', 62, 1),
('80088', 'Fullgjødsel, 40 kg', '213.00', 452, 0),
('80692', 'Rørespatel', '39.00', 602, 1),
('81007', 'Hobbyleire, hvit 500g', '62.00', 112, 1),
('82090', 'Matløk', '30.00', 38, 1),
('82092', 'Sommergulrot', '18.00', 178, 1),
('82093', 'Rund gulrot', '24.00', 658, 1),
('82095', 'Hodesalat', '23.00', 500, 1),
('82096', 'Issalat', '27.00', 388, 1),
('83013', 'Tilda maling teddybrun', '46.00', 86, 1),
('90106', 'Deigskrape av plast', '38.00', 46, 1),
('90109', 'Metallskrape', '40.00', 38, 1),
('90116', 'Smaksemne sjokolade 10ml', '50.00', 164, 1),
('90164', 'Lakrisekstrakt, 100g', '75.00', 104, 1),
('90192', 'Dropsform skjell', '70.00', 176, 1),
('90208', 'Form nisse', '71.00', 70, 1),
('90209', 'Form vingummi', '71.00', 32, 1),
('90212', 'Form skjell', '71.00', 240, 1),
('90510', 'Kakestativ', '430.00', 60, 1),
('90521', 'Kakemønstermaler', '142.00', 38, 1),
('90531', 'Kakekutter', '83.00', 160, 1),
('90545', 'Kakesprøyte sett', '288.00', 46, 1),
('90693', 'Marsipantang', '57.00', 0, 1),
('90737', 'Startsett lakris', '354.00', 126, 1),
('91008', 'Hobbyleire, hvit 1 kg', '94.00', 20, 1),
('92606', 'Gipsform nisser 6-14cm', '106.00', 46, 1);

--
-- Begrensninger for dumpede tabeller
--

--
-- Begrensninger for tabell Ordre
--
ALTER TABLE Ordre
  ADD CONSTRAINT OrdreBrukerFK FOREIGN KEY (BNr) REFERENCES Bruker (BNr);

--
-- Begrensninger for tabell Ordrelinje
--
ALTER TABLE Ordrelinje
  ADD CONSTRAINT OrdrelinjeOrdreFK FOREIGN KEY (OrdreNr) REFERENCES Ordre (OrdreNr),
  ADD CONSTRAINT OrdrelinjeVareFK FOREIGN KEY (Varekode) REFERENCES Vare (Varekode);

  

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
