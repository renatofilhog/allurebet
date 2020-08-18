<!DOCTYPE html>
<html lang="en">
<head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo $titles['ti1']; ?></title>
        <link type="text/css" href="<?php echo BASEURL;?>/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link type="text/css" href="<?php echo BASEURL;?>/assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link type="text/css" href="<?php echo BASEURL;?>/assets/css/theme.css" rel="stylesheet">
        <link type="text/css" href="<?php echo BASEURL;?>/assets/images/icons/css/font-awesome.css" rel="stylesheet">
        <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
			rel='stylesheet'>
		<link rel="stylesheet" type="text/css" href="assets/css/template.css">
    </head>
    <body>
        <!-- Menu de cima -->
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                        <i class="icon-reorder shaded"></i></a><a class="brand" href="/home/cliente">Jogo de Apostas </a>
                    <div class="nav-collapse collapse navbar-inverse-collapse">
                        <ul class="nav pull-right">
                            
                            <li class="nav-user dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                Conta
                                <i class="icon-user"></i>
                                <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Seu perfil</a></li>
                                    <li><a href="#">Editar seu perfil</a></li>
                                    <li class="divider"></li>
                                    <li><a href="/acoes/logout">Sair</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!-- /.nav-collapse -->
                </div>
            </div>
            <!-- /navbar-inner -->
        </div>
        <!-- /fim do menu de cima (NAVBAR) -->


        <div class="wrapper">
            <div class="container">
                <div class="row">
                    <div class="span3">
                        <!-- Inicio do menu lateral -->
                        <div class="sidebar">
                            <ul class="widget widget-menu unstyled">
                                <li class="active"><a href="/home/cliente"><i class="menu-icon icon-home"></i>Inicio</a></li>
                                <li><a href="#"><i class="menu-icon icon-plus"></i>Fazer aposta</a></li>
                                <li><a href="#"><i class="menu-icon icon-th-list"></i>Ver Apostas
                                    <b class="label green pull-right">NºDEJOGOS</b>
                                </a></li>

                            </ul>
                        <!-- Fim da primeira parte do menu lateral -->
                            
                        <!-- Segunda parte do menu lateral / ADMIN AREA -->    
                            <ul class="widget widget-menu unstyled">
                                <li><a href="#"><i class="menu-icon icon-user"></i>Gerenciar Perfil </a></li>
                                <li><a href="#"><i class="menu-icon icon-envelope"></i>Fale conosco</a></li>
                            </ul>
                        <!--/ ADMIN AREA -->
                            <ul class="widget widget-menu unstyled">
                                <li><a href="/acoes/logout"><i class="menu-icon icon-signout"></i>Logout </a></li>
                            </ul>
                        </div>
                        <!--/.FIM MENU LATERAL-->
                    </div>
                    <!--/.FIM MENU LATERAL-->
                    <!-- AQUI FICA O TEMPLATE -->    


					<?php $this->loadView($viewName, $viewData); ?>



                    </div>
            <!--/.container-->
        </div>
        <!--/.wrapper-->
        </div>
					<!-- footer do template -->
        <div class="footer">
            <div class="container">
                <b class="copyright">&copy; 2020 - AllureDevelopment / Desenvolvido por: Renato Filho </b><br>Todos os direitos reservados.
            </div>
        </div>
        <script src="<?php echo BASEURL;?>/assets/scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
        <script src="<?php echo BASEURL;?>/assets/scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
        <script src="<?php echo BASEURL;?>/assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo BASEURL;?>/assets/js/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="<?php echo BASEURL;?>/assets/js/jquery.mask.js" type="text/javascript"></script>
        <script src="<?php echo BASEURL;?>/assets/js/script.js" type="text/javascript"></script>
        <script src="<?php echo BASEURL;?>/assets/scripts/common.js" type="text/javascript"></script>


    </body>
</html>