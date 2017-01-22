<!-- Modal Alterar Pagamento-->
<div class="modal fade" id="EnviarComprovante<?php echo $ReturnPagamentos[matricula] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Enviar Comprovantes</h4>
            </div>
            <div class="modal-body">
                Envar comprovante: <?php echo $ReturnPagamentos[matricula];?>
            </div>
            <div class="clearfix"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="SalvarPagamentos">Salvar Alterações</button>
            </div>
        </div>
    </div>
</div>
</div>