<?php

namespace Kernel\Router;

use FastRoute\Dispatcher;
use FastRoute\RouteCollector;
use App\Controllers\HomeController;
use App\Controllers\AboutController;
use App\Controllers\FormController;

class DispatcherRouter
{
//    Ответственен за создание экземпляра диспетчера маршрутов.
    public static function createRoutes(): Dispatcher
    {

        return \FastRoute\simpleDispatcher(function (RouteCollector $route) {
            $route->addRoute('GET', '/', [HomeController::class, 'index']);
            $route->addRoute('GET', '/about', [AboutController::class, 'index']);
        });
    }


}
