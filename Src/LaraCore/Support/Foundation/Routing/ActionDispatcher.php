<?php
namespace Lara\LaraCore\Support\Foundation\Routing;
class ActionDispatcher
{
    public function Controller_dispatcher($class, $method)
    {
        if (class_exists($class) && method_exists($class, $method)) {
            $controller = new $class;
            $controller->$method();
        }
    }
    public function function_dispatcher($callable)
    {
        return $callable();
    }
}