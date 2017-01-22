<link href="css/css-calendar/responsive-calendar.css" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Economica' rel='stylesheet' type='text/css'>
<script src="js/js-calendar/responsive-calendar.js"></script>
<div class="container col-md-12">
    <!-- Responsive calendar - START -->
    <div class="responsive-calendar">
        <div class="controls">
            <a class="pull-left" data-go="prev"><div class="btn btn-primary">Prev</div></a>
            <h4><span data-head-year></span> <span data-head-month></span></h4>
            <a class="pull-right" data-go="next"><div class="btn btn-primary">Next</div></a>
        </div>
        <h4 style="text-align:center"><span><a href="?acesso=Agendar_Horario" style="color:#008CBA;">Cadastrar</a></span></h4>
        <hr>
        <div class="day-headers">
            <div class="day header">Dom</div>
            <div class="day header">Seg</div>
            <div class="day header">Ter</div>
            <div class="day header">Qua</div>
            <div class="day header">Qui</div>
            <div class="day header">Sex</div>
            <div class="day header">Sáb</div>
        </div>
        <div class="days" data-group="days">

        </div>
    </div>
    <!-- Responsive calendar - END -->
</div>
<script type="text/javascript">
    $(document).ready(function () {
    $(".responsive-calendar").responsiveCalendar({
    time: '<?php echo date("Y-m") ?>',
            events: {
            //Sintaxe para retornar dados: "2016-12-24": {"number": 5, "url": "http://w3widgets.com/responsive-slider"},

            //"2016-12-24": {"number": 1, "url": "responsive-slider"},
<?php
$conexao = mysql_connect("localhost", "root", "");
mysql_select_db("contemporaneo");

$exeQrBuscarAgenda = mysql_query("SELECT * FROM agenda_aulas");

if (mysql_num_rows($exeQrBuscarAgenda) > 0) {
    while ($resBuscarAgenda = mysql_fetch_assoc($exeQrBuscarAgenda)) {
        $QueryAgendaDia = "SELECT * FROM agenda_aulas WHERE data = '$resBuscarAgenda[data]'";
        $ExeQrAgendaDia = mysql_query($QueryAgendaDia);
        $totalRegistros = mysql_num_rows($ExeQrAgendaDia);
        for ($iRegistros = 1; $iRegistros <= $totalRegistros; $iRegistros++) {
            ?>
                        "<?php echo $resBuscarAgenda['data'] ?>": {"number": "<i data-toggle='modal' data-target='#modal<?php echo $resBuscarAgenda['data'] ?>' class='btn btn-sm' data-toggle='tooltip' data-placement='top' alt='Ver tudo' title='Ver tudo'><?php echo $iRegistros ?></i>", "event": "?evento=1"},
            <?php
        }
    }
}
?>
            }
    });
    }
    );
</script>
<?php
$exeQrBuscarAgenda = mysql_query("SELECT * FROM agenda_aulas");
if (mysql_num_rows($exeQrBuscarAgenda) > 0) {
    while ($resBuscarAgenda = mysql_fetch_assoc($exeQrBuscarAgenda)) {
        ?>
        <div class="modal fade" id="modal<?php echo $resBuscarAgenda['data'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-lg" role="document" style="width:95%">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Aulas do dia: <?php echo date("d/m/Y", strtotime($resBuscarAgenda['data'])) ?></h4>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-1" style="padding:0">
                            <h4>Horários</h4>
                            <?php
                            for ($numSala = 1; $numSala <= 6; $numSala ++) {
                                $ExeSQLBuscarHorarios = mysql_query("SELECT * FROM sala$numSala");
                                while ($ReturnHorarios = mysql_fetch_assoc($ExeSQLBuscarHorarios)) {
                                    ?>
                                    <div class="col-md-12" style="border:0.5px solid #ddd">
                                        <?php echo $ReturnHorarios['exibir_entrada'] ?>
                                    </div>
                                    <?php
                                }
                            }
                            ?>
                        </div>
                        <div class="col-md-11">
                            <?php
                            for ($contSala = 1; $contSala <= 6; $contSala++) {
                                $nomeDaSala = "sala" . $contSala;
                                ?>
                                <div class="col-md-2" style="padding-left:0;padding-right: 0;">
                                    <h4 class="text-center">Sala <?php echo $contSala ?></h4>
                                    <?php
                                    $QueryAgendaAulasAgendadas = "SELECT * FROM agenda_aulas WHERE data = '$resBuscarAgenda[data]' AND sala = '$nomeDaSala' ORDER BY entrada";
                                    $ExeQrBuscarAulasAgendadas = mysql_query($QueryAgendaAulasAgendadas);

                                    if (mysql_num_rows($ExeQrBuscarAulasAgendadas) > 0) {
                                        $ExeSQLOrdenarEntrada = mysql_query("SELECT * FROM agenda_aulas WHERE sala = '$nomeDaSala' ORDER BY sala");
                                        ?>
                                        <?php
                                        while ($resAgendaDia = mysql_fetch_assoc($ExeQrBuscarAulasAgendadas)) {
                                            $horarioEntrada = $resAgendaDia['entrada'];
                                            $horarioSaida = $resAgendaDia['saida'];
                                            $qtdHorario = $resAgendaDia['qtd_hora'];
                                            $alturaCelula = $qtdHorario * 21;
                                            $CorSala = $resAgendaDia['materia'];
                                            $salaDeAulaAgendada = $resAgendaDia['sala'];
                                            include 'pages/includes/switchesSalasAgenda.php';
                                            ?>
                                            <div class="col-md-12" style="<?php echo $Style . $Height . $Spacing ?>border-bottom:0.5px solid #ddd">
                                                <?php echo lmWord($resAgendaDia['nome_aluno'], 19) ?>
                                                <?php echo $resAgendaDia['entrada'] ?>
                                                <a href="?acesso=ExibirEvento&Id=<?php echo $resAgendaDia['id'] ?>" title="<?php echo $resAgendaDia['materia'] ?>">
                                                    <span class="glyphicon glyphicon-search"></span>
                                                </a>
                                            </div>
                                            <?php
                                        }
                                    }
                                    ?>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
}