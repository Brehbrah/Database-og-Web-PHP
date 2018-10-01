DELIMITER $$

DROP TRIGGER IF EXISTS automatisk_oppdatering $$

CREATE TRIGGER automatisk_oppdatering 
BEFORE INSERT ON Vare
FOR EACH ROW

BEGIN 
	SET NEW.er_aktiv = 1;
END $$

INSERT INTO Vare (varekode, betegnelse, pris_pr_enhet, lager_antall) 
VALUES (1, 'xyz,', 20.50, 50) $$