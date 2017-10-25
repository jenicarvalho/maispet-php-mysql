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

      <!-- Slider -->
      <section class="slider-holder">
        <div class="container">
          <div class="flexslider carousel">
            <ul class="slides">
              <li>
                <img src="assets/images/samples/slide1.jpg" alt="" />
              </li>
              <li>
                <img src="assets/images/samples/slide2.jpg" alt="" />
              </li>
              <li>
                <img src="assets/images/samples/slide3.jpg" alt="" />
              </li>
            </ul>

            <div class="search-box">
              <h2>Busque aqui o animal</h2>
              <form action="?pagina=buscar-animal" method="post" role="form">
                <div class="form-group">
                  <div class="select-style">
                    <select name="animal_tipo" id="tipo-animal" class="form-control" required>
                      <option>Animal</option>
                      <option value="Cachorro">Cachorro</option>
                      <option value="Gato">Gato</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <div class="select-style">
                    <select name="animal_sexo" id="job_type" class="form-control" required>
                      <option value="Fêmea">Fêmea</option>
                      <option value="Macho">Macho</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <div class="select-style">
                    <select name="animal_idade" id="job_type" class="form-control" required>
                      <option value="1 ano">Idade</option>
                      <option value="1 ano">1 ano</option>
                      <option value="2-anos">2 anos</option>
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
                      <select name="animal_cor" id="animal_cor" class="form-control" required>
                        <option value="Branco">Cor</option>
                        <option value="Branco">Branco</option>
                        <option value="Preto">Preto</option>
                        <option value="Amarelo">Amarelo</option>
                        <option value="Cinza">Cinza</option>
                      </select>
                  </div>
                </div>
                <input type="hidden" name="animal-busca" value="true">
                <button type="submit" class="btn btn-success btn-block">Buscar animais!</button>
              </form>
            </div>
          </div>
        </div>
      </section>
      <!-- Slider / End -->

      <!-- Page Content -->
      <section class="page-content" style="padding-bottom: 0">
        <div class="container">

          <!-- Light Section -->
          <section class="section-light section-nomargin">
            <div class="row">
              <div class="col-md-12">
                <h2 class="with-subtitle" data-animation="fadeInUp" data-animation-delay="0">Últimos Animais <small data-animation="fadeInUp" data-animation-delay="100">Confira os animais que recém chegaram!</small></h2>
                <div class="row">
                        <?php foreach( $animal->findAllCustom("ORDER BY idAnimal DESC LIMIT 8") as $key => $valor) : ?>

                        <?php $nomeProprietario = $proprietario->find(utf8_encode($valor->idProprietario))?>

                        <div class="col-xs-12 col-sm-3 col-md-3" data-animation="fadeInLeft" data-animation-delay="0">
                          <div class="job-listing-box">
                            <figure class="job-listing-img">
                              <a href="?pagina=interna-anuncio&CodAnimal=<?php echo utf8_encode($valor->idAnimal)?>" style="background-image: url('uploads/animais/<?php echo utf8_encode($valor->fotoAnimal) ?>')" class="img-animal"></a>
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
            </div>
          </section>
          <!-- Light Section / End -->

          <!-- Section -->
          <section class="section section-nomargin">
            <div class="row">
              <div class="col-md-6 col-md-push-6" data-animation="fadeInRight" data-animation-delay="0">
                <div class="img-box">
                  <img src="assets/images/samples/img2.png" alt="">
                </div>
              </div>
              <div class="col-md-6 col-md-pull-6">
                <h2>Para quem quer o melhor para o seu animal</h2>
                <div class="icon-box circled icon-box-animated" data-animation="fadeInRight" data-animation-delay="0">
                  <div class="icon">
                    <i class="entypo search"></i>
                  </div>
                  <div class="icon-box-body">
                    <h4>Busque por animais</h4>
                    Encontre animais com as caracteristicas que você precisar, com facilidade, segurança e se desejar faça o acompanhamento com um profissional.
                  </div>
                </div>

                <div class="icon-box circled icon-box-animated" data-animation="fadeInRight" data-animation-delay="200">
                  <div class="icon">
                    <i class="entypo vcard"></i>
                  </div>
                  <div class="icon-box-body">
                    <h4>Entre em contato com o dono</h4>
                    Escolha entre as centenas de animais cadastrados e fale diretamente com o dono sem intermediários!
                  </div>
                </div>

                <div class="icon-box circled icon-box-animated" data-animation="fadeInRight" data-animation-delay="400">
                  <div class="icon">
                    <i class="entypo star"></i>
                  </div>
                  <div class="icon-box-body">
                    <h4>Veterinários Disponíveis</h4>
                    <p>O Mais Pet conta com diversos vererinários dispostos a te ajudar nesse processo tão delicado, basta pedir que nós faremos a intervenção no cruzamento do seu Pet.</p>
                  </div>
                </div>

                <a href="?pagina=signup" class="btn btn-primary">Faça seu cadastro <i class="fa fa-arrow-circle-o-right fa-lg fa-right"></i></a>

              </div>
            </div>

          </section>
          <!-- Section / End -->


          <!-- Light Section -->
          <section class="section-light section-nomargin">
            <div class="title-bordered" data-animation="fadeInUp" data-animation-delay="0">
              <h2>Porque usar a <small>Mais Pet</small></h2>
            </div>
            <div class="row">
              <div class="col-md-3" data-animation="fadeInDown" data-animation-delay="0">
                <div class="icon-box filled centered lg circled icon-box-animated-inverse">
                  <div class="icon">
                    <i class="entypo chat"></i>
                  </div>
                  <div class="icon-box-body">
                    <h3>Centenas de Animais</h3>
                    <p>Contamos com uma ampla rede de contatos ativa.</p>
                  </div>
                </div>
              </div>
              <div class="col-md-3" data-animation="fadeInDown" data-animation-delay="200">
                <div class="icon-box filled centered lg circled icon-box-animated-inverse">
                  <div class="icon">
                    <i class="entypo heart"></i>
                  </div>
                  <div class="icon-box-body">
                    <h3>Nós Amamos Pets</h3>
                    <p>Construimos o mais pet visando dar o maior conforto e facilidade aos donos de animais.</p>
                  </div>
                </div>
              </div>
              <div class="col-md-3" data-animation="fadeInDown" data-animation-delay="400">
                <div class="icon-box filled centered lg circled icon-box-animated-inverse">
                  <div class="icon">
                    <i class="entypo light-bulb"></i>
                  </div>
                  <div class="icon-box-body">
                    <h3>Profissionais</h3>
                    <p>Desenvolvido por médicos veterinários dispostos a te ajudar.</p>
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="icon-box filled centered lg circled icon-box-animated-inverse" data-animation="fadeInDown" data-animation-delay="600">
                  <div class="icon">
                    <i class="entypo thumbs-up"></i>
                  </div>
                  <div class="icon-box-body">
                    <h3>Segurança</h3>
                    <p>Todos os usuários cadastrados tem seus dados verificados.</p>
                  </div>
                </div>
              </div>
            </div>
          </section>

        </div>
      </section>
      <!-- Page Content / End -->

  


<?php
   require_once($caminhoUrl."/View/includes/footer-Registers.php");
?>
    