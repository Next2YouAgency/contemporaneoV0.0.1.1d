<?php
$idAula = $_GET['Id'];
$QueryBuscarAgenda = "SELECT * FROM agenda_aulas WHERE id = '$idAula'";
$ExeQrBuscarAgenda = mysql_query($QueryBuscarAgenda);

if (mysql_num_rows($ExeQrBuscarAgenda) > 0) {
    while ($resEventoId = mysql_fetch_assoc($ExeQrBuscarAgenda)) {
        ?>
        Aula de: <?php echo $resEventoId['materia'];?>
        <?php
    }
}
?>