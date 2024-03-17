<?php

namespace Kernel\Views;
;

class View
{
    public function page($name){

        require_once VIEW_PATH . "/pages/" . $name . ".php";
    }


    public static function components($name, $title = '')
    {
       return require_once VIEW_PATH . "/components/" . $name . ".php";
    }
}