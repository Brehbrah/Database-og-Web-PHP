-- Gjør om til store bokstaver ved INSERT i bruker tabellen
DELIMITER $$

DROP TRIGGER IF EXISTS bruker_BRI $$

CREATE TRIGGER bruker_BRI 
	BEFORE INSERT ON bruker
	FOR EACH ROW
BEGIN
	SET NEW.fornavn = UPPER(NEW.fornavn);
	SET NEW.etternavn = UPPER(NEW.etternavn);
END 
	
-- TESTE





-- hvis MySQL hadde sjekket check
ALTER TABLE vare
ADD CHECK (PrisPrEnhet < 15500) $$


-- sjekk at ingen over 15 500
DELIMITER $$

DROP TRIGGER vare_BRU $$

CREATE TRIGGER vare_BRU
	BEFORE UPDATE ON vare
	FOR EACH ROW
BEGIN
	if NEW.PrisPrEnhet > 15500 THEN
		SIGNAL SQLSTATE '80000'
			SET MESSAGE_TEXT = 'For dyrt!';
	END IF;
END $$

UPDATE vare
SET vare.PrisPrEnhet = PrisPrEnhet + 1000;