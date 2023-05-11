<?php 

/**
 * Função que faz o delete do banco de dados de forma abstrata, pode ser usada para varios deletes
 *
 * @param string $table é a tabela de onde o dado sera deletado
 * @param array $where condição para onde sera deletado
 * @return boolean retorna 1 para delete com sucesso e 0 para delete com erro
 */
function delete(string $table, array $where): bool
{
    $connect = connect();

    if (!arrayIsAssociative($where)) {
        throw new Exception('Array precisa ser associativo no delete');
    }

    $query = "DELETE FROM {$table} {$where} ";
    $query .= "{$where[0]} = :{$where[0]}";

     $prepare = $connect->prepare($query);
     $prepare->execute($where);
     return $prepare->rowCount();
}