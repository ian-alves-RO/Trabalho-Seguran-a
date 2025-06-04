CREATE DATABASE teste_seguro;

USE teste_seguro;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY, 
    usuario VARCHAR(50),
    senha VARCHAR(50)
);

INSERT INTO usuarios (usuario, senha) VALUES 
("admin", "1234");
