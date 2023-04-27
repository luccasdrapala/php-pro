<?php 

function validate (array $validations) 
{
    $result = [];
    $params = '';

    foreach($validations as $field => $validate) {
        
        $result[$field] = (!str_contains($validate, '|')) ?
            singleValidation($validate, $field, $params):
            multipleValidations($validate, $params, $field);        
    }

    if(in_array(false, $result)) {
        return false;
    }
    return $result;
}

function singleValidation($validate, $field, $params){
    if(str_contains($validate, ":")){
        [$validate, $params] = explode(':', $validate);
    }
    return $validate($field, $params);
}

function multipleValidations($validate, $params, $field) {
    $explodedValidate = explode('|', $validate);
    foreach ($explodedValidate as $validate) {
        if(str_contains($validate, ":")){
            [$validate, $params] = explode(':', $validate);
        }
        $result[$field] = $validate($field, $params);
    }
    return $result;
}

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