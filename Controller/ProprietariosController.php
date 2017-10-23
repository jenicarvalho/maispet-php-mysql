  <?php
/**
 *  Project: Mais Pet
 *  Created: 11/09
 *  User: Jeniffer Carvalho
 *  Usage: controller dos proprietarios
 */

  require_once($caminhoUrl."/Model/Proprietarios.php");

  $proprietario = new Proprietarios();

  require_once($caminhoUrl."/Model/Animais.php");

  $animais = new Animais();

//cadastra
if( isset($_POST['cadastrar']) && $_POST['nome'] != ""):

    $nome = utf8_decode($_POST['nome']);
    $senha = utf8_decode($_POST['pass']);
    $email = utf8_decode($_POST['email']);
    $nascimento = utf8_decode($_POST['birthdayDate']);
    $sexo = utf8_decode($_POST['sex']);
    $endereco = utf8_decode($_POST['street']);
    $bairro = utf8_decode($_POST['neighborhood']);
    $cidade = utf8_decode($_POST['city']);
    $estado = utf8_decode($_POST['state']);
    $celular = utf8_decode($_POST['phone']);
    $telefone = utf8_decode($_POST['phoneHouse']);
    $cpf = utf8_decode($_POST['document']);
    $data = date('Y-m-d');

    $proprietario->setNome($nome);
    $proprietario->setEmail($email);
    $proprietario->setSenha($senha);
    $proprietario->setCpf($cpf);
    $proprietario->setDataNascimento($nascimento);
    $proprietario->setSexo($sexo);
    $proprietario->setEndereco($endereco);
    $proprietario->setBairro($bairro);
    $proprietario->setCidade($cidade);
    $proprietario->setEstado($estado);
    $proprietario->setCelular($celular);
    $proprietario->setTelefone($telefone);
    $proprietario->setDataCadastro($data);

    if( $proprietario->insert() ) {
      return $success = true;
    }
endif;  

// atualiza
if(isset($_POST['atualizar'])):

  $nome = utf8_decode($_POST['nome']);
  $senha = utf8_decode($_POST['pass']);
  $email = utf8_decode($_POST['email']);
  $nascimento = utf8_decode($_POST['birthdayDate']);
  $sexo = utf8_decode($_POST['sex']);
  $endereco = utf8_decode($_POST['street']);
  $bairro = utf8_decode($_POST['neighborhood']);
  $cidade = utf8_decode($_POST['city']);
  $estado = utf8_decode($_POST['state']);
  $celular = utf8_decode($_POST['phone']);
  $telefone = utf8_decode($_POST['phoneHouse']);
  $cpf = utf8_decode($_POST['document']);

  $proprietario->setNome($nome);
  $proprietario->setEmail($email);
  $proprietario->setSenha($senha);
  $proprietario->setCpf($cpf);
  $proprietario->setDataNascimento($nascimento);
  $proprietario->setSexo($sexo);
  $proprietario->setEndereco($endereco);
  $proprietario->setBairro($bairro);
  $proprietario->setCidade($cidade);
  $proprietario->setEstado($estado);
  $proprietario->setCelular($celular);
  $proprietario->setTelefone($telefone);

  $id = (int)$_POST['usuario_id'];

  if($proprietario->update($id)) {
      return $success = true;
  }

endif;

// deleta
if( isset($_GET['acao']) &&  $_GET['acao'] == 'deletar' ) :

  $id = (int)$_GET['id'];

  //deleta animais
  $connect = mysqli_connect("localhost", "root", "", "maispet");
  $query = "DELETE FROM animal WHERE idProprietario = '$id' ";
  $result = mysql_query($connect, $query);

  echo $query;

  echo $result;

  if( $proprietario->delete( $id )) {
    return $successDelete = true;
  }
endif;



?>