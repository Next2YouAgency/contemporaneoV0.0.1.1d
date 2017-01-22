<section class="col-md-11 col-md-push-1" style="margin-top: -55px;">
    <form class="col-md-8" method="post" action="?acesso=ConsultarAlunos">
        <div class="form-group col-md-3">
            <input type="number" value="<?php
            if (isset($_POST['numero_matricula'])):echo $_POST['numero_matricula'];
            endif;
            ?>" name="numero_matricula" id="numero_matricula" class="form-control" placeholder="Matrícula">
        </div>
        <div class="form-group col-md-8">
            <input type="text" value="<?php
            if (isset($_POST['nome_do_aluno'])):echo $_POST['nome_do_aluno'];
            endif;
            ?>" name="nome_do_aluno" id="nome_do_aluno" class="form-control" placeholder="Nome do Aluno">
        </div>
        <div class="col-md-1">
            <button type="submit" name="buscarAluno" class="btn btn-default">
                <span class="glyphicon glyphicon-search" style="color:#eee;font-size: 17px"></span>
            </button>
        </div>
    </form>
</section>
<section id="returnPesquisaAluno" class="col-md-12" style="margin-top: 10px">
    <?php
    if (isset($_POST['buscarAluno'])) {
        if ($_POST['numero_matricula']) {
            $buscarAluno = $_POST['numero_matricula'];
            $QueryBuscarAluno = "SELECT * FROM alunos WHERE matricula_aluno = '$buscarAluno'";
            $ExeQrBuscarAluno = mysql_query($QueryBuscarAluno);
            if (mysql_num_rows($ExeQrBuscarAluno) > 0) {
                ?>
                <table class="table table-striped table-responsive">
                    <tr>
                        <td>Matrícula</td>
                        <td>Nome</td>
                        <td>Telefone</td>
                        <td>Editar/Visualizar</td>
                    </tr>
                    <?php
                    while ($resBuscarAluno = mysql_fetch_assoc($ExeQrBuscarAluno)) {
                        ?>
                        <tr>
                            <td><?php echo $resBuscarAluno['matricula_aluno'] ?></td>
                            <td><?php echo $resBuscarAluno['nome_aluno'] ?></td>
                            <td><?php echo $resBuscarAluno['telefone_aluno'] ?></td>
                            <td><span class="glyphicon glyphicon-search btn" data-toggle="modal" data-target="#ModalDetalhesAluno"></span></td>
                        </tr>
                        <!--Modal para consultar os dados do aluno -->
                        <?php
                        include 'parts/extra/ModalDetalhesAluno.php';
                    }
                    ?>
                </table>
                <?php
            }
        } else if ($_POST['nome_do_aluno']) {
            $buscarAluno = $_POST['nome_do_aluno'];
            $QueryBuscarAluno = "SELECT * FROM alunos WHERE nome_aluno LIKE '%" . $buscarAluno . "%'";
            $ExeQrBuscarAluno = mysql_query($QueryBuscarAluno);
            if (mysql_num_rows($ExeQrBuscarAluno) > 0) {
                ?>
                <table class="table table-striped table-responsive">
                    <tr>
                        <td>Matrícula</td>
                        <td>Nome</td>
                        <td>Telefone</td>
                        <td>Editar/Visualizar</td>
                    </tr>
                    <?php
                    while ($resBuscarAluno = mysql_fetch_assoc($ExeQrBuscarAluno)) {
                        ?>
                        <tr>
                            <td><?php echo $resBuscarAluno['matricula_aluno'] ?></td>
                            <td><?php echo $resBuscarAluno['nome_aluno'] ?></td>
                            <td><?php echo $resBuscarAluno['telefone_aluno'] ?></td>
                            <td><span class="glyphicon glyphicon-search btn" data-toggle="modal" data-target="#ModalDetalhesAluno"></span></td>
                        </tr>
                        <!--Modal para consultar os dados do aluno -->
                        <div class="modal fade" id="ModalDetalhesAluno" tabindex="-1" role="dialog" aria-labelledby="ModalDetalhesAluno">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Aluno <?php echo $resBuscarAluno['nome_aluno'] ?></h4>
                                    </div>
                                    <div class="modal-body">

                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                                        <button type="button" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Salvar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </table>
                <?php
            }
        } else {
            echo'Não informado';
        }
    } else {
        $QueryBuscarAluno = "SELECT * FROM alunos WHERE matricula_aluno != 0";
        $ExeQrBuscarAluno = mysql_query($QueryBuscarAluno);
        if (mysql_num_rows($ExeQrBuscarAluno) > 0) {
            ?>
            <table class="table table-striped table-responsive">
                <tr>
                    <td>Matrícula</td>
                    <td>Nome</td>
                    <td>Telefone</td>
                    <td>Editar/Visualizar</td>
                </tr>
                <?php
                while ($resBuscarAluno = mysql_fetch_assoc($ExeQrBuscarAluno)) {
                    ?>
                    <tr>
                        <td><?php echo $resBuscarAluno['matricula_aluno'] ?></td>
                        <td><?php echo $resBuscarAluno['nome_aluno'] ?></td>
                        <td><?php echo $resBuscarAluno['telefone_aluno'] ?></td>
                        <td>
                            <span class="glyphicon glyphicon-search btn" data-toggle="modal" data-target="#ModalDetalhesAluno"></span>
                        </td>
                    </tr>
                    <!--Modal para consultar os dados do aluno -->
                    <div class="modal fade" id="ModalDetalhesAluno" tabindex="-1" role="dialog" aria-labelledby="ModalDetalhesAluno">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel">Aluno <?php echo $resBuscarAluno['nome_aluno'] ?></h4>
                                </div>
                                <div class="modal-body">

                                </div>
                                <div class="clearfix"></div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                                    <button type="button" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Salvar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </table>
            <?php
        }
    }
    ?>
</section>