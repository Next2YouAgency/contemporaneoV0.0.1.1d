<?php
//Off-line NOTEBOOK
/**/
define("HOST","localhost");
define("USER","root");
define("PASS","");
define("DDB","contemporaneo");
define("USUARIO_DB","n2yco435");
define("SENHA_DB","casolada13231010");
//$conexao = mysqli_connect(HOST, USER, PASS, DDB);
$conexao = mysql_connect(HOST,USER,PASS);
mysql_select_db(DDB,$conexao);
/*
define("HOST","localhost");
define("USER","n2yco435_root");
define("PASS","casolada13231010");
define("DDB","n2yco435_contemporaneo");
define("USUARIO_DB","n2yco435");
 
$conexao = mysql_connect(HOST, USER, PASS) or die (mysql_error);
mysql_select_db(DDB, $conexao) or die (mysql_error);
/**/