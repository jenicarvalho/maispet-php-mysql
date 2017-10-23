<?php
  if (isset($_GET['logout']) == true) {
      unset($_SESSION['usuarioCliente']);
  }
?>
<!DOCTYPE html>
<html class="not-ie no-js" lang="pt-br">
<head>
  <meta charset="utf-8">
  <title>Mais Pet</title>
  <meta name="description" content="Mais Pet">
  <meta name="author" content="Jeniffer Carvalho">
  <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0">
  
  <!-- Google Web Fonts
  ================================================== -->
  <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic|Bitter:700' rel='stylesheet' type='text/css'>
  
  <!-- CSS
  ================================================== -->
  <!-- Base + Vendors CSS -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/fonts/font-awesome/css/font-awesome.css">
  <link rel="stylesheet" href="assets/css/fonts/entypo/css/entypo.css">
  <link rel="stylesheet" href="assets/vendor/owl-carousel/owl.carousel.css" media="screen">
  <link rel="stylesheet" href="assets/vendor/owl-carousel/owl.theme.css" media="screen">
  <link rel="stylesheet" href="assets/vendor/magnific-popup/magnific-popup.css" media="screen">
  <link rel="stylesheet" href="assets/vendor/flexslider/flexslider.css" media="screen">

  <!-- Theme CSS-->
  <link rel="stylesheet" href="assets/css/theme.css">
  <link rel="stylesheet" href="assets/css/theme-elements.css">
  <link rel="stylesheet" href="assets/css/animate.min.css">
  <link rel="stylesheet" href="assets/css/custom.css">
  <!-- Head Libs -->
  <script src="assets/vendor/modernizr.js"></script>

  <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <script src="assets/vendor/respond.min.js"></script>
  <![endif]-->

  <!--[if IE]>
    <link rel="stylesheet" href="assets/css/ie.css">
  <![endif]-->
  
  <!-- Favicons
  ================================================== -->
  <link rel="shortcut icon" href="assets/images/favicon.ico">
  <link rel="apple-touch-icon" href="assets/images/apple-touch-icon.png">
  <link rel="apple-touch-icon" sizes="72x72" href="assets/images/apple-touch-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="114x114" href="assets/images/apple-touch-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="144x144" href="assets/images/apple-touch-icon-144x144.png">
  
</head>
<body>

  <div class="site-wrapper">

    <!-- Header -->
    <header class="header header-menu-fullw">

      <!-- Header Top Bar -->
      <div class="header-top">
        <div class="container">
          <div class="header-top-left">
            <button class="btn btn-sm btn-default menu-link menu-link__secondary">
              <i class="fa fa-list"></i>
            </button>
            <div class="menu-container">
              <ul class="header-top-nav header-top-nav__secondary">
                <li>O MELHOR LUGAR PARA O SEU MELHOR AMIGO</li>
              </ul>
            </div>
          </div>
          <div class="header-top-right">
            <button class="btn btn-sm btn-default menu-link menu-link__tertiary">
              <i class="fa fa-user"></i>
            </button>
            <div class="menu-container">
              <ul class="header-top-nav header-top-nav__tertiary">
                <li><a href="?pagina=signup"><i class="fa-pencil-square-o fa"></i> Crie sua conta</a></li>
                <?php if ( isset($_SESSION['usuarioCliente']) ) : ?>
                <li><a href="?pagina=painel_cliente"><i class="fa-sign-in fa"></i> Minha conta</a></li>
              <?php else :  ?>
                <li><a href="?pagina=login"><i class="fa-lock fa"></i> Faça login</a></li>
              <?php endif ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <!-- Header Top Bar / End -->

      <div class="header-main">
        <div class="container">
          <!-- Logo -->
          <div class="logo">
            <a href="?pagina=index"><img src="assets/images/logo.png" alt="Mais Pet"></a>
            <!-- <h1><a href="index.html"><span>Pet</span>Sitter</a></h1>
            <p class="tagline">Find an Awesome PetSitter</p> -->
          </div>
          <!-- Logo / End -->

          <button type="button" class="navbar-toggle">
              <i class="fa fa-bars"></i>
            </button>

            <!-- Banner -->
            <div class="head-info">
              <ul class="head-info-list">
                <li><span>Ligue para:</span> (19) 3852-0098</li>
                <li><span>Email:</span> <a href="mailto:contato@maispet.com.br">contato@maispet.com.br</a></li>
              </ul>
              <ul class="social-links">
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a href="#"><i class="fa fa-facebook"></i></a></li>
              <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
              <li><a href="#"><i class="fa fa-instagram"></i></a></li>
            </ul>
            </div>
            <!-- Banner / End -->
        </div>
      </div>
      
      <!-- Navigation -->
      <nav class="nav-main">
        <div class="container">
          <ul data-breakpoint="992" class="flexnav">
            <li><a href="?pagina=index">Início</a></li>
            <li><a href="?pagina=lista-animais">Ver todos os animais</a></li>
            <li><a href="?pagina=profissionais">Profissionais</a></li>
            <li><a href="?pagina=mantenedora">Mantenedora</a></li>
            <li><a href="?pagina=contato">Entre em Contato</a></li>
            <?php if ( isset($_SESSION['usuarioCliente']) ) : ?>
              <li class="destaque"><a href="?pagina=novo_anuncio">Anunciar novo animal</a></li>
            <?php endif ?>
          </ul>
        </div>
      </nav>      
    </header>