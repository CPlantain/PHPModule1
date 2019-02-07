<?php

$db = require_once __DIR__ . '/../models/database/start.php';

$posts = $db->getAll('posts');

require_once __DIR__ . '/../views/homepage.view.php';

?>