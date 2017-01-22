<?php
#Versão com ajax
if (isset($_GET['SalaSelecionada'])) {
    include '../../cnf/config.php';

    $salaInformada = $_GET['SalaSelecionada'];

    session_start();
    $dataInformadaParaAula = $_SESSION['DATA_EXISTE'];
    //Visualizar DB do Mês
    $DbDiaAula = $dataInformadaParaAula;
    $verificarDBDiaAula = mysql_query("SHOW DATABASES LIKE '$DbDiaAula'");

    if (mysql_num_rows($verificarDBDiaAula) > 0) {
        $conexaoDbMesDia = mysql_connect(HOST, USER, PASS);
        mysql_select_db($DbDiaAula, $conexaoDbMesDia);
        $SelectSalas = "$dataInformadaParaAula.$salaInformada";
        $AlunoInformado = $_SESSION['MATRICULA_ALUNO'];
        $QueryBuscarHorarioEntrada = "SELECT * FROM $SelectSalas WHERE status = 0";
        $ResBuscarHorarioEntrada = mysql_query($QueryBuscarHorarioEntrada);
        $ContBuscaHorarioEntrada = mysql_affected_rows($conexaoDbMesDia);
        if (mysql_affected_rows($conexaoDbMesDia) > 0) {
            while ($ResultadoHorarioEntrada = mysql_fetch_assoc($ResBuscarHorarioEntrada)) {
                $EntradaReturn = $ResultadoHorarioEntrada['entrada'];
                $EntradaReturnExibir = $ResultadoHorarioEntrada['exibir_entrada'];
                ?>
                <option value="<?php echo $EntradaReturn ?>"><?php echo $EntradaReturnExibir ?></option>
                <?php
            }
        } else {
            ?>
            <option value="<?php echo $EntradaReturn ?>"><?php echo "Erro: " . mysql_error() ?></option>
            <?php
        }
    } else {
        $salaInformada = $_GET['SalaSelecionada'];
        $QueryBuscarHorarios = "SELECT * FROM horarios";

        $QueryBuscarHorarioEntrada = "SELECT * FROM $salaInformada WHERE status = 0";
//    sleep(1);
        $resultBuscarSalaPorData = mysql_query($QueryBuscarHorarioEntrada);
        $ContBuscarHorarioEntrada = mysql_affected_rows($conexao);
        if ($ContBuscarHorarioEntrada > 0) {
            while ($ResultadoHorarioEntrada = mysql_fetch_assoc($resultBuscarSalaPorData)) {
                $EntradaReturn = $ResultadoHorarioEntrada['entrada'];
                $EntradaReturnExibir = $ResultadoHorarioEntrada['exibir_entrada'];
                ?>
                <option value="<?php echo $EntradaReturn ?>"><?php echo $EntradaReturnExibir ?></option>
                <?php
            }
        }
    }
}

    