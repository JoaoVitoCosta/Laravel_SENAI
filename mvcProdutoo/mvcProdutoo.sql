CREATE DATABASE produtooLaravel;
USE produtooLaravel;

CREATE TABLE produtos (
	id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100),
    quantidade INT,
    preco DOUBLE,
    created_at timestamp null,
    updated_at timestamp null
);

CREATE TABLE setores (
	id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100), -- EX: alimentos | higiene | limpeza --
    num_corredor INT,
	created_at timestamp null,
    updated_at timestamp null
);

ALTER TABLE produtos
ADD COLUMN setor_id INT NULL,
ADD CONSTRAINT fk_produtos_corredor
FOREIGN KEY (setor_id) REFERENCES setores(id) ON DELETE SET NULL;

CREATE TABLE detalheProduto(
	id INT AUTO_INCREMENT PRIMARY KEY,
    descricao VARCHAR(255),
    tamanho INT, -- Pode ser definido em CM ou M --
    peso INT, -- Peso em gramas --
	created_at timestamp null,
    updated_at timestamp null
);


SELECT * FROM detalheProduto;
SELECT * FROM setores;
SELECT * FROM produtos;