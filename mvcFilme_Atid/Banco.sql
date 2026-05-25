create database mvcFilmes;
use mvcFilmes;

CREATE TABLE Filme (
id INT AUTO_INCREMENT PRIMARY KEY,
titulo VARCHAR(255) NOT NULL,
data_lancamento DATE NOT NULL,
sinopse VARCHAR(255) NOT NULL,
genero VARCHAR (255) NOT NULL,
orcamento DOUBLE NULL NOT NULL,
created_at timestamp null,
updated_at timestamp null
);


CREATE TABLE Autor(
id INT AUTO_INCREMENT PRIMARY KEY,
nome VARCHAR(100) null,
data_nascimento DATE NOT NULL,
email VARCHAR(255) NOT NULL,
telefone VARCHAR(20) NULL,
created_at timestamp null,
updated_at timestamp null
);


SELECT * FROM Filme;
SELECT * FROM Autor;


ALTER TABLE Filme
ADD COLUMN filme_id INT NULL,
ADD CONSTRAINT fk_autor_id
FOREIGN KEY (filme_id)
REFERENCES Autor(id)
ON DELETE SET NULL