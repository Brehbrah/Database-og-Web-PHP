DELIMITER $$

DROP TRIGGER IF EXISTS Reise_BRI $$

CREATE TRIGGER Reise_BRI
  BEFORE INSERT ON Reise
  FOR EACH ROW
BEGIN
  IF NEW.TilDato < NEW.FraDato THEN
    SIGNAL SQLSTATE '80000'
    SET MESSAGE_TEXT = 'FraDato må være før TilDato!';
  END IF;
END $$

DELIMITER ;

-- Tester reise som ikke er ok

INSERT INTO Reise(RNr, Beskrivelse, FraDato, TilDato, ANr, Godkjent) VALUES
  (9, 'Konferanse', '2017-04-20', '2017-04-15', 1, FALSE);

-- Tester reise som er ok

INSERT INTO Reise(RNr, Beskrivelse, FraDato, TilDato, ANr, Godkjent) VALUES
  (9, 'Konferanse', '2017-04-10', '2017-04-15', 1, FALSE);
