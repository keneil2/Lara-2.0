<?php

namespace Lara\Database;
use Lara\App\AppLication;
use Lara\LaraCore\Services\Config;

class DatabaseConnection
{
     protected $config;
     public $dsn;
     // $db_config["driver"].": host=".$db_config.";"."dbname=".$db_config["DB_NAME"];

     public $username;
     public $password;
     public $options;
     function __construct()
     {
          // $this->config='';//    ;
     }
     public function databaseConnection($config)
     {
          //    dd(env("DB_PASSWORD"));
            $this->config=$config;
            $password=$config["connections"]["db_password"];
         $pdo=new \PDO($config["connections"]["driver"].":host=".$config["connections"]["db_host"].";"."dbname=".$config["connections"]["db_name"],$config["connections"]["db_username"],$password);
        dd($pdo);
     }

}