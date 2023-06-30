<?php 

namespace app\controllers;

class Home
{
    public function index($params)
    {
        read('users', 'id, name, email,qwe');

        $users = execute(false);

        echo '<pre>';
        var_dump($users);
        echo '</pre>';

        return [
            'view' => 'home',
            'title' => 'Home',
            'data' => [
                'users' => $users
            ]
        ];
    }
}