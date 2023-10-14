<?php

namespace App;

class Application
{
    private $controller;

    private function setApp()
    {

        $loadName = 'App/Controllers/';

        $url = isset($_GET['url']) ? explode('/', $_GET['url']) : [''];


        if (empty($url[0])) {
            $loadName .= 'Home';
        } else {
            $loadName .= ucfirst(strtolower($url[0]));
        }

        if ($url == 'show') {
        }


        $loadName .= 'Controller';

        if (file_exists($loadName . '.php')) {
            $loadName = str_replace("/", "\\", $loadName);
            $this->controller = new $loadName();
        }else {

            include('Views/pages/erro404.php');
            die();
        }
    }

    public function run()
    {
        $this->setApp();
        $this->controller->index();
    }
}
