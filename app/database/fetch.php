<?php

function all($fields = '*', $table)
{
    try{
        $connect = connect();

        $query = $connection->query("select {$fields} from {$table}'");
    }catch(PDOException $e) {
        var_dump($e->getMessage());
    }
}