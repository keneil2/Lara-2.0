<?php
use Lara\LaraCore\Support\Foundation\Env\DotEnvLoader;

/**
 * sets and gets  evironmental variables 
 * 
*/
function env($name,$value=null){
    if(isset($value)){

DotEnvLoader::setEnv($name,$value);

    }

   return DotEnvLoader::getEnv($name);
}
function dd($value){
    var_dump($value);
    die;
}