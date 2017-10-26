<?php

    $caminhoUrl = $_SERVER['DOCUMENT_ROOT']."/maispet";
    
    require_once($caminhoUrl."/Model/Proprietarios.php");
    require_once($caminhoUrl."/Model/Animais.php");

    $animal = new Animais();
    $proprietario = new Proprietarios();
    
?>
<aside class="sidebar col-md-3 col-md-pull-9 col-bordered">
  
  <hr class="visible-sm visible-xs lg">

  <!-- Widget :: Categories -->
  <div class="widget_categories widget widget__sidebar">
    <h3 class="widget-title">Dados do usuário</h3>
    <div class="widget-content dados-usuario">

      <div class="row paddingInformationContact">
        <div class="col-md-1 col-sm-2">
          <i class="fa fa-user contactIcons" aria-hidden="true"></i>
        </div>
        <div class="col-md-10 col-sm-10">
          <p><?php echo utf8_encode($resultado->nome) ?></p>
        </div>
      </div>
      <div class="row paddingInformationContact">
        <div class="col-md-1 col-sm-2">
          <i class="fa fa-phone contactIcons" aria-hidden="true"></i>
        </div>
        <div class="col-md-10 col-sm-10">
          <p><?php echo utf8_encode($resultado->celular) ?></p>
        </div>
      </div>
      <div class="row paddingInformationContact">
        <div class="col-md-1 col-sm-2">
          <i class="fa fa-envelope contactIcons" aria-hidden="true"></i>
        </div>
        <div class="col-md-10 col-sm-10">
          <p><?php echo utf8_encode($resultado->email) ?></p>
        </div>
      </div>            
      <div class="row paddingInformationContact">
        <div class="col-md-1 col-sm-2">
          <i class="fa fa-pencil contactIcons" aria-hidden="true"></i>
        </div>
        <div class="col-md-10 col-sm-10">
          <p><a href="?pagina=painel_perfil">Editar</a></p>
        </div>
      </div>         
      <div class="row paddingInformationContact">
        <div class="col-md-1 col-sm-2">
          <i class="fa fa-sign-out contactIcons" aria-hidden="true"></i>
        </div>
        <div class="col-md-10 col-sm-10">
          <p><a href="?logout=true" onclick="alert('Você foi deslogado!')">Deslogar</a></p>
        </div>
      </div>

    </div>
  </div>

  <div class="latest-posts-widget widget widget__sidebar">
    <h3 class="widget-title">Últimos Anúncios</h3>
    <div class="widget-content">
      <ul class="latest-posts-list">
      <?php foreach( $animal->findAllCustom("ORDER BY idAnimal DESC LIMIT 3") as $key => $valor) : ?>

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
        <li>
          <figure class="thumbnail">
            <a href="?pagina=interna-anuncio&CodAnimal=<?php echo $valor->idAnimal?>">
              <img src="uploads/animais/<?php echo $valor->fotoAnimal; ?>" width="60" height="60">
            </a>
          </figure>
          <span class="date"><?php echo utf8_encode($valor->nomeAnimal); ?></span>
          <h5 class="title">
            <a href="?pagina=interna-anuncio&CodAnimal=<?php echo $valor->idAnimal?>">
              <?php echo utf8_encode($sexo)?>, <?php echo utf8_encode($valor->data_nascimento) ?> 
            </a>
          </h5>
        </li>
        <?php endforeach;?>
        <li>
      </ul>
    </div>
  </div>
</aside>