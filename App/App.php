<?php

namespace App;

use Kernel\Router\Router;

class App

{
    public function dispatch(){
        $router = new Router();
        $router->startRouter();
    }
}