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

