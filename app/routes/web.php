<?php

use App\Controllers\HomeController;
use App\Controllers\AuthController;
use App\Controllers\DashboardController;
use App\Controllers\SettingController;
use Illuminate\Routing\Router;

/** @var Router $router */

### Api routes
$router->post('/login', [AuthController::class, 'login']);

### Font view routes
$router->get('/', [HomeController::class, 'index']);
$router->get('/login', [AuthController::class, 'showLogin']);
$router->get('/logout', [AuthController::class, 'logout']);
$router->get('/home', [HomeController::class, 'index']);



$router->get('/dashboard', [DashboardController::class, 'dashboardController']);
$router->get('/setting', [SettingController::class, 'setting']);
