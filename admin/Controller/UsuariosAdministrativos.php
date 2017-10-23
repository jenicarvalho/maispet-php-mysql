  <?php
/**
 *  Project: Mais Pet
 *  Created: 18/08
 *  User: Jeniffer Carvalho
 *  Usage: cria classe com os dados dos usuarios admninistrativos
 */

  require_once "Model/UsuariosAdministrativos.php";

  $usuarioAdm = new UsuariosAdministrativos();

//cadastra
if( isset($_POST['cadastrar']) && $_POST['nome'] != ""):

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $cpf = $_POST['cpf'];
    $login = $_POST['login'];
    $senha = $_POST['senha'];

    $usuarioAdm->setNome($nome);
    $usuarioAdm->setEmail($email);
    $usuarioAdm->setCpf($cpf);
    $usuarioAdm->setLogin($login);
    $usuarioAdm->setSenha($senha);

    if( $usuarioAdm->insert() ) {
      return $success = true;
    }

endif;  

// atualiza
if(isset($_POST['atualizar'])):

  $nome = $_POST['nome'];
  $email = $_POST['email'];
  $cpf = $_POST['cpf'];
  $login = $_POST['login'];
  $senha = $_POST['senha'];

  $usuarioAdm->setNome($nome);
  $usuarioAdm->setEmail($email);
  $usuarioAdm->setCpf($cpf);
  $usuarioAdm->setLogin($login);
  $usuarioAdm->setSenha($senha);
  $id = (int)$_GET['id'];

  if($usuarioAdm->update($id)) {
      return $success = true;
  }

endif;

// deleta
if( isset($_GET['acao']) &&  $_GET['acao'] == 'deletar' ) :

  $id = (int)$_GET['id'];
  if( $usuarioAdm->delete( $id )) {
    return $successDelete = true;
  }
endif;

?>