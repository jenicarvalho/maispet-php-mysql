  <?php
/**
 *  Project: Mais Pet
 *  Created: 18/08
 *  User: Jeniffer Carvalho
 *  Usage: cria classe com os dados dos usuarios admninistrativos
 */

$caminhoUrlAdm = $_SERVER['DOCUMENT_ROOT']."/maispet/admin";

require_once($caminhoUrlAdm."/Model/UsuariosAdministrativos.php");

$usuarioAdm = new UsuariosAdministrativos();

require_once($caminhoUrlAdm."/Model/Veterinario.php");

require_once($caminhoUrlAdm."/Model/Funcionario.php");

require_once($caminhoUrlAdm."/Model/Administrador.php");

//cadastra
if( isset($_POST['cadastrarADM']) && $_POST['nome'] != ""):

    //zera todas os niveis
    $idFuncionario = $idVeterinario =  $idAdministrador = '';

    //verifica nivel selecionado e atribui 1
    if($_POST['nivel'] == 'funcionario') {
        $idFuncionario = 1;
        $usuarioSelecionado = new Funcionarios();
    }

    if($_POST['nivel'] == 'veterinario') {
        $idVeterinario = 1;
        $usuarioSelecionado = new Veterinarios();
    }

    if($_POST['nivel'] == 'administrador') {
        $idAdministrador = 1;
        $usuarioSelecionado = new Administradores();
    }

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $cpf = $_POST['cpf'];
    $login = $_POST['login'];
    $senha = $_POST['senha'];
    
    $usuarioSelecionado->setNome($nome);
    $usuarioSelecionado->setCpf($cpf);
    $usuarioSelecionado->setEmail($email);

    
    if( $usuarioSelecionado->insert() ) {
        $dadosUser = $usuarioSelecionado->findAllCustom("ORDER BY id DESC limit 1");
        $idLogin = $dadosUser[0]->id;

        $usuarioAdm->setLogin($login);
        $usuarioAdm->setSenha($senha);
        $usuarioAdm->setIdFuncionario($idFuncionario);
        $usuarioAdm->setIdVeterinario($idVeterinario);
        $usuarioAdm->setIdAdministrador($idAdministrador);    
        $usuarioAdm->setIdLogin($idLogin);    
            
        $usuarioAdm->insert();
        return $success = true;
    }

    // if( $usuarioSelecionado->insert() ) {
    //   return $success = true;
    // }

endif;  

// atualiza
if(isset($_POST['atualizar'])):
    //zera todas os niveis
    $idFuncionario = $idVeterinario =  $idAdministrador = '';

    //verifica nivel selecionado e atribui 1
    if($_POST['nivel'] == 'funcionario') {
        $idFuncionario = 1;
        $usuarioSelecionado = new Funcionarios();
    }

    if($_POST['nivel'] == 'veterinario') {
        $idVeterinario = 1;
        $usuarioSelecionado = new Veterinarios();
    }

    if($_POST['nivel'] == 'administrador') {
        $idAdministrador = 1;
        $usuarioSelecionado = new Administradores();
    }

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $cpf = $_POST['cpf'];
    $login = $_POST['login'];
    $senha = $_POST['senha'];
    $idLogin = (int)$_POST['idLogin'];
    
    $usuarioSelecionado->setNome($nome);
    $usuarioSelecionado->setCpf($cpf);
    $usuarioSelecionado->setEmail($email);

    $usuarioAdm->setLogin($login);
    $usuarioAdm->setSenha($senha);

    $id = (int)$_POST['id'];

    if($usuarioSelecionado->update($idLogin)) {
        $usuarioAdm->update($id);
        return $success2 = true;
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