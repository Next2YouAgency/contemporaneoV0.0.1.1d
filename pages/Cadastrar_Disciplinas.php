<?php
if (isset($_POST['cadastrar_materia'])) {
    $CadastroDeDisciplina = $_POST['disciplina'];

    $QueryCadastrarDisciplina = "INSERT INTO materias_disponiveis(materia) VALUES('$CadastroDeDisciplina')";
    $ExeQRCadastrarDisciplina = mysql_query($QueryCadastrarDisciplina);
    if ($ExeQRCadastrarDisciplina) {
        ?>
        <!-- Modal Disciplinas-->
        <div class="modal fade in text-muted" id="ModalAlterarSenha" tabindex="1" role="dialog" aria-labelledby="myModalLabel" style="display: block;overflow-y: auto;">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <form action="?MudarSenha" method="post">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Alterar a senha</h4>
                        </div>
                        <div class="modal-body">
                            Disciplina Cadastrada: <?php echo $CadastroDeDisciplina; ?>
                        </div>
                        <div class="clearfix"></div>
                        <div class="modal-footer">
                            <a href="?acesso=Cadastrar_Materias" class="btn btn-default">Fechar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php
    } else {
        echo "Disciplina " . $CadastroDeDisciplina . " Não cadastrado: " . mysql_error();
    }
} else {
    ?>
    <div class="col-md-12">
        <section class="col-md-8 col-md-push-2" style="padding-top: 15px; padding-bottom: 15px;">
            <h3>Cadastro de Disciplinas</h3>
            <hr>
            <form action="?acesso=Cadastrar_Disciplinas" method="post">
                <div class="form-group col-md-6">
                    <label for="disciplina">Disciplina:</label>
                    <input type="text" name="disciplina" id="disciplina" class="form-control" placeholder="Nome da Disciplina">
                </div>
                <div class="col-md-6" style="padding-top: 25px">
                    <div class="col-md-6 text-cente">
                        <button type="submit" name="cadastrar_materia" class="btn btn-block btn-success">Cadastrar</button>
                    </div>
                    <div class="col-md-6 text-cente">
                        <a href="?acesso=Home" class="btn btn-block btn-danger">Cancelar</a>
                    </div>
                </div>
            </form>
        </section>
        <div class="clearfix"></div>
        <hr>
        <section class="col-md-8 col-md-push-2">
            <h4>Disciplinas Já cadastradas</h4>
            <?php
            $ExeQrBuscarMateriasCadastradas = mysql_query("SELECT * FROM materias_disponiveis");
            if ($ExeQrBuscarMateriasCadastradas) {
                echo "<ul>";
                while ($Disciplinas = mysql_fetch_assoc($ExeQrBuscarMateriasCadastradas)) {
                    echo "<li>" . $Disciplinas['materia'] . "</li>";
                }
                echo "</ul>";
            }
            ?>
        </section>
    </div>
    <?php
}