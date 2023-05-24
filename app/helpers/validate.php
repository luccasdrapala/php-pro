<?php 

function validate (array $validations, bool $persistInputs = false, bool $checkCsrf = false) 
{   
    if ($checkCsrf) {
        checkCsrf();
    }

    $result = [];
    $params = '';

    foreach($validations as $field => $validate) {
        
        $result[$field] = (!str_contains($validate, '|')) ?
            singleValidation($validate, $field, $params):
            multipleValidations($validate, $params, $field);        
    }

    if ($persistInputs) {
        setOld();
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
    $result = [];
    $explodedValidate = explode('|', $validate);
    foreach ($explodedValidate as $validate) {
        if(str_contains($validate, ":")){
            [$validate, $params] = explode(':', $validate);
        }

        $result[$field] = $validate($field, $params);

        if(isset($result[$field]) and $result[$field] === false){
            break;
        }
    }
    return $result[$field];
}

