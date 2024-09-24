<?php 
 namespace Lara\LaraCore\Support\Foundation\Env;
 abstract class DotEnv{
    public static function getEnv($name){
        $envValue=getenv($name)?? null;
        if($envValue!==null || $_ENV[$name]!== null){
          return $envValue ??  $_ENV[$name];
        }
         
      }
      public static function setEnv($key,$value){
        putenv(sprintf("%s=%s",$key,$value));
      
          $_ENV[$key] = $value;
       
      }
}