<?php
/**
 *	Project: Mais Pet
 *	Created: 12/10
 *	User: Jeniffer Carvalho
 * 	Usage: classe dos depoimentos
 */

require_once 'DAO/DAOComentarios.php';

class Comentarios extends DAOComentarios {
	
	public $table = "comentario";
	public $data;
	public $idAnimal;
	public $idProprietario;
	public $depoimento;
	public $status;

	public function setData($data){
		$this->data = $data;
	}

	public function getData(){
		return $this->data;
	}

	public function setIdAnimal($idAnimal){
		$this->idAnimal = $idAnimal;
	}

	public function getIdAnimal(){
		return $this->idAnimal;
	}

	public function setDepoimento($depoimento){
		$this->depoimento = $depoimento;
	}

	public function getDepoimento(){
		return $this->depoimento;
	}

	public function setIdProprietario($idProprietario){
		$this->idProprietario = $idProprietario;
	}

	public function getIdProprietario(){
		return $this->idProprietario;
	}

	public function setStatus($status){
		$this->status = $status;
	}

	public function getStatus(){
		return $this->status;
	}

}