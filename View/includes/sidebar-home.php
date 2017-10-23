<aside class="sidebar col-md-3 col-md-pull-9 col-bordered">
							
							<hr class="visible-sm visible-xs lg">

							<!-- Widget :: Categories -->
							<div class="widget_categories widget widget__sidebar">
								<h3 class="widget-title">Filtre Sua Busca</h3>
					              <form action="#" method="POST" role="form">
					                <div class="form-group">
					                  <div class="select-style">
					                    <select class="form-control" id="tipo-animal">
					                      	<option value="">Tipo de animal</option>
				                          	<option value="Cachorro">Cachorro</option>
				                          	<option value="Gato">Gato</option>
									    </select>
					                  </div>
					                </div>
					                <div class="form-group">
					                  <div class="select-style">
					                    <select class="form-control">
					                      <option>Sexo</option>
				                          <option value="Fêmea">Fêmea</option>
				                          <option value="Macho">Macho</option>
					                    </select>
					                  </div>
					                </div>
					                <div class="form-group">
					                  <div class="select-style">
					                    <select class="form-control">
					                      <option>Porte</option>
				                          <option value="Médio">Médio</option>
				                          <option value="Grande">Grande</option>
				                          <option value="Pequeno">Pequeno</option>
					                    </select>
					                  </div>
					                </div>
					                <div class="form-group">
					                  <div class="select-style">
					                    <select class="form-control">
					                      <option>Idade</option>
				                          <option value="1 ano">1 ano</option>
				                          <option value="2 anos">2 anos</option>
				                          <option value="3 anos">3 anos</option>
				                          <option value="4 anos">4 anos</option>
				                          <option value="5 anos">5 anos</option>
				                          <option value="6 anos">6 anos</option>
				                          <option value="7 anos">7 anos</option>
					                    </select>
					                  </div>
					                </div>
					                <div class="form-group">
					                  <div class="select-style">
					                    <select class="form-control">
					                      <option>Cor</option>
				                          <option value="Branco">Branco</option>
				                          <option value="Preto">Preto</option>
				                          <option value="Amarelo">Amarelo</option>
				                          <option value="Cinza">Cinza</option>
					                    </select>
					                  </div>
					                </div>
                  					<div class="form-group" id="raca_cachorro">
					                    <fieldset class="fieldset-job_category">
					                      <div class="field select-style">
					                        <select name="animal_raca"  class="form-control" required>
					                          <option>Raça</option>
					                          <option value="Akita">Akita</option>
					                          <option value="Beagle">Beagle</option>
					                          <option value="Basset">Basset</option>
					                          <option value="Buldogue">Buldogue</option>
					                          <option value="Chihuahua">Chihuahua</option>
					                          <option value="Chow Chow">Chow Chow</option>
					                          <option value="Dálmata">Dálmata</option>
					                          <option value="Doberman">Doberman</option>
					                          <option value="Husky">Husky</option>
					                          <option value="Labrador">Labrador</option>
					                          <option value="Maltês">Maltês</option>
					                          <option value="Pastor Alemão">Pastor Alemão</option>
					                          <option value="Pug">Pug</option>
					                          <option value="ShihTzu">ShihTzu</option>
					                          <option value="YorkShire">YorkShire</option>
					                        </select>
					                      </div>
					                    </fieldset>
				                  </div>
				                  <div class="form-group" id="raca_gato" style="display: none;">
				                    <fieldset class="fieldset-job_category">
				                      <div class="field select-style">
				                        <select name="animal_raca"  class="form-control" required>
				                          <option>Raça</option>
				                          <option value="Angorá">Angorá</option>
				                          <option value="Himalaio">Himalaio</option>
				                          <option value="British Shorthair">British Shorthair</option>
				                          <option value="Maione Coon">Maione Coon</option>
				                          <option value="Persa">Persa</option>
				                          <option value="Ragdoll">Ragdoll</option>
				                          <option value="Siamês">Siamês</option>
				                          <option value="Sphynx">Sphynx</option>
				                        </select>
				                      </div>
				                    </fieldset>
				                  </div>						                
					                <button type="submit" class="btn btn-success btn-block">Buscar animais!</button>
					              </form>
							</div>


							<div class="widget_text widget widget__sidebar">
								<hr class="visible-sm visible-xs lg">
								<!-- Call to Action - alternative -->
								<div class="call-to-action centered">
									<div class="cta-txt">
										<h2>Precisa de um Veterinário?</h2>
										<p>Deixe isso com a equipe do Mais Pet.</p>
									</div>
									<div class="cta-btn">
										<a href="?pagina=contato" class="btn btn-success">Contato</a>
									</div>
								</div>
								<!-- Call to Action - alternative / End -->
							</div>

							<!-- Widget :: Tabbed -->
							<div class="tabbed-widget widget widget__sidebar">
								<h3 class="widget-title">Confira Outros Animais</h3>
								<div class="widget-content">
									<div class="tabs">
										<!-- Nav tabs -->
										<ul class="nav nav-tabs">
											<li class="active"><a href="#tab-1" data-toggle="tab">Gatos</a></li>
											<li><a href="#tab-2" data-toggle="tab">Cachorros</a></li>
										</ul>
										<!-- Tab panes -->
										<div class="tab-content">
											<div class="tab-pane fade in active" id="tab-1">
												<ul class="latest-posts-list">
												<?php foreach( $animal->findAllCustom("WHERE tipo = 'Gato' ") as $key => $valor) :  ?>
													<li>
														<figure class="thumbnail">
															<a href="#">
																<img src="uploads/animais/<?php echo utf8_encode($valor->fotoAnimal)?>" alt="<?php echo utf8_encode($valor->nomeAnimal)?>" width="50">
															</a>
														</figure>
														<h5 class="title"><a href="#"><?php echo utf8_encode($valor->nomeAnimal)?></a></h5>
														<small>
															<?php echo utf8_encode($valor->sexo) ?>, 
								                        	<?php echo utf8_encode($valor->data_nascimento) ?>
								                        </small>
													</li>		
												<?php endforeach ?>	
												</ul>
											</div>
											<div class="tab-pane fade" id="tab-2">
												<ul class="latest-posts-list">
												<?php foreach( $animal->findAllCustom("WHERE tipo = 'Cachorro' ") as $key => $valor) :  ?>
													<li>
														<figure class="thumbnail">
															<a href="#">
																<img src="uploads/animais/<?php echo utf8_encode($valor->fotoAnimal)?>" alt="<?php echo utf8_encode($valor->nomeAnimal)?>" width="50">
															</a>
														</figure>
														<h5 class="title"><a href="#"><?php echo utf8_encode($valor->nomeAnimal)?></a></h5>
														<small>
															<?php echo utf8_encode($valor->sexo) ?>, 
								                        	<?php echo utf8_encode($valor->data_nascimento) ?>
								                        </small>
													</li>		
												<?php endforeach ?>	
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- /Widget :: Tabbed -->
						</aside>