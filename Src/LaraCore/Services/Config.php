<?php 
namespace Lara\LaraCore\Services;

use Lara\LaraCore\Factory\ConfigFactory;
class Config implements ConfigFactory {
  function get( string $name){          
                                                                         // "filename.connections.driver" , "mysql", [filename, connection, driver]
    #this is the name split into an array to get the file name and the value the user wants to get  
     $array=explode(".",$name);
    
    
     
    //  
     $config=require_once(__DIR__."/../../../config/".$array[0].".php"); 

     // remove filename form array 
     array_shift( $array);

    if($array > 1){

     dd($this->getConfig($config,$array)); 
      
    }
     
  }
  /**
   * this forms and returns the array key
   * @param mixed $array
   * @param mixed $config
   * @return mixed
   */
  public function getConfig($config,$array){
    
     if(!is_array($config[$array[0]])){
       
          $config[$array[0]];
     }
      if(count($config[$array[0]]) >1){
        $firstvalue=$array[0];
        array_shift($array);
       # trying to use a recursive function here (there is probably an easier way to do it but I am not seeing it now)
      $this->getConfig($config[$firstvalue],$array);
      }
  }
  
  function set(string $name, string $value){
    $array=explode(".",$name);

    $config=require_once($array[0].".php");

     $config[$name]=$value;
  }
}
