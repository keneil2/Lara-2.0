<?php 
 namespace Lara\LaraCore\Services;
  class Logger{
    public function Loginfo($info,$path=__DIR__."\..\..\..\storage\\"){
        
      $file=fopen($path."lara.log","r+");
      fwrite($file,$info);
    }
  }