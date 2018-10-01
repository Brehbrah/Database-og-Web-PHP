

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;


--
-- Slett tabeller
--
DROP TABLE IF EXISTS `Ordrelinje`;
DROP TABLE IF EXISTS `Ordre`;
DROP TABLE IF EXISTS `Bruker`;
DROP TABLE IF EXISTS `Vare`;


-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `bruker`
--

CREATE TABLE IF NOT EXISTS `Bruker` (
  `BNr` int(11) NOT NULL DEFAULT '0',
  `Epost` varchar(40) DEFAULT NULL,
  `Passord` varchar(10) DEFAULT NULL,
  `Fornavn` char(20) NOT NULL,
  `Etternavn` char(40) NOT NULL,
  `ErAnsatt` tinyint(1) NOT NULL,
  PRIMARY KEY (`BNr`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dataark for tabell `bruker`
--

INSERT INTO `Bruker` (`BNr`, `Epost`, `Passord`, `Fornavn`, `Etternavn`, `ErAnsatt`) VALUES
(1, 'pa@xyz.no', 'kq61ka', 'Paal', 'Aass', 0),
(2, 'jola@xyz.no', 'ksn23h', 'Joakim', 'Laursen', 0),
(3, 'laur88@xyz.no', 'alen6s', 'Laurits', 'Eckhoff', 1),
(4, 'aasae@zzz.se', 's7wu2b', 'Åshild', 'Sætran', 1),
(7, 'toroe@xyz.no', 'mskw6e', 'Torgrim', 'Østbø', 1),
(8, 'malvin2@zzz.se', '2ns6f2', 'Malvin', 'Khan', 1),
(9, 'sidselg@xyz.no', 'udh32n', 'Sidsel', 'Gulli', 1),
(10, 'katrineeil@xyz.no', 'a229ms', 'Katrine', 'Eilertsen', 1),
(11, 'skjalg@zzz.se', 'j2hqq8', 'Skjalg', 'Tengesdal', 1),
(12, 'gunniaa@zzz.se', 'k2swwe', 'Gunn Iren', 'Ånestad', 1),
(13, 'khalid@zzz.se', 'kaqk82', 'Khalid', 'Rue', 1),
(14, 'janns@zzz.se', 'ss2w2w', 'Jann', 'Skjelvik', 1),
(16, 'inek@xyz.no', 'bvu8y5', 'Ine', 'Kraft', 1),
(17, 'valtergr@xyz.no', 'nwsu88', 'Valter', 'Grimsmo', 1),
(18, 'asa@zzz.se', 'wuv23z', 'Alexandra', 'Saleh', 1),
(21, 'maje@xyz.no', 'gb39es', 'Maj', 'Elton', 1),
(22, 'agnewe@abc.com', 'kskm2n', 'Agnethe', 'Wessel', 1),
(23, 'ertr@abc.com', 'kraf55', 'Erland', 'Trøan', 1),
(24, 'morlin@xyz.no', 'tr72aa', 'Morten', 'Lindland', 1),
(25, 'kajh@xyz.no', 'fe45w2', 'Kaja', 'Høvik', 1),
(26, 'thale5@abc.com', 'tre33w', 'Thale', 'Evenrud', 0),
(27, 'connie1@xyz.no', 'hnu55d', 'Connie', 'Volden', 1),
(28, 'arner@xyz.no', 'ss41aa', 'Arne', 'Reinertsen', 1),
(29, 'raje@xyz.no', 'uu6ds9', 'Ranveig', 'Gjertsen', 1),
(30, 'mareng@xyz.no', 'gg29sv', 'Mariann', 'Enger', 1),
(31, 'asle99@abc.com', 'sd88vx', 'Asle', 'Hornnes', 1),
(32, 'olej@xyz.no', 'jhf8s2', 'Ole-Jørgen', 'Molteberg', 1),
(33, 'garvik3@abc.com', 'chd63r', 'Aasta', 'Garvik', 1),
(34, 'jm12@abc.com', 'xu79dw', 'Jorid', 'Marcussen', 1),
(35, 'vaks7@xyz.no', 'ze47wa', 'Aleksandra', 'Vaksdal', 1),
(36, 'fatima@xyz.no', 'jgfa42', 'Fatima', 'Hildre', 1),
(37, 'emilie@abc.com', 'xrtu45', 'Emilie', 'Fotland', 1),
(38, 'ayse@xyz.no', 'zpkw62', 'Ayse', 'Sellevold', 1),
(39, 'magstad@xyz.no', 'akm78w', 'Magnhild', 'Helgestad', 0),
(40, 'iln@abc.com', 'hob42a', 'Inger-Lise', 'Nerdal', 1),
(41, 'mfal@abc.com', 'ykl23s', 'Mustafa', 'Falck', 1),
(42, 'furto@abc.com', 'vw88hu', 'Tormod', 'Furset', 1),
(43, 'phma@xyz.no', 'nut82a', 'Maren', 'Stephansen', 1),
(44, 'sofa@abc.com', 'bv23xw', 'Sol', 'Fauske', 1),
(45, 'birny@xyz.no', 'ahq52s', 'Birthe', 'Nydal', 1),
(46, 'ole101@xyz.no', 'pji39s', 'Ole', 'Haugom', 1),
(47, 'aasafo@xyz.no', 'aav25e', 'Åsa', 'Folgerø', 1),
(48, 'sivero@abc.com', 'hcv38v', 'Sivert', 'Ose', 0),
(49, 'lisaf@abc.com', 'by42sa', 'Lisa', 'Fjeldstad', 1),
(50, 'anneb@abc.com', 'vyf73s', 'Anne-Britt', 'Sneve', 1),
(53, 'gjeha@xyz.no', 'sfg77w', 'Gjermund', 'Hansson', 1);

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `ordre`
--

CREATE TABLE IF NOT EXISTS `Ordre` (
  `OrdreNr` int(11) NOT NULL DEFAULT '0',
  `OrdreDato` date NOT NULL,
  `BNr` int(11) DEFAULT NULL,
  PRIMARY KEY (`OrdreNr`),
  KEY `OrdreBrukerFK` (`BNr`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dataark for tabell `ordre`
--

INSERT INTO `Ordre` (`OrdreNr`, `OrdreDato`, `BNr`) VALUES
(1, '2020-08-20', 4),
(2, '2020-08-20', 41),
(3, '2020-08-20', 35),
(4, '2020-08-20', 11),
(5, '2020-08-20', 27),
(8, '2020-08-20', 7),
(9, '2021-08-20', 33),
(10, '2021-08-20', 29),
(11, '2021-08-20', 41),
(12, '2021-08-20', 2),
(13, '2021-08-20', 21),
(14, '2021-08-20', 37),
(16, '2021-08-20', 50),
(17, '2021-08-20', 16),
(18, '2021-08-20', 24),
(19, '2021-08-20', 1),
(20, '2021-08-20', 10),
(21, '2021-08-20', 28);

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `ordrelinje`
--

CREATE TABLE IF NOT EXISTS `Ordrelinje` (
  `OrdreNr` int(11) NOT NULL DEFAULT '0',
  `Varekode` char(5) NOT NULL DEFAULT '',
  `PrisPrEnhet` decimal(8,4) NOT NULL DEFAULT '0.0000',
  `Antall` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`OrdreNr`,`Varekode`),
  KEY `OrdrelinjeVareFK` (`Varekode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dataark for tabell `ordrelinje`
--

INSERT INTO `Ordrelinje` (`OrdreNr`, `Varekode`, `PrisPrEnhet`, `Antall`) VALUES
(1, '10830', '29.9000', 1),
(1, '65081', '109.5000', 5),
(2, '10830', '29.9000', 1),
(2, '21032', '57.6000', 3),
(2, '65081', '109.5000', 5),
(3, '21032', '57.6000', 3),
(3, '37710', '35.4000', 2),
(3, '65081', '109.5000', 5),
(4, '37710', '35.4000', 2),
(4, '65081', '109.5000', 5),
(5, '10830', '29.9000', 1),
(5, '21032', '57.6000', 3),
(5, '37710', '35.4000', 2),
(5, '65081', '109.5000', 5),
(8, '10830', '29.9000', 1),
(8, '65081', '109.5000', 5),
(8, '90209', '67.5000', 5),
(9, '10830', '29.9000', 1),
(9, '65081', '109.5000', 5),
(9, '77033', '355.5000', 5),
(10, '37710', '35.4000', 2),
(10, '65081', '109.5000', 5),
(11, '10830', '29.9000', 1),
(11, '37710', '35.4000', 2),
(11, '65081', '109.5000', 5),
(12, '37710', '35.4000', 2),
(12, '65081', '109.5000', 5),
(13, '10830', '29.9000', 1),
(13, '21032', '57.6000', 3),
(13, '37710', '35.4000', 2),
(13, '64551', '118.0000', 2),
(13, '65081', '109.5000', 5),
(14, '10830', '29.9000', 1),
(14, '21032', '57.6000', 3),
(14, '37710', '35.4000', 2),
(14, '65081', '109.5000', 5),
(16, '10830', '29.9000', 1),
(16, '21032', '57.6000', 3),
(16, '37710', '35.4000', 2),
(16, '82090', '15.9000', 1),
(17, '21032', '57.6000', 3),
(17, '37710', '35.4000', 2),
(17, '65081', '109.5000', 5),
(18, '10830', '29.9000', 1),
(18, '21032', '57.6000', 3),
(19, '37710', '35.4000', 2),
(19, '65081', '109.5000', 5),
(20, '21032', '57.6000', 3),
(20, '37710', '35.4000', 2),
(21, '10830', '29.9000', 1),
(21, '65081', '109.5000', 5);

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `vare`
--

CREATE TABLE IF NOT EXISTS `Vare` (
  `Varekode` char(5) NOT NULL DEFAULT '',
  `Betegnelse` char(30) NOT NULL,
  `PrisPrEnhet` decimal(8,2) NOT NULL DEFAULT '0.00',
  `LagerAntall` int(11) NOT NULL,
  `Aktiv` tinyint(1) NOT NULL,
  PRIMARY KEY (`Varekode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dataark for tabell `vare`
--

INSERT INTO `Vare` (`Varekode`, `Betegnelse`, `PrisPrEnhet`, `LagerAntall`, `Aktiv`) VALUES
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
-- Begrensninger for tabell `ordre`
--
ALTER TABLE `Ordre`
  ADD CONSTRAINT `OrdreBrukerFK` FOREIGN KEY (`BNr`) REFERENCES `Bruker` (`BNr`);

--
-- Begrensninger for tabell `ordrelinje`
--
ALTER TABLE `Ordrelinje`
  ADD CONSTRAINT `OrdrelinjeOrdreFK` FOREIGN KEY (`OrdreNr`) REFERENCES `Ordre` (`OrdreNr`),
  ADD CONSTRAINT `OrdrelinjeVareFK` FOREIGN KEY (`Varekode`) REFERENCES `Vare` (`Varekode`);

  

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
