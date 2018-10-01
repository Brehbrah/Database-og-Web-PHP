DELIMITER $$

DROP TRIGGER IF EXISTS melding_b_ins_trg $$

CREATE TRIGGER melding_b_ins_trg
BEFORE INSERT ON melding
FOR EACH ROW
BEGIN
  SET NEW.dato = NOW();
END $$

DELIMITER ;

-- Test

INSERT INTO melding(bnr, tittel, tekst)
VALUES (1, 'En tittel', 'Og en tekst.');

SELECT * FROM melding;