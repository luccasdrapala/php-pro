<?php 

namespace app\controllers;

class User
{
    public function show ($params) {
        if (!isset($params['user'])){
            return redirect('/');
        }

        $user = findBy('users','id', $params['user']);
        die();
    }
    
    public function create($params)
    {
        return [
            'view' => 'create',
            'title' => 'Create user',
            'data' => []
        ];
    }

    public function store() 
    {
        $validate = validate([
            'name' => 'required',
            'lastname' => 'required',
            'email' => 'email|required', //users é a tabela onde se deseja fazer a consulta
            'password' => 'required|maxlen:10' //10 é o numero de caracteres maximo
        ],true, checkCsrf:true);

        if (!$validate) {
            return redirect('/user/create');
        }

        $validate['password'] = password_hash($validate['password'], PASSWORD_DEFAULT);

        $created = create('users', $validate);

        if (!$created) {
            setflash('message', 'Erro ao cadastrar o usuário !!');
            return redirect('/user/create');
        }

        return redirect('/');
    }
}