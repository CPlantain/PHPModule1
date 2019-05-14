<?php

require_once __DIR__ . '/../models/helpers/functions.php';
$db = require_once __DIR__ . '/../models/database/start.php';
require_once __DIR__ . '/../models/helpers/FileManager.php';

$param = [ 'id' => $_GET['id'] ];

// получаем из БД пост, чтобы узнать, есть ли у него изображение
$post = $db->getOne('posts', $param);
$file = new FileManager;

// если оно есть, удаляем файл с сервера
if(checkImage($post['picture'])) $file->delete($post['picture'], '/../../../public/uploads/');

// удаляем сам пост
$db->delete('posts', $param);

header('Location: /');

?>