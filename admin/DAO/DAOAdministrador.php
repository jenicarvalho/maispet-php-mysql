<?php
/**
 *	Project: Mais Pet
 *	Created: 21/10
 *	User: Jeniffer Carvalho
 * 	Usage: Dao de administrador que extende dao
 */

$caminhoUrlAdm = $_SERVER['DOCUMENT_ROOT']."/maispet/admin";
require_once($caminhoUrlAdm."/DAO/DAO.php");

class DAOAdministrador extends Dao {

	public $table = "administrador";

	public function insert(){
		$sql  = "INSERT INTO $this->table (nome, email, cpf, login, senha) VALUES (:nome, :email, :cpf, :login, :senha)";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':nome', $this->nome);
		$stmt->bindParam(':email', $this->email);
		$stmt->bindParam(':cpf', $this->cpf);
		$stmt->bindParam(':login', $this->login);
		$stmt->bindParam(':senha', $this->senha);
		return $stmt->execute(); 
	 }

	public function update($id){
		$sql  = "UPDATE $this->table SET nome = :nome,  email = :email, cpf = :cpf, login = :login, senha = :senha WHERE id = :id";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':nome', $this->nome);
		$stmt->bindParam(':email', $this->email);
		$stmt->bindParam(':cpf', $this->cpf);
		$stmt->bindParam(':login', $this->login);
		$stmt->bindParam(':senha', $this->senha);
		$stmt->bindParam(':id', $id);
		return $stmt->execute();
	}


	public function login($login, $pass) {
		$sql = "SELECT * FROM $this->table WHERE login = :login and senha = :senha ";
		
		try {
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':login', $login, PDO::PARAM_STR);
			$stmt->bindParam(':senha', $pass, PDO::PARAM_STR);
			$stmt->execute();

		} catch (PDOException $e) {
			echo $e->getMessage();
		}

		return $stmt->fetch(PDO::FETCH_OBJ);
	}
}