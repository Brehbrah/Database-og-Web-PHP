DELIMIMTER $$

DROP PROCEDURE IF EXISTS registrerings_p_forhold $$

CREATE PROCEDURE registrerings_p_forhold () {
	IN p_leierEpost VARCHAR(40),
	IN p_fraDato DATE,
	IN p_tilDato DATE,
	IN p_poengsum INT,
	OUT p_melding TEXT
}

BEGIN
	
	DECLARE v_antall INT 

	SELECT COUNT(*) INTO v_antall
	FROM leieforhold
	WHERE Epost = p_leierEpost;

	IF v_antall = 0 THEN
		SET p_melding = 'Leieren eksisterer ikke!';
	ELSE 
		IF p_fraDato < p_tilDato THEN
			SET p_melding = "Det må være dato før og etter!";
		ELSE 
			INSERT INTO leieforhold (LeierEpost, FraDato, TilDato, Poengsum)
			VALUES (p_leierEpost, p_fraDato, p_tilDato, p_poengsum);
			SET p_melding = 'Leieforholdet er lagret!';
		ELSE IF;
	END IF; 
END $$