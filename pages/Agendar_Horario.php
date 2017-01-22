<?php
$db = mysql_connect("localhost", "root", "");
$basedados = mysql_select_db("contemporaneo");
if (isset($_POST['enviar'])) {
    ?>
    <!-- Modal Logged in-->
    <div class="modal fade in text-muted" id="modalLoggedIn" tabindex="1" role="dialog" aria-labelledby="myModalLabel" style="display: block;overflow-y: auto;">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <a href="?acesso=Home" type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></a>
                    <h4 class="modal-title" id="myModalLabel">Registrando a aula solicitada!</h4>
                </div>
                <div class="modal-body">

                    <?php
                    $ExeQrBuscarPagamentoAula = mysql_query("SELECT * FROM escolaridade_aluno WHERE id = '$_POST[escolaridade_aluno]'");
                    $matricula = $_POST['matricula_aluno'];
                    $nomeAluno = $_POST['nome_aluno'];
                    $respPagamento = $_POST['responsavel_pagamento'];
                    $descricaoAula = $_POST['descricao_aula'];
                    $telefoneAluno = $_POST['telefone_aluno'];
                    $dataAula = $_POST['data'];
                    $salaDeAula = $_POST['sala_de_aula'];
                    $professor = $_POST['professor'];
                    $tempoDeAula = $_POST['tempo_de_aula'];
                    while ($ResBuscarEscolaridade = mysql_fetch_assoc($ExeQrBuscarPagamentoAula)) {
                        if (date('m') > 4) {
                            $ResBuscarEscolaridade['valor'] = $ResBuscarEscolaridade['valor'] + ($ResBuscarEscolaridade['valor'] * 8) / 100;
                        } else {
                            $ResBuscarEscolaridade['valor'] = $ResBuscarEscolaridade['valor'] - ($ResBuscarEscolaridade['valor'] * 8) / 100;
                        }
                        if ($professor == "Yoshio") {
                            $ExeQrBuscarPagamentoAula = mysql_query("SELECT * FROM escolaridade_yoshio WHERE id = '$_POST[escolaridade_aluno]'");
                            if($ExeQrBuscarPagamentoAula){
                                while($ReturnPagamentoYoshio = mysql_fetch_assoc($ExeQrBuscarPagamentoAula)){
                                    $valorDaAula = $ReturnPagamentoYoshio[valor];
                                }
                            }
                        }
                        
                        $escolaridadeAluno = $ResBuscarEscolaridade['nivel'];
                        $valorDaAula = $ResBuscarEscolaridade['valor'] * $tempoDeAula;
                        if ($_POST['local_da_aula'] == 1) {
                            $valorDaAula = $valorDaAula + ($valorDaAula + $valorDaAula * 40) / 100;
                        }
                    }
                    $horarioEntrada = $_POST['horario_entrada'];
                    $horarioSaida = $horarioEntrada + $tempoDeAula;
                    $materiaAula = $_POST['materia'];
                    $pagamentoAula = $_POST['pagamento'];
                    $compartilharAula = $_POST['compartilhar_aula'];

                    //Pré Cadastro do aluno
                    $ExeQrConsultarAlunos = mysql_query("SELECT * FROM alunos WHERE matricula_aluno = '$matricula'");
                    if (mysql_num_rows($ExeQrConsultarAlunos) <= 0) {
                        $cadastrarAluno = mysql_query("INSERT INTO alunos (matricula_aluno,nome_aluno,escolaridade_aluno,telefone_aluno) VALUES ('$matricula','$nomeAluno','$escolaridadeAluno','$telefoneAluno')")or die(mysql_error());
                        ?>
                        <p>O aluno <b><?php echo $nomeAluno ?></b> agora tem um pré-cadastro com o registro: <b><?php echo $matricula ?></b>.
                        <p>Lembre de atualizar o cadastro no dia da aula!</p>
                        <?php
                    } else {
                        ?>
                        <p>O aluno: <b><?php echo $nomeAluno ?></b> já tem cadastro, verifique se está atualizado!</p>
                        <?php
                    }
                    ?>
                    <h4>Iniciando o processo de inclusão da aula no banco de dados...</h4>
                    <?php
                    echo "Valor da Aula: $valorDaAula <br>";
                    echo "Escolaridade: $escolaridadeAluno <br>";
                    echo "Responsável pelo pagamento: $respPagamento <br>";
                    echo "Descrição: $descricaoAula <br>";
//Agenda por dia, estudar uma forma neste abaixo, criar uma tabela com o dia para armazenar os agendamentos
                    include_once 'pages/extra/criacao_db_e_tabelas_data.php';

                    $conexao = mysql_connect(HOST, USER, PASS);
                    $mysql_connect = mysql_select_db(DDB, $conexao);

                    $QrCadastrar = "INSERT INTO agenda_aulas (id, matricula_aluno, nome_aluno, responsavel_pagamento, descricao_aula, data, sala, prof, entrada, saida, materia, qtd_hora, valor, pagamento) VALUES (NULL, '$matricula', '$nomeAluno', '$respPagamento', '$descricaoAula', '$dataAula', '$salaDeAula', '$professor', '$horarioEntrada', '$horarioSaida', '$materiaAula', '$tempoDeAula', '$valorDaAula', '$pagamentoAula')";
                    $cadastrar = mysql_query($QrCadastrar);


                    if ($cadastrar) {
                        ?>
                        <p>Registro da aula de <b><?php echo $materiaAula ?></b> para o dia <b><?php echo date('d-m-Y', strtotime($dataAula)) ?></b> adicionado com sucesso!</p>
                        <?php
                    } else {
                        //Esse script dará um alerta de que não foi inserido com sucesso e chamará a página de cadastro novamente
                        ?>
                        <p>Ocorreu um erro durante a inserção no banco de dados! Contate o administrador do sistema e informe o erro: <?php echo mysql_error(); ?></p>
                        <?php
                    }
                    ?>

                </div>
                <div class="clearfix"></div>
                <div class="modal-footer">
                    <a href="?acesso=Consultar_Agenda" type="button" class="btn btn-default">Fechar</a>
                    <a href="?acesso=Agendar_Horario" type="button" class="btn btn-primary">Cadastrar Novo</a>
                </div>
            </div>
        </div>
    </div>
    <?php
} else {
    ?>
    <script src="js/ajax/agendamento_buscar_aluno.js"></script>
    <script src="js/ajax/returnMatriculasAgendamentos.js"></script>
    <script src="js/ajax/returnSalasBuscadas.js"></script>
    <script src="js/ajax/returnProfessorMateria.js"></script>
    <script src="js/ajax/returnHorariosDisp.js"></script>
    <div class="col-md-12" style="padding-bottom: 20px;">
        <div class="col-md-12">
            <div class="col-md-12 text-left">
                <h4 class="col-md-4">Agendamento de Aula</h4>
                <div class="col-md-8" style="padding-top:7px">
                    <button type="button" id="sem_matricula" class="btn btn-warning" onclick="returnMatriculaNova();" value="pre_matricula">Fazer Pré-Cadastro</button>
                    <button type="button" id="com_matricula" class="btn btn-success" onclick="returnMatriculado();" value="matriculado">Matriculado</button>
                </div>
            </div>
            <div class="clearfix"></div>
            <hr>
        </div>
        <form action="#" class="inline-form" method="post">
            <div id="returnMatricula">
                <div class="form-group col-md-3">
                    <label for="matricula_aluno">Matrícula: </label>
                    <!--Retornar com Ajax-->
                    <input type="text" name="matricula_aluno" onkeyup="returnNomeAluno();" id="matricula_aluno" required placeholder="Digite o número da matrícula" class="form-control">
                </div>
                <?php
                if (!isset($_GET['BtnClicado'])) {
                    ?>
                    <div class="form-group col-md-9">
                        <label for="nome_aluno">Nome do aluno:</label>
                        <div id="nome_aluno">
                            <input type="text" disabled name="nome_aluno" id="nome_aluno" class="form-control" placeholder="Digie a matrícula do aluno" >
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
            <div class="form-group col-md-6">
                <label for="materia">Matéria: </label>
                <select name ="materia" id="materia" class="form-control" onchange="returnProfessores();" required>
                    <option selected disabled>Escolha</option>
                    <?php
                    $conexao = mysql_connect("localhost", "root", "");
                    mysql_select_db("contemporaneo");

                    $QueryBuscarMaterias = "SELECT * FROM materias_disponiveis";
                    $ExeQrBuscarMaterias = mysql_query($QueryBuscarMaterias);

                    if (mysql_num_rows($ExeQrBuscarMaterias) > 0) {
                        while ($resMaterias = mysql_fetch_assoc($ExeQrBuscarMaterias)) {
                            ?>
                            <option value="<?php echo $resMaterias['materia'] ?>"><?php echo $resMaterias['materia'] ?></option>
                            <?php
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="professor">Professor:</label>
                <select name ="professor" id="professor" class="form-control">
                    <?php
                    $materiaInformada = "";
                    if (!isset($_GET['MateriaSelecionada'])) {
                        ?>
                        <option disabled selected>Selecione a matéria</option>
                        <?php
                    }
                    ?>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="data">Data:</label>
                <input type="date" name="data" id="data" onchange="returnSalas();" placeholder="Data" class="form-control">
            </div>
            <div class="form-group col-md-6">
                <label for="sala_de_aula">Sala:</label>
                <select name ="sala_de_aula" id="sala_de_aula" class="form-control" onchange="returnHorariosDisp();">
                    <?php
                    if (!isset($_GET['DataSelecionada'])) {
                        ?>
                        <option disabled selected>Informe a data Primeiro</option>
                        <?php
                    }
                    ?>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="horario_entrada">Horário de Entrada</label>
                <select name="horario_entrada" id="horario_entrada" class="form-control">
                    <?php
                    if (!isset($_GET['SalaSelecionada'])) {
                        ?>
                        <option disabled selected>Selecione a sala de aula</option>
                        <?php
                    }
                    ?>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="tempo_de_aula">Tempo de Aula:</label>
                <select name="tempo_de_aula" id="tempo_de_aula" class="form-control">
                    <option value="0.5">0:30</option>
                    <option value="1">1:00</option>
                    <option value="1.5">1:30</option>
                    <option value="2">2:00</option>
                    <option value="2.5">2:30</option>
                    <option value="3">3:00</option>
                </select>
            </div>
            <div class="form-group col-md-12">
                <label for="descricao_aula">Descrição da Aula:</label>
                <textarea name="descricao_aula" id="descricao_aula" class="form-control" placeholder="Digite uma breve descrição para a aula"></textarea>
            </div>
            <div class="form-group">
                <div class="col-md-12"><hr></div>
                <div class="col-md-4">
                    <label for="pagamento">Pagamento</label>
                    <select name="pagamento" id="pagamento" class="form-control">
                        <option value="nao">Não</option>
                        <option value="sim">Sim</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="compartilhar_aula">Compartilhada</label>
                    <select name="compartilhar_aula" id="compartilhar_aula" class="form-control">
                        <option value="0" selected>Não</option>
                        <option value="1">Sim</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="enviar" class="">&nbsp;</label>
                    <button type="submit" name="enviar" class="btn btn-success form-control">Agendar</button>
                </div>
            </div>
        </form>
    </div>
    <?php
}
?>