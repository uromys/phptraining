USE `listeobjet`;

CREATE TABLE IF NOT EXISTS `listeobjet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `objet` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
)
INSERT INTO listeobjet(objet,description) VALUES ("oven","red");

INSERT INTO listeobjet(objet,description) VALUES ("kettle","glass");
INSERT INTO listeobjet(objet,description) VALUES ("kettle","blue");
INSERT INTO listeobjet(objet,description) VALUES ("kettle","stainless steel");
INSERT INTO listeobjet(objet,description) VALUES ("kettle","stainless steel red" );
INSERT INTO listeobjet(objet,description) VALUES ("tv","32 inch smart");
INSERT INTO listeobjet(objet,description) VALUES ("tv","32 inch smart");
listeobjet(objet,description) VALUES ("tv","led 40 inch 32 go");

INSERT INTO listeobjet(objet,description) VALUES ("oven","red 60 L");
INSERT INTO listeobjet(objet,description) VALUES ("iphone","red cable");

INSERT INTO listeobjet(objet,description) VALUES ("oven","red 60 L");

INSERT INTO listeobjet(objet,description) VALUES ("oven","aluminium 32 L");

INSERT INTO listeobjet(objet,description) VALUES ("mixer","red stand");
