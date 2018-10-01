DROP TABLE IF EXISTS bruker;

CREATE TABLE bruker
(
  navn VARCHAR(30),
  PRIMARY KEY (navn)
);

INSERT INTO bruker(navn) VALUES ("Anders");
INSERT INTO bruker(navn) VALUES ("Aleksander");
INSERT INTO bruker(navn) VALUES ("Bjørn");
INSERT INTO bruker(navn) VALUES ("Bjørnar");
INSERT INTO bruker(navn) VALUES ("Charlotte");

COMMIT;