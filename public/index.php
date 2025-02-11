<?php

require_once __DIR__ . '/../config/config.php';
require_once '../vendor/autoload.php';



use App\Core\Router;

$router = new Router();

$router->add('', 'HomeController', 'index');
$router->add('home', 'HomeController', 'index');
$router->add('login', 'AuthController', 'login');
$router->add('logout', 'AuthController', 'logout');
$router->add('dashboard', 'DashboardController', 'dashboardController');
$router->add('setting', 'SettingController', 'setting');

## Dispatch the route
$queryString = $_SERVER['REQUEST_URI'] ?? '';
// var_dump($queryString);
$path = parse_url($queryString, PHP_URL_PATH);
$router->dispatch($path);
