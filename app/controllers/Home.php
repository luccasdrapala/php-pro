<?php 

namespace app\controllers;

class Home
{
    public function index($params)
    {
        $search = filter_input(INPUT_GET, 's', FILTER_SANITIZE_SPECIAL_CHARS);

        read('users', 'id, name, lastname');

        if ($search) {
            search(['name' => $search, 'lastname' => $search]);
        }

        $users = execute();

        return [
            'view' => 'home',
            'title' => 'Home',
            'data' => [
                'users' => $users
            ]
        ];
    }
}