<?php

namespace lib;

use Controllers;
use lib\Session;

class Main
{
    public $url;
    public $controllerName = "indexController";
    public $loadControllerName = 'Controllers\\' . "indexController";
    public $controllerPath = "src/Controllers/";
    public $controller;
    public $methodName = "index";
    public function __construct()
    {

        $this->getURL();
        $this->loadController();
        $this->loadMethod();
    }
    public function getURL()
    {
        $this->url = $_GET['url'];
        $this->url = rtrim($this->url, '/');
        $this->url = explode("/", filter_var($this->url, FILTER_SANITIZE_URL));
    }
    public function loadController()
    {

        if (
            is_array($this->url) && isset($this->url[0])
        ) {

            $this->controllerName = $this->url[0];
            $this->loadController = 'Controllers\\' . $this->controllerName;
            $drControllerName = $this->controllerPath . $this->controllerName . '.php';

            if (file_exists($drControllerName)) {
                include($drControllerName);
                if (class_exists($this->loadController)) {

                    $this->controller = new $this->loadController();
                } else {
                    $notFound = new Controllers\indexController();
                    $notFound->notFoundPage();
                }
            } else {
                $notFound = new Controllers\indexController();
                $notFound->notFoundPage();
            }
        } else {
            header("Location:" . BASE_URL . $this->controllerName . 'php');
        }
    }
    public function loadMethod()
    {
        if (is_array($this->url) && isset($this->url[1])) {
            $this->methodName = $this->url[1];
            if (method_exists($this->loadController, $this->methodName)) {
                $controllerClass = $this->controller;
                $controllerClass->{$this->methodName}();
            } else {
                echo "Cannot found this method: " . $this->methodName;
            }
        } else if (
            is_array($this->url) && class_exists($this->loadController) &&
            isset($this->url[0]) && !isset($this->url[1])
        ) {
            $this->controller->index();
        }
    }
}
