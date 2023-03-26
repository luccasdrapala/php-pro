<?php 

function callController ($matchedUri) {

    [$controller, $method] = explode('@', array_values($matchedUri)[0]); // abreviação do methodo list
    $controllerWithNamespace = CONTROLLER_PATH.$controller;

    if (!class_exists($controllerWithNamespace)) {
        throw new Exception("Controller {$controller} não existe");
    } 

    $controllerInstance = new $controllerWithNamespace;
    $controllerInstance->$method();

}