DELIMITER $$

DROP PROCEDURE IF EXISTS ny_vare $$

CREATE PROCEDURE ny_vare (
	IN p_varekode INT,
	IN p_betegnelse VARCHAR (40),
	IN p_pris_pr_enhet DECIMAL (8,2),
	IN p_lager_antall 

)