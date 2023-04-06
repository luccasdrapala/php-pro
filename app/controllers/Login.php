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
        $password = filter_input(INPUT_POST, 'password',  FILTER_SANITIZE_SPECIAL_CHARS);

        if (empty($email) || empty($password)){
            setFlash('message', 'Campos vazios');
            return redirect('/login');
        }

        $user = findBy('users', 'email', $email);

        if (!$user) {
            setMessageAndRedirect('message', 'Usuário incorreto');
            return redirect('/login');
        }

        if ($password !== $user->password) { //password_verify não esta asetado pois as senhas no banco estão sem hash
            setMessageAndRedirect('message', 'Senha incorreta');
            return redirect('/login');
        }

        $_SESSION['logged'] = $user;
        //return header('Location: /');

    }
}