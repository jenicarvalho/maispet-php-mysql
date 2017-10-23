<?php

    $caminhoUrl = $_SERVER['DOCUMENT_ROOT']."/maispet";

    require_once($caminhoUrl."/Model/Animais.php");
    $animal = new Animais();

    require_once($caminhoUrl."/View/includes/header-dashboard.php");
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
                  <?php foreach( $animal->findAllMeusAnimais($idcliente) as $key => $valor) : ?>

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

              <div class="spacer"></div>

            </div>

            <?php  require_once($caminhoUrl."/View/includes/sidebar-painel.php"); ?>
          </div>

        </div>
      </section

 <?php  require_once($caminhoUrl."/View/includes/footer-Registers.php"); ?>