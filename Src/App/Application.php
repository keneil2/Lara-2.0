<?php
namespace Lara\App;
use Lara\Contianer;
// use Lara\LaraCore\Support\Facades\Config;
use Lara\LaraCore\Services\Config;
use Lara\LaraCore\Support\Foundation\Env\DotEnvLoader;
use LaraCore\Support\Facades\LaraException;
class AppLication
{
    private static $instance;
    private static $container;
    private static $configInstance=null;
    private static $resolvedInstance = [];
    private $singletons=[];
    private function __construct()
    {
        $envLoader = new DotEnvLoader();
        $envLoader->load(__DIR__ . "/../../");
        
        $this->singletons=[
          "config" => Config::getInstance(),
        ];
        // loading core services
         self::$container = new Contianer;

        self::$container->getCoreServices();

 // loading config settings 
         self::$configInstance=  $this->singleton("config");
       
        // connecting to database
        $this->connectDatabase();
    }

    public function __clone()
    {
    }


    /**
     * return a same instance of the application
     * 
     */
    public static function getAppInstance()
    {

        if (self::$instance === null) {
            self::$instance = new Application();
            return self::$instance;
        }
        return self::$instance;
    }


    public function resolve()
    {

    }

    public function storeResolvedService($name, $object)
    {
        self::$resolvedInstance[$name] = $object;
    }

    // load instances 
    public function getResolvedService($name)
    {
        if (array_key_exists($name, self::$resolvedInstance)) {
            return self::$resolvedInstance[$name];
        }
    }
    public function withRoute(array $routes)
    {
        foreach ($routes as $route) {
            require $route;
        }
        $resolvedService = $this->getResolvedService("routing");


        $this->loadroute($resolvedService);
        return self::$instance;
    }
    public function withException(array $exception = null)
    {

        set_exception_handler(["Lara\LaraCore\\Support\\Facades\\LaraException", "ExceptionHandler"]);
        return self::$instance;
    }

    public function create()
    {
        $services = [];
        foreach ($services as $service) {
            $resolvedService = $this->getResolvedService($service);
        }
    }


    public function loadroute($routeobj)
    {
        $routeobj->route_dispatcher();
    }


    public function connectDatabase()
    {
        // resolving dbCon obj
        $db = Contianer::resolve("database");
        $db()->databaseConnection($this->singleton("config")->get("database"));
        // // initalizing connection   
        // call_user_func([$db(),"databaseConnection" ]);
    }

    public static function getConfigInstance(){
        return self::$configInstance;
    }






  /**
   * load the the singleton registered in application 
   * @var string singletons name
   * @return object   
   *    
   * */
    public function singleton($name){
      if(!array_key_exists($name,$this->singletons)){
            throw new \Exception("singleton Not registered");
      }

      return $this->singletons[$name];
    }


    public function addSigleton($name, $instance){
      if(!is_object($instance)){
        throw new \Exception ("you can only register singletons with an object");
      }
      $this->singletons[$name]=$instance;
    }
}
