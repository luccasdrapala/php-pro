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
            return setMessageAndRedirect('message', 'Campos vazios', '/login');
        }

        $user = findBy('users', 'email', $email);

        if (!$user) {
            return setMessageAndRedirect('message', 'Usuário incorreto', '/login');
        }

        if ($password !== $user->password) { //password_verify não esta asetado pois as senhas no banco estão sem hash
            return setMessageAndRedirect('message', 'Senha incorreta', '/login');
        }

        unset($_SESSION['flash']['message']);
        $_SESSION['logged'] = $user;
        return header('Location: /');

    }
}