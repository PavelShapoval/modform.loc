<?php

function autoloader($class){

    $file = "classes/{$class}.php";
    if(file_exists($file)){
        require_once $file;
    } else {
        exit('не найден класс');
    }

}
spl_autoload_register('autoloader');
$pdo = DB::getInstance();
echo '<pre>';
var_dump($pdo);
echo '</pre>';
//$db2 = DB::getInstance();

//var_dump($db == $db2); // bool(true)
