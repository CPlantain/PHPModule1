<?php

require_once __DIR__ . '/../app/models/helpers/functions.php';
require_once __DIR__ . '/../app/models/helpers/Router.php';
$config = require __DIR__ . '/../app/config.php';


$router = new Router($config['routes'], $config['error_404']);

$router->run();

?>
