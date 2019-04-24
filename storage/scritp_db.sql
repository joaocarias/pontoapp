use bd_ponto_app;
select * from tb_log_acesso;
select * from tb_empresa;

CREATE TABLE `tb_log_update` (
  `id_log` int(11) NOT NULL AUTO_INCREMENT,
  `tabela` varchar(30) NULL,
  `id_tabela` int(11)  NULL,
  `reg_log` varchar(10000) NOT NULL,
  `criado_por` int(11) NULL ,
  `data_do_cadastro` timestamp NOT NULL DEFAULT current_timestamp(),
  `ativo` smallint(6) DEFAULT 1,
  PRIMARY KEY (`id_log`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

select * from tb_log_update order by id_log desc; 

select * from tb_endereco;

select * from tb_usuario;

CREATE TABLE `tb_unidade` (
  `id_unidade` int(11) NOT NULL AUTO_INCREMENT,
  `id_empresa` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,  
  `dt_criacao` timestamp NOT NULL DEFAULT current_timestamp(),
  `criado_por` int(11) NOT NULL,
  `dt_modificacao` datetime DEFAULT NULL,
  `modificado_por` int(11) DEFAULT NULL,
  `ativo` smallint(4) DEFAULT 1,
  PRIMARY KEY (`id_unidade`),
  KEY `fk_criado_por_unidade` (`criado_por`),
  CONSTRAINT `fk_criado_por_unidade` FOREIGN KEY (`criado_por`) REFERENCES `tb_usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

select * from tb_unidade;

alter table tb_unidade add CONSTRAINT `fk_id_empresa_unidade` FOREIGN KEY (`id_empresa`) REFERENCES `tb_empresa` (`id_empresa`);

select * from tb_log_update;


CREATE TABLE `tb_feriado` (
  `id_feriado` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) NOT NULL,
  `dt_feriado` date NOT NULL,
  `dt_criacao` timestamp NOT NULL DEFAULT current_timestamp(),
  `criado_por` int(11) NOT NULL,
  `dt_modificacao` datetime DEFAULT NULL,
  `modificado_por` int(11) DEFAULT NULL,
  `ativo` smallint(4) DEFAULT 1,
  PRIMARY KEY (`id_feriado`),
  KEY `fk_criado_por_feriado` (`criado_por`),
  CONSTRAINT `fk_criado_por_feriado` FOREIGN KEY (`criado_por`) REFERENCES `tb_usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `tb_pdn` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(10) NOT NULL,
  `descricao` varchar(200) NOT NULL,  
  `dt_criacao` timestamp NOT NULL DEFAULT current_timestamp(),
  `criado_por` int(11) NOT NULL,
  `dt_modificacao` datetime DEFAULT NULL,
  `modificado_por` int(11) DEFAULT NULL,
  `ativo` smallint(4) DEFAULT 1,
  PRIMARY KEY (`id`),
  KEY `fk_criado_por_pdn` (`criado_por`),
  CONSTRAINT `fk_criado_por_pdn` FOREIGN KEY (`criado_por`) REFERENCES `tb_usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- insert into tb_pdn (`codigo`, `descricao`,`criado_por`) VALUES('7010', 'FALTA HORA', '1'); 

select * from tb_pdn;


CREATE TABLE `tb_funcao` (
  `id_funcao` int(11) NOT NULL AUTO_INCREMENT,
  `id_empresa` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,  
  `dt_criacao` timestamp NOT NULL DEFAULT current_timestamp(),
  `criado_por` int(11) NOT NULL,
  `dt_modificacao` datetime DEFAULT NULL,
  `modificado_por` int(11) DEFAULT NULL,
  `ativo` smallint(4) DEFAULT 1,
  PRIMARY KEY (`id_funcao`),
  KEY `fk_criado_por_funcao` (`criado_por`),
  CONSTRAINT `fk_criado_por_funcao` FOREIGN KEY (`criado_por`) REFERENCES `tb_usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

alter table tb_funcao add CONSTRAINT `fk_id_empresa_funcao` FOREIGN KEY (`id_empresa`) REFERENCES `tb_empresa` (`id_empresa`);

select * from tb_funcao;

CREATE TABLE `tb_tipo_jornada_de_trabalho` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) NOT NULL,
  `id_empresa` int(11) NOT NULL,
  `dt_criacao` timestamp NOT NULL DEFAULT current_timestamp(),
  `criado_por` int(11) NOT NULL,
  `dt_modificacao` datetime DEFAULT NULL,
  `modificado_por` int(11) DEFAULT NULL,
  `ativo` smallint(4) DEFAULT 1,
  PRIMARY KEY (`id`),
  KEY `fk_criado_por_tipo_jornada_de_trabalho` (`criado_por`),
  CONSTRAINT `fk_criado_por_jornada_de_trabalho` FOREIGN KEY (`criado_por`) REFERENCES `tb_usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

alter table tb_tipo_jornada_de_trabalho add CONSTRAINT `fk_id_empresa_jornada_de_trabalho` FOREIGN KEY (`id_empresa`) REFERENCES `tb_empresa` (`id_empresa`);

select * from tb_usuario;
select * from tb_pessoa;

CREATE TABLE `tb_funcionario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pessoa` int(11) NOT NULL, 
  `pis` VARCHAR(13) NOT NULL,
  `matricula` int(11),
  `dt_criacao` timestamp NOT NULL DEFAULT current_timestamp(),
  `criado_por` int(11) NOT NULL,
  `dt_modificacao` datetime DEFAULT NULL,
  `modificado_por` int(11) DEFAULT NULL,
  `ativo` smallint(4) DEFAULT 1,
  PRIMARY KEY (`id`),
  KEY `fk_criado_por_funcionario` (`criado_por`), 
  CONSTRAINT `fk_criado_por_funcionario` FOREIGN KEY (`criado_por`) REFERENCES `tb_usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `tb_funcionario` ADD CONSTRAINT `fk_id_pessoa_funcionario` FOREIGN KEY (`id_pessoa`) REFERENCES `tb_pessoa` (`id_pessoa`);
select * from tb_funcionario;
select * from tb_pessoa;
select * from tb_endereco;
select * from tb_usuario;

CREATE TABLE `tb_lotacao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_funcionario` int(11) NOT NULL, 
  `id_unidade` int(11) NOT NULL, 
  `id_funcao` int(11) NOT NULL, 
  `dt_inicio_lotacao` date NOT NULL,
  `dt_fim_lotacao` date,
  `dt_criacao` timestamp NOT NULL DEFAULT current_timestamp(),
  `criado_por` int(11) NOT NULL,
  `dt_modificacao` datetime DEFAULT NULL,
  `modificado_por` int(11) DEFAULT NULL,
  `ativo` smallint(4) DEFAULT 1,
  PRIMARY KEY (`id`),
  KEY `fk_criado_por_lotacao` (`criado_por`), 
  CONSTRAINT `fk_criado_por_lotacao` FOREIGN KEY (`criado_por`) REFERENCES `tb_usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `tb_lotacao` ADD CONSTRAINT `fk_id_funcionario_lotacao` FOREIGN KEY (`id_funcionario`) REFERENCES `tb_funcionario` (`id`);
ALTER TABLE `tb_lotacao` ADD CONSTRAINT `fk_id_unidade_lotacao` FOREIGN KEY (`id_unidade`) REFERENCES `tb_unidade` (`id_unidade`);
ALTER TABLE `tb_lotacao` ADD CONSTRAINT `fk_id_funcao_lotacao` FOREIGN KEY (`id_funcao`) REFERENCES `tb_funcao` (`id_funcao`);

select * from tb_unidade;
select * from tb_usuario;
select * from tb_pessoa;

select * from tb_lotacao;



select * from tb_tipo_jornada_de_trabalho;



insert into tb_tipo_jornada_de_trabalho (nome, id_empresa, criado_por)
	Values('DIÁRIA', '1','1');
insert into tb_tipo_jornada_de_trabalho (nome, id_empresa, criado_por)
	Values('PLANTÃO', '1','1');
    
    select * from tb_lotacao;

CREATE TABLE `tb_jornada_de_trabalho` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_empresa` int(11) NOT NULL, 
  `id_tipo_jornada_de_trabalho` int(11) NOT NULL,
  `descricao` varchar(200) NOT NULL,
  `seg` int(11) default 0,
  `ter` int(11) default 0,
  `qua` int(11) default 0,
  `qui` int(11) default 0,
  `sex` int(11) default 0,
  `sab` int(11) default 0,
  `dom` int(11) default 0,  
  `num_plantoes` int(11) default 0,
  `carga_plantao` int(11) default 0,  
  `dt_criacao` timestamp NOT NULL DEFAULT current_timestamp(),
  `criado_por` int(11) NOT NULL,
  `dt_modificacao` datetime DEFAULT NULL,
  `modificado_por` int(11) DEFAULT NULL,
  `ativo` smallint(4) DEFAULT 1,
  PRIMARY KEY (`id`),
  KEY `fk_criado_por_jornada_de_trabalho1` (`criado_por`), 
  CONSTRAINT `fk_criado_por_jornada_de_trabalho1` FOREIGN KEY (`criado_por`) REFERENCES `tb_usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `tb_jornada_de_trabalho` ADD CONSTRAINT `fk_id_empresa_jornada_de_trabalho2` FOREIGN KEY (`id_empresa`) REFERENCES `tb_empresa` (`id_empresa`);
ALTER TABLE `tb_jornada_de_trabalho` ADD CONSTRAINT `fk_id_tipo_jornada_de_trabalho2` FOREIGN KEY (`id_tipo_jornada_de_trabalho`) REFERENCES `tb_tipo_jornada_de_trabalho` (`id`);

insert into tb_jornada_de_trabalho (id_empresa, id_tipo_jornada_de_trabalho, descricao,
	seg, ter, qua, qui, sex, criado_por) 
    VALUES ('1', '1', '8 Horas diárias - 40 Semanais - De Segunda a Sexta'
    ,'8', '8', '8', '8', '8', '1');

insert into tb_jornada_de_trabalho (id_empresa, id_tipo_jornada_de_trabalho, descricao,
	num_plantoes, carga_plantao, criado_por)
    VALUES ('1', '2', 'Escala de 12 plantões por 12 dias - 144 horas mensais', '12', '12', '1');

insert into tb_jornada_de_trabalho (id_empresa, id_tipo_jornada_de_trabalho, descricao,
	seg, ter, qua, qui, sex, sab, criado_por) 
    VALUES ('1', '1', '25 horas semanais - 5 Horas diárias De Segunda a Sexta'
    ,'300', '300', '300', '300', '300', '0', '1');

insert into tb_jornada_de_trabalho (id_empresa, id_tipo_jornada_de_trabalho, descricao,
	num_plantoes, carga_plantao, criado_por)
    VALUES ('1', '2', 'Escala de 10 plantões de 12 horas - 120 horas mensais', '10', '12', '1');

select * from tb_jornada_de_trabalho;

select * from tb_empresa;

CREATE TABLE `tb_lotacao_jornada_de_trabalho` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_lotacao` int(11) NOT NULL, 
  `id_jornada_de_trabalho` int(11) NOT NULL,
  `dt_criacao` timestamp NOT NULL DEFAULT current_timestamp(),
  `criado_por` int(11) NOT NULL,
  `dt_modificacao` datetime DEFAULT NULL,
  `modificado_por` int(11) DEFAULT NULL,
  `ativo` smallint(4) DEFAULT 1,
  PRIMARY KEY (`id`),
  KEY `fk_criado_por_lotacao_jornada_de_trabalho_jornada_de_trabalho1` (`criado_por`), 
  CONSTRAINT `fk_criado_por_lotacao_jornada_de_trabalho_jornada_de_trabalho1` FOREIGN KEY (`criado_por`) REFERENCES `tb_usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `tb_lotacao_jornada_de_trabalho` ADD CONSTRAINT `fk_id_lotacao_lotacao_jornada_de_trabalho2` FOREIGN KEY (`id_lotacao`) REFERENCES `tb_lotacao` (`id`);
ALTER TABLE `tb_lotacao_jornada_de_trabalho` ADD CONSTRAINT `fk_id_jornada_de_trabalho_lotac` FOREIGN KEY (`id_jornada_de_trabalho`) REFERENCES `tb_jornada_de_trabalho` (`id`);

select * from tb_lotacao_jornada_de_trabalho;

CREATE TABLE `tb_lotacao_registra_ponto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_lotacao` int(11) NOT NULL, 
  `registra_ponto` varchar(20) NOT NULL,
  `dt_criacao` timestamp NOT NULL DEFAULT current_timestamp(),
  `criado_por` int(11) NOT NULL,
  `dt_modificacao` datetime DEFAULT NULL,
  `modificado_por` int(11) DEFAULT NULL,
  `ativo` smallint(4) DEFAULT 1,
  PRIMARY KEY (`id`),
  KEY `fk_criado_por_lotacao_registra_ponto` (`criado_por`), 
  CONSTRAINT `fk_criado_por_lotacao_registra_ponto` FOREIGN KEY (`criado_por`) REFERENCES `tb_usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `tb_lotacao_registra_ponto` ADD CONSTRAINT `fk_id_lotacao_lotacao_registra_ponto` FOREIGN KEY (`id_lotacao`) REFERENCES `tb_lotacao` (`id`);

select * from tb_lotacao_registra_ponto;

use bd_ponto_app;

select * from tb_pessoa;
select * from tb_usuario;
drop table tb_registro_de_ponto;
create table tb_registro_de_ponto
(
	id int(11) not null auto_increment,
    id_registro int(11) null,
    id_servidor int(11) null,
    id_funcionario int(11) not null, 
    id_empresa int(11) not null,
    dt_entrada datetime,
    dt_saida datetime null,
    tempo_atividade bigint null,
    ponto_em_aberto int(11) default 1,
    nsr_entrada int(11),
    nsr_saida int(11) null,
    id_relogio_entrada int(11),
    id_relogio_saida int(11) null,
    obs varchar(1000),
  `dt_criacao` timestamp NOT NULL DEFAULT current_timestamp(),
  `criado_por` varchar(30) NULL,
  `dt_modificacao` datetime DEFAULT NULL,
  `modificado_por` int(11) DEFAULT NULL,
  `ativo` smallint(4) DEFAULT 1,
  PRIMARY KEY (`id`),
  KEY `fk_id_funcionario_registro_de_ponto` (`id_funcionario`), 
  KEY `fk_id_empresa_registro_de_ponto` (`id_empresa`),
  CONSTRAINT `fk_id_funcionario_registro_de_ponto` FOREIGN KEY (`id_funcionario`) REFERENCES `tb_funcionario` (`id`),
  CONSTRAINT `fk_id_empresa_registro_de_ponto` FOREIGN KEY (`id_empresa`) REFERENCES `tb_empresa` (`id_empresa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

select * from tb_registro_de_ponto;

use bd_ponto_app;

alter table tb_pessoa add column genero varchar(20);
select * from tb_funcionario;
alter table tb_funcionario add column matricula int(11);

select * from tb_lotacao;
select * from tb_lotacao_jornada_de_trabalho;

select * from tb_tipo_jornada_de_trabalho;
select * from tb_jornada_de_trabalho;

update tb_jornada_de_trabalho 
set seg = '510',
ter = '510',
qua = '510',
qui = '510',
sex = '240'
where id = 1;

update tb_jornada_de_trabalho 
set seg = '480',
ter = '480',
qua = '480',
qui = '480',
sex = '480',
sab = '240'
where id = 4;

insert into tb_jornada_de_trabalho (id_empresa, id_tipo_jornada_de_trabalho, descricao,
	seg, ter, qua, qui, sex, sab, criado_por) 
    VALUES ('1', '1', '25 horas semanais - 5 Horas diárias De Segunda a Sexta'
    ,'300', '300', '300', '300', '300', '0', '1');


alter table tb_jornada_de_trabalho add column hora_trabalho int(11) default 60;
update tb_jornada_de_trabalho set hora_trabalho = 60 where ativo = 1;

select * from tb_feriado;


create table tb_competencia (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_empresa` int(11) NOT NULL, 
  `mes` int(11) NOT NULL,
  `ano` int(11) NOT NULL,
  `dt_criacao` timestamp NOT NULL DEFAULT current_timestamp(),
  `criado_por` int(11) NOT NULL,
  `dt_modificacao` datetime DEFAULT NULL,
  `modificado_por` int(11) DEFAULT NULL,
  `ativo` smallint(4) DEFAULT 1,
  PRIMARY KEY (`id`),
  KEY `fk_criado_por_tb_competencia` (`criado_por`), 
  KEY `fk_id_empresa_tb_competencia` (`id_empresa`),
  CONSTRAINT `fk_criado_por_tb_competencia` FOREIGN KEY (`criado_por`) REFERENCES `tb_usuario` (`id_usuario`),
  CONSTRAINT `fk_id_empresa_tb_competencia` FOREIGN KEY (`id_empresa`) REFERENCES `tb_empresa` (`id_empresa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

insert into tb_competecia (id_empresa, mes, ano, criado_por) values ('1','1','2018','1');
insert into tb_competecia (id_empresa, mes, ano, criado_por) values ('1','2','2018','1');
insert into tb_competecia (id_empresa, mes, ano, criado_por) values ('1','3','2018','1');
insert into tb_competecia (id_empresa, mes, ano, criado_por) values ('1','4','2018','1');
insert into tb_competecia (id_empresa, mes, ano, criado_por) values ('1','5','2018','1');
insert into tb_competecia (id_empresa, mes, ano, criado_por) values ('1','6','2018','1');
insert into tb_competecia (id_empresa, mes, ano, criado_por) values ('1','7','2018','1');
insert into tb_competecia (id_empresa, mes, ano, criado_por) values ('1','8','2018','1');
insert into tb_competecia (id_empresa, mes, ano, criado_por) values ('1','9','2018','1');
insert into tb_competecia (id_empresa, mes, ano, criado_por) values ('1','10','2018','1');
insert into tb_competecia (id_empresa, mes, ano, criado_por) values ('1','11','2018','1');
insert into tb_competecia (id_empresa, mes, ano, criado_por) values ('1','12','2018','1');
insert into tb_competecia (id_empresa, mes, ano, criado_por) values ('1','1','2019','1');
insert into tb_competecia (id_empresa, mes, ano, criado_por) values ('1','2','2019','1');
insert into tb_competecia (id_empresa, mes, ano, criado_por) values ('1','3','2019','1');
insert into tb_competecia (id_empresa, mes, ano, criado_por) values ('1','4','2019','1');
insert into tb_competecia (id_empresa, mes, ano, criado_por) values ('1','5','2019','1');
insert into tb_competecia (id_empresa, mes, ano, criado_por) values ('1','6','2019','1');
insert into tb_competecia (id_empresa, mes, ano, criado_por) values ('1','7','2019','1');
insert into tb_competecia (id_empresa, mes, ano, criado_por) values ('1','8','2019','1');
insert into tb_competecia (id_empresa, mes, ano, criado_por) values ('1','9','2019','1');
insert into tb_competecia (id_empresa, mes, ano, criado_por) values ('1','10','2019','1');
insert into tb_competecia (id_empresa, mes, ano, criado_por) values ('1','11','2019','1');
insert into tb_competecia (id_empresa, mes, ano, criado_por) values ('1','12','2019','1');
insert into tb_competecia (id_empresa, mes, ano, criado_por) values ('1','1','2020','1');
insert into tb_competecia (id_empresa, mes, ano, criado_por) values ('1','2','2020','1');
insert into tb_competecia (id_empresa, mes, ano, criado_por) values ('1','3','2020','1');
insert into tb_competecia (id_empresa, mes, ano, criado_por) values ('1','4','2020','1');
insert into tb_competecia (id_empresa, mes, ano, criado_por) values ('1','5','2020','1');
insert into tb_competecia (id_empresa, mes, ano, criado_por) values ('1','6','2020','1');
insert into tb_competecia (id_empresa, mes, ano, criado_por) values ('1','7','2020','1');
insert into tb_competecia (id_empresa, mes, ano, criado_por) values ('1','8','2020','1');
insert into tb_competecia (id_empresa, mes, ano, criado_por) values ('1','9','2020','1');
insert into tb_competecia (id_empresa, mes, ano, criado_por) values ('1','10','2020','1');
insert into tb_competecia (id_empresa, mes, ano, criado_por) values ('1','11','2020','1');
insert into tb_competecia (id_empresa, mes, ano, criado_por) values ('1','12','2020','1');
insert into tb_competecia (id_empresa, mes, ano, criado_por) values ('1','1','2021','1');
insert into tb_competecia (id_empresa, mes, ano, criado_por) values ('1','2','2021','1');
insert into tb_competecia (id_empresa, mes, ano, criado_por) values ('1','3','2021','1');
insert into tb_competecia (id_empresa, mes, ano, criado_por) values ('1','4','2021','1');
insert into tb_competecia (id_empresa, mes, ano, criado_por) values ('1','5','2021','1');
insert into tb_competecia (id_empresa, mes, ano, criado_por) values ('1','6','2021','1');
insert into tb_competecia (id_empresa, mes, ano, criado_por) values ('1','7','2021','1');
insert into tb_competecia (id_empresa, mes, ano, criado_por) values ('1','8','2021','1');
insert into tb_competecia (id_empresa, mes, ano, criado_por) values ('1','9','2021','1');
insert into tb_competecia (id_empresa, mes, ano, criado_por) values ('1','10','2021','1');
insert into tb_competecia (id_empresa, mes, ano, criado_por) values ('1','11','2021','1');
insert into tb_competecia (id_empresa, mes, ano, criado_por) values ('1','12','2021','1');

select * from tb_usuario;
select * from tb_pessoa;
select * from tb_lotacao;
select * from tb_funcionario;
select * from tb_endereco;
select * from tb_log_update;

select * from tb_registro_de_ponto;

use bd_ponto_app;

select * from tb_funcionario where pis is not null && pis != "";
select * from tb_registro_de_ponto;
delete from tb_registro_de_ponto where id > 0;


 INSERT INTO tb_registro_de_ponto ( id_registro, id_servidor, id_funcionario, dt_entrada, dt_saida, tempo_atividade, id_relogio_entrada, id_relogio_saida, criado_por, id_empresa )
							VALUES ('431869', '2', '12', '2019-01-07 14:32:00', '2019-01-08 00:00:00', '0', '10', '0', '1', '1');
