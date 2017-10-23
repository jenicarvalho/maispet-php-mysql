  <?php
/**
 *  Project: Mais Pet
 *  Created: 11/09
 *  User: Jeniffer Carvalho
 *  Usage: controller das denuncias
 */

require_once($caminhoUrl."/Model/Denuncias.php");

 $denuncia = new Denuncias();

if(isset($_POST['denunciar-anuncio']) && $_POST['denunciar-anuncio']) {


  $idDenunciado = utf8_decode($_POST['idDenunciado']);
  $idDenunciador = utf8_decode($_POST['idDenunciador']);
  $data = date('Y-m-d');
  $motivo = utf8_decode($_POST['motivo-denuncia']);
  $idAnimal = utf8_decode($_POST['idAnimal']);

	$denuncia->setData($data);
	$denuncia->setIdDenunciado($idDenunciado);
  	$denuncia->setIdDenunciador($idDenunciador);
	$denuncia->setMotivo($motivo);
	$denuncia->setIdAnimal($idAnimal);

	if( $denuncia->insert() ) {
		return $successDenuncia = true;
	}
}

// deleta
if( isset($_GET['acao']) &&  $_GET['acao'] == 'deletar' ) :

  $id = (int)$_GET['id'];
  if( $denuncia->delete( $id )) {
    return $successDelete = true;
  }
endif;