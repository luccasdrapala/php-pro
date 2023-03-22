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

function regularExpressionMatchArrayRoutes($routes, $uri){ //constroi rota dinamica
    return array_filter(
        array_keys($routes),
        function($value) use($uri){
            $regex = str_replace('/', '\/', ltrim($value, '/'));//roda no nas keys dos array das rotas tirando a "/"
            
            return preg_match("/^$regex$/", ltrim($uri, '/'));
        }
    );
}

function router()
{
    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

    $routes = routes();

    $matchedUri = verifyUriRoute($uri, $routes); //verifica se é uma rota não dinamica, caso seja dinamica retorna vazio

    if(empty($matchedUri)){

        $matchedUri = regularExpressionMatchArrayRoutes($routes, $uri);

        if(!empty($matchedUri)){

            $matchedToGetParams = array_values($matchedUri)[0];
            $params = array_diff(
                explode('/', ltrim($uri, '/')),
                explode('/', ltrim($matchedToGetParams, '/'))
            );
            echo '<pre>';
            var_dump($params);
            echo '</pre>';
            die();
        }
    }

}
