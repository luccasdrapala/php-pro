<?php 

function callController ($matchedUri) {

    [$controller, $method] = explode('@', array_values($matchedUri)[0]); // abreviação do methodo list

    if (class_exists($controller)) {
        var_dump('exist');
    } else {
        var_dump('dont exist');    
    }
    
}