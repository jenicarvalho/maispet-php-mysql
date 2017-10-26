<?php
/**
 *	Project: Mais Pet
 *	Created: 21/10
 *	User: Jeniffer Carvalho
 * 	Usage: Dao de veterinario que extende dao
 */

$caminhoUrlAdm = $_SERVER['DOCUMENT_ROOT']."/maispet/admin";
require_once($caminhoUrlAdm."/DAO/DAO.php");
  

class DAOVeterinario extends Dao {

	public $table = "veterinario";

	public function insert(){
		$sql  = "INSERT INTO $this->table (nome, cpf, email) VALUES (:nome, :cpf, :email)";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':nome', $this->nome);
		$stmt->bindParam(':cpf', $this->cpf);
		$stmt->bindParam(':email', $this->email);
		return $stmt->execute(); 
	 }

	public function update($id){
		$sql  = "UPDATE $this->table SET nome = :nome,  email = :email, cpf = :cpf WHERE id = :id";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':nome', $this->nome);
		$stmt->bindParam(':cpf', $this->cpf);
		$stmt->bindParam(':email', $this->email);
		$stmt->bindParam(':id', $id);
		return $stmt->execute();
	}
}