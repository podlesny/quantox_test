<?php

require_once 'bootstrap.php';

require_once 'constants.php';

$routes = [
	['GET', '/students[/]', ['StudentController', 'getAll']],
	['GET', '/students/{id:\d+}', ['StudentController', 'get']],
	['POST', '/students[/]', ['StudentController', 'create']]
];

$router = new Router($routes);
$router->dispatch();