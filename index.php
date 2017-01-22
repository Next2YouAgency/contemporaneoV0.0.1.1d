<!DOCTYPE html>
<?php
require './cnf/config.php';
ob_start();
session_start();
//session_destroy();
if (isset($_SESSION['Login'])) {
    #Se houver Sessão do usuário
    include_once 'parts/extra/modal-logado.php';
}
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="">
        <meta name="description" content="">
        <meta rel="icon" href="img/favicon.ico">
        <title>Contemporâneo: Administração do Sistema V0.0.1d</title>
        <!-- CORE JS ie10 viewport bug w8-->
        <script src="js/ie10-viewport-bug-workaround.js"></script>
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <link rel="stylesheet" href="css/style-default.css">
        <script src="js/fotos/ajax.js"></script>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ECHO'S</title>
        <link rel="stylesheet" href="css/bootstrap.min.css" />
        <link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
        <link rel="stylesheet" href="css/login.css" />
        <link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
    </head>
    <body>
        <?php
        if (isset($_GET['Login'])) {
            /**
             * $usuarioLogado: Array com login e senha digitados
             */
            $usuarioLogado['login'] = $_POST['login'];
            $usuarioLogado['senha'] = $_POST['senha'];

            if (isset($_POST['lembrar'])) {
                //Verificar se existe a marcação para lembrar Login
                $remember = $_POST['lembrar'];
            }
            if (empty($_POST['login'])) {
                //Se não digitar o Login
                include 'parts/extra/modal-usuario-vazio.php';
            } else if (empty($_POST['senha'])) {
                //Caso Digite o Login, mas a senha ficou em branco
                include 'parts/extra/modal-senha-em-branco.php';
            } else {
                //Login e senha digitados, armazenar em MD5 para validação no banco de dados
                $usuarioMD5 = md5($usuarioLogado['login']);
                $senhaMD5 = md5($usuarioLogado['senha']);
                //Função para Ler o conteúdo da tabela usuários no banco de dados
                $buscarUsuarios = read("usuarios", "WHERE usuario_md5 = '$usuarioMD5'");

                if ($buscarUsuarios) {
                    #Achando o usuário, criar um array para percorrer os dados na tabela
                    foreach ($buscarUsuarios as $usuarioEncontrado)
                        ;

                    if ($usuarioEncontrado['usuario_md5'] === $usuarioMD5 && $usuarioEncontrado['senha_md5'] === $senhaMD5) {
                        #Caso senha correta
                        /* Cookie
                         * 

                          if(isset($remember)){

                          }else{

                          }
                         */
                        #Criar a Sessão do usuário
                        $_SESSION['Login'] = $usuarioEncontrado;
                        ?>
                        <meta http-equiv="refresh" content="0;index.php">
                        <?php
                    } else {
                        #Caso senha incorreta
                        include_once 'parts/extra/modal-senha-incorreta.php';
                    }
                } else {
                    #Caso não encontre o usuário
                    include_once './parts/extra/modal-usuario-nao-existe.php';
                }
            }
        } else {
            ?>
            <section class="container-fluid conteudo-principal">
                <div id="loginbox">
                    <form id="loginform" class="form-vertical" action="index.php?Login" method="post">
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-center">
                            <article id="fotoBuscada">
                                <?php
                                if (isset($_SESSION['Login'])) {
                                    ?>
                                    <img src="<?php echo $_SESSION['Login']['foto'] ?>" class="img-responsive img-circle">
                                    <?php
                                } else {
                                    ?>
                                    <img src="img/img1.png" class="img-responsive img-circle">
                                    <?php
                                }
                                ?>
                            </article>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 " style="border-left:#fff 1px solid;min-height: 300px;padding-top:80px">
                            <div class="control-group">
                                <div class="controls">
                                    <div class="main_input_box">
                                        <span class="add-on bg_lg"><i class="icon-user"> </i></span><input type="text" class="form-control" placeholder="Nome do Usuário" name="login" id="usuario" onblur="buscarFoto();"/>
                                    </div>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="controls">
                                    <div class="main_input_box">
                                        <span class="add-on bg_ly"><i class="icon-lock"></i></span><input type="password" class="form-control" placeholder="Senha" name="senha" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="form-actions">
                            <span class="pull-left"><a href="#" class="flip-link btn btn-info" id="to-recover">Perdeu a senha?</a></span>
                            <span class="pull-right"><button type="submit" class="btn btn-success" /> Login</a></span>
                        </div>
                    </form>
                    <form id="recoverform" action="#" class="form-vertical">
                        <p class="normal_text">Insira seu CPF para recuperar a senha</p>

                        <div class="controls">
                            <div class="main_input_box">
                                <span class="add-on bg_lo"><i class="icon-envelope"></i></span><input type="number" placeholder="Exemplo:123.456.789-00" />
                            </div>
                        </div>

                        <div class="form-actions">
                            <span class="pull-left"><a href="#" class="flip-link btn btn-success" id="to-login">&laquo; Voltar ao Login</a></span>
                            <span class="pull-right"><button type="submit" class="btn btn-info"/>Resetar</button></span>
                        </div>
                    </form>
                </div>
            </section>
            <script src="js/matrix.login.js"></script>
        </body>
    </html>
    <?php
}
ob_end_flush();
