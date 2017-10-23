<?php

/**
 *  Project: Mais Pet
 *  Created: 25/08
 *  User: Jeniffer Carvalho
 *  Usage: Tela listagem dos usuarios administrativos
 */

$caminhoUrlAdm = $_SERVER['DOCUMENT_ROOT']."/maispet/admin";
$caminhoUrl = $_SERVER['DOCUMENT_ROOT']."/maispet";


if ( isset($_SESSION['usuarioADM']) ) : 
    $success = false;
    $successDelete = false;
    
    require_once($caminhoUrlAdm."/Model/UsuariosAdministrativos.php");
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
                                <div class="dropdown pull-right">
                                    <a href="#" class="dropdown-toggle card-drop" data-toggle="dropdown" aria-expanded="false">
                                        <i class="zmdi zmdi-more-vert"></i>
                                    </a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#">Ir para o site</a></li>
                                    </ul>
                                </div>


                                <?php
                                    if(isset($_GET['acao']) &&  $_GET['acao'] == 'editar') : 
                                        $id = (int)$_GET['id'];
                                        $resultado = $usuarioAdm->find($id);
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
                                                    <input type="text" class="form-control" required placeholder="Login" name="login"  value="<?php echo $resultado->login ?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Senha</label>
                                                <div class="col-md-10">
                                                    <input type="password" class="form-control" required placeholder="*******" name="senha"  value="<?php echo $resultado->senha ?>">
                                                </div>
                                            </div>

                                            <?php if($success == true) : ?>

                                            <p class='bg-success' style="margin-left: 100px; text-align: center; color: #fff" >Alteração realizada com Sucesso!</p>

                                            <?php endif; ?>

                                            <button style="margin-left: 100px" type="submit" class="btn btn-purple waves-effect waves-light" name="atualizar">Atualizar</button>
                                        </form>
                                    </div><!-- end col -->
                                </div><!-- end row -->  
                                <?php  else :?>  

                                <h4 class="header-title m-t-0 m-b-30">Todos os usuarios cadastrados</h4>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="table-responsive"> 
                                          <table class="table table-striped m-0"> 
                                          <thead> 
                                            <tr> 
                                              <th>#</th> 
                                              <th>Nome</th> 
                                              <th>E-mail</th> 
                                              <th>CPF</th>   
                                              <th>Login</th>   
                                              <th>Ações</th>  
                                          </tr> 
                                          </thead> 
                                          <tbody> 
                                            <?php foreach( $usuarioAdm->findAll() as $key => $valor) : ?>
                                             <tr> 
                                               <th scope="row"><?php echo $valor->id; ?></th> 
                                               <td><?php echo $valor->nome ?> </td> 
                                               <td><?php echo $valor->email?> </td>
                                               <td><?php echo $valor->cpf?> </td>
                                               <td><?php echo $valor->login?> </td>
                                               <td>
                                                    <a href="?pagina=administrativos&acao=editar&id=<?php echo $valor->id ?>">Editar </a> |

                                                    <a href="?pagina=administrativos&acao=deletar&id=<?php echo $valor->id ?>" > Deletar</a>
                                               </td> 
                                             </tr> 
                                           <?php endforeach;?>

                                           <?php if($successDelete == true) : ?>
                                          
                                           <p class='bg-success' style="text-align: center; color: #fff" >Deletado com Sucesso!</p>

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

                                  <p class='bg-success' style="text-align: center; color: #fff" >Inserido com Sucesso!</p>

                                  <?php endif; ?>
                                    <div class="col-lg-12">
                                        <form class="form" method="post">
                                          <div class="form-group">
                                            <label for="exampleInputName2">Nome</label>
                                            <input type="text" class="form-control" id="exampleInputName2" placeholder="Jane Doe" name="nome" required>
                                          </div>
                                          <div class="form-group">
                                            <label for="exampleInputEmail2">Email</label>
                                            <input type="email" class="form-control" id="exampleInputEmail2" placeholder="jane.doe@example.com" name="email" required>
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
                                                <option value="1">Administrador (Tem acesso total)</option>
                                                <option value="2">Veterinário</option>
                                                <option value="3">Assistente</option>
                                            </select>
                                          </div>
                                          <button type="submit" class="btn btn-default" name="cadastrar">Enviar</button>
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
    <meta http-equiv="refresh" content="0; url=?pagina=login">

<?php endif; ?>