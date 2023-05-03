<?php 

function create($table, $data) {
    try {

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