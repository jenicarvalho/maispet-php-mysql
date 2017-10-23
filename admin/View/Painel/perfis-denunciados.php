<?php

/**
 *  Project: Mais Pet
 *  Created: 22/10
 *  User: Jeniffer Carvalho
 *  Usage: Lista os perfis denunciados
 */

if ( isset($_SESSION['usuarioADM']) ) : 

$caminhoUrlAdm = $_SERVER['DOCUMENT_ROOT']."/maispet/admin";
$caminhoUrl = $_SERVER['DOCUMENT_ROOT']."/maispet";


require_once($caminhoUrl."/Model/Denuncias.php");
$denuncia = new Denuncias();

$successDelete = false;
$success = false;
require_once($caminhoUrl."/Controller/DenunciaController.php");
require_once($caminhoUrlAdm."/View/includes/head.php");

$idproprietario = $_GET['id'];
$resultadoProprietario = $denuncia->find($idproprietario);
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
                            <h4 class="page-title">Denúncias Realizadas</h4>
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

                                <?php if(isset($_GET['acao']) and ($_GET['acao'] == 'editar')): ?>

                                <div class="row">
                                    <div class="col-sm-12 card-box">

                                        <?php

                                            if($success == true) {?>
                                              <div class="alert alert-success alert-dismissable">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
                                                <strong>Alteração Realizada!</strong>
                                              </div>
                                            <?php
                                          }
                                        ?>                                        
                                        <div class="">
                                          <form action="#" method="post" id="submit-job-form" class="job-manager-form" enctype="multipart/form-data">

                                            <!-- Job Information Fields -->
                                            <fieldset class="fieldset-job_title col-md-6">
                                              <label for="job_title">Nome</label>
                                              <div class="field">
                                                <input type="text" class="form-control" name="nome" id="job_title" placeholder="" value="<?php echo utf8_encode($resultadoProprietario->nome) ?>"/>
                                              </div>
                                            </fieldset>

                                            <fieldset class="col-md-6">
                                              <label>Email <span class="required">*</span></label>
                                              <div class="field">
                                                <input type="email" class="form-control" name="email" id="account_email" placeholder="you@yourdomain.com" value="<?php echo utf8_encode($resultadoProprietario->email) ?>" />
                                              </div>
                                            </fieldset>
                                            
                                            <fieldset class="fieldset-job_title col-md-6">
                                              <label for="job_title">Senha</label>
                                              <div class="field">
                                                <input type="password" class="form-control" name="pass" id="pass1" placeholder="" value="<?php echo utf8_encode($resultadoProprietario->senha) ?>"/>
                                              </div>
                                            </fieldset>

                                            <fieldset class="fieldset-job_title col-md-6">
                                              <label for="job_title">CPF</label>
                                              <div class="field">
                                                <input type="text" class="form-control" name="document" id="job_title" placeholder="" value="<?php echo utf8_encode($resultadoProprietario->cpf) ?>"/>
                                              </div>
                                            </fieldset>

                                            <fieldset class="fieldset-job_title col-md-6">
                                              <label for="job_title">Data de Aniversário</label>
                                              <div class="field">
                                                <input type="text" class="form-control" name="birthdayDate" id="job_title" placeholder="10/10/1990" value="<?php echo utf8_encode($resultadoProprietario->data_nascimento) ?>"/>
                                              </div>
                                            </fieldset>

                                            <fieldset class="fieldset-job_type col-md-6">
                                              <label for="job_type">Sexo</label>
                                              <div class="field select-style">
                                                <select name="sex" id="job_type" class="form-control">
                                                  <option value="<?php echo utf8_encode($resultadoProprietario->sexo) ?>" selected><?php echo utf8_encode($resultadoProprietario->sexo) ?></option>
                                                  <option value="Feminino">Feminino</option>
                                                  <option value="Masculino">Masculino</option>
                                                </select>
                                              </div>
                                            </fieldset>

                                            <fieldset class="fieldset-job_title col-md-6">
                                              <label for="job_title">Endereço</label>
                                              <div class="field">
                                                <input type="text" class="form-control" name="street" id="job_title" placeholder="" value="<?php echo utf8_encode($resultadoProprietario->endereco) ?>"/>
                                              </div>
                                            </fieldset>


                                            <fieldset class="fieldset-job_title col-md-6">
                                              <label for="job_title">Cidade</label>
                                              <div class="field">
                                                <input type="text" class="form-control" name="city" id="job_title" placeholder="" value="<?php echo utf8_encode($resultadoProprietario->cidade) ?>"/>
                                              </div>
                                            </fieldset>

                                            <fieldset class="fieldset-job_title col-md-6">
                                              <label for="job_title">Bairro</label>
                                              <div class="field">
                                                <input type="text" class="form-control" name="neighborhood" id="job_title" placeholder="" value="<?php echo utf8_encode($resultadoProprietario->bairro) ?>"/>
                                              </div>
                                            </fieldset>

                                            <fieldset class="fieldset-job_type col-md-6">
                                              <label for="job_type">Estado</label>
                                              <div class="field select-style">
                                                <select name="state" id="job_type" class="form-control">
                                                  <option value="<?php echo utf8_encode($resultadoProprietario->estado) ?>" selected><?php echo utf8_encode($resultadoProprietario->estado) ?></option>
                                                </select>
                                              </div>
                                            </fieldset>

                                            <fieldset class="fieldset-job_title col-md-6">
                                              <label for="job_title">Celular</label>
                                              <div class="field">
                                                <input type="text" class="form-control" name="phone" id="job_title" placeholder="" value="<?php echo utf8_encode($resultadoProprietario->celular) ?>"/>
                                              </div>
                                            </fieldset>
                                            
                                            <fieldset class="fieldset-job_title col-md-6">
                                              <label for="job_title">Telefone</label>
                                              <div class="field">
                                                <input type="text" class="form-control" name="phoneHouse" id="job_title" placeholder="" value="<?php echo utf8_encode($resultadoProprietario->telefone) ?>"/>
                                              </div>
                                            </fieldset>
                                            

                                            <input type="hidden" name="usuario_id" value="<?php echo utf8_encode($resultadoProprietario->id) ?>">

                                            <div class="col-md-12" style="margin-top: 2em">
                                              <input type="submit" name="atualizar" class="btn btn-primary" value="Alterar &rarr;" />
                                            </div>

                                          </form>
                                        </div>
                                    </div><!-- end col -->
                                </div>
                                            
                                <?php endif; ?>


                                <?php if($successDelete): ?>
                                <div class="alert alert-success">
                                    <strong>Sucesso!</strong> A denúncia foi deletada.
                                </div>
                                <?php endif; ?>

                                    <div class="table-rep-plugin">
                                        <div class="table-responsive" data-pattern="priority-columns">
                                            <table id="tech-companies-1" class="table  table-striped">
                                                <thead>
                                                    <tr>
                                                        <th data-priority="1">Perfil Denunciado</th>
                                                        <th>Anúncio Denunciado</th>
                                                        <th data-priority="1">Quem Denunciou</th>
                                                        <th data-priority="3">Motivo da denúncia</th>
                                                        <th data-priority="1">Data da denúncia</th>
                                                        <th data-priority="3">Ação</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php foreach( $denuncia->findAll() as $key => $valor) : ?>
                                                    <tr>
                                                        <th><a href="?pagina=proprietarios&acao=editar&id=<?php echo $valor->idDenunciado ?>">Ver perfil</a></th>
                                                        <th><a href="../?pagina=interna-anuncio&CodAnimal=<?php echo $valor->idAnimal ?>" target="_blank">Ver Anúncio</a></th>
                                                        <th><a href="?pagina=proprietarios&acao=editar&id=<?php echo $valor->idDenunciador ?>">Ver perfil</a></th>
                                                        <th><?php echo utf8_encode($valor->motivo) ?></th>
                                                        <th><?php echo configuraData($valor->data) ?></th>
                                                        <td><a href="?pagina=perfis-denunciados&acao=deletar&id=<?php echo $valor->id ?>" class="btn btn-red waves-effect waves-light">Deletar</a></td>
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
                    Mais Pet
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
    <meta http-equiv="refresh" content="0; url=?pagina=login">

<?php endif; ?>