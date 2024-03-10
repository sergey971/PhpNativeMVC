<?php

namespace Kernel\Router;

use FastRoute\Dispatcher;
use Kernel\Container\Container; // Импортируем класс Container
use Kernel\Http\Request;
use Kernel\Router\UriParser;

class Router
{
    private Container $container; // Свойство для хранения экземпляра контейнера
    protected Dispatcher $dispatcher; // Свойство для хранения экземпляра Dispatcher

    public function __construct(Dispatcher $dispatcher)
    {
        $this->dispatcher = $dispatcher; // Присваиваем переданный экземпляр Dispatcher
    }

    public function dispatch()
    {
        $request = $this->container = new Container(); // Создаем экземпляр контейнера и присваиваем его переменной $request
        $httpMethod = $request->request->method(); // Получаем метод HTTP из объекта Request
        $uri = $request->request->uri(); // Разбираем URI с помощью UriParser
        $routeInfo = $this->dispatcher->dispatch($httpMethod, $uri); // Диспетчеризация запроса
        switch ($routeInfo[0]) {
            case Dispatcher::NOT_FOUND:
                echo '404 Not Found'; // Выводим сообщение о том, что маршрут не найден
                break;
            case Dispatcher::METHOD_NOT_ALLOWED:
                $allowedMethods = $routeInfo[1]; // Получаем разрешенные методы
                echo '405 Method Not Allowed'; // Выводим сообщение о неподдерживаемом методе
                break;
            case Dispatcher::FOUND:
                $handler = $routeInfo[1]; // Получаем обработчик маршрута
                $vars = $routeInfo[2]; // Получаем переменные маршрута
                if (is_callable($handler)) { // Проверяем, является ли обработчик маршрута callable
                    call_user_func_array($handler, $vars); // Вызываем обработчик маршрута с переданными переменными
                } else {
                    echo "Handler is not callable"; // Выводим сообщение о том, что обработчик не является callable
                }
                break;
        }
    }
}
