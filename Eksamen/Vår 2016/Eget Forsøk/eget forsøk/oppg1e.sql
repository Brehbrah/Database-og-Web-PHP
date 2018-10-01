DELIMITER $$

DROP TRIGGER IF EXISTS poengsum $$

CREATE TRIGGER poengsum 
	AFTER UPDATE ON Leieforhold
	FOR EACH ROW
BEGIN 

	DECLARE sett_poengsum INTEGER;

	SELECT ROUND(AVG(poengsum), 0) INTO sett_poengsum
	FROM Leieforhold
	WHERE Leieforhold = NEW.LeierEpost

	UPDATE Bruker
	SET Poengsum = poengsum
	WHERE Epost = NEW.LeierEpost;

END $$


DELIMITER ;