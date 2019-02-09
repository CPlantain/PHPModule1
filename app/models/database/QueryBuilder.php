<?php

class QueryBuilder {

	protected $pdo;

	public function __construct($pdo){
		$this->pdo = $pdo;
	}

	public function getAll($table){

		try{
			$sql = "SELECT * FROM {$table}";
			$statement = $this->pdo->prepare($sql);
			$statement->execute();

			return $statement->fetchAll(PDO::FETCH_ASSOC);

		}catch(PDOException $e){
			die("Query error");
		}
	}

	public function getOne($table, $id){

		try{
			$sql = "SELECT * FROM {$table} WHERE id=:id";
			$statement = $this->pdo->prepare($sql);
			$statement->execute([
				'id' => $id
			]);

			return $statement->fetch(PDO::FETCH_ASSOC);

		}catch(PDOException $e){
			die("Query error");
		}
	}

	public function create($table, $data){

		try{
			$keys = implode(',', array_keys($data));
			$tags = ':' . implode(', :', array_keys($data));

			$sql = "INSERT INTO {$table} ({$keys}) values ({$tags})";
			$statement = $this->pdo->prepare($sql);
			$statement->execute($data);

		}catch(PDOException $e){
			die("Query error");
		}
	}

	public function update($table, $data, $id){

		try{

			$keys = array_keys($data);

			$string = '';
			foreach ($keys as $key) {
				$string .= $key . '=:' . $key . ',';
			}

			$keys = rtrim($string, ',');

			$data['id'] = $id;

			$sql = "UPDATE {$table} SET {$keys} WHERE id=:id";
			$statement = $this->pdo->prepare($sql);
			$statement->execute($data);

		}catch(PDOException $e){
			die("Query error");
		}
	}

	public function delete($table, $id){
		try{
			$sql = "DELETE FROM {$table} WHERE id=:id";
			$statement = $this->pdo->prepare($sql);
			$statement->execute([
				'id' => $id
			]);

		}catch(PDOException $e){
			die("Query error");
		}
	}
}

