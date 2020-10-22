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
        $this->getUrl();
    }

    public function getUrl(){
        echo $_GET['url'];
    }
}