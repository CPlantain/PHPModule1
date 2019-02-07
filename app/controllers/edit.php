<?php

$db = require_once __DIR__ . '/../models/database/start.php';

$id = $_GET['id'];
$post = $db->getOne('posts', $id);

require_once __DIR__ . '/../views/edit.view.php';

?>