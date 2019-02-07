<?php

require_once __DIR__ . '/../models/helpers/functions.php';
$db = require_once __DIR__ . '/../models/database/start.php';
require_once __DIR__ . '/../models/helpers/InputValidation.php';
require_once __DIR__ . '/../models/helpers/FileManager.php';

$image = $_FILES['picture'];
$file = new FileManager;

$validation = InputValidation::checkLength( [ 'title' => $_POST['title'] ] );


if($validation === true) {

	if(checkImage($image['name'])){

		$post = $db->getOne('posts', $_GET['id']);
		
		if(checkImage($post['picture'])){
			$file->delete($post['picture'], '/../../../uploads/');
		}		

		$picture = $file->upload($image, '/../../../uploads/');
	}

	$db->update('posts', [ 'title' => $_POST['title'], 'picture' => $picture ], $_GET['id']);

	header('Location: /');
} else {
	echo ($validation);
}

?>