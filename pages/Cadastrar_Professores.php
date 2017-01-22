<?php
if (isset($_POST['cadastrar_professor'])) {
    $CadastroProfessor['nome'] = $_POST['nome_professor'];
    $CadastroProfessor['materia_principal'] = $_POST['materia_principal'];
    $CadastroProfessor['telefone_principal'] = $_POST['telefone_principal'];
    $CadastroProfessor['telefone_contato'] = $_POST['telefone_contato'];
    $CadastroProfessor['cep_endereco'] = $_POST['cep_endereco'];
    $CadastroProfessor['endereco_completo'] = $_POST['endereco_completo'];
    $CadastroProfessor['numero_endereco'] = $_POST['numero_endereco'];
    $CadastroProfessor['bairro_endereco'] = $_POST['bairro_endereco'];
    $CadastroProfessor['cidade_endereco'] = $_POST['bairro_endereco'];
    $CadastroProfessor['estado_endereco'] = $_POST['estado_endereco'];
    $CadastroProfessor['complemento_endereco'] = $_POST['complemento_endereco'];
    $CadastroProfessor['banco_professor'] = $_POST['banco_professor'];
    $CadastroProfessor['agencia_banco_professor'] = $_POST['agencia_banco_professor'];
    $CadastroProfessor['dig_agencia_banco_professor'] = $_POST['dig_agencia_banco_professor'];
    $CadastroProfessor['conta_banco_professor'] = $_POST['conta_banco_professor'];
    $CadastroProfessor['valor_hora'] = preg_replace("/[^-0-9\.]/", ".", $_POST['valor_hora']);
    $CadastroProfessor['valor_hora_res'] = preg_replace("/[^-0-9\.]/", ".", $_POST['valor_hora_res']);
    $CadastroProfessor['dia_pagamento'] = $_POST['dia_pagamento'];
    
    $QueryCadastrarProfessor = "INSERT INTO professores (nome,materia,telefone_principal,telefone_contato,cep_endereco,endereco_completo,numero_endereco,bairro_endereco,cidade_endereco,estado_endereco,complemento_endereco,banco_professor,agencia_banco_professor,dig_agencia_banco_professor,conta_banco_professor,valor_hora,valor_hora_res,dia_pagamento)VALUES ('$CadastroProfessor[nome]','$CadastroProfessor[materia_principal]','$CadastroProfessor[telefone_principal]','$CadastroProfessor[telefone_contato]','$CadastroProfessor[cep_endereco]','$CadastroProfessor[endereco_completo]','$CadastroProfessor[numero_endereco]','$CadastroProfessor[bairro_endereco]','$CadastroProfessor[cidade_endereco]','$CadastroProfessor[estado_endereco]','$CadastroProfessor[complemento_endereco]','$CadastroProfessor[banco_prfessor]','$CadastroProfessor[agencia_banco_professor]','$CadastroProfessor[dig_agencia_banco_professor]','$CadastroProfessor[conta_banco_professor]','$CadastroProfessor[valor_hora]','$CadastroProfessor[valor_hora_res]','$CadastroProfessor[dia_pagamento]')";
    $ExeQRCadastrarProfessor = mysql_query($QueryCadastrarProfessor);
    if($ExeQRCadastrarProfessor){
        echo "Cadastrado";
    }else{
        echo "Não cadastrado: ".mysql_error();
    }
    
} else {
    ?>
    <script src="js/buscarCEP.js"></script>
    <section class="col-md-12" style="padding-top: 0; padding-bottom: 15px;">
        <h2>Cadastro de professores</h2>
        <hr>
        <form action="?acesso=CadastrarProfessores" method="post">
            <h4>Dados Pessoais</h4>
            <div class="form-group col-md-6">
                <label for="nome_professor">Nome do Professor:</label>
                <input type="text" name="nome_professor" id="nome_professor" class="form-control" placeholder="Nome do Professor">
            </div>
            <div class="form-group col-md-6">
                <label for="materia_principal">Matéria Principal</label>
                <select name="materia_principal" id="materia_principal" class="form-control" required>
                    <option value="" selected disabled>Selecione</option>
                    <?php
                    $ExeQrBuscarMateriasDisp = mysql_query("SELECT * FROM materias_disponiveis");
                    while($ResBuscarMateriasDisp = mysql_fetch_assoc($ExeQrBuscarMateriasDisp)){
                        ?>
                        <option value="<?php echo $ResBuscarMateriasDisp['materia']?>"><?php echo $ResBuscarMateriasDisp['materia']?></option>
                        <?php
                    }
                    ?>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="telefone_principal">Telefone Principal:</label>
                <input type="tel" name="telefone_principal" id="telefone_principal" class="form-control" required>
            </div>
            <div class="form-group col-md-6">
                <label for="telefone_contato">Telefone para contato:</label>
                <input type="tel" name="telefone_contato" id="telefone_contato" class="form-control">
            </div>
            <div class="clearfix"></div>
            <hr>
            <div id="retorno-cep">
                <h4>Dados de Correspondência</h4>
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
            <div class="clearfix"></div>
            <hr>
            <div id="dados-pagamento">
                <h4>Dados para Pagamento</h4>
                <div class="form-group col-md-2">
                    <label for="banco_professor">Banco:</label>
                    <select name="banco_professor" id="banco_professor" class="form-control">
                        <option selected disabled>Selecione:</option>
                        <option value="Itau">
                            Itaú
                        </option>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="agencia_banco_professor">Agência:</label>
                    <input type="number" name="agencia_banco_professor" id="agencia_banco_professor" class="form-control" placeholder="Ex: 1234">
                </div>
                <div class="form-group col-md-2">
                    <label for="dig_agencia_banco_professor"><abbr title="Deixe vazio caso não tenha">Digito:</abbr></label>
                    <input type="number" name="dig_agencia_banco_professor" id="dig_agencia_banco_professor" class="form-control" placeholder="Ex: 0">
                </div>
                <div class="form-group col-md-5">
                    <label for="conta_banco_professor"><abbr title="Inclua o dígito após hífen">Conta:</abbr></label>
                    <input type="number" name="conta_banco_professor" id="conta_banco_professor" class="form-control" placeholder="Ex: 12345-6">
                </div>
                <div class="form-group col-md-3">
                    <label for="valor_hora">Valor Combinado:</label>
                    <input type="text" name="valor_hora" id="valor_hora" class="form-control" placeholder="Ex: 100">
                </div>
                <div class="form-group col-md-3">
                    <label for="valor_hora_res">Valor Residencial:</label>
                    <input type="text" name="valor_hora_res" id="valor_hora_res" class="form-control" placeholder="Ex: 100">
                </div>
                <div class="form-group col-md-6">
                    <label for="dia_pagamento">Data para Pagamento:</label>
                    <select name="dia_pagamento" class="form-control">
                        <option disabled selected>Escolha o dia</option>
                        <?php
                        $final = 30;
                        while ($i < $final) {
                            $i = $i + 5;
                            ?>
                            <option value="<?php echo $i ?>"><?php echo $i ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="clearfix"></div>
            <hr>
            <div class="col-md-6 text-cente">
                <button type="submit" name="cadastrar_professor" class="btn btn-block btn-success">Cadastrar</button>
            </div>
            <div class="col-md-6 text-cente">
                <a href="?acesso=Home" class="btn btn-block btn-danger">Cancelar</a>
            </div>
        </form>
    </section>
    <?php
}