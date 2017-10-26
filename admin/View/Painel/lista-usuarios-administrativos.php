<?php

/**
 *  Project: Mais Pet
 *  Created: 25/08
 *  User: Jeniffer Carvalho
 *  Usage: Tela listagem dos usuarios administrativos
 */

$caminhoUrlAdm = $_SERVER['DOCUMENT_ROOT']."/maispet/admin";
$caminhoUrl = $_SERVER['DOCUMENT_ROOT']."/maispet";


if ( isset($_SESSION['Administrador']) ) : 
    $success = false;
    $success2 = false;
    $successDelete = false;

    require_once($caminhoUrlAdm."/Model/Veterinario.php");
    $veterinario = new Veterinarios();

    require_once($caminhoUrlAdm."/Model/Funcionario.php");
    $funcionario = new Funcionarios();

    require_once($caminhoUrlAdm."/Model/Administrador.php");
    $administrador = new Administradores();

    require_once($caminhoUrlAdm."/Model/UsuariosAdministrativos.php");
    $UsuarioAdministrativo = new UsuariosAdministrativos;

    require_once($caminhoUrlAdm."/View/includes/head.php");
    require_once($caminhoUrlAdm."/Controller/UsuariosAdministrativos.php");
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


        <?php require_once($caminhoUrlAdm."/View/includes/sidebar.php"); ?>


        <div class="content-page">
            <!-- Start content -->
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box">

                                <?php
                                    if(isset($_POST['acao']) &&  $_POST['acao'] == 'editar') : 

                                        $funcao = $_POST['funcao'];
                                        $id = (int)$_POST['id'];
                                        $loginUsuario = $_POST['login'];
                                        $senhaUsuario = $_POST['senha'];
                                        $idLogin = $_POST['idLogin'];


                                        if($funcao == 'administrador') {
                                          $resultado = $administrador->find($id);
                                        }

                                        if($funcao == 'veterinario') {
                                          $resultado = $veterinario->find($id);
                                        }

                                        if($funcao == 'funcionario') {
                                          $resultado = $funcionario->find($id);
                                        }
                                ?>
                                <h4 class="header-title m-t-0 m-b-30">Editar usuário</h4>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <form class="form-horizontal" method="post">
                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Nome</label>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control" required placeholder="Nome.." name="nome"  value="<?php echo $resultado->nome ?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-2 control-label" for="example-email">Email</label>
                                                <div class="col-md-10">
                                                    <input type="email" id="example-email" class="form-control" required placeholder="Email" name="email"   value="<?php echo $resultado->email ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-2 control-label">CPF</label>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control" required placeholder="000.000.000-00" name="cpf"  value="<?php echo $resultado->cpf ?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Login</label>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control" required placeholder="Login" name="login"  value="<?php echo $loginUsuario ?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Senha</label>
                                                <div class="col-md-10">
                                                    <input type="password" class="form-control" required placeholder="*******" name="senha"  value="<?php echo $senhaUsuario ?>">
                                                    <input type="hidden" name="nivel" value="<?php echo $funcao ?>" >
                                                    <input type="hidden" name="id" value="<?php echo $id ?>" >
                                                    <input type="hidden" name="idLogin" value="<?php echo $idLogin ?>" >
                                                </div>
                                            </div>

                                            <button style="margin-left: 100px" type="submit" class="btn btn-purple waves-effect waves-light" name="atualizar">Atualizar</button>
                                        </form>
                                    </div><!-- end col -->
                                </div><!-- end row -->  
                                <?php  else :?>  


                                <?php if($success2 == true) : ?>

                                  <div class="alert alert-success alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
                                    <strong>Alteração Realizada!</strong>
                                  </div>

                                <?php endif; ?>
                                <h4 class="header-title m-t-0 m-b-30">Todos os usuarios cadastrados</h4>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="table-responsive"> 
                                          <table class="table table-striped m-0"> 
                                          <thead> 
                                            <tr>  
                                              <th>Nome</th> 
                                              <th>E-mail</th> 
                                              <th>CPF</th>   
                                              <th>Função</th>   
                                              <th>Login</th>   
                                              <th>Ações</th>  
                                          </tr> 
                                          </thead> 
                                          <tbody> 
                                            <?php foreach( $UsuarioAdministrativo->findAll() as $key => $valor) : ?>
                                            <?php
                                                /*-- Funcionario --*/
                                                if ($valor->idFuncionario == 1) {
                                                    $usuarioAtual = $funcionario->find($valor->idLogin);
                                                    $cargo = "funcionario";
                                                }
                                                /*-- Veterinario --*/
                                                if ($valor->idVeterinario == 1) {
                                                    $usuarioAtual = $veterinario->find($valor->idLogin);
                                                    $cargo = "veterinario";
                                                }
                                                /*-- Administrador --*/
                                                if ($valor->idAdministrador == 1) {
                                                    $usuarioAtual = $administrador->find($valor->idLogin);
                                                    $cargo = "administrador";
                                                }
                                              ?>
                                             <tr> 
                                               <td><?php echo $usuarioAtual->nome ?> </td> 
                                               <td><?php echo $usuarioAtual->email?> </td>
                                               <td><?php echo $usuarioAtual->cpf?> </td>
                                               <td><?php echo $cargo ?> </td>
                                               <td><?php echo $valor->login ?> </td>
                                               <td>
                                                <form action="?pagina=administrativos" method="post">
                                                  <input type="hidden" name="id" value="<?php echo $valor->idLogin ?>">
                                                  <input type="hidden" name="funcao" value="<?php echo $cargo?>">
                                                  <input type="hidden" name="acao" value="editar">
                                                  <input type="hidden" name="login" value="<?php echo $valor->login ?>">
                                                  <input type="hidden" name="senha" value="<?php echo $valor->senha ?>">
                                                  <input type="hidden" name="idLogin" value="<?php echo $valor->idLogin ?>" >
                                                  <input type="submit" class="btn brn-primary" value="Editar">
                                                </form> 
                                                    <a class="btn btn-danger" href="?pagina=administrativos&acao=deletar&id=<?php echo $valor->id ?>" > Deletar</a>
                                               </td> 
                                             </tr> 
                                           <?php endforeach;?>

                                           <?php if($successDelete == true) : ?>

                                              <div class="alert alert-success alert-dismissable">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
                                                <strong>Deletado com Sucesso!</strong>
                                              </div>                                          

                                           <?php endif; ?>
                                          </tbody> 
                                          </table> 
                                        </div>
                                    </div><!-- end col -->
                                </div>  
                            </div>

                            <div class="card-box">
                                <h4 class="header-title m-t-0 m-b-30">Cadastrar Novo Administrador</h4>
                                <div class="row">

                                  <?php if($success == true) : ?>

                                  <div class="alert alert-success alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
                                    <strong>Inserido com Sucesso!</strong>
                                  </div>

                                  <?php endif; ?>
                                    <div class="col-lg-12">
                                        <form class="form" method="post">
                                          <div class="form-group">
                                            <label for="exampleInputName2">Nome</label>
                                            <input type="text" class="form-control" id="exampleInputName2" placeholder="Nome" name="nome" required>
                                          </div>
                                          <div class="form-group">
                                            <label for="exampleInputEmail2">Email</label>
                                            <input type="email" class="form-control" id="exampleInputEmail2" placeholder="E-mail" name="email" required>
                                          </div>
                                          <div class="form-group">
                                            <label for="exampleInputEmail2">CPF</label>
                                            <input type="text" class="form-control" id="exampleInputEmail2" placeholder="CPF" name="cpf" required>
                                          </div>
                                          <div class="form-group">
                                            <label for="exampleInputEmail2">Login</label>
                                            <input type="text" class="form-control" id="exampleInputEmail2" placeholder="Login" name="login" required>
                                          </div>
                                          <div class="form-group">
                                            <label for="exampleInputEmail2">Senha</label>
                                            <input type="password" class="form-control" id="exampleInputEmail2" placeholder="Senha" name="senha" required>
                                          </div>

                                          <div class="form-group">
                                            <label for="exampleInputEmail2">Senha</label>
                                            <input type="password" class="form-control" id="exampleInputEmail2" placeholder="Senha" name="senha" required>
                                          </div>
                                          <div class="form-group">
                                            <label for="exampleInputEmail2">Nível</label>
                                            <select name="nivel" class="form-control" required>
                                                <option value="administrador">Administrador</option>
                                                <option value="veterinario">Veterinário</option>
                                                <option value="funcionario">Funcionário</option>
                                            </select>
                                          </div>
                                          <button type="submit" class="btn btn-primary" name="cadastrarADM">Enviar</button>
                                        </form>
                                    </div><!-- end col -->
                                </div>
                                <?php endif; ?>  
                            
                            </div>
                        </div><!-- end col -->
                    </div>
                </div>
            </div>
        </div>
    </div>
 </div>

<?php  require_once($caminhoUrlAdm."/View/includes/footer.php"); ?>

<?php else : ?>

    <script>alert("Você não tem acesso.");</script>
    <meta http-equiv="refresh" content="0; url=?pagina=painel">

<?php endif; ?>