DELIMITER $$

DROP TRIGGER IF EXISTS forretningsRegel_update_vare_trg $$

CREATE TRIGGER forretningsRegel_update_vare_trg 
	BEFORE UPDATE ON Vare 
	FOR EACH ROW

BEGIN
	

	IF OLD.prisPrEnhet < (NEW.prisPrEnhet * 2) THEN 
		SIGNAL SQLSTATE '80000'
		SET MESSAGE_TEXT = 'For stor Pris økning!';
	ELSE 
		SET MESSAGE_TEXT = 'Godkjent!';
	END IF;
END $$

UPDATE Vare
SET prisPrEnhet = prisPrEnhet * 3
WHERE varekode = 10820 $$