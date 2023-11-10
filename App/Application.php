<?php

namespace App;

class Application
{
    private $controller;

    private function setApp()
    {

        $loadName = 'App/Controllers/';

        $url = isset($_GET['url']) ? explode('/', $_GET['url']) : [''];
        $parameter = null;


        if (empty($url[0])) {
            $loadName .= 'Home';
        } else {
            $loadName .= ucfirst(strtolower($url[0]));
        }
       
        if (isset($url[1]) && is_numeric($url[1])) {
            $parameter = $url[1];
        }

        $loadName .= 'Controller';

        if (file_exists($loadName . '.php')) {

            $loadName = str_replace("/", "\\", $loadName);
            $this->controller = new $loadName();

            if (method_exists($this->controller, 'index')) {

                if (isset($parameter)) {
                    $this->controller->index($parameter);
                } else {
                    $this->controller->index();
                }

            } else {
                include('Views/pages/erro404.php');
            }
        }else{
            include('Views/pages/erro404.php');
        }
    }
    public function run()
    {
        $this->setApp();
    }
}
