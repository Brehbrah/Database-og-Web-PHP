DELIMITER $$

DROP TRIGGER IF EXISTS spiller_trg $$

CREATE TRIGGER spiller_trg
	BEFORE INSERT ON resultat
	FOR EACH ROW

BEGIN

	DECLARE ant_spiller INT;
	DECLARE SET_MESSAGE TEXT;

	SELECT COUNT(DISTINCT SpillerNr) INTO ant_spiller
	FROM resultat
	WHERE RundeNr = NEW.RundeNr;

	IF ant_spiller >= 4 THEN
		SIGNAL SQLSTATE '20000'
		SET MESSAGE_TEXT = 'Ikke flere enn 4 spillere på noen golfrunde';
	END IF; 
END $$


