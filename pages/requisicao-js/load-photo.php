<?php
#Versão com ajax
if (isset($_GET['Load'])) {
    include '../../cnf/config.php';
    $foto = $_GET['Load'];
    $QueryBuscarFoto = "SELECT foto FROM usuarios WHERE usuario = '$foto'";
//    sleep(1);
    $resultBuscarFoto = mysql_query($QueryBuscarFoto);
    $ContBuscarFoto = mysql_affected_rows($conexao);

    if ($ContBuscarFoto > 0) {
        while ($ResultadoFoto = mysql_fetch_assoc($resultBuscarFoto)) {
            $fotoReturn = $ResultadoFoto['foto'];
            ?>
<img src="<?php echo $fotoReturn ?>"  class="img-responsive img-circle" style="margin:100px auto">
            <?php
        }
    } else {
        ?>
        <img src="img/img1.png" class="img-responsive img-circle">
        <?php
    }
} else {
    ?>
    <img src="img/img1.png" class="img-responsive img-circle">
    <?php
}
