<?php 

function routes():array
{
    return require 'routes.php';
}

function verifyUriRoute($uri, $routes)
{
    if(array_key_exists($uri, $routes)){
        return [$uri => $routes[$uri]];
    }
    return [];
}

function regularExpressionMatchArrayRoutes($routes, $uri){
    return array_filter(
        array_keys($routes),
        function($value) use($uri){
            $regex = str_replace('/', '\/', ltrim($value, '/'));
            return preg_match("/^$regex$/", trim($uri, '/'));
        }
    );
}

function router()
{
    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

    $routes = routes();

    $matchedUri = verifyUriRoute($uri, $routes);

    if(empty($matchedUri)){
        $matchedUri = regularExpressionMatchArrayRoutes($routes, $uri);
    }
    
    var_dump($matchedUri);
}
