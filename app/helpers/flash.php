<?php 

function setFlash($index, $message) 
{
    $_SESSION['flash'][$index] = $message;
}

function getFlash($index, $style = "color:red;") 
{
    if (isset($_SESSION['flash'][$index])) {
        $flash = $_SESSION['flash'][$index];
        return "<span style='{$style}'>{$flash}</span>";
    } 
}