<?php
    $caminhoUrl = $_SERVER['DOCUMENT_ROOT']."/maispet";

    require_once($caminhoUrl."/View/includes/header-dashboard.php");
    
    $aceitaDepoimento = false;
    $excluiDepoimento = false;
    require_once($caminhoUrl."/Controller/ComentarioController.php");

    require_once($caminhoUrl."/Model/Comentarios.php");
    require_once "Model/Comentarios.php";
    $comentario = new Comentarios();

    require_once($caminhoUrl."/Model/Animais.php");
    $animal = new Animais();

    require_once($caminhoUrl."/Model/Proprietarios.php");
    $proprietario = new Proprietarios();
    
    $idcliente = $_SESSION['usuarioCliente']->id;

?>

    <!-- Main -->
    <div class="main" role="main">
      <!-- Page Content -->
      <section class="page-content">
        <div class="container">
          
          <div class="row">
            <div class="content col-md-8 col-md-8 col-md-offset-1 col-md-push-3">

              <div class="title-accent">
                <h3>Comentários Recebidos</h3>
              </div>
              <div class="row">
             <?php
                  // Variaveis de controle do usuario
                if($aceitaDepoimento == true) {?>
                    <div class="alert alert-success alert-dismissable">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
                      <strong>Comentário aceito com sucesso!</strong> <br>
                      Agora esse comentário estará disponível em seu anúncio.
                    </div>
                  <?php
                }        

                if($excluiDepoimento == true) {?>
                    <div class="alert alert-success alert-dismissable">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
                      <strong>Comentário excluído com sucesso!</strong> <br>
                      Esse comentário foi excluído e não será mostrado no anúncio.
                    </div>
                  <?php
                }
                ?>                  
                <?php 
                    foreach( $comentario->findAllComentarios($idcliente) as $key => $valor): 
                      $animalObj = $animal->findAnimal($valor->idAnimal);
                      $proprietarioObj = $proprietario->find($valor->idProprietario);
                ?>                
                <div class="col-md-12" style="margin-bottom: 50px">
                  <hr class="visible-sm visible-xs lg">
                  <div class="testimonial">
                    <blockquote>
                      <p><?php echo $valor->depoimento ?></p>
                    </blockquote>
                    <div class="bq-author">
                      <figure class="author-img">
                        <img src="uploads/animais/<?php echo $animalObj->fotoAnimal ?>" alt="?php echo $animalObj->nomeAnimal ?>" width="60" height="60">
                      
                      <?php if($valor->status == 0 ) : ?>
                        <br>
                        <form action="" method="post">
                          <input type="hidden" name="aceitar" value="sim">
                          <input type="hidden" name="idComentario" value="<?php echo $valor->id?>">
                          <input type="submit" class="btn btn-success btn-sm" style="margin: 10px 0;" value="Aceitar" name="comentario-status">
                        </form>
                      <?php endif; ?>

                        <form action="" method="post">
                          <input type="hidden" name="aceitar" value="nao">
                          <input type="hidden" name="idComentario" value="<?php echo $valor->id?>">
                          <input type="submit" class="btn btn-danger btn-sm" style="margin: 10px 0;" value="Excluir" name="comentario-status">
                        </form>
                      </figure>
                      <h6><?php echo utf8_encode($proprietarioObj->nome) ?> </h6>
                      <span class="bq-author-info">Comentou no anúncio do <?php echo $animalObj->nomeAnimal ?> </span>
                    </div>
                  </div>
                </div>                

              <?php endforeach?>

              </div>
            </div>

            <?php  require_once($caminhoUrl."/View/includes/sidebar-painel.php"); ?>
          </div>

        </div>
      </section

 <?php  require_once($caminhoUrl."/View/includes/footer-Registers.php"); ?>