DELIMITER $$

DROP PROCEDURE IF EXISTS hent_vare $$

CREATE PROCEDURE hent_vare (
	IN p_varekode CHAR (5),
	OUT p_betegnelse VARCHAR(40),
	OUT p_prisPrEnhet DECIMAL(10,2),
	OUT p_LagerAntall INT
) 

BEGIN

	SELECT Betegnelse, 
		   PrisPrEnhet, 
		   LagerAntall 
		   INTO 
		   p_betegnelse,
		   p_prisPrEnhet,
		   p_LagerAntall 
	FROM Vare 
	WHERE varekode = p_varekode;


END $$

CALL hent_vare ('10820', @Betegnelse, @PrisPrEnhet, @LagerAntall) $$
SELECT @Betegnelse, @PrisPrEnhet, @LagerAntall $$