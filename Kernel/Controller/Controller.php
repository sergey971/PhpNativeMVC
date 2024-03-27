<?php

namespace Kernel\Controller;

use Kernel\Container\Container;
use Kernel\Views\View;
use Kernel\Http\Request;
abstract class Controller
{

    private View $view;
    private Container $container;

    public function __construct()
    {
        $this->view = new View();
        $this->container = new Container();


    }

    public function view($name)
    {
        $this->view->page($name);

    }

//    Получаем метод для отправки формы
    public function input($key, $default = null)
    {
      return $this->container->request->input($key, $default);

    }



}