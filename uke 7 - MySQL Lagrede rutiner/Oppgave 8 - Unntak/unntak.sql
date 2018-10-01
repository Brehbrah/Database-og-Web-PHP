DELIMITER $$

DROP PROCEDURE IF EXISTS unntak $$

CREATE PROCEDURE unntak (
	IN p_varekode CHAR(5),
	IN p_betegnelse VARCHAR(40),
	IN p_prisPrEnhet DECIMAL (8,2),
	IN p_lagerAntall INT,
	OUT melding TEXT
) 

BEGIN

	DECLARE v_antall INT;
	DECLARE v_

	SELECT COUNT(*) INTO v_antall
	FROM vare 
	WHERE Varekode = p_varekode;

	IF v_antall > 0 THEN
		SET melding = ""
		
	START TRANSACTION;
END $$ 