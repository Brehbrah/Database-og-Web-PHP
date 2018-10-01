DELIMITER $$

DROP FUNCTION IF EXISTS totalpris $$

CREATE FUNCTION totalpris
(
  p_rnr INTEGER
)
  RETURNS DECIMAL(8, 2)
  READS SQL DATA
BEGIN
  DECLARE v_antall INTEGER;
  DECLARE v_totalt DECIMAL(8, 2);
  
  SET v_totalt = 0;

  SELECT COUNT(*) INTO v_antall
  FROM Reise
  WHERE RNr = p_rnr;
  
  IF v_antall > 0 THEN
    SELECT SUM(AntKm*KMPris) INTO v_totalt
    FROM Reise, Strekning, Transportmiddel
    WHERE Reise.RNr = Strekning.RNr
    AND Strekning.TNr = Transportmiddel.TNr
    AND Reise.RNr = p_rnr;
  END IF;

  RETURN v_totalt;
END $$

DELIMITER ;


-- Tester funksjonen med reise som finnes:

SELECT totalpris(1);

-- Tester funksjonen med reise som ikke finnes:

SELECT totalpris(9);
