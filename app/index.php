<?php

require_once __DIR__ . '/models/helpers/functions.php';

$routes = [
	"/"       => '/controllers/homepage.php',
	"/show"   => '/controllers/show.php',
	"/create" => '/controllers/create.php',
	"/store"  => '/controllers/store.php',
	"/edit"   => '/controllers/edit.php',
	"/update" => '/controllers/update.php',
	"/delete" => '/controllers/delete.php',
	"/about"  => '/controllers/about.php'
];

$route = $_SERVER['REQUEST_URI'];
$get_param = stripos($route, '?');

if($get_param !== false){
	$route = substr($route, 0, $get_param);
}

if(array_key_exists($route, $routes)) {
	require_once __DIR__ . $routes[$route]; 
	die;
} else {
	require_once __DIR__ . '/controllers/404.php'; 
}
?>
