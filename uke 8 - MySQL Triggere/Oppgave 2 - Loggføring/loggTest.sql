DELIMITER $$

DROP TABLE IF EXISTS passord_logg $$
DROP TABLE IF EXISTS bruker_update_passord_a_trg $$

CREATE TABLE passord_logg (
	bnr INT AUTO_INCREMENT,
	epost VARCHAR(40),
	fornavn VARCHAR(40),
	etternavn VARCHAR(40),
	gammelt_passord VARCHAR(40),
	nytt_passord VARCHAR(40),
	dato_endret DATE, 
	PRIMARY KEY (bnr)
) $$ 

CREATE TRIGGER bruker_update_passord_a_trg
AFTER UPDATE ON bruker 
FOR EACH ROW

BEGIN
	INSERT INTO bruker_update_passord_a_trg (bnr, epost, fornavn, etternavn, gammelt_passord, nytt_passord, dato_endret) 
	VALUES (NEW.bnr, NEW.epost, NEW.fornavn, NEW.etternavn, OLD.passord, new.passord, NOW());
END $$

UPDATE bruker 
SET passord = 'sjekk123'
WHERE bnr = 1 $$