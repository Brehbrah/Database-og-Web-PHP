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

-- 
-- Oppgave 3. Ny vare

-- Skriv en lagret prosedyre som legger til en ny vare. 
-- La verdiene i den nye raden være parametre til prosedyren. 
-- Vareprisen skal være større enn 0 og mindre enn 100 000, og antall på lager ikke-negativ. 
-- Kolonnen er_aktiv skal settes til sann. Ved brudd på disse betingelsene, 
-- så skal prosedyren skrive ut en feilmelding, og ikke utføre innsettingen. 
-- Test prosedyren. Sørg for at alle deler av koden blir utført i minst 1 test.
--

-- ToDo List
-- Mangel: Sjekker ikke at varepris skal være mellom 0 og 100 000,
-- og heller ikke om antall på lager er ikke-negativ.


DELIMITER $$ 

DROP PROCEDURE IF EXISTS ny_vare $$

CREATE PROCEDURE ny_vare (
	IN p_varekode CHAR(5),
	IN p_betegnelse VARCHAR(40),
	IN p_prisPrEnhet DECIMAL (8,2),
	IN p_AntallLager INT,
	IN p_erAktiv BOOLEAN
)

BEGIN
	
	DECLARE v_antall INT;
	DECLARE v_txtUt TEXT;

	SET v_txtUt = '';

	SELECT COUNT(*) INTO v_antall
	FROM Vare
	WHERE varekode = p_varekode;

	
	IF v_antall > 0 THEN 
		SET v_txtUt = 'Antall Varer kan ikke være negativ!';
	 ELSE 
		SET v_txtUt = '1 vare er lagt inn!';	
	
	--
	-- Her vil vi bruke START TRANSACTION, pga. brukeren kan skrive inn nye varer
	-- 

	START TRANSACTION; 
		INSERT INTO Vare (varekode, betegnelse, prisPrEnhet, lagerAntall, ErAktiv) 
		VALUES (p_varekode, p_betegnelse, p_prisPrEnhet, p_AntallLager,p_erAktiv);
		COMMIT;

	END IF;

	SELECT v_txtUt;

END $$

CALL ny_vare ('1', 'XYZ', 20.50, -4, TRUE) $$

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