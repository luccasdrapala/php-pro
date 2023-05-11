<?php 

return[

    'POST' =>[
        '/login' => 'Login@store',
        '/user/store' => 'User@store'
    ],
    'GET' => [
        "/" => 'Home@index',
        "/users" => 'Users@index',
        '/user/create' => 'User@create',
        '/user/[0-9]+' => 'User@show',
        '/login' => 'Login@index',
        '/user/[0-9]+/name/[a-z]+' => 'User@show',
        '/logout' => 'login@destroy'
        ]
];