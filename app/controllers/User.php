<?php 

namespace app\controllers;

class User
{
    public function show ($params) {
        if (!isset($params['user'])){
            return redirect('/');
        }

        $user = findBy('users','id', $params['user']);
        var_dump($user);
        die();
    }
    
    public function create($params)
    {
        return [
            'view' => 'create.php',
            'title' => 'Create user',
            'data' => []
        ];
    }

    public function store() 
    {
        $validate = validate([
            'name' => 'required',
            'lastname' => 'required',
            'email' => 'required|unique',
            'password' => 'required|maxlen'
        ]);

        if (!$validate) {
            return redirect('/user/create');
        }
    }
}