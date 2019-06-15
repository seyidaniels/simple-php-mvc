<?php

class App
{
    protected $controller = "HomeController";

    protected $method = "index";

    protected $params = [];

    public function __construct()
    {
        $url = $this->parseUrl();

        // Check if the Controller exists
        $intendingController = ucfirst($url[0]) . "Controller";
        if (file_exists('../app/controllers/' . $intendingController . ".php")) {
            $this->controller = $intendingController;
            unset($url[0]);
        }
        require_once('../app/controllers/' . $this->controller . ".php");
        $this->controller = new $this->controller;

        if ($url !== null) {
            if (method_exists($this->controller, $url[0])) {
                $this->method = $url[0];
                unset($url[0]);
            }
        }

        $this->params = $url ? array_values($url) : [];

        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    protected function parseUrl()
    {
        if (isset($_GET['url'])) {
            return explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        }
    }
}