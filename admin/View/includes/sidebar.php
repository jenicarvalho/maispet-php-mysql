<?php

    $caminhoUrlAdm = $_SERVER['DOCUMENT_ROOT']."/maispet/admin";
    $caminhoUrl = $_SERVER['DOCUMENT_ROOT']."/maispet";

    require_once($caminhoUrlAdm."/Controller/LoginAdministrativoController.php");

    require_once($caminhoUrl."/Model/Animais.php");
    $animal = new Animais();

    require_once($caminhoUrlAdm."/Model/Veterinario.php");

    require_once($caminhoUrlAdm."/Model/Funcionario.php");

    require_once($caminhoUrlAdm."/Model/Administrador.php");

    //verifica qual nível do usuario logado
    
    /*-- Funcionario --*/
    if ($_SESSION['usuarioADM']->idUsuario == 1) {
        $idLogado = $_SESSION['usuarioADM']->idUsuario;
        $usuarioLogado = new Funcionarios();
    }
    /*-- Veterinario --*/
    if ($_SESSION['usuarioADM']->idVeterinario == 1) {
        $idLogado = $_SESSION['usuarioADM']->idVeterinario;
        $usuarioLogado = new Veterinarios();
    }
    /*-- Administrador --*/
    if ($_SESSION['usuarioADM']->idAdministrador == 1) {
        $idLogado = $_SESSION['usuarioADM']->idAdministrador;
        $usuarioLogado = new Administradores();
    }

    //guarda dados do usuario
    $resultadoUsuario = $usuarioLogado->find($idLogado);

?>
       <!-- ========== Left Sidebar Start ========== -->

        <div class="left side-menu">
            <div class="sidebar-inner slimscrollleft">

                <!-- User -->
                <div class="user-box">
                    <h5><a href="#"><?php echo $resultadoUsuario->nome ?></a> </h5>
                    <ul class="list-inline">
                        <li>
                            <a href="#" >
                                <i class="zmdi zmdi-settings"></i>
                            </a>
                        </li>

                        <li>
                            <a href="?logout=true" class="text-custom">
                                <i class="zmdi zmdi-power"></i>
                            </a>
                        </li>
                    </ul>
                </div>

                <div id="sidebar-menu">
                    <ul>
                        <li>
                            <a href="?pagina=painel" class="waves-effect"><i class="zmdi zmdi-view-dashboard"></i> <span> Inicio </span> </a>
                        </li>
                        <li>
                            <a href="?pagina=proprietarios" class="waves-effect"><i class="fa fa-user-circle"></i> <span>Proprietários</span> </a>
                        </li>
                        <li>
                            <a href="?pagina=anuncios" class="waves-effect"><i class="fa fa-vcard-o"></i> <span>Anúncios</span> </a>
                        </li>
                        <li>
                            <a href="?pagina=perfis-denunciados" class="waves-effect"><i class="fa fa-user-times"></i> <span>Perfis Denunciados</span> </a>
                        </li>
                        <li>
                            <a href="?pagina=intervencoes" class="waves-effect"><i class="fa  fa-medkit"></i> <span>Intervenções Solicitadas</span> </a>
                        </li>
                        <li>
                            <a href="?pagina=relatorios" class="waves-effect"><i class="fa  fa-line-chart"></i> <span>Relatórios</span> </a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>

            </div>

        </div>