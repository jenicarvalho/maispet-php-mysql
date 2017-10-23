<?php
/**
 *  Project: Mais Pet
 *  Created: 14/09
 *  User: Jeniffer Carvalho
 *  Usage: Controller do login Cliente
 */

session_save_path("/tmp"); 

require_once "Model/Proprietarios.php";
$resultado = '';

$loginProprietario = new Proprietarios();

if( isset($_POST['fazerLogin']) ) {

    $user = isset($_POST['usuario']) ? $_POST['usuario'] : '';
    $pass = isset($_POST['senha']) ? $_POST['senha'] : '';

    if ( $user ) :
        $resultado = $loginProprietario->login($user, md5($pass));

    endif;

    if ( $resultado ) :
        $_SESSION['usuarioCliente'] = $resultado; 
    ?>
        <meta http-equiv="refresh" content="0; url=?pagina=painel_cliente">
    <?php    
    return $success = true;
    else :
      return $success = false;
    endif;
}


//Logout
if (isset($_GET['logout']) == true) {
    unset($_SESSION['usuarioCliente']);
}
