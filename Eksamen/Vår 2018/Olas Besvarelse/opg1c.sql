DELIMITER $$ --KandidatNUMMER 22
DROP TRIGGER IF EXISTS deltagere
$$
CREATE TRIGGER deltagere
BEFORE INSERT ON resultat
FOR EACH ROW
BEGIN
DECLARE antallSpillere int;
SELECT COUNT(DISTINCT r.SpillerNr) INTO antallSpillere from resultat as r WHERE r.RundeNr = NEW.RundeNr;
IF antallSpillere >= 4 THEN	
	SIGNAL SQLSTATE '20000'
	SET MESSAGE_TEXT = 'Det er ikke lov med flere en 4 spillere';
	END IF;
END
$$
DELIMITER ;

Hvordan kan man teste dette?
Du kan teste denne triggeren ved å legge til flere spillere i Spiller tabellen
Det må være minst 5 spillere for at dette skal fungere grunnet primærnøklene i resultat
Du kan deretter legge inn alle spillerne i samme runde i resultat og du vil få en 
feilmelding når du legger til den siste spileren i SQL vinduet. Spilleren blir ikke lagt til
grunnet exception som kastes. Dette kan også sjekkes i PHP om man lager et form for å legge til
spillereresultater fler ganger. Du kan da sjekke dette med msqli-error og signal error message.