CREATE DATABASE todo;

USE todo;

CREATE TABLE tb_listagem (

	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	descricao VARCHAR(45),
	responsavel BIGINT(255)
);

CREATE TABLE tb_usuario (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	nome VARCHAR(45),
	email VARCHAR(45),
	senha VARCHAR(100)
);

DROP TABLE tb_usuario;
SELECT MD5(1234);

SELECT * FROM tb_usuario;

CREATE TABLE tb_cliente(
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	nome VARCHAR(45)
);

CREATE TABLE tb_envolvido(
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	nome VARCHAR(45),
	email VARCHAR(45),
	telefone VARCHAR(11),
	cliente INT (100)
);

CREATE TABLE tb_chamados (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	envolvido INT(100),
	resumo VARCHAR(45),
	descricao VARCHAR(1000)
	
);


SELECT
  c.`id` AS id_chamado,
  cl.`nome` AS cliente,
  c.`resumo` AS resumo,
  c.`descricao` AS descricao,
  e.`nome` AS envolvido,
  e.`email` AS email,
  e.`telefone` AS telefone
FROM
  tb_chamados c
  JOIN tb_envolvido e
    ON c.`envolvido` = e.`id`
  JOIN tb_cliente cl
    ON e.`cliente` = cl.`id`;

