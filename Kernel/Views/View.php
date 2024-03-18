<?php

namespace Kernel\Views;
use Kernel\Exceptions\ViewNotFoundExceptions;

class View
{
    public function page(string $name):void{

        $viewPath = VIEW_PATH . "/pages/$name.php";


        if(!file_exists($viewPath)){
//            Выбрасываем исключение так правильнее всего
            throw new ViewNotFoundExceptions("View $name not found");
        }
        extract([
            "view" => $this
        ]);
        require_once  $viewPath;
    }


    public function components(string $name, $title = ''): void
    {
        $componentPath = VIEW_PATH . "/components/$name.php";
        if (!file_exists($componentPath)){
        echo "Компонент $name not found";
        return;
        }
       require_once $componentPath;
    }
}