--
-- Oppgave 4. Slett vare

-- Skriv en lagret prosedyre som sletter en vare. Bestem parametre selv. Test prosedyren.
--


--
-- Forenklet versjon 1
--

DELIMITER $$

DROP PROCEDURE IF EXISTS slett_vare $$

CREATE PROCEDURE slett_vare (
	IN p_varekode CHAR (5)
)

BEGIN
	
	DELETE FROM vare
	WHERE varekode = p_varekode;


END $$ 

CALL slett_vare('1');

--
-- Alternativ 2, mer utfyllende med text ut
--

--
-- Oppgave 4. Slett vare

-- Skriv en lagret prosedyre som sletter en vare. Bestem parametre selv. Test prosedyren.
--


DELIMITER $$

DROP PROCEDURE IF EXISTS slett_vare $$

CREATE PROCEDURE slett_vare (
	IN p_varekode CHAR (5),
	OUT status_ut VARCHAR(40)
)

BEGIN
	
	DECLARE ant INT;

	SELECT COUNT(*) INTO ant
	FROM Vare
	WHERE varekode = p_varekode;

	IF ant = 1 THEN
		DELETE FROM vare
		WHERE varekode = p_varekode;

		SET status_ut = 'Varen er slettet!';
	ELSE  
		SET status_ut = 'Varenummeret: eksisterer ikke!';

	END IF;

END $$ 

CALL slett_vare('15211', @tekstUt) $$
SELECT @tekstUt AS "Kvittering" $$ 