-- 
-- Oppgave 1: Stor forbokstav

-- Lag en trigger som sørger for at navn på personer lagres med stor forbokstav. 
-- Eksempel: Bruker skriver "ole" og "HANSEN", men det som blir lagret 
-- skal være "Ole" og "Hansen". Test triggeren ved å utføre SQL-spørringer og sjekk tabellinnhold.

-- LØSNINGSFORSLAG ØVING 8: Triggere
 
-- ***************************************************
-- OPPGAVE 1
 
-- Navn på personer skal lagres med store bokstaver.

DELIMITER $$

DROP TRIGGER IF EXISTS bruker_b_ins_trg $$
DROP TRIGGER IF EXISTS update_b_ins_trg $$

CREATE TRIGGER bruker_b_ins_trg 
BEFORE INSERT ON bruker  
FOR EACH ROW

BEGIN

	SET NEW.fornavn = UPPER(NEW.fornavn);
	SET NEW.etternavn = UPPER(NEW.etternavn);
END $$

CREATE TRIGGER update_b_ins_trg 
BEFORE UPDATE ON bruker 
FOR EACH ROW

BEGIN
	SET NEW.fornavn = UPPER(NEW.fornavn);
	SET NEW.etternavn = UPPER(NEW.etternavn);
END $$

--
-- Teste for å se om det fungerer 
--


INSERT INTO bruker (bnr, epost, passord, fornavn, etternavn, er_ansatt) 
VALUES (47, 'abc@gmail.com', 'gymbrah', 'Expert', 'novice', 0) $$

UPDATE bruker  
SET fornavn = 'help', etternavn = 'me'
WHERE bnr = 47 $$