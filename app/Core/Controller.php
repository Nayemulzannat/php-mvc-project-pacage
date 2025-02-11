<?php

namespace App\Core;

class Controller
{
    protected function render(string $view, array $data = []): void
    {
        $view;
        extract($data);
        // session_start();

        if (!isset($_SESSION['user'])) {
            require_once "../app/Views/auth/$view.php";
            exit;
        }
        // require_once "../app/Views/$view.php";

        $viewPath = "../app/Views/pages/$view.php";

        if (file_exists($viewPath)) {
            $view = $viewPath; // Pass the view path to the layout
            require_once __DIR__ . '/../Views/layouts/layout.php';
        } else {
            echo "View $view not found.";
        }
    }
}
