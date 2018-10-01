-- Oppgave 1e


-- Lager tabellen

CREATE TABLE `logg`
(
  `id` INTEGER(6) AUTO_INCREMENT,
  `regnr` CHAR(7) NOT NULL,
  `gammel_aarsmodell` SMALLINT(6),
  `ny_aarsmodell` SMALLINT(6),
  `bruker` CHAR(16),
  `tidspunkt` DATE,
  PRIMARY KEY (`id`)
);


-- Lager triggeren

DELIMITER $$

DROP TRIGGER IF EXISTS kjoretoy_a_upd_trg $$

CREATE TRIGGER kjoretoy_a_upd_trg
  AFTER UPDATE ON kjoretoy
  FOR EACH ROW
BEGIN
  IF OLD.aarsmodell <> NEW.aarsmodell THEN
    INSERT INTO logg(regnr, gammel_aarsmodell, ny_aarsmodell, bruker, tidspunkt)
    VALUES (NEW.regnr, OLD.aarsmodell, NEW.aarsmodell, USER(), NOW());
  END IF;
END $$

DELIMITER ;


-- Tester

UPDATE kjoretoy
SET aarsmodell = aarsmodell + 1;