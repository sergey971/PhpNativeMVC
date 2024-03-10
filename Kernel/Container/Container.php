<?php

namespace Kernel\Container;

use Kernel\Http\Request;

class Container
{
    public readonly Request $request; // Объявление свойства $request

    public function __construct()
    {
        $this->registerServices(); // Вызов метода для регистрации сервисов
    }

    private function registerServices(): void
    {
        $this->request = Request::createFromGlobals(); // Создание объекта Request и присвоение его свойству $request

    }
}
