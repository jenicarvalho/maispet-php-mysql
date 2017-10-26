<?php

/**
 *  Project: Mais Pet
 *  Created: 22/10
 *  User: Jeniffer Carvalho
 *  Usage: Lista os relatorios
 */

$caminhoUrlAdm = $_SERVER['DOCUMENT_ROOT']."/maispet/admin";
$caminhoUrl = $_SERVER['DOCUMENT_ROOT']."/maispet";

if ( isset($_SESSION['Veterinario']) ) : 

require_once($caminhoUrl."/Model/Proprietarios.php");
$proprietario = new Proprietarios();

require_once($caminhoUrl."/Model/Animais.php");
$animais = new Animais();
 
require_once($caminhoUrl."/Model/Intervencao.php");
$intervencao = new Intervencao();

$successDelete = false;
$success = false;
require_once($caminhoUrl."/Controller/IntervencaoController.php");

require_once($caminhoUrlAdm."/View/includes/head.php");

$idproprietario = $_GET['id'];

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
                            <h4 class="page-title">Relatórios</h4>
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
                            <div class="col-sm-8 col-xs-12">

                                <div class="card-box">
                                    <div class="relatorio">
                                        <h3>Proprietários</h3>
                                        <ul>
                                            <li>Total de proprietários: <strong><?php echo count($proprietario->findAll());?></strong></li>
                                            <li>Sexo Feminino: <strong><?php echo count($proprietario->findAllCustom("WHERE sexo = 'Feminino' "));?></strong></li>
                                            <li>Sexo Masculino: <strong><?php echo count($proprietario->findAllCustom("WHERE sexo = 'Masculino' "));?></strong></li>
                                            <li>Cadastros esse mês: <strong><?php echo count($proprietario->findAllCustom("WHERE MONTH(data_cadastro) = '$mesAtual' "));?></strong></li>
                                            <br>
                                            <a href="?pagina=relatorios-proprietarios" class="btn btn-info">Baixar Relatório </a>
                                        </ul>
                                    </div> 
                                </div>

                            </div>
                            <!-- End row -->
                        </div> <!-- container -->

                        <div class="row">
                            <div class="col-sm-8 col-xs-12">
                                <div class="card-box">
                                    <div class="relatorio">
                                    <h3>Animais/Anúncios</h3>
                                    <ul>
                                        <li>Total de animais/anúncios cadastrados: <strong><?php echo count($animais->findAll());?></strong></li>
                                        <li>Quantidade de Gatos: <strong><?php echo count($animais->findAllCustom("WHERE tipo = 'Gato' "));?></strong></li>
                                        <li>Quantidade de Cachorros: <strong><?php echo count($animais->findAllCustom("WHERE tipo = 'Cachorro' "));?></strong></li>
                                        <br>
                                        <a href="?pagina=relatorios-animais" class="btn btn-info">Baixar Relatório </a>
                                    </ul>
                                </div> 
                            </div>
                        </div>  
                    </div>  

                    <div class="row">
                        <div class="col-sm-8 col-xs-12">

                            <div class="card-box">
                                <div class="relatorio">
                                    <h3>Intervenções</h3>
                                    <ul>
                                        <li>Total de intervenções: <strong><?php echo count($intervencao->findAll());?></strong></li>
                                        <li>Intervenções esse mês: <strong><?php echo count($intervencao->findAllCustom("WHERE MONTH(data) = '$mesAtual' "));?></strong></li>
                                    </ul>
                                </div> 
                            </div>

                        </div>
                        <!-- End row -->
                    </div> <!-- container -->

                    <footer class="footer">
                2017 © MaisPet.
                    </footer>

                </div>

    </div>
    <!-- END wrapper -->

<?php  require_once($caminhoUrlAdm."/View/includes/footer.php"); ?>

<?php else : ?>

    <script>alert("Você não tem acesso.");</script>
    <meta http-equiv="refresh" content="0; url=?pagina=painel">

<?php endif; ?>