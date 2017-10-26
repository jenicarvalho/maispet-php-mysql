  <?php
/**
 *  Project: Mais Pet
 *  Created: 11/09
 *  User: Jeniffer Carvalho
 *  Usage: controller dos animais
 */

require_once($caminhoUrl."/Model/Animais.php");

  $animal = new Animais();


//cadastra
if( isset($_POST['cadastra_animal']) && $_POST['animal_nome'] != ""):

$dir = "uploads/animais/";

$uploaddir = "$dir/";

if(is_dir("$dir")){

    if ( isset( $_FILES[ 'animal_foto' ][ 'name' ] ) && $_FILES[ 'animal_foto' ][ 'error' ] == 0) {        

      $arquivo_tmp = $_FILES[ 'animal_foto' ][ 'tmp_name' ];
      $nome_foto = $_FILES[ 'animal_foto' ][ 'name' ];
      $extensao = pathinfo ( $nome_foto, PATHINFO_EXTENSION );
      $extensao = strtolower ( $extensao );        

      if ( strstr ( '.jpg;.jpeg;.gif;.png', $extensao ) ) {
          $novoNome = uniqid ( time () ) . '.' . $extensao;     
          $destino = 'uploads/animais/ ' . $novoNome;
      }

      @copy($_FILES['animal_foto']['tmp_name'], $uploaddir . $novoNome);
      $arquivo_foto = $novoNome;
  }
}

    $animal_nome = utf8_decode($_POST['animal_nome']);
    $animal_tipo = utf8_decode($_POST['animal_tipo']);
    $animal_cor = utf8_decode($_POST['animal_cor']);
    $animal_idade = utf8_decode($_POST['animal_idade']);
    $animal_sexo = utf8_decode($_POST['animal_sexo']);
    $animal_porte = utf8_decode($_POST['animal_porte']);
    $animal_raca = utf8_decode($_POST['animal_raca']);
    $animal_descricao = utf8_decode($_POST['animal_descricao']);
    $animal_proprietario = utf8_decode($_POST['idProprietario']);

    $animal->setRaca($animal_raca);
    $animal->setPorte($animal_porte);
    $animal->setIdProprietario($animal_proprietario);
    $animal->setSexo($animal_sexo);
    $animal->dataNascimento($animal_idade);
    $animal->setCor($animal_cor);
    $animal->setTipo($animal_tipo);
    $animal->setNomeAnimal($animal_nome);
    $animal->setFotoAnimal($arquivo_foto);
    $animal->setDescricao($animal_descricao);

    if( $animal->insert() ) {
      return $success = true;
    }
endif;  



// atualiza
if(isset($_POST['atualizar'])):

    $caminhoUrl = $_SERVER['DOCUMENT_ROOT']."/maispet";

    $dir = $caminhoUrl . "/uploads/animais/";

    $uploaddir = "$dir/";

    if(is_dir("$dir")){

        if ( isset( $_FILES[ 'animal_foto' ][ 'name' ] ) && $_FILES[ 'animal_foto' ][ 'error' ] == 0) {        

          $arquivo_tmp = $_FILES[ 'animal_foto' ][ 'tmp_name' ];
          $nome_foto = $_FILES[ 'animal_foto' ][ 'name' ];
          $extensao = pathinfo ( $nome_foto, PATHINFO_EXTENSION );
          $extensao = strtolower ( $extensao );        
          
          if ( strstr ( '.jpg;.jpeg;.gif;.png', $extensao ) ) {
              $novoNome = uniqid ( time () ) . '.' . $extensao;     
              $destino = 'uploads/animais/ ' . $novoNome;
          }

          @copy($_FILES['animal_foto']['tmp_name'], $uploaddir . $novoNome);
          $arquivo_foto = $novoNome;
      }
    }

    $radiofoto = utf8_decode($_POST['foto_radio']);

    if($radiofoto == 'nao') {
       $arquivo_foto = utf8_decode($_POST['fotoAntiga']);
    }

    $animal_nome = utf8_decode($_POST['animal_nome']);
    $animal_tipo = utf8_decode($_POST['animal_tipo']);
    $animal_cor = utf8_decode($_POST['animal_cor']);
    $animal_idade = utf8_decode($_POST['animal_idade']);
    $animal_sexo = utf8_decode($_POST['animal_sexo']);
    $animal_porte = utf8_decode($_POST['animal_porte']);
    $animal_raca = utf8_decode($_POST['animal_raca']);
    $animal_descricao = utf8_decode($_POST['animal_descricao']);
    $animal_proprietario = utf8_decode($_POST['idProprietario']);

    $animal->setIdProprietario($animal_proprietario);
    $animal->setRaca($animal_raca);
    $animal->setPorte($animal_porte);
    $animal->setSexo($animal_sexo);
    $animal->dataNascimento($animal_idade);
    $animal->setCor($animal_cor);
    $animal->setTipo($animal_tipo);
    $animal->setNomeAnimal($animal_nome);
    $animal->setFotoAnimal($arquivo_foto);
    $animal->setDescricao($animal_descricao);
  
    $id = (int)$_GET['cod'];

    if($animal->update($id)) {
        return $success = true;
    }

endif;

// deleta
if( isset($_GET['acao']) &&  $_GET['acao'] == 'deletar' ) :

  $id = (int)$_GET['cod'];
  if( $animal->deleteAnimal( $id )) {
    return $successDelete = true;
  }
endif;

  //busca 
  if(isset($_POST['animal-busca']) && $_POST['animal-busca'] != ""  ) :

    $animal_tipo = utf8_decode($_POST['animal_tipo']);
    $animal_idade = utf8_decode($_POST['animal_idade']);
    $animal_sexo = utf8_decode($_POST['animal_sexo']);
    $animal_cor = utf8_decode($_POST['animal_cor']);

    if ($animal->buscaHome($animal_tipo, $animal_idade, $animal_sexo , $animal_cor)) {
      return $objAnimalBusca = $animal->buscaHome($animal_tipo, $animal_idade, $animal_sexo, $animal_cor);
    }
  endif;

?>