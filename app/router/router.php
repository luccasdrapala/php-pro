<?php 

function routes () {
    return require 'routes.php';
}

function verifyUriRoute ($uri, $routes) {
    if(array_key_exists($uri, $routes)){
        return [$uri => $routes[$uri]];
    }
    return [];
}

function regularExpressionMatchArrayRoutes ($routes, $uri) { //constroi rota dinamica
    return array_filter(
        $routes,
        function ($value) use($uri) {
            $regex = str_replace('/', '\/', ltrim($value, '/'));//roda no nas keys dos array das rotas tirando a "/"
            return preg_match("/^$regex$/", ltrim($uri, '/'));
        },  ARRAY_FILTER_USE_KEY
    );
}

function params ($matchedUri, $uri) {

    if(!empty($matchedUri)){
    $matchedToGetParams = array_keys($matchedUri)[0];
        return array_diff(
            $uri,
            explode('/', ltrim($matchedToGetParams, '/'))
        );
    }
    return [];
}

function paramsFormat ($uri, $params) {
    $paramsData = [];
    foreach ($params as $index => $param){
        $paramsData[$uri[$index - 1]] = $param;
    }
    return $paramsData;
}

function router () {

    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

    $routes = routes();
    $matchedUri = verifyUriRoute($uri, $routes); //verifica se é uma rota não dinamica, caso seja dinamica retorna vazio

    $params = [];

    if (empty($matchedUri)) {
        $matchedUri = regularExpressionMatchArrayRoutes($routes, $uri);
        $uri = explode('/', ltrim($uri, '/'));
        $params = params($matchedUri, $uri);
        $params = paramsFormat($uri, $params);
    }

    if (!empty($matchedUri)) {
        callController($matchedUri, $params);
        return;
    }

    throw new Exception('Something is wrong bro !');
}