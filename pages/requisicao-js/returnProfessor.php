<?php
#Versão com ajax
if (isset($_GET['MateriaSelecionada'])) {
    include '../../cnf/config.php';

    $materiaInformada = $_GET['MateriaSelecionada'];
    $QueryBuscarProfessorPorMateria = "SELECT * FROM professores WHERE materia = '$materiaInformada'";
//    sleep(1);
    $resultBuscarProfessorPorMateria = mysql_query($QueryBuscarProfessorPorMateria);
    $ContBuscarProfessorPorMateria = mysql_affected_rows($conexao);

    if ($ContBuscarProfessorPorMateria > 0) {
        while ($ResultadoSalaPorData = mysql_fetch_assoc($resultBuscarProfessorPorMateria)) {
            $SProfReturn = $ResultadoSalaPorData['nome'];
            ?>
            <option value="<?php echo $SProfReturn ?>"><?php echo $SProfReturn ?></option>
            <?php
        }
    } else {
        ?>
            <option value="<?php echo $SProfReturn ?>" disabled selected>Não há professores para a matéria selecionada</option>
        <?php
    }
}

    