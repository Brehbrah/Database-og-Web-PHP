DELIMITER $$

DROP TRIGGER IF EXISTS datostempel_trg $$

CREATE TRIGGER datostempel_trg 
BEFORE INSERT ON melding
FOR EACH ROW

BEGIN
	SET NEW.dato = NOW();
END $$

INSERT INTO melding(bnr, tittel, tekst)
VALUES (1,"ABC", "En super tekst!") $$

SELECT *
FROM melding $$ 

