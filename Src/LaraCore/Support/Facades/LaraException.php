<?php 
namespace Lara\LaraCore\Support\Facades;
use Lara\LaraCore\Support\Facades\Facade;
class LaraException extends Facade{
public static function getFacadeAccessor(){
    return "exception";
}
}