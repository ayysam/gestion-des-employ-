<!-- https://www.php.net/manual/fr/language.oop5.autoload.php -->
<?php
session_start();

require_once './Bootstrap.php';

spl_autoload_register('autoload');

function autoload($class_name){
    $array_paths = array(
        'Database/',
        'app/Classes/',
        'Models/',
        'Controllers/'
    );
    // pour indiquer le delimiteur de chemin donné
    //Split a string by a string
    // $class_name exemple = app\Classes\Redirect.php

    $parts = explode('\\',$class_name);
    // array_pop() Pop the element off the end of array
    $name = array_pop($parts);

    foreach($array_paths as $path){
        $file = sprintf($path.'%s.php',$name);
        if(is_file($file)){
            include_once $file;
        }
    }

}
?>