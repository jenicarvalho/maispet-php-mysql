<?php

/**
 *  Project: Mais Pet
 *  Created: 01/10
 *  User: Jeniffer Carvalho
 *  Usage: Tela inicial do sistema logado
 */

$caminhoUrl = $_SERVER['DOCUMENT_ROOT']."/maispet";

if ( isset($_SESSION['usuarioCliente']) ) : 
  
    require_once($caminhoUrl."/Model/Animais.php");
    $animal = new Animais();

    require_once($caminhoUrl."/Controller/LoginController.php");
    $idcliente = $_SESSION['usuarioCliente']->id;

    require_once($caminhoUrl."/View/includes/header-dashboard.php");

    require_once($caminhoUrl."/Model/Comentarios.php");
    $comentario = new Comentarios();

    require_once($caminhoUrl."/Model/Proprietarios.php");
    $proprietario = new Proprietarios();

?>

    <!-- Main -->
    <div class="main" role="main">
      <!-- Page Content -->
      <section class="page-content">
        <div class="container">
          
          <div class="row">
            <div class="content col-md-8 col-md-8 col-md-offset-1 col-md-push-3">

              <div class="title-accent">
                <h3>Meus anúncios</h3>
              </div>
              <div class="job_listings">           

                <ul class="job_listings">
                  <?php foreach( $animal->findAllMeusAnimaisLimit($idcliente) as $key => $valor) : ?>

                    <?php 
                      $tipo = $valor->tipo;

                      if($tipo == 1) {
                        $tipo = "Cachorro";
                      }
                      if($tipo == 2) {
                        $tipo = "Gato";
                      }

                      $sexo = $valor->sexo;

                      if($sexo == 1) {
                        $sexo = "Fêmea";
                      }
                      if($sexo == 2) {
                        $sexo = "Macho";
                      }
                    ?>

                  <li class="job_listing">
                    <a href="?pagina=editar_anuncio&cod=<?php echo $valor->idAnimal?>">
                      <img src="uploads/animais/<?php echo $valor->fotoAnimal; ?>" alt="" class="company_logo">
                      <div class="position">
                        <h3><?php echo utf8_encode($valor->nomeAnimal); ?></h3>
                        <div class="company">
                          <strong><?php echo utf8_encode($tipo); ?></strong>
                        </div>
                      </div>
                      <div class="location">
                          <p>Sexo <br> <?php echo utf8_encode($sexo)?></p> 
                      </div>
                      <div class="location">
                          <p>Idade: <br>  <?php echo utf8_encode($valor->data_nascimento) ?> anos </p>
                      </div>
                      <div class="location">
                        Editar
                      </div>
                    </a>
                  </li>
                 <?php endforeach;?>
                </ul>
              </div>
              <a href="?pagina=painel_anuncios" class="btn btn-success">Ver todos  &rarr;</a>

              <div class="title-accent" style="margin-top: 2em">
                <h3>Comentários Recebidos</h3>
              </div>
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

            <?php require_once($caminhoUrl."/View/includes/sidebar-painel.php"); ?>
          </div>

        </div>
      </section


<?php require_once($caminhoUrl."/View/includes/footer-Registers.php"); ?>

<?php else : ?>

    <script> alert("Faça login para ter acesso.");</script>
    <meta http-equiv="refresh" content="0; url=?pagina=login">

<?php endif; ?>