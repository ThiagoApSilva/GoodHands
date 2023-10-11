create database goodhands;
use goodhands;

create table cadastro(
	id_usuario int auto_increment primary key,
	nome varchar(150)not null,
	usuario varchar(20)not null unique,
	senha varchar(50)not null,
	email varchar(100)not null unique,
	cep varchar(20),
	uf varchar(50),
	ibge varchar(20),
	cidade varchar(100),
	bairro varchar(100),
	rua varchar(100),
	numero varchar(100),
	telefone varchar(15)not null,
	arquivo varchar(50),
	dt_nascimento date,
	coren varchar(100)unique,
	foto varchar(50),
	descricao varchar(4000),
	categoria varchar(100)
);
	
create table registro_chat(
	id_registro int auto_increment primary key,
	id_criador int(10)not null,
	id_receptor int(10)not null,
	nome_chat varchar(100)not null unique
	);

create table chat(
	id_chat int auto_increment primary key,
	msg varchar(100)not null,
	envio int(5),
	conversa varchar(8000)
	);

create table denuncia(
	id_denuncia int auto_increment primary key,
	id_denunciador int(10)not null,
	id_denunciado int(10),
	mensagem varchar(8000)not null
);

create table contrato(
	id_contrato int auto_increment primary key,
	email varchar (150),
	telefone varchar (15),
	nome varchar (100),
	numero_cartao varchar (20),
	cpf varchar (15),
	dt_vencimento varchar (10),
	cvv int (3),
	cep varchar (8),
	uf varchar (100),
	cidade varchar (100),
	bairro varchar (100),
	rua varchar (100),
	numero int (100),
	profissional varchar (100),
	valor varchar (100),
	hora varchar (100)
);

create table previa_contrato(
	id_previa int auto_increment primary key,
	id_cliente int (10),
	id_cuidador int (10),
	tempo varchar (10),
	valor decimal (10.2),
	liberacao varchar(100),
	finalizado varchar(100)
);

create table especificacao(
	id_especificacao int auto_increment primary key,
	nome_especificacao varchar(100)
);

create table registro_especificacao(
	id_registro int auto_increment primary key,
	nome_especificacao varchar(100)not null,
	id_usuario int (5) not null
);