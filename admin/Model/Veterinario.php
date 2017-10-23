<?php
/**
 *	Project: Mais Pet
 *	Created: 03/08
 *	User: Jeniffer Carvalho
 * 	Usage: cria classe com os dados dos veterinarios
 */

require_once 'DAO/DAOVeterinario.php';

class Veterinarios extends DAOVeterinario {

	public $table = "veterinario";
	public $nome;
	public $email;
	public $cpf;
	public $login;
	public $senha;

	public function setNome($nome){
		$this->nome = $nome;
	}

	public function getNome(){
		return $this->nome;
	}

	public function setEmail($email){
		$this->email = $email;
	}

	public function setCpf($cpf){
		$this->cpf = $cpf;
	}

	public function getCpf(){
		return $this->cpf;
	}

	public function setLogin($login){
		$this->login = $login;
	}

	public function getLogin(){
		return $this->login;
	}

	public function setSenha($senha){
		$this->senha = $senha;
	}

	public function getSenha(){
		return $this->senha;
	}

}