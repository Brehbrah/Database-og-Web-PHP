DELIMITER $$

DROP TRIGGER IF EXISTS trg_sjekk_paamelding $$

CREATE TRIGGER trg_sjekk_paamelding
  BEFORE INSERT ON deltakelse
  FOR EACH ROW
BEGIN
  DECLARE v_ant_plasser INTEGER;
  DECLARE v_ant_deltakere INTEGER;

  SELECT ant_plasser INTO v_ant_plasser
  FROM rom, presentasjon
  WHERE presentasjon.romkode = rom.romkode
  AND presentasjon.pid = NEW.pid;

  SELECT COUNT(*) INTO v_ant_deltakere
  FROM deltakelse
  WHERE pid = NEW.pid;

  IF v_ant_deltakere >= v_ant_plasser THEN
    SIGNAL SQLSTATE '80000'
    SET MESSAGE_TEXT = 'Ingen ledige plasser på denne presentasjonen!';
  END IF;

END $$

DELIMITER ;



-- Test

UPDATE rom
SET ant_plasser = 1
WHERE romkode='A-205'; 

INSERT INTO deltakelse(pid, epost) VALUES
  (2, 'lise@xyz.no');

UPDATE rom
SET ant_plasser = 110
WHERE romkode='A-205'; 


