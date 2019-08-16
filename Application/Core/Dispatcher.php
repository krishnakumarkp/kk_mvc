<?php

class Dispatcher
{

    private $request;

    public function dispatch($request)
    {
        $this->request = $request;
        Router::parse($this->request);
        $controller = $this->loadController();
        if(!is_callable(array($controller, $this->request->action))) {
            $this->request->action = 'index';
        }
        call_user_func_array([$controller, $this->request->action], $this->request->params);
    }

    public function loadController()
    {
        $name = $this->request->controller . "Controller";
        $file = ROOT . 'Application/Controllers/' . $name . '.php';
        if(!file_exists($file)) {
            http_response_code(404);
            echo "Page Not Found!";// provide your own HTML for the error page
            die();
        }
        require($file);
        $controller = new $name();
        return $controller;
    }

}
?>