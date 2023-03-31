<?php 

namespace app\controllers;

class Login
{
    public function index() {
        return [
            'view' => 'login.php',
            'title' => 'Login',
            'data' => []
        ];
    }

    public function store() {
        $email = filter_input(INPUT_POST, 'email',  FILTER_SANITIZE_EMAIL);
        $password = filter_input(INPUT_POST, 'password',  FILTER_SANITIZE_STRING);

        if (empty($email) || empty($password)){
            return header('Location: /login?status=erro');
        }

        $user = findBy('users', 'email', $email);

        if (!$user) {
            var_dump('cai no user');
        }

        if ($password === $user->password) { //password_verify não est asetado pois as senhas no banco estão sem hash
            return header('Location: /login?status=erro');
        }

        $_SESSION['logged'] = $user;
        return header('Location: /');

    }
}