<?php 

namespace app\controllers;

class Home
{
    public function index($params)
    {
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