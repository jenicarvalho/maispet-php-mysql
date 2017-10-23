<?php
/**
 *	Project: Mais Pet
 *	Created: 12/10
 *	User: Jeniffer Carvalho
 * 	Usage: classe das denuncias
 */

$caminhoUrl = $_SERVER['DOCUMENT_ROOT']."/maispet";

require_once($caminhoUrl."/DAO/DAODenuncia.php");

class Denuncias extends DAODenuncia {

	public $table = "denuncia";
	public $data;
	public $idDenunciador;
	public $idDenunciado;
	public $motivo;
		
	public function setData($data){
		$this->data = $data;
	}

	public function getData(){
		return $this->data;
	}
		
	public function setIdDenunciador($idDenunciador){
		$this->idDenunciador = $idDenunciador;
	}

	public function getIdDenunciador(){
		return $this->idDenunciador;
	}	

	public function setIdDenunciado($idDenunciado){
		$this->idDenunciado = $idDenunciado;
	}

	public function getIdDenunciado(){
		return $this->idDenunciado;
	}	

	public function setMotivo($motivo){
		$this->motivo = $motivo;
	}

	public function getMotivo(){
		return $this->motivo;
	}

	public function setIdAnimal($idAnimal){
		$this->idAnimal = $idAnimal;
	}

	public function getIdAnimal(){
		return $this->idAnimal;
	}
}