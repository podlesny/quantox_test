<?php

require 'bootstrap.php';

require './src/Controllers/StudentController.php';

$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {
    $r->addRoute('GET', '/students', ['StudentController', 'getAll']);
	$r->addRoute('GET', '/students/{id:\d+}', ['StudentController', 'get']);
	$r->addRoute('POST', '/students', ['StudentController', 'create']);
});

$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:{
		echo json_encode(['error_code' => 404, 'message' => 'Not Found']);
	}
    break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:{
		echo json_encode(['error_code' => 405, 'message' => 'Method Not Allowed']);
	}
    break;
    case FastRoute\Dispatcher::FOUND:{
		$handler = $routeInfo[1];
		$params = $routeInfo[2];
		$handler($params);
	}
    break;
}