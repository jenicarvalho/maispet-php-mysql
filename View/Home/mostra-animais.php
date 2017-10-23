<?php
    $caminhoUrl = $_SERVER['DOCUMENT_ROOT']."/maispet";

    require_once($caminhoUrl."/View/includes/header.php");
    require_once($caminhoUrl."/Model/Animais.php");
    require_once($caminhoUrl."/Model/Proprietarios.php");

    $animal = new Animais();
    $proprietario = new Proprietarios();
?>

		<!-- Main -->
		<div class="main" role="main">

			<!-- Page Heading -->
			<section class="page-heading">
				<div class="container">
					<div class="row">
						<div class="col-md-6">
							<h1>Animais</h1>
						</div>
						<div class="col-md-6">
							<ul class="breadcrumb">
								<li><a href="?pagina=index">Inicial</a></li>
								<li class="active">Animais</li>
							</ul>
						</div>
					</div>
				</div>
			</section>
			<!-- Page Heading / End -->

			<!-- Page Content -->
			<section class="page-content">
				<div class="container">
					
					<div class="row">
			              <div class="content col-md-8 col-md-8 col-md-offset-1 col-md-push-3">
			                <h2 class="with-subtitle" data-animation="fadeInUp" data-animation-delay="0">Últimos Animais <small data-animation="fadeInUp" data-animation-delay="100">Confira os animais que recém chegaram!</small></h2>
			                <div class="row">

                  			<?php foreach( $animal->findAllCustom("ORDER BY idAnimal DESC LIMIT 12") as $key => $valor) : ?>

                  			<?php $nomeProprietario = $proprietario->find(utf8_encode($valor->idProprietario))?>

			                  <div class="col-xs-12 col-sm-6 col-md-4" data-animation="fadeInLeft" data-animation-delay="0">
			                    <div class="job-listing-box">
			                      <figure class="job-listing-img">
			                        <a href="?pagina=interna-anuncio&CodAnimal=<?php echo utf8_encode($valor->idAnimal)?>"><img src="uploads/animais/<?php echo utf8_encode($valor->fotoAnimal) ?>" alt="<?php echo utf8_encode($valor->nomeAnimal) ?>"></a>
			                      </figure>
			                      <div class="job-listing-body">
			                        <h4 class="name"><a href="?pagina=interna-anuncio&CodAnimal=<?php echo utf8_encode($valor->idAnimal)?>"><?php echo utf8_encode($valor->nomeAnimal) ?></a></h4>
			                        <p>			                        	
			                        	<?php echo utf8_encode($valor->tipo) ?>, 
			                        	<?php echo utf8_encode($valor->sexo) ?>, 
			                        	<?php echo utf8_encode($valor->data_nascimento) ?>, 
			                        	<?php echo utf8_encode($valor->cor) ?>, 
			                        	<?php echo utf8_encode($valor->porte) ?>
			                        	
			                        </p>
			                      </div>
			                      <footer class="job-listing-footer">
			                        <ul class="meta">
			                          <li class="category">Dono: <strong><?php echo utf8_encode($nomeProprietario->nome) ?></strong></li>
			                          <li class="date"><a href="?pagina=interna-anuncio&CodAnimal=<?php echo utf8_encode($valor->idAnimal)?>">Veja o perfil completo</a></li>
			                        </ul>
			                      </footer>
			                    </div>
			                  </div>

                 			<?php endforeach;?>

			                </div>
			              </div>
												
						<?php
    					   require_once($caminhoUrl."/View/includes/sidebar-home.php");
						?>
					</div>

				</div>
			</section>
<?php
	require_once($caminhoUrl."/View/includes/footer-Registers.php");
?>
	