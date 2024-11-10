<?php
return [
    "connections"=>[

     "driver"=>env("DB_DRIVER") ?? "mysql",
    "db_host" => env("DB_HOST"),
    "db_name"=>env("DB_NAME"),
    "db_username" => env("DB_USERNAME"),
    "db_password" => env("DB_PASSWORD"),
]
    ];
    