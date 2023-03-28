<?php

function all($table)
{
    try{
        $connect = connect();

        $query = $connect->query("select * from {$table}");
        return $query->fetchAll();
    }catch(PDOException $e) {
        var_dump($e->getMessage());
    }
}