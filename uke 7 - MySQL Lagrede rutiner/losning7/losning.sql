-- Leksjon 07. Lagrede rutiner


-- ***************************************************
-- Oppgave 1. Hent varenavn

DELIMITER $$

DROP FUNCTION IF EXISTS hent_varenavn $$

CREATE FUNCTION hent_varenavn
(
  p_varekode CHAR(5)
)
  RETURNS VARCHAR(40)
  READS SQL DATA
BEGIN
  DECLARE v_betegnelse VARCHAR(40) DEFAULT NULL;
  
  SELECT betegnelse INTO v_betegnelse
  FROM   vare
  WHERE  varekode = p_varekode;
  
  RETURN v_betegnelse;
END $$

-- Tester funksjonen:

SELECT hent_varenavn('10830') $$

SET @vnavn = hent_varenavn('10830') $$
SELECT @vnavn varenavn;


-- ***************************************************
-- Oppgave 2. Hent vare

DELIMITER $$

DROP PROCEDURE IF EXISTS hent_vare $$

CREATE PROCEDURE hent_vare
(
  IN  p_varekode      CHAR(5),
  OUT p_betegnelse    VARCHAR(40),
  OUT p_pris_pr_enhet DECIMAL(8, 2),
  OUT p_lager_antall  INT(11)
)
BEGIN
  SELECT betegnelse,
         pris_pr_enhet,
         lager_antall
  INTO   p_betegnelse,
         p_pris_pr_enhet,
         p_lager_antall
  FROM   vare
  WHERE  varekode = p_varekode;
END $$

-- Tester prosedyren

CALL hent_vare('10820', @betegnelse, @pris_pr_enhet, @lager_antall) $$

SELECT @betegnelse, @pris_pr_enhet, @lager_antall $$


-- ***************************************************
-- Oppgave 3. Ny vare
-- Mangel: Sjekker ikke at varepris skal være mellom 0 og 100 000,
-- og heller ikke om antall på lager er ikke-negativ.

DROP PROCEDURE IF EXISTS ny_vare $$

DROP PROCEDURE IF EXISTS ny_vare $$
CREATE PROCEDURE ny_vare
(
	IN  p_varekode      CHAR(5),
	IN  p_betegnelse    VARCHAR(30),
  IN  p_pris_pr_enhet DECIMAL(8,2),
  IN  p_lager_antall  INT(11)
)
BEGIN
  DECLARE v_antall INT;
  DECLARE v_utdata TEXT;
  
  SET v_utdata = '';
  
  SELECT COUNT(*) INTO v_antall
  FROM vare
  WHERE varekode = p_varekode;
  
  IF v_antall > 0 THEN
    SET v_utdata = 'Varen finnes allerede!';
  ELSE
    SET v_utdata = '1 vare er lagt inn.';
	
	-- Tar med START TRANSACTION og COMMIT for å vise,
	-- men ikke nødvendig her ettersom vi kun har 1 kommando (INSERT).
	START TRANSACTION
  	INSERT INTO vare(varekode, betegnelse, pris_pr_enhet, lager_antall)
	  VALUES (p_varekode, p_betegnelse, p_pris_pr_enhet, p_lager_antall);
	COMMIT;
	
  END IF;
  
  SELECT v_utdata;
END $$

-- Tester prosedyren

CALL ny_vare('1', 'XYZ', 20.50, 3) $$


-- ***************************************************
-- Oppgave 4. Slett vare

DROP PROCEDURE IF EXISTS slett_vare $$

CREATE PROCEDURE slett_vare
(
  IN  p_varekode CHAR(5),
  OUT ut_status VARCHAR(30)
)
BEGIN
  DECLARE v_ant INT;

  SELECT COUNT(*) INTO v_ant
  FROM vare
  WHERE varekode = p_varekode;

  IF v_ant = 1 THEN
    DELETE FROM vare
	WHERE varekode = p_varekode;

    SET ut_status = 'Varen er slettet.';
  ELSE
    SET ut_status = 'Ukjent varekode.';
  END IF;
END $$

-- Tester prosedyren

CALL slett_vare('1', @kvittering) $$

SELECT @kvittering $$


-- ***************************************************
-- Oppgave 5. Endre varepris
-- Mangel: Sjekker ikke om prisendring er større enn 50%.

DROP PROCEDURE IF EXISTS endre_varepris $$

CREATE PROCEDURE endre_varepris
(
  IN  p_varekode CHAR(5),
  IN  p_ny_pris  DECIMAL(8, 2),
  OUT ut_status  VARCHAR(30)
)
BEGIN
  DECLARE v_ant INT;

  SELECT COUNT(*) INTO v_ant
  FROM vare
  WHERE varekode = p_varekode;

  IF v_ant = 1 THEN
    UPDATE vare
    SET pris_pr_enhet = p_ny_pris
    WHERE varekode = p_varekode;
    
    SET ut_status = 'Prisen er endret.';
  ELSE
    SET ut_status = 'Ukjent varekode.';
  END IF;
END $$

-- Tester prosedyren

CALL endre_varepris('1', 23.50, @kvittering) $$

SELECT @kvittering $$



-- ***************************************************
-- Oppgave 6. Ny vare med ut-parametre

DROP PROCEDURE IF EXISTS ny_vare_v2 $$

CREATE PROCEDURE ny_vare_v2
(
  IN  p_varekode      CHAR(5),
  IN  p_betegnelse    VARCHAR(30),
  IN  p_pris_pr_enhet DECIMAL(8,2),
  IN  p_lager_antall  INT(11),
  OUT p_statuskode    INT,
  OUT p_melding       TEXT
)
BEGIN
  DECLARE v_antall INT;
  
  SELECT COUNT(*) INTO v_antall
  FROM vare
  WHERE varekode = p_varekode;
  
  IF v_antall > 0 THEN
    SET p_statuskode = -1; -- FEILKODE
    SET p_melding = 'Varen finnes allerede!';
  ELSE
    SET p_statuskode = 1; -- OK
    SET p_melding = '1 vare er lagt inn.';
  	INSERT INTO vare(varekode, betegnelse, pris_pr_enhet, lager_antall)
	  VALUES (p_varekode, p_betegnelse, p_pris_pr_enhet, p_lager_antall);
  END IF;
END $$

-- Tester prosedyren

CALL ny_vare_v2('1', 'XYZ', 20.50, 3, @kode, @melding) $$

SELECT @kode, @melding  $$

-- ***************************************************

-- Variant av oppgave 9

DROP PROCEDURE IF EXISTS VisVarer $$

CREATE PROCEDURE VisVarer()
BEGIN
  DECLARE ferdig INT DEFAULT FALSE;
  DECLARE v_varekode   CHAR(5);
  DECLARE v_betegnelse VARCHAR(20);
  
  DECLARE _output TEXT DEFAULT ' ';
  
  DECLARE c_vareliste CURSOR FOR
    SELECT Varekode, Betegnelse FROM Vare;
  DECLARE CONTINUE HANDLER FOR NOT FOUND SET ferdig = TRUE;
  
  OPEN c_vareliste;

  les_varer:
  LOOP
    FETCH c_vareliste INTO v_varekode, v_betegnelse;
    IF ferdig THEN
      LEAVE les_varer;
    END IF;
    SET _output = CONCAT(_output, ' ', v_varekode, ' ', v_betegnelse, '\n');
  END LOOP;

  CLOSE c_vareliste;
  
  SELECT _output;
END $$

-- Test
CALL VisVarer() $$
