<?php

    $caminhoUrl = $_SERVER['DOCUMENT_ROOT']."/maispet";

    //variaveis de controle
    $success = false;
    $successDelete = false; 

    //includes
    require_once($caminhoUrl."/View/includes/header-dashboard.php");
    require_once($caminhoUrl."/Controller/AnimaisController.php");
    require_once($caminhoUrl."/Model/Animais.php");

    $animal = new Animais();
    $idAnimal = (int)$_GET['cod'];  
    $resultadoAnimal = $animal->findAnimal($idAnimal);

?>

    <!-- Main -->
    <div class="main" role="main">

      <section class="page-content">
        <div class="container">
          
          <div class="row">
            <div class="content col-md-8 col-md-8 col-md-offset-1 col-md-push-3">
              <?php if($success == true) : ?>

                  <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
                    <strong>Anúncio Alterado!</strong>
                  </div>

              <?php endif; ?>

              <?php if($successDelete == true) : ?>

                <div class="alert alert-danger alert-dismissable">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
                  <strong>Sucesso!</strong> Animal deletado e anúncio retirado da base.
                  <br> Você será direcionado...
                  <meta http-equiv="refresh" content="4; url=?pagina=painel_anuncios">
                </div>

              <?php else : ?>            
                
              <form method="post" id="submit-job-form" class="job-manager-form" enctype="multipart/form-data">
                
                <h3>Edite o anúncio do animal abaixo</h3>
                
                <!-- Job Information Fields -->
                <fieldset class="fieldset-job_title">
                  <label for="job_title">Nome do animal</label>
                  <div class="field">
                    <input type="text" class="form-control" name="animal_nome" id="job_title" placeholder="" value="<?php echo utf8_encode($resultadoAnimal->nomeAnimal);?>" required/>
                  </div>
                </fieldset>

                <div class="row">
                  <div class="col-md-6">
                    <fieldset class="fieldset-job_type">
                      <label for="job_type">Tipo</label>
                      <div class="field select-style">
                        <select name="animal_tipo" id="job_type" class="form-control" required>                     
                          <option value="<?php echo utf8_encode($resultadoAnimal->tipo);?>" selected="selected"><?php echo utf8_encode($resultadoAnimal->tipo);?></option>
                        </select>
                      </div>
                    </fieldset>
                  </div>
                  <div class="col-md-6">
                    <fieldset class="fieldset-job_category">
                      <label for="job_category">Cor</label>
                      <div class="field select-style">
                        <select name="animal_cor" id="animal_cor" class="form-control" required>
                          <option value="<?php echo utf8_encode($resultadoAnimal->cor);?>" selected><?php echo utf8_encode($resultadoAnimal->cor);?></option>
                          <option value="Branco">Branco</option>
                          <option value="Preto">Preto</option>
                          <option value="Amarelo">Amarelo</option>
                          <option value="Cinza">Cinza</option>
                        </select>
                      </div>
                    </fieldset>
                  </div>
                </div>                
                <div class="row">
                  <div class="col-md-6">
                    <fieldset class="fieldset-job_type">
                      <label for="job_type">Sexo</label>
                      <div class="field select-style">
                        <select name="animal_sexo" id="job_type" class="form-control" required>
                          <option value="<?php echo utf8_encode($resultadoAnimal->sexo);?>" selected><?php echo utf8_encode($resultadoAnimal->sexo);?></option>
                          <option value="Fêmea">Fêmea</option>
                          <option value="Macho">Macho</option>
                        </select>
                      </div>
                    </fieldset>
                  </div>
                  <div class="col-md-6">
                    <fieldset class="fieldset-job_category">
                      <label for="job_category">Porte</label>
                      <div class="field select-style">
                        <select name="animal_porte" id="animal_porte" class="form-control" required>
                          <option value="<?php echo utf8_encode($resultadoAnimal->porte);?>" selected><?php echo utf8_encode($resultadoAnimal->porte);?></option>
                          <option value="Médio">Médio</option>
                          <option value="Grande">Grande</option>
                          <option value="Pequeno">Pequeno</option>
                        </select>
                      </div>
                    </fieldset>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <fieldset class="fieldset-job_type">
                      <label for="job_type">Idade</label>
                      <div class="field select-style">
                        <select name="animal_idade" id="job_type" class="form-control" required>
                          <option value="<?php echo utf8_encode($resultadoAnimal->data_nascimento);?>" selected><?php echo utf8_encode($resultadoAnimal->data_nascimento);?></option>
                          <option value="1 ano">1 ano</option>
                          <option value="2 anos">2 anos</option>
                          <option value="3 anos">3 anos</option>
                          <option value="4 anos">4 anos</option>
                          <option value="5 anos">5 anos</option>
                          <option value="6 anos">6 anos</option>
                          <option value="7 anos">7 anos</option>
                        </select>
                      </div>
                    </fieldset>
                  </div>
                  <?php if(utf8_encode($resultadoAnimal->tipo) == "Cachorro") :?>
                  <div class="col-md-6" id="raca_cachorro">
                    <fieldset class="fieldset-job_category">
                      <label for="job_category">Raça</label>
                      <div class="field select-style">
                        <select name="animal_raca"  class="form-control" required>
                          <option value="<?php echo utf8_encode($resultadoAnimal->raca);?>" selected><?php echo utf8_encode($resultadoAnimal->raca);?></option>
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
                  <?php else: ?>
                  <div class="col-md-6" id="raca_gato">
                    <fieldset class="fieldset-job_category">
                      <label for="job_category">Raça</label>
                      <div class="field select-style">
                        <select name="animal_raca"  class="form-control" required>    <option value="<?php echo utf8_encode($resultadoAnimal->raca);?>" selected><?php echo utf8_encode($resultadoAnimal->raca);?></option>
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
                  <?php endif; ?>
                </div>

                <fieldset class="fieldset-company_logo">
                  <label for="company_logo">Foto do animal</label>

                  <img src="<?php echo 'uploads/animais/' . utf8_encode($resultadoAnimal->fotoAnimal) ?>" alt="" class="company_logo foto-animal" width="70">
                  <div class="field">
                    <div for=""> Deseja alterar a imagem do animal?</div> 
                    Sim <input type="radio" name="foto_radio" value="sim" id="radio-sim" />
                    Não <input type="radio" name="foto_radio" value="nao" id="radio-nao" checked/>
                  </div>
                  <div class="field" id="input-sim" style="display: none" >
                    <input type="file" class="form-control" name="animal_foto" />
                    <small class="description">Tamanho máximo: 2 MB. Tipo: jpg.</small>
                  </div>
                </fieldset>

                <fieldset class="fieldset-job_description">
                  <label>Descrição</label>
                  <div class="field">
                    <textarea cols="30" rows="8" class="form-control" name="animal_descricao"><?php echo utf8_encode($resultadoAnimal->descricao);?></textarea>
                  </div>
                </fieldset>

                <div class="spacer"></div>
                <input type="hidden" name="fotoAntiga" value="<?php echo utf8_encode($resultadoAnimal->fotoAnimal)?>">
                <input type="hidden" name="idProprietario" value="<?php echo $resultado->id?>">

                <p>
                  <input type="submit" name="atualizar" class="btn btn-primary" value="Atualizar Animal &rarr;" />
                  <a href="?pagina=editar_anuncio&acao=deletar&cod=<?php echo utf8_encode($resultadoAnimal->idAnimal)?>"  class="btn btn-danger pull-right">Deletar Animal</a>
                </p>

              </form>

              <?php endif; ?>

            </div>

            <?php  require_once($caminhoUrl."/View/includes/sidebar-painel.php"); ?>
          </div>

        </div>
      </section>

 <?php  require_once($caminhoUrl."/View/includes/footer-Registers.php"); ?>

		