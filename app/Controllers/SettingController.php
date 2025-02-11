<?php

namespace App\Controllers;

use App\Core\Controller;

class SettingController extends Controller
{
    public function setting(): void
    {
        session_start();

        if (!isset($_SESSION['user'])) {
            header('Location: /login');
            exit;
        }

        $this->render('setting', ['username' => $_SESSION['user']]);
    }
}
