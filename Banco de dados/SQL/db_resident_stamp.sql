# drop database db_resident_stamp;
create database db_resident_stamp;
	use db_resident_stamp;

	-- Tabelas sem chave estrangeira ------ 
	create table tb_tamanho(
		cd_tamanho int not null,
		sg_tamanho varchar(25),
		constraint pk_tamanho primary key (cd_tamanho)
		);

	create table tb_cor(
		cd_cor int not null,
		nm_cor varchar(20),
		constraint pk_cor primary key (cd_cor)
		);

	create table tb_categoria(
		cd_categoria int not null,
		nm_categoria varchar(50),
		constraint pk_categoria primary key (cd_categoria)
		);

	create table tb_sub_categoria(
		cd_sub_categoria int not null,
		nm_sub_categoria varchar(50),
		constraint pk_sub_categoria primary key (cd_sub_categoria)
		);

	create table tb_estado_usuario(
		cd_estado int(8) not null,
		sg_uf char(2),
		constraint pk_estado_usuario primary key (cd_estado)
		);

	create table tb_pessoa_fisica(
		cd_fisica int not null auto_increment,
		cd_cpf char(11),
		constraint pk_pessoa_fisica primary key (cd_fisica)
		);

	create table tb_pessoa_juridica(
		cd_juridica int(8) not null auto_increment,
		cd_cnpj char(14),
		cd_inscricao_estadual varchar(12),
		constraint pk_pessoa_juridica primary key (cd_juridica)
		);

	create table tb_forma_pagamento(
		cd_pagamento int not null,
		nm_pagamento varchar(25),
		constraint pk_forma_pagamento primary key (cd_pagamento)
		);

	create table tb_forma_retirada(
		cd_retirada int not null,
		nm_retirada varchar(25),
		constraint pk_forma_retirada primary key (cd_retirada)
		);
-- - - - - - Seção: tabelas referentes ao administrador - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

	create table tb_perfil_adm(
		cd_adm int not null auto_increment,
		nm_adm varchar(50),
		nm_email varchar(50),
		cd_senha varchar(50),
		nm_privilegio varchar(30),
		constraint pk_adm primary key (cd_adm)
		);

	create table tb_slider_destaque(
		cd_sd int not null auto_increment,
		cd_produto1 int,
		cd_produto2 int,
		cd_produto3 int,
		cd_produto4 int,
		cd_produto5 int,
		cd_produto6 int,
		im_slider1 varchar(200),
		im_slider2 varchar(200),
		im_slider3 varchar(200),
		im_repre1 varchar(200),
		im_repre2 varchar(200),
		im_repre3 varchar(200),
		constraint pk_sd primary key (cd_sd)
		);


-- - - - - - Seção: tabelas referentes a Postagem - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - 
	
	-- 1
	create table tb_post(
		cd_post int not null auto_increment,
		nm_titulo varchar(150),
		ds_post text(600),
		im_post varchar(200),
		dt_post date,
		hr_post time,
		nm_postador varchar(50),
		constraint pk_post primary key (cd_post)
		);


-- - - - - - Seção: tabelas referentes aos produtos - - - - - - - - - - - - - - - - - - - - - -
	-- Tabelas com  chave estrangeira ------ 
	-- 2
	create table tb_produtos(
		cd_produto int not null auto_increment,
		nm_produto varchar(45),
		ds_produto varchar(200),
		im_produto varchar(200),
		wt_produto decimal(6,2),
		vl_produto decimal(9,2),
		cd_cor int,
		cd_categoria int,
		cd_sub_categoria int,
		constraint pk_produtos primary key (cd_produto),
		constraint fk_produto_cor foreign key (cd_cor) references tb_cor(cd_cor),
		constraint fk_produto_categoria foreign key (cd_categoria) references tb_categoria(cd_categoria),
		constraint fk_produto_sub_categoria foreign key (cd_sub_categoria) references tb_sub_categoria(cd_sub_categoria)
		);

	-- 2
	/*create table tb_estoque(
		cd_estoque int not null auto_increment,
		qt_produto int,
		cd_produto int,
		constraint pk_estoque primary key (cd_estoque),
		constraint fk_estoque_produto foreign key (cd_produto) references tb_produtos(cd_produto)	
		); */

	-- 2
	create table tb_especificacao(
		cd_especificacao int not null auto_increment,
		nm_keyword1 varchar(50),
		nm_keyword2 varchar(50),
		nm_keyword3 varchar(50),
		nm_keyword4 varchar(50),
		cd_produto int,
		constraint pk_especificacao primary key (cd_especificacao),
		constraint fk_especificacao_produto foreign key (cd_produto) references tb_produtos(cd_produto)
		);

-- - - - - - Seção: tabelas referentes aos usuarios - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - 	-- 2
	
	create table tb_cidade_usuario(
		cd_cidade int(8) not null auto_increment,
		nm_cidade varchar(45),
		cd_estado int(8),
		constraint pk_cidade_usuario primary key (cd_cidade),
		constraint fk_cidade_usuario_estado_usuario foreign key (cd_estado) references tb_estado_usuario(cd_estado)
		);

	-- 2
	create table tb_bairro_usuario(
		cd_bairro int(8) not null auto_increment,
		nm_bairro varchar(45),
		cd_cidade int(8),
		constraint pk_bairro_usuario primary key (cd_bairro),
		constraint fk_bairro_usuario_cidade_usuario foreign key (cd_cidade) references tb_cidade_usuario(cd_cidade)
		);

	-- 2
	create table tb_endereco_usuario(
		cd_endereco int(8) not null auto_increment,
		cd_numero varchar(8),
		nm_rua varchar(45),
		cd_cep char(8),
		nm_complemento varchar(20),
		cd_bairro int(8),
		constraint pk_endereco_usuario primary key (cd_endereco),
		constraint fk_endereco_usuario_bairro_usuario foreign key (cd_bairro) references tb_bairro_usuario(cd_bairro)
		);
        
		-- 2
	create table tb_perfil_usuario(
		cd_usuario int not null auto_increment,
		nm_usuario varchar(50),
		cd_endereco int(8),
		nm_email varchar(50),
		cd_senha varchar(50),
		cd_fisica int,
		cd_juridica int,
		constraint pk_usuario primary key (cd_usuario),
		constraint fk_usuario_endereco_usuario foreign key (cd_endereco) references tb_endereco_usuario(cd_endereco),
		constraint fk_perfil_usuario_pessoa_fisica foreign key (cd_fisica) references tb_pessoa_fisica(cd_fisica),
		constraint fk_perfil_usuario_pessoa_juridica foreign key (cd_juridica) references tb_pessoa_juridica(cd_juridica)
		);

		-- 2
	create table tb_mensagem(
		cd_mensagem int not null auto_increment,
		nm_assunto varchar(120),
		ds_mensagem varchar(600),
		cd_usuario int,
		constraint pk_mensagem primary key (cd_mensagem),
		constraint fk_mensagem_usario foreign key (cd_usuario) references tb_perfil_usuario(cd_usuario)	
		);

	-- 2
	create table tb_contato_usuario(
		cd_contato int(8) not null auto_increment,
		cd_telefone varchar(14),
        cd_usuario int,
		constraint pk_contato primary key (cd_contato),
		constraint fk_contato_usuario foreign key (cd_usuario) references tb_perfil_usuario(cd_usuario)
		);

-- - - - - - Seção: tabelas referentes aos pedidos - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - 
	

	-- 2
	create table tb_pedido(
		cd_pedido int not null auto_increment,
		cd_usuario int,
		vr_status varchar(23),
        cd_pagamento int,
        cd_retirada int,
        dt_pedido date,
		constraint pk_pedido primary key (cd_pedido),
		constraint fk_pedido_usuario foreign key (cd_usuario) references tb_perfil_usuario(cd_usuario),
        constraint fk_pedido_pagamento foreign key (cd_pagamento) references tb_forma_pagamento(cd_pagamento),
        constraint fk_pedido_retirada foreign key (cd_retirada) references tb_forma_retirada(cd_retirada)       
		);

	-- 3
	create table tb_produto_pedido(
		cd_produto_pedido int not null auto_increment,
		cd_pedido int not null,
		cd_produto int not null,
		qt_produto int,
		cd_tamanho int,
		constraint pk_produto_pedido primary key (cd_produto_pedido),
		constraint fk_produto_pedido_pedido foreign key (cd_pedido) references tb_pedido(cd_pedido),
		constraint fk_produto_pedido_produto foreign key (cd_produto) references tb_produtos(cd_produto)
		);

	create table tb_carrinho(
		cd_carrinho int not null auto_increment,
		cd_usuario int not null,
		cd_produto int not null,
		qt_produto int,
		cd_tamanho int,
		constraint pk_carrinho primary key (cd_carrinho),
		constraint fk_carrinho_usuario foreign key (cd_usuario) references tb_perfil_usuario(cd_usuario),
		constraint fk_carrinho_produto foreign key (cd_produto) references tb_produtos(cd_produto)
		);

	/*	-- 3
	create table r_produto_tamanho(
		cd_produto int not null,
		cd_tamanho int not null,
		constraint c_produto_tamanho primary key (cd_tamanho,cd_produto),
		constraint fk_produto_tamanho_tamanho foreign key (cd_tamanho) references tb_tamanho(cd_tamanho),
		constraint fk_produto_tamanho_produto foreign key (cd_produto) references tb_produtos(cd_produto)
		); */

	create table r_produto_tamanho_estoque(
		cd_rpe int not null auto_increment,
		cd_produto int not null,
		cd_tamanho int not null,
		qt_produto int,
		constraint pk_produto_tamanho primary key (cd_rpe),
		constraint fk_produto_tamanho_tamanho foreign key (cd_tamanho) references tb_tamanho(cd_tamanho),
		constraint fk_produto_tamanho_produto foreign key (cd_produto) references tb_produtos(cd_produto)
		);
/*
create table tb_nota_fiscal(
		cd_nota_fiscal int not null auto_increment,
		cd_pedido int,
		cd_usuario int,
		nm_usuario varchar(45),
		vl_total decimal(9,2),
		dt_nota_fiscal date,
		nm_retirada varchar(25),
		nm_pagamento varchar(25),
		constraint pk_nota_fiscal primary key (cd_nota_fiscal)
		);

create table tb_produtos_nf(
		cd_produtos_nf int not null auto_increment,
		cd_nota_fiscal int,
		cd_produto int,
		qt_produto int,
		sg_tamanho varchar(20),
		vl_produto decimal(9,2),
		constraint pk_produtos_nf primary key (cd_produtos_nf),
		constraint fk_produtos_nf_nota_fiscal foreign key (cd_nota_fiscal) references tb_nota_fiscal(cd_nota_fiscal)
		);
*/

-- create table tb_relacionados(
-- 		cd_relacionados int not null auto_increment,
-- 		cd_produto1 int,
-- 		cd_produto2 int,
-- 		cd_produto3 int,
-- 		cd_produto4 int,
-- 		cd_produto int,
-- 		constraint pk_relacionados primary key (cd_relacionados),
-- 		constraint fk_relacionados_produto foreign key (cd_produto) references tb_produtos(cd_produto)
-- 		);

	create table tb_galeria(
		cd_galeria int not null auto_increment,
		im_galeria varchar(200),
		constraint pk_galeria primary key (cd_galeria)
		);
-- - - - - - Incerts First: - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - 
	
	-- Estados - - - - - - - - - - - - - - - 
	insert into tb_estado_usuario(cd_estado,sg_uf) values(1,'AC');
	insert into tb_estado_usuario(cd_estado,sg_uf) values(2,'AL');
	insert into tb_estado_usuario(cd_estado,sg_uf) values(3,'AP');
	insert into tb_estado_usuario(cd_estado,sg_uf) values(4,'AM');
	insert into tb_estado_usuario(cd_estado,sg_uf) values(5,'BA');
	insert into tb_estado_usuario(cd_estado,sg_uf) values(6,'CE');
	insert into tb_estado_usuario(cd_estado,sg_uf) values(7,'DF');
	insert into tb_estado_usuario(cd_estado,sg_uf) values(8,'ES');
	insert into tb_estado_usuario(cd_estado,sg_uf) values(9,'GO');
	insert into tb_estado_usuario(cd_estado,sg_uf) values(10,'MA');
	insert into tb_estado_usuario(cd_estado,sg_uf) values(11,'MT');
	insert into tb_estado_usuario(cd_estado,sg_uf) values(12,'MS');
	insert into tb_estado_usuario(cd_estado,sg_uf) values(13,'MG');
	insert into tb_estado_usuario(cd_estado,sg_uf) values(14,'PA');
	insert into tb_estado_usuario(cd_estado,sg_uf) values(15,'PB');
	insert into tb_estado_usuario(cd_estado,sg_uf) values(16,'PR');
	insert into tb_estado_usuario(cd_estado,sg_uf) values(17,'PE');
	insert into tb_estado_usuario(cd_estado,sg_uf) values(18,'PI');
	insert into tb_estado_usuario(cd_estado,sg_uf) values(19,'RJ');
	insert into tb_estado_usuario(cd_estado,sg_uf) values(20,'RN');
	insert into tb_estado_usuario(cd_estado,sg_uf) values(21,'RS');
	insert into tb_estado_usuario(cd_estado,sg_uf) values(22,'RO');
	insert into tb_estado_usuario(cd_estado,sg_uf) values(23,'RR');
	insert into tb_estado_usuario(cd_estado,sg_uf) values(24,'SC');
	insert into tb_estado_usuario(cd_estado,sg_uf) values(25,'SP');
    insert into tb_estado_usuario(cd_estado,sg_uf) values(26,'SE');
	insert into tb_estado_usuario(cd_estado,sg_uf) values(27,'TO');

	-- Categorias - - - - - - - - - - - - - - - 
	insert into tb_categoria(cd_categoria,nm_categoria) values(1,'Camisa');
	insert into tb_categoria(cd_categoria,nm_categoria) values(2,'Casaco');
	insert into tb_categoria(cd_categoria,nm_categoria) values(3,'Caneca');
	insert into tb_categoria(cd_categoria,nm_categoria) values(4,'Chaveiro');
	insert into tb_categoria(cd_categoria,nm_categoria) values(5,'Outros');

	-- Sub Categorias - - - - - - - - - - - - - - - 
	insert into tb_sub_categoria(cd_sub_categoria,nm_sub_categoria) values(1,'Rock');
	insert into tb_sub_categoria(cd_sub_categoria,nm_sub_categoria) values(2,'Games');
	insert into tb_sub_categoria(cd_sub_categoria,nm_sub_categoria) values(3,'Series');
	insert into tb_sub_categoria(cd_sub_categoria,nm_sub_categoria) values(4,'Filmes');
	insert into tb_sub_categoria(cd_sub_categoria,nm_sub_categoria) values(5,'Animes');
	insert into tb_sub_categoria(cd_sub_categoria,nm_sub_categoria) values(6,'Outros');
 
	-- Tamanho - - - - - - - - - - - - - - - 
    insert into tb_tamanho(cd_tamanho,sg_tamanho) values(1,'Tamanho Unico');
	insert into tb_tamanho(cd_tamanho,sg_tamanho) values(2,'P');
	insert into tb_tamanho(cd_tamanho,sg_tamanho) values(3,'M');
	insert into tb_tamanho(cd_tamanho,sg_tamanho) values(4,'G');
	insert into tb_tamanho(cd_tamanho,sg_tamanho) values(5,'GG');

	-- Cores - - - - - - - - - - - - - - - 
	insert into tb_cor(cd_cor,nm_cor) values(1,'Preto');
	insert into tb_cor(cd_cor,nm_cor) values(2,'Branco');
	insert into tb_cor(cd_cor,nm_cor) values(3,'Verde');
	insert into tb_cor(cd_cor,nm_cor) values(4,'Vermelho');
	insert into tb_cor(cd_cor,nm_cor) values(5,'Azul');
	insert into tb_cor(cd_cor,nm_cor) values(6,'Amarelo');
	insert into tb_cor(cd_cor,nm_cor) values(7,'Laranja');
	insert into tb_cor(cd_cor,nm_cor) values(8,'Roxo');
	insert into tb_cor(cd_cor,nm_cor) values(9,'Cinza');
	insert into tb_cor(cd_cor,nm_cor) values(10,'Marrom');

	-- Forma de Pagamento - - - - - - - - - - - - - - - 
    insert into tb_forma_pagamento(cd_pagamento,nm_pagamento) values(1,'Pag Seguro');
	insert into tb_forma_pagamento(cd_pagamento,nm_pagamento) values(2,'Boleto');
    
 	-- Forma de Retirar - - - - - - - - - - - - - - -    
	insert into tb_forma_retirada(cd_retirada,nm_retirada) values(1,'Loja Física');
	insert into tb_forma_retirada(cd_retirada,nm_retirada) values(2,'Sedex');	
	insert into tb_forma_retirada(cd_retirada,nm_retirada) values(3,'Carta Registrada');

	-- Perfil Adm - - - - - - - - - - - - - - -  
	insert into tb_perfil_adm(nm_adm,nm_email,cd_senha,nm_privilegio) values('Rene','rene@email.com','123','primario');
	-- Primeiro usuario - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - 
	 /* Inserindo na tabela tb_cidade_usuario*/
  insert into tb_cidade_usuario (nm_cidade,cd_estado)
  values('Praia Grande',25);
  
    /* Inserindo na tabela tb_bairro_usuario*/
  insert into tb_bairro_usuario (nm_bairro,cd_cidade)
  values('Canto do Forte',1);
  
    /* Inserindo na tabela tb_endereco_usuario*/
  insert into tb_endereco_usuario (cd_numero,nm_rua,cd_cep,nm_complemento,cd_bairro)
  values('xxx','Rua Rua',88888888,null,1);

  /* Inserindo na tabela tb_pessoa_fisica*/
  insert into tb_pessoa_fisica (cd_cpf)
  values(11111111111);
  
  /* Inserindo na tabela tb_pessoa_juridica*/
  insert into tb_pessoa_juridica (cd_cnpj)
  values(null);
  
  /* Inserindo na tabela tb_perfil_usuario*/
  insert into tb_perfil_usuario (nm_usuario,nm_email,cd_senha,cd_endereco,cd_fisica,cd_juridica)
  values('Jojo','jojo@joestar.com','dio',1,1,1);
  
  /* Inserindo na tabela tb_contato_usuario*/
  insert into tb_contato_usuario (cd_telefone,cd_usuario)
  values(12341234,1);
  
 -- Primeiro produto - - - - - - - - - - - - - - - 

  /* Inserindo na tabela tb_produtos*/
  insert into tb_produtos (nm_produto,ds_produto,im_produto,wt_produto,vl_produto,cd_cor,cd_categoria,cd_sub_categoria)
  values('Camisa Pink Floyd','Camisa com estampa da banda de rock psicodelico Pink Floyd ','DSCN0242.png','400','27.00',1,1,1);
  
  /* Inserindo na tabela tb_estoque
  insert into tb_estoque (qt_produto,cd_produto)
  values(2,1);*/
  
  /* Inserindo na tabela tb_especificacao*/
  insert into tb_especificacao (nm_keyword1,nm_keyword2,nm_keyword3,nm_keyword4,cd_produto)
  values('Pink','Floyd','Rock','Psicodelico',1);
  
  /* Inserindo na tabela r_produto_tamanho
  insert into r_produto_tamanho (cd_produto,cd_tamanho)
  values(1,2);*/

  /* Inserindo na tabela r_produto_tamanho_estoque*/
  insert into r_produto_tamanho_estoque (cd_produto,cd_tamanho,qt_produto)
  values(1,1,0);

  /* Inserindo na tabela r_produto_tamanho_estoque*/
  insert into r_produto_tamanho_estoque (cd_produto,cd_tamanho,qt_produto)
  values(1,2,12);

  /* Inserindo na tabela r_produto_tamanho_estoque*/
  insert into r_produto_tamanho_estoque (cd_produto,cd_tamanho,qt_produto)
  values(1,3,56);

  /* Inserindo na tabela r_produto_tamanho_estoque*/
  insert into r_produto_tamanho_estoque (cd_produto,cd_tamanho,qt_produto)
  values(1,4,47);

  /* Inserindo na tabela r_produto_tamanho_estoque*/
  insert into r_produto_tamanho_estoque (cd_produto,cd_tamanho,qt_produto)
  values(1,5,24);

 -- Primeiro pedido - - - - - - - - - - - - - - -
#insert into tb_pedido(cd_usuario, vr_status) values(1,'false');
#insert into tb_produto_pedido(cd_pedido,cd_produto,qt_produto,cd_tamanho) values(1,1,4,2);

 -- Produtos Destaque Standart - - - - - - - - - - - - - - -
insert into tb_slider_destaque(cd_produto1,cd_produto2,cd_produto3,cd_produto4,cd_produto5,cd_produto6,im_slider1,im_slider2,im_slider3,im_repre1,im_repre2,im_repre3) values(1,2,3,4,5,6,'img1.jpg','img2.jpg','img3.jpg','repre1.jpg','repre2.jpg','repre3.jpg');

 -- Produtos relacionados Standart - - - - - - - - - - - - - - -
-- insert into tb_relacionados(cd_produto1,cd_produto2,cd_produto3,cd_produto4,cd_produto) values(2,3,4,5,1);

/* Inserindo na tabela tb_galeria*/
  insert into tb_galeria(im_galeria)
  	values('DSCN0222.jpg');
  insert into tb_galeria(im_galeria)
  	values('DSCN0222.jpg');
  insert into tb_galeria(im_galeria)
  	values('DSCN0222.jpg');
  insert into tb_galeria(im_galeria)
  	values('DSCN0222.jpg');
  insert into tb_galeria(im_galeria)
  	values('DSCN0222.jpg');
  insert into tb_galeria(im_galeria)
  	values('DSCN0222.jpg');
  insert into tb_galeria(im_galeria)
  	values('DSCN0222.jpg');
  insert into tb_galeria(im_galeria)
  	values('DSCN0222.jpg');	
  insert into tb_galeria(im_galeria)
  	values('DSCN0222.jpg');

-- - - - - - Selects/Views: - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - 
-- View: Seleciona as informações dos usuários
create view vw_info_usuario as
select tb_perfil_usuario.cd_usuario as Id,
	   tb_perfil_usuario.nm_usuario as Usuario,
	   tb_perfil_usuario.nm_email as Email,
	   tb_pessoa_fisica.cd_cpf as CPF,
       tb_pessoa_juridica.cd_cnpj as CNPJ,
       tb_pessoa_juridica.cd_inscricao_estadual as Inscricao,
	   tb_contato_usuario.cd_telefone as Telefone,
	   tb_endereco_usuario.cd_cep as CEP,
	   tb_estado_usuario.sg_uf as Estado,
	   tb_cidade_usuario.nm_cidade as Cidade, 
	   tb_bairro_usuario.nm_bairro as Bairro,
	   tb_endereco_usuario.nm_rua as Rua,
	   tb_endereco_usuario.nm_complemento as Complemento,
	   tb_endereco_usuario.cd_numero as Numero
	   from tb_estado_usuario 
	inner join tb_cidade_usuario on tb_estado_usuario.cd_estado = tb_cidade_usuario.cd_estado
	inner join tb_bairro_usuario on tb_cidade_usuario.cd_cidade = tb_bairro_usuario.cd_cidade
	inner join tb_endereco_usuario on tb_bairro_usuario.cd_bairro = tb_endereco_usuario.cd_bairro
	inner join tb_perfil_usuario on tb_endereco_usuario.cd_endereco = tb_perfil_usuario.cd_endereco
	inner join tb_contato_usuario on tb_perfil_usuario.cd_usuario = tb_contato_usuario.cd_usuario
    inner join tb_pessoa_fisica on tb_perfil_usuario.cd_fisica = tb_pessoa_fisica.cd_fisica
    inner join tb_pessoa_juridica on tb_perfil_usuario.cd_juridica = tb_pessoa_juridica.cd_juridica;

-- View: Seleciona as informações dos produtos
create view vw_info_produto as select tb_produtos.cd_produto as Id,tb_produtos.nm_produto as Nome,  tb_produtos.vl_produto as Valor,tb_produtos.ds_produto as Descricao,    tb_produtos.wt_produto as Peso,tb_produtos.im_produto as Imagem,	   tb_categoria.nm_categoria as Categoria,   tb_sub_categoria.nm_sub_categoria as Subcategoria,      tb_cor.nm_cor as Cor,     tb_especificacao.nm_keyword1 as pk1,     tb_especificacao.nm_keyword2 as pk2,       tb_especificacao.nm_keyword3 as pk3,   tb_especificacao.nm_keyword4 as pk4  from tb_categoria  inner join tb_produtos on tb_categoria.cd_categoria = tb_produtos.cd_categoria  inner join tb_cor on tb_produtos.cd_cor = tb_cor.cd_cor  inner join tb_sub_categoria on tb_produtos.cd_sub_categoria = tb_sub_categoria.cd_sub_categoria  inner join tb_especificacao on tb_produtos.cd_produto = tb_especificacao.cd_produto;

              
              
-- View: Seleciona as informações dos pedidos
/*create view vw_info_pedido as
select 
tb_pedido.cd_pedido,
r_produto_pedido.cd_produto,
r_produto_pedido.qt_produto,
r_produto_pedido.sg_tamanho,
tb_pedido.cd_usuario
 from tb_perfil_usuario	
						inner join tb_pedido on tb_perfil_usuario.cd_usuario = tb_pedido.cd_usuario
                        inner join r_produto_pedido on tb_pedido.cd_pedido = r_produto_pedido.cd_pedido
                        inner join tb_produtos on r_produto_pedido.cd_produto = tb_produtos.cd_produto;*/


-- - - - - - Procedures: - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - 

    -- Procedure: insere usuario - - - - - - - - 
delimiter $
create procedure sp_insere_usuario(
/*tb_perfil_usuario*/ in var_name varchar(50), in var_email varchar(50), in var_senha varchar(50),
/*tb_contato_usuario*/in var_fone varchar(14), 
/*tb_endereco_usuario*/in var_numero varchar(12), in var_rua varchar(50), in var_cep varchar(10), in var_com varchar(20),
/*tb_bairro_usuario*/in var_bairro varchar(50),
/*tb_cidade_usuario*/in var_cidade varchar(50), in var_estado int,
/*tb_pessoa_fisica*/in var_cpf char(11), 
/*tb_pessoa_juridica*/in var_cnpj char(14),  in var_ie varchar(12)
)
begin

  /*declarando o ultimo id da tb_cidade_usuario*/
   declare last_cidade INT;
     /*declarando o ultimo id da tb_bairro_usuario*/
   declare last_bairro INT;
     /*declarando o ultimo id da tb_endereco_usuario*/
   declare last_endereco INT;
     /*declarando o ultimo id da tb_contato_usuario*/
   declare last_contato INT;
     /*declarando o ultimo id da tb_perfil_usuario*/
   declare last_usuario INT;
	/*declarando o ultimo id da tb_pessoa_fisica*/
   declare last_cpf INT;
	/*declarando o ultimo id da tb_pessoa_juridica*/
   declare last_cnpj INT;
    /*instanciando o ultimo id da tb_cidade_usuario*/
   set last_cidade = (select max(cd_cidade)+1 from tb_cidade_usuario);
    /*instanciando o ultimo id da tb_bairro_usuario*/
   set last_bairro = (select max(cd_bairro)+1 from tb_bairro_usuario);
    /*instanciando o ultimo id da tb_endereco_usuario*/
   set last_endereco = (select max(cd_endereco)+1 from tb_endereco_usuario);
    /*instanciando o ultimo id da tb_contato_usuario*/
   set last_contato = (select max(cd_contato)+1 from tb_contato_usuario);
    /*instanciando o ultimo id da tb_perfil_usuario*/
   set last_usuario = (select max(cd_usuario)+1 from tb_perfil_usuario);
	/*instanciando o ultimo id da tb_pessoa_fisica*/
   set last_cpf = (select max(cd_fisica)+1 from tb_pessoa_fisica);
   	/*instanciando o ultimo id da tb_pessoa_juridica*/
   set last_cnpj = (select max(cd_juridica)+1 from tb_pessoa_juridica);
     
  
  /* Inserindo na tabela tb_cidade_usuario*/
  insert into tb_cidade_usuario (nm_cidade,cd_estado)
  values(var_cidade,var_estado);
  
    /* Inserindo na tabela tb_bairro_usuario*/
  insert into tb_bairro_usuario (nm_bairro,cd_cidade)
  values(var_bairro,last_cidade);
  
    /* Inserindo na tabela tb_endereco_usuario*/
  insert into tb_endereco_usuario (cd_numero,nm_rua,cd_cep,nm_complemento,cd_bairro)
  values(var_numero,var_rua,var_cep,var_com,last_bairro);
  
    /* Inserindo na tabela tb_pessoa_fisica*/
  insert into tb_pessoa_fisica (cd_cpf)
  values(var_cpf);
  
  /* Inserindo na tabela tb_pessoa_juridica*/
  insert into tb_pessoa_juridica (cd_cnpj,cd_inscricao_estadual)
  values(var_cnpj,var_ie);
  
  /* Inserindo na tabela tb_perfil_usuario*/
  insert into tb_perfil_usuario (nm_usuario,nm_email,cd_senha,cd_endereco,cd_fisica,cd_juridica)
  values(var_name,var_email,var_senha,last_endereco,last_cpf,last_cnpj);
  
  /* Inserindo na tabela tb_contato_usuario*/
  insert into tb_contato_usuario (cd_telefone,cd_usuario)
  values(var_fone,last_usuario);
end $
delimiter ;

call sp_insere_usuario(
/*tb_perfil_usuario*/ 'Lucas Elias', 'lucascalilelias@yahoo.com.br', 'lucas2000',
/*tb_contato_usuario*/'1335921016', 
/*tb_endereco_usuario*/'663', 'Xixova', '11700430', null,
/*tb_bairro_usuario*/'Forte',
/*tb_cidade_usuario*/'Praia Grande', 2,
/*tb_pessoa_fisica*/'46216236806',
/*tb_pessoa_fisica*/null,null
);



-- Procedure: insere produto - - - - - - - - 
delimiter $
create procedure sp_insere_produto(
/*tb_produtos*/in var_nome varchar(50), in var_descricao varchar(200), in var_imagem varchar(200), in var_peso decimal(6,2), in var_preco decimal(9,2), in var_cor int, in var_categoria int, in var_sub_categoria int,
/*tb_especificacao*/in var_word1 varchar(50), in var_word2 varchar(50), in var_word3 varchar(50), in var_word4 varchar(50),
/*tb_produtos*/in var_qt_u varchar(5), in var_qt_p varchar(5), in var_qt_m varchar(5), in var_qt_g varchar(5), in var_qt_gg varchar(5)
)
begin

     /*declarando o ultimo id da tb_produtos*/
   declare last_produto INT;
   
    /*instanciando o ultimo id da tb_endereco_usuario*/
   set last_produto = (select max(cd_produto)+1 from tb_produtos);
   
  
  /* Inserindo na tabela tb_produtos*/
  insert into tb_produtos (nm_produto,ds_produto,im_produto,wt_produto,vl_produto,cd_cor,cd_categoria,cd_sub_categoria)
  values(var_nome,var_descricao,var_imagem,var_peso,var_preco,var_cor,var_categoria,var_sub_categoria);
  
    /* Inserindo na tabela tb_especificacao*/
  insert into tb_especificacao (nm_keyword1,nm_keyword2,nm_keyword3,nm_keyword4,cd_produto)
  values(var_word1,var_word2,var_word3,var_word4,last_produto);

  /* Inserindo na tabela r_produto_tamanho_estoque*/
  insert into r_produto_tamanho_estoque (cd_produto,cd_tamanho,qt_produto)
  values(last_produto,1,var_qt_u);

  /* Inserindo na tabela r_produto_tamanho_estoque*/
  insert into r_produto_tamanho_estoque (cd_produto,cd_tamanho,qt_produto)
  values(last_produto,2,var_qt_p);

  /* Inserindo na tabela r_produto_tamanho_estoque*/
  insert into r_produto_tamanho_estoque (cd_produto,cd_tamanho,qt_produto)
  values(last_produto,3,var_qt_m);

  /* Inserindo na tabela r_produto_tamanho_estoque*/
  insert into r_produto_tamanho_estoque (cd_produto,cd_tamanho,qt_produto)
  values(last_produto,4,var_qt_g);

  /* Inserindo na tabela r_produto_tamanho_estoque*/
  insert into r_produto_tamanho_estoque (cd_produto,cd_tamanho,qt_produto)
  values(last_produto,5,var_qt_gg);

  
end $
delimiter ;

call sp_insere_produto(
/*tb_produtos*/ 'Caneca Justiceiro','Caneca com estampa de porcelana com estamapa do vigilante Justiceiro ','DSCN0261.png','1.5','15.00',1,3,3,
/*tb_especificacao*/'Justiceiro','Punisher','Caneca','Demolidor',
/*tb_produtos*/7,0,0,0,0
);

-- Procedure: update 'true' pedido - - - - - - - -
delimiter $
create procedure sp_update_pedido(
/*tb_pedido*/ in var_pedido int
)
begin
  /* Atualizando tabela tb_pedido*/
	update tb_pedido set vr_status = 'true' where cd_pedido = var_pedido;
end $
delimiter ;

# call sp_update_pedido(1);

# drop sp_update_pedido;

-- Procedure: delete pedido do carrinho - - - - - - - -
delimiter $
create procedure sp_delete_carrinho(
/*r_produto_pedido*/ in var_car int
)
begin
  /* Deletando da tabela r_produto_pedido*/
	delete from tb_carrinho where cd_carrinho = var_car;
    
 
end $
delimiter ;

# call sp_delete_carrinho(1);

-- Procedure: delete pedido do carrinho - - - - - - - -


delimiter $
create procedure sp_delete_produto(
/*for all*/ in var_produto int
)
begin
  /* Deletando da tabela r_produto_tamanho_estoque*/
	delete from r_produto_tamanho_estoque where cd_produto = var_produto;
  /* Deletando da tabela tb_especificacao*/
	delete from tb_especificacao where cd_produto = var_produto;
  /* Deletando da tabela tb_produtos*/	
    delete from tb_produtos where cd_produto = var_produto;
end $
delimiter ;

#call sp_delete_produto(2);

-- Procedure: delete pedido dos pedidos em espera - - - - - - - -


delimiter $
create procedure sp_delete_pedido_espera(
/*for all*/ in var_pedido int
)
begin
  /* Deletando da tabela tb_produto_pedido*/
	delete from tb_produto_pedido where cd_pedido = var_pedido;
  /* Deletando da tabela tb_pedido*/
	delete from tb_pedido where cd_pedido = var_pedido;
end $
delimiter ;

#call sp_delete_pedido_espera(2);
#drop procedure sp_delete_pedido_espera;


-- - - - Ajustes - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - 
-- Procedure: insere carrinho - - - - - - - -
delimiter $
create procedure sp_insere_carrinho(
/*tb_produto_pedido*/in var_produto int, in var_quantidade int, in var_tamanho int, var_user int
)
begin
      /* Inserindo na tabela r_produto_pedido*/
  insert into tb_carrinho (cd_usuario,cd_produto,qt_produto,cd_tamanho)
  values(var_user,var_produto,var_quantidade,var_tamanho);
end $
delimiter ;

#call sp_insere_carrinho(1,5,4,1);

#drop procedure sp_insere_carrinho


-- Procedure: insere pedido - - - - - - - -
delimiter $
create procedure sp_insere_pedido(
/*tb_pedido*/ in var_user int, in var_pag int, in var_ret int, in var_date date
)
begin

  /*declarando o ultimo id da r_produto_pedido*/
   declare last_pedido INT;

   	/*instanciando o ultimo id da tb_pedido*/
   set last_pedido = (select max(cd_pedido)+1 from tb_pedido);
   
   
  /* Inserindo na tabela tb_pedido*/
  insert into tb_pedido (cd_usuario,vr_status,cd_pagamento,cd_retirada,dt_pedido) values(var_user,'false',var_pag,var_ret,var_date);


end $
delimiter ;


-- Procedure: insere item_pedido - - - - - - - -
delimiter $
create procedure sp_insere_item_pedido(
/*tb_produto_pedido*/in var_produto int, in var_quantidade int, in var_tamanho int
)
begin

  /*declarando o ultimo id da r_produto_pedido*/
   declare last_pedido INT;

   	/*instanciando o ultimo id da tb_pedido*/
   set last_pedido = (select max(cd_pedido) from tb_pedido);
   
      /* Inserindo na tabela r_produto_pedido*/
  insert into tb_produto_pedido (cd_pedido,cd_produto,qt_produto,cd_tamanho)
  values(last_pedido,var_produto,var_quantidade,var_tamanho);
end $
delimiter ;


#call sp_insere_item_pedido(1,5,4);

-- Procedure: delete carrinho - - - - - - - -
#DELETE FROM tb_carrinho WHERE cd_usuario = "1";



-- Procedure: update pedido_espera - - - - - - - -
delimiter $
create procedure sp_update_pedido_espera(
/*tb_produto_pedido*/in var_produto int, in var_quantidade int, in var_tamanho int
)
begin

  /*declarando o ultimo id da r_produto_pedido*/
   declare last_pedido INT;

   	/*instanciando o ultimo id da tb_pedido*/
   set last_pedido = (select max(cd_pedido) from tb_pedido);
   
      /* Inserindo na tabela r_produto_pedido*/
  insert into tb_produto_pedido (cd_pedido,cd_produto,qt_produto,cd_tamanho)
  values(last_pedido,var_produto,var_quantidade,var_tamanho);
end $
delimiter ;

-- Produto 3 - - - - - - - - - - - - - - - 

  /* Inserindo na tabela tb_produtos*/
  insert into tb_produtos (nm_produto,ds_produto,im_produto,wt_produto,vl_produto,cd_cor,cd_categoria,cd_sub_categoria)
  values('Caneca Squirtle','Caneca de porcelana do pokemon com estampa do Squirtle ','DSCN0266.png','500','15.00',2,3,5);
  
  /* Inserindo na tabela tb_estoque
  insert into tb_estoque (qt_produto,cd_produto)
  values(2,1);*/
  
  /* Inserindo na tabela tb_especificacao*/
  insert into tb_especificacao (nm_keyword1,nm_keyword2,nm_keyword3,nm_keyword4,cd_produto)
  values('Pokemon','Squirtle','Blastoise','agua',3);
  
  /* Inserindo na tabela r_produto_tamanho
  insert into r_produto_tamanho (cd_produto,cd_tamanho)
  values(1,2);*/

  /* Inserindo na tabela r_produto_tamanho_estoque*/
  insert into r_produto_tamanho_estoque (cd_produto,cd_tamanho,qt_produto)
  values(3,1,20);

  /* Inserindo na tabela r_produto_tamanho_estoque*/
  insert into r_produto_tamanho_estoque (cd_produto,cd_tamanho,qt_produto)
  values(3,2,0);

  /* Inserindo na tabela r_produto_tamanho_estoque*/
  insert into r_produto_tamanho_estoque (cd_produto,cd_tamanho,qt_produto)
  values(3,3,0);

  /* Inserindo na tabela r_produto_tamanho_estoque*/
  insert into r_produto_tamanho_estoque (cd_produto,cd_tamanho,qt_produto)
  values(3,4,0);

  /* Inserindo na tabela r_produto_tamanho_estoque*/
  insert into r_produto_tamanho_estoque (cd_produto,cd_tamanho,qt_produto)
  values(3,5,0);

  -- Produto 4 - - - - - - - - - - - - - - - 

  /* Inserindo na tabela tb_produtos*/
  insert into tb_produtos (nm_produto,ds_produto,im_produto,wt_produto,vl_produto,cd_cor,cd_categoria,cd_sub_categoria)
  values('Caneca Capitão América','Caneca de porcelana com estampa do Capitão América ','DSCN0270.png','500','15.00',2,3,4);
  
  /* Inserindo na tabela tb_estoque
  insert into tb_estoque (qt_produto,cd_produto)
  values(2,1);*/
  
  /* Inserindo na tabela tb_especificacao*/
  insert into tb_especificacao (nm_keyword1,nm_keyword2,nm_keyword3,nm_keyword4,cd_produto)
  values('Vingadores','Capitão','América','Herói',4);
  
  /* Inserindo na tabela r_produto_tamanho
  insert into r_produto_tamanho (cd_produto,cd_tamanho)
  values(1,2);*/

  /* Inserindo na tabela r_produto_tamanho_estoque*/
  insert into r_produto_tamanho_estoque (cd_produto,cd_tamanho,qt_produto)
  values(4,1,20);

  /* Inserindo na tabela r_produto_tamanho_estoque*/
  insert into r_produto_tamanho_estoque (cd_produto,cd_tamanho,qt_produto)
  values(4,2,0);

  /* Inserindo na tabela r_produto_tamanho_estoque*/
  insert into r_produto_tamanho_estoque (cd_produto,cd_tamanho,qt_produto)
  values(4,3,0);

  /* Inserindo na tabela r_produto_tamanho_estoque*/
  insert into r_produto_tamanho_estoque (cd_produto,cd_tamanho,qt_produto)
  values(4,4,0);

  /* Inserindo na tabela r_produto_tamanho_estoque*/
  insert into r_produto_tamanho_estoque (cd_produto,cd_tamanho,qt_produto)
  values(4,5,0);

  -- Produto 5 - - - - - - - - - - - - - - - 

  /* Inserindo na tabela tb_produtos*/
  insert into tb_produtos (nm_produto,ds_produto,im_produto,wt_produto,vl_produto,cd_cor,cd_categoria,cd_sub_categoria)
  values('Caneca do Time Instinct','Caneca com estampa do Time Instinct do jogo Pokemon GO ','DSCN0273.png','500','15.00',2,3,2);
  
  /* Inserindo na tabela tb_estoque
  insert into tb_estoque (qt_produto,cd_produto)
  values(2,1);*/
  
  /* Inserindo na tabela tb_especificacao*/
  insert into tb_especificacao (nm_keyword1,nm_keyword2,nm_keyword3,nm_keyword4,cd_produto)
  values('Pokemon','Instinct','Pokemon Go','Zapdos',5);
  
  /* Inserindo na tabela r_produto_tamanho
  insert into r_produto_tamanho (cd_produto,cd_tamanho)
  values(1,2);*/

  /* Inserindo na tabela r_produto_tamanho_estoque*/
  insert into r_produto_tamanho_estoque (cd_produto,cd_tamanho,qt_produto)
  values(5,1,20);

  /* Inserindo na tabela r_produto_tamanho_estoque*/
  insert into r_produto_tamanho_estoque (cd_produto,cd_tamanho,qt_produto)
  values(5,2,0);

  /* Inserindo na tabela r_produto_tamanho_estoque*/
  insert into r_produto_tamanho_estoque (cd_produto,cd_tamanho,qt_produto)
  values(5,3,0);

  /* Inserindo na tabela r_produto_tamanho_estoque*/
  insert into r_produto_tamanho_estoque (cd_produto,cd_tamanho,qt_produto)
  values(5,4,0);

  /* Inserindo na tabela r_produto_tamanho_estoque*/
  insert into r_produto_tamanho_estoque (cd_produto,cd_tamanho,qt_produto)
  values(5,5,0);

  -- Produto 6 - - - - - - - - - - - - - - - 

  /* Inserindo na tabela tb_produtos*/
  insert into tb_produtos (nm_produto,ds_produto,im_produto,wt_produto,vl_produto,cd_cor,cd_categoria,cd_sub_categoria)
  values('Caneca do Superman','Caneca com a estampa do Superman','DSCN0275.png','500','15.00',2,3,4);
  
  /* Inserindo na tabela tb_estoque
  insert into tb_estoque (qt_produto,cd_produto)
  values(2,1);*/
  
  /* Inserindo na tabela tb_especificacao*/
  insert into tb_especificacao (nm_keyword1,nm_keyword2,nm_keyword3,nm_keyword4,cd_produto)
  values('Superman','Clark','Kent','DC',6);
  
  /* Inserindo na tabela r_produto_tamanho
  insert into r_produto_tamanho (cd_produto,cd_tamanho)
  values(1,2);*/

  /* Inserindo na tabela r_produto_tamanho_estoque*/
  insert into r_produto_tamanho_estoque (cd_produto,cd_tamanho,qt_produto)
  values(6,1,20);

  /* Inserindo na tabela r_produto_tamanho_estoque*/
  insert into r_produto_tamanho_estoque (cd_produto,cd_tamanho,qt_produto)
  values(6,2,0);

  /* Inserindo na tabela r_produto_tamanho_estoque*/
  insert into r_produto_tamanho_estoque (cd_produto,cd_tamanho,qt_produto)
  values(6,3,0);

  /* Inserindo na tabela r_produto_tamanho_estoque*/
  insert into r_produto_tamanho_estoque (cd_produto,cd_tamanho,qt_produto)
  values(6,4,0);

  /* Inserindo na tabela r_produto_tamanho_estoque*/
  insert into r_produto_tamanho_estoque (cd_produto,cd_tamanho,qt_produto)
  values(6,5,0);

  -- Produto 7 - - - - - - - - - - - - - - - 

  /* Inserindo na tabela tb_produtos*/
  insert into tb_produtos (nm_produto,ds_produto,im_produto,wt_produto,vl_produto,cd_cor,cd_categoria,cd_sub_categoria)
  values('Caneca da Liga da Justiça','Caneca com a estampa da liga da Justiça, contando com o Flash, o Superman e o Aquaman','DSCN0283.png','500','15.00',2,3,4);
  
  /* Inserindo na tabela tb_estoque
  insert into tb_estoque (qt_produto,cd_produto)
  values(2,1);*/
  
  /* Inserindo na tabela tb_especificacao*/
  insert into tb_especificacao (nm_keyword1,nm_keyword2,nm_keyword3,nm_keyword4,cd_produto)
  values('Superman','Flash','Capitão','América',7);
  
  /* Inserindo na tabela r_produto_tamanho
  insert into r_produto_tamanho (cd_produto,cd_tamanho)
  values(1,2);*/

  /* Inserindo na tabela r_produto_tamanho_estoque*/
  insert into r_produto_tamanho_estoque (cd_produto,cd_tamanho,qt_produto)
  values(7,1,20);

  /* Inserindo na tabela r_produto_tamanho_estoque*/
  insert into r_produto_tamanho_estoque (cd_produto,cd_tamanho,qt_produto)
  values(7,2,0);

  /* Inserindo na tabela r_produto_tamanho_estoque*/
  insert into r_produto_tamanho_estoque (cd_produto,cd_tamanho,qt_produto)
  values(7,3,0);

  /* Inserindo na tabela r_produto_tamanho_estoque*/
  insert into r_produto_tamanho_estoque (cd_produto,cd_tamanho,qt_produto)
  values(7,4,0);

  /* Inserindo na tabela r_produto_tamanho_estoque*/
  insert into r_produto_tamanho_estoque (cd_produto,cd_tamanho,qt_produto)
  values(7,5,0);

  -- Produto 8 - - - - - - - - - - - - - - - 

  /* Inserindo na tabela tb_produtos*/
  insert into tb_produtos (nm_produto,ds_produto,im_produto,wt_produto,vl_produto,cd_cor,cd_categoria,cd_sub_categoria)
  values('Caneca do Coringa','Caneca com a estampa do Coringa','DSCN0284.png','500','15.00',2,3,4);
  
  /* Inserindo na tabela tb_estoque
  insert into tb_estoque (qt_produto,cd_produto)
  values(2,1);*/
  
  /* Inserindo na tabela tb_especificacao*/
  insert into tb_especificacao (nm_keyword1,nm_keyword2,nm_keyword3,nm_keyword4,cd_produto)
  values('Coringa','DC','Vilão','sorriso',8);
  
  /* Inserindo na tabela r_produto_tamanho
  insert into r_produto_tamanho (cd_produto,cd_tamanho)
  values(1,2);*/

  /* Inserindo na tabela r_produto_tamanho_estoque*/
  insert into r_produto_tamanho_estoque (cd_produto,cd_tamanho,qt_produto)
  values(8,1,20);

  /* Inserindo na tabela r_produto_tamanho_estoque*/
  insert into r_produto_tamanho_estoque (cd_produto,cd_tamanho,qt_produto)
  values(8,2,0);

  /* Inserindo na tabela r_produto_tamanho_estoque*/
  insert into r_produto_tamanho_estoque (cd_produto,cd_tamanho,qt_produto)
  values(8,3,0);

  /* Inserindo na tabela r_produto_tamanho_estoque*/
  insert into r_produto_tamanho_estoque (cd_produto,cd_tamanho,qt_produto)
  values(8,4,0);

  /* Inserindo na tabela r_produto_tamanho_estoque*/
  insert into r_produto_tamanho_estoque (cd_produto,cd_tamanho,qt_produto)
  values(8,5,0);

  -- Produto 9 - - - - - - - - - - - - - - - 

  /* Inserindo na tabela tb_produtos*/
  insert into tb_produtos (nm_produto,ds_produto,im_produto,wt_produto,vl_produto,cd_cor,cd_categoria,cd_sub_categoria)
  values('Varinha do Harry Potter','Varinha da franquia de livros e filmes Harry Potter','DSCN0295.png','100','35.00',10,5,4);
  
  /* Inserindo na tabela tb_estoque
  insert into tb_estoque (qt_produto,cd_produto)
  values(2,1);*/
  
  /* Inserindo na tabela tb_especificacao*/
  insert into tb_especificacao (nm_keyword1,nm_keyword2,nm_keyword3,nm_keyword4,cd_produto)
  values('Varinha','Harry','Potter','Magia',9);
  
  /* Inserindo na tabela r_produto_tamanho
  insert into r_produto_tamanho (cd_produto,cd_tamanho)
  values(1,2);*/

  /* Inserindo na tabela r_produto_tamanho_estoque*/
  insert into r_produto_tamanho_estoque (cd_produto,cd_tamanho,qt_produto)
  values(9,1,5);

  /* Inserindo na tabela r_produto_tamanho_estoque*/
  insert into r_produto_tamanho_estoque (cd_produto,cd_tamanho,qt_produto)
  values(9,2,0);

  /* Inserindo na tabela r_produto_tamanho_estoque*/
  insert into r_produto_tamanho_estoque (cd_produto,cd_tamanho,qt_produto)
  values(9,3,0);

  /* Inserindo na tabela r_produto_tamanho_estoque*/
  insert into r_produto_tamanho_estoque (cd_produto,cd_tamanho,qt_produto)
  values(9,4,0);

  /* Inserindo na tabela r_produto_tamanho_estoque*/
  insert into r_produto_tamanho_estoque (cd_produto,cd_tamanho,qt_produto)
  values(9,5,0);

  -- Produto 10 - - - - - - - - - - - - - - - 

  /* Inserindo na tabela tb_produtos*/
  insert into tb_produtos (nm_produto,ds_produto,im_produto,wt_produto,vl_produto,cd_cor,cd_categoria,cd_sub_categoria)
  values('Varinha do Harry Potter','Varinha da franquia de livros e filmes Harry Potter','DSCN0296.png','100','35.00',10,5,4);
  
  /* Inserindo na tabela tb_estoque
  insert into tb_estoque (qt_produto,cd_produto)
  values(2,1);*/
  
  /* Inserindo na tabela tb_especificacao*/
  insert into tb_especificacao (nm_keyword1,nm_keyword2,nm_keyword3,nm_keyword4,cd_produto)
  values('Varinha','Harry','Potter','Magia',10);
  
  /* Inserindo na tabela r_produto_tamanho
  insert into r_produto_tamanho (cd_produto,cd_tamanho)
  values(1,2);*/

  /* Inserindo na tabela r_produto_tamanho_estoque*/
  insert into r_produto_tamanho_estoque (cd_produto,cd_tamanho,qt_produto)
  values(10,1,5);

  /* Inserindo na tabela r_produto_tamanho_estoque*/
  insert into r_produto_tamanho_estoque (cd_produto,cd_tamanho,qt_produto)
  values(10,2,0);

  /* Inserindo na tabela r_produto_tamanho_estoque*/
  insert into r_produto_tamanho_estoque (cd_produto,cd_tamanho,qt_produto)
  values(10,3,0);

  /* Inserindo na tabela r_produto_tamanho_estoque*/
  insert into r_produto_tamanho_estoque (cd_produto,cd_tamanho,qt_produto)
  values(10,4,0);

  /* Inserindo na tabela r_produto_tamanho_estoque*/
  insert into r_produto_tamanho_estoque (cd_produto,cd_tamanho,qt_produto)
  values(10,5,0);

  -- Produto 11 - - - - - - - - - - - - - - - 

  /* Inserindo na tabela tb_produtos*/
  insert into tb_produtos (nm_produto,ds_produto,im_produto,wt_produto,vl_produto,cd_cor,cd_categoria,cd_sub_categoria)
  values('Camisa do Naruto','Camisa com a estampa do Naruto junto de Sasuke','DSCN0301.png','300','40.00',1,1,5);
  
  /* Inserindo na tabela tb_estoque
  insert into tb_estoque (qt_produto,cd_produto)
  values(2,1);*/
  
  /* Inserindo na tabela tb_especificacao*/
  insert into tb_especificacao (nm_keyword1,nm_keyword2,nm_keyword3,nm_keyword4,cd_produto)
  values('Naruto','Sasuke','Lindo','Camisa',11);
  
  /* Inserindo na tabela r_produto_tamanho
  insert into r_produto_tamanho (cd_produto,cd_tamanho)
  values(1,2);*/

  /* Inserindo na tabela r_produto_tamanho_estoque*/
  insert into r_produto_tamanho_estoque (cd_produto,cd_tamanho,qt_produto)
  values(11,1,0);

  /* Inserindo na tabela r_produto_tamanho_estoque*/
  insert into r_produto_tamanho_estoque (cd_produto,cd_tamanho,qt_produto)
  values(11,2,10);

  /* Inserindo na tabela r_produto_tamanho_estoque*/
  insert into r_produto_tamanho_estoque (cd_produto,cd_tamanho,qt_produto)
  values(11,3,10);

  /* Inserindo na tabela r_produto_tamanho_estoque*/
  insert into r_produto_tamanho_estoque (cd_produto,cd_tamanho,qt_produto)
  values(11,4,10);

  /* Inserindo na tabela r_produto_tamanho_estoque*/
  insert into r_produto_tamanho_estoque (cd_produto,cd_tamanho,qt_produto)
  values(11,5,10);

  -- Produto 12 - - - - - - - - - - - - - - - 

  /* Inserindo na tabela tb_produtos*/
  insert into tb_produtos (nm_produto,ds_produto,im_produto,wt_produto,vl_produto,cd_cor,cd_categoria,cd_sub_categoria)
  values('Camisa do Goku','Camisa com a estampa do Goku de Dragon Ball Super','DSCN0304.png','300','40.00',1,1,5);
  
  /* Inserindo na tabela tb_estoque
  insert into tb_estoque (qt_produto,cd_produto)
  values(2,1);*/
  
  /* Inserindo na tabela tb_especificacao*/
  insert into tb_especificacao (nm_keyword1,nm_keyword2,nm_keyword3,nm_keyword4,cd_produto)
  values('Goku','DragonBall','Anime','Poder',12);
  
  /* Inserindo na tabela r_produto_tamanho
  insert into r_produto_tamanho (cd_produto,cd_tamanho)
  values(1,2);*/

  /* Inserindo na tabela r_produto_tamanho_estoque*/
  insert into r_produto_tamanho_estoque (cd_produto,cd_tamanho,qt_produto)
  values(12,1,0);

  /* Inserindo na tabela r_produto_tamanho_estoque*/
  insert into r_produto_tamanho_estoque (cd_produto,cd_tamanho,qt_produto)
  values(12,2,10);

  /* Inserindo na tabela r_produto_tamanho_estoque*/
  insert into r_produto_tamanho_estoque (cd_produto,cd_tamanho,qt_produto)
  values(12,3,10);

  /* Inserindo na tabela r_produto_tamanho_estoque*/
  insert into r_produto_tamanho_estoque (cd_produto,cd_tamanho,qt_produto)
  values(12,4,10);

  /* Inserindo na tabela r_produto_tamanho_estoque*/
  insert into r_produto_tamanho_estoque (cd_produto,cd_tamanho,qt_produto)
  values(12,5,10);

  -- Produto 13 - - - - - - - - - - - - - - - 

  /* Inserindo na tabela tb_produtos*/
  insert into tb_produtos (nm_produto,ds_produto,im_produto,wt_produto,vl_produto,cd_cor,cd_categoria,cd_sub_categoria)
  values('Camisa da Metallica','Camisa com a estampa da banda Metallica','DSCN0305.png','300','40.00',1,1,1);
  
  /* Inserindo na tabela tb_estoque
  insert into tb_estoque (qt_produto,cd_produto)
  values(2,1);*/
  
  /* Inserindo na tabela tb_especificacao*/
  insert into tb_especificacao (nm_keyword1,nm_keyword2,nm_keyword3,nm_keyword4,cd_produto)
  values('lightning','Metallica','Banda','Musica',13);
  
  /* Inserindo na tabela r_produto_tamanho
  insert into r_produto_tamanho (cd_produto,cd_tamanho)
  values(1,2);*/

  /* Inserindo na tabela r_produto_tamanho_estoque*/
  insert into r_produto_tamanho_estoque (cd_produto,cd_tamanho,qt_produto)
  values(13,1,0);

  /* Inserindo na tabela r_produto_tamanho_estoque*/
  insert into r_produto_tamanho_estoque (cd_produto,cd_tamanho,qt_produto)
  values(13,2,10);

  /* Inserindo na tabela r_produto_tamanho_estoque*/
  insert into r_produto_tamanho_estoque (cd_produto,cd_tamanho,qt_produto)
  values(13,3,10);

  /* Inserindo na tabela r_produto_tamanho_estoque*/
  insert into r_produto_tamanho_estoque (cd_produto,cd_tamanho,qt_produto)
  values(13,4,10);

  /* Inserindo na tabela r_produto_tamanho_estoque*/
  insert into r_produto_tamanho_estoque (cd_produto,cd_tamanho,qt_produto)
  values(13,5,10);

  -- Produto 14 - - - - - - - - - - - - - - - 

  /* Inserindo na tabela tb_produtos*/
  insert into tb_produtos (nm_produto,ds_produto,im_produto,wt_produto,vl_produto,cd_cor,cd_categoria,cd_sub_categoria)
  values('Camisa do Overwatch','Camisa com a estampa do jogo Overwatch','DSCN0307.png','300','40.00',1,1,2);
  
  /* Inserindo na tabela tb_estoque
  insert into tb_estoque (qt_produto,cd_produto)
  values(2,1);*/
  
  /* Inserindo na tabela tb_especificacao*/
  insert into tb_especificacao (nm_keyword1,nm_keyword2,nm_keyword3,nm_keyword4,cd_produto)
  values('Overwatch','Jogo','Blizzard','FPS',14);
  
  /* Inserindo na tabela r_produto_tamanho
  insert into r_produto_tamanho (cd_produto,cd_tamanho)
  values(1,2);*/

  /* Inserindo na tabela r_produto_tamanho_estoque*/
  insert into r_produto_tamanho_estoque (cd_produto,cd_tamanho,qt_produto)
  values(14,1,0);

  /* Inserindo na tabela r_produto_tamanho_estoque*/
  insert into r_produto_tamanho_estoque (cd_produto,cd_tamanho,qt_produto)
  values(14,2,10);

  /* Inserindo na tabela r_produto_tamanho_estoque*/
  insert into r_produto_tamanho_estoque (cd_produto,cd_tamanho,qt_produto)
  values(14,3,10);

  /* Inserindo na tabela r_produto_tamanho_estoque*/
  insert into r_produto_tamanho_estoque (cd_produto,cd_tamanho,qt_produto)
  values(14,4,10);

  /* Inserindo na tabela r_produto_tamanho_estoque*/
  insert into r_produto_tamanho_estoque (cd_produto,cd_tamanho,qt_produto)
  values(14,5,10);

  -- Produto 15 - - - - - - - - - - - - - - - 

  /* Inserindo na tabela tb_produtos*/
  insert into tb_produtos (nm_produto,ds_produto,im_produto,wt_produto,vl_produto,cd_cor,cd_categoria,cd_sub_categoria)
  values('Camisa do L','Camisa com a estampa do L do anime Death Note','DSCN0315.png','300','40.00',1,1,5);
  
  /* Inserindo na tabela tb_estoque
  insert into tb_estoque (qt_produto,cd_produto)
  values(2,1);*/
  
  /* Inserindo na tabela tb_especificacao*/
  insert into tb_especificacao (nm_keyword1,nm_keyword2,nm_keyword3,nm_keyword4,cd_produto)
  values('L','Death','Note','Anime',15);
  
  /* Inserindo na tabela r_produto_tamanho
  insert into r_produto_tamanho (cd_produto,cd_tamanho)
  values(1,2);*/

  /* Inserindo na tabela r_produto_tamanho_estoque*/
  insert into r_produto_tamanho_estoque (cd_produto,cd_tamanho,qt_produto)
  values(15,1,0);

  /* Inserindo na tabela r_produto_tamanho_estoque*/
  insert into r_produto_tamanho_estoque (cd_produto,cd_tamanho,qt_produto)
  values(15,2,10);

  /* Inserindo na tabela r_produto_tamanho_estoque*/
  insert into r_produto_tamanho_estoque (cd_produto,cd_tamanho,qt_produto)
  values(15,3,10);

  /* Inserindo na tabela r_produto_tamanho_estoque*/
  insert into r_produto_tamanho_estoque (cd_produto,cd_tamanho,qt_produto)
  values(15,4,10);

  /* Inserindo na tabela r_produto_tamanho_estoque*/
  insert into r_produto_tamanho_estoque (cd_produto,cd_tamanho,qt_produto)
  values(15,5,10);

  -- Produto 16 - - - - - - - - - - - - - - - 

  /* Inserindo na tabela tb_produtos*/
  insert into tb_produtos (nm_produto,ds_produto,im_produto,wt_produto,vl_produto,cd_cor,cd_categoria,cd_sub_categoria)
  values('Camisa do Guns N Roses','Camisa com a estampa da banda Guns N Roses','DSCN0316.png','300','40.00',1,1,1);
  
  /* Inserindo na tabela tb_estoque
  insert into tb_estoque (qt_produto,cd_produto)
  values(2,1);*/
  
  /* Inserindo na tabela tb_especificacao*/
  insert into tb_especificacao (nm_keyword1,nm_keyword2,nm_keyword3,nm_keyword4,cd_produto)
  values('Banda','Musica','Guns','Roses',16);
  
  /* Inserindo na tabela r_produto_tamanho
  insert into r_produto_tamanho (cd_produto,cd_tamanho)
  values(1,2);*/

  /* Inserindo na tabela r_produto_tamanho_estoque*/
  insert into r_produto_tamanho_estoque (cd_produto,cd_tamanho,qt_produto)
  values(16,1,0);

  /* Inserindo na tabela r_produto_tamanho_estoque*/
  insert into r_produto_tamanho_estoque (cd_produto,cd_tamanho,qt_produto)
  values(16,2,10);

  /* Inserindo na tabela r_produto_tamanho_estoque*/
  insert into r_produto_tamanho_estoque (cd_produto,cd_tamanho,qt_produto)
  values(16,3,10);

  /* Inserindo na tabela r_produto_tamanho_estoque*/
  insert into r_produto_tamanho_estoque (cd_produto,cd_tamanho,qt_produto)
  values(16,4,10);

  /* Inserindo na tabela r_produto_tamanho_estoque*/
  insert into r_produto_tamanho_estoque (cd_produto,cd_tamanho,qt_produto)
  values(16,5,10);

  -- Produto 17 - - - - - - - - - - - - - - - 

  /* Inserindo na tabela tb_produtos*/
  insert into tb_produtos (nm_produto,ds_produto,im_produto,wt_produto,vl_produto,cd_cor,cd_categoria,cd_sub_categoria)
  values('Camisa do AssassinS Creed','Camisa com a estampa do jogo AssassinS Creed Origins','DSCN0333.png','300','40.00',1,1,2);
  
  /* Inserindo na tabela tb_estoque
  insert into tb_estoque (qt_produto,cd_produto)
  values(2,1);*/
  
  /* Inserindo na tabela tb_especificacao*/
  insert into tb_especificacao (nm_keyword1,nm_keyword2,nm_keyword3,nm_keyword4,cd_produto)
  values('Assassin','Creed','Origins','Jogo',17);
  
  /* Inserindo na tabela r_produto_tamanho
  insert into r_produto_tamanho (cd_produto,cd_tamanho)
  values(1,2);*/

  /* Inserindo na tabela r_produto_tamanho_estoque*/
  insert into r_produto_tamanho_estoque (cd_produto,cd_tamanho,qt_produto)
  values(17,1,0);

  /* Inserindo na tabela r_produto_tamanho_estoque*/
  insert into r_produto_tamanho_estoque (cd_produto,cd_tamanho,qt_produto)
  values(17,2,10);

  /* Inserindo na tabela r_produto_tamanho_estoque*/
  insert into r_produto_tamanho_estoque (cd_produto,cd_tamanho,qt_produto)
  values(17,3,10);

  /* Inserindo na tabela r_produto_tamanho_estoque*/
  insert into r_produto_tamanho_estoque (cd_produto,cd_tamanho,qt_produto)
  values(17,4,10);

  /* Inserindo na tabela r_produto_tamanho_estoque*/
  insert into r_produto_tamanho_estoque (cd_produto,cd_tamanho,qt_produto)
  values(17,5,10);

  -- Produto 18 - - - - - - - - - - - - - - - 

  /* Inserindo na tabela tb_produtos*/
  insert into tb_produtos (nm_produto,ds_produto,im_produto,wt_produto,vl_produto,cd_cor,cd_categoria,cd_sub_categoria)
  values('Camisa do Attack on Titan','Camisa com a estampa do Anime Attack on Titan','DSCN0335.png','300','40.00',1,1,5);
  
  /* Inserindo na tabela tb_estoque
  insert into tb_estoque (qt_produto,cd_produto)
  values(2,1);*/
  
  /* Inserindo na tabela tb_especificacao*/
  insert into tb_especificacao (nm_keyword1,nm_keyword2,nm_keyword3,nm_keyword4,cd_produto)
  values('Titan','Attack','Anime','Gigantes',18);
  
  /* Inserindo na tabela r_produto_tamanho
  insert into r_produto_tamanho (cd_produto,cd_tamanho)
  values(1,2);*/

  /* Inserindo na tabela r_produto_tamanho_estoque*/
  insert into r_produto_tamanho_estoque (cd_produto,cd_tamanho,qt_produto)
  values(18,1,0);

  /* Inserindo na tabela r_produto_tamanho_estoque*/
  insert into r_produto_tamanho_estoque (cd_produto,cd_tamanho,qt_produto)
  values(18,2,10);

  /* Inserindo na tabela r_produto_tamanho_estoque*/
  insert into r_produto_tamanho_estoque (cd_produto,cd_tamanho,qt_produto)
  values(18,3,10);

  /* Inserindo na tabela r_produto_tamanho_estoque*/
  insert into r_produto_tamanho_estoque (cd_produto,cd_tamanho,qt_produto)
  values(18,4,10);

  /* Inserindo na tabela r_produto_tamanho_estoque*/
  insert into r_produto_tamanho_estoque (cd_produto,cd_tamanho,qt_produto)
  values(18,5,10);

  -- Produto 19 - - - - - - - - - - - - - - - 

  /* Inserindo na tabela tb_produtos*/
  insert into tb_produtos (nm_produto,ds_produto,im_produto,wt_produto,vl_produto,cd_cor,cd_categoria,cd_sub_categoria)
  values('Camisa do AC/DC','Camisa com a estampa da banda AC/DC','DSCN0346.png','300','40.00',1,1,1);
  
  /* Inserindo na tabela tb_estoque
  insert into tb_estoque (qt_produto,cd_produto)
  values(2,1);*/
  
  /* Inserindo na tabela tb_especificacao*/
  insert into tb_especificacao (nm_keyword1,nm_keyword2,nm_keyword3,nm_keyword4,cd_produto)
  values('Banda','Musica','AC','DC',19);
  
  /* Inserindo na tabela r_produto_tamanho
  insert into r_produto_tamanho (cd_produto,cd_tamanho)
  values(1,2);*/

  /* Inserindo na tabela r_produto_tamanho_estoque*/
  insert into r_produto_tamanho_estoque (cd_produto,cd_tamanho,qt_produto)
  values(19,1,0);

  /* Inserindo na tabela r_produto_tamanho_estoque*/
  insert into r_produto_tamanho_estoque (cd_produto,cd_tamanho,qt_produto)
  values(19,2,10);

  /* Inserindo na tabela r_produto_tamanho_estoque*/
  insert into r_produto_tamanho_estoque (cd_produto,cd_tamanho,qt_produto)
  values(19,3,10);

  /* Inserindo na tabela r_produto_tamanho_estoque*/
  insert into r_produto_tamanho_estoque (cd_produto,cd_tamanho,qt_produto)
  values(19,4,10);

  /* Inserindo na tabela r_produto_tamanho_estoque*/
  insert into r_produto_tamanho_estoque (cd_produto,cd_tamanho,qt_produto)
  values(19,5,10);

  -- Produto 20 - - - - - - - - - - - - - - - 

  /* Inserindo na tabela tb_produtos*/
  insert into tb_produtos (nm_produto,ds_produto,im_produto,wt_produto,vl_produto,cd_cor,cd_categoria,cd_sub_categoria)
  values('Camisa da Umbrella Co.','Camisa com a estampa da Umbrella Corporation do jogo Resident Evil','DSCN0354.png','300','40.00',1,1,2);
  
  /* Inserindo na tabela tb_estoque
  insert into tb_estoque (qt_produto,cd_produto)
  values(2,1);*/
  
  /* Inserindo na tabela tb_especificacao*/
  insert into tb_especificacao (nm_keyword1,nm_keyword2,nm_keyword3,nm_keyword4,cd_produto)
  values('empresa','resident','evil','umbrella',20);
  
  /* Inserindo na tabela r_produto_tamanho
  insert into r_produto_tamanho (cd_produto,cd_tamanho)
  values(1,2);*/

  /* Inserindo na tabela r_produto_tamanho_estoque*/
  insert into r_produto_tamanho_estoque (cd_produto,cd_tamanho,qt_produto)
  values(20,1,0);

  /* Inserindo na tabela r_produto_tamanho_estoque*/
  insert into r_produto_tamanho_estoque (cd_produto,cd_tamanho,qt_produto)
  values(20,2,10);

  /* Inserindo na tabela r_produto_tamanho_estoque*/
  insert into r_produto_tamanho_estoque (cd_produto,cd_tamanho,qt_produto)
  values(20,3,10);

  /* Inserindo na tabela r_produto_tamanho_estoque*/
  insert into r_produto_tamanho_estoque (cd_produto,cd_tamanho,qt_produto)
  values(20,4,10);

  /* Inserindo na tabela r_produto_tamanho_estoque*/
  insert into r_produto_tamanho_estoque (cd_produto,cd_tamanho,qt_produto)
  values(20,5,10);
