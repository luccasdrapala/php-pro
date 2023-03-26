<?php 

function callController ($matchedUri, $params) {
    var_dump($matchedUri);
    die();
    [$controller, $method] = explode('@', array_values($matchedUri)[0]); // abreviação do methodo list
    var_dump($matchedUri);
    var_dump($controller);
    $controllerWithNamespace = CONTROLLER_PATH.$controller;

    if (!class_exists($controllerWithNamespace)) {
        var_dump($controllerWithNamespace);
        throw new Exception("Controller {$controller} não existe");
    } 

    $controllerInstance = new $controllerWithNamespace;

    if (!method_exists($controllerInstance, $method)) {
        throw new Exception("O metodo {$method} não existe dentro de do controller {$controller}");
    }

    $controllerInstance->$method($params);
}