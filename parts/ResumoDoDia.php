<div class="row">
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
            <div class="inner">
                <?php
                $DiaHoje = date('Y-m-d');
                $ExeQrBuscarAulasHoje = mysql_query("SELECT * FROM agenda_aulas WHERE data = '$DiaHoje'");
                ?>
                <h3><?php echo mysql_num_rows($ExeQrBuscarAulasHoje) ?></h3>
                <p>Aulas Hoje</p>
            </div>
            <div class="icon">
                <i class="glyphicon glyphicon-education"></i>
            </div>
            <a href="?acesso=Visualizar_Agenda" class="small-box-footer">Ver Agendamentos <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
            <div class="inner">
                <?php
                $DbDiaAtual = USUARIO_DB . date('d_m_Y');
                mysql_select_db($DbDiaAtual, $conexao);
                $ExeQrBuscarPorcHoje = mysql_query("SELECT * FROM sala1 WHERE status = 1 UNION ALL SELECT * FROM sala2 WHERE status = 1 UNION ALL SELECT * FROM sala3 WHERE status = 1 UNION ALL SELECT * FROM sala4 WHERE status = 1 UNION ALL SELECT * FROM sala5 WHERE status = 1 UNION ALL SELECT * FROM sala6 WHERE status = 1 ");
                if (mysql_num_rows($ExeQrBuscarPorcHoje) > 0) {
                    ?>
                    <h3>
                        <?php
                        $BuscarTotalHorarios = mysql_query("SELECT * FROM sala1 UNION ALL SELECT * FROM sala2 UNION ALL SELECT * FROM sala3 UNION ALL SELECT * FROM sala4 UNION ALL SELECT * FROM sala5 UNION ALL SELECT * FROM sala6");
                        $TotalHorariosSalas = mysql_num_rows($BuscarTotalHorarios);
                        $TotalHorariosOcupado = (mysql_num_rows($ExeQrBuscarPorcHoje) / $TotalHorariosSalas) * 100;

                        echo (int) $TotalHorariosOcupado
                        ?><sup style="font-size: 20px">%</sup>
                    </h3>
                    <?php
                } else {
                    ?>
                    <h3>
                        0<sup style="font-size: 20px">%</sup>
                    </h3>
                    <?php
                }
                mysql_select_db('contemporaneo', $conexao)
                ?>

                <p>Uso das Salas Hoje</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="?acesso=Visualizar_Agenda" class="small-box-footer">Ver Agendamentos <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
            <div class="inner">
                <?php
                $ExeQrBuscarTotalAlunos = mysql_query("SELECT * FROM alunos");
                ?>
                <h3><?php echo mysql_num_rows($ExeQrBuscarTotalAlunos)?></h3>

                <p>Alunos Cadastrados</p>
            </div>
            <div class="icon">
                <i class="ion ion-person"></i>
            </div>
            <a href="?acesso=Consultar_Alunos" class="small-box-footer">Ver Todos <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
            <div class="inner">
                <?php
                $ExeQrBuscarTotalProf = mysql_query("SELECT * FROM professores");
                ?>
                <h3><?php echo mysql_num_rows($ExeQrBuscarTotalProf)?></h3>

                <p>Professores Cadastrados</p>
            </div>
            <div class="icon">
                <i class="ion ion-person"></i>
            </div>
            <a href="?acesso=Cadastrar_Professores" class="small-box-footer">Cadastrar Professores <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
</div>
<!-- Small boxes (Stat box) -->