<?php

require_once __DIR__ . '/../models/helpers/functions.php';
$db = require_once __DIR__ . '/../models/database/start.php';
require_once __DIR__ . '/../models/helpers/InputValidation.php';
require_once __DIR__ . '/../models/helpers/FileManager.php';

$image = $_FILES['picture'];
$file = new FileManager;
$form = new InputValidation($_POST);

// проверяем заполненность полей
$form->checkRequired();

if($form->isValid()) {

	if(checkImage($image['name'])){

		// если форма валидна и было загружено изображение, достаём из БД пост
		$post = $db->getOne('posts', [ 'id' => $_GET['id'] ]);
		
		// если у поста есть старая картинка, удаляем её
		if(checkImage($post['picture'])) $file->delete($post['picture'], '/../../../public/uploads/');	
		
		// и сохраняем новую
		$picture = $file->upload($image, '/../../../public/uploads/');
	}

	// обновляем запись
	$db->update('posts', [ 'title' => $_POST['title'], 'picture' => $picture ], [ 'id' => $_GET['id'] ]);

	header('Location: /');
} else {
	// если были ошибки, показываем их
	$form->showError();
}

?>