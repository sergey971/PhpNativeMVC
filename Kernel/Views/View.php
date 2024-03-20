<?php

namespace Kernel\Views;

use Kernel\Exceptions\ViewNotFoundExceptions;

class View
{
    public function page(string $name): void
    {
        $viewPath = $this->findView($name, VIEW_PATH . "/pages");

        if ($viewPath === null) {
//            Выбрасываем исключение так правильнее всего
            throw new ViewNotFoundExceptions("View $name not found");
        }
        extract([
            "view" => $this
        ]);
        require_once $viewPath;


    }

    private function findView(string $name, string $directory): ?string
    {
        $files = scandir($directory);
        foreach ($files as $file) {
//            Условие if ($file === "." || $file === "..") позволяет игнорировать специальные элементы "." и "..",
//      которые представляют собой ссылки на текущую и родительскую директории соответственно.
//
//      Когда выполняется условие continue; внутри цикла foreach, текущая итерация цикла прерывается, и управление
//      переходит к следующей итерации. Это означает, что код, который следует после этого условия, не будет выполнен для
//      специальных элементов "." и "..", и цикл продолжит итерацию по остальным файлам и папкам в директории.
//
//      Таким образом, благодаря этому условию, в результате выполнения функции scandir() вы получаете только
//      реальные файлы и папки в указанной директории, а не специальные ссылки на текущую и родительскую директории.
            if ($file === "." || $file === "..") {
                continue;
            }

            $path = $directory . "/" . $file;

            if (is_dir($path)) {
                $pathView = $this->findView($name, $path);

                if ($pathView !== null) {
                    return $pathView;
                }

            } elseif ($file === "$name.php") {
                // Если это файл и его имя совпадает с искомым, возвращаем его путь
                return $path;
            }
        }
        return null;
    }

    public function components(string $name, $title = ''): void
    {
        $componentPath = VIEW_PATH . "/components/$name.php";
        if (!file_exists($componentPath)) {
            echo "Компонент $name not found";
            return;
        }
        require_once $componentPath;
    }
}