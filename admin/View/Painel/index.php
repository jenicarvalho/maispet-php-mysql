<?php

/**
 *  Project: Mais Pet
 *  Created: 23/08
 *  User: Jeniffer Carvalho
 *  Usage: Tela inicial do sistema logado
 */

if ( isset($_SESSION['usuarioADM']) ) : 

$caminhoUrlAdm = $_SERVER['DOCUMENT_ROOT']."/maispet/admin";
$caminhoUrl = $_SERVER['DOCUMENT_ROOT']."/maispet";

$success = true;
require_once($caminhoUrlAdm."/Controller/LoginAdministrativoController.php");
require_once($caminhoUrlAdm."/View/includes/head.php");

//intervencao
require_once($caminhoUrl."/Model/Intervencao.php");
$intervencao = new Intervencao(); 

//proprietarios
require_once($caminhoUrl."/Model/Proprietarios.php");
$proprietario = new Proprietarios();

//animais
require_once($caminhoUrl."/Model/Animais.php");
$animal = new Animais(
);
$mesAtual = date('m');
?>

<body class="fixed-left">

    <!-- Begin page -->
    <div id="wrapper">

        <!-- Top Bar Start -->
        <div class="topbar">

            <!-- LOGO -->
            <div class="topbar-left">
                <a href="?pagina=painel" class="logo"><img src="View/assets/images/logo.png" style="margin: 30px;"></span><i class="zmdi zmdi-layers"></i></a>
            </div>

            <!-- Button mobile view to collapse sidebar menu -->
            <div class="navbar navbar-default" role="navigation">
                <div class="container">

                    <!-- Page title -->
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            <button class="button-menu-mobile open-left">
                                <i class="zmdi zmdi-menu"></i>
                            </button>
                        </li>
                        <li>
                            <h4 class="page-title">Painel Administrativo</h4>
                        </li>
                    </ul>
                </div><!-- end container -->
            </div><!-- end navbar -->
        </div>
        <!-- Top Bar End -->


        <?php  require_once($caminhoUrlAdm."/View/includes/sidebar.php"); ?>

        <div class="content-page">
            <!-- Start content -->
            <div class="content">
                <div class="container">


                    <div class="row">

                        <div class="col-md-6">
                    		<div class="card-box">
                    			<h4 class="header-title m-t-0 m-b-30">Cadastro de Proprietários</h4>
                                <div class="widget-box-2">
                                    <div class="widget-detail-2">
                                        <h2 class="m-b-0"><?php echo count($proprietario->findAllCustom("WHERE MONTH(data_cadastro) = '$mesAtual' "));?> cadastros 
                                        <span class="badge badge-success pull-left m-t-20"> <i class="zmdi zmdi-trending-up"></i> </span>
                                        </h2>
                                        <p class="text-muted m-b-25">Efetuados esse mês</p>
                                    </div>
                                    <div class="progress progress-bar-success-alt progress-sm m-b-0">
                                        <div class="progress-bar progress-bar-success" role="progressbar"
                                             aria-valuenow="77" aria-valuemin="0" aria-valuemax="100"
                                             style="width: 77%;">
                                        </div>
                                    </div>
                                </div>
                    		</div>
                        </div><!-- end col -->

                        <div class="col-md-6">
                    		<div class="card-box">
                    			<h4 class="header-title m-t-0 m-b-30">Pedidos de Intervenção no Cruzamento</h4>

                                <div class="widget-box-2">
                                    <div class="widget-detail-2">
                                        <span class="badge badge-pink pull-left m-t-20"> <i class="zmdi zmdi-trending-up"></i> </span>
                                        <h2 class="m-b-0"> <?php echo count($intervencao->findAllCustom("WHERE MONTH(data) = '$mesAtual' "));?> pedidos </h2>
                                        <p class="text-muted m-b-25">Pedidos feitos esse mês</p>
                                    </div>
                                    <div class="progress progress-bar-pink-alt progress-sm m-b-0">
                                        <div class="progress-bar progress-bar-pink" role="progressbar"
                                             aria-valuenow="77" aria-valuemin="0" aria-valuemax="100"
                                             style="width: 77%;">
                                        </div>
                                    </div>
                                </div>
                    		</div>
                        </div><!-- end col -->

                    </div>
                    <!-- end row -->

                    <div class="row">
                    	<h2 class="page-title">Anúncios Cadastrados</h2>

                        <?php foreach( $animal->findAllCustom("ORDER BY idAnimal DESC LIMIT 4") as $key => $valor) : ?>

                        <div class="col-lg-3 col-md-6">
                            <div class="card-box widget-user">
                                <div>
                                    <img src="<?php echo '../uploads/animais/' . utf8_encode($valor->fotoAnimal) ?>" width="60" height="60" class="img-responsive img-circle" alt="user">
                                    <div class="wid-u-info">
                                        <h4 class="m-t-0 m-b-5 font-600"><?php echo utf8_encode($valor->nomeAnimal) ?></h4>
                                        <p class="text-muted m-b-5 font-13"><?php echo utf8_encode($valor->tipo) ?></p>
                                        <small class="text-warning"><b><a href="../?pagina=interna-anuncio&CodAnimal=<?php echo $valor->idAnimal?>">Ver anúncio</a></b></small>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end col -->
                        
                        <?php endforeach;?>
                    </div>
                    <!-- end row -->



                </div> <!-- container -->

            </div> <!-- content -->

            <footer class="footer text-right">
                2017 © MaisPet.
            </footer>

        </div>


        <!-- ============================================================== -->
        <!-- End Right content here -->
        <!-- ============================================================== -->


    </div>
    <!-- END wrapper -->

<?php  require_once($caminhoUrlAdm."/View/includes/footer.php"); ?>

<?php else : ?>

    <script>alert("Você não tem acesso.");</script>
    <meta http-equiv="refresh" content="0; url=<?php echo $caminhoUrlAdm?>/?pagina=login">

<?php endif; ?>