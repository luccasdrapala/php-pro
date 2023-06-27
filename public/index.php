<?php 

require 'bootstrap.php';

try {

    // forma de tratar sistema em manutencao
    // if ($_ENV['MAINTENANCE']) {
    //    require 'maintenance.php';
    //    die();
    // }

    $data = router();

    if (isAjax()){
        die();
    }

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

    // Create new Plates instance
    $templates = new League\Plates\Engine(ROOT. '/app/views/');

    // Render a template
    echo $templates->render($data['view'], $data['data']);

    // extract($data['data']); //olhar documentação php

    // $view = $data['view']; //seta arquivo que sera carregado dentro do viewIndex.php

    // require ROOT.'/app/views/viewIndex.php';

} catch (Exception $e) {    
    var_dump($e->getMessage());
}
