-- LØSNINGSFORSLAG ØVING 8: Triggere

-- ***************************************************
-- OPPGAVE 1

-- Navn på personer skal lagres med store bokstaver.

DELIMITER $$

DROP TRIGGER IF EXISTS bruker_b_ins_trg $$
DROP TRIGGER IF EXISTS bruker_b_upd_trg $$

CREATE TRIGGER bruker_b_ins_trg
BEFORE INSERT ON bruker
FOR EACH ROW
BEGIN
  SET NEW.fornavn = UPPER(NEW.fornavn);
  SET NEW.etternavn = UPPER(NEW.etternavn);
END $$

CREATE TRIGGER bruker_b_upd_trg
BEFORE UPDATE ON bruker
FOR EACH ROW
BEGIN
  SET NEW.fornavn = UPPER(NEW.fornavn);
  SET NEW.etternavn = UPPER(NEW.etternavn);
END $$

-- Testing

SELECT TRIGGER_SCHEMA, TRIGGER_NAME
FROM INFORMATION_SCHEMA.TRIGGERS $$

INSERT INTO bruker(bnr, epost, passord, fornavn, etternavn, er_ansatt)
  VALUES (99, 'ph@xys.no', 'hemmeligogkryptert', 'PeR', 'hansen', 0) $$

SELECT * FROM bruker $$

UPDATE bruker
  SET fornavn='ola', etternavn='li'
  WHERE bnr = 99 $$

DELETE FROM bruker WHERE bnr = 99 $$

-- Rydd opp før neste oppgave, der vi også skal lage
-- triggere mot bruker-tabellen:

DROP TRIGGER IF EXISTS bruker_b_ins_trg $$

DROP TRIGGER IF EXISTS bruker_b_upd_trg $$


-- ***************************************************
-- OPPGAVE 2

-- Hver gang noen endrer passord (i tabell bruker)
-- skal dette loggføres i en egen tabell med
-- brukernavn og tidspunkt for endring. Tidspunkt og
-- brukernavn skal lagres.

-- Lager tabellen først

DROP TABLE IF EXISTS passord_logg $$

CREATE TABLE passord_logg
(
  id INT AUTO_INCREMENT,
  epost varchar(40),
  gammelt_passord varchar(50),
  nytt_passord varchar(50),
  tidspunkt DATE,
  bruker VARCHAR(20),
  PRIMARY KEY (id)
) $$


-- Lager AFTER-triggeren:

DROP TRIGGER IF EXISTS bruker_a_upd_trg $$

CREATE TRIGGER bruker_a_upd_trg
  AFTER UPDATE ON bruker
  FOR EACH ROW
BEGIN
  DECLARE v_bruker VARCHAR(20);

  SELECT USER() INTO v_bruker
  FROM dual;
  
  INSERT INTO passord_logg
  (
    epost,
    gammelt_passord,
    nytt_passord,
    tidspunkt,
    bruker
  )
  VALUES
  (
    NEW.epost,
    OLD.passord,
    NEW.passord,
    NOW(),
    v_bruker);
END $$
  
-- Testing

UPDATE bruker 
SET passord = 'nyttkryptertpassord'
WHERE bnr = 1 $$

SELECT * FROM passord_logg $$


-- ********************************************************
-- OPPGAVE 3

-- Lag en trigger som sørger for at status for nye
-- varer settes til "aktiv".
  
DROP TRIGGER IF EXISTS vare_b_ins_trg $$

CREATE TRIGGER vare_b_ins_trg
  BEFORE INSERT ON vare
  FOR EACH ROW
BEGIN
  SET NEW.er_aktiv = 1;
END $$

-- Testing

INSERT INTO vare
(
  varekode,
  betegnelse,
  pris_pr_enhet,
  lager_antall
)
VALUES
(
  '999',
  'Ny vare',
  '120.00',
  50
) $$

DELETE FROM vare WHERE varekode = '999' $$

SELECT * FROM vare $$


-- ***************************************************
-- OPPGAVE 4

-- Varepriser må være mellom 0 og 10 000.

-- Dette lar seg formulere som en CHECK contraint,
-- og MySQL godtar syntaksen:

ALTER TABLE vare
ADD CHECK (pris_pr_enhet < 10000) $$

-- Men det ser ikke ut til at MySQL kontrollerer
-- regelen, så da må vi bruke triggere i stedet.

-- Viser bare UPDATE-triggeren:

DROP TRIGGER IF EXISTS vare_b_upd_trg $$

CREATE TRIGGER vare_b_upd_trg
  BEFORE UPDATE ON vare
  FOR EACH ROW
BEGIN
  IF NOT (NEW.pris_pr_enhet BETWEEN 0 AND 10000) THEN
    SIGNAL SQLSTATE '80000'
    SET MESSAGE_TEXT = 'Ulovlig pris!';
  END IF;
END $$

-- Testing

UPDATE vare
SET pris_pr_enhet = -1
WHERE varekode = '10820' $$

UPDATE vare
SET pris_pr_enhet = 20000
WHERE varekode = '10820' $$


-- ***************************************************
-- OPPGAVE 5

-- Ingen prisendringer skal være større enn 50%.
-- Lag en BEFORE-trigger som sikrer dette.
-- Ved brudd skal triggeren kaste et unntak (SIGNAL).

DROP TRIGGER IF EXISTS vare_b_upd_trg $$

CREATE TRIGGER vare_b_upd_trg
  BEFORE UPDATE ON vare
  FOR EACH ROW
BEGIN
  IF NEW.pris_pr_enhet > (OLD.pris_pr_enhet * 2) THEN
    SIGNAL SQLSTATE '80000'
    SET MESSAGE_TEXT = 'For stor prisøkning!';
  END IF;
END $$

-- Testing fra MySQL

UPDATE vare
SET pris_pr_enhet = pris_pr_enhet * 3
WHERE varekode = '10820' $$

-- Testing fra PHP

-- Det er bare å utføre spørringen over via mysqli,
-- og så teste mysqli_errno() etterpå.

-- ***************************************************
-- Det er lett å miste oversikten over hvilke triggere
-- som er definert.

-- Følgende lager et "skript" som kan brukes for
-- å slette alle triggere (og samtidig får man se
-- hvilke triggere som er definert.

SELECT CONCAT('DROP TRIGGER IF EXISTS ',
  TRIGGER_SCHEMA, '.', TRIGGER_NAME, ';') AS "SQL"
FROM INFORMATION_SCHEMA.TRIGGERS

-- ***************************************************