<?php
#Versão com ajax
if ($_GET['BtnClicado'] == 'matriculado') {
    include '../../cnf/config.php';
    sleep(1);
    ?>
    <div class="form-group col-md-3">
        <label for="matricula_aluno">Matrícula: </label>
        <!--Retornar com Ajax-->
        <input type="text" name="matricula_aluno" onkeyup="returnNomeAluno();" id="matricula_aluno" required placeholder="Digite o número da matrícula" class="form-control">
    </div>
    <div class="form-group col-md-9">
        <label for="nome_aluno">Nome do aluno:</label>
        <div id="nome_aluno">
            <input type="text" disabled name="nome_aluno" id="nome_aluno" class="form-control" placeholder="Digie a matrícula do aluno" >
        </div>
    </div>
    <?php
}

