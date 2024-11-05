<?php
namespace Lara\LaraCore\Support\Foundation\Routing;
class ActionDispatcher
{
    protected $callback;
    public function Controller_dispatcher($class, $method)
    {
        if (class_exists($class) && method_exists($class, $method)) {
            $controller = new $class;

            $controller->$method();
        }
    }

    public function function_dispatcher($callable)
    {
        $args = $this->getParams($callable);
        //  dd($args);
          return call_user_func($callable, ...$args);  
        }
       
        

    protected function getParams($function)
    {
        $params = [];
        $reflection = new \ReflectionFunction($function);
        foreach ($reflection->getParameters() as $param) {
            if($param->getType() && !$param->getType()->isBuiltin()){
            $paramClass=$param->getType()->getName();

            class_exists($paramClass)?
            $params[]=new $paramClass:
             throw new \Exception("class Not found");
            
            }else{
                $params[]=$param->isDefaultValueAvailable() ? $param->getDefaultValue():$param->getName();
            }
         
        }
        
        return $params;
    }
}