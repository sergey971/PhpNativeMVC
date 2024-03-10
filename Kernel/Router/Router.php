<?php

namespace Kernel\Router;

use FastRoute\Dispatcher;
use Kernel\Http\Request;
use Kernel\Router\UriParser;

class Router
{
    protected Dispatcher $dispatcher;

    public function __construct(Dispatcher $dispatcher)
    {
        $this->dispatcher = $dispatcher;


    }


    public function dispatch()
    {
        $request  = Request::createFromGlobals();
        $parser = new UriParser();
        $httpMethod = $request->method();
        $uri = $parser->parseUri();

        $routeInfo = $this->dispatcher->dispatch($httpMethod, $uri);
        switch ($routeInfo[0]) {
            case Dispatcher::NOT_FOUND:
                echo '404 Not Found';
                break;
            case Dispatcher::METHOD_NOT_ALLOWED:
                $allowedMethods = $routeInfo[1];
                echo '405 Method Not Allowed';
                break;
            case Dispatcher::FOUND:
                $handler = $routeInfo[1];
                $vars = $routeInfo[2];
                if (is_callable($handler)) {
                    call_user_func_array($handler, $vars);
                } else {
                    echo "Handler is not callable";
                }
                break;
        }
    }
}