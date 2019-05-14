<?php

class Connection {
	public static function make(array $config){
		try{
			return new PDO("{$config['connection']};dbname={$config['database']};charset={$config['charset']};", 
				$config['username'], 
				$config['password'],
				$config['options']
			);

		}catch(PDOException $e){
			die("Can not connect to the database");
		}
	}
}