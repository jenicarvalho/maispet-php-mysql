<?php

/**
 *  Project: Mais Pet
 *  Created: 22/10
 *  User: Jeniffer Carvalho
 *  Usage: Lista as intervencoes
 */

$caminhoUrlAdm = $_SERVER['DOCUMENT_ROOT']."/maispet/admin";
$caminhoUrl = $_SERVER['DOCUMENT_ROOT']."/maispet";

if ( isset($_SESSION['Veterinario']) ) : 

require_once($caminhoUrl."/Model/Intervencao.php");
$intervencao = new Intervencao();

$successDelete = false;
$success = false;
require_once($caminhoUrl."/Controller/IntervencaoController.php");
require_once($caminhoUrlAdm."/View/includes/head.php");

$idproprietario = $_GET['id'];
$resultadoProprietario = $intervencao->find($idproprietario);
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
                            <h4 class="page-title">Intervenções Solicitadas</h4>
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
                            <div class="col-sm-12">

                                <div class="card-box">


                                <?php if($successDelete): ?>
                                <div class="alert alert-success">
                                    <strong>Sucesso!</strong> A intervenção foi deletada.
                                </div>
                                <?php endif; ?>

                                    <div class="table-rep-plugin">
                                        <div class="table-responsive" data-pattern="priority-columns">
                                            <table id="tech-companies-1" class="table  table-striped">
                                                <thead>
                                                    <tr>
                                                        <th data-priority="1">Anúncio</th>
                                                        <th>Proprietário</th>
                                                        <th data-priority="1">Quem Solicitou</th>
                                                        <th data-priority="3">Data</th>
                                                        <th data-priority="3">Ação</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php foreach( $intervencao->findAll() as $key => $valor) : ?>
                                                    <tr>
                                                        <th><a href="../?pagina=interna-anuncio&CodAnimal=<?php echo $valor->idAnimal ?>" target="_blank">Ver Anúncio</a></th>
                                                        <th><a href="?pagina=proprietarios&acao=editar&id=<?php echo $valor->idProprietario ?>">Ver perfil</a></th>
                                                        <th><a href="?pagina=proprietarios&acao=editar&id=<?php echo $valor->idInteressado ?>">Ver perfil</a></th>
                                                        <th><?php echo configuraData($valor->data) ?></th>
                                                        <td><a href="?pagina=intervencoes&acao=deletar&id=<?php echo $valor->id ?>" class="btn btn-red waves-effect waves-light">Deletar</a></td>
                                                    </tr> 
                                                <?php endforeach;?>
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- End row -->

                    </div> <!-- container -->

                </div> <!-- content -->

                <footer class="footer">
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
    <meta http-equiv="refresh" content="0; url=?pagina=painel">

<?php endif; ?>