<?php 

use Doctrine\Inflector\InflectorFactory;
use Doctrine\Inflector\Language;

$query = [];

function read(string $table, string $fields = '*') 
{
    global $query;
    $query = [];
    $query['table'] = $table;
    $query['read'] = true; //flag para o a proxima etapa da query

    $query['execute'] = [];
    $query['sql'] = "select {$fields} from {$table}";
}

function limit(string|int $limit) 
{
    global $query;

    if (isset($query['paginate'])) {
        throw new Exception('O limit não pode vir depois da paginação');
    }

    $query['limit'] = true;
    $query['sql'] = "{$query['sql']} limit {$limit}";
}

function order(string $by, string $order = 'asc') 
{   
    global $query;

    if (isset($query['limit'])) {
        throw new Exception('O order não pode vir depois do limit');
    }

    if (isset($query['paginate'])) {
        throw new Exception('O order não pode vir depois da paginação');
    }

    $query['sql'] = "{$query['sql']} order by {$by} {$order}";
}

function paginate(int|string $perPage = 10) 
{
    global $query;

    if (isset($query['limit'])) {
        throw new Exception('Apaginação não pode ser chamada com o limit');
    }

    $query['paginate'] = true;
}

function where(string $field, string $operator = "=", string|int $value) 
{
    global $query;

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
    global $query;

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

function whereIn(string $field, array $data) 
{
    global $query;
    
    if (isset($query['where'])) {
        throw new Exception("Nao eh possivel chamar o whereIn depois de chamar where()");
    }

    $query['where'] = true;
    $query['sql'] = "{$query['sql']} where {$field} in (" . '\'' . implode('\',\'', $data) . "')";
}

function fieldFK(String $table, string $field)
{
    $inflector = InflectorFactory::create()->build();
    $tableToSingular = $inflector->singularize($table);

    return $tableToSingular . ucfirst($field);
}

function tableJoin(string $table, string $fieldFK, string $typeJoin = "inner") 
{
    global $query;

    if (isset($query['where'])) {
        throw new Exception("Nao colocar where antes do join");
    }

    $FkToJoin = fieldFK($query['table'], $fieldFK);
    $query['sql'] = "{$query['sql']} {$typeJoin} join {$table} on {$table}.{$FkToJoin} = {$query['table']}.{$fieldFK}"; 
}

function tableJoinWithFK() 
{
    
}

function search(array $search)
{
    global $query;

    if (isset($query['where'])) {
        throw new Exception("Nao pode chamar o where na busca do search");
    }

    if (!arrayIsAssociative($search)) {
        throw new Exception("Array nao pode ser associativo");
    }

    $sql = "{$query['sql']} where ";

    $execute = [];

    foreach ($search as $field => $searched) {
        $sql .= "{$field} like :{$field} or ";
        $execute[$field] = "%{$searched}%";
    }

    $sql = rtrim($sql, ' or ');

    $query['sql'] = $sql;
    $query['execute'] = $execute;
}

function execute(bool $isFetchAll = true, bool $rowCount = false) {

    try {

        global $query;
        $connect = connect();

        if (!isset($query['sql'])) {
            throw new Exception('A consulta deve ser construida');
        }

        $prepare = $connect->prepare($query['sql']);
        $prepare->execute($query['execute'] ?? []);

        if ($rowCount) {
            return $prepare->rowCount();
        }

        return $isFetchAll ? $prepare->fetchAll() : $prepare->fetch();
    
    } catch (Exception $e) {
        $message = "Erro no arquivo {$e->getFile()}, na linha {$e->getLine()} com a mensagem {$e->getMessage()}" ;
        var_dump($message);
    }
}