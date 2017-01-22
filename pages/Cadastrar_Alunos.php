<?php
if (isset($_POST['cadastrar_aluno'])) {
    
    $CadastroAlunoCompleto[nome_aluno] = $_POST['nome_aluno'];
    $CadastroAlunoCompleto[escolaridade_aluno] = $_POST['escolaridade_aluno'];
    $CadastroAlunoCompleto[telefone_aluno] = $_POST['telefone_aluno'];
    $CadastroAlunoCompleto[nome_mae] = $_POST['nome_mae'];
    $CadastroAlunoCompleto[telefone_mae] = $_POST['telefone_mae'];
    $CadastroAlunoCompleto[nome_pai] = $_POST['nome_pai'];
    $CadastroAlunoCompleto[telefone_pai] = $_POST['telefone_pai'];
    if($_POST['responsavel_pagamento'] == "mae"){
        $CadastroAlunoCompleto[responsavel_pagamento] = $_POST['nome_mae'];
    }else if($_POST['responsavel_pagamento'] == "pai"){
        $CadastroAlunoCompleto[responsavel_pagamento] = $_POST['nome_pai'];
    }else{
        $CadastroAlunoCompleto[responsavel_pagamento] = $_POST['nome_aluno'];
    }
    $CadastroAlunoCompleto[desconto] = $_POST['desconto'];
    $CadastroAlunoCompleto[cep] = $_POST['cep_endereco'];
    $CadastroAlunoCompleto[endereco_completo] = $_POST['endereco_completo'];
    $CadastroAlunoCompleto[numero_endereco] = $_POST['numero_endereco'];
    $CadastroAlunoCompleto[bairro_endereco] = $_POST['bairro_endereco'];
    $CadastroAlunoCompleto[cidade_endereco] = $_POST['cidade_endereco'];
    $CadastroAlunoCompleto[estado_endereco] = $_POST['estado_endereco'];
    $CadastroAlunoCompleto[complemento_endereco] = $_POST['complemento_endereco'];
    $CadastroAlunoCompleto[complemento_endereco] = $_POST['complemento_endereco'];

    $QueryCadastrarAlunoCompleto = mysql_query("INSERT INTO alunos (nome_aluno, escolaridade_aluno, telefone_aluno, nome_mae, telefone_mae, nome_pai, telefone_pai, responsavel_pagamento, desconto, cep_endereco, endereco_completo, numero_endereco, bairro_endereco, cidade_endereco, estado_endereco, complemento_endereco) VALUES ('$CadastroAlunoCompleto[nome_aluno]', '$CadastroAlunoCompleto[escolaridade_aluno]','$CadastroAlunoCompleto[telefone_aluno]', '$CadastroAlunoCompleto[nome_mae]', '$CadastroAlunoCompleto[telefone_mae]','$CadastroAlunoCompleto[nome_pai]', '$CadastroAlunoCompleto[telefone_pai]', '$CadastroAlunoCompleto[responsavel_pagamento]','$CadastroAlunoCompleto[desconto]', '$CadastroAlunoCompleto[cep]', '$CadastroAlunoCompleto[endereco_completo]', '$CadastroAlunoCompleto[numero_endereco]', '$CadastroAlunoCompleto[bairro_endereco]','$CadastroAlunoCompleto[cidade_endereco]', '$CadastroAlunoCompleto[estado_endereco]','$CadastroAlunoCompleto[complemento_endereco]')");
    if($QueryCadastrarAlunoCompleto){
        echo "Cadastrado";
    }else{
        echo "Deu Ruim!".mysql_error();
    }
}
?>
<script src="js/buscarCEP.js"></script>
<form class="inline-form col-md-10 col-md-push-1" action="" method="post" enctype="multipart/form-data">
    <div class="col-md-12 form-group">
        <h3>Cadastro de Alunos</h3>
    </div>
    <div class="form-group col-md-5">
        <label for="nome_aluno">Nome:</label>
        <input type="text" name="nome_aluno" id="nome_aluno" class="form-control">
    </div>
    <div class="form-group col-md-4">
        <label for="telefone_aluno">Telefone do aluno</label>
        <input type="text" name="telefone_aluno" id="telefone_aluno" class="form-control">
    </div>
    <div class="form-group col-md-3">
        <label for="escolaridade_aluno">Escolaridade</label>
        <select name="escolaridade_aluno" id="escolaridade_aluno" class="form-control">
            <option selected disabled>Escolha:</option>
            <?php
            $ExeQrEscolaridades = mysql_query("SELECT * FROM escolaridade_aluno");
            if (mysql_num_rows($ExeQrEscolaridades)) {
                while ($ReturnEscolaridades = mysql_fetch_array($ExeQrEscolaridades)) {
                    ?>
                    <option value="<?php echo $ReturnEscolaridades['nivel'] ?>">
                        <?php echo $ReturnEscolaridades['nivel'] ?>
                    </option>
                    <?php
                }
            }
            ?>
        </select>
    </div>
    <div class="form-group col-md-6">
        <label form="nome_mae">Nome da Mãe</label>
        <input type="text" name="nome_mae" id="nome_mae" class="form-control">
    </div>
    <div class="form-group col-md-5">
        <label for="telefone_mae">Telefone da mãe</label>
        <input type="text" name="telefone_mae" id="telefone_mae" class="form-control">
    </div>
    <div class="form-group col-md-1">
        <label for="responsavel_pagamento_mae">Resp Pagamento</label>
        <input type="radio" name="responsavel_pagamento" id="responsavel_pagamento_mae" value="mae">
    </div>
    <div class="form-group col-md-6">
        <label form="nome_pai">Nome do Pai</label>
        <input type="text" name="nome_pai" id="nome_pai" class="form-control">
    </div>
    <div class="form-group col-md-5">
        <label for="telefone_pai">Telefone do Pai</label>
        <input type="text" name="telefone_pai" id="telefone_pai" class="form-control">
    </div>
    <div class="form-group col-md-1">
        <label for="responsavel_pagamento_pai">Resp Pagamento</label>
        <input type="radio" name="responsavel_pagamento" id="responsavel_pagamento_pai" value="pai">
    </div>
    <div id="retorno-cep">
        <div class="form-group col-md-2">
            <label for="cep_endereco">CEP</label>
            <input type="text" name="cep_endereco" onblur="" id="cep_endereco" class="form-control">
        </div>
        <div class="form-group col-md-5">
            <label for="endereco_completo">Endereço</label>
            <input type="text" name="endereco_completo" id="endereco_completo" class="form-control">
        </div>
        <div class="form-group col-md-2">
            <label for="numero_endereco">Nº</label>
            <input type="number" name="numero_endereco" id="numero_endereco" class="form-control">
        </div>
        <div class="form-group col-md-3">
            <label for="bairro_endereco">Bairro</label>
            <input type="text" name="bairro_endereco" id="bairro_endereco" class="form-control">
        </div>
        <div class="form-group col-md-3">
            <label for="cidade_endereco">Cidade</label>
            <input type="text" name="cidade_endereco" id="cidade_endereco" class="form-control">
        </div>
        <div class="form-group col-md-3">
            <label for="estado">Estado</label>
            <input type="text" name="estado_endereco" id="estado_endereco" class="form-control">
        </div>
        <div class="form-group col-md-6">
            <label for="complemento_endereco">Complemento</label>
            <input type="text" name="complemento_endereco" id="complemento_endereco" class="form-control">
        </div>
    </div>
    <div class="col-md-12" style="padding-top: 20px"></div>
    <div class="form-group col-md-12">
        <input type="submit" name="cadastrar_aluno" value="Cadastrar Aluno" class="btn btn-success">
        <button type="button" data-toggle="modal" data-target="#modalAdicionarCredito" class="btn btn-info">Adicionar Crédito de Estudo</button>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalAdicionarCredito" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Adicionar Desconto Efetivo</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="desconto">Desconto</label>
                        <input type="number" name="desconto" id="desconto" class="form-control" placeholder="Digite a quantidade de desconto">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</form>