create database bd_mahina_slim;

use bd_mahina_slim;

create table tb_endereco
(
	id_endereco int(11) auto_increment not null primary key
    , logradouro varchar(200) 
    , numero varchar(10)
    , complemento varchar(200)
    , cep varchar(8)
    , bairro varchar(200)
    , cidade varchar(200)
    , uf varchar(2)
    , telefone varchar(20)
    , celular varchar(20)
    , email varchar(200)
    , dt_criacao timestamp default current_timestamp
    , criado_por int(11) not null
    , dt_modificacao datetime
    , modificado_por int(11)
    , ativo smallint(4) default 1
)engine=InnoDB;

alter table tb_endereco add constraint fk_criado_por_endereco foreign key (criado_por) references tb_usuario (id_usuario);

create table tb_empresa
(
	id_empresa int(11) auto_increment not null primary key
    , nome varchar(200) not null
    , nome_fantasia varchar(200)
    , cnpj varchar(18)
    , id_endereco int(11) not null
    , dt_criacao timestamp default current_timestamp
    , criado_por int(11) not null
    , dt_modificacao datetime
    , modificado_por int(11)
    , ativo smallint(4) default 1
)engine=InnoDB;

alter table tb_empresa add constraint fk_id_endereco_empresa foreign key (id_endereco) references tb_endereco (id_endereco);
alter table tb_empresa add constraint fk_criado_por_empresa foreign key (criado_por) references tb_usuario (id_usuario);

create table tb_pessoa
(
	id_pessoa int(11) auto_increment not null primary key
    , nome varchar(200) not null
    , apelido varchar(200)
    , data_de_nascimento datetime    
    , cpf varchar(14)
    , rg varchar(25)
    , id_endereco int(11)  
    , id_empresa int(11)
    , dt_criacao timestamp default current_timestamp
    , criado_por int(11) not null
    , dt_modificacao datetime
    , modificado_por int(11)
    , ativo smallint(4) default 1
)engine=InnoDB;

alter table tb_pessoa add constraint fk_id_endereco_pessoa foreign key (id_endereco) references tb_endereco (id_endereco);
alter table tb_pessoa add constraint fk_id_empresa_pessoa foreign key (id_empresa) references tb_empresa (id_empresa);

insert into tb_pessoa (nome, criado_por) 
	values ("Administrador", 1);

create table tb_usuario 
(
	id_usuario int(11) auto_increment not null primary key
    , id_pessoa int(11) not null
    , login varchar(25) not null
    , senha varchar(300) not null
    , dt_criacao timestamp default current_timestamp
    , criado_por int(11) not null
    , dt_modificacao datetime
    , modificado_por int(11)
    , ativo smallint(4) default 1
)engine=InnoDB;

alter table tb_usuario add constraint fk_id_pessoa_usuario foreign key (id_pessoa) references tb_pessoa (id_pessoa);
    
insert into tb_usuario (id_pessoa, login, senha, criado_por)
	values (1, '111.111.111-11', '10203040', 1);
                
select * from tb_usuario;

create table tb_log_acesso(
	id_log int(11) auto_increment not null,
    id_usuario int(11),
    login varchar(14) not null,
    acesso varchar(10) not null,
    data_do_cadastro timestamp default current_timestamp,
    ativo smallint default 1,
    primary key(id_log)
)engine=InnoDB;

drop table tb_log_acesso;