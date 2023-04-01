<?php 

function redirect ($place) {
    return header("Location:" . $place);
}

function setMessageAndRedirect ($index, $message, $redirect){
    setFlash($index, $message);
    return redirect($redirect);
}