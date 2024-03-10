<?php
// Константы
require_once dirname(__DIR__) . '/Kernel/define.php';
// Подключаем автозагрузчик Composer
require dirname(__DIR__) . '/vendor/autoload.php';
use Kernel\Router\DispatcherRouter;
use Kernel\Router\Router;

// Инициализация маршрута
$dispatcher = DispatcherRouter::createRoutes(); // Создание экземпляра диспетчера маршрутов с помощью статического метода createRoutes() класса DispatcherRouter
$router = new Router($dispatcher); // Создание экземпляра маршрутизатора (Router) и передача ему созданного диспетчера маршрутов
$router->dispatch(); // Вызов метода dispatch() для маршрутизатора, который инициирует обработку запроса и выполнение соответствующего
