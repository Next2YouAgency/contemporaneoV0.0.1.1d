<?php
if (isset($_POST['alterar'])) {
    if (isset($_POST['escolaridadeNova'])) {
        $EscolaridadeUpdate = $_POST['escolaridade'];
        $EscolaridadeAntiga = $_POST['escolaridadeAntiga'];
        $EscolaridadeNova = $_POST['escolaridadeNova'];
        $EscolaridadeId = $_POST['escolaridadeID'];

        $ExeQrUpdateValorEscolaridade = mysql_query("UPDATE escolaridade_aluno SET valor = $EscolaridadeNova WHERE id = $EscolaridadeId");
        if ($ExeQrUpdateValorEscolaridade) {
            ?>
            <!-- Modal Alterar Valores de pagamento-->
            <div class="modal fade in text-muted" id="ModalAlterarSenha" tabindex="1" role="dialog" aria-labelledby="myModalLabel" style="display: block;overflow-y: auto;">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <form action="?MudarSenha" method="post">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Alterar a senha</h4>
                            </div>
                            <div class="modal-body">
                                A Escolaridade <b><?php echo $EscolaridadeUpdate ?></b>, foi atualizada.<br>
                                Valor anterior: R$ <?php echo $EscolaridadeAntiga ?>, novo valor: R$ <?php echo $EscolaridadeNova; ?>
                            </div>
                            <div class="clearfix"></div>
                            <div class="modal-footer">
                                <a href="?acesso=Configuracoes_Precos" class="btn btn-default">Fechar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php
        }
    }
}
?>
<section class="col-md-10 col-md-push-1" style="padding-top: 10px">
    <div class="col-md-8 col-md-push-2">
        <h3>Ajuste de cobrança das aulas</h3>
    </div>
    <div class="clearfix"></div>
    <hr>
    <?php
    $ExeQrBuscarTabelaPrecoAlunos = mysql_query("SELECT * FROM escolaridade_aluno");
    while ($ResBuscarEscolaridadeAlunos = mysql_fetch_assoc($ExeQrBuscarTabelaPrecoAlunos)) {
        $IDEscolaridade = $ResBuscarEscolaridadeAlunos['id'];
        $NivelEscolaridade = $ResBuscarEscolaridadeAlunos['nivel'];
        $ValorEscolaridade = $ResBuscarEscolaridadeAlunos['valor'];
        ?>
        <form class="form-inline" method="post">
            <div class="form-group col-md-8 col-md-push-2">
                <label for="escolaridade" class="col-md-4 sr-only-focusable text-right" style="padding-top: 7px">Escolaridade <?php echo $NivelEscolaridade ?></label>
                <div class="col-md-4 text-center">
                    <input type="text" name="escolaridadeNova" id="escolaridade" class="form-control" value="<?php echo $ValorEscolaridade ?>">
                    <input type="hidden" name="escolaridadeID" value="<?php echo $IDEscolaridade ?>">
                    <input type="hidden" name="escolaridadeAntiga" value="<?php echo $ValorEscolaridade ?>">
                    <input type="hidden" name="escolaridade" value="<?php echo $NivelEscolaridade ?>">
                </div>
                <div class="col-md-4">
                    <button type="submit" name="alterar" class="btn btn-success"><span class="glyphicon glyphicon-check"></span></button>
                </div>
            </div>
            <div class="clearfix"></div>
            <hr>
        </form>
        <?php
    }
    ?>
</section>