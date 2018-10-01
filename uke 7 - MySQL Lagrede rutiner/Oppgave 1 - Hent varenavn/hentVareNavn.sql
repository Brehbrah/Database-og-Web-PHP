--
-- Oppgave 1. Hent varenavn
-- Skriv en lagret funksjon som returnerer navnet (betegnelsen) til en vare. La varekoden være inn-parameter til funksjonen. 
-- Test funksjonen med en SELECT-spørring. Hva skjer hvis du sender med en varekode som ikke eksisterer?
-- Bruk også funksjonen for å vise varenavn i en SELECT-spørring mot ordrelinje-tabellen.


DELIMITER $$

DROP FUNCTION IF EXISTS hent_varenavn $$

--
-- Her skrives det lagret funksjon
--

CREATE FUNCTION hent_varenavn (
	
	p_varekode CHAR(5)

) 	RETURNS VARCHAR (40)
	READS SQL DATA
BEGIN 
	DECLARE v_betegnelse VARCHAR(40) DEFAULT NULL;

	SELECT Betegnelse INTO v_betegnelse
	FROM Vare
	WHERE Varekode = p_varekode;

	RETURN v_betegnelse;

END $$