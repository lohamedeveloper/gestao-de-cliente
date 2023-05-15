CREATE DATABASE IF NOT EXISTS kabum CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

use kabum;

create table usuarios (
	
    id 			  int not null auto_increment,
	nome 		  varchar(255),
	email 		  varchar(255) not null unique,
	senha 		  varchar(255) not null,

	primary key (id)

)ENGINE=INNODB;

create table clientes (
	
    id 			    int not null auto_increment,
	nome 		    varchar(255),
	cpf 		    varchar(14)  not null unique,
    rg 		        varchar(12)  not null unique,
	dataNascimento  varchar(10)  not null unique,
    telefone 		varchar(14)  not null,

	primary key (id)

)ENGINE=INNODB;

create table enderecos (
	
    id 			      int not null auto_increment,
    idCliente 		  int not null,
	cep 		      varchar(9),
	endereco          varchar(255)  not null,
	numero 		      varchar(10)   not null,
    bairro 		      varchar(255)  not null,
    cidade   		  varchar(255)  not null,
    estado   		  varchar(50)   not null,

    primary key (id),
    CONSTRAINT fk_cliente
	FOREIGN KEY (idCliente) REFERENCES clientes(id)
	ON DELETE CASCADE

)ENGINE=INNODB;