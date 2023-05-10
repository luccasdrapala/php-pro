<?php 

function update (string $table, array $fields, array $where) 
{   
    if (!arrayIsAssociative($where) || !arrayIsAssociative($fields)) {
        throw new Exception('Array precisa ser associativo');
    }

    $connect = connect();

    $query = "update {$table} set ";

    foreach (array_keys($fields) as $field) {
        $query .= "{$field} = :{$field}, ";
    }
    
    $query = trim($query, ', ');

    $whereFields = array_keys($where);
    
    $query .= " where {$whereFields[0]} = :{$whereFields[0]}";

    $data = array_merge($fields, $where);

    $prepare = $connect->prepare($query);
    $prepare->execute($data);

    return $prepare->rowCount();
}
