<?php

namespace App\Core;

class Router
{
    protected $routes = []; // ✅ Works in PHP 7.3

    public function add(string $route, string $controller, string $action): void
    {
        $this->routes[$route] = ['controller' => $controller, 'action' => $action];
    }

    public function dispatch(string $url): void
    {
        $url = trim($url, '/');
        if (empty($url)) {
            $this->loadDefaultRoute();
            return;
        }

        if (isset($this->routes[$url])) {
            $controllerName = "App\\Controllers\\" . $this->routes[$url]['controller'];
            $action = $this->routes[$url]['action'];

            if (class_exists($controllerName)) {
                $controller = new $controllerName();

                if (method_exists($controller, $action)) {
                    $controller->$action(); // Call the action
                } else {
                    $this->handleError("Action '$action' not found in controller '$controllerName'.");
                }
            } else {
                $this->handleError("Controller class '$controllerName' not found.");
            }
        } else {
            $this->handleError("404 - Page not found.");
        }
    }

    private function loadDefaultRoute(): void
    {
        $this->dispatch('login');
    }

    private function handleError(string $message): void
    {
        echo $message;
    }
}
