<?php
#Versão com ajax
if (isset($_GET['SelectNome'])) {
    include '../../cnf/config.php';

    $matriculaAluno = $_GET['SelectNome'];
    session_start();
    $_SESSION['MATRICULA_ALUNO'] = $matriculaAluno;
    $QueryNomeAluno = "SELECT * FROM alunos WHERE matricula_aluno = '$matriculaAluno'";
//    sleep(1);
    $resultBuscarNome = mysql_query($QueryNomeAluno);
    $ContBuscarNome = mysql_affected_rows($conexao);

    if ($ContBuscarNome > 0) {
        while ($ResultadoNome = mysql_fetch_assoc($resultBuscarNome)) {
            $NomeReturn = $ResultadoNome['nome_aluno'];
            $EscolReturn = $ResultadoNome['escolaridade_aluno'];
            switch ($EscolReturn) {
                case 'Fundamental': $EscolReturnId = 1;
                    break;
                case 'Medio': $EscolReturnId = 2;
                    break;
                case 'Colegial': $EscolReturnId = 3;
                    break;
                case 'Cursinho': $EscolReturnId = 4;
                    break;
                case 'Tutoria': $EscolReturnId = 5;
                    break;
                case 'Grupo': $EscolReturnId = 6;
                    break;
                case 'Faculdade': $EscolReturnId = 7;
                    break;
            }
            ?>
            <input type="text" name="nome_aluno" required id="nome_aluno" class="form-control" value="<?php echo $NomeReturn ?>">
            <input type="hidden" name="escolaridade_aluno" value="<?php echo $EscolReturnId?>">
            <input type="hidden" name="responsavel_pagamento" value="<?php echo $ResultadoNome['responsavel_pagamento']?>">
            <?php
        }
    } else {
        ?>
        <input type="text" name="nome_aluno" disabled id="nome_aluno" class="form-control" value="Digite um número de matrícula válido">
        <?php
    }
}

    