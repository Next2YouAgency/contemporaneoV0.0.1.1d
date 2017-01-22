<?php include_once 'cnf/functions.php'; ?>
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo $_SESSION['Login']['foto'] ?>" style="background: #fff" class="img-circle" alt="<?php echo $_SESSION['Login']['nome'] ?>" title="<?php echo $_SESSION['Login']['nome'] ?>">
            </div>
            <div class="pull-left info">
                <p><?php echo lmWord($_SESSION['Login']['nome'], 15) ?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MENU</li>
            <li><a href="home.php"><i class="fa fa-home"></i> <span>Home</span></a></li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-book"></i>
                    <span>Agenda</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="?acesso=Agendar_Horario"><i class="fa fa-edit"></i> Agendar</a></li>
                    <li><a href="?acesso=Agendar_Compartilhado"><i class="fa fa-share"></i> Compartilhar Horário</a></li>
                    <li><a href="?acesso=Visualizar_Agenda"><i class="glyphicon glyphicon-eye-open"></i> Ver Agenda</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user"></i>
                    <span>Alunos</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="?acesso=Cadastrar_Alunos"><i class="fa fa-edit"></i> Cadastrar</a></li>
                    <li><a href="?acesso=Consultar_Alunos"><i class="fa fa-search"></i> Consultar</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="glyphicon glyphicon-education"></i>
                    <span>Professores</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="?acesso=Cadastrar_Professores"><i class="fa fa-edit"></i> Cadastrar</a></li>
                    <li><a href="?acesso=Consultar_Professores"><i class="fa fa-search"></i> Consultar</a></li>
                </ul>
            </li>
            <!--
            Fazer Multi Level
                - Aluno ->Pagos/Devedores
                - Professores ->Aulas Lecionadas/Pagamentos
            -->
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-share"></i> <span>Financeiro</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="?acesso=Exibir_Pagamentos_Alunos"><i class="fa fa-circle-o"></i> Alunos
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <a href="?acesso=Exibir_Pagamentos_Professores"><i class="fa fa-circle-o"></i> Professores
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        
                    </li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="glyphicon glyphicon-adjust"></i> <span>Configurações </span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="?acesso=Configuracoes_Precos"><i class="fa fa-circle-o"></i> Valores das Aulas
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <a href="?acesso=Cadastrar_Disciplinas"><i class="fa fa-circle-o"></i> Disciplinas
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        
                    </li>
                </ul>
            </li>
            <li><a href="home.php?LogOff"><i class="glyphicon glyphicon-off"></i> <span>Sair</span></a></li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>