<?php

namespace Api\Classes;

use Api\Classes\Requests\Request;

class Router {

    private static array $router = [];
    private Request $request;
    public string $path;
    public string $action;
    public array $params;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * add to router new path (http method get)
     * 
     * @param Type string $path, $action
     * @return void
     **/
    public static function get($path, $action)
    {
        self::$router['GET'][$path] = $action;
    }

    /**
     * add to router new path (http method post)
     * 
     * @param Type string $path, $action
     * @return void
     **/
    public static function post($path, $action)
    {
        self::$router['POST'][$path] = $action;
    }

    /**
     * get url
     * 
     * @param
     * @return string
     **/
    public function getUrl()
    {
        return $_SERVER['REQUEST_URI'];
    }

    /**
     * parse url
     * 
     * @param
     * @return void
     **/
    public function parseUrl()
    {
        $params = '';
        $this->path = parse_url($this->getUrl(), PHP_URL_PATH);
        if($params = parse_url($this->getUrl(), PHP_URL_QUERY)){
            $this->params = explode('&', $params);
        }
        
    }

    /**
     * connect controller
     * 
     * @param Type string $path, $action
     * @return void
     **/
    public function start()
    {
        $this->parseUrl();
        if($this->request->getRequestMethod()) {
            if(isset($this->params)){
                var_dump($this->params); exit;

            }
            $this->action = self::$router['GET'][$this->path];
        }
        if($this->request->postRequestMethod()) {
            if(isset($this->params)){
                var_dump($this->params); exit;

            }
            $this->action = self::$router['POST'][$this->path];
        }

        \call_user_func_array();
    }

}