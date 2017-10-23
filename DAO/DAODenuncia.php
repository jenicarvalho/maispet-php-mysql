<?php
/**
 *	Project: Mais Pet
 *	Created: 12/10
 *	User: Jeniffer Carvalho
 * 	Usage: Dao de denuncia
 */

require_once 'DAO/DAO.php';

class DAODenuncia extends Dao {

	public $table = "denuncia";

	public function insert(){
		$sql  = "INSERT INTO $this->table (data, idDenunciador, idDenunciado, motivo, idAnimal) VALUES (:data, :idDenunciador, :idDenunciado, :motivo, :idAnimal)";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':data', $this->data);
		$stmt->bindParam(':idDenunciador', $this->idDenunciador);
		$stmt->bindParam(':idDenunciado', $this->idDenunciado);
		$stmt->bindParam(':motivo', $this->motivo);
		$stmt->bindParam(':idAnimal', $this->idAnimal);
		return $stmt->execute(); 
	 }

	public function update($id){
		$sql  = "UPDATE $this->table SET data = :data, idDenunciador = :idDenunciador, idDenunciado = :idDenunciado,  motivo = :motivo, idAnimal = :idAnimal WHERE id = :id";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':data', $this->data);
		$stmt->bindParam(':idDenunciador', $this->idDenunciador);
		$stmt->bindParam(':idDenunciado', $this->idDenunciado);
		$stmt->bindParam(':motivo', $this->motivo);
		$stmt->bindParam(':idAnimal', $this->idAnimal);
		return $stmt->execute();
	}


	//deleta o item
	public function delete($id) {
		$sql = "DELETE FROM $this->table WHERE id = :id";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		return $stmt->execute();
	}
}