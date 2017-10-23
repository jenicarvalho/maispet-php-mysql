<?php
/**
 *	Project: Mais Pet
 *	Created: 12/10
 *	User: Jeniffer Carvalho
 * 	Usage: classe das denuncias
 */

$caminhoUrl = $_SERVER['DOCUMENT_ROOT']."/maispet";

require_once($caminhoUrl."/DAO/DAOIntervencao.php");

class Intervencao extends DAOIntervencao {

	public $table = "intervencao";
	public $data;
	public $idProprietario;
	public $idInteressado;
	public $idAnimal;
		
		
	public function setIdProprietario($idProprietario){
		$this->idProprietario = $idProprietario;
	}

	public function getIdProprietario(){
		return $this->idProprietario;
	}	

	public function setIdInteressado($idInteressado){
		$this->idInteressado = $idInteressado;
	}

	public function getIdInteressado(){
		return $this->idInteressado;
	}	

	public function setIdAnimal($idAnimal){
		$this->idAnimal = $idAnimal;
	}

	public function getIdIAnimal(){
		return $this->idAnimal;
	}	
	
	public function setData($data){
		$this->data = $data;
	}

	public function getData(){
		return $this->data;
	}
}