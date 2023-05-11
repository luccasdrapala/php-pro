<?php 

namespace app\controllers;

class Users
{
    public function index()
    {
        $users = all('users', 'id,name,lastname,email'); //falta configurar o all

        echo json_encode($users);
    }
}
