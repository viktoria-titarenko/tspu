<?php
class Route {
    static function run(){
        $controller_name = 'Main';
        $action_name = 'index';
        $routes;
        if(strpos($_SERVER['REQUEST_URI'], '?') !== false)
        {
            $routes = explode('/', explode('?', $_SERVER['REQUEST_URI'])[0]);
        } else {
            $routes = explode('/', $_SERVER['REQUEST_URI']);
        }
        array_splice($routes, 0, 1);
        if(!empty($routes[1]))
        {
            $controller_name = $routes[1];
        }
        if(!empty($routes[2]))
        {
            $action_name = $routes[2];
        }
        $controller_name =$controller_name . 'Controller';   
        $action_name = $action_name . '_action';

        $controller_file = strtolower($controller_name . '.php');
        $controller_path = "application/controllers/" . $controller_file;
        if(file_exists($controller_path))
        {
            include $controller_path;
        } else {
            // Route::ErrorPage404();
            echo "404" . " " . "не найден файл";
            return;
        }
        $controller = new $controller_name();    
        // $action = $action_name;
        if(method_exists($controller, $action_name))
        {
            $controller->$action_name();
        } else {
            echo "404" . " " . "не найден action";
            return;
            // Route::ErrorPage404();
        }
    }

    function ErrorPage404() {
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        header('HTTP/1.1 404 Not Found');
		header("Status: 404 Not Found");
		header('Location:'.$host.'404');
    }
}
