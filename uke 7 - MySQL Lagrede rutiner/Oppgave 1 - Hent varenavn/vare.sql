DELIMITER $$

DROP PROCEDURE IF EXISTS slett_vare $$

CREATE PROCEDURE slett_vare (
	IN p_varekode INT,
	OUT status_ut TEXT
) 

BEGIN
		
	DECLARE v_antall INT;


	SELECT COUNT(*) INTO v_antall
	FROM Vare 
	WHERE varekode = p_varekode;

	IF v_antall = 1 THEN 
		START TRANSACTION;
			DELETE FROM Vare
			WHERE varekode = p_varekode;
		COMMIT;
		SET status_ut = 'Varen er slettet';
	ELSE 	
		SET status_ut = 'Ugyldig varekode';

	END IF;	

END $$

CALL slett_vare(11, @kvittering) $$
SELECT @kvittering $$