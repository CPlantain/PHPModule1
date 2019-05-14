<?php

// класс для работы с файлами

class FileManager {

	private function generateFilename($file_type){
		return uniqid() . '.' . substr($file_type, strlen('image/'));
	}

	public function upload($file, $file_path){

		$type = $file['type'];
		$tmp_name = $file['tmp_name'];

		$file_name = $this->generateFilename($type);
		$path = __DIR__ . $file_path;
		$destination = $path . $file_name;

		move_uploaded_file($tmp_name, $destination);
		
		return $file_name;
	}

	public static function delete($file_name, $file_path){

		$path = __DIR__ . $file_path;
		$destination = $path . $file_name;

		if (file_exists($destination)){
			unlink($destination);
		}
	}
}
