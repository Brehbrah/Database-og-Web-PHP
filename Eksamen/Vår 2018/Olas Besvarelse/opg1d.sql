DELIMITER $$ --KandidatNUMMER 22
DROP PROCEDURE IF EXISTS nyBane
$$
CREATE PROCEDURE nyBane(IN NyNavn VARCHAR(100), OUT bNr int)
BEGIN
DECLARE baneNr int;
INSERT INTO `bane`(`Navn`) VALUES (NyNavn);
SELECT LAST_INSERT_ID() INTO baneNr;
	INSERT INTO `hull` VALUES (baneNr,1,0,0);
    INSERT INTO `hull` VALUES (baneNr,2,0,0);
    INSERT INTO `hull` VALUES (baneNr,3,0,0);
    INSERT INTO `hull` VALUES (baneNr,4,0,0);
    INSERT INTO `hull` VALUES (baneNr,5,0,0);
    INSERT INTO `hull` VALUES (baneNr,6,0,0);
    INSERT INTO `hull` VALUES (baneNr,7,0,0);
    INSERT INTO `hull` VALUES (baneNr,8,0,0);
    INSERT INTO `hull` VALUES (baneNr,9,0,0);
    INSERT INTO `hull` VALUES (baneNr,10,0,0);
    INSERT INTO `hull` VALUES (baneNr,11,0,0);
    INSERT INTO `hull` VALUES (baneNr,12,0,0);
    INSERT INTO `hull` VALUES (baneNr,13,0,0);
    INSERT INTO `hull` VALUES (baneNr,14,0,0);
    INSERT INTO `hull` VALUES (baneNr,15,0,0);
    INSERT INTO `hull` VALUES (baneNr,16,0,0);
    INSERT INTO `hull` VALUES (baneNr,17,0,0);
    INSERT INTO `hull` VALUES (baneNr,18,0,0);
SET bNr = baneNr;
END
$$
DELIMITER ;

Jeg ville brukt en for-løkke her, men syntaksen fikk jeg ikke til å fungere i precedyren.

Hvordan kan den testes?

Du kan skrive sqlspørring fra PHP eller rett i phpMyAdmin:
Spørring = CALL nyBane("NyttNavnPåBane", @test);
Så kan du sjekke det nye banenummeret du har fått ved:
spørring = SELECT @test;