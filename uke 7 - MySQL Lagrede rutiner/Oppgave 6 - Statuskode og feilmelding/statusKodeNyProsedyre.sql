--
-- Oppgave 6. Statuskode og feilmelding

-- Endre prosedyren fra oppgave 3 slik at den leverer en statuskode og eventuell feilmelding 
-- i to ut-parametre, i stedet for å skrive ut feilmelding. 
-- Test prosedyren.
-- 

DELIMITER $$

DROP PROCEDURE IF EXISTS ny_vare2 $$

CREATE PROCEDURE ny_vare2 (
	IN p_varekode CHAR(5),
	IN p_betegnelse VARCHAR(40),
	IN p_prisPrEnhet DECIMAL (8,2),
	IN p_lagerAntall INT,
	IN p_ErAktiv BOOLEAN,
	OUT p_status_kode INT,
	OUT p_feil_melding TEXT
) 

BEGIN

	DECLARE v_ant INT;

	SELECT COUNT(*) INTO v_ant
	FROM Vare 
	WHERE varekode = p_varekode;

	START TRANSACTION;

		IF v_ant > 0 THEN
			SET p_status_kode = -1; -- Ugyldig Status
			SET p_feil_melding = 'Varen kan ikke være negativ!';
		ELSE 
			SET p_status_kode = 1; -- OK Status
			SET p_feil_melding = 'En Varen er lagt Inn!';

			INSERT INTO Vare (varekode, Betegnelse, PrisPrEnhet, LagerAntall, ErAktiv)
			VALUES (p_varekode, p_betegnelse, p_prisPrEnhet, p_lagerAntall, p_ErAktiv);
	END IF; 
END $$

--
-- Teste Prosdyren
--

CALL ny_vare2 (1, 'XYZ', 20.00, 89, TRUE, @txtKode, @meldingUt) $$
SELECT @txtKode AS "Status Kode", @meldingUt AS "Melding" $$