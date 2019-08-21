<?php

//namespace src;
class smvc    {
    protected static $router;
    protected static $config;


 function __construct(){
     echo 'SYS INIT ...';
 }
  public static function run(){
   self::init();
   self::route();
 }
 public static function loadconfig(){
     $conf_file=dirname(__FILE__).'/app/Config/config.php';
     if(file_exists($conf_file)){
       require($conf_file) ;
       static::$router=  new smvc\app\router($routes);
       static::$config = $config;
        foreach ( self::$config as $k => $v )
		{
			if( defined( $k ) )
			{
				define(  $k, constant( $k ) );
			}
			else
			{
				define(  $k, $v );
			}
		}


     } else{
         die('no Config');
     }
 }
 public static function init(){
     //load config
     self::loadconfig();
     //init router


 }

 public static function route(){
     self::$router->setBasePath('');
     $match = self::$router->match();
    if ($match) {
        $dispatcherInfos = explode('#', $match['target']);
        $controllerName = $dispatcherInfos[0];
        $methodName = $dispatcherInfos[1];
        if(class_exists($controllerName)){
         $controller = new $controllerName();
         if(method_exists($controllerName,$methodName)){
         $controller->$methodName($match['params']);
         }
        }


    } else {
        
        die('ohhh');
        header("HTTP/1.0 404 Page Not Found");
        $controller = new \Controllers\MainController();
        $controller->error404();
    }
 }
}

 ?>