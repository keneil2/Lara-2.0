<?php
namespace Lara;
use Lara\Database\DatabaseConnection;
use Lara\LaraCore\Services\Config;
use Lara\LaraCore\Services\LaraExceptions;
use Lara\LaraCore\Services\Logger;
use Lara\LaraCore\Services\RoutingService;
use Lara\LaraCore\Support\Foundation\Routing\Routing;
// todo: add a property to store possible singleton classes;
class Contianer {
     
    private  static $bind=[];
    private static $coreService = [
      "routing" => Routing::class,
      "exception" => LaraExceptions::class,
      "logger" => Logger::class,
      "database"=>DatabaseConnection::class,
      "config"=>Config::class
    ];
 /**
    * register an the service 
   */
    public function  register(string $key,callable $calllable){
          if(!in_array($key,self::$bind)){
               self::$bind[$key]=$calllable; 
          }
    }
    /**
     *resolve a service
    */
    public static function resolve($key) {
          if(!in_array($key,self::$bind)){
                return self::$bind[$key];
          }
          return self::$bind[$key];
    }

    
    // register all the applications core services 
    public function getCoreServices(){
    foreach(self::$coreService as $name => $service){
   if($service===Config::class){
    
        $this->register($name,function () use($service){
            return $service::getInstance();
        });

        continue;
   }
$this->register($name,function() use($service){
            return new $service;
        });



    }
      
        
    }

    public function boot(){

    }
}