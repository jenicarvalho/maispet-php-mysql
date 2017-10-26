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

if(isset($_POST['novaSenha'])) {

    $emailProprietario = $_POST['usuario'];

    $headers = "Content-type: text/html; charset=iso-8859-1\r\n";

    $dadosProprietario = $loginProprietario->findAllCustom("WHERE email = '$emailProprietario' "); 

    $senha = $dadosProprietario->id . $dadosProprietario->senha;

    $msg = "Clique no link para resetar sua senha: <br> <a href='http://jenicarvalho.com.br/maispet/?pagina=resetarSenha&hash=$senha '>resetar minha senha</a>.";

    $assunto = '=?UTF-8?B?'.base64_encode('Recuperação de senha').'?=';

    $message = '';
    $email = mail('jeniffer@agenciapixels.com', $assunto, $msg, $headers) ;

    if($email) {
        $envioEmail = true;
    }
}

//Logout
if (isset($_GET['logout']) == true) {
?>
    <?php unset($_SESSION['usuarioCliente']) ?>
    <script>
      window.location.href = "?pagina=index";
    </script>

<?php  
  }
?>