  <?php
/**
 *  Project: Mais Pet
 *  Created: 11/09
 *  User: Jeniffer Carvalho
 *  Usage: controller das denuncias
 */

require_once($caminhoUrl."/Model/Intervencao.php");

 $intervencao = new Intervencao();

if(isset($_POST['envia-intervencao']) && $_POST['envia-intervencao']) {


  $idProprietario = utf8_decode($_POST['idProprietario']);
  $idInteressado = utf8_decode($_POST['idInteressado']);
  $data = date('Y-m-d');
  $idAnimal = utf8_decode($_POST['idAnimal']);

	$intervencao->setData($data);
	$intervencao->setIdProprietario($idProprietario);
  $intervencao->setIdInteressado($idInteressado);
	$intervencao->setIdAnimal($idAnimal);

	if( $intervencao->insert() ) {
		return $successIntervencao = true;
	}
}

// deleta
if( isset($_GET['acao']) &&  $_GET['acao'] == 'deletar' ) :

  $id = (int)$_GET['id'];
  if( $intervencao->delete( $id )) {
    return $successDelete = true;
  }
endif;