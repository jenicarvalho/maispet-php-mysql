<?php
/**
 *	Project: Mais Pet
 *	Created: 18/08
 *	User: Jeniffer Carvalho
 * 	Usage: Dao de usuarios adm que extende dao
 */

  $caminhoUrlAdm = $_SERVER['DOCUMENT_ROOT']."/maispet/admin";
  require_once($caminhoUrlAdm."/DAO/DAO.php");
  
class DAOUsuariosAdministrativos extends Dao {

	public $table = "usuario";

	public function insert(){
		$sql  = "INSERT INTO $this->table (login, senha, idFuncionario, idVeterinario, idAdministrador, idLogin) VALUES (:login, :senha, :idFuncionario, :idVeterinario, :idAdministrador, :idLogin)";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':login', $this->login);
		$stmt->bindParam(':senha', $this->senha);
		$stmt->bindParam(':idFuncionario', $this->idFuncionario);
		$stmt->bindParam(':idVeterinario', $this->idVeterinario);
		$stmt->bindParam(':idAdministrador', $this->idAdministrador);
		$stmt->bindParam(':idLogin', $this->idLogin);
		return $stmt->execute(); 
	 }

	public function update($id){
		$sql  = "UPDATE $this->table SET login = :login, senha = :senha, idFuncionario = :idFuncionario,  idVeterinario = :idVeterinario, idAdministrador = :idAdministrador, idLogin = :idLogin  WHERE id = :id";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':login', $this->login);
		$stmt->bindParam(':senha', $this->senha);
		$stmt->bindParam(':idFuncionario', $this->idFuncionario);
		$stmt->bindParam(':idVeterinario', $this->idVeterinario);
		$stmt->bindParam(':idAdministrador', $this->idAdministrador);
		$stmt->bindParam(':idLogin', $this->idLogin);
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