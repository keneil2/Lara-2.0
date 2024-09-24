<?php

use Lara\LaraCore\Support\Facades\Log;
use Lara\LaraCore\Support\Facades\Route;
Route::get("/hello",function(){
    echo "hello";
    Log::Loginfo("hiiii");

});