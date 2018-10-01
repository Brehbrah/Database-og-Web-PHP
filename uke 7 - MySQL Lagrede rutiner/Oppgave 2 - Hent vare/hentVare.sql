--
-- Oppgave 2. Hent vare

-- Skriv en lagret prosedyre som returnerer alle data om en gitt vare i form av ut-variabler. 
-- La varekoden være parameter til prosedyren. Test prosedyren fra MySQL.
--


DELIMITER $$

DROP PROCEDURE IF EXISTS hent_vare $$

CREATE PROCEDURE hent_vare (
	IN p_varekode CHAR (5),
	OUT p_betegnelse VARCHAR (40),
	OUT p_prisPrEnhet DECIMAL (10,2),
	OUT p_LagerAntall INT
) 

BEGIN	
	-- 
	-- Her tar vi alle originale kolonnen til 'vare' tabellen og kopierer til det nye prosedyren 
	-- 

	SELECT betegnelse, prisPrEnhet, LagerAntall INTO p_betegnelse, p_prisPrEnhet, p_LagerAntall 
	FROM Vare 
	WHERE varekode = p_varekode;

END $$


-- Her Tester vi prosedyren 
-- Call funksjonen sørger for kjøre via prosedyren. 
-- Tenk på det som en metode som skal kjøre ut funksjonen for metoden

CALL hent_vare ("10820", @betegnelse, @prisPrEnhet, @LagerAntall) $$
SELECT @betegnelse AS "betegnelse", @prisPrEnhet AS "PrisPrEnhet", @LagerAntall AS "LagerAntall" $$
