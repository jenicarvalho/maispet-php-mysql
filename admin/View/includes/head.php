<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Sistema de procriação de animais">
        <meta name="author" content="Jeniffer Carvalho">
        <!-- App Favicon -->
        <link rel="shortcut icon" href="../assets/images/favicon.ico">
        <link rel="apple-touch-icon" href="../assets/images/apple-touch-icon.png">
        <link rel="apple-touch-icon" sizes="72x72" href="../assets/images/apple-touch-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="114x114" href="a../ssets/images/apple-touch-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="144x144" href="../assets/images/apple-touch-icon-144x144.png">
        <!-- App title -->
        <title>:: Área Administrativa :: Acesso Restrito</title>

        <link href="View/assets/plugins/summernote/dist/summernote.css" rel="stylesheet" /><!-- Custom box css -->
        <link href="View/assets/plugins/custombox/dist/custombox.min.css" rel="stylesheet">
        <!-- App CSS -->
        <link href="View/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="View/assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="View/assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="View/assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="View/assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="View/assets/css/menu.css" rel="stylesheet" type="text/css" />
        <link href="View/assets/css/responsive.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        <script src="View/assets/js/modernizr.min.js"></script>

    </head>
<body class="fixed-left">
<?php

    function configuraData($data) {

        $data_nova = explode('-', $data);

        $dia = $data_nova[2];
        $mes = $data_nova[1];
        $ano = $data_nova[0];

        return $dia .'/'. $mes .'/'. $ano;
         
    }

?>