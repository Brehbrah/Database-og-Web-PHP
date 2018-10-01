--
-- Oppgave 5. Endre varepris

-- Skriv en lagret prosedyre som endrer prisen til en vare. 
-- Prisendringen kan ikke være større enn 50%. Bestem parametre selv. Test prosedyren.
--


DELIMITER $$

DROP PROCEDURE IF EXISTS endre_varepris $$

CREATE PROCEDURE endre_varepris (

	IN p_varekode CHAR (5),
	IN p_prisPrEnhet DECIMAL (8,2),
	OUT status_out VARCHAR(40)
)

BEGIN

	DECLARE pris INT; 

	SELECT COUNT(*) INTO pris
	FROM Vare
	WHERE varekode = p_varekode; 

	IF pris = 1 THEN
		UPDATE Vare
		SET prisPrEnhet = p_prisPrEnhet
		WHERE varekode = p_varekode;

		SET status_out = 'Prisen er endret!';
	ELSE 
		SET status_out = 'Ukjent varekode!';

	END IF;
END $$  

CALL endre_varepris ('10820', 19.99, @kvittering) $$
SELECT @kvittering AS "Kvittering" $$