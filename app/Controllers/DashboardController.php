<?php

namespace App\Controllers;

use App\Core\Controller;

class DashboardController extends Controller
{
    public function dashboardController(): void
    {
        session_start();

        if (!isset($_SESSION['user'])) {
            header('Location: /login');
            exit;
        }

        $this->render('dashboard', ['username' => $_SESSION['user']]);
    }
}
