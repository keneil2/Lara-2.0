<?php

use Lara\LaraCore\Support\Facades\Config;
use Lara\LaraCore\Support\Facades\Log;
use Lara\LaraCore\Support\Facades\Route;
$request=100;
Route::get("/hello",function() use($request){
   
    // Log::Loginfo("hiiii");
    dd(Config::get("database.connections.driver"));
});