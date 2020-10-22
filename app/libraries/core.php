<?php

// sort of a web.php from Laravel

/*
* App Core Class 
* Creates URL & loads core controller 
* URL FOMRAT - /controller/methods/params
*/

class Core {
    protected $currentController = 'Pages';
    protected $currentMethod = 'index';
    protected $params = [];

    public function __construct(){
        // print_r( $this->getUrl());
        $url = $this->getUrl();
        // Look in controllers for first value

        // define the location of the file as if it was relative to 
        // public/index.php
        $pathToController = '../app/controllers/' . ucwords($url[0]) . '.php';
        if (file_exists($pathToController)) {
            // If exists, set as controller
            $this->currentController = ucwords($url[0]);
            // Unset 0 Index
            unset($url[0]);
        }
        // Require the controller
        require_once '../app/controllers/' . $this->currentController . '.php';
        // Instantiate controller class
        $this->currentController = new $this->currentController;
    }

    public function getUrl(){
        if(isset($_GET['url'])){
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }
}