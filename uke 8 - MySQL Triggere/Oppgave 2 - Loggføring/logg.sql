--
-- Oppgave 2: Loggføring

-- Hver gang noen endrer passord (i tabell bruker) skal dette loggføres i en egen tabell 
-- som inneholder brukernavn og tidspunkt for endring. 
-- Lag og test en trigger for å få til dette. Du må også lage logg-tabellen.
--

DELIMITER $$ 

DROP TABLE IF EXISTS logg_tabell $$
DROP TRIGGER IF EXISTS bruker_a_upd_trg $$

--
-- Vi oppretter en logg tabell først 
--

CREATE TABLE logg_tabell (
	bnr INT AUTO_INCREMENT,
	epost VARCHAR(40),
	fornavn VARCHAR(40),
	etternavn VARCHAR(40),
	gammelt_passord VARCHAR(40),
	nytt_passord VARCHAR(40),
	tidsPunkt DATE,
	PRIMARY KEY (bnr)
) $$

--
-- Nå skal vi opprette en AFTER-TRIGGER
--

CREATE TRIGGER bruker_a_upd_trg
  AFTER UPDATE ON bruker
  FOR EACH ROW
BEGIN
   
  INSERT INTO logg_tabell (epost, fornavn, etternavn, gammelt_passord, nytt_passord, tidspunkt)
  VALUES (NEW.epost, NEW.fornavn, NEW.etternavn, OLD.passord, NEW.passord, NOW());

END $$

--
-- Testing 
-- 

UPDATE bruker 
SET passord = 'balla'
WHERE bnr = 1 $$

SELECT * 
FROM logg_tabell
