<?php
/**
 *	Project: Mais Pet
 *	Created: 01/09
 *	User: Taty Faveri
 * 	Usage: cria classe com os dados dos animais
 */

$caminhoUrl = $_SERVER['DOCUMENT_ROOT']."/maispet";

require_once($caminhoUrl."/DAO/DAOAnimais.php");

class Animais extends DAOAnimais {

	public $table = "animal";
	public $idproprietario;
	public $dtnascimento;
	public $raca;
	public $porte;
	public $sexo;
	public $cor;
	public $tipo;
	public $nomeAnimal;
	public $fotoAnimal;
	public $descricao;


	public function setIdProprietario($idproprietario){
		$this->idproprietario = $idproprietario;
	}

	public function getIdProprietario(){
		return $this->idproprietario;
	}

	public function dataNascimento($dtnascimento){
		$this->dtnascimento = $dtnascimento;
	}

	public function getdataNascimento(){
		return $this->dtnascimento;
	}

	public function setRaca($raca){
		$this->raca = $raca;
	}

	public function getRaca(){
		return $this->raca;
	}

	public function setPorte($porte){
		$this->porte = $porte;
	}

	public function getPorte(){
		return $this->porte;
	}

	public function setSexo($sexo){
		$this->sexo = $sexo;
	}

	public function getSexo(){
		return $this->sexo;
	}

	public function setCor($cor){
		$this->cor = $cor;
	}

	public function getCor(){
		return $this->cor;
	}

	public function setTipo($tipo){
		$this->tipo = $tipo;
	}

	public function getTipo(){
		return $this->tipo;
	}

	public function setNomeAnimal($nomeAnimal){
		$this->nomeAnimal = $nomeAnimal;
	}

	public function getNomeAnimal(){
		return $this->nomeAnimal;
	}

	public function setFotoAnimal($fotoAnimal){
		$this->fotoAnimal = $fotoAnimal;
	}

	public function getFotoAnimal(){
		return $this->fotoAnimal;
	}

	public function setDescricao($descricao){
		$this->descricao = $descricao;
	}

	public function getDescricao(){
		return $this->descricao;
	}
}
