<?php 

function setFlash($index, $message) 
{
    if (!isset($_SESSION['flash'][$index])) {
        $_SESSION['flash'][$index] = $message;
        var_dump($_SESSION);
    }
}

function getFlash($index, $style = "color:red;") 
{
    if (isset($_SESSION['flash'][$index])) {
        $flash = $_SESSION['flash'][$index];
        unset($_SESSION['flash'][$index]);
        return "<span style='{$style}'>{$flash}</span>";
    } else {
        var_dump('Cai no else');

    }
}