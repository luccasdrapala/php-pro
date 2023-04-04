<?php 

function redirect ($place) {
    return header("Location:" . $place);
}

function setMessageAndRedirect ($index, $message){
    setFlash($index, $message);
}