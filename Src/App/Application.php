<?php
namespace Lara\App;
use Lara\Contianer;
use Lara\LaraCore\Support\Foundation\Env\DotEnvLoader;
use LaraCore\Support\Facades\LaraException;
class AppLication
{
    private static $instance;
    private static $container;
    private static $resolvedInstance = [];
    private function __construct()
    {
        $envLoader = new DotEnvLoader();
        $envLoader->load(__DIR__ . "/../../");

        self::$container = new Contianer;

        // loading core services
        self::$container->getCoreServices();

        // connecting to database
        // $this->connectDatabase();
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
        $services = [

        ];
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

        // initalizing connection   
        call_user_func([$db(),"databaseConnection" ]);
    }
}
