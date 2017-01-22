/*Criar o banco de dados*/
CREATE DATABASE contemporaneo DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

/*EXCLUIR AS TABELAS E DB EXTRA*/
DROP DATABASE n2yco43522_01_2017;
DROP TABLES 
agenda_aulas, 
alunos, 
escolaridade_aluno,
escolaridade_yoshio,
materias_disponiveis,
pagamentos_efetuados,
professores,
sala1,
sala2,
sala3,
sala4,
sala5,
sala6,
salas,
usuarios,
variacao_preco;
/*FIM EXCLUIR*/

/*Tabela ALUNOS */
CREATE TABLE alunos (
 matricula_aluno int(11) NOT NULL AUTO_INCREMENT,
 nome_aluno varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL,
 escolaridade_aluno varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL,
 telefone_aluno varchar(255) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
 nome_mae varchar(255) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
 telefone_mae varchar(255) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
 nome_pai varchar(255) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
 telefone_pai varchar(255) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
 responsavel_pagamento varchar(500) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
 desconto varchar(2) DEFAULT NULL,
 foto_aluno varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL DEFAULT 'img/fotos/default.png',
 cep_endereco varchar(255) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
 endereco_completo varchar(255) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
 numero_endereco int(11) DEFAULT NULL,
 bairro_endereco varchar(255) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
 cidade_endereco varchar(255) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
 estado_endereco varchar(255) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
 complemento_endereco varchar(255) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
 cupom_desconto varchar(255) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
 descricao_aluno varchar(5000) COLLATE utf8_general_mysql500_ci DEFAULT 'NOT DEFINED',
 PRIMARY KEY (matricula_aluno)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;
/*Inserir Alunos de Testes*/
INSERT INTO alunos (matricula_aluno, nome_aluno, escolaridade_aluno, telefone_aluno, nome_mae, telefone_mae, nome_pai, telefone_pai, responsavel_pagamento, desconto, foto_aluno, cep_endereco, endereco_completo, numero_endereco, bairro_endereco, cidade_endereco, estado_endereco, complemento_endereco, cupom_desconto, descricao_aluno) VALUES 
(NULL, 'Reunião', 'Fundamental', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'img/fotos/default.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'NOT DEFINED'), 
(NULL, 'Aluno de Testes 1 - Fundamental', 'Fundamental', '11999999999', NULL, NULL, NULL, NULL, NULL, NULL, 'img/fotos/default.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'NOT DEFINED'), 
(NULL, 'Aluno de Testes 2 - MÃ©dio', 'Medio', '11999999999', NULL, NULL, NULL, NULL, NULL, NULL, 'img/fotos/default.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'NOT DEFINED'), 
(NULL, 'Aluno de Testes 3 - Colegial', 'Colegial', '11999999999', NULL, NULL, NULL, NULL, NULL, NULL, 'img/fotos/default.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'NOT DEFINED'), 
(NULL, 'Aluno de Testes 4 - Cursinho', 'Cursinho', '11999999999', NULL, NULL, NULL, NULL, NULL, NULL, 'img/fotos/default.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'NOT DEFINED'), 
(NULL, 'Aluno de Testes 5 - Tutoria', 'Tutoria', '11999999999', NULL, NULL, NULL, NULL, NULL, NULL, 'img/fotos/default.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'NOT DEFINED'), 
(NULL, 'Aluno de Testes 6 - Grupo', 'Grupo', '11999999999', NULL, NULL, NULL, NULL, NULL, NULL, 'img/fotos/default.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'NOT DEFINED'), 
(NULL, 'Aluno de Testes 7 - Faculdade', 'Faculdade', '11999999999', NULL, NULL, NULL, NULL, NULL, NULL, 'img/fotos/default.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'NOT DEFINED');

/*Fim da tabela de alunos*/

/*Tabela de Agendamento de aulas*/
CREATE TABLE agenda_aulas (
 id int(11) NOT NULL AUTO_INCREMENT,
 matricula_aluno int(11) DEFAULT NULL,
 nome_aluno varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL,
 responsavel_pagamento varchar(255) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
 descricao_aula varchar(5000) DEFAULT NULL,
 data varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL,
 sala varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL,
 prof varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL,
 entrada varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL,
 saida varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL,
 materia varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL,
 qtd_hora float NOT NULL,
 valor float NOT NULL,
 pagamento varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL,
 PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;
/*Fim Tabema de Agendamento de aulas*/

/*Matérias Disponíveis*/
CREATE TABLE materias_disponiveis (
 id int(11) NOT NULL AUTO_INCREMENT,
 materia varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL,
 PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;
/*Inserir Registros das materias_disponiveis*/
INSERT INTO materias_disponiveis(materia) VALUES 
('Artes'),
('Geografia'),
('HistÃ³ria'),
('Filosofia'),
('MatemÃ¡tica'),
('Sociologia'),
('Biologia'),
('FÃ­sica'),
('InglÃªs'),
('PortuguÃªs')
;
/*Fim de Matérias Disponíveis*/

/*Professores*/

CREATE TABLE professores (
 id int(11) NOT NULL AUTO_INCREMENT,
 nome varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL,
 materia varchar(255) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
 telefone_principal varchar(255) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
 telefone_contato varchar(255) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
 cep_endereco varchar(255) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
 endereco_completo varchar(255) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
 numero_endereco int(11) DEFAULT NULL,
 bairro_endereco varchar(255) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
 cidade_endereco varchar(255) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
 estado_endereco varchar(255) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
 complemento_endereco varchar(255) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
 banco_professor varchar(255) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
 agencia_banco_professor varchar(255) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
 dig_agencia_banco_professor varchar(255) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
 conta_banco_professor varchar(255) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
 valor_hora float DEFAULT NULL,
 valor_hora_res float DEFAULT '0',
 dia_pagamento int(11) DEFAULT NULL,
 PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;
/*Professor de Testes*/

INSERT INTO professores (id, nome, materia, telefone_principal, telefone_contato, cep_endereco, endereco_completo, numero_endereco, bairro_endereco, cidade_endereco, estado_endereco, complemento_endereco, banco_professor, agencia_banco_professor, dig_agencia_banco_professor, conta_banco_professor, valor_hora, valor_hora_res, dia_pagamento) VALUES 
(1, 'Ariosvaldo dos Santos', 'Artes', '11946792419', '11946792419', '03977380', 'Rua Sargento EdÃ©sio Afonso de Carvalho', 128, 'Conjunto Habitacional Marechal Mascarenhas de Morais', 'Conjunto Habitacional Marechal Mascarenhas de Morais', 'SP', 'Casa 1', '', '8452', '', '130860', 10, 20, 5),
(2, 'Clementino dos Santos Oliveira', 'Geografia', '11999999999', '11999999999', '03977380', 'Rua Sargento EdÃ©sio Afonso de Carvalho', 128, 'Conjunto Habitacional Marechal Mascarenhas de Morais', 'Conjunto Habitacional Marechal Mascarenhas de Morais', 'SP', 'Casa 2', '', '8452', '', '130860', 30, 40, 10),
(3, 'Risos Cledivanderson', 'HistÃ³ria', '11999999999', '11999999999', '03977380', 'Rua Sargento EdÃ©sio Afonso de Carvalho', 128, 'Conjunto Habitacional Marechal Mascarenhas de Morais', 'Conjunto Habitacional Marechal Mascarenhas de Morais', 'SP', 'Casa 3', '', '8452', '', '130860', 35, 45, 10),
(4, 'ClÃ©verson dos Santos', 'Filosofia', '11999999999', '11999999999', '03977380', 'Rua Sargento EdÃ©sio Afonso de Carvalho', 128, 'Conjunto Habitacional Marechal Mascarenhas de Morais', 'Conjunto Habitacional Marechal Mascarenhas de Morais', 'SP', 'Casa 4', '', '8452', '', '130860', 37, 47, 10),
(5, 'Aristolfo de Oliveira', 'MatemÃ¡tica', '11999999999', '11999999999', '03977380', 'Rua Sargento EdÃ©sio Afonso de Carvalho', 128, 'Conjunto Habitacional Marechal Mascarenhas de Morais', 'Conjunto Habitacional Marechal Mascarenhas de Morais', 'SP', 'Casa 5', '', '8452', '', '130860', 32, 42, 10),
(6, 'Benedito dos Santos', 'Sociologia', '11999999999', '11999999999', '03977380', 'Rua Sargento EdÃ©sio Afonso de Carvalho', 128, 'Conjunto Habitacional Marechal Mascarenhas de Morais', 'Conjunto Habitacional Marechal Mascarenhas de Morais', 'SP', 'Casa 6', '', '8452', '', '130860', 29, 39, 10),
(7, 'Cleonildo Neves', 'Biologia', '11999999999', '11999999999', '03977380', 'Rua Sargento EdÃ©sio Afonso de Carvalho', 128, 'Conjunto Habitacional Marechal Mascarenhas de Morais', 'Conjunto Habitacional Marechal Mascarenhas de Morais', 'SP', 'Casa 7', '', '8452', '', '130860', 38, 48, 10),
(8, 'DiÃ³genes Clementino', 'FÃ­sica', '11999999999', '11999999999', '03977380', 'Rua Sargento EdÃ©sio Afonso de Carvalho', 128, 'Conjunto Habitacional Marechal Mascarenhas de Morais', 'Conjunto Habitacional Marechal Mascarenhas de Morais', 'SP', 'Casa 8', '', '8452', '', '130860', 42, 52, 10),
(9, 'EugÃªnio da Silva', 'InglÃªs', '11999999999', '11999999999', '03977380', 'Rua Sargento EdÃ©sio Afonso de Carvalho', 128, 'Conjunto Habitacional Marechal Mascarenhas de Morais', 'Conjunto Habitacional Marechal Mascarenhas de Morais', 'SP', 'Casa 9', '', '8452', '', '130860', 41, 51, 10),
(10, 'Fiuky Tashi', 'PortuguÃªs', '11999999999', '11999999999', '03977380', 'Rua Sargento EdÃ©sio Afonso de Carvalho', 128, 'Conjunto Habitacional Marechal Mascarenhas de Morais', 'Conjunto Habitacional Marechal Mascarenhas de Morais', 'SP', 'Casa 10', '', '8452', '', '130860', 44, 54, 10),
(11, 'Yoshio', 'MatemÃ¡tica', '11999999999', '11999999999', '03977380', 'Rua Sargento EdÃ©sio Afonso de Carvalho', 128, 'Conjunto Habitacional Marechal Mascarenhas de Morais', 'Conjunto Habitacional Marechal Mascarenhas de Morais', 'SP', 'Casa 10', '', '8452', '', '130860', 44, 54, 10);
/*Fim de Professores*/


/*Salas de aulas*/
/*Criar Tabela de nomes salas */
	CREATE TABLE salas (
	 cod_sala int(11) NOT NULL,
	 nome_sala varchar(255) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
	 PRIMARY KEY (cod_sala)
	) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;
	/*Inserir nomes das salas*/
	INSERT INTO salas(cod_sala,nome_sala) VALUES (1,'sala1'),(2,'sala2'),(3,'sala3'),(4,'sala4'),(5,'sala5'),(6,'sala6');

/*Sala 1*/
CREATE TABLE sala1 (
 id int(11) NOT NULL,
 entrada float DEFAULT NULL,
 saida float DEFAULT NULL,
 status int(11) NOT NULL DEFAULT '0',
 exibir_entrada varchar(255) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
 exibir_saida varchar(255) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
 PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;
/*Registros da Sala 1*/
INSERT INTO sala1 (id, entrada, saida, status, exibir_entrada, exibir_saida) VALUES (1, 6.5, 7, 0,"06:30","07:00"),(2, 7, 7.5, 0,"07:00","07:30"),(3, 7.5, 8, 0,"07:30","08:00"),(4, 8, 8.5, 0,"08:00","08:30"),(5, 8.5, 9, 0,"08:30","09:00"),(6, 9, 9.5, 0,"09:00","09:30"),(7, 9.5, 10, 0,"09:30","10:00"),(8, 10, 10.5, 0,"10:00","10:30"),(9, 10.5, 11, 0,"10:30","11:00"),(10, 11, 11.5, 0,"11:00","11:30"),(11, 11.5, 12, 0,"11:30","12:00"),(12, 12, 12.5, 0,"12:00","12:30"),(13, 12.5, 13, 0,"12:30","13:00"),(14, 13, 13.5, 0,"13:00","13:30"),(15, 13.5, 14, 0,"13:30","14:00"),(16, 14, 14.5, 0,"14:00","14:30"),(17, 14.5, 15, 0,"14:30","15:00"),(18, 15, 15.5, 0,"15:00","15:30"),(19, 15.5, 16, 0,"15:30","16:00"),(20, 16, 16.5, 0,"16:00","16:30"),(21, 16.5, 17, 0,"16:30","17:00"),(22, 17, 17.5, 0,"17:00","17:30"),(23, 17.5, 18, 0,"17:30","18:00"),(24, 18, 18.5, 0,"18:00","18:30"),(25, 18.5, 19, 0,"18:30","19:00"),(26, 19, 19.5, 0,"19:00","19:30"),(27, 19.5, 20, 0,"19:30","20:00"),(28, 20, 20.5, 0,"20:00","20:30"),(29, 20.5, 21, 0,"20:30","21:00"),(30, 21, 21.5, 0,"21:00","21:30"),(31, 21.5, 22, 0,"21:30","22:00"),(32, 21.5, 22, 0,"22:00","22:30"),(33, 21.5, 22, 0,"22:30","23:00");

/*Sala 2*/
CREATE TABLE sala2 (
 id int(11) NOT NULL,
 entrada float DEFAULT NULL,
 saida float DEFAULT NULL,
 status int(11) NOT NULL DEFAULT '0',
 exibir_entrada varchar(255) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
 exibir_saida varchar(255) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
 PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;
/*Registros da Sala 2*/
INSERT INTO sala2 (id, entrada, saida, status, exibir_entrada, exibir_saida) VALUES (1, 6.5, 7, 0,"06:30","07:00"),(2, 7, 7.5, 0,"07:00","07:30"),(3, 7.5, 8, 0,"07:30","08:00"),(4, 8, 8.5, 0,"08:00","08:30"),(5, 8.5, 9, 0,"08:30","09:00"),(6, 9, 9.5, 0,"09:00","09:30"),(7, 9.5, 10, 0,"09:30","10:00"),(8, 10, 10.5, 0,"10:00","10:30"),(9, 10.5, 11, 0,"10:30","11:00"),(10, 11, 11.5, 0,"11:00","11:30"),(11, 11.5, 12, 0,"11:30","12:00"),(12, 12, 12.5, 0,"12:00","12:30"),(13, 12.5, 13, 0,"12:30","13:00"),(14, 13, 13.5, 0,"13:00","13:30"),(15, 13.5, 14, 0,"13:30","14:00"),(16, 14, 14.5, 0,"14:00","14:30"),(17, 14.5, 15, 0,"14:30","15:00"),(18, 15, 15.5, 0,"15:00","15:30"),(19, 15.5, 16, 0,"15:30","16:00"),(20, 16, 16.5, 0,"16:00","16:30"),(21, 16.5, 17, 0,"16:30","17:00"),(22, 17, 17.5, 0,"17:00","17:30"),(23, 17.5, 18, 0,"17:30","18:00"),(24, 18, 18.5, 0,"18:00","18:30"),(25, 18.5, 19, 0,"18:30","19:00"),(26, 19, 19.5, 0,"19:00","19:30"),(27, 19.5, 20, 0,"19:30","20:00"),(28, 20, 20.5, 0,"20:00","20:30"),(29, 20.5, 21, 0,"20:30","21:00"),(30, 21, 21.5, 0,"21:00","21:30"),(31, 21.5, 22, 0,"21:30","22:00"),(32, 21.5, 22, 0,"22:00","22:30"),(33, 21.5, 22, 0,"22:30","23:00");

/*Sala 3*/
CREATE TABLE sala3 (
 id int(11) NOT NULL,
 entrada float DEFAULT NULL,
 saida float DEFAULT NULL,
 status int(11) NOT NULL DEFAULT '0',
 exibir_entrada varchar(255) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
 exibir_saida varchar(255) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
 PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;
/*Registros da Sala 3*/
INSERT INTO sala3 (id, entrada, saida, status, exibir_entrada, exibir_saida) VALUES (1, 6.5, 7, 0,"06:30","07:00"),(2, 7, 7.5, 0,"07:00","07:30"),(3, 7.5, 8, 0,"07:30","08:00"),(4, 8, 8.5, 0,"08:00","08:30"),(5, 8.5, 9, 0,"08:30","09:00"),(6, 9, 9.5, 0,"09:00","09:30"),(7, 9.5, 10, 0,"09:30","10:00"),(8, 10, 10.5, 0,"10:00","10:30"),(9, 10.5, 11, 0,"10:30","11:00"),(10, 11, 11.5, 0,"11:00","11:30"),(11, 11.5, 12, 0,"11:30","12:00"),(12, 12, 12.5, 0,"12:00","12:30"),(13, 12.5, 13, 0,"12:30","13:00"),(14, 13, 13.5, 0,"13:00","13:30"),(15, 13.5, 14, 0,"13:30","14:00"),(16, 14, 14.5, 0,"14:00","14:30"),(17, 14.5, 15, 0,"14:30","15:00"),(18, 15, 15.5, 0,"15:00","15:30"),(19, 15.5, 16, 0,"15:30","16:00"),(20, 16, 16.5, 0,"16:00","16:30"),(21, 16.5, 17, 0,"16:30","17:00"),(22, 17, 17.5, 0,"17:00","17:30"),(23, 17.5, 18, 0,"17:30","18:00"),(24, 18, 18.5, 0,"18:00","18:30"),(25, 18.5, 19, 0,"18:30","19:00"),(26, 19, 19.5, 0,"19:00","19:30"),(27, 19.5, 20, 0,"19:30","20:00"),(28, 20, 20.5, 0,"20:00","20:30"),(29, 20.5, 21, 0,"20:30","21:00"),(30, 21, 21.5, 0,"21:00","21:30"),(31, 21.5, 22, 0,"21:30","22:00"),(32, 21.5, 22, 0,"22:00","22:30"),(33, 21.5, 22, 0,"22:30","23:00");

/*Sala 4*/
CREATE TABLE sala4 (
 id int(11) NOT NULL,
 entrada float DEFAULT NULL,
 saida float DEFAULT NULL,
 status int(11) NOT NULL DEFAULT '0',
 exibir_entrada varchar(255) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
 exibir_saida varchar(255) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
 PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;
/*Registros da Sala 4*/
INSERT INTO sala4 (id, entrada, saida, status, exibir_entrada, exibir_saida) VALUES (1, 6.5, 7, 0,"06:30","07:00"),(2, 7, 7.5, 0,"07:00","07:30"),(3, 7.5, 8, 0,"07:30","08:00"),(4, 8, 8.5, 0,"08:00","08:30"),(5, 8.5, 9, 0,"08:30","09:00"),(6, 9, 9.5, 0,"09:00","09:30"),(7, 9.5, 10, 0,"09:30","10:00"),(8, 10, 10.5, 0,"10:00","10:30"),(9, 10.5, 11, 0,"10:30","11:00"),(10, 11, 11.5, 0,"11:00","11:30"),(11, 11.5, 12, 0,"11:30","12:00"),(12, 12, 12.5, 0,"12:00","12:30"),(13, 12.5, 13, 0,"12:30","13:00"),(14, 13, 13.5, 0,"13:00","13:30"),(15, 13.5, 14, 0,"13:30","14:00"),(16, 14, 14.5, 0,"14:00","14:30"),(17, 14.5, 15, 0,"14:30","15:00"),(18, 15, 15.5, 0,"15:00","15:30"),(19, 15.5, 16, 0,"15:30","16:00"),(20, 16, 16.5, 0,"16:00","16:30"),(21, 16.5, 17, 0,"16:30","17:00"),(22, 17, 17.5, 0,"17:00","17:30"),(23, 17.5, 18, 0,"17:30","18:00"),(24, 18, 18.5, 0,"18:00","18:30"),(25, 18.5, 19, 0,"18:30","19:00"),(26, 19, 19.5, 0,"19:00","19:30"),(27, 19.5, 20, 0,"19:30","20:00"),(28, 20, 20.5, 0,"20:00","20:30"),(29, 20.5, 21, 0,"20:30","21:00"),(30, 21, 21.5, 0,"21:00","21:30"),(31, 21.5, 22, 0,"21:30","22:00"),(32, 21.5, 22, 0,"22:00","22:30"),(33, 21.5, 22, 0,"22:30","23:00");

/*Sala 5*/
CREATE TABLE sala5 (
 id int(11) NOT NULL,
 entrada float DEFAULT NULL,
 saida float DEFAULT NULL,
 status int(11) NOT NULL DEFAULT '0',
 exibir_entrada varchar(255) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
 exibir_saida varchar(255) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
 PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;
/*Registros da Sala 5*/
INSERT INTO sala5 (id, entrada, saida, status, exibir_entrada, exibir_saida) VALUES (1, 6.5, 7, 0,"06:30","07:00"),(2, 7, 7.5, 0,"07:00","07:30"),(3, 7.5, 8, 0,"07:30","08:00"),(4, 8, 8.5, 0,"08:00","08:30"),(5, 8.5, 9, 0,"08:30","09:00"),(6, 9, 9.5, 0,"09:00","09:30"),(7, 9.5, 10, 0,"09:30","10:00"),(8, 10, 10.5, 0,"10:00","10:30"),(9, 10.5, 11, 0,"10:30","11:00"),(10, 11, 11.5, 0,"11:00","11:30"),(11, 11.5, 12, 0,"11:30","12:00"),(12, 12, 12.5, 0,"12:00","12:30"),(13, 12.5, 13, 0,"12:30","13:00"),(14, 13, 13.5, 0,"13:00","13:30"),(15, 13.5, 14, 0,"13:30","14:00"),(16, 14, 14.5, 0,"14:00","14:30"),(17, 14.5, 15, 0,"14:30","15:00"),(18, 15, 15.5, 0,"15:00","15:30"),(19, 15.5, 16, 0,"15:30","16:00"),(20, 16, 16.5, 0,"16:00","16:30"),(21, 16.5, 17, 0,"16:30","17:00"),(22, 17, 17.5, 0,"17:00","17:30"),(23, 17.5, 18, 0,"17:30","18:00"),(24, 18, 18.5, 0,"18:00","18:30"),(25, 18.5, 19, 0,"18:30","19:00"),(26, 19, 19.5, 0,"19:00","19:30"),(27, 19.5, 20, 0,"19:30","20:00"),(28, 20, 20.5, 0,"20:00","20:30"),(29, 20.5, 21, 0,"20:30","21:00"),(30, 21, 21.5, 0,"21:00","21:30"),(31, 21.5, 22, 0,"21:30","22:00"),(32, 21.5, 22, 0,"22:00","22:30"),(33, 21.5, 22, 0,"22:30","23:00");

/*Sala 6*/
CREATE TABLE sala6 (
 id int(11) NOT NULL,
 entrada float DEFAULT NULL,
 saida float DEFAULT NULL,
 status int(11) NOT NULL DEFAULT '0',
 exibir_entrada varchar(255) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
 exibir_saida varchar(255) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
 PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;
/*Registros da Sala 6*/
INSERT INTO sala6 (id, entrada, saida, status, exibir_entrada, exibir_saida) VALUES (1, 6.5, 7, 0,"06:30","07:00"),(2, 7, 7.5, 0,"07:00","07:30"),(3, 7.5, 8, 0,"07:30","08:00"),(4, 8, 8.5, 0,"08:00","08:30"),(5, 8.5, 9, 0,"08:30","09:00"),(6, 9, 9.5, 0,"09:00","09:30"),(7, 9.5, 10, 0,"09:30","10:00"),(8, 10, 10.5, 0,"10:00","10:30"),(9, 10.5, 11, 0,"10:30","11:00"),(10, 11, 11.5, 0,"11:00","11:30"),(11, 11.5, 12, 0,"11:30","12:00"),(12, 12, 12.5, 0,"12:00","12:30"),(13, 12.5, 13, 0,"12:30","13:00"),(14, 13, 13.5, 0,"13:00","13:30"),(15, 13.5, 14, 0,"13:30","14:00"),(16, 14, 14.5, 0,"14:00","14:30"),(17, 14.5, 15, 0,"14:30","15:00"),(18, 15, 15.5, 0,"15:00","15:30"),(19, 15.5, 16, 0,"15:30","16:00"),(20, 16, 16.5, 0,"16:00","16:30"),(21, 16.5, 17, 0,"16:30","17:00"),(22, 17, 17.5, 0,"17:00","17:30"),(23, 17.5, 18, 0,"17:30","18:00"),(24, 18, 18.5, 0,"18:00","18:30"),(25, 18.5, 19, 0,"18:30","19:00"),(26, 19, 19.5, 0,"19:00","19:30"),(27, 19.5, 20, 0,"19:30","20:00"),(28, 20, 20.5, 0,"20:00","20:30"),(29, 20.5, 21, 0,"20:30","21:00"),(30, 21, 21.5, 0,"21:00","21:30"),(31, 21.5, 22, 0,"21:30","22:00"),(32, 21.5, 22, 0,"22:00","22:30"),(33, 21.5, 22, 0,"22:30","23:00");
/*Fim da criação das salas de aula*/

/*Tabela de usuários*/
CREATE TABLE usuarios (
 id int(11) NOT NULL AUTO_INCREMENT,
 nome varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL,
 usuario varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL,
 usuario_md5 varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL COMMENT 'Usuário com criptografia md5',
 senha varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL,
 senha_md5 varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL,
 departamento varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL,
 level_acesso int(11) NOT NULL,
 foto varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL DEFAULT 'img/default.png',
 PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;
/*Registro do usuário Master*/
INSERT INTO usuarios(id,nome,usuario,usuario_md5,senha,senha_md5,departamento,level_acesso,foto) VALUES(1,'Administrador do Sistema','master','eb0a191797624dd3a48fa681d3061212','master','eb0a191797624dd3a48fa681d3061212','Adm Sis',0,'img/fotos/admin.png');
/*Fim da tabela de usuários*/




/*Valores para pagamento de aulas (base)*/
CREATE TABLE escolaridade_aluno (
id int(10) not null primary key auto_increment,
nivel varchar(255),
valor float
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;
/*Inserir Valores na tabela de preço por escolaridade_aluno */
INSERT INTO escolaridade_aluno (nivel,valor)
VALUES 
('Fundamental','117'),
('Medio','124'),
('Colegial','135'),
('Universidade','190'),
('Cursinho','190'),
('PlantÃ£o','180'),
('Grupo','250');
/*Fim Valores para pagamento de aulas (base)*/

CREATE TABLE variacao_preco (
id int (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
variar float DEFAULT '0'
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;
/*Insert Variações*/
INSERT INTO variacao_preco(id,variar) VALUES(1,0),(2,40);
/*Fim variações*/

/*TABELA Yoshio*/
CREATE TABLE escolaridade_yoshio(
	id int(10) not null primary key auto_increment,
	nivel varchar(255),
	valor float
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;
	/*Iserir na tabela escolaridade_yoshio*/
	INSERT INTO escolaridade_yoshio (nivel,valor)VALUES 
	('Fundamental','158'),
	('Medio','180'),
	('Colegial','200'),
	('Universidade','290'),
	('Cursinho','290'),
	('PlantÃ£o','180'),
	('Grupo','250');
	/*Fim tabela escolaridade_yoshio*/
/*Fim TABELA Yoshio*/
/*Tabela de Pagamentos */
CREATE TABLE pagamentos_efetuados(
	id int(11) not null primary key auto_increment,
	matricula varchar(255) not null,
	nome_aluno varchar(255) not null,
	valor_pagamento varchar(255) not null,
	forma_pagamento varchar(255) not null,
	comprovante_pagamento varchar(255) not null,
	data_confirmacao varchar(255) not null
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;
/*Fim tabela de Pagamentos*/
/*Tabela de salas update
CREATE TABLE sala1 (id int(11) NOT NULL PRIMARY KEY, entrada float, saida float, status int(11) NOT NULL DEFAULT '0', materia varchar(255)NULL, professor varchar(255) NULL, exibir_entrada varchar(255), exibir_saida varchar(255), compartilhada int NULL, aluno id(11) NULL DEFAULT 0 FOREIGN KEY (aluno) references alunos(matricula_aluno))ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci
*/