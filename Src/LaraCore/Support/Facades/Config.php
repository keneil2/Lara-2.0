<?php
namespace Lara\LaraCore\Support\Facades;
use Lara\LaraCore\Support\Facades\Facade;
 class Config extends Facade{
    public static function getFacadeAccessor()
    {
        return "config";
    }
 }