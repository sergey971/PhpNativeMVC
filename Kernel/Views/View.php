<?php

namespace Kernel\Views;
;

class View
{
    public function page(string $name):void{
        extract([
            "view" => $this
        ]);

        require_once VIEW_PATH . "/pages/" . $name . ".php";
    }


    public function components(string $name, $title = ''): void
    {

       require_once VIEW_PATH . "/components/" . $name . ".php";
    }
}