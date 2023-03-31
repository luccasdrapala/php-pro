<?php 

namespace app\controllers;

class Home
{
    public function index($params)
    {
        var_dump($_SESSION);
        $users = all('users');
        return [
            'view' => 'home.php',
            'title' => 'Home',
            'data' => [
                'users' => $users
            ]
        ];
    }
}