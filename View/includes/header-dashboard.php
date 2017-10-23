<!DOCTYPE html>
<html class="not-ie no-js" lang="pt-br">
<head>
  <meta charset="utf-8">
  <title>.: Painel :. Mais Pet </title>
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

<?php

$caminhoUrl = $_SERVER['DOCUMENT_ROOT']."/maispet";

// id do cliente 
$idcliente = $_SESSION['usuarioCliente']->id;

// CLasse com os dados do cliente armazenada em um objeto
require_once($caminhoUrl."/Model/Proprietarios.php");

$proprietario = new Proprietarios();

$resultado = $proprietario->find($idcliente);

?>

  <div class="site-wrapper">

    <!-- Header -->
    <header class="header header-menu-fullw">

      <div class="header-main">
        <div class="container">
          <!-- Logo -->
          <div class="logo">
            <a href="?pagina=painel_cliente"><img src="assets/images/logo.png" alt="Mais Pet"></a>
          </div>
          <!-- Logo / End -->

          <button type="button" class="navbar-toggle">
              <i class="fa fa-bars"></i>
            </button>
            <!-- Banner -->
            <div class="head-info usuario-info">
              <ul class="head-info-list">
                <li><span>Bem vindo(a)</span> <?php echo utf8_encode($resultado->nome) ?>!</li>
                <li class="pull-right"><a href="?pagina=index">Voltar ao site</a></li>
              </ul>
            </div>
            <!-- Banner / End -->
        </div>
      </div>
      
      <!-- Navigation -->
      <nav class="nav-main dashboard">
        <div class="container">
          <ul data-breakpoint="992" class="flexnav">
            <li><a href="?pagina=painel_cliente">Início</a></li>
            <li><a href="?pagina=painel_perfil">Meu Perfil</a></li>
            <li><a href="?pagina=painel_anuncios">Meus Anúncios</a></li>
            <li><a href="?pagina=painel_comentarios">Comentários</a></li>
            <li><a href="?pagina=index">Voltar ao Site</a></li>
            <li class="destaque"><a href="?pagina=novo_anuncio">Anunciar novo animal</a></li>
          </ul>
        </div>
      </nav>      
    </header>