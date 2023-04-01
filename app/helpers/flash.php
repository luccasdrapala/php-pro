<?php 

function setFlash($index, $message) 
{
    if (!isset($_SESSION['flash'][$index])) {
        $_SESSION['flash'][$index] = $message;
        var_dump('ewntrei');
    }
}

function getFlash($index, $style = "color:red;") 
{
    if (isset($_SESSION['flash'][$index])) {
        $flash = ($_SESSION['flash'][$index]);
        // unset($_SESSION['flash'][$index]);
        var_dump($_SESSION);
        return "<span style='{$style}'>{$flash}</span>";
    }
}