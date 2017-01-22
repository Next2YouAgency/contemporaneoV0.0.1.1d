<section class="col-md-12" style="padding:10px 0;">
    <h3>Compartilhar sala de aula:</h3>
    <?php
    $BaseDeDias = USUARIO_DB;
    $QueryBuscarTodosOsDbDeAula = mysql_query("SHOW DATABASES LIKE '%$BaseDeDias%'", $conexao);
    if ($QueryBuscarTodosOsDbDeAula) {
        while ($DiaEncontrado = mysql_fetch_array($QueryBuscarTodosOsDbDeAula)) {
            $conectarBanco = mysql_select_db($DiaEncontrado[0], $conexao);
            if ($conectarBanco ) {
                ?>
                <form style="margin-top: 10px;" action="?acesso=AgendarCompartilhado" method="post">
                    <div class="col-md-2">
                        <!--Exibir a data com formato correto sem a nomenclatura do DB-->
                        <h5 class="text-center"><?php echo date('m/d/Y', strtotime(str_replace('_', '/', substr($DiaEncontrado[0], 8)))) ?></h5>
                        <select name="sala_selecionada" class="form-control">
                            <option selected disabled>Escolha</option>
                            <?php
                            for ($SalaRep = 1; $SalaRep <= 5; $SalaRep ++) {
                                $NomeSala = "sala" . $SalaRep;
                                //Buscar e Agrupar por matéria
                                $QueryBuscarAgruparMaterias = "SELECT * FROM $NomeSala WHERE materia = 'Geografia'";
                                $ExeQrBuscarAgruparMaterias = mysql_query($QueryBuscarAgruparMaterias);
                                while ($MateriasAgrupadas = mysql_fetch_array($ExeQrBuscarAgruparMaterias)) {
                                    //Buscar Todos os campos depois de agrupar
                                    ?>
                                    <option value="<?php echo $MateriasAgrupadas['entrada'] ?>">
                                        <?php echo $MateriasAgrupadas['entrada'] ?>
                                    </option>
                                    <?php
                                }
                                mysql_select_db(DDB, $conexao);
                            }
                            ?>
                        </select>
                        <div class="form-group text-center" style="padding-top: 2.5px;">
                            <button type="submit" name="escolher" class="btn btn-success">
                                <span class="glyphicon glyphicon-check"></span>
                            </button>
                        </div>
                    </div>
                </form>
                <?php
            }
        }
    }
    ?>
</section>