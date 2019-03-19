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

select * from tb_funcao;