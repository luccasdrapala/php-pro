<?php 

function callController ($matchedUri, $params) {
    [$controller, $method] = explode('@', array_values($matchedUri)[0]); // abreviação do methodo list
    $controllerWithNamespace = CONTROLLER_PATH.$controller;

    if (!class_exists($controllerWithNamespace)) {
        throw new Exception("Controller {$controller} não existe");
    } 

    $controllerInstance = new $controllerWithNamespace;

    if (!method_exists($controllerInstance, $method)) {
        throw new Exception("O metodo {$method} não existe dentro de do controller {$controller}");
    }

    $controller = $controllerInstance->$method($params);

    if($_SERVER['REQUEST_METHOD'] === 'POST') { //caso a requisição seja POST e não redirecione ele cai aqui para não executar o index novamente
        die();
    }
    return $controller;
}