<?php

require_once __DIR__ . '/../models/helpers/functions.php';
$db = require_once __DIR__ . '/../models/database/start.php';
require_once __DIR__ . '/../models/helpers/FileManager.php';

$file = new FileManager;

$id = $_GET['id'];
$post = $db->getOne('posts', $id);

if(checkImage($post['picture'])){
	$file->delete($post['picture'], '/../../../uploads/');
}	

$db->delete('posts', $id);

header('Location: /');

?>