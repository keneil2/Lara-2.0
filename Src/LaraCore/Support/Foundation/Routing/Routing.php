<?php
namespace Lara\LaraCore\Support\Foundation\Routing;
// todo: make this class return an 404 message if the route is not defined
class Routing extends ActionDispatcher
{
      private $uriMap = [];



      public function get(string $uri, array|callable $action)
      {
            $uri = $uri !=="/" ? str_replace("/", "", $uri) : "/";
            $this->register_uri_controller("GET", $uri, $action);
      }



      public function register_uri_controller($method, string $uri, array|callable $callable)
      {
            $this->uriMap[$method][$uri] = $callable;
      }



      public function post(string $uri, array|callable|object $action)
      {
            $uri =  str_replace("/", "", $uri);
            $this->register_uri_controller("POST", $uri, $action);
      }



      public function delete()
      {

      }


      public function put()
      {

      }

      /**
       * this function will dispatch the controller or callable that is apart of the route
      */
      public function route_dispatcher()
      {
            $currentUri = $_SERVER["REQUEST_URI"] !== "/" ? str_replace("/", "", $_SERVER["REQUEST_URI"]) : "/";
            
            if(!array_key_exists( $currentUri,$this->uriMap[$_SERVER["REQUEST_METHOD"]])){
                  
                  throw new \Exception("The route: ".$_SERVER["REQUEST_URI"]." is not registered" );
            }
            // dd($this->uriMap[$_SERVER["REQUEST_METHOD"]]);
    


            foreach ($this->uriMap as $Requestmethod => $action) {


                  if ($Requestmethod == $_SERVER["REQUEST_METHOD"] ) {

                        if (!is_callable($action[$currentUri])) { 
                              return $this->Controller_dispatcher($action[$currentUri][0], $action[$currentUri][1]);
                        }
                        return $this->function_dispatcher($action[$currentUri]);

                  } 






            }

      }



}