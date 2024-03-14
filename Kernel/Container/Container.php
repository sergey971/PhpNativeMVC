<?php

namespace Kernel\Container;

use Kernel\Http\Request;

class Container
{

    public readonly Request $request;

    public function __construct()
    {
        $this -> registerServices();
    }

    public function registerServices(){
        $this->request = Request::getRequestMethod();
    }
}