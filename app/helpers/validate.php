<?php 

function validate (array $validations) 
{
    $result = [];
    foreach($validations as $field => $validate) {
        if (!str_contains($validate, '|')) {
            $result[$field] = $validate($field);
        } else {
            $explodedValidate = explode('|', $validate);
            foreach ($explodedValidate as $validate) {
                $result[$field] = $validate($field);
            }
        }
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

function unique($field) 
{

}

function maxlen($field) {

}