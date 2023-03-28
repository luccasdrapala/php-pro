<?php 

namespace app\controllers;

class User
{
    public function show($params){
        if (!isset($params['user'])){
            return header('Location: /');
        }
    }
    
    public function create($params){
        var_dump('create');
    }
}