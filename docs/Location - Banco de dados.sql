DROP TABLE location_log;
DROP TABLE location_log_navegacao;
DROP TABLE location_paginas;
DROP TABLE location_planos;

CREATE TABLE location_clientes(
	cnpj CHAR(14),
	endereco VARCHAR(100) NOT NULL,
	numero VARCHAR(10) NOT NULL,
	bairro VARCHAR(50) NOT NULL,
	cidade VARCHAR(50) NOT NULL,
	estado VARCHAR(30) NOT NULL,
	cep CHAR(8) NOT NULL,
	razao varchar(255) NOT NULL,
	telefone VARCHAR(11) NOT NULL,
	email VARCHAR(255) NOT NULL,
	responsavel VARCHAR(255) NOT NULL,
	preco_consulta DECIMAL(9,2) NOT NULL,
	PRIMARY KEY (cnpj)
);
CREATE TABLE location_usuarios(
	usuario varchar(50),
	senha varchar(30) NOT NULL,
	email varchar(150),
	nome varchar(150) NOT NULL,
	empresa CHAR(14),
	limite INT NOT NULL DEFAULT 0,
	tipo CHAR(1),
	PRIMARY KEY (usuario),
	FOREIGN KEY (empresa) REFERENCES location_clientes(cnpj)
);
CREATE TABLE location_faturas(
	id INT identity, 
	periodo_inicial DATETIME NOT NULL,
	periodo_final DATETIME NOT NULL,
	valor_total  DECIMAL(9,2) NOT NULL,
	status CHAR(1),
	empresa CHAR(14),
	PRIMARY KEY (id),
	FOREIGN KEY (empresa) REFERENCES location_clientes(cnpj)
); 
/* TABELA: location_log
 * FUNÇÃO: Armazenar os logs das pesquisas realizadas pelos usuários
 */
CREATE TABLE location_log (
	id INT identity,
	usuario VARCHAR(255) NOT NULL,
	data DATETIME NOT NULL,
	sessao VARCHAR(40) NOT NULL,
	cpf_pesquisado CHAR(11) NOT NULL,
	nome_pesquisado VARCHAR(255) NULL,
	token CHAR(32) NOT NULL,
	retorno INT NOT NULL DEFAULT 0,
	PRIMARY KEY (id),
	FOREIGN KEY (usuario) REFERENCES location_usuarios(usuario)
);