<section class="col-md-12">
    <h2>Consultar Professores</h2>
    <form class="col-md-8" method="post" action="?acesso=Consultar_Professores">
        <div class="form-group col-md-3">
            <input type="number" value="<?php
            if (isset($_POST['cadastro_professor'])):echo $_POST['cadastro_professor'];
            endif;
            ?>" name="cadastro_professor" id="cadastro_professor" class="form-control" placeholder="Codigo Professor">
        </div>
        <div class="form-group col-md-8">
            <input type="text" value="<?php
            if (isset($_POST['nome_do_professor'])):echo $_POST['nome_do_professor'];
            endif;
            ?>" name="nome_do_professor" id="nome_do_professor" class="form-control" placeholder="Nome do Professor">
        </div>
        <div class="col-md-1">
            <button type="submit" name="buscarProfessor" class="btn btn-default">
                <span class="glyphicon glyphicon-search" style="color:#000;font-size: 17px"></span>
            </button>
        </div>
    </form>
</section>
<section id="returnPesquisaAluno" class="col-md-12" style="margin-top: 10px">
    <?php
    if (isset($_POST['buscarProfessor'])) {
        if ($_POST['cadastro_professor']) {
            $buscarProfessor = $_POST['cadastro_professor'];
            $ExeQrBuscarProfessor = mysql_query("SELECT * FROM professores WHERE id = $buscarProfessor");
            ?>
            <table class="table table-striped table-responsive">
                <tr>
                    <td>Código</td>
                    <td>Nome</td>
                    <td>Disciplina</td>
                    <td>Editar/Visualizar</td>
                </tr>
                <?php
                while ($resBuscarProfessor = mysql_fetch_assoc($ExeQrBuscarProfessor)) {
                    ?>
                    <tr>
                        <td><?php echo $resBuscarProfessor['id'] ?></td>
                        <td><?php echo $resBuscarProfessor['nome'] ?></td>
                        <td><?php echo $resBuscarProfessor['materia'] ?></td>
                        <td><span class="glyphicon glyphicon-search btn" data-toggle="modal" data-target="#ModalDetalhesProfessor"></span></td>
                    </tr>
                    <!--Modal para consultar os dados do aluno -->
                    <?php
                    include 'parts/extra/ModalDetalhesProfessor.php';
                }
                ?>
            </table>
            <?php
        } else if ($_POST['nome_do_professor']) {
            $buscarProfessor = $_POST['nome_do_professor'];
            $ExeQrBuscarProfessor = mysql_query("SELECT * FROM professores WHERE nome LIKE '%" . $buscarProfessor . "%'");
            if (mysql_num_rows($ExeQrBuscarProfessor) > 0) {
                ?>
                <table class="table table-striped table-responsive">
                    <tr>
                        <td>Código</td>
                        <td>Nome</td>
                        <td>Disciplina</td>
                        <td>Editar/Visualizar</td>
                    </tr>
                    <?php
                    while ($resBuscarProfessor = mysql_fetch_assoc($ExeQrBuscarProfessor)) {
                        ?>
                        <tr>
                            <td><?php echo $resBuscarProfessor['id'] ?></td>
                            <td><?php echo $resBuscarProfessor['nome'] ?></td>
                            <td><?php echo $resBuscarProfessor['materia'] ?></td>
                            <td><span class="glyphicon glyphicon-search btn" data-toggle="modal" data-target="#ModalDetalhesProfessor"></span></td>
                        </tr>
                        <!--Modal para consultar os dados do aluno -->
                        <?php
                        include 'parts/extra/ModalDetalhesProfessor.php';
                    }
                    ?>
                </table>
                <?php
            }
        } else {
            $ExeQrBuscarProfessor = mysql_query("SELECT * FROM professores");
            if (mysql_num_rows($ExeQrBuscarProfessor) > 0) {
                ?>
                <table class="table table-striped table-responsive">
                    <tr>
                        <td>Código</td>
                        <td>Nome</td>
                        <td>Disciplina</td>
                        <td>Editar/Visualizar</td>
                    </tr>
                    <?php
                    while ($resBuscarProfessor = mysql_fetch_assoc($ExeQrBuscarProfessor)) {
                        ?>
                        <tr>
                            <td><?php echo $resBuscarProfessor['id'] ?></td>
                            <td><?php echo $resBuscarProfessor['nome'] ?></td>
                            <td><?php echo $resBuscarProfessor['materia'] ?></td>
                            <td>
                                <span class="glyphicon glyphicon-search btn" data-toggle="modal" data-target="#ModalDetalhesProfessor"></span>
                            </td>
                        </tr>
                        <!--Modal para consultar os dados do aluno -->
                        <?php
                        include 'parts/extra/ModalDetalhesProfessor.php';
                    }
                    ?>
                </table>
                <?php
            }
        }
    } else {
        $ExeQrBuscarProfessor = mysql_query("SELECT * FROM professores");
        if (mysql_num_rows($ExeQrBuscarProfessor) > 0) {
            ?>
            <table class="table table-striped table-responsive">
                <tr>
                    <td>Código</td>
                    <td>Nome</td>
                    <td>Disciplina</td>
                    <td>Editar/Visualizar</td>
                </tr>
                <?php
                while ($resBuscarProfessor = mysql_fetch_assoc($ExeQrBuscarProfessor)) {
                    ?>
                    <tr>
                        <td><?php echo $resBuscarProfessor['id'] ?></td>
                        <td><?php echo $resBuscarProfessor['nome'] ?></td>
                        <td><?php echo $resBuscarProfessor['materia'] ?></td>
                        <td>
                            <span class="glyphicon glyphicon-search btn" data-toggle="modal" data-target="#ModalDetalhesProfessor"></span>
                        </td>
                    </tr>
                    <!--Modal para consultar os dados do aluno -->
                    <div class="modal fade" id="ModalDetalhesProfessor" tabindex="-1" role="dialog" aria-labelledby="ModalDetalhesAluno">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel">Aluno <?php echo $resBuscarProfessor['nome'] ?></h4>
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