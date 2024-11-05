<?php

namespace Lara\Database;
 
class DatabaseConnection{
     public $dsn=$db_config["driver"].": host=".$db_config.";"."dbname=".$db_config["DB_NAME"];
     public $username=$db_config["db_username"];
     public $password=$db_config["db_password"];
     public $options;
     
    public function databaseConnection(){
 $this->getdbConfig();
         $pdo=new \PDO($this->dsn,$this->username,$this->password,$this->options);
         return $pdo;
    
    }
    protected function getdbConfig(){
     $db_config = require_once(__DIR__."/../../config/database.php");
     return $db_config;
    }

}