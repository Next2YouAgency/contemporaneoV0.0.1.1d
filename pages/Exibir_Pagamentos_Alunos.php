<?php
if (isset($_POST['SalvarPagamentos'])) {
    $matriculaPagamento[Matricula] = $_POST['NumeroMatricula'];
    $matriculaPagamento[NomeAluno] = $_POST['NomeAluno'];
    $matriculaPagamento[ValorPagamento] = $_POST['ValorPagamento'];
    $matriculaPagamento[FormaPagamento] = $_POST['FormaPagamento'];
    $matriculaPagamento[ComprovantePagamento] = $_POST['ComprovantePagamento'];
    $matriculaPagamento[DataConfirmacao] = date('d-m-Y');

    $QueryInsertPagamentos = "INSERT INTO pagamentos_efetuados(matricula,nome_aluno,valor_pagamento,forma_pagamento,comprovante_pagamento,data_confirmacao) VALUES ('$matriculaPagamento[Matricula]','$matriculaPagamento[NomeAluno]','$matriculaPagamento[ValorPagamento]','$matriculaPagamento[FormaPagamento]','$matriculaPagamento[ComprovantePagamento]','$matriculaPagamento[DataConfirmacao]')";
    $ExeQrInsertPagamentos = mysql_query($QueryInsertPagamentos);
    $QueryUpdateAgenda = "UPDATE agenda_aulas SET pagamento = 'sim' WHERE nome_aluno = '$matriculaPagamento[NomeAluno]'";
    $ExeQrUodateAgenda = mysql_query($QueryUpdateAgenda);
    if ($ExeQrInsertPagamentos && $ExeQrUodateAgenda) {
        include 'parts/extra/ModalAvisoPagamentoOK.php';
    } else {
        ?>
        <script> alert("Pagamento Com Erro: "<?php mysql_error() ?>);</script>
        <?php
    }
}
?>
<section class="col-md-12">
    <h3>Pagamentos dos Alunos</h3>
    <form action="?acesso=Exibir_Pagamentos_Alunos" method="post">
        <div class="form-group col-md-3">
            <input type="number" name="matricula_aluno" placeholder="Matrícula Aluno" class="form-control" value="<?php
            if (isset($_POST['matricula_aluno'])):echo $_POST['matricula_aluno'];
            endif;
            ?>">
        </div>
        <div class="form-group col-md-6">
            <input type="text" name="nome_responsavel_pagamento" placeholder="Nome do Responsável pelo pagamento" class="form-control" value="<?php
            if (isset($_POST['nome_responsavel_pagamento'])):echo $_POST['nome_responsavel_pagamento'];
            endif;
            ?>">
        </div>
        <div class="form-group col-md-3">
            <button type="submit" name="buscar" class="btn btn-default">
                <span class="glyphicon glyphicon-search"></span>
            </button>
        </div>
    </form>
</section>
<section class="col-md-12" style="padding-left: 0;padding-right: 0;margin-left: 0;margin-right: 0;">
    <table class="table table-bordered table-responsive table-striped text-center">
        <form action="?acesso=Exibir_Pagamentos_Alunos" method="post">
            <tr>
                <td>Matrícula</td>
                <td>Resp Pagamento</td>
                <td>Aluno</td>
                <td>Data/Aula</td>
                <td>Prof</td>
                <td>Inicio</td>
                <td>Tempo</td>
                <td>Valor</td>
                <td>Pagamento</td>
                <td>Desconto</td>
            </tr>
            <?php
            if (isset($_POST['buscar'])) {
                if (isset($_POST['matricula_aluno'])) {
                    $BuscarPagamentos = $_POST['matricula_aluno'];
                    $ExeQrBuscarPagamentos = mysql_query("SELECT * FROM agenda_aulas WHERE matricula_aluno = $BuscarPagamentos");
                    if (mysql_num_rows($ExeQrBuscarPagamentos) > 0) {
                        while ($ResBuscarPagamentos = mysql_fetch_assoc($ExeQrBuscarPagamentos)) {
                            $ReturnPagamentos[matricula] = $ResBuscarPagamentos['matricula_aluno'];
                            $ReturnPagamentos[responsavel_pagamento] = $ResBuscarPagamentos['responsavel_pagamento'];
                            $ReturnPagamentos[nome_aluno] = $ResBuscarPagamentos['nome_aluno'];
                            $ReturnPagamentos[data] = $ResBuscarPagamentos['data'];
                            $ReturnPagamentos[prof] = $ResBuscarPagamentos['prof'];
                            $ReturnPagamentos[entrada] = $ResBuscarPagamentos['entrada'];
                            $ReturnPagamentos[qtd_hora] = $ResBuscarPagamentos['qtd_hora'];
                            $ReturnPagamentos[valor] = $ResBuscarPagamentos['valor'];
                            $ReturnPagamentos[pagamento] = $ResBuscarPagamentos['pagamento'];
                            $ReturnPagamentos[desconto] = $ResBuscarPagamentos['desconto'];
                            ?>
                            <tr>
                                <td><?php echo $ReturnPagamentos[matricula] ?></td>
                                <td><?php echo $ReturnPagamentos[responsavel_pagamento] ?></td>
                                <td><?php echo $ReturnPagamentos[nome_aluno] ?></td>
                                <td><?php echo $ReturnPagamentos[data] ?></td>
                                <td><?php echo $ReturnPagamentos[prof] ?></td>
                                <td><?php echo $ReturnPagamentos[entrada] ?></td>
                                <td><?php echo $ReturnPagamentos[qtd_hora] ?></td>
                                <td><?php echo $ReturnPagamentos[valor] ?></td>
                                <td><?php echo $ReturnPagamentos[pagamento] ?></td>
                                <td><?php echo $ReturnPagamentos[desconto] ?></td>
                            </tr>
                            <?php
                        }
                    } else {
                        ?>
                        <script language="javascript">
                            alert("Número de matrícula inválido")
                            location.href = "?acesso=Exibir_Pagamentos_Alunos";
                        </script>
                        <?php
                    }
                } else if (isset($_POST['nome_responsavel_pagamento'])) {
                    $BuscarPagamentos = $_POST['nome_responsavel_pagamento'];
                    $ExeQrBuscarPagamentos = mysql_query("SELECT * FROM agenda_aulas WHERE matricula_aluno = $BuscarPagamentos");
                    if (mysql_num_rows($ExeQrBuscarPagamentos) > 0) {
                        while ($ResBuscarPagamentos = mysql_fetch_assoc($ExeQrBuscarPagamentos)) {
                            $ReturnPagamentos[matricula] = $ResBuscarPagamentos['matricula_aluno'];
                            $ReturnPagamentos[responsavel_pagamento] = $ResBuscarPagamentos['responsavel_pagamento'];
                            $ReturnPagamentos[nome_aluno] = $ResBuscarPagamentos['nome_aluno'];
                            $ReturnPagamentos[data] = $ResBuscarPagamentos['data'];
                            $ReturnPagamentos[prof] = $ResBuscarPagamentos['prof'];
                            $ReturnPagamentos[entrada] = $ResBuscarPagamentos['entrada'];
                            $ReturnPagamentos[qtd_hora] = $ResBuscarPagamentos['qtd_hora'];
                            $ReturnPagamentos[valor] = $ResBuscarPagamentos['valor'];
                            $ReturnPagamentos[pagamento] = $ResBuscarPagamentos['pagamento'];
                            $ReturnPagamentos[desconto] = $ResBuscarPagamentos['desconto'];
                            ?>
                            <tr>
                                <td><?php echo $ReturnPagamentos[matricula] ?></td>
                                <td><?php echo $ReturnPagamentos[responsavel_pagamento] ?></td>
                                <td><?php echo $ReturnPagamentos[nome_aluno] ?></td>
                                <td><?php echo $ReturnPagamentos[data] ?></td>
                                <td><?php echo $ReturnPagamentos[prof] ?></td>
                                <td><?php echo $ReturnPagamentos[entrada] ?></td>
                                <td><?php echo $ReturnPagamentos[qtd_hora] ?></td>
                                <td><?php echo $ReturnPagamentos[valor] ?></td>
                                <td><?php echo $ReturnPagamentos[pagamento] ?></td>
                                <td><?php echo $ReturnPagamentos[desconto] ?></td>
                            </tr>
                            <?php
                        }
                    } else {
                        echo '<script>alert("Nome do Responsável pelo pagamento não encontrado!")</script>';
                    }
                }
            } else {
                $ExeQrBuscarPagamentos = mysql_query("SELECT * FROM agenda_aulas");
                while ($ResBuscarPagamentos = mysql_fetch_assoc($ExeQrBuscarPagamentos)) {
                    $ReturnPagamentos[id] = $ResBuscarPagamentos['id'];
                    $ReturnPagamentos[matricula] = $ResBuscarPagamentos['matricula_aluno'];
                    $ReturnPagamentos[responsavel_pagamento] = $ResBuscarPagamentos['responsavel_pagamento'];
                    $ReturnPagamentos[nome_aluno] = $ResBuscarPagamentos['nome_aluno'];
                    $ReturnPagamentos[data] = $ResBuscarPagamentos['data'];
                    $ReturnPagamentos[prof] = $ResBuscarPagamentos['prof'];
                    $ReturnPagamentos[entrada] = $ResBuscarPagamentos['entrada'];
                    $ReturnPagamentos[qtd_hora] = $ResBuscarPagamentos['qtd_hora'];
                    $ReturnPagamentos[valor] = $ResBuscarPagamentos['valor'];
                    $ReturnPagamentos[pagamento] = $ResBuscarPagamentos['pagamento'];
                    $ReturnPagamentos[desconto] = $ResBuscarPagamentos['desconto'];
                    ?>
                    <tr>
                        <td><?php echo $ReturnPagamentos[matricula] ?></td>
                        <td><?php echo $ReturnPagamentos[responsavel_pagamento] ?></td>
                        <td><?php echo $ReturnPagamentos[nome_aluno] ?></td>
                        <td><?php echo $ReturnPagamentos[data] ?></td>
                        <td><?php echo $ReturnPagamentos[prof] ?></td>
                        <td><?php echo $ReturnPagamentos[entrada] ?></td>
                        <td><?php echo $ReturnPagamentos[qtd_hora] ?></td>
                        <td><?php echo $ReturnPagamentos[valor] ?></td>
                        <td>
                            <?php
                            if ($ReturnPagamentos[pagamento] == "nao") {
                                ?>
                                <button type="button" name="alterar_pagamento" id="alterar_pagamento" data-toggle="modal" data-target="#AlterarPagamento<?php echo $ReturnPagamentos[matricula] ?>" class="btn-adn" title="Alterar">
                                    <span class="glyphicon glyphicon-transfer"></span>
                                </button>
                                <button type="button" id="alterar_pagamento" data-toggle="modal" data-target="#GerarCobranca<?php echo $ReturnPagamentos[matricula] ?>" class="btn-adn" title="Gerar Cobrança">
                                    <span class="glyphicon glyphicon-envelope"></span>
                                </button>
                                <?php
                            } else {
                                ?>
                                <button type = "button" name = "alterar_pagamento" id = "alterar_pagamento" data-toggle = "modal" data-target = "#EnviarComprovante<?php echo $ReturnPagamentos[matricula] ?>" class = "btn-adn" title = "Enviar Comprovante">
                                    <span class = "glyphicon glyphicon-envelope"></span>
                                </button>
                                <button type = "button" name = "alterar_pagamento" id = "alterar_pagamento" data-toggle = "modal" data-target = "#VisualizarStatus<?php echo $ReturnPagamentos[matricula] ?>" class = "btn-adn" title = "Ver Detalhes">
                                    <span class = "glyphicon glyphicon-eye-open"></span>
                                </button>
                                <?php
                            }
                            ?>

                        </td>
                        <td>
                            <?php
                            if ($ReturnPagamentos[desconto]) {
                                echo $ReturnPagamentos[desconto];
                            } else {
                                echo "0";
                            }
                            ?> %
                        </td>
                    </tr>
                    <?php
                    include 'parts/extra/ModalAlterarPagamento.php';
                    include 'parts/extra/ModalGerarCobranca.php';
                    include 'parts/extra/ModalEnviarComprovante.php';
                    include 'parts/extra/ModalVisualizarStatus.php';
                }
            }
            ?>
        </form>
    </table>
</section>
<div id="modal_alterar_pagamento"></div>
<?php
