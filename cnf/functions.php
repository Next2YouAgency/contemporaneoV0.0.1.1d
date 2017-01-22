<?php

/* * *********************************
  FUNÇÃO DE CADASTRO PESSOAS NO BANCO
 * ********************************* */

function create($tabela, array $dados) {
    $queryBuscarTabela = "SELECT * FROM {$tabela}";
    $exeQrBuscarTabela = mysql_query($queryBuscarTabela);
    $valores = "'" . implode("', '", array_values($dados)) . "'";

    $queryCadastrar = "INSERT INTO {$tabela}";
    $queryCadastrar .= "(tipo_pessoa,tratamento_pessoa,nome_pessoa,genero_pessoa,email_principal,cod_reg_cliente,reg_pessoa_cadastrada) VALUES ($valores)";

    mysql_query($queryCadastrar);
}

/* * *******************************
  FUNÇÃO PARA LER AS TABELAS NO BANCO
  OBS: Genérica
 * ******************************* */

function read($tabela, $cond = null) {
    $qrRead = "SELECT * FROM {$tabela} {$cond}";
    $stRead = mysql_query($qrRead) or die('Erro ao Buscar os valores da tabela: <strong>' . mysql_error() . '</strong>');
    $cFields = mysql_num_fields($stRead);

    for ($y = 0; $y < $cFields; $y++) {
        $names[$y] = mysql_field_name($stRead, $y);
    }

    for ($x = 0; $res = mysql_fetch_assoc($stRead); $x++) {
        for ($i = 0; $i < $cFields; $i++) {
            $resultado[$x][$names[$i]] = $res[$names[$i]];
        }
    }
    return $resultado;
}

/* * ***************************
  GERA RESUMOS
 * *************************** */

function lmWord($string, $words = '20') {
    $string = strip_tags($string);
    $count = strlen($string);

    if ($count <= $words) {
        return $string;
    } else {
        $strpos = strrpos(substr($string, 0, $words), ' ');
        return substr($string, 0, $strpos);
    }
}