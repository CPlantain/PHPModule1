<?php

return [

	'database' => [
		'database' => 'marlin1',
		'username' => 'root',
		'password' => '',
		'connection' => 'mysql:host=localhost',
		'charset' => 'utf8',
		'options' => [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
	],

	'routes' => [
		'/'       => '/../../controllers/homepage.php',
		'/show'   => '/../../controllers/show.php',
		'/create' => '/../../controllers/create.php',
		'/store'  => '/../../controllers/store.php',
		'/edit'   => '/../../controllers/edit.php',
		'/update' => '/../../controllers/update.php',
		'/delete' => '/../../controllers/delete.php',
		'/about'  => '/../../controllers/about.php'
	],

	'error_404' => '/../../controllers/404.php'

];