<?php 

function connect(){
    return new PDO("mysql:host=location;dbname=lumen", 'root', '',[
        PDO::ATTR_DEFAULT_FETCH_MODE =>PDO::FETCH_OBJ
    ]);
}