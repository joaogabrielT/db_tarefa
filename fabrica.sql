CREATE DATABASE fabrica
USE fabrica

CREATE TABLE tbl_usuarios
(      usu_codigo int primary key auto_increment,
       usu_nome varchar(40),
       usu_email varchar(45))
       
CREATE TABLE tbl_tarefas
(      tar_codigo int primary key auto_increment,
       tar_setor int,
       tar_prioridade varchar(45),
       tar_descrição varchar(45),
       tar_status varchar(45))