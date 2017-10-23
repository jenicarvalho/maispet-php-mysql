  <?php
/**
 *  Project: Mais Pet
 *  Created: 12/10
 *  User: Jeniffer Carvalho
 *  Usage: controller dos comentarios
 */


require_once($caminhoUrl."/Model/Comentarios.php");

  $comentario = new Comentarios();

  if(isset($_POST['envia-depoimento']) && $_POST['envia-depoimento'] != "") {

  	$texto = utf8_decode($_POST['depoimento-texto']);
  	$idAnimal = utf8_decode($_POST['idAnimal']);
  	$idProprietario = utf8_decode($_POST['idProprietario']);
  	$data = date('Y-m-d');
    $status = 0;

  	$comentario->setData($data);
  	$comentario->setIdAnimal($idAnimal);
  	$comentario->setIdProprietario($idProprietario);
    $comentario->setDepoimento($texto);
  	$comentario->setStatus($status);

  	if( $comentario->insert() ) {
      return $successDepoimento = true;
    }
 }

  //aceita depoimento
  if(isset($_POST['comentario-status'])) {

    $idComentario = (int)$_POST['idComentario'];
    
    if($_POST['aceitar'] == 'sim') :

      $status = 1;
      $comentario->setStatus($status);
      if($comentario->updateStatus($idComentario)) { return $aceitaDepoimento = true; }

    endif;

    if($_POST['aceitar'] == 'nao') :
      if($comentario->delete($idComentario)) { return $excluiDepoimento = true; }
    endif;

  }
