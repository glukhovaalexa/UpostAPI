<?php

namespace Api\Classes\Requests;

class Request {

    /**
     * check request method
     * 
     * @param
     * @return bool
     **/
    public function getRequestMethod() : bool
    {
        if($_SERVER['REQUEST_METHOD'] === 'GET') {
            return true;
        }
        return false;
    }

    /**
     * check request method
     * 
     * @param
     * @return bool
     **/
    public function postRequestMethod() : bool
    {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            return true;
        }
        return false;
    }
}