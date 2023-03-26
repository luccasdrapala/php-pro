<?php 

namespace app\controllers;

class User
{
    public function show($params){
        var_dump($params);
        echo 'funcionou essa merda';
    }
    
    public function create($params){
        var_dump('create');
    }
}