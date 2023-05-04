<?php 

require 'bootstrap.php';

try {
    $data = router();

    if (!isset($data['data'])){
        throw new Exception('O indice data esta faltando');
    }

    if (!isset($data['title'])){
        throw new Exception('O indice title esta faltando');
    }

    if (!isset($data['view'])) {
        throw new Exception('O indice View esta faltando');
    }

    if (!file_exists(ROOT.'/app/views/'. $data['view'] . '.php')){
        throw new Exception("O View {$data['view']} não existe");
    }

    // extract($data['data']); //olhar documentação php

    // $view = $data['view']; //seta arquivo que sera carregado dentro do viewIndex.php

    // require ROOT.'/app/views/viewIndex.php';

    // Create new Plates instance
    $templates = new League\Plates\Engine(ROOT. '/app/views/');

    // Render a template
    echo $templates->render($data['view'], $data['data']);

} catch (Exception $e) {    
    var_dump($e->getMessage());
}
