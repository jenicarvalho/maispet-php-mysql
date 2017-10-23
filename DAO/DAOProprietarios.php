<?php
/**
 *	Project: Mais Pet
 *	Created: 18/08
 *	User: Jeniffer Carvalho
 * 	Usage: Dao de proprietarios que extende dao
 */

require_once 'DAO/DAO.php';

class DAOProprietarios extends Dao {

	public $table = "proprietario";

	public function insert(){
		$sql  = "INSERT INTO $this->table (nome, email, cpf, endereco, senha, data_nascimento, sexo, bairro, cidade, estado, celular, telefone, data_cadastro) VALUES (:nome, :email, :cpf, :endereco, :senha, :data_nascimento, :sexo, :bairro, :cidade, :estado, :celular, :telefone, :data_cadastro)";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':nome', $this->nome);
		$stmt->bindParam(':email', $this->email);
		$stmt->bindParam(':cpf', $this->cpf);
		$stmt->bindParam(':endereco', $this->endereco);
		$stmt->bindParam(':senha', $this->senha);
		$stmt->bindParam(':data_nascimento', $this->data_nascimento);
		$stmt->bindParam(':sexo', $this->sexo);
		$stmt->bindParam(':bairro', $this->bairro);
		$stmt->bindParam(':cidade', $this->cidade);
		$stmt->bindParam(':estado', $this->estado);
		$stmt->bindParam(':celular', $this->celular);
		$stmt->bindParam(':telefone', $this->telefone);
		$stmt->bindParam(':data_cadastro', $this->data);
		return $stmt->execute(); 
	 }

	public function update($id){
		$sql  = "UPDATE $this->table SET nome = :nome,  email = :email, cpf = :cpf,  endereco = :endereco, senha = :senha, data_nascimento = :data_nascimento, sexo = :sexo, bairro = :bairro, cidade = :cidade, estado = :estado, celular = :celular, telefone = :telefone WHERE id = :id";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':nome', $this->nome);
		$stmt->bindParam(':email', $this->email);
		$stmt->bindParam(':cpf', $this->cpf);
		$stmt->bindParam(':endereco', $this->endereco);
		$stmt->bindParam(':senha', $this->senha);
		$stmt->bindParam(':data_nascimento', $this->data_nascimento);
		$stmt->bindParam(':sexo', $this->sexo);
		$stmt->bindParam(':bairro', $this->bairro);
		$stmt->bindParam(':cidade', $this->cidade);
		$stmt->bindParam(':estado', $this->estado);
		$stmt->bindParam(':celular', $this->celular);
		$stmt->bindParam(':telefone', $this->telefone);
		$stmt->bindParam(':id', $id);
		return $stmt->execute();
	}

	public function login($email, $pass) {
		$sql = "SELECT * FROM $this->table WHERE email = :email and senha = :senha ";
		
		try {
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':email', $email, PDO::PARAM_STR);
			$stmt->bindParam(':senha', $pass, PDO::PARAM_STR);
			$stmt->execute();

		} catch (PDOException $e) {
			echo $e->getMessage();
		}

		return $stmt->fetch(PDO::FETCH_OBJ);
	}
}