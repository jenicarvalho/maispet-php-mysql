<?php


    $caminhoUrl = $_SERVER['DOCUMENT_ROOT']."/maispet";

    $successDepoimento = false;
    require_once($caminhoUrl."/Controller/ComentarioController.php");

    $successDenuncia = false;
    require_once($caminhoUrl."/Controller/DenunciaController.php");

    $successIntervencao = false;
    require_once($caminhoUrl."/Controller/IntervencaoController.php");

    require_once($caminhoUrl."/View/includes/header.php");
    require_once($caminhoUrl."/Model/Animais.php");
    require_once($caminhoUrl."/Model/Proprietarios.php");
 
    $animal = new Animais();
    $proprietario = new Proprietarios();

    if(isset($_GET['CodAnimal'])) :
    	$codigoAnimal = $_GET['CodAnimal'];

    	//todas as informações do animal estao nesse objeto
    	$dadosAnimal = $animal->findAnimal($codigoAnimal);

    	//verifica se animal existe
    	if($dadosAnimal) :

	    	//armazena as informações do proprietario nesse objeto
	    	$dadosProprietario = $proprietario->find($dadosAnimal->idProprietario);

	    //se o animal nao existir redireciona
	    else:
	    	echo '<script>location.href="?pagina=lista-animais";</script>';
	    endif;
	//se o codigo estiver vazio redireciona    
    else:
    	echo '<script>location.href="?pagina=lista-animais";</script>';
    endif;

    //pronome do proprietario
	if(utf8_encode($dadosProprietario->sexo) == "Feminino") :
		$pronome = "Ela é a dona";
	else :
		$pronome = "Ele é o dono";
	endif;

?>
		<!-- Main -->
		<div class="main" role="main">

			<!-- Page Heading -->
			<section class="page-heading">
				<div class="container">
					<div class="row">
						<div class="col-md-6">
							<h1>Perfil do(a) <?php echo utf8_encode($dadosAnimal->nomeAnimal) ?></h1>
						</div>
						<div class="col-md-6">
							<ul class="breadcrumb">
								<li><a href="?pagina=index">Home</a></li>
								<li class="active"><?php echo utf8_encode($dadosAnimal->nomeAnimal) ?></li>
							</ul>
						</div>
					</div>
				</div>
			</section>

			<section class="page-content">
				<div class="container">

					<div class="row">
						<div class="content col-md-8 col-md-8 col-md-offset-1 col-md-push-3">
							
							<!-- Informações do animal -->
							<div class="job-profile-info">								
		       					 <?php

		       					 	// Variaveis de controle do usuario
				                    if($successDenuncia == true) {?>
				                      <div class="alert alert-success alert-dismissable">
				                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
				                        <strong>Denúncia feita!</strong> <br>
				                        Obrigado por ajudar o Mais Pet :) Sua denúncia será analisada pela nossa equipe e o proprietário será notificado.
				                      </div>
				                    <?php
				                  }
				                ?> 	

		       					 <?php

				                    if($successIntervencao == true) {?>
				                      <div class="alert alert-success alert-dismissable">
				                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
				                        <strong>Pedido de intervenção veterinária feito!</strong> <br>
				                        Seu pedido foi feito e em breve nós entraremos em contato.
				                      </div>
				                    <?php
				                  }
				                ?> 		

               					 <?php

				                    if($successDepoimento == true) {?>
				                      <div class="alert alert-success alert-dismissable">
				                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
				                        <strong>Depoimento Feito!</strong> Obrigado!
				                      </div>
				                    <?php
				                  }
				                ?>  			                					
								<div class="row">
									<div class="col-md-5">
										<figure class="alignnone">
											<img src="uploads/animais/<?php echo utf8_encode($dadosAnimal->fotoAnimal)?>" alt="<?php echo utf8_encode($dadosAnimal->nomeAnimal) ?>">
										</figure>
									</div>
									<div class="col-md-7">
										<h2 class="name"><?php echo utf8_encode($dadosProprietario->nome)?></h2>
										<i class="tagline"><?php echo $pronome?> do(a) <?php echo utf8_encode($dadosAnimal->nomeAnimal) ?></i>
										<ul class="meta">
											<li><?php echo utf8_encode($dadosAnimal->nomeAnimal) ?> é um <?php echo utf8_encode($dadosAnimal->tipo) ?></li>						<li><?php echo utf8_encode($dadosAnimal->sexo) ?></li>
											<li>de <?php echo utf8_encode($dadosAnimal->data_nascimento) ?></li>
											<li>da raça <?php echo utf8_encode($dadosAnimal->raca) ?> </li>
											<li>com porte <?php echo utf8_encode($dadosAnimal->porte) ?> </li>
											<li>e da cor <?php echo utf8_encode($dadosAnimal->cor) ?> </li>
										</ul>
										<ul class="info" id="informacoes-animal" style="display: none;">
											<li><i class="fa fa-map-marker"></i> 
												Eles estão no <strong><?php echo utf8_encode($dadosProprietario->bairro)?></strong> em 
												<strong><?php echo utf8_encode($dadosProprietario->cidade)?></strong>
											</li>
											<li><i class="fa fa-whatsapp"></i> 
												<?php echo utf8_encode($dadosProprietario->celular)?>
											</li>
											<li><i class="fa fa-phone"></i> 
												<?php echo utf8_encode($dadosProprietario->telefone)?>
											</li>
										</ul>

										<div class="spacer-lg"></div>
								
									<?php if ( isset($_SESSION['usuarioCliente']) ) : ?>

										<a href="#bsModal1" class="btn btn-warning btn-lg"  data-toggle="modal" data-target="#bsModal1"><span class="fa fa-envelope"></span> Notificar Contato</a>
									<?php else : ?>

				                      <div class="alert alert-danger alert-dismissable">
				                        <strong>Para entrar em contato você precisa estar logado!</strong>  <br>
				                        <a href="?pagina=login">
				                        	<strong>Faça o login</strong>
				                        </a> ou 
				                        <a href="?pagina=signup">
				                        	<strong>crie uma conta de graça :)</strong>
				                        </a>
				                      </div>

									<?php endif ?>

										<!-- Modal -->
										<div class="modal fade" id="bsModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
														<h4 class="modal-title" id="myModalLabel">Confirmação</h4>
													</div>
													<div class="modal-body">
														Você gostaria que um veterinário da Mais Pet intermediasse o contato entre você e o outro proprietário? Com isso você terá o apoio e segurança de que seu animal precisa.
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-default pull-left" data-dismiss="modal" id="intervencao-nao">Não, mostre-me os dados de contato</button>

														<!--  Formulario de intervencao -->

														<form action="" method="post">
															<input type="hidden" name="idProprietario" value="<?php echo utf8_encode($dadosProprietario->id)?>">
															<input type="hidden" name="idInteressado" value="<?php echo $_SESSION['usuarioCliente']->id;?>">
															<input type="hidden" name="idAnimal" value="<?php echo utf8_encode($dadosAnimal->idAnimal) ?> ">
															<input type="submit" class="btn btn-primary pull-right" value="Sim desejo que intervenham" name="envia-intervencao">
														</form>

														<!-- Fim  Formulario de intervencao -->

													</div>
												</div>
											</div>
										</div>										
									</div>
								</div>

								<div class="spacer-lg"></div>
								
								<h4>Descrição</h4>
								<p><?php echo utf8_encode($dadosAnimal->descricao)?></p>

								<hr>
								
								
								<!-- Comentarios -->

								<h4>Comentários</h4>
								<div class="comentarios">					
									<div class="owl-testimonials-listings-wrapper">
										<div class="owl-carousel owl-theme owl-testimonials-listings">
							                <?php 
							                    foreach( $comentario->findAllComentariosDoAnimal($codigoAnimal) as $key => $valor): 
							                      $animalObj = $animal->findAnimal($valor->idAnimal);
							                      $proprietarioObj = $proprietario->find($valor->idProprietario);
							                ?>                
						                  <hr class="visible-sm visible-xs lg">
						                  <div class="testimonial">
						                    <blockquote>
						                      <p><?php echo $valor->depoimento ?></p>
						                    </blockquote>
						                    <div class="bq-author">
						                      <h6><?php echo utf8_encode($proprietarioObj->nome) ?> </h6>
						                      <span class="bq-author-info">Comentou no anúncio do <?php echo $animalObj->nomeAnimal ?> </span>
						                    </div>
						                  </div>									
				              			<?php endforeach?>
										</div>             
									</div>             
								</div>

								<!-- Fim Comentarios -->            
									
								<hr>
								<!-- Formulário comentarios  -->
								<?php if ( isset($_SESSION['usuarioCliente']) ) : ?>

								<h4>Deixe um comentário sobre o <?php echo utf8_encode($dadosAnimal->nomeAnimal) ?> abaixo!</h4>

								<div class="comentario-animal">
									
									<form action="" method="post">
										<textarea name="depoimento-texto" id="" cols="30" rows="6" class="form-control" placeholder="Digite aqui o seu comentário" required></textarea> <br>

										<input type="submit" class="btn btn-success" value="Adicionar Comentário" name="envia-depoimento">

										<input type="hidden" name="idAnimal" value="<?php echo $codigoAnimal?>">
										<input type="hidden" name="idProprietario" value="<?php echo $dadosAnimal->idProprietario?>">
									</form>
								</div>
								<?php else : ?>								

								<h4>Deixe um comentário sobre o <?php echo utf8_encode($dadosAnimal->nomeAnimal) ?>! <a href="?pagina=login">Faça o login antes</a></h4>
				
								<?php endif ?>

								<div class="spacer-lg"></div>

								<!-- Formulário comentarios  -->
								
							</div>
							<!-- / Informações do animal -->

							<h3>Animais Relacionados</h3>
							

							<!-- Animais Relacionados -->
							<div class="prev-next-holder text-right">
								<a class="prev-btn" id="carousel-prev"><i class="fa fa-angle-left"></i></a>
								<a class="next-btn" id="carousel-next"><i class="fa fa-angle-right"></i></a>
							</div>

							<div class="owl-carousel-wrapper row">
								<div id="owl-carousel" class="owl-carousel">
								
								<?php foreach( $animal->findAllCustom("WHERE tipo = '$dadosAnimal->tipo'  ") as $key => $valor) : ?>
									<div class="project-item">
										<div class="project-item-inner">
											<figure class="alignnone project-img">
												<img src="uploads/animais/<?php echo utf8_encode($valor->fotoAnimal)?>" alt="<?php echo utf8_encode($valor->nomeAnimal)?>" />
												<div class="overlay">
													<a href="?pagina=interna-anuncio&CodAnimal=<?php echo utf8_encode($valor->idAnimal)?>" class="dlink"><i class="fa fa-link"></i></a>
													<a href="uploads/animais/<?php echo utf8_encode($valor->fotoAnimal)?>" class="popup-link zoom"><i class="fa fa-search-plus"></i></a>
												</div>
											</figure>
											<div class="project-desc">
												<h4 class="title"><a href="?pagina=interna-anuncio&CodAnimal=<?php echo utf8_encode($valor->idAnimal)?>"><?php echo utf8_encode($valor->nomeAnimal)?></a></h4>
												<span class="desc"><?php echo utf8_encode($valor->raca)?> / <?php echo utf8_encode($valor->sexo)?></span>
											</div>
										</div>
								   </div>
								<?php endforeach?>
								</div>
							</div>
							<!-- / Animais Relacionados -->
							
							<br>

            				<?php if ( isset($_SESSION['usuarioCliente']) ) : ?>
							<!-- Denuncia -->						
							<div class="call-to-action centered">
								<div class="cta-txt">
									<h2>Viu algo de errado aqui? Denuncie!</h2>
									<p>Nós também amamos animais e contamos com a sua ajuda para tornar o Mais Pet um lugar melhor. Se você acha que esse anúncio fere as regras do site, clique no botão abaixo para denunciar.</p>
								</div>
								<div class="cta-btn">
									<a data-toggle="modal" class="btn btn-danger" data-target="#denuncia">Denunciar</a>
																			<!-- Modal -->
									<div class="modal fade" id="denuncia" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
													<h4 class="modal-title" id="myModalLabel">Escolha o motivo da denúncia</h4>
												</div>
												<div class="modal-body">
													<form action="" method="post">
														<input type="hidden" name="idDenunciado" value="<?php echo $dadosAnimal->idProprietario ?>">
														<input type="hidden" name="idDenunciador" value="<?php echo $_SESSION['usuarioCliente']->id;?>">
														<input type="hidden" name="idAnimal" value="<?php echo $dadosAnimal->idAnimal ?>">
														<select name="motivo-denuncia" class="form-control">
															<option value="Fotos Indevidas">Fotos Indevidas</option>
															<option value="Descrição Indevida">Descrição Indevida</option>
															<option value="Não é o dono do animal">Não é o dono do animal</option>
														</select>
														<br>
														<input type="submit" value="Efetuar denuncia" class="btn btn-danger" name="denunciar-anuncio">
													</form>
												</div>
											</div>
										</div>
									</div>	
								</div>
							</div>
							<!-- / Denuncia -->
							<?php endif; ?>
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
	
		