<?php
/**
 *	Project: Mais Pet
 *	Created: 22/10
 *	User: Jeniffer Carvalho
 * 	Usage: Dao de intervencao
 */

require_once 'DAO/DAO.php';

class DAOIntervencao extends Dao {

	public $table = "intervencao";

	public function insert(){
		$sql  = "INSERT INTO $this->table (idProprietario, idInteressado, idAnimal, data) VALUES (:idProprietario , :idInteressado, :idAnimal, :data)";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':idProprietario', $this->idProprietario);
		$stmt->bindParam(':idInteressado', $this->idInteressado);
		$stmt->bindParam(':idAnimal', $this->idAnimal);
		$stmt->bindParam(':data', $this->data);
		return $stmt->execute(); 
	 }

	public function update($id){
		$sql  = "UPDATE $this->table SET idProprietario = :idProprietario, idInteressado = :idInteressado, idAnimal = :idAnimal,  data = :data WHERE id = :id";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':idProprietario', $this->idProprietario);
		$stmt->bindParam(':idInteressado', $this->idInteressado);
		$stmt->bindParam(':idAnimal', $this->idAnimal);
		$stmt->bindParam(':data', $this->data);
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