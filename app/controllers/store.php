<?php 

$db = require_once __DIR__ . '/../models/database/start.php';
require_once __DIR__ . '/../models/helpers/InputValidation.php';
require_once __DIR__ . '/../models/helpers/FileManager.php';

$image = $_FILES['picture'];
$file = new FileManager;
$form = new InputValidation($_POST);

// проверяем заполненность полей
$form->checkRequired();

if($form->isValid()){

	// если данные валидны и было загружено изображение, сохраняем его
	if(checkImage($image['name'])) $picture = $file->upload($image, '/../../../public/uploads/');

	// сохраняем пост в БД
	$db->create('posts', ['title' => $_POST['title'], 'picture' => $picture]);

	header('Location: /');	
} 
else {
	// если данные не валидны, показываем ошибку
	$form->showError();
}

?>