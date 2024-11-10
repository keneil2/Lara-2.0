<?php
namespace Lara\LaraCore\Services;

use Lara\LaraCore\Factory\ConfigFactory;
//todo: add setconfig file name function
class Config implements ConfigFactory
{
  public $configArr = [];
  protected $configFilename=[
    // default configs
    'app.php',
    'database.php'
  ];


  static $instance = null;
  private function __construct()
  {
    // loads all the configs array into the $configArr;
  $this->loadConfigs();
  }   
  public static function getInstance()
  {
    if (!self::$instance) {

      self::$instance = new Config();

    }
    return self::$instance;
  }

  public function loadConfigs(){
    
    foreach($this->configFilename as $fileName){
       $configSettings=require_once(__DIR__."/../../../config/$fileName");
       $fname=str_replace( ".php","",$fileName);
       $this->configArr[$fname]=$configSettings;
    }
  }
  public function registerconfigfile(){

  }
  function get(string $name)
  {
    
    #this is the name split into an array to get the file name and the value the user wants to get  
    $array = explode(".", $name);

// dd($this->configArr);

    $config =$this->getconfigArray($array[0]);
    // dd( $array );
      
    // remove filename form array 
    array_shift($array);

    if (count($array) > 1) {

    $this->getConfig($config, $array);

    }
    return $config;

  }
  /**
   * this forms and returns the array key
   * @param mixed $array
   * @param mixed $config
   * @return mixed
   */
  public function getConfig($config, $array)
  {

    if (!is_array($config[$array[0]])) {

     dd( $config[$array[0]])  ;
    }
   
    if (count($config[$array[0]]) > 1) {
      $firstvalue = $array[0];
      array_shift($array);
      # trying to use a recursive function here (there is probably an easier way to do it but I am not seeing it now)
      $this->getConfig($config[$firstvalue], $array);
    }
  }


  /**
   *this is used to set the the value for a config value;
   */

  function set(string $name, string $value)
  {
    $array = explode(".", $name);
    
    $this->getconfigArray($array[0]);

    $config = $this->configArr;

    $config[$name] = $value;
  }




  #problem with this is that the this config variable will return an array but If I want to change the value of a key in the array I cant just change the array like that so how do I change it so that it is global at runtime 
  # problaly need to make the config class to make get all config values that way I can change the value at run time I could make it a singleton class that way I can prevent the class from overwriteing it self and resetting the variable

  /**
   * get the config array for a file and set the config in the class
   * @param mixed $filename
   * @return array
   */
  function getconfigArray($filename): mixed
  {
    if(array_key_exists($filename,$this->configArr)){
       return $this->configArr[$filename];
    }else{
      # todo: maybe need to create a ConfigExeception class
      throw new \Exception("config Not registered");
    }
  }
}
