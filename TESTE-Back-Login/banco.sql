create database projeto_login;

use projeto_login;

CREATE TABLE usuarios (
  id_usuarios int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nome varchar(30) DEFAULT NULL,
  ano varchar(30) DEFAULT NULL,
  email varchar(40) DEFAULT NULL,
  senha varchar(32) DEFAULT NULL
);

INSERT INTO usuarios VALUES(14845122, "John Doe", "2019", "john@doe.com", "johndoe");
INSERT INTO usuarios VALUES(48466161, "Jane Doe", "2020", "jane@doe.com", "janedoe");
