<?php
$VersionSystem = "0.0.1d";
ob_start();
session_start();
require_once 'cnf/config.php';
if (isset($_GET['LogOff'])) {
    session_destroy();
    include_once 'parts/extra/modal-log-off.php';
} else if (isset($_SESSION['Login'])) {
    if(isset($_GET['MudarSenha'])){
        $UsuarioAlterarSenha[nome] = $_POST['NomeUsuario'];
        $UsuarioAlterarSenha[id] = $_POST['IdUsuario'];
    }
    ?>
    <!DOCTYPE html>
    <html>
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE-Edge">
            <title>Echo System v<?php echo $VersionSystem ?></title>
            <!-- CORE JQuery-->
            <script src="js/jquery.min.js"></script>
            <!--JQuery UI-->
            <script src="js/jquery-ui.min.js"></script>
            <!-- CORE JQUERY-->
            <script src="js/jquery.min.js"></script>
            <!-- CORE BS CSS-->
            <link rel="stylesheet" href="css/bootstrap.min.css">
            <!-- CORE JS BOOTSTRAP-->
            <script src="js/bootstrap.min.js"></script>
            <!--Responsive-->
            <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
            <!--Core CSS do BS-->
            <link rel="stylesheet" href="css/bootstrap.min.css">
            <!-- Font Awesome -->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
            <!-- Ionicons -->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
            <!-- Theme style -->
            <link rel="stylesheet" href="css/AdminLTE.css">
            <!--Skin-->
            <link rel="stylesheet" href="css/skins/_all-skins.min.css">
            <!-- bootstrap wysihtml5 - text editor -->
            <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
            <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
            <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
            <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
            <![endif]-->
        </head>
        <?php
        session_start();
//    session_destroy();
        ?>
        <body class="hold-transition skin-yellow sidebar-mini">
            <div class="wrapper">
                <?php include'parts/pages/Header.php'; ?>
                <!-- Left side column. contains the logo and sidebar -->
                <?php include 'parts/Menu.php'; ?>
                <!-- Content Wrapper. Contains page content -->
                <div class="content-wrapper">
                    <!-- Content Header (Page header) -->
                    <section class="content-header">
                        <h1>
                            Painel de Controle
                            <small><?php echo date('d/m/Y') ?></small>
                        </h1>
                        <ol class="breadcrumb">
                            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                            <li class="active lead">
                                <?php
                                if (!isset($_GET['acesso'])) {
                                    echo "Início";
                                } else {
                                    if ($_GET['acesso'] == "Home") {
                                        echo 'Página Inicial';
                                    } else {
                                        echo str_replace('_', ' ', $_GET['acesso']);
                                    }
                                }
                                ?>
                            </li>
                        </ol>
                    </section>

                    <!-- Conteúdo Principal -->
                    <section class="content">
                        <!-- Main row -->
                        <div class="row">
                            <?php
                            if (isset($_GET['acesso'])) {
                                $acesso = $_GET['acesso'];
                                switch ($acesso) {
                                    case $acesso: include'pages/' . $acesso . '.php';
                                        break;
                                    default:
                                        break;
                                }
                            } else {
                                include 'pages/Home.php';
                            }
                            ?>
                        </div>
                        <!-- /.row (main row) -->

                    </section>
                    <!-- /.content -->
                </div>
                <!-- /.content-wrapper -->
                <footer class="main-footer">
                    <div class="pull-right hidden-xs">
                        <b>Version</b> <?php echo $VersionSystem ?>
                    </div>
                    <strong>Copyright &copy; 2017-2018 <a href="http://n2y.com.br">Next 2 You</a>.</strong> All rights
                    reserved.
                </footer>

                <!-- Control Sidebar -->

            </div>
            <!-- ./wrapper -->
            <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
            <script>
                $.widget.bridge('uibutton', $.ui.button);
            </script>
            <!-- daterangepicker -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
            <script src="plugins/daterangepicker/daterangepicker.js"></script>
            <!-- datepicker -->
            <script src="plugins/datepicker/bootstrap-datepicker.js"></script>
            <!-- Bootstrap WYSIHTML5 -->
            <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
            <!-- Slimscroll -->
            <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
            <!-- FastClick -->
            <script src="plugins/fastclick/fastclick.js"></script>
            <!-- AdminLTE App -->
            <script src="js/app.min.js"></script>

        </body>
    </html>
    <?php
}else{
    ?>
    <script> alert("Usuário não Logado!")</script>
    <meta http-equiv="refresh" content="0;index.php">
    <?php
}