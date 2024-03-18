<?php

namespace Kernel\Router;
// Импортируем нужные классы FastRoute
use FastRoute\RouteCollector;
use FastRoute\Dispatcher;
use App\Controller\HomeController;
use App\Controller\AboutController;
use Kernel\Container\Container;
use Kernel\Views\View;
use App\Controller\AddController;
class Router
{

    private $routesCallback;


    public function getRoutesCallback()
    {
        return $this->routesCallback;
    }

    public function startRouter()
    {
//        Создаем новый экземпляр класса Container
        $container = new Container();
        $routesCallback = $this->getRoutesCallback();


// Определяем функцию для получения информации о маршрутах
        $routesCallback = function (RouteCollector $r) {
            $r->addRoute('GET', '/', [HomeController::class, 'index']);
            $r->addRoute('GET', '/about', [AboutController::class, 'index']);
                $r->addRoute('GET', '/admin/post/add', [AddController::class, 'add']);
            // Добавьте другие маршруты здесь
        };

// Инициализируем маршруты с помощью RouteCollector
        $dispatcher = \FastRoute\simpleDispatcher($routesCallback);

// Получаем информацию о текущем HTTP-запросе
        $httpMethod = $container->request->method();
        $uri = $container->request->uri();

// Отправляем запрос FastRoute для определения действия для выполнения
        $routeInfo = $dispatcher->dispatch($httpMethod, $uri);
// Обработка результата
        switch ($routeInfo[0]) {
            case Dispatcher::NOT_FOUND:
                // Обработка случая, когда маршрут не найден
                echo "404 Not Found";
                break;
            case Dispatcher::METHOD_NOT_ALLOWED:
                // Обработка случая, когда метод не разрешен
                echo "405 Method Not Allowed";
                break;
            case Dispatcher::FOUND:
                // Получаем информацию о найденном маршруте
                $handler = $routeInfo[1];
                $vars = $routeInfo[2];

                // Разбиваем имя контроллера и метода
//        list($controllerName, $methodName) = explode('@', $handler, 2);
                // Создаем экземпляр контроллера и вызываем метод
                $controllerClass = $handler[0];   //В этой строке получается имя класса
                // контроллера из массива $handler. Этот элемент массива содержит имя
                // класса контроллера, который должен быть использован для обработки
                // текущего запроса [HomeController::class].
                $methodName = $handler[1]; //В этой строке получается имя метода,
                // который должен быть вызван для обработки запроса. Этот элемент массива содержит имя метода,
                // который должен быть вызван в контексте найденного контроллера. [HomeController::class, 'index']
                $controller = new $controllerClass; //Создаётся новый экземпляр класса контроллера,
                // используя имя класса, полученное на первом шаге.
                // Этот экземпляр будет использован для вызова метода обработки запроса.
                $controller->$methodName($vars); // Вызывается метод контроллера с именем, полученным на втором шаге,
                // и передаются переменные запроса (если они есть). Этот метод обрабатывает сам запрос,
                // используя информацию, переданную в маршруте и переменные запроса.

                //Этот код позволяет динамически создавать экземпляры контроллеров и вызывать
                // методы на основе результатов маршрутизации, обеспечивая гибкую обработку запросов
                // в вашем веб-приложении.
                break;
        }
    }
}