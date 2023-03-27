<?php 

require 'bootstrap.php';

try {
    $data = router();
    
    extract($data['data']); //olhar documentação php

    if (!isset($data['view'])) {
        throw new Exception('O indice View esta faltando');
    }

    if (!file_exists(ROOT.'/app/views/'. $data['view'])){
        throw new Exception("O View {$data['view']} não existe");
    }

    $view = $data['view'];

    require ROOT.'/app/views/viewIndex.php';

} catch (Exception $e) {    
    var_dump($e->getMessage());
}
