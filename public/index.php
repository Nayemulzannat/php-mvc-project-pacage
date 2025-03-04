<?php

require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../config/blade.php';
require_once '../vendor/autoload.php';


use Illuminate\Http\Request;
use Illuminate\Routing\Router;
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;

// Create a Router instance
$events = new Dispatcher();
$container = new Container();
$router = new Router($events, $container);

// Load routes from routes/web.php
require_once __DIR__ . '/../app/routes/web.php';

// Handle the request
$request = Request::capture();
$response = $router->dispatch($request);

// Send the response
$response->send();
