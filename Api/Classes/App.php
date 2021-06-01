<?php

namespace Api\Classes;

use Api\Classes\Requests\Request;
use Api\Classes\Router;

class App {

    private Request $request;
    private Router $router;

    public function __construct()
    {
        $this->request = new Request();
        $this->router = new Router($this->request);
    }

    public function run()
    {
        $this->router->start();
    }


}