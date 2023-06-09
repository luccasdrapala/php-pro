<?php 

function required($field) {
    if ($_POST[$field] === '') {
        setFlash($field, " O campo é obrigatorio");
        return false;
    }

    return filter_input(INPUT_POST, $field, FILTER_SANITIZE_SPECIAL_CHARS);
}

function email($field) 
{
    $emailIsValid = filter_input(INPUT_POST, $field, FILTER_VALIDATE_EMAIL);

    if (!$emailIsValid) {
        setFlash($field, " O campo tem que ser um email valido");
        return false;
    }

    return filter_input(INPUT_POST, $field, FILTER_VALIDATE_EMAIL);    
}

function unique($field, $params) 
{
    $data = filter_input(INPUT_POST, $field, FILTER_SANITIZE_SPECIAL_CHARS);
    $user = findBy($params, $field, $data);

    if ($user) {
        setFlash($field, "O valor já esta cadastrado");
        return false;
    }
    return $data;

}

function maxlen($field, $param) {

    $data = filter_input(INPUT_POST, $field, FILTER_SANITIZE_SPECIAL_CHARS);
    if(strlen($data) > $param) {
        setFlash($field, "Senha não pode passar de {$param} caracteres");
        return false;
    }
    return $data;
}

?>