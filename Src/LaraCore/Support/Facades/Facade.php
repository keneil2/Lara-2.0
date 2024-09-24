<?php
namespace Lara\LaraCore\Support\Facades;
use Lara\App\AppLication;
use Lara\Contianer;
/**
 * the base class for facades
*/
abstract class Facade
{


    public static function getFacadeAccessor()
    {
        throw new \Exception("getFacadeAccessor method does not exist one the Facade Class");
    }


    public static function __callStatic($method, $args)
    {
        $instance = Contianer::resolve(static::getFacadeAccessor());
        $class = $instance();
        $class->$method(...$args);
        self::setReslovedService(static::getFacadeAccessor(), $class);

    }


    public static function setReslovedService($name, $object)
    {
        $app = AppLication::getAppInstance();
        $app->storeResolvedService($name, $object);

    }

}