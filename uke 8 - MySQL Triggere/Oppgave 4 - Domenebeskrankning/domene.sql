--
-- Oppgave 4: Domenebeskrankning

-- Sørg for at alle varepriser må være mellom 0 og 10 000. 
-- Dette kan gjøres med en trigger, men også med en CHECK-regel.
--

DELIMITER $$

DROP TRIGGER IF EXISTS domene_beskrankning $$

CREATE TRIGGER domene_beskrankning
BEFORE INSERT ON Vare
FOR EACH ROW 

BEGIN
	
	DECLARE v_melding TEXT;
	SET v_melding = '';

	IF (NEW.pris_pr_enhet BETWEEN 0 AND 10000) THEN 
		SIGNAL SQLSTATE '10000';
		SET v_melding = 'Pris varen er godkjent!';
	ELSE 
		SET v_melding = 'pris varen er ikke godkjent!';
	END IF;
END $$

--
-- tESTING
--

UPDATE Vare
SET pris_pr_enhet = 8000
where varekode = '10820' $$