<?php 

function validate (array $validations) 
{
    $result = [];
    $params = '';

    foreach($validations as $field => $validate) {
        if (!str_contains($validate, '|')) {
            if(str_contains($validate, ":")){
                [$validate, $params] = explode(':', $validate);
            }
            $result[$field] = $validate($field, $params);
        } else {
            $explodedValidate = explode('|', $validate);
            foreach ($explodedValidate as $validate) {
                $result[$field] = $validate($field);
            }
        }
        die();
    }

    if(in_array(false, $result)) {
        return false;
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
    var_dump($field, $params);
}

function maxlen($field) {

}