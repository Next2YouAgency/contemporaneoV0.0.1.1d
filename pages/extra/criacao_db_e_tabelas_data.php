<?php

/* Criação do DB por dia de aula */
//Verificar a existência da tabela do dia inserido
$tabelaDataAgendamento = date('d_m_Y', strtotime($dataAula));
$resultAgData = mysql_query("SHOW TABLES LIKE '$tabelaDataAgendamento'");
$tabelaExists = mysql_num_rows($resultAgData) > 0;

//Visualizar DB do Mês
$DbDiaAula = USUARIO_DB . date('d_m_Y', strtotime($dataAula));
$verificarDBDiaAula = mysql_query("SHOW DATABASES LIKE '$DbDiaAula'");
$dbExists = mysql_num_rows($verificarDBDiaAula) > 0;

echo "Tempo de Aula: " . $tempoDeAula;
echo "<br>";

echo "Verificando o Banco de dados para o dia: <b>" . $tabelaDataAgendamento . "</b>...<br>";
if ($dbExists) {
    //Se existir o Db do dia da aula
    mysql_close($conexao);
    echo "O Banco de dados para o dia: <b>" . $tabelaDataAgendamento . "</b> já existe.<br>";
    $conexaoDbDiaAula = mysql_connect(HOST, USER, PASS);
    mysql_select_db($DbDiaAula, $conexaoDbDiaAula);

    //Verificar se as tabelas das salas de aula já existem
    $VerificarTabelasSalas = mysql_query("SHOW TABLES LIKE '$tabelaDataAgendamento'");
    if (mysql_num_rows($VerificarTabelasSalas) > 0) {
        echo "Tabelas com horários para a <b>" . $salaDeAula . "</b> já existem<br>";
        echo "Inserindo Registro da aula no banco de dados <b>" . $tabelaDataAgendamento . "</b>...<br>";
    } else {
        //Criar a tabela no DB do dia
        $ExeQrCriarTabelaData = mysql_query("CREATE TABLE `$tabelaDataAgendamento` (id int(11) NOT NULL AUTO_INCREMENT,matricula_aluno int(11) DEFAULT NULL,nome_aluno varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL,data varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL,sala varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL,prof varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL,entrada varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL,saida varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL,materia varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL,qtd_hora float NOT NULL,valor float NOT NULL,pagamento varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL,PRIMARY KEY (id)) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci");
        echo "Verificando a tabela de aula do dia: <b>" . $tabelaDataAgendamento . "</b>... <br>";
        if ($ExeQrCriarTabelaData) {
            echo "Tabela: " . $tabelaDataAgendamento . " criada com sucesso!<br>";
            echo "Verificando as Tabelas com os horários das salas de aula para o dia: " . $DbDiaAula . "... <br>";
        } else {
            echo "Tabela: <b>" . $tabelaDataAgendamento . "</b> já existe.<br>";
            echo "Verificando as Tabelas com os horários das salas de aula para o dia: <b>" . $tabelaDataAgendamento . "</b>... <br>";
        }
        //Criar as tabelas das salas de aula
        include 'pages/extra/CriarTabelasDasSalas.php';
        //Terminado a criação Inserir os registros
        include 'pages/extra/InserirRegistrosDasSalas.php';
        //Inserir o registro na tabela criada
        $inserirTabelaData = mysql_query("INSERT INTO $tabelaDataAgendamento (matricula_aluno,nome_aluno,sala,prof,entrada,saida,materia,qtd_hora,valor) VALUES('$matricula','$nomeAluno','$salaDeAula','$professor','$horarioEntrada','$horarioSaida','$materiaAula','$tempoDeAula','$valorDaAula')");
        if ($inserirTabelaData) {
            echo "Inserido <br>";
        } else {
            echo "Não inserido: " . mysql_error();
        }
    }

    //Inserir o registro na tabela criada
    $inserirTabelaData = mysql_query("INSERT INTO $tabelaDataAgendamento (matricula_aluno,nome_aluno,sala,prof,entrada,saida,materia,qtd_hora,valor) VALUES('$matricula','$nomeAluno','$salaDeAula','$professor','$horarioEntrada','$horarioSaida','$materiaAula','$tempoDeAula','$valorDaAula')");

    $tempoAula = $tempoDeAula;
    //Update nas salas
    include 'pages/extra/switchUpdateSala.php';

    //Verificar se inseriu o registro
    if ($inserirTabelaData) {
        echo "O registro da aula para o dia <b>" . $tabelaDataAgendamento
        . "</b> foi inserido no banco de dados: <b>" . $DbDiaAula . "</b> na <b>"
        . $salaDeAula . "</b> com entrada as: <b>" . $horarioEntrada
        . "</b> e saída as: <b>" . $horarioSaida . "</b>!<br>";
        echo "Fazendo update nos horários da <b>" . $salaDeAula . "</b>";
    } else {
        echo "Não Inserido! Erro: " . die(mysql_error());
    }
    echo "<br>";
    //Update na tabela da sala selecionada dentro do db do dia
    include 'pages/extra/switchUpdateSala.php';
    echo "<b>Inserindo registro para acompanhamento na agenda... </b><br>";
} else {
//    Criar novo banco de dados para o mês de referência
    $criarDBDiaAula = mysql_query("CREATE DATABASE $DbDiaAula DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci");

//Depois de Criado
    echo "Banco de dados do dia <b>" . $tabelaDataAgendamento . "</b> criado!";
    echo "<br>";
    echo "Criando Tabelas...";
    echo "<br>";
    //    Conceder Privilégios para o usuário do DB
    if (mysql_query("SELECT * FROM mysql.user WHERE User LIKE '%username=" . USUARIO_DB . "%'")) {
//            echo "O usuário <b>" . USUARIO_DB . "</b> Existe!<br>";
        $senhaDB = SENHA_DB;
        $QueryConcederPrivilegios = "GRANT ALL PRIVILEGES ON * . * TO '" . USUARIO_DB . "'@'localhost' identified by '$senhaDB';";
        $ExeQrConcederPrivilegios = mysql_query($QueryConcederPrivilegios);
        if ($ExeQrConcederPrivilegios) {
//                echo "Privilégios concedidos no DB: " . $DbDiaAula . " para o usuario: " . USUARIO_DB . "<br>";
            $QueryFlushPrivilegios = "FLUSH PRIVILEGES";
            $ExeQrFlushPrivilegios = mysql_query($QueryFlushPrivilegios);

            if ($ExeQrFlushPrivilegios) {
//                    echo "Privilégios Atualizados!<br>";
            } else {
//                    echo "Erro na atualização dos privilégios: " . mysql_error() . "<br>";
            }
        } else {
            mysql_query("CREATE USER '" . USUARIO_DB . "'@'localhost' IDENTIFIED BY '$senhaDB'");
            $QueryConcederPrivilegios = "GRANT ALL PRIVILEGES ON * . * TO '" . USUARIO_DB . "'@'localhost' identified by '$senhaDB';";
            $ExeQrConcederPrivilegios = mysql_query($QueryConcederPrivilegios);
            $QueryFlushPrivilegios = "FLUSH PRIVILEGES";
            $ExeQrFlushPrivilegios = mysql_query($QueryFlushPrivilegios);
            if ($ExeQrFlushPrivilegios) {
//                    echo "Privilégios Atualizados!<br>";
            } else {
//                    echo "Erro na atualização dos privilégios: " . mysql_error() . "<br>";
            }

//                echo "Erro ao atribuir privilégios: " . mysql_error() . "<br>";
        }
    }
    $conexaoDBMes = mysql_connect(HOST, USER, PASS);
    mysql_select_db($DbDiaAula, $conexaoDBMes);

    //Criar a tabela no DB do dia

    $QueryCriarTabelaData = "CREATE TABLE $tabelaDataAgendamento (id int(11) NOT NULL AUTO_INCREMENT,matricula_aluno int(11) DEFAULT NULL,nome_aluno varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL,sala varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL,prof varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL,entrada varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL,saida varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL,materia varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL,qtd_hora float NOT NULL,valor varchar(255) NOT NULL,PRIMARY KEY (id)) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci";
    mysql_query($QueryCriarTabelaData);

    //Criar as tabelas das salas de aula
    include 'pages/extra/CriarTabelasDasSalas.php';
    if ($criarSala1 && $criarSala2 && $criarSala3 && $criarSala4 && $criarSala5 && $criarSala6) {
        //Terminado a criação Inserir os registros
        include 'pages/extra/InserirRegistrosDasSalas.php';
        echo "Inserindo o Registro da aula agendada no banco de dados do dia: <b>" . $tabelaDataAgendamento . "</b>...<br>";
    }
    //Inserir o registro na tabela criada
    $inserirTabelaData = mysql_query("INSERT INTO $tabelaDataAgendamento (matricula_aluno,nome_aluno,sala,prof,entrada,saida,materia,qtd_hora,valor) VALUES('$matricula','$nomeAluno','$salaDeAula','$professor','$horarioEntrada','$horarioSaida','$materiaAula','$tempoDeAula','$valorDaAula')");
    if ($inserirTabelaData) {
        echo "Inserido <br>";
    } else {
        echo "Não inserido: " . mysql_error();
    }
    echo "Fazer update nos horários da <b>" . $salaDeAula . "</b>...<br>";

    //Update na tabela da sala selecionada dentro do db do dia
    $tempoAula = $tempoDeAula;
    //Update nas salas
    include 'pages/extra/switchUpdateSala.php';
    //Inserir o registro na tabela criada
    echo $inserirTabelaData = mysql_query("INSERT INTO $tabelaDataAgendamento (matricula_aluno,nome_aluno,sala,prof,entrada,saida,materia,qtd_hora) VALUES('$matricula','$nomeAluno','$salaDeAula','$professor','$horarioEntrada','$horarioSaida','$materiaAula','$tempoDeAula')");
    mysql_close($conexaoDBMes);
}