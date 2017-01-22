<?php

$QuerySala1 = "CREATE TABLE sala1 (id int(11) NOT NULL PRIMARY KEY, entrada float, saida float, status int(11) NOT NULL DEFAULT '0', materia varchar(255)NULL, professor varchar(255) NULL, exibir_entrada varchar(255), exibir_saida varchar(255), compartilhada int NULL, aluno varchar(255) DEFAULT '0')ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci";
$QuerySala2 = "CREATE TABLE sala2 (id int(11) NOT NULL PRIMARY KEY, entrada float, saida float, status int(11) NOT NULL DEFAULT '0', materia varchar(255)NULL, professor varchar(255) NULL, exibir_entrada varchar(255), exibir_saida varchar(255), compartilhada int NULL, aluno varchar(255) DEFAULT '0')ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci";
$QuerySala3 = "CREATE TABLE sala3 (id int(11) NOT NULL PRIMARY KEY, entrada float, saida float, status int(11) NOT NULL DEFAULT '0', materia varchar(255)NULL, professor varchar(255) NULL, exibir_entrada varchar(255), exibir_saida varchar(255), compartilhada int NULL, aluno varchar(255) DEFAULT '0')ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci";
$QuerySala4 = "CREATE TABLE sala4 (id int(11) NOT NULL PRIMARY KEY, entrada float, saida float, status int(11) NOT NULL DEFAULT '0', materia varchar(255)NULL, professor varchar(255) NULL, exibir_entrada varchar(255), exibir_saida varchar(255), compartilhada int NULL, aluno varchar(255) DEFAULT '0')ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci";
$QuerySala5 = "CREATE TABLE sala5 (id int(11) NOT NULL PRIMARY KEY, entrada float, saida float, status int(11) NOT NULL DEFAULT '0', materia varchar(255)NULL, professor varchar(255) NULL, exibir_entrada varchar(255), exibir_saida varchar(255), compartilhada int NULL, aluno varchar(255) DEFAULT '0')ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci";
$QuerySala6 = "CREATE TABLE sala6 (id int(11) NOT NULL PRIMARY KEY, entrada float, saida float, status int(11) NOT NULL DEFAULT '0', materia varchar(255)NULL, professor varchar(255) NULL, exibir_entrada varchar(255), exibir_saida varchar(255), compartilhada int NULL, aluno varchar(255) DEFAULT '0')ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci";
$criarSala1 = mysql_query($QuerySala1);
echo "Sala1 Criada.<br>";
$criarSala2 = mysql_query($QuerySala2);
echo "Sala2 Criada.<br>";
$criarSala3 = mysql_query($QuerySala3);
echo "Sala3 Criada.<br>";
$criarSala4 = mysql_query($QuerySala4);
echo "Sala4 Criada.<br>";
$criarSala5 = mysql_query($QuerySala5);
echo "Sala5 Criada.<br>";
$criarSala6 = mysql_query($QuerySala6);
echo "Sala6 Criada.<br>";
