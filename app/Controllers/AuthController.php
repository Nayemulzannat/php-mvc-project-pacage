<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\User;

class AuthController extends Controller
{
    public function showLogin(): void
    {
        $this->render('login');
    }

    public function login(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';

            $user = User::findByUsername($username);

            if ($user) {
                session_start();
                $_SESSION['user'] = $user['user'];
                header('Location: /home');
                exit;
            }

            $this->render('/login', ['error' => 'Invalid username or password.']);
        } else {
            header('HTTP/1.1 405 Method Not Allowed');
            echo "Method Not Allowed";
        }
    }


    public function logout(): void
    {
        session_start();
        session_unset();
        session_destroy();

        header('Location: /login');
        exit;
    }
}
