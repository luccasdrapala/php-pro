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
        $result = $validate($field, $params);
    }
    return $result;
}

