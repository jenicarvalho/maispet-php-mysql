<?php

    $success = true;
    $caminhoUrl = $_SERVER['DOCUMENT_ROOT']."/maispet";

    require_once($caminhoUrl."/View/includes/header.php");
    require_once($caminhoUrl."/Controller/LoginController.php");
?>

    <div class="main" role="main">

      <section class="page-heading">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <h1>Login</h1>
            </div>
            <div class="col-md-6">
              <ul class="breadcrumb">
                <li><a href="?pagina=index">Inicial</a></li>
                <li class="active">Login</li>
              </ul>
            </div>
          </div>
        </div>
      </section> 
      
      <section class="page-content">
        <div class="container">
          
          <div class="row">
            <div class="col-md-8 col-sm-offset-2">
              <div class="alert alert-info">
                <strong>Não tem uma conta? <a href="?pagina=signup">Clique aqui</a></strong> e faça seu cadastro gratuito.
              </div>      
              <div class="box">
                <h3>Login</h3>
                <form method="POST" role="form">
                  <div class="form-group">
                    <label>E-mail<span class="required">*</span></label>
                    <input type="text" name="usuario" class="form-control">
                  </div>
                  <div class="form-group">
                    <div class="clearfix">
                      <label class="pull-left">
                        Senha <span class="required">*</span>
                      </label>
                      <span class="pull-right"><a href="#">Perdeu a senha?</a></span>
                    </div>
                    <input type="password" name="senha" class="form-control">
                  </div>
                  <button type="submit" class="btn btn-primary btn-inline"  name="fazerLogin">Entrar</button>&nbsp; &nbsp; &nbsp; 
                </form>
              </div>
            </div>
          </div>

            <?php if($success == false) : ?>

            <div class="row">
              <div class="col-md-8 col-sm-offset-2">
                <div class="alert alert-danger alert-dismissable">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
                  <strong>Opa!</strong> Erro ao fazer login.
                </div> 
              </div>
            </div>

            <?php endif; ?>

        </div>
      </section>

<?php
    require_once($caminhoUrl."/View/includes/footer-Registers.php");
?>
  