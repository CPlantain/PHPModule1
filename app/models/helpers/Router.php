<?php

// класс маршрутизатор

class Router {
	private $routes;
	private $current_route;
	private $error_route;

	public function __construct(array $routes, string $error_route){
		$this->routes = $routes;
		$this->error_route = $error_route;
		$this->current_route = $_SERVER['REQUEST_URI'];

		// если в URI есть GET параметры, устанавливаем соответствующий маршрут
		$params = $this->checkGet();
		if ($params) $this->current_route = $this->setGetRoute($params);
	}

	// проверяет, есть ли в URI GET переменные
	private function checkGet(){
		$get_params = stripos($this->current_route, '?');

		return $get_params !== false ? $get_params : false;
	}

	// устанавливает маршрут для запроса с переменными
	private function setGetRoute($params){
		return substr($this->current_route, 0, $params);
	}

	// проверяет, есть ли текущий маршрут в списке доступных 
	private function checkRoute(){
		return array_key_exists($this->current_route, $this->routes);
	}

	// открывает нужный файл
	private function open($route){
		require_once __DIR__ . $route; 
		die;
	}

	// запускает маршрутизатор -> если маршрут существует - открыть его, если нет - показать ошибку
	public function run(){
		$this->checkRoute() ? $this->open($this->routes[$this->current_route]) : $this->open($this->error_route);
		
	}
}

?>