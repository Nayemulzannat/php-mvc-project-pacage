<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\User;

class AuthController extends Controller
{
    public function login(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';

            $user = User::findByUsername($username);

            // var_dump($user);

            // $hashPassword = password_hash($user['password'], PASSWORD_BCRYPT);

            // if ($user && password_verify($password, $hashPassword)) {
            // if ($user && $user['password'] == $password) {
            if ($user) {
                session_start();
                $_SESSION['user'] = $user['user'];

                header('Location: /home');
                exit; // Ensure the script stops here
            }


            $this->render('login', ['error' => 'Invalid username or password.']);
        } else {
            $this->render('login');
        }
    }

    public function logout(): void
    {
        session_start();
        session_destroy();
        header('Location: /login');
    }
}
