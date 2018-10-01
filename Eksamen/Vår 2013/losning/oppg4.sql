DELIMITER $$

DROP PROCEDURE IF EXISTS ny_bruker $$
 
CREATE PROCEDURE ny_bruker
(
  IN  p_epost   VARCHAR(100),
  IN  p_passord VARCHAR(20),
  OUT p_melding VARCHAR(50)
)
BEGIN
  DECLARE v_antall INT;
  
  SELECT COUNT(*) INTO v_antall
  FROM `bruker`
  WHERE `epost` = p_epost;
  
  IF v_antall = 0 THEN    
    INSERT INTO `bruker` (`epost`, `passord`) 
	VALUES (p_epost, PASSWORD(p_passord));
	SET p_melding = 'Brukeren er opprettet.';
  ELSE
    SET p_melding = 'Klarte ikke å opprette brukeren.';
  END IF;
END $$
 
DELIMITER ;

-- Test
 
CALL ny_bruker('arnze@xyz.no', 'enra', @melding);

SELECT @melding;
