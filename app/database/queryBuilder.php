<?php 

$query = [];

function read(string $table, string $fields = '*') 
{
    global $where;

    $query['read'] = true; //flag para o a proxima etapa da query
    $query['execute'] = [];
    $query['sql'] = "select {$fields} from {$table}";
}

function limit(string|int $limit) 
{
    global $query;

    $query['limit'] = true;
    $query['sql'] = "{$query['sql']} limit {$limit}";
}

function order(string $by, string $order = 'asc') 
{   
    global $query;

    if (isset($query['limit'])) {
        throw new Exception('O order não pode vir depois do limit');
    }

    $query['sql'] = "{$query['sql']} order by {$by} {$order}";
}

function where(string $field, string $operator, string|int $value) 
{
    global $where;

    if (!isset($query['sql'])) {
        throw new Exception("Antes de chamar o where, chamar o read");
    }

    if (func_num_args() !== 3) {
        throw new Exception("O where precisa dos 3 parametros");
    }

    $query['where'] = true;
    $query['execute'] = array_merge($query['execute'], [$field => $value]); //evita que o placeholder do bind sobrescreva o valor do execute
    $query['sql'] = "{$query['sql']} where {$field} {$operator} :{$field}";
}

function orWhere(string $field, string $operator, string|int $value, string $typeWhere = 'or') 
{
    global $where;

    if (!isset($query['sql'])) {
        throw new Exception("Antes de chamar o where, chamar o read");
    }

    if (!isset($query['where'])) {
        throw new Exception("Antes de chamar o orWhere, chamar o where");
    }

    if (func_num_args() < 3 || func_num_args() < 4) {
        throw new Exception("O where precisa de 3 ou 4 parametros");
    }

    $query['where'] = true;
    $query['execute'] = array_merge($query['execute'], [$field => $value]); //evita que o placeholder do bind sobrescreva o valor do execute
    $query['sql'] = "{$query['sql']} {$typeWhere} {$field} {$operator} :{$field}";
}

function execute() {

    global $query;
    $connect = connect();

    $prepare = $connect->prepare($query['sql']);
    $prepare->execute($query['execute'] ?? []);

    return $prepare->fetchAll();
}