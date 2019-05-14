<?php

$db = require_once __DIR__ . '/../models/database/start.php';

$param = [ 'id' => $_GET['id'] ];
$post = $db->getOne('posts', $param);

require_once __DIR__ . '/../views/show.view.php';

?>

