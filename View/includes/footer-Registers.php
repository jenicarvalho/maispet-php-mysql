
      <!-- Footer -->
      <footer class="footer" id="footer">
        <div class="footer-widgets">
          <div class="container">
            <div class="row">
              <div class="col-sm-6 col-md-2">
                <!-- Widget :: Custom Menu -->
                <div class="widget_nav_menu widget widget__footer">
                  <h3 class="widget-title">Links</h3>
                  <div class="widget-content">
                    <ul>
                      <li><a href="?pagina=mantenedora">Mantenedora</a></li>
                      <li><a href="?pagina=profissionais">Profissionais</a></li>
                      <li><a href="?pagina=contato">Fale Conosco</a></li>
                    </ul>
                  </div>
                </div>
                <!-- /Widget :: Custom Menu -->
              </div>
              <div class="col-sm-6 col-md-2">
                <!-- Widget :: Categories -->
                <div class="widget_categories widget widget__footer">
                  <h3 class="widget-title">Animais</h3>
                  <div class="widget-content">
                    <ul>
                      <li><a href="#">Cachorros</a></li>
                      <li><a href="#">Gatos</a></li>
                    </ul>
                  </div>
                </div>
                <!-- /Widget :: Categories -->
              </div>

              <div class="clearfix visible-sm"></div>

              <div class="col-sm-6 col-md-4">
                <!-- Widget :: Latest Posts -->
                <div class="latest-posts-widget widget widget__footer">
                  <h3 class="widget-title">Contato</h3>
                  <div class="widget-content">
                    <ul class="latest-posts-list">
                      <li>
                        <span class="date">Rua Av Brasil, 600 - Centro - Paulínia / São Paulo - Brasil</span>
                        <h5 class="title"><a href="#">Telefone</a></h5>
                        <span class="date">(19) 3852-0098</span>
                        <h5 class="title"><a href="#">E-mail</a></h5>
                        <span class="date">contato@maispet.com.br</span>
                      </li>
                    </ul>
                  </div>
                </div>
                <!-- /Widget :: Latest Posts -->
              </div>
              <div class="col-sm-6 col-md-4">
                <!-- Widget :: Newsletter -->
                <div class="widget_newsletter widget widget__footer">
                  <h3 class="widget-title">Fique Informado</h3>
                  <div class="widget-content">
                    <p>Receba as novidades do mais pet deixando seu email cadastrado abaixo!</p>

                    <form action="php/newsletter-form.php" method="POST" id="newsletter-form">

                      <div class="alert alert-success hidden" id="newsletter-alert-success">
                        <strong>Success!</strong> Thank you for subscribing.
                      </div>
                      <div class="alert alert-danger hidden" id="newsletter-alert-error">
                        <strong>Error!</strong> Something went wrong.
                      </div>

                      <div class="row">
                        <div class="col-md-8">
                          <div class="form-group">
                            <input type="email" 
                              value=""
                              data-msg-required="Please enter email address."
                              data-msg-email="Please enter a valid email address."
                              class="form-control"
                              placeholder="Digite aqui seu email..."
                              name="subscribe-email"
                              id="subscribe-email">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <button type="submit" class="btn btn-success btn-block" data-loading-text="Loading...">Enviar</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
                <!-- /Widget :: Newsletter -->
              </div>
            </div>
          </div>
        </div>
        <div class="footer-copyright">
          <div class="container">
            <div class="row">
              <div class="col-sm-6 col-md-4">
                Copyright &copy; 2017  <a href="#">Mais Pet</a> &nbsp;| &nbsp;Todos os direitos reservados
              </div>
              <div class="col-sm-6 col-md-8">
                <div class="social-links-wrapper">
                  <span class="social-links-txt">Redes Sociais</span>
                  <ul class="social-links social-links__light">
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </footer>
      <!-- Footer / End -->
      
    </div>
    <!-- Main / End -->
  </div>


  
  
  <!-- Javascript Files
  ================================================== -->
  <script src="assets/vendor/jquery-1.11.0.min.js"></script>
  <script type="text/javascript" src="assets/vendor/bootstrap.min.js"></script>
  <script type="text/javascript" src="assets/vendor/jquery.mask.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      $('#campoData').mask('00/00/0000');
    })

   $(document).ready(function(){
      $('#cpf').mask('000.000.000-00');
    })

   $(document).ready(function(){
      $('#tel').mask('(00)0000-0000');
    })

   $(document).ready(function(){
      $('#cel').mask('(00)00000-0000');
    })
  </script>
  <script>
    function validarSenha() {
      var campo1 = document.getElementById('pass').value;
      var campo2 = document.getElementById('pass2').value;

      if (campo1 == campo2) {
        document.getElementById('resultado').style.color = "#00913d";
        document.getElementById('resultado').innerHTML = "As Senhas são iguais";
      } else {
        document.getElementById('resultado').style.color = "#ff0000";
        document.getElementById('resultado').innerHTML = "As senhas não correspondem";
      } 
    }
  </script>
  <script type="text/javascript" src="assets/vendor/bootstrap.min.js"></script>
  <script type="text/javascript" src="assets/vendor/bootstrap-notify.min.js"></script>
  <script src="assets/vendor/jquery.flexnav.min.js"></script>
  <script src="assets/vendor/jquery.hoverIntent.minified.js"></script>
  <script src="assets/vendor/jquery.flickrfeed.js"></script>
  <script src="assets/vendor/isotope/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/isotope/jquery.imagesloaded.min.js"></script>
  <script src="assets/vendor/magnific-popup/jquery.magnific-popup.js"></script>
  <script src="assets/vendor/owl-carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/jquery.fitvids.js"></script>
  <script src="assets/vendor/jquery.appear.js"></script>
  <script src="assets/vendor/jquery.stellar.min.js"></script>
  <script src="assets/vendor/flexslider/jquery.flexslider-min.js"></script>

  <!-- Newsletter Form -->
  <script src="assets/vendor/jquery.validate.js"></script>
  <script src="assets/js/newsletter.js"></script>

  <script src="assets/js/custom.js"></script>

  <script>
    jQuery(function($){
      $('body').addClass('loading');
    });
    
    $(window).load(function(){
      $('.flexslider').flexslider({
        animation: "fade",
        controlNav: true,
        directionNav: false,
        prevText: "",
        nextText: "",
        start: function(slider){
          $('body').removeClass('loading');
        }
      });
    });
  </script>

  <script>
  </script>

<?php 

  //Logout
  if (isset($_GET['logout']) == true) {
      unset($_SESSION['usuarioCliente']);
      header('Location: http://localhost/maispet/?pagina=login');
  }

?>
  
</body>
</html>