<?php

class Router
{
    private $routes;
    
    public function __construct() 
    {
        $routesPath = ROOT.'/config/routes.php';
        $this->routes = include($routesPath);
    }
    
    //return request string
    public function getURI()
    {
        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }
    
    public function run()
    {
        //Получить строку запроса
        $uri = $this->getURI();
        
        //Проверить наличие такого запроса в routes.php
        foreach ($this->routes as $uriPattern => $path) {
            //Сравнить $uriPattern и $uri
            if (preg_match("~$uriPattern~", $uri)) {
         
                $internalRoute = preg_replace("~$uriPattern~", $path, $uri);
                //Какой контроллек и акшн обрабатывает запрос
                $segments = explode ('/', $internalRoute);
                
                $controllerName = array_shift ($segments) . 'Controller';
                $controllerName = ucfirst($controllerName);
                
                $actionName = 'action'.ucfirst(array_shift($segments));
                
                $parameters = $segments;


                //Подключить файл класса-контроллера
                $controllerFile = ROOT . '/controllers/' . $controllerName . '.php';
                
                if (file_exists($controllerFile)) {
                    include_once($controllerFile);
                }
                //создать объект, вызвать массив (аксш)
                $controllerObject = new $controllerName;
                
                $result = call_user_func_array(array($controllerObject, $actionName), $parameters);
                
                if ($result != null) {
                    break;
                }
            }
        }
    }
}

