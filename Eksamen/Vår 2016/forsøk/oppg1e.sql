DELIMITER $$

DROP TRIGGER IF EXISTS bruker_gi_p_sum_trg $$

CREATE TRIGGER bruker_gi_p_sum_trg 
AFTER UPDATE ON Leieforhold 
FOR EACH ROW

BEGIN

DECLARE b_poengsum INT;

	SELECT ROUND(AVG(Poengsum)) INTO b_poengsum
	FROM Leieforhold
	WHERE LeierEpost = NEW.LeierEpost;

	UPDATE Bruker
	SET Poengsum = b_poengsum
	WHERE Epost = NEW.LeierEpost;

END $$

UPDATE Leieforhold
SET Poengsum = 2
WHERE LNr = 1 $$

SELECT *
FROM Bruker $$

