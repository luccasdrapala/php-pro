<?php 

function routes():array
{
    return[
        "/" => 'Home@index',
        '/user/create' => 'User@create'
    ];
}

function verifyUriRoute($uri, $routes)
{
    if(array_key_exists($uri, $routes)){
        return [];
    }
    return [];
}

function router()
{
    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

    $routes = routes();

    verifyUriRoute($uri, $routes);
}
