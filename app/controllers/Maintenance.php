<?php 

namespace app\controllers;

class Maintenance
{
    public function index () 
    {
        return [
            'view' => 'maintenance',
            'title' => 'Em manutencao',
            'data' => ['title' => 'Em manutencao']
        ];
    }
}

?>