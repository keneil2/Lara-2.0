<?php 
 namespace Lara\LaraCore\Services;
  class Logger{
    public function Loginfo($info,$path=__DIR__."\..\..\..\storage\\"){
        
      $file=fopen($path."lara.log","a+");
      fwrite($file,$info."\n");
    }
    public function LogError($info,$path=__DIR__."\..\..\..\storage\\"){
        
      $file=fopen($path."lara.log","a+");
      fwrite($file,$info."\n");
    }
  }