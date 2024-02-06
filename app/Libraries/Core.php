<?php
class Core {
    protected $controller ='Page';
    protected $method ='index';
    protected $params =[];

    public function __construct()
    {
        if(isset($_GET['url'])) {
            $url = explode('/',$_GET['url']);
            $this->controller = ucfirst($url[0]);
            unset($url[0]);

            $this->method = $url[1];
            unset($url[1]);

            $this->params = array_values($url);
        }

        spl_autoload_register(function ($class) {
            $controllerPath = '../app/Controllers/'.$class.'.php';
            $modelPath = '../app/Models/'.$class.'.php';
            $libariePath = '../app/Libraries/'.$class.'.php';

            if(file_exists($controllerPath)) {
                include_once $controllerPath;
            }
            if(file_exists($modelPath)) {
                include_once $modelPath;
            }
            if(file_exists($libariePath)) {
                include_once $libariePath;
            }
        });
        $controller = $this->controller."Controller";
        $class = new $controller();
        call_user_func_array([$class,$this->method],$this->params);
    }
}