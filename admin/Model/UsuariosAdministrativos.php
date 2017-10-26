<?php
/**
 *	Project: Mais Pet
 *	Created: 03/08
 *	User: Jeniffer Carvalho
 * 	Usage: cria classe com os dados dos usuarios admninistrativos
 */

require_once 'DAO/DAOUsuariosAdministrativos.php';

class UsuariosAdministrativos extends DAOUsuariosAdministrativos {

	public $table = "usuario";
	public $nome;
	public $email;
	public $cpf;
	public $login;
	public $senha;


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

	public function setIdFuncionario($idFuncionario) {
		$this->idFuncionario = $idFuncionario;
	}

	public function getIdFuncionario() {		
		return $this->idFuncionario;
	}

	public function setIdVeterinario($idVeterinario) {
		$this->idVeterinario = $idVeterinario;
	}

	public function getIdVeterinario() {		
		return $this->idVeterinario;
	}

	public function setIdAdministrador($idAdministrador) {
		$this->idAdministrador = $idAdministrador;
	}

	public function getIdAdministrador() {		
		return $this->idAdministrador;
	}

	public function setIdLogin($idLogin) {
		$this->idLogin = $idLogin;
	}

	public function getIdLogin() {		
		return $this->idLogin;
	}
}