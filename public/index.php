<?php
// Константы
require_once dirname(__DIR__) . '/Kernel/define.php';
// Подключаем автозагрузчик Composer
require dirname(__DIR__) . '/vendor/autoload.php';
use Kernel\Router\DispatcherRouter;
use Kernel\Router\Router;

// Инициализация маршрута
$dispatcher = DispatcherRouter::createRoutes();
$router = new Router($dispatcher);
$router -> dispatch();
