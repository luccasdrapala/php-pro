<?php 

function create(string $table, array $data) {
    try {

        if (!arrayIsAssociative($data)){
            throw new Exception('O array não é do tipo associativo');
        }

        $connect = connect();

        $query = "INSERT INTO {$table}(";
        $query.= implode(",", array_keys($data)).") values(";
        $query.= ":".implode(",:", array_keys($data)).")";
        
        $prepare = $connect->prepare($query);
        return $prepare->execute($data);

    } catch (PDOExceptiion $e) {
        var_dump($e->getMessage());
    }
}

?>