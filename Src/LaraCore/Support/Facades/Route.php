<?php
namespace Lara\LaraCore\Support\Facades;

class Route extends Facade
{
    public static function getFacadeAccessor()
    {
        return "routing";
    }

}