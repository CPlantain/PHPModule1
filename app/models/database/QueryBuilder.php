<?php

class QueryBuilder {

	protected $pdo;

	public function __construct(PDO $pdo){
		$this->pdo = $pdo;
	}

	private function combineParams($params){
		$keys = array_keys($params);

		$string = '';
		foreach ($keys as $key) {
			$string .= $key . '=:' . $key . ' AND ';
		}
		return rtrim($string, ' AND ');
	}

	public function getAll($table){
		$sql = "SELECT * FROM {$table}";
		$statement = $this->pdo->prepare($sql);
		$statement->execute($params);
		return $statement->fetchAll(PDO::FETCH_ASSOC);
	}

	public function getOne($table, $params){
		$keys = $this->combineParams($params);

		$sql = "SELECT * FROM {$table} WHERE ({$keys})";
		$statement = $this->pdo->prepare($sql);
		$statement->execute($params);
		return $statement->fetch(PDO::FETCH_ASSOC);
	}

	public function create($table, $data){
		$keys = implode(', ', array_keys($data));
		$tags = ':' . implode(', :', array_keys($data));

		$sql = "INSERT INTO {$table} ({$keys}) values ({$tags})";
		$statement = $this->pdo->prepare($sql);
		$statement->execute($data);
	}

	public function update($table, $data, $params){
		$data_keys = array_keys($data);

		$string = '';
		foreach ($data_keys as $key) {
			$string .= $key . '=:' . $key . ',';
		}

		$data_keys = rtrim($string, ',');
		$param_keys = $this->combineParams($params);
		$keys = array_merge($data, $params);

		$sql = "UPDATE {$table} SET {$data_keys} WHERE {$param_keys}";
		$statement = $this->pdo->prepare($sql);
		$statement->execute($keys);
	}

	public function delete($table, $params){
		$keys = $this->combineParams($params);

		$sql = "DELETE FROM {$table} WHERE ({$keys})";
		$statement = $this->pdo->prepare($sql);
		$statement->execute($params);
	}
}

