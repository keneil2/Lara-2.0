<?php
namespace Lara\LaraCore\Support\Facades;
class Log extends Facade{

public static function  getFacadeAccessor(){
    return "logger";
}
}