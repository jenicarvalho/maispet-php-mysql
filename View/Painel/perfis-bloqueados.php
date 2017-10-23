<?php
    $caminhoUrl = $_SERVER['DOCUMENT_ROOT']."/maispet";

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
                <h3>Perfis Bloqueados</h3>
              </div>
                <div class="job_listings">           

                <ul class="job_listings">
                  <li class="job_listing">
                    <a href="#">
                      <img src="assets/images/animais/mel.jpg" alt="" class="company_logo" width="70">
                      <div class="position">
                        <h3>Junior</h3>
                      </div>
                      <div class="location">
                          Dono do: Brutus 
                      </div>
                      <div class="location">
                          <p>Bloqueado em 10/09/2017 </p>
                      </div>
                      <div class="location">
                        Editar Bloqueio
                      </div>
                    </a>
                  </li>
                  <li class="job_listing">
                    <a href="#">
                      <img src="assets/images/animais/mel.jpg" alt="" class="company_logo" width="70">
                      <div class="position">
                        <h3>Junior</h3>
                      </div>
                      <div class="location">
                          Dono do: Brutus 
                      </div>
                      <div class="location">
                          <p>Bloqueado em 10/09/2017 </p>
                      </div>
                      <div class="location">
                        Editar Bloqueio
                      </div>
                    </a>
                  </li>
                  <li class="job_listing">
                    <a href="#">
                      <img src="assets/images/animais/mel.jpg" alt="" class="company_logo" width="70">
                      <div class="position">
                        <h3>Junior</h3>
                      </div>
                      <div class="location">
                          Dono do: Brutus 
                      </div>
                      <div class="location">
                          <p>Bloqueado em 10/09/2017 </p>
                      </div>
                      <div class="location">
                        Editar Bloqueio
                      </div>
                    </a>
                  </li>                  
                </ul>
              </div>

            </div>

            <?php  require_once($caminhoUrl."/View/includes/sidebar-painel.php"); ?>
          </div>

        </div>
      </section


 <?php  require_once($caminhoUrl."/View/includes/footer-Registers.php"); ?>