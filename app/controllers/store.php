<?php 

$db = require_once __DIR__ . '/../models/database/start.php';
require_once __DIR__ . '/../models/helpers/InputValidation.php';
require_once __DIR__ . '/../models/helpers/FileManager.php';

$image = $_FILES['picture'];
$file = new FileManager;

$validation = InputValidation::checkLength( [ 'title' => $_POST['title'] ] );


if($validation === true){

	if(checkImage($image['name'])) $picture = $file->upload($image, '/../../../uploads/');

	$db->create('posts', [
		'title'   => $_POST['title'],
		'picture' => $picture
	]);
	header('Location: /');	
} else {
	echo($validation);
}

?>